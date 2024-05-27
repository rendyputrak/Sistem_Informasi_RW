<section class="-mt-48 mb-8 flex md:flex-row gap-x-16 w-screen justify-start items-center pl-16" id="pengumuman-section">
    <div>
        <h3 class="text-4xl mt-6 font-extrabold text-gray-900 dark:text-w-putih leading-[56px] sm:mb-6">Berita dan
            <span class="text-w-primer">Pengumuman</span>
        </h3>
    </div>
    <div class="flex gap-x-6 w-auto overflow-x-auto pr-8" id="pengumuman-cards-container">
        
    </div>
</section>

<script>
    fetch('http://127.0.0.1:8000/api/pengumuman')
        .then(response => response.json())
        .then(result => {
            const data = result.data;
            const pengumumanContainer = document.getElementById('pengumuman-cards-container');
            let cardsHTML = '';

            data.forEach(pengumuman => {
                cardsHTML += `
                    <div class="min-w-80 p-6 h-[376px] bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700 font-primer box-border overflow-hidden">
                        <a href="#">
                            <h5 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-4">${pengumuman.judul}</h5>
                        </a>
                        <p class="font-normal text-base text-gray-700 dark:text-gray-400 mb-7">
                            ${pengumuman.isi.length > 272 ? pengumuman.isi.substring(0, 272) + '...' : pengumuman.isi}
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-w-primer rounded-lg hover:bg-w-hover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-w-primer dark:hover:bg-w-hover dark:focus:ring-w-focus">
                            Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                `;
            });

            pengumumanContainer.innerHTML = cardsHTML;
        })
        .catch(error => console.error('Error:', error));
</script>
