-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 09:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookStore`
--
create database BookStore;
USE `BookStore`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'nam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `fullname` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `fullname`, `createdate`) VALUES
(1, 'Nam', '2017-04-28 16:54:34');



-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 62, 0, '0'),
(2, 2, 60, 1, '50');

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `diachinhan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id_khachhang`, `tenkhachhang`, `email`, `matkhau`, `dienthoai`, `diachinhan`) VALUES
(1, 'Nam', 'admin', '123', 3, '3');

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `hinhanhsp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_sp`, `hinhanhsp`) VALUES
(1, 1, '5333c3a2022c86bedc4114b79a7a09ad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hieusp`
--

CREATE TABLE `hieusp` (
  `idhieusp` int(11) NOT NULL,
  `tenhieusp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Nhà Xuất Bản`
--

INSERT INTO `hieusp` (`idhieusp`, `tenhieusp`, `tinhtrang`) VALUES
(1, 'Nhà Xuất Bản Kim Đồng', '1'),
(2, 'Nhà xuất bản Trẻ', '1'),
(3, 'Nhà xuất bản Nhã Nam', '1'),
(4, 'Nhà xuất bản chính trị quốc gia', '1'),
(5, 'Nhà xuất bản giáo dục', '1'),
(6, 'Nhà xuất bản Hội Nhà văn', '1'),
(7, 'Nhà xuất bản Tư pháp', '1'),
(8, 'Nhà xuất bản thông tin và truyền thông', '1'),
(9, 'Nhà xuất bản lao động', '1'),
(10, 'Nhà xuất bản giao thông vận tải', '1');
-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `idloaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--
INSERT INTO `loaisp` (`idloaisp`, `tenloaisp`, `tinhtrang`) VALUES
(1, 'English Books', '1'),
(2, 'Sách văn học', '1'),
(3, 'Sách kinh tế', '1'),
(4, 'Sách thiếu nhi', '1'),
(5, 'Sách kĩ năng sống', '1'),
(6, 'Sách Bà mẹ-Em bé', '1'),
(7, 'Sách Giáo Khoa-Giáo Trình', '1'),
(8, 'Sách Học Ngoại Ngữ', '1'),
(9, 'Sách Tham Khảo', '1'),
(10, 'Từ Điển', '1'),
(11, 'Sách Kiến Thức Tổng Hợp', '1'),
(12, 'Sách Khoa Học-Kỹ Thuật', '1'),
(13, 'Sách Lịch Sử', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(11) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `masp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giadexuat` float NOT NULL,
  `giagiam` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `loaisp` int(11) NOT NULL,
  `nhasx` int(11) NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensp`, `masp`, `hinhanh`, `giadexuat`, `giagiam`, `soluong`, `loaisp`, `nhasx`, `tinhtrang`, `noidung`) VALUES
(1, 'Ta Ba Lô Trên Đất Á', 'M01', '5333c3a2022c86bedc4114b79a7a09ad.jpg', 89, 89, 1, 5, 4, '1', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `idtintuc` int(11) NOT NULL,
  `tentintuc` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`idtintuc`, `tentintuc`, `matin`, `hinhanh`, `noidung`, `tinhtrang`) VALUES
