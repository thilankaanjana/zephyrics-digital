<?php
/**
 * Hero Section Template Part
 *
 * @package ZephyricsStudio
 */

$hero_badge = get_theme_mod( 'zephyrics_hero_badge', 'Digital Agency for Modern Brands' );
$hero_title_1 = get_theme_mod( 'zephyrics_hero_title_1', 'We Build Brands That' );
$hero_title_2 = get_theme_mod( 'zephyrics_hero_title_2', 'Dominate Digital' );
$hero_subtitle = get_theme_mod( 'zephyrics_hero_subtitle', 'Design. Technology. Growth. We help startups and businesses create stunning websites, powerful brands, and scalable digital solutions that drive real results.' );
$trust_brands = get_theme_mod( 'zephyrics_trust_brands', 'TechStart, GrowthCo, Innovate, BuildFast, ScaleUp' );
?>

<section class="hero">
    <!-- Background Effects -->
    <div class="hero-background">
        <div class="hero-glow"></div>
        <div class="hero-grid"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <!-- Badge -->
            <div class="hero-badge fade-up">
                <?php zephyrics_icon( 'sparkles' ); ?>
                <span><?php echo esc_html( $hero_badge ); ?></span>
            </div>
            
            <!-- Headline -->
            <h1 class="fade-up stagger-1">
                <?php echo esc_html( $hero_title_1 ); ?>
                <span class="gradient-text"><?php echo esc_html( $hero_title_2 ); ?></span>
            </h1>
            
            <!-- Subheadline -->
            <p class="hero-subtitle fade-up stagger-2">
                <?php echo esc_html( $hero_subtitle ); ?>
            </p>
            
            <!-- CTA Buttons -->
            <div class="hero-buttons fade-up stagger-3">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-xl">
                    <?php esc_html_e( 'Get Started', 'zephyrics-studio' ); ?>
                    <?php zephyrics_icon( 'arrow-right' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>" class="btn btn-outline btn-xl">
                    <?php esc_html_e( 'View Our Work', 'zephyrics-studio' ); ?>
                </a>
            </div>
            
            <!-- Trust Indicators -->
            <div class="hero-trust fade-up stagger-4">
                <p><?php esc_html_e( 'Trusted by ambitious brands worldwide', 'zephyrics-studio' ); ?></p>
                <div class="hero-trust-brands">
                    <?php
                    $brands = array_map( 'trim', explode( ',', $trust_brands ) );
                    foreach ( $brands as $brand ) :
                    ?>
                        <span><?php echo esc_html( $brand ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Gradient -->
    <div class="hero-bottom-gradient"></div>
</section>
