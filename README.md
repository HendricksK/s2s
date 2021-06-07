# slimframework php
## runnning on PHP7.4, nginx using docker-composer https://github.com/HendricksK/docker-laravel-postgres-nginx/tree/PHP74 
## running database on heroku, using jaws db, which is based on mariadb
## API calls
## products
## `/products/all`
## `/products/product/{id}`
## meta
## `/meta/all`
## `/attributes/{id}`

## postman post for creation of products and their meta
## `https://documenter.getpostman.com/view/11707400/TzY6AuaH`

## Very basic database class for now, just returns PDO would be good to abstract that layer. 
## Create POST (on going).
## Add Cache layer infront of API, can test with redis locally it is avail would make API calls quicker.
## Install swagger docs to better document API.
## Build a migration script / or find a third party plugin.
## Build out postman collection.

# HOW TO RUN

## git clone repo
## run `composer install`
## run `composer dump-autoload` for autoloading HTTP, Domain. Interfaces
## mv .env.example to .env
## add database credentials
## run the Database\migration_sql files in your preferred database editor
