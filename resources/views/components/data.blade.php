{{-- <section class="bg-white dark:bg-gray-900 mt-20" id="data-section">
    <div class="max-w-screen-xl px-4 pt-12 pb-8 mx-auto text-center lg:px-6">
        <dl class="grid max-w-screen-md gap-12 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-4xl md:text-4xl font-extrabold">2000+</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Penduduk</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-4xl md:text-4xl font-extrabold">10+</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Program Besar</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-4xl md:text-4xl font-extrabold">20+</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah UMKM</dd>
            </div>
        </dl>
    </div>
</section> --}}

<section class="bg-white dark:bg-gray-900 mt-20" id="data-section">
    <div class="max-w-screen-xl px-4 pt-12 pb-8 mx-auto text-center lg:px-6">
        <dl class="grid max-w-screen-md gap-12 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            <div class="flex flex-col items-center justify-center">
                <dt id="jumlah-penduduk" class="mb-2 text-4xl md:text-4xl font-extrabold">0</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Penduduk</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt id="program-besar" class="mb-2 text-4xl md:text-4xl font-extrabold">0</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Program Besar</dd>
            </div>
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
        const jumlahPenduduk = 2000; // Angka data akhir
        const programBesar = 10; // Angka data akhir
        const jumlahUmkm = 20; // Angka data akhir
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
                    element.textContent += '+';
                });
            }
        }
    
        function startAnimation() {
            const startTime = Date.now();
            animateNumbers(startTime, 0, jumlahPenduduk, jumlahPendudukElement);
            animateNumbers(startTime, 0, programBesar, programBesarElement);
            animateNumbers(startTime, 0, jumlahUmkm, jumlahUmkmElement);
        }
    
        startAnimation();
    });
    </script>
    
