<?php
/**
 * WP Tailwind Starter functions and definitions
 *
 * @package WP_Tailwind_Starter
 * @author Gabriel Montiel Chamorro (@Gabmon24)
 */

defined('ABSPATH') || exit;

define('WPTS_VERSION', '1.0.0');
define('WPTS_THEME_DIR', get_template_directory());
define('WPTS_THEME_URI', get_template_directory_uri());

/* -------------------------------------------------------------------------
 * THEME SETUP
 * ------------------------------------------------------------------------- */
if (!function_exists('wpts_theme_setup')) :
    function wpts_theme_setup() {
        // Let WordPress manage document title
        add_theme_support('title-tag');

        // Enable Post Thumbnails
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 675, true); // 16:9 ratio

        // HTML5 Markup support
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        // Gutenberg & Block Editor Full Support
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
        add_theme_support('editor-styles');

        // Custom Logo support
        add_theme_support('custom-logo', [
            'height'      => 60,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        // Register Navigation Menus
        register_nav_menus([
            'primary' => __('Menú Principal (Header)', 'wp-tailwind-starter'),
            'footer'  => __('Menú de Pie de Página (Footer)', 'wp-tailwind-starter'),
        ]);

        // Load theme textdomain for i18n
        load_theme_textdomain('wp-tailwind-starter', WPTS_THEME_DIR . '/languages');
    }
endif;
add_action('after_setup_theme', 'wpts_theme_setup');

/* -------------------------------------------------------------------------
 * ENQUEUE SCRIPTS & STYLES (TAILWIND CSS & VANILLA JS)
 * ------------------------------------------------------------------------- */
function wpts_enqueue_assets() {
    // Compiled Tailwind CSS
    wp_enqueue_style(
        'wpts-styles',
        WPTS_THEME_URI . '/dist/css/main.css',
        [],
        WPTS_VERSION
    );

    // Vanilla JS (Zero jQuery, defer loading)
    wp_enqueue_script(
        'wpts-scripts',
        WPTS_THEME_URI . '/dist/js/main.js',
        [],
        WPTS_VERSION,
        true
    );

    // Pass data to script
    wp_localize_script('wpts-scripts', 'wptsData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'siteUrl' => esc_url(home_url('/')),
    ]);
}
add_action('wp_enqueue_scripts', 'wpts_enqueue_assets');

/* -------------------------------------------------------------------------
 * PERFORMANCE CLEANUP (CORE WEB VITALS BOOST)
 * ------------------------------------------------------------------------- */
function wpts_cleanup_head() {
    // Remove Gutenberg bloat if not needed on front
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');

    // Remove Emoji scripts (saves ~15KB and DNS lookups)
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'wpts_cleanup_head');

/* -------------------------------------------------------------------------
 * CUSTOM EXCERPT LENGTH & READ MORE
 * ------------------------------------------------------------------------- */
function wpts_custom_excerpt_length($length) {
    return 24; // 24 words for clean cards
}
add_filter('excerpt_length', 'wpts_custom_excerpt_length');

function wpts_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wpts_custom_excerpt_more');
