@extends('layouts.app')

@section('title', 'About Us : ArticleCraft')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endsection

@section('content')

    <!-- Section 1: Welcome Page (About Us) -->
    <section class="welcome-page d-flex align-items-center justify-content-center text-center text-white">
        <div class="">
            <h1 class="display-4 font-weight-bold">ABOUT US</h1>
            <p class="lead">Kenali lebih dekat tentang ArticleCraft</p>
        </div>
    </section>

    <!-- Section 2: Tentang Proyek ArticleCraft -->
    <section class="project-details py-5 bg-light">
        <div class="container">
            <h2 class="section-title mb-4 text-center">About ArticleCraft</h2>
            <p class="lead text-center text-muted mb-4">
                ArticleCraft adalah aplikasi web yang dirancang untuk penulis dan pembaca. Aplikasi ini memungkinkan penulis untuk mengelola artikel, kategori, dan tag dengan mudah, sementara pembaca dapat menjelajahi koleksi artikel yang dinamis.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="font-weight-bold mb-3">Fitur</h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle"></i> Halaman Beranda yang menampilkan daftar artikel secara dinamis</li>
                        <li><i class="fas fa-check-circle"></i> Halaman Artikel yang menampilkan detail artikel</li>
                        <li><i class="fas fa-check-circle"></i> Halaman Statik yang berisi informasi seperti "Tentang Kami"</li>
                        <li><i class="fas fa-check-circle"></i> Halaman Admin untuk mengelola artikel, kategori, dan tag secara efisien</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="font-weight-bold mb-3">Tujuan Proyek</h3>
                    <p class="text-muted">
                        Proyek ini adalah bagian dari tugas akhir UAP Praktikum Pemrograman Web. Tujuannya adalah untuk membangun aplikasi web berbasis Laravel yang mencakup penggunaan arsitektur MVC, pengelolaan basis data, dan implementasi fungsionalitas CRUD dalam pengelolaan artikel dan pengguna. Mohon nilai A nya ya kak, karena kita kerja rodi buat ini TT, kita juga nggk joki TT. Terimakasih asprak paling baik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Meet the Team -->
    <section class="meet-the-team py-5">
        <div class="container text-center">
            <h2 class="section-title mb-4">About Our Team</h2>
            <p class="lead text-muted mb-4">Tim kami terdiri dari individu-individu dengan keahlian yang beragam, masing-masing memberikan kontribusi penting dalam keberhasilan proyek ini.</p>
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Anisah Khansa Zhafirah" class="rounded-circle mb-3">
                        <h5 class="font-weight-bold">Anisah Khansa Zhafirah</h5>
                        <p class="text-muted">235150600111033</p>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Evida Nur Churin'in" class="rounded-circle mb-3">
                        <h5 class="font-weight-bold">Evida Nur Churin'in</h5>
                        <p class="text-muted">235150600111034</p>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Auliyaa Zulfa" class="rounded-circle mb-3">
                        <h5 class="font-weight-bold">Auliyaa Zulfa</h5>
                        <p class="text-muted">235150600111034</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
