<?php

namespace SayedulSayem\WpPluginVue\App;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

class Base {

    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init() {
        RegisterAssets::instance()->init();
        Shortcode::instance()->init();
    }
}