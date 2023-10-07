const webpack = require('webpack');
const path = require('path');
const package = require('./package.json');
const { VueLoaderPlugin } = require('vue-loader');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const dotenv = require('dotenv');

dotenv.config();

// Naming and path settings
var entryPoint = {
    frontend: './src/frontend/main.js',
    admin: './src/admin/main.js',
    style: './assets/sass/style.scss',
};

// Export path
var exportPath = path.resolve(__dirname, './assets/js');

module.exports = (env, args) => {
    const devMode = (args.mode !== 'production');

    var minimizer = [];
    if (!devMode) {
        minimizer.push(new TerserJSPlugin({
            extractComments: false,
            terserOptions: {
                mangle: {
                    reserved: ['__', '_x', '_n', '_nx']
                },
            }
        }));
        minimizer.push(new CssMinimizerPlugin());
    }

    return {
        entry: entryPoint,
        mode: devMode ? 'development' : 'production',
        output: {
            path: exportPath,
            // filename: devMode ? '[name].js': '[name].min.js',
            filename: '[name].js',
            clean: true,
        },

        resolve: {
            alias: {
                'vue': 'vue/dist/vue.esm-bundler.js',
                '@': path.resolve('./src/'),
                'frontend': path.resolve('./src/frontend/'),
                'admin': path.resolve('./src/admin/'),
            },
            modules: [
                path.resolve('./node_modules'),
                path.resolve(path.join(__dirname, 'src/')),
            ]
        },

        optimization: {
            runtimeChunk: 'single',
            splitChunks: {
                cacheGroups: {
                    vendor: {
                        test: /[\\\/]node_modules[\\\/]/,
                        name: 'vendors',
                        chunks: 'all'
                    }
                }
            },
            minimizer: minimizer,
        },

        plugins: [
            new MiniCssExtractPlugin({
                // filename: devMode ? '../css/[name].css' : '../css/[name].min.css',
                filename: '../css/[name].css',
                ignoreOrder: false,
            }),

            // make a config.json file from config.json.example and input your app settings url. then uncommit below code to auto reload every change of your plugin.
            // new BrowserSyncPlugin({
            //     proxy: process.env.BROWSERSYNC_PROXY,
            //     port: parseInt(process.env.BROWSERSYNC_PORT),
            //     files: [
            //         '**/*.php'
            //     ],
            //     cors: true,
            //     reloadDelay: 0
            // }),
            new VueLoaderPlugin(),
            ...(devMode ? [] : [ new CssMinimizerPlugin() ]),
            ...(devMode ? [] : [ new webpack.DefinePlugin({
                __VUE_OPTIONS_API__: true,
                __VUE_PROD_DEVTOOLS__: false,
            }) ]),
        ],

        module: {
            rules: [
                {
                    test: /\.vue$/,
                    loader: 'vue-loader',
                },
                {
                    test: /\.js$/,
                    use: 'babel-loader',
                    exclude: [ /node_modules/, /assets/ ]
                },
                {
                    test: /\.png$/,
                    use: [
                        {
                            loader: 'url-loader',
                            options: {
                                mimetype: 'image/png'
                            }
                        }
                    ]
                },
                {
                    test: /\.svg$/,
                    use: 'file-loader'
                },
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [
                        'style-loader',
                        'vue-style-loader',
                        {
                            loader: MiniCssExtractPlugin.loader,
                            options: {
                                publicPath: (resourcePath, context) => {
                                    return path.relative(path.dirname(resourcePath), context) + '/';
                                },
                                esModule: false,
                                // hmr: process.env.NODE_ENV === 'development',
                            },
                        },
                        'css-loader',
                        'postcss-loader',
                        'sass-loader',
                    ],
                },
            ]
        },
    }
}
