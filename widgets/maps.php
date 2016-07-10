<?php

return [

    'name' => 'maps/mapswidget',

    'label' => 'maps',

    'render' => function ($widget) use ($app) {

        // ...

        return $app->view('maps/widget.php');
    }

];