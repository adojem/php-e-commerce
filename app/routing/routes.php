<?php
$router = new AltoRouter;
// $router->setBasePath('/php/ecommerce/public');

$router->map(
   'GET',
   '/',
   'App\Controllers\IndexController@show',
   'home'
);

$router->map(
   'GET',
   '/products','App\Controllers\IndexController@showAllProducts', 
   'all_products'
);

$router->map(
   'GET',
   '/featured','App\Controllers\IndexController@featuredProducts', 
   'feature_product'
);

$router->map(
   'GET',
   '/get-products','App\Controllers\IndexController@getProducts', 
   'get_product'
);

$router->map(
   'GET',
   '/get-allproducts','App\Controllers\IndexController@getAllProducts', 
   'get_all_products'
);

$router->map(
   'POST',
   '/load-more/[a:action]',
   'App\Controllers\IndexController@loadMoreProducts', 
   'load_more_product'
);

// Product
$router->map(
   'GET',
   '/product/[i:id]',
   'App\Controllers\ProductController@show',
   'product'
);

$router->map(
   'GET',
   '/product-details/[i:id]',
   'App\Controllers\ProductController@get',
   'product-details'
);

require_once __DIR__ . '/cart.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin_routes.php';
