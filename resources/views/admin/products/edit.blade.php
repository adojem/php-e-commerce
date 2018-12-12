@extends('admin.layout.base')
@section('title', 'Edit Product')
@section('data-page-id', 'adminProduct')

@section('content')

   <div class="add-product admin_shared grid-container">
      <div>
         <h2>Edit {{ $product->name }}</h2><hr>
      </div>

      @include('includes.message')

      <form
         method="post"
         action="{{getenv('URL_ROOT')}}/admin/product/edit"
         enctype="multipart/form-data">
         <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
               <label for="">
                  Product name:
                  <input
                     type="text"
                     name="name"
                     value="{{ $product->name }}">
               </label>
            </div>

            <div class="small-12 medium-6 cell">
               <label for="">
                  Product price:
                  <input
                     type="text"
                     name="price"
                     value="{{ $product->price }}">
               </label>
            </div>
         </div>

         <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
               <label for="">
                  Product Category:
                  <select
                     name="category"
                     id="product-category">
                     {{var_dump($product)}}
                     <option value="{{ $product->category->id }}">
                        {{ $product->attributes->name }}
                     </option>
                     @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                  </select>
               </label>
            </div>

            <div class="small-12 medium-6 cell">
               <label for="">
                  Product Subcategory:
                  <select name="subcategory" id="product-subcategory">
                     <option value="{{ $product->subCategory->id }}">
                        {{ $product->subCategory->name }}
                     </option>
                  </select>
               </label>
            </div>
         </div>

         <div class="grid-x grid-padding-x align-bottom">
            <div class="small-12 medium-6 cell">
               <label for="">
                  Product Quantity:
                  <select name="quantity">
                     <option value="{{ $product->quantity }}">
                        {{ $product->quantity }}
                     </option>

                     @for ($i = 1; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                     @endfor

                  </select>
               </label>
            </div>

            <div class="small-12 medium-6 cell">
               <div class="input-group">
                  <span for="" class="input-group-label">
                     Product Image:
                  </span>
                  <input type="file" class="input-group-field" name="productImage">
               </div>
            </div>

         </div>

         <div class="grid-x grid-padding-x">
            <div class="small-12 medium-12 cell">
               <label>
                  Description: 
                  <textarea name="description" placeholder="Description">{{ $product->description }}</textarea>
               </label>
            </div>
         </div>

         <div class="small-12 medium-12 cell">
            <input
               type="hidden"
               name="token"
               value="{{ \App\Classes\CSRFToken::_token() }}">
            <input
               type="hidden"
               name="product_id"
               value="{{  $product->id }}">
            <input
               type="submit"
               class="button warning float-right"
               value="Update Product">
         </div>

      </form>

      <form method="POST" action="<?php echo getenv('URL_ROOT'); ?>/admin/product/{{$product->id}}/delete" class="delete-item">
         <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
         <button type="submit" class="button alert">Delete Product</button>
      </form>

   </div>

   @include('includes.delete-modal')

@endsection
