<?php

namespace App\Http\Intefaces;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

interface Crud  
{
    public function get(Request $request, Response $response, array $args);
    public function create(Request $request, Response $response, array $args);
    public function update(Request $request, Response $response, array $args);
    public function delete(Request $request, Response $response, array $args);
} 