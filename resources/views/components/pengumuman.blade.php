<section class="-mt-48 mb-8 flex md:flex-row gap-x-16 w-screen justify-start items-center pl-16 sm:flex-col"
    id="pengumuman-section">
    <div>
        <h3 class="text-4xl mt-6 font-extrabold text-gray-900 dark:text-w-putih leading-[56px] sm:mb-6">Berita dan
            <span class="text-w-primer">Pengumuman</span>
        </h3>
    </div>
    <div class="flex gap-x-6 w-auto overflow-x-auto pr-8">
        @for ($i = 1; $i <= 6; $i++)
            <x-card_pengumuman :angka="$i"></x-card_pengumuman>
        @endfor
    </div>
</section>