<?php
/**
 * The template for displaying the front page
 *
 * @package ZephyricsStudio
 */

get_header();
?>

<!-- Hero Section -->
<?php get_template_part( 'template-parts/hero' ); ?>

<!-- Services Section -->
<?php get_template_part( 'template-parts/services' ); ?>

<!-- Why Us Section -->
<?php get_template_part( 'template-parts/why-us' ); ?>

<!-- Process Section -->
<?php get_template_part( 'template-parts/process' ); ?>

<!-- Tools Section -->
<?php get_template_part( 'template-parts/tools' ); ?>

<?php
get_footer();
