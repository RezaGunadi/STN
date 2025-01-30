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
                <div class="card-header" style="font-weight: 600; color: #000;">{{ __('Input Event') }}
                </div>
                {{-- product_code
product_name
category
brand
type
code
description
payment_date
purpose_used
price
status
consumable --}}
                <div class="card-body">
                    <form action="{{ route('close_submit_event') }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="mb-3">
                            <label for="event_name" class="form-label text-capitalize">event name</label>
                            <input type="text" readonly @if ($event) value="{{ $event->event_name }}" @endif
                                class="form-control @error('event_name') is-invalid @enderror" required id="event_name"
                                name="event_name" placeholder="Dufan fun Play">
                            @error('event_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="event_location" class="form-label text-capitalize">event location</label>
                            <input readonly type="text" @if ($event) value="{{ $event->event_location }}" @endif
                                class="form-control @error('event_location') is-invalid @enderror" required
                                id="event_location" name="event_location" placeholder="Dufan Jakarta">
                            @error('event_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="lat" class="form-label text-capitalize">lat</label>
                            <input type="text" @if ($event)
                                value="{{ $event->lat }}"
                        @endif class="form-control @error('lat') is-invalid @enderror" required id="lat"
                        name="lat" placeholder="Samsung">
                        @error('lat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="lng" class="form-label text-capitalize">lng</label>
                    <input type="text" @if ($event) value="{{ $event->lng }}" @endif
                        class="form-control @error('lng') is-invalid @enderror" required id="lng" name="lng"
                        placeholder="Samsung">
                    @error('lng')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="client" class="form-label text-capitalize">client</label>
                    <input readonly type="text" @if ($event) value="{{ $event->client }}" @endif
                        class="form-control @error('client') is-invalid @enderror" required id="client" name="client"
                        placeholder="PT. XYZ">
                    @error('client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
                                    class=" text-capitalize">category</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">brand</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">type</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">description</th>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">purpose used</th> --}}
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Action</th>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Item Tidak Ada</th> --}}
                            </tr>
                        </thead>
                        <tbody style="font-weight: 400!important; font-size: 14px;">
                            @php
                            $number = 0;
                            @endphp
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
                                    {{ $item->category }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->brand }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->type }}
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->description }}</th>
                                {{-- <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize">
                                    {{ $item->purpose_used }}</th> --}}
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class=" text-capitalize  ">
                                    <Select class="form-select" name="item_id[{{ $item->id }}]">
                                        <option value="ada">Ada</option>
                                        <option value="return">Di Bawa Kembali</option>
                                        @if ($item->is_consumable==1)
                                            
                                        <option value="hilang">Habis</option>
                                        @else
                                        <option value="hilang">Hilang</option>
                                            
                                        @endif
                                    </Select>
                                    {{-- <input type="checkbox" name="item_id[]" value="{{ $item->id }}"
                                        {{ $event!=null ? $event->id==$item->event_id ?'checked':'':'' }}> --}}
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary text-capitalize mt-5 w-100" id="inputData" type="submit">
                    submit
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('script')
<script>
    $( function() {
        $( "#date" ).datepicker();
      } );
</script>
@endpush