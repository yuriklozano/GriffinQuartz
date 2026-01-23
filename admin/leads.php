<?php
/**
 * Griffin Quartz - Lead Management Admin
 * View and manage leads with sidebar navigation
 */

require_once __DIR__ . '/includes/admin-auth.php';
require_admin_login();

// Database connection for leads
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

$page_title = 'Leads Manager';

// Additional styles for leads page
$extra_head = '
<style>
    .badge-quote { background: #e3f2fd; color: #1976d2; }
    .badge-contact { background: #e8f5e9; color: #388e3c; }
    .badge-newsletter { background: #fff3e0; color: #f57c00; }
    .badge-service_quote { background: #f3e5f5; color: #7b1fa2; }
    .badge-product_quote { background: #fce4ec; color: #c2185b; }
    .badge-samples_request { background: #e0f7fa; color: #0097a7; }
    .message-preview { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
</style>';

include __DIR__ . '/includes/admin-header.php';
?>

<div class="page-title-row">
    <h1>Leads Manager</h1>
</div>

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
    <button type="submit" class="btn btn-primary">Filter</button>
    <?php if ($formType || $search): ?>
        <a href="leads.php" class="btn btn-secondary">Clear</a>
    <?php endif; ?>
</form>

<p style="color: #666; font-size: 0.875rem; margin-bottom: 1rem;">Showing <?= count($leads) ?> lead(s)</p>

<div class="card">
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

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
