-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 11:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapor_bakesbangpol`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(50) NOT NULL,
  `alamat_dinas` varchar(200) NOT NULL,
  `logo_dinas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `dibuat_pada` int(11) DEFAULT NULL,
  `diubah_pada` int(11) DEFAULT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_user`, `id_dinas`, `judul`, `deskripsi`, `tanggal`, `foto`, `alamat`, `lat`, `lng`, `dibuat_pada`, `diubah_pada`, `status`) VALUES
(7, 9, 0, 'Ini Judul dirubah dari web', 'Ini Deskripsi dirubah dari web', '2020-11-16', '4433da76cc3266c6720b88a5282437ed.JPG', 'Jl. Ikan Piranha Atas No.220, Tunjungsekar, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', -7.931307, 112.637392, 1605622307, 1605623433, ''),
(8, 9, 0, 'huru hara', 'tes', '2020-11-20', '5fb73f7422b83.png', 'Unnamed Road, Penarukan, Kec. Kepanjen, Malang, Jawa Timur 65163, Indonesia', -8.1416658, 112.57174909999999, 1605844852, NULL, ''),
(9, 9, 0, 'test', 'jajajjs', '2020-11-23', '5fbb6d136cf33.png', 'Jl. Ikan Piranha Atas Gg. XX No.276, Tunjungsekar, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142, Indonesia', -7.930327, 112.6373381, 1606118675, NULL, ''),
(10, 7, 0, 'test lagi', 'ini deskripsi dari laporan', '2020-11-23', '5fbb6e0b504c0.png', 'Jl. Ikan Piranha Atas Gg. XX No.276, Tunjungsekar, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142, Indonesia', -7.930327, 112.6373381, 1606118923, NULL, ''),
(11, 3, 0, 'eqw', 'wrqw', '2021-06-15', '3f0be0f975d91465f785f25d2f31d8ac.png', 'wqewqe', 2424, -124124, 1623738344, NULL, ''),
(12, 9, 0, 'hh', 'ggg', '2021-06-15', 'jalan-rusak.jpg', 'Unnamed Road, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124, Indonesia', -8.1576877, 113.72292379999999, 1623777375, NULL, ''),
(13, 9, 0, 'Jalan Berlubang Cukup Berbahya', 'Jalan Notohadinegoro selatan Bandara Rusak Parah', '2021-06-15', '60c8e30f102e9.png', 'Unnamed Road, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124, Indonesia', -8.1576877, 113.72292379999999, 1623778063, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `id_user`, `created_at`) VALUES
(2, 3, 1605088444),
(3, 3, 1605088588),
(4, 3, 1605101582),
(5, 3, 1605101765),
(7, 3, 1605102272),
(9, 3, 1605169269),
(11, 3, 1605170476),
(13, 3, 1605171607),
(15, 3, 1605180218),
(17, 3, 1605180311),
(18, 3, 1605183434),
(19, 3, 1605184650),
(20, 3, 1605228022),
(22, 3, 1605235040),
(26, 3, 1605235714),
(30, 3, 1605236164),
(33, 3, 1605443266),
(34, 3, 1605443703),
(35, 3, 1605444613),
(36, 3, 1605503391),
(37, 3, 1605503397),
(38, 3, 1605516095),
(39, 7, 1605516204),
(40, 7, 1605518500),
(41, 7, 1605518539),
(42, 7, 1605582430),
(43, 7, 1605582452),
(44, 3, 1605583434),
(45, 9, 1605583886),
(46, 7, 1605585472),
(47, 7, 1605619557),
(48, 3, 1605622333),
(49, 7, 1605624844),
(50, 7, 1605624925),
(51, 7, 1605627192),
(52, 7, 1605627712),
(53, 7, 1605627853),
(54, 7, 1605829252),
(55, 7, 1605829300),
(56, 7, 1605843822),
(57, 9, 1605843845),
(58, 7, 1605844738),
(59, 9, 1605844783),
(60, 7, 1605844921),
(61, 7, 1605844924),
(62, 9, 1605845110),
(63, 9, 1605845113),
(64, 7, 1605967031),
(65, 7, 1605967039),
(66, 7, 1606112576),
(67, 7, 1606112581),
(68, 7, 1606113780),
(69, 9, 1606118462),
(70, 7, 1606118890),
(71, 7, 1606119460),
(72, 7, 1606183228),
(73, 9, 1606183327),
(74, 7, 1606205441),
(75, 7, 1606205448),
(76, 7, 1606445056),
(77, 7, 1606445056),
(78, 9, 1606445121),
(79, 7, 1606445139),
(80, 7, 1606884969),
(81, 7, 1607427109),
(82, 3, 1623738296),
(83, 3, 1623746672),
(84, 3, 1623776280),
(85, 3, 1623776570),
(86, 9, 1623777256),
(87, 3, 1623777943),
(88, 9, 1623778008),
(89, 3, 1623782628),
(90, 3, 1623787386),
(91, 3, 1623788616),
(92, 3, 1623798958),
(93, 3, 1623801440),
(94, 3, 1623801906),
(95, 3, 1623802329),
(96, 3, 1623821910),
(97, 3, 1623828484);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemberitahuan`
--

