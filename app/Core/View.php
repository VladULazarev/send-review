<?php

namespace App\Core;

use App\Core\ErrorsHandler;

class View
{
    /**
     * Send the current 'view' to the webpage
     *
     * @param string $path a part of the path to the current 'view'
     * @param array $data current data for the view
     * @throws ErrorsHandler if the current 'view' does not exists
     */
    public static function render(string $path, $data = null): void
    {
        // If the 'view' not found
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "/resources/views/" . $path . ".php")) {

            ErrorsHandler::notFound();
        }

        include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/" . $path . ".php";
    }
}
