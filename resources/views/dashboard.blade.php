<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="lg:flex-col justify-left px-8 py-6 max-w-screen-xl mx-auto">
            <div class="px-12 py-8 lg:flex lg:lg:flex-1 gap-7 items-center rounded-xl bg-gray-50 dark:bg-gray-950 shadow-lg shadow-gray-300 dark:shadow-gray-900">
                <img src="images/library.png" alt="Logo" class='w-full max-w-sm'/>
                <div class="flex flex-col max-w-screen-lg">
                    <h1 class='text-3xl font-bold dark:text-white'>Selamat pagi, {{ Auth::user()->name }}</h1>
                    <h3 class='text-gray-700 dark:text-gray-300 mb-3'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis nam dolor praesentium dicta velit ipsum culpa cumque molestias illum odio, voluptas provident error quod debitis rem aut, ducimus vitae veniam? Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    <div class="flex gap-16 mt-3">
                        <a href={{ route('profile.destroy') }} class='px-4 py-2 bg-gray-200 dark:text-black rounded-md lg:rounded-full text-nowrap'>Baca Buku</a>
                        <a href={{ route('profile.destroy') }} class='px-4 py-2 bg-[#A78E51] text-white rounded-md lg:rounded-full text-nowrap'>Pinjam Buku</a>
                    </div>
                </div>
            </div>
            <div class='mt-8 flex items-center justify-between'>
                <div>
                    <h2 class='text-2xl font-extrabold dark:text-white'>Info Dashboard Buku</h2>
                    <p class="text-gray-700 dark:text-gray-300">Dashboard informasi buku total buku dipinjam, buku dikembalikan, buku rusak.</p>
                </div>
                <button class='bg-gray-300 rounded-lg px-3 py-2 inline-block max-w-xs mx-auto lg:mx-0 h-1/2 hover:opacity-80 transition'>
                    Kelola
                </button>
            </div>

            <div class="mt-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <div class="card flex-col justify-between items-center inline-block bg-[#6E987C] px-6 py-3 text-white w-56 h-56 rounded-xl">
                    <div class="flex flex-row items-center justify-between mb-16 w-full">
                        <span class="w-24 h-24 text-white">
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                <path fill="white" d="m18,12c-3.314,0-6,2.686-6,6s2.686,6,6,6,6-2.686,6-6-2.686-6-6-6Zm4,7h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2Zm-20-1c-.738-.001-1.451.271-2,.765V3C0,1.343,1.343,0,3,0h1v18h-2Zm8,0h-4V0h12c1.105,0,2,.895,2,2v8.252c-.639-.165-1.309-.252-2-.252-4.418,0-8,3.582-8,8Zm2.709,6H2c-1.105,0-2-.895-2-2s.895-2,2-2h8.252c.405,1.573,1.276,2.958,2.457,4Z"/>
                            </svg>
                        </span>
                        <span class="text-6xl">
                            {{ $pinjamCount }}
                        </span>
                    </div>
                    <p class="text-center">Buku Dipinjam</p>
                </div>

                <div class="card flex-col justify-between items-center inline-block bg-[#22615D] px-6 py-3 text-white w-56 h-56 rounded-xl">
                    <div class="flex flex-row items-center justify-between mb-16 w-full">
                        <span class="w-24 h-24 text-white">
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                <path fill="white" d="m4,20h18v4H4c-1.105,0-2-.895-2-2s.895-2,2-2ZM14,7c-.483,0-1,.263-1,1h-2c0-.737-.517-1-1-1-.551,0-1,.546-1,1.218,0,1.085,1.604,2.77,3,3.868,1.396-1.099,3-2.783,3-3.868,0-.672-.449-1.218-1-1.218Zm8-5v16H4c-.738-.001-1.451.271-2,.765V3c0-1.657,1.343-3,3-3h15c1.105,0,2,.895,2,2Zm-5,6.218c0-1.774-1.346-3.218-3-3.218-.782,0-1.477.27-2,.727-.523-.457-1.218-.727-2-.727-1.654,0-3,1.444-3,3.218,0,2.765,3.975,5.619,4.428,5.935l.572.399.572-.399c.453-.316,4.428-3.17,4.428-5.935Z"/>
                            </svg>
                        </span>
                        <span class="text-6xl">
                            {{ $pinjamCount }}
                        </span>
                    </div>
                    <p class="text-center">Sedang Dipinjam</p>
                </div>

                <div class="card flex-col justify-between items-center inline-block bg-[#FBC78F] px-6 py-3 text-white w-56 h-56 rounded-xl">
                    <div class="flex flex-row items-center justify-between mb-16 w-full">
                        <span class="w-24 h-24 text-white">
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                                <path fill="white" d="m10.252,16h-4.252V0h9c2.761,0,5,2.239,5,5v5.252c-.639-.164-1.309-.252-2-.252-3.728,0-6.86,2.55-7.748,6Zm-7.857.061c-.87.104-1.696.437-2.395.964V5C0,2.624,1.672.575,4,.1v15.9h-1c-.203,0-.406.02-.605.061Zm10.314,7.939H3c-1.657,0-3-1.343-3-3s1.343-3,3-3h7c0,2.39,1.048,4.534,2.709,6Zm-.709-6c0,3.314,2.686,6,6,6,3.314,0,6-2.686,6-6s-2.686-6-6-6-6,2.686-6,6Zm7.242-2.998l1.5,1.5c.168.168.257.393.257.621,0,.113-.021.227-.067.336-.136.328-.456.541-.812.541h-1.121v3c0,.552-.447,1-1,1s-1-.448-1-1v-3h-1.121c-.355,0-.676-.213-.812-.541-.138-.329-.062-.706.19-.957l1.5-1.5c.685-.685,1.8-.685,2.485,0Z"/>
                            </svg>
                        </span>
                        <span class="text-6xl">
                            58
                        </span>
                    </div>
                    <p class="text-center">Buku Dikembalikan</p>
                </div>

                <div class="card flex-col justify-between items-center inline-block bg-[#AC455E] px-6 py-3 text-white w-56 h-56 rounded-xl">
                    <div class="flex flex-row items-center justify-between mb-16 w-full">
                        <span class="w-24 h-24 text-white">
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                                <path fill="white" d="m4,20h18v4H4c-1.105,0-2-.895-2-2s.895-2,2-2Zm5-10h2v-2h-2v2Zm4,0h2v-2h-2v2ZM22,2v16H4c-.738-.001-1.451.271-2,.765V3c0-1.657,1.343-3,3-3h1s0,0,0,0h14c1.105,0,2,.895,2,2Zm-5.556,6.444c0-2.451-1.993-4.444-4.444-4.444s-4.444,1.994-4.444,4.444l-.056,3.556h2.5v2h4v-2h2.389s.056-2.256.056-3.556Z"/>
                            </svg>
                        </span>
                        <span class="text-6xl">
                            16
                        </span>
                    </div>
                    <p class="text-center">Buku Rusak</p>
                </div>
            </div>
      </div>
    </section>
</x-app-layout>
