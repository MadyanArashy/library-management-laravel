<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PinjamBuku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("anggota.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);;
    }

    public function history()
    {
        $pinjamBukus = PinjamBuku::all();
        $books = Book::all();
        return view("anggota.history", compact("pinjamBukus", "books"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "book_id"=> "required|exists:books,id",
            "tanggal_pinjam"=> "required|date",
            "tanggal_kembali"=> "required|date|after_or_equal:tanggal_pinjam",
        ]);

        $book = Book::findOrFail($request->book_id);
        // Cek Ketersediaan Buku
        if(!$book->status) {
            return back()->with("error","Tidak bisa meminjam buku ini");
        }
        PinjamBuku::create([
            "user_id" => auth("web")->user()->id,
            "book_id"=> $book->id,
            "tanggal_pinjam"=> $request->tanggal_pinjam,
            "tanggal_kembali"=> $request->tanggal_kembali,
            "status"=> "borrowed",
            ]);

        // Set status buku
        $book->update([
            'status' => false, // Buku tidak tersedia
            'book_status' => 'borrowed', // Buku sedang dipinjam
        ]);
        return back()->with('success','Buku berhasil dipinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
