@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header">
        <h3>Edit Product</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.products.update', $product) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $product->name) }}">
            </div>

            <!-- Description -->
            <div class="mb-3">

                <label class="form-label">Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4">{{ old('description', $product->description) }}</textarea>

            </div>

            <!-- Category -->
            <div class="mb-3">

                <label class="form-label">Category</label>

                <select
                    name="category_id"
                    class="form-select">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Price -->
            <div class="mb-3">

                <label class="form-label">Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"
                    value="{{ old('price', $product->price) }}">

            </div>

            <!-- Stock -->
            <div class="mb-3">

                <label class="form-label">Stock</label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock', $product->stock) }}">

            </div>

            <!-- Current Image -->
            @if($product->image)

                <div class="mb-3">

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        width="120"
                        class="rounded">

                </div>

            @endif

            <!-- New Image -->
            <div class="mb-3">

                <label class="form-label">
                    New Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="form-control">

            </div>

            <button class="btn btn-success">

                Update Product

            </button>

        </form>

    </div>

</div>

@endsection
