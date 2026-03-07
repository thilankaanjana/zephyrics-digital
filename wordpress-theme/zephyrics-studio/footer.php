</main><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        
        <!-- CTA Section -->
        <div class="footer-cta card-cta">
            <h2><?php echo esc_html( get_theme_mod( 'zephyrics_cta_title', 'Ready to Transform Your Digital Presence?' ) ); ?></h2>
            <p class="text-large text-muted mb-lg"><?php echo esc_html( get_theme_mod( 'zephyrics_cta_subtitle', "Let's create something amazing together. Get in touch and let's discuss your project." ) ); ?></p>
            <div class="flex-center gap-md">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary btn-lg">
                    <?php esc_html_e( 'Start Your Project', 'zephyrics-studio' ); ?>
                    <?php zephyrics_icon( 'arrow-right' ); ?>
                </a>
            </div>
        </div>

        <!-- Footer Grid -->
        <div class="footer-grid">
            
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="logo-icon">Z</span>
                        <span class="logo-text">Zephyrics<span>Studio</span></span>
                    <?php endif; ?>
                </a>
                <p><?php echo esc_html( get_theme_mod( 'zephyrics_footer_tagline', 'We build brands that dominate digital. Design, technology, and growth solutions for modern businesses.' ) ); ?></p>
                
                <!-- Social Links -->
                <div class="footer-social">
                    <?php if ( get_theme_mod( 'zephyrics_social_twitter' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'zephyrics_social_twitter' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                            <?php zephyrics_icon( 'twitter' ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'zephyrics_social_linkedin' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'zephyrics_social_linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <?php zephyrics_icon( 'linkedin' ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'zephyrics_social_instagram' ) ) : ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'zephyrics_social_instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <?php zephyrics_icon( 'instagram' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer Widgets / Columns -->
            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                    <h4><?php esc_html_e( 'Services', 'zephyrics-studio' ); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/services/web-design' ) ); ?>"><?php esc_html_e( 'Web Design', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/branding' ) ); ?>"><?php esc_html_e( 'Branding', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/seo' ) ); ?>"><?php esc_html_e( 'SEO', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/development' ) ); ?>"><?php esc_html_e( 'Development', 'zephyrics-studio' ); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else : ?>
                    <h4><?php esc_html_e( 'Company', 'zephyrics-studio' ); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>"><?php esc_html_e( 'Portfolio', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'zephyrics-studio' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'zephyrics-studio' ); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else : ?>
                    <h4><?php esc_html_e( 'Contact', 'zephyrics-studio' ); ?></h4>
                    <ul>
                        <li><?php echo esc_html( get_theme_mod( 'zephyrics_contact_email', 'hello@zephyrics.com' ) ); ?></li>
                        <li><?php echo esc_html( get_theme_mod( 'zephyrics_contact_phone', '+1 (555) 123-4567' ) ); ?></li>
                        <li><?php echo esc_html( get_theme_mod( 'zephyrics_contact_address', 'San Francisco, CA' ) ); ?></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'zephyrics-studio' ); ?></p>
            
            <div class="footer-legal">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'legal',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                    'fallback_cb'    => function() {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'zephyrics-studio' ); ?></a>
                        <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'zephyrics-studio' ); ?></a>
                        <?php
                    },
                ) );
                ?>
            </div>
        </div>

    </div>
</footer>

<!-- WhatsApp Button -->
<?php if ( get_theme_mod( 'zephyrics_show_whatsapp', true ) ) : ?>
    <a href="<?php echo esc_url( zephyrics_get_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer" class="whatsapp-button" aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'zephyrics-studio' ); ?>">
        <?php zephyrics_icon( 'whatsapp' ); ?>
    </a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
