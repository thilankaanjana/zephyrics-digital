<?php
/** PUBLIC API — GET published portfolio items */
require_once __DIR__ . '/../config/database.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$featuredOnly = !empty($_GET['featured']);
$sql = "SELECT id,title,slug,category,client_name,description,cover_image,project_url,tags,is_featured
        FROM portfolio WHERE status='published'"
     . ($featuredOnly ? " AND is_featured=1" : "")
     . " ORDER BY is_featured DESC, created_at DESC";
echo json_encode(db()->query($sql)->fetchAll());