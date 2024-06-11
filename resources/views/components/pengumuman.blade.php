<section class="-mt-48 mb-8 flex md:flex-row gap-x-16 w-screen justify-start items-center pl-16" id="pengumuman-section">
    <div>
        <h3 class="text-4xl mt-6 font-extrabold text-gray-900 dark:text-w-putih leading-[56px] sm:mb-6">Berita dan
            <span class="text-w-primer">Pengumuman</span>
        </h3>
    </div>
    <div class="flex gap-x-6 w-auto overflow-x-auto pr-8" id="pengumuman-cards-container"></div>
</section>

<div id="pengumumanModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg mx-auto">
        <div class="px-4 py-5 sm:px-6 relative">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modalTitle">Pengumuman</h3>
            <button type="button" class="absolute top-0 right-0 p-2" onclick="closeModalPengumuman()">
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <img id="modalImage" class="w-full h-auto object-contain rounded-md mb-4" src="" alt="Pengumuman Foto">
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2" id="modalDate"></p>
            <p class="text-sm text-gray-700 dark:text-gray-300" id="modalContent"></p>
        </div>
        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-w-primer text-base font-medium text-white hover:bg-w-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-w-focus sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModalPengumuman()">Tutup</button>
        </div>
    </div>
</div>


<script>
    fetch('http://127.0.0.1:8000/api/pengumuman')
        .then(response => response.json())
        .then(result => {
            const data = result.data;
            const pengumumanContainer = document.getElementById('pengumuman-cards-container');
            let cardsHTML = '';

            data.forEach((pengumuman, index) => {
                cardsHTML += `
                    <div class="min-w-80 p-6 h-[376px] bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700 font-primer box-border overflow-hidden">
                        <a href="#">
                            <h5 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-4">${pengumuman.judul}</h5>
                        </a>
                        <p class="font-normal text-base text-gray-700 dark:text-gray-400 mb-7" style="word-break: break-word; overflow-wrap: break-word;">
                            ${pengumuman.isi.length > 272 ? pengumuman.isi.substring(0, 272) + '...' : pengumuman.isi}
                        </p>
                        <button onclick="showModalPengumuman(${index})"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-w-primer rounded-lg hover:bg-w-hover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-w-primer dark:hover:bg-w-hover dark:focus:ring-w-focus">
                            Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                `;
            });

            pengumumanContainer.innerHTML = cardsHTML;
            window.pengumumanData = data;
        })
        .catch(error => console.error('Error:', error));

    function showModalPengumuman(index) {
    const pengumuman = window.pengumumanData[index];
    const modalImage = document.getElementById('modalImage');
    const modalContent = document.getElementById('modalContent');
    const modal = document.getElementById('pengumumanModal');

    // Memasukkan konten pengumuman
    document.getElementById('modalTitle').innerText = pengumuman.judul;
    modalContent.innerText = pengumuman.isi;
    document.getElementById('modalDate').innerText = `Tanggal Posting: ${pengumuman.tanggal_posting}`;
    modalImage.src = pengumuman.foto_url;

    // Menampilkan modal
    modal.classList.remove('hidden');
}

    function closeModalPengumuman() {
        document.getElementById('pengumumanModal').classList.add('hidden');
    }
</script>

<style>
    #modalImage {
    max-height: 300px; /* Sesuaikan tinggi maksimum dengan kebutuhanmu */
    object-fit: contain; /* Gambar akan menyesuaikan diri ke dalam kotak tanpa memotong atau merubah aspek rasionya */
}
</style>