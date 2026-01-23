<?php
/**
 * Griffin Quartz - Image Upload API
 * Handles featured images and TinyMCE content images
 */

session_start();
header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Configuration
$max_size = 5 * 1024 * 1024; // 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

// Determine upload type and directory
$upload_type = $_POST['type'] ?? 'content';
$base_dir = dirname(__DIR__, 2) . '/uploads/blog/';
$upload_dir = $upload_type === 'featured' ? $base_dir . 'featured/' : $base_dir . 'content/';
$web_path = '/uploads/blog/' . ($upload_type === 'featured' ? 'featured/' : 'content/');

// Create directories if they don't exist
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Get the uploaded file
$file = $_FILES['image'] ?? $_FILES['file'] ?? null;

if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
    $error_messages = [
        UPLOAD_ERR_INI_SIZE => 'File exceeds server limit',
        UPLOAD_ERR_FORM_SIZE => 'File exceeds form limit',
        UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file',
    ];
    $message = $error_messages[$file['error'] ?? UPLOAD_ERR_NO_FILE] ?? 'Upload error';
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $message]);
    exit();
}

// Validate file size
if ($file['size'] > $max_size) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'File too large. Maximum size is 5MB.']);
    exit();
}

// Validate MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

if (!in_array($mime_type, $allowed_types)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Allowed: JPG, PNG, GIF, WebP']);
    exit();
}

// Validate extension
$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if (!in_array($extension, $allowed_extensions)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid file extension']);
    exit();
}

// Generate unique filename
$filename = uniqid('img_', true) . '.' . $extension;
$filepath = $upload_dir . $filename;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $filepath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save file']);
    exit();
}

// Set proper permissions
chmod($filepath, 0644);

// Return success with file location
// TinyMCE expects 'location' key
echo json_encode([
    'success' => true,
    'location' => $web_path . $filename,
    'url' => $web_path . $filename,
    'filename' => $filename
]);
