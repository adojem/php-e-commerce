<?php
   $categories = \App\Models\Category::with('subCategories')->get();
?>

<header class="navigation">

   <div class="hide-for-medium">

      <div class="title-bar toggle align-justify flex-dir-row-reverse" data-responsive-toggle="main-menu" data-hide-for="medium">
         <button class="menu-icon" type="button" data-toggle="main-menu"></button>
         <a href="/" class="small-logo">ACME Store</a>
      </div>

      <div id="main-menu" class="top-bar">

         <div class="top-bar-title show-for-medium">
            <a href="/" class="logo"></a>
         </div>

         <div class="top-bar-left">

            <ul class="dropdown menu vertical medium-horizontal"
            data-dropdown-menu
            data-disable-hover="true"
            data-click-open="true"
            data-close-on-click-inside="false">
            
               <li><a href=="#">Acme Products</a></li>

               @if (count($categories))
               <li>
                  <a href="#">Categories</a>
                  <ul class="menu vertical sub dropdown">

                  @foreach ($categories as $category)
                     <li>
                        <a href="#">{{ $category->name }}</a>
                        @if (count($category->subCategories) != 0)
                           <ul class="menu sub vertical">
                              @foreach ($category->subCategories as $subCategory)
                                 <li>
                                    <a href="#">{{ $subCategory->name }}</a>
                                 </li>
                              @endforeach
                           </ul>
                        @endif
                     </li>
                  @endforeach

                  </ul>
               </li>
               @endif

            </ul>
            
         </div>

         <div class="top-bar-right">
            <ul class="dropdown menu vertical">
               @if (isAuthenticated())
                  <li>{{ user()->username }}</li>
                  <li>
                     <a href="/cart">
                        Cart
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li><a href="/logout">Logout</a></li>
               @else
                  <li><a href="/login">Sign In</a></li>
                  <li><a href="/register">Register</a></li>
                  <li>
                     <a href="/cart">
                        Cart
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a>
                  </li>
               @endif
            </ul>
         </div>

      </div>

   </div>

   <div class="show-for-medium">

      <div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
         <button class="menu-icon" type="button" data-toggle="main-menu"></button>
         <a href="/" class="float-right small-logo">ACME</a>
      </div>

      <div id="main-menu" class="top-bar">

         <div class="top-bar-title show-for-medium">
            <a href="/" class="logo"></a>
         </div>
   
         <div class="top-bar-left">

            <ul class="dropdown menu vertical medium-horizontal"
            data-dropdown-menu
            data-disable-hover="true"
            data-click-open="true"
            data-close-on-click-inside="false">
            
               <li><a href="/products">Acme Products</a></li>

               @if (count($categories))
               <li>
                  <a href="#">Categories</a>
                  <ul class="menu vertical sub dropdown">

                  @foreach ($categories as $category)
                     <li>
                        <a href="#">{{ $category->name }}</a>
                        @if ($category->subCategories)
                           <ul class="menu sub vertical">
                              @foreach ($category->subCategories as $subCategory)
                                 <li>
                                    <a href="#">{{ $subCategory->name }}</a>
                                 </li>
                              @endforeach
                           </ul>
                        @endif
                     </li>
                  @endforeach

                  </ul>
               </li>
               @endif

            </ul>
            
         </div>

         <div class="top-bar-right">
            <ul class="menu">
               @if (isAuthenticated())
                  <li>{{ user()->username }}</li>
                  <li>
                     <a href="/cart">
                        Cart
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li><a href="/logout">Logout</a></li>
               @else
                  <li><a href="/login">Sign In</a></li>
                  <li><a href="/register">Register</a></li>
                  <li>
                     <a href="/cart">
                        Cart
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     </a>
                  </li>
               @endif
            </ul>
         </div>

   
      </div>
   </div>
   
</header>