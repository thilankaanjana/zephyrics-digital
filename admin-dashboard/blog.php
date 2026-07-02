<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Blog Posts';

function handle_upload_blog(string $field): ?string {
    if (empty($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return null;
    if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);
    $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg','jpeg','png','webp','gif'])) return null;
    $name = uniqid('post_', true) . '.' . $ext;
    if (move_uploaded_file($_FILES[$field]['tmp_name'], UPLOAD_DIR . $name)) return UPLOAD_URL . $name;
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);

    if ($action === 'save') {
        $status = in_array($_POST['status'] ?? '', ['published','draft']) ? $_POST['status'] : 'draft';
        $data = [
            'title'            => trim($_POST['title']),
            'slug'             => slugify($_POST['slug'] ?: $_POST['title']),
            'excerpt'          => trim($_POST['excerpt']),
            'content'          => $_POST['content'] ?? '',
            'category'         => trim($_POST['category']),
            'tags'             => trim($_POST['tags']),
            'meta_title'       => trim($_POST['meta_title']),
            'meta_description' => trim($_POST['meta_description']),
            'status'           => $status,
            'author_id'        => current_user()['id'],
            'published_at'     => $status === 'published' ? date('Y-m-d H:i:s') : null,
        ];
        $cover = handle_upload_blog('cover_image') ?: ($_POST['existing_cover'] ?? null);
        $data['cover_image'] = $cover;

        if ($id) {
            $sql = "UPDATE blog_posts SET title=:title,slug=:slug,excerpt=:excerpt,content=:content,
                    cover_image=:cover_image,category=:category,tags=:tags,meta_title=:meta_title,
                    meta_description=:meta_description,status=:status,published_at=COALESCE(published_at,:published_at)
                    WHERE id=:id";
            $data['id'] = $id;
            db()->prepare($sql)->execute($data);
            flash_set('success','Post updated.');
        } else {
            $sql = "INSERT INTO blog_posts (title,slug,excerpt,content,cover_image,category,tags,author_id,status,meta_title,meta_description,published_at)
                    VALUES (:title,:slug,:excerpt,:content,:cover_image,:category,:tags,:author_id,:status,:meta_title,:meta_description,:published_at)";
            db()->prepare($sql)->execute($data);
            flash_set('success','Post created.');
        }
    } elseif ($action === 'delete' && $id) {
        db()->prepare("DELETE FROM blog_posts WHERE id=?")->execute([$id]);
        flash_set('success','Post deleted.');
    }
    header('Location: blog.php'); exit;
}

$editing = null;
if (!empty($_GET['edit'])) {
    $stmt = db()->prepare("SELECT * FROM blog_posts WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}
$posts = db()->query("SELECT p.*, u.username FROM blog_posts p LEFT JOIN admin_users u ON p.author_id=u.id ORDER BY p.created_at DESC")->fetchAll();

include __DIR__ . '/includes/header.php';
?>
<div class="flex justify-between items-start mb-6">
  <div><h1 class="page-title">Blog Posts</h1>
    <p style="color:#8b98a7" class="text-sm">Write and manage articles.</p></div>
  <?php if (!$editing && !isset($_GET['new'])): ?>
    <a href="?new=1" class="btn btn-primary">+ New Post</a>
  <?php endif; ?>
</div>

<?php if ($editing || isset($_GET['new'])): $p = $editing ?: []; ?>
  <form method="post" enctype="multipart/form-data" class="card mb-8">
    <?= csrf_field() ?>
    <input type="hidden" name="action" value="save">
    <input type="hidden" name="id" value="<?= (int)($p['id'] ?? 0) ?>">
    <input type="hidden" name="existing_cover" value="<?= e($p['cover_image'] ?? '') ?>">
    <h2 class="font-display text-xl font-semibold mb-6"><?= $editing ? 'Edit Post' : 'New Post' ?></h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <div class="md:col-span-2"><label class="form-label">Title</label>
        <input name="title" id="bp-title" data-slug-source="#bp-slug" value="<?= e($p['title'] ?? '') ?>" required class="form-input"></div>
      <div><label class="form-label">Slug</label>
        <input name="slug" id="bp-slug" value="<?= e($p['slug'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Category</label>
        <input name="category" value="<?= e($p['category'] ?? '') ?>" class="form-input"></div>
      <div class="md:col-span-2"><label class="form-label">Excerpt</label>
        <textarea name="excerpt" rows="2" class="form-textarea"><?= e($p['excerpt'] ?? '') ?></textarea></div>
      <div class="md:col-span-2"><label class="form-label">Content (HTML supported)</label>
        <textarea name="content" rows="14" class="form-textarea font-mono" style="font-size:.85rem"><?= e($p['content'] ?? '') ?></textarea></div>
      <div><label class="form-label">Cover Image</label>
        <input type="file" name="cover_image" accept="image/*" class="form-input">
        <?php if (!empty($p['cover_image'])): ?><img src="<?= e($p['cover_image']) ?>" class="mt-2 h-20 rounded"><?php endif; ?>
      </div>
      <div><label class="form-label">Tags (comma separated)</label>
        <input name="tags" value="<?= e($p['tags'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Meta Title (SEO)</label>
        <input name="meta_title" value="<?= e($p['meta_title'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Meta Description (SEO)</label>
        <input name="meta_description" value="<?= e($p['meta_description'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Status</label>
        <select name="status" class="form-select">
          <option value="draft" <?= ($p['status'] ?? '')==='draft'?'selected':'' ?>>Draft</option>
          <option value="published" <?= ($p['status'] ?? '')==='published'?'selected':'' ?>>Published</option>
        </select></div>
    </div>
    <div class="flex gap-3 mt-6">
      <button class="btn btn-primary">💾 Save Post</button>
      <a href="blog.php" class="btn btn-outline">Cancel</a>
    </div>
  </form>
<?php endif; ?>

<div class="table-wrap">
<table class="data">
  <thead><tr><th>Title</th><th>Category</th><th>Author</th><th>Status</th><th>Views</th><th>Date</th><th></th></tr></thead>
  <tbody>
  <?php if (!$posts): ?>
    <tr><td colspan="7" class="text-center text-muted py-8">No posts yet.</td></tr>
  <?php endif; ?>
  <?php foreach ($posts as $post): ?>
    <tr>
      <td class="font-medium"><?= e($post['title']) ?></td>
      <td class="text-muted"><?= e($post['category'] ?: '—') ?></td>
      <td class="text-muted"><?= e($post['username'] ?: '—') ?></td>
      <td><span class="badge badge-<?= e($post['status']) ?>"><?= e($post['status']) ?></span></td>
      <td class="text-muted"><?= (int)$post['views'] ?></td>
      <td class="text-muted text-xs"><?= date('M j, Y', strtotime($post['created_at'])) ?></td>
      <td class="flex gap-2">
        <a href="?edit=<?= $post['id'] ?>" class="btn btn-outline" style="padding:.3rem .6rem;font-size:.7rem">Edit</a>
        <form method="post" data-confirm="Delete this post?">
          <?= csrf_field() ?>
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="id" value="<?= $post['id'] ?>">
          <button class="btn btn-danger" style="padding:.3rem .6rem;font-size:.7rem">Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>