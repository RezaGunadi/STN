@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Checkout</h5>
                    <a href="{{ route('my-cart') }}" class="btn btn-secondary">Back to Cart</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6>Customer Information</h6>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="user_name" class="form-control"
                                        value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="user_email" class="form-control"
                                        value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="user_phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Summary</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Rental Price</th>
                                                <th>Total Rental</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->product->product_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Rp {{ number_format($item->product->rental_price, 0, ',', '.') }}
                                                </td>
                                                <td>Rp
                                                    {{ number_format($item->product->rental_price * $item->quantity, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-end">Total Rental Amount:</th>
                                                <th>Rp {{ number_format($totalAmount, 0, ',', '.') }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea name="notes" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection