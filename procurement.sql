-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 20, 2017 at 03:17 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `procurement`
--
CREATE DATABASE IF NOT EXISTS `procurement` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `procurement`;

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE IF NOT EXISTS `bidder` (
  `BidderID` varchar(10) NOT NULL,
  `TdFile` mediumblob NOT NULL,
  `BidderKey` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bemail` varchar(50) NOT NULL,
  `Bcontact` int(10) NOT NULL,
  PRIMARY KEY (`BidderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`BidderID`, `TdFile`, `BidderKey`, `Name`, `Bemail`, `Bcontact`) VALUES
('B10001', 0x6c696272695f7065725f6d73692e706466, '123654', 'bill gates', '', 0),
('b123456', '', '123456789', '', '', 0),
('b1234567', 0x6c696272695f7065725f6d73692e706466, 'root', '', '', 0),
('b12345678', 0x4c656374757265203220284175672031317468292e706466, '123', '', '', 0),
('b2345', 0x496e74726f64756374696f6e2841756720347468292e706466, 'kill', 'keesan', '', 0),
('b4563', 0x496e74726f64756374696f6e2841756720347468292e706466, '123', 'procurer', 'kjkeesan@gmail.com', 112361790),
('B7859637', 0x496e74726f64756374696f6e2841756720347468292e706466, 'Hello123', 'Perera and Sons', 'kjkeesan@gmail.com', 112361790);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `OperatorID` varchar(10) NOT NULL,
  `OperatorKey` varchar(15) NOT NULL,
  `Oemail` varchar(50) NOT NULL,
  `Ocontact` int(10) NOT NULL,
  PRIMARY KEY (`OperatorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pcm`
--

CREATE TABLE IF NOT EXISTS `pcm` (
  `ProcurementID` varchar(10) NOT NULL,
  `ProcurementKey` varchar(15) NOT NULL,
  `Pemail` varchar(50) NOT NULL,
  `Pcontact` int(10) NOT NULL,
  PRIMARY KEY (`ProcurementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
