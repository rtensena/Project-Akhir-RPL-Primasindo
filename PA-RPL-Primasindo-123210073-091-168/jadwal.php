
<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql1 = "SELECT * FROM jadwal_praktek where id_psikolog = '$id'";
$query = mysqli_query($connect, $sql1);

while ($data = mysqli_fetch_array($query)) {
?>
<option value="<?= $data['id_praktek'] ?>"><?= $data['hari'] ?>, <?= $data['tanggal'] ?>, <?= $data['jam'] ?></option>
<?php
} ?>