@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Order #{{ $order->id }}</h2>
            <p class="text-muted mb-0">
                Order details
            </p>
        </div>

        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-secondary">
            Back to Orders
        </a>

    </div>


    {{-- Customer Information --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <strong>Customer Information</strong>
        </div>

        <div class="card-body">

            <p>
                <strong>Name:</strong>
                {{ $order->user->name ?? 'Guest' }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $order->user->email ?? 'N/A' }}
            </p>

        </div>

    </div>


    {{-- Order Information --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <strong>Order Information</strong>
        </div>

        <div class="card-body">

            <p>
                <strong>Order ID:</strong>
                #{{ $order->id }}
            </p>

            <p>
                <strong>Status:</strong>

                <span class="badge bg-warning text-dark">
                    {{ $order->status }}
                </span>
            </p>

            <p>
                <strong>Date:</strong>
                {{ $order->created_at->format('Y-m-d H:i') }}
            </p>

        </div>

    </div>

{{-- Update Order Status --}}

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <strong>Update Order Status</strong>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
              method="POST">

            @csrf
            @method('PATCH')

            <div class="row align-items-end">

                <div class="col-md-8">

                    <label class="form-label">
                        Order Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="Pending"
                            {{ $order->status === 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Processing"
                            {{ $order->status === 'Processing' ? 'selected' : '' }}>
                            Processing
                        </option>

                        <option value="Delivered"
                            {{ $order->status === 'Delivered' ? 'selected' : '' }}>
                            Delivered
                        </option>

                        <option value="Cancelled"
                            {{ $order->status === 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                </div>

                <div class="col-md-4">

                    <button type="submit"
                            class="btn btn-primary w-100">
                        Update Status
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
    {{-- Products --}}

    <div class="card shadow-sm">

        <div class="card-header">
            <strong>Ordered Products</strong>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($order->orderItems as $item)

                            <tr>

                                <td>
                                    {{ $item->product->name ?? 'Deleted Product' }}
                                </td>

                                <td>
                                    ${{ number_format($item->price, 2) }}
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center text-muted py-4">
                                    No products found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="text-end mt-3">

                <h4>
                    Total:
                    ${{ number_format($order->total_price, 2) }}
                </h4>

            </div>

        </div>

    </div>

</div>

@endsection
