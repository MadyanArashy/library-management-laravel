<x-app-layout>
    <x-table :route="'users.store'" :createModal="'users.partials.create'">
        <x-slot name="heading">
            Tabel Pengguna
        </x-slot>
        <x-slot name="thead">
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">No.</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Nama</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Email</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Role</th>
        </x-slot>
        <x-slot name="tbody">
                @foreach ($users as $user)
                <tr class="
                @if ($loop->iteration % 2 == 0)
                    bg-gray-200 dark:bg-gray-700
                @endif
                ">
                    <td class="font-bold text-xl px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $loop->iteration}}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $user->name }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $user->email }}</td>
                    <td class="px-1 border-x-2 border-x-gray-300 dark:border-x-gray-500">{{ $user->role }}</td>
                </tr>
                @endforeach
        </x-slot>
    </x-table>
</x-app-layout>
