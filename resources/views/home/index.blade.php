<x-app-layout>

```
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gray-950 text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[650px] py-16">

            <!-- Hero Content -->
            <div>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-orange-500/10 text-orange-400 text-sm font-semibold">
                    New Collection 2026
                </span>

                <h1 class="mt-6 text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight">
                    Style That
                    <span class="text-orange-500">
                        Defines You
                    </span>
                </h1>

                <p class="mt-6 text-lg text-gray-300 max-w-xl leading-8">
                    Discover modern fashion designed for your everyday style.
                    Explore our latest collection and find something made for you.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a
                        href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center px-7 py-3.5 bg-orange-500 text-white font-semibold rounded-xl hover:bg-orange-600 transition duration-300">

                        Shop Now

                    </a>

                    <a
                        href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center px-7 py-3.5 border border-gray-600 text-white font-semibold rounded-xl hover:bg-white hover:text-gray-900 transition duration-300">

                        Explore Collection

                    </a>

                </div>

                <!-- Stats -->
                <div class="mt-12 flex flex-wrap gap-10">

                    <div>
                        <p class="text-3xl font-bold">100+</p>
                        <p class="mt-1 text-sm text-gray-400">Products</p>
                    </div>

                    <div>
                        <p class="text-3xl font-bold">50+</p>
                        <p class="mt-1 text-sm text-gray-400">Styles</p>
                    </div>

                    <div>
                        <p class="text-3xl font-bold">24/7</p>
                        <p class="mt-1 text-sm text-gray-400">Support</p>
                    </div>

                </div>

            </div>

            <!-- Hero Image -->
            <div class="relative">

                <div class="absolute -top-10 -right-10 w-72 h-72 bg-orange-500/20 rounded-full blur-3xl"></div>

                <div class="absolute -bottom-10 -left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl"></div>

                <div class="relative rounded-3xl overflow-hidden border border-gray-800 shadow-2xl">

                    <img
                        src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1000&q=80"
                        alt="Yove Fashion Collection"
                        class="w-full h-[550px] object-cover">

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Categories -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-end justify-between mb-10">

            <div>

                <p class="text-sm font-semibold uppercase tracking-widest text-orange-500">
                    Shop by Category
                </p>

                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">
                    Find Your Style
                </h2>

            </div>

            <a
                href="{{ route('products.index') }}"
                class="hidden sm:inline-flex text-sm font-semibold text-gray-900 hover:text-orange-500 transition">

                View All →

            </a>

        </div>

        @if(isset($categories) && $categories->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($categories as $category)

                    <a
                        href="{{ route('products.index') }}"
                        class="group relative h-64 rounded-2xl overflow-hidden bg-gray-100">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 z-20">

                            <h3 class="text-xl font-bold text-white">
                                {{ $category->name }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-300">
                                Explore Collection →
                            </p>

                        </div>

                        <div class="absolute inset-0 bg-gray-300 group-hover:scale-105 transition duration-500"></div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach(['Men', 'Women', 'Shoes', 'Accessories'] as $category)

                    <a
                        href="{{ route('products.index') }}"
                        class="group relative h-64 rounded-2xl overflow-hidden bg-gray-100">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 z-20">

                            <h3 class="text-xl font-bold text-white">
                                {{ $category }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-300">
                                Explore Collection →
                            </p>

                        </div>

                        <div class="absolute inset-0 bg-gray-800 group-hover:scale-105 transition duration-500"></div>

                    </a>

                @endforeach

            </div>

        @endif

    </div>

</section>


<!-- Featured Products -->
<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <p class="text-sm font-semibold uppercase tracking-widest text-orange-500">
                Our Collection
            </p>

            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">
                Featured Products
            </h2>

            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Discover some of our latest products carefully selected for you.
            </p>

        </div>

        @if(isset($products) && $products->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($products as $product)

                    <div class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">

                        <a
                            href="{{ route('products.show', $product) }}"
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
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="flex items-center gap-2 mt-3">
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}" class="w-16 text-center border rounded-md py-1 text-sm">
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1.5 rounded-md text-sm transition">
                                    إضافة للسلة 🛒
                                </button>
                            </div>
                        </form>
                        <div class="p-5">

                            @if($product->category)

                                <p class="text-xs uppercase tracking-wider text-orange-500 font-semibold">
                                    {{ $product->category->name }}
                                </p>

                            @endif

                            <h3 class="mt-2 font-semibold text-gray-900 truncate">
                                {{ $product->name }}
                            </h3>

                            <div class="mt-4 flex items-center justify-between">

                                <span class="text-lg font-bold text-gray-900">
                                    ${{ number_format($product->price, 2) }}
                                </span>

                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="text-sm font-semibold text-gray-900 hover:text-orange-500 transition">

                                    View →

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="text-center mt-10">

                <a
                    href="{{ route('products.index') }}"
                    class="inline-flex px-7 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-orange-500 transition">

                    View All Products

                </a>

            </div>

        @else

            <div class="bg-white rounded-2xl border border-gray-100 py-16 text-center">

                <div class="text-5xl mb-4">
                    🛍️
                </div>

                <h3 class="text-xl font-semibold text-gray-900">
                    No Products Available
                </h3>

                <p class="mt-2 text-gray-500">
                    New products will appear here soon.
                </p>

            </div>

        @endif

    </div>

</section>


<!-- Why Yove -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <p class="text-sm font-semibold uppercase tracking-widest text-orange-500">
                Why Yove?
            </p>

            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">
                Shopping Made Simple
            </h2>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Feature -->
            <div class="text-center p-8 rounded-2xl bg-gray-50">

                <div class="mx-auto w-14 h-14 flex items-center justify-center rounded-2xl bg-orange-100 text-orange-500 text-2xl">
                    🚚
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Fast Delivery
                </h3>

                <p class="mt-3 text-gray-500 leading-7">
                    Get your favorite products delivered quickly and safely.
                </p>

            </div>

            <!-- Feature -->
            <div class="text-center p-8 rounded-2xl bg-gray-50">

                <div class="mx-auto w-14 h-14 flex items-center justify-center rounded-2xl bg-orange-100 text-orange-500 text-2xl">
                    🔒
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Secure Shopping
                </h3>

                <p class="mt-3 text-gray-500 leading-7">
                    Your account and shopping experience are protected.
                </p>

            </div>

            <!-- Feature -->
            <div class="text-center p-8 rounded-2xl bg-gray-50">

                <div class="mx-auto w-14 h-14 flex items-center justify-center rounded-2xl bg-orange-100 text-orange-500 text-2xl">
                    ⭐
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Quality Products
                </h3>

                <p class="mt-3 text-gray-500 leading-7">
                    Discover products selected with quality and style in mind.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- Newsletter -->
<section class="py-20 bg-gray-950 text-white">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <p class="text-sm font-semibold uppercase tracking-widest text-orange-500">
            Stay Updated
        </p>

        <h2 class="mt-3 text-3xl sm:text-4xl font-bold">
            Get the Latest from Yove
        </h2>

        <p class="mt-4 text-gray-400">
            Stay updated with our latest products and offers.
        </p>

        <div class="mt-8 flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">

            <input
                type="email"
                placeholder="Enter your email"
                class="flex-1 px-5 py-3 rounded-xl text-gray-900 border-0 focus:ring-2 focus:ring-orange-500">

            <button
                type="button"
                class="px-6 py-3 bg-orange-500 rounded-xl font-semibold hover:bg-orange-600 transition">

                Subscribe

            </button>

        </div>

    </div>

</section>


<!-- Footer -->
<footer class="bg-gray-950 border-t border-gray-800">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

            <p class="text-sm text-gray-500">
                © {{ date('Y') }} Yove. All rights reserved.
            </p>

            <div class="flex gap-6 text-sm text-gray-500">

                <a href="{{ route('home') }}" class="hover:text-white transition">
                    Home
                </a>

                <a href="{{ route('products.index') }}" class="hover:text-white transition">
                    Products
                </a>

                @auth
                    <a href="{{ route('cart.index') }}" class="hover:text-white transition">
                        Cart
                    </a>
                @endauth

            </div>

        </div>

    </div>

</footer>
```

</x-app-layout>
