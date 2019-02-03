-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 02:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `collection`, `year`) VALUES
(1, 'Adidas EQT', 1500000, 'Collection 1', '2018'),
(2, 'Adidas Prophere', 2000000, 'Collection 2', '2018');

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
(6, 1, 'Adidas EQT', 1500000, 'Si D', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Packaging', '2019-01-29 02:12:00', '2019-02-02 23:11:41'),
(7, 2, 'Adidas Prophere', 2000000, 'Si E', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-02-01 23:46:04', '2019-02-03 05:25:39'),
(8, 1, 'Adidas EQT', 1500000, 'Si F', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Sending', '2019-01-29 03:11:00', '2019-02-02 23:11:41'),
(9, 1, 'Adidas EQT', 1500000, 'Si G', 'harry@gg.co', '023232232323', 'testing street', 'Bandung', 'Indonesia', '123455', 124, 'Unpaid', '2019-01-28 22:56:00', '2019-02-02 23:11:41'),
(10, 2, 'Adidas Prophere', 2000000, 'Si H', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-01-30 21:09:04', '2019-02-02 23:26:04'),
(11, 2, 'Adidas Prophere', 2000000, 'Si I', 'potter@pp.co', '033343432233', 'hogwarts', 'London', 'England', '022932', 453, 'Sending', '2019-02-01 05:36:01', '2019-02-02 23:43:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
