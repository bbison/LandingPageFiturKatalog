@extends('layouts.navUser')
@section('body')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container position-relative">
            <br>
            <h1 class="text-white">Welcome to Our Platform</h1>
            <p>Selamat datang di Arena Design Percetakan! Kami adalah perusahaan percetakan yang menawarkan berbagai layanan
                cetak berkualitas tinggi untuk kebutuhan bisnis dan pribadi Anda. Mulai dari cetak kartu nama, brosur,
                poster, hingga banner, kami siap membantu Anda mencetak desain yang sesuai dengan visi Anda. Dengan mesin
                cetak modern dan bahan berkualitas, kami menjamin hasil yang memuaskan dan pengiriman tepat waktu. Hubungi
                kami sekarang untuk mendapatkan penawaran terbaik dan ciptakan materi promosi yang profesional!</p>
                
            <a href="/product" class="btn btn-custom">Get Started</a>
            <a href="#about" class="btn btn-light ms-2">Learn More</a>
            <img src="/img/kuas.png" class="position-absolute" style="left: 10px" id="kuas" width="100px" alt="">
        </div>
        
    </section>

    <section class="features text-center">
        <div class="container">
            <h2 class="mb-5">Our Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon">💡</div>
                    <h5>Ide-Inovatif</h5>
                    <p>Menyediakan solusi kreatif dan inovatif untuk menyelesaikan masalah Anda secara efektif.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon">⚡</div>
                    <h5>Kinerja Cepat</h5>
                    <p>Rasakan kinerja super cepat dengan platform kami yang teroptimasi.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon">🌍</div>
                    <h5>Jangkauan Global</h5>
                    <p>Perluas bisnis Anda ke seluruh dunia dengan jaringan dan alat global kami.</p>
                </div>
            </div>
        </div>
    </section>


<div>
  <section id="about" class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>About Us</h2>
            <p class="text-justify" style=" text-align: justify">Arena Design Percetakan adalah perusahaan yang bergerak di bidang percetakan dengan
                fokus pada penyediaan solusi cetak berkualitas tinggi untuk berbagai keperluan. Kami melayani individu,
                perusahaan, dan instansi yang membutuhkan layanan percetakan profesional dengan hasil yang memuaskan.
                Dengan pengalaman bertahun-tahun, kami memiliki komitmen untuk memberikan produk cetak terbaik
                menggunakan teknologi modern dan bahan berkualitas.

                Di Arena Design, kami mengutamakan kepuasan pelanggan. Tim kami yang berpengalaman siap membantu Anda
                dalam setiap tahap proses percetakan, mulai dari konsultasi desain hingga pengiriman produk akhir. Kami
                juga menyediakan berbagai pilihan layanan, termasuk percetakan offset, digital printing, dan percetakan
                besar untuk acara atau kebutuhan promosi.

                Kami percaya bahwa setiap proyek percetakan adalah peluang untuk membantu bisnis Anda tampil lebih
                profesional dan menarik. Dengan harga yang bersaing dan waktu pengerjaan yang efisien, Arena Design
                adalah pilihan tepat untuk memenuhi kebutuhan cetak Anda.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ env('APP_URL').'/assets/img/about.jpeg' }}" alt="About Us Image" class="img-fluid rounded">
        </div>
    </div>
</section>
</div>
  

    <section id="services" class="bg-light py-5">
        <div class="container text-center">
            <h2>Our Services</h2>
            <br>
            <div class="row d-flex  align-items-center">
                <div class="col-md-4">
                    <h3>Berkualitas Tinggi</h3>
                    <p>Menyediakan berbagai layanan percetakan profesional, mulai dari kartu nama, brosur, poster, hingga banner, dengan kualitas terbaik dan waktu pengerjaan yang efisien.</p>
                </div>
                <div class="col-md-4">
                    <h3>Desain Kreatif</h3>
                    <p>Tim desainer kami siap membantu Anda membuat desain menarik dan sesuai dengan kebutuhan bisnis Anda, mulai dari logo hingga materi promosi.</p>
                </div>
                <div class="col-md-4">
                    <h3>Layanan Cepat</h3>
                    <p>Kami memastikan pengiriman produk percetakan tepat waktu dan aman sampai ke tangan Anda, memberikan kenyamanan dan kepuasan pelanggan.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="testimonials" class="hero text-white py-5">
        <div class="container text-center">
            <h2 class=" text-white">What Our Clients Say</h2><br>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Pelayanan yang sangat memuaskan! Tim sangat responsif dan cepat dalam membantu menyelesaikan masalah saya. Terima kasih! "</p>
                        <footer>- Ade Irawan</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Senang Sekali Saya Dengan Website Ini Saya sudah mencoba banyak produk serupa, tapi produk ini yang terbaik! Sangat puas dengan hasilnya."</p>
                        <footer>- Silvi Anya</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Sangat profesional! Mereka memahami kebutuhan kami dan memberikan solusi yang sangat efektif untuk bisnis kami"</p>
                        <footer>- Indra Almara</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>


    <section class="cta text-center py-5 bg-light">
        <div class="container">
            <h2>Join Us Today!</h2>
            <p class="mb-4">Take the next step in growing your business with us. Sign up now!</p>
            <a href="/product" class="btn btn-custom">Get Started</a>
        </div>
    </section>
@endsection
