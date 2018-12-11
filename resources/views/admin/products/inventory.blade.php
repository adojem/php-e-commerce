@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminProduct')

@section('content')

   <div class="products grid-container">
      <div>
         <h2>Manage Inventory</h2><hr>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            <a href="" class="button float-right">
               <i class="fa fa-plus"></i> Add New Product
            </a>
         </div>

         <div class="small-12 medium-12 cell">
            @if (count($products))
               <table class="over unstriped" data-form="deleteForm">
                  <thead>
                     <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Date Created</th>
                        <th width="70">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($products as $product)
                        <tr>
                           <td>
                              <img
                                 src="{{getenv('URL_ROOT')}}/{{ $product['image_path']}}"
                                 alt="{{$product['name']}}"
                                 height="40"
                                 width="40">
                           </td>
                           <td>{{$product['name']}}</td>
                           <td>{{$product['price']}}</td>
                           <td>{{$product['quantity']}}</td>
                           <td>{{$product['category_name']}}</td>
                           <td>{{$product['sub_category_name']}}</td>
                           <td>{{$product['added']}}</td>
                           <td width="70">
                              <span
                                 data-tooltip
                                 class="top"
                                 tabindex="1"
                                 title="Edit Product">
                                 <a
                                    href="{{getenv('URL_ROOT')}}/admin/product/{{$product['id']}}/edit"
                                    data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                              </span>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $links !!}
            @else
               <h2>Your have not created any products</h2>
            @endif
         </div>

      </div>

   </div>

@endsection
