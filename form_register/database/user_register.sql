-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2021 lúc 04:29 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_register`
--

CREATE TABLE `user_register` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `id` int(6) NOT NULL,
  `gender` bit(1) NOT NULL,
  `languages` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_register`
--

INSERT INTO `user_register` (`firstname`, `lastname`, `phone`, `email`, `addr`, `descriptions`, `id`, `gender`, `languages`, `image`) VALUES
('nguyen', 'nam', '1231231233', 'nam@gmail.com', 'quang tri', '1111', 1, b'1', 'PHP JAVA CSHARP', 'images/Screenshot.png'),
('Nguyen', 'Nhat Nam', '1231231234', 'nam4@gmail.com', 'qweqwe', '1111', 2, b'0', 'JAVA CSHARP', 'images/Screenshot.png'),
('võ', 'hải đăng', '0987345424', 'haidangvo@gmail.com', 'thừa thiên huế', '', 4, b'1', 'JAVA CSHARP', 'images/Screenshot.png'),
('Lee Min', 'Hô', '0987345424', 'dangvohai@gmail.com', 'Bình Thuận, Việt Nam', 'dang ky hoc php trong 3 tháng', 6, b'1', 'PHP', 'images/Screenshot.png'),
('nguyễn', 'nam', '1233211231', 'hung@gmail.com', 'thua thien hue', '1 22 333 4444 55555 666666 7777777 88888888 999999999', 7, b'0', 'CSHARP', 'images/Screenshot.png'),
('Bùi Tiến', 'Dũng', '0987098778', 'dungbui@gmail.com', 'Hà Nội', 'Dũng lò vôi', 8, b'0', 'PHP', 'images/Screenshot.png'),
('Phan Tiến', 'Dũng', '1112223331', 'phantiendung@gmail.com', 'thua thien hue', '', 9, b'1', 'JAVA', 'images/Screenshot.png'),
('Nguyễn Tấn', 'Dũng', '1112223312', 'nguyentandung1@gmail.com', 'vung tau', 'dũng xếp', 11, b'1', 'JAVA CSHARP', 'images/Screenshot.png'),
('Nguyễn Tấn', 'Dũng', '1112213331', 'nguyentanduang@gmail.com', 'dinh dinh', '', 12, b'1', 'JAVA CSHARP', 'images/Screenshot.png'),
('Nguyễn Tấn', 'Dũng', '2212219931', 'nguyent1aanduang@gmail.com', 'da nang', '', 14, b'1', 'JAVA CSHARP', 'images/Screenshot.png'),
('Nguyễn Tấn', 'Dũng', '2219919931', 'nguyent1aandquang@gmail.com', 'hai phong', '', 15, b'1', 'JAVA CSHARP', 'images/Screenshot.png'),
('hoang', 'quang', '0987789999', 'quang@gmail.com', 'thua thien hue', 'mo ta', 17, b'1', 'PHP', 'images/Screenshot.png'),
('dung', 'nguyen', '0909090909', 'nguyendung@gmail.com', 'quang nam', 'qưeqwe', 18, b'0', 'PHP', 'images/Screenshot.png'),
('new', 'man', '1231231239', 'new@gmail.com', 'aaaaa', 'aaaaaaaaaaaaaaaaa', 20, b'0', 'PHP', 'images/Screenshot (12).png'),
('anh moi', 'moi anh', '9998889991', 'tinh@gmail.com', 'aaaaa', '11111111111111111', 21, b'0', 'JAVA', 'images/'),
('anh moi', 'moi anh', '9998789991', 'tibnh@gmail.com', 'aaaaa', '11111111111111111', 22, b'1', 'JAVA', 'images/Screenshot (14).png'),
('anh moi', 'moi anh', '9998789191', 'tivbnh@gmail.com', 'aaaaa', '11111111111111111', 23, b'0', 'JAVA', 'images/Screenshot (19).png'),
('test', 'test', '6576757761', 'test test@gmail.com', 'hue', 'hung thuan', 24, b'1', 'PHP', 'images/Screenshot (54).png'),
('test', 'test', '6576337761', 'tes2test@gmail.com', 'asdasd', 'hung thuan', 25, b'1', 'PHP', 'images/'),
('hùng', 'thuận', '1231231200', 'doiquaaa@gmail.com', 'tôn thất tình', 'aaaaa', 26, b'1', 'PHP CSHARP', 'images/'),
('hùng', 'thuận', '1231231201', 'doiquaaaa@gmail.com', 'tôn thất tình', 'aaaaa', 27, b'1', 'PHP CSHARP', 'images/Screenshot (51).png'),
('minh', 'anh', '0987654323', 'caominhanh@gmail.com', 'thua thien hue', 'minh anh cao', 28, b'0', 'JAVA', 'images/'),
('ddddddddddddd', 'aaaaaaaaa', '0931231231', 'aaaaaa@gmail.com', 'aaaaaaaaa', 'aaaaaaa', 29, b'1', 'PHP', 'images/'),
('ddddddddddddd', 'aaaaaaaaa', '0931239231', 'aaaaaas@gmail.com', 'aaaaaaaaa', 'aaaaaaa', 30, b'1', 'PHP', 'images/Screenshot (35).png'),
('lê văn', 'hướng', '1212121212', 'huong@gmail.com', 'quang trung', 'le van huong', 31, b'1', 'PHP', 'images/Screenshot (24).png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
