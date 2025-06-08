@extends('layouts.index')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-weight: 600; color: #fff;">{{ __('Vendors') }}</span>
                    <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add New Vendor</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>{{ $vendor->address }}</td>
                                    <td>
                                        <span class="badge {{ $vendor->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $vendor->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('vendors.edit', $vendor) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $vendors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 