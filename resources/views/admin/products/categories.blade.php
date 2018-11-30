@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminCategories')

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
               <table class="over" data-form="deleteForm">
                  <tbody>
                     @foreach($categories as $category)
                        <tr>
                           <td>{{$category['name']}}</td>
                           <td>{{$category['slug']}}</td>
                           <td>{{$category['added']}}</td>
                           <td>
                              <span data-tooltip class="top" tabindex="1" title="Add Subcategory">
                                 <a data-open="add-subcategory-{{$category['id']}}"><i class="fa fa-plus"></i></a>
                              </span>
                              <span data-tooltip class="top" tabindex="1" title="Edit Category">
                                 <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                              </span>
                              <span data-tooltip class="top" tabindex="1" title="Delete Category" style="display:inline-block">
                                 <form method="POST" action="<?php echo getenv('URL_ROOT'); ?>/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
                                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                    <button type="submit"><i class="fa fa-times delete"></i></button>
                                 </form>
                              </span>

                              <!-- Edit Category Modal -->
                              <div class="reveal" id="item-{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                 <div class="notification  callout primary"></div>
                                 <h2>Edit Category</h2>
                                 <form>
                                    <div class="input-group">
                                       <input type="text" id="item-name-{{$category['id']}}" class="input-group-field" name="name" value="{{$category['name']}}">
                                       <div>
                                          <input type="submit" value="Update" class="button update-category" id="{{$category['id']}}" data-token="{{\App\Classes\CSRFToken::_token()}}">
                                       </div>
                                    </div>
                                 </form>
                                 <a href="<?php echo getenv('URL_ROOT'); ?>/admin/product/categories" class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">&times;</span>
                                 </a href="/admin/product/categories">
                              </div>

                              <!-- Add Subcategory Modal -->
                              <div class="reveal" id="add-subcategory-{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                 <div class="notification  callout primary"></div>
                                 <h2>Add Subcategory</h2>
                                 <form>
                                    <div class="input-group">
                                       <input type="text" id="subcategory-name-{{$category['id']}}" class="input-group-field">
                                       <div>
                                          <input type="submit" value="Create" class="button add-subcategory" id="{{$category['id']}}" data-token="{{\App\Classes\CSRFToken::_token()}}">
                                       </div>
                                    </div>
                                 </form>
                                 <a href="<?php echo getenv('URL_ROOT'); ?>/admin/product/categories" class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">&times;</span>
                                 </a href="/admin/product/categories">
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

   <div class="subcategory grid-container">
      <div>
         <h2>Sub Categories</h2>
      </div>

      <div class="grid-x grid-padding-x">

         <div class="small-12 medium-12 cell">
            @if (count($subcategories))
               <table class="over" data-form="deleteForm">
                  <tbody>
                     @foreach($subcategories as $subcategory)
                        <tr>
                           <td>{{$subcategory['name']}}</td>
                           <td>{{$subcategory['slug']}}</td>
                           <td>{{$subcategory['added']}}</td>
                           <td>
                              <span data-tooltip class="top" tabindex="1" title="Edit Subcategory">
                                 <a data-open="item-{{$subcategory['id']}}"><i class="fa fa-edit"></i></a>
                              </span>
                              <span data-tooltip class="top" tabindex="1" title="Delete Subcategory" style="display:inline-block">
                                 <form method="POST" action="<?php echo getenv('URL_ROOT'); ?>/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
                                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                    <button type="submit"><i class="fa fa-times delete"></i></button>
                                 </form>
                              </span>

                              <!-- Edit Subcategory Modal -->
                              <div class="reveal" id="item-subcategory-{{$subcategory['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                 <div class="notification  callout primary"></div>
                                 <h2>Edit Subcategory</h2>
                                 <form>
                                    <div class="input-group">
                                       <input type="text" id="item-subcategory-name-{{$subcategory['id']}}" class="input-group-field" name="name" value="{{$subcategory['name']}}">
                                       <div>
                                          <input type="submit" value="Update" class="button update-subcategory" id="{{$subcategory['id']}}" data-token="{{\App\Classes\CSRFToken::_token()}}">
                                       </div>
                                    </div>
                                 </form>
                                 <a href="<?php echo getenv('URL_ROOT'); ?>/admin/product/categories" class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">&times;</span>
                                 </a href="/admin/product/categories">
                              </div>

                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               {!! $subcategories_links !!}
            @else
               <h3>Your have not created any subcategory</h3>
            @endif
         </div>

      </div>

   </div>

   @include('includes.delete-modal')
@endsection
