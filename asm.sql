-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 07:16 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `img` varchar(300) NOT NULL,
  `tien` double(50,0) NOT NULL,
  `soluong` int(100) NOT NULL,
  `username` varchar(300) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sdt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `ten`, `img`, `tien`, `soluong`, `username`, `diachi`, `email`, `sdt`) VALUES
(2, 'Nice Tiempo Legend ', '', 1609000, 3, '', '', '', 0),
(2, 'Nice Tiempo Legend ', '', 1609000, 1, 'Bui Bao duy', '55/19', 'duycubu2004gmail.com', 359905982),
(1, 'Nike InfinityRN 4 GORE-TEX', '', 4329000, 1, 'phát', '55/19', 'baoduydz2004@gmail.com', 359905982),
(1, 'Nike InfinityRN 4 GORE-TEX', '', 4329000, 1, 'Bui Bao duy', '55/19', 'duybbps31947@fpt.edu.vn', 359905982),
(2, 'Nice Tiempo Legend ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ccda040c-3355-46ed-99a5-78a7a8c3d3b9/tiempo-legend-9-academy-tf-football-shoe-FT9Mcp.png', 1609000, 1, 'jivi', '123', 'baoduydz2004@gmail.com', 359905982);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `img` varchar(300) NOT NULL,
  `tien` double(50,0) NOT NULL,
  `khuyenmai` varchar(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `img`, `tien`, `khuyenmai`, `soluong`) VALUES
