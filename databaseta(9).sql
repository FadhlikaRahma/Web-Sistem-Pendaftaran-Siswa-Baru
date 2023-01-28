-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 07:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseta`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'user1', '$2y$10$KlzkNDbnNPbp.LksI0J3TOKvH6NdZcmqDT4hnOxlTDQvP9nAF9DvG', 'user'),
(2, 'admin1', '$2y$10$9fK432V6QxijTJH0MKJWnOd.fgMSYMDR7y0Brb2IoH0ewvc6Rpp.W', 'admin'),
(34, 'rahma', '$2y$10$1CFx631JJuOXie/bqBppfel5EEUIGKGVnSNqs4mPJeChyYWqqa5Dm', 'user'),
(36, 'baru', '$2y$10$jKN94AfuQwX.KSAIMlBQwuXWbLGdtw40nDnBLebHMQOdM1264j5Xy', 'user'),
(37, 'ada', '$2y$10$W7lZmpCwV7NGDskfjw/eQ.jvS3KfpkUjnkss4PWDtG.nRqEvgm7Uu', 'user'),
(38, 'test', '$2y$10$IAol4KF86aRGudvXVvrAk.aiySFWvGGjCX3.i0km08NFt9vL6SyVG', 'user'),
(39, 'testt', '$2y$10$pM6kZ2kMePhVWsL0ZdPzc.garvZh5vnPOkCbA2AXfa94O5o8AEIN.', 'user'),
(40, 'yanto', '$2y$10$1fb5IzyBek24AUAMxsR.a.ne/Qg5JN4dtxHrf63VTn0mOso3PMD3K', 'user'),
(43, 'padli', '$2y$10$6I7XRsJTHcCsRbHPCUArOe6S1hGFltQ2W89tJfDdyKqTubAXvZGx6', 'user'),
(45, 'SHIFA', '$2y$10$R1djKcUa5Vt2EmLlXGCzXeU2i4QtdP4LJ.GAjLB6nemIy87GSq/bC', 'user'),
(46, 'uswatun', '$2y$10$GxGzJsBdSGb7UghXi2gbz.mAePh8dNsrVGOS/U3.cMkB.AU2NP3TG', 'user'),
(47, 'azza', '$2y$10$2xSpk.t0rgqRZSmA5ul9D.WXTNlChz7y97IqSqnqaW5Gbxrh8E8aS', 'user'),
(48, 'ayrani', '$2y$10$IoFmFqasxBNr1o0rDa4BnOXA5oixboDH6adIyolwdfrWJhJysQw4y', 'user'),
(49, 'ramanda', '$2y$10$Dhm6Kx9fTx1FGEw7l0SE0erkcmr.Fh4BYVekQTzx9XJmuzir7OIcS', 'user'),
(50, 'kerah', '$2y$10$W8McefEgTF/g/A3YTCa3AuChD7KLh/W2NCLP3G2tJ6OnBxDI9dK62', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `akun_calonsiswa`
--

CREATE TABLE `akun_calonsiswa` (
  `id_akun` int(15) NOT NULL,
  `nisn` int(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_calonsiswa`
--

INSERT INTO `akun_calonsiswa` (`id_akun`, `nisn`, `nama`, `email`, `password`, `gambar`) VALUES
(11, 1, 'rahma', '1', '$2y$10$Zf4P.dF/1mkxZVDT2MTMPOO9u/b9kkInw/4bytPnO4OBuw7lOyWmW', '');

-- --------------------------------------------------------

--
-- Table structure for table `berkas_calon_siswa`
--

