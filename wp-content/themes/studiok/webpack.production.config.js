require("@babel/polyfill");
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const stripInlineComments = require('postcss-strip-inline-comments');
const svgloader = require('svg-url-loader');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const ProgressBarPlugin = require('progress-bar-webpack-plugin');

module.exports = {
  mode: 'production',
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
  // optimization: {
  //   splitChunks: {
  //     cacheGroups: {
  //       commons: {
  //         test: /[\\/]node_modules[\\/]/,
  //         name: "vendors",
  //         filename: 'vendor.bundle.js',
  //         chunks: "all"
  //       }
  //     }
  //   }
  // },
  plugins: [
    new ProgressBarPlugin(),
    new ExtractTextPlugin('app.bundle.css'),
    new UglifyJSPlugin({
      sourceMap: true
    })
  ],
  resolve: {
    modules: [
      path.resolve('node_modules'),
      path.resolve(__dirname, 'src'),
      path.resolve(__dirname, 'src/css')
    ],
  }
};