(1, 'Nike InfinityRN 4 GORE-TEX', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/88a30878-fb0b-4443-97e8-e0be4be60f30/infinityrn-4-gore-tex-waterproof-road-running-shoes-cNQZwc.png', 4329000, '', 0),
(2, 'Nice Tiempo Legend ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ccda040c-3355-46ed-99a5-78a7a8c3d3b9/tiempo-legend-9-academy-tf-football-shoe-FT9Mcp.png', 1609000, '1,000,000₫', 0),
(3, 'Nice Renew Ride 3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/89f88e36-6463-433f-84c2-bc07be839047/renew-ride-3-road-running-shoes-fzS091.png', 6739000, '1,500,000₫', 0),
(4, 'Nice Tiempo Legend', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a562fd6e-1cc3-4549-b6ad-72487e964faa/tiempo-legend-9-academy-mg-multi-ground-football-boot-8Vvl8G.png', 1751000, '1,900,000₫', 0),
(5, 'NicePremier 3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f4bac890-f200-46be-8dbe-81d627c8cfb8/nikepremier-3-football-boot-5CPFpf.png', 1230000, '', 0),
(6, 'Nice Air Presto', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/08e369ae-fa2f-4097-9b46-d226428c1738/air-presto-shoes-QdhgZW.png', 2340000, '', 0),
(7, 'Nice Air Presto', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/071b624e-3ff8-4415-beb0-bea9bc3f8364/air-presto-shoes-QdhgZW.png', 4372000, '', 0),
(8, 'Nice Air Max Plus', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/877d30e7-4880-46f8-aa71-6704eb7d944d/air-max-plus-shoes-Z0D37G.png', 1002001, '', 0),
(9, 'Nice Pegasus 40', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/be33804b-50b9-4851-9bc4-1d9b534b9c4f/pegasus-40-road-running-shoes-3JpHzl.png', 4271000, '', 0),
(10, 'Nice Tech Hera', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d98a444e-d21c-415f-9136-938c9e0ee419/tech-hera-shoes-JlV5km.png', 3690000, '', 0),
(11, 'Freak 5 EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/87dade17-435d-492a-8476-de3192e4cf61/freak-5-ep-basketball-shoes-dPwdt7.png', 3103000, '', 0),
(12, 'Nice GT Cut 2 EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c9602d2a-8aca-43eb-b242-e5e623f40325/gt-cut-2-ep-basketball-shoes-M7jcxn.png', 9999999, '', 0),
(13, 'Nice G.T. Jump 2 EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f5d17e5c-fe4b-47f5-8b0d-d763df319dc7/gt-jump-2-ep-basketball-shoes-1F15Gp.png', 2450000, '', 0),
(14, 'Freak 5 EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/fd4652d7-cb54-486b-8859-3ae63fefa62c/freak-5-ep-basketball-shoes-C1ScDB.png', 255000, '', 0),
(15, 'Jordan One Take 4 PF', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/21127b0b-1be4-481d-85ba-5256ad18378f/jordan-one-take-4-pf-shoes-v5trdl.png', 2929000, '', 0),
(16, 'Nice Elevate 3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b7235d5e-be01-4b52-b17d-edd83503a770/elevate-3-basketball-shoes-QT43Gj.png', 2349000, '', 0),
(17, 'Nice Fly.By Mid 3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/90a11704-4243-4015-8525-a9e72331bae6/flyby-mid-3-basketball-shoes-jFHsxb.png', 1111111, '', 0),
(18, 'Giannis Immortality 2 SE', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/df253dd6-68b6-47a3-93a6-ef69fd07846c/giannis-immortality-2-se-older-basketball-shoes-C5fDf5.png', 2222222, '', 0),
(19, 'KD Trey 5 X EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a2e2ba8f-5b2f-4e06-a566-a14bd0060c41/kd-trey-5-ep-basketball-shoes-mkllTG.png', 1356000, '', 0),
(20, 'Nice GT Cut 2', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b61fea8c-794c-4197-a05d-67e67783e63a/gt-cut-2-basketball-shoes-KDW90P.png', 7895320, '', 0),
(21, 'LeBron XX EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ac9c0c83-355e-4b32-8d23-5a0d3514c868/lebron-xx-ep-basketball-shoes-dpQwl8.png', 6565458, '', 0),
(22, 'Nice Team Hustle D 11', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cd15bd94-a6d3-44d5-9e11-1879892ab6c7/team-hustle-d-11-older-basketball-shoes-TBQxXL.png', 2345600, '', 0),
(23, 'Jordan Why Not .6 PF', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/59ef0876-a85a-4942-b50d-16658c4be086/jordan-why-not-6-pf-shoes-WvTHFW.png', 4699000, '', 0),
(24, 'Freak 4', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9989cd60-470b-4c37-b61c-d94a019819ce/freak-4-basketball-shoes-zmXv3D.png', 3264000, '', 0),
(25, 'KD15 EP', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/3926030d-8f48-425b-94eb-87feea31a7d0/kd15-ep-basketball-shoes-9K6BpD.png', 4409000, '', 0),
(26, 'Nice GT Jump', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9355f630-53c7-4567-89b4-a788c93171ea/gt-jump-basketball-shoes-22QS5F.png', 2349000, '', 0),
(27, 'Air Jordan XXXVII Low PF', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/1d5e2f9c-cb0b-4bb4-ad89-39e70883f74c/air-jordan-xxxvii-low-pf-basketball-shoes-lXs6Km.png', 4359649, '', 0),
(28, 'Jordan Why Not .6 PF', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/fa459bba-bf85-4836-a9c5-3a58d75e85a0/jordan-why-not-6-pf-shoes-Bsggwn.png', 4966000, '', 0),
(29, 'Nice Mercurial Superfly 9 Elite', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d97a5fec-88e0-4f67-af4f-46cd12079cea/mercurial-superfly-9-elite-football-boot-NqTzZv.png', 2479000, '', 0),
(30, 'Nice Alphafly 2', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6eb5520b-2daf-452a-8908-7fba420bcf57/alphafly-2-road-racing-shoes-DcWrKF.png', 8059000, '', 0),
(31, 'Nice Ultrafly', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d823b156-493d-4ad2-8d6d-dc7be755ef13/ultrafly-trail-running-shoes-4DRfrN.png', 5279000, '', 0),
(32, 'Jordan Sophia', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/46946e31-f9d6-4fe9-839f-47d196217ccf/jordan-sophia-slides-dcq32F.png', 3829000, '', 0),
(33, 'Nice SB Ishod Premium', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0c2d7843-4e0d-4fba-82e9-8d57c6d31dc7/sb-ishod-shoes-d3Q3ZK.png', 9999999, '', 0),
(34, 'Jordan Hex Mule', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/69c32296-eae4-4852-9f4a-98becc361b55/jordan-hex-mule-shoes-JTHQcM.png', 1532200, '', 0),
(35, 'Nice SB Bruin High', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d74903a5-0a74-439f-879c-e65cda13c0d6/sb-bruin-high-skate-shoes-GHdhLJ.png', 3400000, '', 0),
(36, 'Tiger Woods \'13', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/db81fe23-ff7b-42c4-b980-60893be11fad/tiger-woods-13-golf-shoes-hW1vkh.png', 7039000, '', 0),
(37, 'Jordan Retro 6 G NRG', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cb726963-0b84-4ed8-8cf4-44cab2a4ad6c/jordan-retro-6-g-nrg-golf-shoes-Wld345.png', 3690000, '', 0),
(38, 'Jordan Retro 6 G NRG', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/81c57e35-2f71-467d-89df-3b73fc8c3608/jordan-retro-6-g-nrg-golf-shoes-wrVjdt.png', 4869000, '', 0),
(39, 'Jordan ADG 4', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6221a0dd-94b2-40d4-821f-8b7d5a213c28/jordan-adg-4-golf-shoes-VrRj2T.png', 7589000, '', 0),
(40, 'Air Jordan I High G', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/89572137-c50b-4cdf-806f-e1703aff4054/air-jordan-i-high-g-golf-shoes-qKzTBg.png', 6666666, '', 0),
(41, 'Nice Air Max 90 G NRG\r\n', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6b4aa283-cab2-45f7-923f-4757eb4d082c/air-max-90-g-nrg-golf-shoes-3ftFxG.png', 5555555, '', 0),
(42, 'NiceCourt Air Zoom NXT\r\n', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/43f5df98-de2c-484a-bcfb-d24c5c4acb6c/nikecourt-air-zoom-nxt-hard-court-tennis-shoes-xwbdpf.png', 4444444, '', 0),
(43, 'NiceCourt Air Zoom Vapor 11', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a4eecaf8-3f28-4c83-9fb2-3eaf8f639bfc/nikecourt-air-zoom-vapor-11-hard-court-tennis-shoes-8PLCHs.png', 3333333, '', 0),
(44, 'NiceCourt Legacy', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/89229c93-ccfa-469e-92e8-bce32fbbaf75/nikecourt-legacy-older-shoes-dBCJpZ.png', 2222222, '', 0),
(45, 'Nike Tech Hera', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/77871b3d-567f-4d2a-8c99-e30114d37f48/tech-hera-shoes-1NNrVf.png', 1111111, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user`, `pass`, `name`, `img`, `role`, `email`, `code`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 'admin', 'sp6.webp', 1, '123@', ''),
('bao duy', '81dc9bdb52d04dc20036dbd8313ed055', 'Bùi Bảo Duy', 'tạch.jpg', 0, 'duybbps31947@gmail.com', ''),
('baolong123', '81dc9bdb52d04dc20036dbd8313ed055', 'Bùi Bảo Long', 'tạch.jpg', 0, 'baoduyxs@gmail.com', ''),
('dyy', 'def7924e3199be5e18060bb3e1d547a7', 'dyy', 'avt.jpg', 0, 'buibaoduyxs234@gmail.com', 'e94b343a'),
('phatcotus1', '81dc9bdb52d04dc20036dbd8313ed055', 'Lê Thành Phát', 'tạch.jpg', 0, 'buibaoduydz1412@gmail.com', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `id_sp` (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `id_sp` FOREIGN KEY (`id`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
