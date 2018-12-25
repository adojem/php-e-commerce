@extends('layouts.app')
@section('title', 'Your Shopping Cart')
@section('data-page-id', 'cart')

@section('content')

   <div class="shopping_cart" id="shopping_cart">

      <div v-show="!loading" class="text-center">
         <img src="/images/loading.gif">
      </div>

   </div>

@stop