CREATE TABLE `berkas_calon_siswa` (
  `id_berkas` int(15) NOT NULL,
  `akta` varchar(100) NOT NULL,
  `kk` varchar(15) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `nisn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calonsiswa`
--

CREATE TABLE `calonsiswa` (
  `nisn` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_daftar` year(4) NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak','') NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `no_hp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_hp_ibu` varchar(15) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `no_hp_wali` varchar(15) NOT NULL,
  `foto_calonsiswa` varchar(50) NOT NULL,
  `akta` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `bahasa` int(10) NOT NULL,
  `mtk` int(10) NOT NULL,
  `ipa` int(10) NOT NULL,
  `nilai_akhir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calonsiswa`
--

INSERT INTO `calonsiswa` (`nisn`, `id_user`, `nama`, `jenis_kelamin`, `asal_sekolah`, `tanggal_lahir`, `agama`, `alamat`, `no_hp`, `tanggal_daftar`, `status`, `nama_ayah`, `no_hp_ayah`, `nama_ibu`, `no_hp_ibu`, `nama_wali`, `no_hp_wali`, `foto_calonsiswa`, `akta`, `kk`, `ijazah`, `bahasa`, `mtk`, `ipa`, `nilai_akhir`) VALUES
(111, 36, 'rahma', 'laki-laki', 'SD Negeri 1 Gembuk', '2022-11-30', 'Islam', ' pacitan', '098975575', 2022, 'Menunggu', 'ayah', '12', 'ibu', '21', 'wali', '32', '63982790aa29a.jpg', '63982790aa2a0.jpg', '63982790aa2a1.jpg', '63982790aa2a2.jpg', 4, 4, 4, 12),
(121, 34, 'fadhlikarahma', 'perempuan', 'SD Negeri 2 Gembuk', '2022-12-01', 'Islam', ' desa bangungsari kecamatan kebonangung kabupaten pacitan jawa timur indonesia', '089541342053', 2022, 'Diterima', 'ayah', '033', '098978', '098978', 'wali', '0230', '639bbc0d35939.jpg', '6397f75646727.jpg', '6397f72bbd95d.jpg', '6397f72bbd95e.jpg', 12, 12, 1, 25),
(321, 37, 'ada', 'laki-laki', 'adaada', '2022-12-18', 'Kristen', ' adadadadada', '21121', 2022, 'Menunggu', 'asd', '1', 'fwe', '12', 'ew', '212', '6398de36b3afb.jpg', '6398de36b3bc2.jpg', '6398de36b3bc4.jpg', '6398de36b3bc5.jpg', 2, 2, 2, 6),
(555, 38, 'faafa', 'perempuan', 'ad', '2022-12-14', 'Islam', ' a', '1', 2022, 'Diterima', 'w', '1', 'w', '1', 'w', '1', '639c0fbe38c42.jpg', '639c0fa7080ce.jpg', '639c0fa7080cf.jpg', '639c0fa7080d0.jpg', 5, 5, 5, 15),
(51904, 39, 'ra', 'laki-laki', 'sdas', '2022-12-26', 'Katolik', ' dsaa', '123', 2022, 'Menunggu', 'eq', '1', '1', '1', 'w', '1', '63a523e1902a8.png', '63a523e1902ac.png', '63a523e1902ad.png', '63a523e1902ae.png', 6, 7, 1, 14),
(543211, 43, 'padli', 'laki-laki', 'sdadas', '2023-01-17', 'Kristen', ' adassa', '090231', 2023, 'Diterima', 'ayag', '13224', 'rewr', '234', 'fsd', '231', '63be824f435b5.jpg', '63be824f437e9.jpg', '63be824f437eb.jpg', '63be824f437ec.jpg', 21, 21, 12, 54),
(92212402, 46, 'USWATUN KHASANAH', 'perempuan', 'SD NEGERI 3 KALIKUNING', '2009-06-09', 'Islam', ' Mloko, Rt. 1, Rw. 16, Kel. Kalikuning, Kec. Tulakan\r\n', '087793829421', 2022, 'Menunggu', ' Agus Joko Susilo', '082284928402', 'WIWIN ANMAR', '089385912491', 'Pujianto', '087792910593', '63c0d59b2188e.png', '63c0d59b21896.jpg', '63c0d59b21897.jpg', '63c0d59b21898.png', 456, 447, 456, 1359),
(96639318, 45, 'SHIFA AZ SYARA', 'perempuan', 'SD NEGERI 2 KETEPUNG', '2009-03-29', 'Islam', 'Pule, Rt. 4, Rw. 9, Kel. Ketepung, Kec. Kebonagung\r\n', '089541342053', 2022, 'Diterima', 'Muhammad Zaim', '082841847182', 'IRAWATI', '089371924656', 'Syafie', '087723819284', '63c0d34dc5a6d.png', '63c0d2808692c.jpg', '63c0d2808692d.jpg', '63c0d2808692e.png', 460, 449, 454, 1363),
(97284521, 49, 'RAMANDA PUTRI RAMADHANI', 'perempuan', 'SD NEGERI 1 KETEPUNG', '2009-08-31', 'Islam', ' Krajan, Rt. 2, Rw. 3, Kel. Ketepung, Kec. Kebonagung\r\n', '089789275812', 2022, 'Diterima', 'Edwin Nurdiansyah', '082278974912', 'FARIDA', '087757891827', 'Rahadian Rahim', '082289017292', '63c0dc1de3fa9.png', '63c0dc1de3fae.jpg', '63c0dc1de3fb0.jpg', '63c0dc1de3fb1.png', 440, 443, 445, 1328),
(101150670, 48, 'AYRANI FEBYAZTICA', 'perempuan', 'SD NEGERI 2 KETEPUNG', '2010-02-19', 'Kristen', ' Klisat, Rt. 1, Rw. 1, Kel. Tambakrejo, Kec. Pacitan\r\n', '087758910316', 2022, 'Diterima', 'Yopie Roy Munanto', '089543819415', 'Fariska Aztica', '082284910731', 'Wahyu Nugroho', '0894779175815', '63c0daf5f0338.png', '63c0daf5f033d.jpg', '63c0daf5f033e.jpg', '63c0daf5f033f.png', 449, 447, 448, 1344),
(109453644, 47, 'AZZALLIA SYREENE', 'perempuan', 'SD NEGERI 1 KALIKUNING', '2010-05-11', 'Kristen', ' JL. Matahari, Rt. 1, Rw. 6, Kel. Sudimara Pinang, Kec. Pinang, Kab. Tangerang, Banten\r\n', '087783756392', 2022, 'Diterima', 'Friyadi Simamora', '082282749281', 'IYUSTINA', '087758913021', 'Samuel Anderson', '087758924104', '63c0d95e967ea.png', '63c0d95e967f1.jpg', '63c0d95e967f3.jpg', '63c0d95e967f4.png', 449, 451, 450, 1350);

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `nisn` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status` enum('menunggu','diterima','ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_ortu`
--

CREATE TABLE `data_ortu` (
  `id_ortu` int(15) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `no_hp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `no_hp_ibu` varchar(15) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `no_hp_wali` varchar(15) NOT NULL,
  `nisn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `hasil_pendaftaran`
-- (See below for the actual view)
--
CREATE TABLE `hasil_pendaftaran` (
`nisn` int(20)
,`nama` varchar(100)
,`jenis_kelamin` enum('Laki-Laki','Perempuan','','')
,`asal_sekolah` varchar(100)
,`tanggal_lahir` date
,`alamat` varchar(100)
,`no_hp` varchar(15)
,`nama_ayah` varchar(100)
,`no_hp_ayah` varchar(15)
,`nama_ibu` varchar(100)
,`no_hp_ibu` varchar(15)
,`nama_wali` varchar(100)
,`no_hp_wali` varchar(15)
,`akta` varchar(100)
,`kk` varchar(15)
,`ijazah` varchar(100)
,`bahasa_indonesia` float
,`Matematika` float
,`ipa` float
,`nilai_akhir` float
,`status` enum('menunggu','diterima','ditolak','')
);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `bahasa_indonesia` float NOT NULL,
  `Matematika` float NOT NULL,
  `ipa` float NOT NULL,
  `nilai_akhir` float NOT NULL,
  `nisn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panitia_ppdb`
--

CREATE TABLE `panitia_ppdb` (
  `id_panitia` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panitia_ppdb`
--

INSERT INTO `panitia_ppdb` (`id_panitia`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `hasil_pendaftaran`
--
DROP TABLE IF EXISTS `hasil_pendaftaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hasil_pendaftaran`  AS SELECT `calon_siswa`.`nisn` AS `nisn`, `calon_siswa`.`nama` AS `nama`, `calon_siswa`.`jenis_kelamin` AS `jenis_kelamin`, `calon_siswa`.`asal_sekolah` AS `asal_sekolah`, `calon_siswa`.`tanggal_lahir` AS `tanggal_lahir`, `calon_siswa`.`alamat` AS `alamat`, `calon_siswa`.`no_hp` AS `no_hp`, `data_ortu`.`nama_ayah` AS `nama_ayah`, `data_ortu`.`no_hp_ayah` AS `no_hp_ayah`, `data_ortu`.`nama_ibu` AS `nama_ibu`, `data_ortu`.`no_hp_ibu` AS `no_hp_ibu`, `data_ortu`.`nama_wali` AS `nama_wali`, `data_ortu`.`no_hp_wali` AS `no_hp_wali`, `berkas_calon_siswa`.`akta` AS `akta`, `berkas_calon_siswa`.`kk` AS `kk`, `berkas_calon_siswa`.`ijazah` AS `ijazah`, `nilai`.`bahasa_indonesia` AS `bahasa_indonesia`, `nilai`.`Matematika` AS `Matematika`, `nilai`.`ipa` AS `ipa`, `nilai`.`nilai_akhir` AS `nilai_akhir`, `calon_siswa`.`status` AS `status` FROM (((`calon_siswa` join `data_ortu`) join `berkas_calon_siswa`) join `nilai`) WHERE `calon_siswa`.`nisn` = `data_ortu`.`nisn` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `akun_calonsiswa`
--
ALTER TABLE `akun_calonsiswa`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `nisn` (`nisn`) USING BTREE;

--
-- Indexes for table `berkas_calon_siswa`
--
ALTER TABLE `berkas_calon_siswa`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `calonsiswa`
--
ALTER TABLE `calonsiswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `panitia_ppdb`
--
ALTER TABLE `panitia_ppdb`
  ADD PRIMARY KEY (`id_panitia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `akun_calonsiswa`
--
ALTER TABLE `akun_calonsiswa`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `berkas_calon_siswa`
--
ALTER TABLE `berkas_calon_siswa`
  MODIFY `id_berkas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `calonsiswa`
--
ALTER TABLE `calonsiswa`
  MODIFY `nisn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212121213;

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `nisn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456836;

--
-- AUTO_INCREMENT for table `data_ortu`
--
ALTER TABLE `data_ortu`
  MODIFY `id_ortu` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panitia_ppdb`
--
ALTER TABLE `panitia_ppdb`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_calon_siswa`
--
ALTER TABLE `berkas_calon_siswa`
  ADD CONSTRAINT `berkas_calon_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `calon_siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calonsiswa`
--
ALTER TABLE `calonsiswa`
  ADD CONSTRAINT `calonsiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD CONSTRAINT `data_ortu_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `calon_siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `calon_siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
