<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto justify-left px-8 py-6 max-w-screen-xl">
            <h1 class="text-3xl font-bold text-center mb-8 dark:text-white">Buku Yang Anda Pinjam</h1>
            <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto items-center">
                @foreach($pinjamBukus as $pinjam)
                    @csrf
                    @method("PATCH")
                    <button data-modal-target="{{ $pinjam->book->id }}-modal" data-modal-toggle="{{ $pinjam->book->id }}-modal" type="button" class=" text-left block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition duration-100">
                        <img class="h-28 object-cover mx-auto" src="{{ asset('storage/'.$pinjam->book->foto) }}" alt="{{ $pinjam->book->judul_buku.' Cover' }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize truncate">{{ $pinjam->book->judul_buku }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400 capitalize truncate">Penulis: {{ $pinjam->book->penulis }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Kategori: {{ $pinjam->book->kategori }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Tahun Terbit: {{ $pinjam->book->tahun_terbit }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah Stok: <span class="font-bold underline">{{ $pinjam->book->jumlah_stok }}</span></p>
                    </button>

                <!-- Main modal -->
                <div id="{{ $pinjam->book->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                        <h3 class="font-semibold ">
                                            {{ $pinjam->book->judul_buku }}
                                        </h3>
                                        <p class="font-bold">
                                            <span class="text-gray-100 rounded-full {{ $pinjam->book->status ? 'text-green-500' : 'text-red-500' }} capitalize">{!! $pinjam->book->status ? "Tersedia &#10003;" : 'Habis &#10060;' !!}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{ $pinjam->book->id }}-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                </div>
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Deskripsi</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $pinjam->book->deskripsi }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $pinjam->book->kategori }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tahun Terbit</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $pinjam->book->tahun_terbit }}</dd>

                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jumlah Stok</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $pinjam->book->jumlah_stok }}</dd>
                                </dl>
                                <div class="flex justify-between items-end">
                                    <form action="{{ route('anggota.status', ['status' => $pinjam->status, 'id' => $pinjam->id, 'book_id' => $pinjam->book->id]) }}" method="post">
                                        @csrf
                                        @method("PATCH")
                                        <button type="submit" class=" text-left max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition duration-100">
                                            Kembalikan
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
