-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 05:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `nip` varchar(10) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_hadir` int(11) NOT NULL,
  `jumlah_sakit` int(11) NOT NULL,
  `jumlah_alfa` int(11) NOT NULL,
  `jumlah_izin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`nip`, `bulan`, `tahun`, `jumlah_hadir`, `jumlah_sakit`, `jumlah_alfa`, `jumlah_izin`) VALUES
('001', 4, 2018, 10, 10, 5, 3),
('001', 9, 2018, 18, 2, 2, 6),
('001', 10, 2018, 10, 7, 1, 8),
('005', 1, 2018, 18, 5, 2, 3),
('005', 9, 2018, 18, 5, 2, 3),
('005', 10, 2018, 10, 10, 5, 3),
('006', 10, 2018, 21, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_anak`
--

CREATE TABLE `data_anak` (
  `id_anak` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `no_akta_anak` varchar(255) NOT NULL,
  `nama_anak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anak`
--

INSERT INTO `data_anak` (`id_anak`, `nip`, `no_akta_anak`, `nama_anak`) VALUES
(1, '001', '0090', 'xi yi man b'),
(2, '002', '0770', 'yu yan'),
(4, '007', '21101996', 'valentino'),
(5, '007', '654', 'lin dan'),
(6, '002', '123', 'min min ho'),
(7, '002', '124', 'liu kang'),
(8, '005', '00021', 'rapi');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(255) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `periode_gaji` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` decimal(10,0) NOT NULL,
  `tunjangan_jabatan` decimal(10,0) NOT NULL,
  `uang_lembur` decimal(10,0) NOT NULL,
  `potongan` decimal(10,0) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `tunjangan_anak` decimal(10,0) NOT NULL,
  `tunjangan_makan` decimal(10,0) NOT NULL,
  `tunjangan_transportasi` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nip`, `periode_gaji`, `tanggal`, `gaji_pokok`, `tunjangan_jabatan`, `uang_lembur`, `potongan`, `status`, `tunjangan_anak`, `tunjangan_makan`, `tunjangan_transportasi`) VALUES
('46', '001', '01-2018', '2018-02-01', '3000000', '10000000', '0', '0', '0', '600000', '0', '0'),
('49', '002', '09-2018', '2018-10-01', '3000000', '10000000', '0', '0', '1', '600000', '0', '0'),
('50', '001', '09-2018', '2018-10-01', '3000000', '10000000', '0', '0', '1', '600000', '0', '0'),
('52', '002', '01-2018', '2018-10-01', '3000000', '10000000', '0', '0', '0', '600000', '0', '0'),
('53', '003', '09-2018', '2018-10-01', '2500000', '400000', '0', '0', '1', '0', '0', '0'),
('55', '004', '09-2018', '2018-10-01', '2500000', '400000', '0', '0', '1', '0', '0', '0'),
('56', '004', '01-2018', '2018-02-01', '2500000', '400000', '0', '0', '1', '0', '0', '0'),
('72', '007', '09-2018', '2018-10-01', '2500000', '5000000', '0', '0', '0', '400000', '0', '0'),
('PG074', '005', '09-2018', '2018-10-01', '2000000', '5000000', '0', '133333', '1', '200000', '270000', '360000'),
('PG075', '005', '08-2018', '2018-10-01', '2000000', '5000000', '0', '133333', '1', '200000', '270000', '360000'),
('PG076', '006', '09-2018', '2018-10-01', '3000000', '10000000', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `tunjangan_jabatan` decimal(10,0) NOT NULL,
  `gaji_pokok` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `tunjangan_jabatan`, `gaji_pokok`) VALUES
('KJ005', 'Manager HRGA', '10000000', '3000000'),
('KJ012', 'Manager Keuangan', '10000000', '3000000'),
('KJ013', 'Staf Redaksi', '5000000', '2500000');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nomor_telpon` varchar(20) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `nomor_telpon`, `kode_jabatan`, `password`, `level`, `foto`) VALUES
('001', 'ridho darmawan', 'Tembilahan', '1996-10-21', 'L', 'Islam', 'jln garuda sakti', '081273836749', 'KJ005', 'ridho', '1', 'assets/images/001.jpg'),
('005', 'rahman aditya', 'selat panjang', '1997-10-10', 'L', 'Islam', 'jln melati', '098765431220', 'KJ013', 'rahman', '3', 'assets/images/005.jpg'),
('006', 'wawan kurniawan', 'duri', '1998-10-10', 'L', 'Islam', 'jln mulya', '089765452345', 'KJ012', 'wawan', '2', 'assets/images/006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `no_surat` varchar(255) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `lama_lembur` int(11) NOT NULL,
  `surat_lembur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`no_surat`, `nip`, `tgl_lembur`, `lama_lembur`, `surat_lembur`) VALUES
('00001', '005', '2018-10-21', 3, 'assets/images/lembur/00001.jpg'),
('001rh', '005', '2018-10-28', 2, 'assets/images/00511-40-40.jpg'),
('009', '001', '2018-10-13', 2, 'assets/images/lembur/009.jpg'),
('1212', '001', '2018-10-11', 1, 'assets/images/lembur/1212.jpg'),
('33333333333', '005', '2018-10-15', 5, 'assets/images/lembur/33333333333.jpg'),
('5', '005', '2018-10-16', 30, 'assets/images/lembur/5.jpg'),
('ffffff', '001', '2018-10-03', 1, 'assets/images/lembur/ffffff.jpg'),
('v3543c453', '001', '2018-10-31', 3, 'assets/images/lembur/v3543c453.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_keluarga`
--

CREATE TABLE `riwayat_keluarga` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `no_akta_nikah` varchar(255) NOT NULL,
  `nm_pasangan` varchar(255) NOT NULL,
  `tgl_nikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_keluarga`
--

INSERT INTO `riwayat_keluarga` (`id`, `nip`, `status`, `no_akta_nikah`, `nm_pasangan`, `tgl_nikah`) VALUES
(2, 'Menikah', 'Menikah', '0087', 'bene', '2018-10-01'),
(8, '007', 'Menikah', '00087', 'li xu yen xi', '2018-10-10'),
(9, 'Menikah', 'Menikah', '121212aas', 'sasasa', '2018-10-01'),
(10, '001', 'Menikah', '1212dee', 'asdfdfdwe', '2018-10-02'),
(11, '005', 'Menikah', '000021', 'puja amelia', '2009-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`nip`,`bulan`,`tahun`);

--
-- Indexes for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `riwayat_keluarga`
--
ALTER TABLE `riwayat_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_anak`
--
ALTER TABLE `data_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `riwayat_keluarga`
--
ALTER TABLE `riwayat_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
