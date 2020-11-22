-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2020 lúc 10:22 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdb`
--
CREATE DATABASE IF NOT EXISTS `webdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webdb`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblchitiethd`
--

DROP TABLE IF EXISTS `tblchitiethd`;
CREATE TABLE `tblchitiethd` (
  `MaHD` varchar(30) NOT NULL,
  `idSach` varchar(30) NOT NULL,
  `SoLuong` varchar(30) NOT NULL,
  `GiaBan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblchitiethd`
--

INSERT INTO `tblchitiethd` (`MaHD`, `idSach`, `SoLuong`, `GiaBan`) VALUES
('HDprohz@gmail.com0', 'id10', '1', '800'),
('HDprohz@gmail.com0', 'id2', '3', '500'),
('HDprohz@gmail.com0', 'id6', '1', '600'),
('HDprohz@gmail.com1', 'id1', '1', '200'),
('HDprohz@gmail.com1', 'id8', '1', '900'),
('HDtangchichung@gmail.com1', 'id7', '1', '800');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblhoadon`
--

DROP TABLE IF EXISTS `tblhoadon`;
CREATE TABLE `tblhoadon` (
  `MaHD` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TongTien` varchar(30) NOT NULL,
  `TinhTrang` varchar(30) NOT NULL,
  `NgayThang` date NOT NULL,
  `Email_NhanVien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblhoadon`
--

INSERT INTO `tblhoadon` (`MaHD`, `Email`, `TongTien`, `TinhTrang`, `NgayThang`, `Email_NhanVien`) VALUES
('HDprohz@gmail.com0', 'prohz@gmail.com', '2900', 'Đã hoàn thành', '2020-06-16', 'nhanvien@gmail.com'),
('HDprohz@gmail.com1', 'prohz@gmail.com', '1100', 'Đã hoàn thành', '2020-06-16', 'nhanvien@gmail.com'),
('HDtangchichung@gmail.com1', 'tangchichung@gmail.com', '800', 'Đã hoàn thành', '2020-06-19', 'nhanvien@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsach`
--

DROP TABLE IF EXISTS `tblsach`;
CREATE TABLE `tblsach` (
  `idSach` varchar(30) NOT NULL,
  `tensach` varchar(30) NOT NULL,
  `idTheLoai` varchar(30) NOT NULL,
  `GiaBan` varchar(30) NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `ThongTin` varchar(200) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblsach`
--

INSERT INTO `tblsach` (`idSach`, `tensach`, `idTheLoai`, `GiaBan`, `urlHinh`, `ThongTin`, `HienThi`) VALUES
('132', 'Kỹ Thuật', '3', '2', 'sach9.png', 'GG!', 1),
('194', 'AllahuAkBa', '3', '123', 'mum.jfif', 'Lập trình C và C++ sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình\r\nC là một ngôn ngữ thủ tục, trong khi C++ là hướng đối tượng. Tính năng này đề cập đến phong cách lập trình mà các nhà phát triển tuân...', 0),
('224', 'adfdasf', '2', '123', 'q4.jpeg', 'Lập trình C và C++ sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình\r\nC là một ngôn ngữ thủ tục, trong khi C++ là hướng đối tượng. Tính năng này đề cập đến phong cách lập trình mà các nhà phát triển tuân...', 0),
('52', 'Kỹ Thuật Nâng Cao', '1', '1000', 'tokill.jpg', 'aaaaaaaaaaaaa\r\n', 0),
('id1', 'Lập trình C và C++', '1', '200', 'sach1.jpg', 'Lập trình C và C++ sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình\r\nC là một ngôn ngữ thủ tục, trong khi C++ là hướng đối tượng. Tính năng này đề cập đến phong cách lập trình mà các nhà phát triển tuân...', 0),
('id10', 'The Great Convergence', '3', '800', 'hp.jpg', 'The Great Convergence: Information Technology and the New Globalization [Baldwin, Richard] on Amazon.com. *FREE* shipping on qualifying offers.', 0),
('id2', 'Lập trình Java', '1', '500', 'sach2.jpg', 'Lập trình Java sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình\r\nava là một ngôn ngữ lập trình hướng đối tượng và dựa trên các lớp. Khác với phần lớn ngôn ngữ lập trình thông thường, thay vì biên dịch mã', 0),
('id3', 'Lập trình C#', '1', '400', 'sach3.png', 'Lập trình C# sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình\r\nC# là ngôn ngữ lập trình hướng đối tượng, được Microsoft phát triển dựa trên nền tảng của ngôn ngữ Java và C++... Hướng dẫn lập trình C# cho n', 0),
('id4', 'Lập trình PyThon', '1', '450', 'sach4.jfif', 'Lập trình PyThon sẽ giúp bạn hiểu rõ hơn về vấn đề lập trình.\r\nPython là một ngôn ngữ lập trình bậc cao cho các mục đích lập trình đa năng, do Guido van Rossum tạo ra và lần đầu ra mắt vào năm 1991', 0),
('id5', 'Cấu trúc dữ liệu và giải thuật', '2', '600', 'sach5.jfif', 'Cấu trúc dữ liệu và giải thuật giúp bạn cứng cỏi hơn.\r\nCấu trúc dữ liệu và giải thuật (Data Structure and Algorithms) - Học Cấu trúc dữ liệu & giải thuật với ngôn ngữ C, C++ và Java theo các bước cơ b', 0),
('id6', 'Các bài toán Quy Hoạch Động', '2', '600', 'sach6.jpg', 'Trong ngành khoa học máy tính, quy hoạch động là một phương pháp giảm thời gian chạy của các thuật toán thể hiện các tính chất của các bài toán con gối nhau và cấu trúc con tối ưu.', 0),
('id7', 'Clean Code', '3', '800', 'sach7.jpg', 'Code của bạn được coi là “Clean” nếu có thể được hiểu một cách rõ ràng bởi các thành viên trong team. Clean code có thể đọc và phát triển bởi developer khác, với sự dễ hiểu, dễ thay đổi, dễ bảo trì, d', 0),
('id8', 'Java Core 1st Edition', '3', '900', 'sach8.jpg', 'Core Java for the Impatient (1st Edition) [Cay S. Horstmann] on Amazon.com. *FREE* shipping on qualifying offers. Paperback International Edition ... Same .', 0),
('id9', 'Fundamentals of IT', '3', '700', 'sach9.png', 'IT Fundamentals. IT Fundamentals includes computer hardware, computer software, networking, security, and basic IT literacy. This course comprises 15 lessons covering IT fundamentals. ... The course a', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltaikhoan`
--

DROP TABLE IF EXISTS `tbltaikhoan`;
CREATE TABLE `tbltaikhoan` (
  `email` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `capbac` varchar(30) NOT NULL,
  `Del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`email`, `matkhau`, `capbac`, `Del`) VALUES
('adjj@gmail.com', '123', 'nhanvien', 0),
('admin@gmail.com', 'admin', 'admin', 0),
('hacker@gmail.com', '123', 'khachhang', 1),
('khachhang@gmail.com', 'khachhang', 'khachhang', 0),
('nhanvien@gmail.com', '123', 'nhanvien', 0),
('prohz@gmail.com', '123', 'khachhang', 0),
('tangchichung@gmail.com', '123', 'khachhang', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltheloai`
--

DROP TABLE IF EXISTS `tbltheloai`;
CREATE TABLE `tbltheloai` (
  `idTheLoai` varchar(30) NOT NULL,
  `tenTheLoai` varchar(30) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbltheloai`
--

INSERT INTO `tbltheloai` (`idTheLoai`, `tenTheLoai`, `HienThi`) VALUES
('1', 'Sách Kỹ Thuật Lập Trình', 0),
('2', 'Sách Thuật Toán Và Giải Thuật', 0),
('3', 'Sách Tiếng Anh Chuyên Ngành', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblthongtin`
--

DROP TABLE IF EXISTS `tblthongtin`;
CREATE TABLE `tblthongtin` (
  `hovaten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `goitinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblthongtin`
--

INSERT INTO `tblthongtin` (`hovaten`, `email`, `goitinh`) VALUES
('ashdjas', 'adjj@gmail.com', 'nam'),
('admin', 'admin@gmail.com', 'nam'),
('hacker', 'hacker@gmail.com', 'nam'),
('khachhang', 'khachhang@gmail.com', 'nữ'),
('nhanvien', 'nhanvien@gmail.com', 'nam'),
('prohz', 'prohz@gmail.com', 'nam'),
('admin', 'tangchichung@gmail.com', 'nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  ADD PRIMARY KEY (`MaHD`,`idSach`),
  ADD KEY `FKCTHDISSACH` (`idSach`),
  ADD KEY `FKCTHDMAHD` (`MaHD`);

--
-- Chỉ mục cho bảng `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FKEmail_HD` (`Email`),
  ADD KEY `FKNAHAsd` (`Email_NhanVien`);

--
-- Chỉ mục cho bảng `tblsach`
--
ALTER TABLE `tblsach`
  ADD PRIMARY KEY (`idSach`),
  ADD KEY `FKTL` (`idTheLoai`);

--
-- Chỉ mục cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `tbltheloai`
--
ALTER TABLE `tbltheloai`
  ADD PRIMARY KEY (`idTheLoai`);

--
-- Chỉ mục cho bảng `tblthongtin`
--
ALTER TABLE `tblthongtin`
  ADD PRIMARY KEY (`email`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  ADD CONSTRAINT `FKCTHDISSACH` FOREIGN KEY (`idSach`) REFERENCES `tblsach` (`idSach`),
  ADD CONSTRAINT `FKCTHDMAHD` FOREIGN KEY (`MaHD`) REFERENCES `tblhoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD CONSTRAINT `FKEmail_HD` FOREIGN KEY (`Email`) REFERENCES `tblthongtin` (`email`),
  ADD CONSTRAINT `FKNAHAsd` FOREIGN KEY (`Email_NhanVien`) REFERENCES `tbltaikhoan` (`email`);

--
-- Các ràng buộc cho bảng `tblsach`
--
ALTER TABLE `tblsach`
  ADD CONSTRAINT `FKTL` FOREIGN KEY (`idTheLoai`) REFERENCES `tbltheloai` (`idTheLoai`);

--
-- Các ràng buộc cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD CONSTRAINT `FK` FOREIGN KEY (`email`) REFERENCES `tblthongtin` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
