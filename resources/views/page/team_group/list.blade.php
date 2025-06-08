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

    .compact-view .product-group {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .compact-view .product-group:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .compact-view .product-group-header {
        background-color: #f8f9fa;
        padding: 12px 15px;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .compact-view .product-group-header .group-title {
        font-size: 1.1rem;
        color: #495057;
    }

    .compact-view .product-group-header .group-actions {
        display: flex;
        gap: 10px;
    }

    .compact-view .product-group-body {
        padding: 15px;
    }

    .compact-view .product-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        transition: background-color 0.2s ease;
    }

    .compact-view .product-item:hover {
        background-color: #f8f9fa;
    }

    .compact-view .product-item:last-child {
        border-bottom: none;
    }

    .compact-view .product-info {
        flex: 1;
    }

    .compact-view .product-info .product-name {
        font-weight: 500;
        color: #212529;
        margin-bottom: 4px;
    }

    .compact-view .product-info .product-details {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 0.85rem;
        color: #6c757d;
    }

    .compact-view .product-info .product-details span {
        display: inline-flex;
        align-items: center;
    }

    .compact-view .product-info .product-details i {
        margin-right: 4px;
    }

    .compact-view .product-quantity {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 6px;
    }

    .compact-view .quantity-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 60px;
        padding: 6px 12px;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .compact-view .quantity-badge:hover {
        transform: translateY(-1px);
    }

    .compact-view .quantity-total {
        background-color: #e9ecef;
        color: #495057;
    }

    .compact-view .quantity-available {
        background-color: #d4edda;
        color: #155724;
    }

    .compact-view .quantity-unavailable {
        background-color: #f8d7da;
        color: #721c24;
    }

    .compact-view .product-actions {
        display: flex;
        gap: 8px;
        margin-left: 15px;
    }

    .compact-view .product-actions .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .compact-view .product-actions .btn:hover {
        transform: translateY(-1px);
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

    .view-transition {
        transition: all 0.3s ease;
    }

    .view-transition.fade-out {
        opacity: 0;
        transform: translateY(-10px);
    }

    .view-transition.fade-in {
        opacity: 1;
        transform: translateY(0);
    }

    .no-access {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .no-access:hover {
        transform: none !important;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-badge.available {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.unavailable {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-badge i {
        margin-right: 4px;
    }

    .group-collapse-btn {
        background: none;
        border: none;
        color: #6c757d;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .group-collapse-btn:hover {
        background-color: #e9ecef;
        color: #495057;
    }

    .group-collapse-btn i {
        transition: transform 0.3s ease;
    }

    .group-collapsed .group-collapse-btn i {
        transform: rotate(-90deg);
    }

    .group-collapsed .product-group-body {
        display: none;
    }

    /* New styles for compact view enhancements */
    .compact-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .compact-search {
        flex: 1;
        max-width: 300px;
    }

    .compact-search .input-group {
        width: 100%;
    }

    .compact-search .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .compact-search .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .compact-sort {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .compact-sort select {
        max-width: 150px;
    }

    .compact-view .product-group.highlight {
        border: 2px solid #007bff;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
        }
    }

    .compact-view .product-item.highlight {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .compact-view .no-results {
        text-align: center;
        padding: 30px;
        color: #6c757d;
        font-style: italic;
    }

    .compact-view .group-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 8px 12px;
        background-color: #e9ecef;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .compact-view .group-summary .summary-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .compact-view .group-summary .summary-item i {
        color: #495057;
    }

    .compact-view .product-item .product-price {
        font-weight: 500;
        color: #28a745;
    }

    .compact-view .product-item .product-rental {
        font-weight: 500;
        color: #17a2b8;
    }

    .compact-view .product-item .product-location {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #6c757d;
        font-size: 0.8rem;
    }

    .compact-view .product-item .product-location i {
        color: #6c757d;
    }

    .compact-view .product-item .product-location .location-badge {
        background-color: #e9ecef;
        color: #495057;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.75rem;
    }
</style>
@endpush

@section('content')
<div class="container py-5 view-transition" id="main-content">
    {{-- <div class="d-flex justify-content-end mb-3">
        <div class="view-toggle">
            <input class="form-check-input" type="radio" name="viewMode" id="standardView" checked>
            <label class="form-check-label me-2" for="standardView">Standard</label>
            <input class="form-check-input" type="radio" name="viewMode" id="compactView">
            <label class="form-check-label" for="compactView">Compact</label>
        </div>
    </div> --}}
    <div class="standard-view">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center text-body-secondary"
                        style="font-weight: 600; color: #000;">
                        List Tim
                        <a class="btn btn-primary" style="color: white !important;"
                            href="{{ route('team_group.create') }}">
                            <i class="bi bi-plus-circle me-2"></i> Tambah Tim
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Nama Tim</th>
                                        <th style="text-align: center;">Anggota</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $i => $team)
                                    <tr>
                                        <td style="text-align: center;">{{ $i+1 }}</td>
                                        <td style="text-align: center;">{{ $team->name }}</td>
                                        <td style="text-align: center;">
                                            <div style="margin:0; padding-left:1em;">
                                                @foreach ($team->members as $member)
                                                <div>{{ $member->user->name ?? '-' }}
                                                    ({{ $member->user->email ?? '-' }})</div>
                                                @endforeach
                                            </div>
                                            @if($team->members->isEmpty())
                                            <p class="text-muted">No members</p>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('team_group.edit', $team->group_id) }}"
                                                class="btn btn-secondary btn-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('team_group.destroy', $team->group_id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirm('Yakin hapus tim ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="compact-view">
        @foreach ($teams as $item)
        <div class="product-group mb-3">
            <div class="product-group-header d-flex justify-content-between align-items-center">
                <span class="group-title">{{ $item->name }}</span>
                <div class="group-actions">
                    <a href="{{ route('team_group.edit', $item->group_id) }}" class="btn btn-secondary btn-sm"
                        title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('team_group.destroy', $item->group_id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                            onclick="return confirm('Yakin hapus tim ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="product-group-body">
                <div class="product-info">
                    <div class="product-details">
                        <span><i class="bi bi-envelope"></i> {{ $item->email }}</span>
                        <span><i class="bi bi-phone"></i> {{ $item->phone }}</span>
                        <span><i class="bi bi-person-badge"></i> {{ $item->role }}</span>
                        <span><i class="bi bi-check-circle"></i> {{ $item->status }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="py-3 mt-3">
            <div class="col d-md-block d-none">
                {{ $teams->onEachSide(1)->links() }}
            </div>
            <div class="col d-md-none d-sm-block">
                {{ $teams->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    document.getElementById('standardView').addEventListener('change', function() {
        document.getElementById('main-content').classList.remove('view-compact');
    });
    document.getElementById('compactView').addEventListener('change', function() {
        document.getElementById('main-content').classList.add('view-compact');
    });
</script>
{{-- filterBtn filterForm --}}
@endpush