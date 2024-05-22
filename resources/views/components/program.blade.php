<section id="program-section" class="mb-16 mt-8 pt-32 pb-12 px-16 flex flex-col gap-16">
    <div class="flex justify-center items-center">
        <h2 class="text-4xl font-bold dark:text-w-putih text-gray-900">Program Unggulan</h2>
    </div>
    <div class="grid-cols-3 gap-10 auto-cols-auto grid">
        @for ($i = 0; $i < 11; $i++)
            <x-card_program></x-card_program>
        @endfor
    </div>
</section>