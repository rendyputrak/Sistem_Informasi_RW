<section id="galeri-section">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Galeri</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-16" id="galeri-container"></div>
    <div class="flex justify-center mt-4">
        <button id="prev-button" class="px-4 py-2 bg-w-primer text-white font-semibold rounded-lg hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus mr-2">Sebelumnya</button>
        <button id="next-button" class="px-4 py-2 bg-w-primer text-white font-semibold rounded-lg hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus">Selanjutnya</button>
    </div>
</section>

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
        galeriData.forEach(item => {
            const galeriItem = document.createElement('div');
            galeriItem.innerHTML = `
                <img class="h-auto max-w-full rounded-lg" src="${item.foto}" alt="${item.judul}">
            `;
            galeriContainer.appendChild(galeriItem);
        });
    }

    async function loadGaleriPage(page) {
        const galeriData = await fetchGaleriData(page);
        if (galeriData.length > 0) {
            renderGaleri(galeriData);
            currentPage = page;
        }
        toggleButtons();
    }

    function toggleButtons() {
        document.getElementById('prev-button').disabled = currentPage === 1;
        document.getElementById('next-button').disabled = currentPage === 1 && currentPage === 1;
    }

    document.getElementById('next-button').addEventListener('click', async () => {
        await loadGaleriPage(currentPage + 1);
    });

    document.getElementById('prev-button').addEventListener('click', async () => {
        if (currentPage > 1) {
            await loadGaleriPage(currentPage - 1);
        }
    });

    // Initial load
    (async function() {
        await loadGaleriPage(currentPage);
    })();
</script>

