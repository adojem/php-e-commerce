<?php
namespace App\Controllers;

use App\Classes\Mail;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class ProductController extends BaseController
{
   public function show($id)
   {
      $token = CSRFToken::_token();
      $product = Product::where('id', $id)->first();

      return view('product', compact('token', 'product'));
   }

   public function get($id)
   {
      $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();

      if ($product) {
         echo json_encode([
            'product' => $product,
            'category' => $product->category,
            'subCategory' => $product->subCategory
         ]);
         exit;
      }

      header('HTTP/1.1 422 Uprocessable Entity', true, 422);
      echo 'Product not found';
      exit;
   }
}
