<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
       $totalProducts=Product::count();
       $totalCategories=Category::count();
       $totalBrands=Brand::count();
       $totalUsers=User::where('role_as','0')->count();

       $todayDate=Carbon::now()->format('d-m-Y');
       $thisMonth=Carbon::now()->format('m');
       $thisYear=Carbon::now()->format('Y');

       $totalOrders=Order::count();
       $todayOrders=Order::whereDate('created_at',$todayDate)->count();
       $thisMonthOrders=Order::whereMonth('created_at',$thisMonth)->count();
       $thisYearOrders=Order::whereYear('created_at',$thisYear)->count();

        return view ('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalUsers','totalOrders','todayOrders','thisMonthOrders','thisYearOrders'));
    }
}
