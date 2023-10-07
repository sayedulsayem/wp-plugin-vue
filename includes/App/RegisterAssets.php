<?php

namespace SayedulSayem\WpPluginVue\App;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

class RegisterAssets
{
    use \SayedulSayem\WpPluginVue\Traits\Singleton;

    public function init()
    {
        if (is_admin()) {
            add_action('admin_enqueue_scripts', [$this, 'register'], 5);
        } else {
            add_action('wp_enqueue_scripts', [$this, 'register'], 5);
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register()
    {
        $this->register_scripts($this->get_scripts());
        $this->register_styles($this->get_styles());
    }

    /**
     * Register scripts
     *
     * @param  array $scripts
     *
     * @return void
     */
    private function register_scripts($scripts)
    {
        foreach ($scripts as $handle => $script) {
            $deps      = isset($script['deps']) ? $script['deps'] : false;
            $in_footer = isset($script['in_footer']) ? $script['in_footer'] : false;
            $version   = isset($script['version']) ? $script['version'] : WPPV_VERSION;

            wp_register_script($handle, $script['src'], $deps, $version, $in_footer);
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function register_styles($styles)
    {
        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, WPPV_VERSION);
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts()
    {

        $scripts = [
            'wp-plugin-vue-runtime' => [
                'src'       => WPPV_URL . 'assets/js/runtime.js',
                'version'   => WPPV_VERSION,
                'in_footer' => true
            ],
            'wp-plugin-vue-vendor' => [
                'src'       => WPPV_URL . 'assets/js/vendors.js',
                'version'   => WPPV_VERSION,
                'in_footer' => true
            ],
            'wp-plugin-vue-frontend' => [
                'src'       => WPPV_URL . 'assets/js/frontend.js',
                'deps'      => ['jquery', 'wp-plugin-vue-vendor', 'wp-plugin-vue-runtime', 'wp-i18n'],
                // 'deps'      => ['jquery',],
                'version'   => WPPV_VERSION,
                'in_footer' => true
            ],
            'wp-plugin-vue-admin' => [
                'src'       => WPPV_URL . 'assets/js/admin.js',
                'deps'      => ['jquery', 'wp-plugin-vue-vendor', 'wp-plugin-vue-runtime', 'wp-i18n'],
                // 'deps'      => ['jquery'],
                'version'   => WPPV_VERSION,
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles()
    {

        $styles = [
            'wp-plugin-vue-style' => [
                'src' =>  WPPV_URL . 'assets/css/style.css'
            ],
            'wp-plugin-vue-frontend' => [
                'src' =>  WPPV_URL . 'assets/css/frontend.css'
            ],
            'wp-plugin-vue-admin' => [
                'src' =>  WPPV_URL . 'assets/css/admin.css'
            ],
        ];

        return $styles;
    }
}
