<?php
/**
 * Griffin Quartz - Blog Post Migration Script
 * Imports existing static blog posts into the database
 *
 * USAGE: Run once from command line or browser (while logged into admin)
 * php migrate-posts.php
 *
 * WARNING: This will add posts to the database. Run only once!
 */

// Allow running from CLI or browser
if (php_sapi_name() !== 'cli') {
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        die('Admin login required. Please login at /admin/leads.php first.');
    }
}

require_once dirname(__DIR__) . '/api/config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$blog_dir = dirname(__DIR__) . '/blog/';

// Files to skip
$skip_files = ['index.php', 'index-static.php', 'post.php'];

// Get all blog PHP files
$files = glob($blog_dir . '*.php');
$migrated = 0;
$skipped = 0;
$errors = [];

echo "<pre>\n";
echo "=== Griffin Quartz Blog Migration ===\n\n";

foreach ($files as $file) {
    $filename = basename($file);

    // Skip non-post files
    if (in_array($filename, $skip_files)) {
        continue;
    }

    $slug = str_replace('.php', '', $filename);

    // Check if already migrated
    $stmt = $pdo->prepare("SELECT id FROM blog_posts WHERE slug = ?");
    $stmt->execute([$slug]);
    if ($stmt->fetch()) {
        echo "SKIP: $slug (already exists)\n";
        $skipped++;
        continue;
    }

    // Read file content
    $content = file_get_contents($file);

    // Extract title from <title> tag or <h1>
    $title = '';
    if (preg_match('/<title>([^|<]+)/i', $content, $m)) {
        $title = trim($m[1]);
    } elseif (preg_match('/<h1[^>]*>([^<]+)</i', $content, $m)) {
        $title = trim($m[1]);
    }

    // Extract meta description
    $meta_desc = '';
    if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\']([^"\']+)/i', $content, $m)) {
        $meta_desc = trim($m[1]);
    }

    // Extract meta keywords
    $keywords = '';
    if (preg_match('/<meta\s+name=["\']keywords["\']\s+content=["\']([^"\']+)/i', $content, $m)) {
        $keywords = trim($m[1]);
    }

    // Extract featured image from blog-hero
    $featured_image = '';
    if (preg_match('/<div class="blog-hero">\s*<img src="([^"]+)"/i', $content, $m)) {
        $featured_image = trim($m[1]);
        // Convert relative paths
        if (strpos($featured_image, '../') === 0) {
            $featured_image = '/' . substr($featured_image, 3);
        }
    }

    // Extract blog content (between blog-content div)
    $body_content = '';
    if (preg_match('/<div class="blog-content">(.*?)<\/div>\s*(?:<div class="blog-cta"|<\/div>\s*<\/article>)/is', $content, $m)) {
        $body_content = trim($m[1]);

        // Clean up relative URLs in content
        $body_content = str_replace('href="../', 'href="/', $body_content);
        $body_content = str_replace('src="../', 'src="/', $body_content);
    }

    // Extract author and date from blog-meta
    $author = 'Griffin Quartz Team';
    $publish_date = date('Y-m-d H:i:s');
    if (preg_match('/By\s+([^|•]+)\s*[|•]\s*(\w+\s+\d+,?\s*\d+)/i', $content, $m)) {
        $author = trim($m[1]);
        $date_str = trim($m[2]);
        $parsed_date = strtotime($date_str);
        if ($parsed_date) {
            $publish_date = date('Y-m-d H:i:s', $parsed_date);
        }
    }

    // Generate excerpt from meta description or first paragraph
    $excerpt = $meta_desc;
    if (empty($excerpt) && preg_match('/<p[^>]*>([^<]{50,200})/i', $body_content, $m)) {
        $excerpt = strip_tags(trim($m[1]));
        if (strlen($excerpt) > 160) {
            $excerpt = substr($excerpt, 0, 157) . '...';
        }
    }

    if (empty($title) || empty($body_content)) {
        echo "ERROR: $slug - Could not extract title or content\n";
        $errors[] = $slug;
        continue;
    }

    // Insert into database
    try {
        $stmt = $pdo->prepare("
            INSERT INTO blog_posts (
                title, slug, content, excerpt,
                featured_image, status, publish_date, author,
                seo_title, seo_description, seo_keywords
            ) VALUES (?, ?, ?, ?, ?, 'published', ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $title,
            $slug,
            $body_content,
            $excerpt,
            $featured_image,
            $publish_date,
            $author,
            $title,
            $meta_desc,
            $keywords
        ]);

        $post_id = $pdo->lastInsertId();

        // Assign categories based on content/title
        $categories_to_assign = [];

        // Detect category from title/slug
        if (stripos($slug, 'fort-lauderdale') !== false || stripos($title, 'Fort Lauderdale') !== false) {
            $categories_to_assign[] = 'local-guides';
        }
        if (stripos($slug, 'cost') !== false || stripos($slug, 'pricing') !== false || stripos($title, 'Cost') !== false || stripos($title, 'Price') !== false) {
            $categories_to_assign[] = 'cost-pricing';
        }
        if (stripos($slug, 'install') !== false || stripos($title, 'Installation') !== false) {
            $categories_to_assign[] = 'installation-guides';
        }
        if (stripos($slug, 'vs-') !== false || stripos($title, 'vs') !== false || stripos($title, 'comparison') !== false) {
            $categories_to_assign[] = 'comparisons';
        }
        if (stripos($slug, 'color') !== false || stripos($slug, 'design') !== false || stripos($title, 'Color') !== false) {
            $categories_to_assign[] = 'design-inspiration';
        }

        // Default to quartz-countertops if no specific category
        if (empty($categories_to_assign)) {
            $categories_to_assign[] = 'quartz-countertops';
        }

        // Insert category relationships
        foreach ($categories_to_assign as $cat_slug) {
            $stmt = $pdo->prepare("SELECT id FROM blog_categories WHERE slug = ?");
            $stmt->execute([$cat_slug]);
            $cat = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($cat) {
                $pdo->prepare("INSERT IGNORE INTO blog_post_categories (post_id, category_id) VALUES (?, ?)")
                    ->execute([$post_id, $cat['id']]);
            }
        }

        echo "OK: $slug -> ID $post_id\n";
        $migrated++;

    } catch (PDOException $e) {
        echo "ERROR: $slug - " . $e->getMessage() . "\n";
        $errors[] = $slug;
    }
}

echo "\n=== Migration Complete ===\n";
echo "Migrated: $migrated\n";
echo "Skipped: $skipped\n";
echo "Errors: " . count($errors) . "\n";

if (!empty($errors)) {
    echo "\nFailed files:\n";
    foreach ($errors as $err) {
        echo "  - $err\n";
    }
}

echo "</pre>\n";

// Create 301 redirect rules
echo "\n<h3>Suggested .htaccess redirects (add to /blog/.htaccess if needed):</h3>\n<pre>\n";
echo "# 301 Redirects for old .php URLs\n";
echo "# (Already handled by existing rewrite rule, but explicit redirects are optional)\n";
foreach ($files as $file) {
    $filename = basename($file);
    if (!in_array($filename, $skip_files)) {
        $slug = str_replace('.php', '', $filename);
        echo "# Redirect 301 /blog/$filename /blog/$slug\n";
    }
}
echo "</pre>\n";
