<?php
require_once '../service/database.php';
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../auth/login.php');
}

$id = $_GET['id'];
$query = "DELETE FROM report WHERE id_report = $id AND akun_id = " . $_SESSION['id'];
if (mysqli_query($connection, $query)) {
    header('Location: ../index.php');
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
