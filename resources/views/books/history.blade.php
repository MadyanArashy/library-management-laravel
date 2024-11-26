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
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $pinjam->tanggal_pinjam }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $pinjam->tanggal_kembali }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 text-white">
                        <form action="{{ route('anggota.update', $pinjam->status, $pinjam->id, $pinjam->book->id) }}" method="post">
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="{{ ($pinjam->status === 'borrowed' ? 'bg-yellow-500' : 'bg-green-500') }} px-2 py-1.5 rounded-3xl text-center inline-block">{{ $pinjam->status }}</button>
                        </form>
                    </td>
                </tr>

                @empty
                <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 col-span-6">Gak ketemu :p &quaternions;</td>
            @endforelse
        </x-slot>
    </x-table>
</x-app-layout>
