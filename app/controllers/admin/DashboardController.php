<?php

namespace App\Controllers\Admin;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Classes\Request;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Session;
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
      $payments = Payment::all()->sum('amount');

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

   public function getChartData()
   {
      $revenue = Capsule::table('payments')->select(
         Capsule::raw('sum(amount) as `amount`'),
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
