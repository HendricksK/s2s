<?php

namespace App\Http\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// use App\Http\Controllers\ProductControllerMeta;
use App\Http\Interfaces\Crud;

use App\Domain\Models\Product;

class ProductController implements Crud
{
    public function get(Request $request, array $args) {
        $product = new Product();
        // TODO: Need to add a range value, and a max return
        $return = [
            'data' => $product->get($args['id']),
            'status' => 200
        ];

        return $return;
    }

    public function getAll(Request $requests) {
        $product = new Product();

        $return = [
            'data' => $product->getAll(),
            'status' => 200
        ];

        return $return;
    }

    public function create(Request $request) {
        
        $newproduct = $request->getParsedBody();
        $product = new Product();
        $data = $product->create($newproduct);
        $return = [
            'data' => $data,
            'status' => 200
        ];
        if (empty($data)) {
            $return['status'] = 400;
        }
        
        return $return;
    }

    public function update(Request $request) {
        $return = [
            'data' => '',
            'status' => 400
        ];

        return $return;
    }

    public function delete(Request $request) {
        $return = [
            'data' => '',
            'status' => 400
        ];

        return $return;
    }

} 