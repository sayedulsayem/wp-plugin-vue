<?php

namespace SayedulSayem\WpPluginVue;

// If this file is called directly, abort.
defined('ABSPATH') || exit;


class WpPluginVue
{
    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init()
    {
        $this->define_constants();

        register_activation_hook( WPPV_PATH.'wp-plugin-vue.php', [ $this, 'activate']);
        register_deactivation_hook( WPPV_PATH.'wp-plugin-vue.php', [ $this, 'deactivate']);
        register_uninstall_hook( WPPV_PATH.'wp-plugin-vue.php', [ __CLASS__ , 'uninstall']);

        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
    }

    public function define_constants() {
        define( 'WPPV_VERSION', defined('WPPV_DEV')? time(): '0.0.1' );
        define( 'WPPV_PATH', \plugin_dir_path( __DIR__ ) );
        define( 'WPPV_URL',  \plugin_dir_url( __DIR__ ) );
    }

    public function init_plugin() {
        $this->includes();
        $this->init_hooks();
    }

    public function includes() {
        Dashboard\Base::instance()->init();
        App\Base::instance()->init();
    }

    public function init_hooks() {
        // Localize our plugin
        add_action( 'init', array( $this, 'localization_setup' ) );
    }

    public function localization_setup() {
        load_plugin_textdomain( 'wp-plugin-vue', false, WPPV_PATH . 'i18n/' );
    }

    public function activate() {
        $installed = get_option( 'wp-plugin-vue_installed' );

        if ( ! $installed ) {
            update_option( 'wp-plugin-vue_installed', time() );
        }

        update_option( 'wp-plugin-vue_version', WPPV_VERSION );
    }

    public function deactivate() {
        // do something on deactivation
    }

    public static function uninstall() {
        // clear database
    }
}
