-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 11:32 PM
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
  `label` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `desks`
--

INSERT INTO `desks` (`id`, `space`, `row`, `column`, `label`) VALUES
(1, 'Launchpad A', 1, 1, 1),
(2, 'Launchpad A', 1, 2, 2),
(3, 'Launchpad A', 1, 3, 3),
(4, 'Launchpad A', 1, 4, 4),
(5, 'Launchpad A', 2, 1, 5),
(6, 'Launchpad A', 2, 2, 6),
(7, 'Launchpad A', 2, 3, 7),
(8, 'Launchpad A', 2, 4, 8),
(9, 'Launchpad A', 3, 1, 9),
(10, 'Launchpad A', 3, 2, 10),
(11, 'Launchpad A', 3, 3, 11),
(12, 'Launchpad A', 3, 4, 12),
(13, 'Launchpad A', 3, 5, 13),
(14, 'Launchpad A', 4, 1, 14),
(15, 'Launchpad A', 4, 2, 15),
(16, 'Launchpad A', 4, 3, 16),
(17, 'Launchpad A', 4, 4, 17),
(18, 'Launchpad A', 4, 5, 18),
(19, 'Launchpad A', 5, 1, 19),
(20, 'Launchpad A', 5, 2, 20),
(21, 'Launchpad A', 5, 3, 21),
(22, 'Launchpad A', 5, 4, 22),
(23, 'Launchpad B', 1, 1, 1),
(24, 'Launchpad B', 1, 2, 2),
(25, 'Launchpad B', 1, 3, 3),
(26, 'Launchpad B', 1, 4, 4),
(27, 'Launchpad B', 2, 1, 5),
(28, 'Launchpad B', 2, 2, 6),
(29, 'Launchpad B', 2, 3, 7),
(30, 'Launchpad B', 2, 4, 8),
(31, 'Launchpad B', 3, 1, 9),
(32, 'Launchpad B', 3, 2, 10),
(33, 'Launchpad B', 3, 3, 11),
(34, 'Launchpad B', 3, 4, 12),
(35, 'Launchpad B', 3, 5, 13),
(36, 'Launchpad B', 3, 6, 14),
(37, 'Launchpad B', 4, 1, 15),
(38, 'Launchpad B', 4, 2, 16),
(39, 'Launchpad B', 4, 3, 17),
(40, 'Launchpad B', 5, 1, 18),
(41, 'Launchpad B', 5, 2, 19),
(42, 'Launchpad B', 5, 3, 20),
(43, 'Launchpad B', 5, 4, 21),
(44, 'Launchpad B', 5, 5, 22),
(45, 'Launchpad B', 5, 6, 23),
(46, 'IBM', 1, 1, 1),
(47, 'IBM', 1, 2, 2),
(48, 'IBM', 1, 3, 3),
(49, 'IBM', 1, 4, 4),
(50, 'IBM', 1, 5, 5),
(51, 'IBM', 2, 1, 6),
(52, 'IBM', 2, 2, 7),
(53, 'IBM', 2, 3, 8),
(54, 'IBM', 2, 4, 9),
(55, 'IBM', 3, 1, 10),
(56, 'IBM', 3, 2, 11),
(57, 'IBM', 3, 3, 12),
(58, 'IBM', 3, 4, 13),
(59, 'IBM', 3, 5, 14),
(60, 'IBM', 3, 6, 15),
(61, 'IBM', 4, 1, 16),
(62, 'IBM', 4, 2, 17),
(63, 'IBM', 4, 3, 18);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `desk_log`
--

