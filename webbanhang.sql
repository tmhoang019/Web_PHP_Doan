-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idHD` int(10) NOT NULL,
  `idSP` int(10) NOT NULL,
  `Soluong` int(10) NOT NULL,
  `Dongia` int(10) NOT NULL,
  `Thanhtien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idHD`, `idSP`, `Soluong`, `Dongia`, `Thanhtien`) VALUES
(1, 1, 3, 0, 0),
(1, 2, 2, 0, 0),
(2, 1, 1, 0, 0),
(2, 2, 1, 0, 0),
(3, 3, 1, 25000, 25000),
(3, 1, 2, 35000, 70000),
(3, 5, 1, 35000, 35000),
(4, 1, 1, 35000, 35000),
(4, 5, 1, 35000, 35000),
(5, 1, 1, 35000, 35000),
(5, 2, 1, 15000, 15000),
(6, 1, 1, 35000, 35000),
(6, 5, 1, 35000, 35000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idHD` int(10) NOT NULL,
  `idKH` int(10) NOT NULL,
  `Tongtien` int(10) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` int(20) NOT NULL,
  `Ghichu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idHD`, `idKH`, `Tongtien`, `Ngaydat`, `Diachi`, `SDT`, `Ghichu`, `tinhtrang`) VALUES
(1, 1, 1000000, '2021-02-11', '239 iuwhiq', 918331089, 'Cần gắp', 1),
(2, 2, 1000000, '2020-12-10', '311 Hùng Vương', 918331089, 'Không cần gắp', 1),
(3, 1, 130000, '2021-05-10', '231 Nguyễn Trãi', 123456789, '', 1),
(4, 1, 70000, '2021-05-11', '231 Nguyễn Trãi', 123456789, '', 1),
(5, 1, 50000, '2021-05-11', '231 Nguyễn Trãi', 123456789, '', 0),
(6, 7, 70000, '2021-05-13', '123 ABC', 123456789, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `idloai` int(5) NOT NULL,
  `tenloai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`idloai`, `tenloai`) VALUES
(1, 'Món Chính'),
(2, 'Tráng Miệng & Nước Uống'),
(3, 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri_match` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_update` int(10) NOT NULL,
  `group_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `uri_match`, `last_update`, `group_id`) VALUES
(1, 'Danh sách sản phẩm', '\\/admin\\.php\\?page-layout=danhsach-product$', 1618924819, 1),
(2, 'Thêm sản phẩm', '\\/admin\\.php\\?page-layout=product-add&id=\\d+$', 1618924819, 1),
(3, 'Sửa sản phẩm', '\\/admin\\.php\\?page-layout=product-change&id=\\d+$', 1618924819, 1),
(4, 'Xóa sản phẩm', '\\/admin\\.php\\?page-layout=product-delete&id=\\d+$', 1618924819, 1),
(5, 'Danh sách hóa đơn', '\\/admin\\.php\\?page-layout=danhsach-bill$', 1618924819, 2),
(7, 'Sửa hóa đơn', '\\/admin\\.php\\?page-layout=bill-change&id=\\d+$', 1618924819, 2),
(8, 'Xóa hóa đơn', '\\/admin\\.php\\?page-layout=bill-delete&id=\\d+$', 1618924819, 2),
(10, 'Danh sách nhân viên', '\\/admin\\.php\\?page-layout=danhsach-nhanvien$', 1618924819, 3),
(11, 'Thêm nhân viên', '\\/admin\\.php\\?page-layout=member-add&id=\\d+$', 1618924819, 3),
(13, 'Sửa nhân viên', '\\/admin\\.php\\?page-layout=member-change&id=\\d+$', 1618924819, 3),
(14, 'Xóa nhân viên', '\\/admin\\.php\\?page-layout=member-delete&id=\\d+$', 1618924819, 3),
(16, 'Danh sách tài khoản', '\\/admin\\.php\\?page-layout=danhsach-account$', 1618924819, 3),
(17, 'Phân quyền', '\\/admin\\.php\\?page-layout=phanquyen&id=\\d+$', 1618924819, 3),
(18, 'Xem thống kê', '\\/admin\\.php\\?page-layout=thongke$', 61531753, 4),
(19, 'Danh sách khách hàng', '\\/admin\\.php\\?page-layout=danhsach-user$', 161892489, 3),
(20, 'Sửa khách hàng', '\\/admin\\.php\\?page-layout=user-change&id=\\d+$', 2052021, 3),
(21, 'Xóa khách hàng', '\\/admin\\.php\\?page-layout=user-delete&id=\\d+$', 252021, 3),
(22, 'SInh vien', '', 0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege_group`
--

CREATE TABLE `privilege_group` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) NOT NULL,
  `last_update` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `name`, `position`, `last_update`) VALUES
