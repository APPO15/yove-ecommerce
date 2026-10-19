<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">سلة المشتريات 🛒</h2>

                {{-- رسائل النجاح أو الخطأ --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($cartItems->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="p-3">المنتج</th>
                                    <th class="p-3">السعر</th>
                                    <th class="p-3">الكمية</th>
                                    <th class="p-3">الإجمالي</th>
                                    <th class="p-3">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr class="border-b hover:bg-gray-50">
                                        {{-- اسم وصورة المنتج --}}
                                        <td class="p-3 flex items-center gap-3">
                                            @if ($item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                     alt="{{ $item->product->name }}"
                                                     class="w-12 h-12 object-cover rounded">
                                            @endif
                                            <span class="font-medium">{{ $item->product->name }}</span>
                                        </td>

                                        {{-- السعر الفردي --}}
                                        <td class="p-3">{{ number_format($item->product->price, 2) }} EGP</td>

                                        {{-- تحديث الكمية --}}
                                        <td class="p-3">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                       min="1" max="{{ $item->product->quantity }}"
                                                       class="w-16 border rounded text-center py-1 text-sm">
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs">
                                                    تحديث
                                                </button>
                                            </form>
                                        </td>

                                        {{-- إجمالي المنتج --}}
                                        <td class="p-3 font-semibold">
                                            {{ number_format($item->product->price * $item->quantity, 2) }} EGP
                                        </td>

                                        {{-- حذف عنصر من السلة --}}
                                        <td class="p-3">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('هل أنت تأكد من حذف المنتج من السلة؟')"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                                    حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- قسم الإجمالي وزر الشراء/Checkout --}}
                    <div class="mt-8 flex justify-between items-center border-t pt-4">
                        <div class="text-xl font-bold">
                            الإجمالي الكلي: <span class="text-indigo-600">{{ number_format($total, 2) }} EGP</span>
                        </div>
                        <div>
                            <a href="{{ route('checkout.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-lg text-lg font-medium transition">
                                متابعة الشراء (Checkout) 💳
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p class="text-lg">سلة المشتريات فارغة حالياً.</p>
                        <a href="{{ route('home') }}" class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
                            العودة للستور
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
