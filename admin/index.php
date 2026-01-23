<?php
/**
 * Griffin Quartz - Admin Dashboard
 * Main landing page with sidebar navigation
 */

require_once __DIR__ . '/includes/admin-auth.php';
require_admin_login();

// Get stats from leads database
try {
    require_once dirname(__DIR__) . '/api/config.php';
    $leads_pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $total_leads = $leads_pdo->query("SELECT COUNT(*) FROM leads")->fetchColumn();
    $today_leads = $leads_pdo->query("SELECT COUNT(*) FROM leads WHERE DATE(created_at) = CURDATE()")->fetchColumn();
    $week_leads = $leads_pdo->query("SELECT COUNT(*) FROM leads WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)")->fetchColumn();
} catch (PDOException $e) {
    $total_leads = $today_leads = $week_leads = 0;
}

// Get stats from blog database
try {
    $blog_pdo = new PDO(
        "mysql:host=" . DB_BLOG_HOST . ";dbname=" . DB_BLOG_NAME . ";charset=utf8mb4",
        DB_BLOG_USER,
        DB_BLOG_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $total_posts = $blog_pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
    $published_posts = $blog_pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'")->fetchColumn();
    $draft_posts = $blog_pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'draft'")->fetchColumn();
} catch (PDOException $e) {
    $total_posts = $published_posts = $draft_posts = 0;
}

$page_title = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Griffin Quartz Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; color: #333; }

        /* Layout */
        .admin-layout { display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #1a1a1a;
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #333;
        }
        .sidebar-header h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #FDB913;
        }
        .sidebar-header span {
            font-size: 0.75rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Sidebar Navigation */
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-section { margin-bottom: 1.5rem; }
        .sidebar-section-title {
            font-size: 0.7rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            margin-bottom: 0.25rem;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: #999;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .sidebar-nav a:hover {
            background: rgba(255,255,255,0.05);
            color: white;
        }
        .sidebar-nav a.active {
            background: rgba(253, 185, 19, 0.1);
            color: #FDB913;
            border-left-color: #FDB913;
        }
        .sidebar-nav a svg {
            width: 20px;
            height: 20px;
            opacity: 0.7;
        }
        .sidebar-nav a:hover svg,
        .sidebar-nav a.active svg {
            opacity: 1;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #333;
        }
        .sidebar-footer a {
            color: #666;
            text-decoration: none;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sidebar-footer a:hover { color: #999; }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 2rem;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .page-header h1 { font-size: 1.75rem; color: #000; }
        .page-header-actions { display: flex; gap: 0.75rem; }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        .stat-card h3 {
            font-size: 0.875rem;
            color: #666;
            font-weight: 500;
        }
        .stat-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stat-card-icon.leads { background: #e3f2fd; color: #1976d2; }
        .stat-card-icon.posts { background: #e8f5e9; color: #388e3c; }
        .stat-card-icon.drafts { background: #fff3e0; color: #f57c00; }
        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #000;
            line-height: 1;
        }
        .stat-card .label {
            font-size: 0.8rem;
            color: #999;
            margin-top: 0.5rem;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .action-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .action-card h2 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #000;
        }
        .action-card p {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .action-card .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1rem;
            background: #FDB913;
            color: #000;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: background 0.2s;
        }
        .action-card .btn:hover { background: #E0A510; }
        .action-card .btn-secondary {
            background: #eee;
            color: #333;
        }
        .action-card .btn-secondary:hover { background: #ddd; }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar { width: 220px; }
            .main-content { margin-left: 220px; }
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .admin-layout { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <span>Admin Panel</span>
                <h1>Griffin Quartz</h1>
            </div>

            <nav class="sidebar-nav">
                <div class="sidebar-section">
                    <div class="sidebar-section-title">Overview</div>
                    <a href="/admin/" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </div>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">CMS Tools</div>
                    <a href="/admin/leads.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Leads Manager
                    </a>
                    <a href="/admin/blog/">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Blog Manager
                    </a>
                </div>

                <div class="sidebar-section">
                    <div class="sidebar-section-title">Blog</div>
                    <a href="/admin/blog/edit.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        New Post
                    </a>
                    <a href="/admin/blog/categories.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <a href="/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Website
                </a>
                <a href="/admin/?logout=1" style="margin-top: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1>Dashboard</h1>
            </div>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3>Total Leads</h3>
                        <div class="stat-card-icon leads">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="number"><?= number_format($total_leads) ?></div>
                    <div class="label"><?= $today_leads ?> today &bull; <?= $week_leads ?> this week</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3>Published Posts</h3>
                        <div class="stat-card-icon posts">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="number"><?= number_format($published_posts) ?></div>
                    <div class="label"><?= $total_posts ?> total posts</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3>Draft Posts</h3>
                        <div class="stat-card-icon drafts">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                    <div class="number"><?= number_format($draft_posts) ?></div>
                    <div class="label">Waiting to publish</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="action-card">
                    <h2>Leads Manager</h2>
                    <p>View and manage incoming leads from your website forms and contact requests.</p>
                    <a href="/admin/leads.php" class="btn">View All Leads</a>
                </div>

                <div class="action-card">
                    <h2>Blog Manager</h2>
                    <p>Create, edit, and publish blog posts to drive traffic and engage customers.</p>
                    <a href="/admin/blog/" class="btn">Manage Posts</a>
                    <a href="/admin/blog/edit.php" class="btn btn-secondary" style="margin-left: 0.5rem;">New Post</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
