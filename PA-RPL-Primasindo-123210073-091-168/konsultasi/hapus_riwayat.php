<?php
include '../koneksi.php';
$id_konsul = $_GET['id_konsul'];

$sql = "DELETE FROM jadwal_konsul WHERE id_konsul = '$id_konsul'";
$query = mysqli_query($connect, $sql);

if ($query)
    header("location: riwayat_konsultasi.php");
else
    echo ("Proses Hapus Data Gagal, Silahkan Coba Lagi");
?>