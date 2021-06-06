<?php

require '../../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();

$dotenv = Dotenv\Dotenv::createImmutable('../.env');
$dotenv->safeLoad();

if ($dotenv) {
    // $container['db'] = function ($c) {
    //     $db = $c['settings']['db'];
    //     $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
    //         $db['user'], $db['pass']);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     return $pdo;
    // };    
} else {
// Heroku
    // $container['db'] = function ($c) {
    //     $db = $c['settings']['db'];
    //     $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
    //         $db['user'], $db['pass']);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     return $pdo;
    // };
}

// Set up routes.
require '../Routes/api.php';

$app->run();

