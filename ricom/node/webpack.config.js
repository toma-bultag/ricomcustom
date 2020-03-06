module.exports = {
  entry: {
    // App: "./app/assets/scripts/App.js",
    // Vendor: "./app/assets/scripts/Vendor.js"
    Custom: "./app/assets/scripts/custom.js"
  },
  output: {
    path: "../js/",
    filename: "scripts.js"
  },
  module: {
    loaders: [
      {
        loader: 'babel',
        query: {
          presets: ['es2015']
        },
        test: /\.js$/,
        exclude: /node_modules/
      }
    ]
  }
}