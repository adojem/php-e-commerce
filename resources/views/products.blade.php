@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'products')

@section('content')

   <div class="products wrapper">

      <section class="hero">
         <div class="hero-slider">
            <div><img src="/images/sliders/slide_1.jpg" alt="Acme Store"></div>
            <div><img src="/images/sliders/slide_2.jpg" alt="Acme Store"></div>
            <div><img src="/images/sliders/slide_3.jpg" alt="Acme Store"></div>
         </div>
      </section>

      <section id="root" class="display-products" data-token="{{ $token }}">

         <div>

            <h2>All Products</h2>
            
            <div class="grid-x">
               
               <div class="cell large-3 medium-6 small-12" v-cloak v-for="product in products">
                  <a :href="'/product/' + product.id">
                     <div class="card" data-equalizer-watch>
                        <div class="card-section">
                           <img  :src="'/' + product.image_path" width="100%" height="200">
                        </div>
                        <div class="card-section">
                           <p>@{{ stringLimit(product.name, 18) }}</p>
                           <a :href="'/product/' + product.id" class="button more expanded">
                              See More
                           </a>
                           <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" type="button" class="button cart expanded alert">
                              @{{ product.price }} - Add to cart
                           </button >
                           <button v-else type="button" class="button cart expanded alert" disabled>
                              Out of Stock
                           </button >
                        </div>
                     </div>
                  </a>
               </div>

            </div>

         </div>

         <div v-show="loading">
            <img src="/images/loading.gif" class="spinner">
         </div>

      </section>
      
   </div>

@stop