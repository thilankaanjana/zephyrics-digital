<?php
/**
 * The template for displaying all pages
 *
 * @package ZephyricsStudio
 */

get_header();
?>

<div class="section pt-section">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="section-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                
                <div class="page-content" style="max-width: 896px; margin: 0 auto;">
                    <?php the_content(); ?>
                    
                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zephyrics-studio' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                
            </article>
            
            <?php
            // If comments are open or there are comments, load the comment template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
</div>

<?php
get_footer();
