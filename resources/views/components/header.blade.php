{{-- <nav
    class="dark:bg-gray-900 bg-[#f8fafc] sticky md:h-24 sm:h-20 w-full z-50 top-0 start-0 border-b-[1.6px] border-gray-200 dark:border-gray-600 sm:px-8 md:px-16 py-6">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="#" id="logo" class="flex items-center space-x-2 rtl:space-x-reverse navbar-menu-item">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo RW 03">
            <span class="self-center text-w-primer text-lg sm:text-base font-bold whitespace-nowrap dark:text-w-putih">RW
                03
                Bunulrejo</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-4">
            <button id="theme-toggle" type="button"
                class="text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="/admin">
                <button type="button"
                    class="text-[#f8fafc] bg-w-primer hover:bg-w-hover focus:outline-none font-semibold rounded-lg text-sm px-4 py-2 text-center dark:bg-w-primer dark:hover:bg-w-hover">Masuk
                    Akun</button>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Buka Menu Utama</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-semibold border-gray-100 rounded-lg bg-[#f8fafc] md:gap-2 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="dark:bg-gray-800 bg-[#e2e8f0] px-4 py-2 rounded-md">
                    <a href="#tentang-section"
                        class="block text-w-primer bg-blue-700 rounded md:bg-transparent md:p-0 navbar-menu-item"
                        aria-current="page">Tentang</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#program-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Program</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#umkm-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">UMKM</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#agenda-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Agenda</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#struktur-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Struktur</a>
                </li>
            </ul>

        </div>
    </div>
</nav> --}}

<nav
    class="dark:bg-gray-900 bg-[#f8fafc] sticky md:h-24 sm:h-20 w-full z-50 top-0 start-0 border-b-[1.6px] border-gray-200 dark:border-gray-600 sm:px-8 md:px-16 py-6">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="#" id="logo" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo RW 03">
            <span class="self-center text-w-primer text-lg sm:text-base font-bold whitespace-nowrap dark:text-w-putih">RW
                03 Bunulrejo</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-4">
            <button id="theme-toggle" type="button"
                class="text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="/admin">
                <button type="button"
                    class="text-[#f8fafc] bg-w-primer hover:bg-w-hover focus:outline-none font-semibold rounded-lg text-sm px-4 py-2 text-center dark:bg-w-primer dark:hover:bg-w-hover">Masuk
                    Akun</button>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Buka Menu Utama</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-semibold border-gray-100 rounded-lg bg-[#f8fafc] md:gap-2 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="px-4 py-2 rounded-md">
                    <a href="#tentang-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Tentang</a>
                </li>
                {{-- <li class="px-4 py-2 rounded-md">
                    <a href="#program-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Program</a>
                </li> --}}
                <li class="px-4 py-2 rounded-md">
                    <a href="#umkm-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">UMKM</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#agenda-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Agenda</a>
                </li>
                <li class="px-4 py-2 rounded-md">
                    <a href="#struktur-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Struktur</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