INSERT INTO `desk_log` (`id`, `desk_id`, `year`, `month`, `startup_id`) VALUES
(1, 2, 2014, 11, 2),
(2, 7, 2014, 3, 10),
(3, 11, 2014, 3, 10),
(4, 7, 2014, 4, 10),
(5, 11, 2014, 4, 10),
(6, 7, 2014, 5, 10),
(7, 11, 2014, 5, 10),
(8, 7, 2014, 6, 10),
(9, 11, 2014, 6, 10),
(10, 7, 2014, 7, 10),
(11, 11, 2014, 7, 10),
(12, 7, 2014, 8, 10),
(13, 11, 2014, 8, 10),
(14, 7, 2014, 9, 10),
(15, 11, 2014, 9, 10),
(16, 7, 2014, 10, 10),
(17, 11, 2014, 10, 10),
(18, 7, 2014, 11, 10),
(19, 11, 2014, 11, 10),
(20, 7, 2014, 12, 10),
(21, 11, 2014, 12, 10),
(22, 7, 2015, 1, 10),
(23, 11, 2015, 1, 10),
(24, 7, 2015, 2, 10),
(25, 11, 2015, 2, 10),
(26, 7, 2015, 3, 10),
(27, 11, 2015, 3, 10),
(28, 7, 2015, 4, 10),
(29, 11, 2015, 4, 10),
(30, 7, 2015, 5, 10),
(31, 11, 2015, 5, 10),
(32, 7, 2015, 6, 10),
(33, 11, 2015, 6, 10),
(34, 7, 2015, 7, 10),
(35, 11, 2015, 7, 10),
(36, 7, 2015, 8, 10),
(37, 11, 2015, 8, 10),
(38, 7, 2015, 9, 10),
(39, 11, 2015, 9, 10),
(40, 7, 2015, 10, 10),
(41, 11, 2015, 10, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `room_log`
--

INSERT INTO `room_log` (`id`, `room_id`, `year`, `month`, `startup_id`) VALUES
(1, 5, 2014, 11, 1),
(3, 7, 2014, 11, 4),
(4, 2, 2014, 11, 7),
(5, 2, 2014, 12, 7),
(6, 2, 2015, 1, 7),
(7, 2, 2015, 2, 7),
(8, 2, 2015, 3, 7),
(9, 2, 2015, 4, 7),
(10, 2, 2015, 5, 7),
(11, 2, 2015, 6, 7),
(12, 2, 2015, 7, 7),
(13, 2, 2015, 8, 7),
(14, 2, 2015, 9, 7),
(15, 2, 2015, 10, 7),
(16, 2, 2015, 11, 7),
(17, 2, 2015, 12, 7),
(18, 2, 2016, 1, 7),
(19, 2, 2016, 2, 7),
(20, 2, 2016, 3, 7),
(21, 2, 2016, 4, 7),
(22, 2, 2016, 5, 7),
(23, 2, 2016, 6, 7),
(24, 2, 2016, 7, 7),
(25, 2, 2016, 8, 7),
(26, 2, 2016, 9, 7),
(27, 2, 2016, 10, 7),
(28, 2, 2016, 11, 7),
(29, 2, 2016, 12, 7),
(30, 2, 2017, 1, 7),
(31, 2, 2017, 2, 7),
(32, 2, 2017, 3, 7),
(33, 2, 2017, 4, 7),
(34, 2, 2017, 5, 7),
(35, 2, 2017, 6, 7),
(36, 2, 2017, 7, 7),
(37, 2, 2017, 8, 7),
(38, 2, 2017, 9, 7),
(39, 2, 2017, 10, 7),
(40, 2, 2017, 11, 7),
(41, 2, 2017, 12, 7),
(42, 2, 2018, 1, 7),
(43, 2, 2018, 2, 7),
(44, 2, 2018, 3, 7),
(45, 2, 2018, 4, 7),
(46, 2, 2018, 5, 7),
(47, 2, 2018, 6, 7),
(48, 2, 2018, 7, 7),
(49, 2, 2018, 8, 7),
(50, 2, 2018, 9, 7),
(51, 2, 2018, 10, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `spaces`
--

INSERT INTO `spaces` (`id`, `type`, `name`, `rows`, `floor`) VALUES
(1, 'Wing', 'RGUKT', 0, 'Ground'),
(2, 'Co-Working', 'Launchpad A', 5, ''),
(3, 'Co-Working', 'Launchpad B', 5, ''),
(5, 'Co-Working', 'IBM', 4, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `startups`
--

INSERT INTO `startups` (`id`, `name`, `space`, `status`, `joining_date`, `ending_date`, `employees`, `domain`, `description`, `web_address`, `p1_id`, `p2_id`) VALUES
(1, 'Anurag', 'RGUKT', 'Present', '11-10-2014', '11-30-2014', 1, 'Startup', 'enginnering prospects', 'hello@example.com', 1, 0),
(2, 'Anurga1', 'Launchpad A', 'Present', '11-09-2014', '11-30-2014', 1, 'asbc', 'asdf', 'hey@web.com', 2, 0),
(3, 'Reezig Inc.', 'RGUKT', 'Present', '11-02-2014', '11-30-2014', 1, 'hey', 'heyy', 'hello@example.com', 3, 0),
(4, 'Reezig Inc2.', 'RGUKT', 'Present', '11-02-2014', '11-30-2014', 1, 'hey', 'heyy', 'hello@example.com', 4, 0),
(5, 'New Startup', 'RGUKT', 'Present', '11-17-2014', '12-26-2019', 15, 'Developers', 'Test startup', 'www.startup.com', 5, 6),
(7, 'Reezig Inc.2', 'RGUKT', 'Present', '11-23-2014', '10-24-2018', 3, 'Developers', 'Test startup 2', 'www.startup2.com', 8, 9),
(9, 'Reezig Inc.765', 'Launchpad A', 'Present', '11-26-2014', '12-03-2014', 2, 'None', '', '', 11, 12),
(10, 'The Beast', 'Launchpad A', 'Present', '03-03-2014', '10-26-2015', 2, 'VeleLog', '', '', 13, 14);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `startup_members`
--

INSERT INTO `startup_members` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `startup_id`) VALUES
(1, 'Saksham', 'dxwxw', 'abc@example.com', '465cbe662c3fa31f6fdf58ea06c37591', '798654323', 1),
(2, 'Anurag', 'Gupp', 'gupta.anu1995@gmail.com', '91a1f60fbb24a7e86f6ba8550f625c8f', '1234567899', 2),
(3, 'sud', 'gupta', 'manu.hpotter@gmail.com', '2bedfdd12c6ca524108c3503e040a1fc', '1234567890', 3),
(4, 'sudh', 'gupta', 'manu.hpotter@gmail.com', '2bedfdd12c6ca524108c3503e040a1fc', '1234567890', 4),
(5, 'Saksham', 'Aggarwal', 's.agg@live.com', 'a05501346388b7dd137ead09c92d19e7', '7569156769', 5),
(6, 'Saksham', 'Aggarwal', 's.agg@live.com', 'a05501346388b7dd137ead09c92d19e7', '7569156769', 5),
(7, 'Saksham', 'Aggarwal', 'admin@example.com', '3839f134aaa44f7fd9fc386a8c901d15', '7569156769', 5),
(8, 'Saksham', 'Aggarwal', 's.agg@live.com', 'a05501346388b7dd137ead09c92d19e7', '7569156769', 7),
(9, 'Saksham', 'Aggarwal', 's.agg@live.com', 'a05501346388b7dd137ead09c92d19e7', '7569156769', 7),
(10, 'Gaurav', 'gupta', 'root', 'ce96201e2870d230ef249c1cd842a964', '1234567890', 7),
(11, 'Saksham', 'Aggarwal', 's.agg@live.com', 'a05501346388b7dd137ead09c92d19e7', '7569156769', 9),
(12, 'xwdxwd', 'gupta', 'admin@example.com', '3839f134aaa44f7fd9fc386a8c901d15', '8y927398472', 9),
(13, 'Anu', 'Gup', 'anu.gup@gml.cm', '9470dc1cfeebd1d8ec5be0e7a35bb466', '1234567890', 10),
(14, 'Apr', 'Grg', 'apr.grg@yah.cm', 'b2e82d55d6b6e48ff2f157b985da2ff7', '9856321470', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
