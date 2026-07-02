<?php
/**
 * PUBLIC API — accept contact form submissions from the website.
 * Method: POST (application/x-www-form-urlencoded or JSON)
 * Fields: name, email, phone, service, message
 */
require_once __DIR__ . '/../config/database.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');   // tighten in production
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); echo json_encode(['error'=>'Method not allowed']); exit;
}

$input = $_POST;
if (empty($input)) {
    $raw = file_get_contents('php://input');
    $j = json_decode($raw, true);
    if (is_array($j)) $input = $j;
}

$name    = trim($input['name'] ?? '');
$email   = trim($input['email'] ?? '');
$phone   = trim($input['phone'] ?? '');
$service = trim($input['service'] ?? '');
$message = trim($input['message'] ?? '');

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['error' => 'Name and valid email required.']); exit;
}
if (mb_strlen($message) > 5000) { http_response_code(422); echo json_encode(['error'=>'Message too long.']); exit; }

try {
    $stmt = db()->prepare("INSERT INTO leads (name,email,phone,service,message,ip_address) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$name, $email, $phone, $service, $message, $_SERVER['REMOTE_ADDR'] ?? null]);
    echo json_encode(['success' => true, 'id' => db()->lastInsertId()]);
} catch (Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500); echo json_encode(['error' => 'Server error.']);
}