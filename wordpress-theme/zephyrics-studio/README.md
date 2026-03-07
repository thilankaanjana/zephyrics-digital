# ZephyricsStudio WordPress Theme

A modern, minimal, and tech-inspired WordPress theme with a dark aesthetic and cyan accents. Built for digital agencies, startups, and modern businesses.

## Features

- **Mobile-First Design** - Fully responsive from mobile to desktop
- **Dark Theme** - Modern dark aesthetic with customizable accent colors
- **Performance Optimized** - Lightweight CSS/JS, no jQuery dependency
- **SEO Ready** - Clean HTML structure, proper heading hierarchy
- **Accessibility** - WCAG compliant with proper focus states
- **WordPress Customizer** - Easy customization of colors, typography, and content
- **Elementor Compatible** - Works perfectly with Elementor page builder
- **Demo Content** - One-click demo import to get started quickly

## Installation

### Method 1: Upload via WordPress Admin

1. Download the theme as a ZIP file
2. Go to **Appearance → Themes → Add New → Upload Theme**
3. Choose the ZIP file and click **Install Now**
4. After installation, click **Activate**

### Method 2: Manual Upload via FTP

1. Extract the ZIP file
2. Upload the `zephyrics-studio` folder to `/wp-content/themes/`
3. Go to **Appearance → Themes** and activate the theme

## Quick Start

1. **Import Demo Content** - After activation, you'll see a notice to import demo content. Click "Import Demo Content" to set up pages, posts, and menus automatically.

2. **Customize Your Site** - Go to **Appearance → Customize** to:
   - Upload your logo
   - Change colors (primary, background, text)
   - Adjust typography
   - Configure social links
   - Set up WhatsApp button
   - Edit hero section content

3. **Set Up Menus** - Go to **Appearance → Menus** to customize navigation

## Customizer Options

### Theme Colors
- Primary Color (default: #00D4FF)
- Secondary Color (default: #00A3FF)
- Background Color (default: #0A0A0B)
- Text Color (default: #FAFAFA)

### Typography
- Heading Font (Space Grotesk, Poppins, Montserrat, etc.)
- Body Font (Inter, Open Sans, Roboto, etc.)

### Buttons
- Border Radius (0-30px slider)

### Hero Section
- Badge Text
- Title Line 1
- Title Line 2 (gradient)
- Subtitle
- Trust Brands (comma-separated)

### WhatsApp Button
- Show/Hide toggle
- Phone number
- Default message

### Social Media
- Twitter URL
- LinkedIn URL
- Instagram URL

### Contact Information
- Email
- Phone
- Address

### Footer
- Tagline
- CTA Title
- CTA Subtitle

## Theme Structure

```
zephyrics-studio/
├── assets/
│   └── js/
│       ├── theme.js
│       └── customizer.js
├── inc/
│   ├── customizer.php
│   ├── theme-setup.php
│   └── demo-content.php
├── template-parts/
│   ├── hero.php
│   ├── services.php
│   ├── why-us.php
│   ├── process.php
│   └── tools.php
├── 404.php
├── archive.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── single.php
├── style.css
└── README.md
```

## CSS Variables

The theme uses CSS custom properties for easy customization:

```css
--primary-color: #00D4FF;
--background-color: #0A0A0B;
--text-color: #FAFAFA;
--text-muted: #88888F;
--border-color: #232327;
--radius-default: 12px;
--spacing-xs: 4px;
--spacing-sm: 8px;
--spacing-md: 16px;
--spacing-lg: 24px;
--spacing-xl: 32px;
```

## Elementor Compatibility

The theme is fully compatible with Elementor:

1. Install and activate Elementor
2. Edit any page with Elementor
3. Theme styles are automatically applied to Elementor elements
4. Use the theme's CSS variables for consistent styling

## Widget Areas

- Footer Column 1
- Footer Column 2
- Footer Column 3

## Menu Locations

- Primary Menu (header navigation)
- Footer Menu (footer links)
- Legal Menu (privacy, terms, etc.)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher

## Credits

- Google Fonts: Inter, Space Grotesk
- Icons: Lucide Icons (inline SVG)

## Support

For support or questions, please contact hello@zephyrics.com

## License

This theme is licensed under the GNU General Public License v2 or later.
