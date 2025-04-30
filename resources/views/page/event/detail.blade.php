@extends('layouts.index')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
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
            @if(!$isCloserTeamMember)
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
                                <input readonly type="text" value="{{ $event->client }}" class="form-control">
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

                    <form id="closeEventForm" action="{{ route('close_event') }}" method="POST">
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
                                        <th scope="col" class="text-center">Check</th>
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
                                            @if($item->picture)
                                            <img src="{{ $item->picture }}" alt="Product Photo" class="product-image">
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
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input product-checkbox" type="checkbox"
                                                    name="products[]" value="{{ $item->id }}"
                                                    id="product{{ $item->id }}">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if(!$event->finish_date)
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Signature Capture</div>
                                    <div class="card-body">
                                        <canvas id="signaturePad" class="signature-pad" width="400"
                                            height="200"></canvas>
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
                                            <video id="video" width="100%" autoplay></video>
                                            <canvas id="canvas" style="display:none;"></canvas>
                                            <img id="photo" class="preview-image" style="display:none;">
                                        </div>
                                        <div class="capture-buttons">
                                            <button type="button" class="btn btn-primary" id="capturePhoto">Take
                                                Photo</button>
                                            <button type="button" class="btn btn-success" id="savePhoto"
                                                style="display:none;">Save Photo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Event Closure</button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
            @endif
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

        const signatureData = signaturePad.toDataURL();
        
        // Send to server
        fetch('/save-signature', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                event_id: '{{ $event->id }}',
                signature: signatureData
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
    const canvas = document.getElementById('canvas');
    const photo = document.getElementById('photo');
    const captureButton = document.getElementById('capturePhoto');
    const saveButton = document.getElementById('savePhoto');
    let stream = null;

    // Access camera
    async function startCamera() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
        } catch (err) {
            console.error('Error accessing camera:', err);
            alert('Error accessing camera. Please make sure you have granted camera permissions.');
        }
    }

    // Start camera when page loads
    startCamera();

    // Capture photo
    captureButton.addEventListener('click', function() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0);
        photo.src = canvas.toDataURL('image/png');
        photo.style.display = 'block';
        saveButton.style.display = 'block';
    });

    // Save photo
    saveButton.addEventListener('click', function() {
        const photoData = canvas.toDataURL('image/png');
        
        fetch('/save-photo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                event_id: '{{ $event->id }}',
                photo: photoData
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Photo saved successfully');
            } else {
                alert('Error saving photo');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving photo');
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