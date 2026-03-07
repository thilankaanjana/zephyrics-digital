# ZephyricsStudio - Complete WordPress Design Specifications

> **COMPLETE PIXEL-PERFECT GUIDE** for recreating this design in WordPress/Elementor/Divi

---

## 📦 GLOBAL SETTINGS

### Container
| Property | Value |
|----------|-------|
| Max Width | **1400px** |
| Padding (Desktop) | **32px** left/right |
| Padding (Tablet) | **24px** left/right |
| Padding (Mobile) | **16px** left/right |

### Page Background
```css
background-color: #0A0A0B;
```

---

## 🎨 COLOR PALETTE (Copy these HEX codes)

### Primary Colors
| Name | HEX | RGB | Usage |
|------|-----|-----|-------|
| **Primary Cyan** | `#00D4FF` | rgb(0, 212, 255) | Buttons, links, accents |
| **Primary Dark** | `#0A0A0B` | rgb(10, 10, 11) | Text on cyan buttons |

### Background Colors
| Name | HEX | Usage |
|------|-----|-------|
| **Page Background** | `#0A0A0B` | Main page background |
| **Card Background** | `#0E0E10` | Cards, footer |
| **Secondary BG** | `#1B1B1F` | Alternate sections |
| **Muted BG** | `#232327` | Input fields, subtle areas |

### Text Colors
| Name | HEX | Usage |
|------|-----|-------|
| **White (Primary)** | `#FAFAFA` | Headlines, primary text |
| **Muted Gray** | `#88888F` | Body text, descriptions |

### Border Colors
| Name | HEX/RGBA | Usage |
|------|----------|-------|
| **Default Border** | `#232327` | Card borders, dividers |
| **Accent Border** | `rgba(0, 212, 255, 0.2)` | Hover states |
| **Accent Border Strong** | `rgba(0, 212, 255, 0.3)` | Active states |

---

## ✏️ TYPOGRAPHY

### Font Imports (Add to WordPress)
```html
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Headlines (Space Grotesk)
| Element | Desktop | Tablet | Mobile | Weight | Line Height | Letter Spacing |
|---------|---------|--------|--------|--------|-------------|----------------|
| **H1** | 72px | 60px | 36px | 700 (Bold) | 1.1 | -0.02em |
| **H2** | 48px | 36px | 30px | 700 (Bold) | 1.1 | -0.01em |
| **H3** | 30px | 24px | 24px | 600 (Semibold) | 1.25 | 0 |
| **H4** | 24px | 20px | 20px | 600 (Semibold) | 1.3 | 0 |
| **H5** | 20px | 18px | 18px | 600 (Semibold) | 1.4 | 0 |
| **H6** | 18px | 16px | 16px | 600 (Semibold) | 1.4 | 0 |

### Body Text (Inter)
| Type | Size | Weight | Line Height | Color |
|------|------|--------|-------------|-------|
| **Body Large** | 20px | 400 | 1.625 (32px) | `#88888F` |
| **Body Default** | 18px | 400 | 1.6 (28px) | `#88888F` |
| **Body Regular** | 16px | 400 | 1.5 (24px) | `#88888F` |
| **Body Small** | 14px | 400/500 | 1.5 (21px) | `#88888F` |
| **Caption** | 12px | 500 | 1.4 (16px) | `#88888F` |

### Special Text Styles
| Type | Size | Weight | Style |
|------|------|--------|-------|
| **Section Label** | 14px | 600 | UPPERCASE, letter-spacing: 0.1em, color: `#00D4FF` |
| **Nav Link** | 14px | 500 | Normal case |
| **Button Text** | 14-18px | 500-600 | Normal case |

### Gradient Text Effect
```css
background: linear-gradient(135deg, #00D4FF, #00A3FF);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
background-clip: text;
```

---

## 🔲 BORDER RADIUS

| Use Case | Value |
|----------|-------|
| **Small buttons, badges** | 8px |
| **Medium buttons, inputs** | 10px |
| **Default (cards, buttons)** | 12px |
| **Large cards** | 16px |
| **Hero cards, CTA sections** | 24px |
| **Pills, badges, avatars** | 9999px (full round) |

---

## 🔘 BUTTON SPECIFICATIONS

### Button Sizes (Height × Padding)
| Size | Height | Padding X | Padding Y | Font Size | Border Radius |
|------|--------|-----------|-----------|-----------|---------------|
| **Small** | 36px | 16px | auto | 14px | 8px |
| **Default** | 40px | 20px | 8px | 14px | 12px |
| **Large** | 48px | 32px | auto | 16px | 12px |
| **XL (Hero)** | 56px | 40px | auto | 18px | 16px |

