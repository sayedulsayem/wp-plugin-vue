<?php

namespace SayedulSayem\WpPluginVue\Dashboard;

use ftp;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

class Assets {

    use \SayedulSayem\WpPluginVue\Traits\Singleton;
    
    public function init() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    public function enqueue_scripts() {
        wp_enqueue_style( 'wp-plugin-vue-admin' );
        wp_enqueue_script( 'wp-plugin-vue-admin' );
    }
}