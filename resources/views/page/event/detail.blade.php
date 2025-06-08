@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
        width: 100%;
        height: 200px;
    }

    .product-image {
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
    }

    .capture-buttons {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

    .preview-container {
        margin-top: 10px;
        text-align: center;
    }

    .preview-image {
        max-width: 100%;
        max-height: 300px;
        margin-top: 10px;
    }

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
                <p>You are not authorized to view this page. Only members of the closer team can access this page.</p>
            </div>
            @else
            <div class="card">
                <div class="card-header" style="font-weight: 600; color: #000;">{{ __('Event Details') }}</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">Event Name</label>
                                <input readonly type="text" value="{{ $event->event_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">Event Location</label>
                                <input readonly type="text" value="{{ $event->event_location }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">Client</label>
                                <input readonly type="text" value="{{ $event->clientData->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">Status</label>
                                <input readonly type="text"
                                    value="{{ $event->finish_date ? 'Completed' : ($event->start_date ? 'In Progress' : 'Pending') }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <form id="closeEventForm" action="{{ route('close_event',['id' => $event->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="table-responsive">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Product Code</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Category</th>
                                        <th scope="col" class="text-center">Brand</th>
                                        <th scope="col" class="text-center">Type</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col" class="text-center">Photo</th>
                                        <th scope="col" class="text-center">Status</th>
                                        {{-- <th scope="col" class="text-center">Check</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $number = 0; @endphp
                                    @foreach ($data as $item)
                                    @php $number++; @endphp
                                    <tr>
                                        <td class="text-center">{{ $number }}</td>
                                        <td class="text-center">{{ $item->product_code }}</td>
                                        <td class="text-center">{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->category }}</td>
                                        <td class="text-center">{{ $item->brand }}</td>
                                        <td class="text-center">{{ $item->type }}</td>
                                        <td class="text-center">{{ $item->description }}</td>
                                        <td class="text-center">
                                            @if($item->picture!=null && $item->picture!='')
                                            <img src="{{ URL::To($item->picture) }}" alt="Product Photo" class="product-image">
                                            @else
                                            <span class="text-muted">No photo</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($item->is_installed)
                                            <span class="badge bg-success">Installed</span>
                                            @else
                                            <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                                <input class="form-check-input product-checkbox" type="checkbox"
                                                    name="products[]" value="{{ $item->id }}"
                                                    id="product{{ $item->id }}">
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- @if(!$event->finish_date) --}}
                        @if($event->signature!=NULL && $event->signature_picture!=NULL)
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Signature</div>
                                    <div class="card-body">
                                        <img src="{{ URL::To($event->signature) }}" alt="Signature" class="img-fluid">
                                        <div class="alert alert-info mt-2">
                                            Signature has already been captured and cannot be edited.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Picture</div>
                                    <div class="card-body">
                                        <img src="{{ asset($event->signature_picture) }}" alt="Picture"
                                            class="img-fluid">
                                        <div class="alert alert-info mt-2">
                                            Picture has already been captured and cannot be edited.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Signature Capture</div>
                                    <div class="card-body">
                                        <canvas id="signaturePad" class="signature-pad" width="400" height="300"
                                            style="border: 1px solid #ccc; border-radius: 4px; touch-action: none;"></canvas>
                                        <div class="capture-buttons">
                                            <button type="button" class="btn btn-secondary"
                                                id="clearSignature">Clear</button>
                                            <button type="button" class="btn btn-primary" id="saveSignature">Save
                                                Signature</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Picture Capture</div>
                                    <div class="card-body">
                                        <div class="preview-container">
                                            <video id="video" width="100%" height="300" autoplay playsinline></video>
                                            <canvas id="canvas" style="display:none;"></canvas>
                                            <img id="photo" class="preview-image" style="display:none;">
                                        </div>
                                        <div class="capture-buttons">
                                            <button type="button" class="btn btn-primary" id="startCamera">Start
                                                Camera</button>
                                            <button type="button" class="btn btn-primary" id="capturePhoto"
                                                style="display:none;">Take Photo</button>
                                            <button type="button" class="btn btn-success" id="savePhoto"
                                                style="display:none;">Save Photo</button>
                                            <button type="button" class="btn btn-danger" id="retakePhoto"
                                                style="display:none;">Retake</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Event Closure</button>
                            </div>
                        </div> --}}
                        @endif
                    </form>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    // Signature Pad Initialization
    const canvas = document.getElementById('signaturePad');
    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)'
    });

    // Clear signature
    document.getElementById('clearSignature').addEventListener('click', function() {
        signaturePad.clear();
    });

    // Save signature
    document.getElementById('saveSignature').addEventListener('click', function() {
        if (signaturePad.isEmpty()) {
            alert('Please provide a signature first.');
            return;
        }

        const signatureData = signaturePad.toDataURL('image/png');
        const timestamp = new Date().getTime();
        const filename = `signature_${timestamp}.png`;
        
        // Send to server
        fetch('/save-signature', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                event_id: '{{ $event->id }}',
                signature: signatureData,
                filename: filename
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Signature saved successfully');
            } else {
                alert('Error saving signature');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving signature');
        });
    });

    // Camera functionality
    const video = document.getElementById('video');
    const photoCanvas = document.getElementById('canvas');
    const photo = document.getElementById('photo');
    const startCameraBtn = document.getElementById('startCamera');
    const captureButton = document.getElementById('capturePhoto');
    const saveButton = document.getElementById('savePhoto');
    const retakeButton = document.getElementById('retakePhoto');
    let stream = null;

    // Start camera button click handler
    startCameraBtn.addEventListener('click', async function() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { 
                    facingMode: 'environment'
                } 
            });
            video.srcObject = stream;
            video.style.display = 'block';
            photo.style.display = 'none';
            startCameraBtn.style.display = 'none';
            captureButton.style.display = 'inline-block';
            retakeButton.style.display = 'none';
            saveButton.style.display = 'none';
        } catch (err) {
            console.error('Error accessing camera:', err);
            alert('Error accessing camera. Please make sure you have granted camera permissions.');
        }
    });

    // Capture photo
    captureButton.addEventListener('click', function() {
        photoCanvas.width = video.videoWidth;
        photoCanvas.height = video.videoHeight;
        photoCanvas.getContext('2d').drawImage(video, 0, 0);
        
        photo.src = photoCanvas.toDataURL('image/png');
        video.style.display = 'none';
        photo.style.display = 'block';
        captureButton.style.display = 'none';
        saveButton.style.display = 'inline-block';
        retakeButton.style.display = 'inline-block';

        // Stop camera stream
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });

    // Retake photo
    retakeButton.addEventListener('click', async function() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { 
                    facingMode: 'environment'
                } 
            });
            video.srcObject = stream;
            video.style.display = 'block';
            photo.style.display = 'none';
            captureButton.style.display = 'inline-block';
            saveButton.style.display = 'none';
            retakeButton.style.display = 'none';
        } catch (err) {
            console.error('Error accessing camera:', err);
            alert('Error accessing camera. Please make sure you have granted camera permissions.');
        }
    });

    // Save photo
    saveButton.addEventListener('click', function() {
        const timestamp = new Date().getTime();
        const filename = `event_photo_${timestamp}.png`;
        const photoData = photoCanvas.toDataURL('image/png');
        
        fetch('/save-photo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                event_id: '{{ $event->id }}',
                photo: photoData,
                filename: filename
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Photo saved successfully');
                // Reset camera UI
                startCameraBtn.style.display = 'inline-block';
                captureButton.style.display = 'none';
                saveButton.style.display = 'none';
                retakeButton.style.display = 'none';
            } else {
                alert('Error saving photo: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving photo: ' + error.message);
        });
    });

    // Form submission
    document.getElementById('closeEventForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const checkedProducts = document.querySelectorAll('.product-checkbox:checked');
        if (checkedProducts.length === 0) {
            alert('Please select at least one product');
            return;
        }

        if (confirm('Are you sure you want to submit the event closure? This action cannot be undone.')) {
            this.submit();
        }
    });
</script>
@endpush