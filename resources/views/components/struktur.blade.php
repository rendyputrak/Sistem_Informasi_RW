<section class="bg-white dark:bg-gray-900 py-16 px-16 my-12 content-section" id="struktur-section">
    <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Struktur Kepengurusan
            </h2>
        </div>
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
            @for ($i = 1; $i <= 4; $i++)
                <x-card_struktur :nama="$i"></x-card_struktur>
            @endfor
        </div>
    </div>
</section>
