<?php

/** Autoloader */
require_once "vendor/autoload.php";

$canonicalLink = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

/** Get current route  */
App\Core\Router::getRoute();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Vlad, https://www.getyoursite.info">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="canonical" href="<?= $canonicalLink; ?>">

    <title>Send Review App</title>
    <meta name="description" content="Send Review App">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/app.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </head>

  <body>

    <div class="container">

        <main>

          <?php  App\Core\App::run() ?>

        </main>

    </div>

    <!-- JS SCRIPTS AND CSS -->
    <script async src="/resources/js/app.js"></script>
  </body>
</html>
