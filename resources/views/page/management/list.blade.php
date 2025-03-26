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
                <div style="font-weight: 600; color: #000;"
                    class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                    {{ __('List Product Category') }}

                    <div>

                        {{-- <a class=" btn btn-primary" style="color: white !inportant;"
                            href="{{ URL::To('/input-management-product') }}" aria-label="Add a new product category">
                            <div class="pe-2 d-inline-block">

                                <i class="bi bi-plus-circle"></i>
                            </div>
                            {{ __('Input') }}
                        </a> --}}
                        <div class="row">
                            <div class="col px-0">

                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('Input') }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/category') }}">{{ __('Category') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/brand') }}">{{ __('Brand') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/type') }}">{{ __('Type') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/category_brand_type') }}">{{ __('All') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/category_brand') }}">{{ __('Category & Brand') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/category_type') }}">{{ __('Category & Type') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ URL::To('/input-management-product/brand_type') }}">{{ __('Brand & Type') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">

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
                    </div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                @endif --}}

                {{-- {{ __('You are logged in!') }} --}}
                
                <form action="{{ route('list_product') }}" method="GET" id="filterForm" class="d-none">
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="category" class="text-capitalize form-label">category</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                        aria-describedby="categoryHelp">
                                        
                                    {{-- @endif --}}
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="brand" class="text-capitalize form-label">brand</label>
                                    <input type="text" class="form-control" id="brand" name="brand"
                                        aria-describedby="brandHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="type" class="text-capitalize form-label">type</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        aria-describedby="typeHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="code" class="text-capitalize form-label">code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        aria-describedby="codeHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
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
                                    class=" text-capitalize">category</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">brand</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">type</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">code</th>
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
                                    {{ $item->category }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->brand }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->type }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->code }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='admin')

                                    <a href="{{ route('delete_management_product',['id' => $item->id]) }}">

                                        <button class="btn btn-secondary">
                                            delete
                                        </button>
                                    </a>
                                    @else
                                    <button class="btn btn-secondary no-access">
                                        delete
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
    $( function() {
        $( "#payment_date" ).datepicker();
      } );
</script>
@endpush