<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Crud;

class ProductMetaController implements Crud 
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