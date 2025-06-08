@extends('layouts.index')

@push('css')

@endpush

@section('content')
<div class="container py-5 view-transition" id="main-content">
    {{-- <div class="d-flex justify-content-end mb-3">
        <div class="view-toggle">
            <input class="form-check-input" type="radio" name="viewMode" id="standardView" checked>
            <label class="form-check-label me-2" for="standardView">Standard</label>
            <input class="form-check-input" type="radio" name="viewMode" id="compactView">
            <label class="form-check-label" for="compactView">Compact</label>
        </div>
    </div> --}}
    <div class="standard-view">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div style="font-weight: 600; color: #000;"
                        class="card-header d-flex justify-content-between align-items-center text-body-secondary">
                        {{ __('Report List') }}

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
                            <div class=" btn btn-secondary  d-none" style="color: white !inportant;"
                                id="filter_btn_hide" aria-label="filter_btn_hide">
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
                    <form action="{{ route('report_list') }}" method="GET" id="filterForm" class="d-none">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="item" class="text-capitalize form-label">item</label>
                                        <input type="text" class="form-control" id="item" name="item"
                                            aria-describedby="itemHelp">
                                        {{-- <div id="typeHelp" class="form-text">type</div> --}}
                                    </div>
                                </div>
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
                                        <label for="user" class="text-capitalize form-label">user</label>
                                        <input type="text" class="form-control" id="user" name="user"
                                            aria-describedby="userHelp">
                                        {{-- <div id="typeHelp" class="form-text">type</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="reporter" class="text-capitalize form-label">reporter</label>
                                        <input type="text" class="form-control" id="reporter" name="reporter"
                                            aria-describedby="reporterHelp">
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
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Code</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Reporter</th>
                                    <th style="text-align: center;">User</th>
                                    <th style="text-align: center;">Description</th>
                                </tr>
                            </thead>
                            <tbody style="font-weight: 400!important; font-size: 14px;">
                                @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->product->product_code }}</td>
                                    <td style="text-align: center;">{{ $item->product->product_name }}</td>
                                    <td style="text-align: center;">{{ $item->reporter->name }}</td>
                                    <td style="text-align: center;">{{ $item->pelaku->name }}</td>
                                    <td style="text-align: center;">{{ $item->note }}</td>
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
    {{-- <div class="compact-view">
        @foreach ($data as $item)
        <div class="product-group mb-3">
            <div class="product-group-header d-flex justify-content-between align-items-center">
                <span class="group-title">{{ $item->product->product_name }}</span>
                <div class="group-actions">
                    <a href="#" class="btn btn-info btn-sm" title="Detail">
                        <i class="bi bi-info-circle"></i>
                    </a>
                </div>
            </div>
            <div class="product-group-body">
                <div class="product-info">
                    <div class="product-details">
                        <span><i class="bi bi-upc-scan"></i> {{ $item->product->product_code }}</span>
                        <span><i class="bi bi-person"></i> Reporter: {{ $item->reporter->name }}</span>
                        <span><i class="bi bi-person"></i> User: {{ $item->pelaku->name }}</span>
                        <span><i class="bi bi-card-text"></i> {{ $item->note }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="py-3 mt-3">
            <div class="col d-md-block d-none">
                {{ $data->onEachSide(1)->links() }}
            </div>
            <div class="col d-md-none d-sm-block">
                {{ $data->onEachSide(0)->links() }}
            </div>
        </div>
    </div> --}}
</div>
@endsection

@push('script')
<script>
    document.getElementById('standardView').addEventListener('change', function() {
        document.getElementById('main-content').classList.remove('view-compact');
    });
    document.getElementById('compactView').addEventListener('change', function() {
        document.getElementById('main-content').classList.add('view-compact');
    });
</script>
{{-- filterBtn filterForm --}}
@endpush