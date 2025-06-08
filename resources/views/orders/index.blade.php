@extends('layouts.index')
@push('css')
<style>
    .view-toggle {
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 5px;
        padding: 5px 10px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .view-toggle:hover {
        background-color: #e9ecef;
    }

    .view-toggle .form-check-input {
        margin-right: 5px;
        cursor: pointer;
    }

    .view-toggle .form-check-label {
        cursor: pointer;
        user-select: none;
    }

    .compact-view .order-group {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .compact-view .order-group:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .compact-view .order-group-header {
        background-color: #f8f9fa;
        padding: 12px 15px;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .compact-view .order-group-header .group-title {
        font-size: 1.1rem;
        color: #495057;
    }

    .compact-view .order-group-body {
        padding: 15px;
    }

    .compact-view .order-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        transition: background-color 0.2s ease;
    }

    .compact-view .order-item:hover {
        background-color: #f8f9fa;
    }

    .compact-view .order-item:last-child {
        border-bottom: none;
    }

    .compact-view .order-info {
        flex: 1;
    }

    .compact-view .order-info .order-number {
        font-weight: 500;
        color: #212529;
        margin-bottom: 4px;
    }

    .compact-view .order-info .order-details {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 0.85rem;
        color: #6c757d;
    }

    .compact-view .order-info .order-details span {
        display: inline-flex;
        align-items: center;
    }

    .compact-view .order-info .order-details i {
        margin-right: 4px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-badge.completed {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-badge.cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .status-badge.process {
    background-color: #cce5ff;
    color: #004085;
    }

    .status-badge i {
        margin-right: 4px;
    }

    .standard-view {
        display: block;
    }

    .compact-view {
        display: none;
    }

    .view-compact .standard-view {
        display: none;
    }

    .view-compact .compact-view {
        display: block;
    }

    .btn-info {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
        color: #fff;
    }

    .btn-info:hover {
        background-color: #31d2f2;
        border-color: #25cff2;
        color: #fff;
    }

    .btn-info:focus {
        background-color: #31d2f2;
        border-color: #25cff2;
        color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.25);
    }

    .btn-info:active {
        background-color: #3dd5f3;
        border-color: #25cff2;
        color: #fff;
    }

    .btn-info:disabled {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
    }

    .btn-info .bi {
        margin-right: 4px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Order</h1>
        {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="view-toggle">
                <input class="form-check-input" type="checkbox" id="viewToggle">
                <label class="form-check-label" for="viewToggle">Tampilan Compact</label>
            </div>
        </div> --}}
    </div>

    <div class="view-transition">
        <!-- Standard View -->
        <div class="standard-view">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No. Order</th>
                                    <th>Pelanggan</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="status-badge {{ $order->status }}">
                                            <i
                                                class="bi bi-{{ $order->status === 'completed' ? 'check-circle' : ($order->status === 'pending' ? 'clock' : 'x-circle') }}"></i>
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Compact View -->
        <div class="compact-view">
            @foreach($orders as $order)
            <div class="order-group">
                <div class="order-group-header">
                    <div class="group-title">
                        Order #{{ $order->order_number }}
                    </div>
                    <div class="group-actions">
                        <span class="status-badge {{ $order->status }}">
                            <i
                                class="bi bi-{{ $order->status === 'completed' ? 'check-circle' : ($order->status === 'pending' ? 'clock' : 'x-circle') }}"></i>
                            {{ ucfirst($order->status) }}
                        </span>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                    </div>
                </div>
                <div class="order-group-body">
                    <div class="order-item">
                        <div class="order-info">
                            <div class="order-number">{{ $order->user->name }}</div>
                            <div class="order-details">
                                <span><i class="bi bi-envelope"></i> {{ $order->email }}</span>
                                <span><i class="bi bi-telephone"></i> {{ $order->phone_number }}</span>
                                <span><i class="bi bi-calendar"></i>
                                    {{ $order->created_at->format('d/m/Y H:i') }}</span>
                                <span><i class="bi bi-currency-dollar"></i> Rp
                                    {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#viewToggle').change(function() {
            $('.view-transition').toggleClass('view-compact');
        });
    });
</script>
@endpush