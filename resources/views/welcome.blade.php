<x-app-layout>

<section class="flex flex-col mx-auto justify-center items-center mt-12 py-6 max-w-screen-lg text-center">
    <div class="mx-auto max-w-screen-sm px-12 py-6">
        <img class="w-full hidden sm:block" src="{{ asset('images/library.png') }}" alt="">
    </div>
    <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-200">
        Selamat Datang di Perpustakaan SMK Pesat IT XPro
    </h1>
    <p class="text-normal font-normal text-gray-700 dark:text-gray-400">
        Selamat datang di Perpustakaan SMK Pesat ITXPro, sumber inspirasi dan pengetahuan tanpa batas!
        Temukan berbagai koleksi buku, e-book, dan referensi digital terbaru yang mendukung perjalanan belajar dan karier Anda di dunia pelajaran.
        Mari menjelajahi dunia literasi bersama, untuk masa depan yang lebih cerdas dan inovatif!
    </p>
    <a href="{{ route('login') }}" class="text-center font-bold bg-primary-500 hover:bg-primary-700 transition duration-200 text-white px-4 py-2 mt-4 rounded-md">
        Eksplor!
    </a>
</section>
</x-app-layout>
