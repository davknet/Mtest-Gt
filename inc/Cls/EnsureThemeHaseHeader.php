<?php
namespace Inc\Cls;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Class to ensure the theme has get_footer() and provide fallback options.
 */
class EnsureThemeHasFooter {

    /**
     * Checks if the theme has a get_footer() function based on template inclusion.
     */
    public static function checkFooterAvailability() {
        add_action('template_include', function ($template) {
            if (strpos($template, 'footer.php') !== false) {
                // Theme has a footer.php file, likely using get_footer()
                return;
            }

            // Fallback logic if no footer.php found:
            // 1. Attempt to use get_footer() (might not work if theme doesn'  t use it)
            if (function_exists('get_footer')) {
                get_footer();
            } else {
                // 2. Provide a simple default footer or alternative action here
                echo '<div style="text-align: center;">Footer Content</div>';
            }
        });
    }

    // Plugin initialization (optional):
    public static function init() {
        self::checkFooterAvailability();
    }

    // Usage example (if not using init):
    // EnsureThemeHasFooter::checkFooterAvailability();
}

// Register activation hook (optional, if necessary):

