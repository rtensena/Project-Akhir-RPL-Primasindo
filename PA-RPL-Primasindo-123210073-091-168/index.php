<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php?message=belum_login");
}

include 'koneksi.php';

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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Home</title>
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
            background: #19a791;
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
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>

    <!-- <header class="d-flex flex-wrap justify-content-center py-3 border-bottom ps-3"> -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #CBEAE5;">
        <div class="container">
            <a href="" class="navbar-brand">
                <img src="gambar/logo_page-0001.jpg" alt="" width="90" class="d-inline-block align-text-top rounded">

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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <?php
                        if ($_SESSION['level']=="client") {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link " href="layanan/layanan.php">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang/tentang.php">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artikel/artikel.php">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="psikolog/daftar_psikolog.php">Psikolog</a>
                        </li>
                        <?php
                        } elseif ($_SESSION['level']=="admin") {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dokter/dokter.php">Data Psikolog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="akun/data_akun.php">Data Akun</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="praktek/jadwal_praktek.php">Data Praktek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artikel/data_artikel.php">Data Artikel</a>
                        </li>
                        <?php
                        } elseif ($_SESSION['level']=="psikolog") {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="artikel/data_artikel.php">Data Artikel</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="konsultasi/riwayat_konsultasi.php">Riwayat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="akun/tampil_akun.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="btn-logout" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <div class="col-md-3 text-end">
                        <a href="login.php"><button type="button" class="btn btn-outline-success me-2">Login</button></a>
                        <a href="signup.php"><button type="button" class="btn btn-success" id="btn-signup">Sign-up</button></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- </header> -->

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
                    <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>

                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="container-fluid text-dark">
            <div class="row align-items-center pt-4">
                <?php

                if (isset($_GET['message'])) {
                    if ($_GET['message'] == "berhasil") { ?>
                        <div class="alert alert-success" role="alert">Berhasil mendaftar</div>
                <?php          }
                }
                ?>
                <div class="col-6" id="judul">
                    <h2 style="font-size: 55px">Center Of Applied</h2>
                    <h2 style="font-size: 55px">Psychology</h2>
                    <span>Bicarakan isi hatimu, temukan jalan keluar atas masalahmu.</span>
                    <br>
                    <a type="button" class="btn btn-success mt-10" id="btn-jadwal" data-toggle="modal" data-target="#myModal">Jadwalkan Konsultasi</a>
                    <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Jadwalkan Konsultasi</h1>
                                    <!-- <button type="button" class="btn-close" data-dismiss="modal">&times;</button> -->

                                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                                </div>

                                <form role="form" action="jadwal_proses.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                    include 'koneksi.php';
                                    $id_user = $_SESSION['id_user'];

                                    $sql    = "SELECT id_user FROM user where id_user = '$id_user'";
                                    $query    = mysqli_query($connect, $sql);

                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
                                    <?php } ?>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['nama_lengkap'] ?>" name="nama_lengkap" required="">
                                            <label for="floatingInput">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating" style="margin: 17px 0px">
                                            <select class="form-select" name="nama" id="nama" onchange="kota()" aria-label="Floating label select example" value="" required>
                                                <option value=""></option>
                                                <?php
                                                include 'koneksi.php';
                                                $sql1 = "SELECT * FROM psikolog";
                                                $query = mysqli_query($connect, $sql1);
                                                $i = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $data['id_psikolog'] ?>"><?= $data['nama_psikolog'] ?></option>
                                                <?php $i++;
                                                } ?>
                                            </select>
                                            <label for="nama">Psikolog</label>
                                        </div>
                                        <div class="form-floating" style="margin: 17px 0px">
                                            <select class="form-select" id="jadwal" name="jadwal" aria-label="Floating label select example" value="" required>
                                            </select>
                                            <script>
                                                function kota() {
                                                    var nama = $('#nama').val();
                                                    $('#jadwal').load("jadwal.php?id=" + nama + "");
                                                }
                                            </script>
                                            <label for="jadwal">Tanggal Konsultasi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea style="resize:none;height:150px;" class="form-control" placeholder="Keluhan" id="floatingTextarea" name="keluhan" required=""></textarea>
                                            <label for="floatingTextarea">Keluhan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['no_telp'] ?>" name="no_telp" required="">
                                            <label for="floatingInput">No Telpon</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" value="Upload" style="background:#52BCAB;">Jadwalkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center" id="gambar">
                    <img src="gambar/dctre.png" alt="">
                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p>&copy; 2017–2022 Company, PRIMASINDO.</p>
        </footer>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>

</html>