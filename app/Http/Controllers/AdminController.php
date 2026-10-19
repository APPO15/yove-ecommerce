<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
        {
            return view('admin\users.index');
        }


    // عرض كافة الطلبات للآدمن
    public function orders()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // تحديث حالة الطلب
    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

}
