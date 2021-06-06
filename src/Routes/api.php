<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductControllerMeta;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ' target='_blank'>Never gonna give you up</a>");

    return $response;
});

$app->get('/random', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ' target='_blank'>Never gonna give you up</a>");

    return $response;
});

$app->group('/products', function(\Slim\App $app) {
    $app->get('/product/all', function (Request $request, Response $response, array $args) {
        $productController = new ProductController();

        $data = json_encode($productController->get($request, $response, $args));
        $response->getBody()->write($data);
        return $response;
    });
    $app->get('/product{id}', function (Request $request, Response $response, array $args) {
        $response->getBody()->write("<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ' target='_blank'>Never gonna give you up</a>");
        return $response;
    });
});
