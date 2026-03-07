# ZephyricsStudio Design Specifications for Figma

## 🎨 Color Palette (HSL → HEX)

### Primary Colors
| Token | HSL | HEX | Usage |
|-------|-----|-----|-------|
| **Primary (Cyan)** | hsl(190, 100%, 50%) | `#00D4FF` | Accent, CTAs, links |
| **Primary Foreground** | hsl(240, 10%, 4%) | `#0A0A0B` | Text on primary |

### Background Colors
| Token | HSL | HEX | Usage |
|-------|-----|-----|-------|
| **Background** | hsl(240, 10%, 4%) | `#0A0A0B` | Main background |
| **Card** | hsl(240, 10%, 6%) | `#0E0E10` | Card backgrounds |
| **Secondary** | hsl(240, 10%, 12%) | `#1B1B1F` | Secondary sections |
| **Muted** | hsl(240, 10%, 15%) | `#232327` | Muted backgrounds, borders |

### Text Colors
| Token | HSL | HEX | Usage |
|-------|-----|-----|-------|
| **Foreground** | hsl(0, 0%, 98%) | `#FAFAFA` | Primary text |
| **Muted Foreground** | hsl(240, 5%, 55%) | `#88888F` | Secondary text |

### Border Colors
| Token | HSL | HEX | Usage |
|-------|-----|-----|-------|
| **Border** | hsl(240, 10%, 15%) | `#232327` | Default borders |
| **Primary/20** | rgba(0, 212, 255, 0.2) | `#00D4FF33` | Accent borders |

---

## 📐 Spacing System (Tailwind → Pixels)

### Base Spacing Scale
| Tailwind Class | Pixels | Usage |
|----------------|--------|-------|
| `gap-1`, `p-1` | **4px** | Micro spacing |
| `gap-2`, `p-2` | **8px** | Tight spacing |
| `gap-3`, `p-3` | **12px** | Small spacing |
| `gap-4`, `p-4` | **16px** | Default spacing |
| `gap-5`, `p-5` | **20px** | Medium spacing |
| `gap-6`, `p-6` | **24px** | Component padding |
| `gap-8`, `p-8` | **32px** | Section spacing |
| `gap-10`, `p-10` | **40px** | Large spacing |
| `gap-12`, `p-12` | **48px** | XL spacing |
| `gap-16`, `p-16` | **64px** | Section padding |
| `gap-24`, `py-24` | **96px** | Section vertical padding |

### Container
- **Max Width**: 1400px
- **Padding**: 32px (2rem) on each side
- **Mobile Padding**: 16px (px-4)

---

## 🔲 Border Radius

| Token | Value | Usage |
|-------|-------|-------|
| `--radius` (lg) | **12px** | Cards, large buttons |
| `rounded-md` | **10px** | Medium components |
| `rounded-sm` | **8px** | Small components |
| `rounded-xl` | **16px** | Large cards |
| `rounded-2xl` | **24px** | Hero cards, CTA sections |
| `rounded-full` | **9999px** | Pills, avatars, badges |
| `rounded-lg` | **12px** | Default card radius |

---

## ✏️ Typography

### Font Families
| Usage | Font | Weight Options |
|-------|------|----------------|
| **Headlines (H1-H6)** | Space Grotesk | 400, 500, 600, 700 |
| **Body Text** | Inter | 300, 400, 500, 600, 700, 800, 900 |

### Font Sizes
| Class | Size | Line Height | Usage |
|-------|------|-------------|-------|
| `text-xs` | **12px** | 16px | Small labels |
| `text-sm` | **14px** | 20px | Body small, links |
| `text-base` | **16px** | 24px | Body default |
| `text-lg` | **18px** | 28px | Body large |
| `text-xl` | **20px** | 28px | Subheadings |
| `text-2xl` | **24px** | 32px | H4 |
| `text-3xl` | **30px** | 36px | H3 |
| `text-4xl` | **36px** | 40px | H2 mobile |
| `text-5xl` | **48px** | 48px | H2 desktop |
| `text-6xl` | **60px** | 60px | H1 mobile |
| `text-7xl` | **72px** | 72px | H1 desktop |

### Font Weights
| Class | Weight | Usage |
|-------|--------|-------|
| `font-normal` | 400 | Body text |
| `font-medium` | 500 | Links, labels |
| `font-semibold` | 600 | Subheadings |
| `font-bold` | 700 | Headlines |

---

## 🔘 Button Specifications

### Hero Button (Primary CTA)
```
Background: Linear gradient 135° from #00D4FF to #00A3FF
Text: #0A0A0B (dark)
Font: Inter 500 (medium)
Padding: 24px horizontal, 20px vertical (size xl)
Border Radius: 12px
Shadow: 0 4px 16px rgba(0, 212, 255, 0.3)
Hover: Scale 1.02, increased shadow
```

