<?php
	include '../koneksi.php';
    
	$nama			= $_POST['nama'];
	$email			= $_POST['email'];
	$telpon			= $_POST['telpon'];
	$izin			= $_POST['izin'];
	$spesialis		= $_POST['spesialis'];
	$gender			= $_POST['gender'];
	$usia			= $_POST['usia'];
	$alamat			= $_POST['alamat'];
	$id_dokter		= $_GET['id_dokter'];

	$sql	= "UPDATE psikolog SET nama_psikolog = '$nama', email_psikolog = '$email', no_telp_psikolog = '$telpon', alamat_psikolog = '$alamat', jenis_kelamin_psikolog = '$gender', umur_psikolog = '$usia', no_izin_praktek = '$izin', spesialis = '$spesialis' WHERE id_psikolog = '$id_dokter';";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:dokter.php?alert=berhasil");
	} else {
		header("location:dokter.php?alert=gagak_ukuran");
	}

	
?>