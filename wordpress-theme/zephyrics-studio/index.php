<?php
/**
 * The main template file
 *
 * @package ZephyricsStudio
 */

get_header();
?>

<div class="section pt-section">
    <div class="container">
        
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="section-header">
                <span class="section-label"><?php esc_html_e( 'Our Blog', 'zephyrics-studio' ); ?></span>
                <h1><?php single_post_title(); ?></h1>
                <p><?php esc_html_e( 'Insights, tips, and thoughts on design, development, and digital growth.', 'zephyrics-studio' ); ?></p>
            </header>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            
            <div class="grid grid-3">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: var(--radius-default); margin-bottom: var(--spacing-lg);' ) ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="post-meta text-small text-muted mb-sm">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                            <?php if ( has_category() ) : ?>
                                <span> · </span>
                                <?php the_category( ', ' ); ?>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="card-title">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        
                        <p class="card-description">
                            <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                        </p>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-ghost btn-sm mt-md">
                            <?php esc_html_e( 'Read More', 'zephyrics-studio' ); ?>
                            <?php zephyrics_icon( 'arrow-right' ); ?>
                        </a>
                    </article>
                    
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-xl text-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '← Previous', 'zephyrics-studio' ),
                    'next_text' => __( 'Next →', 'zephyrics-studio' ),
                ) );
                ?>
            </div>

        <?php else : ?>
            
            <div class="text-center">
                <h2><?php esc_html_e( 'Nothing Found', 'zephyrics-studio' ); ?></h2>
                <p class="text-muted"><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'zephyrics-studio' ); ?></p>
            </div>
            
        <?php endif; ?>

    </div>
</div>

<?php
get_footer();
