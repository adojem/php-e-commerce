@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminOrder')

@section('content')

   <div class="products grid-container">
      <div>
         <h2>Orders</h2>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if (count($orders))
               <table class="over unstriped" data-form="deleteForm">
                  <thead>
                     <tr>
                        <th>Order No.</th>
                        <th>Date</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($orders as $order)
                        <tr>
                           <td><a href="/admin/orders/{{ $order->order_no }}">{{ $order->order_no }}</a></td>
                           <td>{{ $order->date }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $links !!}
            @else
               <h2>Your have no orders</h2>
               {{ $action }}
            @endif
         </div>

      </div>

   </div>

@endsection
