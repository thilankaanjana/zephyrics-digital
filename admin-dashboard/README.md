# ZephyricsStudio — Admin Dashboard

A lightweight, self-hosted admin panel built with **PHP · MySQL · Tailwind CSS · Vanilla JS · Chart.js**.
No frameworks. Drop into any shared LAMP host.

---

## ✨ Features

- 🔐 Secure login (bcrypt passwords, sessions, CSRF, idle timeout)
- 📥 **Leads** — capture contact form submissions, filter by status, update workflow
- 💼 **Portfolio CRUD** — add/edit/delete projects with cover images, featured flag
- 📝 **Blog CRUD** — full posts with HTML content, cover images, SEO meta, draft/publish
- 📈 **Analytics** — Chart.js traffic graph, top pages, top referrers
- ⚙️ **Settings** — profile edit, change password
- 🌐 **Public REST APIs** for connecting your front-end site
- 🎨 Matches the ZephyricsStudio brand (dark theme, cyan `#00D4FF` accent)

---

## 📁 File structure

```
admin-dashboard/
├── config/
│   ├── config.php          # DB credentials + site constants
│   └── database.php        # PDO singleton
├── includes/
│   ├── auth.php            # login/logout/CSRF/helpers
│   ├── header.php          # sidebar + top of every page
│   └── footer.php
├── api/
│   ├── leads.php           # POST — receive contact form
│   ├── portfolio.php       # GET  — public project list
│   ├── blog.php            # GET  — public post list / single
│   └── track.php           # POST — record page visit
├── assets/
│   ├── css/admin.css
│   └── js/admin.js
├── sql/
│   └── schema.sql
├── uploads/                # image uploads (PHP execution blocked)
├── install.php             # RUN ONCE, then DELETE
├── login.php
├── logout.php
├── index.php               # Dashboard home
├── leads.php
├── portfolio.php
├── blog.php
├── analytics.php
├── settings.php
├── .htaccess               # security headers
└── README.md
```

---

## 🚀 Installation

1. **Create a MySQL database** in cPanel / phpMyAdmin (e.g. `zephyrics_db`) and a user with full privileges.
2. **Upload** the whole `admin-dashboard/` folder to your server (e.g. `public_html/admin-dashboard/`).
3. **Edit `config/config.php`** and set:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'your_db_name');
   define('DB_USER', 'your_db_user');
   define('DB_PASS', 'your_db_password');
   define('ADMIN_URL', '/admin-dashboard');
   ```
4. **Visit** `https://yoursite.com/admin-dashboard/install.php`, fill in the form to create tables + first admin user.
5. **Delete `install.php`** immediately after (important).
6. **Login** at `https://yoursite.com/admin-dashboard/login.php` 🎉

### Permissions
```bash
chmod 755 admin-dashboard
chmod -R 755 admin-dashboard/uploads
```

---

## 🔌 Connecting your public website

### Contact form submission (JS example)
```html
<form id="contact">
  <input name="name" required>
  <input name="email" type="email" required>
  <input name="phone">
  <select name="service">...</select>
  <textarea name="message"></textarea>
  <button>Send</button>
</form>
<script>
document.getElementById('contact').addEventListener('submit', async e => {
  e.preventDefault();
  const res = await fetch('/admin-dashboard/api/leads.php', {
    method: 'POST',
    body: new FormData(e.target)
  });
  const data = await res.json();
  alert(data.success ? 'Thanks! We\'ll be in touch.' : data.error);
});
</script>
```

### Load portfolio on the site
```js
fetch('/admin-dashboard/api/portfolio.php?featured=1')
  .then(r => r.json())
  .then(items => renderPortfolio(items));
```

### Load blog posts
```js
fetch('/admin-dashboard/api/blog.php').then(r => r.json()).then(renderBlog);
fetch('/admin-dashboard/api/blog.php?slug=my-post').then(r => r.json()).then(renderPost);
```

### Track page visits (paste into every page)
```html
<script>
fetch('/admin-dashboard/api/track.php', {
  method: 'POST',
  headers: {'Content-Type':'application/json'},
  body: JSON.stringify({ page: location.pathname, referrer: document.referrer })
});
</script>
```

---

## 🔒 Security notes

- Delete `install.php` after setup.
- Change the default admin password on first login (Settings page).
- In production, edit `api/*.php` to restrict `Access-Control-Allow-Origin` to your domain.
- Keep PHP ≥ 7.4 (PHP 8.1+ recommended).
- Uploads folder blocks PHP execution via `.htaccess` — keep this file intact.

---

## 🛠 Stack

PHP 7.4+ · MySQL 5.7+ · Tailwind CSS (CDN) · Chart.js · Vanilla JS
No Composer, no build step, no dependencies to install.