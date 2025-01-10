@extends('layouts.index')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

@endpush
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Input Product') }}
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
                    <form action="{{ route('submit_product') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label text-capitalize">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                placeholder="Kosongkan Untuk Auto Generate">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label text-capitalize">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" required
                                id="name" name="name" placeholder="TV UHD Samsung 4k">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label text-capitalize">description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" required
                                id="description" name="description" placeholder="Samsung">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label text-capitalize">Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" required
                                id="brand" name="brand" placeholder="Samsung">
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label text-capitalize">category</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" required
                                id="category" name="category" placeholder="TV">
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label text-capitalize">type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" required
                                id="type" name="type" placeholder="DUE800">
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label text-capitalize">payment Date</label>
                            <input type="text" class="form-control @error('date') is-invalid @enderror" required
                                name="date" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label text-capitalize">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" required
                                id="price" name="price" placeholder="100000">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <select class="form-select form-select-lg mb-3" id="status" name="status" aria-label="Status">
                            {{-- <option selected>Status</option> --}}
                            <option value="Good">Good</option>
                            <option value="Not Good">Not Good</option>
                            <option value="Broken">Broken</option>
                            <option value="Lost">Lost</option>
                        </select>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="consumable" id="consumable">
                            <label class="form-check-label" for="consumable">
                                Is Consumable
                            </label>
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
<script>
    $( function() {
        $( "#date" ).datepicker();
      } );
</script>
@endpush