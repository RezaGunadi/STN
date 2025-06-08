@extends('layouts.index')
@push('css')
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Edit Tim</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('team_group.update', $group_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Tim</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $teamName }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Anggota Tim</label>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="py-3">Nama</th>
                                            <th class="py-3">Email</th>
                                            <th class="py-3">No. Telepon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            @if(in_array($user->id, $selectedUserIds))
                                            <tr>
                                                <td class="py-3">{{ $user->name }}</td>
                                                <td class="py-3">{{ $user->email }}</td>
                                                <td class="py-3">{{ $user->phone ?? '-' }}</td>
                                            </tr>
                                            <input type="hidden" name="user_ids[]" value="{{ $user->id }}">
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button class="btn btn-primary text-capitalize w-100" type="submit">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script>
    $(function() {
        $("#date").datepicker();
    });
</script>
@endpush