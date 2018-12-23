<?php
namespace App\Classes;

use Exception;

class Cart
{
   protected static $isItemInCart = false;

   public static function add($request)
   {
      try {
         $index = 0;

         if (!Session::has('user_cart') || count(Session::get('user_cart')) < 1) {
            Session::add('user_cart', [
               0 => [
                  'product_id' => $request->product_id,
                  'quantity'   => 1
               ]
            ]);
         }
         else {
            foreach ($_SESSION['user_cart'] as $cart_item) {
               $index++;
               foreach ($cart_item as $key => $value) {
                  if ($key == 'product_id' && $value == $request->product_id) {
                     \array_splice($_SESSION['user_cart'], $index - 1, 1, [
                        'product_id' => $request->product_id,
                        'quantity'   => $cart_item['quantity'] + 1
                     ]);
                     
                     self::$isItemInCart = true;
                  }
               }
            }
         }

         if (!self::$isItemInCart) {
            array_push($_SESSION['user_cart'], [
               'product_id' => $request->product_id,
               'quantity'   => 1
            ]);
         }
      }
      catch (Exception $ex) {
         echo $ex->getMessag();
      }
   }
}