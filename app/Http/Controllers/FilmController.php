<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    // Menampilkan daftar semua film
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    // Menampilkan form tambah film baru
    public function create()
    {
        return view('films.create');
    }

    // Menyimpan data film baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sutradara' => 'required|string|max:255',
            'sinopsis' => 'nullable|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $film = new Film();
        $film->judul = $request->judul;
        $film->sutradara = $request->sutradara;
        $film->sinopsis = $request->sinopsis;

        // Membuat slug yang unik
        $slug = Str::slug($request->judul);
        $count = Film::where('slug', $slug)->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Menambahkan angka jika slug sudah ada
        }

        $film->slug = $slug; // Menggunakan slug yang sudah dipastikan unik

        // Upload gambar cover
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public'); // Menyimpan di storage/app/public/covers
            $film->cover = $coverPath;
        }
    
        $film->save();

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan');
    }

    // Menampilkan detail film tertentu
    public function show($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('films.show', compact('film')); // Mengembalikan view
    }

    // Menampilkan form edit film yang sudah ada
    public function edit($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('films.edit', compact('film'));
    }

    // Update data film yang ada
    public function update(Request $request, $slug)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sutradara' => 'required|string|max:255',
            'sinopsis' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $film = Film::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        $film->judul = $request->judul;
        $film->sutradara = $request->sutradara;
        $film->sinopsis = $request->sinopsis;

        // Upload cover baru jika ada
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($film->cover) {
                Storage::delete($film->cover);
            }
            $coverPath = $request->file('cover')->store('covers');
            $film->cover = $coverPath;
        }

        $film->save();

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui');
    }

    // Menghapus film
    public function destroy($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug

        // Hapus file cover dari storage jika ada
        if ($film->cover) {
            Storage::delete($film->cover);
        }

        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus');
    }
}
