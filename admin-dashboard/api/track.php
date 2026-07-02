<?php
/** PUBLIC API — record a page visit (call from your site's JS or PHP). */
require_once __DIR__ . '/../config/database.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;

$raw = file_get_contents('php://input');
$data = json_decode($raw, true) ?: $_POST;
$page = trim($data['page'] ?? $_SERVER['HTTP_REFERER'] ?? '/');
$ref  = trim($data['referrer'] ?? '');

try {
    $stmt = db()->prepare("INSERT INTO page_visits (page_url,referrer,user_agent,ip_address) VALUES (?,?,?,?)");
    $stmt->execute([
        mb_substr($page, 0, 300),
        mb_substr($ref, 0, 300),
        mb_substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 300),
        $_SERVER['REMOTE_ADDR'] ?? null,
    ]);
    echo json_encode(['ok' => true]);
} catch (Throwable $e) {
    http_response_code(500); echo json_encode(['ok' => false]);
}