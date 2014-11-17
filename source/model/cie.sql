-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 02:17 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `desks`
--

CREATE TABLE IF NOT EXISTS `desks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `space` varchar(20) NOT NULL,
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `desks`
--

INSERT INTO `desks` (`id`, `space`, `row`, `column`) VALUES
(1, 'Launchpad A', 1, 1),
(2, 'Launchpad A', 1, 2),
(3, 'Launchpad A', 1, 3),
(4, 'Launchpad A', 1, 4),
(5, 'Launchpad A', 2, 1),
(6, 'Launchpad A', 2, 2),
(7, 'Launchpad A', 2, 3),
(8, 'Launchpad A', 2, 4),
(9, 'Launchpad A', 3, 1),
(10, 'Launchpad A', 3, 2),
(11, 'Launchpad A', 3, 3),
(12, 'Launchpad A', 3, 4),
(13, 'Launchpad A', 3, 5),
(14, 'Launchpad A', 4, 1),
(15, 'Launchpad A', 4, 2),
(16, 'Launchpad A', 4, 3),
(17, 'Launchpad A', 4, 4),
(18, 'Launchpad A', 4, 5),
(19, 'Launchpad A', 5, 1),
(20, 'Launchpad A', 5, 2),
(21, 'Launchpad A', 5, 3),
(22, 'Launchpad A', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `desk_log`
--

CREATE TABLE IF NOT EXISTS `desk_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desk_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `desk_log`
--

INSERT INTO `desk_log` (`id`, `desk_id`, `year`, `month`, `startup_id`) VALUES
(1, 2, 2014, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `general_invoice`
--

CREATE TABLE IF NOT EXISTS `general_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `noofdesk` int(11) NOT NULL,
  `rateperdesk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `left_auth` varchar(60) NOT NULL,
  `right_auth` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_order_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `noofunit` int(11) NOT NULL,
  `rateperunit` int(11) NOT NULL,
  `checkto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reciept_invoice`
--

CREATE TABLE IF NOT EXISTS `reciept_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `total_word` varchar(150) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `length` varchar(15) NOT NULL,
  `width` varchar(15) NOT NULL,
  `area` varchar(15) NOT NULL,
  `desks` int(11) NOT NULL,
  `space` varchar(20) NOT NULL,
  `side` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `length`, `width`, `area`, `desks`, `space`, `side`) VALUES
(2, '10', '15', '150', 30, 'RGUKT', 'Right'),
(3, '1', '1', '1', 1, 'RGUKT', 'Left'),
(4, '1', '2', '3', 4, 'RGUKT', 'Left'),
(5, '1', '2', '3', 4, 'RGUKT', 'Left'),
(7, '5', '5', '25', 20, 'RGUKT', 'Right'),
(8, '10', '10', '100', 15, 'RGUKT', 'Right');

-- --------------------------------------------------------

--
-- Table structure for table `room_log`
--

CREATE TABLE IF NOT EXISTS `room_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_log`
--

INSERT INTO `room_log` (`id`, `room_id`, `year`, `month`, `startup_id`) VALUES
(1, 5, 2014, 11, 1),
(3, 7, 2014, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sign_auth`
--

CREATE TABLE IF NOT EXISTS `sign_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sign_auth`
--

INSERT INTO `sign_auth` (`id`, `name`, `designation`, `company`) VALUES
(1, 'Vasu Deva Verma', 'CEO', 'Banyan Intellectual Initiatives'),
(2, 'Srinivas Kollipara', 'COO', 'Banyan Intellectual Initiatives'),
(3, 'Raghu Prodduturi', 'Manager', 'Banyan Intellectual Initiatives'),
(4, 'Manoj Surya', 'Manager', 'Banyan Intellectual Initiatives'),
(5, 'Manikiran', 'Manager', 'Banyan Intellectual Initiatives');

-- --------------------------------------------------------

--
-- Table structure for table `spaces`
--

CREATE TABLE IF NOT EXISTS `spaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rows` int(11) NOT NULL,
  `floor` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `spaces`
--

INSERT INTO `spaces` (`id`, `type`, `name`, `rows`, `floor`) VALUES
(1, 'Wing', 'RGUKT', 0, 'Ground'),
(2, 'Co-Working', 'Launchpad A', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `startups`
--

CREATE TABLE IF NOT EXISTS `startups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `space` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `joining_date` varchar(15) NOT NULL,
  `ending_date` varchar(15) NOT NULL,
  `employees` int(11) NOT NULL,
  `domain` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `web_address` varchar(60) NOT NULL,
  `p1_id` int(11) NOT NULL,
  `p2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `startups`
--

INSERT INTO `startups` (`id`, `name`, `space`, `status`, `joining_date`, `ending_date`, `employees`, `domain`, `description`, `web_address`, `p1_id`, `p2_id`) VALUES
(1, 'Anurag', 'RGUKT', 'Present', '11-10-2014', '11-30-2014', 1, 'Startup', 'enginnering prospects', 'hello@example.com', 1, 0),
(2, 'Anurga1', 'Launchpad A', 'Present', '11-09-2014', '11-30-2014', 1, 'asbc', 'asdf', 'hey@web.com', 2, 0),
(3, 'Reezig Inc.', 'RGUKT', 'Present', '11-02-2014', '11-30-2014', 1, 'hey', 'heyy', 'hello@example.com', 3, 0),
(4, 'Reezig Inc2.', 'RGUKT', 'Present', '11-02-2014', '11-30-2014', 1, 'hey', 'heyy', 'hello@example.com', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `startup_members`
--

CREATE TABLE IF NOT EXISTS `startup_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `startup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `startup_members`
--

INSERT INTO `startup_members` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `startup_id`) VALUES
(1, 'Saksham', 'dxwxw', 'abc@example.com', '465cbe662c3fa31f6fdf58ea06c37591', '798654323', 1),
(2, 'Anurag', 'Gupp', 'gupta.anu1995@gmail.com', '91a1f60fbb24a7e86f6ba8550f625c8f', '1234567899', 2),
(3, 'sud', 'gupta', 'manu.hpotter@gmail.com', '2bedfdd12c6ca524108c3503e040a1fc', '1234567890', 3),
(4, 'sudh', 'gupta', 'manu.hpotter@gmail.com', '2bedfdd12c6ca524108c3503e040a1fc', '1234567890', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
