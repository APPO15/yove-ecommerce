<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <h2 class="text-2xl font-bold mb-6">إتمام الطلب (Checkout) 💳</h2>

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">رقم الهاتف</label>
                        <input type="text" name="phone" required class="w-full border rounded p-2" placeholder="أدخل رقم هاتفك">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">عنوان التوصيل بالتفصيل</label>
                        <textarea name="address" rows="3" required class="w-full border rounded p-2" placeholder="المدينة، الشارع، رقم المبنى..."></textarea>
                    </div>

                    <div class="border-t pt-4 mt-6">
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-xl font-bold">الإجمالي المطلوب سداده:</span>
                            <span class="text-2xl font-bold text-indigo-600">{{ number_format($total, 2) }} EGP</span>
                        </div>

                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition">
                            تأكيد الطلب 🚀
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
