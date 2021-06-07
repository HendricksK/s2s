<?php

namespace App\Http\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \App\Http\Interfaces\Crud;
use \App\Domain\Models\ProductMeta;

class ProductMetaController implements Crud 
{
    public function get(Request $request, Response $response, array $args) {
        $productMeta = new ProductMeta();
        // TODO: Need to add a range value, and a max return
        $return = [
            'data' => $productMeta->get($args['id']),
            'status' => 200
        ];

        return $return;
    }

    public function getAll(Request $request, Response $response, array $args) {
        $productMeta = new ProductMeta();

        $return = [
            'data' => $productMeta->getAll(),
            'status' => 200
        ];

        return $return;
    }

    public function create(Request $request, Response $response, array $args) {
        

        $return = [
            'data' => '',
            'status' => 200
        ];

        return $return;
    }

    public function update(Request $request, Response $response, array $args) {
        $return = [
            'data' => '',
            'status' => 200
        ];

        return $return;
    }

    public function delete(Request $request, Response $response, array $args) {
        $return = [
            'data' => '',
            'status' => 200
        ];

        return $return;
    }
    
} 