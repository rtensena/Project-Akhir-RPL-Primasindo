<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Psikolog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <style>
        body {
            padding-bottom: 3rem;
            background-color: #CBEAE5;
        }

        #btn-logout {
            background: #19a791;
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
                                <a class="nav-link active" href="#">Data Psikolog</a>
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
                        <a href="login.php"><button type="button" class="btn btn-outline-success me-2">Login</button></a>
                        <a href="signup.php"><button type="button" class="btn btn-success" id="btn-signup">Sign-up</button></a>
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
    <div class="container text-center" style="margin-top: 100px;">
        <h1>Daftar Psikolog Primasindo</h1><br><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            include('../koneksi.php');
            $sql    = "SELECT * FROM psikolog ORDER BY nama_psikolog ASC";
            $query    = mysqli_query($connect, $sql);
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col">
                    <div class="card h-100 shadow p-2 mb-5 bg-body rounded">
                        <div style="height: 170px;overflow: hidden;position: relative;" class="rounded">
                            <img src="foto/<?= $data['foto_psikolog']; ?>" class="card-img-top" alt="orang" style="position: absolute;left: -1000%;right: -1000%;top: -1000%;bottom: -1000%;margin: auto;min-height: 100%;min-width: 100%;">
                            <div class="position-absolute top-0 end-0">
                                <a href="" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data['id_psikolog']; ?>"><i class="bi bi-pencil-square"></i></a>
                                <div class="modal fade" id="myModal<?php echo $data['id_psikolog']; ?>" role="dialog" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data Psikolog</h1>
                                                <!-- <button type="button" class="btn-close" data-dismiss="modal">&times;</button> -->

                                                <button type="button" class="btn-close" data-dismiss="modal"></button>
                                            </div>

                                            <form role="form" action="editdokter.php?id_dokter=<?php echo $data['id_psikolog']; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['nama_psikolog']; ?>" name="nama" required="">
                                                        <label for="floatingInput">Nama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['email_psikolog']; ?>" name="email" required="">
                                                        <label for="floatingInput">Email</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['no_telp_psikolog']; ?>" name="telpon" required="">
                                                        <label for="floatingInput">No Telpon</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['no_izin_praktek']; ?>" name="izin" required="">
                                                        <label for="floatingInput">No Izin Praktek</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['spesialis']; ?>" name="spesialis" required="">
                                                        <label for="floatingInput">Spesialis</label>
                                                    </div>
                                                    <div class="form-floating" style="margin: 17px 0px">
                                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="gender" value="<?php echo $data['jenis_kelamin_psikolog']; ?>" required>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <label for="floatingSelect">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput" value="<?php echo $data['umur_psikolog']; ?>" name="usia" required="">
                                                        <label for="floatingInput">Usia</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea style="resize:none;height:150px;" class="form-control" value="<?php echo $data['alamat_psikolog']; ?>" id="floatingTextarea" name="alamat" required="" cols="40" rows="6"><?php echo $data['alamat_psikolog']; ?></textarea>
                                                        <label for="floatingTextarea">Alamat lengkap</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="delete_dokter.php?id_dokter=<?php echo $data['id_psikolog']; ?>"><button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                                    <button type="submit" class="btn btn-primary" value="Upload">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dr. <?= $data['nama_psikolog']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Dokter <?= $data['spesialis']; ?></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $data['jenis_kelamin_psikolog']; ?></li>
                                <li class="list-group-item">Usia <?= $data['umur_psikolog']; ?> tahun</li>
                                <li class="list-group-item"><?= $data['alamat_psikolog']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php

        if (isset($_GET['message'])) {
            if ($_GET['message'] == "gagal") { ?>
                <div class="alert alert-danger" role="alert">Data dokter tidak dapat dihapus</div>
        <?php          }
        }
        ?>
    </div>
    <div class="container text-center">
        <div class="row" style="margin-top: 150px;;">
            <div class="col"></div>
            <div class="col col-lg-6" style=" padding: 30px">
                <hr>
                <h1>Input Data</h1>
                <p>Masukan biodata Psikolog</p><br>
                <form action="dokter_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="bambang.." name="nama" required="">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="abcd@example.net" name="email" required="">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="08123456789" name="telpon" required="">
                        <label for="floatingInput">No Telpon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="2653 6253 7216" name="izin" required="">
                        <label for="floatingInput">No Izin Praktek</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Mata, THT, etc.." name="spesialis" required="">
                        <label for="floatingInput">Spesialis</label>
                    </div>
                    <div class="form-floating" style="margin: 17px 0px">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="gender" required>
                            <option value="">Open this select menu</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="floatingSelect">Jenis Kelamin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="30" name="usia" required="">
                        <label for="floatingInput">Usia</label>
                    </div>
                    <div class="form-floating">
                        <textarea style="resize:none;height:150px;" class="form-control" placeholder="Alamat lengkap" id="floatingTextarea" name="alamat" required=""></textarea>
                        <label for="floatingTextarea">Alamat</label>
                    </div>
                    <div class="form-floating" style="margin: 17px 0px">
                        <input style="padding: 35px;" type="file" class="form-control" id="floatingInput" placeholder="file" name="foto" required="required">
                        <label for="floatingInput">Foto</label>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 70px">
                        <button class="btn btn-primary" type="submit" value="Upload">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>