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
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Waktu Tersisa</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Status</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($pinjamBukus as $pinjam)
                @php
                $deadline = now()->modify('+3 day') >= $pinjam->tanggal_kembali ? 'text-yellow-500' : 0;
                if(now() >= $pinjam->tanggal_kembali){$deadline = 'text-red-500';}
                @endphp
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
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 {{ $deadline }}">{{ date('d M Y', strtotime($pinjam->tanggal_kembali)) }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 truncate {{ $deadline }}">
                    @php
                        $fdate = now();
                        $tdate = $pinjam->tanggal_kembali;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                        $hours = $interval->h;
                    @endphp
                    @if ($days > 0 && $datetime1 <= $datetime2)
                        {{ $days }} days left
                    @elseif($datetime1 <= $datetime2)
                        {{ $hours }} hours left
                    @elseif($days > 0)
                        overdue by {{ $days }} days
                    @else
                        overdue by {{ $hours }} hours
                    @endif
                    </td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 text-white">
                        <p class="{{ ($pinjam->status === 'borrowed' ? 'bg-yellow-500' : 'bg-green-500') }} px-2 py-1.5 rounded-3xl text-center inline-block">{{ $pinjam->status }}</p>
                    </td>
                </tr>

                @empty
                <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500 col-span-6">Gak ketemu :p &quaternions;</td>
            @endforelse
        </x-slot>
    </x-table>
</x-app-layout>
