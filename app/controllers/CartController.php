<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Cart;
use Exception;
use App\Classes\Session;

class CartController extends BaseController
{
   public function addItem()
   {
      if (Request::has('post')) {
         $request = Request::get('post');
         $data = json_decode($request->data);

         if (CSRFToken::verifyCSRFToken($data->token, false)) {
            if (!$data->product_id) {
               throw new Exception('Malicious Activity');
            }
            
            Cart::add($data);
            echo json_encode(['success' => 'Product Added to Cart Successfully']);
         }
      }
   }
}
