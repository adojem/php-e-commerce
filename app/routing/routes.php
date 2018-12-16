<?php
$router = new AltoRouter;
// $router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

require_once __DIR__ . '/admin_routes.php';
