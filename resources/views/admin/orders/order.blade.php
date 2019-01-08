@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminOrder')

@section('content')

   <div class="products grid-container">
      <div>
         <h2>Order Detail</h2>
         <h3 class="h5">Order No. <strong>{{ $order_no['action'] }}</strong> <time>{{ $order[0]->date }}</time></h3>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if ($order)
               <table class="over unstriped" data-form="deleteForm">
                  <thead>
                     <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($order as $item)
                        <tr>
                           <td>{{$item->name}}</td>
                           <td>{{$item->price}}</td>
                           <td>{{$item->quantity}}</td>
                           <td>{{$item->total_price}}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $links !!}
            @else
               <h2>Your have no orders</h2>
               {{ var_dump($order) }}
            @endif
         </div>

      </div>

   </div>

@endsection
