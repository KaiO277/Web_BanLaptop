-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2022 lúc 01:35 PM
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
-- Cơ sở dữ liệu: `web3`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `cate`
-- (See below for the actual view)
--
CREATE TABLE `cate` (
`cate_id` int(11)
,`cate_name` varchar(255)
,`soluong` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'Mac'),
(2, 'hp'),
(3, 'DELL'),
(4, 'ASUS'),
(5, 'Lenovo'),
(6, 'acer'),
(7, 'MSI'),
(8, 'HUAWEI'),
(9, 'aa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `orderId` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`orderId`, `prod_id`, `quantity`, `cus_id`) VALUES
(1, 5, 1, 13),
(2, 3, 2, 13),
(3, 2, 1, 17),
(4, 2, 2, 18),
(5, 7, 1, 18),
(6, 1, 1, 18),
(7, 5, 1, 18),
(8, 1, 1, 19),
(9, 9, 2, 19),
(10, 1, 1, 20),
(11, 5, 2, 20),
(12, 1, 1, 21),
(13, 2, 1, 22),
(14, 2, 1, 24),
(15, 7, 3, 25),
(16, 10, 2, 25),
(17, 1, 2, 26);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `doanhthu`
-- (See below for the actual view)
--
CREATE TABLE `doanhthu` (
`ngay` varchar(5)
,`doanhthu` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `info_Id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `Card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `O_Cung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Trong_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kichthuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`info_Id`, `prod_id`, `Card`, `CPU`, `Ram`, `O_Cung`, `Pin`, `Trong_luong`, `kichthuoc`) VALUES
(0, 7, '\r\nAMD Radeon Graphics', 'AMD Ryzen 7 5825U', '8GB', '512GB SSD PCIe (M.2 2230) – combo M.2 2230 / 2280', '\r\n4 Cell I', '1.802 kg', '1.79 x 35.68 x 25.19 cm (H x W x D)'),
(1, 9, '\r\nGeForce GTX 1650 4GB', 'AMD Ryzen 5 5600H, 6 lõi, 12 luồng, 3.30 GHz (tối đa 4.20 GHz)', '8GB', '512 GB SSD M2', '\r\n4 Cell, ', '2.2 kg', '\r\n363.4 x 255 x 23.9 mm (WxDxH)'),
(2, 2, 'GPU 7 nhân, 16 nhân Neural Engine', '8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện', '8GB', '256GB', '49.9-watt-', '1.29 kg', '\r\n1.61 cm x 30.41 cm x 21.24 cm'),
(3, 1, '8 nhân GPU, 16 nhân Neural Engine', 'AMD Ryzen 5 4600H (6 nhân/ 12 luồng, 11MB Cache, 4.0 GHz)', '8GB', '256GB', '48WHrs, 3S', '1.27 kg', 'Dày: 1,13cm - Chiều dài: 30,41cm Chiều rộng: 21,5cm'),
(4, 5, 'NVIDIA GeForce GTX 1650, 4GB GDDR6', 'AMD Ryzen 5 4600H (6 nhân/ 12 luồng, 11MB Cache, 4.0 GHz)', '8GB', '512 GB PCIe® 3.0 NVMe™ M.2 SSD + 1 khe trống để nâng cấp', '48WHrs, 3S', '2.03 kg', '35.9 x 25.6 x 2.28 ~ 2.45 cm (W x D x H)'),
(5, 12, '\r\nNVIDIA GeForce RTX 3050', 'Intel Core i5-11400H', '8GB', '512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nTrống 1 khe SSD M2', '48WHrs, 3S', '2.3 kg', '35.9 x 25.6 x 2.28 ~ 2.45 cm'),
(8, 4, 'NVIDIA® GeForce RTX™ 3050 4GB GDDR6 + AMD Radeon Graphics', '\r\nAMD Ryzen™ R5-5600H Processor, 6 nhân 12 luồng', '8GB', '256GB', '3Cell 56WH', '2.57 kg', '\r\n357.3 mm x 272.8 mm x 26.9 mm'),
(14, 3, 'NVIDIA GeForce GTX 1650', 'Intel Core i5-12450H (8 lõi, 4.4 GHz)', '8GB', '512GB SSD NVMe', '\r\nLithium-', '2.3 kg', '2.36 x 35.79 x 25.50 cm (H x W x D)'),
(15, 11, '\r\nIntel Iris Xe', 'Intel Core i5-1135G7 thế hệ 11', '8GB', 'Ổ cứng SSD NVMe PCIe 512 GB', '56 Wh', '1.49 kg', '307,5 x 223,8 x 15,9 mm'),
(16, 8, '\r\nNVIDIA GeForce GTX 1650Ti 4GB GDDR6 + Intel UHD Graphics', 'Intel Core i5-10300H 2.5GHz up to 4.5GHz 8MB', '8GB', '\r\n512GB SSD M.2 2280 PCIe NVMe (Còn trống 1 khe SSD M.2 PCIE)', '\r\n4 Cell 8', '2.3 kg', '363.06 x 259.61 x 23.57 (mm)'),
(17, 10, '\r\nNVIDIA GeForce RTX 3060 6GB GDDR6', 'Intel Core i7-12700H 14 nhân 24 luồng, Tốc độ CPU 3.50 GHz', '16GB', '\r\n512GB SSD M.2 2280 PCIe NVMe (Còn trống 1 khe SSD M.2 PCIE)', '\r\n4 Cell 8', '2.3 kg', '363.06 x 259.61 x 23.57 (mm)'),
(18, 16, 'hhhh', 'aaaa', '8GB', '256GB', '56 Wh', '1.23 kg', '363.06 x 259.61 x 23.57 (mm)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OrderTime` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) DEFAULT 0,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`cus_id`, `cus_name`, `OrderTime`, `sdt`, `email`, `address`, `status`, `price`) VALUES
(13, 'nghia', '2022-11-16', '0123569874', 'nghiatran1527@gmail.com', 'Quảng Nam ', 1, 53670000),
(17, 'Kai O', '2022-11-23', '0125478963', 'nghiakun277@gmail.com', 'Đà Nẵng', 1, 22690000),
(18, 'Kaii', '2022-11-25', '0125896347', 'nghiatran1527@gmail.com', 'Đà Nẵng', 1, 108350000),
(19, 'Kai', '2022-11-28', '0125896347', 'nghiakun277@gmail.com', 'Quảng Nam', 1, 79970000),
(20, 'kai', '2022-11-29', '0125478963', 'nghiatran1527@gmail.com', 'Quảng Nam', 1, 67970000),
(21, 'nghia', '2022-12-01', '0136497555', 'nghiatran27007@gmail.com', 'Quảng Nam', 1, 28590000),
(22, 'nghĩa', '2022-12-01', '0136497555', 'nghiatran27007@gmail.com', 'Quảng Nam', 1, 22690000),
(24, 'nghia', '2022-12-02', '0125478963', 'nghiatran27007@gmail.com', 'quang nam', 1, 22690000),
(25, 'nsbs', '2022-12-02', '0125896347', 'nghiatran27007@gmail.com', 'Quảng Nam', 1, 118050000),
(26, 'Kaiiv', '2022-12-13', '0125478963', 'nghiakun277@gmail.com', 'Đà Nẵng', 1, 57180000);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `order`
-- (See below for the actual view)
--
CREATE TABLE `order` (
`orderId` int(11)
,`prod_name` varchar(255)
,`quantity` int(11)
,`cus_id` int(11)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prod_id`, `cate_id`, `prod_name`, `mota`, `prod_price`, `prod_img`, `soluong`) VALUES
(1, 1, 'Apple M2', '\r\nApple Macbook Air M2 2022 8GB 256GB I Chính hãng Apple Việt Nam', 28590000, 'm2.png', 10),
(2, 1, 'Apple M1', '\r\nApple Macbook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 22690000, 'm1.png', 10),
(3, 2, 'HP Gaming Victus 15', 'Laptop HP Gaming Victus 15-FA0031DX 6503849', 16990000, 'hp.jpg', 8),
(4, 3, 'Dell Gaming G15', 'Laptop Dell Gaming G15 5515 P105F004CGR', 18490000, 'dell.jpg', 11),
(5, 4, 'Asus Gaming Rog Strix G15', 'Laptop Asus Gaming Rog Strix G15 G513IH HN015W', 19690000, 'asus.png', 12),
(7, 3, 'Dell Inspiron 5625', 'Laptop Dell Inspiron 5625 99VP91', 14690000, '1668167487-product.jpg', 12),
(8, 5, 'Lenovo Gaming Legion 5P', 'Laptop Lenovo Gaming Legion 5P 15IMH05 82AY003EVN', 22990000, 'lenovo.jpg', 0),
(9, 6, 'Acer Nitro 5 Tiger', 'Laptop Gaming Acer Nitro 5 Tiger AN515 58 52SP', 25690000, 'acer.jpg', 11),
(10, 7, 'MSI Crosshair 15', NULL, 36990000, 'msi.png', 15),
(11, 8, 'Huawei Matebook 14', NULL, 23490000, 'huawei.png', 14),
(12, 6, 'Asus TUF Gaming F15', NULL, 20990000, 'asus1.png', 17),
(16, 1, 'aa', 'nnnn', 12500000, '1669640250-product.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '1234', NULL, NULL, NULL),
(2, 'kaio', 'kaio@gmail.com', NULL, '2707', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `cate`
--
DROP TABLE IF EXISTS `cate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cate`  AS SELECT `categories`.`cate_id` AS `cate_id`, `categories`.`cate_name` AS `cate_name`, count(`products`.`prod_id`) AS `soluong` FROM (`categories` join `products` on(`categories`.`cate_id` = `products`.`cate_id`)) GROUP BY `categories`.`cate_id``cate_id`  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `doanhthu`
--
DROP TABLE IF EXISTS `doanhthu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doanhthu`  AS SELECT date_format(`khachhang`.`OrderTime`,'%e-%m') AS `ngay`, sum(`khachhang`.`price`) AS `doanhthu` FROM `khachhang` GROUP BY date_format(`khachhang`.`OrderTime`,'%e-%m')  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `order`
--
DROP TABLE IF EXISTS `order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order`  AS SELECT `dathang`.`orderId` AS `orderId`, `products`.`prod_name` AS `prod_name`, `dathang`.`quantity` AS `quantity`, `dathang`.`cus_id` AS `cus_id` FROM (`dathang` join `products` on(`dathang`.`prod_id` = `products`.`prod_id`))  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_Id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `info_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `khachhang` (`cus_id`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Các ràng buộc cho bảng `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
