<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="logo-icon">Z</span>
                    <span class="logo-text">Zephyrics<span>Studio</span></span>
                <?php endif; ?>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'zephyrics-studio' ); ?>">
                <span class="menu-icon"><?php zephyrics_icon( 'menu' ); ?></span>
                <span class="close-icon hidden"><?php zephyrics_icon( 'close' ); ?></span>
            </button>

            <!-- Navigation -->
            <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'zephyrics-studio' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Zephyrics_Nav_Walker(),
                    'fallback_cb'    => function() {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a>
                        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
                        <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>">Portfolio</a>
                        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-md">Contact</a>
                        <?php
                    },
                ) );
                ?>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-md nav-cta">
                    <?php esc_html_e( 'Get Started', 'zephyrics-studio' ); ?>
                </a>
            </nav>
        </div>
    </div>
</header>

<main id="content" class="site-content">
