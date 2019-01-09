<?php
// for admin routes
$router->map(
   'GET',
   '/admin',
   'App\Controllers\Admin\DashboardController@show', 'admin_dashboard'
);

$router->map(
   'GET',
   '/admin/charts',
   'App\Controllers\Admin\DashboardController@getChartData', 'admin_dashboard_charts'
);

// orders
$router->map(
   'GET',
   '/admin/orders',
   'App\Controllers\Admin\DashboardController@showOrders', 'admin_dashboard_orders'
);

$router->map(
   'GET',
   '/admin/orders/[a:action]',
   'App\Controllers\Admin\DashboardController@showOrderDetails', 'admin_dashboard_order_details'
);

// payments
$router->map(
   'GET',
   '/admin/payments',
   'App\Controllers\Admin\DashboardController@showPayments',
   'admin_dashboard_payments'
);

$router->map(
   'GET',
   '/admin/payments/[i:id]',
   'App\Controllers\Admin\DashboardController@showPaymentDetails',
   'admin_dashboard_payment_details'
);

// product management routes
$router->map(
   'GET',
   '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category'
);

$router->map(
   'POST',
   '/admin/product/categories',
   'App\Controllers\Admin\ProductCategoryController@store',
   'create_product_category'
);

$router->map(
   'POST',
   '/admin/product/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit',
   'edit_product_category'
);

$router->map(
   'POST',
   '/admin/product/categories/[i:id]/delete', 'App\Controllers\Admin\ProductCategoryController@delete',
   'delete_product_category'
);

// subcategory
// Create
$router->map(
   'POST',
   '/admin/product/subcategory/create',
   'App\Controllers\Admin\SubCategoryController@store',
   'create_subcategory'
);
// Edit
$router->map(
   'POST',
   '/admin/product/subcategory/[i:id]/edit', 'App\Controllers\Admin\SubCategoryController@edit',
   'edit_subcategory'
);
// Delete
$router->map(
   'POST',
   '/admin/product/subcategory/[i:id]/delete',
   'App\Controllers\Admin\SubCategoryController@delete',
   'delete_subcategory'
);

// Products
$router->map(
   'GET',
   '/admin/category/[:id]/selected',
   'App\Controllers\Admin\ProductController@getSubcategories',
   'selected_category'
);

$router->map(
   'GET',
   '/admin/product/create',
   'App\Controllers\Admin\ProductController@showCreateProductForm',
   'create_product_form'
);

$router->map(
   'POST',
   '/admin/product/create',
   'App\Controllers\Admin\ProductController@store',
   'create_product'
);

$router->map(
   'GET',
   '/admin/products',
   'App\Controllers\Admin\ProductController@show',
   'show_products'
);

// show edit product form
$router->map(
   'GET',
   '/admin/product/[i:id]/edit',
   'App\Controllers\Admin\ProductController@showEditProductForm',
   'edit_product_form'
);

// edit product
$router->map(
   'POST',
   '/admin/product/edit',
   'App\Controllers\Admin\ProductController@edit',
   'edit_product'
);

// delete product
$router->map(
   'POST',
   '/admin/product/[i:id]/delete',
   'App\Controllers\Admin\ProductController@delete',
   'delete_product'
);
