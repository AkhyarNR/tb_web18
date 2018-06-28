-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2018 pada 07.15
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
-- Struktur dari tabel `tb_bimbingan`
--

CREATE TABLE `tb_bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `id_prodi` int(3) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kuota_mhs` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nip`, `nama_dosen`, `id_prodi`, `no_hp`, `kuota_mhs`) VALUES
(1, '198903292015031001', 'Taufiq Rizaldi S,ST,MT', 2, '081332010455', 10),
(2, '197111151998021000', 'Adi Heru Utomo, S.Kom, M.Kom', 2, '085236010820', 10),
(3, '198606092008122004', 'Nanik Anita M. ,S.ST,MT', 2, '081234909509', 10),
(4, '197709292005011003', 'Didit Rahmat hartadi S.Kom , MT', 2, '085234609168', 10),
(5, '198005172008121002', 'Dwi Putro Sarwo S S.Kom, M.Kom', 2, '085641500007', 10),
(6, '198302032006041003', 'Hendra Yufit Riskiawan, S.Kom, M.Cs', 2, '085649222290', 10),
(7, '197808192005022001', 'Ika Widiastuti, S.ST , MT', 2, '081249794912', 10),
(8, '198106152006041002', 'Syamsul Arifin , S.Kom., M.Cs.', 2, '081249515151', 10),
(9, '197104082001121003', 'Wahyu Kurnia Dewanto,S.Kom, MT', 2, '08125244969', 10),
(10, '198807022016101001', 'Husin, S.Kom., M.MT.', 2, '081338338833', 10),
(11, '198301092017031001', 'Hermawan Arif S.T.,MT.', 2, '081252465655', 10),
(12, '19910429 201710100', 'Faisal Lutfi S.Kom.,M.Kom.', 2, '081136205000', 10),
(13, '197808172003121005', 'Agus Hariyanto ST, M.Kom', 3, '085236986278', 10),
(14, '198510312018031001', 'Victor Phoa ST.,MCs.', 3, '085656067801', 10),
(15, '197808162005011002', 'Beni Widiawan , S.ST, MT', 3, '081336285687', 10),
(16, '197809082005011001', 'Denny Wijanarko, ST,MT', 3, '082334417777', 10),
(17, '197011282003121001', 'Hariyono Rakhmad , S.Pd, M.Kom', 3, '08155905616', 10),
(18, '198101152005011011', 'Nurul Zainal Fanani, S.ST, MT', 3, '081249254949', 10),
(19, '197907032003121001', 'Surateno, S.Kom,M.Kom', 3, '085236752542', 10),
(20, '198406252015041004', 'Bekti Maryuni S,S.Pd.T,M.Kom', 3, '085729491540', 10),
(21, '198603192014031001', 'Fendik Eko Purnomo, S.Pd ,MT', 3, '085730672884', 10),
(22, '197009292003121001', 'Yogiswara ST ,MT', 3, '081249735955', 10),
(23, '199103152017031001', 'Syamsiar Kautsar S.ST., MT.', 3, '081217161711', 10),
(24, '197308312008011003', 'Agus Purwadi ST.,MT.', 3, '08124914740', 10),
(25, '197008311998031001', 'Moh. Munih Dian W, S.Kom,MT', 1, '08123307506', 10),
(26, '197909212005011001', 'I Putu Dody Lesmana, ST,MT', 1, '081250003479', 10),
(27, '197810112005012002', 'Elly Antika, ST, M.Kom', 1, '08124946073', 10),
(28, '197405192003121002', 'Nugroho Setyo Wibowo, ST,MT', 1, '085236329999', 10),
(29, '198012122005011001', 'Prawidya Destarianto , S.Kom ,MT', 1, '085236090999', 10),
(30, '198608022015042002', 'Ratih Ayuninghemi S.ST, M.Kom', 1, '085651152881', 10),
(31, '199112112016101001', 'Khafidurohman A., S.Pd., M.Eng.', 1, '085646418027', 10),
(32, '199205282016102001', 'Bety Etikasari, S.Pd., M.Pd.', 1, '085233975628', 10),
(33, '199203022018032001', 'Zilvanhisna Emka Fitri ST., MT.', 1, '081336959394', 10),
(34, '198511282008121002', 'Aji Seto Arfianto, S.ST, MT', 1, '081232534534', 10),
(35, '198907102015091001', 'Ery Setiawan Julev atmaji,S.Kom,M.Cs', 1, '085648807492', 10),
(36, '199002272015032001', 'Trismayanti Dwi P ,S.Kom, M,Cs', 1, '085859184555', 10),
(37, '197110092003121001', 'Denny Trias Utomo, S,Si, MT', 1, '08113625320', 10),
(40, NULL, '', 0, '', 0);

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
  `deskripsi` text NOT NULL,
  `jenis` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_judul`
