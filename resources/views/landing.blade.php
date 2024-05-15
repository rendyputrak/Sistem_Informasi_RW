<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">
    <title>Sistem Informasi RW</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand navbar_title" href="#">RW 03 - Bunulrejo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url ('/admin')}}" tabindex="-1" aria-active="true">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <h3 class="font_hero">RW 03 Bunulrejo, <br>
                        Kec. Blimbing, Kota Malang</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset ('images/Elemen.png')}}" class="img_hero" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <h3 class="subHeroHeader">Pengumuman dan Berita <div class="d-inline">Terkini</div></h3>
                </div>
                <div class="col-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc. Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc. Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card_ingfo">
                        <h3 class="judul_info">Judul Pengumuman</h3>
                        <p class="info_text">Lorem ipsum dolor sit amet consectetur. Aliquet id feugiat mi vitae nunc. Posuere pellentesque viverra risus mauris amet mauris eu. In quis duis turpis nunc condimentum leo sem viverra. Cursus suspendisse aliquam.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="primary_info mt-5 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset ('images/Vector.png')}}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset ('images/Vector.png')}}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="iconWrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset ('images/Vector.png')}}" alt="" class="iconIngfo" srcset="">
                    </div>
                    <div class="contentIngfo ms-3">
                        <h3>4000+</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 d-flex align-items-center">
                    <img src="{{ asset ('images/bg.png')}}" class="about_img" alt="">
                </div>
                <div class="col-md-7">
                    <h3 class="about_header">Berkenalan dengan RW03 Bunulrejo, Yuk!</h3>
                    <p>Lorem ipsum dolor sit amet consectetur. Vitae dictum augue porta lacus aliquet magna penatibus sapien. In odio ut et ut sodales quam nam sem tellus. Nibh vitae morbi tristique sed. Proin ipsum a ultricies proin vel volutpat nunc molestie. Neque dignissim sed urna sit metus mi hendrerit neque. Mauris nulla pretium luctus scelerisque vitae non vitae. Tempus cursus tincidunt non amet rhoncus ornare sit at gravida. Varius metus facilisis at in urna.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="program_kami">
        <div class="container-fluid">
            <div class="row">
                <h3 class="program_kami_header text-center">Program-Program Kami</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset ('images/Foto.png')}}" class="card_img_program card-img-top" alt="">
                        <div class="card-body">
                        <h3 class="card_header">Nama Program</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset ('images/Foto.png')}}" class="card_img_program card-img-top" alt="">
                        <div class="card-body">
                        <h3 class="card_header">Nama Program</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_program shadow-lg">
                        <img src="{{ asset ('images/Foto.png')}}" class="card_img_program card-img-top" alt="">
                        <div class="card-body">
                        <h3 class="card_header">Nama Program</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur. Massa integer venenatis habitasse purus tellus pretium elementum scelerisque. Libero sit justo placerat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="daftar_umkm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="umkmWrapper">
                        <h3 class="umkmHeader text-center text-white">Daftar UMKM</h3>
                    </div>
                </div>
            </div>
            <div class="row umkm_list">
                <div class="col-md-4">
                    <div class="card card_umkm shadow-lg">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset ('images/anime.png')}}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_umkm shadow-lg">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset ('images/anime.png')}}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card_umkm shadow-lg">
                        <div class="card-body">
                            <h3 class="header_umkm text-center">Nama Umkm</h3>
                            <img src="{{ asset ('images/anime.png')}}" alt="" class="img_umkm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="agenda">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="headerAgenda text-center">Agenda Terdekat</h3>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card shadow-lg agendaSub">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <img src="{{ asset ('images/foto_agenda.png')}}" class="foto_agenda" alt="">
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
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                                <div class="penyelenggaraMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card shadow-lg agendaSub">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <img src="{{ asset ('images/foto_agenda.png')}}" class="foto_agenda" alt="">
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
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                                <div class="penyelenggaraMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card shadow-lg agendaSub">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <img src="{{ asset ('images/foto_agenda.png')}}" class="foto_agenda" alt="">
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
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                                <div class="penyelenggaraMain text-center">
                                    <p class="agendaHeader">Tempat</p>
                                    <h3 class="agendaText">Tempatnya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                                    
                

            </div>
        </div>
    </section>
    <section class="struktur">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>