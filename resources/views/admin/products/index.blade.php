@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@extends('admin.layouts.app')

@section('content')
<form action="{{ route('admin.products.index') }}"
      method="GET"
      class="mb-4">

    <div class="row g-2">

        {{-- Search --}}
        <div class="col-md-5">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search products..."
                value="{{ request('search') }}">

        </div>

        {{-- Category --}}
        <div class="col-md-4">

            <select name="category_id" class="form-select">

                <option value="">All Categories</option>
                <option value="1">shorts</option>
                <option value="2">shirts</option>
                <option value="3">pants</option>


                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Buttons --}}
        <div class="col-md-3">

            <button class="btn btn-primary">
                Search
            </button>

            <a href="{{ route('admin.products.index') }}"
               class="btn btn-secondary">

                Clear

            </a>

        </div>

    </div>

</form>
<div class="d-flex justify-content-between align-items-center mb-3">

    <h4>
        Products
        <span class="badge bg-secondary">
            {{ $products->total() }}
        </span>
    </h4>

    <a href="{{ route('admin.products.create') }}"
       class="btn btn-primary">
        + Add Product
    </a>

</div>



<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Image</th>

                    <th>Name</th>

                    <th>Category</th>

                    <th>Price</th>

                    <th>Stock</th>

                    <th width="180">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($products as $product)

                <tr>

                    <td>{{ $product->id }}</td>

                    <td>

                        @if($product->image)

                            <img src="{{ asset('storage/'.$product->image) }}"
                                 width="70"
                                 class="rounded">

                        @else

                            No Image

                        @endif

                    </td>

                    <td>{{ $product->name }}</td>

                    <td>{{ $product->category?->name }}</td>

                    <td>${{ number_format($product->price,2) }}</td>

                    <td>

                        <div class="mb-1">
                            {{ $product->stock }}
                        </div>

                        @if($product->stock > 10)

                            <span class="badge bg-success">
                                In Stock
                            </span>

                        @elseif($product->stock > 0)

                            <span class="badge bg-warning text-dark">
                                Low Stock
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Out of Stock
                            </span>

                        @endif

                    </td>
                    <td>
                        <a href="{{ route('admin.products.create') }}"
                           class="btn btn-success btn-sm">
                            Create
                        </a>

                    </td>
                    <td>
                        <a href="{{ route('admin.products.show',$product) }}"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="{{ route('admin.products.edit',$product) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.products.destroy',$product) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this product?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Products Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>
        <div class="mt-3">
    {{ $products->withQueryString()->links() }}
</div>

{{ $products->withQueryString()->links() }}
    </div>

</div>

@endsection