(1, 'Sản phẩm', 1, 1618924819),
(2, 'Hóa đơn', 2, 1618924819),
(3, 'Tài khoản', 3, 1618924819),
(4, 'Thống kê', 4, 1618924819);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(10) NOT NULL,
  `tensp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(10) NOT NULL,
  `idloai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensp`, `hinhanh`, `mota`, `gia`, `idloai`) VALUES
(1, 'Bánh cuốn', 'img/BanhCuon.png', 'Bánh cuốn được biết đến như một loại bánh được làm từ bột gạo hấp, cán mỏng rồi sau đó cuộn với nhân gồm thịt, mộc nhĩ, nấm hương thái nhỏ, được rắc bên trên một chút hành khô, ăn kèm với nước chấm chua ngọt đúng điệu.', 35000, 1),
(2, 'Bánh Mì', 'img/BanhMi.jfif', 'Bánh mì ổ giòn rụm cùng nhân thịt , chả lụa , rau dưa và thêm chút sốt độc quyền của quán', 15000, 1),
(3, 'Bánh Xèo', 'img/BanhXeo.jfif', 'Bánh làm từ bột gạo xay và bột nghệ tạo nên màu vàng ươm đặc trưng dùng chung với rau giá và nước chấm chua chua ngọt ngọt làm vạn người mê', 25000, 1),
(4, 'Bún Bò', 'img/BunBo.png', 'Bún bò có nguyên liệu chính là bún, thịt bắp bò, giò heo, chả (thịt bò quết nhuyễn) và nước lèo-nước được hầm từ xương bò với một vài loại củ.', 32000, 1),
(5, 'Bún Chả', 'img/BunCha.jfif', 'Bún chả là món ăn với bún, chả thịt lợn nướng trên than hoa ăn kèm với rau dùng và bát nước mắm chua cay mặn ngọt.', 35000, 1),
(6, 'Bún Riêu', 'img/BunRieu.jfif', 'Bún (Real) gồm bún và riêu cua. Riêu cua là canh chua được nấu từ gạch cua, thân cua giã và lọc lấy thịt cua cùng với cà chua, mỡ nước, mẻ hoăc giấm bỗng, nước mắm, muối, hành hoa…', 25000000, 1),
(7, 'Cơm Tấm', 'img/ComTam.jfif', 'Cơm tấm bao gồm phần cơm được làm từ hạt tấm mềm,thơm dẻo ăn cùng với thịt sườn nướng, bì, chả và nước mắm cơm tấm đặc trưng.', 25000, 1),
(8, 'Gỏi Cuốn', 'img/GoiCuon.jfif', 'Gỏi cuốn bao gồm tôm, thịt heo, rau, thảo mộc, bún. Tất cả chúng được gói lại bằng bánh tráng gạo ăn kèm với nước chấm chua ngọt.', 8000, 1),
(9, 'Mì Quảng', 'img/MiQuang.jfif', 'Mì Quảng gồm có mì, thịt (heo, bò, gà, vịt...), tôm, cá (lóc, thu, nhám...), trứng (gà, vịt, cút), đậu phộng rang, bánh tráng (đa), ớt, chanh, hành, tỏi...', 26000, 1),
(10, 'Phở Bò', 'img/PhoBo.png', 'Phở Bò nấu bằng thịt bò, nước dùng trong và ngọt, bánh dẻo mà không nát, thịt mỡ gầu giòn chứ không dai, chanh ớt với hành tây đủ cả, rau thơm tươi, hồ tiêu bắc, giọt chanh cốm gắt.', 55000, 1),
(11, 'Bánh Su Kem', 'img/img/BanhSuKem.jfif', 'Món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín.', 10000, 1),
(12, 'Cafe Đá', 'img/CafeDa.jfif', 'Cafe đen rang xay nguyên chất', 15000, 2),
(13, 'Cafe Sữa', 'img/CafeSua.jfif', 'Cafe pha với sữa đặc thơm béo', 20000, 2),
(14, 'CheeseCake', 'img/CheeseCake.jfif', 'Bánh phô mai sánh mịn và ngọt ngào', 35000, 2),
(15, 'Chè Thái', 'img/CheThai.jfif', 'Món chè tươi mát từ Thái bao gồm sầu riêng ,mít ,nhãn, và nhiều loại trái cây khác', 25000, 2),
(16, 'Bánh Mochi ', 'img/Mochi.png', 'Bánh Mochi xuất xứ từ Nhật Bản là loại bánh giầy có nhân ngọt truyền thống như đậu xanh ,trà xanh, dâu ..', 16000, 2),
(17, 'Nước Cam', 'img/NuocCam.jfif', 'Nước ép vắt từ những quả cam nguyên chất mọng nước.', 20000, 2),
(18, 'Nước Việt Quất', 'img/NuocVietQuat.jfif', 'Nước ép Việt Quất thanh mát giải khát cho những ngày hè oi bức.', 24000, 2),
(19, 'Bánh Pudding Xoài', 'img/PuddingXoai.png', 'Món tráng miệng ngọt với những lát xoài ngọt dịu', 29000, 2),
(20, 'Trà Chanh', 'img/TraChanh.png', 'Trà Chanh tươi mát hay còn gọi là Trà Chanh chém gió', 17000, 2),
(21, 'abc', 'img/test.jfif', 'dsadsadsadsadsa', 35000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `target`
--

CREATE TABLE `target` (
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `target`
--

INSERT INTO `target` (`target`) VALUES
(1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idKH` int(10) NOT NULL,
  `tenKH` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `trangthai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idKH`, `tenKH`, `username`, `password`, `Diachi`, `SDT`, `Gioitinh`, `NgaySinh`, `trangthai`) VALUES
