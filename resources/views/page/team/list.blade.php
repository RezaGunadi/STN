@extends('layouts.index')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="font-weight: 600; color: #000;"
                    class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                    {{ __('List User') }}

                    <div>

                        <a class=" btn btn-primary" style="color: white !inportant;"
                            href="{{ URL::To('/add-user') }}" aria-label="Add a new user">
                            <div class="pe-2 d-inline-block">

                                <i class="bi bi-plus-circle"></i>
                            </div>
                            {{ __('Input') }}
                        </a>
                        <div class=" btn btn-secondary" style="color: white !inportant;" id="filter_btn"
                            aria-label="filterBtn">{{ __('Show Filter') }}
                        </div>
                        <div class=" btn btn-secondary  d-none" style="color: white !inportant;" id="filter_btn_hide"
                            aria-label="filter_btn_hide">
                            {{-- <i class="bi bi-plus-circle"></i> --}}
                            {{ __('Hide Filter') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                @endif --}}

                {{-- {{ __('You are logged in!') }} --}}
                <form action="{{ route('list_user') }}" method="GET" id="filterForm" class="d-none">
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="name" class="text-capitalize form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="categoryHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="email" class="text-capitalize form-label">email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp">
                                    {{-- <div id="typeHelp" class="form-text">type</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="phone" class="text-capitalize form-label">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        aria-describedby="phoneHelp">
                                    {{-- <div id="brandHelp" class="form-text">brand</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-3">
                                    <label for="role" class="text-capitalize form-label">Role</label>
                                    <select class="form-control " name="role" id="role" aria-label="role">
                                        <option class="text-capitalize" value="">Semua Role</option>
                                        <option class="text-capitalize" value="admin">admin</option>
                                        <option class="text-capitalize" value="staff gudang">Staff Gudang</option>
                                        <option class="text-capitalize" value="staff">Staff</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary col-12">Submit</button>

                    </div>
                </form>
                <div class="table-responsive">

                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">#</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">name</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">emai</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">phone</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">role</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">status</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Action</th>
                            </tr>
                        </thead>
                        <tbody style="font-weight: 400!important; font-size: 14px;">
                            @foreach ($data as $item)
                            @php
                            $number = $number+1;
                            @endphp
                            <tr>
                                <th scope="row" style="font-weight: 400!important;">{{ $number }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->name }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->emai }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->phone }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->role }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->status }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='admin')

                                    <a href="{{ route('edit_user',['id' => $item->id]) }}">

                                        <button class="btn btn-secondary">
                                            edit
                                        </button>
                                    </a>
                                    @else
                                    <button class="btn btn-secondary no-access">
                                        edit
                                    </button>

                                    @endif
                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='admin'
                                    ||Auth::user()->role=='staff gudang')

                                    <a href="{{ URL::To('/generate-qr?qr='.$item->qr) }}">

                                        <button class="btn btn-primary my-2 mx-2" style="white-space: nowrap">
                                            Download QR
                                        </button>
                                    </a>
                                    @else
                                    <button class="btn btn-primary no-access my-2 mx-2" style="white-space: nowrap">
                                        Download QR
                                    </button>

                                    @endif
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="py-3 mt-3">
                    <div class="col d-md-block d-none">
                        {{ $data->onEachSide(1)->links() }}
                    </div>
                    <div class="col d-md-none d-sm-block">
                        {{ $data->onEachSide(0)->links() }}
                    </div>
                </div>
            </div>
        </div>
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