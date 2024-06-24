<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php?message=belum_login");
}

include '../koneksi.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($connect, $sql);
?>
<?php
if (mysqli_num_rows($query)) {
    $data = mysqli_fetch_array($query);
    $_SESSION["id_user"] = $data["id_user"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["password"] = $data["password"];
    $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["no_telp"] = $data["no_telp"];
    $_SESSION["tanggal_lahir"] = $data["tanggal_lahir"];
    $_SESSION["umur"] = $data["umur"];
    $_SESSION["pekerjaan"] = $data["pekerjaan"];
    $_SESSION["jenis_kelamin"] = $data["jenis_kelamin"];
    $_SESSION["alamat"] = $data["alamat"];
    $_SESSION["level"] = $data["level"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <style>
        #btn-logout{
            background: #52BCAB;
            border-radius: 5px;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #CBEAE5;">
        <div class="container">
            <a href="" class="navbar-brand">
                <img src="../gambar/logo_page-0001.jpg" alt="" width="90" class="d-inline-block align-text-top rounded">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <?php
                if ($_SESSION) {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <?php
                        if ($_SESSION['level'] == "client") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../tentang/tentang.php">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../artikel/artikel.php">Artikel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../psikolog/daftar_psikolog.php">Psikolog</a>
                            </li>
                        <?php
                        } elseif ($_SESSION['level'] == "admin") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../dokter/dokter.php">Data Psikolog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../akun/data_akun.php">Data Akun</a>
                            </li>
                            <?php
                        } elseif ($_SESSION['level']=="psikolog") {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../artikel/data_artikel.php">Data Artikel</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../konsultasi/riwayat_konsultasi.php">Riwayat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../akun/tampil_akun.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="btn-logout" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <div class="col-md-3 text-end">
                        <a href="../login.php"><button type="button" class="btn btn-outline-success me-2">Login</button></a>
                        <a href="../signup.php"><button type="button" class="btn btn-success" id="btn-signup">Sign-up</button></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="../logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
                
            </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 60px;">
        <h2 class="text-center">Daftar Layanan</h2>
        <h6 class="text-center">Setiap interaksi dengan pelanggan adalah kesempatan untuk</h6>
        <h6 class="text-center">menciptakan pengalaman yang luar biasa dan membangun</h6>
        <h6 class="text-center">hubungan jangka panjang.</h6><br><br>
        <div class="row row-cols-4 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100 shadow p-2 mb-5 bg-body rounded">
                    <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                        <img src="../gambar/layanan-konseling.png" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -965%;top: -1000%;bottom: -1000%;margin: auto;height: 200px;width: 150px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #52BCAB;">Konseling</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Konseling bukan tentang
                            memberikan jawaban, melainkan
                            membantu orang menemukan
                            jawaban mereka sendiri.</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow p-2 mb-5 bg-body rounded">
                    <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                        <img src="../gambar/layanan-psikotes.png" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -955%;top: -1000%;bottom: -1000%;margin: auto;height: 165px;width: 160px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #52BCAB;">Psikotes</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Psikotes memberikan gambaran mengenai kepribadian dan kemampuan seseorang yang tidak dapat diukur dengan cara lain.</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow p-2 mb-5 bg-body rounded">
                    <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                        <img src="../gambar/layanan-training.png" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -965%;top: -1000%;bottom: -1000%;margin: auto;height: 170px;width: 150px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #52BCAB;">Training</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Training membantu individu untuk memahami diri mereka sendiri dan orang lain dengan lebih baik.</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow p-2 mb-5 bg-body rounded">
                    <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                        <img src="../gambar/layanan-recuitment.png" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -965%;top: -1000%;bottom: -1000%;margin: auto;height: 160px;width: 140px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #52BCAB;">Recruitment</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kesempatan untuk memperkaya tim kita dengan keahlian dan perspektif baru yang dapat membawa inovasi dan pertumbuhan.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>