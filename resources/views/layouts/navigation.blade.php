
<button class="top-2 left-2 bg-gray-200 bg-opacity-40 hover:bg-opacity-80 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1.5 py-1.5 dark:white-700 focus:outline-none fixed z-10 transform transition-transform active:rotate-90" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
    <svg viewBox="0 0 100 80" width="40" height="40">
        <rect width="100" height="20" rx="8"></rect>
        <rect y="30" width="100" height="20" rx="8"></rect>
        <rect y="60" width="100" height="20" rx="8"></rect>
    </svg>
</button>

<!-- drawer component -->
<aside id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800 border-r-4 border-r-[rgba(220,220,255,0.25)]" tabindex="-1" aria-labelledby="drawer-navigation-label">
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="w-5/6 pr-4">
    <a href="{{ route('index') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
</div>
<div class="py-4 overflow-y-auto">
    <nav>
    <ul class="space-y-2 font-medium">
        <li> {{-- Home Button --}}
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>
                <span class="ms-3">{{ __('Dashboard') }}</span>
            </x-nav-link>
        </li>
        <li> {{-- Dropdown Lemari --}}
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-lemari" data-collapse-toggle="dropdown-lemari">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Lemari</span>
                <svg aria-hidden="true" class="w-6 h-6 text-gray-900 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-lemari" class="hidden py-2 space-y-2">
                <li>
                    <x-nav-link :href="route('books.create')" :active="request()->routeIs('books.create')" class="ms-6">
                        {{__('Tambah Buku')}}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')" class="ms-6">
                        {{__('Lemari Buku')}}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')" class="ms-6">Informasi</x-nav-link>
                </li>
            </ul>
        </li>
        <li> {{-- Dropdown User --}}
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-users" class="hidden py-2 space-y-2">
                <li>
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')" class="ms-6">
                        {{__('Admin')}}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="ms-6">
                        {{__('Anggota')}}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')" class="ms-6">
                        {{__('Informasi')}}
                    </x-nav-link>
                </li>
            </ul>
        </li>
        @if(Auth::check() && Auth::user()->is_admin) <li> {{-- Admin Button --}}
            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index' || 'admin.create')">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.index') ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z"/>
                </svg>
                <span class="ms-3">Halaman Admin</span>
            </x-nav-link>
        </li>
        @endif
        @auth
        <li class="flex flex-col"> {{-- Profile Button --}}
        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('profile.edit') ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
            </svg>
            <span class="ms-3">{{ (Auth::user()->name ?? false) ? Auth::user()->name : 'Masuk ke dalam akunmu!' }}</span>
        </x-nav-link>
        </li>
        @endauth
        <li>
            <div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="
            if (darkMode) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
            ">
            <x-secondary-button class="ms-3" @click="
            darkMode = !darkMode;
            localStorage.setItem('darkMode', darkMode);
            if (darkMode) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
            ">
            Dark Mode
        </x-secondary-button>
            </div>
        </li>
        <hr>
        @auth
        <li class="flex flex-col"> {{-- Logout Button --}}
            <form action="{{ route('logout') }}" method="POST">
            <x-danger-button>
                @csrf
                <svg class="flex-shrink-0 w-5 h-5 text-gray-950 transition duration-75 dark:text-gray-50 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('profile.edit') ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                </svg>
                <span class="ms-3">{{ __('Keluar') }}</span>
            </x-danger-button>
        </form>
        </li>
        @endauth
    </ul>
    </nav>
</div>
</aside>
