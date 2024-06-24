<?php 
	include '../koneksi.php';
	$id_dokter		= $_GET['id_dokter'];

	$query = mysqli_query($connect, "DELETE FROM psikolog where id_psikolog=$id_dokter");

	if($query)
	{
		header("Location:dokter.php");
	}
	else{
        header("Location:dokter.php?message=gagal");
	}
?>