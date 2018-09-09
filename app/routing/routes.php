<?php

$router = new AltoRouter;
$router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// for admin routes
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
$router->map('POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');

// product management routes
$router->map('GET', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map('POST', '/admin/product/', 'App\Controllers\Admin\ProductCategoryController@store', 'create_category');
