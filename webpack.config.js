module.exports = [

    {
        entry: {
            "settings": "./app/views/views.js",
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
        module: {
            loaders: [
                { test: /\.vue$/, loader: "vue" }
            ]
        }
    }

];