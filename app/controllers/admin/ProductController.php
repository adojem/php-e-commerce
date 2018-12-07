<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Classes\UploadFile;
use App\Models\Category;
use App\Models\SubCategory;
use App\Controllers\BaseController;

class ProductController extends BaseController {

   public $table_name = 'products';
   public $categories;
   public $subcategories;
   public $links;
   public $subcategories_links;

   public function __construct()
   {
      $this->categories = Category::all();

      // list($this->categories, $this->links) = paginate(3, $total, $this->table_name, $object);
      // list($this->subcategories, $this->subcategories_links) = paginate(3, $subtotal, 'sub_' . $this->table_name, new SubCategory);
   }

   public function showCreateProductForm()
   {
      $categories = $this->categories;
      return view('admin/products/create', \compact('categories'));
   }

   public function store() {
      if (Request::has('post')) {
         $request = Request::get('post');

         if (CSRFToken::verifyCSRFToken($request->token)) {
            $rules = [
               'name' => [
                  'required'  => true,
                  'minLength' => 3,
                  'maxLength' => 70,
                  'string'    => true,
                  'unique'    => $this->table_name,
               ],
               'price' => ['required' => true],
               'quantity' => ['requirred' => true],
               'category' => ['required' => true],
               'subcategory' => ['required' => true],
               'description' => [
                  'required'  => true,
                  'mixed'     => true,
                  'minLength' => 4,
                  'maxLength' => 500
               ],
            ];

            $validate = new ValidateRequest;
            $validate->abide($_POST, $rules);

            $file = Request::get('file');
            $filename = $file->productImage->name;

            if (empty($file->productImage->name)) {
               $file_error['productImage'] = ['The product image is required'];
            }
            else if (!UploadFile::isImage($filename)) {
               $file_error['productImage'] = ['The image is invalid, please try again.'];
            }

            if ($validate->hasError()) {
               $response = $validate->getErrorMessages();
               count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;

               return view('admin/products/categories', [
                  'categories' => $this->categories,
                  'errors'     => $errors
               ]);
            }
            
            // process from data
            Category::create([
               'name' => $request->name,
               'slug' => slug($request->name)
            ]);
            
            $total = Category::all()->count();
            $subtotal = SubCategory::all()->count();
            list($this->categories, $this->links) = paginate(3, $total, $this->table_name, new Category);
            list($this->subcategories, $this->subcategories_links) = paginate(3, $subtotal, 'sub' . $this->table_name, new SubCategory);
            
            return view('admin/products/categories', [
               'categories' => $this->categories,
               'subcategories' => $this->subcategories,
               'links' => $this->links,
               'subcategories_links' => $this->subcategories_links,
               'success' => 'Category Created'
            ]);
         }
         throw new \Exception('Token mismtach');
      }

      return null;
   }

   public function edit($id)
   {
      if (Request::has('post')) {
         $request = Request::get('post');

         if (CSRFToken::verifyCSRFToken($request->token, false)) {
            $rules = [
               'name' => [
                  'required' => true,
                  'minLength' => 3,
                  'string' => true,
                  'unique' => 'categories',
               ]
            ];

            $validate = new ValidateRequest;
            $validate->abide($_POST, $rules);

            if ($validate->hasError()) {
               $errors = $validate->getErrorMessages();
               header('HTTP/1.1 422 Unprocessible Entity', true, 422);
               echo \json_encode($errors);
               exit;
            }

            Category::where('id', $id)->update(['name' => $request->name]);
            echo \json_encode([
               'success' => 'Record Update Successfully',
               'id' => $id
            ]);
            exit;
            
         }
         throw new \Exception('Token mismtach');
      }

      return null;
   }

   public function delete($id)
   {
      if (Request::has('post')) {
         $request = Request::get('post');

         if (CSRFToken::verifyCSRFToken($request->token)) {
            Category::destroy($id);

            // Delete subcategories
            $subcategories = SubCategory::where('category_id', $id)->get();
            if (count($subcategories)) {
               foreach ($subcategories as $subcategory) {
                  $subcategory->delete();
               }
            }

            Session::add('success', 'Category Deleted');
            Redirect::to(getenv('URL_ROOT') . '/admin/product/categories');
            exit;
         }
         throw new \Exception('Token mismtach');
      }

      return null;
   }

   public function getSubcategories($id)
   {
      $subcategories = SubCategory::where('category_id', $id)->get();
      echo json_encode($subcategories);
      exit;
   }
}