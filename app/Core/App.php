<?php

namespace App\Core;

use App\Http\Controllers\HomeController;

class App
{
    /**
     * Invoke a 'Controller' according to 'ROUTE[0]', see App\Core\Router.pnp
     *
     * @see /index.php
     */
    public static function run()
    {
        if ( ROUTE[0] == "home") { HomeController::index(); }
        else { ErrorsHandler::notFound(); }
    }
}
