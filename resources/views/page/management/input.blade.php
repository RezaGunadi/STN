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
                    <form action="{{ route('submit_management_product') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label text-capitalize">category</label>
                            @if (!str_contains($data,'category'))
                            <select id="category_search" class="cari form-control w-100" name="category"></select>
                            @else
                            <input type="text" class="form-control" id="category" name="category" placeholder="TV">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label text-capitalize">brand</label>
                            @if (!str_contains($data,'brand'))
                            <select id="brand_search" class="cari form-control w-100" name="brand"></select>
                            @else
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Samsung">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label text-capitalize">type</label>
                            @if (!str_contains($data,'type'))
                            <select id="type_search" class="cari form-control w-100" name="type"></select>
                            @else
                            <input type="text" class="form-control" id="type" name="type" placeholder="DUE800">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="size" class="form-label text-capitalize">size</label>
                            @if (!str_contains($data,'size'))
                            <select id="size_search" class="cari form-control w-100" name="size"></select>
                            @else
                            <input type="text" class="form-control" id="size" name="size" placeholder="25M">
                            @endif
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
@endpush