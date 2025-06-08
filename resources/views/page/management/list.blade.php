@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .card {
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        border: none;
    }

    .card-header {
        font-weight: 700;
        font-size: 1.2rem;
        background: #f8f9fa;
        border-radius: 16px 16px 0 0;
        border-bottom: 1px solid #e9ecef;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
        text-align: center;
    }

    .btn {
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .btn-action {
        margin: 0 2px;
        min-width: 36px;
        min-height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f6f8fa;
    }
</style>
@endpush
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Manage Categories
                    <div class="row">
                        <div class="col px-0">

                            <div class="dropdown pe-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ __('Input') }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/category_brand_type_size') }}">{{ __('All') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/category') }}">{{ __('Category') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/brand') }}">{{ __('Brand') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/type') }}">{{ __('Type') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/size') }}">{{ __('Size') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/category_brand') }}">{{ __('Category & Brand') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/category_type') }}">{{ __('Category & Type') }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ URL::To('/input-management-product/brand_type') }}">{{ __('Brand & Type') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col">
                    
                            <div class=" btn btn-secondary" style="color: white !inportant;" id="filter_btn" aria-label="filterBtn">
                                {{ __('Show Filter') }}
                    </div>
                    <div class=" btn btn-secondary  d-none" style="color: white !inportant;" id="filter_btn_hide"
                        aria-label="filter_btn_hide">
                        {{ __('Hide Filter') }}
                    </div>
                </div> --}}
                    </div>
                    {{-- <a href="{{ URL::To('/add-user') }}" class="btn btn-primary btn-action" title="Tambah User">
                    <i class="bi bi-plus-circle"></i>
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        {{-- <a href="{{ route('edit_user', ['id' => $item->id]) }}"
                                        class="btn btn-secondary btn-action" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <form action="{{ route('delete_management_product', ['id' => $item->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-action" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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
</div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('standardView').addEventListener('change', function() {
        document.getElementById('main-content').classList.remove('view-compact');
    });
    document.getElementById('compactView').addEventListener('change', function() {
        document.getElementById('main-content').classList.add('view-compact');
    });
</script>
@endpush