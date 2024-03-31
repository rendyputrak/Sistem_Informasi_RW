<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @include('template.script')
</head>

<body>
  <div class="container min-h-screen bg-gradient-to-br from-blue-500 to-cyan-500 px-10 py-5 relative">
    @include('template.header')

    <div class="px-5 my-40">
      <h1 class="text-white text-5xl font-bold leading-normal mb-28">RW 03 Bunulrejo,<br>Kec. Blimbing,<br>Kota Malang</h1>
      <span class="text-white text-3xl font-medium leading-normal mt-24">Pengumuman<br>dan Berita</span>
      <span class="text-yellow-400 text-3xl font-medium leading-normal mt-24">Terkini</span>
    </div>

    <img src="../img/tes.png" class="w-full xl:w-1/2 xl:absolute bottom-0 right-20">
  </div>
</body>
</html>