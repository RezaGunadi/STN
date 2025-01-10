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
                    <form action="{{ route('input_user') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-capitalize">name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-capitalize">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-capitalize">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="email">
                        </div>
                        <select class="form-select form-select-lg mb-3" id="role" name="role" aria-label="role">
                            {{-- <option selected>Status</option> --}}
                            <option class="text-capitalize" value="admin">admin</option>
                            <option class="text-capitalize" value="staff gudang">Staff Gudang</option>
                            <option class="text-capitalize" value="staff">Staff</option>
                            {{-- <option value="Lost">Lost</option> --}}
                        </select>
                        <select class="form-select form-select-lg mb-3" id="status" name="status" aria-label="Status">
                            {{-- <option selected>Status</option> --}}
                            <option class="text-capitalize" value="aktif">aktif</option>
                            <option class="text-capitalize" value="inactive">inactive</option>
                            {{-- <option class="text-capitalize" value="staff gudang">Staff Gudang</option>
                            <option class="text-capitalize" value="staff">Staff</option> --}}
                            {{-- <option value="Lost">Lost</option> --}}
                        </select>
                       
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