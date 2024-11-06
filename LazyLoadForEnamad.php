<?php

/**
 * Plugin Name: LazyLoadForEnamad
 * 
 * Description: Create a LazyLoadForEnamad from an input field.
 * 
 * Version: 1.0.0
 * 
 * Author: hassan Ali Askari
 * Author URI: https://t.me/hassan7303
 * Plugin URI: https://github.com/hassan7303
 * 
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * 
 * Email: hassanali7303@gmail.com
 * Domain Path: https://hsnali.ir
 */


if (!defined("ABSPATH")) {
    exit;
}


/**
 * Adds a menu item to the admin panel.
 *
 * @return void
 */
add_action('admin_menu', 'custom_shortcode_menu');
function custom_shortcode_menu(): void
{
    add_menu_page('Custom Shortcode', 'Custom Shortcode', 'manage_options', 'custom-shortcode', 'custom_shortcode_page');
}


/**
 * Displays the settings page content.
 *
 * @return void
 */
function custom_shortcode_page(): void
{
    ?>
    <div class="wrap">
        <h1>شورتکد ساز اینماد</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_shortcode_options');
            do_settings_sections('custom_shortcode');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


/**
 * Registers settings and adds sections and fields to the settings page.
 *
 * @return void
 */
add_action('admin_init', 'custom_shortcode_settings');
function custom_shortcode_settings(): void
{
    register_setting('custom_shortcode_options', 'custom_shortcode_content');

    add_settings_section('custom_shortcode_section', 'پس از ذخیره از این شورت کد استفاده کنید [custom_html]', null, 'custom_shortcode');

    add_settings_field('custom_shortcode_field', 'شورتکد اینماد خود را وارد کنید', 'custom_shortcode_field_callback', 'custom_shortcode', 'custom_shortcode_section');
}


/**
 * Handles the AJAX request for the custom shortcode.
 */
add_action('wp_ajax_load_custom_shortcode', 'load_custom_shortcode');
add_action('wp_ajax_nopriv_load_custom_shortcode', 'load_custom_shortcode');
function load_custom_shortcode()
{
    // Retrieve the saved content from the options
    $content = get_option('custom_shortcode_content', '');

    if (!empty($content)) {
        echo $content;
    } else {
        echo 'محتوای شورتکد یافت نشد.';
    }

    wp_die(); // این تابع برای خاتمه دادن به AJAX الزامی است
}


/**
 * Enqueues the JavaScript for lazy loading.
 */
add_action('wp_enqueue_scripts', 'custom_shortcode_enqueue_scripts');
function custom_shortcode_enqueue_scripts()
{
    // Ensure jQuery is enqueued
    wp_enqueue_script('jquery');

    // Register and enqueue the lazy-load script
    wp_enqueue_script('lazy-load-script', plugin_dir_url(__FILE__) . '/lazy-load.js', array('jquery'), null, true);

    // Pass ajaxurl to the script
    wp_localize_script('lazy-load-script', 'custom_ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}


/**
 * AJAX handler to load the shortcode content.
 */
add_action('wp_ajax_load_custom_shortcode', 'load_custom_shortcode_callback');
function load_custom_shortcode_callback()
{
    echo get_option('custom_shortcode_content', '');
    wp_die(); // Required to properly end the AJAX request
}


/**
 * Shortcode function to display placeholder for AJAX-loaded content.
 *
 * @return string
 */
add_shortcode('custom_html', 'custom_shortcode_function');
function custom_shortcode_function(): string
{
    ob_start();
    ?>
    <div class="shortcode-placeholder">در حال بارگذاری...</div>
    <?php
    return ob_get_clean();
}