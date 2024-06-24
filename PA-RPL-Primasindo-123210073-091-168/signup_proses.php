<?php
	include 'koneksi.php';

	$username		= $_POST['username'];
	$password		= $_POST['password'];
	$nama			= $_POST['nama_lengkap'];
	$email			= $_POST['email'];
	$no_telp		= $_POST['no_telp'];
	$tanggal_lahir	= $_POST['tanggal_lahir'];
	$umur			= $_POST['umur'];
	$pekerjaan		= $_POST['pekerjaan'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$alamat			= $_POST['alamat'];
	$level			= "client";

	$sql	= "INSERT INTO user VALUES(NULL, '$username', '$password', '$nama', '$email', '$no_telp', '$tanggal_lahir', '$umur', '$pekerjaan', '$jenis_kelamin', '$alamat', '$level')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:login.php");
	} else {
		echo "Input Data Gagal.";
	}
	
?>
