@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">

@endpush
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: 600; color: #000;">{{ __('Input Product') }}
                </div>
                {{-- product_code
product_name
category
brand
type
code
description
payment_date
purpose_used
price
status
consumable --}}
                <div class="card-body">
                    <form action="{{ route('submit_edit_product') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                        {{-- <div class="mb-3">
                            <label for="product_code" class="form-label text-capitalize">product Code</label>
                            <input type="text" class="form-control" value="{{ $data->product_code }}" id="product_code"
                        name="product_code" placeholder="Kosongkan Untuk Auto Generate">
                </div>
                <div class="mb-3"> --}}
                    {{-- <label for="product_name" class="form-label text-capitalize">product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" required
                                value="{{ $data->product_name }}" id="product_name" name="product_name"
                    placeholder="TV UHD Samsung 4k">
                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
                @if (Auth::user()->role=='owner' || Auth::user()->role == 'admin' || Auth::user()->role == 'ADMIN'|| Auth::user()->role == 'super_user')

                <div class="mb-3">
                    <label for="description" class="form-label text-capitalize">description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" required
                        value="{{ $data->description }}" id="description" name="description" placeholder="Samsung">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label text-capitalize">Brand</label>
                    <input type="text" class="form-control @error('brand') is-invalid @enderror" required
                        value="{{ $data->brand }}" id="brand" name="brand" placeholder="Samsung">
                    @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label text-capitalize">category</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" required
                        value="{{ $data->category }}" id="category" name="category" placeholder="TV">
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label text-capitalize">type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" required
                        value="{{ $data->type }}" id="type" name="type" placeholder="DUE800">
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                            <label for="date" class="form-label text-capitalize">payment Date</label>
                            <input type="text" class="form-control @error('date') is-invalid @enderror" required
                                name="date" value="{{ $data->date }}" id="date">
            </div> --}}
            <div class="mb-3">
                <label for="price" class="form-label text-capitalize">Price</label>
                <input type="number" onkeyup="oneDot(this)" class="form-control @error('price') is-invalid @enderror"
                    required value="{{ $data->price }}" id="price" name="price" placeholder="100000">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rental_price" class="form-label text-capitalize">Rental Price</label>
                <input type="number" onkeyup="oneDot(this)"
                    class="form-control @error('rental_price') is-invalid @enderror" required id="rental_price"
                    name="rental_price" placeholder="100000">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @else
            <div class="mb-3">
                <label for="storage_location" class="form-label text-capitalize">storage location</label>
                <input type="text" class="form-control @error('storage_location') is-invalid @enderror" required
                    value="{{ $data->storage_location }}" id="storage_location" name="storage_location"
                    placeholder="100000">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif
            <div class="mb-3">
                <label for="note" class="form-label text-capitalize">note</label>
                <input type="text" class="form-control" value="{{ $data->note }}" id="note" name="note" placeholder="">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <label for="status" class="form-label text-capitalize">status</label>
            <select class="form-select form-select-lg mb-3" id="status" name="status" aria-label="Status">
                {{-- <option selected>Status</option> --}}
                <option {{ $data->status == 'Good' ?  "selected":'' }} value="Good">Good</option>
                <option {{ $data->status == 'Not Good' ?  "selected":'' }} value="Not Good">Not Good
                </option>
                <option {{ $data->status == 'Broken' ?  "selected":'' }} value="Broken">Broken</option>
                <option {{ $data->status == 'Lost' ?  "selected":'' }} value="Lost">Lost</option>
            </select>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                @if($data->image && file_exists(public_path('upload/product/'.$data->image)))
                <div class="mb-2">
                    <img src="{{ asset('upload/product/'.$data->image) }}" alt="Product Image" style="max-width:120px;">
                </div>
                @else
                <div class="mb-2">
                    <img src="{{ asset('assets/icon/default-product.svg') }}" alt="Default Product Image"
                        style="max-width:120px;">
                </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <small class="text-muted">Upload untuk mengganti gambar</small>
            </div>
            <button class="btn btn-primary text-capitalize mt-5 w-100" id="inputData" type="submit">
                submit
            </button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#date" ).datepicker();
      } );
</script>
@endpush