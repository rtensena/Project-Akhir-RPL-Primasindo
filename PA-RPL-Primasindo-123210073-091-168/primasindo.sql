-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 22.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primasindo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl_dibuat` date NOT NULL DEFAULT current_timestamp(),
  `deskripsi` varchar(10000) NOT NULL,
  `file` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_user`, `judul`, `tgl_dibuat`, `deskripsi`, `file`, `thumbnail`) VALUES
(5, 3, 'Tips mengatasi insomnia', '2023-06-11', 'Kiat kiat', '1033779811_Misi4-ERD_RAT_123210073-091-168_PrimaMH_AhlulF_WinalfanAP.pdf', '1033779811_104-1042400_zoom-virtual-background-doraemon.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_konsul`
--

CREATE TABLE `jadwal_konsul` (
  `id_konsul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_psikolog` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `id_praktek` int(11) NOT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `no_telp` varchar(20) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `tanggal_kontrol` date NOT NULL,
  `biaya_total` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_konsul`
--

INSERT INTO `jadwal_konsul` (`id_konsul`, `id_user`, `id_psikolog`, `nama_lengkap`, `id_praktek`, `tanggal_daftar`, `no_telp`, `keluhan`, `diagnosa`, `tanggal_kontrol`, `biaya_total`, `status`) VALUES
(6, 2, 2, 'Prima Maulana Hanan', 2, '2023-06-09 23:55:04', '0812342323525', 'Ovethinking', 'Gangguan kecemasan', '2023-06-30', 'Rp250.000', 'Selesai'),
(7, 2, 3, 'Prima Maulana Hanan', 3, '2023-06-09 23:58:30', '0812342323525', '', '', '0000-00-00', '', 'Proses'),
(8, 2, 2, 'Prima Maulana Hanan', 1, '2023-06-10 00:03:11', '0812342323525', 'Saya susah tidur', 'Gejala insomnia', '2023-06-20', 'Rp200.000', 'Selesai'),
(11, 4, 3, 'Bolang Nande Nande', 3, '2023-06-10 13:31:50', '08965437865', 'Dimarahin dosen jadi takut', 'Gangguan Kecemasan karena dosen galak', '2023-06-15', 'Rp250.000', 'Selesai'),
(13, 7, 2, 'Doni Tata', 2, '2023-06-11 03:05:38', '087754632343', 'Kesulitan tidur', 'Insomnia', '2023-06-20', 'Rp200.000', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_praktek`
--

CREATE TABLE `jadwal_praktek` (
  `id_praktek` int(11) NOT NULL,
  `id_psikolog` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_praktek`
--

INSERT INTO `jadwal_praktek` (`id_praktek`, `id_psikolog`, `hari`, `tanggal`, `jam`) VALUES
(1, 2, 'jumat', '2023-06-09', '16:00:00'),
(2, 2, 'senin', '2023-06-12', '10:00:00'),
(3, 3, 'Kamis', '2023-06-15', '19:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `psikolog`
--

CREATE TABLE `psikolog` (
  `id_psikolog` int(11) NOT NULL,
  `nama_psikolog` varchar(50) NOT NULL,
  `email_psikolog` varchar(50) NOT NULL,
  `no_telp_psikolog` varchar(20) NOT NULL,
  `alamat_psikolog` varchar(255) NOT NULL,
  `jenis_kelamin_psikolog` varchar(20) NOT NULL,
  `umur_psikolog` varchar(5) NOT NULL,
  `no_izin_praktek` varchar(50) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `foto_psikolog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `psikolog`
--

INSERT INTO `psikolog` (`id_psikolog`, `nama_psikolog`, `email_psikolog`, `no_telp_psikolog`, `alamat_psikolog`, `jenis_kelamin_psikolog`, `umur_psikolog`, `no_izin_praktek`, `spesialis`, `foto_psikolog`) VALUES
(2, 'Arsen, S.Psi.', 'arsen@gmail.com', '08126745876', 'moyudan', 'Laki-laki', '36', 'np-123', 'pergamingan', '1860001756_bandou.png'),
(3, 'Ahlul, S.Psi.', 'ahlul@gmail.com', '08126745876', 'suayan', 'Laki-laki', '32', 'np-443', 'percintaan, kuliah, kesaktian', '1477668652_755485-heaven-istock-111818.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(5) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `tanggal_lahir`, `umur`, `pekerjaan`, `jenis_kelamin`, `alamat`, `level`) VALUES
(1, 'admin', 'admin', 'ngademin', 'ngademin@gmail.com', '087798658876', '2023-06-20', '1', 'admin', 'Laki-laki', 'admin', 'admin'),
(2, 'prima', '123', 'Prima Maulana Hanan', 'primamaulanahanan15@gmail.com', '081227362306', '2023-04-15', '20', 'Pelajar', 'Laki-laki', 'Sedayu, Bantul, DIY', 'client'),
(3, 'arsen', '123', 'Arsen, S.Psi.', 'arsen@gmail.com', '081278658890', '1993-06-10', '30', 'Psikolog', 'Laki - laki', 'Moyudan', 'psikolog'),
(4, 'bolang', '123', 'Bolang Nande Nande', 'bolangnande101@gmail.com', '08965437865', '2003-01-24', '20', 'Pengembara', 'Laki-laki', 'Bontang Timur', 'client'),
(6, 'ahlul', '123', 'Ahlul, S.Psi.', 'ahlul@gmail.com', '', '0000-00-00', '', 'Psikolog', 'Laki-laki', 'suayan', 'psikolog'),
(7, 'doni', '123', 'Doni Tata', 'doni@gmail.com', '087754632343', '2023-06-07', '20', 'Mahasiswa', 'Laki-laki', 'Yogyakarta', 'client'),
(8, 'yanto', '123', 'Yanto Ganteng', 'yanto@gmail.com', '089656624234', '2023-06-01', '30', 'Guru', 'Laki-laki', 'Bantul', 'client');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `fk_user1` (`id_user`);

--
-- Indeks untuk tabel `jadwal_konsul`
--
ALTER TABLE `jadwal_konsul`
  ADD PRIMARY KEY (`id_konsul`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_psikolog` (`id_psikolog`),
  ADD KEY `fk_praktek` (`id_praktek`);

--
-- Indeks untuk tabel `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD PRIMARY KEY (`id_praktek`),
  ADD KEY `fk_psikolog1` (`id_psikolog`);

--
-- Indeks untuk tabel `psikolog`
--
ALTER TABLE `psikolog`
  ADD PRIMARY KEY (`id_psikolog`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal_konsul`
--
ALTER TABLE `jadwal_konsul`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  MODIFY `id_praktek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id_psikolog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal_konsul`
--
ALTER TABLE `jadwal_konsul`
  ADD CONSTRAINT `fk_praktek` FOREIGN KEY (`id_praktek`) REFERENCES `jadwal_praktek` (`id_praktek`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_psikolog` FOREIGN KEY (`id_psikolog`) REFERENCES `psikolog` (`id_psikolog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD CONSTRAINT `fk_psikolog1` FOREIGN KEY (`id_psikolog`) REFERENCES `psikolog` (`id_psikolog`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
