<?php

namespace SayedulSayem\WpPluginVue\Dashboard;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

class Base {

    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init() {
        AdminMenu::instance()->init();
        Assets::instance()->init();
    }
}