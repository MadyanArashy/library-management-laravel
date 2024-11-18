<x-app-layout>
    <x-table :route="'users.store'" :createModal="'users.partials.create'">
        <x-slot name="heading">
            Modal User
        </x-slot>
        <x-slot name="thead">
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">No.</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Nama</th>
            <th class="px-1 border-2 border-gray-300 dark:border-gray-500">Email</th>
        </x-slot>
        <x-slot name="tbody">
            <tr>
                @foreach ($users as $user)
                <tr>
                    <td class="px-1 border-2 border-gray-300 dark:border-gray-500">{{ $loop->iteration}}</td>
                    <td class="px-1 border-2 border-gray-300 dark:border-gray-500">{{ $user->name }}</td>
                    <td class="px-1 border-2 border-gray-300 dark:border-gray-500">{{ $user->email }}</td>
                </tr>
                @endforeach
            </tr>
        </x-slot>
    </x-table>
</x-app-layout>
