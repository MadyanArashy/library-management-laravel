<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul_buku',
        'penulis',
        'kategori',
        'tahun_terbit',
        'jumlah_stok',
        'status',
        'loan_status',
        'deskripsi',
        'foto',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function loans()
    {
        return $this->hasMany(PinjamBuku::class);
    }

}
