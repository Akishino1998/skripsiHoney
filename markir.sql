-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2020 pada 03.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_info_kendaraan`
--

CREATE TABLE `ref_info_kendaraan` (
  `id_ref_kendaraan` int(10) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `biaya_per_jam` int(11) NOT NULL DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parkir_keluar`
--

CREATE TABLE `tb_parkir_keluar` (
  `id_parkir_keluar` int(10) NOT NULL,
  `id_parkir_masuk` int(10) NOT NULL,
  `jukir` varchar(50) NOT NULL,
  `tgl_keluar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parkir_masuk`
--

CREATE TABLE `tb_parkir_masuk` (
  `id_parkir_masuk` int(10) NOT NULL,
  `id_kendaraan` int(10) NOT NULL,
  `jukir` varchar(50) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `lat` text DEFAULT NULL,
  `lng` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_parkir_keluar` int(10) NOT NULL,
  `durasi_parkir` varchar(50) NOT NULL,
  `biaya_parkir` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL COMMENT 'Tunai atau non tunai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akun`
--

CREATE TABLE `user_akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akun`
--

INSERT INTO `user_akun` (`username`, `password`, `created_at`, `updated_at`) VALUES
('1', '1', '2020-03-04 16:20:52', '2020-03-04 16:20:53');

--
-- Trigger `user_akun`
--
DELIMITER $$
CREATE TRIGGER `autoFillBiodata` AFTER INSERT ON `user_akun` FOR EACH ROW BEGIN
INSERT INTO user_biodata
SET user_biodata.username = NEW.username;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_biodata`
--

CREATE TABLE `user_biodata` (
  `id_biodata` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT 'none.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_biodata`
--

INSERT INTO `user_biodata` (`id_biodata`, `username`, `nama`, `tgl_lahir`, `no_hp`, `email`, `foto`) VALUES
(1, '1', NULL, NULL, NULL, NULL, 'none.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jukir`
--

CREATE TABLE `user_jukir` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_seri_alat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jukir_biodata`
--

CREATE TABLE `user_jukir_biodata` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT 'none.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kendaraan`
--

CREATE TABLE `user_kendaraan` (
  `id_kendaraan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `noRegistrasi` varchar(50) DEFAULT NULL,
  `namaPemilik` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `merk_type` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `tahunPembuatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ref_info_kendaraan`
--
ALTER TABLE `ref_info_kendaraan`
  ADD PRIMARY KEY (`id_ref_kendaraan`);

--
-- Indeks untuk tabel `tb_parkir_keluar`
--
ALTER TABLE `tb_parkir_keluar`
  ADD PRIMARY KEY (`id_parkir_keluar`),
  ADD KEY `FK_tb_parkir_keluar_tb_parkir_masuk` (`id_parkir_masuk`),
  ADD KEY `FK_tb_parkir_keluar_user_jukir` (`jukir`);

--
-- Indeks untuk tabel `tb_parkir_masuk`
--
ALTER TABLE `tb_parkir_masuk`
  ADD PRIMARY KEY (`id_parkir_masuk`),
  ADD KEY `FK_tb_parkir_masuk_user_kendaraan` (`id_kendaraan`),
  ADD KEY `FK_tb_parkir_masuk_user_jukir` (`jukir`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `FK_tb_pembayaran_tb_parkir_keluar` (`id_parkir_keluar`);

--
-- Indeks untuk tabel `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `FK_user_biodata_user_akun` (`username`);

--
-- Indeks untuk tabel `user_jukir`
--
ALTER TABLE `user_jukir`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_jukir_biodata_user_jukir` (`username`);

--
-- Indeks untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `FK__user_akun` (`username`),
  ADD KEY `FK_user_kendaraan_ref_info_kendaraan` (`jenis_kendaraan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ref_info_kendaraan`
--
ALTER TABLE `ref_info_kendaraan`
  MODIFY `id_ref_kendaraan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_parkir_keluar`
--
ALTER TABLE `tb_parkir_keluar`
  MODIFY `id_parkir_keluar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_parkir_masuk`
--
ALTER TABLE `tb_parkir_masuk`
  MODIFY `id_parkir_masuk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  MODIFY `id_biodata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  MODIFY `id_kendaraan` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_parkir_keluar`
--
ALTER TABLE `tb_parkir_keluar`
  ADD CONSTRAINT `FK_tb_parkir_keluar_tb_parkir_masuk` FOREIGN KEY (`id_parkir_masuk`) REFERENCES `tb_parkir_masuk` (`id_parkir_masuk`),
  ADD CONSTRAINT `FK_tb_parkir_keluar_user_jukir` FOREIGN KEY (`jukir`) REFERENCES `user_jukir` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_parkir_masuk`
--
ALTER TABLE `tb_parkir_masuk`
  ADD CONSTRAINT `FK_tb_parkir_masuk_user_jukir` FOREIGN KEY (`jukir`) REFERENCES `user_jukir` (`username`),
  ADD CONSTRAINT `FK_tb_parkir_masuk_user_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `user_kendaraan` (`id_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `FK_tb_pembayaran_tb_parkir_keluar` FOREIGN KEY (`id_parkir_keluar`) REFERENCES `tb_parkir_keluar` (`id_parkir_keluar`);

--
-- Ketidakleluasaan untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  ADD CONSTRAINT `FK_user_biodata_user_akun` FOREIGN KEY (`username`) REFERENCES `user_akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  ADD CONSTRAINT `FK_user_jukir_biodata_user_jukir` FOREIGN KEY (`username`) REFERENCES `user_jukir` (`username`);

--
-- Ketidakleluasaan untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  ADD CONSTRAINT `FK__user_akun` FOREIGN KEY (`username`) REFERENCES `user_akun` (`username`),
  ADD CONSTRAINT `FK_user_kendaraan_ref_info_kendaraan` FOREIGN KEY (`jenis_kendaraan`) REFERENCES `ref_info_kendaraan` (`id_ref_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
