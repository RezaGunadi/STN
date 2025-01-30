@extends('layouts.index')

@section('content')
<div class="container py-5">

    <div class="card ">
        <div class="div px-3" style="background-color: #E0E0E0">

            <img src="{{ URL::To('assets/img/stn_long.png') }}" height="80px" alt="STN">
        </div>
        <div class="col-12 py-3 px-3 mx-auto">
            {{-- changePassword --}}
            <br>
            <form action="{{ route('updateProfile') }}" method="POST">
                <div class="mb-3 row px-3">
                    <div class="col-md-1">

                        <label for="name" class="text-capitalize form-label font-weight: 500">name</label>
                    </div>
                    <div class="col-auto d-md-block d-none" style="font-weight: 500">
                        :
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                            value="{{ $data->name }}">

                    </div>
                </div>
                <div class="mb-3 row px-3">
                    <div class="col-md-1">

                        <label for="email" class="text-capitalize form-label font-weight: 500">email</label>
                    </div>
                    <div class="col-auto d-md-block d-none" style="font-weight: 500">
                        :
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            value="{{ $data->email }}">

                    </div>
                </div>
                <div class="mb-3 row px-3">
                    <div class="col-md-1">

                        <label for="phone" class="text-capitalize form-label font-weight: 500">phone Number</label>
                    </div>
                    <div class="col-auto d-md-block d-none" style="font-weight: 500">
                        :
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp"
                            value="{{ $data->phone }}">

                    </div>
                </div>
                <div class="mb-3 row px-3">
                    <div class="col-md-1">

                        <label for="role" class="text-capitalize form-label font-weight: 500">role Number</label>
                    </div>
                    <div class="col-auto d-md-block d-none" style="font-weight: 500">
                        :
                    </div>
                    <div class="col-md-10 text-capitalize">
                        {{-- <input type="role" class="form-control" id="role" name="role" aria-describedby="roleHelp"
                            value="{{ $data->role }}"> --}}
                        {{ $data->role }}
                    </div>
                </div>
                <a class="px-3" style="color: #000; font-size: 600; text-decoration: #000;" href="{{ URL::To('change-password') }}">
                    Ubah Password
                </a>
                <br>
                <br>
                <div class="px-3">

                    <button class="btn btn-secondary w-100" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    // $(document).ready(function() { 
    // $( ".no-access" ).click(function() {
    // alert( "anda tidak memiliki hak akses" );
    // });
    // // $(document).ready(function() { 
    // //     $("#filter_btn").click(function () {
    // //         alert("Hello!");
    // //     // $(".hide_div").hide();
    // //     });
    // });
</script>
{{-- filterBtn filterForm --}}
@endpush