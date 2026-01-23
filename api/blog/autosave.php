<?php
/**
 * Griffin Quartz - Autosave Blog Post API
 * Quick save for draft posts without full validation
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
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

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

$post_id = (int)($_POST['post_id'] ?? 0);
$title = sanitize($_POST['title'] ?? '');
$content = $_POST['content'] ?? '';
$excerpt = sanitize($_POST['excerpt'] ?? '');

if (empty($title)) {
    echo json_encode(['success' => false, 'message' => 'Title required']);
    exit();
}

try {
    if ($post_id) {
        // Update existing draft
        $stmt = $pdo->prepare("
            UPDATE blog_posts SET
                title = ?, content = ?, excerpt = ?, updated_at = NOW()
            WHERE id = ?
        ");
        $stmt->execute([$title, $content, $excerpt, $post_id]);
    } else {
        // Create new draft
        $slug = slugify($title);

        // Ensure unique slug
        $base_slug = $slug;
        $counter = 1;
        while (true) {
            $stmt = $pdo->prepare("SELECT id FROM blog_posts WHERE slug = ?");
            $stmt->execute([$slug]);
            if (!$stmt->fetch()) break;
            $slug = $base_slug . '-' . $counter++;
        }

        $stmt = $pdo->prepare("
            INSERT INTO blog_posts (title, slug, content, excerpt, status)
            VALUES (?, ?, ?, ?, 'draft')
        ");
        $stmt->execute([$title, $slug, $content, $excerpt]);
        $post_id = $pdo->lastInsertId();
    }

    echo json_encode([
        'success' => true,
        'message' => 'Autosaved',
        'post_id' => $post_id
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Autosave failed']);
}
