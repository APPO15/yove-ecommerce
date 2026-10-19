@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Orders</h2>
            <p class="text-muted mb-0">
                Manage all customer orders
            </p>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Orders Table --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($orders as $order)

                            <tr>

                                <td>
                                    #{{ $order->id }}
                                </td>

                                <td>
                                    {{ $order->user->name ?? 'Guest' }}
                                </td>

                                <td>
                ${{ number_format($order->total, 2) }}
                 </td>

                                <td>

                                    @php
                                        $statusClass = match($order->status) {
                                            'Pending' => 'bg-warning text-dark',
                                            'Processing' => 'bg-info text-dark',
                                            'Delivered' => 'bg-success',
                                            'Cancelled' => 'bg-danger',
                                            default => 'bg-secondary',
                                        };
                                    @endphp

                                    <span class="badge {{ $statusClass }}">
                                        {{ $order->status }}
                                    </span>

                                </td>

                                <td>
                                    {{ $order->created_at->format('Y-m-d H:i') }}
                                </td>

                                <td class="text-end">
                                  <a href="{{ route('admin.orders.show', $order->id) }}"class="btn btn-sm btn-primary">
                                    View
                                  </a>>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center text-muted py-4">
                                    No orders found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $orders->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
