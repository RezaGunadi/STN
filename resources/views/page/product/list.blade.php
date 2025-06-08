@extends('layouts.index')
@push('css')
{{-- 
<link rel="stylesheet" href="/resources/demos/style.css"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
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

    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        min-height: 38px;
        padding-top: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #e9ecef;
        border: 1px solid #ced4da;
    }

    .select2-container--default .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding-top: 0;
    }
</style>
@endpush
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Product List</h3>
                        <div>
                            <a href="{{ route('input_product') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New Product
                            </a>
                            {{-- @if(auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('product.transfer.index') }}" class="btn btn-warning">
                            <i class="fas fa-exchange-alt"></i> Transfer Products
                            </a>
                            @endif --}}
                            <button class="btn btn-info me-2 text-white" id="filter_btn"><i class="bi bi-filter"></i>
                                Show Filter</button>
                            <button class="btn btn-secondary d-none text-white" id="filter_btn_hide">Hide
                                Filter</button>
                            <div class="btn-group ms-2">
                                <button type="button" class="btn btn-outline-secondary" id="standardViewBtn">
                                    <i class="fas fa-list"></i> Standard View
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="compactViewBtn">
                                    <i class="fas fa-th-large"></i> Compact View
                                </button>
                            </div>
                            <a href="{{ route('list_management_product') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-gear-fill"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('list_product') }}" method="GET" id="filterForm" class="d-none mb-4">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ request('category') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand"
                                    value="{{ request('brand') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    value="{{ request('type') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="product_code" class="form-label">Product Code</label>
                                <input type="text" class="form-control" id="product_code" name="product_code"
                                    value="{{ request('product_code') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ request('product_name') }}">
                            </div>
                            <div class="col-md-4 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
                            </div>
                        </div>
                    </form>
                    <!-- Standard View -->
                    <div id="standardView">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Team</th>
                                        <th>Event</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $number + $loop->iteration }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->brand }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            @if($item->is_available == 1)
                                            <span class="badge bg-success">Available</span>
                                            @else
                                            <span class="badge bg-danger">Not Available</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $item->getTeam ? $item->getTeam->name : '-' }}
                                            {{-- @foreach ($item->getTeams as $team)
                                            {{ $team->user->name }}
                                            @endforeach --}}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $item->getEvent ? $item->getEvent->event_name : '-' }}
                                            {{-- @foreach ($item->getEvent as $item)
                                            @endforeach --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_product', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('generate_qr_product') }}" method="GET"
                                                class="d-inline">
                                                <input type="hidden" name="qr" value="{{ $item->qr_string }}">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-download"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>

                    <!-- Compact View -->
                    <div id="compactView" style="display: none;">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="compactSearch"
                                placeholder="Search in compact view...">
                            <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="accordion" id="productGroups">
                            @foreach($groupedProducts as $key => $group)
                            <div class="accordion-item product-group" data-category="{{ $group['category'] }}"
                                data-brand="{{ $group['brand'] }}" data-type="{{ $group['type'] }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ md5($key) }}">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <div>
                                                <strong>{{ $group['category'] }}</strong> |
                                                <span class="text-muted">{{ $group['brand'] }}</span> |
                                                <span class="text-muted">{{ $group['type'] }}</span>
                                            </div>
                                            <div class="ms-3">
                                                <span class="badge bg-primary">Total:
                                                    {{ $group['total_quantity'] }}</span>
                                                <span class="badge bg-success">Available:
                                                    {{ $group['available_quantity'] }}</span>
                                                <span class="badge bg-danger">Not Available:
                                                    {{ $group['non_available_quantity'] }}</span>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ md5($key) }}" class="accordion-collapse collapse"
                                    data-bs-parent="#productGroups">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Product Code</th>
                                                        <th>Product Name</th>
                                                        <th>Status</th>
                                                        {{-- <th>Team</th>
                                                        <th>Event</th> --}}
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($group['products'] as $product)
                                                    <tr>
                                                        <td>{{ $product->product_code }}</td>
                                                        <td>{{ $product->product_name }}</td>
                                                        <td>
                                                            @if($product->is_available == 1)
                                                            <span class="badge bg-success">Available</span>
                                                            @else
                                                            <span class="badge bg-danger">Not Available</span>
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ $product->team->name }}</td>
                                                        <td>{{ $product->event->name }}</td> --}}
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                onclick="editProduct({{ $product->id }})">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                onclick="deleteProduct({{ $product->id }})">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_code" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="is_available" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitAddProduct()">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="filterForm" method="GET" action="{{ route('list_product') }}">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ request('category') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{ request('brand') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" value="{{ request('type') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_code"
                            value="{{ request('product_code') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name"
                            value="{{ request('product_name') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script>
    $(document).ready(function() {
        // View toggle functionality
        const standardViewBtn = $('#standardViewBtn');
        const compactViewBtn = $('#compactViewBtn');
        const standardView = $('#standardView');
        const compactView = $('#compactView');
        
        // Load saved preference
        const savedView = localStorage.getItem('productListView') || 'standard';
        if (savedView === 'compact') {
            standardViewBtn.removeClass('active');
            compactViewBtn.addClass('active');
            standardView.hide();
            compactView.show();
        } else {
            standardViewBtn.addClass('active');
            compactViewBtn.removeClass('active');
            standardView.show();
            compactView.hide();
        }
        
        standardViewBtn.click(function() {
            standardViewBtn.addClass('active');
            compactViewBtn.removeClass('active');
            standardView.show();
            compactView.hide();
            localStorage.setItem('productListView', 'standard');
        });
        
        compactViewBtn.click(function() {
            standardViewBtn.removeClass('active');
            compactViewBtn.addClass('active');
            standardView.hide();
            compactView.show();
            localStorage.setItem('productListView', 'compact');
        });

        // Show/Hide filter
        $('#filter_btn').click(function() {
            $('#filterForm').removeClass('d-none');
            $('#filter_btn').addClass('d-none');
            $('#filter_btn_hide').removeClass('d-none');
        });
        $('#filter_btn_hide').click(function() {
            $('#filterForm').addClass('d-none');
            $('#filter_btn').removeClass('d-none');
            $('#filter_btn_hide').addClass('d-none');
        });
    });

    function editProduct(id) {
        // Implement edit functionality
        console.log('Edit product:', id);
    }

    function deleteProduct(id) {
        // Implement delete functionality
        console.log('Delete product:', id);
    }

    function submitAddProduct() {
        // Implement add product functionality
        console.log('Add product');
    }
</script>
@endpush