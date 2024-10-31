@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Tambah Film</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="sutradara" class="form-label">Sutradara</label>
                <input type="text" class="form-control" id="sutradara" name="sutradara" required>
            </div>
            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis"></textarea>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection