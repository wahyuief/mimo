<?php
require 'vendor/autoload.php';

use Mimo\Core;
use Workerman\Protocols\Http\Response;

$api = new Core('http://0.0.0.0:3000');

$api->count = 4; // process count

$api->get('/', function ($request) {
    $data = json_encode(['status' => 'success', 'data' => ['status' => 'ok']]);
    return new Response(200, ['Content-Type' => 'application/json'], $data);
});

$api->post('/hello', function ($request) {
    $data = json_encode(['name' => $request->post('name')]);
    return new Response(200, ['Content-Type' => 'application/json'], $data);
});

$api->start();