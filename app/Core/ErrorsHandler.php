<?php

namespace App\Core;

class ErrorsHandler
{
    /**
     * If a webpage or data were not found
     */
    public static function notFound(): void
    {
        header('Location: /404.php');
        exit();
    }
}
