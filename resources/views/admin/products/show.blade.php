@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3>Product Details</h3>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                @if($product->image)

                    <img src="{{ asset('storage/'.$product->image) }}"
                         class="img-fluid rounded shadow">

                @else

                    <img src="https://placehold.co/400x400?text=No+Image"
                         class="img-fluid rounded">

                @endif

            </div>

            <div class="col-md-8">

                <table class="table table-bordered">

                    <tr>
                        <th>ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $product->name }}</td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{ $product->category?->name }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description }}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>${{ number_format($product->price,2) }}</td>
                    </tr>

                    <tr>
                        <th>Stock</th>
                        <td>{{ $product->stock }}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
