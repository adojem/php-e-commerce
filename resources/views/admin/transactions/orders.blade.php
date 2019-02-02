@extends('admin.layout.base')
@section('title', 'Product Orders')
@section('data-page-id', 'adminOrders')

@section('content')

   <div class="category grid-container">
      <div>
         <h2>Product Orders</h2><hr>
      </div>

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if (isset($orders) && count($orders))

               @foreach ($orders as $order_no => $details)
                  <h4>Order Number: {{ $order_no }}</h4>
                  <table class="hover">
                     <tr>
                        <td><strong>Customer Name:</strong> &nbsp; {{ $details['customer']['fullname'] }}</td>
                     </tr>
                     <tr>
                        <td><strong>Address:</strong> &nbsp; {{ $details['customer']['address'] }}</td>
                     </tr>
                     <tr>
                        <td><strong>Order Date:</strong> &nbsp; {{ $details['when'] }}</td>
                     </tr>
                     <tr>
                        <td><strong>Grand Total:</strong> &nbsp; ${{ $details['total'] }}</td>
                     </tr>

                     <tr>
                        <td>
                           <h4>Items</h4>
                           <table>
                              <tr>
                                 <th>#</th>
                                 <th>Product Name</th>
                                 <th>Qty</th>
                                 <th>Unit Price</th>
                                 <th>Total</th>
                                 <th>Status</th>
                              </tr>

                              @each('admin.transactions.items', $details, 'detail')
                           </table>
                        </td>
                     </tr>
                  </table>
               @endforeach
               {!! $links !!}

            @else
               <h2>Your have not made any sales</h2>
            @endif
         </div>

      </div>

   </div>

@endsection
