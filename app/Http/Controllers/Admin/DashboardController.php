<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();

        $categoriesCount = Category::count();

        $ordersCount = Order::count();

        $usersCount = User::count();

        $latestOrders = Order::with('user')->latest()->take(5)->get();

        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        $latestUsers = User::latest()->take(5)->get();

        $totalSales = Order::where('status', 'Delivered')
        ->sum('total_price');

        $pendingOrders = Order::where('status', 'Pending')->count();

        $processingOrders = Order::where('status', 'Processing')->count();

        $deliveredOrders = Order::where('status', 'Delivered')->count();

        return view('admin.dashboard', compact(
            'productsCount',
            'categoriesCount',
            'ordersCount',
            'usersCount',
            'latestOrders',
            'latestProducts',
            'latestUsers',
            'totalSales',
            'pendingOrders',
            'processingOrders',
            'deliveredOrders'
        ));
    }
}
