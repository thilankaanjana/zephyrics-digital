/**
 * ZephyricsStudio Customizer Live Preview
 *
 * @package ZephyricsStudio
 */

(function($) {
    'use strict';

    // Primary Color
    wp.customize('zephyrics_primary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary-color', to);
        });
    });

    // Secondary Color
    wp.customize('zephyrics_secondary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary-dark', to);
        });
    });

    // Background Color
    wp.customize('zephyrics_background_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--background-color', to);
        });
    });

    // Text Color
    wp.customize('zephyrics_text_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--text-color', to);
        });
    });

    // Border Radius
    wp.customize('zephyrics_border_radius', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--radius-default', to + 'px');
        });
    });

})(jQuery);
