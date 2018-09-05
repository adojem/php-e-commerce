<?php
namespace App\Classes;

class Redirect {

   /**
    * Redirect to specific page
    * $param $apge
    */
   public static function to($page) {
      header("Location: $page");
   }

   /**
    * Redirect to same page
    */
   public static function back() {
      $uri = $_SERVER['REQUREST_URI'];
      header("Location: $uri");
   }
}