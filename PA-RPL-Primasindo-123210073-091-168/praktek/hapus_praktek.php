<?php 
	include '../koneksi.php';
	$id_praktek		= $_GET['id_praktek'];

	$query = mysqli_query($connect, "DELETE FROM jadwal_praktek where id_praktek=$id_praktek");

	if($query)
	{
		header("Location:jadwal_praktek.php");
	}
	else{
        header("Location:jadwal_praktek.php?message=gagal");
	}
?>