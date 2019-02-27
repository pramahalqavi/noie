-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 04:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `password`, `remember_token`) VALUES
('diahdewi.165@gmail.com', '$2y$10$JYdDma99J2tD7lHTTgs8TunfhSdPmlal/N5.AsqiltB6q6jrHH8iy', NULL),
('rtrt@example.com', '$2y$10$ju.qFzajfHXrs.8p26BNKOeOvhBYxes6Kqn0ea6mDfcDzsxBEq0Wi', NULL),
('wawa@example.com', '$2y$10$TV26TEIxWRza9UGwzBpG4eod3Pz1fXui5BEjlPInWWpIrvuYRvFyK', NULL),
('wqwq@example.com', '$2y$10$LfHX0hXpjiresnXi1Doqye9a4oZdxmmo5hvF4/1e8TYwKY4hXaVuO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `year`) VALUES
(1, 'AA', '2016'),
(2, 'BB', '2016'),
(3, 'CC', '2016'),
(4, 'DD', '2016'),
(5, 'EE', '2017'),
(6, 'FF', '2017'),
(7, 'GG', '2017'),
(8, 'HH', '2017'),
(9, 'II', '2018'),
(10, 'JJ', '2018'),
(11, 'KK', '2018'),
(12, 'LL', '2018'),
(13, 'Testing1', '2015'),
(14, 'Testing2', '2015'),
(15, 'Testing3', '2015'),
(16, 'Testing4', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL DEFAULT 'storage/product/product-img.jpg',
  `image2` varchar(255) NOT NULL DEFAULT 'storage/product/product-img.jpg',
  `thumbnail1` varchar(255) NOT NULL DEFAULT 'storage/product/thumbnail/product-img.jpg',
  `thumbnail2` varchar(255) NOT NULL DEFAULT 'storage/product/thumbnail/product-img.jpg',
  `material` varchar(255) NOT NULL DEFAULT '-',
  `size` varchar(255) DEFAULT '-',
  `price` int(100) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `image1`, `image2`, `thumbnail1`, `thumbnail2`, `material`, `size`, `price`, `collection_id`) VALUES
(1, 'Adidas EQT', 'storage/product/product-img.jpg', 'storage/product/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'Canvas', '-', 1500000, 1),
(2, 'Adidas Prophere', 'storage/product/product-img.jpg', 'storage/product/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'Canvas', '-', 2000000, 1),
(3, 'Lamborghini aventador', 'storage/product/3-1.jpg', 'storage/product/3-2.jpg', 'storage/product/thumbnail/3-1.jpg', 'storage/product/thumbnail/3-2.jpg', 'Real steel', '-', 500000000, 1),
(5, 'Typing', 'storage/product/5-1.png', 'storage/product/5-2.png', 'storage/product/thumbnail/5-1.png', 'storage/product/thumbnail/5-2.png', 'Keyboard', 'One size', 200000, 9),
(6, 'Toyota New Alphard', 'storage/product/6-1.png', 'storage/product/6-2.png', 'storage/product/thumbnail/6-1.png', 'storage/product/thumbnail/6-2.png', 'V6 Machine', 'Aa Bb Cc', 959000000, 9),
(7, 'Jaket Parka', 'storage/product/product-img.jpg', 'storage/product/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'Primeknit', 'S M L', 500000, 13),
(13, 'Honda Jazz', 'storage/product/13-1.jpg', 'storage/product/13-2.jpg', 'storage/product/thumbnail/13-1.jpg', 'storage/product/thumbnail/13-2.jpg', 'Real steel', '-', 279000000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(15) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_city` varchar(255) NOT NULL,
  `cust_state` varchar(255) NOT NULL,
  `cust_zipcode` varchar(6) NOT NULL,
  `unique_code` int(3) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `product_id`, `product_name`, `collection`, `year`, `size`, `price`, `cust_name`, `cust_email`, `cust_phone`, `cust_address`, `cust_city`, `cust_state`, `cust_zipcode`, `unique_code`, `status`, `created_at`, `updated_at`) VALUES
('1', 1, 'Adidas EQT', 'AA', '2018', '44', 1500000, 'Harry', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-27 17:00:00', '2019-02-02 23:11:41'),
('10', 2, 'Adidas Prophere', 'JJ', '2018', '44', 2000000, 'Si H', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-01-30 21:09:04', '2019-02-02 23:26:04'),
('11', 2, 'Adidas Prophere', 'KK', '2018', '44', 2000000, 'Si I', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Completed', '2019-02-01 05:36:01', '2019-02-08 19:20:51'),
('2', 2, 'Adidas Prophere', 'BB', '2018', '44', 2000000, 'Potter', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-01-30 17:00:00', '2019-02-02 23:26:04'),
('3', 2, 'Adidas Prophere', 'CC', '2018', '44', 2000000, 'Si A', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Unpaid', '2019-01-31 19:03:04', '2019-02-02 23:26:04'),
('30r5c72c54e50294', 6, 'Toyota New Alphard', 'II', '2018', 'Not Null', 959000000, 'fasdf', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '213123', 238, 'Unpaid', '2019-02-24 16:24:46', '2019-02-24 16:24:46'),
('4', 1, 'Adidas EQT', 'DD', '2018', '44', 1500000, 'Si B', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-29 01:30:00', '2019-02-02 23:11:41'),
('4wn5c720e45803d3', 11, 'Cobain', 'II', '2018', 'Not Null', 500000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '231231', 282, 'Sending', '2019-02-23 20:23:49', '2019-02-27 06:44:54'),
('5', 2, 'Adidas Prophere', 'EE', '2018', '44', 2000000, 'Si C', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Unpaid', '2019-01-31 21:20:04', '2019-02-02 23:26:04'),
('5f95c760ec1aecf5', 5, 'Typing', 'II', '2018', 'One', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 791, 'Unpaid', '2019-02-27 04:14:57', '2019-02-27 04:14:57'),
('6', 1, 'Adidas EQT', 'FF', '2018', '44', 1500000, 'Si D', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Packaging', '2019-01-29 02:12:00', '2019-02-04 07:11:38'),
('7', 2, 'Adidas Prophere', 'GG', '2018', '44', 2000000, 'Si E', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Packaging', '2019-02-01 23:46:04', '2019-02-23 20:33:05'),
('7e25c7603df1d480', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 993, 'Unpaid', '2019-02-27 03:28:31', '2019-02-27 03:28:31'),
('8', 1, 'Adidas EQT', 'HH', '2018', '44', 1500000, 'Si F', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Sending', '2019-01-29 03:11:00', '2019-02-02 23:11:41'),
('9', 1, 'Adidas EQT', 'II', '2018', '44', 1500000, 'Si G', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-28 22:56:00', '2019-02-02 23:11:41'),
('9775c7603cbea413', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 53, 'Unpaid', '2019-02-27 03:28:11', '2019-02-27 03:28:11'),
('bqn5c76017013325', 12, 'Wah', 'II', '2018', '40', 400000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 635, 'Unpaid', '2019-02-27 03:18:08', '2019-02-27 03:18:08'),
('e3e5c76049212155', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 823, 'Unpaid', '2019-02-27 03:31:30', '2019-02-27 03:31:30'),
('fvg5c72b76ae1db3', 12, 'Wah', 'II', '2018', 'Not Null', 400000, 'fasdf', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '213123', 210, 'Unpaid', '2019-02-24 08:25:30', '2019-02-24 08:25:30'),
('g2c5c76192d62631', 5, 'Typing', 'II', '2018', 'One', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 893, 'Unpaid', '2019-02-27 04:59:25', '2019-02-27 04:59:25'),
('h4n5c72084a1a24e', 11, 'Cobain', 'II', '2018', 'Not Null', 500000, 'fasdf', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '213123', 141, 'Unpaid', '2019-02-23 19:58:18', '2019-02-23 19:58:18'),
('jkp5c7604a3a1a58', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 18, 'Canceled', '2019-02-27 03:31:47', '2019-02-27 06:45:45'),
('jzn5c7604ce9b31e', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 240, 'Unpaid', '2019-02-27 03:32:30', '2019-02-27 03:32:30'),
('nun5c7603b8daa28', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 839, 'Unpaid', '2019-02-27 03:27:52', '2019-02-27 03:27:52'),
('orr5c75fe17917cf', 6, 'Toyota New Alphard', 'II', '2018', 'Aa', 959000000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '231232', 638, 'Unpaid', '2019-02-27 03:03:51', '2019-02-27 03:03:51'),
('tig5c7604dd8bdba', 5, 'Typing', 'II', '2018', 'size', 200000, 'liplop', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '232121', 396, 'Unpaid', '2019-02-27 03:32:45', '2019-02-27 03:32:45'),
('tnv5c72b98922066', 5, 'Typing', 'II', '2018', 'Not Null', 200000, 'fasdf', 'qqq@xyz.co', '123123', 'fasdfasd', 'asdfasdf', 'asdfasdf', '213123', 16, 'Unpaid', '2019-02-24 15:34:33', '2019-02-24 15:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` varchar(64) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `country_code` varchar(8) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `country_code`, `visit_date`, `visit_time`) VALUES
('127.0.0.1/2019-02-21', '127.0.0.1', 'ID', '2019-02-21', '01:11:19'),
('127.0.0.1/2019-02-22', '127.0.0.1', 'ID', '2019-02-22', '07:41:46'),
('127.0.0.1/2019-02-23', '127.0.0.1', 'ID', '2019-02-23', '06:35:53'),
('127.0.0.1/2019-02-24', '127.0.0.1', 'ID', '2019-02-24', '22:36:39'),
('127.0.0.1/2019-02-27', '127.0.0.1', 'ID', '2019-02-27', '14:19:11'),
('7', '12', 'unknown', '2018-12-20', '06:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `collection` (`collection_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `collection_fk` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
