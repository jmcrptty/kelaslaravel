<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Tambahkan Str di sini

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'judul', 'sutradara', 'sinopsis', 'cover'];

    // Generate slug secara otomatis ketika menambahkan film
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($film) {
            $film->slug = Str::slug($film->judul); // Menggunakan Str di sini
        });
    }
}
