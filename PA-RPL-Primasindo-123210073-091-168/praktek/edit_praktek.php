<?php
	include '../koneksi.php';
    
	$id_praktek	= $_GET['id_praktek'];
    $hari       = $_POST['hari'];
    $tanggal    = $_POST['tanggal'];
    $jam        = $_POST['jam'];

	$sql	= "UPDATE jadwal_praktek SET hari = '$hari', tanggal = '$tanggal', jam = '$jam' WHERE id_praktek = '$id_praktek';";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:jadwal_praktek.php");
	} else {
		header("location:dokter.php?alert=gagak_ukuran");
	}
?>