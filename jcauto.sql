-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 10:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jcauto`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `cost` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `customer_name`, `service_id`, `service`, `cost`) VALUES
(61, 26, 'awddw', 2, 'Wheel repair', 400000),
(62, 26, 'awddw', 6, 'Engine', 100),
(64, 26, 'awddw', 8, 'Gear box', 500);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_reg` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `cname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mobileno` int(15) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `vehicle_reg`, `brand`, `model`, `cname`, `dob`, `cnic`, `email`, `mobileno`, `remark`, `registration_date`) VALUES
(26, 'awdwd', 'HONDA', 'wdad', 'awddw', '2020-07-17', 'awd', 'awd@wdw.g', 222, '21212', '2020-07-17 00:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `dob` date NOT NULL,
  `sex` char(1) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile1` varchar(20) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_type_id`, `address_id`, `fname`, `lname`, `dob`, `sex`, `cnic`, `email`, `username`, `password`, `mobile1`) VALUES
(3, 1, 3, 'Admin', 'system', '2000-01-01', 'M', '43102-8745695-6', '', 'admin', 'admin', '923122512081');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE IF NOT EXISTS `employee_type` (
  `employee_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(64) NOT NULL,
  PRIMARY KEY (`employee_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`employee_type_id`, `typename`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `manufacturer` varchar(200) NOT NULL,
  `country` varchar(150) NOT NULL,
  `price` int(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_id`, `title`, `model`, `manufacturer`, `country`, `price`, `details`, `description`) VALUES
(6, 'Engine', '', '', '', 100, '', ''),
(8, 'Gear box', '', '', '', 500, '', ''),
(9, 'Engine Oil', '', '', '', 0, '', ''),
(18, 'Alloy wheels', '', '', '', 40000, '', 'nickel'),
(20, 'awd', 'awd', 'awd', 'awd', 11, '', 'wad');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `amount` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `customer_id`, `customer_name`, `amount`) VALUES
(1, '2020-03-29 15:12:28', 20, 'mr.sgi', 0),
(2, '2020-04-17 22:00:56', 19, '', 0),
(3, '2020-04-17 22:32:35', 22, '', 0),
(4, '2020-04-17 23:10:16', 22, 'ms', 600000),
(5, '2020-04-18 00:36:32', 22, 'ms', 200000),
(6, '2020-04-18 00:42:36', 22, 'ms', 600000),
(7, '2020-04-18 00:59:36', 22, 'ms', 600000),
(8, '2020-04-18 01:02:05', 22, 'ms', 601302),
(9, '2020-05-20 12:40:44', 25, 'sg', 200000),
(10, '2020-05-20 15:10:39', 25, 'sg', 200600),
(11, '2020-07-17 00:27:55', 26, 'awddw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `price` int(8) NOT NULL,
  `estimated_time` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `title`, `price`, `estimated_time`, `description`) VALUES
(1, 'Engine repair', 200000, '5-8 hour', ''),
(2, 'Wheel repair', 400000, '5-8 hour', ''),
(3, 'Body paint', 600000, '10-12 hour', ''),
(6, 'Oil change', 20000, '2 h', 'engine or transmission'),
(8, 'awdwd', 222, '2', 'awdwd');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_history`
--

CREATE TABLE IF NOT EXISTS `vehicle_history` (
  `customer_id` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `vehicle_reg` varchar(100) NOT NULL,
  `service` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_history`
--

INSERT INTO `vehicle_history` (`customer_id`, `date`, `customer_name`, `vehicle_reg`, `service`) VALUES
(25, '2020-05-20 12:40:44', 'sg', 'km 676767', 'Engine repair'),
(25, '2020-05-20 12:40:44', 'sg', 'km 676767', ''),
(25, '2020-05-20 15:10:39', 'sg', 'km 676767', 'Engine repair'),
(25, '2020-05-20 15:10:39', 'sg', 'km 676767', 'Engine'),
(25, '2020-05-20 15:10:39', 'sg', 'km 676767', 'Gear box');

-- --------------------------------------------------------

--
-- Table structure for table `visit_rec`
--

CREATE TABLE IF NOT EXISTS `visit_rec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `vehicle_reg` varchar(100) NOT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `visit_rec`
--

INSERT INTO `visit_rec` (`id`, `customer_name`, `vehicle_reg`, `in_time`, `out_time`, `state`, `customer_id`) VALUES
(16, 'awddw', 'awdwd', '2020-07-17 00:28:16', NULL, 1, 26);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
