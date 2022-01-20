-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2022 lúc 10:35 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hocvien_quocte`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Huỳnh Hữu Thành', 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `coursesId` int(11) NOT NULL,
  `coursesCode` longtext NOT NULL,
  `coursesName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `timelearn` longtext NOT NULL,
  `dateedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `coursesId`, `coursesCode`, `coursesName`, `price`, `quantity`, `image`, `timelearn`, `dateedit`) VALUES
(33, '59hi4dffnq7i26bmvbqt3mn072', 5, 'CS_0127', 'KHOÁ HỌC WORD', '500000', 1, 'Microsoft-Word-Emblem.jpg', 'Thứ 3-5-7 (18:00 - 21:00)', '2020-01-25 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`, `catType`) VALUES
(2, 'Lập Trình', 1),
(3, 'Tin Học Văn Phòng', 1),
(4, 'Thiết Kế', 1),
(14, 'Kiểm Thử', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_sub`
--

CREATE TABLE `tbl_category_sub` (
  `catsubId` int(11) NOT NULL,
  `catsubName` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `catId` int(11) NOT NULL,
  `catsubType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_sub`
--

INSERT INTO `tbl_category_sub` (`catsubId`, `catsubName`, `image`, `catId`, `catsubType`) VALUES
(15, 'Lập Trình Website (Back-End)', 'icons8-website-100.png', 2, 1),
(16, 'Lập Trình C++', 'icons8-code-100.png', 2, 1),
(17, 'Excel', 'icons8-microsoft-excel-100.png', 3, 1),
(18, 'Word', 'icons8-microsoft-word-100.png', 3, 1),
(19, 'Power Point', 'icons8-microsoft-powerpoint-100.png', 3, 1),
(21, 'Thiết kế đồ hoạ', 'icons8-color-palette-100.png', 4, 1),
(25, 'Thiết Kế Website', 'icons8-web-design-100.png', 4, 0),
(27, 'Kiểm thử phần mềm', 'icons8-test-100.png', 14, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactAddress` varchar(255) NOT NULL,
  `contactPhone` varchar(50) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactMess` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`contactId`, `contactName`, `contactAddress`, `contactPhone`, `contactEmail`, `contactMess`) VALUES
(1, 'Huỳnh Hữu Thành', '75 xuan hong', '0869321727', 'hhthanh031@gmail.com', 'testtttttttttttttttttttttttttt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `coursesId` int(11) NOT NULL,
  `coursesCode` varchar(255) NOT NULL,
  `coursesName` longtext NOT NULL,
  `catId` int(11) NOT NULL,
  `catsubId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `courses_desc` longtext NOT NULL,
  `price` int(255) NOT NULL,
  `dateedit` timestamp NULL DEFAULT NULL,
  `timelearn` longtext NOT NULL,
  `totaltime` longtext NOT NULL,
  `location` longtext NOT NULL,
  `basicquantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalquantity` int(11) NOT NULL,
  `level` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_courses`
--

INSERT INTO `tbl_courses` (`coursesId`, `coursesCode`, `coursesName`, `catId`, `catsubId`, `teacherId`, `image`, `courses_desc`, `price`, `dateedit`, `timelearn`, `totaltime`, `location`, `basicquantity`, `quantity`, `totalquantity`, `level`, `status`) VALUES
(1, 'CS_0126', 'LẬP TRÌNH WEBSITE PHP', 2, 15, 1, 'PHP-Wallpapers-Top-Free-PHP-Backgrounds-WallpaperAccess.jpg', '<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong>&nbsp;do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 1000000, '2021-10-09 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 39, 1, 'Lập trình cơ bản', 1),
(2, 'CS_0125', 'LẬP TRÌNH WEBSITE ASP.NET', 2, 15, 1, 'hoc-lap-trinh-aspnet-mvc-truc-tuyen-13012016-1.png', '<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong>&nbsp;do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"color:#e67e22\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 1000000, '2021-10-09 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 40, 0, 'Lập trình cơ bản', 1),
(3, 'CS_0123', 'LẬP TRÌNH C++', 2, 16, 2, 'cpp.png', '<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong> do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p><span style=\"color:#2980b9\"><span style=\"font-size:16px\">XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</span></span></p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 500000, '2021-10-10 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 40, 0, 'Lập trình cơ bản', 1),
(4, 'CS_0124', 'KHOÁ HỌC EXCEL', 3, 17, 4, 'kisspng-microsoft-excel-microsoft-project-logo-microsoft-w-excel-5abfec588a8948.0230687415225273205675.png', '<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong>&nbsp;do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"color:#f39c12\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 500000, '2020-01-24 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 40, 0, 'Tin học cơ bản', 1),
(5, 'CS_0127', 'KHOÁ HỌC WORD', 3, 18, 4, 'Microsoft-Word-Emblem.jpg', '<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong>&nbsp;do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 500000, '2020-01-25 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 40, 0, 'Tin học cơ bản', 1),
(8, 'CS_0128', 'KHOÁ HỌC POWERPOINT', 3, 19, 5, 'powerpoint-taichua_1489545116.png', '<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>ĐỐI TƯỢNG THAM GIA</strong></u></span></span></p>\r\n\r\n<p>Học vi&ecirc;n đang bắt đầu những trải nghiệm về Tin học</p>\r\n\r\n<p>Học vi&ecirc;n muốn hệ thống lại to&agrave;n bộ kiến thức cơ bản trong Tin học</p>\r\n\r\n<p>Học vi&ecirc;n mong muốn cập nhật những kiến thức Tin học mới đang được sử dụng rộng r&atilde;i tại doanh nghiệp</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>KẾT QUẢ ĐẠT ĐƯỢC</strong></u></span></span></p>\r\n\r\n<p><span style=\"color:#2980b9\"><span style=\"font-size:16px\">Sau khi ho&agrave;n th&agrave;nh kh&oacute;a học, học vi&ecirc;n sẽ c&oacute; khả năng</span></span></p>\r\n\r\n<p>Nhanh ch&oacute;ng nắm vững tất cả kiến thức cơ bản về m&aacute;y t&iacute;nh</p>\r\n\r\n<p>Xử l&yacute; thuần thục c&aacute;c thao t&aacute;c l&agrave;m việc v&agrave; tiện &iacute;ch tr&ecirc;n m&ocirc;i trường Windows</p>\r\n\r\n<p>Soạn thảo v&agrave; tr&igrave;nh b&agrave;y văn bản chuy&ecirc;n nghiệp với Microsoft Word</p>\r\n\r\n<p>Tạo lập v&agrave; tr&igrave;nh b&agrave;y dễ d&agrave;ng c&aacute;c bảng t&iacute;nh trong Excel</p>\r\n\r\n<p>X&acirc;y dựng c&aacute;c b&agrave;i tr&igrave;nh chiếu chuy&ecirc;n nghiệp với PowerPoint</p>\r\n\r\n<p>Hiểu r&otilde; về mạng m&aacute;y t&iacute;nh, hệ điều h&agrave;nh Windows</p>\r\n\r\n<p>Thao t&aacute;c nhanh ch&oacute;ng tr&ecirc;n Internet nhằm tiếp cận dễ d&agrave;ng khoa học kỹ thuật mới</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>THỜI LƯỢNG - HỌC PH&Iacute;</strong></u></span></span></p>\r\n\r\n<p>Thời gian học: 3 tuần - 5 tuần - 7 tuần</p>\r\n\r\n<p>Tổng số tiết: 60 tiết, học trực tiếp tr&ecirc;n m&aacute;y</p>\r\n\r\n<p>Học ph&iacute;: 500.000 VND/kho&aacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>NỘI DUNG</strong></u></span></span></p>\r\n\r\n<p><span style=\"color:#2980b9\"><span style=\"font-size:16px\">1. Hiểu biết về C&ocirc;ng nghệ th&ocirc;ng tin cơ bản</span></span></p>\r\n\r\n<p>Kiến thức cơ bản về m&aacute;y t&iacute;nh v&agrave; mạng m&aacute;y t&iacute;nh</p>\r\n\r\n<p>C&aacute;c ứng dụng của c&ocirc;ng nghệ th&ocirc;ng tin - truyền th&ocirc;ng (CNTT -TT)</p>\r\n\r\n<p>An to&agrave;n lao động v&agrave; bảo vệ m&ocirc;i trường trong sử dụng c&ocirc;ng nghệ th&ocirc;ng tin - truyền th&ocirc;ng</p>\r\n\r\n<p>C&aacute;c vấn đề an to&agrave;n th&ocirc;ng tin cơ bản khi l&agrave;m việc với m&aacute;y t&iacute;nh</p>\r\n\r\n<p>Một số vấn đề cơ bản li&ecirc;n quan đến ph&aacute;p luật trong sử dụng c&ocirc;ng nghệ th&ocirc;ng tin</p>\r\n\r\n<p><span style=\"color:#2980b9\"><span style=\"font-size:16px\">2. Sử dụng m&aacute;y t&iacute;nh cơ bản</span></span></p>\r\n\r\n<p>C&aacute;c hiểu biết cơ bản để bắt đầu l&agrave;m việc với m&aacute;y t&iacute;nh</p>\r\n\r\n<p>L&agrave;m việc với hệ điều h&agrave;nh</p>\r\n\r\n<p>Thao t&aacute;c trong Windows Explorer</p>\r\n\r\n<p>Thao t&aacute;c tr&ecirc;n m&agrave;n h&igrave;nh Desktop</p>\r\n', 500000, '2000-11-27 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 40, 40, 0, 'Tin học cơ bản', 1),
(9, 'CS_0129', 'THIẾT KẾ ĐỒ HOẠ 2D', 4, 21, 2, '2d-banner.png', '<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong> do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></span></span></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></span></span></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 1750000, '2021-11-27 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 20, 20, 0, 'Khoá học cơ bản', 1),
(12, 'TEST_001', 'KIỂM THỬ PHẦN MỀM CƠ BẢN', 14, 27, 8, 'kiem-thu-phan-mem-la-gi-nhung-dieu-can-biet-ve-kiem-thu-phan-mem.jpg', '<p><u><strong>BẠN NHẬN ĐƯỢC G&Igrave; KHI THAM GIA KH&Oacute;A HỌC?</strong></u></p>\r\n\r\n<p>Nắm vững nguy&ecirc;n l&yacute; thiết kế sản phẩm 2D</p>\r\n\r\n<p>Th&agrave;nh thạo 3 phần mềm Đồ họa chuy&ecirc;n nghiệp: Photoshop, Illustrator, Indesign</p>\r\n\r\n<p>Thiết kế ra bất cứ thứ g&igrave; bạn muốn: Poster, Brochure, Namecard, Backdrop, Icon, Logo,&hellip;</p>\r\n\r\n<p>Tự tin ứng tuyển v&agrave; l&agrave;m việc ở c&aacute;c vị tr&iacute;:</p>\r\n\r\n<p>+ Chỉnh sửa ảnh tại c&aacute;c Studio ảnh.</p>\r\n\r\n<p>+&nbsp;Thiết kế quảng c&aacute;o, in ấn.</p>\r\n\r\n<p>+&nbsp;Thiết kế s&aacute;ch b&aacute;o, tạp ch&iacute;.</p>\r\n\r\n<p>Chứng chỉ&nbsp;<strong>&quot;Kỹ thuật vi&ecirc;n Thiết kế Đồ họa 2D&quot;</strong>&nbsp;do Trung T&acirc;m Tin Học - Trường ĐH Khoa Học Tự Nhi&ecirc;n cấp.</p>\r\n\r\n<p>Cơ hội được hỗ trợ việc l&agrave;m sau khi ho&agrave;n tất kh&oacute;a học</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u><strong>BẠN LO LẮNG VỀ SỰ PH&Ugrave; HỢP CỦA KH&Oacute;A HỌC?</strong></u></p>\r\n\r\n<p>H&atilde;y an t&acirc;m nếu bạn hiện đang l&agrave;:</p>\r\n\r\n<p>-&nbsp;Sinh vi&ecirc;n c&aacute;c trường Đại học, Cao đẳng, Trung cấp nghề chuy&ecirc;n ng&agrave;nh thiết kế đang cần kinh nghiệm thực tế v&agrave; ho&agrave;n thiện kiến thức Đồ họa một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p>-&nbsp;Người đi l&agrave;m cần bổ sung, củng cố v&agrave; chuẩn h&oacute;a kiến thức thiết kế Đồ họa chuy&ecirc;n nghiệp, tăng khả năng thăng tiến trong nghề nghiệp.</p>\r\n\r\n<p>-&nbsp;Hay đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch m&ocirc;n nghệ thuật đầy t&iacute;nh s&aacute;ng tạo v&agrave; mong muốn t&igrave;m một cơ hội nghề nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u><strong>CHƯƠNG TR&Igrave;NH HỌC CỦA BẠN BAO GỒM</strong></u></p>\r\n\r\n<p>XỬ L&Yacute; ẢNH TRONG THIẾT KẾ VỚI PHOTOSHOP</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ cơ bản- Ứng dụng thiết kế Poster</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Mảng-N&eacute;t</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o theo phong c&aacute;ch Double Exposure</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng thiết kế giao diện Web</p>\r\n\r\n<p>Thao t&aacute;c c&ocirc;ng cụ chuyển sắc- Ứng dụng Clipping Mask</p>\r\n\r\n<p>Thiết kế ấn phẩm quảng c&aacute;o brochure theo phong c&aacute;ch Mono Chrome</p>\r\n\r\n<p>Thiết kế CV xin việc</p>\r\n\r\n<p>Ứng dụng thiết kế Fullframe</p>\r\n\r\n<p>Ứng dụng thiết kế Manipulation</p>\r\n\r\n<p>Ứng dụng thiết kế Dispersion Effect</p>\r\n', 500000, '2021-12-31 17:00:00', 'Thứ 3-5-7 (18:00 - 21:00)', '120 giờ (~5 tháng)', '77 Xuân Hồng, P.12, Quận Tân Bình', 30, 30, 0, 'Cơ bản', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `provinces` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `email`, `password`, `name`, `address`, `provinces`, `district`, `phone`) VALUES
(2, 'test', '202cb962ac59075b964b07152d234b70', 'SteveThanh', '77 Xuân Hồng', '1', 'Thành phố Long Xuyên', '0869321727'),
(3, 'test1', '202cb962ac59075b964b07152d234b70', 'Huỳnh Hữu Thành', '75 Xuân Hồng', '1', 'Thành phố Long Xuyên', '0869321727'),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'Huỳnh Hữu Thành', '75 Xuân Hồng', '1', 'Thành phố Long Xuyên', '123456789'),
(5, 'test2', '202cb962ac59075b964b07152d234b70', 'Huỳnh Hữu Thành', '75 Xuân Hồng', '1', 'Thành phố Long Xuyên', '123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `newsId` int(11) NOT NULL,
  `newsName` longtext NOT NULL,
  `catId` int(11) NOT NULL,
  `catsubId` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `news_desc` longtext NOT NULL,
  `dateedit` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`newsId`, `newsName`, `catId`, `catsubId`, `image`, `news_desc`, `dateedit`, `status`) VALUES
(11, 'Học lập trình Backend là học gì?', 2, 15, 'lap-trinh-back-end-can-hoc-gi-5-1080x630.jpg', '<p>Khi bắt đầu t&igrave;m hiểu về lập tr&igrave;nh web, bạn sẽ bắt gặp 3 thuật ngữ &nbsp;phổ biến gồm frontend, backend v&agrave; fullstack. Vậy những thuật ngữ n&agrave;y l&agrave; g&igrave;? Trong b&agrave;i viết n&agrave;y CodeGym Đ&agrave; Nẵng sẽ tập trung chia sẻ về backend. Gi&uacute;p bạn hiểu được lập tr&igrave;nh backend l&agrave; g&igrave;? Mảng n&agrave;y l&agrave;m được những g&igrave;? V&agrave; để theo mảng n&agrave;y th&igrave; cần phải học những g&igrave;?</p>\r\n\r\n<h2><strong>Lập tr&igrave;nh backend l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Trong lập tr&igrave;nh, người ta chia th&agrave;nh frontend v&agrave; backend. Tr&aacute;i với frontend tức l&agrave; những phần li&ecirc;n quan đến giao diện, trực quan c&oacute; thể nh&igrave;n thấy được th&igrave; backend thuộc về những phần &ldquo;ngầm&rdquo;m&agrave; người d&ugrave;ng kh&ocirc;ng thấy trực tiếp được.</p>\r\n\r\n<p>V&iacute; dụ như khi bạn t&igrave;m kiếm một trang web, l&uacute;c n&agrave;y m&aacute;y chủ của trang web gửi th&ocirc;ng tin tới thiết bị bạn d&ugrave;ng truy cập v&agrave; điều hướng bạn tới trang web bạn muốn. Qu&aacute; tr&igrave;nh n&agrave;y ch&iacute;nh l&agrave; kết quả l&agrave;m việc của backend.</p>\r\n\r\n<h2><strong>Lập tr&igrave;nh web backend cần học những g&igrave;?</strong></h2>\r\n\r\n<h3><strong>Kiến thức về Frontend</strong></h3>\r\n\r\n<p>Mặc d&ugrave; bạn đi chuy&ecirc;n s&acirc;u b&ecirc;n backend nhưng bạn cũng cần nắm những kiến thức cơ bản về frontend để l&agrave; việc với kỹ sư lập tr&igrave;nh front end. V&igrave; một sản phẩm cần sự kết hợp giữa frontend v&agrave; backend n&ecirc;n nếu bạn trang bị cả kiến thức cơ bản của frontend th&igrave; bạn sẽ hiểu được c&aacute;ch thức vận h&agrave;nh để kết hợp ăn &yacute; v&agrave; l&agrave;m việc sẽ hiệu quả hơn.</p>\r\n\r\n<h3><strong>Ng&ocirc;n ngữ lập tr&igrave;nh backend</strong></h3>\r\n\r\n<p>C&oacute; kh&aacute; nhiều ng&ocirc;n ngữ lập tr&igrave;nh d&ugrave;ng cho backend. Tuy nhi&ecirc;n bạn chỉ cần chọn ra &iacute;t nhất một ng&ocirc;n ngữ phổ biến để học.</p>\r\n\r\n<p>Một số ng&ocirc;n ngữ lập tr&igrave;nh backend phổ biến như:</p>\r\n\r\n<ol>\r\n	<li><strong>Java</strong></li>\r\n</ol>\r\n\r\n<p>Hầu hết c&aacute;c nh&agrave; ph&aacute;t triển web ưa chuộng v&agrave; lựa chọn ng&ocirc;n ngữ Java. Mặc d&ugrave; so với Python hay Ruby việc học Java c&oacute; thể sẽ kh&oacute; hơn nhưng n&oacute; vẫn thu h&uacute;t một số đ&ocirc;ng những người muốn theo học mảng lập tr&igrave;nh web. Để hiểu hơn về l&yacute; do tại sao Java hiện nay lại phổ biến như vậy c&aacute;c bạn c&oacute; thể t&igrave;m đọc lại b&agrave;i chia sẻ ủa CodeGym Đ&agrave; Nẵng tại đ&acirc;y.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; 2. PHP</strong></p>\r\n\r\n<p>So với Java th&igrave; PHP dễ học hơn. Ng&ocirc;n ngữ n&agrave;y c&oacute; thể chạy tr&ecirc;n nhiều nền tảng kh&aacute;c nhau như Windows, Unix, Linux, Mac OS X&hellip;Đồng thời n&oacute; cũng cung cấp khả năng tương th&iacute;ch với nhiều m&aacute;y ch&uacute; như Apache, IIS,&hellip;PHP hỗ trợ rất nhiều cơ sở dữ liệu v&agrave; l&agrave; m&atilde; nguồn mở n&ecirc;n c&oacute; thể download miễn ph&iacute;. Một điểm cộng nữa cho PHP l&agrave; n&oacute; cun cấp sẵn c&ocirc;ng cụ để b&aacute;o c&aacute;o lỗi m&atilde; nguồn một c&aacute;ch hiệu quả.</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;<strong>3. Python</strong></p>\r\n\r\n<p>So với PHP v&agrave; Java, với những người mới bắt đầu sẽ dễ d&agrave;ng hơn. Ng&ocirc;n ngữ lập tr&igrave;nh Python được biết đến l&agrave; ng&ocirc;n ngữ th&ocirc;ng dịch cấp cao. N&oacute; cho ph&eacute;p l&agrave;m việc tr&ecirc;n nhiều nền tảng. C&uacute; ph&aacute;p rất dễ hiểu, việc ch&iacute;nh sửa m&atilde; nguồn cũng dễ d&agrave;ng. Ng&ocirc;n ngữ n&agrave;y rất th&acirc;n thiện với c&aacute;c cơ sở dữ liệu, backend v&agrave; cung cấp c&aacute;c giao diện cơ sở dữ liệu cho c&aacute;c hệ thống DBMS thương mại. Ngo&agrave;i ra Python c&oacute; t&iacute;nh năng tự động dọn dẹp c&aacute;c tệp r&aacute;c gi&uacute;p cải thiện hiệu suất l&agrave;m việc.</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;<strong>&nbsp;4. Ruby</strong></p>\r\n\r\n<p>Hiện nay, Ruby cũng trở th&agrave;nh một trong những ng&ocirc;n ngữ lập tr&igrave;nh được sử dụng trong lập tr&igrave;nh backend phổ biến. Một trong những điều khiến n&oacute; được lựa chọn v&igrave; Ruby c&oacute; một framework tuyệt vời mang t&ecirc;n Rails được đ&aacute;nh gi&aacute; l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh mạnh mẽ v&agrave; ho&agrave;n hảo để ph&aacute;t triển website.</p>\r\n\r\n<h3><strong>Framework lập tr&igrave;nh</strong></h3>\r\n\r\n<p>Để hỗ trợ trong lập tr&igrave;nh backend, bạn cũng cần biết sử dụng &iacute;t nhất một framework phổ biến của ng&ocirc;n ngữ lập tr&igrave;nh.</p>\r\n\r\n<p>Để lựa chọn được framework n&ecirc;n học th&igrave; cũng tuỳ v&agrave;o project v&agrave; ng&ocirc;n ngữ lập tr&igrave;nh m&agrave; bạn chọn học. Mỗi ng&ocirc;n ngữ c&oacute; rất nhiều lựa chọn framework tuy nhi&ecirc;n n&ecirc;n chọn framework đang được sử dụng phổ biến.</p>\r\n\r\n<p>V&iacute; dụ như với ng&ocirc;n ngữ Java th&igrave; bạn n&ecirc;n chọn học framework Spring Boot, PHP th&igrave; bạn c&oacute; thể d&ugrave;ng Laravel hoặc Symfony. Nếu bạn sử dụng ng&ocirc;n ngữ Python th&igrave; c&oacute; thể tham khảo học framework Django hoặc Flask, Ruby th&igrave; d&ugrave;ng framework Rails như m&igrave;nh c&oacute; đề cập ở tr&ecirc;n.</p>\r\n\r\n<h3><strong>Kiến thức về Cơ sở dữ liệu (Database)</strong></h3>\r\n\r\n<p>Trong lập tr&igrave;nh backend, Cơ sở dữ liệu (Database) chịu tr&aacute;ch nhiệm lưu trữ&nbsp; v&agrave; truy xuất dữ liệu ph&aacute;t sinh từ ứng dụng.&nbsp;</p>\r\n\r\n<p>Việc chọn học hệ thống cơ sở dữ liệu n&agrave;o phụ thuộc v&agrave;o ng&ocirc;n ngữ lập tr&igrave;nh bạn chọn theo. V&iacute; dụ nếu chọn ng&ocirc;n ngữ lập tr&igrave;nh PHP, Java bạn sẽ cần học c&aacute;ch sử dụng MySQL hoặc c&aacute;c hệ thống cơ sở dữ liệu dựa tr&ecirc;n SQL kh&aacute;c. Hoặc bằng d&ugrave;ng JavaScript với Node.js th&igrave; bạn n&ecirc;n học c&aacute;ch l&agrave;m việc với cơ sở dữ liệu MongoDB.</p>\r\n\r\n<p>Ngo&agrave;i cơ sở dữ liệu nếu bạn c&oacute; th&ecirc;m kiến thức về c&aacute;c cơ chế bộ nhớ đệm (cache) như Memcached, Redis th&igrave; c&agrave;ng tốt</p>\r\n\r\n<h3><strong>Kiến thức về bảo mật</strong></h3>\r\n\r\n<p>Vấn đề bảo mật trong lập tr&igrave;nh rất quan trọng v&agrave; lu&ocirc;n được đặt l&ecirc;n h&agrave;ng đầu. Đặc biệt l&agrave; sau những cuộc tấn c&ocirc;ng của c&aacute;c hacker g&acirc;y ra tổn thất h&agrave;ng tỷ đồng cho c&aacute;c c&ocirc;ng ty v&agrave; quốc gia. V&igrave; vậy để hạn chế rủi ro ảnh hưởng đến doanh nghiệp bạn cũng cần trang bị những kiến thức về bảo mật.</p>\r\n\r\n<h2><strong>Lập tr&igrave;nh vi&ecirc;n web backend l&agrave;m những g&igrave;?</strong></h2>\r\n\r\n<p>Một số c&ocirc;ng việc của một lập tr&igrave;nh vi&ecirc;n Back end bao gồm:</p>\r\n\r\n<ul>\r\n	<li>Hiểu r&otilde; mục ti&ecirc;u của trang web v&agrave; đưa ra c&aacute;c giải ph&aacute;p tối ưu tốc độ v&agrave; hiệu suất để c&aacute;c ứng dụng được vận h&agrave;nh hiệu quả.</li>\r\n	<li>Cộng t&aacute;c với c&aacute;c th&agrave;nh vi&ecirc;n kh&aacute;c trong nh&oacute;m như lập tr&igrave;nh vi&ecirc;n Frontend để ph&aacute;t triển web.</li>\r\n	<li>Lưu trữ dữ liệu v&agrave; cũng đảm bảo rằng n&oacute; được hiển thị ch&iacute;nh x&aacute;c cho người d&ugrave;ng.</li>\r\n	<li>Quản l&yacute; t&agrave;i nguy&ecirc;n API hoạt động tr&ecirc;n c&aacute;c thiết bị.</li>\r\n	<li>Tham gia v&agrave;o kiến ​​tr&uacute;c của hệ thống v&agrave; c&aacute;c ph&acirc;n t&iacute;ch Khoa học dữ liệu.</li>\r\n</ul>\r\n\r\n<h2>Học lập tr&igrave;nh back end ở đ&acirc;u?</h2>\r\n\r\n<p>Tại CodeGym Đ&agrave; Nẵng,&nbsp;<a href=\"https://danang.codegym.vn/khoa-hoc-lap-trinh-java-cho-nguoi-moi-bat-dau/\">kho&aacute; học lập tr&igrave;nh ngắn hạn 6 th&aacute;ng</a>&nbsp;Java Fullstack sẽ cung cấp cho bạn kiến thức fullstack từ cả front end đến back end. Chương tr&igrave;nh đ&agrave;o tạo theo m&ocirc; h&igrave;nh Coding Bootcamp v&agrave; được thiết kế lộ tr&igrave;nh d&agrave;nh cho người mới bắt đầu từ con số 0. Đặc biệt kho&aacute; học c&ograve;n cam kết việc l&agrave;m cho học vi&ecirc;n sau khi tốt nghiệp kho&aacute; học. V&igrave; vậy bạn c&oacute; thể y&ecirc;n t&acirc;m khởi đầu trong ng&agrave;nh lập tr&igrave;nh v&agrave; c&oacute; cơ hội l&agrave;m việc trong lĩnh vực n&agrave;y nh&eacute;!</p>\r\n\r\n<h2><strong>Tạm kết</strong></h2>\r\n\r\n<p>Như vậy, ch&uacute;ng ta đ&atilde; vừa c&ugrave;ng nhau t&igrave;m hiểu lần lượt một số c&aacute;c kh&iacute;a cạnh về<strong>&nbsp;lập tr&igrave;nh web back end</strong>. Hi vọng c&aacute;c bạn đ&atilde; c&oacute; thể hiểu th&ecirc;m về mảng lập tr&igrave;nh web back end v&agrave; cảm thấy bớt &ldquo;mơ hồ&rdquo; về n&oacute; hơn.</p>\r\n\r\n<p>Ngo&agrave;i ra để gi&uacute;p bạn đ&aacute;nh gi&aacute; được năng lực v&agrave; mức độ ph&ugrave; hợp với lĩnh vực lập tr&igrave;nh, bạn c&oacute; thể l&agrave;m b&agrave;i Test Online<a href=\"https://docs.google.com/forms/d/e/1FAIpQLScSXRjHNtsLvXekTn2S8fAgi3IO2sk44iVhgT5XWUI2wHk-vw/viewform\">&nbsp;tại đ&acirc;y</a>&nbsp;thử nh&eacute;.</p>\r\n', '2022-01-12 18:10:13', 1),
(12, 'Lộ trình trở thành Backend Developer', 2, 15, 'backend-development.png', '<p>Ng&agrave;nh lập tr&igrave;nh web hiện nay đ&atilde; kh&aacute;c trước rất nhiều, n&oacute; trở n&ecirc;n kh&oacute; khăn hơn cho những người mới bước v&agrave;o ng&agrave;nh. Đ&oacute; cũng l&agrave; một trong những l&yacute; do ch&uacute;ng t&ocirc;i quyết định l&agrave;m&nbsp;một b&agrave;i hướng dẫn từng bước qua h&igrave;nh ảnh về t&igrave;nh h&igrave;nh n&agrave;y&nbsp;v&agrave; giải th&iacute;ch r&otilde; hơn những c&aacute;i bạn cần follow nếu dấn th&acirc;n v&agrave;o nghề, từ đ&oacute; định hướng được lộ tr&igrave;nh&nbsp;<a href=\"https://topdev.vn/viec-lam-it/back-end-kt210\">backend</a>&nbsp;cho bản th&acirc;n.</p>\r\n\r\n<h2>C&aacute;c bước cần thiết cho lộ tr&igrave;nh backend</h2>\r\n\r\n<h3><strong>Bước 1 &ndash; Học một ng&ocirc;n ngữ mới</strong></h3>\r\n\r\n<p>C&oacute; cả t&aacute; lựa chọn về ng&ocirc;n ngữ d&agrave;nh cho bạn. T&ocirc;i c&oacute; chia nhỏ n&oacute; ra c&aacute;c categories để bạn dễ lựa chọn hơn. Đối với những người mới th&igrave; t&ocirc;i khuy&ecirc;n bạn n&ecirc;n chọn c&aacute;c ng&ocirc;n ngữ scripting v&igrave; ch&uacute;ng c&oacute; nhiều demand v&agrave; cho ph&eacute;p bạn bắt kịp nhanh ch&oacute;ng. Nếu bạn c&oacute; một &iacute;t kiến thức frontend, bạn sẽ thấy Node.js dễ hơn nhiều v&agrave; c&oacute; rất nhiều job về n&oacute; đang mở.</p>\r\n\r\n<p>Nếu bạn đang l&agrave;m backend v&agrave; biết một số scripting language, t&ocirc;i đề xuất kh&ocirc;ng chọn một ng&ocirc;n ngữ scripting language kh&aacute;c nữa m&agrave; chọn trong section &ldquo;Functional&rdquo; hoặc &ldquo;Multiparadigm&rdquo;. V&iacute; dụ, nếu bạn đang l&agrave;m PHP hoặc Mode.js, đừng n&ecirc;n chọn Python hoặc Ruby, m&agrave; h&atilde;y thử Erlang hoặc Golang. N&oacute; sẽ gi&uacute;p bạn tư duy xa hơn v&agrave; open với những mảng kh&aacute;c hơn.</p>\r\n\r\n<h3><strong>Bước 2 &mdash; Thực h&agrave;nh ngay những c&aacute;i đ&atilde; học</strong></h3>\r\n\r\n<p>Học phải đi đ&ocirc;i với h&agrave;nh. Một khi bạn đ&atilde; chọn được ng&ocirc;n ngữ ph&ugrave; hợp v&agrave; c&oacute; được nền tảng căn bản về n&oacute;, h&atilde;y d&ugrave;ng n&oacute; ngay. H&atilde;y tạo n&ecirc;n c&agrave;ng nhiều app nhỏ c&agrave;ng tốt. Dưới đ&acirc;y l&agrave; một số gợi &yacute; cho bạn:</p>\r\n\r\n<ul>\r\n	<li>Ứng dụng c&aacute;c command m&agrave; bạn d&ugrave;ng tr&ecirc;n bash, v&iacute; dụ ứng dụng function ls</li>\r\n	<li>Viết một command để fetch v&agrave; lưu c&aacute;c post reddit tr&ecirc;n /r/programming dưới dạng file JSON</li>\r\n	<li>Viết một command cung cấp directory structure dưới dạng format JSON v&iacute; dụ jsonify dir-name cho ra file JSON c&oacute; structure b&ecirc;n trong dir-name</li>\r\n	<li>Viết một command đọc JSON của bước tr&ecirc;n v&agrave; tạo ra directory structure</li>\r\n	<li>Nghĩ một v&agrave;i task hằng ng&agrave;y của m&igrave;nh v&agrave; automate ch&uacute;ng</li>\r\n</ul>\r\n\r\n<h3><strong>Bước 3 &mdash; Học Package Manager</strong></h3>\r\n\r\n<p>Một khi đ&atilde; học được những c&aacute;i cơ bản của một ng&ocirc;n ngữ v&agrave; tại n&ecirc;n một v&agrave;i app mẫu, h&atilde;y học c&aacute;ch d&ugrave;ng package manager ng&ocirc;n ngữ đ&oacute;. C&aacute;c package manager sẽ gi&uacute;p bạn d&ugrave;ng c&aacute;c thư viện ngo&agrave;i &nbsp;v&agrave; ph&acirc;n phối c&aacute;c thư viện cho người kh&aacute;c d&ugrave;ng.</p>\r\n\r\n<p>Nếu bạn chọn PHP th&igrave; bạn c&oacute; thể học về Composer, Node.js sẽ c&oacute; NPM hoặc Yarn, Python c&oacute; Pip v&agrave; Ruby c&oacute; RubyGems. D&ugrave; cho bạn chọn c&aacute;i n&agrave;o đi nữa, h&atilde;y cứ tiếp tục v&agrave; học về package manager.</p>\r\n\r\n<h3><strong>Bước 4 &mdash; C&aacute;c ti&ecirc;u chuẩn v&agrave; Best Practices</strong></h3>\r\n\r\n<p>Mỗi ng&ocirc;n ngữ c&oacute; những ti&ecirc;u chuẩn ri&ecirc;ng v&agrave; best practices (c&aacute;ch l&agrave;m tốt nhất). H&atilde;y t&igrave;m ra v&agrave; học hỏi từ n&oacute;. V&iacute; dụ, PHP c&oacute; PHP-FIG v&agrave; PSRs. Với Node.js sẽ c&oacute; rất nhiều hướng dẫn phục vụ cộng đồng cũng như nhiều ng&ocirc;n ngữ kh&aacute;c.</p>\r\n\r\n<h3><strong>Bước 5 &mdash; Bảo mật</strong></h3>\r\n\r\n<p>H&atilde;y nhớ đọc về c&aacute;c best practices trong mảng bảo mật. Đọc OWASPguidelines để hiểu về nhiều vấn đề bảo mật kh&aacute;c nhau v&agrave; c&aacute;ch ph&ograve;ng tr&aacute;nh n&oacute; đối với từng ng&ocirc;n ngữ m&agrave; bạn chọn.</p>\r\n\r\n<h3><strong>Bước 6 &mdash; Thực h&agrave;nh th&ecirc;m nữa</strong></h3>\r\n\r\n<p>Sau những nền tảng cơ bản, ti&ecirc;u chuẩn v&agrave; best practice, bảo mật cũng như c&aacute;ch d&ugrave;ng package manager, b&acirc;y giờ l&agrave; l&uacute;c tự tạo n&ecirc;n một package v&agrave; ph&acirc;n phối n&oacute; đi cho người &nbsp;kh&aacute;c d&ugrave;ng, nhớ follow c&aacute;c ti&ecirc;u chuẩn v&agrave; best practices đ&atilde; học. V&iacute; dụ như, nếu bạn chọn PHP, bạn c&oacute; thể release n&oacute; tr&ecirc;n Packagist, c&ograve;n nếu chọn Node.js th&igrave; release tr&ecirc;n Npm registry,&hellip;</p>\r\n\r\n<p>Sau khi đ&atilde; xong, bạn c&oacute; thể search th&ecirc;m một số project tr&ecirc;n Github v&agrave; mở một số pull request trong c&aacute;c projects. Dưới đ&acirc;y l&agrave; một v&agrave;i gợi &yacute; cho bạn:</p>\r\n\r\n<ul>\r\n	<li>Refactor v&agrave; ứng dụng những best practice m&agrave; bạn học được</li>\r\n	<li>Xem c&aacute;c vấn đề mở v&agrave; thử giải quyết n&oacute;</li>\r\n	<li>Add th&ecirc;m một số functionality</li>\r\n</ul>\r\n\r\n<h3><strong>Bước 7 &mdash; Học th&ecirc;m về Testing</strong></h3>\r\n\r\n<p>Hiện c&oacute; rất nhiều kiểu test, mục ti&ecirc;u đ&oacute; l&agrave; phải hiểu r&otilde; c&aacute;c loại n&agrave;y l&agrave; g&igrave;. Nhưng trước mắt h&atilde;y c&aacute;ch viết Unit Test v&agrave; Integration test cho app trước đ&atilde;. Đồng thời h&atilde;y t&igrave;m hiểu th&ecirc;m về c&aacute;c phương ph&aacute;p testing như mocks, stubs,&hellip;</p>\r\n\r\n<h3><strong>Bước 8 &mdash; Thực tế</strong></h3>\r\n\r\n<p>H&atilde;y viết thử unit test cho một số task thực tế m&agrave; bạn đ&atilde; l&agrave;m, đặc biệt l&agrave; những c&aacute;i bạn đ&atilde; l&agrave;m ở Bước 6. &nbsp;</p>\r\n\r\n<p>Đồng thời nhớ t&iacute;nh to&aacute;n thử mức độ cover của c&aacute;c test đ&atilde; viết.</p>\r\n\r\n<h3><strong>Bước 9 &mdash; Học về Relational Database</strong></h3>\r\n\r\n<p>L&agrave;m thế n&agrave;o để bảo to&agrave;n data tr&ecirc;n relational database (dữ liệu quan hệ). Trước khi bạn lựa chọn tool để học, h&atilde;y t&igrave;m hiểu trước về c&aacute;c phương ph&aacute;p database terminologies kh&aacute;c nhau như c&aacute;c key, index, normalization, tuple, v.v</p>\r\n\r\n<p>C&oacute; rất nhiều sự lựa chọn, tuy nhi&ecirc;n nếu bạn học một c&aacute;i rồi, th&igrave; những c&aacute;i c&ograve;n lại sẽ trở n&ecirc;n dễ hơn. Một trong những c&aacute;i l&yacute; tưởng để bắt đầu đ&oacute; l&agrave; MySQL, MariaDB (kh&aacute; giống nhau v&agrave; l&agrave; một mảnh của MySQL) v&agrave; PostgreSQL. Pick MySQL.</p>\r\n\r\n<h3><strong>Bước 10 &mdash;  Thời gian thực tế</strong></h3>\r\n\r\n<p>B&acirc;y giờ bạn sẽ đem tất cả những thứ bạn đ&atilde; học ra để sử dụng. Tạo n&ecirc;n một ứng dụng đơn giản, bất cứ idea n&agrave;o, v&iacute; dụ một ứng dụng viết blog, rồi &aacute;p dụng c&aacute;c feature dưới đ&acirc;y:</p>\r\n\r\n<ul>\r\n	<li>User Account  &mdash; Đăng k&yacute; v&agrave; Đăng nhập</li>\r\n	<li>Những user đ&atilde; đăng k&yacute; c&oacute; thể tạo c&aacute;c b&agrave;i blog</li>\r\n	<li>User c&oacute; thể xem tất cả c&aacute;c b&agrave;i blog m&agrave; m&igrave;nh đ&atilde; viết</li>\r\n	<li>User c&oacute; thể xo&aacute; b&agrave;i blog</li>\r\n	<li>User chỉ xem được blog của m&igrave;nh chứ kh&ocirc;ng xem của người kh&aacute;c được</li>\r\n	<li>Viết c&aacute;c unit/integration test cho app</li>\r\n	<li>Bạn c&oacute; thể &aacute;p dụng index cho c&aacute;c query. Ph&acirc;n t&iacute;ch queries để biết chắc l&agrave; c&aacute;c index đang hoạt động</li>\r\n</ul>\r\n\r\n<h3><strong>Bước 11 &mdash; Học một Framework</strong></h3>\r\n\r\n<p>Tuỳ v&agrave;o project v&agrave; ng&ocirc;n ngữ m&agrave; bạn chọn th&igrave; bạn c&oacute; thể cần hoặc kh&ocirc;ng cần đến framework. Mỗi ng&ocirc;n ngữ c&oacute; rất nhiều lựa chọn, h&atilde;y t&igrave;m hiểu v&agrave; xem xem ng&ocirc;n ngữ của bạn c&oacute; g&igrave; v&agrave; chọn một c&aacute;i li&ecirc;n quan.</p>\r\n\r\n<p>Nếu bạn chọn PHP, t&ocirc;i đề xuất bạn n&ecirc;n d&ugrave;ng Laravel hoặc Symfony hoặc đối với c&aacute;c framework nhỏ th&igrave; bạn c&oacute; thể d&ugrave;ng Lumen hoặc Slim. Nếu bạn chọn Node.js th&igrave; cũng c&oacute; rất nhiều lựa chọn nhưng c&aacute;i mạnh nhất đến nay đ&oacute; l&agrave; Express.js.</p>\r\n\r\n<h3><strong>Bước 12 &mdash; Thời gian thực h&agrave;nh</strong></h3>\r\n\r\n<p>Để thực h&agrave;nh bước n&agrave;y, h&atilde;y convert app v&agrave; bạn đ&atilde; l&agrave;m ở&nbsp;<strong>Bước 10&nbsp;</strong>để &aacute;p dụng framework m&igrave;nh đ&atilde; chọn. Nhớ port mọi thứ kể cả c&aacute;c test nh&eacute;.</p>\r\n', '2022-01-12 18:29:51', 1),
(13, 'Kiến Thức Cơ Bản Cần Nắm Khi Bắt Đầu Học C++', 2, 16, 'lap-trinh-c-cong-cong-hieu-qua-3.png', '<p>Khi bắt đầu học lập tr&igrave;nh, c&oacute; rất nhiều ng&ocirc;n ngữ để lựa chọn. C/C++ l&agrave; một ng&ocirc;n ngữ l&acirc;u đời, c&oacute; tốc độ nhanh, c&aacute;c kiểu dữ liệu r&otilde; r&agrave;ng. Nếu như l&agrave;m chủ được ng&ocirc;n ngữ nền tảng như C/C++ th&igrave; sau n&agrave;y học c&aacute;c ng&ocirc;n ngữ kh&aacute;c trở n&ecirc;n dễ d&agrave;ng hơn, do đ&oacute; rất ph&ugrave; hợp với người mới bắt đầu. Học lập tr&igrave;nh C/C++ c&oacute; rất nhiều ứng dụng v&agrave; mở ra cho bạn cực kỳ đa dạng c&aacute;c cơ hội để l&agrave;m việc cho c&aacute;c c&ocirc;ng ty/tập đo&agrave;n lớn.</p>\r\n\r\n<h3><strong>C&agrave;i đặt IDE n&agrave;o?</strong></h3>\r\n\r\n<p>Tr&ecirc;n thị trường c&oacute; rất nhiều&nbsp;<a href=\"https://codelearn.io/sharing/13-ide-danh-cho-lap-trinh-c-nam-2020\">IDE v&agrave; Text Editor d&agrave;nh cho lập tr&igrave;nh C/C++</a>. Với c&aacute;c bạn mới bắt đầu, m&igrave;nh khuy&ecirc;n c&aacute;c bạn n&ecirc;n sử dụng&nbsp;<a href=\"https://sourceforge.net/projects/orwelldevcpp/\">Dev C++</a>&nbsp;l&agrave;m ide ch&iacute;nh để học. Bạn chỉ cần tải về v&agrave; c&agrave;i đặt như nhiều hướng dẫn tr&ecirc;n internet, Khi muốn code một chương tr&igrave;nh th&igrave; chỉ cần tạo 1 file mới v&agrave; code l&agrave; chạy được b&igrave;nh thường, kh&ocirc;ng cần tạo project g&igrave; cả, compile cũng nhanh. Ngo&agrave;i ra c&aacute;c bạn cũng c&oacute; thể sử dụng codeblock, visual studio code, ...</p>\r\n\r\n<h3><strong>Hướng dẫn học C++</strong></h3>\r\n\r\n<h4><strong>1. C&aacute;c kiểu dữ liệu trong C++, khung chương tr&igrave;nh v&agrave; c&aacute;ch khai b&aacute;o biến</strong></h4>\r\n\r\n<p>Một chương tr&igrave;nh C++ cơ bản thường được bắt đầu bởi d&ograve;ng include khai b&aacute;o thư viện, sau đ&oacute; l&agrave; h&agrave;m&nbsp;<code>main</code>. Tất cả mọi thứ của chương tr&igrave;nh đều sẽ chạy dọc theo h&agrave;m&nbsp;<code>main</code>&nbsp;từ tr&ecirc;n xuống dưới, c&oacute; nghĩa l&agrave; nếu bạn viết một h&agrave;m ngo&agrave;i&nbsp;<code>main</code>&nbsp;v&agrave; trong&nbsp;<code>main</code>&nbsp;kh&ocirc;ng gọi đến h&agrave;m đấy c&oacute; nghĩa l&agrave; h&agrave;m đấy sẽ kh&ocirc;ng chạy trong chương tr&igrave;nh, một h&agrave;m lu&ocirc;n lu&ocirc;n phải kết th&uacute;c bởi dấu chấm phẩy&nbsp;<code>(;)</code>&nbsp;. Dưới đ&acirc;y l&agrave; bộ khung cơ bản của chương tr&igrave;nh&nbsp;<code>Hello world</code>&nbsp;bằng C++.</p>\r\n\r\n<h4><strong>2. C&aacute;c c&acirc;u lệnh nhập xuất v&agrave; cấu tr&uacute;c c&aacute;c c&acirc;u lệnh điều khiển</strong></h4>\r\n\r\n<p><strong>a. C&acirc;u lệnh nhập xuất.</strong></p>\r\n\r\n<p>Trong C++ th&igrave; một c&aacute;ch đơn giản để nhập l&agrave; sử dụng c&acirc;u lệnh&nbsp;<code>cin</code>, v&agrave; xuất sử dụng c&acirc;u lệnh&nbsp;<code>cout</code>.</p>\r\n\r\n<p><strong>b. C&acirc;u lệnh rẽ nh&aacute;nh.</strong></p>\r\n\r\n<p><strong>c. V&ograve;ng lặp.</strong></p>\r\n\r\n<h4><strong>3. Mảng</strong></h4>\r\n\r\n<p>Mảng 1 chiều</p>\r\n\r\n<p>Mảng 2 chiều</p>\r\n\r\n<h4><strong>4. Lập tr&igrave;nh h&agrave;m</strong></h4>\r\n\r\n<p>Khi viết chương tr&igrave;nh, nếu như tất cả mọi thứ đều được viết&nbsp; tuần tự trong h&agrave;m main th&igrave; rất kh&oacute; để theo d&otilde;i. Nếu như một số h&agrave;m v&agrave; phần việc được sử dụng nhiều lần th&igrave; viết một h&agrave;m con ra ngo&agrave;i l&agrave; một điều hết sức cần thiết, gi&uacute;p cho code của bạn trở n&ecirc;n gọn g&agrave;ng v&agrave; dễ theo d&otilde;i cũng như code hơn. Tham khảo đoạn code sau cho h&agrave;m t&iacute;nh tổng.</p>\r\n\r\n<h4><strong>5. Xử l&yacute; x&acirc;u trong C++</strong></h4>\r\n\r\n<p>Trong C++, x&acirc;u biểu diễn bởi kiểu dữ liệu l&agrave;&nbsp;<code>string</code>, mỗi string l&agrave; một x&acirc;u gồm c&aacute;c k&yacute; tự (được biểu diễn bằng kiểu char) li&ecirc;n tiếp. Kh&aacute;c với x&acirc;u trong C l&agrave; một mảng c&aacute;c char v&agrave; c&oacute; kết th&uacute;c mảng bới k&yacute; tự NULL. C&aacute;c ph&eacute;p xử l&yacute; trong x&acirc;u kh&aacute;c so với c&aacute;c ph&eacute;p to&aacute;n xử l&yacute; logic. Việc sử dụng kiểu string trong C++ khiến cho việc xử l&yacute; x&acirc;u trở n&ecirc;n dễ d&agrave;ng hơn so với kiểu mảng c&aacute;c k&yacute; tự char trong C.</p>\r\n', '2022-01-12 18:40:28', 1),
(14, 'Excel là gì? Tầm quan trọng của Excel trong công việc và học tập', 3, 17, 'excel-la-gi-tam-quan-trong-cua-excel-trong-cong-v-2-760x367.jpg', '<p>Excel l&agrave; một trong những phần mềm được d&ugrave;ng v&agrave;o việc t&iacute;nh to&aacute;n, x&acirc;y dựng số liệu được nhiều người sử dụng hiện nay. C&ugrave;ng tham khảo b&agrave;i viết sau, Điện m&aacute;y XANH sẽ chia sẻ đến bạn những th&ocirc;ng tin v&agrave; tầm quan trọng của Excel trong c&ocirc;ng việc cũng như học tập nh&eacute;!</p>\r\n\r\n<h3><strong>1.Excel l&agrave; g&igrave;?</strong></h3>\r\n\r\n<p>Excel l&agrave; một phần mềm bảng t&iacute;nh nằm trong bộ&nbsp;Microsoft Office. Phần mềm n&agrave;y gi&uacute;p người d&ugrave;ng ghi lại dữ liệu, tr&igrave;nh b&agrave;y th&ocirc;ng tin dưới dạng bảng, t&iacute;nh to&aacute;n, xử l&yacute; th&ocirc;ng tin nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c với một lượng dữ liệu lớn.&nbsp;</p>\r\n\r\n<p>C&aacute;c trang t&iacute;nh của Excel được tạo n&ecirc;n từ c&aacute;c h&agrave;ng v&agrave; cột. Điểm giao nhau giữa 2 th&agrave;nh phần n&agrave;y sẽ được gọi l&agrave; &ocirc;.</p>\r\n\r\n<p><img alt=\"Phần mềm Excel\" height=\"367\" src=\"https://cdn.tgdd.vn/Files/2021/08/03/1372781/excel-la-gi-tam-quan-trong-cua-excel-trong-cong-v.jpg\" title=\"Phần mềm Excel\" width=\"730\" /></p>\r\n\r\n<h3><strong>2.C&aacute;c phi&ecirc;n bản của Excel</strong></h3>\r\n\r\n<p>Excel được ra đời từ l&acirc;u v&agrave; đ&atilde; cho ra nhiều phi&ecirc;n bản kh&aacute;c nhau với những t&iacute;nh năng mới, nhằm đ&aacute;p ứng nhu cầu của người sử dụng. Dưới đ&acirc;y l&agrave; c&aacute;c phi&ecirc;n bản excel đ&atilde; được cập nhật qua từng thời kỳ, mời bạn tham khảo:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>STT</td>\r\n			<td>T&ecirc;n phi&ecirc;n bản</td>\r\n			<td>Ng&agrave;y ra mắt</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>\r\n			<p>Phi&ecirc;n bản Excel 2003</p>\r\n			</td>\r\n			<td>19/08/2003</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>Phi&ecirc;n bản Excel 2007</td>\r\n			<td>30/01/2007</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>Phi&ecirc;n bản Excel 2010</td>\r\n			<td>15/06/2010</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>Phi&ecirc;n bản Excel 2013</td>\r\n			<td>29/01/2013</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>Phi&ecirc;n bản Excel 2016</td>\r\n			<td>22/09/2015</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6</td>\r\n			<td>Phi&ecirc;n bản Excel 2019</td>\r\n			<td>24/09/2018</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;3Excel c&oacute; những c&ocirc;ng dụng g&igrave;?</h3>\r\n\r\n<p>Excel c&oacute; nhiều c&ocirc;ng dụng kh&aacute;c nhau v&agrave; một số c&ocirc;ng dụng nổi bật như: Lưu dữ liệu, tham gia v&agrave;o việc t&iacute;nh to&aacute;n, quản l&yacute; dữ liệu, tham gia v&agrave; hỗ trợ c&aacute;c c&ocirc;ng cụ ph&acirc;n t&iacute;ch, t&igrave;m kiếm,...</p>\r\n\r\n<p><img alt=\"Excel có những công dụng gì?\" height=\"367\" src=\"https://cdn.tgdd.vn/Files/2021/08/03/1372781/excel-la-gi-tam-quan-trong-cua-excel-trong-cong-v-3.jpg\" title=\"Excel có những công dụng gì?\" width=\"730\" /></p>\r\n\r\n<h3>4Những t&iacute;nh năng cơ bản của Excel</h3>\r\n\r\n<h4><strong>Những t&iacute;nh năng m&agrave; bạn cần biết</strong></h4>\r\n\r\n<p>Một số t&iacute;nh năng của Excel cơ bản như:</p>\r\n\r\n<ul>\r\n	<li>Nhập v&agrave; lưu dữ liệu: Bạn c&oacute; thể nhập dữ liệu v&agrave;o c&aacute;c trang t&iacute;nh, sau đ&oacute; lưu lại v&agrave; khi d&ugrave;ng c&oacute; thể mở ra.</li>\r\n	<li>Hỗ trợ c&aacute;c c&ocirc;ng thức để tham gia t&iacute;nh to&aacute;n: C&oacute; rất nhiều c&ocirc;ng thức để t&iacute;nh to&aacute;n như:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/cach-dung-ham-sum-de-tinh-tong-trong-excel-1346822\" title=\"SUM\">SUM</a>, TODAY,&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/cach-dung-ham-if-trong-excel-co-vi-du-don-gian-d-1346707\" title=\"IF\">IF</a>,...</li>\r\n	<li>Vẽ biểu đồ: Dựa tr&ecirc;n số liệu được đưa ra, bạn c&oacute; thể vẽ biểu đồ để dễ d&agrave;ng hơn trong việc đ&aacute;nh gi&aacute;.</li>\r\n	<li>Tạo v&agrave; li&ecirc;n kết nhiều bảng t&iacute;nh: Gi&uacute;p dữ liệu được li&ecirc;n kết chặt chẽ hơn.</li>\r\n	<li>Hỗ trợ bảo mật an to&agrave;n: Hỗ trợ người d&ugrave;ng c&agrave;i password khi mở file.</li>\r\n</ul>\r\n\r\n<p><strong>Xem th&ecirc;m</strong>:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/tong-hop-cac-ham-co-ban-trong-excel-thuong-duoc-su-1363094\" title=\"Hàm Excel cơ bản thường được sử dụng\">H&agrave;m Excel cơ bản thường được sử dụng</a></p>\r\n\r\n<h4><strong>Cấu tr&uacute;c của một bảng t&iacute;nh trong Excel</strong></h4>\r\n\r\n<p>Một bảng t&iacute;nh sẽ bao gồm nhiều th&agrave;nh phần cấu tạo n&ecirc;n:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Bảng t&iacute;nh - Sheet: Mỗi bảng sẽ c&oacute; hơn 4 triệu &ocirc; n&ecirc;n người d&ugrave;ng c&oacute; thể thoải m&aacute;i nhập dữ liệu tr&ecirc;n đ&acirc;y.</li>\r\n	<li>Sổ tay - Workbook: Th&ocirc;ng thường sẽ c&oacute; 1 - 255 Sheet. Workbook c&oacute; t&aacute;c dụng d&ugrave;ng để tập hợp c&aacute;c bảng t&iacute;nh, đồ thị,... m&agrave; c&oacute; sự li&ecirc;n kết với nhau.</li>\r\n	<li>Cột - Column: L&agrave; tập hợp nhiều &ocirc; được t&iacute;nh theo chiều dọc v&agrave; c&oacute; độ rộng mặc định l&agrave; 9 k&yacute; tự. Một bảng t&iacute;nh sẽ c&oacute; 256 cột v&agrave; được đ&aacute;nh theo k&yacute; tự A, B, C, D, E, F, G,...&nbsp;</li>\r\n	<li>D&ograve;ng - Rows: L&agrave; tập hợp c&aacute;c &ocirc; được t&iacute;nh theo chiều ngang v&agrave; c&oacute; chiều cao mặc định l&agrave; 12.75 chấm điểm. Một bảng t&iacute;nh sẽ c&oacute; &iacute;t nhất l&agrave; 16384 d&ograve;ng v&agrave; được đ&aacute;nh theo k&yacute; tự số từ 1, 2, 3, 4, 5,...</li>\r\n	<li>&Ocirc; - Cell: L&agrave; điểm giao giữa d&ograve;ng v&agrave; cột. Mỗi &ocirc; sẽ được x&aacute;c định tọa độ bằng k&yacute; tự của cột v&agrave; số thứ tự của d&ograve;ng. V&iacute; dụ như A3, D7, E1,...</li>\r\n	<li>V&ugrave;ng - Range: Đ&acirc;y l&agrave; tập hợp của nhiều &ocirc; v&agrave; được x&aacute;c định bằng tọa độ &ocirc; đầu v&agrave; tọa độ &ocirc; cuối. V&iacute; dụ: C3:C5, D2: E6,...</li>\r\n</ul>\r\n\r\n<p><img alt=\"Cấu trúc của một bảng tính trong Excel\" height=\"450\" src=\"https://cdn.tgdd.vn/Files/2021/08/03/1372781/excel-la-gi-tam-quan-trong-cua-excel-trong-cong-v-4.jpg\" title=\"Cấu trúc của một bảng tính trong Excel\" width=\"730\" /></p>\r\n\r\n<p>Xem th&ecirc;m:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/cach-co-dinh-cot-dong-trong-excel-chi-tiet-1350325\" title=\"Cách cố định cột, dòng trong Excel\">C&aacute;ch cố định cột, d&ograve;ng trong Excel</a></p>\r\n\r\n<h4><strong>Kiểu dữ liệu của Excel</strong></h4>\r\n\r\n<p>Trong Excel sẽ bao gồm c&aacute;c kiểu dữ liệu:</p>\r\n\r\n<ul>\r\n	<li>Kiểu dữ liệu chuỗi: Bao gồm c&aacute;c chữ c&aacute;i từ A - Z, c&aacute;c k&yacute; tự đặc biệt hay một d&atilde;y số m&agrave; chỉ cần chứa một k&yacute; tự.</li>\r\n	<li>Kiểu dữ liệu số: Bao gồm c&aacute;c dữ liệu dạng số từ 0 đến 9, cả số &acirc;m v&agrave; số dương.</li>\r\n	<li>Kiểu dữ liệu thời gian: Bạn c&oacute; thể nhập theo kiểu ng&agrave;y th&aacute;ng năm hoặc giờ ph&uacute;t gi&acirc;y.</li>\r\n	<li>Kiểu dữ liệu dạng Boolean: Kiểu n&agrave;y sẽ trả về dạng True/False.</li>\r\n	<li>Kiểu dữ liệu c&ocirc;ng thức: Bạn sử dụng c&aacute;c c&ocirc;ng thức to&aacute;n tử hay c&aacute;c dấu so s&aacute;nh.</li>\r\n</ul>\r\n\r\n<h3>5Excel &aacute;p dụng cho những ng&agrave;nh n&agrave;o hiện nay?</h3>\r\n\r\n<p>Excel được ra đời nhằm ứng dụng thực tế v&agrave;o nhiều ng&agrave;nh nghề kh&aacute;c nhau như:</p>\r\n\r\n<ul>\r\n	<li>Kế to&aacute;n: Đ&acirc;y l&agrave; ng&agrave;nh sử dụng Excel kh&aacute; thường xuy&ecirc;n để t&iacute;nh to&aacute;n, lập c&aacute;c b&aacute;o c&aacute;o h&agrave;ng ng&agrave;y, b&aacute;o c&aacute;o t&agrave;i ch&iacute;nh,...</li>\r\n	<li>Ng&acirc;n h&agrave;ng: Quản l&yacute; nh&acirc;n sự, t&agrave;i sản v&agrave; c&aacute;c danh s&aacute;ch.</li>\r\n	<li>Kỹ sư: T&iacute;nh to&aacute;n dữ liệu để tham gia v&agrave;o c&aacute;c c&ocirc;ng tr&igrave;nh x&acirc;y dựng, dự &aacute;n,...</li>\r\n	<li>Gi&aacute;o vi&ecirc;n: Quản l&yacute; th&ocirc;ng tin v&agrave; t&iacute;nh điểm cho học sinh.</li>\r\n</ul>\r\n\r\n<div id=\"simple-translate\">\r\n<div>\r\n<div class=\"isShow simple-translate-button\" style=\"background-image:url(&quot;chrome-extension://cllnohpbfenopiakdcjmjcbaeapmkcdl/icons/512.png&quot;); height:22px; left:233px; top:87px; width:22px\">&nbsp;</div>\r\n\r\n<div class=\" simple-translate-panel\" style=\"background-color:#ffffff; font-size:13px; height:200px; left:0px; top:0px; width:300px\">\r\n<div class=\"simple-translate-result-wrapper\" style=\"overflow:hidden\">\r\n<div class=\"simple-translate-move\" draggable=\"true\">&nbsp;</div>\r\n\r\n<div class=\"simple-translate-result-contents\">\r\n<p class=\"simple-translate-result\" dir=\"auto\" style=\"color:#000000\">&nbsp;</p>\r\n\r\n<p class=\"simple-translate-candidate\" dir=\"auto\" style=\"color:#737373\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '2022-01-12 18:48:00', 1),
(15, 'Word là gì? Những điều cơ bản về Word mà bạn cần biết', 3, 18, 'Image-Best-Microsoft-Word-Online-Tips-and-Tricks-2_4d470f76dc99e18ad75087b1b8410ea9.png', '<p>Word l&agrave; một trong những phần mềm soạn thảo văn bản phổ biến với nhiều người. Nhưng nhiều người vẫn chưa thực sự hiểu r&otilde; về phần mềm n&agrave;y. Những điều cơ bản về Word m&agrave; bạn cần biết sẽ được bật m&iacute; trong b&agrave;i viết sau. C&ugrave;ng Điện m&aacute;y XANH t&igrave;m hiểu th&ocirc;i n&agrave;o!</p>\r\n\r\n<h3><strong>1. Microsoft Word l&agrave; g&igrave;?</strong></h3>\r\n\r\n<p>Microsoft Word l&agrave; chương tr&igrave;nh soạn thảo, xử l&yacute; văn bản phổ biến&nbsp;với tất cả mọi người d&ugrave;ng m&aacute;y t&iacute;nh tr&ecirc;n to&agrave;n thế giới, được&nbsp;ph&aacute;t triển bởi&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Microsoft\" rel=\"nofollow\" target=\"_blank\" title=\"Microsoft\">Microsoft</a>&nbsp;v&agrave; thuộc bộ&nbsp;ứng dụng Microsoft Office.&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng qua c&aacute;c c&ocirc;ng cụ định dạng&nbsp;Microsoft Word&nbsp;gi&uacute;p bạn&nbsp;tạo ra c&aacute;c t&agrave;i liệu c&oacute; chất lượng chuy&ecirc;n nghiệp&nbsp;một c&aacute;ch hiệu quả. B&ecirc;n cạnh đ&oacute;,&nbsp;Word c&ograve;n bao gồm c&aacute;c c&ocirc;ng cụ chỉnh sửa v&agrave; sửa đổi gi&uacute;p bạn c&oacute; thể cộng t&aacute;c với mọi người một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<h3><strong>2. Lịch sử ph&aacute;t triển của Microsoft Word</strong></h3>\r\n\r\n<p>V&agrave;o năm&nbsp;<strong>1975</strong>, c&ocirc;ng&nbsp;ty phần mềm m&aacute;y t&iacute;nh nhỏ&nbsp;Micro-Soft được th&agrave;nh lập bởi&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bill_Gates\" rel=\"nofollow\" target=\"_blank\" title=\"Bill Gates\">Bill Gates</a>&nbsp;v&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Paul_Allen\" rel=\"nofollow\" target=\"_blank\" title=\"Paul Allen\">Paul Allen</a>&nbsp;tại&nbsp;Albuquerque, New Mexico. V&agrave;o thời điểm đ&oacute;, văn bản được tạo ra bởi&nbsp;m&aacute;y đ&aacute;nh chữ, cao cấp nhất l&agrave;&nbsp;m&aacute;y đ&aacute;nh chữ điện tử. Với thiết bị n&agrave;y, chỉ với một lỗi đ&aacute;nh m&aacute;y sai sẽ khiến to&agrave;n bộ trang giấy bị hủy bỏ v&agrave; phải đ&aacute;nh lại từ đầu.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy,&nbsp;Bill Gates v&agrave; Paul Allen đ&atilde;&nbsp;nghĩ tới c&aacute;c hệ thống m&aacute;y t&iacute;nh c&aacute; nh&acirc;n c&oacute; khả năng xử l&yacute; văn bản v&agrave; bắt đầu t&igrave;m kiếm&nbsp;những lập tr&igrave;nh vi&ecirc;n giỏi.</p>\r\n\r\n<p>V&agrave;o ng&agrave;y&nbsp;<strong>20/11/1985</strong>, phi&ecirc;n bản đầu ti&ecirc;n của d&ograve;ng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Microsoft_Windows\" rel=\"nofollow\" target=\"_blank\" title=\"Microsoft Windows\">Microsoft Windows</a>&nbsp;l&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Windows_1.0\" rel=\"nofollow\" target=\"_blank\" title=\"Windows 1.0\">Windows 1.0</a>&nbsp;được ph&aacute;t h&agrave;nh.</p>\r\n\r\n<p>Năm&nbsp;<strong>1990</strong>, Microsoft giới thiệu bộ ứng dụng văn ph&ograve;ng của m&igrave;nh,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Microsoft_Office\" rel=\"nofollow\" target=\"_blank\" title=\"Microsoft Office\">Microsoft Office</a>. Bộ phần mềm đi k&egrave;m c&aacute;c ứng dụng năng suất ri&ecirc;ng biệt, như Microsoft Word v&agrave; Microsoft Excel.</p>\r\n\r\n<h3><strong>3. Microsoft Word c&oacute; những chức năng th&ocirc;ng dụng g&igrave;?</strong></h3>\r\n\r\n<ul>\r\n	<li>Soạn thảo hợp đồng, bi&ecirc;n bản</li>\r\n	<li>Soạn thảo b&aacute;o c&aacute;o</li>\r\n	<li>Tạo CV</li>\r\n	<li>Tạo mail</li>\r\n	<li>Tạo phong b&igrave;</li>\r\n	<li>Watermark</li>\r\n	<li>Autocorrect</li>\r\n	<li>Bảo vệ t&agrave;i liệu</li>\r\n	<li>Đếm từ</li>\r\n	<li>Thiết lập chế độ hiển thị</li>\r\n</ul>\r\n\r\n<h3><strong>4. Những t&iacute;nh năng cơ bản của Microsoft Word</strong></h3>\r\n\r\n<h4>Những t&iacute;nh năng m&agrave; bạn cần biết</h4>\r\n\r\n<ul>\r\n	<li>Tiết kiệm thời gian với Researcher</li>\r\n	<li>Sử dụng Accessibility Checker</li>\r\n	<li>Ch&egrave;n video trực tuyến</li>\r\n	<li>So s&aacute;nh hoặc gộp t&agrave;i liệu</li>\r\n	<li>Ch&egrave;n Smart Chart</li>\r\n	<li>Nghe đọc văn bản</li>\r\n	<li>C&aacute; nh&acirc;n h&oacute;a Word với c&aacute;c t&ugrave;y chọn n&acirc;ng cao</li>\r\n	<li>T&ugrave;y chỉnh thanh trạng th&aacute;i</li>\r\n</ul>\r\n\r\n<div id=\"simple-translate\">\r\n<div>\r\n<div class=\"isShow simple-translate-button\" style=\"background-image:url(&quot;chrome-extension://cllnohpbfenopiakdcjmjcbaeapmkcdl/icons/512.png&quot;); height:22px; left:24px; top:79px; width:22px\">&nbsp;</div>\r\n\r\n<div class=\" simple-translate-panel\" style=\"background-color:#ffffff; font-size:13px; height:200px; left:0px; top:0px; width:300px\">\r\n<div class=\"simple-translate-result-wrapper\" style=\"overflow:hidden\">\r\n<div class=\"simple-translate-move\" draggable=\"true\">&nbsp;</div>\r\n\r\n<div class=\"simple-translate-result-contents\">\r\n<p class=\"simple-translate-result\" dir=\"auto\" style=\"color:#000000\">&nbsp;</p>\r\n\r\n<p class=\"simple-translate-candidate\" dir=\"auto\" style=\"color:#737373\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '2022-01-12 18:50:40', 1),
(16, 'Powerpoint là gì? Những thông tin mà bạn nên biết về Microsoft Powerpoint', 3, 19, 'lead_240220211927_729631.jpg', '<p>PowerPoint l&agrave; được biết đến l&agrave; phần mềm tr&igrave;nh chiếu kh&ocirc;ng thể thiếu, được sử dụng bởi đ&ocirc;ng đảo c&aacute;c bạn sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng,... Vậy Powerpoint l&agrave; g&igrave;? Xem ngay những th&ocirc;ng tin m&agrave; bạn n&ecirc;n biết về Microsoft Powerpoint dưới đ&acirc;y để gi&uacute;p &iacute;ch cho c&ocirc;ng việc v&agrave; học tập nh&eacute;!</p>\r\n\r\n<h3><strong>1.Powerpoint l&agrave; g&igrave;?</strong></h3>\r\n\r\n<p>PowerPoint nằm trong bộ c&ocirc;ng cụ&nbsp;<a href=\"https://www.dienmayxanh.com/phan-mem-microsoft\" title=\"Microsoft Office\">Microsoft Office</a>, l&agrave; một phần mềm tr&igrave;nh chiếu sử dụng c&aacute;c slide để truyền tải th&ocirc;ng tin. N&oacute; cho ph&eacute;p người d&ugrave;ng tạo ra những slide phục vụ c&aacute;c buổi thuyết tr&igrave;nh để thể hiện những th&ocirc;ng điệp trong c&aacute;c lớp học hoặc buổi họp.</p>\r\n\r\n<p><img alt=\"Powerpoint là gì?\" height=\"400\" src=\"https://cdn.tgdd.vn/Files/2021/08/12/1374841/powerpoint-la-gi-nhung-thong-tin-ma-ban-nen-biet-.jpg\" title=\"Powerpoint là gì?\" width=\"730\" /></p>\r\n\r\n<h3><strong>2.Những c&ocirc;ng dụng của Powerpoint</strong></h3>\r\n\r\n<p>Với những c&ocirc;ng dụng tuyệt vời, PowerPoint l&agrave; c&ocirc;ng cụ v&ocirc; c&ugrave;ng hữu &iacute;ch v&agrave; được sử dụng rộng r&atilde;i trong giảng dạy, học tập, doanh nghiệp.</p>\r\n\r\n<ul>\r\n	<li>C&aacute;c doanh nghiệp c&oacute; thể tạo c&aacute;c b&agrave;i thuyết tr&igrave;nh cho sản phẩm v&agrave; dịch vụ của m&igrave;nh.</li>\r\n	<li>Gi&uacute;p thầy c&ocirc; gi&aacute;o, giảng vi&ecirc;n trong c&aacute;c tổ chức gi&aacute;o dục tạo b&agrave;i giảng sinh động, trực quan cho lớp học.</li>\r\n	<li>Gi&uacute;p tạo file tr&igrave;nh chiếu như tiếp thị, dự &aacute;n, đ&aacute;m cưới, sơ đồ,... với v&ocirc; số định dạng v&agrave; mang dấu ấn ri&ecirc;ng phong ph&uacute;.</li>\r\n	<li>C&aacute;c hiệu ứng kết hợp c&ugrave;ng h&igrave;nh ảnh ấn tượng sẽ thu h&uacute;t sự ch&uacute; &yacute; của người xem.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Những công dụng của Powerpoint\" height=\"400\" src=\"https://cdn.tgdd.vn/Files/2021/08/12/1374841/powerpoint-la-gi-nhung-thong-tin-ma-ban-nen-biet--1.jpg\" title=\"Những công dụng của Powerpoint\" width=\"730\" /></p>\r\n\r\n<h3><strong>3.Lịch sử ph&aacute;t triển của Microsoft Powerpoint</strong></h3>\r\n\r\n<p>Bản ph&aacute;t h&agrave;nh ban đầu được gọi l&agrave; &ldquo;Presenter&rdquo; thiết kế cho c&aacute;c m&aacute;y t&iacute;nh Macintosh bởi Thomas Rudkin v&agrave; Dennis Austin. N&oacute; được đổi t&ecirc;n th&agrave;nh PowerPoint v&agrave;o năm 1987 do c&aacute;c vấn đề thương hiệu từ Robert Gaskins. C&ugrave;ng th&aacute;ng 8 năm đ&oacute;, Forethought Inc được mua lại bởi Microsoft với gi&aacute; 14.000.000$. Từ đ&acirc;y, PowerPoint ch&iacute;nh thức trở th&agrave;nh đơn vị kinh doanh đồ họa của Microsoft.&nbsp;</p>\r\n\r\n<p><img alt=\"Lịch sử phát triển của Microsoft Powerpoint\" height=\"400\" src=\"https://cdn.tgdd.vn/Files/2021/08/12/1374841/powerpoint-la-gi-nhung-thong-tin-ma-ban-nen-biet--2.jpg\" title=\"Lịch sử phát triển của Microsoft Powerpoint\" width=\"730\" /></p>\r\n\r\n<p>Qua nhiều năm đ&atilde; c&oacute; nhiều phi&ecirc;n bản của bộ phần mềm Microsoft Office, trong đ&oacute; c&oacute; PowerPoint. Dưới đ&acirc;y l&agrave; c&aacute;c Bộ Microsoft Office gần đ&acirc;y c&oacute; PowerPoint:</p>\r\n\r\n<ul>\r\n	<li>PowerPoint Online (hoặc PowerPoint 365) c&oacute; sẵn v&agrave; được cập nhật thường xuy&ecirc;n trong Office 365</li>\r\n	<li>PowerPoint 2016 c&oacute; sẵn trong Office 2016</li>\r\n	<li>PowerPoint 2013 đ&atilde; c&oacute; trong Office 2013</li>\r\n	<li>PowerPoint 2010 đ&atilde; c&oacute; trong Office 2010</li>\r\n	<li>PowerPoint 2007 đ&atilde; được bao gồm trong Office 2007</li>\r\n	<li>PowerPoint 2003 được bao gồm trong Office 2003</li>\r\n	<li>PowerPoint 2002 đ&atilde; được bao gồm trong Office XP</li>\r\n	<li>PowerPoint cũng c&oacute; sẵn cho d&ograve;ng m&aacute;y t&iacute;nh Macintosh, cũng như điện thoại v&agrave; m&aacute;y t&iacute;nh bảng</li>\r\n</ul>\r\n\r\n<h3><strong>4.Những t&iacute;nh năng nổi bật nhất của Powerpoint</strong></h3>\r\n\r\n<p>Kh&ocirc;ng chỉ d&ugrave;ng để thiết kế v&agrave; tr&igrave;nh chiếu slide m&agrave; PowerPoint c&ograve;n c&oacute; những t&iacute;nh năng nổi bật đ&aacute;nh bật mọi đối thủ.</p>\r\n\r\n<p><strong>Zoom - L&agrave;m nổi bật</strong></p>\r\n\r\n<p>Nhờ t&iacute;nh năng n&agrave;y, bạn c&oacute; thể chọn những trang tr&igrave;nh b&agrave;y muốn l&agrave;m nổi bật để c&ocirc;ng cụ tự động tạo một trang tr&igrave;nh b&agrave;y l&agrave;m menu cho tất cả c&aacute;c trang tr&igrave;nh b&agrave;y kh&aacute;c.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ mang đến sự hấp dẫn cho người xem, n&oacute; gi&uacute;p thể hiện tốt hơn chủ đề v&agrave; bối cảnh tổng thể của tr&igrave;nh chiếu.</p>\r\n\r\n<div id=\"simple-translate\">\r\n<div>\r\n<div class=\"isShow simple-translate-button\" style=\"background-image:url(&quot;chrome-extension://cllnohpbfenopiakdcjmjcbaeapmkcdl/icons/512.png&quot;); height:22px; left:23px; top:86px; width:22px\">&nbsp;</div>\r\n\r\n<div class=\" simple-translate-panel\" style=\"background-color:#ffffff; font-size:13px; height:200px; left:0px; top:0px; width:300px\">\r\n<div class=\"simple-translate-result-wrapper\" style=\"overflow:hidden\">\r\n<div class=\"simple-translate-move\" draggable=\"true\">&nbsp;</div>\r\n\r\n<div class=\"simple-translate-result-contents\">\r\n<p class=\"simple-translate-result\" dir=\"auto\" style=\"color:#000000\">&nbsp;</p>\r\n\r\n<p class=\"simple-translate-candidate\" dir=\"auto\" style=\"color:#737373\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '2022-01-12 18:57:02', 1);
INSERT INTO `tbl_news` (`newsId`, `newsName`, `catId`, `catsubId`, `image`, `news_desc`, `dateedit`, `status`) VALUES
(17, 'Ngành Thiết kế đồ họa là gì? Ra trường làm gì?', 4, 21, '1557819220wdHkLkmqeFhJCKz.jpg', '<p><em>&quot;Ng&agrave;nh Thiết kế đồ họa l&agrave; g&igrave;? Ra trường l&agrave;m g&igrave;?&quot;</em>&nbsp;l&agrave; c&acirc;u hỏi được hầu hết th&iacute; sinh đặt ra khi t&igrave;m hiểu về Thiết kế đồ họa - một trong những ng&agrave;nh học hấp dẫn của lĩnh vực Nghệ thuật ứng dụng. Đ&acirc;y l&agrave; mối băn khoăn ho&agrave;n to&agrave;n dễ hiểu, v&igrave; để học tốt v&agrave; th&agrave;nh c&ocirc;ng trong bất cứ ng&agrave;nh nghề n&agrave;o, điều quan trọng đầu ti&ecirc;n l&agrave; bạn phải hiểu r&otilde; ng&agrave;nh học đ&oacute; l&agrave; g&igrave; v&agrave; cơ hội nghề nghiệp ra sao.<br />\r\n<br />\r\nB&agrave;i viết dưới đ&acirc;y sẽ gi&uacute;p cho những bạn đang mong muốn theo đuổi&nbsp;<a href=\"https://www.hutech.edu.vn/tuyensinh/nganh-dao-tao/nganh-thiet-ke-do-hoa\"><strong>ng&agrave;nh Thiết kế đồ họa</strong></a>&nbsp;giải tỏa được mối bận t&acirc;m ch&iacute;nh đ&aacute;ng n&agrave;y.&nbsp;<em>&quot;Ng&agrave;nh Thiết kế đồ họa l&agrave; g&igrave;? Ra trường l&agrave;m g&igrave;?&quot;</em>, ch&uacute;ng ta sẽ c&ugrave;ng t&igrave;m hiểu, trả lời v&agrave; định hướng tương lai c&aacute;c bạn nh&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ng&agrave;nh Thiết kế đồ họa l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Hiểu một c&aacute;ch đơn giản,&nbsp;<em>ng&agrave;nh Thiết kế đồ họa</em>&nbsp;l&agrave; ng&agrave;nh học kết hợp giữa &yacute; tưởng s&aacute;ng tạo v&agrave; khả năng cảm nhận thẩm mỹ, th&ocirc;ng qua c&aacute;c c&ocirc;ng cụ đồ họa để truyền tải th&ocirc;ng điệp bằng những h&igrave;nh ảnh đẹp, ấn tượng, đi v&agrave;o l&ograve;ng người. N&oacute;i c&aacute;ch kh&aacute;c&nbsp;<em>Đồ họa</em>&nbsp;l&agrave; sự kết hợp giữa nghệ thuật v&agrave; th&ocirc;ng tin. V&agrave;&nbsp;<em>Thiết kế đồ họa</em>&nbsp;l&agrave; loại h&igrave;nh nghệ thuật ứng dụng, kết hợp h&igrave;nh ảnh chữ viết v&agrave; &yacute; tưởng một c&aacute;ch s&aacute;ng tạo để truyền đạt th&ocirc;ng tin hiệu quả v&agrave; th&uacute; vị qua c&aacute;c h&igrave;nh thức ấn phẩm in ấn v&agrave; trực tuyến.</p>\r\n\r\n<p>&nbsp;<br />\r\nTheo học&nbsp;<a href=\"https://www.hutech.edu.vn/tuyensinh/nganh-dao-tao/nganh-thiet-ke-do-hoa\"><strong>Thiết kế đồ họa</strong></a>, sinh vi&ecirc;n được trang bị kiến thức, kỹ năng về nền tảng nghệ thuật v&agrave; phương ph&aacute;p thiết kế, c&aacute;c kỹ thuật ứng dụng v&agrave; sử dụng c&ocirc;ng nghệ trong thiết kế đồ họa, xu hướng ph&aacute;t triển c&aacute;c ứng dụng đồ họa tr&ecirc;n thế giới,... Sinh vi&ecirc;n tốt nghiệp c&oacute; khả năng kết hợp giữa thiết kế với truyền th&ocirc;ng, mỹ thuật, thương mại để đ&aacute;p ứng tốt những y&ecirc;u cầu của nền c&ocirc;ng nghiệp s&aacute;ng tạo v&agrave; giải tr&iacute; hiện đại. Ngo&agrave;i ra, tại những trường đại học đ&agrave;o tạo ng&agrave;nh&nbsp;<em>Thiết kế đồ họa</em>&nbsp;c&oacute; uy t&iacute;n như Đại học Mỹ thuật TP.HCM, Đại học Kiến tr&uacute;c TP.HCM, Đại học C&ocirc;ng nghệ TP.HCM (HUTECH),... sinh vi&ecirc;n c&ograve;n được ch&uacute; trọng ph&aacute;t triển c&aacute;c kỹ năng chuy&ecirc;n m&ocirc;n như: kỹ năng s&aacute;ng t&aacute;c v&agrave; thể hiện, kỹ năng nắm bắt t&acirc;m l&yacute; kh&aacute;ch h&agrave;ng, kỹ năng l&agrave;m việc nh&oacute;m, kỹ năng l&agrave;m việc độc lập, kỹ năng đ&agrave;m ph&aacute;n, kỹ năng l&atilde;nh đạo,...</p>\r\n\r\n<h2><strong>Học ng&agrave;nh Thiết kế đồ họa ra trường l&agrave;m g&igrave;?</strong></h2>\r\n\r\n<p>Theo thống k&ecirc; của Trung t&acirc;m dự b&aacute;o Nh&acirc;n lực v&agrave; Thị trường lao động Th&agrave;nh phố Hồ Ch&iacute; Minh, trong năm 2021, nước ta cần 1.000.000 nh&acirc;n lực cho ng&agrave;nh học Thiết kế đồ họa. Thế nhưng, nguồn nh&acirc;n lực cho lĩnh vực n&agrave;y vẫn chưa đủ đ&aacute;p ứng nhu cầu tr&ecirc;n. C&aacute;c trường đại học v&agrave; c&aacute;c trung t&acirc;m đ&agrave;o tạo chỉ đ&aacute;p ứng được 40% nhu cầu nh&acirc;n lực cho ng&agrave;nh nghề đắt gi&aacute; n&agrave;y. Ch&iacute;nh nhu cầu cao về nh&acirc;n lực đ&atilde; tạo ra cơ hội lựa chọn việc l&agrave;m phong ph&uacute; cho c&aacute;c cử nh&acirc;n ng&agrave;nh Thiết kế đồ họa với mức lương khởi điểm từ 8-10 triệu/th&aacute;ng v&agrave; đối với người c&oacute; kinh nghiệm từ một đến hai năm l&agrave; 12-15 triệu/th&aacute;ng.<br />\r\n<br />\r\nNhững cơ hội nghề nghiệp d&agrave;nh cho c&aacute;c cử nh&acirc;n tốt nghiệp&nbsp;<a href=\"https://www.hutech.edu.vn/tuyensinh/nganh-dao-tao/nganh-thiet-ke-do-hoa\"><strong>ng&agrave;nh Thiết kế đồ họa</strong></a>&nbsp;c&oacute; thể kể đến như sau: chuy&ecirc;n vi&ecirc;n thiết kế, tư vấn thiết kế tại c&aacute;c c&ocirc;ng ty quảng c&aacute;o, c&ocirc;ng ty thiết kế, c&ocirc;ng ty truyền th&ocirc;ng v&agrave; tổ chức sự kiện, studio nghệ thuật, xưởng phim hoạt h&igrave;nh v&agrave; truyện tranh, c&aacute;c t&ograve;a soạn, c&aacute;c nh&agrave; xuất bản, cơ quan truyền h&igrave;nh, b&aacute;o ch&iacute;,... Ngo&agrave;i ra, sau khi tốt nghiệp, sinh vi&ecirc;n c&oacute; thể tự th&agrave;nh lập doanh nghiệp, c&aacute;c c&ocirc;ng ty thiết kế, dịch vụ studio hoặc tư vấn, giảng dạy tại c&aacute;c trường học, trung t&acirc;m, CLB,... Hơn nữa, như một đặc th&ugrave; ưu &aacute;i, ng&agrave;nh&nbsp;<em>Thiết kế đồ họa&nbsp;</em>lu&ocirc;n mang lại những cơ hội l&agrave;m th&ecirc;m hấp dẫn tại nh&agrave; như thiết kế website, thiết kế logo, nhận diện thương hiệu,...</p>\r\n\r\n<p><br />\r\nĐể tự tin nắm bắt những cơ hội nghề nghiệp hấp dẫn n&agrave;y, song song với kiến thức chuy&ecirc;n ng&agrave;nh, việc trang bị th&ecirc;m những kỹ năng nghề nghiệp v&agrave; kỹ năng mềm l&agrave; một y&ecirc;u cầu kh&ocirc;ng thể thiếu đối với sinh vi&ecirc;n&nbsp;<a href=\"https://www.hutech.edu.vn/tuyensinh/nganh-dao-tao/nganh-thiet-ke-do-hoa\"><strong>ng&agrave;nh&nbsp;<em>Thiết kế đồ họa</em></strong></a>. Tại Đại học C&ocirc;ng nghệ TP.HCM (HUTECH) - một trong những trường đại học uy t&iacute;n đ&agrave;o tạo ng&agrave;nh&nbsp;<em>Thiết kế đồ họa</em>, sinh vi&ecirc;n được đặc biệt ch&uacute; trọng đ&agrave;o tạo kỹ năng tiếng Anh để c&oacute; thể dễ d&agrave;ng tiếp x&uacute;c với những t&agrave;i liệu tham khảo, phần mềm thiết kế, quy tr&igrave;nh thực h&agrave;nh. Ngo&agrave;i ra, sinh vi&ecirc;n ng&agrave;nh&nbsp;<em>Thiết kế đồ họa</em>&nbsp;tại HUTECH c&ograve;n được trang bị kỹ năng giao tiếp, kỹ năng thuyết tr&igrave;nh, kỹ năng l&agrave;m việc nh&oacute;m,&hellip; để c&oacute; thể tự tin l&agrave;m việc, x&acirc;y dựng mối quan hệ v&agrave; khẳng định bản th&acirc;n trong nền kinh tế hiện đại.<br />\r\n&nbsp;<br />\r\nVới những điều đ&atilde; tr&igrave;nh b&agrave;y, c&oacute; lẽ &ldquo;Ng&agrave;nh Thiết kế đồ họa l&agrave; g&igrave;? Ra trường l&agrave;m g&igrave;?&rdquo; đ&atilde; kh&ocirc;ng c&ograve;n l&agrave; một c&acirc;u hỏi kh&oacute;. Tuy nhi&ecirc;n, bạn c&oacute; ph&ugrave; hợp để theo học ng&agrave;nh Thiết kế đồ họa kh&ocirc;ng, ng&agrave;nh Thiết kế đồ họa x&eacute;t tuyển những tổ hợp m&ocirc;n n&agrave;o, điểm tr&uacute;ng tuyển của&nbsp;<a href=\"https://www.hutech.edu.vn/tuyensinh/nganh-dao-tao/nganh-thiet-ke-do-hoa\"><strong>ng&agrave;nh Thiết kế đồ họa</strong></a>&nbsp;khoảng bao nhi&ecirc;u, c&oacute; những trường n&agrave;o uy t&iacute;n đ&agrave;o tạo ng&agrave;nh Thiết kế đồ họa,&hellip; l&agrave; những c&acirc;u hỏi bạn sẽ phải tiếp tục trả lời nếu thực sự mong muốn theo đuổi ng&agrave;nh Thiết kế đồ họa v&agrave; trở th&agrave;nh một người thiết kế th&agrave;nh c&ocirc;ng trong tương lai.</p>\r\n\r\n<div id=\"simple-translate\">\r\n<div>\r\n<div class=\"isShow simple-translate-button\" style=\"background-image:url(&quot;chrome-extension://cllnohpbfenopiakdcjmjcbaeapmkcdl/icons/512.png&quot;); height:22px; left:20px; top:87px; width:22px\">&nbsp;</div>\r\n\r\n<div class=\" simple-translate-panel\" style=\"background-color:#ffffff; font-size:13px; height:200px; left:0px; top:0px; width:300px\">\r\n<div class=\"simple-translate-result-wrapper\" style=\"overflow:hidden\">\r\n<div class=\"simple-translate-move\" draggable=\"true\">&nbsp;</div>\r\n\r\n<div class=\"simple-translate-result-contents\">\r\n<p class=\"simple-translate-result\" dir=\"auto\" style=\"color:#000000\">&nbsp;</p>\r\n\r\n<p class=\"simple-translate-candidate\" dir=\"auto\" style=\"color:#737373\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '2022-01-12 19:04:15', 1),
(18, 'Các khái niệm cơ bản về kiểm thử phần mềm', 14, 27, '1a.png', '<p>Ch&agrave;o c&aacute;c bạn, h&ocirc;m nay m&igrave;nh muốn chia sẻ với c&aacute;c bạn - những người vừa mới bước ch&acirc;n v&agrave;o nghề kiểm thử như m&igrave;nh hoặc ai đ&oacute; muốn t&igrave;m hiểu qua đ&ocirc;i ch&uacute;t về lĩnh vực n&agrave;y một số kh&aacute;i niệm cơ bản về kiểm thử phần mềm.</p>\r\n\r\n<h2>1. Kiểm thử phần mềm ( Software Testing)</h2>\r\n\r\n<p>Kiểm thử phần mềm l&agrave; qu&aacute; tr&igrave;nh thực thi 1 chương tr&igrave;nh với mục đ&iacute;ch t&igrave;m ra lỗi.</p>\r\n\r\n<p>Kiểm thử phần mềm đảm bảo sản phẩm phần mềm đ&aacute;p ứng ch&iacute;nh x&aacute;c, đầy đủ v&agrave; đ&uacute;ng theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng, y&ecirc;u cầu của sản phẩm đề đ&atilde; đặt ra.</p>\r\n\r\n<p>Kiểm thử phần mềm cũng cung cấp mục ti&ecirc;u, c&aacute;i nh&igrave;n độc lập về phần mềm, điều n&agrave;y cho ph&eacute;p việc đ&aacute;nh gi&aacute; v&agrave; hiểu r&otilde; c&aacute;c rủi ro khi thực thi phần mềm.</p>\r\n\r\n<p>Kiểm thử phần mềm tạo điều kiện cho bạn tận dụng tối đa tư duy đ&aacute;nh gi&aacute; v&agrave; s&aacute;ng tạo để bạn c&oacute; thể ph&aacute;t hiện ra những điểm m&agrave; người kh&aacute;c chưa nh&igrave;n thấy.</p>\r\n\r\n<h2>2. Kiểm thử hộp đen( Black box testing)</h2>\r\n\r\n<p>Kiểm thử hộp đen l&agrave; 1 phương ph&aacute;p kiểm thử m&agrave; tester sẽ chỉ xem x&eacute;t đến đầu v&agrave;o v&agrave; đầu ra của chương tr&igrave;nh m&agrave; kh&ocirc;ng quan t&acirc;m code b&ecirc;n trong được viết ra sao. Tester thực hiện kiểm thử dựa ho&agrave;n to&agrave;n v&agrave;o đặc tả y&ecirc;u cầu . Mục đ&iacute;ch của kiểm thử hộp đen l&agrave; t&igrave;m ra c&aacute;c lỗi ở giao diện , chức năng của phần mềm. C&aacute;c trường hợp kiểm thử sẽ được x&acirc;y dựng xung quanh đ&oacute;.</p>\r\n\r\n<h2>3. Kiểm thử hộp trắng( White box testing)</h2>\r\n\r\n<p>Kiểm thử hộp trắng l&agrave; phương ph&aacute;p kiểm thử m&agrave; cấu tr&uacute;c thuật to&aacute;n của chương tr&igrave;nh được đưa v&agrave;o xem x&eacute;t. C&aacute;c trường hợp kiểm thử được thiết kế dựa v&agrave;o cấu tr&uacute;c m&atilde; hoặc c&aacute;ch l&agrave;m việc của chương tr&igrave;nh. Người kiểm thử truy cập v&agrave;o m&atilde; nguồn của chương tr&igrave;nh để kiểm tra n&oacute;.</p>\r\n\r\n<h2>4. Kiểm thử đơn vị( Unit test)</h2>\r\n\r\n<p>Kiểm thử đơn vị l&agrave; hoạt động kiểm thử nhỏ nhất. Kiểm thử thực hiện tr&ecirc;n c&aacute;c h&agrave;m hay th&agrave;nh phần ri&ecirc;ng lẻ.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; 1 c&ocirc;ng việc m&agrave; để thực hiện được n&oacute; th&igrave; người kiểm thử sẽ phải hiểu biết về code, về chương tr&igrave;nh, c&aacute;c h&agrave;m, ...Nếu bạn đang lo lắng v&igrave; bạn kh&ocirc;ng c&oacute; nhiều kiến thức về code th&igrave; kh&ocirc;ng sao cả, v&igrave; bạn sẽ kh&ocirc;ng phải thực hiện bước kiểm thử n&agrave;y, lập tr&igrave;nh vi&ecirc;n sẽ l&agrave;m n&oacute; trước khi giao cho bạn.</p>\r\n\r\n<p>Mục đ&iacute;ch của việc thực hiện kiểm thử đơn vị l&agrave; c&ocirc; lập từng th&agrave;nh phần của chương tr&igrave;nh v&agrave; chứng minh c&aacute;c bộ phận ri&ecirc;ng lẻ ch&iacute;nh x&aacute;c về c&aacute;c y&ecirc;u cầu chức năng.</p>\r\n\r\n<h2>5. Kiểm thử t&iacute;ch hợp( Intergration test)</h2>\r\n\r\n<p>Như ch&uacute;ng ta đ&atilde; biết, một phần mềm được tạo ra sẽ bao gồm rất nhiều module trong đ&oacute;, để chắc chắn rằng phần mềm hoạt động tốt th&igrave; ch&uacute;ng ta cần phải gom c&aacute;c module lại với nhau để kiểm tra sự giao tiếp giữa c&aacute;c module cũng như bản th&acirc;n từng th&agrave;nh phần từng module.. Kiểm thử t&iacute;ch hợp bao gồm 2 mục ti&ecirc;u ch&iacute;nh l&agrave; :</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ph&aacute;t hiện lỗi giao tiếp xảy ra giữa c&aacute;c Unit</p>\r\n	</li>\r\n	<li>\r\n	<p>T&iacute;ch hợp c&aacute;c Unit đơn lẻ th&agrave;nh c&aacute;c hệ thống nhỏ v&agrave; cuối c&ugrave;ng l&agrave; 1 hệ thống ho&agrave;n chỉnh để chuẩn bị cho bước kiểm thử hệ thống.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>6. Kiểm thử hệ thống( System test)</h2>\r\n\r\n<p>Kiểm thử 1 hệ thống đ&atilde; được t&iacute;ch hợp ho&agrave;n chỉnh để x&aacute;c minh rằng n&oacute; đ&aacute;p ứng được y&ecirc;u cầu Kiểm thử hệ thống thuộc loại kiểm thử hộp đen . Kiểm thử hệ thống tập trung nhiều hơn v&agrave;o c&aacute;c chức năng của hệ thống . Kiểm tra cả chức năng v&agrave; giao diện , c&aacute;c h&agrave;nh vi của hệ thống 1 c&aacute;ch ho&agrave;n chỉnh, đ&aacute;p ứng với y&ecirc;u cầu.</p>\r\n\r\n<h2>7. Kiểm thử chấp nhận( Acceptance test)</h2>\r\n\r\n<p>Trong kiểu kiểm thử n&agrave;y, phần mềm sẽ được thực hiện kiểm tra từ người d&ugrave;ng để t&igrave;m ra nếu phần mềm ph&ugrave; hợp với sự mong đợi của người d&ugrave;ng v&agrave; thực hiện đ&uacute;ng như mong đợi. Trong giai đoạn test n&agrave;y, tester c&oacute; thể cũng thực hiện hoặc kh&aacute;ch h&agrave;ng c&oacute; c&aacute;c tester của ri&ecirc;ng họ để thực hiện.</p>\r\n\r\n<p>C&oacute; 2 loại kiểm thử chấp nhận đ&oacute; l&agrave; kiểm thử Alpha v&agrave; kiểm thử Beta:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Kiểm thử Alpha: l&agrave; loại kiểm thử nội bộ . Tức l&agrave; phần mềm sẽ được 1 đội kiểm thử độc lập hoặc do kh&aacute;ch h&agrave;ng thực hiện tại nơi sản xuất phần mềm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểm thử Beta: l&agrave; loại kiểm thử m&agrave; kh&aacute;ch h&agrave;ng thực hiện kiểm thử ở ch&iacute;nh m&ocirc;i trường của họ. Loại kiểm thử n&agrave;y được thực hiện sau kiểm thử Alpha.</p>\r\n	</li>\r\n</ul>\r\n', '2022-01-12 19:07:42', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `coursesId` int(11) NOT NULL,
  `coursesCode` longtext NOT NULL,
  `coursesName` longtext NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `timelearn` longtext NOT NULL,
  `dateedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_finish` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `coursesId`, `coursesCode`, `coursesName`, `customer_id`, `quantity`, `price`, `image`, `status`, `timelearn`, `dateedit`, `date_order`, `date_finish`) VALUES
(21, 1, 'CS_0126', 'LẬP TRÌNH WEBSITE PHP', 4, 1, '1000000', 'PHP-Wallpapers-Top-Free-PHP-Backgrounds-WallpaperAccess.jpg', 1, 'Thứ 3-5-7 (18:00 - 21:00)', '2022-01-12 19:32:45', '2022-01-12 19:32:25', '2022-01-12 19:32:45'),
(22, 9, 'CS_0129', 'THIẾT KẾ ĐỒ HOẠ 2D', 4, 1, '1750000', '2d-banner.png', 0, 'Thứ 3-5-7 (18:00 - 21:00)', '2021-11-27 17:00:00', '2022-01-19 15:44:09', NULL),
(23, 12, 'TEST_001', 'KIỂM THỬ PHẦN MỀM CƠ BẢN', 4, 1, '500000', 'kiem-thu-phan-mem-la-gi-nhung-dieu-can-biet-ve-kiem-thu-phan-mem.jpg', 0, 'Thứ 3-5-7 (18:00 - 21:00)', '2021-12-31 17:00:00', '2022-01-19 15:44:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_province`
--

CREATE TABLE `tbl_province` (
  `id` int(10) NOT NULL,
  `_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_province`
--

INSERT INTO `tbl_province` (`id`, `_name`, `_code`) VALUES
(1, 'An Giang', 'AG'),
(2, 'Bà Rịa Vũng Tàu', 'VT'),
(3, 'Bạc Liêu', 'BL'),
(4, 'Bắc Kạn', 'BK'),
(5, 'Bắc Giang', 'BG'),
(6, 'Bắc Ninh', 'BN'),
(7, 'Bến Tre', 'BTR'),
(8, 'Bình Dương', 'BD'),
(9, 'Bình Định', 'BDD'),
(10, 'Bình Phước', 'BP'),
(11, 'Bình Thuận  ', 'BTH'),
(12, 'Cà Mau', 'CM'),
(13, 'Cao Bằng', 'CB'),
(14, 'Cần Thơ', 'CT'),
(15, 'Đà Nẵng', 'DDN'),
(16, 'Đắk Lắk', 'DDL'),
(17, 'Đắk Nông', 'DNO'),
(18, 'Đồng Nai', 'DNA'),
(19, 'Đồng Tháp', 'DDT'),
(20, 'Điện Biên', 'DDB'),
(21, 'Gia Lai', 'GL'),
(22, 'Hà Giang', 'HG'),
(23, 'Hà Nam', 'HNA'),
(24, 'Hà Nội', 'HN'),
(25, 'Hà Tĩnh', 'HT'),
(26, 'Hải Dương', 'HD'),
(27, 'Hải Phòng', 'HP'),
(28, 'Hòa Bình', 'HB'),
(29, 'Hậu Giang', 'HGI'),
(30, 'Hưng Yên', 'HY'),
(31, 'Hồ Chí Minh', 'SG'),
(32, 'Khánh Hòa', 'KH'),
(33, 'Kiên Giang', 'KG'),
(34, 'Kon Tum', 'KT'),
(35, 'Lai Châu', 'LCH'),
(36, 'Lào Cai', 'LCA'),
(37, 'Lạng Sơn', 'LS'),
(38, 'Lâm Đồng', 'LDD'),
(39, 'Long An', 'LA'),
(40, 'Nam Định', 'NDD'),
(41, 'Nghệ An', 'NA'),
(42, 'Ninh Bình', 'NB'),
(43, 'Ninh Thuận', 'NT'),
(44, 'Phú Thọ', 'PT'),
(45, 'Phú Yên', 'PY'),
(46, 'Quảng Bình', 'QB'),
(47, 'Quảng Nam', 'QNA'),
(48, 'Quảng Ngãi', 'QNG'),
(49, 'Quảng Ninh', 'QNI'),
(50, 'Quảng Trị', 'QT'),
(51, 'Sóc Trăng', 'ST'),
(52, 'Sơn La', 'SL'),
(53, 'Tây Ninh', 'TNI'),
(54, 'Thái Bình', 'TB'),
(55, 'Thái Nguyên', 'TN'),
(56, 'Thanh Hóa', 'TH'),
(57, 'Thừa Thiên Huế', 'TTH'),
(58, 'Tiền Giang', 'TG'),
(59, 'Trà Vinh', 'TV'),
(60, 'Tuyên Quang', 'TQ'),
(61, 'Vĩnh Long', 'VL'),
(62, 'Vĩnh Phúc', 'VP'),
(63, 'Yên Bái', 'YB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` longtext NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(5, 'Slider1', '97c9ef02ff.png', 1),
(6, 'Slider2', '01fed0b8e3.png', 1),
(7, 'Slider3', 'dfda4b56dc.png', 0),
(8, 'Slider4', 'fa439035ff.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacherId` int(11) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `catsubId` int(11) NOT NULL,
  `datebirth` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacherId`, `teacherName`, `catId`, `catsubId`, `datebirth`, `phone`, `email`, `degree`, `image`, `status`) VALUES
(1, 'Nguyễn Văn A', 2, 15, '1990-01-29 17:00:00', '0123456789', 'test@gmail.com', 'Tiến Sĩ', 'team_6.jpg', 1),
(2, 'Nguyễn Văn B', 2, 16, '1990-01-29 17:00:00', '0123456789', 'test@gmail.com', 'Tiến Sĩ', 'team_5.jpg', 1),
(4, 'Hà Anh Dũng', 3, 17, '2021-10-02 18:07:41', '0123456789', 'test@gmail.com', 'Tiến Sĩ', 'team_2.jpg', 1),
(5, 'Lê Văn Khoa', 3, 18, '1989-12-31 17:00:00', '0123456789', 'test@gmail.com', 'Tiến Sĩ', 'team_4.jpg', 1),
(8, 'Test Test', 2, 19, '2000-01-27 17:00:00', '0869321727', 'thanhltham27@gmail.com', 'Tiến Sĩ', 'team_3.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_category_sub`
--
ALTER TABLE `tbl_category_sub`
  ADD PRIMARY KEY (`catsubId`);

--
-- Chỉ mục cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`coursesId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`newsId`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacherId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_category_sub`
--
ALTER TABLE `tbl_category_sub`
  MODIFY `catsubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `coursesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
