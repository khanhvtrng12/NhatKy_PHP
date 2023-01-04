-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 30, 2022 lúc 04:18 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_admin`
--

DROP TABLE IF EXISTS `categories_admin`;
CREATE TABLE IF NOT EXISTS `categories_admin` (
  `id_categories` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories_admin` (`id_categories`, `name`, `image`, `content`, `created_time`, `last_updated`) VALUES
(79, 'Finger Spin', 'uploads/25-12-2022/finger-spin.gif', 'Finger spin (also known as off spin) is a type of bowling in the sport of cricket. It refers to the cricket technique and specific hand movements associated with imparting a particular direction of spin to the cricket ball. The other spinning technique, generally used to spin the ball in the opposite direction, is wrist spin. Although there are exceptions, finger spinners generally turn the ball less than wrist spinners. However, because the technique is simpler and easier to master, finger spinners tend to be more accurate', 1671981709, 1671982757),
(80, 'KHANHCUTE', 'uploads/25-12-2022/Cry.gif', 'dadawdawdawd', 1671982304, 1671982304),
(81, 'Quét nhà', 'uploads/25-12-2022/quetnha(1).gif', 'Quét nhà', 1671983278, 1671983278),
(82, 'Học bài', 'uploads/25-12-2022/study.gif', 'Study chill with me', 1671983786, 1671984190),
(83, 'Author', 'uploads/30-12-2022/ScreenShot_20221225184113(1).png', 'author', 1672373585, 1672373585);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` int NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `birthday`, `created_time`, `last_updated`) VALUES
(1, 'admin', 'Khanhcute', '12345678', 123, 123, 1553185530);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
