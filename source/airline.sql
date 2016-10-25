-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 02:20 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietchuyenbay`
--

CREATE TABLE `chitietchuyenbay` (
  `madatcho` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `machuyenbay` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `hangmuc` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `mucgia` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuyenbay`
--

CREATE TABLE `chuyenbay` (
  `ma` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `noidi` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `noiden` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `gio` time NOT NULL,
  `hang` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `mucgia` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `soluongghe` int(11) NOT NULL,
  `giaban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenbay`
--

INSERT INTO `chuyenbay` (`ma`, `noidi`, `noiden`, `ngay`, `gio`, `hang`, `mucgia`, `soluongghe`, `giaban`) VALUES
('BL326', 'HIU', 'SGN', '2016-10-25', '08:45:00', 'Y', 'E', 100, 100000),
('BL326', 'SGN', 'TBB', '2016-10-05', '08:45:00', 'Y', 'F', 20, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `chuyendi`
--

CREATE TABLE `chuyendi` (
  `masanbaydi` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `masanbayden` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyendi`
--

INSERT INTO `chuyendi` (`masanbaydi`, `masanbayden`) VALUES
('HIU', 'SGN'),
('SGN', 'HIU'),
('SGN', 'TBB'),
('TBB', 'SGN');

-- --------------------------------------------------------

--
-- Table structure for table `datcho`
--

CREATE TABLE `datcho` (
  `ma` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `thoigiandatcho` datetime NOT NULL,
  `tongtien` double NOT NULL COMMENT '0:đang đặt chổ 1:đã xác nhận ',
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datcho`
--

INSERT INTO `datcho` (`ma`, `thoigiandatcho`, `tongtien`, `trangthai`) VALUES
('AAAAAA', '2016-10-01 00:00:00', 1000000, 1),
('AAAAAB', '2016-10-23 12:51:22', 100, 0),
('AAAAAC', '2016-10-23 12:52:00', 100, 0),
('AAAAAD', '2016-10-23 12:52:43', 100, 0),
('AAAAAE', '2016-10-23 13:39:45', 1000, 0),
('AAAAAF', '2016-10-23 13:39:54', 1000, 0),
('AAAAAG', '2016-10-23 13:42:59', 1000, 0),
('AAAAAH', '2016-10-23 22:11:44', 1000, 0),
('AAAAAI', '2016-10-25 18:06:39', 3, 0),
('AAAAAJ', '2016-10-25 18:22:25', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `id` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id`, `mota`) VALUES
('C', 'thương gia'),
('Y', 'phổ thông');

-- --------------------------------------------------------

--
-- Table structure for table `hanhkhach`
--

CREATE TABLE `hanhkhach` (
  `id` int(11) NOT NULL,
  `madatcho` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `danhxung` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanhkhach`
--

INSERT INTO `hanhkhach` (`id`, `madatcho`, `danhxung`, `ho`, `ten`) VALUES
(3, 'AAAAAA', 'Mr', 'Trần ', 'Hiếu'),
(4, 'AAAAAA', 'Mr', 'Nguyen', 'Hằng'),
(6, 'AAAAAA', 'Mr', 'Tr%E1%BA%A7n', 'Trung');

-- --------------------------------------------------------

--
-- Table structure for table `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuvuc`
--

INSERT INTO `khuvuc` (`id`, `mota`) VALUES
('uc', 'Úc'),
('vn', 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `mucgia`
--

CREATE TABLE `mucgia` (
  `id` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `mucgia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mucgia`
--

INSERT INTO `mucgia` (`id`, `mucgia`) VALUES
('E', 100000),
('F', 200000),
('G', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `sanbay`
--

CREATE TABLE `sanbay` (
  `masanbay` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `khuvuc` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanbay`
--

INSERT INTO `sanbay` (`masanbay`, `mota`, `khuvuc`) VALUES
('HIU', 'Huế', 'vn'),
('SGN', 'thành phố HCM', 'vn'),
('TBB', 'Tụy Hòa', 'vn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietchuyenbay`
--
ALTER TABLE `chitietchuyenbay`
  ADD PRIMARY KEY (`madatcho`,`machuyenbay`,`ngay`),
  ADD KEY `machuyenbay` (`machuyenbay`);

--
-- Indexes for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD PRIMARY KEY (`ma`,`noidi`,`noiden`,`ngay`,`hang`,`mucgia`),
  ADD KEY `hang` (`hang`),
  ADD KEY `mucgia` (`mucgia`),
  ADD KEY `noidi` (`noidi`),
  ADD KEY `noiden` (`noiden`);

--
-- Indexes for table `chuyendi`
--
ALTER TABLE `chuyendi`
  ADD PRIMARY KEY (`masanbaydi`,`masanbayden`),
  ADD KEY `masanbayden` (`masanbayden`);

--
-- Indexes for table `datcho`
--
ALTER TABLE `datcho`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madatcho` (`madatcho`);

--
-- Indexes for table `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mucgia`
--
ALTER TABLE `mucgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanbay`
--
ALTER TABLE `sanbay`
  ADD PRIMARY KEY (`masanbay`),
  ADD KEY `khuvuc` (`khuvuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietchuyenbay`
--
ALTER TABLE `chitietchuyenbay`
  ADD CONSTRAINT `chitietchuyenbay_ibfk_1` FOREIGN KEY (`madatcho`) REFERENCES `datcho` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietchuyenbay_ibfk_2` FOREIGN KEY (`machuyenbay`) REFERENCES `chuyenbay` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD CONSTRAINT `chuyenbay_ibfk_1` FOREIGN KEY (`hang`) REFERENCES `hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyenbay_ibfk_2` FOREIGN KEY (`mucgia`) REFERENCES `mucgia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyenbay_ibfk_3` FOREIGN KEY (`noidi`) REFERENCES `chuyendi` (`masanbaydi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyenbay_ibfk_4` FOREIGN KEY (`noiden`) REFERENCES `chuyendi` (`masanbayden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chuyendi`
--
ALTER TABLE `chuyendi`
  ADD CONSTRAINT `chuyendi_ibfk_1` FOREIGN KEY (`masanbaydi`) REFERENCES `sanbay` (`masanbay`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyendi_ibfk_2` FOREIGN KEY (`masanbayden`) REFERENCES `sanbay` (`masanbay`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  ADD CONSTRAINT `hanhkhach_ibfk_1` FOREIGN KEY (`madatcho`) REFERENCES `datcho` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanbay`
--
ALTER TABLE `sanbay`
  ADD CONSTRAINT `sanbay_ibfk_1` FOREIGN KEY (`khuvuc`) REFERENCES `khuvuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
