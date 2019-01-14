<?php

namespace App\Controllers\Admin;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;

class DashboardController extends BaseController
{
   public function __construct()
   {
      if (!Role::middleware('admin')) {
         Redirect::to('/login');
      }
   }

   public function show()
   {
      $orders = Order::all()->count();
      $products = Product::all()->count();
      $users = User::all()->count();
      $payments = Payment::all()->sum('amount') / 100;

      return view(
         'admin/dashboard',
         compact(
            'orders',
            'products',
            'payments',
            'users'
         )
      );
   }

   public function showOrders()
   {
      $orders = Capsule::table('orders')->select(
         'order_no', 
         Capsule::raw('TRUNCATE(SUM(total), 2) as `total_price`'),
         Capsule::raw("DATE_FORMAT(created_at, '%m/%d/%Y') date")
      )->groupBy('order_no')->get()->sortByDesc('date');

      view('admin/orders/orders', \compact('orders'));
   }

   public function showOrderDetails($order_no)
   {
      $order = Capsule::table('orders')->where('order_no', $order_no)->join('products', 'product_id', '=', 'products.id')->groupBy('product_id')->select(
         'name',
         'price',
         'orders.quantity',
         // Capsule::raw('TRUNCATE(SUM(price), 2) as `total_price`'),
         Capsule::raw('total as `total_price`'),
         Capsule::raw("DATE_FORMAT(orders.created_at, '%m/%d/%Y') date")
      )->get();

      view('admin/orders/order', \compact('order', 'order_no'));
   }

   public function showPayments()
   {
      $payments = Capsule::table('payments')->join('users', 'user_id', '=', 'users.id')->select(
         'user_id',
         'fullname',
         Capsule::raw('sum(amount) as `amount`')
      )->groupBy('user_id')->get();

      view('admin/payments/payments', compact('payments'));
   }

   public function showPaymentDetails($user_id)
   {
      $payments = Capsule::table('payments')->where('user_id', $user_id)->join('users', 'user_id', '=', 'users.id')->select(
         'fullname',
         'order_no',
         Capsule::raw('sum(amount) as `payment`'),
         Capsule::raw("DATE_FORMAT(payments.created_at, '%m/%d/%Y') date")
      )->groupBy('order_no')->get()->sortByDesc('date');

      view('admin/payments/payment', compact('payments'));
   }

   public function getChartData()
   {
      $revenue = Capsule::table('payments')->select(
         Capsule::raw('sum(amount) /100 as `amount`'),
         Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
         Capsule::raw('YEAR(created_at) year, Month(created_at) month')
      )->groupBy('year', 'month')->get();

      $orders = Capsule::table('orders')->select(
         Capsule::raw('count(id) as `count`'),
         Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
         Capsule::raw('YEAR(created_at) year, Month(created_at) month')
      )->groupBy('year', 'month')->get();

      echo json_encode([
         'revenue' => $revenue,
         'orders' => $orders
      ]);
   }
}
