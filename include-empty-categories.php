<?php
/**
 * Plugin Name: Include Empty Categories in Yoast Sitemap
 * Plugin URI:  https://yourwebsite.com
 * Description: این پلاگین دسته‌بندی‌های خالی محصولات ووکامرس را در نقشه سایت Yoast قرار می‌دهد.
 * Version:     1.0
 * Author:      Farshad
 * Author URI:  https://acharwp.com
 * License:     GPL-2.0+
 */

if (!defined('ABSPATH')) {
    exit; // جلوگیری از دسترسی مستقیم به فایل
}

add_filter('wpseo_sitemap_exclude_taxonomy', function ($value, $taxonomy) {
    if ($taxonomy === 'product_cat') {
        return false; // جلوگیری از حذف دسته‌بندی محصولات
    }
    return $value;
}, 10, 2);

add_filter('get_terms_args', function ($args, $taxonomies) {
    if (in_array('product_cat', $taxonomies)) {
        $args['hide_empty'] = false; // نمایش دسته‌بندی‌های خالی
    }
    return $args;
}, 10, 2);

