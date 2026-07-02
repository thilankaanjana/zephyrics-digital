<?php
require_once __DIR__ . '/auth.php';
require_login();
$user = current_user();
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($pageTitle ?? 'Dashboard') ?> — <?= SITE_NAME ?> Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: { extend: {
    fontFamily: { sans: ['Inter','sans-serif'], display: ['Space Grotesk','sans-serif'] },
    colors: {
      bg: '#0a0f14', surface: '#111820', card: '#151d27',
      border: '#1f2a37', muted: '#8b98a7', primary: '#00d4ff', 'primary-dark':'#00a8cc'
    }
  }}
}
</script>
<link rel="stylesheet" href="<?= ADMIN_URL ?>/assets/css/admin.css">
</head>
<body class="bg-bg text-white font-sans min-h-screen flex">

<!-- Sidebar -->
<aside class="w-64 bg-surface border-r border-border flex flex-col fixed h-screen">
  <div class="p-6 border-b border-border">
    <h1 class="font-display font-bold text-xl">
      <span class="text-primary">Zephyrics</span>Studio
    </h1>
    <p class="text-xs text-muted mt-1">Admin Panel</p>
  </div>
  <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
    <?php
    $links = [
      ['index.php',     'Dashboard',   '📊'],
      ['leads.php',     'Leads',       '📥'],
      ['portfolio.php', 'Portfolio',   '💼'],
      ['blog.php',      'Blog Posts',  '📝'],
      ['analytics.php', 'Analytics',   '📈'],
      ['settings.php',  'Settings',    '⚙️'],
    ];
    foreach ($links as [$file, $label, $icon]):
      $active = $current === $file;
    ?>
      <a href="<?= ADMIN_URL ?>/<?= $file ?>"
         class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition
                <?= $active ? 'bg-primary/10 text-primary border border-primary/30' : 'text-muted hover:bg-card hover:text-white' ?>">
        <span class="text-base"><?= $icon ?></span><?= $label ?>
      </a>
    <?php endforeach; ?>
  </nav>
  <div class="p-4 border-t border-border">
    <div class="text-xs text-muted mb-2">Logged in as</div>
    <div class="text-sm font-medium mb-3"><?= e($user['name']) ?></div>
    <a href="<?= ADMIN_URL ?>/logout.php"
       class="block text-center text-xs bg-card border border-border rounded-lg py-2 hover:border-primary hover:text-primary transition">
       Logout
    </a>
  </div>
</aside>

<!-- Main content -->
<main class="flex-1 ml-64 p-8">
  <?php if ($flash = flash_get()): ?>
    <div class="mb-6 p-4 rounded-lg border
                <?= $flash['type'] === 'success' ? 'bg-green-500/10 border-green-500/30 text-green-400' :
                    ($flash['type'] === 'error' ? 'bg-red-500/10 border-red-500/30 text-red-400' :
                    'bg-primary/10 border-primary/30 text-primary') ?>">
      <?= e($flash['msg']) ?>
    </div>
  <?php endif; ?>