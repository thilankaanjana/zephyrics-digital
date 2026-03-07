<?php
/**
 * Theme Setup Functions
 *
 * @package ZephyricsStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set up theme on activation
 */
function zephyrics_theme_activation() {
    // Create default pages
    zephyrics_create_default_pages();
    
    // Set up menus
    zephyrics_setup_default_menus();
    
    // Set front page display
    update_option( 'show_on_front', 'page' );
    
    // Get home page
    $home_page = get_page_by_path( 'home' );
    if ( $home_page ) {
        update_option( 'page_on_front', $home_page->ID );
    }
    
    // Get blog page
    $blog_page = get_page_by_path( 'blog' );
    if ( $blog_page ) {
        update_option( 'page_for_posts', $blog_page->ID );
    }
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'zephyrics_theme_activation' );

/**
 * Create default pages
 */
function zephyrics_create_default_pages() {
    $pages = array(
        'home' => array(
            'title'   => 'Home',
            'content' => '',
        ),
        'about' => array(
            'title'   => 'About',
            'content' => '<h2>About ZephyricsStudio</h2>
<p>We are a digital agency specializing in modern web design, branding, and digital growth strategies. Our team of experts works with startups and established businesses to create impactful digital experiences.</p>

<h3>Our Mission</h3>
<p>To empower businesses with cutting-edge digital solutions that drive growth and establish market dominance.</p>

<h3>Our Values</h3>
<ul>
<li><strong>Innovation:</strong> We stay ahead of digital trends</li>
<li><strong>Quality:</strong> Excellence in every pixel</li>
<li><strong>Results:</strong> Focused on measurable outcomes</li>
<li><strong>Partnership:</strong> Your success is our success</li>
</ul>',
        ),
        'services' => array(
            'title'   => 'Services',
            'content' => '<h2>Our Services</h2>
<p>We offer comprehensive digital solutions tailored to your business needs.</p>

<h3>Web Design</h3>
<p>Custom, responsive websites that captivate and convert visitors into customers.</p>

<h3>Branding</h3>
<p>Build a memorable brand identity that sets you apart from the competition.</p>

<h3>SEO</h3>
<p>Dominate search results and drive organic traffic to your website.</p>

<h3>Development</h3>
<p>Custom web applications and solutions built with modern technologies.</p>

<h3>Digital Marketing</h3>
<p>Strategic campaigns that maximize your ROI and reach your target audience.</p>

<h3>Content Strategy</h3>
<p>Engaging content that tells your story and connects with your audience.</p>',
        ),
        'portfolio' => array(
            'title'   => 'Portfolio',
            'content' => '<h2>Our Work</h2>
<p>Explore our latest projects and see how we help brands dominate digital.</p>

<p><em>Portfolio items will be displayed here. Add portfolio posts to showcase your work.</em></p>',
        ),
        'blog' => array(
            'title'   => 'Blog',
            'content' => '',
        ),
        'contact' => array(
            'title'   => 'Contact',
            'content' => '<h2>Get in Touch</h2>
<p>Ready to start your project? We would love to hear from you.</p>

<h3>Contact Information</h3>
<p><strong>Email:</strong> hello@zephyrics.com</p>
<p><strong>Phone:</strong> +1 (555) 123-4567</p>
<p><strong>Address:</strong> San Francisco, CA</p>

<h3>Send us a Message</h3>
<p><em>Add a contact form here using your preferred plugin (WPForms, Contact Form 7, etc.)</em></p>',
        ),
        'privacy' => array(
            'title'   => 'Privacy Policy',
            'content' => '<h2>Privacy Policy</h2>
<p>Your privacy is important to us. This privacy policy explains what personal data we collect and how we use it.</p>

<h3>Information We Collect</h3>
<p>We may collect information you provide directly to us, such as when you contact us, subscribe to our newsletter, or request our services.</p>

<h3>How We Use Your Information</h3>
<p>We use the information we collect to provide, maintain, and improve our services, and to communicate with you.</p>

<h3>Contact Us</h3>
<p>If you have any questions about this privacy policy, please contact us at hello@zephyrics.com.</p>',
        ),
        'terms' => array(
            'title'   => 'Terms of Service',
            'content' => '<h2>Terms of Service</h2>
<p>By accessing and using our website and services, you agree to be bound by these terms.</p>

<h3>Services</h3>
<p>ZephyricsStudio provides web design, development, branding, and digital marketing services as described on our website.</p>

<h3>Intellectual Property</h3>
<p>All content on this website is the property of ZephyricsStudio unless otherwise stated.</p>

<h3>Contact</h3>
<p>For any questions regarding these terms, please contact us at hello@zephyrics.com.</p>',
        ),
    );
    
    foreach ( $pages as $slug => $page_data ) {
        // Check if page exists
        $existing = get_page_by_path( $slug );
        
        if ( ! $existing ) {
            wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_content' => $page_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
        }
    }
}

