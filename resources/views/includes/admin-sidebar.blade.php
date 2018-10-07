<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas>

   <h3>Welcome Admin</h3>

   <div class="image-holder text-center">
      <img src="<?php echo getenv('URL_ROOT'); ?>/images/terry.jpg" alt="Admin">
      <p>Terry O.</p>
   </div>
   <!-- Side bar -->
   <ul class="vertical menu">
      <li><a href="/admin"><i class="fa fa-tachometer-alt fa-fw" aria-hidden="true"></i>&nbsp; Dashboard</a></li>
      <li><a href="./admin/users"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp; Users</a></li>
      <li><a href="/admin/product/create"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Add Product</a></li>
      <li><a href="manage_inventory"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Manage Product</a></li>
      <li><a href="<?php echo getenv('URL_ROOT'); ?>/admin/product/categories"><i class="fa fa-object-group fa-fw" aria-hidden="true"></i>&nbsp; Categories</a></li>
      <li><a href="./admin/orders"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; View Orders</a></li>
      <li><a href="./admin/users/payments"><i class="fa fa-money-bill-alt fa-fw" aria-hidden="true"></i>&nbsp; Payments</a></li>
      <li><a href="./admin/logout"><i class="fa fa-sign-in-alt fa-fw" aria-hidden="true"></i>&nbsp; Logout</a></li>
   </ul>

</div>
