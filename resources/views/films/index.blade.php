@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Film Management</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif  

        <!-- Card untuk menampilkan daftar film -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Daftar Film</h5>
                <a href="{{ route('films.create') }}" class="btn btn-primary">Tambah Film</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($films as $film)
                        <div class="col-md-4 mb-4"> <!-- Menggunakan col-md-4 untuk 3 card dalam satu baris -->
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/' . $film->cover) }}" alt="{{ $film->judul }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $film->judul }}</h5>
                                    <p class="card-text"><strong>Sutradara:</strong> {{ $film->sutradara }}</p>
                                    <div class="d-flex justify-content-start mt-3"> <!-- Memindahkan tombol ke kiri -->
                                        <a href="{{ route('films.show', $film->slug) }}" class="btn btn-info me-2">Detail</a>
                                        <a href="{{ route('films.edit', $film->slug) }}" class="btn btn-warning me-2">Edit</a>
                                        <form action="{{ route('films.destroy', $film->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
