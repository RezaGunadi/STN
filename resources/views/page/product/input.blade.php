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
                    <form action="{{ route('submit_product') }}" method="POST">
                        @csrf
                        <div class="mb-3" id="code_section">
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
                            <label for="category" class="form-label text-capitalize">category</label>
                            <select id="category_search" class="cari form-control w-100" name="category"></select>
                            {{-- <input type="text" class="form-control @error('category') is-invalid @enderror" required
                                id="category" name="category" placeholder="TV"> --}}
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label text-capitalize">Brand</label>
                            <select id="brand_search" class="cari form-control w-100" name="brand"></select>
                            {{-- <input type="text" class="form-control @error('brand') is-invalid @enderror" required
                                id="brand" name="brand" placeholder="Samsung"> --}}
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label text-capitalize">type</label>
                            <select id="type_search" class="cari form-control w-100" name="type"></select>
                            {{-- <input type="text" class="form-control @error('type') is-invalid @enderror" required
                                id="type" name="type" placeholder="DUE800"> --}}
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
                            <label for="price" class="form-label text-capitalize">Purchase Price</label>
                            <input type="number" onkeyup="oneDot(this)" class="form-control @error('price') is-invalid @enderror" required
                                id="price" name="price" placeholder="100000">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rental_price" class="form-label text-capitalize">Rental Price</label>
                            <input type="number" onkeyup="oneDot(this)" class="form-control @error('rental_price') is-invalid @enderror" required
                                id="rental_price" name="rental_price" placeholder="100000">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="status" class="form-label text-capitalize">Condition</label>
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
                        <div style="font-weight: 500; font-size: 16px; pt-3">
                            Jumlah Barang
                            <i id="minus" style="font-size: 24px; color: rgb(244, 177, 190);"
                                class="mx-3 bi bi-dash-circle"></i>
                            <input type="hidden" value="1" name="total_input_item" id="total_input_item">
                            <div id="total_value" class="px-3 d-inline ms-3">
                                1
                            </div>
                            
                            <i id="plus" style="font-size: 24px; color: rgb(244, 177, 190);"
                                class="mx-3 bi bi-plus-circle"></i>
                        </div>
                        <div id="info" class="d-none my-3"
                            style="background-color: rgb(244, 177, 190); border-radius: 8px;">
                            <div class="d-inline-block pb-3">

                                <i class="bi bi-info-square-fill px-3 py-3"></i>
                            </div>
                            <div class="d-inline px-2 pt-1" style="font-weight: 600;">
                                Kode produk akan di buat otomatis apabila Menambahkan lebih dari 1 produk dalam satu
                                kali input.
                            </div>
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
<script type="text/javascript">
    var x=1;
    $('#plus').click(function (e) {
        e.preventDefault();
        x=x+1;
        document.getElementById("total_input_item").setAttribute('value',x);
        if (x>1) {
        
            $("#info").removeClass("d-none");
            $("#info").addClass("d-block");
            $("#total_value").html(' '+x+' ');
            $("#code_section").addClass("d-none");
            $("#code_section").removeClass("d-block");
        }
    });
    $('#minus').click(function (e) {
        e.preventDefault();
        x=x-1;
        document.getElementById("total_input_item").value=""+x+"";
        $("#total_value").html(' '+x+' ');
        if (x<1) { 
            x==1; 
        }
        if (x==1) { 
                $("#code_section").removeClass("d-none");
                $("#code_section").addClass("d-block"); 
                $("#info").addClass("d-none"); 
                $("#info").removeClass("d-block");
        } 
    });
    
</script>
@endpush