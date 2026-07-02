<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Dashboard';

$stats = [
    'leads_total'   => db()->query("SELECT COUNT(*) FROM leads")->fetchColumn(),
    'leads_new'     => db()->query("SELECT COUNT(*) FROM leads WHERE status='new'")->fetchColumn(),
    'portfolio'     => db()->query("SELECT COUNT(*) FROM portfolio")->fetchColumn(),
    'posts'         => db()->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn(),
    'visits_30d'    => db()->query("SELECT COUNT(*) FROM page_visits WHERE visited_at >= NOW() - INTERVAL 30 DAY")->fetchColumn(),
    'visits_today'  => db()->query("SELECT COUNT(*) FROM page_visits WHERE DATE(visited_at)=CURDATE()")->fetchColumn(),
];
$recentLeads = db()->query("SELECT * FROM leads ORDER BY created_at DESC LIMIT 5")->fetchAll();

include __DIR__ . '/includes/header.php';
?>

<h1 class="page-title">Welcome back, <?= e($user['name']) ?> 👋</h1>
<p class="page-subtitle">Here's what's happening with your website today.</p>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
  <?php
  $cards = [
    ['New Leads',       $stats['leads_new'],    'Awaiting response',       '📥'],
    ['Total Leads',     $stats['leads_total'],  'All time',                 '👥'],
    ['Portfolio Items', $stats['portfolio'],    'Published projects',       '💼'],
    ['Blog Posts',      $stats['posts'],        'All statuses',             '📝'],
  ];
  foreach ($cards as [$l,$v,$s,$i]): ?>
    <div class="stat-card">
      <div class="flex justify-between items-start mb-3">
        <span class="text-xs text-muted uppercase tracking-wider"><?= $l ?></span>
        <span class="text-2xl"><?= $i ?></span>
      </div>
      <div class="text-3xl font-bold font-display"><?= (int)$v ?></div>
      <div class="text-xs text-muted mt-1"><?= $s ?></div>
    </div>
  <?php endforeach; ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-8">
  <div class="stat-card">
    <div class="text-xs text-muted uppercase tracking-wider mb-2">Visits Today</div>
    <div class="text-3xl font-bold font-display text-primary"><?= (int)$stats['visits_today'] ?></div>
  </div>
  <div class="stat-card">
    <div class="text-xs text-muted uppercase tracking-wider mb-2">Visits (30 days)</div>
    <div class="text-3xl font-bold font-display text-primary"><?= (int)$stats['visits_30d'] ?></div>
  </div>
  <div class="stat-card">
    <div class="text-xs text-muted uppercase tracking-wider mb-2">Conversion Rate</div>
    <div class="text-3xl font-bold font-display text-primary">
      <?= $stats['visits_30d'] > 0 ? number_format(($stats['leads_total']/$stats['visits_30d'])*100, 1) : '0' ?>%
    </div>
  </div>
</div>

<div class="card">
  <div class="flex justify-between items-center mb-4">
    <h2 class="font-display text-xl font-semibold">Recent Leads</h2>
    <a href="leads.php" class="text-primary text-sm hover:underline">View all →</a>
  </div>
  <?php if (!$recentLeads): ?>
    <p class="text-muted text-sm py-8 text-center">No leads yet.</p>
  <?php else: ?>
    <table class="data">
      <thead><tr><th>Name</th><th>Email</th><th>Service</th><th>Status</th><th>Date</th></tr></thead>
      <tbody>
      <?php foreach ($recentLeads as $l): ?>
        <tr>
          <td class="font-medium"><?= e($l['name']) ?></td>
          <td class="text-muted"><?= e($l['email']) ?></td>
          <td class="text-muted"><?= e($l['service'] ?: '—') ?></td>
          <td><span class="badge badge-<?= e($l['status']) ?>"><?= e($l['status']) ?></span></td>
          <td class="text-muted text-xs"><?= date('M j, Y', strtotime($l['created_at'])) ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>