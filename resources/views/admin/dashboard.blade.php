@extends('admin.layout.base')
@section('title', 'Dashboard')
@section('data-page-id', 'adminDashboard')

@section('content')
   <div class="dashboard">

      <div class="grid-x expanded" data-equilizer data-equilizer-on="medium">

         {{--Order Summary--}}
         <div class="small-12 medium-3 cell summary">
            <div class="card card-summary">
               <div class="card-section">
                  <div class="grid-x">
                     <div class="small-3 cell card-summary__head">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </div>
                     <div class="small-9 cell card-summary__body">
                        <p>Total Orders</p><p>{{ $orders }}</p>
                     </div>
                  </div>
               </div>
               <div class="card-divider">
                  <div class="grid-x">
                     <a href="/admin/orders">Order Details</a>
                  </div>
               </div>
            </div>
         </div>

         {{--Stock Summary--}}
         <div class="small-12 medium-3 cell summary">
            <div class="card card-summary">
               <div class="card-section">
                  <div class="grid-x card-summary__main">
                     <div class="small-3 cell card-summary__head">
                        <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                     </div>
                     <div class="small-9 cell card-summary__body">
                        <p>Stock</p><p>{{ $products }}</p>
                     </div>
                  </div>
               </div>
               <div class="card-divider">
                  <div class="grid-x">
                     <a href="/admin/products">View Products</a>
                  </div>
               </div>
            </div>
         </div>

         {{--Revenue Summary--}}
         <div class="small-12 medium-3 cell summary">
            <div class="card">
               <div class="card-section">
                  <div class="grid-x">
                     <div class="small-3 cell card-summary__head">
                        <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                     </div>
                     <div class="small-9 cell card-summary__body">
                        <p>Revenue</p><p>${{ number_format($payments, 2)}}</p>
                     </div>
                  </div>
               </div>
               <div class="card-divider">
                  <div class="grid-x">
                     <a href="#">Payment Details</a>
                  </div>
               </div>
            </div>
         </div>

         {{--Signup Summary--}}
         <div class="small-12 medium-3 cell summary">
            <div class="card">
               <div class="card-section">
                  <div class="grid-x">
                     <div class="small-3 cell card-summary__head">
                        <i class="fa fa-users" aria-hidden="true"></i>
                     </div>
                     <div class="small-9 cell card-summary__body">
                        <p>Signup</p><p>{{ $users }}</p>
                     </div>
                  </div>
               </div>
               <div class="card-divider">
                  <div class="grid-x">
                     <a href="#">Register Users</a>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="grid-x expanded graph" data-equilizer data-equilizer-on="medium">

         <div class="small-12 large-6 cell monthly-salse">

            <div class="card">
               <div class="card-section">
                  <h2 class="h5">Monthly Orders</h2>
                  <canvas id="orders"></canvas>
               </div>
            </div>

         </div>

         <div class="small-12 large-6 cell monthly-revenue">

            <div class="card">
               <div class="card-section">
                  <h2 class="h5">Monthly Revenue</h2>
                  <canvas id="revenue"></canvas>
               </div>
            </div>

         </div>

      </div>

   </div>
@endsection
