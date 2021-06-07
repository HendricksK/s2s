<?php

namespace App\Domain\Models;

use Dotenv;
use PDO;

class Database 
{
    public function dbInit() {

        $dotenv = Dotenv\Dotenv::createImmutable('../../');
        $dotenv->safeLoad();

        if ($dotenv) {
            try {
                $pdo = new PDO('mysql:host=' . $_ENV['DBHOST'] 
                            . ';dbname=' . $_ENV['DBNAME'],
                            $_ENV['DBUSER'], 
                            $_ENV['DBPASS']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return $pdo;    
            } catch (PDOException $e) {
                error_log($e);
                // TODO: Set up logging
            }
            
                
        } else {
            // Heroku
            try {
                $pdo = new PDO('mysql:host=' . getenv('DBHOST') 
                            . ';dbname=' . getenv('DBNAME'),
                            getenv('DBUSER'), 
                            getenv('DBPASS'));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            } catch (PDOException $e) {
                error_log($e);
                // TODO: Set up logging
            }
               
        }
    }
}