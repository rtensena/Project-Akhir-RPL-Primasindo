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
    <title>Daftar - Daftar Psikolog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <style>
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        body {

            padding-bottom: 3rem;
            color: #5a5a5a;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            margin-bottom: 4rem;
        }

        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 32rem;
        }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        /* rtl:end:ignore */


        /* Featurettes
        ------------------------- */

        .featurette-divider {
            margin: 5rem 0;
            /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        /* rtl:begin:remove */
        .featurette-heading {
            letter-spacing: -.05rem;
        }

        /* rtl:end:remove */

        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 40em) {

            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(218, 34, 34, 0.1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        #judul {
            padding-top: 30px;
        }

        #btn-jadwal {
            margin-top: 40px;
            background: #52BCAB;
            border: none;
        }

        #btn-logout {
            background: #52BCAB;
            border-radius: 5px;
            color: white;
        }

        .container-fluid .row {
            background-color: #CBEAE5;
            padding: 0 200px;
        }

        .nav-item {
            color: #000000;
        }

        #btn-signup {
            background: #52BCAB;
        }
        #btn-profile{
            margin-top: 40px;
            background: #52BCAB;
            border: none;
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
                                <a class="nav-link " href="../layanan/layanan.php">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../tentang/tentang.php">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../artikel/artikel.php">Artikel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  active" href="#">Psikolog</a>
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
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h2>Daftar - Daftar Psikolog</h2>
                <span>Menghadirkan Psikologi - Psikologi terbaik di bidangnya yang<br>senantiasa siap untuk membantu Anda</span>
            </div>
            
        </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
                <?php
                include('../koneksi.php');
                $sql	= "SELECT * FROM psikolog ORDER BY nama_psikolog ASC";
                $query	= mysqli_query($connect, $sql);
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <div class="col-4 mt-5 d-flex justify-content-around">
                    <div class="card" style="width: 23rem;">
                        <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                            <img src="../dokter/foto/<?= $data['foto_psikolog']; ?>" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -1000%;top: -1000%;bottom: -1000%;margin: auto;min-height: 100%;min-width: 100%;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Dr. <?= $data['nama_psikolog']; ?></h5><hr>
                            <p class="card-text text-center">Spesialis <?= $data['spesialis']; ?></p>
                            <img src="../gambar/arrow.png" alt="" style="float:left; margin:0 8px 4px 0;"><p class="card-text"><?= $data['jenis_kelamin_psikolog']; ?></p>
                            <img src="../gambar/arrow.png" alt="" style="float:left; margin:0 8px 4px 0;"><p class="card-text">Usia <?= $data['umur_psikolog']; ?> tahun</p>
                            <img src="../gambar/arrow.png" alt="" style="float:left; margin:0 8px 4px 0;"><p class="card-text">No Praktek : <?= $data['no_izin_praktek']; ?></p>
                        </div>
                    </div>
                </div>                
                <?php } ?>
            </div>
            <?php 
                        
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == "gagal") {?>
                        <div class="alert alert-danger" role="alert">Data dokter tidak dapat dihapus</div>
                    <?php          }                
                }
            ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>