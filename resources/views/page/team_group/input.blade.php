@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">

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
                <div class="mb-3">
                    <label class="form-label">Pilih Anggota</label>
                    <div>
                        @foreach($users as $user)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="user_ids[]" value="{{ $user->id }}"
                                id="user_{{ $user->id }}">
                            <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->name }}</label>
                        </div>
                        @endforeach
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#date" ).datepicker();
      } );
</script>
@endpush