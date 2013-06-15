<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require '../zi/bootstrap/autoload.php';

$app = new \Slim\Slim();

require ZI.'routes.php';

// running application \^*^/
$app->run();