<?php

require '../../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->safeLoad();

if ($dotenv) {
    $container['db'] = function ($c) {
        $pdo = new PDO('mysql:host=' . $_ENV['DBHOST'] 
                        . ';dbname=' . $_ENV['DBNAME'],
                        $_ENV['DBUSER'], 
                        $_ENV['DBPASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };    
} else {
    // Heroku
    $container['db'] = function ($c) {
        $pdo = new PDO('mysql:host=' . getenv('DBHOST') 
                        . ';dbname=' . getenv('DBNAME'),
                        getenv('DBUSER'), 
                        getenv('DBPASS'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };    
}

// Set up routes.
require '../Routes/api.php';

$app->run();