### Hero Outline Button
```
Background: Transparent
Border: 1px solid rgba(0, 212, 255, 0.3)
Text: #FAFAFA
Padding: 24px horizontal, 20px vertical
Border Radius: 12px
Hover: Background rgba(0, 212, 255, 0.1)
```

### Button Sizes
| Size | Height | Padding X | Padding Y | Font Size |
|------|--------|-----------|-----------|-----------|
| `sm` | 36px | 12px | 0 | 14px |
| `default` | 40px | 16px | 8px | 14px |
| `lg` | 44px | 32px | 0 | 14px |
| `xl` | 52px | 24px | 20px | 16px |

---

## 📦 Card Specifications

### Default Card
```
Background: #0E0E10
Border: 1px solid #232327
Border Radius: 16px (rounded-xl)
Padding: 24px
```

### Service Card (with hover)
```
Background: Linear gradient 145° from #0F0F12 to #0A0A0D
Border: 1px solid #232327
Border Radius: 16px
Padding: 32px
Hover Border: rgba(0, 212, 255, 0.3)
Hover Transform: translateY(-4px)
```

### CTA Card (Gradient)
```
Background: Linear gradient from rgba(0, 212, 255, 0.2) to transparent
Border: 1px solid rgba(0, 212, 255, 0.2)
Border Radius: 24px
Padding: 48px
```

---

## 🌟 Icon Sizes

| Size | Pixels | Usage |
|------|--------|-------|
| `w-4 h-4` | **16px** | Small inline icons |
| `w-5 h-5` | **20px** | Button icons |
| `w-6 h-6` | **24px** | Navigation icons |
| `w-7 h-7` | **28px** | Featured icons |
| `w-10 h-10` | **40px** | Logo icon |
| `w-12 h-12` | **48px** | Card icons |
| `w-14 h-14` | **56px** | Large feature icons |

---

## 📱 Breakpoints

| Name | Min Width | Usage |
|------|-----------|-------|
| `sm` | **640px** | Large phones |
| `md` | **768px** | Tablets |
| `lg` | **1024px** | Laptops |
| `xl` | **1280px** | Desktops |
| `2xl` | **1536px** | Large screens |

---

## 🎭 Shadows

| Token | Value | Usage |
|-------|-------|-------|
| `shadow-lg` | 0 10px 15px rgba(0,0,0,0.1) | Cards |
| `shadow-xl` | 0 20px 25px rgba(0,0,0,0.1) | Elevated cards |
| `--shadow-glow` | 0 0 40px rgba(0,212,255,0.15) | Glow effects |
| `--shadow-card` | 0 4px 24px rgba(0,0,0,0.3) | Card shadows |
| `--shadow-button` | 0 4px 16px rgba(0,212,255,0.3) | CTA buttons |

---

## 🌈 Gradients

### Primary Gradient (for text & buttons)
```
Type: Linear
Angle: 135°
Stop 1: #00D4FF (0%)
Stop 2: #00A3FF (100%)
```

### Glow Gradient
```
Type: Linear
Angle: 135°
Stop 1: rgba(0, 212, 255, 0.2)
Stop 2: rgba(0, 163, 255, 0.1)
```

### Hero Background Glow
```
Type: Radial
Shape: Ellipse 80% 50%
Position: 50% -20%
Stop 1: rgba(0, 212, 255, 0.15)
Stop 2: transparent
```

---

## 🔧 Component Specs Quick Reference

### Navbar
- Height: 64px (mobile), 80px (desktop)
- Logo icon: 40x40px, border-radius 8px
- Nav links: 14px font, 16px padding X, 8px padding Y
- CTA button: Default size

### Hero Section
- Badge: padding 8px 16px, border-radius 9999px (pill)
- H1: 72px desktop, 36px mobile
- Subheadline: 20px, max-width 672px
- Button gap: 16px

### Service Cards
- Grid: 3 columns desktop, 1 mobile
- Card gap: 32px
- Icon container: 56x56px, border-radius 12px
- Title: 24px font

### Footer
- Section padding: 64px top/bottom
- Column gap: 40px
- Social icons: 40x40px, border-radius 8px
- Link font size: 14px

---

## 📤 How to Import to Figma

1. **Create a new Figma file**
2. **Set up Color Styles** using the HEX values above
3. **Create Text Styles** for each typography level
4. **Build Components** (buttons, cards, inputs) using the specs
5. **Use Auto Layout** with the spacing values
6. **Apply Effects** for shadows and gradients

### Figma Plugins That Help
- **HTML to Figma** - Import live site
- **Stark** - Check color contrast
- **Content Reel** - Add placeholder content

---

*Generated from ZephyricsStudio React/Tailwind codebase*