CREATE TABLE `tb_pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dibaca` int(2) NOT NULL DEFAULT 0,
  `dibuat_pada` int(11) NOT NULL,
  `diubah_pada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemberitahuan`
--

INSERT INTO `tb_pemberitahuan` (`id_pemberitahuan`, `id_user`, `id_penerima`, `judul`, `deskripsi`, `dibaca`, `dibuat_pada`, `diubah_pada`) VALUES
(20, 7, 9, 'Pemberitahuan Dari Web Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent suscipit volutpat facilisis. Praesent consectetur lectus et gravida faucibus. Vestibulum et facilisis sem. Aenean tincidunt, enim quis ornare consequat, mauris dui volutpat felis, vitae luctus est metus et elit. Donec eleifend iaculis egestas. Etiam nec semper libero. Donec in ultrices arcu. Phasellus sit amet ex vel sapien laoreet scelerisque. Donec eget libero aliquam lorem pharetra porta.\r\n\r\nProin bibendum, dolor at rutrum gravida, velit quam dignissim libero, faucibus ultrices eros augue tristique purus. Proin vitae gravida metus. Praesent et ante tristique, faucibus velit vel, placerat mauris. Phasellus porttitor lobortis posuere. Quisque et ipsum felis. Duis blandit libero nec nibh efficitur, luctus porta enim interdum. Curabitur mollis, dui nec scelerisque ullamcorper, odio erat vulputate purus, et tincidunt justo tellus eget nisi. Integer pellentesque eros eget ipsum pellentesque lobortis. Integer at ex eget dui aliquet iaculis. Mauris sit amet egestas elit, vitae viverra velit. Nam sit amet nisi tempus, dapibus sem quis, facilisis massa. Proin viverra lorem leo, id placerat leo posuere et.', 1, 1605586932, NULL),
(21, 7, 7, 'Pemberitahuan Dari Web Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent suscipit volutpat facilisis. Praesent consectetur lectus et gravida faucibus. Vestibulum et facilisis sem. Aenean tincidunt, enim quis ornare consequat, mauris dui volutpat felis, vitae luctus est metus et elit. Donec eleifend iaculis egestas. Etiam nec semper libero. Donec in ultrices arcu. Phasellus sit amet ex vel sapien laoreet scelerisque. Donec eget libero aliquam lorem pharetra porta.\r\n\r\nProin bibendum, dolor at rutrum gravida, velit quam dignissim libero, faucibus ultrices eros augue tristique purus. Proin vitae gravida metus. Praesent et ante tristique, faucibus velit vel, placerat mauris. Phasellus porttitor lobortis posuere. Quisque et ipsum felis. Duis blandit libero nec nibh efficitur, luctus porta enim interdum. Curabitur mollis, dui nec scelerisque ullamcorper, odio erat vulputate purus, et tincidunt justo tellus eget nisi. Integer pellentesque eros eget ipsum pellentesque lobortis. Integer at ex eget dui aliquet iaculis. Mauris sit amet egestas elit, vitae viverra velit. Nam sit amet nisi tempus, dapibus sem quis, facilisis massa. Proin viverra lorem leo, id placerat leo posuere et.', 1, 1605586932, NULL),
(22, 7, 3, 'Pemberitahuan Dari Web Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent suscipit volutpat facilisis. Praesent consectetur lectus et gravida faucibus. Vestibulum et facilisis sem. Aenean tincidunt, enim quis ornare consequat, mauris dui volutpat felis, vitae luctus est metus et elit. Donec eleifend iaculis egestas. Etiam nec semper libero. Donec in ultrices arcu. Phasellus sit amet ex vel sapien laoreet scelerisque. Donec eget libero aliquam lorem pharetra porta.\r\n\r\nProin bibendum, dolor at rutrum gravida, velit quam dignissim libero, faucibus ultrices eros augue tristique purus. Proin vitae gravida metus. Praesent et ante tristique, faucibus velit vel, placerat mauris. Phasellus porttitor lobortis posuere. Quisque et ipsum felis. Duis blandit libero nec nibh efficitur, luctus porta enim interdum. Curabitur mollis, dui nec scelerisque ullamcorper, odio erat vulputate purus, et tincidunt justo tellus eget nisi. Integer pellentesque eros eget ipsum pellentesque lobortis. Integer at ex eget dui aliquet iaculis. Mauris sit amet egestas elit, vitae viverra velit. Nam sit amet nisi tempus, dapibus sem quis, facilisis massa. Proin viverra lorem leo, id placerat leo posuere et.', 2, 1605586932, NULL),
(23, 7, 9, 'A', 'B', 1, 1606118432, NULL),
(24, 7, 7, 'A', 'B', 1, 1606118432, NULL),
(25, 7, 3, 'A', 'B', 2, 1606118432, NULL),
(26, 3, 9, 'sdgfds', 'dgsd', 1, 1623778557, NULL),
(27, 3, 7, 'sdgfds', 'dgsd', 2, 1623778557, NULL),
(28, 3, 3, 'sdgfds', 'dgsd', 2, 1623778557, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dibuat_pada` varchar(255) NOT NULL,
  `diubah_pada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`id_token`, `id_user`, `token`, `dibuat_pada`, `diubah_pada`) VALUES
