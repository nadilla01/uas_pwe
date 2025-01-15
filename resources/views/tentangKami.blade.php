<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inaklug</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        body {
            font-family: 'Ubuntu';
        }
        /* atur semua font agar jangan terlalu tebal */
        * {
            font-family: 'Ubuntu';
            /* atur ketebalannya */
            font-weight: 10;
        }
        .f-small{
            font-size: 0.8em;
        }
        .bg-gradient-custom {
            background: linear-gradient(to right, rgba(70, 7, 78, 0.9), rgba(60, 142, 214, 0.9));
        }
        .border-button-custom{
            /* gradient border dengan background white */
            background: linear-gradient(to right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), linear-gradient(to right, rgba(70, 7, 78, 0.9), rgba(60, 142, 214, 0.9));

        }
        .hover:hover{
            background: linear-gradient(to right, rgba(70, 7, 78, 0.9), rgba(60, 142, 214, 0.9));
            color: white;
        }
        .hover{
            color:rgba(60, 142, 214, 1);
        }
        .bg-gradient-custom-footer {
            background: linear-gradient(to right, rgba(70, 7, 78, 0.9), rgba(60, 142, 214, 0.9));
        }
        .navbar-active{
            /* garis bawah putih */
            border-bottom: 1px solid white;
        }

        input::placeholder {
            opacity: 0.4;
            color: white !important;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .image-overlay {
            position: relative;
        }

        .image-overlay::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 50%;
            background: linear-gradient(to right, rgba(70, 7, 78, 0.9), transparent);
            
            opacity: 0.8;
            border-radius: 10px 0 0 10px;
        }
        .nav-item{
            /* kecilkan fontnya */
            font-size: 0.8em;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .overlay-content {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            z-index: 1;
            text-align: left;
        }

        .line {
            width: 1px;
            height: 40px;
            background-color: white;
            margin-bottom: 5px;
        }

        .card-title {
            font-size: 1em;
            margin: 0;
            text-align: left;
        }

        .logo-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }

        .logo-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .article-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .article-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .article-title {
            font-size: 16px;
            padding: 15px;
        }

        .btn-custom {
            margin-top: 20px;
            border: 1px solid #197BD0;
            color: #197BD0;
            border-radius: 20px;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #197BD0;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="navbar navbar-expand-lg navbar-dark bg-gradient-custom shadow-lg fixed-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <img src="{{ asset('images/inaklug.png') }}" alt="Inaklug Logo" class="d-inline-block align-text-top" height="50">
                <span class="ms-2 me-5 fs-4">Inaklug</span>
            </a>            

            <!-- Untuk mobile -->
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link text-white @if (Route::currentRouteName() == 'home') navbar-active @endif" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if (Route::currentRouteName() == 'tentangKami') navbar-active @endif" href="{{route('tentangKami')}}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if (Route::currentRouteName() == 'layananKami') navbar-active @endif" href="{{route('layananKami')}}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if (Route::currentRouteName() == 'artikel') navbar-active @endif" href="{{route('artikel')}}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if (Route::currentRouteName() == 'hubungi') navbar-active @endif" href="{{route('hubungi')}}">Hubungi Kami</a></li>
                </ul>
                <div class="d-flex align-items-center me-3" style="border-bottom: 1px solid white;">
                    <i class="fas fa-search text-white me-2 mb-2" style="position: relative; top: 5px"></i>
                    <input type="text" class="form-control" placeholder="Ketik pencarian" style="border: none; background: transparent; color: white; font-size: 0.8em;">
                </div>
                <!-- Button Daftar -->
                <a href="#" class="btn rounded-5 px-3 py-2 ms-auto text-white" style="background: rgba(45, 80, 134, 0.9); border: 1px solid white; font-size: 0.8em;">DAFTAR ON-LINE</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Body 1 -->
        <div class="w-100 position-relative" style="height: 450px;">
            <div style="position: absolute; width: 100%; height: 100%; background: linear-gradient(to right, rgba(70, 7, 78, 0.9), transparent);"></div>
            <img src="{{ asset('images/studytour.png') }}" alt="" class="w-100 h-100" style="object-fit: cover;">
            <h1 class="position-absolute text-white" style="left: 9%; top: 75%; font-size: 2rem;">TENTANG KAMI</h1>
        </div>

        <!-- Body 2 -->
        <div class="container py-5" style="max-width: 860px;">
            <!-- Bagian Profil -->
            <h1 class="mb-3 fs-4 text-muted">Profil</h1>
            <p class="text-muted fs-6">
                Didirikan pada tahun 2018, ini membuktikan bahwa INAKLUG merupakan konsultan pendidikan internasional yang berpengalaman,
                terbesar, terpercaya, dan juga memiliki jam terbang tinggi untuk melayani para anak-anak muda Indonesia untuk menuntut ilmu
                di berbagai negara maju dunia.
            </p>
        
            <!-- Gambar Visi dan Misi -->
            <div class="row my-5">
                <div class="col-12 col-md-6 mb-4">
                    <img src="{{ asset('images/visi.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 mb-4 d-none d-md-block">
                    <img src="{{ asset('images/misi.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        
            <!-- Bagian Visi dan Misi -->
            <div class="row">
                <!-- Visi -->
                <div class="col-12 col-md-6 mb-2">
                    <h2 class="fs-4 text-muted">Visi</h2>
                    <p class="text-muted fs-6">
                        Membangun Sumber Daya Indonesia yang mempunyai daya saing tinggi, tangguh secara internasional untuk menghadapi persaingan di era globalisasi serta membangun karakter pemimpin Indonesia masa depan yang tangguh, mandiri, dan profesional.
                    </p>
                </div>
        
                <!-- Misi -->
                <div class="col-12 col-md-6 mb-2">
                    <h2 class="fs-4 text-muted">Misi</h2>
                    <p class="text-muted fs-6">
                        Membangun Sumber Daya Indonesia yang mempunyai daya saing tinggi, tangguh secara internasional untuk menghadapi persaingan di era globalisasi serta membangun karakter pemimpin Indonesia masa depan yang tangguh, mandiri, dan profesional.
                    </p>
                </div>
            </div>
        </div>        

        <!-- Button Layanan Kami -->
        <div class="d-flex justify-content-center my-5">
            <span class="btn bg-gradient-custom rounded-5" style="padding:0.5px"><a href="#" class="hover bg-white btn px-5 py-2 rounded-5 "> Layanan Kami</a></span>
        </div>

        <hr>

        <!-- Body 3 -->
        <div class="text-center py-5 text-muted">
            <h1 class="h4 mb-4">Hubungi Kami</h1>
            <h2 class="h5">Kantor Pusat</h2>
            <p class="pb-0 mb-0">Gedung Ir. H. M. Suseno - Jl. R.P Soeroso No.6, Menteng, Jakarta Pusat</p>
            <p class="pt-0">Phone: 085286754052</p>

            <!-- Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-4">
                <a href="#" class="btn bg-gradient-custom-footer text-white rounded-5 fs-6 px-5 py-2">LOKASI KAMI</a>
                <span class="btn bg-gradient-custom rounded-5" style="padding:0.5px"><a href="#" class="hover bg-white btn px-5 py-2 rounded-5 "> KIRIM PESAN</a></span>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-custom-footer text-center text-white py-3">
        <p class="mb-0">Copyright @ 2020 - Inaklug Indonesia | Hak cipta dilindungi undang-undang</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>