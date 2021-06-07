<?php

namespace App\Http\Interfaces;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

interface Crud  
{
    public function get(Request $request, array $args);
    public function create(Request $request);
    public function update(Request $request);
    public function delete(Request $request);
} 