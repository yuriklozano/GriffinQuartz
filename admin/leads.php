<?php
/**
 * Griffin Quartz - Lead Management Admin
 * Simple password-protected page to view leads
 */

session_start();

// CHANGE THIS PASSWORD!
define('ADMIN_PASSWORD', 'GriffinQuartz2026!');

// Handle login
if (isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = 'Incorrect password';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: leads.php');
    exit();
}

// Check if logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Show login form
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login | Griffin Quartz</title>
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
            .login-box { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
            h1 { font-size: 1.5rem; margin-bottom: 1.5rem; color: #333; }
            input[type="password"] { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; margin-bottom: 1rem; }
            button { width: 100%; padding: 0.75rem; background: #FDB913; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; }
            button:hover { background: #E0A510; }
            .error { color: #dc3545; margin-bottom: 1rem; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h1>Griffin Quartz Admin</h1>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Enter password" required autofocus>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit();
}

// Database connection
require_once '../api/config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed. Please check your config.");
}

// Get filter parameters
$formType = isset($_GET['type']) ? $_GET['type'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Build query
$sql = "SELECT * FROM leads WHERE 1=1";
$params = [];

if ($formType) {
    $sql .= " AND form_type = :form_type";
    $params[':form_type'] = $formType;
}

if ($search) {
    $sql .= " AND (name LIKE :search OR email LIKE :search2 OR phone LIKE :search3 OR message LIKE :search4)";
    $params[':search'] = "%$search%";
    $params[':search2'] = "%$search%";
    $params[':search3'] = "%$search%";
    $params[':search4'] = "%$search%";
}

$sql .= " ORDER BY created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$leads = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get form types for filter
$types = $pdo->query("SELECT DISTINCT form_type FROM leads ORDER BY form_type")->fetchAll(PDO::FETCH_COLUMN);

// Count stats
$totalLeads = $pdo->query("SELECT COUNT(*) FROM leads")->fetchColumn();
$todayLeads = $pdo->query("SELECT COUNT(*) FROM leads WHERE DATE(created_at) = CURDATE()")->fetchColumn();
$weekLeads = $pdo->query("SELECT COUNT(*) FROM leads WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads Dashboard | Griffin Quartz</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; color: #333; }
        .header { background: #000; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 1.25rem; }
        .header a { color: #FDB913; text-decoration: none; }
        .container { max-width: 1400px; margin: 0 auto; padding: 2rem; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
        .stat-card { background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .stat-card h3 { font-size: 0.875rem; color: #666; margin-bottom: 0.5rem; text-transform: uppercase; }
        .stat-card .number { font-size: 2rem; font-weight: 700; color: #000; }
        .filters { background: white; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; }
        .filters select, .filters input { padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; font-size: 0.875rem; }
        .filters input { flex: 1; min-width: 200px; }
        .filters button { padding: 0.5rem 1rem; background: #FDB913; border: none; border-radius: 4px; cursor: pointer; font-weight: 600; }
        .table-wrapper { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #fafafa; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: #666; }
        tr:hover { background: #fafafa; }
        .badge { display: inline-block; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600; }
        .badge-quote { background: #e3f2fd; color: #1976d2; }
        .badge-contact { background: #e8f5e9; color: #388e3c; }
        .badge-newsletter { background: #fff3e0; color: #f57c00; }
        .badge-service_quote { background: #f3e5f5; color: #7b1fa2; }
        .badge-product_quote { background: #fce4ec; color: #c2185b; }
        .badge-samples_request { background: #e0f7fa; color: #0097a7; }
        .message-preview { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .empty { text-align: center; padding: 3rem; color: #666; }
        .page-info { color: #666; font-size: 0.875rem; }
        @media (max-width: 768px) {
            .container { padding: 1rem; }
            table { font-size: 0.875rem; }
            th, td { padding: 0.5rem; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Griffin Quartz Leads</h1>
        <a href="?logout=1">Logout</a>
    </div>

    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <h3>Total Leads</h3>
                <div class="number"><?= $totalLeads ?></div>
            </div>
            <div class="stat-card">
                <h3>Today</h3>
                <div class="number"><?= $todayLeads ?></div>
            </div>
            <div class="stat-card">
                <h3>This Week</h3>
                <div class="number"><?= $weekLeads ?></div>
            </div>
        </div>

        <form class="filters" method="GET">
            <select name="type">
                <option value="">All Types</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?= htmlspecialchars($type) ?>" <?= $formType === $type ? 'selected' : '' ?>>
                        <?= ucfirst(str_replace('_', ' ', $type)) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="search" placeholder="Search name, email, phone..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Filter</button>
            <?php if ($formType || $search): ?>
                <a href="leads.php" style="color: #666; text-decoration: none;">Clear</a>
            <?php endif; ?>
        </form>

        <p class="page-info" style="margin-bottom: 1rem;">Showing <?= count($leads) ?> lead(s)</p>

        <div class="table-wrapper">
            <?php if (empty($leads)): ?>
                <div class="empty">No leads found</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leads as $lead): ?>
                            <tr>
                                <td><?= date('M j, g:ia', strtotime($lead['created_at'])) ?></td>
                                <td><span class="badge badge-<?= $lead['form_type'] ?>"><?= ucfirst(str_replace('_', ' ', $lead['form_type'])) ?></span></td>
                                <td><?= htmlspecialchars($lead['name'] ?: '-') ?></td>
                                <td><a href="mailto:<?= htmlspecialchars($lead['email']) ?>"><?= htmlspecialchars($lead['email']) ?></a></td>
                                <td><a href="tel:<?= htmlspecialchars($lead['phone']) ?>"><?= htmlspecialchars($lead['phone'] ?: '-') ?></a></td>
                                <td class="message-preview" title="<?= htmlspecialchars($lead['message']) ?>"><?= htmlspecialchars($lead['message'] ?: '-') ?></td>
                                <td style="font-size: 0.75rem; color: #666;"><?= htmlspecialchars($lead['page_title'] ?: '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
