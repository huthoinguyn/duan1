-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 02:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` int(11) NOT NULL,
  `banner_url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_kh`, `ma_hh`, `ngay_binh_luan`) VALUES
(12, 'do', 'pc04496', 12, '2022-11-14'),
(13, 'mặt hàng này còn không shop', 'pc04496', 10, '2022-11-19'),
(14, 'giá cả phải chăng, rất đáng mua', 'pc04496', 14, '2022-11-20'),
(15, '', 'pc04496', 14, '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float DEFAULT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(2000) NOT NULL,
  `dac_biet` bit(1) NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(8, 'Phan Thanh Qui', 32, 55, 'IMG_7768.JPG', '2022-10-09', 'qkefhkjlqhvjbdmnabvcmavfdcjqe', b'1', 200, 2),
(10, 'Trieu Hong Ky', 55, 0, 'IMG_7798.JPG', '2022-12-12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil commodi nesciunt placeat quasi dolorum repudiandae quae aperiam cum nobis, qui hic deleniti veniam, reprehenderit alias vitae corrupti inventore omnis molestias.', b'1', 179, 4),
(11, 'Le Thanh Duy', 137345, 12, 'IMG_7766.JPG', '2022-12-12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil commodi nesciunt placeat quasi dolorum repudiandae quae aperiam cum nobis, qui hic deleniti veniam, reprehenderit alias vitae corrupti inventore omnis molestias.', b'1', 124, 5),
(12, 'hehehe', 2000, 10, 'IMG_7376.JPG', '2022-12-12', 'It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', b'1', 46, 1),
(13, 'Le Tan Tai', 2000, 10, 'IMG_7801.JPG', '2022-12-12', 'It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', b'1', 26, 1),
(14, 'heheheheheheh', 59, 0, 'IMG_7807.JPG', '2022-10-22', 'ahgvcjkdahgvchjkagchkjvahjkcbvhajkvcgjhafchjfvajhcvjavcjvajc', b'1', 12, 1),
(15, 'taitai', 25, 0, 'IMG_7784.JPG', '2022-10-22', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil commodi nesciunt placeat quasi dolorum repudiandae quae aperiam cum nobis, qui hic deleniti veniam, reprehenderit alias vitae corrupti inventore omnis molestias.', b'1', 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` varchar(55) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `total` float NOT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL,
  `trang_thai` int(1) NOT NULL,
  `ngay_tao` date NOT NULL,
  `ngay_hoan_thanh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `total`, `ghi_chu`, `trang_thai`, `ngay_tao`, `ngay_hoan_thanh`) VALUES
(30, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 5662, 'Gia re qua a', 3, '2022-11-21', NULL),
(31, 'pc04496', 'Nguyen Huu Thoai', 'An Binh, Ninh Kieu, Can Tho', '0585114376', 120878, 'giao nhanh nhanh giup em nha shop', 2, '2022-11-21', NULL),
(32, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not, Can Tho', '0585114376', 3710, 'Gia ca hop ly', 0, '2022-11-21', NULL),
(33, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 241782, 'heeheh', 0, '2022-11-22', NULL),
(34, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 241782, 'hehehe', 0, '2022-11-22', NULL),
(35, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 241782, 'hehehe', 3, '2022-11-22', NULL),
(36, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 241782, 'hehehe', 0, '2022-11-22', NULL),
(37, 'pc04496', 'Nguyen Huu Thoai', 'Thot Not Can Tho', '0585114376', 241782, 'hehehe', 2, '2022-11-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hdct` int(11) NOT NULL,
  `don_gia` float NOT NULL,
  `size` varchar(5) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hdct`, `don_gia`, `size`, `so_luong`, `ma_hd`, `ma_hh`) VALUES
(30, 2000, 'M', 3, 30, 12),
(31, 32, 'XL', 5, 30, 8),
(32, 55, 'M', 3, 30, 10),
(33, 25, 'M', 1, 30, 15),
(34, 137345, 'M', 1, 31, 11),
(35, 32, 'M', 1, 31, 8),
(36, 55, 'M', 2, 32, 10),
(37, 2000, 'M', 2, 32, 12),
(38, 137345, 'XL', 2, 34, 11),
(39, 55, 'M', 1, 34, 10),
(40, 137345, 'XL', 2, 35, 11),
(41, 55, 'M', 1, 35, 10),
(42, 137345, 'XL', 2, 36, 11),
(43, 55, 'M', 1, 36, 10),
(44, 137345, 'XL', 2, 37, 11),
(45, 55, 'M', 1, 37, 10);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `kich_hoat` varchar(1) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vai_tro` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('admin', '123456', 'admin', '1', 'IMG_7998.JPG', 'admin@gmail.com', '1'),
('huthoineeeeee', 'thoai', 'Nguyen Huu Thoai', '1', 'IMG_7768.JPG', 'thoai@gmail.com', '0'),
('pc04496', 'thoai123', 'Nguyen Huu Thoai', '1', 'IMG_7376.JPG', 'thoainhpc04496@fpt.edu.vn', '1');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(1, 'Tee'),
(2, 'Jogger'),
(4, 'T-Shirt'),
(5, 'Cagopants');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_loai_2` (`ma_loai`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hdct`),
  ADD KEY `ma_hd` (`ma_hd`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `ma_hdct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE NO ACTION,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE;

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
