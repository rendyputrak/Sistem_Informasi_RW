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
document.addEventListener("DOMContentLoaded", function() {
    const galeriContainer = document.getElementById("galeri-container");
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const apiUrl = "http://127.0.0.1:8000/api/galeri";

    let currentPage = 1;
    const itemsPerPage = 9;
    let galleryData = [];

    async function fetchGalleryData() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();
            galleryData = data.data;
            renderGallery(currentPage);
        } catch (error) {
            console.error("Error fetching gallery data:", error);
        }
    }

    function renderGallery(page) {
        galeriContainer.innerHTML = "";
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedItems = galleryData.slice(start, end);

        paginatedItems.forEach(item => {
            const imgElement = document.createElement("img");
            imgElement.src = item.foto_url;
            imgElement.alt = item.deskripsi;
            imgElement.classList.add("gallery-image", "rounded-md", "mb-4", "cursor-pointer");
            imgElement.addEventListener("click", () => openGaleriModal(item));
            galeriContainer.appendChild(imgElement);
        });

        prevButton.disabled = page === 1;
        nextButton.disabled = end >= galleryData.length;
    }

    function openGaleriModal(item) {
        const modal = document.getElementById("galeriModal");
        const modalImage = document.getElementById("modalImageGaleri");
        const modalDescription = document.getElementById("modalDescriptionGaleri");

        modalImage.src = item.foto_url;
        modalDescription.textContent = item.deskripsi;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    window.closeGaleriModal = function() {
        const modal = document.getElementById("galeriModal");
        modal.classList.remove("flex");
        modal.classList.add("hidden");
    }

    prevButton.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            renderGallery(currentPage);
        }
    });

    nextButton.addEventListener("click", () => {
        if ((currentPage * itemsPerPage) < galleryData.length) {
            currentPage++;
            renderGallery(currentPage);
        }
    });

    fetchGalleryData();
});

</script>

<style>
    .gallery-image {
    width: 100%;
    height: 200px; 
    object-fit: cover;
}
</style>