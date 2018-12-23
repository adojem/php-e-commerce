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
   '/featured','App\Controllers\IndexController@featuredProducts', 
   'feature_product'
);

$router->map(
   'GET',
   '/get-products','App\Controllers\IndexController@getProducts', 
   'get_product'
);

$router->map(
   'POST',
   '/load-more',
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

// CART
$router->map(
   'POST',
   '/cart',
   'App\Controllers\CartController@addItem', 
   'add_cart_item'
);

require_once __DIR__ . '/admin_routes.php';
