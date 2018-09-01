<?php

$router = new AltoRouter;
$router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// for admin routes
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
