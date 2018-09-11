<?php

use Philo\Blade\Blade;

function view($path, array $data = []) {
   $view = __DIR__ . '/../../resources/views';
   $cache = __DIR__ . '/../../bootstrap/cache';
   $blade = new Blade($view, $cache);

   echo $blade->view()->make($path, $data)->render();
}

function make($filename, $data) {
   extract($data);

   ob_start();
   // include template
   include(__DIR__ . '/../../resources/views/emails/' . $filename . '.php');
   // get content of the file
   $content = ob_get_contents();
   ob_end_clean();

   return $content;
}

function slug($value) {
   $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtoLower($value));

   $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

   return trim($value, '-');
}
