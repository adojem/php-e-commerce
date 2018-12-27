@extends('layouts.app')
@section('title', 'Your Shopping Cart')
@section('data-page-id', 'cart')

@section('content')

   <div class="shopping_cart" id="shopping_cart">

      <div v-show="loading" class="text-center spinner--top">
         <img src="/images/loading.gif">
      </div>

      <section class="items" v-if="loading === false">
      
         <div class="grid-x">

            <div class="small-12">
               <h2 v-if="fail" v-text="message">@{{ message }}</h2>
               <div v-else>
                  <h2>Your Cart</h2>
                  <table class="hover unstriped">
                     <thead class="text-left">
                        <tr>
                           <th>#</th>
                           <th>Product Name</th>
                           <th>($) Unit Price</th>
                           <th>Qty</th>
                           <th>Total</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="item in items">
                           <td class="medium-text-center">
                              <a :href="'/product/' + item.id">
                                 <img :src="'/' + item.image" alt="item.name" width="60px">
                              </a>
                           </td>

                           <td>
                              <h3 class="h5">
                                 <a :href="'/product/' + item.id" height="60" width="60">
                                    @{{ item.name }}
                                 </a>
                              </h3>
                              Status:
                              <span v-if="item.stock > 1" style="color:#00aa00;">
                                 In Stock
                              </span>
                              <span v-else style="color:#aa0000;">
                                 Out of Stock
                              </span>
                           </td>

                           <td>@{{ item.price }}</td>

                           <td>
                              @{{ item.quantity }}
                              <button v-if="item.stock > item.quantity" @click="updateQuantity(item.id, '+')" types="button" class="button--plus">
                                 <i class="fa fa-plus-square" aria-hidden="true"></i>
                              </button>
                              <button v-if="item.quantity > 1" @click="updateQuantity(item.id, '-')" types="button" class="button--minus">
                                 <i class="fa fa-minus-square" aria-hidden="true"></i>
                              </button>
                           </td>

                           <td>@{{ item.total }}</td>

                           <td class="text-center">
                              <button>
                                 <i class="fa fa-times" aria-hidden="true"></i>
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>

                  <table>
                     <tr>
                        <td valign="top">
                           <div class="input-group">
                              <input class="input-group-field" type="text" name="coupone" placeholder="coupon code">
                              <div class="input-group-button">
                                 <button class="button">Apply</button>
                              </div>
                           </div>
                        </td>
                        <td>
                           <table class="unstriped">
                              <tr>
                                 <td><h4 class="h6">Subtotal:</h4></td>
                                 <td class="text-right"><h4 class="h6">$@{{ cartTotal }}</h4></td>
                              </tr>
                              <tr>
                                 <td><h4 class="h6">Dicount Amount:</h4></td>
                                 <td class="text-right"><h4 class="h6">$0.00</h4></td>
                              </tr>
                              <tr>
                                 <td><h4 class="h6">Tax:</h4></td>
                                 <td class="text-right"><h4 class="h6">$0.00</h4></td>
                              </tr>
                              <tr>
                                 <td><h4 class="h6">Total:</h4></td>
                                 <td class="text-right"><h4 class="h6">$@{{ cartTotal }}</h4></td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>

                  <div class="text-right">
                     <a href="/" class="button secondary">
                        Continue Shopping &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a>
                     <button class="button success">
                        Checkout &nbsp; <i class="fa fa-credit-card" aria-hidden="true"></i>
                     </button>
                  </div>
               </div>
            </div>

         </div>

      </section>

   </div>

@stop