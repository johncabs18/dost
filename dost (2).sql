-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2015 at 02:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dost`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `contact_num` bigint(20) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `customer_name`, `contact_num`) VALUES
(18, 'Johncabs', 9169739874),
(19, 'Riste Jess', 9168888888);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `lab_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_name` varchar(50) NOT NULL,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_name`) VALUES
(1, 'Chemical Testing Lab'),
(2, 'Microbiological Testing Lab'),
(3, 'Accelerated Shelf-Life Evaluation Lab'),
(4, 'Regional Metrology Lab');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_note` date NOT NULL,
  `note` varchar(10000) NOT NULL,
  `type_lab` varchar(50) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sampletype`
--

CREATE TABLE IF NOT EXISTS `sampletype` (
  `sample_cb_id` int(11) NOT NULL AUTO_INCREMENT,
  `sample_type_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`sample_cb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sampletype`
--

INSERT INTO `sampletype` (`sample_cb_id`, `sample_type_name`) VALUES
(1, 'Water'),
(3, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `sample_qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sched_date` date NOT NULL,
  `parameter` varchar(500) NOT NULL,
  `sample_type` varchar(500) NOT NULL,
  `laboratory` varchar(100) NOT NULL,
  `type_communication` varchar(500) NOT NULL,
  `communication_date` date NOT NULL,
  `scheduled_by` varchar(500) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`sched_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `cust_id`, `sample_qty`, `status`, `sched_date`, `parameter`, `sample_type`, `laboratory`, `type_communication`, `communication_date`, `scheduled_by`, `created_on`) VALUES
(6, 18, 2, 'OK', '2015-02-16', 'Dasdasd', 'Water', 'Chemical Testing Lab', 'Telephone-in', '2015-02-15', 'Maam Julie', '2015-02-03'),
(7, 18, 6, 'OK', '2015-02-28', 'Dasdasd', 'Water', 'Microbiological Testing Lab', 'Walk-in', '2015-02-15', 'Maam Julie', '2015-02-10'),
(8, 19, 2, 'OK', '2015-03-05', '123asdasd', 'Water', 'Accelerated Shelf-Life Evaluation Lab', 'Walk-in', '2015-02-15', 'Riste', '2015-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5000) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `password`, `createdOn`) VALUES
(1, 'John Cabardo Jr.', 'johncabs', 'e10adc3949ba59abbe56e057f20f883e', '2015-01-23 02:30:10'),
(5, 'John', 'johncabs', 'e10adc3949ba59abbe56e057f20f883e', '2015-02-15 09:20:59');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
