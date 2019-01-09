@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminOrder')

@section('content')

   <div class="products grid-container">
      <div>
         <h2>Payments by {{ $payments ? $payments[0]->fullname : '' }}</h2>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if ($payments)
               <table class="over unstriped" data-form="deleteForm">
                  <thead>
                     <tr>
                        <th>Date</th>
                        <th>Total Payment</th>
                        <th>Order No.</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($payments as $payment)
                        <tr>
                           <td>{{$payment->date}}</td>
                           <td>{{$payment->payment}}</td>
                           <td><a href="/admin/orders/{{ $payment->order_no }}">{{$payment->order_no}}</a></td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $links !!}
            @else
               <h2>Your have no orders</h2>
            @endif
         </div>

      </div>

   </div>

@endsection
