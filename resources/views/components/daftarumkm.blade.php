<section id="umkm-section" class="mb-4 mt-8 pt-4 pb-12 px-16 flex flex-col gap-16 content-section">
    <div class="flex justify-center items-center">
        <h2 class="text-4xl font-bold dark:text-w-putih text-gray-900">Daftar UMKM</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10" id="umkm-container"></div>
    <div class="flex justify-center mt-8">
        <button type="button" class="px-4 py-2 bg-w-primer text-white font-semibold rounded-lg hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus" onclick="showAllUmkm()">Lihat Selengkapnya</button>
    </div>
</section>

<div id="umkmModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg mx-auto">
        <div class="px-4 py-5 sm:px-6 relative">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modalTitleUMKM">UMKM</h3>
            <button type="button" class="absolute top-0 right-0 p-2" onclick="closeModalUMKM()">
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <img id="modalImageUMKM" class="w-full h-64 object-cover rounded-md mb-4" src="" alt="UMKM Foto">
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2" id="modalAddress"></p>
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2" id="modalDescription"></p>
        </div>
        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-w-primer text-base font-medium text-white hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModalUMKM()">Tutup</button>
        </div>
    </div>
</div>

<div id="allUmkmModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-3xl mx-auto">
        <div class="px-4 py-5 sm:px-6 relative">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Seluruh UMKM</h3>
            <button type="button" class="absolute top-0 right-0 p-2" onclick="closeAllUmkmModal()">
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="overflow-y-auto max-h-96 px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="allUmkmContainer"></div>
        </div>
        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-w-primer text-base font-medium text-white hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus sm:ml-3 sm:w-auto sm:text-sm" onclick="closeAllUmkmModal()">Tutup</button>
        </div>
    </div>
</div>

<script>
    fetch('http://127.0.0.1:8000/api/umkm')
        .then(response => response.json())
        .then(result => {
            const data = result.data;
            const umkmContainer = document.getElementById('umkm-container');
            const allUmkmContainer = document.getElementById('allUmkmContainer');
            let cardsHTML = '';
            let allCardsHTML = '';

            data.forEach((umkm, index) => {
                const cardHTML = `
                    <div onclick="showModalUMKM(${index})"
                    class="cursor-pointer block rounded-lg p-4 shadow-sm dark:border-gray-700 bg-white border dark:bg-gray-800 border-gray-200">
                        <img alt="" src="${umkm.foto}" class="h-48 w-full rounded-md object-cover" />
                        <div class="mt-2">
                            <dl>
                                <div>
                                    <dd class="font-bold mt-1 text-gray-500 dark:text-gray-400">${umkm.nama_umkm}</dd>
                                </div>
                            </dl>
                            <div class="mt-6 flex items-center gap-8 text-xs">
                                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                    <svg class="size-4 text-w-primer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                    </svg>
                                    <div class="mt-1.5 sm:mt-0">
                                        <p class="text-gray-500">Alamat</p>
                                        <p class="font-medium">${umkm.alamat}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                if (index < 8) {
                    cardsHTML += cardHTML;
                }
                allCardsHTML += cardHTML;
            });

            umkmContainer.innerHTML = cardsHTML;
            allUmkmContainer.innerHTML = allCardsHTML;
            window.umkmData = data;
        })
        .catch(error => console.error('Error:', error));

    function showModalUMKM(index) {
        const umkm = window.umkmData[index];
        document.getElementById('modalTitleUMKM').innerText = umkm.nama_umkm;
        document.getElementById('modalImageUMKM').src = umkm.foto;
        document.getElementById('modalAddress').innerText = `Alamat: ${umkm.alamat}`;
        document.getElementById('modalDescription').innerText = umkm.deskripsi;
        document.getElementById('umkmModal').classList.remove('hidden');
    }

    function closeModalUMKM() {
        document.getElementById('umkmModal').classList.add('hidden');
    }

    function showAllUmkm() {
        document.getElementById('allUmkmModal').classList.remove('hidden');
    }

    function closeAllUmkmModal() {
        document.getElementById('allUmkmModal').classList.add('hidden');
    }
</script>
