-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2022 lúc 12:40 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` int(11) NOT NULL,
  `banner_url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_kh`, `ma_hh`, `ngay_binh_luan`) VALUES
(19, 'ss', 'admin', 20, '2022-12-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
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
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(17, 'CLOWNZ ACADEMY T-SHIRT', 349, 0, 'tshirt-academy12.JPG', '2022-11-28', 'Vải cotton định lượng 250GSM mềm mịn, bo cổ chắc chắn\r\nMàu sắc: Đen/ Be/ Nâu\r\nForm T-Shirt regular \r\nGraphic sử dụng kỹ thuật in lưới cao cấp, hình in bền và sắc nét\r\nMỗi màu áo đều được phối với các màu highlight khác nhau tạo sự nổi bật cho từng sản phẩm. Áo basic dễ mặc và dễ phối đồ với các style khác nhau', b'1', 6, 8),
(18, 'BASIC FOR LIFE V2 T-SHIRT', 349, 5, '37-d9709120-0657-44ab-8c42-0d91f220c790.JPG', '2022-11-28', 'Chất liệu: Cotton 250 GSM, co giãn 2 chiều, bền, vải mềm, vải mịn, thoáng mát.\r\nMô tả: Logo thêu mặt trước, chữ \"CLOWNZ\" in lưới mặt sau\r\nForm Overize hiện đại, trẻ trung, năng động. Phù hợp khi mix đồ với nhiều loại.\r\nĐường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n4 phối màu áo cho bạn đa dạng lựa chọn mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao.', b'1', 13, 8),
(19, 'BASIC FOR LIFE T-SHIRT', 299, 20, '1-ae1418bd-1a5b-465c-b92d-494b14b26385.jpg', '2022-10-29', '• Chất liệu: cotton 2 chiều\r\n\r\n• Dáng suông, form rộng\r\n\r\n• Tag cao su chính hãng ở mép áo phải và tag phụ ở tay và mép áo trái\r\n\r\n• Logo chú hề thương hiệu thêu ở chính giữa mặt trước\r\n\r\n• Chữ CLOWNZ in lưới ở mặt sau\r\n\r\n• Chất vải thoáng mát, thấm hút mồ hôi\r\n\r\n• Dễ dàng phối với mọi kiểu quần, phong cách trẻ trung, khỏe khoắn', b'1', 60, 8),
(20, 'CLOWNZ SKULL T-SHIRT', 349, 50, '4-2-f0e51b99-bced-4a36-a80c-3039b8ba4376.jpg', '2022-11-29', 'Chất liệu: 100% cotton\r\n Dáng xuông rộng\r\n Mặt trước: hình in \" skeleton in green fire\"\r\n Mặt sau: hình in \" flamy skull in green fire\"\r\n Sử dụng công nghệ in ép nhiệt chất lượng tốt nhất, lộn trái áo khi giặt.', b'1', 15, 8),
(21, 'PAINTED KAKI SHORT PANTS', 359, 15, 'quan.jpg', '2022-11-30', 'Chất liệu: Kaki vải mỏng\r\nMàu sắc: Đen/ xám\r\nForm dáng: Quần short \r\nChiếc quần được lấy cảm hứng thiết kế từ phong cách grunge với 2 phối màu cơ bản dễ dàng phối đồ\r\nDọc hai bên quần có chi tiết cúc bấm thời trang', b'1', 2, 9),
(22, 'LEOPARD CAMO MIX SHORT', 290, 25, '4-d82d820d-96e1-4228-ad24-8c8f685af879.jpg', '2022-11-25', 'Chất liệu: vải Kate mịn\r\nForm dáng: Relax Fit\r\nHoạ tiết da báo và camo được phối màu và mix theo từng mảng có chủ ý tạo điểm nhấn.\r\nSản phẩm thuộc BST LEOPARD COLLECTION', b'1', 25, 9),
(23, 'STAR BLACK LEATHER SHORT', 525, 75, '4-9f568033-41b0-49f6-9a5f-73b39a354bcc.jpg', '2022-11-27', 'Chất liệu: Da tổng hợp\r\nMàu sắc: Đen bóng\r\nForm dáng: Oversize\r\nThiết kế hai túi trước cùng với một túi hộp. Hình thêu C-Star được thiết kế một cách tinh tế tạo điểm nhấn\r\nSản phẩm thuộc BST LEOPARD COLLECTION', b'1', 28, 9),
(24, 'CLOWNZ BASKETBALL SHORT', 399, 24, '6-185112d1-08c2-41c7-81d9-7f5fb0b3295f.jpg', '2022-11-30', 'Chất liệu: 100% cotton, vải mềm, 4 chiều co giãn\r\nPhối màu: Đen - Đỏ\r\nForm quần short bóng rổ, unisex thể thao.\r\nLogo chú hề màu trắng in chìm góc ống quần phải đi kèm với hình thêu tỉ mỉ ở mặt trước\r\nCạp chun, sử dụng dây luồn bụng cùng với một lớp lót lưới bên trong', b'1', 2, 9),
(25, 'CLOWNZ FLANNEL JACKET', 579, 0, '3-3-4f2f9c3e-a59b-4ed0-97ad-9f7f4d063310.jpg', '2022-10-28', 'Chất liệu : Vải dạ kẻ lót gió \r\n\r\nMàu sắc : xanh lá cây - xám\r\n\r\nForm dáng : form kéo khoá dáng boxy - crop\r\n\r\nCảm hứng thiết kế : Mẫu flannel jacket 2 lớp, với form boxy trendy đi cùng 2 phối màu và thiết kế basic. Đây sẽ là một items hay ho dành cho những tín đồ thích mặc flannel, với một form dáng mới lạ, trendy, thay cho dáng flannel thường.\r\n\r\nCông nghệ in ấn / thiết kế : thêu flash vi tính ở ngực chữ ClownZ, sau lưng chữ ClownZ - Stand for Northside\r\n\r\nChi tiết đặc biệt : Khóa kim loại màu xám hun. Túi cơi ở 2 bên và túi ngực bên trong .', b'1', 78, 11),
(26, 'CLOWNZ TRACK JACKET', 649, 12, '7-4.jpg', '2022-11-29', 'Chất liệu : Vải gió 2 lớp \r\n\r\nMàu sắc : đen - be - xanh\r\n\r\nForm dáng : form áo gió kéo khoá dáng boxy - crop\r\n\r\nCảm hứng thiết kế : Track jacket basic form boxy trendy, đi kèm các đường lé tạo line phối theo từng màu một cách tinh tế. Một items không thể thiếu trong những ngày đầu đông với các tín đồ thời trang đường phố.\r\n\r\nCông nghệ in ấn / thiết kế : in lưới ở 2 ngực logo và text ClownZ. Logo ClownZ dạng line được in ở sau lưng.\r\n\r\nChi tiết đặc biệt : Có các đường lé line phối tinh tế trên áo theo từng phối màu, lé có phát sáng khi đánh flash. Khoá nhựa kéo cực mượt, phù hợp với chất liệu gió. Túi cơi ở 2 bên.', b'1', 29, 11),
(27, 'Z LETTER VARSITY JACKET', 789, 20, '10-3.jpg', '2022-11-20', 'Chất liệu: Vải dạ lót trần bông\r\n\r\nMàu sắc: Đen / Be\r\n\r\nForm dáng: Varsity cổ bẻ, dáng crop\r\n\r\nCảm hứng thiết kế: Một chiếc Varsity với form dáng crop hot trend, dựa trên hoạ tiết Smiley face, chữ Z ,text ClownZ theo phong cách Gothic \r\n\r\nCông nghệ in ấn/ thiết kế: Thêu flash và thêu cắt laze\r\n\r\nChi tiết đặc biệt: Dáng crop cực tôn dáng', b'1', 60, 11),
(28, 'THE LAUGHTER VARSITY JACKE', 1049, 35, '3-8ceaab4f-81bb-47ab-aaa9-6be1733e7289.jpg', '2022-11-30', 'Chi tiết kỹ thuật:\r\n\r\n- Thân áo: Vải dạ. Tay áo: da tổng hợp.\r\n\r\n- May 2 lớp, lớp trong lót quả trám\r\n\r\n- Áo cổ bẻ, bo dệt ở cổ tay và gấu áo\r\n\r\n- 2 túi hông tiện dụng\r\n\r\n- Hình thêu 2 mặt hoàn toàn bằng chất liệu bông xù\r\n\r\n- Cúc kim loại khắc chìm logo ClownZ\r\n\r\n- Tag logo 3 vị trí: Cổ áo, Thân dưới trái, Gấu áo\r\n\r\nTất cả sản phẩm đến tay khách hàng đầy đủ Tag giấy + Thẻ treo + Hướng dẫn bảo quản + Quà tặng kèm theo season + Túi niêm phong in logo ClownZ.', b'1', 5, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
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
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `total`, `ghi_chu`, `trang_thai`, `ngay_tao`, `ngay_hoan_thanh`) VALUES
(44, 'admin', 'Quản trị viên 1', 'Cần Thơ', 'sd', 331.55, 'sds', 2, '2022-12-01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
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
-- Đang đổ dữ liệu cho bảng `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hdct`, `don_gia`, `size`, `so_luong`, `ma_hd`, `ma_hh`) VALUES
(53, 349, 'M', 1, 44, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
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
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('admin', '123456', 'Quản trị viên 1', '1', 'black-and-white-ga94148792_1920.jpg', 'lethanhduyjr@gmail.com', '1'),
('admin2', '123456', 'Thanh Duy', '1', 'pexels-julissa-helmuth-3726314.jpg', 'duyltpc04328@fpt.edu.vn', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(8, 'T-Shirt'),
(9, 'Short'),
(11, 'Jacket');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_loai_2` (`ma_loai`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hdct`),
  ADD KEY `ma_hd` (`ma_hd`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `ma_hdct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE NO ACTION,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
