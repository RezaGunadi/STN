@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .view-toggle {
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 5px;
        padding: 5px 10px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .view-toggle:hover {
        background-color: #e9ecef;
    }

    .view-toggle .form-check-input {
        margin-right: 5px;
        cursor: pointer;
    }

    .view-toggle .form-check-label {
        cursor: pointer;
        user-select: none;
    }

    .compact-view .product-group {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .compact-view .product-group:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .compact-view .product-group-header {
        background-color: #f8f9fa;
        padding: 12px 15px;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .compact-view .product-group-header .group-title {
        font-size: 1.1rem;
        color: #495057;
    }

    .compact-view .product-group-header .group-actions {
        display: flex;
        gap: 10px;
    }

    .compact-view .product-group-body {
        padding: 15px;
    }

    .compact-view .product-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        transition: background-color 0.2s ease;
    }

    .compact-view .product-item:hover {
        background-color: #f8f9fa;
    }

    .compact-view .product-item:last-child {
        border-bottom: none;
    }

    .compact-view .product-info {
        flex: 1;
    }

    .compact-view .product-info .product-name {
        font-weight: 500;
        color: #212529;
        margin-bottom: 4px;
    }

    .compact-view .product-info .product-details {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 0.85rem;
        color: #6c757d;
    }

    .compact-view .product-info .product-details span {
        display: inline-flex;
        align-items: center;
    }

    .compact-view .product-info .product-details i {
        margin-right: 4px;
    }

    .compact-view .product-quantity {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 6px;
    }

    .compact-view .quantity-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 60px;
        padding: 6px 12px;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .compact-view .quantity-badge:hover {
        transform: translateY(-1px);
    }

    .compact-view .quantity-total {
        background-color: #e9ecef;
        color: #495057;
    }

    .compact-view .quantity-available {
        background-color: #d4edda;
        color: #155724;
    }

    .compact-view .quantity-unavailable {
        background-color: #f8d7da;
        color: #721c24;
    }

    .compact-view .product-actions {
        display: flex;
        gap: 8px;
        margin-left: 15px;
    }

    .compact-view .product-actions .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .compact-view .product-actions .btn:hover {
        transform: translateY(-1px);
    }

    .standard-view {
        display: block;
    }

    .compact-view {
        display: none;
    }

    .view-compact .standard-view {
        display: none;
    }

    .view-compact .compact-view {
        display: block;
    }

    .view-transition {
        transition: all 0.3s ease;
    }

    .view-transition.fade-out {
        opacity: 0;
        transform: translateY(-10px);
    }

    .view-transition.fade-in {
        opacity: 1;
        transform: translateY(0);
    }

    .no-access {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .no-access:hover {
        transform: none !important;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-badge.available {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.unavailable {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-badge i {
        margin-right: 4px;
    }

    .group-collapse-btn {
        background: none;
        border: none;
        color: #6c757d;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .group-collapse-btn:hover {
        background-color: #e9ecef;
        color: #495057;
    }

    .group-collapse-btn i {
        transition: transform 0.3s ease;
    }

    .group-collapsed .group-collapse-btn i {
        transform: rotate(-90deg);
    }

    .group-collapsed .product-group-body {
        display: none;
    }

    /* New styles for compact view enhancements */
    .compact-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .compact-search {
        flex: 1;
        max-width: 300px;
    }

    .compact-search .input-group {
        width: 100%;
    }

    .compact-search .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .compact-search .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .compact-sort {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .compact-sort select {
        max-width: 150px;
    }

    .compact-view .product-group.highlight {
        border: 2px solid #007bff;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
        }
    }

    .compact-view .product-item.highlight {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .compact-view .no-results {
        text-align: center;
        padding: 30px;
        color: #6c757d;
        font-style: italic;
    }

    .compact-view .group-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 8px 12px;
        background-color: #e9ecef;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .compact-view .group-summary .summary-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .compact-view .group-summary .summary-item i {
        color: #495057;
    }

    .compact-view .product-item .product-price {
        font-weight: 500;
        color: #28a745;
    }

    .compact-view .product-item .product-rental {
        font-weight: 500;
        color: #17a2b8;
    }

    .compact-view .product-item .product-location {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #6c757d;
        font-size: 0.8rem;
    }

    .compact-view .product-item .product-location i {
        color: #6c757d;
    }

    .compact-view .product-item .product-location .location-badge {
        background-color: #e9ecef;
        color: #495057;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.75rem;
    }
</style>
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
                        {{ __('List Event') }}

                        <div>

                            <a class=" btn btn-primary" style="color: white !inportant;"
                                href="{{ URL::To('/input-event') }}" aria-label="Add event">
                                <div class="pe-2 d-inline-block">

                                    <i class="bi bi-plus-circle"></i>
                                </div>
                                {{ __('Add') }}
                            </a>
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
                    <form action="{{ route('list_event') }}" method="GET" id="filterForm" class="d-none">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="event_name" class="text-capitalize form-label">event name</label>
                                        <input type="event_name" class="form-control" id="event_name" name="event_name"
                                            aria-describedby="event_nameHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="event_location" class="text-capitalize form-label">event
                                            location</label>
                                        <input type="event_location" class="form-control" id="event_location"
                                            name="event_location" aria-describedby="event_locationHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="starter_team" class="text-capitalize form-label">starter
                                            team</label>
                                        <input type="starter_team" class="form-control" id="starter_team"
                                            name="starter_team" aria-describedby="starter_teamHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="closer_team" class="text-capitalize form-label">closer team</label>
                                        <input type="closer_team" class="form-control" id="closer_team"
                                            name="closer_team" aria-describedby="closer_teamHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="client" class="text-capitalize form-label">client</label>
                                        <input type="client" class="form-control" id="client" name="client"
                                            aria-describedby="clientHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="status" class="text-capitalize form-label">status</label>
                                        <select class="form-control " id="status" name="status" aria-label="Status">
                                            {{-- <option selected>Status</option> --}}
                                            <option value="all">Semua Status</option>
                                            <option value="pending">Berjalan</option>
                                            <option value="finish">Selesai</option>
                                        </select>
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="start_date" class="text-capitalize form-label">start date</label>
                                        <input type="start_date" class="form-control" id="start_date" name="start_date"
                                            aria-describedby="start_dateHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="end_date" class="text-capitalize form-label">end date</label>
                                        <input type="end_date" class="form-control" id="end_date" name="end_date"
                                            aria-describedby="end_dateHelp">
                                        {{-- <div id="categoryHelp" class="form-text">category</div> --}}
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
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Event Name</th>
                                    <th style="text-align: center;">Event Location</th>
                                    <th style="text-align: center;">Starter Team</th>
                                    <th style="text-align: center;">Closer Team</th>
                                    <th style="text-align: center;">Client</th>
                                    <th style="text-align: center;">Start Date</th>
                                    <th style="text-align: center;">Finish Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-weight: 400!important; font-size: 14px;">
                                @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->event_name }}</td>
                                    <td style="text-align: center;">{{ $item->event_location }}</td>
                                    <td style="text-align: center;">
                                        {{ $item->starterTeam->name??'' }}
                                    </td>
                                    <td style="text-align: center;">
                                        @if ($item->closer_team_id!=0)
                                        {{ $item->closerTeam->name }}
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $item->clientData->name }}</td>
                                    <td style="text-align: center;">{{ $item->start_date }}</td>
                                    <td style="text-align: center;">{{ $item->finish_date }}</td>
                                    <td style="text-align: center;">
                                        {{-- <a href="{{ route('edit_event',['id' => $item->id]) }}"
                                            class="btn btn-secondary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <a href="{{ route('edit_event',['id' => $item->id]) }}" class="btn btn-secondary"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{ route('detail_event',['id' => $item->id]) }}" class="btn btn-info"
                                            title="Detail">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                        {{-- @if(auth()->user()->team_id == $item->starter_team_id && !$item->start_date) --}}
                                        <a href="{{ route('start_event', ['id' => $item->id]) }}"
                                            class="btn btn-success btn-sm" title="Start Event">
                                            <i class="bi bi-play-circle"></i>
                                        </a>
                                        {{-- @endif --}}
                                        <form action="{{ route('close_event_detail',['id' => $item->id]) }}"
                                            method="GET" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Close Event">
                                                <i class="bi bi-x-circle"></i>
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
    <div class="compact-view">
        @foreach ($data as $item)
        <div class="product-group mb-3">
            <div class="product-group-header d-flex justify-content-between align-items-center">
                <span class="group-title">{{ $item->event_name }}</span>
                <div class="group-actions">
                    <a href="{{ route('edit_event', ['id' => $item->id]) }}" class="btn btn-secondary btn-sm"
                        title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('detail_event', ['id' => $item->id]) }}" class="btn btn-info btn-sm"
                        title="Detail">
                        <i class="bi bi-info-circle"></i>
                    </a>
                    {{-- @if(auth()->user()->team_id == $item->starter_team_id && !$item->start_date) --}}
                    <a href="{{ route('start_event', ['id' => $item->id]) }}" class="btn btn-success btn-sm"
                        title="Start Event">
                        <i class="bi bi-play-circle"></i>
                    </a>
                    {{-- @endif --}}
                    {{-- @if(auth()->user()->team_id == $item->closer_team_id && $item->start_date && !$item->finish_date) --}}
                    <a href="{{ route('close_event', ['id' => $item->id]) }}" class="btn btn-danger btn-sm"
                        title="Close Event">
                        <i class="bi bi-stop-circle"></i>
                    </a>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="product-group-body">
                <div class="product-info">
                    <div class="product-details">
                        <span><i class="bi bi-geo-alt"></i> {{ $item->event_location }}</span>
                        <span><i class="bi bi-person"></i> Starter: {{ $item->starterTeam->name }}</span>
                        <span><i class="bi bi-person"></i> Closer: {{ $item->closerTeam->name ?? '-' }}</span>
                        <span><i class="bi bi-people"></i> Client: {{ $item->client }}</span>
                        <span><i class="bi bi-calendar"></i> {{ $item->start_date }} - {{ $item->finish_date }}</span>
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
<script>
    $( function() {
        $( "#start_date" ).datepicker();
      } );
</script>
<script>
    $( function() {
        $( "#end_date" ).datepicker();
      } );
</script>


@endpush

@push('js')
<script>
    function startEvent(eventId) {
    if (confirm('Are you sure you want to start this event?')) {
        $.ajax({
            url: '/start_event',
            type: 'POST',
            data: {
                event_id: eventId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert('Event started successfully');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message || 'An error occurred while starting the event');
            }
        });
    }
}

function closeEvent(eventId) {
    if (confirm('Are you sure you want to close this event?')) {
        $.ajax({
            url: '/close-event-action',
            type: 'POST',
            data: {
                event_id: eventId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert('Event closed successfully');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message || 'An error occurred while closing the event');
            }
        });
    }
}
</script>
@endpush

<script>
    document.getElementById('standardView').addEventListener('change', function() {
        document.getElementById('main-content').classList.remove('view-compact');
    });
    document.getElementById('compactView').addEventListener('change', function() {
        document.getElementById('main-content').classList.add('view-compact');
    });
</script>