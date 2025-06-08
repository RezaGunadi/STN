@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<style>
    .select2-container {
        width: 100% !important;
    }

    .selected-users-table {
        /* margin-top: 20px; */
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        min-height: 38px;
        padding-top: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        /* margin-top: 5px; */
    }

    .select2-container--default .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding-top: 0;
    }
</style>
@endpush
@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header" style="font-weight: 600; color: #000;">Tambah Tim</div>
        <div class="card-body">
            <form action="{{ route('team_group.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-capitalize">Nama Tim</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-0">
                    <label class="form-label">Pilih Anggota</label>
                    <select class="form-control select2" id="user_select" multiple>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-phone="{{ $user->phone }}">
                            {{ $user->name }}</option>
                        @endforeach
                    </select>

                    <div class="selected-users-table">
                        <table class="table" id="selected_users_table">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div id="selected_users_input">
                    </div>
                </div>
                <button class="btn btn-primary text-capitalize mt-5 w-100" type="submit">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script>
    $(function() {
        $('.select2').select2({
            placeholder: "",
            // width: '100%'
        });

        $('#user_select').on('change', function() {
            updateSelectedUsers();
        });

        function updateSelectedUsers() {
            let selectedOptions = $('#user_select').select2('data');
            let tbody = $('#selected_users_table tbody');
            let inputContainer = $('#selected_users_input');
            
            tbody.empty();
            inputContainer.empty();

            selectedOptions.forEach(function(option) {
                let $option = $(option.element);
                let email = $option.data('email') || '-';
                let phone = $option.data('phone') || '-';
                
                // Add to table
                tbody.append(`
                    <tr>
                        <td>${option.text}</td>
                        <td>${email}</td>
                        <td>${phone}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-user" data-id="${option.id}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                `);

                // Add hidden input
                inputContainer.append(`
                    <input type="hidden" name="user_ids[]" value="${option.id}">
                `);
            });
        }

        $(document).on('click', '.remove-user', function() {
            let userId = $(this).data('id');
            let values = $('#user_select').val();
            values = values.filter(value => value !== userId.toString());
            $('#user_select').val(values).trigger('change');
        });
    });
</script>
@endpush