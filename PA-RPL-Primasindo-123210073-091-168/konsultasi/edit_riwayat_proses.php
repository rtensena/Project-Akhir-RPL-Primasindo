<?php
include '../koneksi.php';

$id_konsul      = $_POST['id_konsul'];
$keluhan        = $_POST['keluhan'];
$diagnosa       = $_POST['diagnosa'];
$tanggal_kontrol= $_POST['tanggal_kontrol'];
$biaya_total    = $_POST['biaya_total'];
$status         = $_POST['status'];

$sql = "UPDATE jadwal_konsul SET keluhan='$keluhan', diagnosa='$diagnosa', tanggal_kontrol='$tanggal_kontrol', biaya_total='$biaya_total', status='$status' WHERE id_konsul='$id_konsul'";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query)
    header("location: riwayat_konsultasi.php");
else
    echo ("Proses Edit Data Gagal, Silahkan Coba Lagi");