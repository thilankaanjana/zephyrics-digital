<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Analytics';

$byDay = db()->query("
  SELECT DATE(visited_at) d, COUNT(*) c
  FROM page_visits
  WHERE visited_at >= NOW() - INTERVAL 30 DAY
  GROUP BY DATE(visited_at) ORDER BY d ASC
")->fetchAll();

$topPages = db()->query("
  SELECT page_url, COUNT(*) c FROM page_visits
  WHERE visited_at >= NOW() - INTERVAL 30 DAY
  GROUP BY page_url ORDER BY c DESC LIMIT 10
")->fetchAll();

$topRef = db()->query("
  SELECT COALESCE(NULLIF(referrer,''),'(direct)') r, COUNT(*) c FROM page_visits
  WHERE visited_at >= NOW() - INTERVAL 30 DAY
  GROUP BY r ORDER BY c DESC LIMIT 10
")->fetchAll();

$total   = db()->query("SELECT COUNT(*) FROM page_visits WHERE visited_at >= NOW() - INTERVAL 30 DAY")->fetchColumn();
$unique  = db()->query("SELECT COUNT(DISTINCT ip_address) FROM page_visits WHERE visited_at >= NOW() - INTERVAL 30 DAY")->fetchColumn();
$leads30 = db()->query("SELECT COUNT(*) FROM leads WHERE created_at >= NOW() - INTERVAL 30 DAY")->fetchColumn();

$labels = array_map(fn($r) => date('M j', strtotime($r['d'])), $byDay);
$values = array_map(fn($r) => (int)$r['c'], $byDay);

include __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Analytics</h1>
<p class="page-subtitle">Website traffic overview — last 30 days.</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
  <div class="stat-card"><div class="text-xs uppercase" style="color:#8b98a7">Total Visits</div>
    <div class="text-3xl font-bold font-display mt-2 text-primary"><?= (int)$total ?></div></div>
  <div class="stat-card"><div class="text-xs uppercase" style="color:#8b98a7">Unique Visitors</div>
    <div class="text-3xl font-bold font-display mt-2 text-primary"><?= (int)$unique ?></div></div>
  <div class="stat-card"><div class="text-xs uppercase" style="color:#8b98a7">Leads Generated</div>
    <div class="text-3xl font-bold font-display mt-2 text-primary"><?= (int)$leads30 ?></div></div>
</div>

<div class="card mb-6">
  <h2 class="font-display text-lg font-semibold mb-4">Visits Over Time</h2>
  <canvas id="visitsChart" height="90"></canvas>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
  <div class="card">
    <h2 class="font-display text-lg font-semibold mb-4">Top Pages</h2>
    <?php foreach ($topPages as $r): ?>
      <div class="flex justify-between py-2 border-b border-slate-800/50 text-sm">
        <span class="truncate"><?= e($r['page_url']) ?></span>
        <span class="text-primary font-medium"><?= (int)$r['c'] ?></span>
      </div>
    <?php endforeach; ?>
    <?php if (!$topPages): ?><p class="text-muted text-sm py-4">No data yet.</p><?php endif; ?>
  </div>
  <div class="card">
    <h2 class="font-display text-lg font-semibold mb-4">Top Referrers</h2>
    <?php foreach ($topRef as $r): ?>
      <div class="flex justify-between py-2 border-b border-slate-800/50 text-sm">
        <span class="truncate"><?= e($r['r']) ?></span>
        <span class="text-primary font-medium"><?= (int)$r['c'] ?></span>
      </div>
    <?php endforeach; ?>
    <?php if (!$topRef): ?><p class="text-muted text-sm py-4">No data yet.</p><?php endif; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('visitsChart'), {
  type: 'line',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [{
      label: 'Visits',
      data: <?= json_encode($values) ?>,
      borderColor: '#00d4ff',
      backgroundColor: 'rgba(0,212,255,0.1)',
      tension: 0.3, fill: true, borderWidth: 2, pointRadius: 3
    }]
  },
  options: {
    plugins: { legend: { labels: { color: '#8b98a7' } } },
    scales: {
      x: { ticks: { color: '#8b98a7' }, grid: { color: 'rgba(255,255,255,0.05)' } },
      y: { ticks: { color: '#8b98a7' }, grid: { color: 'rgba(255,255,255,0.05)' }, beginAtZero: true }
    }
  }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>