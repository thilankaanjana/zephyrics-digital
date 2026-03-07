<?php
/**
 * Process Section Template Part
 *
 * @package ZephyricsStudio
 */

$steps = array(
    array(
        'icon'        => 'clipboard',
        'title'       => 'Discovery',
        'description' => 'We learn about your business, goals, and target audience.',
    ),
    array(
        'icon'        => 'pencil',
        'title'       => 'Design',
        'description' => 'We create stunning designs that align with your brand.',
    ),
    array(
        'icon'        => 'code',
        'title'       => 'Development',
        'description' => 'We build your solution with clean, scalable code.',
    ),
    array(
        'icon'        => 'rocket',
        'title'       => 'Launch',
        'description' => 'We deploy and support your project for success.',
    ),
);
?>

<section class="section section-alt">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-label"><?php esc_html_e( 'Our Process', 'zephyrics-studio' ); ?></span>
            <h2>
                <?php esc_html_e( 'How We', 'zephyrics-studio' ); ?>
                <span class="gradient-text"><?php esc_html_e( 'Work', 'zephyrics-studio' ); ?></span>
            </h2>
            <p><?php esc_html_e( 'A proven methodology that ensures quality results on every project.', 'zephyrics-studio' ); ?></p>
        </div>
        
        <!-- Process Steps -->
        <div class="grid grid-4" style="gap: var(--spacing-xl);">
            <?php $step_number = 1; ?>
            <?php foreach ( $steps as $step ) : ?>
                <div class="card card-process">
                    <span class="step-number"><?php echo esc_html( $step_number ); ?></span>
                    <div class="card-icon">
                        <?php zephyrics_icon( $step['icon'] ); ?>
                    </div>
                    <h3 class="card-title"><?php echo esc_html( $step['title'] ); ?></h3>
                    <p class="card-description"><?php echo esc_html( $step['description'] ); ?></p>
                </div>
                <?php $step_number++; ?>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>
