<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
     * Menunjukkan semua buku yang sedang dipinjam pengguna
     */
    public function borrowed()
    {
        $pinjamBukus = PinjamBuku::where('user_id', Auth::user()->id)->where('status', 'borrowed')->get();
        return view('anggota.borrowed', compact('pinjamBukus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //
    }

    /*
    *   Ubah status buku dan pinjamBuku
    */
    public function status(string $status, string $id, string $book_id)
    {
        if(Auth::user()->role == 'admin') { $route = 'books.history'; }else{ $route = 'anggota.history';} // Jika pengguna admin, kirim ke books.history, Jika pengguna anggota, kirim ke anggota.history
        if($status == 'borrowed') // Jika status "borrowed", berarti menjadi returned
        {
            $book_status = true;
            $book_status_2 = 'available';
            $pinjam_status = 'returned';
        } elseif($status == 'returned') { // Jika status "returned", berarti menjadi borrowed
            $book_status = false;
            $book_status_2 = 'unavailable';
            $pinjam_status = 'borrowed';
        } else{ // Jika ngebug maka dibatalin semua script dan di console log
            dd($status, $id, $book_id);
        };

        $pinjamBuku = PinjamBuku::findOrFail($id);
        $book = Book::findOrFail($book_id);

        $book->update([
            'status'=> $book_status,
            'book_status' => $book_status_2,
        ]);
        $pinjamBuku->update([
            'status'=> $pinjam_status,
        ]);

        return redirect()->route('books.history')->with('success','Buku telah dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
