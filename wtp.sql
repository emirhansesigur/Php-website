-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 10:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtp`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(10) UNSIGNED NOT NULL,
  `kaydedenid` int(11) NOT NULL,
  `filmadi` varchar(30) NOT NULL,
  `yonetmen` varchar(30) NOT NULL,
  `yil` int(11) NOT NULL,
  `oyuncular` varchar(100) NOT NULL,
  `yorum` varchar(10000) NOT NULL DEFAULT 'yorum yapılmamış',
  `puan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `kaydedenid`, `filmadi`, `yonetmen`, `yil`, `oyuncular`, `yorum`, `puan`) VALUES
(15, 0, '', 'Emirhancx', 1999, 'emir le memed', 'yorum yapılmamış', 0),
(23, 0, 'e', 'a', 2023, 'Emir Esra', 'yorum yapılmamış', 0),
(28, 0, 'e', 'ab', 2023, 'emir le memed', 'yorum yapılmamış', 0),
(29, 0, 'BU', 'BU', 2024, 'emir sadece', 'yorum yapılmamış', 0),
(30, 0, 'BU', 'BU', 2024, 'emir sadece', 'yorum yapılmamış', 0),
(31, 0, 'Elveda', 'John', 2011, 'He and she', '', 2),
(32, 0, '32.', '32..', 1999, 'biz', 'yorummm', 4),
(33, 0, '', '', 0, '', 'yorum yapılmamış', 0),
(34, 0, '', '', 0, '', 'yorum yapılmamış', 0),
(35, 0, 'BU', 'BU', 2024, 'emir sadece', 'yorum yapılmamış', 5),
(36, 0, 'Elveda', 'John', 2011, 'He and she', 'İzlemedim ki İzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim kiİzlemedim ki', 1),
(37, 0, 'H P', 'J V', 2001, 'D R', '', 5),
(38, 0, 'H P', 'J V', 2001, 'D R', '', 5),
(39, 0, 'hp2 ', 'j', 2003, 'd r', 'kitap daha güzel', 1),
(40, 0, '', '', 0, '', '', 0),
(41, 0, '32.', 'Emirhan', 2023, 'He and she', 'kitap daha güzel', 5),
(42, 17, 'Yeni', 'emirrrrrr', 2000, 'He and she', 'Harikaydı. yazacağım uzun Harikaydı. yazacağım uzunHarikaydı. yazacağım uzunHarikaydı. yazacağım uzunHarikaydı. yazacağım uzunHarikaydı. yazacağım uzunHarikaydı. yazacağım uzunHarikaydı. yazacağım uzun', 1),
(43, 17, 'Buyur Burdan Bak', 'BKM', 2017, 'x y z', 'çok eski', 2),
(44, 19, 'H P', 'John', 1999, 'ali, o ,bu , şu', 'Harikaydı. gerçekten', 5),
(45, 17, '', '', 0, '', '', 1),
(46, 44, '', '', 0, '', '', 3),
(48, 44, 'QQ nun filmiii', 'ne bilem ne', 0, 'oo kimler kimler', 'harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film harika bir film ', 1),
(49, 44, 'Elveda', 'Emirhancx', 0, 'Emir Esra', 'harika bir farika bir film harika bir film harika bir film harika bir film harika bir film harika bir film ', 3),
(50, 44, 'e', 'ab', 2023, 'x y z', 'kitap daha güzel', 3),
(51, 44, 'new', 'new', 1212, 'new', 'new', 4),
(52, 44, 'new', 'new', 2023, 'new', 'new', 5),
(53, 44, '', '', 0, '', '', 0),
(54, 46, 'oy oyyy', 'oy oyyyoy oyyy', 1992, 'a a b b ', 'oy oyyyoy oyyyoy oyyy', 3),
(55, 48, 'Ready Player Onee', 'Jim Jonn', 2019, 'Jim Jon1, Jim Jon2, Jim Jon', 'Eskiden izlediğim bir film. İlk izlememde çok beğenmişti', 4),
(56, 44, 'Emir', 'off', 1111, 'emir le memed', 'Harikaydı. yazacağım uzun', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

CREATE TABLE `kullanici` (
  `kullaniciid` int(10) UNSIGNED NOT NULL,
  `kullaniciadi` varchar(30) NOT NULL,
  `sifre` varchar(128) NOT NULL,
  `adsoyad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`kullaniciid`, `kullaniciadi`, `sifre`, `adsoyad`) VALUES
(28, 'q@qw.com', 'cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481', 'emir'),
(29, 'a@b.com', '229c8e35d7f82b29db6408665203e7e5c4102f6edff362147ecbdde5cb64bfe1', 'naber'),
(30, 'e@g.com', 'cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481', 'ee'),
(33, 'esraa@gm.com', 'd33fc1b3218dd768a006fd04065822346d2063a93733d2372e0c40368e02a2c7', 'eelaşlds'),
(34, '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', ''),
(35, 'yeni@yeni.com', 'b0b75be51fa9f1a63d5a9e5d89d2233653a846b6783e216c8f892d0066dc9b85', 'emirdemir'),
(40, 'e@gs.com', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'emir s'),
(44, 'q@q.com', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'Emir Ses'),
(46, 'new@q.com', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'new q'),
(47, 'q@xyz.com', '054e3b308708370ea029dc2ebd1646c498d59d7203c9e1a44cf0484df98e581a', 'xyz'),
(48, 'hi@gm.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'Hi Gm');

-- --------------------------------------------------------

--
-- Table structure for table `memurlar`
--

CREATE TABLE `memurlar` (
  `memur_id` int(4) NOT NULL,
  `ad` varchar(25) NOT NULL,
  `soyad` varchar(25) NOT NULL,
  `birim` varchar(20) NOT NULL,
  `maas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memurlar`
--

INSERT INTO `memurlar` (`memur_id`, `ad`, `soyad`, `birim`, `maas`) VALUES
(1, 'Emirhan', 'Sesigür', 'IT', 50000),
(3, 'Yusuf', 'Sesigür', 'elektrik', 20000),
(4, 'Emirhan Ahmet', 'Sesigür', 'elektrik2', 12120),
(8, 'Esra', 'Bebiş', 'kokolo', 100000000),
(9, '', '', '', 0),
(10, '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullaniciid`),
  ADD UNIQUE KEY `kullaniciadi` (`kullaniciadi`);

--
-- Indexes for table `memurlar`
--
ALTER TABLE `memurlar`
  ADD PRIMARY KEY (`memur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullaniciid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `memurlar`
--
ALTER TABLE `memurlar`
  MODIFY `memur_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
