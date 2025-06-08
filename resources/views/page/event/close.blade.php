@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .unauthorized-message {
        text-align: center;
        padding: 2rem;
        background: #f8d7da;
        color: #721c24;
        border-radius: 4px;
        margin: 2rem 0;
    }
</style>
@endpush
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!$isCloserTeamMember && !$isStarterTeamMember && Auth::user()->role != 'super_user' && Auth::user()->role != 'owner')
            <div class="unauthorized-message">
                <h4>Unauthorized Access</h4>
                <p>You are not authorized to close this event. Only members of the closer team can access this page.</p>
            </div>
            @else
            <div class="card">
                <div class="card-header" style="font-weight: 600; color: #000;">{{ __('Close Event') }}</div>
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
                    <input readonly type="text" @if ($event) value="{{ $event->clientData->name }}" @endif
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
                                    class="text-capitalize">#</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">product code</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">product name</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">category</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">brand</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">type</th>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">description</th> --}}
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">image</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">status</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class="text-capitalize">action</th>
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
                                    class="text-capitalize">
                                    {{ $item->product_code }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    {{ $item->product_name }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    {{ $item->category }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    {{ $item->brand }}</th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    {{ $item->type }}</th>
                                {{-- <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    {{ $item->description }}</th> --}}
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    @if ($item->job_detail_picture!=null)
                                    <img src="{{ URL::To( $item->job_detail_picture) }}"
                                        style="width: 100px; height: 100px;" alt="Product Image" @else <span
                                        class="badge bg-danger">No Image</span>
                                    @endif
                                </th>
                                {{-- {{ number_format($item->price, 0, ',', '.') }}</th> --}}
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    @if($item->is_consumable == 1)
                                    <span class="badge bg-info">Consumable</span>
                                    @else
                                    <span class="badge bg-primary">Non-Consumable</span>
                                    @endif
                                </th>
                                <th scope="col" style="text-align: center;font-weight: 400!important;"
                                    class="text-capitalize">
                                    <Select class="form-select" name="item_id[{{ $item->id }}]">
                                        <option value="ada">Ada</option>
                                        <option value="return">Di Bawa Kembali</option>
                                        @if ($item->is_consumable==1)
                                        <option value="hilang">Habis</option>
                                        @else
                                        <option value="hilang">Hilang</option>
                                        @endif
                                    </Select>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary text-capitalize mt-5 w-100" id="submitClose" type="submit">
                    Submit Event Closure
                </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
@endsection

@push('script')
<script>
    $(function() {
        $("#date").datepicker();
        
        // Form submission validation
        $('form').on('submit', function(e) {
            const selectedProducts = $('select[name^="item_id"]').length;
            const selectedAda = $('select[name^="item_id"] option:selected[value="ada"]').length;
            const selectedReturn = $('select[name^="item_id"] option:selected[value="return"]').length;
            
            if (selectedAda + selectedReturn === 0) {
                e.preventDefault();
                alert('Please select at least one product as "Ada" or "Di Bawa Kembali"');
                return false;
            }
            
            if (!confirm('Are you sure you want to submit the event closure? This action cannot be undone.')) {
                e.preventDefault();
                return false;
            }
        });
    });
</script>
@endpush