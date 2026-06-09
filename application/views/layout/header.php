<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - UTS Pemrograman Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- ===================== NAVBAR ===================== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">

            <!-- Sidebar toggle (mobile only) -->
            <button class="btn btn-outline-light btn-sm me-2 d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">☰</button>

            <a class="navbar-brand fs-3 fw-bold" href="#">Pemrograman Web</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarTop">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item me-md-3 mb-md-0 mb-2">
                        <a class="btn btn-light fw-semibold px-4" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light fw-semibold px-4" href="<?php echo base_url('auth/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===================== SIDEBAR OFFCANVAS (mobile) ===================== -->
    <div class="offcanvas offcanvas-start bg-secondary text-white" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel" style="width: 220px;">
        <div class="offcanvas-header border-bottom">
            <h6 class="offcanvas-title fw-bold" id="sidebarOffcanvasLabel">Menu</h6>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="text-center mt-3 mb-4 pb-3 border-bottom">
                <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" class="rounded-circle w-50" alt="Avatar">
                <div class="fw-semibold mt-2">[NAMA]</div>
                <small class="text-white-50">[NIM]</small>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url() ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'fakultas' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('fakultas') ?>">Fakultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'prodi' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('prodi') ?>">Program Studi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'mahasiswa' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('mahasiswa') ?>">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- ===================== MAIN WRAPPER ===================== -->
    <div class="container-fluid" style="padding-top: 64px;">
        <div class="row" style="min-height: calc(100vh - 64px);">

            <!-- ====== SIDEBAR (desktop, md+) ====== -->
            <nav class="col-md-3 col-lg-2 d-none d-md-flex flex-column bg-secondary text-white py-4" style="min-height: calc(100vh - 64px);">
                <div class="text-center mb-4 pb-3 border-bottom">
                    <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" class="rounded-circle w-50" alt="Avatar">
                    <div class="fw-semibold mt-2">[NAMA]</div>
                    <small class="text-white-50">[NIM]</small>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url() ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'fakultas' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('fakultas') ?>">Fakultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'prodi' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('prodi') ?>">Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 <?php echo $this->uri->segment(1) == 'mahasiswa' ? 'text-white fw-bold' : 'text-white-50'; ?>" href="<?php echo base_url('mahasiswa') ?>">Mahasiswa</a>
                    </li>
                </ul>
            </nav>

            <!-- ====== MAIN CONTENT ====== -->
            <main class="col-md-9 col-lg-10 bg-white px-4 py-4 d-flex flex-column">

                <h4 class="fw-bold mb-4">
                    <?php echo $title ?>
                </h4>