<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">

    <title>Sistem Informasi RW</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</head>

<body>

    <nav
        class="dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-6 px-16">
            <a href="#hero-landing" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">RW 03
                    Bunulrejo</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk
                    Akun</button>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#tentang-landing"
                            class="block py-2 px-3 text-[#0098D9] bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Tentang</a>
                    </li>
                    <li>
                        <a href="#program-landing"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Program</a>
                    </li>

                    <li>
                        <a href="#umkm-landing"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">UMKM</a>
                    </li>
                    <li>
                        <a href="#agenda-landing"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Agenda</a>
                    </li>
                    <li>
                        <a href="#struktur-landing"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Struktur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero" id="hero-landing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <h3 class="font_hero">RW 03 Bunulrejo, <br>
                        Kec. Blimbing, Kota Malang</h3>
                </div>

                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/Elemen.png') }}" class="img_hero" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="info" id="info" data-aos="fade-in">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <h3 class="subHeroHeader">Pengumuman dan Berita <div class="d-inline">Terkini</div>
                    </h3>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc.
                            Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc
                            condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc.
                            Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc
                            condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc.
                            Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc
                            condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="primary_info mt-5 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center mb-3">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/Vector.png') }}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center mb-3">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/Vector.png') }}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center mb-3">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/Vector.png') }}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us" id="tentang-landing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 d-flex align-items-center">
                    <img src="{{ asset('images/bg.png') }}" class="about_img" alt="">
                </div>
                <div class="col-md-7">
                    <h3 class="about_header">Berkenalan dengan RW03 Bunulrejo, Yuk!</h3>
                    <p>Lorem ipsum dolor sit amet consectetur. Vitae dictum augue porta lacus aliquet magna penatibus
                        sapien. In odio ut et ut sodales quam nam sem tellus. Nibh vitae morbi tristique sed. Proin
                        ipsum a ultricies proin vel volutpat nunc molestie. Neque dignissim sed urna sit metus mi
                        hendrerit neque. Mauris nulla pretium luctus scelerisque vitae non vitae. Tempus cursus
                        tincidunt non amet rhoncus ornare sit at gravida. Varius metus facilisis at in urna.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="program_kami" id="program-landing">
        <div class="container-fluid">
            <div class="row">
                <h3 class="program_kami_header text-center">Program-Program Kami</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset('images/Foto.png') }}" class="card_img_program card-img-top"
                            alt="">
                        <div class="card-body">
                            <h3 class="card_header">Nama Program</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis
                                habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset('images/Foto.png') }}" class="card_img_program card-img-top"
                            alt="">
                        <div class="card-body">
                            <h3 class="card_header">Nama Program</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis
                                habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset('images/Foto.png') }}" class="card_img_program card-img-top"
                            alt="">
                        <div class="card-body">
                            <h3 class="card_header">Nama Program</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis
                                habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="daftar_umkm" id="umkm-landing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="umkmWrapper">
                        <h3 class="umkmHeader text-center text-white">Daftar UMKM</h3>
                    </div>
                </div>
            </div>
            <div class="row umkm_list">
                <div class="col-md-4 mb-3">
                    <div class="card card_umkm shadow-lg" style="width: 100%;">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset('images/anime.png') }}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card_umkm shadow-lg" style="width: 100%;">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset('images/anime.png') }}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card_umkm shadow-lg" style="width: 100%;">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset('images/anime.png') }}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="agenda" id="agenda-landing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="headerAgenda text-center">Agenda Terdekat</h3>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card shadow-lg agendaSub">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <img src="{{ asset('images/foto_agenda.png') }}" class="foto_agenda" alt="">
                            <div class="labelMain">
                                <div class="labelWrapper d-flex justify-content-center align-items-center">
                                    Label
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="tempatMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
    
                            <div class="col-md-2">
                                <div class="waktuMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="penyelenggaraMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card shadow-lg agendaSub">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <img src="{{ asset('images/foto_agenda.png') }}" class="foto_agenda" alt="">
                        <div class="labelMain">
                            <div class="labelWrapper d-flex justify-content-center align-items-center">
                                Label
                            </div>
                            <h3 class="labelText">Nama Acara</h3>
                        </div>
                        <div class="tempatMain text-center">
                            <p class="agendaHeader">Tempat</p>
                            <h3 class="agendaText">Tempatnya</h3>
                        </div>
                        <div class="waktuMain text-center">
                            <p class="agendaHeader">Waktu</p>
                            <h3 class="agendaText">Waktunya</h3>
                        </div>
                        <div class="penyelenggaraMain text-center">
                            <p class="agendaHeader">Penyelenggara</p>
                            <h3 class="agendaText">Penyelenggaranya</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card shadow-lg agendaSub">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <img src="{{ asset('images/foto_agenda.png') }}" class="foto_agenda" alt="">
                        <div class="labelMain">
                            <div class="labelWrapper d-flex justify-content-center align-items-center">
                                Label
                            </div>
                            <h3 class="labelText">Nama Acara</h3>
                        </div>
                        <div class="tempatMain text-center">
                            <p class="agendaHeader">Tempat</p>
                            <h3 class="agendaText">Tempatnya</h3>
                        </div>
                        <div class="waktuMain text-center">
                            <p class="agendaHeader">Waktu</p>
                            <h3 class="agendaText">Waktunya</h3>
                        </div>
                        <div class="penyelenggaraMain text-center">
                            <p class="agendaHeader">Penyelenggara</p>
                            <h3 class="agendaText">Penyelenggaranya</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="struktur" id="struktur-landing">
        <div class="container-fluid mb-5">
            <div class="row">
                <h3 class="headerStruktur text-center">Struktur Pengurus RW</h3>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Hak Cipta &copy; 2024 Sistem Informasi RW - Kelompok 6</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
    </script>
</body>
<script>
   
    const resizePengumuman = () =>{
        if(window.innerWidth <= 1200){
            document.querySelector('.headerPengumuman').classList.remove('col-3')
            document.querySelector('.headerPengumuman').classList.add('col-12')
        }
        else{
            document.querySelector('.headerPengumuman').classList.remove('col-12')
            document.querySelector('.headerPengumuman').classList.add('col-3')
        }
    }
    window.addEventListener('resize', resizePengumuman)
</script>

</html>
