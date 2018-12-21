<?php
namespace App\Controllers;

use App\Classes\Mail;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class IndexController extends BaseController
{
   public function show()
   {
      $token = CSRFToken::_token();

      return view('home', compact('token'));
   }

   public function featuredProducts()
   {
      $products = Product::where('featured', 1)->inRandomOrder()->limit(4)->get();
      
      echo \json_encode(['featured' => $products]);
   }

   public function getProducts()
   {
      $products = Product::where('featured', 0)->skip(0)->take(4)->get();
      $max_num = Product::where('featured', 0)->count();

      echo \json_encode([
         'products' => $products,
         'count' => count($products),
         'max_num' => $max_num
      ]);
   }

   public function loadMoreProducts()
   {
      $request = Request::get('post');
      $data = json_decode($request->data);

      if (CSRFToken::verifyCSRFToken($data->token, false)) {
         $count = $data->count;
         $item_per_page = $count + $data->next;
         $products = Product::where('featured', 0)->skip(0)->take($item_per_page)->get();
      }

      echo \json_encode([
         'products' => $products,
         'count' => count($products),
      ]);
   }
}
