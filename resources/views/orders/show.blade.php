@extends('layouts.index')
@push('css')
<style>
    .order-detail-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .order-detail-header {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-bottom: 1px solid #dee2e6;
    }

    .order-detail-header h5 {
        margin: 0;
        color: #495057;
        font-weight: 600;
    }

    .order-detail-body {
        padding: 20px;
    }

    .info-group {
        margin-bottom: 15px;
    }

    .info-group:last-child {
        margin-bottom: 0;
    }

    .info-label {
        font-size: 0.875rem;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .info-value {
        font-size: 1rem;
        color: #212529;
        font-weight: 500;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.875rem;
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
        margin-right: 6px;
    }

    .item-table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .total-row {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background-color: #0dcaf0;
        border: 1px solid #0dcaf0;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .back-button:hover {
        background-color: #31d2f2;
        border-color: #25cff2;
        color: #fff;
    }

    .back-button:focus {
        background-color: #31d2f2;
        border-color: #25cff2;
        color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.25);
    }

    .back-button:active {
        background-color: #3dd5f3;
        border-color: #25cff2;
        color: #fff;
    }

    .back-button i {
        margin-right: 8px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Order</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('orders.index') }}" class="back-button btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Order
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Customer Information -->
        <div class="col-md-4">
            <div class="order-detail-card">
                <div class="order-detail-header">
                    <h5>Informasi Pelanggan</h5>
                </div>
                <div class="order-detail-body">
                    <div class="info-group">
                        <div class="info-label">Nama</div>
                        <div class="info-value">{{ $order->user->name }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $order->email }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">No. Telepon</div>
                        <div class="info-value">{{ $order->phone_number }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Alamat Pengiriman</div>
                        <div class="info-value">{{ $order->shipping_address }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Information -->
        <div class="col-md-4">
            <div class="order-detail-card">
                <div class="order-detail-header">
                    <h5>Informasi Order</h5>
                </div>
                <div class="order-detail-body">
                    <div class="info-group">
                        <div class="info-label">No. Order</div>
                        <div class="info-value">{{ $order->order_number }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="status-badge {{ $order->status }}">
                                <i
                                    class="bi bi-{{ $order->status === 'completed' ? 'check-circle' : ($order->status === 'pending' ? 'clock' : ($order->status === 'process' ? 'gear' : 'x-circle')) }}"></i>
                                {{ ucfirst($order->status) }}
                            </span>
                         
                        </div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Tanggal Order</div>
                        <div class="info-value">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Total Amount</div>
                        <div class="info-value">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="col-md-12 mt-4">
            <div class="order-detail-card">
                <div class="order-detail-header">
                    <h5>Item Order</h5>
                </div>
                <div class="order-detail-body">
                    <div class="table-responsive">
                        <table class="table table-bordered item-table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-end">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td class="text-end">Rp
                                        {{ number_format($item->product->rental_price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                                <tr class="total-row">
                                    <td colspan="3" class="text-end">Total:</td>
                                    <td class="text-end">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($order->status === 'pending')
<div class="px-3">

    <form action="{{ route('orders.process', $order->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm btn-primary ms-2 w-100 fs-4">
            <i class="bi bi-gear me-3"></i> Process
        </button>
    </form>
</div>
@endif
@endsection