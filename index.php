<?php
require __DIR__ . '/vendor/autoload.php';
$routes = require __DIR__ . '/routes/api.php';
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$endpoint = $_POST['endpoint'] ?? '';
use App\Controllers\Contracts\ContractsController;
use App\Requests\Contracts\ContractsRequest;

[$controllerClass, $method] = $routes[$method][$endpoint];
$request = new ContractsRequest(); 
$controller = new ContractsController();
$controller->$method($request);
