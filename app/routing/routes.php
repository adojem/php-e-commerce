<?php

$router = new AltoRouter;
$router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
