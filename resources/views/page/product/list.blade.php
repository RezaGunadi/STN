@extends('layouts.index')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
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
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Product List</h3>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addProductModal">
                                <i class="fas fa-plus"></i> Add New Product
                            </button>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#filterModal">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <div class="btn-group ms-2">
                                <button type="button" class="btn btn-outline-secondary" id="standardViewBtn">
                                    <i class="fas fa-list"></i> Standard View
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="compactViewBtn">
                                    <i class="fas fa-th-large"></i> Compact View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info"
                                                onclick="editProduct({{ $item->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteProduct({{ $item->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                onclick="editProduct({{ $product->id }})">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                onclick="deleteProduct({{ $product->id }})">
                                                                <i class="fas fa-trash"></i>
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
                <form id="filterForm">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="applyFilter()">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $( function() {
        $( "#payment_date" ).datepicker();
    });
    
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
        
        // Compact view search functionality
        $('#compactSearch').on('input', function() {
            const searchText = $(this).val().toLowerCase();
            $('.product-group').each(function() {
                const category = $(this).data('category').toLowerCase();
                const brand = $(this).data('brand').toLowerCase();
                const type = $(this).data('type').toLowerCase();
                const groupText = category + ' ' + brand + ' ' + type;
                
                if (groupText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Clear search
        $('#clearSearch').click(function() {
            $('#compactSearch').val('').trigger('input');
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

    function applyFilter() {
        // Implement filter functionality
        console.log('Apply filter');
    }
</script>
@endpush