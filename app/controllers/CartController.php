<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Cart;
use App\Classes\Session;
use App\Models\Product;
use Exception;

class CartController extends BaseController
{
   public function show()
   {
      return view('cart');
   }

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
            echo json_encode([
               'success' => 'Product Added to Cart Successfully',
            ]);
         }
      }
   }

   public function getCartItems()
   {
      try {
         $result = array();
         $cartTotal = 0;

         if (!Session::has('user_cart') || count(Session::get('user_cart')) < 1) {
            echo json_encode(['fail' => 'No item in the cart']);
            exit;
         }

         $index = 0;
         // var_dump(Session::get('user_cart'));
         // Session::remove('user_cart');
         // exit;

         foreach ($_SESSION['user_cart'] as $cart_items) {
            $productId = $cart_items['product_id'];
            $quantity = $cart_items['quantity'];
            $item = Product::where('id', $productId)->first();

            if (!$item) { continue; }

            $totalPrice = $item->price * $quantity;
            $cartTotal += $totalPrice;
            $totalPrice = \number_format($totalPrice, 2);

            array_push($result, [
               'id' => $item->id,
               'name' => $item->name,
               'image' => $item->image_path,
               'description' => $item->description,
               'price' => $item->price,
               'total' => $totalPrice,
               'quantity' => $quantity,
               'stock' => $item->quantity,
               'index' => $index
            ]);

            $index++;
         }

         $cartTotal = \number_format($cartTotal, 2);
         echo json_encode([
            'items' => $result,
            'cartTotal' => $cartTotal
         ]);
         exit;
      }
      catch (Exception $ex) {
         // log this in database or email admin
      }
   }

   public function updateQuantity()
   {
      if (Request::has('post')) {
         $request = Request::get('post');
         $data = json_decode($request->data);

         if (!$data->product_id) {
            throw new Exception('Malicious Activity');
         }

         $index = 0;
         $quantity = '';
         foreach ($_SESSION['user_cart'] as $cart_items) {
            $index++;
            foreach ($cart_items as $key => $value) {
               if ($key == 'product_id' && $value == $data->product_id) {
                  switch ($data->operator) {
                     case '+':
                        $quantity = $cart_items['quantity'] + 1;
                        break;

                     case '-':
                        $quantity = $cart_items['quantity'] - 1;
                        if ($quantity < 1) {
                           $quantity = 1;
                        }
                        break;
                  }

                  array_splice($_SESSION['user_cart'], $index - 1, 1, array(
                     [
                        'product_id' => $data->product_id,
                        'quantity' => $quantity
                     ]
                  ));
               }
            }
         }
      }
   }

   public function removeItem()
   {
      if (Request::has('post')) {
         $request = Request::get('post');
         $data = json_decode($request->data);

         if ($data->item_index === '') {
            throw new Exception('Malicious Activity');
         }

         Cart::removeItem($data->item_index);
         echo json_encode(['success' => 'Product Removed from Cart!']);
         exit;
      }
   }

   public function clearItems()
   {
      Cart::clear();
      echo json_encode(['success' => 'Cart Items were removed']);
      exit;
   }
}
