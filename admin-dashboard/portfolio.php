<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
$pageTitle = 'Portfolio';

function handle_upload(string $field): ?string {
    if (empty($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return null;
    if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);
    $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg','jpeg','png','webp','gif','svg'])) return null;
    $name = uniqid('img_', true) . '.' . $ext;
    if (move_uploaded_file($_FILES[$field]['tmp_name'], UPLOAD_DIR . $name)) {
        return UPLOAD_URL . $name;
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    if ($action === 'save') {
        $data = [
            'title'        => trim($_POST['title']),
            'slug'         => slugify($_POST['slug'] ?: $_POST['title']),
            'category'     => trim($_POST['category']),
            'client_name'  => trim($_POST['client_name']),
            'description'  => trim($_POST['description']),
            'project_url'  => trim($_POST['project_url']),
            'tags'         => trim($_POST['tags']),
            'is_featured'  => isset($_POST['is_featured']) ? 1 : 0,
            'status'       => in_array($_POST['status'] ?? '', ['published','draft']) ? $_POST['status'] : 'draft',
        ];
        $cover = handle_upload('cover_image') ?: ($_POST['existing_cover'] ?? null);
        $data['cover_image'] = $cover;

        if ($id) {
            $sql = "UPDATE portfolio SET title=:title,slug=:slug,category=:category,client_name=:client_name,
                    description=:description,cover_image=:cover_image,project_url=:project_url,tags=:tags,
                    is_featured=:is_featured,status=:status WHERE id=:id";
            $data['id'] = $id;
            db()->prepare($sql)->execute($data);
            flash_set('success','Project updated.');
        } else {
            $sql = "INSERT INTO portfolio (title,slug,category,client_name,description,cover_image,project_url,tags,is_featured,status)
                    VALUES (:title,:slug,:category,:client_name,:description,:cover_image,:project_url,:tags,:is_featured,:status)";
            db()->prepare($sql)->execute($data);
            flash_set('success','Project created.');
        }
    } elseif ($action === 'delete' && $id) {
        db()->prepare("DELETE FROM portfolio WHERE id=?")->execute([$id]);
        flash_set('success','Project deleted.');
    }
    header('Location: portfolio.php'); exit;
}

$editing = null;
if (!empty($_GET['edit'])) {
    $stmt = db()->prepare("SELECT * FROM portfolio WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}
$items = db()->query("SELECT * FROM portfolio ORDER BY created_at DESC")->fetchAll();

include __DIR__ . '/includes/header.php';
?>
<div class="flex justify-between items-start mb-6">
  <div><h1 class="page-title">Portfolio</h1>
    <p style="color:#8b98a7" class="text-sm">Manage your project showcase.</p></div>
  <?php if (!$editing && !isset($_GET['new'])): ?>
    <a href="?new=1" class="btn btn-primary">+ New Project</a>
  <?php endif; ?>
</div>

<?php if ($editing || isset($_GET['new'])): $p = $editing ?: []; ?>
  <form method="post" enctype="multipart/form-data" class="card mb-8">
    <?= csrf_field() ?>
    <input type="hidden" name="action" value="save">
    <input type="hidden" name="id" value="<?= (int)($p['id'] ?? 0) ?>">
    <input type="hidden" name="existing_cover" value="<?= e($p['cover_image'] ?? '') ?>">
    <h2 class="font-display text-xl font-semibold mb-6"><?= $editing ? 'Edit Project' : 'New Project' ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <div><label class="form-label">Title</label>
        <input name="title" id="pf-title" data-slug-source="#pf-slug" value="<?= e($p['title'] ?? '') ?>" required class="form-input"></div>
      <div><label class="form-label">Slug</label>
        <input name="slug" id="pf-slug" value="<?= e($p['slug'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Category</label>
        <input name="category" value="<?= e($p['category'] ?? '') ?>" placeholder="Web Design, Branding..." class="form-input"></div>
      <div><label class="form-label">Client Name</label>
        <input name="client_name" value="<?= e($p['client_name'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Project URL</label>
        <input name="project_url" value="<?= e($p['project_url'] ?? '') ?>" class="form-input"></div>
      <div><label class="form-label">Tags (comma separated)</label>
        <input name="tags" value="<?= e($p['tags'] ?? '') ?>" class="form-input"></div>
      <div class="md:col-span-2"><label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-textarea"><?= e($p['description'] ?? '') ?></textarea></div>
      <div><label class="form-label">Cover Image</label>
        <input type="file" name="cover_image" accept="image/*" class="form-input">
        <?php if (!empty($p['cover_image'])): ?>
          <img src="<?= e($p['cover_image']) ?>" class="mt-2 h-20 rounded border border-slate-700">
        <?php endif; ?>
      </div>
      <div><label class="form-label">Status</label>
        <select name="status" class="form-select">
          <option value="draft" <?= ($p['status'] ?? '')==='draft'?'selected':'' ?>>Draft</option>
          <option value="published" <?= ($p['status'] ?? '')==='published'?'selected':'' ?>>Published</option>
        </select>
        <label class="flex items-center gap-2 mt-4 text-sm">
          <input type="checkbox" name="is_featured" <?= !empty($p['is_featured']) ? 'checked':'' ?>> Featured on homepage
        </label>
      </div>
    </div>
    <div class="flex gap-3 mt-6">
      <button class="btn btn-primary">💾 Save</button>
      <a href="portfolio.php" class="btn btn-outline">Cancel</a>
    </div>
  </form>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <?php foreach ($items as $it): ?>
    <div class="card">
      <?php if ($it['cover_image']): ?>
        <img src="<?= e($it['cover_image']) ?>" class="w-full h-40 object-cover rounded-lg mb-4">
      <?php else: ?>
        <div class="w-full h-40 bg-slate-800/50 rounded-lg mb-4 flex items-center justify-center text-slate-600">No image</div>
      <?php endif; ?>
      <div class="flex items-center gap-2 mb-2">
        <span class="badge badge-<?= e($it['status']) ?>"><?= e($it['status']) ?></span>
        <?php if ($it['is_featured']): ?><span class="badge badge-new">★ Featured</span><?php endif; ?>
      </div>
      <h3 class="font-semibold mb-1"><?= e($it['title']) ?></h3>
      <p class="text-xs text-muted mb-4"><?= e($it['category']) ?><?= $it['client_name'] ? ' • ' . e($it['client_name']) : '' ?></p>
      <div class="flex gap-2">
        <a href="?edit=<?= $it['id'] ?>" class="btn btn-outline" style="flex:1;justify-content:center;font-size:.75rem;padding:.4rem">Edit</a>
        <form method="post" data-confirm="Delete this project?" style="flex:1">
          <?= csrf_field() ?>
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="id" value="<?= $it['id'] ?>">
          <button class="btn btn-danger w-full" style="justify-content:center;font-size:.75rem;padding:.4rem">Delete</button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
  <?php if (!$items): ?>
    <p class="text-muted col-span-full text-center py-12">No projects yet. Click "+ New Project" to add your first one.</p>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>