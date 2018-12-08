@extends('admin.layout.base')
@section('title', 'Create Product')
@section('data-page-id', 'adminProduct')

@section('content')

   <div class="add-product grid-container">
      <div>
         <h2>Add Inventory Item</h2><hr>
      </div>

      @include('includes.message')

      <form
         method="post"
         action="{{getenv('URL_ROOT')}}/admin/product/create"
         enctype="multipart/form-data">
         <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
               <label for="">
                  Product name:
                  <input type="text" name="name" placeholder="Product name" value="{{\App\Classes\Request::old('post', 'name')}}">
               </label>
            </div>

            <div class="small-12 medium-6 cell">
               <label for="">
                  Product price:
                  <input type="text" name="price" placeholder="Product price" value="{{\App\Classes\Request::old('post', 'price')}}">
               </label>
            </div>
         </div>

         <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
               <label for="">
                  Product Category:
                  <select name="category" id="product-category">
                     <option value="{{\App\Classes\Request::old('post', 'category') ? : ''}}">
                        {{\App\Classes\Request::old('post', 'category') ? : 'Select Category'}}
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
                     <option value="{{\App\Classes\Request::old('post', 'subcategory') ? : ''}}">
                        {{\App\Classes\Request::old('post', 'subcategory') ? : 'Select Subcategory'}}
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
                     <option value="{{\App\Classes\Request::old('post', 'quantity') ? : ''}}">
                        {{\App\Classes\Request::old('post', 'quantity') ? : 'Select Quantity'}}
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
                  <textarea name="description" placeholder="Description">{{ \App\Classes\Request::old('post', 'description') }}</textarea>
               </label>
               <input
                  type="hidden"
                  name="token"
                  value="{{ \App\Classes\CSRFToken::_token() }}">
               <button class="button alert" type="reset">Reset</button>
               <input
                  type="submit"
                  class="button succeess float-right"
                  value="Save Product">
            </div>
         </div>

      </form>

   </div>

   @include('includes.delete-modal')

@endsection
