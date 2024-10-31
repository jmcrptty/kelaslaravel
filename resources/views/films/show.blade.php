@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detail Film</h1>
        <div class="row justify-content-start">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/' . $film->cover) }}" alt="{{ $film->judul }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $film->judul }}</h4>
                        <p class="card-text"><strong>Sutradara:</strong> {{ $film->sutradara }}</p>
                        <p class="card-text">{{ $film->sinopsis }}</p>
                        <a href="{{ route('films.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
