<?php

// CART
$router->map(
   'POST',
   '/cart',
   'App\Controllers\CartController@addItem', 
   'add_cart_item'
);

$router->map(
   'GET',
   '/cart',
   'App\Controllers\CartController@show', 
   'view_cart'
);

$router->map(
   'GET',
   '/cart/items',
   'App\Controllers\CartController@getCartItems', 
   'get_cart_items'
);

$router->map(
   'POST',
   '/cart/update-qty',
   'App\Controllers\CartController@updateQuantity', 
   'update_cart_qty'
);

$router->map(
   'POST',
   '/cart/remove_item',
   'App\Controllers\CartController@removeItem', 
   'remove_cart_item'
);

$router->map(
   'GET',
   '/cart/clear_items',
   'App\Controllers\CartController@clearItems', 
   'clear_cart_items'
);

// Payments
$router->map(
   'POST',
   '/cart/payment',
   'App\Controllers\CartController@checkout', 
   'handle_payment'
);

$router->map(
   'POST',
   '/paypal/create-payment',
   'App\Controllers\CartController@paypalCreatePayment', 
   'paypal_create_payment'
);

$router->map(
   'POST',
   '/paypal/execute-payment',
   'App\Controllers\CartController@paypalExecutePayment', 
   'paypal_execute_payment'
);