### Primary Button (CTA)
```css
/* Normal State */
background: linear-gradient(135deg, #00D4FF, #00A3FF);
color: #0A0A0B;
font-weight: 600;
border-radius: 12px;
box-shadow: 0 4px 20px rgba(0, 212, 255, 0.4);
transition: all 0.3s ease;

/* Hover State */
transform: translateY(-4px);
box-shadow: 0 8px 30px rgba(0, 212, 255, 0.5);
```

### Outline Button
```css
/* Normal State */
background: transparent;
border: 2px solid rgba(0, 212, 255, 0.6);
color: #FAFAFA;
font-weight: 600;
border-radius: 12px;

/* Hover State */
background: rgba(0, 212, 255, 0.1);
border-color: #00D4FF;
```

### Ghost Button
```css
background: transparent;
border: 1px solid rgba(0, 212, 255, 0.5);
color: #00D4FF;
border-radius: 12px;

/* Hover */
background: rgba(0, 212, 255, 0.1);
border-color: #00D4FF;
```

---

## 🧭 NAVBAR SPECIFICATIONS

### Container
| Property | Desktop | Mobile |
|----------|---------|--------|
| **Height** | 80px | 64px |
| **Background (scrolled)** | `rgba(10, 10, 11, 0.8)` + blur | same |
| **Backdrop Blur** | 24px | 24px |
| **Border (scrolled)** | 1px solid `#232327` | same |
| **Padding X** | 32px | 16px |

### Logo
| Element | Value |
|---------|-------|
| **Icon Container** | 40×40px |
| **Icon BG** | `rgba(0, 212, 255, 0.2)` |
| **Icon Border Radius** | 12px |
| **Icon Letter** | 20px, Bold, `#00D4FF` |
| **Brand Text** | 20px (desktop), 18px (mobile), Bold |
| **Brand "Studio" Color** | `#00D4FF` |
| **Gap (icon to text)** | 8px |

### Navigation Links
| Property | Value |
|----------|-------|
| **Font Size** | 14px |
| **Font Weight** | 500 |
| **Color (Default)** | `#88888F` |
| **Color (Hover)** | `#FAFAFA` |
| **Color (Active)** | `#00D4FF` |
| **Active BG** | `rgba(0, 212, 255, 0.1)` |
| **Padding** | 16px horizontal, 8px vertical |
| **Border Radius** | 12px |
| **Gap Between Links** | 4px |

### Mobile Menu
| Property | Value |
|----------|-------|
| **Icon Size** | 24px |
| **Link Padding** | 16px horizontal, 12px vertical |
| **Link Gap** | 4px |
| **Button Margin Top** | 12px |

---

## 🦸 HERO SECTION

### Container
| Property | Value |
|----------|-------|
| **Min Height** | 100vh |
| **Padding Top** | 96px (accounts for navbar) |
| **Content Max Width** | 896px (centered) |
| **Text Align** | Center |

### Badge (Top)
```css
display: inline-flex;
align-items: center;
gap: 8px;
padding: 8px 16px;
background: rgba(0, 212, 255, 0.1);
border: 1px solid rgba(0, 212, 255, 0.2);
border-radius: 9999px;
margin-bottom: 32px;

/* Badge Text */
font-size: 14px;
font-weight: 500;
color: #00D4FF;

/* Badge Icon */
width: 16px;
height: 16px;
```

### Hero H1
| Property | Desktop | Tablet | Mobile |
|----------|---------|--------|--------|
| **Font Size** | 72px | 60px | 36px |
| **Line Height** | 1.1 | 1.1 | 1.2 |
| **Font Weight** | 700 | 700 | 700 |
| **Margin Bottom** | 24px | 20px | 16px |
| **Color** | `#FAFAFA` | same | same |

### Hero Subheadline
| Property | Value |
|----------|-------|
| **Font Size** | 20px (desktop), 18px (mobile) |
| **Line Height** | 1.625 |
| **Color** | `#88888F` |
| **Max Width** | 672px |
| **Margin Bottom** | 40px |

### Hero Buttons Container
| Property | Value |
|----------|-------|
| **Layout** | Flexbox, row (desktop), column (mobile) |
| **Gap** | 16px |
| **Justify** | Center |

### Trust Indicators
| Property | Value |
|----------|-------|
| **Margin Top** | 64px |
| **Padding Top** | 64px |
| **Border Top** | 1px solid `rgba(35, 35, 39, 0.5)` |
| **Label Font Size** | 14px |
| **Label Color** | `#88888F` |
| **Brand Names Font** | Space Grotesk, 18px, 600 |
| **Brand Names Color** | `#88888F` |
| **Brand Names Opacity** | 60% |
| **Gap Between Brands** | 32px |

