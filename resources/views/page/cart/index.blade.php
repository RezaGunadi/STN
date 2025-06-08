@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product Catalog</h5>
                    <a href="{{ route('my-cart') }}" class="btn btn-primary">
                        My Cart
                        @if($cartCount = \App\Models\UserCart::where('user_id', auth()->id())->where('status',
                        'pending')->count())
                        <span class="badge bg-danger">{{ $cartCount }}</span>
                        @endif
                    </a>
                </div>

                <div class="card-body">
                    @foreach($groupedProducts as $group)
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">
                                {{ $group['category'] }} - {{ $group['brand'] }} - {{ $group['type'] }}
                                <small class="text-muted">
                                    (Available: {{ $group['available_quantity'] }}/{{ $group['total_quantity'] }})
                                </small>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($group['products'] as $product)
                                        <tr>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td>
                                                @if($product->is_available)
                                                <span class="badge bg-success">Available</span>
                                                @else
                                                <span class="badge bg-danger">Not Available</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->is_available)
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addToCartModal{{ $product->id }}">
                                                    Add to Cart
                                                </button>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Add to Cart Modal -->
                                        <div class="modal fade" id="addToCartModal{{ $product->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('add-to-cart') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add to Cart</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Product</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $product->product_name }}" readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Quantity</label>
                                                                <input type="number" name="quantity"
                                                                    class="form-control" value="1" min="1" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Notes</label>
                                                                <textarea name="notes" class="form-control"
                                                                    rows="3"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Add to
                                                                Cart</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection