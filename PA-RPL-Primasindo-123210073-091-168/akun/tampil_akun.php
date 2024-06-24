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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <style>
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        body {

            padding-bottom: 3rem;
            background-color: #CBEAE5;
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

        .container {
            background-color: #CBEAE5;

        }

        .nav-item {
            color: #000000;
        }

        #btn-signup {
            background: #52BCAB;
        }

        #btn-profile {
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
                        <li class="nav-item">
                            <a class="nav-link" href="../praktek/jadwal_praktek.php">Data Praktek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../artikel/data_artikel.php">Data Artikel</a>
                        </li>
                    <?php
                    } elseif ($_SESSION['level'] == "psikolog") {
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
                        <a class="nav-link active" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="btn-logout" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
                    </li>
                </ul>
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
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img class="mt-5 ms-5" src="../gambar/profile.png" width="300px" alt="">
            </div>
            <div class="col-6">
                <div class="row text-dark mt-4">
                    <div class="col-sm-12 g-4"></div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><img src="../gambar/profil-icon.png" alt="Logo-Profil" width="30" height="24" class="d-inline-block align-text-top"> Profile Anda</h5>
                            <hr>
                            <form action="" method="POST">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="username" value="<?= $data['username'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="nama_lengkap" value="<?= $data['nama_lengkap'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" readonly class="form-control-plaintext" id="email" value="<?= $data['email'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="no_telp" value="<?= $data['no_telp'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="umur" value="<?= $data['umur'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="pekerjaan" value="<?= $data['pekerjaan'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="alamat" value="<?= $data['alamat'] ?>">
                                    </div>
                                </div>
                            </form>
                            <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-light d-block text-light" style="background-color: #52BCAB;">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal">&times;</button> -->

                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>

                <form role="form" action="edit_akun_proses.php" method="POST" enctype="multipart/form-data">
                    <?php
                    include '../koneksi.php';
                    $id_user = $_SESSION['id_user'];
                    $sql    = "SELECT id_user FROM user where id_user = '$id_user'";
                    $query    = mysqli_query($connect, $sql);

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
                    <?php } ?>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['username'] ?>" name="username" required="">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['nama_lengkap'] ?>" name="nama_lengkap" required="">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="<?= $_SESSION['email'] ?>" name="email" required="">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['no_telp'] ?>" name="no_telp" required="">
                            <label for="floatingInput">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" value="<?= $_SESSION['tanggal_lahir'] ?>" name="tanggal_lahir" required="">
                            <label for="floatingInput">Tanggal Lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['umur'] ?>" name="umur" required="">
                            <label for="floatingInput">Umur</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['pekerjaan'] ?>" name="pekerjaan" required="">
                            <label for="floatingInput">Pekerjaan</label>
                        </div>
                        <div class="form-floating" style="margin: 17px 0px">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" value="<?= $_SESSION['jenis_kelamin'] ?>" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <label for="floatingSelect">Jenis Kelamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="<?= $_SESSION['alamat'] ?>" name="alamat" required="">
                            <label for="floatingInput">Alamat</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" value="Upload" style="background:#52BCAB;">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>