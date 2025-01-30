@extends('layouts.index')

@section('content')
<div class="container py-5">
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
                                    <label for="starter_user" class="text-capitalize form-label">starter user</label>
                                    <input type="starter_user" class="form-control" id="starter_user"
                                        name="starter_user" aria-describedby="starter_userHelp">
                                    {{-- <div id="categoryHelp" class="form-text">category</div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="closer_user" class="text-capitalize form-label">closer user</label>
                                    <input type="closer_user" class="form-control" id="closer_user" name="closer_user"
                                        aria-describedby="closer_userHelp">
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
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">#</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">event name </th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">event location </th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">starter user</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">closer user</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">client</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">start date</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">finish date</th>
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
                                    {{ $item->event_name }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->event_location }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->starterUser->name }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    @if ($item->closer_user_id!=0)

                                    {{ $item->closerUser->name }}
                                    @endif
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->client }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->start_date }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->finish_date }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    @if ($item->finish_date==null||$item->finish_date=='')

                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='staff')
                                    @if (Auth::user()->id == $item->created_by)

                                    <a href="{{ route('edit_event',['id' => $item->id]) }}">

                                        <button class="btn btn-secondary">
                                            Edit
                                        </button>
                                    </a>
                                    @endif

                                    <a href="{{ route('close_event_detail',['id' => $item->id]) }}">

                                        <button class="btn btn-secondary">
                                            Selesaikan
                                        </button>
                                    </a>
                                    @else
                                    <button class="btn btn-secondary no-access">
                                        edit
                                    </button>

                                    @endif
                                    @endif



                                    @if (Auth::user()->role=='owner' || Auth::user()->role=='admin'
                                    ||Auth::user()->role=='staff')

                                    <a href="{{ route('detail_event',['id' => $item->id]) }}">
                                        <button class="btn btn-primary my-2 mx-2" style="white-space: nowrap">
                                            Detail
                                        </button>
                                    </a>
                                    @else
                                    <button class="btn btn-primary no-access my-2 mx-2" style="white-space: nowrap">
                                        Detail
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