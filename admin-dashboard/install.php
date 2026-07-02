<?php
/**
 * INSTALLER — run once after uploading files, then DELETE this file.
 * Creates the DB schema and a starter admin user.
 */
require_once __DIR__ . '/config/database.php';

$done = false; $error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = file_get_contents(__DIR__ . '/sql/schema.sql');
        // Strip the CREATE/USE DATABASE (already selected via config)
        $sql = preg_replace('/CREATE DATABASE.*?;/is', '', $sql);
        $sql = preg_replace('/USE\s+\w+\s*;/i', '', $sql);
        db()->exec($sql);

        $username = trim($_POST['username'] ?? 'admin');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        if (strlen($password) < 8) throw new Exception('Password must be at least 8 characters.');

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = db()->prepare(
            "INSERT INTO admin_users (username,email,password_hash,full_name,role)
             VALUES (?,?,?,?, 'admin')
             ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash), email = VALUES(email)"
        );
        $stmt->execute([$username, $email, $hash, $_POST['full_name'] ?? 'Admin']);
        $done = true;
    } catch (Throwable $e) { $error = $e->getMessage(); }
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Install — ZephyricsStudio Admin</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-950 text-white min-h-screen flex items-center justify-center p-6 font-sans">
<div class="max-w-md w-full bg-slate-900 border border-slate-800 rounded-2xl p-8">
  <h1 class="text-2xl font-bold mb-2">🚀 Installer</h1>
  <p class="text-slate-400 text-sm mb-6">Create the database tables and your admin account.</p>
  <?php if ($done): ?>
    <div class="bg-green-500/10 border border-green-500/30 text-green-400 p-4 rounded-lg mb-4">
      Installation complete! <b>Delete this <code>install.php</code> file immediately</b>, then <a href="login.php" class="underline">go to login</a>.
    </div>
  <?php else: ?>
    <?php if ($error): ?>
      <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-3 rounded-lg mb-4 text-sm"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" class="space-y-4">
      <div><label class="text-xs text-slate-400 uppercase">Full name</label>
        <input name="full_name" required class="w-full mt-1 bg-slate-800 border border-slate-700 rounded px-3 py-2"></div>
      <div><label class="text-xs text-slate-400 uppercase">Username</label>
        <input name="username" value="admin" required class="w-full mt-1 bg-slate-800 border border-slate-700 rounded px-3 py-2"></div>
      <div><label class="text-xs text-slate-400 uppercase">Email</label>
        <input name="email" type="email" required class="w-full mt-1 bg-slate-800 border border-slate-700 rounded px-3 py-2"></div>
      <div><label class="text-xs text-slate-400 uppercase">Password (min 8 chars)</label>
        <input name="password" type="password" required minlength="8" class="w-full mt-1 bg-slate-800 border border-slate-700 rounded px-3 py-2"></div>
      <button class="w-full bg-cyan-400 text-black font-semibold py-2.5 rounded-lg hover:bg-cyan-300">Install</button>
    </form>
  <?php endif; ?>
</div></body></html>