<?php

namespace App\Http\Controllers;

class ProductController implements Crud 
{
    public function get(Request $request, Response $response, array $args);
    public function create(Request $request, Response $response, array $args);
    public function update(Request $request, Response $response, array $args);
    public function delete(Request $request, Response $response, array $args);
} 