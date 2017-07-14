<?php

use Pagekit\Application;

/*
 * This array is the module definition.
 * It's used by Pagekit to load your extension and register all things
 * that your extension provides (routes, menu items, php classes etc)
 */
return [

    /*
     * Define a unique name.
     */
    'name' => 'maps',

    /*
     * Define the type of this module.
     * Has to be 'extension' here. Can be 'theme' for a theme.
     */
    'type' => 'extension',

    /*
     * Main entry point. Called when your extension is both installed and activated.
     * Either assign an closure or a string that points to a PHP class.
     * Example: 'main' => 'mediatrax\\maps\\mapsExtension'
     */
    'main' => function (Application $app) {
        // bootstrap code
    },

    /*
     * Register all namespaces to be loaded.
     * Map from namespace to folder where the classes are located.
     * Remember to escape backslashes with a second backslash.
     */
    'autoload' => [
        'mediatrax\\maps\\' => 'src'
    ],

    /*
     * Define nodes. A node is similar to a route with the difference
     * that it can be placed anywhere in the menu structure. The
     * resulting route is therefore determined on runtime.
     */
    'nodes' => [

    ],

    /*
     * Define menu items for the backend.
     */
    'menu' => [

    ],

    /*
     * Define permissions.
     * Will be listed in backend and can then be assigned to certain roles.
     */
    'permissions' => [

    ],

    /*
     * Link to a views screen from the extensions listing.
     */
    'views' => '@maps/admin/views',

    /*
     * Default module configuration.
     * Can be overwritten by changed config during runtime.
     */
    'config' => [
    ],

    /*
     * Listen to events.
     */
    'events' => [
    ],

    'widgets' => [

        'widgets/maps.php'

    ],

    'routes' => [
        '@maps' => [
            'path' => '/maps',
            'controller' => 'mediatrax\\maps\\Controller\\mapsController',
        ]
    ],
    'menu' => [
        'maps' => [
            'label' => 'maps',
            'url' => '@maps',
            'icon' => 'maps:/icon.svg'
        ],
		'maps: settings' => [
            'label' => 'Settings',
            'parent' => 'maps',
            'url' => '@maps/settings',
            'active' => '@maps/settings*',
            'access' => 'system: access settings'
        ]
    ],
    'resources' => [
        'maps:' => ''
    ],
    'config' => [
        'key' => 'Your Key',
        'zoomControl' => 'true',
        'mapTypeControl' => 'true',
        'scaleControl' => 'true',
        'streetViewControl' => 'true',
        'rotateControl' => 'true',
        'mapTypeControlStyle' => 'DEFAULT',
        'zoom' => '10',
        'infowindow' => 'true',
        'height' => '500',
		'scrollWheel' => 'true',
		'draggable' => 'true',
		'styler_invert_lightness' => 'false',
		'styler_hue' => '#f4f6fa',
		'styler_saturation' => '0',
		'styler_lightness' => '0',
		'styler_gamma' => '1',
		'marker' => '2',
		'popup_max_width' => '150',
		'locale' => 'en_GB',
		'language' => 'en',
		'region' => 'EN'
    ]

];
