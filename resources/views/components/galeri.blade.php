<section id="galeri-section">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Galeri</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-16" id="galeri-container" style="display: grid; gap: 1rem;"></div>
    <div class="flex justify-center mt-4">
        <button id="prev-button" class="px-4 py-2 bg-w-primer text-white font-semibold rounded-lg hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus mr-2">Sebelumnya</button>
        <button id="next-button" class="px-4 py-2 bg-w-primer text-white font-semibold rounded-lg hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus">Selanjutnya</button>
    </div>
</section>

<div id="galeriModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg mx-auto max-h-full overflow-y-auto">
        <div class="px-4 py-5 sm:px-6 relative">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modalTitleGaleri">Galeri</h3>
            <button type="button" class="absolute top-0 right-0 p-2" onclick="closeGaleriModal()">
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <img id="modalImageGaleri" class="w-full h-auto object-cover rounded-md mb-4" src="" alt="Galeri Foto">
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2" id="modalDescriptionGaleri"></p>
        </div>
        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-w-primer text-base font-medium text-white hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus sm:ml-3 sm:w-auto sm:text-sm" onclick="closeGaleriModal()">Tutup</button>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    const itemsPerPage = 9;

    async function fetchGaleriData(page) {
        try {
            const response = await fetch(`http://127.0.0.1:8000/api/galeri?page=${page}&per_page=${itemsPerPage}`);
            const result = await response.json();
            return result.data;
        } catch (error) {
            console.error('Error fetching galeri data:', error);
            return [];
        }
    }

    function renderGaleri(galeriData) {
        const galeriContainer = document.getElementById('galeri-container');
        galeriContainer.innerHTML = '';
        galeriData.forEach((item, index) => {
            const galeriItem = document.createElement('div');
            galeriItem.style.position = 'relative';
            galeriItem.style.width = '100%';
            galeriItem.style.paddingTop = '75%';
            galeriItem.style.overflow = 'hidden';
            galeriItem.style.cursor = 'pointer';
            galeriItem.addEventListener('click', () => showGaleriModal(index));

            galeriItem.innerHTML = `
                <img class="h-auto w-full rounded-lg object-cover" src="${item.foto_url}" alt="${item.judul}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            `;
            galeriContainer.appendChild(galeriItem);
        });

        window.galeriData = galeriData;
    }

    async function loadGaleriPage(page) {
        const galeriData = await fetchGaleriData(page);
        if (galeriData.length > 0) {
            renderGaleri(galeriData);
            currentPage = page;
        }
        toggleButtons(galeriData.length);
    }

    function toggleButtons(dataLength) {
        document.getElementById('prev-button').disabled = currentPage === 1;
        document.getElementById('next-button').disabled = dataLength < itemsPerPage;
    }

    function showGaleriModal(index) {
        const galeri = window.galeriData[index];
        document.getElementById('modalTitleGaleri').innerText = galeri.judul;
        document.getElementById('modalImageGaleri').src = galeri.foto_url;
        document.getElementById('modalDescriptionGaleri').innerText = galeri.deskripsi;
        document.getElementById('galeriModal').classList.remove('hidden');
    }

    function closeGaleriModal() {
        document.getElementById('galeriModal').classList.add('hidden');
    }

    document.getElementById('next-button').addEventListener('click', async () => {
        await loadGaleriPage(currentPage + 1);
    });

    document.getElementById('prev-button').addEventListener('click', async () => {
        if (currentPage > 1) {
            await loadGaleriPage(currentPage - 1);
        }
    });

    (async function() {
        await loadGaleriPage(currentPage);
    })();
</script>
