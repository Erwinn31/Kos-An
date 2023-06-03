
@extends('site.base')

@section('title') About Us | @endsection
@section('content')

    <section id="showcase-inner" class="py-5 text-white">
        <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
            <h1 class="display-4">About KOS-AN</h1>
            <p class="lead">Kami Merupakan Tempat Yang Tepat Untuk Anda Mencari Kos!</p>
            </div>
        </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section id="bc" class="mt-3">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{% url 'listing:home' %}">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item active"> About</li>
            </ol>
        </nav>
        </div>
    </section>

    <section id="about" class="py-4">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h2>Pencarian Kos Paling Tepat</h2>
            <p class="lead">Kami Menyediakan Kamar Dengan Berbagai Fasilitas Dan Lokasi</p>
            <img src="assets/img/about.jpg" alt="">
            <p class="mt-4">KOS-AN website pencarian berbagai jenis kamar kos, khusus Kota Batam. Saat ini kami dapat membantu untuk memudahkan para pencari dan juga pemilik kos, untuk berinteraksi mulai dari pencarian hingga pemesanan. </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        </div>
    </section>

    <!-- Work -->
    <section id="work" class="bg-dark text-white text-center">
        <h2 class="display-4">Kami Bekerja Untuk Kamu</h2>
        <h4>Temukan Berbagai Jenis Kamar Menarik Dengan Harga Terbaik Dan Fasilitas Terlengkap
         </h4>
        <hr>
    <a href="{{ route('listings') }}" class="btn btn-secondary text-white btn-lg">View Our Featured Listings</a>
    </section>

@endsection