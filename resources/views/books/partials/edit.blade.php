<x-app-layout>
    <div class="pb-12"></div>
    <section class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 max-w-screen-lg mx-auto">
        <h1 class=""></h1>
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Edit Buku {{__($book->judul_buku)}} (ID: {{ __($book->id) }})
            </h3>
        </div>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul buku" value="{{ $book->judul_buku }}" required="">
                </div>
                <div>
                    <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Penulis buku" value="{{ $book->penulis }}" required="">
                </div>
                <div>
                    <label for="jumlah_stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Stok</label>
                    <input type="number" name="jumlah_stok" id="jumlah_stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" value="{{ $book->jumlah_stok }}" required="">
                </div>
                <div>
                    <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                    <input type="number" min="1800" max="2024" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1800 - 2024" value="{{ $book->tahun_terbit }}" required="">
                </div>
                <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select name="kategori" id="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>-- {{ __('Pilih Kategori') }} --</option>
                        <option value="Novel" {{ $book->kategori === "Novel" ? 'selected=""' : '' }}>
                            Novel
                        </option>
                        <option value="Fiksi" {{ $book->kategori === "Fiksi" ? 'selected=""' : '' }}>
                            Fiksi
                        </option>
                        <option value="Pendidikan" {{ $book->kategori === "Pendidikan" ? 'selected=""' : '' }}>
                            Pendidikan
                        </option>
                        <option value="Sejarah" {{ $book->kategori === "Sejarah" ? 'selected=""' : '' }}>
                            Sejarah</option>
                        <option value="Biografi" {{ $book->kategori === "Biografi" ? 'selected=""' : '' }}>
                            Biografi</option>
                    </select>
                </div>
                <div>
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi buku" value="{{ $book->deskripsi }}" required="">
                </div>
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tersedia</label>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="" disabled>-- {{ __('Kesediaan Buku') }} --</option>
                        <option value="0" {{ $book->tersedia ? 'selected=""' : '' }}>Tidak tersedia</option>
                        <option value="1" {{ $book->tersedia == false ? 'selected=""' : '' }}>Tersedia</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Tambahkan Buku
            </button>
        </form>
    </section>
</x-app-layout>
