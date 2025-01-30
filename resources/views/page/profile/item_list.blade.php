@extends('layouts.index')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="font-weight: 600; color: #000;"
                    class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                    {{ __('List Product') }}

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
                            {{-- <i class="bi bi-plus-circle pe-2"></i> --}}
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
                <form action="{{ route('myItem') }}" method="GET" id="filterForm" class="d-none">
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="category" class="text-capitalize form-label">category</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                        aria-describedby="categoryHelp">
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
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="brand" class="text-capitalize form-label">brand</label>
                                    <input type="text" class="form-control" id="brand" name="brand"
                                        aria-describedby="brandHelp">
                                    {{-- <div id="brandHelp" class="form-text">brand</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="product_code" class="text-capitalize form-label">product code</label>
                                    <input type="text" class="form-control" id="product_code" name="product_code"
                                        aria-describedby="product_codeHelp">
                                    {{-- <div id="product_codeHelp" class="form-text">product_code</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="product_name" class="text-capitalize form-label">product name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        aria-describedby="product_nameHelp">
                                    {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="payment_date" class="text-capitalize form-label">payment date</label>
                                    <input type="text" class="form-control" id="payment_date" name="payment_date"
                                        aria-describedby="payment_dateHelp">
                                    {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
                                </div>
                            </div>
                            {{-- <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="order_by"  class="text-capitalize form-label">Order By</label>
                                    <select class="form-select" name="order_by" id="order_by" aria-label="Order By">
                                         <option value="product_code">product_code</option>
                                         <option value="product_name">product_name</option>
                                         <option value="category">category</option>
                                         <option value="brand">brand</option>
                                         <option value="type">type</option>
                                         <option value="payment_date">payment_date</option>
                                         <option value="purpose_used">purpose_used</option>
                                         <option value="price">price</option>
                                         <option value="status">status</option>
                                         <option value="event_location">event_location</option>
                                         <option value="storage_location">storage_location</option>
                                         <option value="is_available">is_available</option>
                                         <option value="is_consumable">is_consumable</option>
                                    </select>
                                </div>
                            </div> --}}

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
                                    class=" text-capitalize">product code</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">product name</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">input date</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">event location</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">category</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">brand</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">type</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">code</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">description</th>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">purpose used</th> --}}
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">price</th>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">status</th> --}}
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">storage location</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">is available</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">note</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">is consumable</th> --}}
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
                                    {{ $item->product_code }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->product_name }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->updated_at }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    @if ($item->event_id!=0)



                                    {{ $item->eventDetail->event_name }}
                                    @endif
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->category }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">{{ $item->brand }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">{{ $item->type }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">{{ $item->code }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->description }}</th>
                                {{-- <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->purpose_used }}</th> --}}
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">{{ $item->price }}
                                </th>
                                {{-- <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">{{ $item->status }}
                                </th> --}}
                                {{-- <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->storage_location }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">

                                    @php
                                    if ($item->is_available==1) {
                                    echo "yes";
                                    } else {
                                    echo "no";
                                    }

                                    @endphp
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">{{ $item->note }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">@php
                                    if ($item->is_consumable==1) {
                                    echo "yes";
                                    } else {
                                    echo "no";
                                    }

                                    @endphp
                                </th> --}}
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{-- @if (Auth::user()->role=='owner' || Auth::user()->role=='admin'
                                    ||Auth::user()->role=='staff gudang')

                                    <a href="{{ route('edit_product',['id' => $item->product_code]) }}">

                                    <button class="btn btn-secondary">
                                        edit
                                    </button>
                                    </a>
                                    @else
                                    <button class="btn btn-secondary no-access">
                                        edit
                                    </button>

                                    @endif --}}
                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='admin'
                                    ||Auth::user()->role=='staff gudang')

                                    <a href="{{ URL::To('/generate-qr?qr='.$item->qr_string) }}">

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