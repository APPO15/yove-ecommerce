<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // عرض صفحة إدخال بيانات الشراء (العنوان ورقم الهاتف)
    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'سلة المشتريات فارغة.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    // حفظ الطلب وخصم الكميات من المخزون
    public function store(Request $request)
    {
        $request->validate([
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'سلة المشتريات فارغة.');
        }

        // استخدام Database Transaction لضمان سلامة العملية
        DB::transaction(function () use ($request, $cartItems) {
            $total = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // 1. إنشاء الطلب
            $order = Order::create([
                'user_id'      => Auth::id(),
                'total_amount' => $total,
                'phone'        => $request->phone,
                'address'      => $request->address,
                'status'       => 'pending',
            ]);

            // 2. نقل العناصر وخصم الكميات من المخزون
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);

                // خصم الكمية المشتراة من المخزون
                $item->product->decrement('quantity', $item->quantity);
            }

            // 3. تفريغ سلة المشتريات
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('home')->with('success', 'تم تسجيل طلبك بنجاح! وسنتواصل معك قريباً.');
    }
    // عرض طلبات المستخدم المسجل
public function userOrders()
{
    $orders = Order::with('items.product')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('orders.my_orders', compact('orders'));
}
}
