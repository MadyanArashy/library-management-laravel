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
    // Get all books by default
    $books = Book::all();

    // Check if the search query exists
    if (request()->has('q') && request()->q) {
        $query = request()->q;

        // Filter books where the title matches the query (use 'like' for partial matching)
        $books = Book::where('judul_buku', 'like', "%$query%")->get();
    }

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
            'book_status' => 'unavailable', // Buku sedang dipinjam
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
    // Find the record by ID
    $pinjamBuku = PinjamBuku::find($id);

    // Update the fields
    $pinjamBuku->tanggal_pinjam = $request->tanggal_pinjam; // Make sure this matches your input names
    $pinjamBuku->tanggal_kembali = $request->tanggal_kembali;

    // Save the updated record
    $pinjamBuku->save();

    // Redirect or return a response
    return redirect()->route('books.history')->with('success', 'Tanggal peminjaman diperpanjang!');
}


    /*
    *   Ubah status buku dan pinjamBuku
    */
    public function status(string $status, string $id, string $book_id)
    {
        $route = Auth::user()->role == 'admin' ? 'books.history' : 'anggota.history'; // Jika pengguna admin, kirim ke books.history, Jika pengguna anggota, kirim ke anggota.history
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

        return redirect()->route($route)->with('success','Buku telah dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pinjamBuku = PinjamBuku::findOrFail($id);
        $pinjamBuku->delete();

        return redirect()->route('books.history')->with('Berhasil menghapus riwayat');
    }
}
