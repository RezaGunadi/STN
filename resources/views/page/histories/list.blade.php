@extends('layouts.index')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="font-weight: 600; color: #000;"
                    class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                    {{ __('Riwayat Perubahan') }}

                    <div>

                        {{-- <a class=" btn btn-primary" style="color: white !inportant;"
                            href="{{ URL::To('/input-product') }}" aria-label="Add a new product">
                        <svg class="bi">
                            <use xlink:href="#plus-circle" />
                        </svg>
                        {{ __('Input') }}
                        </a> --}}
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
                <form action="{{ route('list_history') }}" method="GET" id="filterForm" class="d-none">
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="description" class="text-capitalize form-label">description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        aria-describedby="descriptionHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="type" class="text-capitalize form-label">type</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        aria-describedby="typeHelp">
                                    {{-- <div id="typeHelp" class="form-text">type</div> --}}
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
                                <th scope="col-3" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">#</th>
                                <th scope="col-3" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Type</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Description</th>
                            </tr>
                        </thead>
                        <tbody style="font-weight: 400!important; font-size: 14px;">
                            @foreach ($data as $item)
                            @php
                            $number = $number+1;
                            @endphp
                            <tr>
                                <th scope="col-3" style="font-weight: 400!important;">{{ $number }}</th>
                                <th scope="col-3" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->ref_type }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->desc }}</th>
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