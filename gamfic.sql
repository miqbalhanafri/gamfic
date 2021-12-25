-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 08:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamfic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$YojDMmLTPL1Th/AmhJZ7z.eBexjB7YCVauvs53qouw7znKLVls//q');

-- --------------------------------------------------------

--
-- Table structure for table `evaluate`
--

CREATE TABLE `evaluate` (
  `id` int(11) NOT NULL,
  `evaluate_level` varchar(50) NOT NULL,
  `evaluate_waktu` varchar(50) NOT NULL,
  `evaluate_points` varchar(50) NOT NULL,
  `evaluate_reviews` varchar(50) NOT NULL,
  `evaluate_detail` varchar(10000) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluate`
--

INSERT INTO `evaluate` (`id`, `evaluate_level`, `evaluate_waktu`, `evaluate_points`, `evaluate_reviews`, `evaluate_detail`, `user`) VALUES
(1, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Mohon maaf atas ketidaktercapaian.', 4),
(2, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Keren', 4),
(3, 'Ya', 'Tidak', 'Tidak', 'Ya', 'Mantappp.', 3),
(4, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Bagus', 6),
(5, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Motivasi, dsb.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `info_admin`
--

CREATE TABLE `info_admin` (
  `id` int(11) NOT NULL,
  `informasi` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_admin`
--

INSERT INTO `info_admin` (`id`, `informasi`) VALUES
(1, 'Sahabat Global, kali ini anda akan belajar mengenai Cascading Style Sheets (CSS) ya. Apa itu CSS \r\nsilakan simak detailnya pada course.'),
(2, 'Target poin point untuk course ini 3000 points ya sahabat, untuk mendapatkan badge 5 bintang.'),
(3, 'Jangan lupa, pastikan kamu mengisi target pembelajaran yang ingin dicapai ya, plus monitoring, serta berkompetisi dengan yang lainnya. Selamat belajar...!!');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL,
  `jobdesk` varchar(1000) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `jobdesk`, `points`) VALUES
