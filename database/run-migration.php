<?php
/**
 * Griffin Quartz - Database Migration Runner
 * Creates all blog tables
 *
 * USAGE:
 * 1. Login to admin at /admin/leads.php
 * 2. Visit /database/run-migration.php in your browser
 *
 * Or run from CLI: php run-migration.php
 */

// Allow running from CLI or browser
if (php_sapi_name() !== 'cli') {
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        die('<h2>Admin Login Required</h2><p>Please <a href="/admin/leads.php">login to admin</a> first, then return here.</p>');
    }
}

echo "<pre style='font-family: monospace; background: #1a1a1a; color: #0f0; padding: 2rem; margin: 2rem;'>\n";
echo "╔══════════════════════════════════════════════════╗\n";
echo "║   GRIFFIN QUARTZ - DATABASE MIGRATION            ║\n";
echo "╚══════════════════════════════════════════════════╝\n\n";

require_once dirname(__DIR__) . '/api/config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_BLOG_HOST . ";dbname=" . DB_BLOG_NAME . ";charset=utf8mb4",
        DB_BLOG_USER,
        DB_BLOG_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "[OK] Connected to database: " . DB_BLOG_NAME . "\n\n";
} catch (PDOException $e) {
    die("[ERROR] Database connection failed: " . $e->getMessage() . "\n");
}

// Read migration SQL file
$sql_file = __DIR__ . '/blog_migration.sql';
if (!file_exists($sql_file)) {
    die("[ERROR] Migration file not found: $sql_file\n");
}

$sql = file_get_contents($sql_file);
echo "[OK] Loaded migration file\n\n";

// Remove comments and split into individual statements
$sql = preg_replace('/--.*$/m', '', $sql);  // Remove single-line comments
$sql = preg_replace('/^\s*\n/m', '', $sql); // Remove empty lines

// Split by semicolons but keep the statements
$statements = array_filter(
    array_map('trim', preg_split('/;[\r\n]+/', $sql)),
    function($s) { return !empty(trim($s)); }
);

echo "Running " . count($statements) . " SQL statements...\n";
echo "─────────────────────────────────────────────────\n\n";

$success = 0;
$errors = 0;

foreach ($statements as $i => $statement) {
    // Skip comments
    if (empty(trim($statement)) || strpos(trim($statement), '--') === 0) {
        continue;
    }

    // Extract table/operation name for display
    $display = '';
    if (preg_match('/CREATE TABLE.*?`?(\w+)`?/i', $statement, $m)) {
        $display = "CREATE TABLE {$m[1]}";
    } elseif (preg_match('/INSERT INTO.*?`?(\w+)`?/i', $statement, $m)) {
        $display = "INSERT INTO {$m[1]}";
    } elseif (preg_match('/ALTER TABLE.*?`?(\w+)`?/i', $statement, $m)) {
        $display = "ALTER TABLE {$m[1]}";
    } else {
        $display = substr(trim($statement), 0, 50) . '...';
    }

    try {
        $pdo->exec($statement);
        echo "[OK] $display\n";
        $success++;
    } catch (PDOException $e) {
        // Check if it's a "table already exists" or similar benign error
        if (strpos($e->getMessage(), 'already exists') !== false) {
            echo "[SKIP] $display (already exists)\n";
        } elseif (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "[SKIP] $display (data already inserted)\n";
        } else {
            echo "[ERROR] $display\n";
            echo "        " . $e->getMessage() . "\n";
            $errors++;
        }
    }
}

echo "\n─────────────────────────────────────────────────\n";
echo "Migration complete!\n";
echo "  Successful: $success\n";
echo "  Errors: $errors\n\n";

// Verify tables exist
echo "Verifying tables...\n";
$tables = ['blog_posts', 'blog_categories', 'blog_tags', 'blog_post_categories', 'blog_post_tags', 'blog_revisions', 'blog_faqs'];

foreach ($tables as $table) {
    try {
        $result = $pdo->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        echo "[OK] $table ($result rows)\n";
    } catch (PDOException $e) {
        echo "[ERROR] $table - table not found\n";
    }
}

echo "\n╔══════════════════════════════════════════════════╗\n";
echo "║   NEXT STEPS                                     ║\n";
echo "╠══════════════════════════════════════════════════╣\n";
echo "║ 1. Import existing posts:                        ║\n";
echo "║    Visit: /database/migrate-posts.php            ║\n";
echo "║                                                  ║\n";
echo "║ 2. Access blog admin:                            ║\n";
echo "║    Visit: /admin/blog/                           ║\n";
echo "║                                                  ║\n";
echo "║ 3. Create your first post:                       ║\n";
echo "║    Visit: /admin/blog/edit.php                   ║\n";
echo "╚══════════════════════════════════════════════════╝\n";

echo "</pre>\n";

// Add clickable links for browser
if (php_sapi_name() !== 'cli') {
    echo "<div style='margin: 2rem; font-family: sans-serif;'>";
    echo "<h3>Quick Links:</h3>";
    echo "<ul style='line-height: 2;'>";
    echo "<li><a href='/database/migrate-posts.php'>Import Existing Blog Posts</a></li>";
    echo "<li><a href='/admin/blog/'>Blog Admin Dashboard</a></li>";
    echo "<li><a href='/admin/blog/edit.php'>Create New Post</a></li>";
    echo "<li><a href='/blog/'>View Public Blog</a></li>";
    echo "</ul>";
    echo "</div>";
}
