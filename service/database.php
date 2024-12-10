<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pengaduan_masyarakat"; // bikin database pake nama ini dulu ngab

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $pemberitahuan = "Connected successfully";
}