(15, 7, '15fb3ecc451ac0', '1605627076', ''),
(17, 9, '160c8dd919af44', '1623776657', ''),
(18, 9, '160c8dddfcbe09', '1623776735', ''),
(19, 9, '160c8de2ec5480', '1623776814', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `level` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `dibuat_pada` int(11) DEFAULT NULL,
  `diubah_pada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `level`, `username`, `email`, `password`, `telepon`, `nik`, `alamat`, `jenis_kelamin`, `foto`, `dibuat_pada`, `diubah_pada`) VALUES
(3, 1, 'Erwin Andriandto', 'denih1360@gmail.com', '$2y$10$OL65cSeqKC19n6qAiNqGquPpDYbnbrniRXRN7qnYtCSn8/PsJqknO', '085157764699', '32052523099', 'KEDIRI UWAW', 'Pria', '6abcdfc0d3e22f789807feb9c0b7b9f0.jpg', 1603115574, 1605516130),
(7, 1, 'Siti Nur', 'nadasthing@gmail.com', '$2y$10$dQZBOSuFp7O8Xo.R2/70FOSXbik/MdqB9UsTnwWcXuBI2Tg15D1sa', '0895387228138', '350999123123', 'JL DIPONEGORO VII NO 73, KALIWATES, JEMBER', 'Pria', '8560a518d4c651413f0f59d90f57f377.jpg', 1605505225, 1605627739),
(9, 2, 'Haris Passaribu', 'buhori100396@gmail.com', '$2y$10$OL65cSeqKC19n6qAiNqGquPpDYbnbrniRXRN7qnYtCSn8/PsJqknO', '0812345676', '3509123332112', 'KALISAT, JEMBER', 'Wanita', 'user-no-image.jpg', 1605508787, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pemberitahuan`
--
ALTER TABLE `tb_pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tb_pemberitahuan`
--
ALTER TABLE `tb_pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemberitahuan`
--
ALTER TABLE `tb_pemberitahuan`
  ADD CONSTRAINT `tb_pemberitahuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD CONSTRAINT `tb_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
