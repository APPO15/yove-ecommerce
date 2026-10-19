@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header">
        <h3>Add Product</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Product Name -->
            <div class="mb-3">

                <label class="form-label">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}">

            </div>

            <!-- Description -->
            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control">{{ old('description') }}</textarea>

            </div>

            <!-- Category -->
            <div class="mb-3">

                <label class="form-label">
                    Category
                </label>

                <select
                    name="category_id"
                    class="form-select">

                    <option value="">
                        Choose Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Price -->
            <div class="mb-3">

                <label class="form-label">
                    Price
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"
                    value="{{ old('price') }}">

            </div>

            <!-- Stock -->
            <div class="mb-3">

                <label class="form-label">
                    Stock
                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock') }}">

            </div>

            <!-- Image -->
            <div class="mb-3">

                <label class="form-label">
                    Product Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="form-control">

            </div>

            <button
                class="btn btn-success">

                Save Product

            </button>

        </form>

    </div>

</div>

@endsection
