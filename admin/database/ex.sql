-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2019 lúc 11:15 AM
-- Phiên bản máy phục vụ: 10.3.15-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ex`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(100) NOT NULL,
  `nameUser` text NOT NULL,
  `emailUser` text NOT NULL,
  `passwordUser` text NOT NULL,
  `birthdayUser` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `emailUser`, `passwordUser`, `birthdayUser`) VALUES
(1, 'thuyduong', 'thuongduy24111998@gmail.com', '12345', '1998-11-24'),
(6, 'admin', 'admin@gmail.com', '12345', '2018-05-09'),
(7, 'abc', 'def@gmail.com', '12345', '1996-10-02'),
(8, 'user01', 'dsg@fdsf.com', '12345', '2019-06-05'),
(9, 'duong', 'htd@gmail.com', '12345', '2019-06-06'),
(11, 'user02', 'ade@df.com', 'df,f', '2019-06-07'),
(14, 'testu', 'admin123@gmail.com', '12345', '2019-06-07'),
(24, 'duong123', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-05-31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
