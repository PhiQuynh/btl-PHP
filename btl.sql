-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 01:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin2', 'c33367701511b4f6020ec61ded352059');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `quantity`) VALUES
(57, 1, 77, 2),
(63, 1, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_img`) VALUES
(1, 'Trà sữa mỗi ngày', 'img/category/logo_19.png'),
(2, 'Kem tươi mỗi ngày', 'img/category/logo_6.png'),
(3, 'sản phẩm về trà', 'img/category/logo_18.png'),
(4, 'sản phẩm liên quan', 'img/category/logo_16.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `cate_id`, `item_name`, `item_price`, `item_image`) VALUES
(75, 1, ' Trà sữa Matcha trà xanh ', 39000, 'img/product/mill_tea_1.jpg'),
(76, 1, ' Trà sữa Matcha phô mai ', 49000, 'img/product/mill_tea_13.jpeg'),
(77, 1, ' Trà sữa chân châu ô long ', 49000, 'img/product/mill_tea_3.jpg'),
(78, 1, ' Trà sữa chân châu trà xanh ', 39000, 'img/product/mill_tea_9.jfif'),
(79, 1, ' Trà sữa Matcha đường nâu kem cheese ', 49000, 'img/product/mill_tea_17.jpg'),
(80, 1, ' Trà sữa Matcha kem cheese muối biển ', 49000, 'img/product/mill_tea_7.jpg'),
(81, 1, ' Trà sữa Matcha phô mai sữa nóng ', 49000, 'img/product/mill_tea_16.jpg'),
(82, 1, ' Trà sữa Matcha chân châu đường đen ', 49000, 'img/product/mill_tea_6.jfif'),
(83, 1, ' Trà sữa Mimosa ', 59000, 'img/product/mill_tea_14.jpg'),
(84, 1, ' Trà sữa Matcha vị cà phê ', 59000, 'img/product/mill_tea_2.jfif'),
(86, 1, ' Trà sữa Matcha đậu đỏ ', 59000, 'img/product/mill_tea_8.jpg'),
(87, 1, ' Trà sữa Matcha kem thái ', 59000, 'img/product/mill_tea_18.png'),
(88, 2, ' bánh Biscotti vị trà xanh ', 39000, 'img/product/cake_1.jpg'),
(89, 2, ' bánh cookie trà xanh ', 39000, 'img/product/cake_2.png'),
(90, 2, ' Bánh Cupcake Trà Xanh ', 39000, 'img/product/cake_3.jpg'),
(91, 2, ' Bánh trà Craker Nhân Trà Xanh ', 39000, 'img/product/cake_4.jpg'),
(92, 2, ' bánh Matcha ', 49000, 'img/product/cake_6.jpg'),
(93, 2, ' Bánh Oreo vị Bánh cuộn trà xanh ', 49000, 'img/product/cake_7.jpg'),
(94, 2, ' Bánh sốp cuộn vị phô mai ', 49000, 'img/product/cake_9.jpg'),
(95, 2, ' Bánh kem gato matcha trà xanh ', 49000, 'img/product/cake_5.jpg'),
(96, 2, ' Bánh Tipo trà xanh cookies ', 49000, 'img/product/cake_10.jpg'),
(97, 2, ' bánh rán doremon nhân trà xanh ', 49000, 'img/product/cake_8.jpg'),
(98, 2, ' Bánh trà Craker Nhân Trà Xanh ', 49000, 'img/product/cake_11.jpg'),
(99, 2, ' Bánh dẻo đậu xanh chay ', 49000, 'img/product/cake_12.png'),
(100, 3, ' Bột match ', 39000, 'img/product/product_tea_2.jpg'),
(101, 3, ' Bột Matcha Milk Trà xanh Nhật Bản ', 39000, 'img/product/product_tea_3.jpg'),
(102, 3, ' Mát tra trà Xanh túi lọc Nhật bản hộp 50 gó ', 49000, 'img/product/product_tea_5.jpg'),
(103, 3, ' Trà OOlong Tea+Plus ', 29000, 'img/product/product_tea_8.jpg'),
(104, 3, ' Trà xanh CoZy hộp 50g ', 59000, 'img/product/product_tea_10.jpg'),
(105, 3, ' Trà Xanh Túi Lọc -Tân Cương Xanh ', 49000, 'img/product/product_tea_12.jpg'),
(106, 3, ' Trà xanh không độ vị trà xanh ', 29000, 'img/product/product_tea_11.jpg'),
(107, 3, ' Trà sen ', 49000, 'img/product/product_tea_9.jpg'),
(108, 4, ' Bộ dưỡng da trà xanh Green Tea Special KT ', 159000, 'img/product/related_products_1.jpg'),
(109, 4, ' Bột mặt nạ Thuốc Bắc ', 139000, 'img/product/related_products_3.jfif'),
(110, 4, ' Kem chống nắng Naruko Tea Tree ', 159000, 'img/product/related_products_2.jpg'),
(111, 4, ' son dưỡng môi Innisfree-Trà xanh ', 89000, 'img/product/related_products_4.jpg'),
(112, 4, ' Trà Xanh -Serum dưỡng trắng da ', 139000, 'img/product/related_products_6.jpg'),
(113, 4, ' Trà xanh- cấp ẩm cho da Innisfree ', 159000, 'img/product/related_products_7.jpg'),
(114, 4, ' Xà bông Chùm Ngây-Trà Xanh ', 89000, 'img/product/related_products_8.jpg'),
(115, 4, ' Sữa rửa mặt Innisfree trà xanh ', 89000, 'img/product/related_products_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'user1', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'user2', 'c33367701511b4f6020ec61ded352059');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
