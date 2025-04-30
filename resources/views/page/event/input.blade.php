@extends('layouts.index')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .ui-menu-item {
        padding: 5px 10px;
        cursor: pointer;
    }

    .ui-menu-item:hover {
        background-color: #f8f9fa;
    }

    .event-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .event-actions button {
        flex: 1;
    }

    .event-actions button:disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }

    .alert {
        display: none;
        margin-top: 10px;
    }
</style>
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
                    <form action="{{ route('submit_event') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_name" class="form-label text-capitalize">event name</label>
                                    <input type="text" @if ($event) value="{{ $eventDetail->event_name }}" @endif
                                        class="form-control @error('event_name') is-invalid @enderror" required
                                        id="event_name" name="event_name" placeholder="Dufan fun Play (2024)">
                                    @error('event_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_location" class="form-label text-capitalize">event
                                        location</label>
                                    <input type="text" @if ($event) value="{{ $event->event_location }}" @endif
                                        class="form-control @error('event_location') is-invalid @enderror" required
                                        id="event_location" name="event_location" placeholder="Dufan Jakarta">
                                    @error('event_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="client" class="form-label text-capitalize">client</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="client_search" placeholder="Cari client...">
                                <input type="hidden" id="client" name="client" required>
                            </div>
                            @error('client')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label text-capitalize">date</label>
                            <input type="text" @if ($event) value="{{ $event->date }}" @endif
                                class="form-control @error('date') is-invalid @enderror" required id="date" name="date"
                                placeholder="2024-02-16">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="starter_team" class="form-label text-capitalize">starter team</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="starter_team_search"
                                    placeholder="Cari tim starter...">
                                <input type="hidden" id="starter_team" name="starter_team">
                            </div>
                            @error('starter_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="closer_team" class="form-label text-capitalize">closer team</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="closer_team_search"
                                    placeholder="Cari tim closer...">
                                <input type="hidden" id="closer_team" name="closer_team">
                            </div>
                            @error('closer_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <h4>Produk</h4>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pilih Produk</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" id="product_search" class="form-control"
                                                placeholder="Cari produk...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button"
                                                    id="search_product">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="search_results" class="mb-3" style="display: none;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="search_results_body">
                                                <!-- Search results will be displayed here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="selected_products_table">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>Diskon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="selected_products_body">
                                            <!-- Selected products will be displayed here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event-actions">
                    <button type="button" class="btn btn-success" id="startEventBtn" disabled>
                        <i class="fas fa-play"></i> Start Event
                    </button>
                    <button type="button" class="btn btn-danger" id="closeEventBtn" disabled>
                        <i class="fas fa-stop"></i> Close Event
                    </button>
                </div>
                <div class="alert alert-success" id="successAlert" role="alert"></div>
                <div class="alert alert-danger" id="errorAlert" role="alert"></div>
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
    });
</script>
<script>
    $(document).ready(function() {
        // Store selected products
        let selectedProducts = [];
        
        // Search for products
        $('#search_product').click(function() {
            const searchTerm = $('#product_search').val();
            if (searchTerm.trim() === '') {
                alert('Silakan masukkan kata kunci pencarian');
                return;
            }
            
            $.ajax({
                url: '{{ URL::To("/auto-complete-product") }}',
                type: 'GET',
                data: { q: searchTerm },
                success: function(response) {
                    displaySearchResults(response);
                },
                error: function() {
                    alert('Terjadi kesalahan saat mencari produk');
                }
            });
        });
        
        // Display search results
        function displaySearchResults(products) {
            const resultsBody = $('#search_results_body');
            resultsBody.empty();
            
            if (products.length === 0) {
                resultsBody.append('<tr><td colspan="5" class="text-center">Tidak ada produk ditemukan</td></tr>');
            } else {
                products.forEach(function(product) {
                    // Check if product is already selected
                    const isSelected = selectedProducts.some(p => p.id === product.id);
                    
                    const row = `
                        <tr>
                            <td>${product.code}</td>
                            <td>${product.product_name}</td>
                            <td>${product.category || '-'}</td>
                            <td>${product.status || '-'}</td>
                            <td>
                                ${isSelected ? 
                                    '<button class="btn btn-sm btn-secondary" disabled>Telah Dipilih</button>' : 
                                    `<button class="btn btn-sm btn-primary add-product" data-id="${product.id}" data-code="${product.code}" data-name="${product.product_name}" data-category="${product.category || '-'}" data-status="${product.status || '-'}">Pilih</button>`
                                }
                            </td>
                        </tr>
                    `;
                    resultsBody.append(row);
                });
            }
            
            $('#search_results').show();
        }
        
        // Add product to selected list
        $(document).on('click', '.add-product', function() {
            const productId = $(this).data('id');
            const productCode = $(this).data('code');
            const productName = $(this).data('name');
            const productCategory = $(this).data('category');
            const productStatus = $(this).data('status');
            
            // Add to selected products array
            selectedProducts.push({
                id: productId,
                code: productCode,
                name: productName,
                category: productCategory,
                status: productStatus
            });
            
            // Update the selected products table
            updateSelectedProductsTable();
            
            // Update the search results to show this product as selected
            $(this).prop('disabled', true).text('Telah Dipilih').removeClass('btn-primary').addClass('btn-secondary');
        });
        
        // Remove product from selected list
        $(document).on('click', '.remove-product', function() {
            const productId = $(this).data('id');
            
            // Remove from selected products array
            selectedProducts = selectedProducts.filter(p => p.id !== productId);
            
            // Update the selected products table
            updateSelectedProductsTable();
        });
        
        // Update the selected products table
        function updateSelectedProductsTable() {
            const tableBody = $('#selected_products_body');
            tableBody.empty();
            
            selectedProducts.forEach(function(product) {
                const row = `
                    <tr>
                        <td>${product.code}</td>
                        <td>${product.name}</td>
                        <td>${product.category}</td>
                        <td>${product.status}</td>
                        <td>
                            <input type="number" class="form-control form-control-sm product-discount" 
                                name="discount[${product.id}]" min="0" step="0.01" placeholder="Diskon">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger remove-product" data-id="${product.id}">Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.append(row);
            });
            
            // Add hidden inputs for selected products
            updateHiddenInputs();
        }
        
        // Update hidden inputs for form submission
        function updateHiddenInputs() {
            // Remove existing hidden inputs
            $('input[name^="item_id"]').remove();
            
            // Add new hidden inputs for each selected product
            selectedProducts.forEach(function(product) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'item_id[]',
                    value: product.id
                }).appendTo('form');
            });
        }
        
        // Form submission validation
        $('form').submit(function(e) {
            if (selectedProducts.length === 0) {
                e.preventDefault();
                alert('Silakan pilih minimal satu produk');
                return false;
            }
            return true;
        });
    });
</script>
<script>
    $(function() {
        $("#date").datepicker();

        // Client search autocomplete
        $("#client_search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ URL::To("/auto-complete-user") }}',
                    type: 'GET',
                    dataType: "json",
                    data: {
                        q: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.name + ' (' + item.email + ')',
                                value: item.name,
                                id: item.id
                            };
                        }));
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $('#client').val(ui.item.id);
            }
        });

        // Function to format team data for display
        function formatTeamLabel(team) {
            return `Team ${team.group_id} (${team.member.length} members)`;
        }

        // Starter team search
        $("#starter_team_search").autocomplete({
            source: function(request, response) {
                const teams = @json($teams);
                const searchTerm = request.term.toLowerCase();
                
                const filteredTeams = teams.filter(team => 
                    formatTeamLabel(team).toLowerCase().includes(searchTerm) ||
                    team.member.some(member => 
                        member.name.toLowerCase().includes(searchTerm) ||
                        member.email.toLowerCase().includes(searchTerm)
                    )
                );

                response(filteredTeams.map(team => ({
                    label: formatTeamLabel(team),
                    value: formatTeamLabel(team),
                    id: team.group_id
                })));
            },
            minLength: 1,
            select: function(event, ui) {
                $('#starter_team').val(ui.item.id);
            }
        });

        // Closer team search
        $("#closer_team_search").autocomplete({
            source: function(request, response) {
                const teams = @json($teams);
                const searchTerm = request.term.toLowerCase();
                
                const filteredTeams = teams.filter(team => 
                    formatTeamLabel(team).toLowerCase().includes(searchTerm) ||
                    team.member.some(member => 
                        member.name.toLowerCase().includes(searchTerm) ||
                        member.email.toLowerCase().includes(searchTerm)
                    )
                );

                response(filteredTeams.map(team => ({
                    label: formatTeamLabel(team),
                    value: formatTeamLabel(team),
                    id: team.group_id
                })));
            },
            minLength: 1,
            select: function(event, ui) {
                $('#closer_team').val(ui.item.id);
            }
        });

        // Form validation to ensure hidden inputs are filled
        $('form').submit(function(e) {
            if ($('#client').val() === '') {
                e.preventDefault();
                alert('Silakan pilih client');
                return false;
            }
            // Continue with existing product validation...
        });
    });
</script>
<script>
    $(document).ready(function() {
    // Function to check if current user is in a team
    function isUserInTeam(teamId) {
        const currentUserId = {{ Auth::id() }};
        const teams = @json($teams);
        const team = teams.find(t => t.group_id === teamId);
        return team && team.member.some(m => m.id === currentUserId);
    }

    // Function to update button states
    function updateEventButtons() {
        const starterTeamId = $('#starter_team').val();
        const closerTeamId = $('#closer_team').val();
        
        $('#startEventBtn').prop('disabled', !starterTeamId || !isUserInTeam(starterTeamId));
        $('#closeEventBtn').prop('disabled', !closerTeamId || !isUserInTeam(closerTeamId));
    }

    // Function to show alerts
    function showAlert(type, message) {
        const alertId = type === 'success' ? '#successAlert' : '#errorAlert';
        $(alertId).text(message).fadeIn().delay(3000).fadeOut();
    }

    // Update buttons when teams are selected
    $('#starter_team_search').on('change', updateEventButtons);
    $('#closer_team_search').on('change', updateEventButtons);

    // Handle start event button click
    $('#startEventBtn').click(function() {
        if (!$(this).prop('disabled')) {
            if (confirm('Are you sure you want to start this event?')) {
                $.ajax({
                    url: '{{ route("start_event") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        event_id: '{{ $event->id ?? "" }}'
                    },
                    success: function(response) {
                        showAlert('success', response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        showAlert('error', response.message || 'Failed to start event. Please try again.');
                    }
                });
            }
        }
    });

    // Handle close event button click
    $('#closeEventBtn').click(function() {
        if (!$(this).prop('disabled')) {
            if (confirm('Are you sure you want to close this event?')) {
                $.ajax({
                    url: '{{ route("close_event") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        event_id: '{{ $event->id ?? "" }}'
                    },
                    success: function(response) {
                        showAlert('success', response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        showAlert('error', response.message || 'Failed to close event. Please try again.');
                    }
                });
            }
        }
    });

    // Initial button state update
    updateEventButtons();
});
</script>
<script>
    function markProductAsInstalled(productId) {
    // Create a file input element
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';
    document.body.appendChild(fileInput);

    // Handle file selection
    fileInput.onchange = function(e) {
        const file = e.target.files[0];
        if (!file) return;

        // Create FormData and append file
        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('picture', file);
        formData.append('_token', '{{ csrf_token() }}');

        // Send request to mark product as installed
        fetch('/mark-product-installed', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update UI to show product as installed
                const productRow = document.querySelector(`[data-product-id="${productId}"]`);
                if (productRow) {
                    productRow.classList.add('installed');
                    const statusCell = productRow.querySelector('.status-cell');
                    if (statusCell) {
                        statusCell.innerHTML = '<span class="badge bg-success">Installed</span>';
                    }
                }

                // Show success message
                alert('Product marked as installed successfully');
            } else {
                alert(data.message || 'Failed to mark product as installed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while marking the product as installed');
        })
        .finally(() => {
            // Clean up
            document.body.removeChild(fileInput);
        });
    };

    // Trigger file selection dialog
    fileInput.click();
}
</script>
@endpush