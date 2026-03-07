<?php
/**
 * Tools Section Template Part
 *
 * @package ZephyricsStudio
 */

$tools = array(
    array( 'name' => 'WordPress', 'category' => 'CMS' ),
    array( 'name' => 'React', 'category' => 'Frontend' ),
    array( 'name' => 'Figma', 'category' => 'Design' ),
    array( 'name' => 'Canva', 'category' => 'Graphics' ),
    array( 'name' => 'SEO Tools', 'category' => 'Marketing' ),
    array( 'name' => 'Analytics', 'category' => 'Data' ),
    array( 'name' => 'Tailwind', 'category' => 'Styling' ),
    array( 'name' => 'Node.js', 'category' => 'Backend' ),
);

$skills = array(
    'Web Design',
    'UI/UX',
    'Branding',
    'SEO',
    'Content Creation',
    'Landing Pages',
    'E-commerce',
    'Performance',
);
?>

<section class="section section-alt">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-label"><?php esc_html_e( 'Our Toolkit', 'zephyrics-studio' ); ?></span>
            <h2>
                <?php esc_html_e( 'Powered by', 'zephyrics-studio' ); ?>
                <span class="gradient-text"><?php esc_html_e( 'Modern Technology', 'zephyrics-studio' ); ?></span>
            </h2>
            <p><?php esc_html_e( 'We use industry-leading tools and technologies to deliver exceptional results.', 'zephyrics-studio' ); ?></p>
        </div>
        
        <!-- Tools Grid -->
        <div class="grid grid-4" style="gap: var(--spacing-md); margin-bottom: var(--spacing-xl);">
            <?php foreach ( $tools as $tool ) : ?>
                <div class="card card-small text-center" style="padding: var(--spacing-lg);">
                    <div class="card-icon" style="width: 48px; height: 48px; margin: 0 auto var(--spacing-md);">
                        <span style="font-size: var(--text-xl); font-weight: 700; color: var(--primary-color);">
                            <?php echo esc_html( substr( $tool['name'], 0, 1 ) ); ?>
                        </span>
                    </div>
                    <h4 style="font-size: var(--text-base); font-weight: 600; margin-bottom: var(--spacing-xs);">
                        <?php echo esc_html( $tool['name'] ); ?>
                    </h4>
                    <p class="text-small text-muted" style="margin-bottom: 0;">
                        <?php echo esc_html( $tool['category'] ); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Skills Tags -->
        <div class="flex-center gap-md" style="flex-wrap: wrap;">
            <?php foreach ( $skills as $skill ) : ?>
                <span style="
                    display: inline-block;
                    padding: var(--spacing-sm) var(--spacing-lg);
                    background: rgba(0, 212, 255, 0.1);
                    border: 1px solid var(--border-accent);
                    border-radius: var(--radius-full);
                    color: var(--primary-color);
                    font-size: var(--text-sm);
                    font-weight: 500;
                ">
                    <?php echo esc_html( $skill ); ?>
                </span>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>
