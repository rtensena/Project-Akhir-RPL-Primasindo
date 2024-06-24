<?php 
	include '../koneksi.php';
	$id_user		= $_GET['id_user'];

	$query = mysqli_query($connect, "DELETE FROM user where id_user=$id_user");

	if($query)
	{
		header("Location:data_akun.php");
	}
	else{
        header("Location:data_akun.php?message=gagal");
	}
?>