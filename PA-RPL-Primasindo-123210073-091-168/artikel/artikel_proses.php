<?php
	include '../koneksi.php';

	$id_user	= $_POST['id_user'];
	$judul		= $_POST['judul'];
	$deskripsi	= $_POST['deskripsi'];

	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

    $eks_file = array('pdf','docx','doc');
    $doc_name = $_FILES['file']['name'];
    $size     = $_FILES['file']['size'];
    $eks      = pathinfo($doc_name, PATHINFO_EXTENSION);

	if(!in_array($ext,$ekstensi) ) {
		header("location:dokter.php?alert=gagal_ekstensi");
	}else{
		if($ukuran){		
			$xx = $rand.'_'.$filename;
            $yy = $rand.'_'.$doc_name;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$rand.'_'.$filename);
            move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$rand.'_'.$doc_name);
			mysqli_query($connect, "INSERT INTO artikel VALUES(NULL,'$id_user','$judul',current_timestamp(),'$deskripsi','$yy','$xx')");
			header("location:data_artikel.php?alert=berhasil");
		}else{
			header("location:data_artikel.php?alert=gagak_ukuran");
		}
	}



?>




