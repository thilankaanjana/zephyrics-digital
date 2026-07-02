<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Authentication helpers — sessions, CSRF, guards.
 */

function is_logged_in(): bool {
    if (empty($_SESSION['admin_id'])) return false;
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT)) {
        logout_user();
        return false;
    }
    $_SESSION['last_activity'] = time();
    return true;
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: ' . ADMIN_URL . '/login.php');
        exit;
    }
}

function login_user(string $username, string $password): bool {
    $stmt = db()->prepare("SELECT * FROM admin_users WHERE username = ? OR email = ? LIMIT 1");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id']       = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        $_SESSION['admin_name']     = $user['full_name'];
        $_SESSION['admin_role']     = $user['role'];
        $_SESSION['last_activity']  = time();
        db()->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = ?")
            ->execute([$user['id']]);
        return true;
    }
    return false;
}

function logout_user(): void {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
}

function current_user(): ?array {
    if (!is_logged_in()) return null;
    return [
        'id'       => $_SESSION['admin_id'],
        'username' => $_SESSION['admin_username'],
        'name'     => $_SESSION['admin_name'] ?? 'Admin',
        'role'     => $_SESSION['admin_role'] ?? 'admin',
    ];
}

// ---- CSRF ----
function csrf_token(): string {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}
function csrf_field(): string {
    return '<input type="hidden" name="' . CSRF_TOKEN_NAME . '" value="' . csrf_token() . '">';
}
function verify_csrf(): void {
    $token = $_POST[CSRF_TOKEN_NAME] ?? '';
    if (!hash_equals(csrf_token(), $token)) {
        http_response_code(419);
        die('Invalid CSRF token.');
    }
}

// ---- Helpers ----
function e(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function slugify(string $s): string {
    $s = strtolower(trim($s));
    $s = preg_replace('/[^a-z0-9]+/', '-', $s);
    return trim($s, '-');
}
function flash_set(string $type, string $msg): void { $_SESSION['flash'] = ['type' => $type, 'msg' => $msg]; }
function flash_get(): ?array {
    if (empty($_SESSION['flash'])) return null;
    $f = $_SESSION['flash']; unset($_SESSION['flash']); return $f;
}