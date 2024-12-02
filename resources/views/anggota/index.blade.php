<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto justify-left px-8 py-6 max-w-screen-xl">
            <h1 class="text-3xl font-bold text-center mb-8 dark:text-white">Daftar Buku Perpustakaan</h1>
            <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto items-center">
                @foreach($books as $book)
                <button data-modal-target="{{ $book->id }}-modal" data-modal-toggle="{{ $book->id }}-modal" type="button" class=" text-left block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition duration-100">
                    <img class="h-28 object-cover mx-auto" src="{{ asset('storage/'.$book->foto) }}" alt="{{ $book->judul_buku.' Cover' }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize truncate">{{ $book->judul_buku }}</h5>
                    <span class="font-normal text-gray-100 px-2 py-1 rounded-full {{ $book->status ? 'bg-green-500' : 'bg-red-500' }} capitalize">{{ $book->book_status }}</span>
                    <p class="font-normal text-gray-700 dark:text-gray-400 capitalize truncate">Penulis: {{ $book->penulis }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Kategori: {{ $book->kategori }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Tahun Terbit: {{ $book->tahun_terbit }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah Stok: <span class="font-bold underline">{{ $book->jumlah_stok }}</span></p>
                </button>

                <!-- Main modal -->
                <div id="{{ $book->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                        <h3 class="font-semibold ">
                                            {{ $book->judul_buku }}
                                        </h3>
                                        <p class="font-bold">
                                            <span class="text-gray-100 rounded-full {{ $book->status ? 'text-green-500' : 'text-red-500' }} capitalize">{!! $book->status ? "Tersedia &#10003;" : 'Habis &#10060;' !!}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{ $book->id }}-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                </div>
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Deskripsi</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $book->deskripsi }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $book->kategori }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tahun Terbit</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $book->tahun_terbit }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jumlah Stok</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $book->jumlah_stok }}</dd>
                                </dl>
                                <div class="flex justify-between items-end">
                                    @if($book->status)
                                        <form class="flex flex-col sm:flex-row justify-between sm:items-end w-full" action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <div class="flex gap-4">
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
                                            <button type="submit" class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-900">
                                                <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                Pinjam
                                            </button>
                                        </form>
                                        @else
                                        <p class="text-center dark:text-white">
                                            Buku ini tidak tersedia!
                                        </p>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
