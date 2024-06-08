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
            <div class="relative inline-block text-left">
                <button type="button" id="dropdownButton"
                    class="text-[#f8fafc] bg-w-primer hover:bg-w-hover focus:outline-none font-semibold rounded-lg text-sm px-4 py-2 text-center dark:bg-w-primer dark:hover:bg-w-hover transition duration-150 ease-in-out">
                    Login
                    <svg class="ml-2 w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownMenu"
                    class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-20">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                        <button onclick="window.location.href='/admin'"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-left transition duration-150 ease-in-out">
                            <svg fill="#000000" height="16px" width="16px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 368.373 368.373" xml:space="preserve"
                                style="margin-right: 8px;"><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_107_"> <path id="XMLID_108_" d="M368.373,241.936c0-57.897-47.102-105-105-105c-34.485,0-65.14,16.713-84.293,42.463 c-7.653-1.61-15.582-2.463-23.707-2.463c-8.643,0-17.064,0.965-25.165,2.781c-38.121,8.543-69.149,36.066-82.606,72.092 c-4.669,12.5-7.229,26.02-7.229,40.127c0,8.284,6.716,15,15,15h125.596c19.246,24.348,49.03,40,82.404,40 C321.271,346.936,368.373,299.834,368.373,241.936z M188.373,241.936c0-20.01,7.892-38.199,20.708-51.662 c13.67-14.359,32.946-23.338,54.292-23.338c41.355,0,75,33.645,75,75s-33.645,75-75,75c-13.592,0-26.339-3.652-37.344-10 C203.549,293.97,188.373,269.7,188.373,241.936z"></path> <path id="XMLID_138_" d="M32.622,84.187c0,23.666,18.367,43.109,41.594,44.857c-7.382-13.302-11.594-28.596-11.594-44.857 s4.212-31.556,11.594-44.857C50.989,41.077,32.622,60.521,32.622,84.187z"></path> <path id="XMLID_169_" d="M15,251.809h1.025c11.601-40.229,40.192-73.322,77.464-90.984c-5.17-1.077-10.482-1.639-15.867-1.639 C34.821,159.186,0,194.008,0,236.809C0,245.094,6.716,251.809,15,251.809z"></path> <path id="XMLID_197_" d="M218.123,84.187c0-34.601-28.149-62.75-62.75-62.75c-21.093,0-39.774,10.473-51.157,26.479 c-7.289,10.25-11.594,22.764-11.594,36.271s4.305,26.021,11.594,36.271c11.383,16.006,30.065,26.478,51.157,26.478 C189.974,146.936,218.123,118.787,218.123,84.187z"></path> <path id="XMLID_221_" d="M293.373,256.936c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15h-43.2h-16.8c-8.284,0-15,6.716-15,15 c0,8.284,6.716,15,15,15h31.546H293.373z"></path> </g> </g></svg>
                            Admin
                        </button>
                        <button onclick="window.location.href='/user'"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-left transition duration-150 ease-in-out">
                            <svg fill="#000000" height="16px" width="16px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 368.373 368.373" xml:space="preserve"
                                style="margin-right: 8px; margin-bottom: 0px;"><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_470_"> <path id="XMLID_472_" d="M79.999,62.75c0,34.601,28.149,62.75,62.751,62.75s62.751-28.149,62.751-62.75S177.352,0,142.75,0 S79.999,28.149,79.999,62.75z"></path> <path id="XMLID_473_" d="M42.75,285.5h200c8.284,0,15-6.716,15-15c0-63.411-51.589-115-115-115s-115,51.589-115,115 C27.75,278.784,34.466,285.5,42.75,285.5z"></path> </g> </g></svg>
                            Warga
                        </button>
                    </div>
                </div>
            </div>
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
                <li class="px-4 py-2 rounded-md">
                    <a href="#galeri-section"
                        class="block py-3 px-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-w-hover md:p-0 md:dark:hover:text-w-hover dark:text-w-putih dark:hover:bg-gray-700 dark:hover:text-w-putih md:dark:hover:bg-transparent dark:border-gray-700 navbar-menu-item">Galeri</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function () {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Optional: Close the dropdown when clicking outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#dropdownButton')) {
            var dropdownMenu = document.getElementById('dropdownMenu');
            if (!dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
            }
        }
    }
</script>