(2, 'Nhiá»u di Ä‘á»™ng bom táº¥n giáº£m giÃ¡ tiá»n triá»‡u trong thÃ¡ng 4', 't2', 'Jet.jpg', 'ThÃ¡ng 4 chá»©ng kiáº¿n biáº¿n Ä‘á»™ng lá»›n vá» giÃ¡ cá»§a nhiá»u di Ä‘á»™ng cao cáº¥p bá»Ÿi Ä‘Ã¢y lÃ  thá»i Ä‘iá»ƒm thá»‹ trÆ°á»ng chÃ o Ä‘Ã³n nhiá»u model Ä‘á»i má»›i.\r\nNhieu di dong bom tan giam gia tien trieu trong thang 4 hinh anh 1\r\niPhone 7, 7 Plus Jet Black (giáº£m 3 triá»‡u Ä‘á»“ng): Tá»« chá»— lÃ  smartphone hot nháº¥t trÃªn thá»‹ trÆ°á»ng, iPhone Jet Black giá» Ä‘Ã¢y trá»Ÿ thÃ nh máº·t hÃ ng áº¿ áº©m, cáº§n giáº£m giÃ¡ Ä‘á»ƒ thanh lÃ½. Tá»« hÃ ng xÃ¡ch tay cho Ä‘áº¿n chÃ­nh hÃ£ng, ngÆ°á»i dÃ¹ng Ä‘á»u Ä‘ang chá»©ng kiáº¿n mÃ n giáº£m giÃ¡ cá»§a nhá»¯ng chiáº¿c iPhone thá»i thÆ°á»£ng nÃ y. CÃ¡c Ä‘áº¡i lÃ½ lá»›n Ä‘ang cÃ´ng bá»‘ chÆ°Æ¡ng trÃ¬nh giáº£m giÃ¡ lÃªn Ä‘áº¿n 3 triá»‡u cho iPhone Jet Black. Cháº³ng háº¡n, iPhone 7 128 GB Jet Black giá» Ä‘Ã¢y cÃ³ giÃ¡ bÃ¡n chá»‰ 18,8 triá»‡u Ä‘á»“ng, 7 Plus lÃ  22,2 triá»‡u Ä‘á»“ng.', '1'),
(4, 'Ufeel Prime ghi Ä‘iá»ƒm vá»›i thiáº¿t káº¿ Ä‘áº¹p, cáº¥u hÃ¬nh tá»‘t', 'h7', 'image001.png', 'Tinh táº¿ vÃ  trang nhÃ£, Ufeel Prime lÃ  thÃ nh viÃªn má»›i nháº¥t trong dÃ²ng Ufeel cÃ³ thiáº¿t káº¿ kim loáº¡i cao cáº¥p vÃ  sang trá»ng.\r\nDÆ°á»›i Ä‘Ã¢y lÃ  má»™t vÃ i Æ°u Ä‘iá»ƒm ná»•i trá»™i cá»§a dÃ²ng smartphone nÃ y.\r\n\r\nThiáº¿t káº¿ sang trá»ng vÃ  lá»‹ch lÃ£m\r\nWiko U-Feel Prime lÃ  báº£n nÃ¢ng cáº¥p cá»§a Wiko U-Feel. Chiáº¿c smartphone nÃ y sá»Ÿ há»¯u nhiá»u nÃ¢ng cáº¥p máº¡nh máº½, káº¿t há»£p cÃ¹ng sáº¯c mÃ u tinh táº¿ - xÃ¡m than, báº¡c vÃ  Ã¡nh kim. KhÃ´ng chá»‰ cÃ³ thiáº¿t káº¿ Ä‘áº¹p máº¯t, mÃ n hÃ¬nh 5 inch Full HD vá»›i Ä‘á»™ phÃ¢n giáº£i lÃªn Ä‘áº¿n 1920 x 1080 pixel sáº½ giÃºp ngÆ°á»i dÃ¹ng chÆ¡i game vÃ  xem phim vá»›i tráº£i nghiá»‡m mÆ°á»£t mÃ .', '1'),
(5, '3 máº«u Ä‘iá»‡n thoáº¡i PhÃ¡p thiáº¿t káº¿ Ä‘áº¹p, giÃ¡ dÆ°á»›i 4 triá»‡u Ä‘á»“ng', 'y6', 'image001_11.jpg', 'Ufeel vÃ  Ufeel Go\r\nSá»Ÿ há»¯u nhiá»u thÃ´ng sá»‘ tÆ°Æ¡ng Ä‘á»“ng, bá»™ Ä‘Ã´i Ufeel vÃ  Ufeel Go lÃ  Ä‘áº¡i diá»‡n hiáº¿m hoi cÃ³ má»©c giÃ¡ dÆ°á»›i 3,999 triá»‡u Ä‘á»“ng sá»Ÿ há»¯u cáº£m biáº¿n vÃ¢n tay. Äiá»ƒm Ä‘áº·c biá»‡t, cáº£m biáº¿n nÃ y cÃ³ kháº£ nÄƒng nháº­n diá»‡n 5 dáº¥u vÃ¢n tay. Vá»›i má»—i ngÃ³n tay khÃ¡c nhau, mÃ¡y sáº½ khá»Ÿi cháº¡y nhá»¯ng á»©ng dá»¥ng riÃªng biá»‡t Ä‘Ã£ gÃ¡n sáºµn.\r\n\r\nMÃ¡y há»— trá»£ 4G, má»Ÿ khÃ³a báº±ng vÃ¢n tay vÃ  cháº¡y Android 6.0 Marshmallow - nhá»¯ng yáº¿u tá»‘ hÃ ng Ä‘áº§u chá»n mua smartphone hiá»‡n nay. Hai thiáº¿t bá»‹ nÃ y Ä‘Æ°á»£c trang bá»‹ thanh RAM 3 GB.', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `hieusp`
--
ALTER TABLE `hieusp`
  ADD PRIMARY KEY (`idhieusp`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloaisp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idtintuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `hieusp`
--
ALTER TABLE `hieusp`
  MODIFY `idhieusp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idloaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idtintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