(1, 'Level 1 False ', 100),
(2, 'Level 1 True', 200),
(3, 'Level 2 False', 300),
(4, 'Level 2 True', 400),
(5, 'Update Artikel Website', 500),
(6, 'Update Konten Video (<2 menit)', 400),
(7, 'Update Konten Video (>2 menit)', 700),
(8, 'Input Database Email Blasting (<100 data)', 200),
(9, 'Input Database Email Blasting (>100 data)', 550),
(10, 'Email Blasting ', 600),
(11, 'Update WA Status ', 70),
(12, 'Share Status IG/FB (<10 tag) ', 50),
(13, 'Share Status IG/FB (10 - 50 tag)', 170),
(14, 'Share Status IG/FB (>50 tag) ', 230),
(15, 'Invite Fanspage FB (<10 friends) ', 120),
(16, 'Invite Fanspage FB (>10 friends)', 250),
(17, 'Invite Follow IG (<10 friends) ', 140),
(18, 'Invite Follow IG (>10 friends)', 270),
(19, 'Direct Mail IG/FB (<10 friends)', 260),
(20, 'Direct Mail IG/FB (>10 friends)', 450),
(21, 'Chat Online Web/IG/FB', 60),
(22, 'Share Google Review (<10)', 160),
(23, 'Share Google Review (>10)', 330);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `opsi` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `opsi`, `user`, `keterangan`, `tanggal`) VALUES
(4, 20, 2, 'Gempur terus kawan', '2020-05-07'),
(5, 11, 3, 'Update WA hari ini', '2020-05-07'),
(7, 5, 3, 'Alhamdulillah, buat website hari ini', '2020-05-07'),
(8, 10, 3, 'Perkuat email marketing sahabat', '2020-05-07'),
(9, 16, 3, 'Alhamdulillah, invite sahabat.', '2020-05-07'),
(10, 19, 3, 'Bisa direct mail, alhamdulillah', '2020-05-07'),
(11, 10, 4, 'Alhamdulillah, hari ini blasting email', '2020-05-07'),
(12, 20, 4, 'Direct mail terlaksana', '2020-05-07'),
(14, 12, 2, 'Share status lagi juragan', '2020-05-08'),
(15, 19, 2, 'Lahut direct mail kawan', '2020-05-08'),
(18, 10, 3, 'Blasting maneh', '2020-05-08'),
(20, 10, 4, 'Blasting terus', '2020-05-09'),
(21, 7, 2, 'Maksimalkan konten video', '2020-05-09'),
(22, 10, 2, 'Blasting terus kawan', '2020-05-09'),
(23, 20, 2, 'Maksimalkan direct mail', '2020-05-09'),
(24, 16, 2, 'Invite sebanyak-banyaknya kejar poin', '2020-05-09'),
(25, 5, 2, 'Belajar update website', '2020-05-09'),
(26, 20, 4, 'DM lagi kawan', '2020-05-09'),
(27, 7, 4, 'Buat video nih mantap', '2020-05-09'),
(28, 23, 4, 'Sekali-kali buat review', '2020-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `reflect`
--

CREATE TABLE `reflect` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `reflection` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reflect`
--

INSERT INTO `reflect` (`id`, `user`, `reflection`) VALUES
(8, 3, 'asdadasdasdsa'),
(9, 3, 'dadasdasSasAS'),
(12, 3, '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;style&gt;\r\nbody {\r\n  background-color: red;\r\n  font-family:century gothic;\r\n}\r\n\r\nh1 {\r\n  color: white;\r\n  text-align: center;\r\n}\r\n\r\np {\r\n  font-family: verdana;\r\n  font-size: 20px;\r\n}\r\n&lt;/style&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n\r\n&lt;h1&gt;My First CSS Example&lt;/h1&gt;\r\n&lt;p&gt;This is a paragraph.&lt;/p&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `target_level` int(11) NOT NULL,
  `target_waktu` int(11) NOT NULL,
  `target_points` int(11) NOT NULL,
  `target_reviews` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `target_level`, `target_waktu`, `target_points`, `target_reviews`, `user`) VALUES
(1, 20, 120, 9000, 50, 4),
(2, 22, 125, 9500, 55, 4),
(3, 25, 135, 9550, 65, 4),
(4, 15, 200, 7000, 30, 3),
(5, 20, 150, 10000, 60, 3),
(6, 20, 120, 9000, 50, 6),
(7, 20, 60, 8000, 50, 3);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `levels` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `quiz` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `user`, `levels`, `points`, `quiz`) VALUES
(62, 2, '1', 100, '1A'),
(63, 2, '1', 150, '1B'),
(64, 2, '1', 200, '1C'),
(65, 3, '1', 100, '1A'),
(66, 3, '1', 150, '1B'),
(67, 3, '1', 200, '1C'),
(68, 3, '1', 100, '1A'),
(69, 3, '1', 150, '1B'),
(70, 3, '1', 200, '1C'),
(72, 3, '2', 105, '2A'),
(73, 4, '1', 100, '1A'),
(74, 3, '1', 100, '1A'),
(75, 3, '1', 150, '1B'),
(76, 3, '1', 200, '1C'),
(77, 2, '1', 100, '1A'),
(78, 2, '1', 150, '1B'),
(79, 2, '1', 200, '1C'),
(80, 2, '1', 100, '1A'),
(81, 2, '1', 150, '1B'),
(82, 2, '1', 200, '1C'),
(83, 2, '1', 100, '1A'),
(84, 2, '1', 150, '1B'),
(85, 2, '1', 200, '1C'),
(86, 2, '2', 105, '2A'),
(87, 4, '1', 100, '1A'),
(88, 4, '1', 150, '1B'),
(89, 6, '1', 100, '1A'),
(90, 6, '1', 150, '1B'),
(91, 6, '1', 200, '1C'),
(92, 6, '1', 100, '1A'),
(93, 3, '1', 100, '1A'),
(94, 3, '1', 150, '1B'),
(95, 3, '1', 200, '1C'),
(96, 3, '1', 100, '1A'),
(97, 4, '1', 100, '1A'),
(98, 3, '1', 100, '1A'),
(99, 3, '1', 150, '1B'),
(100, 3, '1', 200, '1C'),
(101, 3, '2', 105, '2A'),
(102, 3, '1', 100, '1A'),
(103, 3, '1', 150, '1B'),
(104, 3, '1', 200, '1C'),
(105, 3, '2', 105, '2A'),
(106, 3, '2', 105, '2A'),
(107, 3, '2', 105, '2A'),
(108, 3, '2', 105, '2A'),
(109, 3, '1', 100, '1A'),
(110, 3, '2', 105, '2A'),
(111, 3, '2', 105, '2A'),
(112, 3, '2', 105, '2A'),
(113, 3, '2', 205, '2B'),
(114, 3, '2', 205, '2B'),
(115, 3, '2', 105, '2A'),
(116, 3, '1', 100, '1A'),
(117, 3, '1', 150, '1B'),
(118, 3, '1', 100, '1A'),
(119, 3, '1', 150, '1B'),
(120, 3, '1', 150, '1B'),
(121, 3, '1', 150, '1B'),
(122, 3, '1', 150, '1B'),
(123, 3, '1', 150, '1B'),
(124, 3, '1', 200, '1C'),
(125, 3, '2', 105, '2A'),
(126, 3, '2', 105, '2A'),
(127, 3, '2', 205, '2B'),
(128, 3, '3', 60, '3A'),
(129, 3, '3', 60, '3A'),
(130, 3, '3', 60, '3A'),
(131, 3, '3', 60, '3A'),
(132, 3, '3', 60, '3A'),
(133, 3, '3', 60, '3A'),
(134, 3, '1', 10, '1A'),
(135, 3, '1', 20, '1B'),
(136, 3, '1', 30, '1C'),
(137, 3, '2', 40, '2A'),
(138, 3, '2', 50, '2B'),
(139, 3, '3', 60, '3A'),
(140, 3, '3', 60, '3A'),
(141, 3, '3', 60, '3A'),
(142, 3, '3', 70, '3B'),
(143, 3, '3', 70, '3B'),
(144, 3, '3', 70, '3B'),
(145, 3, '3', 70, '3B'),
(146, 3, '3', 60, '3A'),
(147, 3, '3', 60, '3A'),
(148, 3, '3', 70, '3B'),
(149, 3, '3', 60, '3A'),
(150, 3, '3', 70, '3B'),
(151, 3, '3', 70, '3B'),
(152, 3, '3', 70, '3B'),
(153, 3, '3', 80, '3C'),
(154, 3, '3', 80, '3C'),
(155, 3, '3', 60, '3A'),
(156, 3, '3', 70, '3B'),
(157, 3, '3', 80, '3C'),
(158, 3, '3', 60, '3A'),
(159, 3, '4', 90, '4A'),
(160, 3, '4', 100, '4B'),
(161, 3, '4', 100, '4B'),
(162, 3, '4', 100, '4B'),
(163, 3, '4', 100, '4B'),
(164, 3, '4', 90, '4A'),
(165, 3, '4', 100, '4B'),
(166, 3, '4', 100, '4B'),
(167, 3, '4', 100, '4B'),
(168, 3, '4', 100, '4B'),
(169, 3, '4', 90, '4A'),
(170, 3, '4', 100, '4B'),
(171, 3, '4', 110, '4C'),
(172, 3, '4', 110, '4C'),
(173, 3, '1', 10, '1A'),
(174, 3, '1', 20, '1B'),
(175, 3, '1', 30, '1C'),
(176, 3, '3', 80, '3C'),
(177, 3, '3', 80, '3C'),
(178, 3, '3', 80, '3C'),
(179, 3, '3', 60, '3A'),
(180, 3, '3', 70, '3B'),
(181, 3, '3', 80, '3C'),
(182, 3, '4', 90, '4A'),
(183, 3, '4', 100, '4B'),
(184, 3, '4', 100, '4B'),
(185, 3, '4', 110, '4C'),
(186, 3, '5', 120, '5A'),
(187, 3, '5', 120, '5A'),
(188, 3, '5', 120, '5A'),
(189, 3, '5', 120, '5A'),
(190, 3, '5', 120, '5A'),
(191, 3, '5', 120, '5A'),
(192, 3, '5', 120, '5A'),
(193, 3, '5', 130, '5B'),
(194, 3, '5', 130, '5B'),
(195, 3, '5', 130, '5B'),
(196, 3, '5', 130, '5B'),
(197, 3, '5', 130, '5B'),
(198, 3, '5', 140, '5C'),
(199, 3, '5', 140, '5C'),
(200, 3, '5', 140, '5C'),
(201, 3, '5', 120, '5A'),
(202, 3, '5', 130, '5B'),
(203, 3, '5', 140, '5C'),
(204, 3, '6', 150, '6A'),
(205, 3, '6', 150, '6A'),
(206, 3, '6', 150, '6A'),
(207, 3, '6', 150, '6A'),
(208, 3, '6', 160, '6B'),
(209, 3, '6', 150, '6A'),
(210, 3, '6', 160, '6B'),
(211, 3, '6', 160, '6B'),
(212, 3, '6', 160, '6B'),
(213, 3, '6', 160, '6B'),
(214, 3, '6', 170, '6C'),
(215, 3, '6', 170, '6C'),
(216, 3, '7', 180, '7A'),
(217, 3, '7', 180, '7A'),
(218, 3, '7', 180, '7A'),
(219, 3, '7', 180, '7A'),
(220, 3, '7', 180, '7A'),
(221, 3, '7', 190, '7B'),
(222, 3, '7', 200, '7C'),
(223, 3, '7', 200, '7C'),
(224, 3, '7', 180, '7A'),
(225, 3, '7', 190, '7B'),
(226, 3, '7', 200, '7C'),
(227, 3, '8', 210, '8A'),
(228, 3, '8', 210, '8A'),
(229, 3, '8', 210, '8A'),
(230, 3, '8', 220, '8B'),
(231, 3, '8', 220, '8B'),
(232, 3, '8', 210, '8A'),
(233, 3, '8', 220, '8B'),
(234, 3, '8', 230, '8C'),
(235, 3, '8', 230, '8C'),
(236, 3, '9', 240, '9A'),
(237, 3, '9', 240, '9A'),
(238, 3, '9', 240, '9A'),
(239, 3, '9', 250, '9B'),
(240, 3, '9', 250, '9B'),
(241, 3, '9', 260, '9C'),
(242, 3, '9', 260, '9C'),
(243, 4, '1', 10, '1A'),
(244, 3, '1', 10, '1A'),
(245, 3, '1', 10, '1A'),
(246, 3, '1', 10, '1A'),
(247, 3, '1', 20, '1B'),
(248, 3, '1', 10, '1A'),
(249, 3, '1', 20, '1B'),
(250, 3, '1', 30, '1C'),
(251, 3, '2', 40, '2A'),
(252, 3, '2', 50, '2B'),
(253, 3, '3', 60, '3A'),
(254, 3, '3', 70, '3B'),
(255, 3, '3', 80, '3C'),
(256, 3, '4', 90, '4A'),
(257, 3, '4', 100, '4B'),
(258, 3, '4', 110, '4C'),
(259, 3, '5', 120, '5A'),
(260, 3, '5', 130, '5B'),
(261, 3, '5', 140, '5C'),
(262, 3, '6', 150, '6A'),
(263, 3, '6', 160, '6B'),
(264, 3, '6', 170, '6C'),
(265, 3, '7', 180, '7A'),
(266, 3, '7', 190, '7B'),
(267, 3, '7', 200, '7C'),
(268, 3, '8', 210, '8A'),
(269, 3, '8', 220, '8B'),
(270, 3, '8', 230, '8C'),
(271, 3, '9', 240, '9A'),
(272, 3, '9', 250, '9B'),
(273, 3, '9', 260, '9C'),
(274, 3, '1', 10, '1A');

-- --------------------------------------------------------

--
-- Table structure for table `uploadfoto`
--

CREATE TABLE `uploadfoto` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `motivasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadfoto`
--

INSERT INTO `uploadfoto` (`id`, `user`, `gambar`, `motivasi`) VALUES
(11, '3', '5eb671d306e85.jpg', 'Be consistent and motivate..!!'),
(12, '4', '5eb6b43a5cdcc.jpg', 'Berani menjadi pemenang dengan izin Allah, chayoo..!!'),
(13, '2', '5eb6b518bbb41.jpg', 'Jadilah inspirator penggerak, InsyaAllah...!!'),
(15, '6', '5ee04c5ee3353.jpg', 'Bismillah, tidak ada yang tidak mungkin...!!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'zidna', '$2y$10$RGZgA6CWceoD24SY.HDTieOma34Uj.reBp0l6FGewokwMqrbvkStW'),
(3, 'hanafri', '$2y$10$tTnIGtb/SYiZF1wj19OeIu2Sr7E3EsfrcSUwcXsyBviZNxZzpODIO'),
(4, 'hielwah', '$2y$10$s7Rmvm3bneKs3IK901qqo.x7a/0ulk6iaeUUJ5.Jc84DgnF.f3JiG'),
(5, 'ikeba', '$2y$10$r4zxY5Zlc5v9XntqowMt1.QzdnAvq5FHz/73M3aDIfOW2z0o.Exwm'),
(6, 'amiy', '$2y$10$fL2yPxNBPuWW1lT/7Jj04ep73Koi0XHPLyd/YJM6fbiXPQPOhwAP.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_admin`
--
ALTER TABLE `info_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reflect`
--
ALTER TABLE `reflect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadfoto`
--
ALTER TABLE `uploadfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `info_admin`
--
ALTER TABLE `info_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `reflect`
--
ALTER TABLE `reflect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT for table `uploadfoto`
--
ALTER TABLE `uploadfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
