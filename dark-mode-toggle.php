<?php
/** Plugin Name: Dark mode toggle
 * Description: Simple dark mode toggle for a website, compatible with divi
 * Version: 1.0.0.
 * Author: Manck
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // exit if accessed directly
}

function dm_enqueue_assets() { //dm is Dark Mode
    if ( is_admin() ) {
        return;
    }

    $plugin_url = plugin_dir_url ( __FILE__ );

    wp_enqueue_style(
        'dm-styles',
        $plugin_url . 'assets/css/dark-mode-toggle.css',
        array(),
        '1.0.0.'
    );

    wp_enqueue_script(
        'dm-script',
        $plugin_url . 'assets/js/dark-mode-toggle.js'
        array(),
        '1.0.0.',
        true 
    );
}

add_action ( 'wp_enqueue_scripts', 'dm_enqueue_assets' );

function dm_render_toggle_button() {
    if ( is_admin() ) {
        return;
    }
    echo '<button id="dm-toggle" class="dm-toggle" type="button" aria-label="Toggle dark mode">
        <span class="dm-icon dm-icon-moon">🌙< </span>
        <span class="dm-icon dm-icon-sun">☀️< </span>
        </button>';
}

add_action ( 'wp_footer', 'dm_render_toggle_button' );