### Background Effects
```css
/* Radial Glow (top center) */
.hero-glow {
  background: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(0, 212, 255, 0.15), transparent);
}

/* Floating Orb 1 */
.orb-1 {
  position: absolute;
  top: 25%;
  left: 25%;
  width: 288px;
  height: 288px;
  background: rgba(0, 212, 255, 0.2);
  border-radius: 50%;
  filter: blur(100px);
  animation: float 6s ease-in-out infinite;
}

/* Floating Orb 2 */
.orb-2 {
  position: absolute;
  bottom: 25%;
  right: 25%;
  width: 384px;
  height: 384px;
  background: rgba(0, 212, 255, 0.1);
  border-radius: 50%;
  filter: blur(120px);
  animation: float 6s ease-in-out infinite;
  animation-delay: -3s;
}

/* Float Animation */
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}
```

---

## 📦 SECTION LAYOUTS

### Standard Section
| Property | Value |
|----------|-------|
| **Padding Y** | 96px |
| **Background (Alt)** | `#0E0E10` (card color) |

### Section Header (Centered)
| Element | Property | Value |
|---------|----------|-------|
| **Label** | Font | 14px, 600, UPPERCASE |
| | Color | `#00D4FF` |
| | Letter Spacing | 0.1em |
| | Margin Bottom | 12px |
| **Title** | Max Width | 768px |
| | Margin | 0 auto 16px |
| **Description** | Max Width | 768px |
| | Font Size | 18px |
| | Color | `#88888F` |
| | Margin | 0 auto 64px |

---

## 🃏 CARD SPECIFICATIONS

### Service Card
```css
/* Container */
padding: 32px;
background: linear-gradient(145deg, #0F0F12, #0A0A0D);
border: 1px solid #232327;
border-radius: 16px;
transition: all 0.3s ease;

/* Hover */
border-color: rgba(0, 212, 255, 0.3);
transform: translateY(-4px);

/* Icon Container */
width: 48px;
height: 48px;
background: rgba(0, 212, 255, 0.1);
border-radius: 16px;
margin-bottom: 24px;

/* Icon */
width: 24px;
height: 24px;
color: #00D4FF;

/* Title */
font-family: 'Space Grotesk';
font-size: 20px;
font-weight: 600;
color: #FAFAFA;
margin-bottom: 12px;

/* Description */
font-size: 16px;
line-height: 1.6;
color: #88888F;
```

### Benefit Card (Small)
```css
padding: 24px;
background: #0A0A0B;
border: 1px solid #232327;
border-radius: 16px;

/* Icon */
width: 32px;
height: 32px;
color: #00D4FF;
margin-bottom: 16px;

/* Title */
font-size: 16px;
font-weight: 600;
margin-bottom: 8px;

/* Description */
font-size: 14px;
color: #88888F;
```

### Process Step Card
```css
padding: 32px;
background: linear-gradient(145deg, #0F0F12, #0A0A0D);
border: 1px solid #232327;
border-radius: 16px;
text-align: center;
position: relative;

/* Step Number Badge */
position: absolute;
top: -16px;
left: 50%;
transform: translateX(-50%);
width: 32px;
height: 32px;
background: #00D4FF;
border-radius: 50%;
color: #0A0A0B;
font-size: 12px;
font-weight: 700;

/* Icon Container */
width: 56px;
height: 56px;
background: rgba(0, 212, 255, 0.1);
border-radius: 16px;
margin: 0 auto 24px;

/* Icon */
width: 28px;
height: 28px;
color: #00D4FF;

/* Title */
font-size: 20px;
font-weight: 600;
margin-bottom: 12px;

/* Description */
font-size: 14px;
line-height: 1.6;
color: #88888F;
```

### CTA Card (Gradient)
```css
padding: 48px (desktop), 32px (mobile);
background: linear-gradient(135deg, rgba(0, 212, 255, 0.2), transparent);
border: 1px solid rgba(0, 212, 255, 0.2);
border-radius: 24px;
position: relative;
overflow: hidden;

/* Grid Pattern Overlay */
background-image: linear-gradient(to right, rgba(35, 35, 39, 0.3) 1px, transparent 1px),
                  linear-gradient(to bottom, rgba(35, 35, 39, 0.3) 1px, transparent 1px);
background-size: 60px 60px;
opacity: 0.1;
```

---

## 🦶 FOOTER SPECIFICATIONS

### Main Footer
| Property | Value |
|----------|-------|
| **Background** | `#0E0E10` |
| **Border Top** | 1px solid `#232327` |
| **Padding Y** | 48px |

### CTA Section (Inside Footer)
| Property | Value |
|----------|-------|
| **Padding** | 48px (desktop), 32px (mobile) |
| **Background** | Gradient (see CTA Card) |
| **Border Radius** | 24px |
| **Margin Bottom** | 64px |
| **Title** | 30px (desktop), 24px (mobile), Bold |
| **Subtitle** | 18px, `#88888F` |

