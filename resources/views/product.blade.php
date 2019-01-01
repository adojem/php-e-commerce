@extends('layouts.app')
@section('title') {{ $product->name }} @endsection
@section('data-page-id', 'product')

@section('content')

   <div class="product" id="product" data-token="{{ $token }}" data-id={{ $product->id }}>

      <div v-show="loading" class="text-center">
         <img src="/images/loading.gif">
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

            <div class="cell grid-x align-center small-12 medium-5 large-4">
               <div class="product__img">
                  <img :src="'/' + product.image_path" :alt=" product.name">
               </div>
            </div>

            <div class="cell small-12 medium-7 large-8">
               <div class="product-details">
                  <h2>@{{ product.name }}</h2>
                  <p>@{{ product.description }}</p>
                  <h2>@{{ product.price }}</h2>
                  <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" type="button" class="button alert">Add to Cart</button>
                  <button v-else type="button" class="button cart expanded alert" disabled>
                     Out of Stock
                  </button >
               </div>
            </div>

         </div>
      
      </section>

      <section class="home" v-if="loading === false">

         <div class="display-products">
            
         <h2>Similar Products</h2>
            
            <div class="grid-x">
               
               <div class="cell large-3 medium-6 small-12" v-cloak v-for="similar in similarProducts">

                  <a href="'/product/' + similar.id">
                     <div class="card" data-equalizer-watch>
                        <div class="card-section">
                           <img  :src="'/' + similar.image_path">
                        </div>
                        <div class="card-section">
                           <p>@{{ stringLimit(similar.name, 15) }}</p>
                           <a :href="'/product/' + similar.id" class="button more expanded">
                              See More
                           </a>
                           <button v-if="similar.quantity > 0" @click.prevent="addToCart(similar.id)" type="button" class="button cart expanded alert">
                              @{{ similar.price }} - Add to cart
                           </button>
                           <button v-else type="button" class="button cart expanded alert" disabled>
                              Out of Stock
                           </button >
                        </div>
                     </div>
                  </a>

               </div>

            </div>

         </div>

      </section>

   </div>

@stop