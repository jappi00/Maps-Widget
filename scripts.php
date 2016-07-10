<?php

return [

    /*
     * Installation hook.
     */
    'install' => function ($app) {

        /*
        $util = $app['db']->getUtility();

        if ($util->tableExists('@twitter_greetings') === false) {
            $util->createTable('@twitter_greetings', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('name', 'string', ['length' => 255, 'default' => '']);
                $table->setPrimaryKey(['id']);
            });
        }
        */

    },

    /*
     * Enable hook
     *
     */
    'enable' => function ($app) {

    },

    /*
     * Uninstall hook
     *
     */
    'uninstall' => function ($app) {

        // remove the config
        $app['config']->remove('maps');

        /*
        $util = $app['db']->getUtility();

        if ($util->tableExists('@twitter_greetings')) {
            $util->dropTable('@twitter_greetings');
        }
        */
    },

    /*
     * Runs all updates that are newer than the current version.
     *
     */
    'updates' => [

        /*
        '0.5.0' => function ($app) {

        },

        '0.9.0' => function ($app) {

        },
        */

    ],

];