<?php

namespace mediatrax\maps\Controller;
use Pagekit\Application as App;
class mapsController
{
    /**
     * @Access(admin=true)
     */
    public function indexAction()
    {
        return [
            '$view' => [
                'title' => __('Map Settings'),
                'name'  => 'maps:views/admin/settings.php'
            ],
            '$data' => [
                'config' => App::module('maps')->config()
            ]
        ];
    }
}