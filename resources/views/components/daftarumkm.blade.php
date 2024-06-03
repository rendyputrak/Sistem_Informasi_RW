<section id="umkm-section" class="mb-16 mt-8 pt-32 pb-12 px-16 flex flex-col gap-16 content-section">
    <div class="flex justify-center items-center">
        <h2 class="text-4xl font-bold dark:text-w-putih text-gray-900">Daftar UMKM</h2>
    </div>
    <div class="grid-cols-3 gap-10 auto-cols-auto grid" id="umkm-container">
        {{-- @for ($i = 1; $i <= 9; $i++)
            <x-card_umkm :umkm="$i"></x-card_umkm>
        @endfor --}}
    </div>
</section>

<script>
    fetch('http://127.0.0.1:8000/api/umkm')
        .then(response => response.json())
        .then(result => {
            const data = result.data;
            const umkmContainer = document.getElementById('umkm-container');
            let cardsHTML = '';

            data.forEach(umkm => {
                cardsHTML += `
                <a href="#"
                class="block max-w-[352px] rounded-lg p-4 shadow-sm dark:border-gray-700 bg-white border dark:bg-gray-800 border-gray-200">
                <img alt=""
                src="${umkm.foto}"
                class="h-48 w-full rounded-md object-cover" />
                <div class="mt-2">
                    <dl>
                        <div>
                            <dd class="font-bold mt-1 text-gray-500 dark:text-gray-400">${umkm.nama_umkm}</dd>
                        </div>
                    </dl>

                <div class="mt-6 flex items-center gap-8 text-xs">
                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                        <svg class="size-4 text-w-primer" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>

                        <div class="mt-1.5 sm:mt-0">
                            <p class="text-gray-500">Alamat</p>

                            <p class="font-medium">${umkm.alamat}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

                `;
            });

            umkmContainer.innerHTML = cardsHTML;
        })
        .catch(error => console.error('Error:', error));
</script>
