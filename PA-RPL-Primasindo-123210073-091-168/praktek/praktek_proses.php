<?php
	include '../koneksi.php';

	$id_psikolog    = $_POST['nama'];
    $hari           = $_POST['hari'];
    $tanggal        = $_POST['tanggal'];
    $jam            = $_POST['jam'];

	$sql	= "INSERT INTO jadwal_praktek VALUES(NULL, '$id_psikolog', '$hari', '$tanggal', '$jam')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:jadwal_praktek.php");
	} else {
		echo "Input Data Gagal.";
	}
	
?>
