<?php

namespace SayedulSayem\WpPluginVue\Dashboard;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

class AdminMenu
{

    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu()
    {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'wp-plugin-vue';

        $hook = add_menu_page(
            __('WP Plugin Vue', 'wp-plugin-vue'),
            __('WP Plugin Vue', 'wp-plugin-vue'),
            $capability,
            $slug,
            [$this, 'render_page'],
            'dashicons-text',
            30
        );

        if (current_user_can($capability)) {
            $submenu[$slug][] = array(__('App', 'wp-plugin-vue'), $capability, 'admin.php?page=' . $slug . '#/');
            $submenu[$slug][] = array(__('Settings', 'wp-plugin-vue'), $capability, 'admin.php?page=' . $slug . '#/settings');
        }

        // add_action('load-' . $hook, [$this, 'init_hooks']);
    }

    public function render_page() {
        echo '<div class="wrap"><div id="wp-plugin-vue-dashboard"></div></div>';
    }
}
