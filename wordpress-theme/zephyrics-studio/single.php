<?php
/**
 * The template for displaying single posts
 *
 * @package ZephyricsStudio
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'section pt-section' ); ?>>
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <!-- Post Header -->
            <header class="section-header" style="margin-bottom: var(--spacing-2xl);">
                <?php if ( has_category() ) : ?>
                    <div class="mb-md">
                        <?php
                        $categories = get_the_category();
                        if ( $categories ) {
                            echo '<span class="section-label">' . esc_html( $categories[0]->name ) . '</span>';
                        }
                        ?>
                    </div>
                <?php endif; ?>
                
                <h1><?php the_title(); ?></h1>
                
                <div class="flex-center gap-md mt-lg text-muted text-small">
                    <?php if ( get_avatar( get_the_author_meta( 'ID' ), 40 ) ) : ?>
                        <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                        </div>
                    <?php endif; ?>
                    <span><?php the_author(); ?></span>
                    <span>·</span>
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <span>·</span>
                    <span><?php echo esc_html( zephyrics_reading_time() ); ?></span>
                </div>
            </header>
            
            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="mb-xl" style="max-width: 1000px; margin: 0 auto var(--spacing-xl);">
                    <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; border-radius: var(--radius-lg);' ) ); ?>
                </div>
            <?php endif; ?>
            
            <!-- Post Content -->
            <div class="post-content" style="max-width: 768px; margin: 0 auto;">
                <?php the_content(); ?>
                
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zephyrics-studio' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
            
            <!-- Tags -->
            <?php if ( has_tag() ) : ?>
                <div class="mt-xl" style="max-width: 768px; margin: var(--spacing-xl) auto 0;">
                    <div class="flex gap-sm" style="flex-wrap: wrap;">
                        <?php
                        $tags = get_the_tags();
                        if ( $tags ) {
                            foreach ( $tags as $tag ) {
                                echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="btn btn-ghost btn-sm">' . esc_html( $tag->name ) . '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Author Box -->
            <div class="card mt-xl" style="max-width: 768px; margin: var(--spacing-xl) auto 0;">
                <div class="flex gap-lg" style="align-items: flex-start;">
                    <?php if ( get_avatar( get_the_author_meta( 'ID' ), 80 ) ) : ?>
                        <div style="width: 80px; height: 80px; border-radius: var(--radius-default); overflow: hidden; flex-shrink: 0;">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <h4 style="margin-bottom: var(--spacing-sm);"><?php the_author(); ?></h4>
                        <p class="text-muted" style="margin-bottom: 0;">
                            <?php echo esc_html( get_the_author_meta( 'description' ) ?: 'Content creator and digital strategist.' ); ?>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Post Navigation -->
            <nav class="mt-xl" style="max-width: 768px; margin: var(--spacing-xl) auto 0;">
                <div class="grid grid-2" style="gap: var(--spacing-lg);">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ( $prev_post ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="card card-small" style="text-decoration: none;">
                            <span class="text-small text-muted">← <?php esc_html_e( 'Previous', 'zephyrics-studio' ); ?></span>
                            <h5 style="margin-top: var(--spacing-sm); margin-bottom: 0; color: var(--text-color);">
                                <?php echo esc_html( get_the_title( $prev_post ) ); ?>
                            </h5>
                        </a>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>
                    
                    <?php if ( $next_post ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="card card-small" style="text-decoration: none; text-align: right;">
                            <span class="text-small text-muted"><?php esc_html_e( 'Next', 'zephyrics-studio' ); ?> →</span>
                            <h5 style="margin-top: var(--spacing-sm); margin-bottom: 0; color: var(--text-color);">
                                <?php echo esc_html( get_the_title( $next_post ) ); ?>
                            </h5>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
            
            <?php
            // If comments are open or there are comments, load the comment template
            if ( comments_open() || get_comments_number() ) :
                ?>
                <div class="mt-xl" style="max-width: 768px; margin: var(--spacing-xl) auto 0;">
                    <?php comments_template(); ?>
                </div>
                <?php
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
</article>

<?php
get_footer();

/**
 * Calculate reading time
 */
function zephyrics_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    
    return sprintf( _n( '%d min read', '%d min read', $reading_time, 'zephyrics-studio' ), $reading_time );
}
