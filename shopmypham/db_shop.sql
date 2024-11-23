-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 03:02 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_category`
--

CREATE TABLE `db_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` int(2) NOT NULL,
  `parentid` int(11) NOT NULL,
  `orders` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_category`
--

INSERT INTO `db_category` (`id`, `name`, `link`, `level`, `parentid`, `orders`, `created_at`, `created_by`, `updated_at`, `updated_by`, `trash`, `status`) VALUES
(1, 'Son Kem', 'sonkem', 2, 3, '1', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '75', 1, 1),
(2, 'Son Lỳ', 'sonly', 2, 3, '0', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '1', 1, 1),
(3, 'Son', 'son', 1, 0, '0', '2023-11-05 16:15:39', '4', '2023-11-16 13:55:37', '1', 1, 1),
(4, 'Kem', 'kem', 1, 0, '1', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(5, 'Kem Che Khuyết Điểm', 'kemchekhuyetdiem', 2, 4, '1', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(6, 'Kem Dưỡng', 'kemduong', 1, 4, '0', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(7, 'Kem Nền', 'kemnen', 2, 4, '1', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(8, 'Serum', 'serum', 2, 0, '2', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(9, 'Khác', 'khac', 2, 0, '2', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(10, 'Toner', 'toner', 1, 0, '1', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(11, 'Phấn Phủ', 'phanphu', 2, 14, '0', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(12, 'Phấn Má', 'phanma', 2, 14, '0', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(13, 'Phấn Mắt', 'phanmat', 2, 14, '0', '2023-11-05 16:15:39', '1', '2023-11-05 16:15:39', '1', 1, 1),
(14, 'Phấn', 'phan', 1, 0, '0', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '1', 1, 1),
(15, 'Mặt Nạ', 'matna', 2, 0, '0', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '1', 1, 1),
(16, 'Mặt Nạ Mặt', 'matnamat', 2, 15, '0', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '1', 1, 1),
(17, 'Mặt Nạ Mắt, Môi', 'matnamoi', 1, 15, '0', '2023-11-05 16:15:39', '4', '2023-11-05 16:15:39', '1', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_config`
--

CREATE TABLE `db_config` (
  `id` int(11) NOT NULL,
  `mail_smtp` varchar(68) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail_smtp_password` varchar(100) NOT NULL COMMENT 'Password mail shop',
  `mail_noreply` varchar(68) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `priceShip` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_config`
--

INSERT INTO `db_config` (`id`, `mail_smtp`, `mail_smtp_password`, `mail_noreply`, `priceShip`, `title`, `description`) VALUES
(1, 'tratrinh19623@gmail.com', 'Travip123@', 'tratrinh19623@gmail.com', '30000', 'Website Mỹ Phẩm', 'CHẤT LƯỢNG SỐ 1 VIỆT NAM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `trash` int(11) NOT NULL DEFAULT 1,
  `fullname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_contact`
--

INSERT INTO `db_contact` (`id`, `title`, `phone`, `email`, `content`, `created_at`, `status`, `trash`, `fullname`) VALUES
(1, 'ok', '0979391356', 'teapro0001@gmail.com', 'ok đó', '2023/11/4', 1, 1, 'trà trịnh'),
(2, 'abc', '0981794519', 'tratrinh19623@gmail.com', 'aax', '2023/11/16', 1, 1, 'Trà Trịnh Sơn ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_content`
--

CREATE TABLE `db_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `introtext` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fulltext` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_content`
--

INSERT INTO `db_content` (`id`, `title`, `alias`, `introtext`, `fulltext`, `img`, `created`, `created_by`, `modified`, `modified_by`, `trash`, `status`) VALUES
(13, '     Thế Giới Nước Hoa ra mắt set quà tặng 20-11 độc đáo', 'the-gioi-nuoc-hoa-ra-mat-set-qua-tang-20-11-doc-dao', '    Mừng ngày Phụ nữ Việt Nam 20-11, Thế Giới Nước Hoa ra mắt set quà tặng 3 trong 1 độc đáo, gồm nước hoa, mỹ phẩm và hoa hồng vĩnh cửu, để phái mạnh gửi gắm yêu thương, sự trân quý của mình đến những người phụ nữ thân thương.', '<p>Ng&agrave;y 20-11&nbsp;l&agrave; thời điểm th&iacute;ch hợp để ph&aacute;i mạnh b&agrave;y tỏ t&igrave;nh y&ecirc;u với một nửa quan trọng của m&igrave;nh bằng những m&oacute;n qu&agrave; đầy &yacute; nghĩa.</p>\r\n\r\n<p>B&ecirc;n cạnh những m&oacute;n qu&agrave; phổ biến như hoa, b&aacute;nh&hellip; th&igrave; gần đ&acirc;y, set qu&agrave; tặng của&nbsp;<a href=\"https://localhost/shopmypham\">Thế Giới Nước Hoa</a>&nbsp;được nhiều đấng m&agrave;y r&acirc;u lựa chọn bởi sự thiết thực v&agrave; &yacute; nghĩa gửi gắm trong m&oacute;n qu&agrave;.</p>\r\n\r\n<h2><strong>Qu&agrave; tặng sang trọng, đầy &yacute; nghĩa</strong></h2>\r\n\r\n<p>Sản phẩm kh&ocirc;ng thể thiếu trong c&aacute;c set l&agrave; những chai nước hoa đến từ c&aacute;c thương hiệu nổi tiếng thế giới v&agrave; được ph&acirc;n phối ch&iacute;nh h&atilde;ng tại Thế Giới Nước Hoa. Những chai nước hoa n&agrave;y sẽ gi&uacute;p bạn thể hiện t&igrave;nh cảm y&ecirc;u thương ch&acirc;n th&agrave;nh với những người phụ nữ th&acirc;n y&ecirc;u của m&igrave;nh.</p>\r\n\r\n<p>Điểm nhấn của set qu&agrave; ch&iacute;nh l&agrave; b&ocirc;ng hồng đỏ thắm. Đ&acirc;y l&agrave; hoa hồng tươi nhập khẩu từ Đức, được lựa chọn kỹ c&agrave;ng v&agrave; xử l&yacute; kh&eacute;o l&eacute;o bằng c&ocirc;ng nghệ ướp của Nhật Bản, gi&uacute;p b&ocirc;ng hoa giữ nguy&ecirc;n được vẻ đẹp vốn c&oacute; của m&igrave;nh hơn 3 năm, tượng trưng cho t&igrave;nh y&ecirc;u vĩnh cửu v&agrave; vẻ đẹp trường tồn của ph&aacute;i đẹp.</p>\r\n\r\n<p>L&agrave;m đẹp l&agrave; nhu cầu của mọi phụ nữ v&agrave; c&aacute;c loại mỹ phẩm l&agrave; những &quot;trợ thủ&quot; đắc lực để phục vụ c&ocirc;ng cuộc l&agrave;m đẹp của chị em. Những sản phẩm mỹ phẩm trong combo qu&agrave; tặng l&agrave; kem dưỡng, body care, son đến từ thương hiệu h&agrave;ng đầu được Thế Giới Nước Hoa ph&acirc;n phối độc quyền, gi&uacute;p c&aacute;c c&ocirc; mang lại sự tươi trẻ cho bản th&acirc;n m&igrave;nh.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute; những m&oacute;n qu&agrave; được nhiều chị em phụ nữ th&iacute;ch m&ecirc;, set qu&agrave; tặng c&ograve;n được đặt trong một chiếc hộp chắc chắn, chỉn chu trong từng đường n&eacute;t. Đặc biệt, phần vỏ hộp c&ograve;n được mạ &aacute;nh kim sang trọng, k&egrave;m những lời ch&uacute;c tốt l&agrave;nh gửi đến một nửa thế giới.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; sự độc đ&aacute;o của set qu&agrave; n&agrave;y m&agrave; vừa qua MC Nguy&ecirc;n Khang cũng chọn cho người phụ nữ th&acirc;n thương của m&igrave;nh một combo gồm: Nước hoa, hoa hồng vĩnh cửu, mặt nạ b&ugrave;n kho&aacute;ng v&agrave; d&agrave;nh nhiều lời khen c&oacute; c&aacute;nh cho set qu&agrave; độc quyền của Thế Giới Nước Hoa:&quot;Bộ combo n&agrave;y kh&ocirc;ng những chứa những m&oacute;n qu&agrave; m&agrave; mọi người ai cũng th&iacute;ch m&ecirc; đ&acirc;u, hộp qu&agrave; n&agrave;y c&ograve;n được đựng bằng chiếc hộp m&agrave;u đen rất xịn s&ograve; với một th&ocirc;ng điệp b&ecirc;n ngo&agrave;i thật &yacute; nghĩa v&agrave; ph&ugrave; hợp để l&agrave;m qu&agrave; tặng cho những người phụ nữ th&acirc;n y&ecirc;u&quot;.</p>\r\n\r\n<p><a href=\"https://cdn.tuoitre.vn/471584752817336320/2023/10/17/photo-1697517058572-16975170586471892110030.jpg\" target=\"_blank\"><img alt=\"MC Nguyên Khang hào hứng làm hẳn một video review về set quà độc nhất này\" src=\"https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/17/photo-1697517058572-16975170586471892110030.jpg\" style=\"height:600px; width:800px\" title=\"Thế Giới Nước Hoa ra mắt set quà tặng 20-10 độc đáo - Ảnh 2.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">MC Nguy&ecirc;n Khang h&agrave;o hứng l&agrave;m hẳn một video review về set qu&agrave; độc nhất n&agrave;y</p>\r\n\r\n<p>Kh&ocirc;ng chỉ được những người nổi tiếng lựa chọn l&agrave;m qu&agrave; tặng cho người phụ nữ th&acirc;n thương, m&agrave; set qu&agrave; đẳng cấp của Thế Giới Nước Hoa c&ograve;n được c&aacute;c doanh nghiệp chọn l&agrave;m qu&agrave; cho đối t&aacute;c.</p>\r\n\r\n<p>Chị Yến Phạm (CEO Viet Viet Tourism) chia sẻ: &quot;Chọn được một m&oacute;n qu&agrave; vừa sang trọng v&agrave; tinh tế, Yến đ&atilde; phải t&igrave;m hiểu rất l&acirc;u v&agrave; nay đ&atilde; t&igrave;m thấy combo qu&agrave; tặng của Thế Giới Nước Hoa, rất mong rằng qu&yacute; đối t&aacute;c v&agrave; qu&yacute; kh&aacute;ch h&agrave;ng của Viet Viet Tourism cũng sẽ h&agrave;i l&ograve;ng với combo m&agrave; m&igrave;nh đ&atilde; chọn&quot;.</p>\r\n\r\n<p><a href=\"https://cdn.tuoitre.vn/471584752817336320/2023/10/17/photo-1697517059071-16975170591651350865802.jpg\" target=\"_blank\"><img alt=\"Chị Yến - chủ doanh nghiệp Viet Viet Tourism - đã chọn set quà độc quyền của Thế Giới Nước Hoa làm quà tặng cho đối tác nữ\" src=\"https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/17/photo-1697517059071-16975170591651350865802.jpg\" style=\"height:755px; width:1380px\" title=\"Thế Giới Nước Hoa ra mắt set quà tặng 20-10 độc đáo - Ảnh 3.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Chị Yến - chủ doanh nghiệp Viet Viet Tourism - đ&atilde; chọn set qu&agrave; độc quyền của Thế Giới Nước Hoa l&agrave;m qu&agrave; tặng cho đối t&aacute;c nữ</p>\r\n\r\n<p>Với những set qu&agrave; đặc biệt n&agrave;y, Thế Giới Nước Hoa gửi trọn t&acirc;m huyết với mong muốn chị em phụ nữ sẽ cảm nhận được t&igrave;nh cảm ch&acirc;n th&agrave;nh từ người tặng. Đ&oacute; l&agrave; lời ch&uacute;c &yacute; nghĩa nhất về một cuộc sống đẹp hơn v&igrave; ch&iacute;nh m&igrave;nh v&agrave; trở th&agrave;nh phi&ecirc;n bản đẹp hơn của ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<h2><strong>Ưu đ&atilde;i hấp dẫn</strong></h2>\r\n\r\n<p>Nh&acirc;n dịp ch&agrave;o mừng Ng&agrave;y Nh&agrave; gi&aacute;o&nbsp;Việt Nam 20-11, Thế Giới Nước Hoa tung h&agrave;ng loạt ưu đ&atilde;i hấp dẫn d&agrave;nh tặng kh&aacute;ch h&agrave;ng như:</p>\r\n\r\n<p>- Combo nước hoa mỹ phẩm, hoa hồng vĩnh cửu giảm gi&aacute; sốc đến 50%: Với hơn 300 combo nước hoa, mỹ phẩm c&ugrave;ng hoa hồng vĩnh cửu được kết hợp từ những hương thơm đ&igrave;nh đ&aacute;m đến từ c&aacute;c thương hiệu lớn v&agrave; c&aacute;c si&ecirc;u phẩm skincare, bodycare thiết yếu nhất.</p>\r\n\r\n<p>- Giftset sale: Ưu đ&atilde;i chưa từng c&oacute;, h&agrave;ng loạt giftset best seller 2023 đến từ c&aacute;c thương hiệu đ&igrave;nh đ&aacute;m giảm gi&aacute; đến 30%.</p>\r\n\r\n<p>- Mua 1 tặng 1: &Aacute;p dụng cho tất cả sản phẩm đến từ 2 thương hiệu m&agrave; Thế Giới Nước Hoa đang ph&acirc;n phối độc quyền.</p>\r\n\r\n<p>- Qu&agrave; theo bill: Đặc biệt hơn hết, với đơn h&agrave;ng nguy&ecirc;n gi&aacute; kh&aacute;ch h&agrave;ng c&ograve;n được nhận qu&agrave; tặng hấp dẫn l&ecirc;n đến 3,4 triệu đồng.</p>\r\n\r\n<p>Được th&agrave;nh l&acirc;p từ năm 2007, đến nay, C&ocirc;ng ty Cổ phần Thương mại Thế Giới Nước Hoa &amp; Mỹ Phẩm đ&atilde; trở th&agrave;nh đơn vị ph&acirc;n phối nước hoa ch&iacute;nh h&atilde;ng h&agrave;ng đầu tại Việt Nam với 50 cửa h&agrave;ng tại c&aacute;c th&agrave;nh phố v&agrave; trung t&acirc;m thương mại lớn.</p>\r\n\r\n<p>Địa chỉ: Trường Đại học T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường H&agrave; Nội</p>\r\n\r\n<p>Điện thoại: 123456789</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'pngtree-beauty-beauty-pink-perfume-bottle-image_8648771.jpg', '2023-11-16 13:06:25', '1', '2023-11-16 13:10:44', '1', 1, 1),
(14, 'Việt Nam trở thành \'điểm đến lớn nhất\' của mỹ phẩm Hàn Quốc', 'viet-nam-tro-thanh-diem-den-lon-nhat-cua-my-pham-han-quoc', '', '<h2>&nbsp;</h2>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://cdn.tuoitre.vn/471584752817336320/2023/6/27/k-beauty-16878615609912080721283.jpg\" target=\"_blank\"><img alt=\"Việt Nam trở thành điểm đến lớn nhất của mỹ phẩm Hàn Quốc - Ảnh 1.\" src=\"https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/6/27/k-beauty-16878615609912080721283.jpg\" style=\"height:426px; width:640px\" title=\"Việt Nam trở thành điểm đến lớn nhất của mỹ phẩm Hàn Quốc - Ảnh 1.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Nữ diễn vi&ecirc;n Chi Pu d&ugrave;ng thử một sản phẩm của thương hiệu mỹ phẩm H&agrave;n Quốc Innisfree tại TP.HCM - Ảnh: KOREA HERALD</p>\r\n\r\n<p>B&aacute;o&nbsp;<em>Korea Herald</em>&nbsp;dẫn dữ liệu của Hiệp hội Mỹ phẩm H&agrave;n Quốc được c&ocirc;ng bố h&ocirc;m 26-6 cho thấy Việt Nam hiện đang l&agrave; thị trường &ldquo;m&agrave;u mỡ&rdquo; nhất đối với&nbsp;<a href=\"https://tuoitre.vn/my-pham-han-quoc.html\">mỹ phẩm H&agrave;n Quốc</a>&nbsp;khi lượng mỹ phẩm xuất khẩu sang Việt Nam vẫn đang tăng l&ecirc;n theo cấp số nh&acirc;n.</p>\r\n\r\n<p>Cụ thể, tổng lượng mỹ phẩm H&agrave;n Quốc xuất khẩu sang Việt Nam trong 5 th&aacute;ng đầu năm 2023 tăng 43,4% so với c&ugrave;ng kỳ năm ngo&aacute;i v&agrave; đạt 187,5 triệu USD.</p>\r\n\r\n<p>Xếp sau Việt Nam l&agrave; thị trường Mỹ với mức kim ngạch xuất khẩu đạt 425,1 triệu USD, tăng 25,7% so với c&ugrave;ng kỳ năm ngo&aacute;i. Trong khi đ&oacute;, kim ngạch xuất khẩu của mỹ phẩm H&agrave;n sang Hong Kong đạt 23,8 triệu USD, tăng 16,7%.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, theo số liệu từ Bộ Thương mại Hoa Kỳ cũng cho thấy c&aacute;c sản phẩm l&agrave;m đẹp đến từ H&agrave;n Quốc c&oacute; thị phần lớn nhất tr&ecirc;n thị trường mỹ phẩm nhập khẩu của Việt Nam, chiếm 30% tổng lượng mỹ phẩm nhập khẩu của nước ta.</p>\r\n\r\n<p>Theo sau H&agrave;n Quốc l&agrave;&nbsp;<a href=\"https://tuoitre.vn/lien-minh-chau-au.html\" target=\"_blank\">Li&ecirc;n minh ch&acirc;u &Acirc;u</a>&nbsp;(EU) với 23%, Nhật Bản 17%, Th&aacute;i Lan 13% v&agrave; Mỹ 10%.&nbsp;</p>\r\n\r\n<p>Với mức tăng trưởng nhanh ch&oacute;ng về nhu cầu sử dụng c&aacute;c sản phẩm l&agrave;m đẹp từ H&agrave;n Quốc, c&aacute;c h&atilde;ng mỹ phẩm H&agrave;n hiện xem Việt Nam l&agrave; một thị trường đầy tiềm năng thay thế cho thị trường Trung Quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>91,2% người Việt tham gia khảo s&aacute;t từng mua &iacute;t nhất một m&oacute;n mỹ phẩm H&agrave;n Quốc trong năm</h3>\r\n\r\n<p>Ngo&agrave;i ra, theo một cuộc khảo s&aacute;t do Cơ quan Trao đổi văn h&oacute;a quốc tế H&agrave;n Quốc thực hiện với c&aacute;c ứng vi&ecirc;n từ 15 đến 59 tuổi tại Việt Nam cho thấy c&oacute; đến 91,2% người tham gia trả lời rằng họ đ&atilde; mua &iacute;t nhất một sản phẩm mỹ phẩm H&agrave;n Quốc trong một năm qua.</p>\r\n\r\n<p>Trong khi đ&oacute;, c&oacute; khoảng 68,8% người tham gia trả lời rằng họ thường xuy&ecirc;n mua c&aacute;c&nbsp;<a href=\"https://tuoitre.vn/san-pham-lam-dep.html\" target=\"_blank\">sản phẩm l&agrave;m đẹp</a>&nbsp;của H&agrave;n Quốc.</p>\r\n', 'lovepik-cosmetic-cosmetics-picture_500601676.jpg', '2023-11-16 13:17:43', '1', '2023-11-16 13:17:43', '1', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_customer`
--

CREATE TABLE `db_customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_customer`
--

INSERT INTO `db_customer` (`id`, `fullname`, `username`, `password`, `address`, `phone`, `email`, `created`, `trash`, `status`) VALUES
(3, 'trà trịnh', 'tratrinh1906', 'f3f1c9acf8bcd6ef8bf1c579396cfb0b', '', '0979391357', 'tratrinh19623@gmail.com', '2023-11-16 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_discount`
--

CREATE TABLE `db_discount` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `code` varchar(255) NOT NULL COMMENT 'Mã giảm giá',
  `discount` int(11) NOT NULL COMMENT 'Số tiền',
  `limit_number` int(11) NOT NULL COMMENT 'giới hạn lượt mua',
  `number_used` int(11) NOT NULL COMMENT 'Số lượng đã nhập',
  `expiration_date` date NOT NULL COMMENT 'Ngày hết hạn',
  `payment_limit` int(11) NOT NULL COMMENT 'giới hạn đơn hàng tối thiểu',
  `description` varchar(255) NOT NULL COMMENT 'Mô tả',
  `created` date NOT NULL,
  `orders` int(11) NOT NULL,
  `trash` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_discount`
--

INSERT INTO `db_discount` (`id`, `code`, `discount`, `limit_number`, `number_used`, `expiration_date`, `payment_limit`, `description`, `created`, `orders`, `trash`, `status`) VALUES
(1, 'NOV', 50000, 100, 7, '2024-09-29', 150000, 'Mã Giảm Thêm 50.000VNĐ Cho Mọi Đơn Hàng Từ 0đ Tối Đa 50K Áp Dụng Với Một Số Sản Phẩm Nhất Định', '2023-06-10', 1, 1, 1),
(2, 'TEADZQUA', 150000, 200, 1, '2024-12-26', 100000, 'Giảm 150k', '2023-07-06', 1, 0, 1),
(3, 'TEAPRO', 10000, 10, 0, '2024-02-12', 50000, 'ok', '2023-11-05', 0, 1, 1),
(4, 'TEAPROA', 12000, 9, 0, '2023-11-21', 40000, '01', '2023-11-06', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_district`
--

CREATE TABLE `db_district` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `provinceid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_district`
--

INSERT INTO `db_district` (`id`, `name`, `type`, `provinceid`) VALUES
(1, 'Quận Ba Đình', 'Quận', 1),
(2, 'Quận Hoàn Kiếm', 'Quận', 1),
(3, 'Quận Tây Hồ', 'Quận', 1),
(4, 'Quận Long Biên', 'Quận', 1),
(5, 'Quận Cầu Giấy', 'Quận', 1),
(6, 'Quận Đống Đa', 'Quận', 1),
(7, 'Quận Hai Bà Trưng', 'Quận', 1),
(8, 'Quận Hoàng Mai', 'Quận', 1),
(9, 'Quận Thanh Xuân', 'Quận', 1),
(10, 'Huyện Sóc Sơn', 'Huyện', 1),
(11, 'Huyện Đông Anh', 'Huyện', 1),
(18, 'Huyện Gia Lâm', 'Huyện', 1),
(19, 'Quận Nam Từ Liêm', 'Quận', 1),
(20, 'Huyện Thanh Trì', 'Huyện', 1),
(21, 'Quận Bắc Từ Liêm', 'Quận', 1),
(24, 'Thành phố Hà Giang', 'Thành phố', 2),
(26, 'Huyện Đồng Văn', 'Huyện', 2),
(27, 'Huyện Mèo Vạc', 'Huyện', 2),
(28, 'Huyện Yên Minh', 'Huyện', 2),
(29, 'Huyện Quản Bạ', 'Huyện', 2),
(30, 'Huyện Vị Xuyên', 'Huyện', 2),
(31, 'Huyện Bắc Mê', 'Huyện', 2),
(32, 'Huyện Hoàng Su Phì', 'Huyện', 2),
(33, 'Huyện Xín Mần', 'Huyện', 2),
(34, 'Huyện Bắc Quang', 'Huyện', 2),
(35, 'Huyện Quang Bình', 'Huyện', 2),
(40, 'Thành phố Cao Bằng', 'Thành phố', 4),
(42, 'Huyện Bảo Lâm', 'Huyện', 4),
(43, 'Huyện Bảo Lạc', 'Huyện', 4),
(44, 'Huyện Thông Nông', 'Huyện', 4),
(45, 'Huyện Hà Quảng', 'Huyện', 4),
(46, 'Huyện Trà Lĩnh', 'Huyện', 4),
(47, 'Huyện Trùng Khánh', 'Huyện', 4),
(48, 'Huyện Hạ Lang', 'Huyện', 4),
(49, 'Huyện Quảng Uyên', 'Huyện', 4),
(50, 'Huyện Phục Hoà', 'Huyện', 4),
(51, 'Huyện Hoà An', 'Huyện', 4),
(52, 'Huyện Nguyên Bình', 'Huyện', 4),
(53, 'Huyện Thạch An', 'Huyện', 4),
(58, 'Thành Phố Bắc Kạn', 'Thành phố', 6),
(60, 'Huyện Pác Nặm', 'Huyện', 6),
(61, 'Huyện Ba Bể', 'Huyện', 6),
(62, 'Huyện Ngân Sơn', 'Huyện', 6),
(63, 'Huyện Bạch Thông', 'Huyện', 6),
(64, 'Huyện Chợ Đồn', 'Huyện', 6),
(65, 'Huyện Chợ Mới', 'Huyện', 6),
(66, 'Huyện Na Rì', 'Huyện', 6),
(70, 'Thành phố Tuyên Quang', 'Thành phố', 8),
(71, 'Huyện Lâm Bình', 'Huyện', 8),
(72, 'Huyện Nà Hang', 'Huyện', 8),
(73, 'Huyện Chiêm Hóa', 'Huyện', 8),
(74, 'Huyện Hàm Yên', 'Huyện', 8),
(75, 'Huyện Yên Sơn', 'Huyện', 8),
(76, 'Huyện Sơn Dương', 'Huyện', 8),
(80, 'Thành phố Lào Cai', 'Thành phố', 10),
(82, 'Huyện Bát Xát', 'Huyện', 10),
(83, 'Huyện Mường Khương', 'Huyện', 10),
(84, 'Huyện Si Ma Cai', 'Huyện', 10),
(85, 'Huyện Bắc Hà', 'Huyện', 10),
(86, 'Huyện Bảo Thắng', 'Huyện', 10),
(87, 'Huyện Bảo Yên', 'Huyện', 10),
(88, 'Huyện Sa Pa', 'Huyện', 10),
(89, 'Huyện Văn Bàn', 'Huyện', 10),
(94, 'Thành phố Điện Biên Phủ', 'Thành phố', 11),
(95, 'Thị Xã Mường Lay', 'Thị xã', 11),
(96, 'Huyện Mường Nhé', 'Huyện', 11),
(97, 'Huyện Mường Chà', 'Huyện', 11),
(98, 'Huyện Tủa Chùa', 'Huyện', 11),
(99, 'Huyện Tuần Giáo', 'Huyện', 11),
(100, 'Huyện Điện Biên', 'Huyện', 11),
(101, 'Huyện Điện Biên Đông', 'Huyện', 11),
(102, 'Huyện Mường Ảng', 'Huyện', 11),
(103, 'Huyện Nậm Pồ', 'Huyện', 11),
(105, 'Thành phố Lai Châu', 'Thành phố', 12),
(106, 'Huyện Tam Đường', 'Huyện', 12),
(107, 'Huyện Mường Tè', 'Huyện', 12),
(108, 'Huyện Sìn Hồ', 'Huyện', 12),
(109, 'Huyện Phong Thổ', 'Huyện', 12),
(110, 'Huyện Than Uyên', 'Huyện', 12),
(111, 'Huyện Tân Uyên', 'Huyện', 12),
(112, 'Huyện Nậm Nhùn', 'Huyện', 12),
(116, 'Thành phố Sơn La', 'Thành phố', 14),
(118, 'Huyện Quỳnh Nhai', 'Huyện', 14),
(119, 'Huyện Thuận Châu', 'Huyện', 14),
(120, 'Huyện Mường La', 'Huyện', 14),
(121, 'Huyện Bắc Yên', 'Huyện', 14),
(122, 'Huyện Phù Yên', 'Huyện', 14),
(123, 'Huyện Mộc Châu', 'Huyện', 14),
(124, 'Huyện Yên Châu', 'Huyện', 14),
(125, 'Huyện Mai Sơn', 'Huyện', 14),
(126, 'Huyện Sông Mã', 'Huyện', 14),
(127, 'Huyện Sốp Cộp', 'Huyện', 14),
(128, 'Huyện Vân Hồ', 'Huyện', 14),
(132, 'Thành phố Yên Bái', 'Thành phố', 15),
(133, 'Thị xã Nghĩa Lộ', 'Thị xã', 15),
(135, 'Huyện Lục Yên', 'Huyện', 15),
(136, 'Huyện Văn Yên', 'Huyện', 15),
(137, 'Huyện Mù Căng Chải', 'Huyện', 15),
(138, 'Huyện Trấn Yên', 'Huyện', 15),
(139, 'Huyện Trạm Tấu', 'Huyện', 15),
(140, 'Huyện Văn Chấn', 'Huyện', 15),
(141, 'Huyện Yên Bình', 'Huyện', 15),
(148, 'Thành phố Hòa Bình', 'Thành phố', 17),
(150, 'Huyện Đà Bắc', 'Huyện', 17),
(151, 'Huyện Kỳ Sơn', 'Huyện', 17),
(152, 'Huyện Lương Sơn', 'Huyện', 17),
(153, 'Huyện Kim Bôi', 'Huyện', 17),
(154, 'Huyện Cao Phong', 'Huyện', 17),
(155, 'Huyện Tân Lạc', 'Huyện', 17),
(156, 'Huyện Mai Châu', 'Huyện', 17),
(157, 'Huyện Lạc Sơn', 'Huyện', 17),
(158, 'Huyện Yên Thủy', 'Huyện', 17),
(159, 'Huyện Lạc Thủy', 'Huyện', 17),
(164, 'Thành phố Thái Nguyên', 'Thành phố', 19),
(165, 'Thành phố Sông Công', 'Thành phố', 19),
(167, 'Huyện Định Hóa', 'Huyện', 19),
(168, 'Huyện Phú Lương', 'Huyện', 19),
(169, 'Huyện Đồng Hỷ', 'Huyện', 19),
(170, 'Huyện Võ Nhai', 'Huyện', 19),
(171, 'Huyện Đại Từ', 'Huyện', 19),
(172, 'Thị xã Phổ Yên', 'Thị xã', 19),
(173, 'Huyện Phú Bình', 'Huyện', 19),
(178, 'Thành phố Lạng Sơn', 'Thành phố', 20),
(180, 'Huyện Tràng Định', 'Huyện', 20),
(181, 'Huyện Bình Gia', 'Huyện', 20),
(182, 'Huyện Văn Lãng', 'Huyện', 20),
(183, 'Huyện Cao Lộc', 'Huyện', 20),
(184, 'Huyện Văn Quan', 'Huyện', 20),
(185, 'Huyện Bắc Sơn', 'Huyện', 20),
(186, 'Huyện Hữu Lũng', 'Huyện', 20),
(187, 'Huyện Chi Lăng', 'Huyện', 20),
(188, 'Huyện Lộc Bình', 'Huyện', 20),
(189, 'Huyện Đình Lập', 'Huyện', 20),
(193, 'Thành phố Hạ Long', 'Thành phố', 22),
(194, 'Thành phố Móng Cái', 'Thành phố', 22),
(195, 'Thành phố Cẩm Phả', 'Thành phố', 22),
(196, 'Thành phố Uông Bí', 'Thành phố', 22),
(198, 'Huyện Bình Liêu', 'Huyện', 22),
(199, 'Huyện Tiên Yên', 'Huyện', 22),
(200, 'Huyện Đầm Hà', 'Huyện', 22),
(201, 'Huyện Hải Hà', 'Huyện', 22),
(202, 'Huyện Ba Chẽ', 'Huyện', 22),
(203, 'Huyện Vân Đồn', 'Huyện', 22),
(204, 'Huyện Hoành Bồ', 'Huyện', 22),
(205, 'Thị xã Đông Triều', 'Thị xã', 22),
(206, 'Thị xã Quảng Yên', 'Thị xã', 22),
(207, 'Huyện Cô Tô', 'Huyện', 22),
(213, 'Thành phố Bắc Giang', 'Thành phố', 24),
(215, 'Huyện Yên Thế', 'Huyện', 24),
(216, 'Huyện Tân Yên', 'Huyện', 24),
(217, 'Huyện Lạng Giang', 'Huyện', 24),
(218, 'Huyện Lục Nam', 'Huyện', 24),
(219, 'Huyện Lục Ngạn', 'Huyện', 24),
(220, 'Huyện Sơn Động', 'Huyện', 24),
(221, 'Huyện Yên Dũng', 'Huyện', 24),
(222, 'Huyện Việt Yên', 'Huyện', 24),
(223, 'Huyện Hiệp Hòa', 'Huyện', 24),
(227, 'Thành phố Việt Trì', 'Thành phố', 25),
(228, 'Thị xã Phú Thọ', 'Thị xã', 25),
(230, 'Huyện Đoan Hùng', 'Huyện', 25),
(231, 'Huyện Hạ Hoà', 'Huyện', 25),
(232, 'Huyện Thanh Ba', 'Huyện', 25),
(233, 'Huyện Phù Ninh', 'Huyện', 25),
(234, 'Huyện Yên Lập', 'Huyện', 25),
(235, 'Huyện Cẩm Khê', 'Huyện', 25),
(236, 'Huyện Tam Nông', 'Huyện', 25),
(237, 'Huyện Lâm Thao', 'Huyện', 25),
(238, 'Huyện Thanh Sơn', 'Huyện', 25),
(239, 'Huyện Thanh Thuỷ', 'Huyện', 25),
(240, 'Huyện Tân Sơn', 'Huyện', 25),
(243, 'Thành phố Vĩnh Yên', 'Thành phố', 26),
(244, 'Thị xã Phúc Yên', 'Thị xã', 26),
(246, 'Huyện Lập Thạch', 'Huyện', 26),
(247, 'Huyện Tam Dương', 'Huyện', 26),
(248, 'Huyện Tam Đảo', 'Huyện', 26),
(249, 'Huyện Bình Xuyên', 'Huyện', 26),
(250, 'Huyện Mê Linh', 'Huyện', 1),
(251, 'Huyện Yên Lạc', 'Huyện', 26),
(252, 'Huyện Vĩnh Tường', 'Huyện', 26),
(253, 'Huyện Sông Lô', 'Huyện', 26),
(256, 'Thành phố Bắc Ninh', 'Thành phố', 27),
(258, 'Huyện Yên Phong', 'Huyện', 27),
(259, 'Huyện Quế Võ', 'Huyện', 27),
(260, 'Huyện Tiên Du', 'Huyện', 27),
(261, 'Thị xã Từ Sơn', 'Thị xã', 27),
(262, 'Huyện Thuận Thành', 'Huyện', 27),
(263, 'Huyện Gia Bình', 'Huyện', 27),
(264, 'Huyện Lương Tài', 'Huyện', 27),
(268, 'Quận Hà Đông', 'Quận', 1),
(269, 'Thị xã Sơn Tây', 'Thị xã', 1),
(271, 'Huyện Ba Vì', 'Huyện', 1),
(272, 'Huyện Phúc Thọ', 'Huyện', 1),
(273, 'Huyện Đan Phượng', 'Huyện', 1),
(274, 'Huyện Hoài Đức', 'Huyện', 1),
(275, 'Huyện Quốc Oai', 'Huyện', 1),
(276, 'Huyện Thạch Thất', 'Huyện', 1),
(277, 'Huyện Chương Mỹ', 'Huyện', 1),
(278, 'Huyện Thanh Oai', 'Huyện', 1),
(279, 'Huyện Thường Tín', 'Huyện', 1),
(280, 'Huyện Phú Xuyên', 'Huyện', 1),
(281, 'Huyện Ứng Hòa', 'Huyện', 1),
(282, 'Huyện Mỹ Đức', 'Huyện', 1),
(288, 'Thành phố Hải Dương', 'Thành phố', 30),
(290, 'Thị xã Chí Linh', 'Thị xã', 30),
(291, 'Huyện Nam Sách', 'Huyện', 30),
(292, 'Huyện Kinh Môn', 'Huyện', 30),
(293, 'Huyện Kim Thành', 'Huyện', 30),
(294, 'Huyện Thanh Hà', 'Huyện', 30),
(295, 'Huyện Cẩm Giàng', 'Huyện', 30),
(296, 'Huyện Bình Giang', 'Huyện', 30),
(297, 'Huyện Gia Lộc', 'Huyện', 30),
(298, 'Huyện Tứ Kỳ', 'Huyện', 30),
(299, 'Huyện Ninh Giang', 'Huyện', 30),
(300, 'Huyện Thanh Miện', 'Huyện', 30),
(303, 'Quận Hồng Bàng', 'Quận', 31),
(304, 'Quận Ngô Quyền', 'Quận', 31),
(305, 'Quận Lê Chân', 'Quận', 31),
(306, 'Quận Hải An', 'Quận', 31),
(307, 'Quận Kiến An', 'Quận', 31),
(308, 'Quận Đồ Sơn', 'Quận', 31),
(309, 'Quận Dương Kinh', 'Quận', 31),
(311, 'Huyện Thuỷ Nguyên', 'Huyện', 31),
(312, 'Huyện An Dương', 'Huyện', 31),
(313, 'Huyện An Lão', 'Huyện', 31),
(314, 'Huyện Kiến Thuỵ', 'Huyện', 31),
(315, 'Huyện Tiên Lãng', 'Huyện', 31),
(316, 'Huyện Vĩnh Bảo', 'Huyện', 31),
(317, 'Huyện Cát Hải', 'Huyện', 31),
(318, 'Huyện Bạch Long Vĩ', 'Huyện', 31),
(323, 'Thành phố Hưng Yên', 'Thành phố', 33),
(325, 'Huyện Văn Lâm', 'Huyện', 33),
(326, 'Huyện Văn Giang', 'Huyện', 33),
(327, 'Huyện Yên Mỹ', 'Huyện', 33),
(328, 'Huyện Mỹ Hào', 'Huyện', 33),
(329, 'Huyện Ân Thi', 'Huyện', 33),
(330, 'Huyện Khoái Châu', 'Huyện', 33),
(331, 'Huyện Kim Động', 'Huyện', 33),
(332, 'Huyện Tiên Lữ', 'Huyện', 33),
(333, 'Huyện Phù Cừ', 'Huyện', 33),
(336, 'Thành phố Thái Bình', 'Thành phố', 34),
(338, 'Huyện Quỳnh Phụ', 'Huyện', 34),
(339, 'Huyện Hưng Hà', 'Huyện', 34),
(340, 'Huyện Đông Hưng', 'Huyện', 34),
(341, 'Huyện Thái Thụy', 'Huyện', 34),
(342, 'Huyện Tiền Hải', 'Huyện', 34),
(343, 'Huyện Kiến Xương', 'Huyện', 34),
(344, 'Huyện Vũ Thư', 'Huyện', 34),
(347, 'Thành phố Phủ Lý', 'Thành phố', 35),
(349, 'Huyện Duy Tiên', 'Huyện', 35),
(350, 'Huyện Kim Bảng', 'Huyện', 35),
(351, 'Huyện Thanh Liêm', 'Huyện', 35),
(352, 'Huyện Bình Lục', 'Huyện', 35),
(353, 'Huyện Lý Nhân', 'Huyện', 35),
(356, 'Thành phố Nam Định', 'Thành phố', 36),
(358, 'Huyện Mỹ Lộc', 'Huyện', 36),
(359, 'Huyện Vụ Bản', 'Huyện', 36),
(360, 'Huyện Ý Yên', 'Huyện', 36),
(361, 'Huyện Nghĩa Hưng', 'Huyện', 36),
(362, 'Huyện Nam Trực', 'Huyện', 36),
(363, 'Huyện Trực Ninh', 'Huyện', 36),
(364, 'Huyện Xuân Trường', 'Huyện', 36),
(365, 'Huyện Giao Thủy', 'Huyện', 36),
(366, 'Huyện Hải Hậu', 'Huyện', 36),
(369, 'Thành phố Ninh Bình', 'Thành phố', 37),
(370, 'Thành phố Tam Điệp', 'Thành phố', 37),
(372, 'Huyện Nho Quan', 'Huyện', 37),
(373, 'Huyện Gia Viễn', 'Huyện', 37),
(374, 'Huyện Hoa Lư', 'Huyện', 37),
(375, 'Huyện Yên Khánh', 'Huyện', 37),
(376, 'Huyện Kim Sơn', 'Huyện', 37),
(377, 'Huyện Yên Mô', 'Huyện', 37),
(380, 'Thành phố Thanh Hóa', 'Thành phố', 38),
(381, 'Thị xã Bỉm Sơn', 'Thị xã', 38),
(382, 'Thị xã Sầm Sơn', 'Thị xã', 38),
(384, 'Huyện Mường Lát', 'Huyện', 38),
(385, 'Huyện Quan Hóa', 'Huyện', 38),
(386, 'Huyện Bá Thước', 'Huyện', 38),
(387, 'Huyện Quan Sơn', 'Huyện', 38),
(388, 'Huyện Lang Chánh', 'Huyện', 38),
(389, 'Huyện Ngọc Lặc', 'Huyện', 38),
(390, 'Huyện Cẩm Thủy', 'Huyện', 38),
(391, 'Huyện Thạch Thành', 'Huyện', 38),
(392, 'Huyện Hà Trung', 'Huyện', 38),
(393, 'Huyện Vĩnh Lộc', 'Huyện', 38),
(394, 'Huyện Yên Định', 'Huyện', 38),
(395, 'Huyện Thọ Xuân', 'Huyện', 38),
(396, 'Huyện Thường Xuân', 'Huyện', 38),
(397, 'Huyện Triệu Sơn', 'Huyện', 38),
(398, 'Huyện Thiệu Hóa', 'Huyện', 38),
(399, 'Huyện Hoằng Hóa', 'Huyện', 38),
(400, 'Huyện Hậu Lộc', 'Huyện', 38),
(401, 'Huyện Nga Sơn', 'Huyện', 38),
(402, 'Huyện Như Xuân', 'Huyện', 38),
(403, 'Huyện Như Thanh', 'Huyện', 38),
(404, 'Huyện Nông Cống', 'Huyện', 38),
(405, 'Huyện Đông Sơn', 'Huyện', 38),
(406, 'Huyện Quảng Xương', 'Huyện', 38),
(407, 'Huyện Tĩnh Gia', 'Huyện', 38),
(412, 'Thành phố Vinh', 'Thành phố', 40),
(413, 'Thị xã Cửa Lò', 'Thị xã', 40),
(414, 'Thị xã Thái Hoà', 'Thị xã', 40),
(415, 'Huyện Quế Phong', 'Huyện', 40),
(416, 'Huyện Quỳ Châu', 'Huyện', 40),
(417, 'Huyện Kỳ Sơn', 'Huyện', 40),
(418, 'Huyện Tương Dương', 'Huyện', 40),
(419, 'Huyện Nghĩa Đàn', 'Huyện', 40),
(420, 'Huyện Quỳ Hợp', 'Huyện', 40),
(421, 'Huyện Quỳnh Lưu', 'Huyện', 40),
(422, 'Huyện Con Cuông', 'Huyện', 40),
(423, 'Huyện Tân Kỳ', 'Huyện', 40),
(424, 'Huyện Anh Sơn', 'Huyện', 40),
(425, 'Huyện Diễn Châu', 'Huyện', 40),
(426, 'Huyện Yên Thành', 'Huyện', 40),
(427, 'Huyện Đô Lương', 'Huyện', 40),
(428, 'Huyện Thanh Chương', 'Huyện', 40),
(429, 'Huyện Nghi Lộc', 'Huyện', 40),
(430, 'Huyện Nam Đàn', 'Huyện', 40),
(431, 'Huyện Hưng Nguyên', 'Huyện', 40),
(432, 'Thị xã Hoàng Mai', 'Thị xã', 40),
(436, 'Thành phố Hà Tĩnh', 'Thành phố', 42),
(437, 'Thị xã Hồng Lĩnh', 'Thị xã', 42),
(439, 'Huyện Hương Sơn', 'Huyện', 42),
(440, 'Huyện Đức Thọ', 'Huyện', 42),
(441, 'Huyện Vũ Quang', 'Huyện', 42),
(442, 'Huyện Nghi Xuân', 'Huyện', 42),
(443, 'Huyện Can Lộc', 'Huyện', 42),
(444, 'Huyện Hương Khê', 'Huyện', 42),
(445, 'Huyện Thạch Hà', 'Huyện', 42),
(446, 'Huyện Cẩm Xuyên', 'Huyện', 42),
(447, 'Huyện Kỳ Anh', 'Huyện', 42),
(448, 'Huyện Lộc Hà', 'Huyện', 42),
(449, 'Thị xã Kỳ Anh', 'Thị xã', 42),
(450, 'Thành Phố Đồng Hới', 'Thành phố', 44),
(452, 'Huyện Minh Hóa', 'Huyện', 44),
(453, 'Huyện Tuyên Hóa', 'Huyện', 44),
(454, 'Huyện Quảng Trạch', 'Thị xã', 44),
(455, 'Huyện Bố Trạch', 'Huyện', 44),
(456, 'Huyện Quảng Ninh', 'Huyện', 44),
(457, 'Huyện Lệ Thủy', 'Huyện', 44),
(458, 'Thị xã Ba Đồn', 'Huyện', 44),
(461, 'Thành phố Đông Hà', 'Thành phố', 45),
(462, 'Thị xã Quảng Trị', 'Thị xã', 45),
(464, 'Huyện Vĩnh Linh', 'Huyện', 45),
(465, 'Huyện Hướng Hóa', 'Huyện', 45),
(466, 'Huyện Gio Linh', 'Huyện', 45),
(467, 'Huyện Đa Krông', 'Huyện', 45),
(468, 'Huyện Cam Lộ', 'Huyện', 45),
(469, 'Huyện Triệu Phong', 'Huyện', 45),
(470, 'Huyện Hải Lăng', 'Huyện', 45),
(471, 'Huyện Cồn Cỏ', 'Huyện', 45),
(474, 'Thành phố Huế', 'Thành phố', 46),
(476, 'Huyện Phong Điền', 'Huyện', 46),
(477, 'Huyện Quảng Điền', 'Huyện', 46),
(478, 'Huyện Phú Vang', 'Huyện', 46),
(479, 'Thị xã Hương Thủy', 'Thị xã', 46),
(480, 'Thị xã Hương Trà', 'Thị xã', 46),
(481, 'Huyện A Lưới', 'Huyện', 46),
(482, 'Huyện Phú Lộc', 'Huyện', 46),
(483, 'Huyện Nam Đông', 'Huyện', 46),
(490, 'Quận Liên Chiểu', 'Quận', 48),
(491, 'Quận Thanh Khê', 'Quận', 48),
(492, 'Quận Hải Châu', 'Quận', 48),
(493, 'Quận Sơn Trà', 'Quận', 48),
(494, 'Quận Ngũ Hành Sơn', 'Quận', 48),
(495, 'Quận Cẩm Lệ', 'Quận', 48),
(497, 'Huyện Hòa Vang', 'Huyện', 48),
(498, 'Huyện Hoàng Sa', 'Huyện', 48),
(502, 'Thành phố Tam Kỳ', 'Thành phố', 49),
(503, 'Thành phố Hội An', 'Thành phố', 49),
(504, 'Huyện Tây Giang', 'Huyện', 49),
(505, 'Huyện Đông Giang', 'Huyện', 49),
(506, 'Huyện Đại Lộc', 'Huyện', 49),
(507, 'Thị xã Điện Bàn', 'Thị xã', 49),
(508, 'Huyện Duy Xuyên', 'Huyện', 49),
(509, 'Huyện Quế Sơn', 'Huyện', 49),
(510, 'Huyện Nam Giang', 'Huyện', 49),
(511, 'Huyện Phước Sơn', 'Huyện', 49),
(512, 'Huyện Hiệp Đức', 'Huyện', 49),
(513, 'Huyện Thăng Bình', 'Huyện', 49),
(514, 'Huyện Tiên Phước', 'Huyện', 49),
(515, 'Huyện Bắc Trà My', 'Huyện', 49),
(516, 'Huyện Nam Trà My', 'Huyện', 49),
(517, 'Huyện Núi Thành', 'Huyện', 49),
(518, 'Huyện Phú Ninh', 'Huyện', 49),
(519, 'Huyện Nông Sơn', 'Huyện', 49),
(522, 'Thành phố Quảng Ngãi', 'Thành phố', 51),
(524, 'Huyện Bình Sơn', 'Huyện', 51),
(525, 'Huyện Trà Bồng', 'Huyện', 51),
(526, 'Huyện Tây Trà', 'Huyện', 51),
(527, 'Huyện Sơn Tịnh', 'Huyện', 51),
(528, 'Huyện Tư Nghĩa', 'Huyện', 51),
(529, 'Huyện Sơn Hà', 'Huyện', 51),
(530, 'Huyện Sơn Tây', 'Huyện', 51),
(531, 'Huyện Minh Long', 'Huyện', 51),
(532, 'Huyện Nghĩa Hành', 'Huyện', 51),
(533, 'Huyện Mộ Đức', 'Huyện', 51),
(534, 'Huyện Đức Phổ', 'Huyện', 51),
(535, 'Huyện Ba Tơ', 'Huyện', 51),
(536, 'Huyện Lý Sơn', 'Huyện', 51),
(540, 'Thành phố Qui Nhơn', 'Thành phố', 52),
(542, 'Huyện An Lão', 'Huyện', 52),
(543, 'Huyện Hoài Nhơn', 'Huyện', 52),
(544, 'Huyện Hoài Ân', 'Huyện', 52),
(545, 'Huyện Phù Mỹ', 'Huyện', 52),
(546, 'Huyện Vĩnh Thạnh', 'Huyện', 52),
(547, 'Huyện Tây Sơn', 'Huyện', 52),
(548, 'Huyện Phù Cát', 'Huyện', 52),
(549, 'Thị xã An Nhơn', 'Thị xã', 52),
(550, 'Huyện Tuy Phước', 'Huyện', 52),
(551, 'Huyện Vân Canh', 'Huyện', 52),
(555, 'Thành phố Tuy Hoà', 'Thành phố', 54),
(557, 'Thị xã Sông Cầu', 'Thị xã', 54),
(558, 'Huyện Đồng Xuân', 'Huyện', 54),
(559, 'Huyện Tuy An', 'Huyện', 54),
(560, 'Huyện Sơn Hòa', 'Huyện', 54),
(561, 'Huyện Sông Hinh', 'Huyện', 54),
(562, 'Huyện Tây Hoà', 'Huyện', 54),
(563, 'Huyện Phú Hoà', 'Huyện', 54),
(564, 'Huyện Đông Hòa', 'Huyện', 54),
(568, 'Thành phố Nha Trang', 'Thành phố', 56),
(569, 'Thành phố Cam Ranh', 'Thành phố', 56),
(570, 'Huyện Cam Lâm', 'Huyện', 56),
(571, 'Huyện Vạn Ninh', 'Huyện', 56),
(572, 'Thị xã Ninh Hòa', 'Thị xã', 56),
(573, 'Huyện Khánh Vĩnh', 'Huyện', 56),
(574, 'Huyện Diên Khánh', 'Huyện', 56),
(575, 'Huyện Khánh Sơn', 'Huyện', 56),
(576, 'Huyện Trường Sa', 'Huyện', 56),
(582, 'Thành phố Phan Rang-Tháp Chàm', 'Thành phố', 58),
(584, 'Huyện Bác Ái', 'Huyện', 58),
(585, 'Huyện Ninh Sơn', 'Huyện', 58),
(586, 'Huyện Ninh Hải', 'Huyện', 58),
(587, 'Huyện Ninh Phước', 'Huyện', 58),
(588, 'Huyện Thuận Bắc', 'Huyện', 58),
(589, 'Huyện Thuận Nam', 'Huyện', 58),
(593, 'Thành phố Phan Thiết', 'Thành phố', 60),
(594, 'Thị xã La Gi', 'Thị xã', 60),
(595, 'Huyện Tuy Phong', 'Huyện', 60),
(596, 'Huyện Bắc Bình', 'Huyện', 60),
(597, 'Huyện Hàm Thuận Bắc', 'Huyện', 60),
(598, 'Huyện Hàm Thuận Nam', 'Huyện', 60),
(599, 'Huyện Tánh Linh', 'Huyện', 60),
(600, 'Huyện Đức Linh', 'Huyện', 60),
(601, 'Huyện Hàm Tân', 'Huyện', 60),
(602, 'Huyện Phú Quí', 'Huyện', 60),
(608, 'Thành phố Kon Tum', 'Thành phố', 62),
(610, 'Huyện Đắk Glei', 'Huyện', 62),
(611, 'Huyện Ngọc Hồi', 'Huyện', 62),
(612, 'Huyện Đắk Tô', 'Huyện', 62),
(613, 'Huyện Kon Plông', 'Huyện', 62),
(614, 'Huyện Kon Rẫy', 'Huyện', 62),
(615, 'Huyện Đắk Hà', 'Huyện', 62),
(616, 'Huyện Sa Thầy', 'Huyện', 62),
(617, 'Huyện Tu Mơ Rông', 'Huyện', 62),
(618, 'Huyện Ia H\' Drai', 'Huyện', 62),
(622, 'Thành phố Pleiku', 'Thành phố', 64),
(623, 'Thị xã An Khê', 'Thị xã', 64),
(624, 'Thị xã Ayun Pa', 'Thị xã', 64),
(625, 'Huyện KBang', 'Huyện', 64),
(626, 'Huyện Đăk Đoa', 'Huyện', 64),
(627, 'Huyện Chư Păh', 'Huyện', 64),
(628, 'Huyện Ia Grai', 'Huyện', 64),
(629, 'Huyện Mang Yang', 'Huyện', 64),
(630, 'Huyện Kông Chro', 'Huyện', 64),
(631, 'Huyện Đức Cơ', 'Huyện', 64),
(632, 'Huyện Chư Prông', 'Huyện', 64),
(633, 'Huyện Chư Sê', 'Huyện', 64),
(634, 'Huyện Đăk Pơ', 'Huyện', 64),
(635, 'Huyện Ia Pa', 'Huyện', 64),
(637, 'Huyện Krông Pa', 'Huyện', 64),
(638, 'Huyện Phú Thiện', 'Huyện', 64),
(639, 'Huyện Chư Pưh', 'Huyện', 64),
(643, 'Thành phố Buôn Ma Thuột', 'Thành phố', 66),
(644, 'Thị Xã Buôn Hồ', 'Thị xã', 66),
(645, 'Huyện Ea H\'leo', 'Huyện', 66),
(646, 'Huyện Ea Súp', 'Huyện', 66),
(647, 'Huyện Buôn Đôn', 'Huyện', 66),
(648, 'Huyện Cư M\'gar', 'Huyện', 66),
(649, 'Huyện Krông Búk', 'Huyện', 66),
(650, 'Huyện Krông Năng', 'Huyện', 66),
(651, 'Huyện Ea Kar', 'Huyện', 66),
(652, 'Huyện M\'Đrắk', 'Huyện', 66),
(653, 'Huyện Krông Bông', 'Huyện', 66),
(654, 'Huyện Krông Pắc', 'Huyện', 66),
(655, 'Huyện Krông A Na', 'Huyện', 66),
(656, 'Huyện Lắk', 'Huyện', 66),
(657, 'Huyện Cư Kuin', 'Huyện', 66),
(660, 'Thị xã Gia Nghĩa', 'Thị xã', 67),
(661, 'Huyện Đăk Glong', 'Huyện', 67),
(662, 'Huyện Cư Jút', 'Huyện', 67),
(663, 'Huyện Đắk Mil', 'Huyện', 67),
(664, 'Huyện Krông Nô', 'Huyện', 67),
(665, 'Huyện Đắk Song', 'Huyện', 67),
(666, 'Huyện Đắk R Lấp', 'Huyện', 67),
(667, 'Huyện Tuy Đức', 'Huyện', 67),
(672, 'Thành phố Đà Lạt', 'Thành phố', 68),
(673, 'Thành phố Bảo Lộc', 'Thành phố', 68),
(674, 'Huyện Đam Rông', 'Huyện', 68),
(675, 'Huyện Lạc Dương', 'Huyện', 68),
(676, 'Huyện Lâm Hà', 'Huyện', 68),
(677, 'Huyện Đơn Dương', 'Huyện', 68),
(678, 'Huyện Đức Trọng', 'Huyện', 68),
(679, 'Huyện Di Linh', 'Huyện', 68),
(680, 'Huyện Bảo Lâm', 'Huyện', 68),
(681, 'Huyện Đạ Huoai', 'Huyện', 68),
(682, 'Huyện Đạ Tẻh', 'Huyện', 68),
(683, 'Huyện Cát Tiên', 'Huyện', 68),
(688, 'Thị xã Phước Long', 'Thị xã', 70),
(689, 'Thị xã Đồng Xoài', 'Thị xã', 70),
(690, 'Thị xã Bình Long', 'Thị xã', 70),
(691, 'Huyện Bù Gia Mập', 'Huyện', 70),
(692, 'Huyện Lộc Ninh', 'Huyện', 70),
(693, 'Huyện Bù Đốp', 'Huyện', 70),
(694, 'Huyện Hớn Quản', 'Huyện', 70),
(695, 'Huyện Đồng Phú', 'Huyện', 70),
(696, 'Huyện Bù Đăng', 'Huyện', 70),
(697, 'Huyện Chơn Thành', 'Huyện', 70),
(698, 'Huyện Phú Riềng', 'Huyện', 70),
(703, 'Thành phố Tây Ninh', 'Thành phố', 72),
(705, 'Huyện Tân Biên', 'Huyện', 72),
(706, 'Huyện Tân Châu', 'Huyện', 72),
(707, 'Huyện Dương Minh Châu', 'Huyện', 72),
(708, 'Huyện Châu Thành', 'Huyện', 72),
(709, 'Huyện Hòa Thành', 'Huyện', 72),
(710, 'Huyện Gò Dầu', 'Huyện', 72),
(711, 'Huyện Bến Cầu', 'Huyện', 72),
(712, 'Huyện Trảng Bàng', 'Huyện', 72),
(718, 'Thành phố Thủ Dầu Một', 'Thành phố', 74),
(719, 'Huyện Bàu Bàng', 'Huyện', 74),
(720, 'Huyện Dầu Tiếng', 'Huyện', 74),
(721, 'Thị xã Bến Cát', 'Thị xã', 74),
(722, 'Huyện Phú Giáo', 'Huyện', 74),
(723, 'Thị xã Tân Uyên', 'Thị xã', 74),
(724, 'Thị xã Dĩ An', 'Thị xã', 74),
(725, 'Thị xã Thuận An', 'Thị xã', 74),
(726, 'Huyện Bắc Tân Uyên', 'Huyện', 74),
(731, 'Thành phố Biên Hòa', 'Thành phố', 75),
(732, 'Thị xã Long Khánh', 'Thị xã', 75),
(734, 'Huyện Tân Phú', 'Huyện', 75),
(735, 'Huyện Vĩnh Cửu', 'Huyện', 75),
(736, 'Huyện Định Quán', 'Huyện', 75),
(737, 'Huyện Trảng Bom', 'Huyện', 75),
(738, 'Huyện Thống Nhất', 'Huyện', 75),
(739, 'Huyện Cẩm Mỹ', 'Huyện', 75),
(740, 'Huyện Long Thành', 'Huyện', 75),
(741, 'Huyện Xuân Lộc', 'Huyện', 75),
(742, 'Huyện Nhơn Trạch', 'Huyện', 75),
(747, 'Thành phố Vũng Tàu', 'Thành phố', 77),
(748, 'Thành phố Bà Rịa', 'Thành phố', 77),
(750, 'Huyện Châu Đức', 'Huyện', 77),
(751, 'Huyện Xuyên Mộc', 'Huyện', 77),
(752, 'Huyện Long Điền', 'Huyện', 77),
(753, 'Huyện Đất Đỏ', 'Huyện', 77),
(754, 'Huyện Tân Thành', 'Huyện', 77),
(755, 'Huyện Côn Đảo', 'Huyện', 77),
(760, 'Quận 1', 'Quận', 79),
(761, 'Quận 12', 'Quận', 79),
(762, 'Quận Thủ Đức', 'Quận', 79),
(763, 'Quận 9', 'Quận', 79),
(764, 'Quận Gò Vấp', 'Quận', 79),
(765, 'Quận Bình Thạnh', 'Quận', 79),
(766, 'Quận Tân Bình', 'Quận', 79),
(767, 'Quận Tân Phú', 'Quận', 79),
(768, 'Quận Phú Nhuận', 'Quận', 79),
(769, 'Quận 2', 'Quận', 79),
(770, 'Quận 3', 'Quận', 79),
(771, 'Quận 10', 'Quận', 79),
(772, 'Quận 11', 'Quận', 79),
(773, 'Quận 4', 'Quận', 79),
(774, 'Quận 5', 'Quận', 79),
(775, 'Quận 6', 'Quận', 79),
(776, 'Quận 8', 'Quận', 79),
(777, 'Quận Bình Tân', 'Quận', 79),
(778, 'Quận 7', 'Quận', 79),
(783, 'Huyện Củ Chi', 'Huyện', 79),
(784, 'Huyện Hóc Môn', 'Huyện', 79),
(785, 'Huyện Bình Chánh', 'Huyện', 79),
(786, 'Huyện Nhà Bè', 'Huyện', 79),
(787, 'Huyện Cần Giờ', 'Huyện', 79),
(794, 'Thành phố Tân An', 'Thành phố', 80),
(795, 'Thị xã Kiến Tường', 'Thị xã', 80),
(796, 'Huyện Tân Hưng', 'Huyện', 80),
(797, 'Huyện Vĩnh Hưng', 'Huyện', 80),
(798, 'Huyện Mộc Hóa', 'Huyện', 80),
(799, 'Huyện Tân Thạnh', 'Huyện', 80),
(800, 'Huyện Thạnh Hóa', 'Huyện', 80),
(801, 'Huyện Đức Huệ', 'Huyện', 80),
(802, 'Huyện Đức Hòa', 'Huyện', 80),
(803, 'Huyện Bến Lức', 'Huyện', 80),
(804, 'Huyện Thủ Thừa', 'Huyện', 80),
(805, 'Huyện Tân Trụ', 'Huyện', 80),
(806, 'Huyện Cần Đước', 'Huyện', 80),
(807, 'Huyện Cần Giuộc', 'Huyện', 80),
(808, 'Huyện Châu Thành', 'Huyện', 80),
(815, 'Thành phố Mỹ Tho', 'Thành phố', 82),
(816, 'Thị xã Gò Công', 'Thị xã', 82),
(817, 'Thị xã Cai Lậy', 'Huyện', 82),
(818, 'Huyện Tân Phước', 'Huyện', 82),
(819, 'Huyện Cái Bè', 'Huyện', 82),
(820, 'Huyện Cai Lậy', 'Thị xã', 82),
(821, 'Huyện Châu Thành', 'Huyện', 82),
(822, 'Huyện Chợ Gạo', 'Huyện', 82),
(823, 'Huyện Gò Công Tây', 'Huyện', 82),
(824, 'Huyện Gò Công Đông', 'Huyện', 82),
(825, 'Huyện Tân Phú Đông', 'Huyện', 82),
(829, 'Thành phố Bến Tre', 'Thành phố', 83),
(831, 'Huyện Châu Thành', 'Huyện', 83),
(832, 'Huyện Chợ Lách', 'Huyện', 83),
(833, 'Huyện Mỏ Cày Nam', 'Huyện', 83),
(834, 'Huyện Giồng Trôm', 'Huyện', 83),
(835, 'Huyện Bình Đại', 'Huyện', 83),
(836, 'Huyện Ba Tri', 'Huyện', 83),
(837, 'Huyện Thạnh Phú', 'Huyện', 83),
(838, 'Huyện Mỏ Cày Bắc', 'Huyện', 83),
(842, 'Thành phố Trà Vinh', 'Thành phố', 84),
(844, 'Huyện Càng Long', 'Huyện', 84),
(845, 'Huyện Cầu Kè', 'Huyện', 84),
(846, 'Huyện Tiểu Cần', 'Huyện', 84),
(847, 'Huyện Châu Thành', 'Huyện', 84),
(848, 'Huyện Cầu Ngang', 'Huyện', 84),
(849, 'Huyện Trà Cú', 'Huyện', 84),
(850, 'Huyện Duyên Hải', 'Huyện', 84),
(851, 'Thị xã Duyên Hải', 'Thị xã', 84),
(855, 'Thành phố Vĩnh Long', 'Thành phố', 86),
(857, 'Huyện Long Hồ', 'Huyện', 86),
(858, 'Huyện Mang Thít', 'Huyện', 86),
(859, 'Huyện  Vũng Liêm', 'Huyện', 86),
(860, 'Huyện Tam Bình', 'Huyện', 86),
(861, 'Thị xã Bình Minh', 'Thị xã', 86),
(862, 'Huyện Trà Ôn', 'Huyện', 86),
(863, 'Huyện Bình Tân', 'Huyện', 86),
(866, 'Thành phố Cao Lãnh', 'Thành phố', 87),
(867, 'Thành phố Sa Đéc', 'Thành phố', 87),
(868, 'Thị xã Hồng Ngự', 'Thị xã', 87),
(869, 'Huyện Tân Hồng', 'Huyện', 87),
(870, 'Huyện Hồng Ngự', 'Huyện', 87),
(871, 'Huyện Tam Nông', 'Huyện', 87),
(872, 'Huyện Tháp Mười', 'Huyện', 87),
(873, 'Huyện Cao Lãnh', 'Huyện', 87),
(874, 'Huyện Thanh Bình', 'Huyện', 87),
(875, 'Huyện Lấp Vò', 'Huyện', 87),
(876, 'Huyện Lai Vung', 'Huyện', 87),
(877, 'Huyện Châu Thành', 'Huyện', 87),
(883, 'Thành phố Long Xuyên', 'Thành phố', 89),
(884, 'Thành phố Châu Đốc', 'Thành phố', 89),
(886, 'Huyện An Phú', 'Huyện', 89),
(887, 'Thị xã Tân Châu', 'Thị xã', 89),
(888, 'Huyện Phú Tân', 'Huyện', 89),
(889, 'Huyện Châu Phú', 'Huyện', 89),
(890, 'Huyện Tịnh Biên', 'Huyện', 89),
(891, 'Huyện Tri Tôn', 'Huyện', 89),
(892, 'Huyện Châu Thành', 'Huyện', 89),
(893, 'Huyện Chợ Mới', 'Huyện', 89),
(894, 'Huyện Thoại Sơn', 'Huyện', 89),
(899, 'Thành phố Rạch Giá', 'Thành phố', 91),
(900, 'Thị xã Hà Tiên', 'Thị xã', 91),
(902, 'Huyện Kiên Lương', 'Huyện', 91),
(903, 'Huyện Hòn Đất', 'Huyện', 91),
(904, 'Huyện Tân Hiệp', 'Huyện', 91),
(905, 'Huyện Châu Thành', 'Huyện', 91),
(906, 'Huyện Giồng Riềng', 'Huyện', 91),
(907, 'Huyện Gò Quao', 'Huyện', 91),
(908, 'Huyện An Biên', 'Huyện', 91),
(909, 'Huyện An Minh', 'Huyện', 91),
(910, 'Huyện Vĩnh Thuận', 'Huyện', 91),
(911, 'Huyện Phú Quốc', 'Huyện', 91),
(912, 'Huyện Kiên Hải', 'Huyện', 91),
(913, 'Huyện U Minh Thượng', 'Huyện', 91),
(914, 'Huyện Giang Thành', 'Huyện', 91),
(916, 'Quận Ninh Kiều', 'Quận', 92),
(917, 'Quận Ô Môn', 'Quận', 92),
(918, 'Quận Bình Thuỷ', 'Quận', 92),
(919, 'Quận Cái Răng', 'Quận', 92),
(923, 'Quận Thốt Nốt', 'Quận', 92),
(924, 'Huyện Vĩnh Thạnh', 'Huyện', 92),
(925, 'Huyện Cờ Đỏ', 'Huyện', 92),
(926, 'Huyện Phong Điền', 'Huyện', 92),
(927, 'Huyện Thới Lai', 'Huyện', 92),
(930, 'Thành phố Vị Thanh', 'Thành phố', 93),
(931, 'Thị xã Ngã Bảy', 'Thị xã', 93),
(932, 'Huyện Châu Thành A', 'Huyện', 93),
(933, 'Huyện Châu Thành', 'Huyện', 93),
(934, 'Huyện Phụng Hiệp', 'Huyện', 93),
(935, 'Huyện Vị Thuỷ', 'Huyện', 93),
(936, 'Huyện Long Mỹ', 'Huyện', 93),
(937, 'Thị xã Long Mỹ', 'Thị xã', 93),
(941, 'Thành phố Sóc Trăng', 'Thành phố', 94),
(942, 'Huyện Châu Thành', 'Huyện', 94),
(943, 'Huyện Kế Sách', 'Huyện', 94),
(944, 'Huyện Mỹ Tú', 'Huyện', 94),
(945, 'Huyện Cù Lao Dung', 'Huyện', 94),
(946, 'Huyện Long Phú', 'Huyện', 94),
(947, 'Huyện Mỹ Xuyên', 'Huyện', 94),
(948, 'Thị xã Ngã Năm', 'Thị xã', 94),
(949, 'Huyện Thạnh Trị', 'Huyện', 94),
(950, 'Thị xã Vĩnh Châu', 'Thị xã', 94),
(951, 'Huyện Trần Đề', 'Huyện', 94),
(954, 'Thành phố Bạc Liêu', 'Thành phố', 95),
(956, 'Huyện Hồng Dân', 'Huyện', 95),
(957, 'Huyện Phước Long', 'Huyện', 95),
(958, 'Huyện Vĩnh Lợi', 'Huyện', 95),
(959, 'Thị xã Giá Rai', 'Thị xã', 95),
(960, 'Huyện Đông Hải', 'Huyện', 95),
(961, 'Huyện Hoà Bình', 'Huyện', 95),
(964, 'Thành phố Cà Mau', 'Thành phố', 96),
(966, 'Huyện U Minh', 'Huyện', 96),
(967, 'Huyện Thới Bình', 'Huyện', 96),
(968, 'Huyện Trần Văn Thời', 'Huyện', 96),
(969, 'Huyện Cái Nước', 'Huyện', 96),
(970, 'Huyện Đầm Dơi', 'Huyện', 96),
(971, 'Huyện Năm Căn', 'Huyện', 96),
(972, 'Huyện Phú Tân', 'Huyện', 96),
(973, 'Huyện Ngọc Hiển', 'Huyện', 96);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_order`
--

CREATE TABLE `db_order` (
  `id` int(11) NOT NULL,
  `orderCode` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customerid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `money` int(12) NOT NULL,
  `price_ship` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `province` int(5) NOT NULL,
  `district` int(5) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_order`
--

INSERT INTO `db_order` (`id`, `orderCode`, `customerid`, `orderdate`, `fullname`, `phone`, `money`, `price_ship`, `coupon`, `province`, `district`, `address`, `trash`, `status`) VALUES
(101, 'glsqe7RH', 3, '2023-11-16 16:31:46', 'trà trịnh', '0979391357', 468000, 30000, 0, 1, 10, 'đâ', 1, 2),
(103, 'MeWZT8rC', 3, '2023-11-16 19:07:58', 'trà trịnh', '0979391357', 135000, 30000, 0, 1, 277, 'da', 1, 1),
(104, 'VwChKcP3', 3, '2023-11-16 19:09:00', 'trà trịnh', '0979391357', 230000, 30000, 50000, 1, 271, 'đaad', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_orderdetail`
--

CREATE TABLE `db_orderdetail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `count` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_orderdetail`
--

INSERT INTO `db_orderdetail` (`id`, `orderid`, `productid`, `count`, `price`, `trash`, `status`) VALUES
(128, 101, 4, 2, 219000, 1, 1),
(129, 103, 9, 1, 105000, 1, 1),
(130, 104, 5, 1, 250000, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_producer`
--

CREATE TABLE `db_producer` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `trash` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_producer`
--

INSERT INTO `db_producer` (`id`, `name`, `code`, `keyword`, `created_at`, `created_by`, `modified`, `modified_by`, `status`, `trash`) VALUES
(1, 'NGUYỄN HƯƠNG', 'NGUYENHUONG', 'serum, matna, phan', '2023-11-05 20:24:30', NULL, '2023-11-05 20:24:30', NULL, 1, 1),
(2, 'CAO LY', 'CAOLY', 'kem, son, serum', '2023-11-05 20:24:48', NULL, '2023-11-05 20:24:48', NULL, 1, 1),
(3, 'Gia Bảo', 'GIABAO', 'phan, son', '2023-11-05 20:25:05', NULL, '2023-11-05 20:25:05', NULL, 1, 1),
(4, 'Thái Hiếu', 'THAIHIEU', 'sonkem, matna, serum', '2023-11-05 20:25:34', NULL, '2023-11-10 21:16:08', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_product`
--

CREATE TABLE `db_product` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sortDesc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `producer` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `number_buy` int(11) NOT NULL,
  `sale` int(3) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'HDL',
  `modified` datetime NOT NULL,
  `modified_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'HDL',
  `trash` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1,
  `idcustomer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_product`
--

INSERT INTO `db_product` (`id`, `catid`, `name`, `alias`, `avatar`, `img`, `sortDesc`, `detail`, `producer`, `number`, `number_buy`, `sale`, `price`, `price_sale`, `created`, `created_by`, `modified`, `modified_by`, `trash`, `status`, `idcustomer`) VALUES
(1, 2, 'Son 3CE', 'son-3ce', '3CE.jpg', '3CE.jpg#3CE2.jpg#3CE3.jpg', 'Son Kem Lì 3CE Stylenanda Velvet Lip Tint', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-size:16px\">Son Kem L&igrave; 3CE Stylenanda Cloud Lip Tint 4ml vừa ra mắt đ&atilde; trở n&ecirc;n hot x&igrave;nh xịch nhờ cải tiến từ bao b&igrave; đến chất son v&ocirc; c&ugrave;ng sang chảnh xứng đ&aacute;ng để mọi t&iacute;n đồ son m&ocirc;i mong mỏi chờ đợi bấy l&acirc;u. Cơn sốt nghiện ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n khiến c&aacute;c n&agrave;ng đều mong muốn rinh trọn bộ những em kem k&igrave; chuẩn đẹp, l&ecirc;n m&ocirc;i mịn mướt, giữ m&agrave;u bền l&acirc;u n&agrave;y về để tha hồ thay đổi phong c&aacute;ch trong cả tuần.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-size:16px\"><a href=\"/shopdienthoai/public/upload/images/3ce/3CE2.jpg\"><img alt=\"\" src=\"/shopmypham/public/upload/images/3ce/3CE2.jpg\" style=\"height:250px; width:250px\" /></a>&nbsp;<img alt=\"\" src=\"/shopmypham/public/upload/images/3ce/3CE6.jpg\" style=\"height:250px; width:250px\" /></span></span></p>\r\n', 1, 235, 64, 12, 300000, 250000, '2023-11-05 16:22:43', '4', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(2, 2, 'Son MERZY', 'son-merzy', 'MENZY.jpg', 'MENZY2.jpg#MENZY3.jpg#MENZY4.jpg', 'Son Kem Lì Merzy Cyber Mellow Tint #CM6 Brick Emotion', '<p><img alt=\"\" src=\"/shopmypham/public/upload/images/4ce/anh.jpg\" style=\"border-style:solid; border-width:1px; height:180px; margin:1px; width:270px\" /></p>\r\n', 2, 294, 2, 40, 500000, 300000, '2023-11-06 13:24:53', '1', '2023-11-15 13:14:45', '1', 1, 1, NULL),
(3, 1, 'Lemonade Son Kem Soaring Lip Cream', 'lemonade-son-kem-soaring-lip-cream', '1_317779a7f8744c738fb3cea1d2ae59_7a66c1ac65ed48ab92760950c9a58403_1024x1024.jpg', '328513999_1202716520352561_10577_9ec6cf344d354d1686a9fc56f23ab061_1024x1024.jpg#329006134_1288692471988083_91748_b2848cb07d3449f09e1ef138e2300148_1024x1024.jpg#329228935_6108704232481760_17047_6365d5a0f92e4694a9d50fd49f67e722_1024x1024.jpg', 'Son kem Lemonade Soaring Lip Cream lấy cảm hứng từ những áng mây bồng bềnh và nắng ấm mùa xuân, Lemonade đã nghiên cứu dòng son Soaring với chất son mỏng mịn như mây cùng thiết kế xanh mint tươi mát, chắc chắn là phụ kiện không thể thiếu của các bạn gái Việt.', '<p><strong>Bảng m&agrave;u:</strong></p>\n\n<p><strong>Son kem&nbsp;Lemonade Soaring Lip Cream&nbsp;</strong>c&oacute; 5 m&agrave;u:</p>\n\n<p>&nbsp;</p>\n\n<p><strong>#01 - Đỏ hồng đất&nbsp;</strong>nhẹ nh&agrave;ng, nữ t&iacute;nh ph&ugrave; hợp với mọi tone da</p>\n\n<p><strong>#02 - Đỏ thuần</strong>&nbsp;cổ điển, quyến rũ v&agrave; thần th&aacute;i</p>\n\n<p><strong>#03 - Cam đất&nbsp;</strong>trẻ trung, năng động, tự tin tỏa s&aacute;ng</p>\n\n<p><strong>#04 - N&acirc;u chocolate</strong>&nbsp;c&aacute; t&iacute;nh, nổi bật v&agrave; cuốn h&uacute;t</p>\n\n<p><strong>#05 - Đỏ n&acirc;u đất&nbsp;</strong>quốc d&acirc;n gi&uacute;p t&ocirc;n da v&agrave; trắng răng, &quot;c&acirc;n&quot; mọi layout makeup</p>\n\n<p>&nbsp;</p>\n\n<ul>\n</ul>\n\n<p><strong>C&ocirc;ng dụng:</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Ngay khi chạm m&ocirc;i, son sẽ để lại finish mịn, l&igrave; nhưng si&ecirc;u nhẹ, gần như kh&ocirc;ng c&oacute; cảm gi&aacute;c tr&ecirc;n m&ocirc;i, ho&agrave;n to&agrave;n thoải m&aacute;i kể cả khi sử dụng cả ng&agrave;y. Chất son mướt, mịn, dễ tan tr&ecirc;n m&ocirc;i, c&oacute; thể chồng nhiều lớp m&agrave; kh&ocirc;ng g&acirc;y bết, d&iacute;nh hay v&oacute;n.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\n\n<p><strong>Bảo quản:</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li><strong>Thương hiệu:&nbsp;</strong>Lemonade</li>\n	<li><strong>Xuất xứ:&nbsp;</strong>Việt Nam</li>\n	<li><strong>Nơi sản xuất:&nbsp;</strong>H&agrave;n Quốc</li>\n	<li><strong>Khối lượng:&nbsp;</strong>3.6g</li>\n	<li><strong>Hạn sử dụng:&nbsp;</strong>2<strong>&nbsp;</strong>năm kể từ ng&agrave;y sản xuất.</li>\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\n	<li>Đ&oacute;ng nắp sau khi dụng.&nbsp;</li>\n	<li>Tr&aacute;nh xa &aacute;nh s&aacute;ng mặt trời v&agrave; bảo quản nơi tho&aacute;ng m&aacute;t.&nbsp;</li>\n	<li>Sản phẩm sử dụng tốt nhất trong v&ograve;ng 06 th&aacute;ng kể từ khi mở nắp</li>\n	<li>Lấy một lượng son vừa đủ thoa đều l&ecirc;n m&ocirc;i theo c&aacute;ch bạn th&iacute;ch.&nbsp;</li>\n	<li>C&oacute; thể t&aacute;n ra viễn m&ocirc;i để tạo hiệu ứng m&ocirc;i d&agrave;y hơn&nbsp;.</li>\n	<li>Đợi khoảng 30s cho son set lại tr&ecirc;n m&ocirc;i để đạt được lớp m&agrave;u mịn l&agrave; nhẹ t&ecirc;nh.&nbsp;</li>\n</ul>\n', 4, 50, 0, 20, 199000, 159000, '2023-11-15 13:49:45', '1', '2023-11-15 13:49:45', '1', 1, 1, NULL),
(4, 2, 'Black Rouge Son Thỏi Wearable Velvet Lipstick', 'black-rouge-son-thoi-wearable-velvet-lipstick', '7de72edcd1b47db007095d528bea3983.jpg', '73a8336995c3201d7b8bcc02c21971cc.jpg#untitled_926f8a0e3e5948da86cc832ce6c76659_1024x1024.jpg', 'Son Thỏi Black Rouge Wearable Velvet Lipstick là dòng son mới cải tiến của nhà Black Rouge với bao bì sang trọng, cổ điển cùng chất son mỏng nhẹ, mịn lì, có độ che phủ tốt không gây lộ vân môi hay rãnh môi. Bảng màu son đa dạng giúp đem lại khí chất hoàn toàn riêng biệt, tự tin tỏa sáng với phong cách của bản thân mình.', '<p><strong>Bảng m&agrave;u:</strong>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>WL04 - Cassel Brick</strong>&nbsp;- Sắc đỏ gạch pha ch&uacute;t n&acirc;u đất</li>\r\n	<li><strong>WL05 - Scarlet Brown</strong>&nbsp;- Sắc n&acirc;u trầm rực lửa đam m&ecirc;</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Vỏ son b&aacute;n trong suốt, nh&aacute;m v&agrave; chắc chắn, giữ nguy&ecirc;n cảm gi&aacute;c cổ điển, sang trọng đặc trưng của Signature Black Line.</li>\r\n	<li>Logo v&agrave; k&yacute; hiệu được khắc ch&igrave;m l&ecirc;n thỏi son tạo điểm nhấn độc đ&aacute;o nhưng vẫn giữ n&eacute;t hiện đại, qu&yacute; ph&aacute;i. Ngo&agrave;i ra, đầu thỏi son được thiết kế với độ nghi&ecirc;ng vừa phải, gi&uacute;p bạn thoa son dễ d&agrave;ng hơn</li>\r\n	<li><strong>Ph&acirc;n t&aacute;n sắc tố k&eacute;p: T</strong>ập trung tối đa hiệu quả của độ ph&acirc;n t&aacute;n gi&uacute;p m&agrave;u sắc l&ecirc;n m&ocirc;i r&otilde; r&agrave;ng hơn</li>\r\n	<li><strong>Sliding Fit:&nbsp;</strong>lớp son mỏng nhẹ nhờ c&ocirc;ng thức velvet đặc trưng gi&uacute;p thỏi son dễ d&agrave;ng, nhẹ nh&agrave;ng lướt tr&ecirc;n m&ocirc;i.&nbsp;</li>\r\n	<li><strong>Clear Velvet:&nbsp;</strong>Son l&ecirc;n m&agrave;u chuẩn ngay từ lần lướt đầu ti&ecirc;n, lớp finish c&oacute; độ đ&agrave;n hồi cao, gi&uacute;p bờ m&ocirc;i lu&ocirc;n căng mọng, mềm mịn.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Thoa son nhẹ nh&agrave;ng đều khắp m&ocirc;i cho đến khi h&agrave;i l&ograve;ng với m&agrave;u sắc, để tạo được hiệu ứng m&ocirc;i đầy đặn.&nbsp;</li>\r\n	<li>Nếu bạn chuộng phong c&aacute;ch tự nhi&ecirc;n v&agrave; nhẹ nh&agrave;ng, cũng c&oacute; thể sử dụng son Black Rouge để thoa l&ograve;ng m&ocirc;i, khiến khu&ocirc;n mặt bạn dịu d&agrave;ng v&agrave; duy&ecirc;n d&aacute;ng hơn.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:</strong>&nbsp;Black Rouge</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Nơi sản xuất:</strong>&nbsp;H&agrave;n Quốc</li>\r\n	<li><strong>Khối lượng:</strong>&nbsp;35.8g</li>\r\n	<li><strong>Hạn sử dụng:</strong>&nbsp;Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 3, 16, 3, 35, 338000, 219000, '2023-11-15 13:59:57', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(5, 2, 'Loreal Son lì CR Slim Matte Intense', 'loreal-son-li-cr-slim-matte-intense', 'abc.jpg', '820c58cb800610e0da825be03cebc81d.jpg#b51ccbd95ffe8f39b894fb680a8db682.jpg#0998f0845742036f01550387c06fb645.jpg', 'Son mịn lì cao cấp Color Riche Intense Volume Matte cao cấp với thiết kế thanh lịch cùng đầu son vát cong mềm mại mang đến cho bạn hơi thở của sự sang trọng Chất son mịn lì với hiệu ứng nhung mịn, lâu trôi lướt trên môi nhẹ nhàng. Dòng son còn được bổ sung thêm Hyaluronic Acid giúp khóa ẩm, cho đôi môi mềm căng mướt cả ngày dài', '<p><strong>Bảng m&agrave;u:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>#129 I LEAD: Cam Đỏ Đất&nbsp;</strong></li>\r\n	<li><strong>#275 LA TERRA ATTITUDE: Cam Ch&aacute;y&nbsp;</strong></li>\r\n	<li><strong>#276 LE LEATHER LIBERATED: N&acirc;u Gạch&nbsp;</strong></li>\r\n	<li><strong>#339 LE WOOD BRULANT: N&acirc;u Đỏ</strong></li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Hiệu ứng nhung mịn- l&igrave; - nhẹ t&ecirc;nh - m&agrave;u l&ecirc;n chuẩn, chỉ sau 1 lần lướt tr&ecirc;n m&ocirc;i. C&ugrave;ng với c&aacute;c m&agrave;u son t&ocirc;n da ngay tức th&igrave; m&agrave; kh&ocirc;ng cần trang điểm cầu kỳ chuy&ecirc;n nghiệp.&nbsp;</li>\r\n	<li>Color Riche Intense Volume Matte - cho sắc mặt bạn bừng s&aacute;ng chỉ sau 1 lần lướt nhẹ son, mang đến thần th&aacute;i thời thượng &amp; trẻ trung&nbsp;</li>\r\n	<li>Thiết kế thanh lịch, sang trọng, son Color Riche Intense Volume Matte sẽ l&agrave; m&oacute;n đồ trang điểm &amp; phụ kiện kh&ocirc;ng thể thiếu của bạn khi ra đi ra đường</li>\r\n	<li>Chất son mềm, mượt, hiệu ứng nhung mịn kh&ocirc;ng để lộ v&acirc;n m&ocirc;i&nbsp;</li>\r\n	<li>M&ocirc;i mềm căng mướt, kh&ocirc;ng g&acirc;y nứt m&ocirc;i&nbsp;</li>\r\n	<li>L&ecirc;n m&agrave;u chuẩn, độ bền m&agrave;u cao&nbsp;</li>\r\n	<li>M&agrave;u sắc trendy, ph&ugrave; hợp l&agrave;n da Ch&acirc;u &Aacute;</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Dimethicone, Bis-diglyceryl Polyacyladipate-2, Hydrogenated Polyisobutene, Phenyl Trimethicone, Tridecyl Trimellitate, Ozokerite, Hydrogenated Jojoba Oil, Dimethicone Crosspolymer, Isostearyl Isostearate, Kaolin, Isohexadecane, Vinyl Dimethicone / methicone Silsesquioxane Crosspolymer, Nylon-12, Alumina, Polyethylene, Silica, Calcium Sodium Borosilicate, Synthetic Fluorphlogopite, Calcium Aluminum Borosilicate, Geraniol, Aluminum Hydroxide, Bht, Magnesium Silicate, Benzyl Alcohol, Tocopheryl Acetate, Camellia Oleifera Seed Oil, Rosa Canina Fruit Oil, Hexyl Cinnamal, Hydroxycitronellal, Tin Oxide, Methyl-2-octynoate, Tocopherol, Propylene Glycol, Propyl Gallate, Citric Acid, Parfum / Fragrance..</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>D&ugrave;ng cọ lấy son hoặc d&ugrave;ng thỏi son thoa trực tiếp l&ecirc;n m&ocirc;i. Bắt đầu từ giữa m&ocirc;i t&ocirc; ra hai b&ecirc;n.&nbsp;</li>\r\n	<li>T&ocirc; trong đường viền m&ocirc;i hoặc theo &yacute; th&iacute;ch để đạt hiệu quả trang điểm mong muốn.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Bảo quản:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.&nbsp;</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.&nbsp;</li>\r\n	<li>Đ&oacute;ng nắp sau khi sử dụng.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>L&#39;Oreal Paris</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>Ph&aacute;p</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>Trung<strong>&nbsp;</strong>Quốc</li>\r\n	<li><strong>Dung t&iacute;ch</strong>: 1.8ml</li>\r\n	<li><strong>Hạn sử dụng:&nbsp;</strong>3 năm kể từ ng&agrave;y sản xuất.&nbsp;</li>\r\n	<li><strong>Ng&agrave;y sản xuất:</strong>&nbsp;Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 3, 10, 0, 25, 330000, 250000, '2023-11-15 14:07:24', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(6, 7, '3CE Kem nền B.B Cream #Back to baby', '3ce-kem-nen-b-b-cream-back-to-baby', '9fdb347a3288b85ded62535975d489e7.png', 'untitled-3-11_4746be02ef384f40b58cb803f15ce5a1_grande.png#32cbff80692a6dbfe4d45d94a9cdad91_3f4214d4688947e892e1292eed2251e8_1024x1024.jpg', 'Kem nền 3CE Back To Baby BB Cream SPF35 PA++ là kem nền đa chức năng với nhiều công dụng như vừa làm kem nền, vừa có khả năng chống nắng dưỡng da hiệu quả, chỉ có một tông màu nhưng phù hợp với mọi tông da. Mang lại lớp nền mỏng nhẹ tự nhiên được che phủ hoàn hảo, cùng chỉ số chống nắng SPF35 PA++ giúp chống nắng bảo vệ da khỏi tác hại từ môi trường bên ngoài.', '<p><strong>Loại da ph&ugrave; hợp:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ph&ugrave; hợp với mọi loại da.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Kết cấu kem nền dạng BB Cream&nbsp;</strong>mỏng nhẹ tự nhi&ecirc;n c&oacute; độ che phủ tốt gi&uacute;p che phủ khuyết điểm hiệu quả, l&agrave;m mờ vết th&acirc;m v&agrave; c&acirc;n chỉnh t&ocirc;ng da.</li>\r\n	<li><strong>Tạo hiệu ứng da căng mềm</strong>, mịn m&agrave;ng kh&ocirc;ng t&igrave; vết.</li>\r\n	<li><strong>Hỗ trợ dưỡng ẩm</strong>&nbsp;v&agrave;&nbsp;chống l&atilde;o h&oacute;a cho da.</li>\r\n	<li><strong>Chỉ số chống nắng cao&nbsp;SPF35 PA++</strong>&nbsp;gi&uacute;p bảo vệ da khỏi t&aacute;c hại từ m&ocirc;i trường b&ecirc;n ngo&agrave;i.</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần chi tiết:</strong></p>\r\n\r\n<p>Water, Cyclopentasiloxane, Titanium Dioxide (Ci 77891), Cyclohexasiloxane, Ethylhexyl Methoxycinnamate, Butylene Glycol, Phenyl Trimethicone, Dicaprylyl Carbonate, Butylene Glycol Dicaprylate/Dicaprate, PEG-10 Dimethicone, Zinc Oxide (Ci 77947), Niacinamide, Sodium Chloride, Cyclomethicone, Pearl Powder, Amethyst Powder, Tourmaline, Diamond Powder, Portulaca Oleracea Extract, Glycerin, Disteardimonium Hectorite, Pentylene Glycol, Glyceryl Behenate/Eicosadioate, Sorbitan Isostearate, Cetyl PEG/PPG-10/1 Dimethicone, Trimethylsiloxysilicate, Methyl Methacrylate Crosspolymer, Dimethicone Crosspolymer, Aluminum Hydroxide, Stearic Acid, Triethoxycaprylylsilane, Acrylates/Dimethicone Copolymer, Dimethicone, Ethylhexylglycerin, Adenosine, Sodium Hyaluronate, Disodium EDTA, Phenoxyethanol, Methylparaben, Fragrance(Parfum), Iron Oxides (Ci 77492),Iron Oxides (Ci 77491),Iron Oxides (Ci 77499).</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Cho một lượng sản phẩm bằng hạt đậu nhỏ, chấm đều l&ecirc;n năm điểm tr&aacute;n, mũi, hai m&aacute;, cằm .</li>\r\n	<li>Sau đ&oacute; d&ugrave;ng tay, m&uacute;t hoặc chổi đ&aacute;nh kem nền t&aacute;n đều khắp mặt để c&oacute; một lớp nền ho&agrave;n hảo.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\r\n	<li>Đ&oacute;ng nắp sau khi sử dụng.</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>3CE</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Dung t&iacute;ch:&nbsp;</strong>30ml</li>\r\n	<li><strong>Hạn sử dụng:&nbsp;</strong>3 năm kể từ ng&agrave;y sản xuất.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 4, 23, 0, 20, 380000, 304000, '2023-11-15 14:11:33', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(7, 5, 'Maybelline Fit Concealer Camouflant', 'maybelline-fit-concealer-camouflant', 'aecdc4c1fe338fcbf1d978bb48490e27.png', '47082916_2385943888087074_163266_a50c8d0f1b644ead86e14e451e570798_1024x1024.png#che-khuyet-diem-min-li-fit-me-ma_0bea2f8f81f84457bf99079ad248a60b_1024x1024.jpg#maybelline_1-07_715081bca90b4a0788c944e09870cc01_grande.png', 'Maybelline Fit Me Concealer Camouflant là kem che khuyết điểm kinh điển luôn nằm trong top những sản phẩm best seller của Maybelline. Với kết cấu dạng lỏng, nhiều tông màu, độ che phủ khá cao nhưng chất kem lại vô cùng mỏng mịn, dễ dàng tán đều và bám vào da, che giấu tất cả những khuyết điểm khiến bạn không hài lòng trên gương mặt. ', '<p><strong>Bảng m&agrave;u:</strong></p>\n\n<ul>\n	<li><strong>#10 Light Leger</strong></li>\n	<li><strong>#15 Fair Clair</strong></li>\n	<li><strong>#20 Sand Sable</strong></li>\n	<li><strong>#25 Medium Moyen</strong></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Loại da ph&ugrave; hợp:</strong></p>\n\n<ul>\n	<li>Ph&ugrave; hợp cho mọi loại da, ngay cả da nhạy cảm.</li>\n</ul>\n\n<p><strong>C&ocirc;ng dụng:</strong></p>\n\n<ul>\n	<li><strong>Kết cấu dạng lỏng, nhiểu t&ocirc;ng m&agrave;u, độ che phủ kh&aacute; cao</strong>&nbsp;nhưng chất kem lại v&ocirc; c&ugrave;ng mỏng mịn, dễ d&agrave;ng t&aacute;n đều v&agrave; b&aacute;m v&agrave;o da.</li>\n	<li><strong>Che những khuyết điểm như mụn, vết n&aacute;m, t&agrave;n nhang, hay những nếp nhăn v&agrave; quầng th&acirc;m tr&ecirc;n đ&ocirc;i mắt.</strong></li>\n	<li><strong>C&ocirc;ng thức kh&ocirc;ng dầu, kh&ocirc;ng hương liệu,</strong>&nbsp;đ&atilde; được c&aacute;c b&aacute;c sĩ da liễu kiểm nghiệm c&oacute; thể&nbsp;&nbsp;sử dụng cho da nhạy cảm v&agrave; da dầu, mụn.</li>\n	<li><strong>Che khuyết điểm tr&ecirc;n da v&ocirc; c&ugrave;ng tự nhi&ecirc;n</strong>, kh&ocirc;ng dầy cộp, kh&ocirc;ng g&acirc;y hằn.</li>\n</ul>\n\n<p><strong>Th&agrave;nh phần:</strong></p>\n\n<ul>\n	<li>G852443 2 Aqua/Water/Eau, Cyclopentasiloxane, Hydrogenated Polyisobutene, Sorbitan Isostearate, Glycerin, Propylene Glycol, Titanium Dioxide, Cera Microcristallina/Microcrystalline Wax/Cire &#39;Microcristalline Phenoxyethanol Magnesium Sulfate, Disodium Stearoyl Glutamate, Disteardimonium Hectorite, Methylparaben, Acrylonitrile/Methyl Methacrylate/Vinylidene Chloride Copolymer, Aluminum Hydroxide, Paraffin, Alumina, Stearic Acid, Butylparaben, &iexcl;Tocopherol, Isobutane, Polyethylene, Tin Oxide, Chamomilla Recutita Flower Extract/Matricaria Flower Extract (+/- May Contan/Peut Contenr: Ci 77891/Titanium Dioxide, Ci 77491, Ci 77492, Ci 77499/Iron Oxides, Mca]</li>\n</ul>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<ul>\n	<li>D&ugrave;ng một lượng kem th&iacute;ch hợp l&ecirc;n v&ugrave;ng da c&oacute; khuyết điểm, d&ugrave;ng ng&oacute;n tay miết nhẹ, tản đều kem để tạo lớp che khuyết điểm mỏng mịn thật tự nhi&ecirc;n.</li>\n	<li>C&oacute; thể t&aacute;n nhiều lớp để đạt đến hiệu quả che phủ bạn mong muốn.</li>\n	<li>\n	<p><strong>Bảo quản:</strong></p>\n	</li>\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\n	<li>\n	<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\n	</li>\n	<li><strong>Thương hiệu:</strong>&nbsp;Maybelline</li>\n	<li><strong>Xuất xứ:</strong>&nbsp;Mỹ&nbsp;</li>\n	<li><strong>Nơi sản xuất:</strong>&nbsp;Trung Quốc</li>\n	<li><strong>Dung t&iacute;ch:&nbsp;</strong>6.8ml</li>\n	<li><strong>Hạn sử dụng:&nbsp;</strong>3 năm kể từ ng&agrave;y sản xuất.</li>\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\n	<li>&nbsp;</li>\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\n	<li>Đậy nắp k&iacute;n sau khi sử dụng.</li>\n</ul>\n', 2, 10, 0, 25, 168000, 126000, '2023-11-15 14:23:54', '1', '2023-11-15 14:23:54', '1', 1, 1, NULL),
(8, 6, 'Cocoon Bơ Dưỡng Thể Cà Phê Đak Lak Coffee Body Butter 200ml', 'cocoon-bo-duong-the-ca-phe-dak-lak-coffee-body-butter-200ml', '37059259c201c40f1e51082d17a0f6b7.jpg', 'e8fdeeba8f4ec7c7278bd3b1d0a38aa4.jpg#cocoon-2__2__9deacdd0aca74146899e41903d034803_1024x1024.jpg', 'Bơ dưỡng thể cà phê The Cocoon Dak Lak Coffee Body Butter sự kết hợp của 3 thành phần chính là dầu cà phê Dak Lak, dầu mù u và bơ cacao là giải pháp cấp ẩm chuyên sâu cho làn da khô sần, thiếu mềm mịn. Kết cấu bơ mềm mịn giàu độ ẩm nhanh chóng mang lại làn da ẩm mịn.', '<p><strong>Loại da ph&ugrave; hợp:</strong></p>\r\n\r\n<ul>\r\n	<li>Ph&ugrave; hợp với mọi loại da.</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Dầu c&agrave; ph&ecirc;&nbsp;</strong>c&oacute; khả năng<strong>&nbsp;phục hồi được độ ẩm&nbsp;</strong>,đặc biệt trong dầu c&agrave; ph&ecirc; c&ograve;n&nbsp;chứa gi&agrave;u h&agrave;m lượng vitamin E v&agrave;&nbsp;hoạt chất Cafein&nbsp;<strong>gi&uacute;p chống oxy h&oacute;a, l&agrave;m đều m&agrave;u da v&agrave; mang đến sự tươi mới cho l&agrave;n da.</strong></li>\r\n	<li><strong>Dầu m&ugrave; u&nbsp;</strong>cấp ẩm cho da, chống lại t&aacute;c hại từ c&aacute;c gốc tự do.&nbsp;</li>\r\n	<li><strong>Hỗ trợ tăng cường sản xuất Collagen, Elastin v&agrave;&nbsp;Glycosaminoglyca</strong>&nbsp;gi&uacute;p t&aacute;i tạo l&agrave;n da trở n&ecirc;n đ&agrave;n hồi v&agrave; cải thiện c&aacute;c vết rạn da hiệu quả.&nbsp;</li>\r\n	<li>B<strong>ơ cacao&nbsp;</strong>giữ ẩm cao, l&agrave;m mềm mịn da v&agrave; cải thiện c&aacute;c vết chai sần ở c&aacute;c v&ugrave;ng da như đầu gối, v&ugrave;ng da khủy tay, g&oacute;t ch&acirc;n,...</li>\r\n	<li><strong>Niacinamide</strong>&nbsp;gi&uacute;p&nbsp;giảm sự h&igrave;nh th&agrave;nh c&aacute;c sắc tố melanin g&acirc;y sỉn m&agrave;u, th&acirc;m n&aacute;m gi&uacute;p da cải thiện t&ocirc;ng da s&aacute;ng mịn&nbsp;hơn</li>\r\n	<li><strong>Kết cấu dạng bơ, đặc mịn, gi&agrave;u độ ẩm</strong>, tạo cảm gi&aacute;c mượt m&agrave; để dễ d&agrave;ng massage tr&ecirc;n da.</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Aqua/Water, Caprylic/Capric Triglyceride, Glyceryl Stearate, Cetearyl Alcohol, C10-18 Triglycerides, Ceteareth-20, Ceteareth-12, Glycerin, Dicaprylyl Carbonate, Cetyl Palmitate, Cyclopentasiloxane, Coffea Arabica (Coffee) Seed Oil, Calophyllum Inophyllum Seed Oil, Theobroma Cacao (Cocoa) Seed Butter, Behenyl Alcohol, Niacinamide, Butyrospermum Parkii (Shea) Butter, Pentylene Glycol, Cetyl Alcohol, Macadamia Ternifolia Seed Oil, Carthamus Tinctorius (Safflower) Seed Oil, C15-19 Alkane, Tocopherol, Dimethiconol, Hydroxyethyl Acrylate/Sodium Acryloyldimethyl Taurate Copolymer, Xanthan Gum, BHT, Ethylhexylglycerin, Parfum, Trisodium Ethylenediamine Disuccinate, Phenoxyethanol, Caramel, Lactic Acid.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Thoa đều l&ecirc;n cơ thể, m&aacute;t-xa nhẹ nh&agrave;ng theo chuyển động tr&ograve;n.</li>\r\n	<li>N&ecirc;n sử dụng khi da ẩm để đạt hiệu quả tối ưu.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Đậy nắp k&iacute;n sau khi sử dụng.</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>Cocoon</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>Việt Nam</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>Việt Nam&nbsp;</li>\r\n	<li><strong>Dung t&iacute;ch:</strong>&nbsp;200ml</li>\r\n	<li><strong>Hạn sử dụng:</strong>&nbsp;3 năm kể từ ng&agrave;y sản xuất.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:</strong>&nbsp;Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 1, 11, 0, 0, 215000, 215000, '2023-11-15 14:30:59', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(9, 16, 'Anumi Mặt nạ giấy Bio-Cellulose Intensive Treatment Mask 25ml', 'anumi-mat-na-giay-bio-cellulose-intensive-treatment-mask-25ml', '3d9d312cff619e8a2255f967b6db30ef.png', 'db6a8689faaa2bfc761fc2c41b2fe12a.png', 'Mặt nạ giấy Anumi Bio-Cellulose Intensive Treatment Mask là dòng mặt nạ giấy tinh chất được chiết xuất từ các thành phần tự nhiên quý hiếm như: Tuyết Liên, Nhân sâm, Chiết Xuất Hoa Nghệ Tây, Hoa Loa Lily Trắng kết hợp cùng Acetyl Heptapeptide-8 tạo nên nhiều công dụng tuyệt vời cho làn da.', '<p><strong>Loại da ph&ugrave; hợp:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Ph&ugrave; hợp với mọi loại da.</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>C&aacute;c đặc t&iacute;nh của<strong>&nbsp;sợi Cellulose sinh học</strong>&nbsp;gi&uacute;p da tăng khả năng thẩm thấu c&aacute;c hoạt chất v&agrave; dinh dưỡng.</li>\r\n	<li><strong>Mặt nạ Anumi Bio-cellulose</strong>&nbsp;gi&uacute;p vận chuyển c&aacute;c hợp chất dinh dưỡng đến lớp hạ b&igrave; của da, từ đ&oacute; l&agrave;m sạch v&agrave; dưỡng s&acirc;u.</li>\r\n	<li>Mặt nạ&nbsp;<strong>&quot;Bio-cellulose Intensive Treatment Mask (Anti-ageing)&quot;</strong>&nbsp;gi&uacute;p cải thiện&nbsp;độ đ&agrave;n hồi của da, c&aacute;c nếp nhăn.</li>\r\n	<li><strong>Bio-cellulose Intensive Treatment Mask (Anti-ageing)&quot;</strong>&nbsp;với 98% th&agrave;nh phần thuần chay v&agrave; kh&ocirc;ng thử nghiệm tr&ecirc;n động vật.</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nước (Purified Water), Propylene Glycol, Glycerin, Glyceryl Acrylate/Acrylic Acid Copolymer, Chiết Xuất Nha Đam (Aloe Barbadensis Leaf Extract), Acetyl Hexapeptide-8, 1, 2-Hexanediol, Chiết Xuất L&uacute;a M&igrave; Triticum Vulgare (Wheat Gluten), Caprylyl Glycol, Protein L&uacute;a M&igrave; Thủy Ph&acirc;n (Hydrolyzed Wheat Protein), Protein Đậu N&agrave;nh Thủy Ph&acirc;n (Hydrolyzed Soy Protein), Chiết Xuất R&ecirc;u Ireland Chondrus Crispus (Carrageenan Extract), Chiết Xuất Hoa Nghệ T&acirc;y (Saffron) Crocus Sativus (Crocus Flower Extract), Chiết Xuất Nấm Men (Yeast Extract), Chiết Xuất Tuyết Li&ecirc;n Saussurea Involucrata (Snow Lotus Extract), Chiết Xuất Hoa Loa K&egrave;n Trắng Lilium Candidum (Madonna Lily Flower Extract), Chiết Xuất Rễ Nh&acirc;n S&acirc;m (Panax Ginseng Root Extract), Xanthan Gum, Acacia Senegal (Acacia) Gum, Pectin, Serine, Arginine, Proline, Glucose, Butylene Glycol, Beta-Glucan, Diazolidinyl Urea, Iodopropynyl Butylcarbamate, Sodium Hyaluronate, Allantoin. (*98% từ nguồn gốc thực vật tự nhi&ecirc;n).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>L&agrave;m sạch da mặt bằng sữa rửa mặt dịu nhẹ. Rửa sạch bằng nước ấm sau đ&oacute; thoa toner.</li>\r\n	<li>Đắp mặt nạ xung quanh mặt v&agrave; để trong 15-20 ph&uacute;t.</li>\r\n	<li>Sau đ&oacute; xoa b&oacute;p nhẹ l&ecirc;n mặt trong 5-10 ph&uacute;t để c&aacute;c dưỡng chất thẩm thấu s&acirc;u v&agrave;o da v&agrave; rửa sạch lại bằng nước.</li>\r\n	<li>&Aacute;p dụng một hoặc hai lần một tuần.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi tho&aacute;ng m&aacute;t v&agrave; tr&aacute;nh xa tầm tay trẻ em.</li>\r\n	<li>Tr&aacute;nh để sản phẩm tiếp x&uacute;c trực tiếp dưới &aacute;nh nắng mặt trời. N&ecirc;n để trong ngăn m&aacute;t tủ lạnh để tăng cảm gi&aacute;c khi trải nghiệm.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>Anumi</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>&Uacute;c</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>&Uacute;c</li>\r\n	<li><strong>Dung t&iacute;ch:</strong>&nbsp;25ml</li>\r\n	<li><strong>Hạn sử dụng:&nbsp;</strong>3 năm kể từ ng&agrave;y sản xuất.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 4, 10, 0, 30, 150000, 105000, '2023-11-15 15:03:01', '1', '2023-11-15 15:03:01', '1', 1, 1, NULL),
(10, 13, '3CE Phấn mắt Multi Eye Color Palate', '3ce-phan-mat-multi-eye-color-palate', 'untitled-3-09_1c0dd6dc0843409abc1623cd31adf419_1024x1024.png', 'untitled-3-08_fba53a0bb1ab4bce899dd80ab2a3e4f8_1024x1024.png#180813-allnighter_40__c2c3219d0763437890e083eff2ef175a_1024x1024.png#17f87ae850a285b13b52b733cd146465_f856b19fb901485598836c2e77d3ebfd_1024x1024.png', 'Phấn mắt 3CE Multi Eye Color Palate với những tone màu nhẹ nhàng theo hơi hướng vintage rất phù hợp với phong cách make up đơn giản mỗi ngày. Mỗi bảng phấn mắt chứa tới 9 ô màu đa dạng, dễ sử dụng, có thể kết hợp với nhau tùy thích để cho ra đời những màu mắt ấn tượng và độc đáo nhất.', '<p><strong>Bảng m&agrave;u:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>#All Nighter</strong>: Gồm 9 &ocirc; nhũ đủ tone tươi s&aacute;ng đến trầm ấm dịu nhẹ.</li>\r\n	<li><strong>#Dry Bouquet</strong>: Gồm 9 &ocirc; l&igrave; mang tone hồng đất chủ đạo.</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất phấn ho&agrave;n hảo</strong>&nbsp;với những hạt phấn li ti si&ecirc;u nhỏ, si&ecirc;u mềm mịn, ho&agrave;n kh&ocirc;ng kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng nề khi apply l&ecirc;n mắt.&nbsp;</li>\r\n	<li><strong>Khả năng l&ecirc;n m&agrave;u cực tốt,</strong>&nbsp;b&aacute;m m&agrave;u cực l&acirc;u - l&ecirc;n đến 24 giờ đồng hồ. Bạn c&oacute; thể thoải m&aacute;i hoạt động l&agrave;m việc cả ng&agrave;y m&agrave; kh&ocirc;ng cần dặm lại phấn.</li>\r\n	<li><strong>Bảng phấn mắt gồm 9 tone m&agrave;u đa dạng:&nbsp;</strong>đủ tone từ tươi s&aacute;ng đến trầm ấm dịu nhẹ, kh&ocirc;ng k&eacute;n tone da v&agrave; cực dễ phối hợp với nhiều&nbsp; phong c&aacute;ch trang điểm kh&aacute;c nhau, thỏa th&iacute;ch cho bạn g&aacute;i tỏa s&aacute;ng dịp thu đ&ocirc;ng n&agrave;y.</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần chi tiết:</strong></p>\r\n\r\n<p>Mica, Nylon-12, Ethylhexylglycerin, Hydrogen Dimethicone, Methicone, Iron Oxides(CI 77492), Boron, Hydrogen Dimethicone, Calcium Titanium Borosilicate, Octyldodecyl Stearoyl Stearate, Diisostearyl Malate, Vinyl Dimethicone/ Methicone, Silsesquioxane, Crosspolymer, Nitride, Dimethicone, Vinyl Dimethicone/ Methicone Silsesquioxane Crosspolymer, Isostearylneopentanoate, Talc, Boron Nitride, Dipentaerythrityl Hexahydroxystearate/ Hexastearate/&nbsp;Hexarosinate, Hexyl Laurate, Hexyl Laurate, Glyceryl Caprylate, Isostearyl neopentanoate, Phenyl Trimethicone, Octyldodecyl Stearoyl Stearate, Glyceryl Caprylate, Iron Oxides(CI 77491), Dipentaerythrityl Hexahydroxystearate/ Hexastearate/ Hexarosinate, Tin Oxide, Titanium Dioxide, Phenyl Trimethicone, IronOxides (CI77491), Iron Oxides (CI 77499), TitaniumDioxide, Diisostearyl Malate.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Sử dụng kem l&oacute;t mắt để phấn mắt b&aacute;m l&acirc;u v&agrave; l&ecirc;n m&agrave;u r&otilde; hơn.</li>\r\n	<li>D&ugrave;ng cọ chuy&ecirc;n dụng đ&aacute;nh m&agrave;u mắt từ giữa bầu m&iacute; mắt sang m&iacute; kho&eacute; mắt, d&agrave;i xuống đu&ocirc;i mắt. Sau đ&oacute; t&aacute;n đều m&agrave;u mắt l&ecirc;n qua m&iacute; mắt v&agrave; một lớp nhẹ dưới mi mắt để tạo điểm nhấn v&agrave; chiều s&acirc;u cho mắt, bạn cần phủ một lớp phấn n&acirc;u theo khối chữ V ở đu&ocirc;i mắt.</li>\r\n	<li>C&oacute; thể sử dụng một hoặc phối nhiều m&agrave;u t&ugrave;y th&iacute;ch để tạo n&ecirc;n độ đậm nhạt cho mắt.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\r\n	<li>Đ&oacute;ng nắp sau khi sử dụng.</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>3CE</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Khối lượng:&nbsp;</strong>8.5g</li>\r\n	<li><strong>Hạn sử dụng:</strong>&nbsp;3 năm kể từ ng&agrave;y sản xuất.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 2, 23, 0, 20, 780000, 624000, '2023-11-15 15:06:13', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(11, 12, '3CE [toiletpaper] Phấn má 3CE face blush', '3ce-toiletpaper-phan-ma-3ce-face-blush', '3ce__toiletpaper__phan_ma_3ce_face_blush__3__a2f6b0c38e0446548b3fa0c22e7cb910.jpg', '3ce__toiletpaper__phan_ma_3ce_face_blush__3__a2f6b0c38e0446548b3fa0c22e7cb910.jpg#3ce__toiletpaper__phan_ma_3ce_face_blush__4__393a53b1b9f74bf8a8c3cd7cc6a69332_1024x1024.jpg#3ce-28_4f3eaa32716c4bd2ae63482ce05e50dc_grande.jpg', 'Phấn má 3CE Face Blush là má hồng thuộc thương hiệu 3CE với kết cấu phấn mềm mịn cùng bảng màu tông ấm hài hòa, tươi tắn tạo điểm nhấn cho gương mặt bạn thêm rạng rỡ, đáng yêu tỏa sáng thu hút mọi ánh nhìn.', '<p><strong>M&agrave;u sắc:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>#Fig Dive -&nbsp;</strong>Vải hồng</li>\r\n	<li><strong>#Rose Beige -&nbsp;</strong>Cam hồng đất</li>\r\n</ul>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Thiết kế hộp phấn h&igrave;nh bắt mắt, m&agrave;u sắc mới lạ.</li>\r\n	<li>Kết cấu phấn dạng n&eacute;n với chất phấn mềm mịn, kh&ocirc;ng bị bột, kh&ocirc;ng g&acirc;y v&oacute;n cục v&agrave; cực k&igrave; dễ t&aacute;n.</li>\r\n	<li>Độ b&aacute;m m&agrave;u tốt, l&acirc;u tr&ocirc;i, giữ m&agrave;u l&acirc;u trong thời gian d&agrave;i.</li>\r\n	<li>Bảng m&agrave;u phấn m&aacute; bao gồm những t&ocirc;ng m&agrave;u pastel nhẹ nh&agrave;ng, tươi tắn, c&oacute; thể ph&ugrave; hợp với mọi tone da, gi&uacute;p đ&ocirc;i g&ograve; m&aacute; ửng hồng rạng rỡ, th&iacute;ch hợp cho make up đi học, đi l&agrave;m, đi chơi.</li>\r\n</ul>\r\n\r\n<p><strong>Th&agrave;nh phần chi tiết:</strong></p>\r\n\r\n<p>Talc, Mica (CI 77019), Octyldodecyl Stearoyl Stearate, Phenyl Trimethicone, Silica, Titanium Dioxide (CI 77891), Nylon-12, Magnesium Myristate, Magnesium Stearate, Dầu hạt Macadamia Ternifolia, Propanediol, HDI/Trimethylol Hexyllactone Crosspolymer, Dimethicone, Lauroyl Lysine, Hydrogenated Lecithin, Triethoxycaprylylsilane, Methicone, Oxit sắt (CI 77491), Oxit sắt (CI 77499), Carmine (CI 75470), Oxit sắt (CI 77492), Yellow 5 Lake (CI 19140)</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>D&ugrave;ng cọ nhẹ nh&agrave;ng thoa một lượng phấn nhỏ l&ecirc;n g&ograve; m&aacute;.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\r\n	<li>Đ&oacute;ng nắp sau khi sử dụng.</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>3CE</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>H&agrave;n Quốc</li>\r\n	<li><strong>Khối lượng:&nbsp;</strong>5.5g</li>\r\n	<li><strong>Hạn sử dụng:&nbsp;</strong>36 th&aacute;ng kể từ khi sản xuất, 24 th&aacute;ng sau khi mở nắp.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 1, 2, 0, 20, 400000, 320000, '2023-11-15 15:10:17', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL),
(12, 9, 'Adiva White Thực phẩm bảo vệ sức khoẻ 60 viên', 'adiva-white-thuc-pham-bao-ve-suc-khoe-60-vien', '1.png', '2.jpg#3.jpg#4.jpg', 'Thực phẩm bảo vệ sức khoẻ ADIVA WHITE với sự kết hợp giữa Glutathione cùng bộ dưỡng chất kế thừa 50 năm bí quyết làm đẹp của phụ nữ Nhật mang đến khả năng khử các gốc tự do, làm mờ các đốm tối màu, các vết thâm nám trên da. ', '<p><strong>Đối tượng&nbsp;ph&ugrave; hợp:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Nam nữ từ 18 tuổi trở l&ecirc;n.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000551679/file/129140156_1759429727555838_75380_80497913bf284e1ab9e90bcdd2ce3dc8_grande.png\" /></p>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Bổ sung&nbsp;<strong>Glutathione</strong>&nbsp;&ndash; ph&acirc;n tử c&oacute; vai tr&ograve; quan trọng trong việc hạn chế c&aacute;c gốc tự do, kết hợp c&ugrave;ng bộ dưỡng chất kế thừa 50 năm của phụ nữ Nhật sẽ k&iacute;ch th&iacute;ch qu&aacute; tr&igrave;nh ngăn chặn l&atilde;o ho&aacute; diễn ra mạnh mẽ hơn, gi&uacute;p da trắng s&aacute;ng từ trong ra ngo&agrave;i.</li>\r\n	<li>Vitamin D3, E, C, B3, B6, B12 tăng cường sức khoẻ của l&agrave;n da, hỗ trợ khả năng tự vệ của da dưới &aacute;nh nắng mặt trời v&agrave; t&aacute;c hại của tia UV.</li>\r\n	<li>L&agrave;m mờ những đốm sậm m&agrave;u tr&ecirc;n da, bổ trợ khả năng giảm t&agrave;n nhang vượt trội.</li>\r\n	<li>Th&agrave;nh phần Zn trong Vi&ecirc;n uống trắng da ADIVA White sẽ hạn chế mụn v&agrave; vết th&acirc;m mụn.</li>\r\n	<li><strong>* Sản phẩm kh&ocirc;ng phải l&agrave; thuốc v&agrave; kh&ocirc;ng c&oacute; t&aacute;c dụng thay thế thuốc chữa bệnh.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Uống 2 vi&ecirc;n mỗi ng&agrave;y, uống sau khi ăn.</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000551679/file/thuc_pham_bao_ve_suc_khoe__1__4353f1d8e6d34568baf3d0df1a33c24c_grande.png\" /></p>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<ul>\r\n	<li>Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng trực tiếp.</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng số sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thương hiệu:&nbsp;</strong>ADIVA</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>Việt Nam</li>\r\n	<li><strong>Nơi sản xuất:&nbsp;</strong>Việt Nam</li>\r\n	<li><strong>Số&nbsp;lượng:</strong>&nbsp;60 vi&ecirc;n</li>\r\n	<li><strong>Hạn sử dụng:&nbsp;</strong>24 th&aacute;ng&nbsp;kể từ ng&agrave;y sản xuất.</li>\r\n	<li><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem tr&ecirc;n bao b&igrave; sản phẩm.</li>\r\n</ul>\r\n', 3, 15, 1, 35, 643000, 418000, '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00', '1', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_province`
--

CREATE TABLE `db_province` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `db_province`
--

INSERT INTO `db_province` (`id`, `name`, `type`) VALUES
(1, 'Thành phố Hà Nội', 'Thành phố Trung ương'),
(2, 'Tỉnh Hà Giang', 'Tỉnh'),
(4, 'Tỉnh Cao Bằng', 'Tỉnh'),
(6, 'Tỉnh Bắc Kạn', 'Tỉnh'),
(8, 'Tỉnh Tuyên Quang', 'Tỉnh'),
(10, 'Tỉnh Lào Cai', 'Tỉnh'),
(11, 'Tỉnh Điện Biên', 'Tỉnh'),
(12, 'Tỉnh Lai Châu', 'Tỉnh'),
(14, 'Tỉnh Sơn La', 'Tỉnh'),
(15, 'Tỉnh Yên Bái', 'Tỉnh'),
(17, 'Tỉnh Hoà Bình', 'Tỉnh'),
(19, 'Tỉnh Thái Nguyên', 'Tỉnh'),
(20, 'Tỉnh Lạng Sơn', 'Tỉnh'),
(22, 'Tỉnh Quảng Ninh', 'Tỉnh'),
(24, 'Tỉnh Bắc Giang', 'Tỉnh'),
(25, 'Tỉnh Phú Thọ', 'Tỉnh'),
(26, 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
(27, 'Tỉnh Bắc Ninh', 'Tỉnh'),
(30, 'Tỉnh Hải Dương', 'Tỉnh'),
(31, 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
(33, 'Tỉnh Hưng Yên', 'Tỉnh'),
(34, 'Tỉnh Thái Bình', 'Tỉnh'),
(35, 'Tỉnh Hà Nam', 'Tỉnh'),
(36, 'Tỉnh Nam Định', 'Tỉnh'),
(37, 'Tỉnh Ninh Bình', 'Tỉnh'),
(38, 'Tỉnh Thanh Hóa', 'Tỉnh'),
(40, 'Tỉnh Nghệ An', 'Tỉnh'),
(42, 'Tỉnh Hà Tĩnh', 'Tỉnh'),
(44, 'Tỉnh Quảng Bình', 'Tỉnh'),
(45, 'Tỉnh Quảng Trị', 'Tỉnh'),
(46, 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
(48, 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
(49, 'Tỉnh Quảng Nam', 'Tỉnh'),
(51, 'Tỉnh Quảng Ngãi', 'Tỉnh'),
(52, 'Tỉnh Bình Định', 'Tỉnh'),
(54, 'Tỉnh Phú Yên', 'Tỉnh'),
(56, 'Tỉnh Khánh Hòa', 'Tỉnh'),
(58, 'Tỉnh Ninh Thuận', 'Tỉnh'),
(60, 'Tỉnh Bình Thuận', 'Tỉnh'),
(62, 'Tỉnh Kon Tum', 'Tỉnh'),
(64, 'Tỉnh Gia Lai', 'Tỉnh'),
(66, 'Tỉnh Đắk Lắk', 'Tỉnh'),
(67, 'Tỉnh Đắk Nông', 'Tỉnh'),
(68, 'Tỉnh Lâm Đồng', 'Tỉnh'),
(70, 'Tỉnh Bình Phước', 'Tỉnh'),
(72, 'Tỉnh Tây Ninh', 'Tỉnh'),
(74, 'Tỉnh Bình Dương', 'Tỉnh'),
(75, 'Tỉnh Đồng Nai', 'Tỉnh'),
(77, 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
(80, 'Tỉnh Long An', 'Tỉnh'),
(82, 'Tỉnh Tiền Giang', 'Tỉnh'),
(83, 'Tỉnh Bến Tre', 'Tỉnh'),
(84, 'Tỉnh Trà Vinh', 'Tỉnh'),
(86, 'Tỉnh Vĩnh Long', 'Tỉnh'),
(87, 'Tỉnh Đồng Tháp', 'Tỉnh'),
(89, 'Tỉnh An Giang', 'Tỉnh'),
(91, 'Tỉnh Kiên Giang', 'Tỉnh'),
(92, 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
(93, 'Tỉnh Hậu Giang', 'Tỉnh'),
(94, 'Tỉnh Sóc Trăng', 'Tỉnh'),
(95, 'Tỉnh Bạc Liêu', 'Tỉnh'),
(96, 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_slider`
--

CREATE TABLE `db_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Supper Admin',
  `modified` datetime NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Supper Admin',
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_slider`
--

INSERT INTO `db_slider` (`id`, `name`, `link`, `img`, `created`, `created_by`, `modified`, `modified_by`, `trash`, `status`) VALUES
(1, 'banner1', 'banner1', 'xsmaxbanner.png', '2023-11-06 00:45:35', '1', '2023-11-06 00:45:42', '', 1, 1),
(2, 'banner2', 'banner2', 'xsmaxbanner1.png', '2023-11-06 00:50:50', '1', '2023-11-06 00:50:50', '1', 1, 1),
(3, 'banner3', 'banner3', 'xsmaxbanner2.png', '2023-11-06 00:51:01', '1', '2023-11-06 00:51:01', '1', 1, 1),
(4, 'gif', 'gif', 'banner0.gif', '2023-11-06 00:52:45', '1', '2023-11-06 00:52:45', '1', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_user`
--

INSERT INTO `db_user` (`id`, `fullname`, `username`, `password`, `role`, `email`, `gender`, `phone`, `address`, `img`, `created`, `trash`, `status`) VALUES
(1, 'ADMIN TeaPro', 'admin', '1d4b416aa50788a5be5d5cdaa9a74c9fc0f4ffdd', 1, 'tratrinh19623@gmail.com', 1, '0981794519', 'Hà Nội', '1e2ed2b48751d56c0f79cf6a3771d894.jpg', '2019-04-23 09:16:16', 1, 1),
(12, 'Gia Bảo', 'giabao', 'fa07afa65caeaf636e71671fd59ce813504ff73f', 2, 'bg@gmail.com', 0, '0123456789', 'HN', '1165b1d310b56bb099d51f5305c7180e.jpg', '2023-11-16 15:33:44', 1, 1),
(13, 'Thái Hiếu', 'thaihieu', '117f47ea418655ca200908124e86a8367538f8a5', 2, 'th@gmail.com', 0, '09873163414', 'Hanoi', '8b83524304c2fb6941149639148a9819.jpg', '2023-11-16 20:58:08', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_usergroup`
--

CREATE TABLE `db_usergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `access` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_usergroup`
--

INSERT INTO `db_usergroup` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `trash`, `access`, `status`) VALUES
(1, 'Toàn Quyền', '2019-05-14 23:29:15', 1, '2019-05-14 23:29:15', 4, 1, 1, 1),
(2, 'Nhân Viên', '2019-05-14 23:29:21', 1, '2019-05-14 23:29:21', 4, 1, 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_category`
--
ALTER TABLE `db_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_config`
--
ALTER TABLE `db_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_content`
--
ALTER TABLE `db_content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_customer`
--
ALTER TABLE `db_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_discount`
--
ALTER TABLE `db_discount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_district`
--
ALTER TABLE `db_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matp` (`provinceid`);

--
-- Chỉ mục cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `province` (`province`),
  ADD KEY `district` (`district`),
  ADD KEY `province_2` (`province`),
  ADD KEY `district_2` (`district`),
  ADD KEY `province_3` (`province`),
  ADD KEY `district_3` (`district`);

--
-- Chỉ mục cho bảng `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `orderid` (`orderid`);

--
-- Chỉ mục cho bảng `db_producer`
--
ALTER TABLE `db_producer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer` (`producer`),
  ADD KEY `catid` (`catid`);

--
-- Chỉ mục cho bảng `db_province`
--
ALTER TABLE `db_province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_slider`
--
ALTER TABLE `db_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Chỉ mục cho bảng `db_usergroup`
--
ALTER TABLE `db_usergroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_category`
--
ALTER TABLE `db_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `db_config`
--
ALTER TABLE `db_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_content`
--
ALTER TABLE `db_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `db_customer`
--
ALTER TABLE `db_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `db_discount`
--
ALTER TABLE `db_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `db_order`
--
ALTER TABLE `db_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `db_producer`
--
ALTER TABLE `db_producer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_product`
--
ALTER TABLE `db_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `db_slider`
--
ALTER TABLE `db_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `db_usergroup`
--
ALTER TABLE `db_usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_district`
--
ALTER TABLE `db_district`
  ADD CONSTRAINT `db_district_ibfk_1` FOREIGN KEY (`provinceid`) REFERENCES `db_province` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD CONSTRAINT `db_order_ibfk_2` FOREIGN KEY (`province`) REFERENCES `db_province` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_order_ibfk_3` FOREIGN KEY (`district`) REFERENCES `db_district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_order_ibfk_4` FOREIGN KEY (`customerid`) REFERENCES `db_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  ADD CONSTRAINT `db_orderdetail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `db_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_orderdetail_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `db_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_product`
--
ALTER TABLE `db_product`
  ADD CONSTRAINT `db_product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `db_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_user`
--
ALTER TABLE `db_user`
  ADD CONSTRAINT `db_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `db_usergroup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
