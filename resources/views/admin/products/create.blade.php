@extends('admin.layout.base')
@section('title', 'Create Product')
@section('data-page-id', 'adminProduct')

@section('content')

   <div class="add-product grid-container">
      <div>
         <h2>Add Inventory Item</h2><hr>
      </div>

      @include('includes.message')

      <form method="post" action="/admin/product/create">
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
      </form>

   </div>

   @include('includes.delete-modal')

@endsection
