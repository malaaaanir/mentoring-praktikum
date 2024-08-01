-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2024 pada 11.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentoring`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_asisten_with_references` (IN `p_id_asisten` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_asisten1 = p_id_asisten OR id_asisten2 = p_id_asisten;
    DELETE FROM trs_mentoring WHERE id_asisten_pengganti = p_id_asisten;

    DELETE FROM mst_asisten WHERE id_asisten = p_id_asisten;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_dosen_with_references` (IN `p_id_dosen` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_dosen = p_id_dosen;
    DELETE FROM mst_dosen WHERE id_dosen = p_id_dosen;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_frekuensi_with_mentoring` (IN `p_id_frekuensi` INT)   BEGIN
    SET foreign_key_checks = 0;

    DELETE FROM trs_mentoring WHERE id_frekuensi = p_id_frekuensi;

    DELETE FROM trs_frekuensi WHERE id_frekuensi = p_id_frekuensi;

    SET foreign_key_checks = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_jurusan_with_references` (IN `p_id_jurusan` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_jurusan = p_id_jurusan;
    DELETE FROM mst_kelas WHERE id_jurusan = p_id_jurusan;
    DELETE FROM mst_jurusan WHERE id_jurusan = p_id_jurusan;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kelas_with_references` (IN `p_id_kelas` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_kelas = p_id_kelas;
    DELETE FROM mst_kelas WHERE id_kelas = p_id_kelas;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_matakuliah_with_references` (IN `p_id_matkul` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_matkul = p_id_matkul;
    DELETE FROM mst_matakuliah WHERE id_matkul = p_id_matkul;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_ruangan_with_references` (IN `p_id_ruangan` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_ruangan = p_id_ruangan;
    DELETE FROM mst_ruangan WHERE id_ruangan = p_id_ruangan;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_tahun_with_references` (IN `p_id_tahun` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM trs_frekuensi WHERE id_tahun = p_id_tahun;
    DELETE FROM mst_tahun_ajaran WHERE id_tahun = p_id_tahun;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user_with_references` (IN `p_id_user` INT)   BEGIN
    SET FOREIGN_KEY_CHECKS = 0;

    DELETE FROM mst_asisten WHERE id_user = p_id_user;
    DELETE FROM mst_dosen WHERE id_user = p_id_user;
    DELETE FROM mst_user WHERE id_user = p_id_user;

    SET FOREIGN_KEY_CHECKS = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAsistenDetails` (IN `p_id_user` INT)   BEGIN
    SELECT
        id_asisten,
        stambuk,
        nama_asisten,
        angkatan,
        status,
        jenis_kelamin,
        id_user,
        photo_profil,
        photo_path
    FROM mst_asisten
    WHERE id_user = p_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserDetails` (IN `p_id_user` INT)   BEGIN
    SELECT
        id_user,
        nama_user,
        username,
        password,
        role
    FROM
        mst_user
    WHERE
        id_user = p_id_user;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_asisten`
--

CREATE TABLE `mst_asisten` (
  `id_asisten` int(11) NOT NULL,
  `stambuk` varchar(13) DEFAULT NULL,
  `nama_asisten` varchar(50) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `photo_profil` text DEFAULT NULL,
  `photo_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_asisten`
--

INSERT INTO `mst_asisten` (`id_asisten`, `stambuk`, `nama_asisten`, `angkatan`, `status`, `jenis_kelamin`, `id_user`, `photo_profil`, `photo_path`) VALUES
(1, '13020200103', 'Adam Adnan', '2020', 'Asisten', 'Pria', 2, 'public/img/uploads/Adam Adnan.png', 'TIDAK'),
(2, '13020200318', 'As\'syahrin Nanda', '2020', 'Asisten', 'Pria', 3, 'public/img/uploads/As_syahrin Nanda.jpg', 'TIDAK'),
(3, '13020210048', 'Ahmad Rendi', '2021', 'Asisten', 'Pria', 4, 'public/img/uploads/Ahmad Rendi.JPG', 'TIDAK'),
(4, '13020210287', 'Athar Fathana Rakasyah', '2021', 'Asisten', 'Pria', 5, 'public/img/uploads/Athar Fathana Rakasyah.jpg', 'TIDAK'),
(5, '13020210023', 'Annisa Pratama Putri', '2021', 'Asisten', 'Wanita', 6, 'public/img/uploads/Annisa Pratama Putri.jpg', 'TIDAK'),
(6, '13120210008', 'Muhammad Akbar', '2021', 'Asisten', 'Pria', 7, 'public/img/uploads/Muhammad Akbar.png', 'TIDAK'),
(7, '13120210004', 'Muhammad Dani Arya Putra', '2021', 'Asisten', 'Pria', 8, 'public/img/uploads/Muhammad Dani Arya Putra.jpg', 'TIDAK'),
(8, '13020210134', 'Nasrullah', '2021', 'Asisten', 'Pria', 9, 'public/img/uploads/Nasrullah.jpg', 'TIDAK'),
(9, '13020210205', 'Naufal Abiyyu Supriadi', '2021', 'Asisten', 'Pria', 10, 'public/img/uploads/Naufal Abiyyu Supriadi.jpg', 'TIDAK'),
(10, '13020210242', 'Nirmala', '2021', 'Asisten', 'Wanita', 11, 'public/img/uploads/Nirmala.jpg', 'public/img/signature/Nirmala TTD.png'),
(11, '13020210066', 'Nurul Azmi', '2021', 'Asisten', 'Wanita', 12, 'public/img/uploads/Nurul Azmi.JPG', 'TIDAK'),
(12, '13020210053', 'Imran Afdillah Dahlan', '2021', 'Asisten', 'Pria', 13, 'public/img/uploads/Imran Abdillah.JPG', 'TIDAK'),
(13, '13120210005', 'Furqon Fatahillah', '2021', 'Asisten', 'Pria', 14, 'public/img/uploads/Furqon Fatahillah.jpg', 'TIDAK'),
(14, '13020220227', 'Ahmad Mufli Ramadhan', '2022', 'Calon Asisten', 'Pria', 15, 'TIDAK', 'TIDAK'),
(15, '13020220292', 'Maharani Safwa Andini', '2022', 'Calon Asisten', 'Wanita', 16, 'TIDAK', 'TIDAK'),
(16, '13020220265', 'Farid Wajdi Mufti', '2022', 'Calon Asisten', 'Pria', 17, 'TIDAK', 'TIDAK'),
(17, '13020210093', 'Rahma Puspitasari', '2021', 'Calon Asisten', 'Wanita', 18, 'TIDAK', 'TIDAK'),
(18, '13020220301', 'Julisa', '2022', 'Calon Asisten', 'Wanita', 19, 'TIDAK', 'TIDAK'),
(19, '13020220223', 'Muhammad Alif Maulana. R', '2022', 'Calon Asisten', 'Pria', 20, 'TIDAK', 'TIDAK'),
(20, '13020220183', 'Annisa Uz Zahrah Askar', '2022', 'Calon Asisten', 'Wanita', 21, 'TIDAK', 'TIDAK'),
(21, '13020220081', 'Wahyu Kadri Rahmat Suat', '2022', 'Calon Asisten', 'Pria', 22, 'TIDAK', 'TIDAK'),
(22, '13020210143', 'Berlian Septiani', '2021', 'Calon Asisten', 'Wanita', 23, 'TIDAK', 'TIDAK'),
(23, '13020220323', 'Dewi Ernita Rahma', '2022', 'Calon Asisten', 'Wanita', 24, 'TIDAK', 'TIDAK'),
(24, '13020220109', 'Tazkirah Amaliah', '2022', 'Calon Asisten', 'Wanita', 25, 'TIDAK', 'TIDAK'),
(25, '13020220057', 'Muhammad Afrizaldi Attalah', '2022', 'Calon Asisten', 'Pria', 26, 'TIDAK', 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_dosen`
--

CREATE TABLE `mst_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `photo_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_dosen`
--

INSERT INTO `mst_dosen` (`id_dosen`, `nip`, `nama_dosen`, `photo_path`) VALUES
(1, '0919027301', 'Ir. Purnawansyah, S.Kom.,M.Kom., MTA', 'TIDAK'),
(2, '0922078101', 'Ir. Yulita Salim, S.Kom.,M.T., MTA', 'TIDAK'),
(3, '0031056905', 'Dr. Ir. Hj. Harlinda L., S.Kom.,M.M.,M.Kom., MTA', 'TIDAK'),
(4, '0916108403', 'Poetri Lestari LB, S.Kom., M.T., MTA.', 'TIDAK'),
(5, '0931125911', 'Dr. H. Nukman, M.A', 'TIDAK'),
(6, '0910126901', 'Tasrif Hasanuddin, S.Kom., M.Cs.', 'TIDAK'),
(7, '0428077401', 'Dr. Ir. Dolly Indra, S.Kom.,M.M.SI., MTA', 'TIDAK'),
(8, '0913038506', 'Ir. Herman, S.Kom.,M.Cs., MTA', 'TIDAK'),
(9, '0931018001', 'Ir. Abdul Rachman Manga’, S.Kom.,M.T., MTA', 'TIDAK'),
(10, '0920098801', 'Ir. Huzain Azis, S.Kom.,M.Cs., MTA', 'TIDAK'),
(11, '0917068601', 'Ir. Dedy Atmajaya, S.Kom.,M.Eng., MTA', 'TIDAK'),
(12, '0911098601', 'Ir. Farniwati Fattah, S.T.,M.T., MTA', 'TIDAK'),
(13, '0906078701', 'Mardiyyah Hasnawi, S.Kom.,M.T., MTA', 'TIDAK'),
(14, '0906048205', 'Lilis Nur Hayati, S.Kom.,M.Eng., MTA', 'TIDAK'),
(15, '0922088701', 'Siska Anraeni, S.Kom., M.T.', 'TIDAK'),
(16, '0919056501', 'Ramdan Satra, S.Kom.,M.Kom., MTA', 'TIDAK'),
(17, '0920107601', 'Ir. Muh. Aliyazid Mude, S.Kom.,M.Kom.', 'TIDAK'),
(18, '0915028503', 'Irawati, S.Kom.,M.T., MTA', 'TIDAK'),
(19, '0919018501', 'Ir. St. Hajrah Mansyur, S.Kom.,M.Cs., MTA', 'TIDAK'),
(20, '0926048704', 'Ir. Syahrul Mubarak Abdullah, S.Kom.,M.Kom., MTA', 'TIDAK'),
(21, '0915068601', 'Ir. Nia Kurniati, S.Kom.,M.Kom., MTA', 'TIDAK'),
(22, '0924048501', 'Sugiarti, S.Kom.,M.Kom., MTA.', 'TIDAK'),
(23, '0906128504', 'Ir. Erick Irawadi Alwi, S.Kom.,M.Eng., MTA', 'TIDAK'),
(24, '0921018902', 'Lutfi Budi Ilmawan, S.Kom.,M.Cs., MTA', 'TIDAK'),
(25, '0924069001', 'Ir. Herdianti, S.Si., M.Eng., MTA', 'TIDAK'),
(26, '0922078801', 'Fitriyani Umar, S.Si., M.Eng.', 'TIDAK'),
(27, '0922118003', 'Ir. Lukman Syafie, S.Si., M.Si., MTA', 'TIDAK'),
(28, '0908089202', 'Andi Ulfah Tenripada, S.Kom., M.Kom.', 'TIDAK'),
(29, '2107057202', 'Ihwana As’ad, S.Ag., M.Sc., Ph.D., MTA.', 'TIDAK'),
(30, '1302902', 'Fahmi, S.Kom., M.T', 'TIDAK'),
(31, '0908099401', 'Andi Widya Mufila Gaffar, S.T., M.Kom', 'TIDAK'),
(32, '0911039301', 'Ramdaniah, S.Kom., M.T., MTA', 'TIDAK'),
(33, '0909029203', 'Muhammad Arfah Asis, S.Kom., M.T., MTA', 'TIDAK'),
(34, '0924049303', 'Amaliah Faradibah, S.Kom., M.Kom., MTA., MCF', 'TIDAK'),
(35, '0901019302', 'Dewi Widyawati, S.Kom., M.Kom., MTA', 'TIDAK'),
(36, '0918109501', 'Sitti Rahmah Jabir, M.Sc., MTA., MCF', 'TIDAK'),
(37, '130014', 'Syariful Mujaddid, S.Kom., M.T', 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jurusan`
--

CREATE TABLE `mst_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `singkatan_jurusan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_jurusan`
--

INSERT INTO `mst_jurusan` (`id_jurusan`, `jurusan`, `singkatan_jurusan`) VALUES
(1, 'Teknik Informatika', 'TI'),
(2, 'Sistem Informasi', 'SI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  `frekuensi` varchar(20) DEFAULT NULL,
  `angkatan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_matakuliah`
--

CREATE TABLE `mst_matakuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(12) DEFAULT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `singkatan` varchar(20) DEFAULT NULL,
  `semester` enum('GANJIL','GENAP') DEFAULT NULL,
  `sks` int(3) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_matakuliah`
--

INSERT INTO `mst_matakuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `singkatan`, `semester`, `sks`, `id_jurusan`) VALUES
(1, '1303PPA104', 'Pengantar Teknologi Informasi', 'PTI', 'GANJIL', 3, 1),
(2, '1303PPA105', 'Algoritma dan Pemrograman 1', 'ALPRO1', 'GANJIL', 3, 1),
(3, '1303PPA302', 'Struktur Data', 'SD', 'GANJIL', 3, 1),
(4, '1303PPA304', 'Basis Data II', 'BD2', 'GANJIL', 3, 1),
(5, '1303KKA504', 'Microcontroller ', 'MICRO', 'GANJIL', 3, 1),
(6, '1303KKA713', 'Pemrograman Mobile', 'MOBILE', 'GANJIL', 3, 1),
(7, '1313KKB107', 'Algoritma Pemrograman', 'ALPRO', 'GANJIL', 3, 2),
(8, '1313KKB109', 'Sistem dan Teknologi Informasi ', 'STI', 'GANJIL', 3, 2),
(9, '1313KKB304', 'Jaringan Komputer', 'JARKOM', 'GANJIL', 3, 2),
(10, '1313KKB306', 'Pemrograman Web', 'WEB', 'GANJIL', 3, 2),
(11, '1313KKB309', 'Basis Data II', 'BD2', 'GANJIL', 3, 2),
(12, '1313KKB503', 'Sistem Operasi', 'SO', 'GANJIL', 3, 2),
(13, '1313PPB507', 'Aplikasi Akuntansi', 'AA', 'GANJIL', 3, 2),
(14, '1303KKA203', 'Elektronika Dasar', 'ELEKTRO', 'GENAP', 3, 1),
(15, '1303PPA205', 'Algoritma & Pemrograman 2', 'ALPRO2', 'GENAP', 3, 1),
(16, '1303PPA207', 'Basis Data I', 'BD1', 'GENAP', 3, 1),
(17, '1303KKA403', 'Pemrograman Berorientasi Objek', 'PBO', 'GENAP', 3, 1),
(18, '1303KKA407', 'Jaringan Komputer', 'JARKOM', 'GENAP', 3, 1),
(19, '1303KKA408', 'Pemrograman Web', 'WEB', 'GENAP', 3, 1),
(20, '1313KKB204', 'Basis Data I ', 'BD1', 'GENAP', 3, 2),
(21, '1313KKB205', 'Algoritma & Struktur Data ', 'ASD', 'GENAP', 3, 2),
(22, '1313KKB401', 'Pemrograman Berorientasi Objek', 'PBO', 'GENAP', 3, 2),
(23, '1313KKB402', 'Desain Grafis ', 'DG', 'GENAP', 3, 2),
(24, '1313KKB407', 'Pemrograman Mobile ', 'MOBILE', 'GENAP', 3, 2),
(25, '1313KKB604', 'Multimedia System', 'MS', 'GENAP', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_ruangan`
--

CREATE TABLE `mst_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_ruangan`
--

INSERT INTO `mst_ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Laboratorium IoT'),
(2, 'Laboratorium StartUp'),
(3, 'Laboratorium Data Science'),
(4, 'Laboratorium Computer Vision'),
(5, 'Laboratorium Computer Network'),
(6, 'Laboratorium Multimedia'),
(7, 'Laboratorium Microcontroller'),
(8, 'Laboratorium Riset 1'),
(9, 'Laboratorium Riset 2'),
(10, 'Laboratorium Riset 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_tahun_ajaran`
--

CREATE TABLE `mst_tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_tahun_ajaran`
--

INSERT INTO `mst_tahun_ajaran` (`id_tahun`, `tahun_ajaran`) VALUES
(1, '2023/2024'),
(2, '2024/2025'),
(3, '2025/2026'),
(4, '2026/2027'),
(5, '2027/2028'),
(6, '2028/2029'),
(7, '2029/2030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Fatima A.R. Tuasamu', 'admin@gmail.com', 'admin12345', 'Admin'),
(2, 'Adam Adnan', 'adnan100701@gmail.com', 'iclabs-umi', 'Asisten'),
(3, 'As\'syahrin Nanda', 'syahrinnanda@gmail.com', 'iclabs-umi', 'Asisten'),
(4, 'Ahmad Rendi', 'ahmadrendiajah@gmail.com', 'iclabs-umi', 'Asisten'),
(5, 'Athar Fathana Rakasyah', 'atharfathanarakasyah.iclabs@umi.ac.id', 'iclabs-umi', 'Asisten'),
(6, 'Annisa Pratama Putri', 'ichaicha.iic63@gmail.com', 'iclabs-umi', 'Asisten'),
(7, 'Muhammad Akbar', 'muhakbar1141@gmail.com', 'iclabs-umi', 'Asisten'),
(8, 'Muhammad Dani Arya Putra', 'daniaryap01@gmail.com', 'iclabs-umi', 'Asisten'),
(9, 'Nasrullah', 'nasrullah.devs@gmail.com', 'iclabs-umi', 'Asisten'),
(10, 'Naufal Abiyyu Supriadi', 'naufal.supriadi02@gmail.com', 'iclabs-umi', 'Asisten'),
(11, 'Nirmala', 'malaaaanir@gmail.com', 'iclabs-umi', 'Asisten'),
(12, 'Nurul Azmi', 'nrl.azmi160103@gmail.com', 'iclabs-umi', 'Asisten'),
(13, 'Imran Afdillah Dahlan', 'imranafdillah9c@gmail.com', 'iclabs-umi', 'Asisten'),
(14, 'Furqon Fatahillah', 'furqonfatahillah999@gmail.com', 'iclabs-umi', 'Asisten'),
(15, 'Ahmad Mufli Ramadhan', 'Laxmiwatimaani@gmail.com', 'iclabs-umi', 'Asisten'),
(16, 'Maharani Safwa Andini', 'maharanisafwandini@gmail.com', 'iclabs-umi', 'Asisten'),
(17, 'Farid Wajdi Mufti', 'faridwajedi.m@gmail.com', 'iclabs-umi', 'Asisten'),
(18, 'Rahma Puspitasari', 'rahma86788@gmail.com', 'iclabs-umi', 'Asisten'),
(19, 'Julisa', 'julisabahtiar77@gmail.com', 'iclabs-umi', 'Asisten'),
(20, 'Muhammad Alif Maulana. R', 'muhalif.maulana17@gmail.com', 'iclabs-umi', 'Asisten'),
(21, 'Annisa Uz Zahrah Askar', 'annisauzzahrahaskar@gmail.com', 'iclabs-umi', 'Asisten'),
(22, 'Wahyu Kadri Rahmat Suat', 'wahyusuat101@gmail.com', 'iclabs-umi', 'Asisten'),
(23, 'Berlian Septiani', 'berliansptn@gmail.com', 'iclabs-umi', 'Asisten'),
(24, 'Dewi Ernita Rahma', 'dewiernitarahma@gmail.com', 'iclabs-umi', 'Asisten'),
(25, 'Tazkirah Amaliah', 'tazkirah1804@gmail.com', 'iclabs-umi', 'Asisten'),
(26, 'Muhammad Afrizaldi Attalah', 'Dedeaftrizaldi1003@gmail.com', 'iclabs-umi', 'Asisten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trs_frekuensi`
--

CREATE TABLE `trs_frekuensi` (
  `id_frekuensi` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `frekuensi` varchar(20) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `hari` varchar(25) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_asisten1` int(11) DEFAULT NULL,
  `id_asisten2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trs_mentoring`
--

CREATE TABLE `trs_mentoring` (
  `id_mentoring` int(11) NOT NULL,
  `id_frekuensi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian_materi` text DEFAULT NULL,
  `uraian_tugas` text DEFAULT NULL,
  `hadir` int(11) DEFAULT NULL,
  `alpa` int(11) DEFAULT NULL,
  `status_dosen` varchar(10) DEFAULT NULL,
  `status_asisten1` varchar(10) DEFAULT NULL,
  `status_asisten2` varchar(10) DEFAULT NULL,
  `id_asisten_pengganti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_asisten`
--
ALTER TABLE `mst_asisten`
  ADD PRIMARY KEY (`id_asisten`),
  ADD UNIQUE KEY `stambuk` (`stambuk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `mst_dosen`
--
ALTER TABLE `mst_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `mst_jurusan`
--
ALTER TABLE `mst_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mst_matakuliah`
--
ALTER TABLE `mst_matakuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mst_ruangan`
--
ALTER TABLE `mst_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `mst_tahun_ajaran`
--
ALTER TABLE `mst_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `trs_frekuensi`
--
ALTER TABLE `trs_frekuensi`
  ADD PRIMARY KEY (`id_frekuensi`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_asisten1` (`id_asisten1`),
  ADD KEY `id_asisten2` (`id_asisten2`);

--
-- Indeks untuk tabel `trs_mentoring`
--
ALTER TABLE `trs_mentoring`
  ADD PRIMARY KEY (`id_mentoring`),
  ADD KEY `id_frekuensi` (`id_frekuensi`),
  ADD KEY `id_asisten_pengganti` (`id_asisten_pengganti`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_asisten`
--
ALTER TABLE `mst_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mst_dosen`
--
ALTER TABLE `mst_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `mst_jurusan`
--
ALTER TABLE `mst_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mst_kelas`
--
ALTER TABLE `mst_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_matakuliah`
--
ALTER TABLE `mst_matakuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mst_ruangan`
--
ALTER TABLE `mst_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `mst_tahun_ajaran`
--
ALTER TABLE `mst_tahun_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `trs_frekuensi`
--
ALTER TABLE `trs_frekuensi`
  MODIFY `id_frekuensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trs_mentoring`
--
ALTER TABLE `trs_mentoring`
  MODIFY `id_mentoring` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mst_asisten`
--
ALTER TABLE `mst_asisten`
  ADD CONSTRAINT `mst_asisten_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `mst_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD CONSTRAINT `mst_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `mst_jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `mst_matakuliah`
--
ALTER TABLE `mst_matakuliah`
  ADD CONSTRAINT `mst_matakuliah_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `mst_jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `trs_frekuensi`
--
ALTER TABLE `trs_frekuensi`
  ADD CONSTRAINT `trs_frekuensi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `mst_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mst_matakuliah` (`id_matkul`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `mst_tahun_ajaran` (`id_tahun`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `mst_kelas` (`id_kelas`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_5` FOREIGN KEY (`id_ruangan`) REFERENCES `mst_ruangan` (`id_ruangan`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_6` FOREIGN KEY (`id_dosen`) REFERENCES `mst_dosen` (`id_dosen`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_7` FOREIGN KEY (`id_asisten1`) REFERENCES `mst_asisten` (`id_asisten`),
  ADD CONSTRAINT `trs_frekuensi_ibfk_8` FOREIGN KEY (`id_asisten2`) REFERENCES `mst_asisten` (`id_asisten`);

--
-- Ketidakleluasaan untuk tabel `trs_mentoring`
--
ALTER TABLE `trs_mentoring`
  ADD CONSTRAINT `trs_mentoring_ibfk_1` FOREIGN KEY (`id_frekuensi`) REFERENCES `trs_frekuensi` (`id_frekuensi`),
  ADD CONSTRAINT `trs_mentoring_ibfk_2` FOREIGN KEY (`id_asisten_pengganti`) REFERENCES `mst_asisten` (`id_asisten`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
