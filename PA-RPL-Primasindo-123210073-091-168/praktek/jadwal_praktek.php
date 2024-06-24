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
    <title>Data Praktek</title>
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
                                <a class="nav-link" href="../dokter/dokter.php">Data Psikolog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../akun/data_akun.php">Data Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../praktek/jadwal_praktek.php">Data Praktek</a>
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
        <h1>Master Data Jadwal Praktek</h1><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Psikolog</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">jam</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include('../koneksi.php');
                                    $sql    = "SELECT * FROM jadwal_praktek INNER JOIN psikolog ON jadwal_praktek.id_psikolog=psikolog.id_psikolog ORDER BY nama_psikolog ASC";
                                    $query    = mysqli_query($connect, $sql);
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tbody class="table-group-divider">
                                            <tr>
                                                <td><?= $data['id_praktek'] ?></td>
                                                <td><?= $data['nama_psikolog'] ?></td>
                                                <td><?= $data['hari'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['jam'] ?></td>
                                                <td><a href="" data-toggle="modal" data-target="#ModalEdit<?php echo $data['id_praktek']; ?>" class="btn btn-warning" style="font-size: small;"><i class="bi bi-pencil-square"></i></a></td>
                                                <td><a href="hapus_praktek.php?id_praktek=<?php echo $data['id_praktek']; ?>" class="btn btn-danger" style="font-size: small;"><i class="bi bi-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                        <div class="modal fade" id="ModalEdit<?php echo $data['id_praktek']; ?>" role="dialog" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data Praktek</h1>
                                                        <!-- <button type="button" class="btn-close" data-dismiss="modal">&times;</button> -->

                                                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                                                    </div>

                                                    <form role="form" action="edit_praktek.php?id_praktek=<?php echo $data['id_praktek']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['nama_psikolog']; ?>" name="nama_psikolog" required="" disabled>
                                                                <label for="floatingInput">Nama Psikolog</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['hari']; ?>" name="hari" required="">
                                                                <label for="floatingInput">Hari</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="date" class="form-control" id="floatingInput" value="<?php echo $data['tanggal']; ?>" name="tanggal" required="">
                                                                <label for="floatingInput">Tanggal</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="time" class="form-control" id="floatingInput" value="<?php echo $data['jam']; ?>" name="jam" required="">
                                                                <label for="floatingInput">Jam</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" value="Upload">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

        if (isset($_GET['message'])) {
            if ($_GET['message'] == "gagal") { ?>
                <div class="alert alert-danger" role="alert">Jadwal praktek tidak dapat dihapus</div>
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
                <p>Masukan Jadwal Praktek</p><br>
                <form action="praktek_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="form-floating" style="margin: 17px 0px">
                        <select class="form-select" name="nama" id="nama" aria-label="Floating label select example" value="" required>
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
                        <label for="nama">Nama Psikolog</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="hari" required="">
                        <label for="floatingInput">Hari</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInput" placeholder="" name="tanggal" required="">
                        <label for="floatingInput">Tanggal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" id="floatingInput" placeholder="" name="jam" required="">
                        <label for="floatingInput">Jam</label>
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