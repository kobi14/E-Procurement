-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2017 at 11:01 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procurement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `BidderID` varchar(100) NOT NULL,
  `TenderID` varchar(100) NOT NULL,
  `BidDate` date NOT NULL,
  `BidFile` text NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`BidderID`, `TenderID`, `BidDate`, `BidFile`, `Status`) VALUES
('b12345', 'T46', '0000-00-00', 'files/pdf1.pdf', 0),
('b45636', 'T12', '2017-12-02', 'files/pdf2.pdf', 0),
('b45636', 'T45', '2017-12-11', 'files/pdf1.pdf', 0),
('b71234', 'T12', '2017-12-09', 'files/pdf1.pdf', 0),
('B78596', 'T12', '2017-12-27', 'files/pdf1.pdf', 0);

--
-- Triggers `bid`
--
DELIMITER $$
CREATE TRIGGER `copybid` AFTER INSERT ON `bid` FOR EACH ROW INSERT INTO finaleval(TenderID,BidderID) VALUES (new.TenderID,new.BidderID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE `bidder` (
  `BidderID` varchar(10) NOT NULL,
  `TdFile` mediumblob NOT NULL,
  `BidderKey` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bemail` varchar(50) NOT NULL,
  `Bcontact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`BidderID`, `TdFile`, `BidderKey`, `Name`, `Bemail`, `Bcontact`) VALUES
('B10001', 0x6c696272695f7065725f6d73692e706466, '123654', 'Pasindu Weerainghe', '', 0),
('b12345', '', '123456789', 'Pasindu', '', 0),
('b12349', 0x6c696272695f7065725f6d73692e706466, 'root', 'Kasun Kalhara', '', 0),
('b23458', 0x496e74726f64756374696f6e2841756720347468292e706466, 'kill', 'keesan Kalpana', '', 0),
('b45636', 0x496e74726f64756374696f6e2841756720347468292e706466, '123', 'Hasith', 'kjkeesan@gmail.com', 112361790),
('b71234', 0x4c656374757265203220284175672031317468292e706466, '123', 'Punsala Rohana', '', 0),
('B78596', 0x496e74726f64756374696f6e2841756720347468292e706466, 'Hello123', 'Nisal', 'kjkeesan@gmail.com', 112361790);

-- --------------------------------------------------------

--
-- Table structure for table `bid_permission`
--

CREATE TABLE `bid_permission` (
  `TenderID` varchar(250) NOT NULL,
  `TecID` varchar(250) NOT NULL,
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_permission`
--

INSERT INTO `bid_permission` (`TenderID`, `TecID`, `Status`) VALUES
('T12', 'hasith123', 1),
('T12', 'pasindu124', 1),
('T45', 'hasith123', 1),
('T45', 'pasindu124', 1);

-- --------------------------------------------------------

--
-- Table structure for table `finaleval`
--

CREATE TABLE `finaleval` (
  `TenderID` varchar(100) NOT NULL,
  `BidderID` varchar(100) NOT NULL,
  `AvgScore` int(10) NOT NULL,
  `Docs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finaleval`
--

INSERT INTO `finaleval` (`TenderID`, `BidderID`, `AvgScore`, `Docs`) VALUES
('T12', 'b45636', 120, 1),
('T12', 'b71234', 0, 0),
('T12', 'B78596', 0, 0),
('T45', 'b45636', 0, 0),
('T46', 'b12345', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `OperatorID` varchar(10) NOT NULL,
  `OperatorKey` varchar(15) NOT NULL,
  `Oemail` varchar(50) NOT NULL,
  `Ocontact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pcm`
--

CREATE TABLE `pcm` (
  `ProcurementID` varchar(10) NOT NULL,
  `ProcurementKey` varchar(15) NOT NULL,
  `Pemail` varchar(50) NOT NULL,
  `Pcontact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tec`
--

CREATE TABLE `tec` (
  `TecID` varchar(10) NOT NULL,
  `TecName` varchar(50) NOT NULL,
  `TecEmail` varchar(50) NOT NULL,
  `TecContact` varchar(15) NOT NULL,
  `TecKey` varchar(50) NOT NULL,
  `TecAbout` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tec`
--

INSERT INTO `tec` (`TecID`, `TecName`, `TecEmail`, `TecContact`, `TecKey`, `TecAbout`) VALUES
('hasith123', 'Hasith Lakshan', 'hasith@gmail.com', '0712840598', 'hasith123', 'hi my name is hasith'),
('nisal124', 'Nisal Weerasinghe', 'nisa@gmail.com', '0725445541', 'nisal123', 'hi my name is nisal'),
('pasindu124', 'Pasindu Weerasinghe', 'pas@gmail.com', '0712840598', 'pasindu', 'hi my name is');

-- --------------------------------------------------------

--
-- Table structure for table `teceval`
--

CREATE TABLE `teceval` (
  `TecID` varchar(100) NOT NULL,
  `TenderID` varchar(100) NOT NULL,
  `BidderID` varchar(100) NOT NULL,
  `EvaluateFile` text NOT NULL,
  `Score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teceval`
--

INSERT INTO `teceval` (`TecID`, `TenderID`, `BidderID`, `EvaluateFile`, `Score`) VALUES
('hasith123', 'T12', 'b45636', 'evaluated_pdfs/sol_mat_1.pdf', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `TenderID` varchar(20) NOT NULL,
  `TenderTitle` varchar(200) NOT NULL,
  `TenderFile` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `OpeningDate` date NOT NULL,
  `ExpireDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`TenderID`, `TenderTitle`, `TenderFile`, `Category`, `OpeningDate`, `ExpireDate`) VALUES
('T12', 'Computers', 'a', 'Cars', '2017-12-08', '2017-12-08'),
('T45', 'Mouses', 'a', 'Laptop', '0000-00-00', '2017-12-08'),
('T46', 'Tvs', 'a', 'Laptop', '2017-12-08', '2017-12-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`BidderID`,`TenderID`),
  ADD KEY `TenderID` (`TenderID`);

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`BidderID`);

--
-- Indexes for table `bid_permission`
--
ALTER TABLE `bid_permission`
  ADD PRIMARY KEY (`TenderID`,`TecID`),
  ADD KEY `TecID` (`TecID`);

--
-- Indexes for table `finaleval`
--
ALTER TABLE `finaleval`
  ADD PRIMARY KEY (`TenderID`,`BidderID`),
  ADD KEY `BidderID` (`BidderID`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`OperatorID`);

--
-- Indexes for table `pcm`
--
ALTER TABLE `pcm`
  ADD PRIMARY KEY (`ProcurementID`);

--
-- Indexes for table `tec`
--
ALTER TABLE `tec`
  ADD PRIMARY KEY (`TecID`);

--
-- Indexes for table `teceval`
--
ALTER TABLE `teceval`
  ADD PRIMARY KEY (`TecID`,`TenderID`,`BidderID`),
  ADD KEY `TenderID` (`TenderID`),
  ADD KEY `BidderID` (`BidderID`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`TenderID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`BidderID`) REFERENCES `bidder` (`BidderID`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`);

--
-- Constraints for table `bid_permission`
--
ALTER TABLE `bid_permission`
  ADD CONSTRAINT `bid_permission_ibfk_1` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `bid_permission_ibfk_2` FOREIGN KEY (`TecID`) REFERENCES `tec` (`TecID`);

--
-- Constraints for table `finaleval`
--
ALTER TABLE `finaleval`
  ADD CONSTRAINT `finaleval_ibfk_1` FOREIGN KEY (`BidderID`) REFERENCES `bidder` (`BidderID`),
  ADD CONSTRAINT `finaleval_ibfk_2` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`);

--
-- Constraints for table `teceval`
--
ALTER TABLE `teceval`
  ADD CONSTRAINT `teceval_ibfk_1` FOREIGN KEY (`TecID`) REFERENCES `tec` (`TecID`),
  ADD CONSTRAINT `teceval_ibfk_2` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `teceval_ibfk_3` FOREIGN KEY (`BidderID`) REFERENCES `bidder` (`BidderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
