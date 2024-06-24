<?php
	include 'koneksi.php';

    $id_user        = $_POST['id_user'];
    $id_psikolog    = $_POST['nama']; 
	$nama			= $_POST['nama_lengkap'];
	$jadwal			= $_POST['jadwal'];
    $keluhan        = $_POST['keluhan'];
	$no_telp		= $_POST['no_telp'];
    $status         = "Proses";

    mysqli_query($connect, "INSERT INTO `jadwal_konsul` (`id_konsul`, `id_user`, `id_psikolog`, `nama_lengkap`, `id_praktek`, `tanggal_daftar`, `no_telp`, `keluhan`, `diagnosa`, `tanggal_kontrol`, `biaya_total`, `status`) VALUES (NULL, '$id_user', '$id_psikolog', '$nama', '$jadwal', current_timestamp(), '$no_telp', '$keluhan', '', '', '', '$status')");
    header("location:index.php?message=berhasil");
		
?>