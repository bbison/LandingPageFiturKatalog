<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="{{ env('APP_URL') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ env('APP_URL') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ env('APP_URL') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ env('APP_URL') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ env('APP_URL') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ env('APP_URL') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ env('APP_URL') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="{{ env('APP_URL') }}/assets/css/main.css" rel="stylesheet">
    <title>Arena Design</title>

    <style>
        /* Styling untuk animasi */
        .animate-ring {
            position: relative;
        }

        .animate-ring::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80px;
            height: 80px;
            background-color: rgba(37, 211, 102, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: ring-pulse 1.5s ease-out infinite;
            z-index: -1;
        }

        /* Keyframes untuk animasi */
        @keyframes ring-pulse {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }

        .hero {
            background: linear-gradient(45deg, #1e3c72, #2a5298);
            /* background: linear-gradient(to right, #1e3c72, #2a5298), url('https://via.placeholder.com/1920x800'); */
            color: white;
            padding: 100px 0;
            text-align: center;
            background-size: 400% 400%;
            background-position: center;
            animation: gradientWave 5s ease infinite;
        }

        @keyframes gradientWave {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }


        }

        #kuas {
            animation: naik-turun 8s ease infinite;
        }

        @keyframes naik-turun {
            0% {
                bottom: 0px;
            }

            50% {
                bottom: 25px;
            }

            100% {
                bottom: 0px;
            }
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #ff7e5f;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #feb47b;
        }

        .features {
            padding: 50px 0;
        }

        .features .icon {
            font-size: 3rem;
            color: #ff7e5f;
            margin-bottom: 20px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .hero-section {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 123, 255, 1) 50%, rgba(0, 212, 255, 1) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.25rem;
        }

        .product-card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            text-align: center;
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card .card-body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .product-card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
        }

        .product-card .card-text {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .product-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .product-card .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #0056b3;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .order-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px;
        }

        .order-header {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .product-img {
            max-width: 100px;
        }

        .product-info {
            flex-grow: 1;
            padding-left: 15px;
        }

        .order-footer {
            text-align: right;
        }

        .btn-action {
            background-color: #ff5722;
            color: white;
        }

        .product-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }

        html {
            scroll-behavior: smooth;
        }

        .sticky-checkout {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #ff5722;
            padding: 10px;
            text-align: center;
            z-index: 1000;
            border-top: 2px solid #ddd;
        }

        .sticky-checkout button {
            color: white;
            background-color: #ff5722;
            border: none;
            font-size: 18px;
            padding: 10px 30px;
        }

        .sticky-checkout button:hover {
            background-color: #e64a19;
        }
    </style>
</head>

<body class="index-page " id="body">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Arena Design</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a class="text-decoration-none" href="/">Beranda</a></li>
                    <li><a class="text-decoration-none" href="/product">Produk</a></li>
                    <li><a class="text-decoration-none" href="/#about">Tentang Kami</a></li>
                    <li><a class="text-decoration-none" href="#contact" onclick="animasi()">Kontak</a></li>
                    <li>
                        <form class="col mt-3" action="/product" method="get">
                            <div class="input-group mb-3">
                                <input type="text"
                                    @if (Request::get('query')) value="{{ Request::get('param') }}" @endif
                                    class="form-control" placeholder="Cari Produk" aria-label="Recipient's username"
                                    name="param" aria-describedby="basic-addon2">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>
                            </div>
                            @if (Request::get('kategory'))
                                <input type="hidden" name="kategory" value="{{ Request::get('kategory') }}"
                                    id="">
                            @endif
                        </form>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list" id="btntoogle" onclick="toogle()"></i>
            </nav>

            <a class="btn-getstarted" href="/login">Login</a>

        </div>
    </header>
    <main class="main">
        @yield('body')
    </main>
    @if (!Request::is('lihat-produk*'))
        <div class="container">
            <a href="https://wa.me/+6287813720480?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20percetakan%20Anda.%20"
                target="_blank" class="wa-link position-fixed bottom-0 end-0 p-3 m-4 m-md-2">
                <img src="https://pontianakinfo.disway.id/upload/640d97bdb68b7ef7398e7dddc55a6460.jpeg" alt="WhatsApp"
                    class="rounded-circle img-fluid" style="width: 60px; height: 60px;">
            </a>
        </div>
    @endif

    <!-- Link WhatsApp -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ env('APP_URL') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ env('APP_URL') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ env('APP_URL') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ env('APP_URL') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ env('APP_URL') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ env('APP_URL') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="{{ env('APP_URL') }}/assets/js/main.js"></script>
    <script>
        function toogle() {
            let nav = document.getElementById("body");
            let btn = document.getElementById("btntoogle");

            // mobile-nav-active
            if (nav.classList.contains('mobile-nav-active')) {
                nav.classList.remove('mobile-nav-active')
                btn.classList.add('bi-list')
                btn.classList.remove('bi-x')
            } else {
                nav.classList.add('mobile-nav-active')
                btn.classList.remove('bi-list')
                btn.classList.add('bi-x')
            }
        }
    </script>

    <footer class="bg-dark text-white py-4" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Informasi Kontak</h5>
                    <p>Alamat: Kaliaang Dua, Langensari, Kec. Ungaran Bar., Kabupaten Semarang, Jawa Tengah 50518</p>
                    <p>Email: arenadesign@gmail.com</p>
                    <p>Telepon: +62 838-4261-5259</p>
                </div>
                <div class="col-md-4">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="/about" class="text-white">Tentang Kami</a></li>
                        <li><a href="/terms" class="text-white">Syarat & Ketentuan</a></li>
                        <li><a href="/privacy" class="text-white">Kebijakan Privasi</a></li>
                        <li><a href="/faq" class="text-white">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Ikuti Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://facebook.com" class="text-white">Facebook</a></li>
                        <li><a href="https://instagram.com" class="text-white">Instagram</a></li>
                        <li><a href="https://twitter.com" class="text-white">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>© 2024 Arena Design. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>



    <script>
        function animasi() {
            const waLink = document.querySelector('.wa-link');
            waLink.classList.add('animate-ring');
            // Menghapus kelas setelah beberapa detik agar animasi bisa dipicu lagi
            setTimeout(() => {
                waLink.classList.remove('animate-ring');
            }, 1000); // Durasi waktu animasi dalam milidetik

        }
    </script>
</body>

</html>
