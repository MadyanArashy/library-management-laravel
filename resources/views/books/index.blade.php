<!-- Halaman daftar-daftar buku -->
<x-app-layout>
    <x-table :route="'books.store'" :createModal="'books.partials.create'">
        <x-slot name="heading">
            Daftar Buku
        </x-slot>
        {{-- Slot untuk thead --}}
        <x-slot name="thead">
            <tr>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">No</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Foto Cover</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Judul Buku</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Penulis</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Kategori</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Tahun Terbit</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Jumlah Stok</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Status</th>
                <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Deskripsi</th>
                <th class="border-2 border-gray-300 dark:border-gray-500"></th>
            </tr>
        </x-slot>
        {{-- Slot untuk tbody --}}
        <x-slot name="tbody">
            @foreach ($books as $book)
                <tr class="
                @if ($loop->iteration % 2 == 0)
                    bg-gray-200 dark:bg-gray-700
                @endif
                ">
                    <td class="font-bold text-xl px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 py-1"><img class="w-40 max-h-40 object-cover" src="{{ 'storage/'.$book->foto }}" alt="{{ $book->judul_buku }}"></td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $book->judul_buku }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $book->penulis }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $book->kategori }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $book->tahun_terbit }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $book->jumlah_stok }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 first-letter:uppercase {{ $book->status ? 'text-green-500' : 'text-red-500' }}">{{ $book->book_status }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 w-56">
                        <span class="line-clamp-3">{{ $book->deskripsi }}</span>
                    </td>
                    <td class="pe-3 py-3 flex items-center justify-end">
                        <button id="{{ $book->id }}-dropdown-button" data-dropdown-toggle="{{ $book->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        <div id="{{ $book->id }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $book->judul_buku . $book->penulis }}-dropdown-button">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                </li>
                                <li>
                                    <a href="{{ route('books.edit', $book->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full">
                                        {{ __('Hapus') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            const maxSize = 4 * 1024 * 1024; // 2MB in bytes

            if (file && file.size > maxSize) {
                alert('File Foto Terlalu Berat. Tolong gunakan file dibawah 4MB.');
                input.value = ''; // Clear the file input
            }
        }
    </script>
</x-app-layout>
