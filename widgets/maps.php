<?php

return [

    'name' => 'maps/mapswidget',

    'label' => 'maps',

    'events' => [

        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('widget-maps', 'maps:app/bundle/widget-options.js', ['~widgets']);
        }

    ],

    'render' => function ($widget) use ($app) {

        // ...

        return $app->view('maps/widget.php');
    }

];