@extends('layouts.index')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                    {{ __('List Product') }}

                    <div>

                        <a class=" btn btn-primary" style="color: white !inportant;"
                            href="{{ URL::To('/input-product') }}" aria-label="Add a new product">
                            <svg class="bi">
                                <use xlink:href="#plus-circle" />
                            </svg>
                            {{ __('Input') }}
                        </a>
                        <div class=" btn btn-secondary filterBtn" style="color: white !inportant;" id="filterBtn"
                            aria-label="Filter">{{ __('Filter') }}
                        </div>
                        <div class=" btn btn-secondary filterBtnHide d-none" style="color: white !inportant;"
                            id="filterBtnHide" aria-label="Filter">
                            {{-- <svg class="bi">
                                <use xlink:href="#plus-circle" />
                            </svg> --}}
                            {{ __('Filter') }}
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
                    <div class="my-5">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="name" class="text-capitalize form-label">name</label>
                                    <input type="name" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="phone" class="text-capitalize form-label">phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        aria-describedby="phoneHelp">
                                    {{-- <div id="typeHelp" class="form-text">type</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="email" class="text-capitalize form-label">email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp">
                                    {{-- <div id="brandHelp" class="form-text">brand</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="role" class="text-capitalize form-label">role</label>
                                    <input type="role" class="form-control" id="role" name="role"
                                        aria-describedby="roleHelp">
                                    {{-- <div id="product_codeHelp" class="form-text">product_code</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="status" class="text-capitalize form-label">status</label>
                                    <input type="status" class="form-control" id="status" name="status"
                                        aria-describedby="statusHelp">
                                    {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
                                </div>
                            </div>
                            {{-- <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="payment_date" class="text-capitalize form-label">payment date</label>
                                    <input type="payment_date" class="form-control" id="payment_date"
                                        name="payment_date" aria-describedby="payment_dateHelp">
                                    </div>
                                </div> --}}
                            {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
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
                                    class=" text-capitalize">name</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">phone</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">email</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">role</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">status</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">total kerugian</th>
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
                                    {{ $item->phone }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->email }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->role }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->status }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->total_kerugian }}</th>

                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">@if (Auth::user()->role=='admin' )
                                    
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
                                    @if (Auth::user()->role=='admin' )
                                    
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
                <div class="py-3">

                    <div class="col">
                        {{ $data->links() }}
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
    $('#filterBtn').on('click', function() {
        $('#filterForm').addClass('d-inline-block');
        $('#filterForm').removeClass('d-none');
        $('#filterBtn').addClass('d-none');
        $('#filterForm').removeClass('d-inline-block');
        $('#filterBtnHide').addClass('d-inline-block');
        $('#filterBtnHide').removeClass('d-none');
    });
    $('#filterBtnHide').on('click', function() {
        $('#filterForm').removeClass('d-inline-block');
        $('#filterForm').addClass('d-none');
        $('#filterBtnHide').addClass('d-none');
        $('#filterBtn').addClass('d-inline-block');
        $('#filterBtnHide').removeClass('d-inline-block');
        $('#filterBtn').addClass('d-inline-block');
    });
</script>
{{-- filterBtn filterForm --}}
@endpush