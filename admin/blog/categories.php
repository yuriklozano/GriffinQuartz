<?php
/**
 * Griffin Quartz - Category Manager
 * Manage blog categories with parent support
 */

require_once dirname(__DIR__) . '/includes/admin-auth.php';
require_admin_login();

$pdo = get_db_connection();
$page_title = 'Categories';

// Handle form submissions
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

        if ($name) {
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
            $message = 'Category created successfully.';
        }
    }

    if ($action === 'update') {
        $id = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

        if ($id && $name) {
            // Prevent self-parenting
            if ($parent_id === $id) {
                $error = 'Category cannot be its own parent.';
            } else {
                $slug = slugify($name);

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
                $message = 'Category updated successfully.';
            }
        }
    }

    if ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);

        if ($id) {
            // Check for child categories
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM blog_categories WHERE parent_id = ?");
            $stmt->execute([$id]);
            if ($stmt->fetchColumn() > 0) {
                $error = 'Cannot delete category with child categories.';
            } else {
                $stmt = $pdo->prepare("DELETE FROM blog_categories WHERE id = ?");
                $stmt->execute([$id]);
                $message = 'Category deleted.';
            }
        }
    }
}

// Get all categories with post counts
$categories = $pdo->query("
    SELECT c.*, p.name as parent_name, COUNT(pc.post_id) as post_count
    FROM blog_categories c
    LEFT JOIN blog_categories p ON c.parent_id = p.id
    LEFT JOIN blog_post_categories pc ON c.id = pc.category_id
    GROUP BY c.id
    ORDER BY c.sort_order, c.name
")->fetchAll();

// Build hierarchy for select
function getCategoryOptions($categories, $parent_id = null, $level = 0, $exclude_id = null) {
    $options = [];
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parent_id && $cat['id'] != $exclude_id) {
            $options[] = [
                'id' => $cat['id'],
                'name' => str_repeat('— ', $level) . $cat['name'],
                'level' => $level
            ];
            $options = array_merge($options, getCategoryOptions($categories, $cat['id'], $level + 1, $exclude_id));
        }
    }
    return $options;
}

$category_options = getCategoryOptions($categories);

// Editing category
$edit_category = null;
if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    foreach ($categories as $cat) {
        if ($cat['id'] === $edit_id) {
            $edit_category = $cat;
            break;
        }
    }
}

include dirname(__DIR__) . '/includes/admin-header.php';
?>

<div class="page-title-row">
    <h1>Categories</h1>
</div>

<?php if ($message): ?>
    <div class="alert alert-success"><?= e($message) ?></div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="alert alert-error"><?= e($error) ?></div>
<?php endif; ?>

<div class="two-col" style="grid-template-columns: 350px 1fr;">
    <!-- Add/Edit Form -->
    <div class="two-col-sidebar">
        <div class="card">
            <div class="card-header">
                <h2><?= $edit_category ? 'Edit Category' : 'Add Category' ?></h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="<?= $edit_category ? 'update' : 'create' ?>">
                    <?php if ($edit_category): ?>
                        <input type="hidden" name="id" value="<?= $edit_category['id'] ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= e($edit_category['name'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="3"><?= e($edit_category['description'] ?? '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select id="parent_id" name="parent_id">
                            <option value="">None (Top Level)</option>
                            <?php foreach (getCategoryOptions($categories, null, 0, $edit_category['id'] ?? null) as $opt): ?>
                                <option value="<?= $opt['id'] ?>" <?= ($edit_category['parent_id'] ?? '') == $opt['id'] ? 'selected' : '' ?>>
                                    <?= e($opt['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div style="display: flex; gap: 0.5rem;">
                        <button type="submit" class="btn btn-primary"><?= $edit_category ? 'Update' : 'Add' ?> Category</button>
                        <?php if ($edit_category): ?>
                            <a href="/admin/blog/categories.php" class="btn btn-secondary">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Categories List -->
    <div class="two-col-main">
        <div class="card">
            <div class="table-wrapper">
                <?php if (empty($categories)): ?>
                    <div class="empty">No categories yet. Create your first category.</div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Posts</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $cat): ?>
                                <tr>
                                    <td>
                                        <strong><?= e($cat['name']) ?></strong>
                                        <?php if ($cat['description']): ?>
                                            <br><small style="color: #666;"><?= e(substr($cat['description'], 0, 50)) ?><?= strlen($cat['description']) > 50 ? '...' : '' ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-family: monospace; font-size: 0.875rem; color: #666;">
                                        <?= e($cat['slug']) ?>
                                    </td>
                                    <td style="color: #666;">
                                        <?= e($cat['parent_name'] ?? '-') ?>
                                    </td>
                                    <td>
                                        <?= $cat['post_count'] ?>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="?edit=<?= $cat['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                            <form method="POST" style="display: inline;" onsubmit="return confirm('Delete this category?');">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
    </div>
</div>

<?php include dirname(__DIR__) . '/includes/admin-footer.php'; ?>
