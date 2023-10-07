<?php

namespace SayedulSayem\WpPluginVue\App;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

class Shortcode
{

    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init()
    {
        add_shortcode('frontend-vue', [$this, 'render_frontend']);
        add_action('wp_enqueue_scripts', [$this, 'register'], 5);
    }

    public function render_frontend()
    {
        echo '<div id="wp-plugin-vue-frontend"></div>';
    }

    public function register()
    {
        wp_enqueue_style('wp-plugin-vue-frontend');
        wp_enqueue_script('wp-plugin-vue-frontend');
    }
}
