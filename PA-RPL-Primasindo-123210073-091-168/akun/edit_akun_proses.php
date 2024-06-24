<?php
include '../koneksi.php';

$id_user        = $_POST['id_user'];
$username       = $_POST['username'];
$nama_lengkap   = $_POST['nama_lengkap'];
$email          = $_POST['email'];
$no_telp	    = $_POST['no_telp'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$umur           = $_POST['umur'];
$pekerjaan      = $_POST['pekerjaan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];

$sql = "UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email ='$email', no_telp='$no_telp', tanggal_lahir='$tanggal_lahir', umur='$umur', pekerjaan='$pekerjaan', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id_user='$id_user'";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query)
    header("location: tampil_akun.php");
else
    echo ("Proses Edit Data Gagal, Silahkan Coba Lagi");