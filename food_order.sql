-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 10:04 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_name`, `package_id`) VALUES
(3, 'sunday', 2),
(4, 'tuesday', 2),
(12, 'sunday', 6),
(13, 'friday', 6),
(28, 'sunday', 8),
(29, 'sunday', 9),
(30, 'sunday', 10),
(31, 'tuesday', 10),
(46, 'tuesday', 17),
(47, 'wednesday', 17),
(48, 'thursday', 17),
(60, 'monday', 24),
(61, 'wednesday', 24),
(62, 'saturday', 26),
(63, 'monday', 26),
(64, 'tuesday', 26),
(65, 'thursday', 26),
(67, 'tuesday', 29),
(68, 'sunday', 30),
(69, 'thursday', 30),
(76, 'friday', 37);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `package_id`) VALUES
(5, 'biriyani', 2),
(6, 'chicken', 2),
(7, 'egg', 2),
(17, 'burger', 6),
(18, 'French Fry', 6),
(32, 'rrr', 8),
(33, 'hhh', 9),
(34, 'rice', 10),
(35, 'chicken', 10),
(45, 'chicken Roast', 17),
(46, 'Polao', 17),
(66, 'rice', 24),
(67, 'rice', 24),
(68, 'yytty', 25),
(69, 'khichuri', 26),
(70, 'beef', 26),
(74, 'tt', 29),
(75, 'rice', 30),
(84, 'Burger', 37);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `package_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `day_name` varchar(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `username`, `cname`, `package_id`, `quantity`, `day_name`, `order_date`, `order_time`) VALUES
(33, 'user', 'aiub', 36, 5, 'sunday', '2016-05-03', '22:57:46'),
(34, 'user', 'aiub', 26, 2, 'monday', '2016-05-03', '23:04:33'),
(35, 'user', 'aiub', 26, 2, 'monday', '2016-05-03', '23:05:09'),
(36, 'elias', 'abc', 2, 4, '<br /><b>No', '2016-08-31', '11:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `package_price` double(10,2) NOT NULL,
  `img` varchar(50) NOT NULL,
  `time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_price`, `img`, `time`) VALUES
(2, 'package 2', 110.00, '1453273991.png', '10:00:00'),
(6, 'Fast Food', 200.00, '1453385930.png', '10:00:00'),
(10, 'package 1', 90.00, '1453962920.png', '10:00:00'),
(17, 'Special Package', 150.00, '1453973425.png', '10:00:00'),
(24, 'Package 3', 110.00, '1454226439.png', '10:00:00'),
(25, 'yytt', 44.00, '1454226528.png', '10:00:00'),
(26, 'Package 4', 150.00, '1454227265.png', '10:00:00'),
(29, 'tt', 3.00, '1454229139.png', '10:00:00'),
(30, 'Package 5', 111.00, '1454328564.png', '10:00:00'),
(37, 'Package 2', 88.00, '1472628346.png', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `fname`, `lname`, `password`, `cname`, `address`, `mobile`, `type`) VALUES
(1, 'admin', 'new', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin company', 'admin home', 1147483647, '1'),
(12, 'user', 'user', 'name', 'd781eaae8248db6ce1a7b82e58e60435', 'aiub', 'Banani', 2147483647, '0'),
(13, 'elias', 'elias', 'khan', '202cb962ac59075b964b07152d234b70', 'abc', 'abc', 2147483647, '0'),
(14, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
