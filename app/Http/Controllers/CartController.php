<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // عرض السلة وحساب الإجمالي
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // إضافة منتج لسلة المشتريات
    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);

        // التحقق من أن المنتج متوفر في المخزون
        if ($product->quantity < $quantity) {
            return back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
        }

        // البحث عما إذا كان المنتج موجود بالفعل في سلة المستخدم
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // زيادة الكمية لو المنتج موجود بالفعل
            $newQuantity = $cartItem->quantity + $quantity;

            if ($product->quantity < $newQuantity) {
                return back()->with('error', 'الكمية المحددة تتجاوز المتوفر في المخزون.');
            }

            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // إضافة المنتج كعنصر جديد
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return back()->with('success', 'تمت إضافة المنتج إلى السلة بنجاح!');
    }

    // تحديث كمية منتج في السلة
    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($cart->product->quantity < $request->quantity) {
            return back()->with('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
        }

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'تم تحديث الكمية بنجاح.');
    }

    // حذف منتج من السلة
    public function remove(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'تم حذف المنتج من السلة.');
    }
}
