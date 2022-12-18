-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 08:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ismart.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `name_city` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `name_city`) VALUES
(1, 'Thành phố Hồ Chí Minh'),
(2, 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `name_district` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `name_district`, `city_id`) VALUES
(3, 'Quận 1', 1),
(4, 'Quận 2', 1),
(5, 'Quận 3', 1),
(6, 'Quận 4', 1),
(7, 'Quận 5', 1),
(8, 'Quận 6', 1),
(9, 'Quận 7', 1),
(10, 'Quận 8', 1),
(11, 'Quận 9', 1),
(12, 'Quận 10', 1),
(13, 'Quận 11', 1),
(14, 'Quận 12', 1),
(15, 'Thành phố Thủ Đức', 1),
(16, 'Bình Tân', 1),
(17, 'Bình Thạnh', 1),
(18, 'Gò Vấp', 1),
(19, 'Phú Nhuận', 1),
(20, 'Tân Bình', 1),
(21, 'Tân Phú', 1),
(22, 'Bình Chánh', 1),
(23, 'Cần Giờ', 1),
(24, 'Củ Chi', 1),
(25, 'Hooc Môn', 1),
(26, 'Nhà Bè', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `number_cart` int(11) NOT NULL,
  `price_cart` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_title`) VALUES
(1, 'Laptop'),
(2, 'Máy tính bảng'),
(3, 'Điện thoại'),
(4, 'Tai nghe'),
(5, 'Thời trang'),
(6, 'Đồ gia dụng'),
(7, 'Thiết bị văn phòng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `wards_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `fullname`, `email`, `phone`, `address`, `city_id`, `district_id`, `wards_id`) VALUES
(21, 'Võ Quang Vinh', 'voquangvinh@gmaill.com', '0935890089', '448/43 Đường số 11', 1, 15, 6),
(22, 'Võ Hải Thanh', 'haithanh@gmail.com', '0328644250', '448/43 Đường số 9', 1, 15, 4),
(26, 'Nguyễn Công Chí', 'nguyencongchi0607@gmail.com', '0328644258', '24/9 Lê Văn Việt', 1, 15, 6),
(27, 'Trần Thj Cẩm Hà', 'camha@gmail.com', '0964547002', 'C45/449', 1, 15, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `detail_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_products`
--

CREATE TABLE `tbl_image_products` (
  `image_product_id` int(11) NOT NULL,
  `product_thumb_dis` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `date_create` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `method_pay` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status_pay` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_old` int(11) NOT NULL,
  `discription` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_thumb` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_content` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `mass` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number_stock` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`) VALUES
(1, 'CellPhone-S'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passwords` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phonenumber` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `passwords`, `phonenumber`, `address`, `created_date`, `email`) VALUES
(1, 'Nguyễn Công  Chí', 'congchi@gmail.com', 'b39c9f8445648379e4af5170ac85f13c', '0328644258', 'C24/9 Tăng Nhơn Phú A, Quận 9, TP.Thủ Đức', 0, 'nguyencongchi0607@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `wards_id` int(11) NOT NULL,
  `name_wards` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`wards_id`, `name_wards`, `district_id`) VALUES
(1, 'Phường Tăng Nhơn Phú A', 15),
(2, 'Phường Tăng Nhơn Phú B', 15),
(4, 'Phường An Khánh', 15),
(5, 'Phường Trường Thọ', 15),
(6, 'Phường Hiệp Phú', 15),
(7, 'Phường Linh Chiểu', 15),
(8, 'Phường Linh Đông', 15),
(9, 'Phường Linh Xuân', 15),
(10, 'Phường Linh Đông', 15),
(12, 'Phường Bình Chiểu', 15),
(13, 'Phường Bình Thọ', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `wards_id` (`wards_id`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`detail_order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `tbl_detail_order_ibfk_1` (`product_id`);

--
-- Indexes for table `tbl_image_products`
--
ALTER TABLE `tbl_image_products`
  ADD PRIMARY KEY (`image_product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`wards_id`),
  ADD KEY `district_id` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `detail_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_image_products`
--
ALTER TABLE `tbl_image_products`
  MODIFY `image_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `wards_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `tbl_customer_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `tbl_customer_ibfk_3` FOREIGN KEY (`wards_id`) REFERENCES `wards` (`wards_id`);

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`);

--
-- Constraints for table `tbl_image_products`
--
ALTER TABLE `tbl_image_products`
  ADD CONSTRAINT `tbl_image_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
