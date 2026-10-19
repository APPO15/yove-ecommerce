<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">طلباتي السابقة 📦</h2>

                @if ($orders->count() > 0)
                    <div class="space-y-6">
                        @foreach ($orders as $order)
                            <div class="border rounded-lg p-4 bg-gray-50">
                                <div class="flex justify-between items-center border-b pb-3 mb-3">
                                    <div>
                                        <span class="font-bold text-lg">طلب #{{ $order->id }}</span>
                                        <span class="text-sm text-gray-500 mr-3">({{ $order->created_at->format('Y-m-d H:i') }})</span>
                                    </div>
                                    <div>
                                        @if ($order->status == 'pending')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-semibold">قيد الانتظار</span>
                                        @elseif($order->status == 'processing')
                                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">قيد التجهيز</span>
                                        @elseif($order->status == 'completed')
                                            <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-semibold">مكتمل</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-semibold">ملغي</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- تفاصيل المنتجات داخل الطلب --}}
                                <div class="space-y-2 mb-3">
                                    @foreach ($order->items as $item)
                                        <div class="flex justify-between items-center text-sm">
                                            <span>{{ $item->product->name ?? 'منتج غير متوفر' }} (×{{ $item->quantity }})</span>
                                            <span class="font-medium">{{ number_format($item->price * $item->quantity, 2) }} EGP</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="border-t pt-3 flex justify-between items-center text-sm">
                                    <span class="text-gray-600">العنوان: {{ $order->address }} | هاتف: {{ $order->phone }}</span>
                                    <span class="font-bold text-base text-indigo-600">الإجمالي: {{ number_format($order->total_amount, 2) }} EGP</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p class="text-lg">لا توجد لديك طلبات سابقة حتى الآن.</p>
                        <a href="{{ route('home') }}" class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
                            تصفح المنتجات
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
