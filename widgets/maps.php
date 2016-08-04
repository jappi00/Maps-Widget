<?php

return [

    'name' => 'maps/mapswidget',

    'label' => 'maps',

    'events' => [

        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('widgetssss', 'maps:js/widget.js', ['~widgets']);
        }

    ],

    'render' => function ($widget) use ($app) {

        // ...

        return $app->view('maps/widget.php');
    }

];