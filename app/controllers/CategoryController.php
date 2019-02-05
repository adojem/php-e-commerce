<?php
namespace App\Controllers;

use App\Classes\Mail;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class ProductController extends BaseController
{
   public function show($params)
   {
      $token = CSRFToken::_token();
      $product = Product::where('id', $id)->first();

      return view('categories', compact('token', 'product'));
   }

   public function loadMoreProducts()
   {
      $request = Request::get('post');
      $data = json_decode($request->data);

      if (CSRFToken::verifyCSRFToken($data->token, false)) {
         $count = $data->count;
         $item_per_page = $count + $data->next;
         if ($action['action'] == 'all') {
            $products = Product::notDeleted()->skip(0)->take($item_per_page)->get();
         }
         if ($action['action'] == 'notFeatured') {
            $products = Product::notDeleted()->notFeatured()->skip(0)->take($item_per_page)->get();
         }
      }

      echo \json_encode([
         'products' => $products,
         'count' => count($products),
      ]);
   }
}