### Footer Grid
| Property | Value |
|----------|-------|
| **Columns** | 4 (desktop), 2 (tablet), 1 (mobile) |
| **Gap** | 40px |

### Footer Column Title
| Property | Value |
|----------|-------|
| **Font** | Space Grotesk |
| **Size** | 16px |
| **Weight** | 600 |
| **Color** | `#FAFAFA` |
| **Margin Bottom** | 16px |

### Footer Links
| Property | Value |
|----------|-------|
| **Font Size** | 14px |
| **Color** | `#88888F` |
| **Color (Hover)** | `#00D4FF` |
| **Line Height** | 2 (32px total) |

### Social Icons
| Property | Value |
|----------|-------|
| **Container Size** | 40×40px |
| **Background** | `#232327` |
| **Background (Hover)** | `rgba(0, 212, 255, 0.2)` |
| **Border Radius** | 12px |
| **Icon Size** | 20px |
| **Icon Color** | `#FAFAFA` |
| **Icon Color (Hover)** | `#00D4FF` |
| **Gap** | 12px |

### Bottom Bar
| Property | Value |
|----------|-------|
| **Border Top** | 1px solid `#232327` |
| **Padding Y** | 24px |
| **Copyright Font** | 14px, `#88888F` |
| **Legal Links** | 14px, `#88888F`, hover: `#00D4FF` |

---

## 📱 RESPONSIVE BREAKPOINTS

| Name | Min Width | WordPress/Elementor Equivalent |
|------|-----------|--------------------------------|
| Mobile | 0px | Mobile |
| Large Phone | 640px | Mobile Landscape |
| Tablet | 768px | Tablet |
| Laptop | 1024px | Tablet Landscape / Small Desktop |
| Desktop | 1280px | Desktop |
| Large | 1536px | Widescreen |

---

## 🎭 SHADOWS

### Card Shadow
```css
box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);
```

### Button Glow Shadow
```css
box-shadow: 0 4px 16px rgba(0, 212, 255, 0.3);
```

### Button Glow Hover
```css
box-shadow: 0 8px 30px rgba(0, 212, 255, 0.5);
```

### Ambient Glow
```css
box-shadow: 0 0 40px rgba(0, 212, 255, 0.15);
```

---

## 🌈 GRADIENTS

### Primary Gradient (Text/Buttons)
```css
background: linear-gradient(135deg, #00D4FF 0%, #00A3FF 100%);
```

### Glow Gradient (Backgrounds)
```css
background: linear-gradient(135deg, rgba(0, 212, 255, 0.2), rgba(0, 163, 255, 0.1));
```

### Card Gradient
```css
background: linear-gradient(145deg, #0F0F12, #0A0A0D);
```

### Hero Background Glow
```css
background: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(0, 212, 255, 0.15), transparent);
```

---

## 🎬 ANIMATIONS (CSS)

### Fade Up (Page Load)
```css
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.fade-up {
  animation: fadeUp 0.6s ease-out forwards;
}
```

### Float (Background Orbs)
```css
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}
.float {
  animation: float 6s ease-in-out infinite;
}
```

### Stagger Delays
```css
.stagger-1 { animation-delay: 0.1s; }
.stagger-2 { animation-delay: 0.2s; }
.stagger-3 { animation-delay: 0.3s; }
.stagger-4 { animation-delay: 0.4s; }
```

---

## 📋 GRID LAYOUTS

### Services Grid
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 3 | 24px |
| Tablet | 2 | 24px |
| Mobile | 1 | 24px |

### Benefits Grid
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 2 | 16px |
| Tablet | 2 | 16px |
| Mobile | 1 | 16px |

### Process Steps
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 4 | 32px |
| Tablet | 2 | 24px |
| Mobile | 1 | 24px |

### Footer Grid
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 4 | 40px |
| Tablet | 2 | 32px |
| Mobile | 1 | 24px |

---

## 🔧 CUSTOM SCROLLBAR

```css
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #0A0A0B;
}

::-webkit-scrollbar-thumb {
  background: #232327;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #88888F;
}
```

---

## ✅ QUICK REFERENCE CHEAT SHEET

### Most Used Values
| Token | Value |
|-------|-------|
| Primary Color | `#00D4FF` |
| Background | `#0A0A0B` |
| Card BG | `#0E0E10` |
| Text White | `#FAFAFA` |
| Text Gray | `#88888F` |
| Border | `#232327` |
| Border Radius | 12px |
| Section Padding | 96px top/bottom |
| Container Max | 1400px |
| Container Padding | 32px |
| Button Height (default) | 40px |
| Button Height (large) | 48px |
| Button Height (XL) | 56px |

---

*Complete WordPress/Elementor/Divi migration guide for ZephyricsStudio*