--

INSERT INTO `tb_judul` (`id_judul`, `nim`, `judul`, `id_dosen`, `deskripsi`, `jenis`) VALUES
(1, 'E31161636', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1);

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
('DOSPEM10', '5df65229750b0f07f2f83e2f735765bd', 2),
('DOSPEM11', '3f25e9099a678aa360de205dcab2e402', 2),
('DOSPEM12', 'fd65b3740b60e068e7eda93d48300d41', 2),
('DOSPEM13', 'be44ec3669c610d665788f5a8bacfe7d', 2),
('DOSPEM14', 'cae4dbd446217fcfe69c2f77026d2c73', 2),
('DOSPEM15', '220c79446b67c6630e081457d00a8d24', 2),
('DOSPEM16', '9c8543911ab6e3767c1bbf98a96d1e71', 2),
('DOSPEM17', 'd5ddd9b09a9272422a58f7277a9152ef', 2),
('DOSPEM18', '8b7b81874a7797ad4b1bbceb9443a8ad', 2),
('DOSPEM19', '6a735d4d4851c6b792854fde99b22272', 2),
('DOSPEM2', '89a0372a380845f5d38f819b395fe27f', 2),
('DOSPEM20', 'c877dce5948adc35ea539a76dc668e6e', 2),
('DOSPEM21', 'a8448e0c50cf67ae276d6df85b40a282', 2),
('DOSPEM22', 'bd0280ab82613f2f0465487a52d6aecf', 2),
('DOSPEM23', 'a3b7048d58d887a614f9303b095bfbe8', 2),
('DOSPEM24', 'd20cad7d7b3f0620c800a716032064a6', 2),
('DOSPEM25', '6151611a95aa7c4190cfab8c99060fe5', 2),
('DOSPEM26', '85a154c9c11b3b44c2ec31a7dcdea009', 2),
('DOSPEM27', 'a6fa376350a5e7fcdfe04c4812ed4728', 2),
('DOSPEM28', '08c4b60ac4f4703b6c8bad48ca96f131', 2),
('DOSPEM29', '1e39c0b68683d674015bd236ca8e1cc8', 2),
('DOSPEM3', '2e5e821a270afce75d45b014eae38baf', 2),
('DOSPEM30', '0b63e36e3598e1558770b3b17bc14fe2', 2),
('DOSPEM31', 'cd0b99ded9e387eccba9e0d997c3334f', 2),
('DOSPEM32', 'adf53e3d4c7ff9b624f759a9b65805ed', 2),
('DOSPEM33', '79dfd0cde709174b62ebbd1394d11992', 2),
('DOSPEM34', '10ccd5cd1914cc744c4e115f2316d108', 2),
('DOSPEM35', 'ffe355e2cc2b18969c6f2a17c8893008', 2),
('DOSPEM36', '8194e09bc6b07fe17ebd30e7054e776e', 2),
('DOSPEM37', '9c9e6f5636a31bec94d19353c4919474', 2),
('DOSPEM4', 'ebd4da2f5a7f4e374d17b36ec5e90f7e', 2),
('DOSPEM40', '82c01bc2b61bf8ac2c97f5576736070c', 2),
('DOSPEM5', 'c4fb8ea7149a53d74850248a0fc5203b', 2),
('DOSPEM6', '55663661c81942a63708b52855c956a6', 2),
('DOSPEM7', 'ca091cbe61c2479afb1b5b2f4a82682f', 2),
('DOSPEM8', '3daafd72c275982da9934fe00a778fab', 2),
('DOSPEM9', 'd4f4562c5dba8de43d01a3dd3ef074d8', 2),
('E31150493', '15ca84aac73d2e01c22e94bb15b17d10', 3),
('E31151409', '2c5dd3f907625286fccdd2fc8c190fbd', 3),
('E31151415', '48a4ce9e6e929d59f1ca70a0755ae8b6', 3),
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
('E31161081', '7567eebf0e1b62d7dac058505390283a', 3),
('E31161083', '2e599c825bc67020786c78aa36f6d1aa', 3),
('E31161084', 'da9e01f2994d255e67bb35bff230d90e', 3),
('E31161086', '60ee890db3090b5fce62d579fbff6a3b', 3),
('E31161087', '365d38fa69a7e638e7026bfa903f4415', 3),
('E31161156', 'a026c9d84df65e2aa68cb4deb7f3ba0d', 3),
('E31161167', 'b08942905101777036a681c896f6ea6d', 3),
('E31161169', '2d73b732e7c58321094e63bae7a5ceda', 3),
('E31161193', '9e8335496c542319642fcf0849245fa0', 3),
('E31161214', '3d5d56cd9d2159e5ce399c0df52e360c', 3),
('E31161241', '8c4029f1046dae64ff161d15c05f11bf', 3),
('E31161259', '12a991db8c209629b1b82c662db48679', 3),
('E31161285', '81c0e6c2e125f45aa85dda5ba3d83ea8', 3),
('E31161309', '0a3c82993b97d0f72c4c80fb4abbae83', 3),
('E31161332', '1429fe504b40eb1f770fefda93cf8b2d', 3),
('E31161356', '7a640ae30655175b3303ed53c4da4d40', 3),
('E31161431', 'a2d2d678e4b706e5c0c05c210cbac5ac', 3),
('E31161446', '5a65000669477588ca083793877d44b5', 3),
('E31161457', 'bae1bd3e4ec19560600c04e91f6c6186', 3),
('E31161490', '00dd2b745351d9bc14da9f2a88fb99fd', 3),
('E31161498', '2e01e23a17557a51a41df19aa38267ea', 3),
('E31161509', 'eee2d038ef6d8ce32eb0d1141d0f21d9', 3),
('E31161521', '0997be86a0dd207bf76224f665cf4e8c', 3),
('E31161523', 'f8fdf11f7a87e8b516d1a8e01395e2c2', 3),
('E31161567', '3d1cd093db8f4878fca3e4cd5a9ca72d', 3),
('E31161636', '89782b42ac1876ec83080675e5834b70', 3),
('E31161642', '30605fccae08984ad6ff10881494871d', 3),
('E31161652', '272137ab1bc1c05fe3139d0f91d0a069', 3),
('E31161689', '72d5311b7db42584437f9ef64fce1608', 3),
('E31161703', '724a6ff2838e18644e72cbf6f1fdce5a', 3),
('E31161707', '460b61b6c12e5abf49288244ef6b3891', 3),
('E31161709', '258127cf629186d94c06fd2e1c8afb55', 3),
('E31161719', '4f1fc9d85ec462da225120f7b9a395f3', 3),
('E31161776', 'ed76045d223fe5d25f11ca06821762ad', 3),
('E31161812', '350e75f58b9cb435c70a2b297254c45b', 3),
('E31161816', '1d5894069aadeb7dfbf485620c226a07', 3),
('E31161833', '2da1e65002b8ae6623980c2c81b99c2c', 3),
('E31161956', 'e9105c1a4c23adc1ce3607e2b9e0d827', 3),
('E31161985', 'a4cfed36eb2e3205da471b0f9dfec0af', 3),
('E31162023', '9558edf3bf514bebcfb3914b347289e6', 3),
('E31162041', '247998eafc7d278cf881b62c71813791', 3),
('E31162061', '1ecac5dcbce97c4f8d464f4138de70fd', 3),
('E31162081', 'd10eb92fb91d88dea383a5dd99ed0fa9', 3),
('E31162092', 'f126acb437a8cef62073264b587777aa', 3),
('E31180001', 'baa4c975ef4581654effec88837427ee', 3),
('E31180039', 'f08516c46da9b129a5771ea699e74525', 3),
('E31180040', '17961ad93fc61728f0c95c1c93f19345', 3);

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
('E31150493', 'ARQISTA DWI SEPTYA MUTIARA', 2, 4),
('E31151409', 'Edho Dickey Pharanza Junior', 2, 4),
('E31151415', 'Denny Setiady Prabowo', 2, 4),
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
('E31161081', 'Albertus Guntur Adi Santoso', 2, 2),
('E31161083', 'Angga Maulana Saputra', 2, 3),
('E31161084', 'Desi Nourma Eka Wulandari', 2, 3),
('E31161086', 'Asif Zinda Nihriroh', 2, 3),
('E31161087', 'Mega Wahyu Ningtiyas', 2, 3),
('E31161156', 'Siti Fatimah', 2, 3),
('E31161167', 'Dhita Kusuma Dewi', 2, 3),
('E31161169', 'Ulfatun Nazah', 2, 3),
('E31161193', 'Dinar Suliati Lestari', 2, 3),
('E31161214', 'Suargita Rediana Madasari', 2, 3),
('E31161241', 'Aulia Rafi Dika Pekasih', 2, 3),
('E31161259', 'Putri Oktavia Gupitasari', 2, 3),
('E31161285', 'Syarah Fidia Rosa', 2, 3),
('E31161309', 'Ulul Albab', 2, 3),
('E31161332', 'Putri Wulandari', 2, 3),
('E31161356', 'Muh Fasih A`Robi', 2, 3),
('E31161431', 'Rahmardika Vico Afriansyah', 2, 3),
('E31161446', 'Riska Marita Lisviana', 2, 3),
('E31161457', 'Hasby Asshiddiqy', 2, 3),
('E31161490', 'Furoida Choirunnisa', 2, 3),
('E31161498', 'Prabowo Eddi Sugiarto', 2, 3),
('E31161509', 'Arman Nur Rafiqi', 2, 3),
('E31161521', 'Dimas Bagus Gilang Permana', 2, 3),
('E31161523', 'Rini Puji Lestari', 2, 3),
('E31161567', 'Lutfa Ainul Hasanah', 2, 4),
('E31161636', 'Akhyar Nur Rahmadhan', 2, 4),
('E31161642', 'Moh Azman', 2, 4),
('E31161652', 'Decha Putri Landungsari', 2, 4),
('E31161689', 'Abdillah Syaifuddin Basarsah', 2, 4),
('E31161703', 'Lilik Widayanti', 2, 4),
('E31161707', 'Nurul Lailatul Jannah', 2, 4),
('E31161709', 'Galung Reinan Artanca', 2, 4),
('E31161719', 'Reza Septia Safirah', 2, 4),
('E31161776', 'Wildan Faizal Imawan', 2, 4),
('E31161812', 'Defredo Oyvind Yogaprawira', 2, 4),
('E31161816', 'Dhimas Ulfa Lathifah', 2, 4),
('E31161833', 'Ivanda Afrizal Aldifriansyah', 2, 4),
('E31161956', 'Indah Nur Rizqi Rahmadani', 2, 4),
('E31161985', 'Nanda Wyapeksa', 2, 4),
('E31162023', 'Fadillah Sari', 2, 4),
('E31162041', 'Fandi Ahmad Rifqi', 2, 4),
('E31162061', 'Rifqi Widiarko', 2, 4),
('E31162081', 'Nailes Tabuni', 2, 4),
('E31162092', 'Khoirul Umam', 2, 4),
('E31180001', 'Nariratih Anggraeni', 2, 5),
('E31180039', 'Branjas Setianto Nugroho', 2, 5),
('E31180040', 'Haries Gatot Andrianto', 2, 5);

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
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`id_review`, `id_judul`, `id_dosen`, `review`, `status`) VALUES
(1, 1, 1, 'Baik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `usulan` varchar(255) NOT NULL,
  `jenis` tinyint(1) NOT NULL,
  `kuota_mhs` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usulan`
--

INSERT INTO `tb_usulan` (`id_usulan`, `id_dosen`, `usulan`, `jenis`, `kuota_mhs`) VALUES
(1, 1, 'Ambil saja', 0, 1),
(2, 1, 'Sistem  pakar penyakit kopi', 0, 1),
(3, 1, 'Game \"si Kancilku\"', 1, 5),
(4, 2, 'Gak jadi ngusulkan', 0, 1),
(5, 1, 'Apa sajalah judulnya', 1, 4),
(6, 9, 'Ini usulan dari saya', 1, 4),
(8, 9, 'Usulan yang kedua dari saya', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aktivasi`
--
ALTER TABLE `tb_aktivasi`
  ADD PRIMARY KEY (`id_aktivasi`);

--
-- Indeks untuk tabel `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip` (`nip`);

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
-- AUTO_INCREMENT untuk tabel `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_judul`
--
ALTER TABLE `tb_judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
