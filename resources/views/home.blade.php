@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')

   <div class="home">

      <section class="hero">
         <div class="hero-slider">
            <div><img src="/images/sliders/slide_1.jpg" alt="Acme Store"></div>
            <div><img src="/images/sliders/slide_2.jpg" alt="Acme Store"></div>
            <div><img src="/images/sliders/slide_3.jpg" alt="Acme Store"></div>
         </div>
      </section>

      <section class="display-products" id="root">

         <div>

            <h2>Featured Products</h2>
            
            <div class="grid-x">
               
               <div class="cell large-3 medium-6 small-12" v-for="feature in featured">
                  <a href="'/product/' + feature.id">
                     <div class="card" data-equalizer-watch>
                        <div class="card-section">
                           <img  :src="'/' + feature.image_path" width="100%" height="200">
                        </div>
                        <div class="card-section">
                           <p>@{{ stringLimit(feature.name, 18) }}</p>
                           <a :href="'/product/' + feature.id" class="button more expanded">
                              See More
                           </a>
                           <a :href="'/product/' + feature.id" class="button cart expanded alert">
                              @{{ feature.price }} - Add to cart
                           </a>
                        </div>
                     </div>
                  </a>
               </div>

            </div>

         </div>

         <div class="grid-container">

            <h2>Product Picks</h2>

            <div class="grid-x">
               
               <div class="cell large-3 medium-6 small-12" v-for="product in products">
                  <a href="'/product/' + product.id">
                     <div class="card" data-equalizer-watch>
                        <div class="card-section">
                           <img  :src="'/' + product.image_path" width="100%" height="200">
                        </div>
                        <div class="card-section">
                           <p>@{{ stringLimit(product.name, 18) }}</p>
                           <a :href="'/product/' + product.id" class="button more expanded">
                              See More
                           </a>
                           <a :href="'/product/' + product.id" class="button cart expanded alert">
                              @{{ product.price }} - Add to cart
                           </a>
                        </div>
                     </div>
                  </a>
               </div>

            </div>

         </div>

      </section>
      
   </div>

@stop