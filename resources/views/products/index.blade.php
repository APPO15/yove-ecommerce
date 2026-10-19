<x-app-layout>

```
<!-- Page Header -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
                Our Products
            </h1>

            <p class="mt-3 text-gray-600">
                Discover our latest collection
            </p>
        </div>

    </div>
</div>

<!-- Products -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    @if($products->count())

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($products as $product)

                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition duration-300">

                    <!-- Product Image -->
                    <a href="{{ route('products.show', $product) }}"
                       class="block overflow-hidden bg-gray-100">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">

                        @else

                            <div class="w-full h-72 flex items-center justify-center text-gray-400">
                                No Image
                            </div>

                        @endif

                    </a>

                    <!-- Product Info -->
                    <div class="p-5">

                        @if($product->category)

                            <p class="text-xs uppercase tracking-wider text-orange-500 font-semibold">
                                {{ $product->category->name }}
                            </p>

                        @endif

                        <h2 class="mt-2 text-lg font-semibold text-gray-900 truncate">
                            {{ $product->name }}
                        </h2>

                        <p class="mt-2 text-gray-500 text-sm line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <!-- Price -->
                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-xl font-bold text-gray-900">
                                ${{ number_format($product->price, 2) }}
                            </span>

                            <a
                                href="{{ route('products.show', $product) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-orange-500 transition">

                                View

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>

    @else

        <div class="text-center py-20">

            <div class="text-gray-400 text-5xl mb-4">
                🛍️
            </div>

            <h2 class="text-2xl font-semibold text-gray-900">
                No Products Found
            </h2>

            <p class="mt-2 text-gray-500">
                There are currently no products available.
            </p>

        </div>

    @endif

</div>
```

</x-app-layout>
