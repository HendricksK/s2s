<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMetaController;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ' target='_blank'>Never gonna give you up</a>");

    return $response;
});

$app->group('/products', function(\Slim\App $app) {
    $app->get('/all', function (Request $request, Response $response, array $args) {
        $productController = new ProductController();
        $data = $productController->getAll($request, $response, $args);
        $response->getBody()->write(json_encode($data));
        return $response;
    });
    $app->get('/product/{id}', function (Request $request, Response $response, array $args) {
        $productController = new ProductController();
        $data = $productController->get($request, $response, $args);
        $response->getBody()->write(json_encode($data));
        return $response;
    });
});

$app->group('/meta', function(\Slim\App $app) {
    $app->get('/all', function (Request $request, Response $response, array $args) {
        $productMetaController = new ProductMetaController();
        $data = $productMetaController->getAll($request, $response, $args);
        $response->getBody()->write(json_encode($data));
        return $response;
    });
    $app->get('/attribute/{id}', function (Request $request, Response $response, array $args) {
        $productMetaController = new ProductMetaController();
        $data = $productMetaController->get($request, $response, $args);
        $response->getBody()->write(json_encode($data));
        return $response;
    });
});
