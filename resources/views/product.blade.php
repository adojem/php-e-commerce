@extends('layouts.app')
@section('title') {{ $product->name }} @endsection
@section('data-page-id', 'product')

@section('content')

   <div class="product" id="product" data-token="{{ $token }}" data-id={{ $product->id }}>

      <div v-show="loading" class="text-center">
         <i class="fas fa-spinner fa-spin" style="margin-bottom:3rem; color:#0a2b1d; font-size:3rem"></i>
      </div>

      <section v-if="loading == false">
      
         <div class="grid-x">

            <div class="cell">
               <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                     <li>
                        <a :href="'/product/category/' + category.slug">
                           @{{ category.name }}
                        </a>
                     </li>
                     <li>
                        <a :href="'/product/subcategory/' + subCategory.slug">
                           @{{ subCategory.name }}
                        </a>
                     </li>
                     <li>@{{ product.name }}</li>
                  </ul>
               </nav>
            </div>

         </div>

         <div class="grid-x align-middle">

            <div class="cell small-12 medium-5 large-4">
               <div>
                  <img :src="'/' + product.image_path" :alt=" product.name" width="100%">
               </div>
            </div>

            <div class="cell small-12 medium-7 large-8">
               <div class="product-details">
                  <h2>@{{ product.name }}</h2>
                  <p>@{{ product.description }}</p>
                  <h2>@{{ product.price }}</h2>
                  <button class="button alert">Add to Cart</button>
               </div>
            </div>

         </div>
      
      </section>

   </div>

@stop