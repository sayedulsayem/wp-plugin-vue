# WordPress Plugin with Vuejs

A WordPress [Vue.js](https://vuejs.org/) starter plugin with required toolbelts 😎

## 📦 What it ships with?

 - Pre-configured webpack config
   - Babel loader, Vue loader, CSS and SCSS loader
   - Uglify JS for production
   - Separate `frontend.js` and `admin.js`
   - Extracted CSS/SCSS to separate `frontend.css` and `admin.css` files.
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
- For activating auto reloading with browser with **Browsersync** you have create a `config.json` from `config.json.example` file and replace `proxyURL` with your app settings page url
- It's support JavaScript string translation. Many people struggle to make translatable of vue components string. It is supporting that but you have to generate `.pot` file `WP-CLI`. Just install [WP-CLI](https://make.wordpress.org/cli/handbook/guides/installing/) and run `npm run wp-cli-pot`

## 🎁 Preview

![screenshot](https://github.com/sayedulsayem/wp-plugin-vue/blob/main/assets/img/wp-plugin-vue.gif?raw=true)

## About

Made by [Sayedul Sayem](https://github.com/sayedulsayem).

*Found anything that can be improved? You are welcome to contribute.*