<?php

namespace App\Core;

use App\Core\ErrorsHandler;
use App\Core\Validator;

class Router
{

    /**
     * @var ROUTE
     */
    const ROUTE = [];

    /**
     * Defines constant 'ROUTE'
     *
     * @return array 'ROUTE' for the current webpage
     * @throws ErrorsHandler if a 'route' was not defined
     */
    public static function getRoute(): array
    {
        $uriParts = explode('/', $_SERVER['REQUEST_URI']);

        if(! $uriParts[1]) {

            /**
             * It means we have the following uri: http://domainname.com
             */
            define('ROUTE', ['home']);

        } else {
            /**
             * If something wrong is happening
             */
            return ErrorsHandler::notFound();
        }

        return ROUTE;
    }
}
