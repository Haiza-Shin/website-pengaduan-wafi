<?php
session_start();
include './service/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Website ACC-REPORT</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">ACC-REPORT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/login.php">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/register.php">Register</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Laporkan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./akun/self.php">Pengaduan saya</a></li>
                                <li><a class="dropdown-item" href="./report/create.php">Buat pengaduan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/logout.php">Keluar</a>
                        </li>
                        <?php if ($_SESSION['is_admin'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./admin/index.php">Admin</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="alert alert-info">
            <?= $pemberitahuan ?>
        </div>
        <h1 class="text-center">Selamat Datang <?= $_SESSION['username'] ?? '' ?> di Website ACC-REPORT</h1>
        <div class="d-grid gap-2 col-6 mx-auto mt-4">
            <a class="btn btn-success" href="./report/create.php">Buat laporan</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>