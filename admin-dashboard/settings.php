<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Settings';
$user = current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $action = $_POST['action'] ?? '';
    if ($action === 'profile') {
        db()->prepare("UPDATE admin_users SET full_name=?, email=? WHERE id=?")
            ->execute([trim($_POST['full_name']), trim($_POST['email']), $user['id']]);
        $_SESSION['admin_name'] = trim($_POST['full_name']);
        flash_set('success', 'Profile updated.');
    } elseif ($action === 'password') {
        $stmt = db()->prepare("SELECT password_hash FROM admin_users WHERE id=?");
        $stmt->execute([$user['id']]);
        $row = $stmt->fetch();
        if (!password_verify($_POST['current_password'] ?? '', $row['password_hash'])) {
            flash_set('error', 'Current password is incorrect.');
        } elseif (strlen($_POST['new_password'] ?? '') < 8) {
            flash_set('error', 'New password must be at least 8 characters.');
        } else {
            $hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            db()->prepare("UPDATE admin_users SET password_hash=? WHERE id=?")->execute([$hash, $user['id']]);
            flash_set('success', 'Password changed successfully.');
        }
    }
    header('Location: settings.php'); exit;
}

$stmt = db()->prepare("SELECT * FROM admin_users WHERE id=?");
$stmt->execute([$user['id']]);
$me = $stmt->fetch();

include __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Settings</h1>
<p class="page-subtitle">Manage your account and preferences.</p>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <form method="post" class="card">
    <?= csrf_field() ?>
    <input type="hidden" name="action" value="profile">
    <h2 class="font-display text-lg font-semibold mb-5">Profile</h2>
    <div class="space-y-4">
      <div><label class="form-label">Username</label>
        <input value="<?= e($me['username']) ?>" disabled class="form-input opacity-60"></div>
      <div><label class="form-label">Full Name</label>
        <input name="full_name" value="<?= e($me['full_name']) ?>" class="form-input"></div>
      <div><label class="form-label">Email</label>
        <input name="email" type="email" value="<?= e($me['email']) ?>" class="form-input"></div>
    </div>
    <button class="btn btn-primary mt-6">Save Profile</button>
  </form>

  <form method="post" class="card">
    <?= csrf_field() ?>
    <input type="hidden" name="action" value="password">
    <h2 class="font-display text-lg font-semibold mb-5">Change Password</h2>
    <div class="space-y-4">
      <div><label class="form-label">Current Password</label>
        <input name="current_password" type="password" required class="form-input"></div>
      <div><label class="form-label">New Password (min 8)</label>
        <input name="new_password" type="password" required minlength="8" class="form-input"></div>
    </div>
    <button class="btn btn-primary mt-6">Update Password</button>
  </form>
</div>

<div class="card mt-6">
  <h2 class="font-display text-lg font-semibold mb-3">API Integration</h2>
  <p class="text-sm" style="color:#8b98a7">
    To connect your public website's contact form and blog to this admin, POST to
    <code class="text-primary">/admin-dashboard/api/leads.php</code> or fetch published content via
    <code class="text-primary">/admin-dashboard/api/portfolio.php</code> and
    <code class="text-primary">/admin-dashboard/api/blog.php</code>.
  </p>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>