<?php
/** PUBLIC API — GET published blog posts. ?slug=xyz for a single post. */
require_once __DIR__ . '/../config/database.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!empty($_GET['slug'])) {
    $stmt = db()->prepare("SELECT * FROM blog_posts WHERE slug=? AND status='published' LIMIT 1");
    $stmt->execute([$_GET['slug']]);
    $post = $stmt->fetch();
    if ($post) {
        db()->prepare("UPDATE blog_posts SET views=views+1 WHERE id=?")->execute([$post['id']]);
        echo json_encode($post);
    } else { http_response_code(404); echo json_encode(['error'=>'Not found']); }
    exit;
}

$sql = "SELECT id,title,slug,excerpt,cover_image,category,tags,published_at,views
        FROM blog_posts WHERE status='published' ORDER BY published_at DESC";
echo json_encode(db()->query($sql)->fetchAll());