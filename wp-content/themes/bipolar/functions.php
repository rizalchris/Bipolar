<?php
// Enqueue theme styles and scripts
function bipolar_enqueue_styles() {
    wp_enqueue_style('bipolar-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bipolar_enqueue_styles');

// Disable Gutenberg editor
function bipolar_disable_gutenberg() {
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
}
add_action('init', 'bipolar_disable_gutenberg');

// Disable WP Emojis
function bipolar_disable_wp_emojicons() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
    add_filter('wp_resource_hints', 'disable_emojicons_remove_dns_prefetch', 10, 2);
}
add_action('init', 'bipolar_disable_wp_emojicons');

function disable_emojicons_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function disable_emojicons_remove_dns_prefetch($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
        foreach ($urls as $key => $url) {
            if (strpos($url, $emoji_svg_url_bit) !== false) {
                unset($urls[$key]);
            }
        }
    }
    return $urls;
}

// Setup theme support
function bipolar_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'bipolar_theme_setup');

// Suggestion: Defer parsing of JavaScript
function bipolar_defer_scripts($url) {
    if (is_admin()) return $url;
    if (false === strpos($url, '.js')) return $url;
    return "$url' defer ";
}
add_filter('clean_url', 'bipolar_defer_scripts', 11, 1);

// Suggestion: Enqueue Google Fonts asynchronously
function bipolar_enqueue_google_fonts() {
    wp_enqueue_style('bipolar-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto', array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'bipolar_enqueue_google_fonts');

// Suggestion: Remove query strings from static resources
function bipolar_remove_script_version($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('script_loader_src', 'bipolar_remove_script_version', 15, 1);
add_filter('style_loader_src', 'bipolar_remove_script_version', 15, 1);

// Suggestion: Disable embeds
function bipolar_disable_embeds_code_init() {
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_enqueue_scripts', 'wp_oembed_add_host_js');
    // Remove all embeds rewrite rules.
    add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
}
add_action('init', 'bipolar_disable_embeds_code_init', 9999);

// Turn off oEmbed auto discovery.
function disable_embeds_rewrites($rules) {
    foreach ($rules as $rule => $rewrite) {
        if (false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}
