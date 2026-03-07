<?php
/**
 * Theme Customizer
 *
 * @package ZephyricsStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add Customizer options
 */
function zephyrics_customize_register( $wp_customize ) {
    
    // ==========================================================================
    // COLORS SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_colors', array(
        'title'    => __( 'Theme Colors', 'zephyrics-studio' ),
        'priority' => 30,
    ) );
    
    // Primary Color
    $wp_customize->add_setting( 'zephyrics_primary_color', array(
        'default'           => '#00D4FF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zephyrics_primary_color', array(
        'label'    => __( 'Primary Color', 'zephyrics-studio' ),
        'section'  => 'zephyrics_colors',
        'settings' => 'zephyrics_primary_color',
    ) ) );
    
    // Secondary Color
    $wp_customize->add_setting( 'zephyrics_secondary_color', array(
        'default'           => '#00A3FF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zephyrics_secondary_color', array(
        'label'    => __( 'Secondary Color', 'zephyrics-studio' ),
        'section'  => 'zephyrics_colors',
        'settings' => 'zephyrics_secondary_color',
    ) ) );
    
    // Background Color
    $wp_customize->add_setting( 'zephyrics_background_color', array(
        'default'           => '#0A0A0B',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zephyrics_background_color', array(
        'label'    => __( 'Background Color', 'zephyrics-studio' ),
        'section'  => 'zephyrics_colors',
        'settings' => 'zephyrics_background_color',
    ) ) );
    
    // Text Color
    $wp_customize->add_setting( 'zephyrics_text_color', array(
        'default'           => '#FAFAFA',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zephyrics_text_color', array(
        'label'    => __( 'Text Color', 'zephyrics-studio' ),
        'section'  => 'zephyrics_colors',
        'settings' => 'zephyrics_text_color',
    ) ) );
    
    // ==========================================================================
    // TYPOGRAPHY SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_typography', array(
        'title'    => __( 'Typography', 'zephyrics-studio' ),
        'priority' => 35,
    ) );
    
    // Heading Font
    $wp_customize->add_setting( 'zephyrics_heading_font', array(
        'default'           => 'Space Grotesk',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_heading_font', array(
        'label'   => __( 'Heading Font', 'zephyrics-studio' ),
        'section' => 'zephyrics_typography',
        'type'    => 'select',
        'choices' => array(
            'Space Grotesk' => 'Space Grotesk',
            'Poppins'       => 'Poppins',
            'Montserrat'    => 'Montserrat',
            'Raleway'       => 'Raleway',
            'Outfit'        => 'Outfit',
        ),
    ) );
    
    // Body Font
    $wp_customize->add_setting( 'zephyrics_body_font', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_body_font', array(
        'label'   => __( 'Body Font', 'zephyrics-studio' ),
        'section' => 'zephyrics_typography',
        'type'    => 'select',
        'choices' => array(
            'Inter'      => 'Inter',
            'Open Sans'  => 'Open Sans',
            'Roboto'     => 'Roboto',
            'Lato'       => 'Lato',
            'Source Sans Pro' => 'Source Sans Pro',
        ),
    ) );
    
    // ==========================================================================
    // BUTTONS SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_buttons', array(
        'title'    => __( 'Buttons', 'zephyrics-studio' ),
        'priority' => 40,
    ) );
    
    // Border Radius
    $wp_customize->add_setting( 'zephyrics_border_radius', array(
        'default'           => 12,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'zephyrics_border_radius', array(
        'label'       => __( 'Button Border Radius (px)', 'zephyrics-studio' ),
        'section'     => 'zephyrics_buttons',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 30,
            'step' => 1,
        ),
    ) );
    
    // ==========================================================================
    // HEADER SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_header', array(
        'title'    => __( 'Header Settings', 'zephyrics-studio' ),
        'priority' => 45,
    ) );
    
    // Header Background
    $wp_customize->add_setting( 'zephyrics_header_bg', array(
        'default'           => 'rgba(10, 10, 11, 0.8)',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_header_bg', array(
        'label'   => __( 'Header Background (scrolled)', 'zephyrics-studio' ),
        'section' => 'zephyrics_header',
        'type'    => 'text',
    ) );
    
    // ==========================================================================
    // FOOTER SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_footer', array(
        'title'    => __( 'Footer Settings', 'zephyrics-studio' ),
        'priority' => 50,
    ) );
    
    // Footer Tagline
    $wp_customize->add_setting( 'zephyrics_footer_tagline', array(
        'default'           => 'We build brands that dominate digital. Design, technology, and growth solutions for modern businesses.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_footer_tagline', array(
        'label'   => __( 'Footer Tagline', 'zephyrics-studio' ),
        'section' => 'zephyrics_footer',
        'type'    => 'textarea',
    ) );
    
    // CTA Title
    $wp_customize->add_setting( 'zephyrics_cta_title', array(
        'default'           => 'Ready to Transform Your Digital Presence?',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_cta_title', array(
        'label'   => __( 'CTA Title', 'zephyrics-studio' ),
        'section' => 'zephyrics_footer',
        'type'    => 'text',
    ) );
    
    // CTA Subtitle
    $wp_customize->add_setting( 'zephyrics_cta_subtitle', array(
        'default'           => "Let's create something amazing together. Get in touch and let's discuss your project.",
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_cta_subtitle', array(
        'label'   => __( 'CTA Subtitle', 'zephyrics-studio' ),
        'section' => 'zephyrics_footer',
        'type'    => 'textarea',
    ) );
    
    // ==========================================================================
    // SOCIAL MEDIA SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_social', array(
        'title'    => __( 'Social Media Links', 'zephyrics-studio' ),
        'priority' => 55,
    ) );
    
    // Twitter
    $wp_customize->add_setting( 'zephyrics_social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'zephyrics_social_twitter', array(
        'label'   => __( 'Twitter URL', 'zephyrics-studio' ),
        'section' => 'zephyrics_social',
        'type'    => 'url',
    ) );
    
    // LinkedIn
    $wp_customize->add_setting( 'zephyrics_social_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'zephyrics_social_linkedin', array(
        'label'   => __( 'LinkedIn URL', 'zephyrics-studio' ),
        'section' => 'zephyrics_social',
        'type'    => 'url',
    ) );
    
    // Instagram
    $wp_customize->add_setting( 'zephyrics_social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'zephyrics_social_instagram', array(
        'label'   => __( 'Instagram URL', 'zephyrics-studio' ),
        'section' => 'zephyrics_social',
        'type'    => 'url',
    ) );
    
    // ==========================================================================
    // CONTACT SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_contact', array(
        'title'    => __( 'Contact Information', 'zephyrics-studio' ),
        'priority' => 60,
    ) );
    
    // Email
    $wp_customize->add_setting( 'zephyrics_contact_email', array(
        'default'           => 'hello@zephyrics.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( 'zephyrics_contact_email', array(
        'label'   => __( 'Email Address', 'zephyrics-studio' ),
        'section' => 'zephyrics_contact',
        'type'    => 'email',
    ) );
    
    // Phone
    $wp_customize->add_setting( 'zephyrics_contact_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_contact_phone', array(
        'label'   => __( 'Phone Number', 'zephyrics-studio' ),
        'section' => 'zephyrics_contact',
        'type'    => 'text',
    ) );
    
    // Address
    $wp_customize->add_setting( 'zephyrics_contact_address', array(
        'default'           => 'San Francisco, CA',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_contact_address', array(
        'label'   => __( 'Address', 'zephyrics-studio' ),
        'section' => 'zephyrics_contact',
        'type'    => 'text',
    ) );
    
    // ==========================================================================
    // WHATSAPP SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_whatsapp', array(
        'title'    => __( 'WhatsApp Button', 'zephyrics-studio' ),
        'priority' => 65,
    ) );
    
    // Show WhatsApp
    $wp_customize->add_setting( 'zephyrics_show_whatsapp', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ) );
    
    $wp_customize->add_control( 'zephyrics_show_whatsapp', array(
        'label'   => __( 'Show WhatsApp Button', 'zephyrics-studio' ),
        'section' => 'zephyrics_whatsapp',
        'type'    => 'checkbox',
    ) );
    
    // WhatsApp Number
    $wp_customize->add_setting( 'zephyrics_whatsapp_number', array(
        'default'           => '1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_whatsapp_number', array(
        'label'       => __( 'WhatsApp Number', 'zephyrics-studio' ),
        'description' => __( 'Include country code without + or spaces (e.g., 1234567890)', 'zephyrics-studio' ),
        'section'     => 'zephyrics_whatsapp',
        'type'        => 'text',
    ) );
    
    // WhatsApp Message
    $wp_customize->add_setting( 'zephyrics_whatsapp_message', array(
        'default'           => "Hi! I'm interested in your services.",
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_whatsapp_message', array(
        'label'   => __( 'Default Message', 'zephyrics-studio' ),
        'section' => 'zephyrics_whatsapp',
        'type'    => 'textarea',
    ) );
    
    // ==========================================================================
    // HERO SECTION
    // ==========================================================================
    
    $wp_customize->add_section( 'zephyrics_hero', array(
        'title'    => __( 'Hero Section', 'zephyrics-studio' ),
        'priority' => 70,
    ) );
    
    // Hero Badge
    $wp_customize->add_setting( 'zephyrics_hero_badge', array(
        'default'           => 'Digital Agency for Modern Brands',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_hero_badge', array(
        'label'   => __( 'Hero Badge Text', 'zephyrics-studio' ),
        'section' => 'zephyrics_hero',
        'type'    => 'text',
    ) );
    
    // Hero Title Line 1
    $wp_customize->add_setting( 'zephyrics_hero_title_1', array(
        'default'           => 'We Build Brands That',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_hero_title_1', array(
        'label'   => __( 'Hero Title Line 1', 'zephyrics-studio' ),
        'section' => 'zephyrics_hero',
        'type'    => 'text',
    ) );
    
    // Hero Title Line 2
    $wp_customize->add_setting( 'zephyrics_hero_title_2', array(
        'default'           => 'Dominate Digital',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_hero_title_2', array(
        'label'   => __( 'Hero Title Line 2 (Gradient)', 'zephyrics-studio' ),
        'section' => 'zephyrics_hero',
        'type'    => 'text',
    ) );
    
    // Hero Subtitle
    $wp_customize->add_setting( 'zephyrics_hero_subtitle', array(
        'default'           => 'Design. Technology. Growth. We help startups and businesses create stunning websites, powerful brands, and scalable digital solutions that drive real results.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( 'zephyrics_hero_subtitle', array(
        'label'   => __( 'Hero Subtitle', 'zephyrics-studio' ),
        'section' => 'zephyrics_hero',
        'type'    => 'textarea',
    ) );
    
    // Trust Brands
    $wp_customize->add_setting( 'zephyrics_trust_brands', array(
        'default'           => 'TechStart, GrowthCo, Innovate, BuildFast, ScaleUp',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'zephyrics_trust_brands', array(
        'label'       => __( 'Trust Brands (comma-separated)', 'zephyrics-studio' ),
        'section'     => 'zephyrics_hero',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'zephyrics_customize_register' );

/**
 * Live Preview JavaScript
 */
function zephyrics_customize_preview_js() {
    wp_enqueue_script(
        'zephyrics-customizer',
        ZEPHYRICS_URI . '/assets/js/customizer.js',
        array( 'customize-preview' ),
        ZEPHYRICS_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'zephyrics_customize_preview_js' );
