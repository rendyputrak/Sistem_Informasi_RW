<section class="bg-[#f1f5f9] dark:bg-gray-900 h-[calc(100vh-96px+48px)] content-section" id="hero-section">
    @if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
    @endif
    <div class=" mx-auto max-w-screen-xl text-center lg:py-12 lg:px-12">
        <a class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-[#e2e8f0] rounded-full dark:bg-gray-800 dark:text-w-putih hover:bg-gray-200 dark:hover:bg-gray-700"
            role="alert">
            <span class="text-xs bg-w-primer rounded-full text-w-putih px-4 py-1.5 mr-3">Terdekat</span> <span
                class="text-sm font-medium">SIRW RW 03 Bunulrejo akan segera rilis, lo!</span>
        </a>
        <h1
            class="mb-6 text-4xl tracking-tight leading-normal font-black text-gray-900 md:text-5xl lg:text-6xl dark:text-w-putih">
            RW 03, Kel. Bunulrejo,<br class="md:mb-4 sm:mb-1">Kec. Blimbing, Kota Malang</h1>
        <p class="mb-10 md:px-40 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Di sini, kami mengutamakan kebersamaan dan gotong royong untuk menciptakan lingkungan yang aman, nyaman, dan
            sejahtera bagi semua warga.</p>
        <div class="flex flex-col mb-8 lg:mb-12 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="#tentang-section"
                class="inline-flex justify-center scroll-button items-center py-3 px-5 text-base font-semibold text-center text-w-putih rounded-lg bg-w-primer hover:bg-w-hover">
                Cari Tahu
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="ml-2 -mr-1 w-5 h-5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 3C12.5523 3 13 3.44772 13 4V17.5858L18.2929 12.2929C18.6834 11.9024 19.3166 11.9024 19.7071 12.2929C20.0976 12.6834 20.0976 13.3166 19.7071 13.7071L12.7071 20.7071C12.3166 21.0976 11.6834 21.0976 11.2929 20.7071L4.29289 13.7071C3.90237 13.3166 3.90237 12.6834 4.29289 12.2929C4.68342 11.9024 5.31658 11.9024 5.70711 12.2929L11 17.5858V4C11 3.44772 11.4477 3 12 3Z"
                        fill="#f8fafc" />
                </svg>
            </a>
        </div>
    </div>
</section>
