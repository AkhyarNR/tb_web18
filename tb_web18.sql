-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2018 pada 14.39
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_web18`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_level` int(2) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `id_prodi` int(3) NOT NULL,
  `kuota_dosen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_dosen`
--
DELIMITER $$
CREATE TRIGGER `isi_login_dosen` AFTER INSERT ON `tb_dosen` FOR EACH ROW INSERT INTO tb_login VALUES (NEW.id_dosen,NEW.id_dosen,2)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gol`
--

CREATE TABLE `tb_gol` (
  `id_gol` int(2) NOT NULL,
  `golongan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_judul`
--

CREATE TABLE `tb_judul` (
  `id_judul` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `pengerjaan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nim` varchar(12) NOT NULL,
  `nama_mhs` varchar(65) NOT NULL,
  `id_prodi` int(3) NOT NULL,
  `id_gol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_mhs`
--
DELIMITER $$
CREATE TRIGGER `isi_login_mhs` AFTER INSERT ON `tb_mhs` FOR EACH ROW INSERT INTO tb_login VALUES (NEW.nim,NEW.nim,1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(3) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Manajemen Informatika'),
(3, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `usulan` varchar(255) NOT NULL,
  `kuota_mhs` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_gol`
--
ALTER TABLE `tb_gol`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indeks untuk tabel `tb_judul`
--
ALTER TABLE `tb_judul`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
