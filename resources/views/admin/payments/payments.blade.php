@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminOrder')

@section('content')

   <div class="products grid-container">
      <div>
         <h2>Payments</h2>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if ($payments)
               <table class="over unstriped" data-form="deleteForm">
                  <thead>
                     <tr>
                        <th>User Name</th>
                        <th>Total Payment</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($payments as $payment)
                        <tr>
                           <td><a href="/admin/payments/{{ $payment->user_id }}">{{$payment->fullname}}</a></td>
                           <td>{{$payment->amount}}</td>
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
