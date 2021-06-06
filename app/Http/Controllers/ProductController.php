<?php

namespace App\Http\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// use App\Http\Controllers\ProductControllerMeta;
use App\Http\Interfaces\Crud;

class ProductController implements Crud
{
    public function get(Request $request, Response $response, array $args) {
        $return = [
            'data' => 'user controller',
            'status' => 200
        ];

        return $return;
    }

    public function create(Request $request, Response $response, array $args) {
        $return = [
            'data' => 'user controller',
            'status' => 200
        ];

        return $return;
    }

    public function update(Request $request, Response $response, array $args) {
        $return = [
            'data' => 'user controller',
            'status' => 200
        ];

        return $return;
    }

    public function delete(Request $request, Response $response, array $args) {
        $return = [
            'data' => 'user controller',
            'status' => 200
        ];

        return $return;
    }

} 