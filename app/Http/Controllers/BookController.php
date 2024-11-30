<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view ("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return (view("books.partials.create"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul_buku" => "required|string",
            "penulis" => "required|string",
            "kategori" => "required|string",
            "tahun_terbit" => "required|integer",
            "jumlah_stok" => "required|integer",
            "deskripsi" => "required|string",
            "status" => "required|boolean",
            "foto"=> "image|mimes:jpeg,jpg,png,svg,webp|max:2048",
        ]);

        // dd($request->all());
        $image = $request->file('foto')->store('books', 'public');


        Book::create([
            "judul_buku" => $request->judul_buku,
            "penulis" => $request->penulis,
            "kategori" => $request->kategori,
            "tahun_terbit" => $request->tahun_terbit,
            "jumlah_stok" => $request->jumlah_stok,
            "deskripsi" => $request->deskripsi,
            "status" => $request->status,
            "foto"=> $image,
        ]);

        return redirect(route('books.index'))->with("success","Buku berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return back();
    }

    public function history(): View
    {
        $pinjamBukus = PinjamBuku::all();
        $books = Book::all();

        return view("books.history", compact('pinjamBukus', 'books'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view ("books.partials.edit", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect(route("books.edit", $book->id))->with("success","Buku telah berhasil di update!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route("books.index"))->with("success","Buku berhasil dihapus!");
    }
}
