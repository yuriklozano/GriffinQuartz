<?php
/**
 * Griffin Quartz - Admin Header
 * Shared header for all admin pages
 */

// Current page detection
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? e($page_title) . ' | ' : '' ?>Griffin Quartz Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; color: #333; }

        /* Admin Header */
        .admin-header { background: #000; color: white; padding: 0; }
        .admin-header-inner { max-width: 1400px; margin: 0 auto; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .admin-header h1 { font-size: 1.25rem; font-weight: 600; }
        .admin-header h1 a { color: white; text-decoration: none; }
        .admin-header-actions { display: flex; gap: 1.5rem; align-items: center; }
        .admin-header-actions a { color: #999; text-decoration: none; font-size: 0.875rem; transition: color 0.2s; }
        .admin-header-actions a:hover { color: #FDB913; }
        .admin-header-actions a.active { color: #FDB913; }

        /* Admin Navigation */
        .admin-nav { background: #1a1a1a; border-bottom: 1px solid #333; }
        .admin-nav-inner { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display: flex; gap: 0; }
        .admin-nav a { color: #999; text-decoration: none; padding: 0.75rem 1rem; font-size: 0.875rem; border-bottom: 2px solid transparent; transition: all 0.2s; }
        .admin-nav a:hover { color: white; background: rgba(255,255,255,0.05); }
        .admin-nav a.active { color: #FDB913; border-bottom-color: #FDB913; }

        /* Container */
        .admin-container { max-width: 1400px; margin: 0 auto; padding: 2rem; }

        /* Stats Cards */
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
        .stat-card { background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .stat-card h3 { font-size: 0.75rem; color: #666; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card .number { font-size: 2rem; font-weight: 700; color: #000; }
        .stat-card .number.accent { color: #FDB913; }

        /* Card */
        .card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .card-header { padding: 1rem 1.5rem; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .card-header h2 { font-size: 1rem; font-weight: 600; }
        .card-body { padding: 1.5rem; }

        /* Filters */
        .filters { background: white; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .filters select, .filters input[type="text"], .filters input[type="search"] {
            padding: 0.5rem 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 0.875rem;
        }
        .filters input[type="text"], .filters input[type="search"] { flex: 1; min-width: 200px; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border: none; border-radius: 4px; font-size: 0.875rem; font-weight: 600; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-primary { background: #FDB913; color: #000; }
        .btn-primary:hover { background: #E0A510; }
        .btn-secondary { background: #eee; color: #333; }
        .btn-secondary:hover { background: #ddd; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #c82333; }
        .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.75rem; }
        .btn-icon { padding: 0.5rem; }

        /* Table */
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #fafafa; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: #666; white-space: nowrap; }
        tr:hover { background: #fafafa; }
        td { vertical-align: middle; }

        /* Badges */
        .badge { display: inline-block; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600; }
        .badge-draft { background: #ffeeba; color: #856404; }
        .badge-scheduled { background: #b8daff; color: #004085; }
        .badge-published { background: #c3e6cb; color: #155724; }

        /* Forms */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.875rem; }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="url"],
        .form-group input[type="datetime-local"],
        .form-group select,
        .form-group textarea {
            width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; font-family: inherit;
        }
        .form-group textarea { min-height: 100px; resize: vertical; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none; border-color: #FDB913; box-shadow: 0 0 0 3px rgba(253, 185, 19, 0.1);
        }
        .form-group small { display: block; margin-top: 0.25rem; color: #666; font-size: 0.75rem; }

        /* Checkbox/Radio Group */
        .checkbox-group { display: flex; flex-wrap: wrap; gap: 0.75rem; }
        .checkbox-group label { display: flex; align-items: center; gap: 0.5rem; font-weight: normal; cursor: pointer; }
        .checkbox-group input { width: auto; }

        /* Action buttons in table */
        .actions { display: flex; gap: 0.5rem; }

        /* Empty state */
        .empty { text-align: center; padding: 3rem; color: #666; }

        /* Page title row */
        .page-title-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .page-title-row h1 { font-size: 1.5rem; color: #000; }

        /* Alerts */
        .alert { padding: 1rem; border-radius: 4px; margin-bottom: 1rem; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }

        /* Two-column layout */
        .two-col { display: grid; grid-template-columns: 1fr 350px; gap: 2rem; }
        .two-col-main { min-width: 0; }
        .two-col-sidebar { display: flex; flex-direction: column; gap: 1rem; }

        /* Responsive */
        @media (max-width: 1024px) {
            .two-col { grid-template-columns: 1fr; }
            .two-col-sidebar { order: -1; }
        }
        @media (max-width: 768px) {
            .admin-container { padding: 1rem; }
            .admin-header-inner { padding: 1rem; }
            .admin-nav-inner { padding: 0 1rem; overflow-x: auto; }
            table { font-size: 0.875rem; }
            th, td { padding: 0.75rem 0.5rem; }
            .page-title-row { flex-direction: column; gap: 1rem; align-items: flex-start; }
        }
    </style>
    <?php if (isset($extra_head)) echo $extra_head; ?>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-inner">
            <h1><a href="/admin/leads.php">Griffin Quartz Admin</a></h1>
            <div class="admin-header-actions">
                <a href="/" target="_blank">View Site</a>
                <a href="/admin/leads.php?logout=1">Logout</a>
            </div>
        </div>
    </header>

    <nav class="admin-nav">
        <div class="admin-nav-inner">
            <a href="/admin/leads.php" <?= $current_page === 'leads' ? 'class="active"' : '' ?>>Leads</a>
            <a href="/admin/blog/" <?= $current_dir === 'blog' && $current_page === 'index' ? 'class="active"' : '' ?>>Blog Posts</a>
            <a href="/admin/blog/edit.php" <?= $current_page === 'edit' ? 'class="active"' : '' ?>>New Post</a>
            <a href="/admin/blog/categories.php" <?= $current_page === 'categories' ? 'class="active"' : '' ?>>Categories</a>
        </div>
    </nav>

    <main class="admin-container">
