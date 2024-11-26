<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto justify-left px-8 py-6 max-w-screen-xl">
            <h1 class="text-3xl font-bold text-center mb-8 dark:text-white">Daftar Buku Perpustakaan</h1>
            <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto items-center">
                @foreach($books as $book)
                <button data-modal-target="modal-{{ $book->id }}" data-modal-toggle="modal-{{ $book->id }}" type="button" class=" text-left block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition duration-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize truncate">{{ $book->judul_buku }}</h5>
                    <span class="font-normal text-gray-100 px-2 py-1 rounded-full {{ $book->status ? 'bg-green-500' : 'bg-red-500' }} capitalize">{{ $book->status ? 'Tersedia' : 'Habis' }}</span>
                    <p class="font-normal text-gray-700 dark:text-gray-400 capitalize truncate">Penulis: {{ $book->penulis }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Kategori: {{ $book->kategori }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Tahun Terbit: {{ $book->tahun_terbit }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah Stok: {{ $book->jumlah_stok }}</p>
                </button>

                <div id="modal-{{ $book->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Isi terlebih dahulu form peminjaman buku
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="modal-{{ $book->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="sm:col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anggota</label>
                                            <input type="text" name="name" id="name"
                                                class="cursor-default bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                value="{{ auth()->user()->name }}" readonly>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                            <input type="text" value="{{ $book->judul_buku }}" name="judul_buku" id="judul_buku"
                                                class="cursor-default bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                            <input type="text" name="penulis" value="{{ $book->penulis }}" id="penulis"
                                                class="cursor-default bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                            <input type="text" value="{{ $book->kategori }}" name="kategori" id="category"
                                                class="cursor-default bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                                            <input type="date" name="tanggal_pinjam"
                                                class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="tanggal_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Kembali</label>
                                            <input type="date" name="tanggal_kembali"
                                                class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Pinjam Buku
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
