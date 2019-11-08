-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2019 lúc 05:44 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idcmt` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `idsp` int(11) NOT NULL,
  `noidung` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caidat`
--

CREATE TABLE `caidat` (
  `idcd` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `caidat`
--

INSERT INTO `caidat` (`idcd`, `logo`, `diachi`, `sdt`, `email`) VALUES
(2, 'logo.png', 'KM 27, Trường Yên, Huyện chương mỹ, Hà Nội', 975373867, 'virus10898 @ gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendm` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `tendm`) VALUES
(1, 'Máy Giặt'),
(2, 'Điều Hòa'),
(3, 'Smart TV'),
(4, 'Tủ Lạnh'),
(5, 'Nồi Cơm Điện'),
(8, 'dm1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `iddm` int(11) NOT NULL,
  `tensp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `giasale` int(11) NOT NULL,
  `xuatsu` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `chitiet` text COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaydang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `iddm`, `tensp`, `anh`, `gia`, `giasale`, `xuatsu`, `chitiet`, `ngaydang`) VALUES
(10, 4, 'Máy giặt', 'tl5.jpg', 15000000, 123444, '', '<p>Hiện nay tại c&aacute;c cửa h&agrave;ng b&aacute;n h&agrave;ng nội địa của Nhật cũng c&oacute; b&aacute;n qua c&aacute;c d&ograve;ng sản phẩm m&aacute;y giặt đ&atilde; qua sử dụng. C&aacute;c d&ograve;ng sản phẩm n&agrave;y thường c&oacute; gi&aacute; rẻ hơn v&agrave; mang m&aacute;c h&agrave;ng Nhật c&oacute; chất lượng cao v&agrave; bền. Tuy nhi&ecirc;n c&oacute; nhiều cửa h&agrave;ng v&igrave; trục lợi đ&atilde; mua lại những sản phẩm đ&atilde; bị hư hỏng sau đ&oacute; về t&acirc;n trang lại v&agrave; thay thế rất nhiều phụ t&ugrave;ng b&ecirc;n trong rồi b&aacute;n lại cho người ti&ecirc;u d&ugrave;ng. V&igrave; thế nếu người d&ugrave;ng mua phải c&aacute;c sản phẩm n&agrave;y sẽ sử dụng kh&ocirc;ng được ổn định v&agrave; đ&uacute;ng chất lượng như mong muốn. Ch&iacute;nh v&igrave; thế bạn kh&ocirc;ng n&ecirc;n mua m&aacute;y giặt nội địa của Nhật đ&atilde; qua sử dụng để đảm bảo an t&acirc;m về chất lượng nhất.</p>\r\n', '2019-10-17'),
(11, 1, 'Máy Giặt Đa Năng', 'mg2.jpg', 88888888, 30000, '', '<h3><strong>1.2. Nghi&ecirc;n cứu trước về đời m&aacute;y, c&aacute;c chức năng</strong></h3>\r\n\r\n<p>Th&ocirc;ng thường c&aacute;c sản phẩm m&aacute;y giặt của Nhật c&oacute; nhiều t&iacute;nh năng ưu việt hơn những h&atilde;ng kh&aacute;c. Nhưng trước khi mua v&agrave; sử dụng bạn cần phải nghi&ecirc;n cứu kỹ v&agrave; test những chức năng đ&oacute; thật cẩn thận. Th&ocirc;ng thường những sản phẩm m&aacute;y giặt của Nhật đời c&agrave;ng cao, c&agrave;ng mới nhất th&igrave; ch&uacute;ng sở hữu nhiều c&ocirc;ng nghệ v&agrave; chế độ giặt hiện đại. Tuy nhi&ecirc;n bạn cũng n&ecirc;n biết trước những th&ocirc;ng tin cơ bản về c&aacute;c đời m&aacute;y v&agrave; chức năng của ch&uacute;ng để c&oacute; thể kiểm tra kỹ c&agrave;ng trước khi mua.</p>\r\n\r\n<h4><strong>Chức năng l&agrave;m sạch</strong></h4>\r\n\r\n<p>Chức năng l&agrave;m sạch l&agrave; chức năng cơ bản của một chiếc m&aacute;y giặt. T&ugrave;y theo c&ocirc;ng nghệ m&agrave; chiếc m&aacute;y giặt nội địa Nhật sở hữu sẽ c&oacute; mức độ l&agrave;m sạch kh&aacute;c nhau c&ugrave;ng với đ&oacute; l&agrave; mức độ ti&ecirc;u thụ điện năng v&agrave; nước kh&aacute;c nhau.</p>\r\n\r\n<p>Khi mua c&aacute;c d&ograve;ng sản phẩm m&aacute;y giặt của Nhật bạn n&ecirc;n chọn loại sản phẩm c&oacute; hai bộ lọc ri&ecirc;ng biệt kh&aacute;c nhau theo dạng khay k&eacute;o để c&oacute; thể dễ th&aacute;o lắp. Ngo&agrave;i ra việc chọn hai bộ lọc n&agrave;y c&ograve;n gi&uacute;p quần &aacute;o kh&ocirc;ng bị d&iacute;nh sợi vải như th&ocirc;ng thường.</p>\r\n\r\n<h4><strong>Chức năng chống nhăn</strong></h4>\r\n\r\n<p>C&oacute; những loại m&aacute;y giặt của Nhật c&oacute; những c&ocirc;ng nghệ hiện đại gi&uacute;p mềm sợi vải trong qu&aacute; tr&igrave;nh giặt từ đ&oacute; kh&ocirc;ng l&agrave;m quần &aacute;o bị nhăn. Ngo&agrave;i ra với những lồng giặt th&ocirc;ng minh gi&uacute;p l&agrave;m sạch v&agrave; hong kh&ocirc; vải theo cơ chế t&aacute;ch ẩm gi&uacute;p l&agrave;m quần &aacute;o kh&ocirc; nhanh hơn m&agrave; kh&ocirc;ng bị d&iacute;nh v&agrave;o nhau v&agrave; chống nhăn cho quần &aacute;o khi giặt.</p>\r\n', '2019-10-13'),
(13, 1, 'Máy Giặt 4x', 'mg1.jpg', 20040000, 320000, 'Trung Quốc', '<h2><strong>2. C&aacute;c loại m&aacute;y giặt nội địa của Nhật tốt nhất hiện nay</strong></h2>\r\n\r\n<h3><strong>2.1. M&aacute;y giặt lồng đứng Toshiba AW-E920LV(WB)</strong></h3>\r\n\r\n<p>Toshiba AW-E920LV l&agrave; một trong những sự lựa chọn tốt nhất khi được hỏi n&ecirc;n mua m&aacute;y giặt nội địa Nhật n&agrave;o hiện nay. Với thiết kế cực kỳ nhỏ gọn với lồng giặt c&oacute; dung t&iacute;ch l&ecirc;n đến 8.2kg ph&ugrave; hợp cho những gia đ&igrave;nh đ&ocirc;ng người c&oacute; từ 4 đến 5 th&agrave;nh vi&ecirc;n.</p>\r\n\r\n<p><strong><a href=\"https://www.adayroi.com/may-giat-long-dung-toshiba-aw-e920lv-wb-8-2kg-p-PRI31255?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">M&aacute;y giặt Toshiba AW-E920LV(WB)</a></strong>&nbsp;c&oacute; khả năng đẩy nước c&oacute; chứa bột giặt đi l&ecirc;n ph&iacute;a tr&ecirc;n theo hai khe dẫn nằm dọc ở phần th&acirc;n m&aacute;y, &nbsp;rồi đổ mạnh xuống lồng giặt, v&agrave; nhờ t&aacute;c động đẩy của c&aacute;nh quạt dưới đ&aacute;y m&acirc;m giặt sẽ tạo được hiệu ứng th&aacute;c nước đ&ocirc;i.</p>\r\n\r\n<p>Với hiệu ứng n&agrave;y sẽ gi&uacute;p m&aacute;y giặt l&agrave;m tan nhanh bột giặt, nh&agrave;o trộn quần &aacute;o một c&aacute;ch đều hơn v&agrave; gi&uacute;p tẩy sạch được c&aacute;c loại vết bẩn cứng đầu một c&aacute;ch hiệu quả nhất. Lồng giặt được l&agrave;m bằng chất liệu th&eacute;p kh&ocirc;ng gỉ n&ecirc;n đảm bảo quần &aacute;o lu&ocirc;n được giặt sạch sẽ v&agrave; kh&ocirc;ng bị b&aacute;m bất kỳ vết bẩn hay v&agrave;ng ố n&agrave;o.&nbsp;<strong><a href=\"https://www.adayroi.com/may-giat-c490/toshiba?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">C&aacute;c loại m&aacute;y giặt Toshiba tiết kiệm chi ph&iacute; điện nước</a></strong>&nbsp;hằng ng&agrave;y của b&agrave; nội trợ.&nbsp;<strong>Gi&aacute; tham khảo 4.550.000đ.</strong></p>\r\n', '2019-10-06'),
(14, 1, 'Máy Giặt Toshiba', 'mg5.jpg', 2500000, 310000, 'Nhật Bản', '<h3><strong>2.2. M&aacute;y giặt lồng đứng Toshiba AW-DC1000CV(WB)</strong></h3>\r\n\r\n<p>Sản phẩm n&agrave;y c&oacute; thiết kế lồng đứng với dung t&iacute;ch l&ecirc;n đến 9kg, n&ecirc;n bạn c&oacute; thể tha hồ giặt c&aacute;c loại quần &aacute;o số lượng lớn hay chăn m&agrave;n. M&aacute;y giặt n&agrave;y sử dụng bộ truyền động trực tiếp DD Inverter hiện đại, kh&ocirc;ng d&ugrave;ng bất cứ động cơ hộp số v&agrave; d&acirc;y curoa th&ocirc;ng thường n&agrave;o n&ecirc;n m&acirc;m giặt của m&aacute;y quay nhanh v&agrave; mạnh hơn vượt trội nhưng vẫn hoạt động một c&aacute;ch nhẹ nh&agrave;ng, &ecirc;m &aacute;i v&agrave; tiết kiệm điện một c&aacute;ch tối đa hơn.</p>\r\n\r\n<p><strong><a href=\"https://www.adayroi.com/may-giat-long-dung-toshiba-aw-dc1000cv-wb-9kg-inverter-p-PRI33665?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">M&aacute;y giặt nội địa Nhật Toshiba AW-DC1000CV</a></strong>&nbsp;được trang bị th&ecirc;m chức năng giặt c&ocirc; đặc bằng bọt kh&iacute; n&ecirc;n gi&uacute;p tẩy sạch mọi vết bẩn b&aacute;m d&iacute;nh tr&ecirc;n quần &aacute;o của người d&ugrave;ng. Những c&aacute;nh quạt dưới đ&aacute;y m&acirc;m giặt quay đều gi&uacute;p đ&aacute;nh tan c&aacute;c hạt bột giặt ở mực nước thấp, tạo ra rất nhiều bọt bong b&oacute;ng thấm nhanh v&agrave; s&acirc;u v&agrave;o sợi vải, gi&uacute;p tẩy sạch mọi vết bẩn cứng đầu nhất.</p>\r\n\r\n<p><strong><a href=\"https://www.adayroi.com/may-giat-long-dung-c491/toshiba?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">M&aacute;y giặt lồng đứng Toshiba</a></strong>&nbsp;n&agrave;y c&oacute; thiết kế m&acirc;m giặt 3 c&aacute;nh si&ecirc;u bền gi&uacute;p tạo được luồng nước xo&aacute;y 3 chiều gi&uacute;p c&oacute; thể đ&aacute;nh bay một c&aacute;ch dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng hơn. B&ecirc;n cạnh đ&oacute; lồng giặt được thiết kế ng&ocirc;i sao pha l&ecirc; ph&iacute;a trong lồng n&ecirc;n gi&uacute;p bảo vệ tối đa của quần &aacute;o trong qu&aacute; tr&igrave;nh hoạt động. Ngo&agrave;i ra với c&aacute;c chức năng c&acirc;n chỉnh bằng nước th&ocirc;ng minh n&ecirc;n gi&uacute;p m&aacute;y giặt tiết kiệm được tối đa lượng nước trong qu&aacute; tr&igrave;nh hoạt động</p>\r\n', '2019-10-13'),
(15, 1, 'Máy Giặt Panasonic', 'mg4.jpg', 10000000, 200000, '', '<h3><strong>2.3. M&aacute;y giặt lồng đứng Panasonic NA-F100V5LRV</strong></h3>\r\n\r\n<p><strong><a href=\"https://www.adayroi.com/may-giat-c490/panasonic?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">C&aacute;c loại m&aacute;y giặt Panasonic thiết kế tinh tế</a></strong>&nbsp;với m&agrave;u sắc cực kỳ h&agrave;i h&ograve;a n&ecirc;n th&iacute;ch hợp với mọi kh&ocirc;ng gian sống của người d&ugrave;ng hiện nay. Nắp của m&aacute;y giặt n&agrave;y được l&agrave;m từ k&iacute;nh chịu lực n&ecirc;n cực kỳ bền bỉ v&agrave; chắc chắn. M&aacute;y giặt n&agrave;y c&oacute; dung t&iacute;ch lồng giặt c&oacute; thể giặt được đến 10kg quần &aacute;o cho một lần giặc n&ecirc;n ph&ugrave; hợp với những gia đ&igrave;nh c&oacute; đ&ocirc;ng th&agrave;nh vi&ecirc;n.</p>\r\n\r\n<p><strong><a href=\"https://www.adayroi.com/may-giat-long-dung-panasonic-na-f100v5lrv-10kg-p-PRI1179414?utm_source=blog_article&amp;utm_medium=referral&amp;utm_campaign=d7193&amp;utm_term=top-7-may-giat-noi-dia-nhat-tot-ben-chay-em-da-nang-gia-re-tu-5tr\" target=\"_blank\">M&aacute;y giặt Panasonic NA-F100V5LRV</a></strong>&nbsp;được trang bị c&ocirc;ng nghệ giặt tẩy hiện đại Activefoam gi&uacute;p tạo được bọt x&agrave; ph&ograve;ng th&ocirc;ng qua ba bước. Hộp đ&aacute;nh tan x&agrave; ph&ograve;ng Turbo Mixer của m&aacute;y giặt sẽ h&ograve;a tan bột giặt, sau đ&oacute; xoay c&aacute;nh quạt tạo tầng bọt, tiếp đ&oacute; sẽ lu&acirc;n chuyển bọt bằng 6 tia nước. Nhờ việc bột giặt được h&ograve;a tan v&agrave; ngấm s&acirc;u v&agrave;o trong vải n&ecirc;n sẽ gi&uacute;p đ&aacute;nh tan được mọi vết bẩn cứng đầu nhất. Sản phẩm n&agrave;y c&ograve;n sử dụng cảm biến Econavi n&ecirc;n gi&uacute;p người d&ugrave;ng tiết kiệm điện năng trong qu&aacute; tr&igrave;nh giặt quần &aacute;o.&nbsp;<strong>Gi&aacute; tham khảo 8.990.000đ.</strong></p>\r\n', '2019-10-20'),
(23, 2, 'Điều hòa', 'dh1.jpg', 2500000, 12000, 'Nhật Bản', '<p>Vietnam eSports TV l&agrave; k&ecirc;nh truyền h&igrave;nh thể thao điện tử số 1 tại Việt Nam ph&aacute;t s&oacute;ng trực tiếp h&agrave;ng ng&agrave;y tại địa chỉ Youtube của VETV. VETV sở hữu bản quyền độc quyền to&agrave;n bộ giải đấu chuy&ecirc;n nghiệp Li&ecirc;n Minh Huyền Thoại tr&ecirc;n thế giới tại VN. Youtube channel :</p>\r\n', '2019-10-06'),
(27, 1, 'Máy giặt đa năng', '4.jpg', 222500000, 100000, '', '<p>Chi tiết SP m&aacute;y giặt &aacute; hahahah</p>\r\n', '2019-10-19'),
(28, 3, 'Smart TV QLED 4K', '5.jpg', 2147483647, 10, '', '<p>&acirc;cscassssssssssssssssssssssssssss</p>\r\n', '2019-10-13'),
(29, 8, 'Ti Vi - Điều Hòa - Máy Giặt', '3.jpg', 2147483647, 351, 'Trung Đông', '<p>Bộ 3 Quyền lực&nbsp;</p>\r\n', '2019-10-20'),
(30, 1, 'Combo 2 Máy Giặt', '2.jpg', 2147483647, 25000000, 'Hàn Quốc', '<p>Bộ đ&ocirc;i Bất Tử</p>\r\n', '2019-10-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `phanquyen` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`user`, `pass`, `email`, `sdt`, `phanquyen`, `trangthai`) VALUES
('andrewleo1', 'e10adc3949ba59abbe56e057f20f883e', 'anh22@gmail.com', 123456789, '1', '1'),
('heo123456', 'dc483e80a7a0bd9ef71d8cf973673924', 'abc@gmail.com', 12346879, '0', '1'),
('meo123', '493f6b3e69a805edb92d9cc232ebb246', 'ascasc@gmail.com', 132465789, '0', '1'),
('thangleo123', '4bfe9cc080219247da0b637c694a9616', 'thangleo123@gmail.com', 123465, '0', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idcmt`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `user` (`user`);

--
-- Chỉ mục cho bảng `caidat`
--
ALTER TABLE `caidat`
  ADD PRIMARY KEY (`idcd`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idcmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `caidat`
--
ALTER TABLE `caidat`
  MODIFY `idcd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`user`) REFERENCES `taikhoan` (`user`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
