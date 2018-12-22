@extends('layouts.app')
@section('title') {{ $product->name }} @endsection
@section('data-page-id', 'product')

@section('content')

   <div class="product" id="product" data-token="{{ $token }}" data-id={{ $product->id }} style="padding:6rem">

      <div class="text-center">
         <i v-show="loading" class="fas fa-spinner fa-spin" style="margin-bottom:3rem; color:#0a2b1d; font-size:3rem"></i>
      </div>

      <section class="grid-x">
      
         <div class="cell">
            <nav aria-label="You are here:" role="navigation">
               <ul class="breadcrumbs">
                  <li><a href="#">Product Category</a></li>
                  <li><a href="#">Product Subcategory</a></li>
                  <li class="disabled">Product Name</li>
               </ul>
            </nav>
         </div>

         <div class="grid-x collapse">
            <div class="cell small-12 medium-5 large-4">
            
            </div>
            <div class="cell small-12 medium-7 large-8">
            
            </div>
         </div>
      
      </section>

   </div>

@stop