(1, 'Nguyễn Văn A', 'userpro', '202cb962ac59075b964b07152d234b70', '231 Nguyễn Trãi', '0123456789', 'Nam', '2007-02-15', 0),
(2, 'Huỳnh Văn B', 'h', '202cb962ac59075b964b07152d234b70', '541 Nguyễn Thị Minh Khai', '0918310989', 'Nam', '2008-03-15', 0),
(6, 'thinh  ngu vai lon', 'thinhngu', '202cb962ac59075b964b07152d234b70', 'dsadsada', '0123456789', 'Nam', '2001-01-01', 0),
(7, 'huynh son', 'son123', '202cb962ac59075b964b07152d234b70', '123 ABC', '0123456789', 'Nam', '2001-11-21', 0),
(8, 'asdsa sdasdas', 'abc', '202cb962ac59075b964b07152d234b70', 'dadsas', '0123456789', 'Nam', '2001-11-21', 0),
(9, 'dsadas dsadas', 'abcd', '202cb962ac59075b964b07152d234b70', 'dsadsada', '0123456789', 'Nam', '2001-11-21', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_nv`
--

CREATE TABLE `user_nv` (
  `idNV` int(10) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_update` int(20) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_nv`
--

INSERT INTO `user_nv` (`idNV`, `username`, `password`, `fullname`, `last_update`, `trangthai`) VALUES
(1, 'admin', 'admin', 'ẠDK', 1052021, 0),
(2, 'personnel', '12345', 'PEG', 252021, 0),
(4, 'manager', '12789', 'MEN', 2542021, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pri_id` int(10) NOT NULL,
  `last_update` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `user_id`, `pri_id`, `last_update`) VALUES
(64, 2, 1, 2342021),
(65, 2, 5, 2342021),
(66, 2, 10, 2342021),
(67, 2, 16, 2342021),
(114, 4, 1, 2742021),
(115, 4, 2, 2742021),
(116, 4, 3, 2742021),
(117, 4, 4, 2742021),
(118, 4, 10, 2742021),
(119, 4, 11, 2742021),
(120, 4, 13, 2742021),
(121, 4, 16, 2742021),
(122, 4, 17, 2742021),
(203, 1, 1, 1352021),
(204, 1, 2, 1352021),
(205, 1, 3, 1352021),
(206, 1, 4, 1352021),
(207, 1, 5, 1352021),
(208, 1, 7, 1352021),
(209, 1, 8, 1352021),
(210, 1, 10, 1352021),
(211, 1, 11, 1352021),
(212, 1, 13, 1352021),
(213, 1, 14, 1352021),
(214, 1, 16, 1352021),
(215, 1, 17, 1352021),
(216, 1, 19, 1352021),
(217, 1, 20, 1352021),
(218, 1, 21, 1352021),
(219, 1, 22, 1352021);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `idHD` (`idHD`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `idKH` (`idKH`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloai`);

--
-- Chỉ mục cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Chỉ mục cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `idloai` (`idloai`),
  ADD KEY `idloai_2` (`idloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idKH`);

--
-- Chỉ mục cho bảng `user_nv`
--
ALTER TABLE `user_nv`
  ADD PRIMARY KEY (`idNV`);

--
-- Chỉ mục cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pri_id` (`pri_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idHD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_nv`
--
ALTER TABLE `user_nv`
  MODIFY `idNV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idHD`) REFERENCES `hoadon` (`idHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idsanpham`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idKH`) REFERENCES `user` (`idKH`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idloai`) REFERENCES `loaisp` (`idloai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_nv` (`idNV`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`pri_id`) REFERENCES `privilege` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
