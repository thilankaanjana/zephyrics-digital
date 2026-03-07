<?php
/**
 * Demo Content Import
 *
 * @package ZephyricsStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add demo content notice
 */
function zephyrics_demo_content_notice() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    $dismissed = get_option( 'zephyrics_demo_dismissed', false );
    
    if ( $dismissed ) {
        return;
    }
    
    ?>
    <div class="notice notice-info is-dismissible" id="zephyrics-demo-notice">
        <h3><?php esc_html_e( 'ZephyricsStudio Theme Activated!', 'zephyrics-studio' ); ?></h3>
        <p><?php esc_html_e( 'Would you like to import demo content to get started quickly?', 'zephyrics-studio' ); ?></p>
        <p>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=zephyrics-demo' ) ); ?>" class="button button-primary">
                <?php esc_html_e( 'Import Demo Content', 'zephyrics-studio' ); ?>
            </a>
            <a href="<?php echo esc_url( wp_nonce_url( admin_url( 'themes.php?zephyrics_dismiss_demo=1' ), 'zephyrics_dismiss' ) ); ?>" class="button">
                <?php esc_html_e( 'Dismiss', 'zephyrics-studio' ); ?>
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'zephyrics_demo_content_notice' );

/**
 * Handle dismiss action
 */
function zephyrics_handle_dismiss() {
    if ( isset( $_GET['zephyrics_dismiss_demo'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'zephyrics_dismiss' ) ) {
        update_option( 'zephyrics_demo_dismissed', true );
        wp_redirect( admin_url( 'themes.php' ) );
        exit;
    }
}
add_action( 'admin_init', 'zephyrics_handle_dismiss' );

/**
 * Add demo import page
 */
function zephyrics_demo_menu() {
    add_theme_page(
        __( 'Import Demo Content', 'zephyrics-studio' ),
        __( 'Demo Import', 'zephyrics-studio' ),
        'manage_options',
        'zephyrics-demo',
        'zephyrics_demo_page'
    );
}
add_action( 'admin_menu', 'zephyrics_demo_menu' );

/**
 * Demo import page content
 */
function zephyrics_demo_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'ZephyricsStudio Demo Import', 'zephyrics-studio' ); ?></h1>
        
        <div class="card" style="max-width: 600px; padding: 20px;">
            <h2><?php esc_html_e( 'Import Demo Content', 'zephyrics-studio' ); ?></h2>
            <p><?php esc_html_e( 'This will import demo pages, posts, menus, and customizer settings to help you get started.', 'zephyrics-studio' ); ?></p>
            
            <p><strong><?php esc_html_e( 'What will be imported:', 'zephyrics-studio' ); ?></strong></p>
            <ul style="list-style: disc; margin-left: 20px;">
                <li><?php esc_html_e( 'Demo pages (Home, About, Services, Portfolio, Contact, Blog)', 'zephyrics-studio' ); ?></li>
                <li><?php esc_html_e( 'Demo blog posts', 'zephyrics-studio' ); ?></li>
                <li><?php esc_html_e( 'Navigation menus', 'zephyrics-studio' ); ?></li>
                <li><?php esc_html_e( 'Customizer settings', 'zephyrics-studio' ); ?></li>
            </ul>
            
            <?php if ( isset( $_POST['zephyrics_import_demo'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'zephyrics_import_demo' ) ) : ?>
                <?php zephyrics_import_demo_content(); ?>
            <?php else : ?>
                <form method="post" style="margin-top: 20px;">
                    <?php wp_nonce_field( 'zephyrics_import_demo' ); ?>
                    <input type="hidden" name="zephyrics_import_demo" value="1">
                    <button type="submit" class="button button-primary button-hero">
                        <?php esc_html_e( 'Import Demo Content', 'zephyrics-studio' ); ?>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/**
 * Import demo content
 */
function zephyrics_import_demo_content() {
    // Import demo posts
    zephyrics_import_demo_posts();
    
    // Import categories
    zephyrics_import_demo_categories();
    
    // Set customizer defaults
    zephyrics_set_customizer_defaults();
    
    // Mark as complete
    update_option( 'zephyrics_demo_imported', true );
    update_option( 'zephyrics_demo_dismissed', true );
    
    echo '<div class="notice notice-success"><p>' . esc_html__( 'Demo content imported successfully!', 'zephyrics-studio' ) . '</p></div>';
}

/**
 * Import demo posts
 */
function zephyrics_import_demo_posts() {
    $posts = array(
        array(
            'title'    => '10 Essential Web Design Trends for 2024',
            'content'  => '<p>Stay ahead of the curve with these cutting-edge web design trends that are shaping the digital landscape in 2024.</p>

<h2>1. Dark Mode Everything</h2>
<p>Dark mode has evolved from a nice-to-have feature to an essential part of modern web design. Users expect the option to switch between light and dark themes.</p>

<h2>2. Micro-interactions</h2>
<p>Small, delightful animations that respond to user actions create a more engaging and intuitive experience.</p>

<h2>3. 3D Elements</h2>
<p>With improved browser capabilities, 3D elements are becoming more common and can add depth to your designs.</p>

<h2>4. Minimalist Navigation</h2>
<p>Clean, simple navigation patterns that prioritize user experience over complexity.</p>

<h2>5. Variable Fonts</h2>
<p>Typography is getting more dynamic with variable fonts that allow for creative expression while maintaining performance.</p>',
            'category' => 'Design',
            'excerpt'  => 'Discover the top web design trends that will dominate 2024 and learn how to implement them in your projects.',
        ),
        array(
            'title'    => 'How to Build a Brand That Stands Out',
            'content'  => '<p>In a crowded marketplace, building a distinctive brand is more important than ever. Here\'s how to create a brand that truly stands out.</p>

<h2>Define Your Core Values</h2>
<p>Start by understanding what your brand stands for. Your values should guide every decision you make.</p>

<h2>Know Your Audience</h2>
<p>Deep understanding of your target audience allows you to create messaging that resonates.</p>

<h2>Create a Unique Visual Identity</h2>
<p>Your logo, colors, and typography should be distinctive and memorable.</p>

<h2>Tell Your Story</h2>
<p>Every brand has a story. Share yours in a way that connects emotionally with your audience.</p>

<h2>Be Consistent</h2>
<p>Consistency across all touchpoints builds trust and recognition.</p>',
            'category' => 'Branding',
            'excerpt'  => 'Learn the key strategies for building a memorable brand that connects with your audience.',
        ),
        array(
            'title'    => 'SEO Strategies That Actually Work in 2024',
            'content'  => '<p>SEO continues to evolve. Here are the strategies that are actually moving the needle in 2024.</p>

<h2>Focus on User Intent</h2>
<p>Understanding what users are really looking for is more important than keyword stuffing.</p>

<h2>Core Web Vitals</h2>
<p>Page experience signals are now a ranking factor. Optimize for speed, interactivity, and visual stability.</p>

<h2>E-E-A-T</h2>
<p>Experience, Expertise, Authoritativeness, and Trustworthiness are crucial for ranking.</p>

<h2>Quality Content</h2>
<p>Create comprehensive, valuable content that genuinely helps your audience.</p>

<h2>Technical SEO</h2>
<p>Don\'t neglect the technical foundations: site structure, mobile-friendliness, and schema markup.</p>',
            'category' => 'Marketing',
            'excerpt'  => 'Discover the SEO strategies that are driving real results in the current search landscape.',
        ),
        array(
            'title'    => 'The Complete Guide to Web Performance',
            'content'  => '<p>Website performance directly impacts user experience, conversion rates, and SEO. Here\'s how to optimize for speed.</p>

<h2>Optimize Images</h2>
<p>Use modern formats like WebP, implement lazy loading, and serve appropriately sized images.</p>

<h2>Minimize JavaScript</h2>
<p>Remove unused code, split bundles, and defer non-critical scripts.</p>

<h2>Leverage Caching</h2>
<p>Implement browser caching and use a CDN to serve assets closer to users.</p>

<h2>Choose Quality Hosting</h2>
<p>Your hosting provider significantly impacts load times. Invest in quality infrastructure.</p>

<h2>Monitor Performance</h2>
<p>Use tools like Lighthouse and Core Web Vitals to continuously monitor and improve.</p>',
            'category' => 'Development',
            'excerpt'  => 'A comprehensive guide to making your website lightning fast.',
        ),
    );
    
    foreach ( $posts as $post_data ) {
        // Check if post exists
        $existing = get_page_by_title( $post_data['title'], OBJECT, 'post' );
        
        if ( ! $existing ) {
            // Get or create category
            $category = get_term_by( 'name', $post_data['category'], 'category' );
            $cat_id = $category ? $category->term_id : wp_create_category( $post_data['category'] );
            
            wp_insert_post( array(
                'post_title'   => $post_data['title'],
                'post_content' => $post_data['content'],
                'post_excerpt' => $post_data['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
                'post_category' => array( $cat_id ),
            ) );
        }
    }
}

/**
 * Import demo categories
 */
function zephyrics_import_demo_categories() {
    $categories = array( 'Design', 'Branding', 'Marketing', 'Development', 'Business' );
    
    foreach ( $categories as $cat_name ) {
        if ( ! term_exists( $cat_name, 'category' ) ) {
            wp_insert_term( $cat_name, 'category' );
        }
    }
}

/**
 * Set customizer defaults
 */
function zephyrics_set_customizer_defaults() {
    $defaults = array(
        'zephyrics_primary_color'     => '#00D4FF',
        'zephyrics_secondary_color'   => '#00A3FF',
        'zephyrics_background_color'  => '#0A0A0B',
        'zephyrics_text_color'        => '#FAFAFA',
        'zephyrics_border_radius'     => 12,
        'zephyrics_show_whatsapp'     => true,
        'zephyrics_whatsapp_number'   => '1234567890',
        'zephyrics_whatsapp_message'  => "Hi! I'm interested in your services.",
        'zephyrics_hero_badge'        => 'Digital Agency for Modern Brands',
        'zephyrics_hero_title_1'      => 'We Build Brands That',
        'zephyrics_hero_title_2'      => 'Dominate Digital',
        'zephyrics_hero_subtitle'     => 'Design. Technology. Growth. We help startups and businesses create stunning websites, powerful brands, and scalable digital solutions that drive real results.',
        'zephyrics_trust_brands'      => 'TechStart, GrowthCo, Innovate, BuildFast, ScaleUp',
        'zephyrics_footer_tagline'    => 'We build brands that dominate digital. Design, technology, and growth solutions for modern businesses.',
        'zephyrics_cta_title'         => 'Ready to Transform Your Digital Presence?',
        'zephyrics_cta_subtitle'      => "Let's create something amazing together. Get in touch and let's discuss your project.",
        'zephyrics_contact_email'     => 'hello@zephyrics.com',
        'zephyrics_contact_phone'     => '+1 (555) 123-4567',
        'zephyrics_contact_address'   => 'San Francisco, CA',
    );
    
    foreach ( $defaults as $setting => $value ) {
        set_theme_mod( $setting, $value );
    }
}
