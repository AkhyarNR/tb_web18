-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2018 pada 03.38
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
-- Struktur dari tabel `tb_aktivasi`
--

CREATE TABLE `tb_aktivasi` (
  `id_aktivasi` int(11) NOT NULL,
  `pengajuan_awal` date NOT NULL,
  `pengajuan_akhir` date NOT NULL,
  `final_awal` date NOT NULL,
  `final_akhir` date NOT NULL
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
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `id_prodi`, `kuota_dosen`) VALUES
(1, 'Taufiq Rizaldi S,ST,MT\r\n', 2, 10);

--
-- Trigger `tb_dosen`
--
DELIMITER $$
CREATE TRIGGER `hapus_login_dosen` AFTER DELETE ON `tb_dosen` FOR EACH ROW BEGIN 
DELETE FROM tb_login WHERE tb_login.username = CONCAT("DOSPEM",OLD.id_dosen);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `isi_login_dosen` AFTER INSERT ON `tb_dosen` FOR EACH ROW BEGIN 
INSERT INTO tb_login Values (CONCAT("DOSPEM",NEW.id_dosen),MD5(CONCAT("DOSPEM",NEW.id_dosen)),2);
END
$$
DELIMITER ;

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
  `password` varchar(50) NOT NULL,
  `id_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `id_level`) VALUES
('DOSPEM1', '1de12d514d1ea99c4d163f82657a151e', 1),
('E31160070', '1b43df1eca970b7acf3a50116f3ddd7a', 3),
('E31160102', '82cd4730a27de37fcf2ea4f1202ffd98', 3),
('E31160131', 'fd9591465277d409d1b94da5fb78103a', 3),
('E31160170', 'aae377ba826c95793e577c96ab8c8946', 3),
('E31160241', '30647378baf645d522a0df160ffe6dcd', 3),
('E31160281', 'f69aa41b3a5e26b38babb517ecbfcdbd', 3),
('E31160290', 'fbf17143fdb8482f3bd557890be7a9da', 3),
('E31160301', '9a9d625de84f2481e3c3cc32c550f72b', 3),
('E31160306', '0da601f6baec5618d19459a1d2bbf79b', 3),
('E31160314', '015c8528d656239244e1829046382117', 3),
('E31160316', '8016c1313c8eb050b7f884083c18bddb', 3),
('E31160320', 'cef55fc12f8d08972b9e2919bc9372cd', 3),
('E31160325', '01690c68baaf49792aa2fd15168fcde5', 3),
('E31160328', '1081a8b5ec1f702913f788ee77c057b6', 3),
('E31160356', '8322c9738896e6634ab42e6933eea4d5', 3),
('E31160395', '8b568645de08592b491d76b5412ff229', 3),
('E31160417', '28cdf93dc73d586487920de46c4eab43', 3),
('E31160419', 'faf0ea14f9cc193cb69bb9853069d6b1', 3),
('E31160434', 'dc4bfd7ed13b80cd59ebbfc137ee28fe', 3),
('E31160458', 'a72138f661f068e883293cf20f207edd', 3),
('E31160524', '90dc9ece03eeaf7994079ee42854913e', 3),
('E31160548', 'bb464290ef28f61a1421ee64f4c913a2', 3),
('E31160553', 'eea15bccb52d8a82f22f6cf791729a7f', 3),
('E31160570', '8deec8535abd3760f7180dcfdc423736', 3),
('E31160622', 'ceec7be7a29dfbb406264c303d64859f', 3),
('E31160678', '0ae87234f91f71dc0b157f4c91ec6c28', 3),
('E31160686', 'e6b77f45f7b50a2c72ce56112a515baa', 3),
('E31160690', '810b2aca08c2cd647654e04f5b6ab26b', 3),
('E31160702', '02a3500dfc24ee429509307cdde1bcf6', 3),
('E31160707', '538d81292e5866e748b68bb998b74e37', 3),
('E31160722', 'f497f33c80da0c28a16875dda9044d01', 3),
('E31160733', '8590bb89ee43e102c8efe0289637d653', 3),
('E31160786', 'a22495b9fdb4203bbb89abc61a038760', 3),
('E31160787', '982863afa158fc96560d6ad76dbc5d36', 3),
('E31160798', 'b15d85c98c789ab2943a2170d203f55a', 3),
('E31160852', 'c2fe803ca1109eb9127d3a9894cc72c1', 3),
('E31160880', 'feef47f6e27f7adebbeea048ddf7410c', 3),
('E31160901', 'd9959bd92f9af969b30895f028430ac8', 3),
('E31160910', '53590f8be099cffabcb9e8ef2d6b8603', 3),
('E31160935', '631f332073f6faa3a3fcdee06b5db9bb', 3),
('E31161010', 'a0022342d1f2a3a73ff842fda03e7d36', 3),
('E31161033', 'ae7ea4e522ed7918097e1c25b2a95695', 3),
('E31161039', 'b9e88029735d01d6aff370193548117b', 3),
('E31161043', '5c45cf8a8e4ebd36406c2c344394fb27', 3),
('E31161045', '3514a5771e30fdd8df4b491bd931382f', 3),
('E31161048', 'f7302c54650f444fc484f62733105d70', 3),
('E31161055', 'b7a06f760c235cbcea1edd6e5b0e5d39', 3),
('E31161081', '7567eebf0e1b62d7dac058505390283a', 3);

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
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`nim`, `nama_mhs`, `id_prodi`, `id_gol`) VALUES
('E31160070', 'Marera Putri Manusakerti', 2, 1),
('E31160102', 'Muhammad Fauzan', 2, 1),
('E31160131', 'Bahrullah ', 2, 1),
('E31160170', 'Dimas Fatah Hilla', 2, 1),
('E31160241', 'Rizki Firmansyah', 2, 1),
('E31160281', 'Anggrika Amelia Yuliastanti', 2, 1),
('E31160290', 'Vira Nanda Firmansyah', 2, 1),
('E31160301', 'Imelda Inka Tristati', 2, 1),
('E31160306', 'Faiqotul Hikmah', 2, 1),
('E31160314', 'Ahmad Farhan Aditia', 2, 1),
('E31160316', 'Firda Agustin', 2, 1),
('E31160320', 'Nanda Dana Aldhan', 2, 1),
('E31160325', 'Metty Anugrah Heny', 2, 1),
('E31160328', 'Afega Wira Pradana', 2, 1),
('E31160356', 'Firhan Iruhan Zain Abiyit', 2, 1),
('E31160395', 'Dinda Ayu Pujiningtiyas', 2, 1),
('E31160417', 'Devi Ika Putri Purwasih', 2, 1),
('E31160419', 'Meliana Monica Devi', 2, 1),
('E31160434', 'Bagus Setyo Erianto', 2, 1),
('E31160458', 'Nadiyah Neswari', 2, 1),
('E31160524', 'Muhammad Afan Sifa\'Ul Qulub', 2, 1),
('E31160548', 'Anggara Dwi Kardina Putra', 2, 1),
('E31160553', 'Donny Pratama Yunior', 2, 1),
('E31160570', 'Sofyan As Tsauri', 2, 1),
('E31160622', 'Gilang Anugrah', 2, 2),
('E31160678', 'Rizka Nurul Khakiki', 2, 2),
('E31160686', 'Laras Devi Yanti', 2, 2),
('E31160690', 'Zainal Abidin', 2, 2),
('E31160702', 'M. Saiful Rizal', 2, 2),
('E31160707', 'M. Taufik Hidayat', 2, 2),
('E31160722', 'Yusril Fathurrohman', 2, 2),
('E31160733', 'Hisyam Haidar Amru', 2, 2),
('E31160786', 'Nanda Septian Ardika', 2, 2),
('E31160787', 'Ghozi Fadhillah Himma', 2, 2),
('E31160798', 'Lukman Harun', 2, 2),
('E31160852', 'Mohammad Imran', 2, 2),
('E31160880', 'Dimas Feby Pranata', 2, 2),
('E31160901', 'Ariwibowo Makruf', 2, 2),
('E31160910', 'Rizky Akbar August Pradana', 2, 2),
('E31160935', 'Risang Ayu Larasati', 2, 2),
('E31161010', 'Siti Sarifatul Lailiyah', 2, 2),
('E31161033', 'Ayu Diyah Purwanti', 2, 2),
('E31161039', 'Ayu Diah Fitri Megawati', 2, 2),
('E31161043', 'Ahmad Hidayat', 2, 2),
('E31161045', 'Chelsea Ramadanti Anisah Putri', 2, 2),
('E31161048', 'Ahmad Fatkhul Arifin', 2, 2),
('E31161055', 'Jeffri Riaviandy', 2, 2),
('E31161081', 'Albertus Guntur Adi Santoso', 2, 2);

--
-- Trigger `tb_mhs`
--
DELIMITER $$
CREATE TRIGGER `hapus_login_mhs` AFTER DELETE ON `tb_mhs` FOR EACH ROW BEGIN 
DELETE FROM tb_login WHERE tb_login.username = OLD.nim;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `isi_login_mhs` AFTER INSERT ON `tb_mhs` FOR EACH ROW INSERT INTO tb_login VALUES (NEW.nim,md5(NEW.nim),3)
$$
DELIMITER ;

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
-- Indeks untuk tabel `tb_aktivasi`
--
ALTER TABLE `tb_aktivasi`
  ADD PRIMARY KEY (`id_aktivasi`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

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
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aktivasi`
--
ALTER TABLE `tb_aktivasi`
  MODIFY `id_aktivasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
