module.exports = [

    {
        entry: {
            "settings": "./app/views/views.js",
            "widget-options": "./app/components/widget-options.vue",
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