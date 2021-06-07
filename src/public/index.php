<?php

require '../../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();

// Set up routes.
require '../Routes/api.php';

$app->run();

