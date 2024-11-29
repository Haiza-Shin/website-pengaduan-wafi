<?php
session_start();
require_once '../service/database.php';

$query = "SELECT * FROM report WHERE akun_id = " . $_SESSION['id'];
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pengaduan Saya</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Pengaduan Saya</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Tanggal report</th>
                            <th scope="col">Aksi</th>
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
                            echo '<td>';
                            echo '<a href="../report/update.php?id=' . $row['id_report'] . '" class="btn btn-success">Update</a> ';
                            echo '<a href="../report/delete.php?id=' . $row['id_report'] . '" class="btn btn-danger">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>