<?php
/*
Plugin Name: WP Plugin Vue
Plugin URI: https://github.com/sayedulsayem/wp-plugin-vue/
Description: A WordPress Vue.js starter plugin
Version: 0.0.1
Author: Sayedul Sayem
Author URI: https://sayedulsayem.com/
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: wp-plugin-vue
Domain Path: /i18n
*/

namespace SayedulSayem\WpPluginVue;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;


if (!class_exists(WpPluginVue::class) && is_readable(__DIR__ . '/vendor/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once __DIR__ . '/vendor/autoload.php';
}

class_exists(WpPluginVue::class) && WpPluginVue::instance()->init();
