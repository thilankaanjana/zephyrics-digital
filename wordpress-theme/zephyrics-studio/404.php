<?php
/**
 * The template for displaying 404 pages
 *
 * @package ZephyricsStudio
 */

get_header();
?>

<div class="hero" style="min-height: 80vh;">
    <div class="hero-background">
        <div class="hero-glow"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge fade-up">
                <?php zephyrics_icon( 'search' ); ?>
                <span><?php esc_html_e( 'Page Not Found', 'zephyrics-studio' ); ?></span>
            </div>
            
            <h1 class="fade-up stagger-1">
                <?php esc_html_e( '404', 'zephyrics-studio' ); ?>
            </h1>
            
            <p class="hero-subtitle fade-up stagger-2">
                <?php esc_html_e( "Oops! The page you're looking for doesn't exist or has been moved. Let's get you back on track.", 'zephyrics-studio' ); ?>
            </p>
            
            <div class="hero-buttons fade-up stagger-3">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-xl">
                    <?php esc_html_e( 'Back to Home', 'zephyrics-studio' ); ?>
                    <?php zephyrics_icon( 'arrow-right' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline btn-xl">
                    <?php esc_html_e( 'Contact Us', 'zephyrics-studio' ); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
