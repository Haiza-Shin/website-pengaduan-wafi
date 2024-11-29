<?php
session_start();
require_once '../service/database.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0) {
    header('Location: ../index.php');
    exit();
}

$query = "SELECT report.id_report, report.isi_laporan, report.tgl_report, akun.username FROM report JOIN akun ON report.akun_id = akun.id";
$result = mysqli_query($connection, $query);

$akun_query = "SELECT id, username FROM akun";
$akun_result = mysqli_query($connection, $akun_query);

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar report</title>
    <style>
        body {
            background-color: #f8fafc;
        }

        .table td {
            word-break: break-word;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Seluruh report</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Tanggal report</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $no . '</th>';
                            echo '<td>' . $row['isi_laporan'] . '</td>';
                            echo '<td>' . $row['tgl_report'] . '</td>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '</tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <h2 class="text-center mt-5">Daftar Akun</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($akun_row = mysqli_fetch_assoc($akun_result)) {
                            echo '<tr>';
                            echo '<td>' . $akun_row['id'] . '</td>';
                            echo '<td>' . $akun_row['username'] . '</td>';
                            echo '<td>';
                            if ($akun_row['id'] != $_SESSION['id']) {
                                $query_admin_check = "SELECT is_admin FROM akun WHERE id = " . $akun_row['id'];
                                $admin_result = mysqli_query($connection, $query_admin_check);
                                $admin_row = mysqli_fetch_assoc($admin_result);
                                $is_admin = $admin_row['is_admin'];
                                echo ($is_admin == 1) ? '<a href="../admin/crud.php?id=' . $akun_row['id'] . '" class="btn btn-success">Copot Admin</a> ' : '<a href="../admin/crud.php?id=' . $akun_row['id'] . '" class="btn btn-success">Jadikan Admin</a> ';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>