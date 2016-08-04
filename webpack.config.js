module.exports = [

    {
        entry: {
            "settings": "./app/views/settings.js",
            "widget-options": "./app/components/widget-options.vue",
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
		externals: {
            'uikit': 'UIkit',
            'vue': 'Vue'
        },     
        module: {
            loaders: [
                { test: /\.vue$/, loader: "vue" }
            ]
        }
    }

];