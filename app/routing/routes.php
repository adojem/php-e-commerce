<?php
$router = new AltoRouter;
// $router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
$router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'feature_product');

require_once __DIR__ . '/admin_routes.php';
