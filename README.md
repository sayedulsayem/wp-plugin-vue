# WordPress Plugin with Vuejs

A WordPress [Vue.js](https://vuejs.org/) starter plugin with required toolbelts 😎

## Build & Required Tech Stack
- Vuejs 3
- Webpack 5
- PHP 7.4 or greater
- WordPress 5.0 or greater

## 📦 What it ships with?

 - Pre-configured Webpack config
   - Babel loader, Vue loader, CSS and SCSS loader
   - Separate `vendor.js` with all vendor scripts
   - Uglify JS for production
   - Separate `frontend.js` and `admin.js`
   - Extracted CSS/SCSS to separate `frontend.css` and `admin.css` files.
   - Cross-browser auto prefix included for CSS/SCSS.
   - Auto reloading with Browser with **Browsersync** *([config](config.json))*
 - [Vue](https://vuejs.org/) and [Vue Router](https://router.vuejs.org/en/)
 - Frontend (shortcode) and Backend starter app
 - Modern PHP codebase with [namespace](http://php.net/manual/en/language.namespaces.php) support


## 🚚 Running

1. Clone this repository in your plugins folder
2. Activate the plugin

## 👨‍💻 Post Installation

1. The name of the plugin class is `WpPluginVue`, change the class name with your desired class name.
2. Replace the PHP namespace `SayedulSayem` with your desired name.
3. Replace `wp-plugin-vue` or `WPPV` reference in files.
4. Run `composer install`
5. Run `npm install`
6. To start developing, run `npm run dev` 🤘
7. For production build, run `npm run build` 👍

## ⛑ Some Instructions/ Features
- For activating auto reloading with the browser with **Browsersync** you have to create a `.env` from the `.env.example` file and replace `BROWSERSYNC_PROXY` with your app settings page URL and `BROWSERSYNC_PORT` with your desired port.
- It supports JavaScript string translation. Many people struggle to make translatable vue component strings. It supports that but you have to generate `.pot` file by `WP-CLI`. Just install [WP-CLI](https://make.wordpress.org/cli/handbook/guides/installing/) and run `npm run wp-cli-pot`

## 🎁 Preview

![screenshot](https://raw.githubusercontent.com/sayedulsayem/wp-plugin-vue/master/assets/img/wp-plugin-vue.gif)

## About

Made by [Sayedul Sayem](https://sayedulsayem.com).

*Found anything that can be improved? You are welcome to contribute.*

*Inspired from [Vue WP Starter](https://github.com/tareq1988/vue-wp-starter) by [Tareq Hasan](https://github.com/tareq1988)*
