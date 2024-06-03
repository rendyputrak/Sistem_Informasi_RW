<section class="bg-white dark:bg-gray-900 mt-20 content-section" id="data-section">
    <div class="max-w-screen-xl px-4 pt-12 pb-2 mx-auto text-center lg:px-6">
        <dl class="grid max-w-screen-md gap-12 mx-auto text-gray-900 sm:grid-cols-2 dark:text-white">
            <div class="flex flex-col items-center justify-center">
                <dt id="jumlah-penduduk" class="mb-2 text-4xl md:text-4xl font-extrabold">0</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Penduduk</dd>
            </div>
            {{-- <div class="flex flex-col items-center justify-center">
                <dt id="program-besar" class="mb-2 text-4xl md:text-4xl font-extrabold">0</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Program Besar</dd>
            </div> --}}
            <div class="flex flex-col items-center justify-center">
                <dt id="jumlah-umkm" class="mb-2 text-4xl md:text-4xl font-extrabold">0</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah UMKM</dd>
            </div>
        </dl>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const jumlahPendudukElement = document.getElementById('jumlah-penduduk');
        const programBesarElement = document.getElementById('program-besar');
        const jumlahUmkmElement = document.getElementById('jumlah-umkm');
        // const jumlahPenduduk = 999; //Angka data akhir
        // const programBesar = 10; // Angka data akhir
        // const jumlahUmkm = 20; // Angka data akhir
        const duration = 5000; // Durasi animasi dalam milidetik (misalnya, 5 detik)

        function animateNumbers(startTime, startValue, endValue, element) {
            const now = Date.now();
            const elapsedTime = now - startTime;
            const progress = Math.min(1, elapsedTime / duration);
            const currentValue = Math.floor(progress * (endValue - startValue) + startValue);
            element.textContent = currentValue.toLocaleString();
            if (progress < 1) {
                requestAnimationFrame(function() {
                    animateNumbers(startTime, startValue, endValue, element);
                    // element.textContent += '+';
                });
            }
        }

        function startAnimation(jumlahPenduduk, jumlahUmkm) {
            const startTime = Date.now();
            animateNumbers(startTime, 0, jumlahPenduduk, jumlahPendudukElement);
            // animateNumbers(startTime, 0, programBesar, programBesarElement);
            animateNumbers(startTime, 0, jumlahUmkm, jumlahUmkmElement);
        }

        function fetchDataPenduduk() {
                return fetch('http://127.0.0.1:8000/api/penduduk')
                    .then(response => response.json())
                    .then(penduduk => {
                        if (Array.isArray(penduduk.data)) {
                            return penduduk.data.length;
                        } else {
                            throw new Error('Data salah');
                        }
                    })
        }

        function fetchDataUMKM() {
                return fetch('http://127.0.0.1:8000/api/umkm')
                    .then(response => response.json())
                    .then(umkm => {
                        if (Array.isArray(umkm.data)) {
                            return umkm.data.length;
                        } else {
                            throw new Error('Data salah');
                        }
                    })
        }
        
        function start() {
            Promise.all([fetchDataPenduduk(), fetchDataUMKM()])
            .then(([jumlahPenduduk, jumlahUmkm]) => {
                startAnimation(jumlahPenduduk, jumlahUmkm);
            })
            .catch(error => console.error('Error fetching data:', error));
        }
        start();

    });
</script>
