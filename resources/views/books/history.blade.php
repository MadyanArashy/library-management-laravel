<x-app-layout>
    <x-table>
        <x-slot name="heading">
            Riwayat Pinjaman
        </x-slot>
        <x-slot name="thead">
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">No</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Judul Buku</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Penulis</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Peminjam</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Tanggal Pinjam</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Tanggal Kembali</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Status</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500"></th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($pinjamBukus as $pinjam)
                <tr class="
                @if ($loop->iteration % 2 == 0)
                    bg-gray-200 dark:bg-gray-700
                @endif
                ">
                    <td class="font-bold text-xl px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $pinjam->book->judul_buku }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $pinjam->book->penulis }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $pinjam->user->name }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ date('d M Y', strtotime($pinjam->tanggal_pinjam)) }}</td>
                    @php
                    $deadline = now()->modify('+3 day') >= $pinjam->tanggal_kembali ? 'text-yellow-500' : '';
                    if(now() >= $pinjam->tanggal_kembali){$deadline = 'text-red-500';}
                    @endphp
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 {{ $deadline }}">{{ date('d M Y', strtotime($pinjam->tanggal_kembali)) }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 text-white">
                        {{-- <form action="{{ route('anggota.status', ['status' => $pinjam->status, 'id' => $pinjam->id, 'book_id' => $pinjam->book->id]) }}" method="post">
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="{{ ($pinjam->status === 'borrowed' ? 'bg-yellow-500' : 'bg-green-500') }} px-2 py-1.5 rounded-3xl text-center inline-block">{{ $pinjam->status }}</button>
                        </form> --}}
                        <p class="{{ ($pinjam->status === 'borrowed' ? 'bg-yellow-500' : 'bg-green-500') }} px-2 py-1.5 rounded-3xl text-center inline-block">{{ $pinjam->status }}</p>
                    </td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">
                        {{-- <form action="{{ route('anggota.status', ['status' => $pinjam->status, 'id' => $pinjam->id, 'book_id' => $pinjam->book->id]) }}" method="post">
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="{{ ($pinjam->status === 'borrowed' ? 'bg-yellow-500' : 'bg-green-500') }} px-2 py-1.5 rounded-3xl text-center inline-block">{{ $pinjam->status }}</button>
                        </form> --}}
                        <button id="{{ $pinjam->id }}-dropdown-button" data-dropdown-toggle="{{ $pinjam->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        <div id="{{ $pinjam->id }}-dropdown" class="hidden z-40 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $pinjam }}-dropdown-button">
                                <li>
                                    <form action="{{ route('anggota.status', ['status' => $pinjam->status, 'id' => $pinjam->id, 'book_id' => $pinjam->book->id]) }}" method="post">
                                        @csrf
                                        @method("PATCH")
                                        <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left">Kembalikan Buku</button>
                                    </form>
                                </li>
                                <li>
                                    <button data-modal-target="tanggal_kembali-{{ $pinjam->id }}-modal" data-modal-toggle="tanggal_kembali-{{ $pinjam->id }}-modal" class="fblock py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left" type="button">
                                        Perpanjang
                                    </button>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form action="{{ route('anggota.destroy', $pinjam->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full">
                                        {{ __('Hapus') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal untuk perpanjang pengembalian (column tanggal_kembali) -->
                        <div id="tanggal_kembali-{{ $pinjam->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-10 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop:blur">
                            <div class="relative p-4 w-full max-w-screen-sm mx-auto max-h-full bg-gray-200 dark:bg-gray-800 rounded-md">
                                <!-- Modal content -->
                                <form action="{{ route('anggota.update', $pinjam->id) }}" method="post" class="flex flex-col justify-between gap-4">
                                    @csrf
                                    @method('PATCH')
                                    <h3 class="text-xl text-black dark:text-white font-bold">
                                        Perpanjang Tanggal Peminjaman
                                    </h3>
                                    <div class="flex flex-col">
                                        <label for="tanggal_pinjam" class="mb-3 text-black dark:text-white">Tanggal peminjaman</label>
                                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="text-gray-950 dark:text-white dark:bg-gray-900" value="{{ $pinjam->tanggal_pinjam }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="tanggal_kembali" class="mb-3 text-black dark:text-white">Tanggal kembali</label>
                                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="text-gray-950 dark:text-white dark:bg-gray-900" value="{{ $pinjam->tanggal_kembali }}">
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Perpanjang/Perpendek Peminjaman Buku
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                @empty
                <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 col-span-6">Gak ketemu :p &quaternions;</td>
            @endforelse
        </x-slot>
    </x-table>
</x-app-layout>
