-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2019 at 08:57 AM
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
  `material` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT '-',
  `price` int(100) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `image1`, `image2`, `thumbnail1`, `thumbnail2`, `material`, `size`, `price`, `collection_id`) VALUES
(1, 'Adidas EQT', 'storage/product/product-img.jpg', 'storage/product/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'Canvas', NULL, 1500000, 1),
(2, 'Adidas Prophere', 'storage/product/product-img.jpg', 'storage/product/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'storage/product/thumbnail/product-img.jpg', 'Canvas', NULL, 2000000, 1),
(3, 'Lamborghini aventador', 'storage/product/3-1.jpg', 'storage/product/3-2.jpg', 'storage/product/thumbnail/3-1.jpg', 'storage/product/thumbnail/3-2.jpg', 'Real steel', '-', 500000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
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

INSERT INTO `transactions` (`transaction_id`, `product_id`, `product_name`, `price`, `cust_name`, `cust_email`, `cust_phone`, `cust_address`, `cust_city`, `cust_state`, `cust_zipcode`, `unique_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adidas EQT', 1500000, 'Harry', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-27 17:00:00', '2019-02-02 23:11:41'),
(2, 2, 'Adidas Prophere', 2000000, 'Potter', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-01-30 17:00:00', '2019-02-02 23:26:04'),
(3, 2, 'Adidas Prophere', 2000000, 'Si A', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Unpaid', '2019-01-31 19:03:04', '2019-02-02 23:26:04'),
(4, 1, 'Adidas EQT', 1500000, 'Si B', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-29 01:30:00', '2019-02-02 23:11:41'),
(5, 2, 'Adidas Prophere', 2000000, 'Si C', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Unpaid', '2019-01-31 21:20:04', '2019-02-02 23:26:04'),
(6, 1, 'Adidas EQT', 1500000, 'Si D', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Packaging', '2019-01-29 02:12:00', '2019-02-04 07:11:38'),
(7, 2, 'Adidas Prophere', 2000000, 'Si E', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-02-01 23:46:04', '2019-02-03 05:25:39'),
(8, 1, 'Adidas EQT', 1500000, 'Si F', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Sending', '2019-01-29 03:11:00', '2019-02-02 23:11:41'),
(9, 1, 'Adidas EQT', 1500000, 'Si G', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-28 22:56:00', '2019-02-02 23:11:41'),
(10, 2, 'Adidas Prophere', 2000000, 'Si H', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-01-30 21:09:04', '2019-02-02 23:26:04'),
(11, 2, 'Adidas Prophere', 2000000, 'Si I', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Completed', '2019-02-01 05:36:01', '2019-02-08 19:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` varchar(64) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `country` varchar(128) DEFAULT NULL,
  `country_code` varchar(8) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `country`, `country_code`, `visit_date`, `visit_time`) VALUES
('1', '12', 'unknown', 'unknown', '2019-02-21', '06:00:00'),
('127.0.0.1/2019-02-21', '127.0.0.1', 'Indonesia', 'ID', '2019-02-21', '01:11:19'),
('127.0.0.1/2019-02-22', '127.0.0.1', 'Indonesia', 'ID', '2019-02-22', '07:41:46'),
('2', '12', 'unknown', 'unknown', '2019-02-20', '06:00:00'),
('3', '12', 'unknown', 'unknown', '2019-02-19', '06:00:00'),
('4', '12', 'unknown', 'unknown', '2019-02-28', '06:00:00'),
('5', '12', 'unknown', 'unknown', '2019-01-28', '06:00:00'),
('6', '12', 'unknown', 'unknown', '2019-01-20', '06:00:00'),
('7', '12', 'unknown', 'unknown', '2018-12-20', '06:00:00');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
