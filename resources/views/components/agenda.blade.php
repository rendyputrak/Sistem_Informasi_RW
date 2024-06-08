<section class="px-16 mt-4 bg-white dark:bg-gray-900 pt-32 pb-20 content-section" id="agenda-section">
    <div class="flex flex-col gap-8">
        <div class="mx-auto max-w-screen-sm text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                Agenda dan Acara
            </h2>
        </div>
        <div class="flex gap-16 justify-between items-center">
            <ol id="timeline" class="relative border-s border-gray-200 dark:border-gray-700 mx-auto" style="max-height: auto; overflow: hidden; scroll-snap-type: y mandatory; scroll-behavior: smooth;"></ol>
        </div>
    </div>
</section>

<script>
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();

    fetch('http://127.0.0.1:8000/api/acara')
        .then(response => response.json())
        .then(result => {
            let data = result.data.filter(acara => {
                const acaraDate = new Date(acara.tanggal);
                const acaraMonth = acaraDate.getMonth();
                const acaraYear = acaraDate.getFullYear();
                return acaraMonth === currentMonth && acaraYear === currentYear;
            }).sort((a, b) => new Date(a.tanggal) - new Date(b.tanggal));

            const upcomingIndex = data.findIndex(acara => new Date(acara.tanggal) >= currentDate);
            if (upcomingIndex > 0) {
                data = data.slice(upcomingIndex);
            }

            const timelineContainer = document.getElementById('timeline');
            let timelineHTML = '';

            if (data.length === 0) {
                timelineHTML = `<h2>Tidak ada Agenda dan Acara untuk bulan ini.</h2>`;
            } else {
                let count = 0;

                const pastEvents = result.data.filter(acara => {
                    const acaraDate = new Date(acara.tanggal);
                    return acaraDate < currentDate && acaraDate.getMonth() === currentMonth && acaraDate.getFullYear() === currentYear;
                }).sort((a, b) => new Date(b.tanggal) - new Date(a.tanggal));

                pastEvents.slice(0, 5).forEach((acara, index) => {
                    const acaraDate = new Date(acara.tanggal);
                    const tanggalFormatted = acaraDate.toLocaleString('default', { month: 'long', year: 'numeric' });

                    timelineHTML += `
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">${tanggalFormatted}</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">${acara.nama_acara}</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Tanggal: ${acara.tanggal}</p>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Waktu: ${acara.waktu}</p>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Lokasi: ${acara.lokasi}</p>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Deskripsi: ${acara.deskripsi}</p>
                            <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs font-medium mr-2 rounded dark:bg-green-900 dark:text-green-300">Selesai</span>
                        </li>
                    `;

                    count++;
                });

                if (count < 5) {
                    data.forEach((acara, index) => {
                        if (count >= 5) return;

                        const acaraDate = new Date(acara.tanggal);
                        const tanggalFormatted = acaraDate.toLocaleString('default', { month: 'long', year: 'numeric' });

                        let additionalInfo = '';
                        if (acaraDate >= currentDate) {
                            additionalInfo = `
                                <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium mr-2 rounded dark:bg-blue-900 dark:text-blue-300">Akan Datang</span>
                                <span class="text-red-500">*</span>
                            `;
                        }

                        timelineHTML += `
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">${tanggalFormatted}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">${acara.nama_acara}</h>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Tanggal: ${acara.tanggal}</p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Waktu: ${acara.waktu}</p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Lokasi: ${acara.lokasi}</p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Deskripsi: ${acara.deskripsi}</p>
                                ${additionalInfo}
                            </li>
                        `;

                        count++;
                    });
                }
            }

            timelineContainer.innerHTML = timelineHTML;
        })
        .catch(error => console.error('Error:', error));
</script>
