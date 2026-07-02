// ZephyricsStudio Admin — minimal client behaviors

// Confirm destructive actions
document.querySelectorAll('form[data-confirm]').forEach(f => {
  f.addEventListener('submit', e => {
    if (!confirm(f.dataset.confirm || 'Are you sure?')) e.preventDefault();
  });
});

// Auto-slug from title inputs
document.querySelectorAll('[data-slug-source]').forEach(src => {
  const target = document.querySelector(src.dataset.slugSource);
  if (!target) return;
  src.addEventListener('input', () => {
    if (!target.dataset.touched) {
      target.value = src.value.toLowerCase()
        .replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    }
  });
  target.addEventListener('input', () => target.dataset.touched = '1');
});

// Simple search filter for tables
document.querySelectorAll('[data-table-filter]').forEach(inp => {
  const table = document.querySelector(inp.dataset.tableFilter);
  if (!table) return;
  inp.addEventListener('input', () => {
    const q = inp.value.toLowerCase();
    table.querySelectorAll('tbody tr').forEach(tr => {
      tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
});