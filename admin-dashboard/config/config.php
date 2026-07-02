<?php
/**
 * ZephyricsStudio Admin — Global Configuration
 * Edit the DB credentials to match your hosting environment.
 */

// ---- Database ----
define('DB_HOST', 'localhost');
define('DB_NAME', 'zephyrics_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// ---- Site ----
define('SITE_NAME', 'ZephyricsStudio');
define('ADMIN_URL', '/admin-dashboard');   // adjust if installed elsewhere
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('UPLOAD_URL', ADMIN_URL . '/uploads/');

// ---- Security ----
define('SESSION_TIMEOUT', 3600);           // 1 hour idle logout
define('CSRF_TOKEN_NAME', 'zs_csrf');

// ---- Errors (turn off in production) ----
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('UTC');

// Start session with hardened settings
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        'secure'   => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
    ]);
    session_start();
}