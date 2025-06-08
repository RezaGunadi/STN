@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Job Details</h5>
                    <a href="{{ route('orders.show', $job->order_id) }}" class="btn btn-secondary">Back to Order</a>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Job Information</h6>
                            <table class="table">
                                <tr>
                                    <th>Event Name</th>
                                    <td>{{ $job->event_name }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $job->event_location }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $job->start_date ? $job->start_date->format('Y-m-d H:i') : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Finish Date</th>
                                    <td>{{ $job->finish_date ? $job->finish_date->format('Y-m-d H:i') : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td>Rp {{ number_format($job->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Customer Information</h6>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $job->clientData->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $job->clientData->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $job->clientData->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $job->user_address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <h6>Job Items</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($job->details as $detail)
                                <tr>
                                    <td>{{ $detail->product->product_code }}</td>
                                    <td>{{ $detail->product->product_name }}</td>
                                    <td>{{ $detail->product->category }}</td>
                                    <td>{{ $detail->product->brand }}</td>
                                    <td>{{ $detail->product->type }}</td>
                                    <td>Rp {{ number_format($detail->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $detail->is_installed ? 'success' : 'warning' }}">
                                            {{ $detail->is_installed ? 'Installed' : 'Pending' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection