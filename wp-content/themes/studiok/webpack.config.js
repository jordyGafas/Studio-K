const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const stripInlineComments = require('postcss-strip-inline-comments');
const customMedia = require("postcss-custom-media")
const svgloader = require('svg-url-loader');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const postcssPresetEnv = require('postcss-preset-env');

module.exports = {
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          use: [
            {
              loader: 'css-loader',
              options: {
                minimize: true,
                sourceMap: true
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                ident: 'postcss'
              }
            },
          ],
        }),
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: 'fonts/'
          }
        }]
      },
      {
        test: /\.(gif|png)$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
          }
        }]
      },
      {
        test: /\.js$/,
        loader: 'babel-loader'
      },
      {
		    test: /\.svg/,
		    use: {
	        loader: 'svg-url-loader',
	        options: {}
		    }
			}
    ]
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'app.bundle.js',
  },
  plugins: [
    new ExtractTextPlugin('app.bundle.css'),
    new BundleAnalyzerPlugin()
  ],
  devtool: 'source-map',
  resolve: {
    alias: {
      "TweenLite": "gsap/src/uncompressed/TweenLite"
    },
    modules: [
      path.resolve('node_modules'),
      path.resolve(__dirname, 'src'),
      path.resolve(__dirname, 'src/css'),
      
    ],
  }
};
