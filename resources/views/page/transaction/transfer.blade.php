@extends('layouts.index')

@section('content')
<div class="col-md-9 mx-auto py-3">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Transfer Produk Antar Tim</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('product.transfer') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="source_team" class="form-label">Tim Asal</label>
                        <select class="form-control" id="source_team" name="source_team" required>
                            <option value="">Pilih Tim Asal</option>
                            @foreach($teams as $team)
                            <option value="{{ $team->group_id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="destination_team" class="form-label">Tim Tujuan</label>
                        <select class="form-control" id="destination_team" name="destination_team" required>
                            <option value="">Pilih Tim Tujuan</option>
                            @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_search" class="form-label">Cari Produk</label>
                    <select id="product_search" class="form-control w-100" name="product_search"></select>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Kondisi</th>
                                {{-- <th>Jumlah</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="transfer_table_body">
                            <!-- Products will be added here dynamically -->
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Transfer Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
    // Initialize select2 for product search
    $('#product_search').select2({
        placeholder: 'Cari produk...',
        ajax: {
            url: '{{ route("product.search") }}',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    team_id: $('#source_team').val()
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Handle product selection
    $('#product_search').on('select2:select', function(e) {
        var data = e.params.data;
        addProductToTable(data);
        $(this).val(null).trigger('change');
    });

    function addProductToTable(product) {
        var rowId = 'product-' + product.id;
        if ($('#' + rowId).length) {
            // Product already exists, increment quantity
            var currentQty = parseInt($('#' + rowId + ' .quantity').val());
            $('#' + rowId + ' .quantity').val(currentQty + 1);
        } else {
            // Add new product row
            $('#transfer_table_body').append(`
                <tr id="${rowId}">
                    <td>${product.product_code}</td>
                    <td>${product.product_name}</td>
                    <td>${product.status}</td>
                    <input type="hidden" name="product_ids[]" value="${product.id}">
                    {{-- <td>
                        <input type="number" class="form-control quantity" name="quantities[${product.id}]" value="1" min="1" required>
                    </td> --}}
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-product" data-id="${product.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
        }
    }

    // Handle product removal
    $(document).on('click', '.remove-product', function() {
        var productId = $(this).data('id');
        $('#product-' + productId).remove();
    });
});
</script>
@endpush