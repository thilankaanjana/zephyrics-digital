<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Leads';

// Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    if ($action === 'update_status' && $id) {
        $status = $_POST['status'] ?? 'new';
        if (!in_array($status, ['new','contacted','converted','archived'])) $status = 'new';
        db()->prepare("UPDATE leads SET status=? WHERE id=?")->execute([$status, $id]);
        flash_set('success', 'Lead status updated.');
    } elseif ($action === 'delete' && $id) {
        db()->prepare("DELETE FROM leads WHERE id=?")->execute([$id]);
        flash_set('success', 'Lead deleted.');
    }
    header('Location: leads.php'); exit;
}

$filter = $_GET['status'] ?? 'all';
$where = $filter !== 'all' ? "WHERE status = " . db()->quote($filter) : '';
$leads = db()->query("SELECT * FROM leads $where ORDER BY created_at DESC")->fetchAll();

include __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Leads</h1>
<p class="page-subtitle">Manage contact form submissions and inquiries.</p>

<div class="flex flex-wrap gap-2 mb-4">
  <?php foreach (['all'=>'All','new'=>'New','contacted'=>'Contacted','converted'=>'Converted','archived'=>'Archived'] as $k=>$v): ?>
    <a href="?status=<?= $k ?>" class="btn <?= $filter===$k ? 'btn-primary' : 'btn-outline' ?>"><?= $v ?></a>
  <?php endforeach; ?>
  <input type="search" placeholder="Search leads..." data-table-filter="#leads-table"
         class="form-input ml-auto" style="max-width:280px">
</div>

<div class="table-wrap">
<table class="data" id="leads-table">
  <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Message</th><th>Status</th><th>Date</th><th></th></tr></thead>
  <tbody>
  <?php if (!$leads): ?>
    <tr><td colspan="8" class="text-center text-muted py-8">No leads found.</td></tr>
  <?php endif; ?>
  <?php foreach ($leads as $l): ?>
    <tr>
      <td class="font-medium"><?= e($l['name']) ?></td>
      <td><a href="mailto:<?= e($l['email']) ?>" class="text-primary hover:underline"><?= e($l['email']) ?></a></td>
      <td class="text-muted"><?= e($l['phone'] ?: '—') ?></td>
      <td class="text-muted"><?= e($l['service'] ?: '—') ?></td>
      <td class="text-muted max-w-xs truncate" title="<?= e($l['message']) ?>"><?= e(mb_strimwidth($l['message'] ?? '', 0, 60, '…')) ?></td>
      <td>
        <form method="post" class="inline">
          <?= csrf_field() ?>
          <input type="hidden" name="action" value="update_status">
          <input type="hidden" name="id" value="<?= $l['id'] ?>">
          <select name="status" onchange="this.form.submit()" class="form-select" style="padding:.25rem .5rem;font-size:.75rem">
            <?php foreach (['new','contacted','converted','archived'] as $s): ?>
              <option value="<?= $s ?>" <?= $l['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </td>
      <td class="text-muted text-xs"><?= date('M j, Y', strtotime($l['created_at'])) ?></td>
      <td>
        <form method="post" data-confirm="Delete this lead permanently?">
          <?= csrf_field() ?>
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="id" value="<?= $l['id'] ?>">
          <button class="btn btn-danger" style="padding:.3rem .6rem;font-size:.7rem">Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>