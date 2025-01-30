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
                <div class="card-header" style="font-weight: 600; color: #000;">
                    {{ __('Ubah Password') }}
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
                    <form action="{{ route('changePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label text-capitalize">Password Lama</label>
                            <input type="text" class="form-control @error('old_password') is-invalid @enderror" required
                                id="old_password" name="old_password" placeholder="">
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-capitalize">Password Baru</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" required
                                id="password" name="password" placeholder="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confrm_password" class="form-label text-capitalize">Konfirmasi Password
                                Baru</label>
                            <input type="text" class="form-control @error('confrm_password') is-invalid @enderror"
                                required id="confrm_password" name="confrm_password" placeholder="">
                            @error('confrm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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