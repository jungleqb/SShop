-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 10, 2020 lúc 04:00 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `total` float NOT NULL,
  `dateOrder` timestamp NOT NULL DEFAULT current_timestamp(),
  `note` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `idUser`, `total`, `dateOrder`, `note`, `status`) VALUES
(65, 18, 1097000, '2020-03-01 08:39:07', 'Xin chào', 0),
(66, 11, 1088000, '2020-03-01 08:40:49', 'Xin chào', 0),
(67, 11, 798000, '2020-03-01 08:52:29', 'Xin chào', 0),
(68, 11, 1049000, '2020-03-01 08:59:31', 'Xin chào', 0),
(69, 18, 519000, '2020-03-01 09:00:00', 'Xin chào', 0),
(70, 18, 798000, '2020-03-01 09:05:19', 'Xin chào', 0),
(71, 18, 998000, '2020-03-01 09:07:51', 'Xin chào', 0),
(72, 18, 299000, '2020-03-01 09:17:41', 'Xin chào', 0),
(73, 18, 998000, '2020-03-01 09:18:25', 'Xin chào', 0),
(74, 18, 499000, '2020-03-04 05:52:11', 'Xin chào', 0),
(75, 18, 270000, '2020-03-07 14:42:15', 'Xin chào', 0),
(76, 18, 270000, '2020-03-07 14:57:42', 'Xin chào', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idBill` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `discountPrice` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT ' 0:chờ kiểm hàng, 1:chờ lấy hàng, 2:đang giao, 3:đã giao, 4:đã huỷ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`id`, `idProduct`, `idBill`, `quantity`, `price`, `discountPrice`, `status`) VALUES
(85, 2, 65, 2, 320000, 299000, 3),
(86, 4, 65, 1, 520000, 499000, 3),
(87, 3, 66, 1, 120000, 0, 3),
(88, 10, 66, 1, 170000, 0, 3),
(89, 13, 66, 2, 450000, 399000, 0),
(90, 2, 67, 1, 320000, 299000, 3),
(91, 4, 67, 1, 520000, 499000, 3),
(92, 3, 68, 1, 120000, 0, 3),
(93, 4, 68, 1, 520000, 499000, 3),
(94, 7, 68, 1, 430000, 0, 3),
(95, 3, 69, 1, 120000, 0, 3),
(96, 5, 69, 1, 240000, 199000, 3),
(97, 6, 69, 1, 220000, 200000, 3),
(98, 2, 70, 1, 320000, 299000, 3),
(99, 4, 70, 1, 520000, 499000, 3),
(100, 4, 71, 2, 520000, 499000, 3),
(101, 2, 72, 1, 320000, 299000, 3),
(102, 4, 73, 2, 520000, 499000, 3),
(103, 4, 74, 1, 520000, 499000, 3),
(104, 1, 75, 1, 270000, 0, 3),
(105, 1, 76, 1, 270000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0:name , 1:nữ',
  `mail` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `mail`, `tel`, `address`, `password`, `updateAt`) VALUES
(1, '01234568999', 0, 'chutiembanh998@gmail.com', '', 'Hoa Thuỷ', 'vanhai', '2020-02-09 15:08:45'),
(2, 'vanHai', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', 'vanhai', '2020-02-09 15:08:45'),
(3, 'vanHai', 0, 'sdfsdfds@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(4, 'Nguyễn Trường Đăng', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(5, 'Nguyễn Trường Đăng', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(6, 'Nguyễn Trường Đăng', 1, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(7, 'vanHai', 1, 'rrrrrrrr@mail', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(8, 'vanHai', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(9, 'vanHai', 1, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(10, 'Nguyễn Trường Đăng', 1, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(11, 'Nguyễn Trường Đăng', 0, 'rrrrrrrr@mail', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(12, 'vanHai', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(13, 'Nguyễn Trường Đăng', 1, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(14, 'vanHai', 1, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(15, 'vanHai', 1, 'sdfsdfds@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(16, 'Nguyễn Trường Đăng', 1, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(17, '1', 0, 'sdfsdfds@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(18, 'Nguyễn Trường Đăng', 0, 'rrrrrrrr@mail', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(19, 'vanHai', 1, 'rrrrrrrr@mail', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(20, 'Nguyen ku', 0, 'aaaaaaaaaaaaaa@gmail.com', 'aaaaaaaaaaa', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(21, 'vanHai', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(22, 'vanHai', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '', '2020-02-09 15:08:45'),
(23, 'vanHai', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', 'vanhai123', '2020-02-09 15:08:45'),
(24, 'vanHai', 1, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', 'vanhai', '2020-02-09 15:08:45'),
(25, 'Hải', 0, 'rrrrrrrr@mail', '01234568999', 'Hoa Thuỷ', 'a', '2020-02-09 15:08:45'),
(26, 'vanHai', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', 'vvv', '2020-02-09 15:08:45'),
(27, 'Nguyễn Trường Đăng', 0, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', 'aa', '2020-02-09 15:08:45'),
(28, 'Hải', 0, 'sdfsdfds@gmail.com', '01234568999', 'Hoa Thuỷ', 'vah', '2020-02-09 15:09:19'),
(29, 'Nguyễn Trường Đăng', 0, 'dangntps07570@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', 'dangnt', '2020-02-09 15:14:51'),
(30, 'vanHai', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', 'a', '2020-02-09 15:25:14'),
(31, 'Nguyễn Trường Đăng', 0, 'hainvps07661@fpt.edu.vn', '01234568999', 'Hoa Thuỷ', '55', '2020-02-09 15:26:30'),
(32, 'Hải', 0, 'chutiembanh998@gmail.com', '01234568999', 'Hoa Thuỷ', 'vanhai', '2020-02-09 15:29:48'),
(33, 'vanHai', 1, 'a@sss', '01234568999', '755/34/3 Lê Đức Thọ', '', '2020-02-24 18:01:57'),
(34, 'vanHai', 1, 'dangntps07570@fpt.edu.vn', '01234568999', '755/34/3 Lê Đức Thọ', '', '2020-02-24 18:02:54'),
(35, 'vanHai', 1, 'hainvps07661@fpt.edu.vn', '01234568999', '755/34/3 Lê Đức Thọ', '', '2020-02-24 18:04:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loginfb`
--

CREATE TABLE `loginfb` (
  `id` int(11) NOT NULL,
  `idfb` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0:nam, 1:nu',
  `address` varchar(220) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `titleKo` varchar(220) NOT NULL,
  `detail` text NOT NULL,
  `price` double NOT NULL,
  `promotionPrice` double NOT NULL DEFAULT 0,
  `coin` int(11) NOT NULL DEFAULT 0,
  `promotion` text NOT NULL,
  `img` varchar(220) NOT NULL,
  `thumbImg` varchar(220) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `buyed` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:thường, 1:hot',
  `new` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:old, 1:new',
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:chưa xoá, 1: đã xoá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `idType`, `idShop`, `title`, `titleKo`, `detail`, `price`, `promotionPrice`, `coin`, `promotion`, `img`, `thumbImg`, `view`, `buyed`, `status`, `new`, `updateAt`, `deleted`) VALUES
(1, 3, 1, 'Đầm nữ mẫu một', 'Dam-nu-mau-mot', '', 270000, 0, 270, '', 'p1.jpg', '', 1, 2, 0, 0, '0000-00-00 00:00:00', 0),
(2, 3, 1, 'Đầm nữ số hai', 'Dam-nu-so-hai', '', 320000, 299000, 320, '', 'p3.jpg', '', 0, 11, 0, 1, '2019-12-29 06:40:29', 0),
(3, 3, 1, 'Đầm nữ số ba', 'Dam-nu-so-ba', '', 120000, 0, 120, '', 'p2.jpg', '', 0, 7, 1, 1, '2019-12-28 06:40:29', 0),
(4, 3, 1, 'Đầm nữ số bốn', 'Dam-nu-so-bon', '', 520000, 499000, 520, '', 'p4.jpg', '', 0, 14, 1, 0, '2019-12-28 06:40:29', 0),
(5, 3, 1, 'Đầm nữ số năm', 'Dam-nu-so-nam', '', 240000, 199000, 240, '', 'p5.jpg', '', 1, 9, 0, 0, '2019-12-28 06:40:29', 0),
(6, 3, 1, 'Đầm nữ số sáu', 'Dam-nu-so-sau', '', 220000, 200000, 220, '', 'p6.jpg', 'p6-1.jpg,p6-2.jpg,p6-3.jpg', 0, 3, 0, 0, '2019-12-28 06:40:29', 0),
(7, 3, 1, 'Đầm nữ số bảy', 'Dam-nu-so-bay', '', 430000, 0, 430, '', 'p7.jpg', '', 0, 4, 1, 1, '2019-12-28 06:40:29', 0),
(8, 3, 1, 'Đầm nữ số tám', 'Dam-nu-so-tám', '', 210000, 0, 210, '', 'p8.jpg', '', 0, 0, 0, 0, '2019-12-28 06:40:29', 0),
(9, 3, 1, 'Đầm nữ số chín', 'Dam-nu-so-chin', '', 250000, 0, 250, '', 'p9.jpg', '', 0, 0, 0, 1, '2019-12-28 06:40:29', 0),
(10, 3, 1, 'Đầm nữ số mười', 'Dam-nu-so-muoi', '', 170000, 0, 170, '', 'p10.jpg', '', 0, 6, 1, 0, '2019-12-28 06:40:29', 0),
(11, 4, 1, 'Áo thun cổ rộng', 'Ao-thun-co-rong', '', 320000, 0, 320, '', '1582305251-nanaring_39956871_260459691296894_8847471714515288064_n.jpg', NULL, 0, 2, 0, 0, '2020-02-21 17:14:11', 0),
(13, 4, 2, 'Áo thun hàng hiệu', 'Ao-thun-hang-hieu', '', 450000, 399000, 450, '', '1582339245-nanaring_45484977_268350060517659_8874387256563074465_n.jpg', NULL, 0, 18, 1, 0, '2020-02-22 02:40:45', 0),
(14, 4, 2, 'Quần đùi', 'Quan-dui', '', 400000, 399000, 400, '', '1582519619-mandylinzhen_27581229_889361837910401_281626412962545664_n.jpg', NULL, 0, 7, 1, 0, '2020-02-24 04:46:59', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `star` float NOT NULL,
  `comment` text NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nameKo` varchar(200) NOT NULL,
  `avatar` varchar(220) DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`id`, `idUser`, `name`, `nameKo`, `avatar`, `cover`, `about`, `view`, `updateAt`) VALUES
(1, 1, 'K-shop', 'K-shop', NULL, NULL, '', 0, '2020-02-17 08:01:50'),
(2, 11, 'T-Shop', 'T-Shop', NULL, NULL, '', 0, '2020-02-22 02:37:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `imgAlt` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thumbnail`
--

INSERT INTO `thumbnail` (`id`, `idProduct`, `img`, `imgAlt`) VALUES
(1, 6, 'p6-1.jpg', NULL),
(2, 6, 'p6-2.jpg', NULL),
(3, 6, 'p6-3.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproduct`
--

CREATE TABLE `typeproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `nameKo` varchar(220) NOT NULL,
  `parentId` int(11) NOT NULL DEFAULT 0 COMMENT '0: danh mục cha',
  `img` varchar(220) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: chứa xoá, 1: đã xoá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `typeproduct`
--

INSERT INTO `typeproduct` (`id`, `name`, `nameKo`, `parentId`, `img`, `deleted`) VALUES
(1, 'Thời trang nam', 'Thoi-trang-nam', 7, 'tnam.jpg', 0),
(2, 'Thời trang nữ', 'Thoi-trang-nu', 7, 'tnu.jpg', 0),
(3, 'Đầm nữ', 'Dam-nu', 2, 'dnu.jpg', 0),
(4, 'Áo thun nam', 'Ao-thun-nam', 1, 'aothunnam.jpg', 0),
(5, 'Áo khoác nam', 'Ao-khoac-nam', 1, 'aokhoacnam.jpg', 0),
(7, 'Thời trang-Phụ kiện', 'Thoi-trang-Phu-kien', 0, '', 0),
(8, 'Laptop-Phụ kiện', 'Laptop-Phu-kien', 0, '', 0),
(9, 'Laptop chính hãng', 'Laptop-chinh-hang', 8, '', 0),
(10, 'Dell', 'Dell', 9, '', 0),
(11, 'Phụ kiện, linh kiện máy tính', 'Phu-kien-linh-kien-may-tinh', 8, '', 0),
(12, 'USB', 'USB', 11, '', 0),
(13, 'Giày dép nam', 'Giay-dep-nam', 7, '', 0),
(14, 'Giày dép nữ', 'Giay-dep-nu', 7, '', 0),
(15, 'Dép nam', 'Dep-nam', 13, '', 0),
(16, 'Phụ kiện giày nam', 'Phu-kien-giay-nam', 13, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'avatar.jpg',
  `gender` int(1) NOT NULL DEFAULT 0 COMMENT '0:Nam, 1:nữ',
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `coinTotal` int(11) NOT NULL DEFAULT 0,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `pass`, `avatar`, `gender`, `address`, `phone`, `coinTotal`, `updateAt`, `status`) VALUES
(1, 'Văn Hải', 'chutiembanh998@gmail.com', 'vanhai123', 'avatar.jpg', 0, 'Xóm chùa', '01863007462', 10, '2020-02-07 02:56:32', 0),
(11, 'Nguyễn Trường Đăng', 'dangntps07570@fpt.edu.vn', 'dangnt', 'avatar.jpg', 0, 'Hoa Thuỷ', '01234568999', 50, '2020-02-09 15:14:54', 0),
(18, 'Admin', 'hainvps07661@fpt.edu.vn', 'a', 'avatar.jpg', 0, 'sssssssssss', '03256555555', 120, '2020-02-29 07:29:50', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b-u` (`idUser`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bdt-pro` (`idProduct`),
  ADD KEY `bdt-b` (`idBill`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loginfb`
--
ALTER TABLE `loginfb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro-type` (`idType`),
  ADD KEY `pro-s` (`idShop`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r-u` (`idUser`),
  ADD KEY `r-p` (`idProduct`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s-u` (`idUser`);

--
-- Chỉ mục cho bảng `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thum-pro` (`idProduct`);

--
-- Chỉ mục cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `loginfb`
--
ALTER TABLE `loginfb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `b-u` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `bdt-b` FOREIGN KEY (`idBill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bdt-pro` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `pro-s` FOREIGN KEY (`idShop`) REFERENCES `shop` (`id`),
  ADD CONSTRAINT `pro-type` FOREIGN KEY (`idType`) REFERENCES `typeproduct` (`id`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `r-p` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `r-u` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `s-u` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thum-pro` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
