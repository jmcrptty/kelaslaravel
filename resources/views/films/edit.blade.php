@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Film</h1>
        <div class="card">
            <div class="card-header">
                <h5>Edit Film: {{ $film->judul }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('films.update', $film->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $film->judul }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sutradara">Sutradara</label>
                        <input type="text" class="form-control" id="sutradara" name="sutradara" value="{{ $film->sutradara }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sinopsis">Sinopsis</label>
                        <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4">{{ $film->sinopsis }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="cover">Cover (optional)</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti cover.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
