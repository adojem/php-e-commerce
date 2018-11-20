@extends('admin.layout.base')
@section('title', 'Product Categories')

@section('content')
   <div class="category grid-container">
      <div>
         <h2>Product Categories</h2>
      </div>

      @include('includes.message')

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-6 cell">
            <form action="" method="post">
               <div class="input-group">
                  <input type="text" class="input-group-field" placeholder="Search by name">
                  <div class="input-group-button">
                     <input type="submit" value="Search" class="button">
                  </div>
               </div>
            </form>
         </div>

         <div class="small-12 medium-6 cell">
            <form action="" method="post">
            <div class="input-group">
               <input type="text" class="input-group-field" placeholder="Category name" name="name">
               <div class="input-group-button">
                  <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                  <input type="submit" value="Create" class="button">
               </div>
            </div>
            </form>
         </div>

         <div class="small-12 medium-12 cell">
            @if (count($categories))
               <table class="over">
                  <tbody>
                     @foreach($categories as $category)
                        <tr>
                           <td>{{$category['name']}}</td>
                           <td>{{$category['slug']}}</td>
                           <td>{{$category['added']}}</td>
                           <td>
                              <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                              <a href="#"><i class="fa fa-times"></i></a>
                              <div class="reveal" id="item-{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false">
                                 <h1>Edit Ctategory</h1>
                                 <form>
                                    <div class="input-group">
                                       <input type="text" class="input-group-field" name="name" value="{{$category['name']}}">
                                       <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                       <div>
                                          <input type="submit" value="Update" class="button update-category" id="{{$category['id']}}">
                                       </div>
                                    </div>
                                 </form>
                                 <button class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $links !!}
            @else
               <h3>Your have not created any category</h3>
            @endif
         </div>

      </div>

   </div>
@endsection
