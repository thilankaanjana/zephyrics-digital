<?php
require_once __DIR__ . '/includes/auth.php';
if (is_logged_in()) { header('Location: index.php'); exit; }

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    if (login_user($_POST['username'] ?? '', $_POST['password'] ?? '')) {
        header('Location: index.php'); exit;
    }
    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login — <?= SITE_NAME ?> Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="<?= ADMIN_URL ?>/assets/css/admin.css">
</head>
<body style="font-family:Inter,sans-serif" class="min-h-screen flex items-center justify-center p-6">
<div class="w-full max-w-md">
  <div class="text-center mb-8">
    <h1 style="font-family:'Space Grotesk',sans-serif" class="text-3xl font-bold">
      <span style="color:#00d4ff">Zephyrics</span>Studio
    </h1>
    <p style="color:#8b98a7" class="text-sm mt-2">Admin Dashboard</p>
  </div>
  <div class="card">
    <h2 class="text-xl font-semibold mb-1">Welcome back</h2>
    <p style="color:#8b98a7" class="text-sm mb-6">Sign in to manage your website.</p>
    <?php if ($error): ?>
      <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post" class="space-y-4">
      <?= csrf_field() ?>
      <div><label class="form-label">Username or Email</label>
        <input name="username" class="form-input" required autofocus></div>
      <div><label class="form-label">Password</label>
        <input name="password" type="password" class="form-input" required></div>
      <button class="btn btn-primary w-full justify-center">Sign In</button>
    </form>
  </div>
</div></body></html>