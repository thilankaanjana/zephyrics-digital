<?php
/**
 * Services Section Template Part
 *
 * @package ZephyricsStudio
 */

$services = array(
    array(
        'icon'        => 'globe',
        'title'       => 'Web Design',
        'description' => 'Custom, responsive websites that captivate visitors and convert them into loyal customers.',
    ),
    array(
        'icon'        => 'palette',
        'title'       => 'Branding',
        'description' => 'Build a memorable brand identity that sets you apart and resonates with your audience.',
    ),
    array(
        'icon'        => 'search',
        'title'       => 'SEO',
        'description' => 'Dominate search results with proven SEO strategies that drive organic traffic.',
    ),
    array(
        'icon'        => 'code',
        'title'       => 'Development',
        'description' => 'Custom web applications built with modern technologies for scale and performance.',
    ),
    array(
        'icon'        => 'megaphone',
        'title'       => 'Digital Marketing',
        'description' => 'Strategic campaigns that maximize your ROI and connect with your target audience.',
    ),
    array(
        'icon'        => 'trending-up',
        'title'       => 'Growth Strategy',
        'description' => 'Data-driven strategies to accelerate your business growth and market presence.',
    ),
);
?>

<section class="section section-alt">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-label"><?php esc_html_e( 'What We Do', 'zephyrics-studio' ); ?></span>
            <h2>
                <?php esc_html_e( 'Services That', 'zephyrics-studio' ); ?>
                <span class="gradient-text"><?php esc_html_e( 'Drive Results', 'zephyrics-studio' ); ?></span>
            </h2>
            <p><?php esc_html_e( 'From concept to launch, we provide comprehensive digital solutions tailored to your unique business needs.', 'zephyrics-studio' ); ?></p>
        </div>
        
        <!-- Services Grid -->
        <div class="grid grid-3">
            <?php foreach ( $services as $service ) : ?>
                <div class="card">
                    <div class="card-icon">
                        <?php zephyrics_icon( $service['icon'] ); ?>
                    </div>
                    <h3 class="card-title"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p class="card-description"><?php echo esc_html( $service['description'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>
