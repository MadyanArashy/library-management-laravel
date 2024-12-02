<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Models\PinjamBuku;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/home', function () {
    $pinjamCount = count(PinjamBuku::all());
    $borrowedPinjamCount = count(PinjamBuku::where('status', 'borrowed')->get());
    $returnedPinjamCount = count(PinjamBuku::where('status', 'returned')->get());
    return view('dashboard', compact(var_name: ['pinjamCount', 'borrowedPinjamCount', 'returnedPinjamCount']));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('anggota/{status}/{id}/{book_id}', [AnggotaController::class,'status'])->name('anggota.status');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('history', [BookController::class,'history'])->name('books.history');

    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('anggota/history', [AnggotaController::class,'history'])->name('anggota.history');
    Route::get('anggota/borrowed', [AnggotaController::class,'borrowed'])->name('anggota.borrowed');
    Route::resource('anggota', AnggotaController::class)->only('index', 'store');
});
require __DIR__.'/auth.php';