/**
 * Set up default menus
 */
function zephyrics_setup_default_menus() {
    // Check if primary menu exists
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    
    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        
        // Add menu items
        $pages = array( 'home', 'about', 'services', 'portfolio', 'blog' );
        $order = 1;
        
        foreach ( $pages as $slug ) {
            $page = get_page_by_path( $slug );
            if ( $page ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $page->post_title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $order,
                ) );
                $order++;
            }
        }
        
        // Assign menu to location
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
    
    // Create footer menu
    $footer_menu_name = 'Footer Menu';
    $footer_menu_exists = wp_get_nav_menu_object( $footer_menu_name );
    
    if ( ! $footer_menu_exists ) {
        $footer_menu_id = wp_create_nav_menu( $footer_menu_name );
        
        $pages = array( 'about', 'services', 'portfolio', 'blog', 'contact' );
        $order = 1;
        
        foreach ( $pages as $slug ) {
            $page = get_page_by_path( $slug );
            if ( $page ) {
                wp_update_nav_menu_item( $footer_menu_id, 0, array(
                    'menu-item-title'     => $page->post_title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $order,
                ) );
                $order++;
            }
        }
        
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer'] = $footer_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
    
    // Create legal menu
    $legal_menu_name = 'Legal Menu';
    $legal_menu_exists = wp_get_nav_menu_object( $legal_menu_name );
    
    if ( ! $legal_menu_exists ) {
        $legal_menu_id = wp_create_nav_menu( $legal_menu_name );
        
        $pages = array( 'privacy', 'terms' );
        $order = 1;
        
        foreach ( $pages as $slug ) {
            $page = get_page_by_path( $slug );
            if ( $page ) {
                wp_update_nav_menu_item( $legal_menu_id, 0, array(
                    'menu-item-title'     => $page->post_title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $order,
                ) );
                $order++;
            }
        }
        
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['legal'] = $legal_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}

/**
 * Add body classes
 */
function zephyrics_body_classes( $classes ) {
    // Add class if no sidebar
    $classes[] = 'no-sidebar';
    
    // Add class for front page
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    
    return $classes;
}
add_filter( 'body_class', 'zephyrics_body_classes' );

/**
 * Add custom image sizes
 */
function zephyrics_image_sizes() {
    add_image_size( 'zephyrics-card', 400, 300, true );
    add_image_size( 'zephyrics-hero', 1920, 1080, true );
    add_image_size( 'zephyrics-portfolio', 800, 600, true );
}
add_action( 'after_setup_theme', 'zephyrics_image_sizes' );

/**
 * Register block patterns
 */
function zephyrics_register_block_patterns() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category( 'zephyrics', array(
            'label' => __( 'ZephyricsStudio', 'zephyrics-studio' ),
        ) );
    }
}
add_action( 'init', 'zephyrics_register_block_patterns' );
