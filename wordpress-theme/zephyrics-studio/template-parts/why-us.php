<?php
/**
 * Why Us Section Template Part
 *
 * @package ZephyricsStudio
 */

$benefits = array(
    array(
        'icon'        => 'zap',
        'title'       => 'Fast Turnaround',
        'description' => 'Quick delivery without compromising quality.',
    ),
    array(
        'icon'        => 'shield',
        'title'       => 'Proven Results',
        'description' => 'Track record of successful projects and happy clients.',
    ),
    array(
        'icon'        => 'headphones',
        'title'       => 'Dedicated Support',
        'description' => '24/7 support to ensure your success.',
    ),
    array(
        'icon'        => 'users',
        'title'       => 'Expert Team',
        'description' => 'Skilled professionals with years of experience.',
    ),
);
?>

<section class="section">
    <div class="container">
        
        <div class="grid grid-2" style="gap: var(--spacing-3xl); align-items: center;">
            
            <!-- Content -->
            <div>
                <span class="section-label"><?php esc_html_e( 'Why Choose Us', 'zephyrics-studio' ); ?></span>
                <h2 style="margin-bottom: var(--spacing-md);">
                    <?php esc_html_e( 'Your Success Is', 'zephyrics-studio' ); ?>
                    <span class="gradient-text"><?php esc_html_e( 'Our Priority', 'zephyrics-studio' ); ?></span>
                </h2>
                <p class="text-large text-muted" style="margin-bottom: var(--spacing-xl);">
                    <?php esc_html_e( "We're not just another agency. We're your strategic partner committed to delivering exceptional results that exceed expectations.", 'zephyrics-studio' ); ?>
                </p>
                
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-primary btn-lg">
                    <?php esc_html_e( 'Learn More About Us', 'zephyrics-studio' ); ?>
                    <?php zephyrics_icon( 'arrow-right' ); ?>
                </a>
            </div>
            
            <!-- Benefits Grid -->
            <div class="grid grid-2" style="gap: var(--spacing-md);">
                <?php foreach ( $benefits as $benefit ) : ?>
                    <div class="card card-small">
                        <div class="card-icon" style="width: 32px; height: 32px; margin-bottom: var(--spacing-md);">
                            <?php zephyrics_icon( $benefit['icon'] ); ?>
                        </div>
                        <h4 class="card-title" style="font-size: var(--text-base); margin-bottom: var(--spacing-sm);">
                            <?php echo esc_html( $benefit['title'] ); ?>
                        </h4>
                        <p class="card-description" style="font-size: var(--text-sm);">
                            <?php echo esc_html( $benefit['description'] ); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
        
    </div>
</section>
