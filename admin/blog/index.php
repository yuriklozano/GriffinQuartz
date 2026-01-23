<?php
/**
 * Griffin Quartz - Blog Dashboard
 * List, filter, and manage blog posts
 */

require_once dirname(__DIR__) . '/includes/admin-auth.php';
require_admin_login();

$pdo = get_db_connection();
$page_title = 'Blog Posts';

// Handle delete action
if (isset($_POST['delete_post']) && verify_csrf($_POST['csrf_token'] ?? '')) {
    $post_id = (int)$_POST['delete_post'];
    $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = ?");
    $stmt->execute([$post_id]);
    header('Location: /admin/blog/?deleted=1');
    exit();
}

// Get filter parameters
$status = $_GET['status'] ?? '';
$category = $_GET['category'] ?? '';
$search = $_GET['search'] ?? '';

// Build query
$sql = "SELECT p.*,
        GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') as categories
        FROM blog_posts p
        LEFT JOIN blog_post_categories pc ON p.id = pc.post_id
        LEFT JOIN blog_categories c ON pc.category_id = c.id
        WHERE 1=1";
$params = [];

if ($status) {
    $sql .= " AND p.status = :status";
    $params[':status'] = $status;
}

if ($category) {
    $sql .= " AND pc.category_id = :category";
    $params[':category'] = $category;
}

if ($search) {
    $sql .= " AND (p.title LIKE :search OR p.content LIKE :search2)";
    $params[':search'] = "%$search%";
    $params[':search2'] = "%$search%";
}

$sql .= " GROUP BY p.id ORDER BY p.created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$posts = $stmt->fetchAll();

// Get categories for filter
$categories = $pdo->query("SELECT id, name FROM blog_categories ORDER BY name")->fetchAll();

// Get stats
$stats = [
    'total' => $pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn(),
    'published' => $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'")->fetchColumn(),
    'draft' => $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'draft'")->fetchColumn(),
    'scheduled' => $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'scheduled'")->fetchColumn(),
];

include dirname(__DIR__) . '/includes/admin-header.php';
?>

<?php if (isset($_GET['deleted'])): ?>
    <div class="alert alert-success">Post deleted successfully.</div>
<?php endif; ?>

<?php if (isset($_GET['saved'])): ?>
    <div class="alert alert-success">Post saved successfully.</div>
<?php endif; ?>

<div class="page-title-row">
    <h1>Blog Posts</h1>
    <a href="/admin/blog/edit.php" class="btn btn-primary">+ New Post</a>
</div>

<div class="stats">
    <div class="stat-card">
        <h3>Total Posts</h3>
        <div class="number"><?= $stats['total'] ?></div>
    </div>
    <div class="stat-card">
        <h3>Published</h3>
        <div class="number"><?= $stats['published'] ?></div>
    </div>
    <div class="stat-card">
        <h3>Drafts</h3>
        <div class="number"><?= $stats['draft'] ?></div>
    </div>
    <div class="stat-card">
        <h3>Scheduled</h3>
        <div class="number accent"><?= $stats['scheduled'] ?></div>
    </div>
</div>

<form class="filters" method="GET">
    <select name="status">
        <option value="">All Statuses</option>
        <option value="draft" <?= $status === 'draft' ? 'selected' : '' ?>>Draft</option>
        <option value="scheduled" <?= $status === 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
        <option value="published" <?= $status === 'published' ? 'selected' : '' ?>>Published</option>
    </select>
    <select name="category">
        <option value="">All Categories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $category == $cat['id'] ? 'selected' : '' ?>><?= e($cat['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="search" name="search" placeholder="Search posts..." value="<?= e($search) ?>">
    <button type="submit" class="btn btn-primary">Filter</button>
    <?php if ($status || $category || $search): ?>
        <a href="/admin/blog/" class="btn btn-secondary">Clear</a>
    <?php endif; ?>
</form>

<div class="card">
    <div class="table-wrapper">
        <?php if (empty($posts)): ?>
            <div class="empty">
                <p>No posts found.</p>
                <p style="margin-top: 1rem;"><a href="/admin/blog/edit.php" class="btn btn-primary">Create your first post</a></p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th style="width: 40%;">Title</th>
                        <th>Status</th>
                        <th>Categories</th>
                        <th>Date</th>
                        <th>Views</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td>
                                <a href="/admin/blog/edit.php?id=<?= $post['id'] ?>" style="color: #000; text-decoration: none; font-weight: 500;">
                                    <?= e($post['title']) ?>
                                </a>
                                <?php if ($post['featured_image']): ?>
                                    <span style="color: #666; font-size: 0.75rem;" title="Has featured image">*</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge badge-<?= $post['status'] ?>">
                                    <?= ucfirst($post['status']) ?>
                                </span>
                                <?php if ($post['status'] === 'scheduled' && $post['publish_date']): ?>
                                    <br><small style="color: #666;"><?= format_date($post['publish_date'], 'M j, g:ia') ?></small>
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 0.875rem; color: #666;">
                                <?= e($post['categories'] ?: '-') ?>
                            </td>
                            <td style="font-size: 0.875rem; color: #666;">
                                <?= format_date($post['created_at'], 'M j, Y') ?>
                            </td>
                            <td style="font-size: 0.875rem; color: #666;">
                                <?= number_format($post['views']) ?>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="/admin/blog/edit.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <?php if ($post['status'] === 'published'): ?>
                                        <a href="/blog/<?= e($post['slug']) ?>" target="_blank" class="btn btn-sm btn-secondary" title="View">View</a>
                                    <?php endif; ?>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Delete this post?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" name="delete_post" value="<?= $post['id'] ?>" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php include dirname(__DIR__) . '/includes/admin-footer.php'; ?>
