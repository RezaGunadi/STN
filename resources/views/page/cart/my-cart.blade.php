@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">My Cart</h5>
                    <a href="{{ route('catalog') }}" class="btn btn-primary">Back to Catalog</a>
                </div>

                <div class="card-body">
                    @if($cartItems->isEmpty())
                    <div class="alert alert-info">
                        Your cart is empty. <a href="{{ route('catalog') }}">Browse products</a>
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Notes</th>
                                    <th>Requested At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->product_code }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->product->description }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->notes }}</td>
                                    <td>{{ $item->requested_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <span class="badge bg-warning">Pending</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('remove-from-cart', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to remove this item?')">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection