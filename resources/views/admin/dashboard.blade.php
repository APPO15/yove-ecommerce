@extends('admin.layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <h5>Products</h5>
                <h2>{{ $productsCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <h5>Categories</h5>
                <h2>{{ $categoriesCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <h5>Orders</h5>
                <h2>{{ $ordersCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <h5>Users</h5>
                <h2>{{ $usersCount }}</h2>
            </div>
        </div>
    </div>

</div>
<div class="card mt-4 shadow">

    <div class="card-header">
        <h5 class="mb-0">Latest Orders</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                @forelse($latestOrders as $order)

                    <tr>

                        <td>{{ $order->id }}</td>

                        <td>{{ $order->user?->name }}</td>

                        <td>${{ $order->total_price }}</td>

                        <td>{{ $order->status }}</td>

                        <td>{{ $order->created_at->format('Y-m-d') }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">
                            No Orders Found
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
<div class="card mt-4 shadow">

    <div class="card-header">
        <h5 class="mb-0">Latest Products</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                @forelse($latestProducts as $product)

                    <tr>

                        <td>{{ $product->id }}</td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->category?->name ?? 'No Category' }}</td>

                        <td>${{ number_format($product->price, 2) }}</td>

                        <td>{{ $product->stock }}</td>

                        <td>{{ $product->created_at->format('Y-m-d') }}</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No Products Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
<div class="card mt-4 shadow">

    <div class="card-header">
        <h5 class="mb-0">Latest Users</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered At</th>
                </tr>
            </thead>

            <tbody>

                @forelse($latestUsers as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">
                            No Users Found
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
<div class="row mt-3">

    <div class="col-md-4">

        <div class="card border-success shadow">

            <div class="card-body text-center">

                <h5 class="text-success">
                    Total Sales
                </h5>

                <h2 class="fw-bold">
                    ${{ number_format($totalSales, 2) }}
                </h2>

            </div>

        </div>

    </div>

</div>
<div class="row mt-4">

    <div class="col-md-4">
        <div class="card border-warning shadow">
            <div class="card-body text-center">
                <h5 class="text-warning">Pending Orders</h5>
                <h2>{{ $pendingOrders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-primary shadow">
            <div class="card-body text-center">
                <h5 class="text-primary">Processing Orders</h5>
                <h2>{{ $processingOrders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success shadow">
            <div class="card-body text-center">
                <h5 class="text-success">Delivered Orders</h5>
                <h2>{{ $deliveredOrders }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection
