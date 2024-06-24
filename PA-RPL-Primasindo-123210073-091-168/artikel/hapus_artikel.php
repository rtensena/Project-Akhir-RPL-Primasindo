<?php 
	include '../koneksi.php';
	$id_artikel		= $_GET['id_artikel'];

	$query = mysqli_query($connect, "DELETE FROM artikel where id_artikel=$id_artikel");

	if($query)
	{
		header("Location:data_artikel.php");
	}
	else{
        header("Location:data_artikel.php?message=gagal");
	}
?>