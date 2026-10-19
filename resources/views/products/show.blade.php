<x-app-layout>

```
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Breadcrumb -->
    <div class="mb-8 text-sm text-gray-500">

        <a href="{{ route('products.index') }}"
           class="hover:text-orange-500 transition">

            Products

        </a>

        <span class="mx-2">/</span>

        <span class="text-gray-900">
            {{ $product->name }}
        </span>

    </div>

    <!-- Product -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- Image -->
        <div class="bg-gray-100 rounded-2xl overflow-hidden">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-[550px] object-cover">

            @else

                <div class="h-[550px] flex items-center justify-center text-gray-400">
                    No Image
                </div>

            @endif

        </div>

        <!-- Information -->
        <div class="flex flex-col justify-center">

            @if($product->category)

                <p class="text-sm uppercase tracking-widest text-orange-500 font-semibold">
                    {{ $product->category->name }}
                </p>

            @endif

            <h1 class="mt-3 text-4xl font-bold text-gray-900">
                {{ $product->name }}
            </h1>

            <!-- Price -->
            <div class="mt-6">

                <span class="text-3xl font-bold text-gray-900">
                    ${{ number_format($product->price, 2) }}
                </span>

            </div>

            <!-- Description -->
            <div class="mt-6">

                <h2 class="text-lg font-semibold text-gray-900">
                    Description
                </h2>

                <p class="mt-3 text-gray-600 leading-7">
                    {{ $product->description }}
                </p>

            </div>

            <!-- Stock -->
            <div class="mt-6">

                @if($product->quantity > 0)

                    <p class="text-sm text-green-600 font-medium">
                        ✓ In Stock
                        ({{ $product->quantity }} available)
                    </p>

                @else

                    <p class="text-sm text-red-600 font-medium">
                        ✕ Out of Stock
                    </p>

                @endif

            </div>

            <!-- Add To Cart -->
            <div class="mt-8">

                @if($product->quantity > 0)

                    <button
                        type="button"
                        class="w-full sm:w-auto px-8 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-orange-500 transition duration-300">

                        Add to Cart

                    </button>

                @else

                    <button
                        disabled
                        class="w-full sm:w-auto px-8 py-3 bg-gray-300 text-gray-500 font-semibold rounded-xl cursor-not-allowed">

                        Out of Stock

                    </button>

                @endif

            </div>

        </div>

    </div>

</div>
```

</x-app-layout>
