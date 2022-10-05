-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 11:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noveltees`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `p_id` int(100) NOT NULL,
  `items` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `p_id`, `items`, `image`, `quantity`, `price`, `type`, `size`) VALUES
(101, 19, 58, 'T-Shirt', 'ng8.jpg', 1, 200, 'ratchets', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(3, 'T-Shirts'),
(4, 'Ratchets'),
(5, 'Manifestation');

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `des` varchar(100) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id`, `email`, `des`, `price`, `quantity`, `image`, `status`) VALUES
(6, 'mtsamiulmahin14@gmail.com', '', 200, 100, 'g2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(22) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `address`, `number`, `username`, `password`, `token`) VALUES
(18, 'Mahin', 'mmahin181034@bscse.uiu.ac.bd', '84/c', '01304555701', 'Samiul Mahin', '2587M', '2495842178e9aa7b8d40d5f1e8dd2904'),
(19, 'Samiul Mahin', 'mtsamiulmahin14@gmail.com', '84/c', '01304555701', 'sws', '1594', '79610104dd1a947906197466c310abaa');

-- --------------------------------------------------------

--
-- Table structure for table `founder`
--

CREATE TABLE `founder` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `founder`
--

INSERT INTO `founder` (`id`, `name`, `email`, `user_name`, `password`, `token`) VALUES
(1, 'Sharhonda SooFocused Washington', 'novelteesssw@gmail.com', 'ssw', '2222', '4de8aa5c5ce444524941e252b258b3ce');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) DEFAULT NULL,
  `massage` varchar(500) NOT NULL,
  `date and time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `name`, `email`, `phone`, `massage`, `date and time`, `status`) VALUES
(1, 'Samiul Mahin', 'mmahin181034@bscse.uiu.ac.bd', 1304555701, 'Love', '2022-07-23 06:35:34', 'Read'),
(2, 'Abc', 'mmahin181034@bscse.uiu.ac.bd', 1304555701, 'Are you selling hoodies?', '2022-07-27 15:56:59', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `time_and_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'On process',
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `product_quantity`, `amount`, `user_id`, `time_and_date`, `customer_name`, `address`, `number`, `payment_method`, `status`, `payment_status`) VALUES
(11, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 3, '2022-08-31 11:45:39.320251', 'naba', '84/c', '1304555701', 'Plase choose a payment option', '', 'Paid'),
(12, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 3, '2022-08-31 11:45:49.825606', 'naba', '84/c', '1304555701', 'Card Payment', 'On process', 'unpaid'),
(14, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 3, '2022-08-31 14:08:27.448477', 'naba', '84/c', '1304555701', 'Card Payment', 'On process', 'unpaid'),
(15, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 3, '2022-08-31 14:10:18.523733', 'naba', '84/c', '1304555701', 'Card Payment', 'On process', 'unpaid'),
(16, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-08-31 14:13:11.323618', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'Deliverd', 'Paid'),
(17, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 16:49:01.049980', 'Mahin', 'Dhaka', '1686963558', 'Paypall', 'On process', 'unpaid'),
(18, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 16:49:32.836759', 'Mahin', 'Dhaka', '1686963558', 'Paypall', 'On process', 'Paid'),
(19, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 16:49:47.394217', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(20, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 19:43:26.852409', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(21, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 21:45:06.051079', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(22, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 21:50:02.567619', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(23, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 21:54:16.487268', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(24, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:23:52.624106', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(25, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:27:40.972626', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(26, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:29:27.485088', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(27, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:33:20.693653', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(30, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:57:46.776138', 'Mahin', 'Dhaka', '1686963558', 'Plase choose a payment option', 'On process', 'unpaid'),
(32, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:58:13.504958', 'Mahin', 'Dhaka', '1686963558', 'Plase choose a payment option', 'On process', 'unpaid'),
(33, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-03 22:58:26.349610', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(35, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 10:35:25.277042', 'Mahin', 'Dhaka', '1686963558', 'Plase choose a payment option', 'On process', 'unpaid'),
(36, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 10:35:43.575371', 'Mahin', 'Dhaka', '1686963558', 'Plase choose a payment option', 'On process', 'unpaid'),
(38, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 10:43:57.574886', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(39, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 10:46:18.302218', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(40, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:18:56.751458', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(41, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:23:01.031855', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(42, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:23:01.034726', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(43, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:23:27.080775', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(44, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:23:27.084096', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(45, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:25:57.148904', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(46, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:25:57.151997', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(47, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:29:07.173510', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(48, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 11:29:07.177647', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(49, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 15:06:14.390580', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(50, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 15:06:14.402396', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(51, '\r\n        T-Shirt(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 15:28:10.000813', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'Paid'),
(52, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 16:23:25.648467', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(53, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 1, '2022-09-04 16:26:33.897312', 'Mahin', 'Dhaka', '1686963558', 'Card Payment', 'On process', 'unpaid'),
(54, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-07 09:54:39.953171', 'Samiul Mahin', '84/c', '01304555701', 'Card Payment', 'Deliverd', 'Paid'),
(55, '\r\n        T-Shirt(L-Large)(2)        ', '\r\n        2        \r\n         ', '400', 19, '2022-09-09 19:41:46.065538', 'Samiul Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'Paid'),
(56, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-09 19:42:58.267823', 'Samiul Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'unpaid'),
(57, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 22:28:03.833770', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(58, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 22:41:28.062363', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(59, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 22:43:25.968651', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(60, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 22:46:03.265329', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(61, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 22:49:10.168550', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(62, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 23:00:50.639809', 'Samiul Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'unpaid'),
(63, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 23:00:50.642625', 'Samiul Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'unpaid'),
(64, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 23:29:49.519628', 'Samiul Mahin', '84/c', '01304555701', 'Cash on deleivary', 'On process', 'unpaid'),
(65, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 23:32:35.086829', 'Samiul Mahin', '84/c', '01304555701', 'Cash on delivery', 'On process', 'unpaid'),
(66, '\r\n        T-Shirt(M)(1)        ', '\r\n        1        \r\n         ', '200', 19, '2022-09-21 23:34:30.301213', 'Samiul Mahin', '84/c', '01304555701', 'Cash on delivery', 'On process', 'unpaid'),
(67, '\r\n        T-Shirt(M)(4),T-Shirt(M)(1)        ', '\r\n        5        \r\n         ', '1000', 18, '2022-09-29 10:43:02.084127', 'Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'Paid'),
(68, '\r\n        T-Shirt(M)(4),T-Shirt(M)(1)        ', '\r\n        5        \r\n         ', '1000', 18, '2022-09-29 10:43:02.089269', 'Mahin', '84/c', '01304555701', 'Card Payment', 'On process', 'Paid'),
(69, '\r\n        T-Shirt(M)(4),T-Shirt(M)(1)        ', '\r\n        5        \r\n         ', '1000', 18, '2022-09-29 10:44:51.134626', 'Mahin', '84/c', '01304555701', 'Cash on delivery', 'On process', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `description`, `amount`, `status`) VALUES
(1, 10, '\r\n        T-Shirt(1),T-Shirt(1)         ', '400', 'Paid'),
(2, 10, '\r\n        T-Shirt(1),T-Shirt(1)         ', '400', 'Paid'),
(3, 11, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(4, 11, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(5, 11, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(6, 11, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(7, 11, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(8, 16, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(9, 18, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(10, 19, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(11, 20, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(12, 21, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(13, 22, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(14, 23, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(15, 24, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(16, 25, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(17, 26, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(18, 27, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(19, 28, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(20, 33, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(21, 38, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(22, 39, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(23, 40, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(24, 51, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(25, 50, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(26, 49, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(27, 41, '\r\n        T-Shirt(1)         ', '200', 'Paid'),
(28, 0, ' ', '', 'Paid'),
(29, 54, '\r\n        T-Shirt(M)(1)         ', '200', 'Paid'),
(30, 55, '\r\n        T-Shirt(L-Large)(2)         ', '400', 'Paid'),
(31, 68, '\r\n        T-Shirt(M)(4),T-Shirt(M)(1)         ', '1000', 'Paid'),
(32, 67, '\r\n        T-Shirt(M)(4),T-Shirt(M)(1)         ', '1000', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price1` int(255) NOT NULL,
  `price2` int(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price1`, `price2`, `type`, `image`, `status`) VALUES
(58, 'T-Shirt', 200, 400, 'ratchets', 'ng8.jpg', 'in_stock'),
(63, 'T-Shirt', 200, 400, 'T-Shirts', 'ng11.jpg', 'in_stock'),
(64, 'T-Shirt', 200, 400, 'Ratchets', 'ng12.jpg', 'in_stock'),
(65, 'T-Shirt', 200, 400, 'T-Shirts', '299429276_364771412348672_1822972827971385057_n.jpg', 'in_stock'),
(66, 'T-Shirt', 200, 400, 'Ratchets', '299053923_481509610473173_7286051362212648490_n.jpg', 'in_stock'),
(67, 'T-Shirt', 200, 400, 'Manifestretion', '298713683_783607946157855_7710422872952845941_n.jpg', 'in_stock');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `title`) VALUES
(1, 'M'),
(3, 'L-Large');

-- --------------------------------------------------------

--
-- Table structure for table `stay_in_loop`
--

CREATE TABLE `stay_in_loop` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stay_in_loop`
--

INSERT INTO `stay_in_loop` (`id`, `email`) VALUES
(1, 'mmahin181034@bscse.uiu.ac.bd'),
(2, 'mtsamiulmahin14@gmail.com'),
(3, 'nazimnk9@gmail.com'),
(4, 'handicraftbangladesh@gmail.com'),
(5, 'mmahin181034@bscse.uiu.ac.bd'),
(6, 'samiulmahin74@gmail.com'),
(7, 'handicraftbangladesh@gmail.com'),
(8, 'handicraftbangladesh@gmail.com'),
(9, 'samiulmahin74@gmail.com'),
(10, 'antoronggo@gmail.com'),
(11, 'samiulmahin@gmail.com'),
(12, 'sadasdad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stay_in_loop`
--
ALTER TABLE `stay_in_loop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `founder`
--
ALTER TABLE `founder`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stay_in_loop`
--
ALTER TABLE `stay_in_loop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
