@extends('admin.layout.base')
@section('title', 'Product Categories')

@section('content')
   <div class="category">
      <div class="row expanded">
         <h2>Product Categories</h2>
      </div>
      @if($message)
         <p>{{$message}}</p>
      @endif
      <div class="row expanded">

         <div class="small-12 medium-6 columns">
            <form action="" method="post">
               <div class="input-group">
                  <input type="text" class="input-group-field" placeholder="Search by name">
                  <div class="input-group-button">
                     <input type="submit" value="Search" class="button">
                  </div>
               </div>
            </form>
         </div>

         <div class="small-12 medium-5 end columns">
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

         <div class="row expanded">
            <div class="small-12 medium-11 columns">
               @if (count($categories))
                  <table class="over">
                     <tbody>
                        @foreach($categories as $category)
                           <tr>
                              <td>{{$category->name}}</td>
                              <td>{{$category->slug}}</td>
                              <td>{{$category->created_at->toFormattedDateString()}}</td>
                              <td>
                                 <a href="#"><i class="fa fa-edit"></i></a>
                                 <a href="#"><i class="fa fa-times"></i></a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               @else
                  <h3>Your have not created any category</h3>
               @endif
            </div>
         </div>

      </div>

   </div>
@endsection
