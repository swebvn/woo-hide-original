<?php

/**
 * Plugin Name: Woo Hide Original
 * Plugin URI:  https://daudau.cc
 * Description: Hello world
 * Version:     1.1.3
 * Author:      Nguyen Viet
 * Author URI:  https://daudau.cc
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 **/

add_action('plugins_loaded', 'woocommerce_hide_line_item_meta_init');

function woocommerce_hide_line_item_meta_init()
{
    if (!class_exists('WooCommerce')) return;

    add_filter('woocommerce_hidden_order_itemmeta', 'who_hide_line_item_meta', 50);
}

function who_hide_line_item_meta($args)
{
    if (isset($_GET['who'])) {
        return $args;
    }

    return array_merge($args, [
        'Original Name',
        'Original Url',
        'Original Price',
        'Original Image Url',
        'Original Sku',
        'Original Real Name',
    ]);
}
