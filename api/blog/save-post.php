<?php
/**
 * Griffin Quartz - Save Blog Post API
 * Creates or updates blog posts with all related data
 */

session_start();
header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Verify CSRF
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit();
}

require_once dirname(__DIR__) . '/config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

// Sanitize function
function sanitize($value) {
    return htmlspecialchars(trim($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text ?: 'untitled';
}

// Get form data
$post_id = (int)($_POST['post_id'] ?? 0);
$title = sanitize($_POST['title'] ?? '');
$slug = sanitize($_POST['slug'] ?? '');
$content = $_POST['content'] ?? ''; // Don't sanitize - TinyMCE content
$excerpt = sanitize($_POST['excerpt'] ?? '');
$status = $_POST['status'] ?? 'draft';
$publish_date = $_POST['publish_date'] ?? null;
$author = sanitize($_POST['author'] ?? 'Griffin Quartz Team');

// Featured image
$featured_image = sanitize($_POST['featured_image'] ?? '');
$featured_image_alt = sanitize($_POST['featured_image_alt'] ?? '');

// SEO fields
$seo_title = sanitize($_POST['seo_title'] ?? '');
$seo_description = sanitize($_POST['seo_description'] ?? '');
$seo_keywords = sanitize($_POST['seo_keywords'] ?? '');
$og_title = sanitize($_POST['og_title'] ?? '');
$og_description = sanitize($_POST['og_description'] ?? '');

// Categories and tags
$categories = $_POST['categories'] ?? [];
$tags = array_filter(array_map('trim', explode(',', $_POST['tags'] ?? '')));

// FAQs
$faq_questions = $_POST['faq_question'] ?? [];
$faq_answers = $_POST['faq_answer'] ?? [];

// Validation
if (empty($title)) {
    echo json_encode(['success' => false, 'message' => 'Title is required']);
    exit();
}

// Validate status
if (!in_array($status, ['draft', 'scheduled', 'published'])) {
    $status = 'draft';
}

// Generate slug if empty
if (empty($slug)) {
    $slug = slugify($title);
}

// Ensure unique slug
$base_slug = $slug;
$counter = 1;
while (true) {
    $stmt = $pdo->prepare("SELECT id FROM blog_posts WHERE slug = ? AND id != ?");
    $stmt->execute([$slug, $post_id]);
    if (!$stmt->fetch()) break;
    $slug = $base_slug . '-' . $counter++;
}

// Format publish date
if ($status === 'scheduled' && $publish_date) {
    $publish_date = date('Y-m-d H:i:s', strtotime($publish_date));
} elseif ($status === 'published') {
    // If publishing and no date set, use now
    if ($post_id) {
        $stmt = $pdo->prepare("SELECT publish_date FROM blog_posts WHERE id = ?");
        $stmt->execute([$post_id]);
        $existing = $stmt->fetch();
        $publish_date = $existing['publish_date'] ?: date('Y-m-d H:i:s');
    } else {
        $publish_date = date('Y-m-d H:i:s');
    }
} else {
    $publish_date = null;
}

$pdo->beginTransaction();

try {
    if ($post_id) {
        // Update existing post
        $stmt = $pdo->prepare("
            UPDATE blog_posts SET
                title = ?, slug = ?, content = ?, excerpt = ?,
                featured_image = ?, featured_image_alt = ?,
                status = ?, publish_date = ?, author = ?,
                seo_title = ?, seo_description = ?, seo_keywords = ?,
                og_title = ?, og_description = ?,
                updated_at = NOW()
            WHERE id = ?
        ");
        $stmt->execute([
            $title, $slug, $content, $excerpt,
            $featured_image, $featured_image_alt,
            $status, $publish_date, $author,
            $seo_title, $seo_description, $seo_keywords,
            $og_title, $og_description,
            $post_id
        ]);

        // Create revision
        $stmt = $pdo->prepare("
            INSERT INTO blog_revisions (post_id, title, content, excerpt, revision_note)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$post_id, $title, $content, $excerpt, 'Manual save']);

    } else {
        // Create new post
        $stmt = $pdo->prepare("
            INSERT INTO blog_posts (
                title, slug, content, excerpt,
                featured_image, featured_image_alt,
                status, publish_date, author,
                seo_title, seo_description, seo_keywords,
                og_title, og_description
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $title, $slug, $content, $excerpt,
            $featured_image, $featured_image_alt,
            $status, $publish_date, $author,
            $seo_title, $seo_description, $seo_keywords,
            $og_title, $og_description
        ]);
        $post_id = $pdo->lastInsertId();
    }

    // Update categories
    $pdo->prepare("DELETE FROM blog_post_categories WHERE post_id = ?")->execute([$post_id]);
    if (!empty($categories)) {
        $stmt = $pdo->prepare("INSERT INTO blog_post_categories (post_id, category_id) VALUES (?, ?)");
        foreach ($categories as $cat_id) {
            $stmt->execute([$post_id, (int)$cat_id]);
        }
    }

    // Update tags
    $pdo->prepare("DELETE FROM blog_post_tags WHERE post_id = ?")->execute([$post_id]);
    if (!empty($tags)) {
        foreach ($tags as $tag_name) {
            $tag_name = trim($tag_name);
            if (empty($tag_name)) continue;

            $tag_slug = slugify($tag_name);

            // Get or create tag
            $stmt = $pdo->prepare("SELECT id FROM blog_tags WHERE slug = ?");
            $stmt->execute([$tag_slug]);
            $tag = $stmt->fetch();

            if (!$tag) {
                $stmt = $pdo->prepare("INSERT INTO blog_tags (name, slug) VALUES (?, ?)");
                $stmt->execute([$tag_name, $tag_slug]);
                $tag_id = $pdo->lastInsertId();
            } else {
                $tag_id = $tag['id'];
            }

            // Link tag to post
            $stmt = $pdo->prepare("INSERT IGNORE INTO blog_post_tags (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$post_id, $tag_id]);
        }
    }

    // Update FAQs
    $pdo->prepare("DELETE FROM blog_faqs WHERE post_id = ?")->execute([$post_id]);
    if (!empty($faq_questions)) {
        $stmt = $pdo->prepare("INSERT INTO blog_faqs (post_id, question, answer, sort_order) VALUES (?, ?, ?, ?)");
        foreach ($faq_questions as $i => $question) {
            $answer = $faq_answers[$i] ?? '';
            if (!empty($question) && !empty($answer)) {
                $stmt->execute([$post_id, sanitize($question), sanitize($answer), $i]);
            }
        }
    }

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Post saved successfully',
        'post_id' => $post_id,
        'slug' => $slug
    ]);

} catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save post: ' . $e->getMessage()]);
}
