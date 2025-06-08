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
                    <form action="{{ route('submit_user') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="mb-3">
                            <label for="name" class="form-label text-capitalize">name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}"
                                placeholder="name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-capitalize">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}"
                                placeholder="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-capitalize">email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}"
                                placeholder="email">
                        </div>
                        <label for="role" class="form-label text-capitalize">role</label>
                        <select class="form-select form-select-lg mb-3 text-capitalize" id="role" name="role"
                            aria-label="role">
                            @if (Auth::user()->role == 'super_user')
                            <option class="text-capitalize" value="super_user">Super User</option>
                            @endif
                            @if (Auth::user()->role == 'owner' || Auth::user()->role == 'super_user')
                            <option class="text-capitalize" value="owner">Owner</option>
                            @endif
                            {{-- <option selected>Status</option> --}}
                            <option {{ $data->role == 'admin' ?  "selected":'' }} class="text-capitalize" value="admin">
                                Admin</option>
                            <option {{ $data->role == 'gudang' ?  "selected":'' }} class="text-capitalize"
                                value="gudang">gudang</option>
                            <option {{ $data->role == 'staff' ?  "selected":'' }} class="text-capitalize" value="staff">
                                Staff</option>
                            <option {{ $data->role == 'user' ?  "selected":'' }} class="text-capitalize" value="user">
                                User</option>
                            {{-- <option value="Lost">Lost</option> --}}
                        </select>
                        <label for="status" class="form-label text-capitalize">status</label>
                        <select class="form-select form-select-lg mb-3 text-capitalize" id="status" name="status"
                            aria-label="Status">
                            {{-- <option selected>Status</option> --}}
                            <option {{ $data->status == 'active' ?  "selected":'' }} class="text-capitalize"
                                value="active">Aktif</option>
                            <option {{ $data->status == 'inactive' ?  "selected":'' }} class="text-capitalize"
                                value="inactive">inactive</option>
                            {{-- <option class="text-capitalize" value="gudang">gudang</option>
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