<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas XYZ - Selamat Datang</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path fill='%23007bff' d='M8.211 2.047a.5.5 0 0 0-.422 0L2.875 4.797a.5.5 0 0 0-.273.463v1.27a.5.5 0 0 0 .273.463l4.914 2.75a.5.5 0 0 0 .422 0l4.914-2.75a.5.5 0 0 0 .273-.463v-1.27a.5.5 0 0 0-.273-.463L8.211 2.047zM8 2.84l4.171 2.338L8 7.514 3.829 5.178 8 2.84zM1.5 8.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM2 10.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0-.5.5zM2.5 12.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm10-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm.5 1.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1z'/></svg>" type="image/svg+xml">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-mortarboard-fill me-2"></i>Universitas XYZ
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
                </nav>

    <!-- Hero Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Selamat Datang di Universitas XYZ
                    </h1>
                    <p class="lead mb-4">
                        Menjadi pusat pendidikan tinggi terkemuka yang menghasilkan lulusan berkualitas, 
                        berdaya saing global, dan berkontribusi positif bagi masyarakat.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Daftar PMB
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="bi bi-mortarboard display-1 text-light opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Section -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold mb-3">Video Profil Kampus</h2>
                    <p class="lead text-muted">Kenali lebih dekat Universitas XYZ melalui video profil kami</p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/4r5lrnYX5yA?autoplay=1" 
                                title="Universitas XYZ Profile" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Tentang Universitas XYZ</h2>
                    <p class="lead mb-4">
                        Universitas XYZ didirikan pada tahun 1985 dengan visi menjadi perguruan tinggi 
                        terkemuka yang menghasilkan lulusan berkualitas dan berdaya saing global.
                    </p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-people-fill text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">15.000+</h6>
                                    <small class="text-muted">Mahasiswa Aktif</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-book-fill text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">50+</h6>
                                    <small class="text-muted">Program Studi</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-award-fill text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">A+</h6>
                                    <small class="text-muted">Akreditasi BAN-PT</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-globe text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">25+</h6>
                                    <small class="text-muted">Kerjasama Internasional</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="img-fluid rounded shadow" alt="Gedung Kampus">
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold mb-3">Fasilitas Kampus</h2>
                    <p class="lead text-muted">Nikmati berbagai fasilitas modern untuk mendukung kegiatan akademik Anda</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <img src="https://aksaramaya.com/wp-content/uploads/2024/01/Duke-Humfreys-Library-6.jpg" 
                             class="card-img-top" alt="Perpustakaan" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Perpustakaan</h5>
                            <p class="card-text text-muted">Koleksi buku terlengkap 24/7</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPnolDFAKP6ddvVcqYtuK0Z220zTPh3irW3md4UpOFbb0yifDO0g-mMXeGw4eUIyjKVSU&usqp=CAU" 
                             class="card-img-top" alt="Laboratorium" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Laboratorium Modern</h5>
                            <p class="card-text text-muted">Fasilitas lab terkini untuk praktikum dan penelitian</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <img src="https://wynajem.amu.edu.pl/wp-content/uploads/2024/11/fizyka_aula_maximum_001.jpg" 
                             class="card-img-top" alt="Aula" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Aula Serbaguna</h5>
                            <p class="card-text text-muted">Tempat berbagai acara akademik dan non-akademik</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1551218372-a8789b81b253?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2FudGVlbnxlbnwwfHwwfHx8MA%3D%3D" 
                             class="card-img-top" alt="Kantin" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kantin Sehat</h5>
                            <p class="card-text text-muted">Tempat makan dengan menu sehat dan bergizi</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1645725677294-ed0843b97d5c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                             class="card-img-top" alt="WiFi" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">WiFi Kampus</h5>
                            <p class="card-text text-muted">Internet cepat di seluruh area kampus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Program Studi Unggulan</h2>
                <p class="lead text-muted">Pilih program studi yang sesuai dengan passion dan karir masa depan Anda</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-laptop fs-4"></i>
                        </div>
                        <h5 class="card-title">Teknik Informatika</h5>
                        <p class="card-text text-muted">
                            Program studi yang mempersiapkan mahasiswa untuk menjadi ahli teknologi informasi
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-calculator fs-4"></i>
                        </div>
                        <h5 class="card-title">Manajemen Bisnis</h5>
                        <p class="card-text text-muted">
                            Mencetak pemimpin bisnis masa depan dengan kurikulum yang relevan
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-heart-pulse fs-4"></i>
                        </div>
                        <h5 class="card-title">Kedokteran</h5>
                        <p class="card-text text-muted">
                            Program studi kedokteran dengan fasilitas klinik dan rumah sakit pendidikan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-6 fw-bold mb-4">Bergabunglah dengan Kami</h2>
                <p class="lead text-muted mb-4">
                    Mulai perjalanan akademik Anda di Universitas XYZ dan wujudkan masa depan yang gemilang
                </p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">
                    <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="bi bi-mortarboard-fill me-2"></i>Universitas XYZ</h5>
                    <p class="text-muted mb-0">Mencetak Generasi Unggul untuk Masa Depan</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted mb-0">&copy; 2025 Universitas XYZ. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
