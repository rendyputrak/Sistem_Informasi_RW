<section id="galeri-section">
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap px-16 mt-12">
        <button type="button"
            class="text-white border bg-w-primer border-w-primer focus:ring-4 focus:outline-none focus:ring-w-primer rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-w-primer dark:text-w-primer dark:hover:text-white dark:hover:bg-w-primer dark:bg-gray-900 dark:focus:ring-w-primer">Semua
            Foto</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-900 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Agustusan</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-900 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Idul
            Fitri</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-900 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Tahun
            Baru</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-900 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Tahlilan</button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-16">
        @for ($i = 0; $i < 12; $i++)
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('gif/image-dummy.svg') }}" alt="galeri">
            </div>
        @endfor
    </div>
</section>
