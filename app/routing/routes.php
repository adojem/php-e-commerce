<?php

$router = new AltoRouter;
$router->setBasePath('/php/ecommerce/public');
$router->map('GET', '/about', '', 'about_us');

$match = $router->match();

if ($match) {
   echo 'About us page';
}
else {
   header("{$_SERVER['SERVER_PROTOCOL']}404 Not Found");
   echo "Page not found";
}

// var_dump($match);
