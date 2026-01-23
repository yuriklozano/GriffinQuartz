<?php
/**
 * Griffin Quartz - Categories API
 * CRUD operations for blog categories
 */

session_start();
header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
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
    return $text ?: 'category';
}

$method = $_SERVER['REQUEST_METHOD'];

// GET - List all categories
if ($method === 'GET') {
    $categories = $pdo->query("
        SELECT c.*, COUNT(pc.post_id) as post_count
        FROM blog_categories c
        LEFT JOIN blog_post_categories pc ON c.id = pc.category_id
        GROUP BY c.id
        ORDER BY c.sort_order, c.name
    ")->fetchAll();

    echo json_encode(['success' => true, 'categories' => $categories]);
    exit();
}

// Verify CSRF for mutations
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit();
}

$action = $_POST['action'] ?? '';

// CREATE
if ($action === 'create') {
    $name = sanitize($_POST['name'] ?? '');
    $description = sanitize($_POST['description'] ?? '');
    $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

    if (empty($name)) {
        echo json_encode(['success' => false, 'message' => 'Name is required']);
        exit();
    }

    $slug = slugify($name);

    // Ensure unique slug
    $base_slug = $slug;
    $counter = 1;
    while (true) {
        $stmt = $pdo->prepare("SELECT id FROM blog_categories WHERE slug = ?");
        $stmt->execute([$slug]);
        if (!$stmt->fetch()) break;
        $slug = $base_slug . '-' . $counter++;
    }

    $stmt = $pdo->prepare("INSERT INTO blog_categories (name, slug, description, parent_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $slug, $description, $parent_id]);

    echo json_encode([
        'success' => true,
        'message' => 'Category created',
        'category_id' => $pdo->lastInsertId()
    ]);
    exit();
}

// UPDATE
if ($action === 'update') {
    $id = (int)($_POST['id'] ?? 0);
    $name = sanitize($_POST['name'] ?? '');
    $description = sanitize($_POST['description'] ?? '');
    $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

    if (!$id || empty($name)) {
        echo json_encode(['success' => false, 'message' => 'ID and name are required']);
        exit();
    }

    // Prevent setting itself as parent
    if ($parent_id === $id) {
        echo json_encode(['success' => false, 'message' => 'Category cannot be its own parent']);
        exit();
    }

    $slug = slugify($name);

    // Ensure unique slug
    $base_slug = $slug;
    $counter = 1;
    while (true) {
        $stmt = $pdo->prepare("SELECT id FROM blog_categories WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if (!$stmt->fetch()) break;
        $slug = $base_slug . '-' . $counter++;
    }

    $stmt = $pdo->prepare("UPDATE blog_categories SET name = ?, slug = ?, description = ?, parent_id = ? WHERE id = ?");
    $stmt->execute([$name, $slug, $description, $parent_id, $id]);

    echo json_encode(['success' => true, 'message' => 'Category updated']);
    exit();
}

// DELETE
if ($action === 'delete') {
    $id = (int)($_POST['id'] ?? 0);

    if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID is required']);
        exit();
    }

    // Check for child categories
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM blog_categories WHERE parent_id = ?");
    $stmt->execute([$id]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['success' => false, 'message' => 'Cannot delete category with children']);
        exit();
    }

    $stmt = $pdo->prepare("DELETE FROM blog_categories WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['success' => true, 'message' => 'Category deleted']);
    exit();
}

// REORDER
if ($action === 'reorder') {
    $order = json_decode($_POST['order'] ?? '[]', true);

    if (!is_array($order)) {
        echo json_encode(['success' => false, 'message' => 'Invalid order data']);
        exit();
    }

    $stmt = $pdo->prepare("UPDATE blog_categories SET sort_order = ? WHERE id = ?");
    foreach ($order as $index => $id) {
        $stmt->execute([$index, (int)$id]);
    }

    echo json_encode(['success' => true, 'message' => 'Order updated']);
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid action']);
