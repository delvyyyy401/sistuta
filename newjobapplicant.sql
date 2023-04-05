-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 07:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newjobapplicant`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `applicant_position` varchar(35) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `applicant_edu` varchar(10) NOT NULL,
  `applicant_speciality` varchar(100) NOT NULL,
  `applicant_cv` varchar(50) NOT NULL,
  `applicant_address` varchar(100) NOT NULL,
  `applicant_info` varchar(50) NOT NULL,
  `applicant_phone` varchar(15) NOT NULL,
  `applicant_email` varchar(50) NOT NULL,
  `submit_date` datetime NOT NULL,
  `action` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `applicant_position`, `applicant_name`, `applicant_edu`, `applicant_speciality`, `applicant_cv`, `applicant_address`, `applicant_info`, `applicant_phone`, `applicant_email`, `submit_date`, `action`) VALUES
(27, 'front end developer', 'Danu Udin', 'S1', 'Ada', 'cv/220997f1492481c0fcbb6957820d5bcc.pdf', 'Adadadad', 'Adadadad', '111111111111', 'danuputra669@gmail.com', '2022-07-14 13:46:42', '0'),
(30, 'Web', 'Yunus Xc', 'S1', 'Website', 'cv/ae2640a1156a64716e71716db6b69e0b.pdf', 'Pontianak', 'Humm', '087886121433', 'yunusancore58@gmail.com', '2022-10-28 00:31:24', '1'),
(31, 'Developer Game', 'Andrew Herald', 'S3', 'Sleeping beauty', 'cv/f73841a9f8498f60efe85f29aae21e91.pdf', 'Ahashashi', 'Iam profesional self hate', '099999999999', 'adkankdnk@gmail.com', '2022-12-20 12:56:48', '1'),
(32, 'Developer Game', 'Edi SS', 'S1', 'Adadad', 'cv/ae4b96199ee1e79cc1d797c3bcb2c1d3.pdf', 'S', 'Daddwd', '1331313131313', 'edifirmanto007@gmail.com', '2022-12-30 16:02:42', '0'),
(33, 'Students Staff', 'Delvy Sandatoding', 'SMA', 'Skill', 'cv/15239066d2b01e17d86e17953224ccd9.pdf', 'Sekaran, Gunung Pati, Semarang City, Central Java 50229', 'Saya cantik', '085343961833', 'delvytsandatoding29@gmail.com', '2023-03-14 22:03:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_job`
--

CREATE TABLE `applicant_job` (
  `id` int(11) NOT NULL,
  `jobname` varchar(50) NOT NULL,
  `requirement` text NOT NULL,
  `close_date` date NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_job`
--

INSERT INTO `applicant_job` (`id`, `jobname`, `requirement`, `close_date`, `img`) VALUES
(279, 'Admisi dan Promosi', 'Dicari mahasiswa volunteer untuk posisi Student Staff untuk keperluan promosi dan sosialisasi terkait informasi UKDW.', '2023-03-19', 'job/797a08f64a19568b93bad8b3e36f2a4f.jpg'),
(280, 'Biro 3', 'Dicari mahasiswa volunteer untuk posisi Student Staff untuk menjadi pusat layanan informasi Biro 3.', '2023-03-19', 'job/0731bfd7e7b9039f4ea0726152719e34.png');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_login`
--

CREATE TABLE `applicant_login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_login`
--

INSERT INTO `applicant_login` (`id`, `username`, `nama`, `email`, `password`) VALUES
(1, 'delvy', 'Delvy', 'delvytsandatoding29@gmail.com', '084e0343a0486ff05530df6c705c8bb4'),
(5, 'delvy401', 'Delvy Tulak Sandatoding', 'delvytsandatoding19@gmail.com', 'delvy');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_scheduling`
--

CREATE TABLE `applicant_scheduling` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `pic` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_scheduling`
--

INSERT INTO `applicant_scheduling` (`id`, `applicant_id`, `alamat`, `tanggal`, `pic`, `telp`) VALUES
(18, 15, 'Graha Nusantara', '2021-02-27 20:00:00', 'Diana', '082999839802'),
(19, 16, 'Graha Nusantara', '2021-02-27 16:24:00', 'Stephanie', '0879392392232'),
(20, 17, 'LT 4 Ruang Black', '2021-06-12 01:18:00', 'p', '12345678900'),
(21, 18, 'vgcgcg', '2021-06-18 10:00:00', 'gjhvv', '0987654321'),
(22, 20, 'Monas', '2022-01-01 10:42:00', '-', '12345678910'),
(23, 25, 'Kloposepuluh rt 03 rw 01', '2021-11-27 12:45:00', 'Uzumaki ujang', '0887766543'),
(24, 26, 'jbjbjbjbjhbm', '2022-06-30 16:10:00', 'nbbbhbhj', '089u8888'),
(25, 28, 'kantor cabang perusahaan x ', '2022-07-22 10:46:00', 'pak syamsudin', '0895687647689'),
(26, 29, 'kantor cabang perusahaan x ', '2022-07-27 10:49:00', 'pak syamsudin', '0895687647689'),
(27, 30, 'pontianak', '2022-10-28 04:37:00', 'Hrd', '0865435544445'),
(28, 31, 'kopi nuri', '2022-12-22 13:00:00', 'daffka', '091817351423'),
(29, 33, 'Sekaran, Gunung Pati, Semarang City, Central Java 50229', '2023-03-16 13:04:00', 'Veronika Tiara', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applicant_job`
--
ALTER TABLE `applicant_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_login`
--
ALTER TABLE `applicant_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_scheduling`
--
ALTER TABLE `applicant_scheduling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_applicant_id` (`applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `applicant_job`
--
ALTER TABLE `applicant_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `applicant_login`
--
ALTER TABLE `applicant_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant_scheduling`
--
ALTER TABLE `applicant_scheduling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
