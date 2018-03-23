-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 04:53 AM
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
  `sDate` date NOT NULL,
  `sTime` time NOT NULL,
  `BidFile` text NOT NULL,
  `Status` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`BidderID`, `TenderID`, `sDate`, `sTime`, `BidFile`, `Status`, `Description`) VALUES
('eranga', 'Ted002 ', '2017-12-12', '09:24:11', '../../BidSub/pdf4.pdf', 0, ''),
('eranga', 'Ted003 ', '2017-12-12', '09:23:41', '../../BidSub/pdf4.pdf', 1, 'I won the group project badly'),
('eranga', 'Ted004 ', '2017-12-12', '09:22:19', '../../BidSub/pdf4.pdf', 0, ''),
('logi', 'Ted003 ', '2017-12-11', '09:37:02', '../../BidSub/3.pdf', 2, 'I won the group project badly');

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
  `TdFile` text NOT NULL,
  `BidderKey` varchar(100) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bemail` varchar(50) NOT NULL,
  `Bcontact` int(10) NOT NULL,
  `Status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`BidderID`, `TdFile`, `BidderKey`, `Name`, `Bemail`, `Bcontact`, `Status`) VALUES
('eranga', 'bidderinfo/pdf3.pdf', '56bf17790c09fd4cdf848c8290e0405a', 'eranga', 'eramga@gmail.com', 744445547, 1),
('kobi123', 'BidSub/2015-2.pdf', '202cb962ac59075b964b07152d234b70', 'Kovarthanan', '2011ava@gmail.com', 776286912, 1),
('logi', 'bidderinfo/pdf2.pdf', '56bf17790c09fd4cdf848c8290e0405a', 'Virtusa', 'kjkeesan@gmail.com', 778791127, 1),
('nisal', 'bidderinfo/pdf4.pdf', '56bf17790c09fd4cdf848c8290e0405a', 'Sysco Lab', 'nisal@gmail.com', 769679133, 1),
('pasindu', 'bidderinfo/pdf3.pdf', '56bf17790c09fd4cdf848c8290e0405a', 'Cambio', 'pasindurohana@gmail.com', 712840598, 0);

-- --------------------------------------------------------

--
-- Table structure for table `finaleval`
--

CREATE TABLE `finaleval` (
  `TenderID` varchar(100) NOT NULL,
  `BidderID` varchar(100) NOT NULL,
  `AvgScore` float NOT NULL,
  `Docs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finaleval`
--

INSERT INTO `finaleval` (`TenderID`, `BidderID`, `AvgScore`, `Docs`) VALUES
('Ted002 ', 'eranga', 65, 1),
('Ted003 ', 'eranga', 82.5, 2),
('Ted003 ', 'logi', 86, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gaccess`
--

CREATE TABLE `gaccess` (
  `TecID` varchar(100) NOT NULL,
  `TenderID` varchar(100) NOT NULL,
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaccess`
--

INSERT INTO `gaccess` (`TecID`, `TenderID`, `Status`) VALUES
('tec1', 'Ted002', 1),
('tec2', 'Ted002', 1),
('tec1', 'Ted003', 1),
('tec2', 'Ted003', 1),
('tec1', 'Ted004', 1),
('tec2', 'Ted004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `OperatorID` varchar(10) NOT NULL,
  `OperatorKey` varchar(100) NOT NULL,
  `Oemail` varchar(50) NOT NULL,
  `Ocontact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`OperatorID`, `OperatorKey`, `Oemail`, `Ocontact`) VALUES
('kobi', 'ca3a311ca4500526f141cb881a184882', 'kobirt@gmail.com', 77),
('Op001', 'kobi', 'kobi@gmail.com', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `pasttender`
--

CREATE TABLE `pasttender` (
  `TenderID` varchar(10) NOT NULL,
  `TenderTitle` varchar(100) NOT NULL,
  `TenderFile` text NOT NULL,
  `TOwner` text NOT NULL,
  `CDate` date NOT NULL,
  `CTime` time NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasttender`
--

INSERT INTO `pasttender` (`TenderID`, `TenderTitle`, `TenderFile`, `TOwner`, `CDate`, `CTime`, `Category`) VALUES
('', '', '', '', '0000-00-00', '00:00:00', ''),
('T0011', 'Laptops', '', 'UCSC', '2017-12-11', '00:20:17', 'Work'),
('Ted002', 'Required 50 Tables  ', '../../../tenderinfo/03 - Octave - I.pdf', 'GK (Pvt) Lt', '2017-12-03', '00:20:17', 'Goods'),
('Ted003', 'Required 40 laptops', '../../../tenderinfo/02 - PHP - I.pdf', 'UCSC', '2017-12-10', '00:20:17', 'Goods'),
('Ted004', 'Required 60 laptops', '../../../tenderinfo/02 - PHP - I.pdf', 'Bodim', '2017-12-11', '00:20:17', 'Goods');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `PcID` varchar(100) NOT NULL,
  `PcName` varchar(100) NOT NULL,
  `PcEmail` varchar(100) NOT NULL,
  `PcContact` varchar(100) NOT NULL,
  `PcKey` varchar(100) NOT NULL,
  `PcAbout` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`PcID`, `PcName`, `PcEmail`, `PcContact`, `PcKey`, `PcAbout`) VALUES
('krishan123', 'Krishan fdsds', 'krishan@gmail.com', '0712845454', 'krishan123', 'fdsfsdfs'),
('PC001', 'Pasindu Navod', 'navod@gmail.com', '098899876', '695f75582757373a94dad53f0203cfca', 'cxjhcbzz'),
('pc1', 'Pasindu', 'pasindu@gmail.com', '0776765678', '56bf17790c09fd4cdf848c8290e0405a', ''),
('rohana123', 'Rohana Weerasinghe', 'rohana@gmail.com', '0712845454', 'rohana123', 'fdsfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `tec`
--

CREATE TABLE `tec` (
  `TecID` varchar(21) NOT NULL,
  `TecName` varchar(23) NOT NULL,
  `TecMail` varchar(32) NOT NULL,
  `TpNO` int(12) NOT NULL,
  `Spc` varchar(35) NOT NULL,
  `TecPwd` varchar(100) NOT NULL,
  `TecAbout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tec`
--

INSERT INTO `tec` (`TecID`, `TecName`, `TecMail`, `TpNO`, `Spc`, `TecPwd`, `TecAbout`) VALUES
('T12', 'logi', 'logi@gmail.com', 77, 'works', '985600', 'i am tec'),
('tec1', 'Pasinduwee', 'pasin@gmail.com', 712840598, 'Goods', '56bf17790c09fd4cdf848c8290e0405a', ''),
('Tec13', 'Krishan Rajapaksha', 'krishan@gmail.com', 714554456, 'Goods', '695f75582757373a94dad53f0203cfca', 'ghjm'),
('tec2', 'Navod', 'navod@gmail.com', 775566567, 'Works', '56bf17790c09fd4cdf848c8290e0405a', '');

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
('tec1', 'Ted002 ', 'eranga', 'evaluated_pdfs/pdf2.pdf', 65),
('tec1', 'Ted003 ', 'eranga', 'evaluated_pdfs/pdf3.pdf', 84),
('tec1', 'Ted003 ', 'logi', 'evaluated_pdfs/', 86),
('tec2', 'Ted003 ', 'eranga', 'evaluated_pdfs/pdf2.pdf', 81);

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `TenderID` varchar(10) NOT NULL,
  `TenderTitle` varchar(100) NOT NULL,
  `TenderFile` text NOT NULL,
  `TOwner` text NOT NULL,
  `ODate` date NOT NULL,
  `OTime` time NOT NULL,
  `CDate` date NOT NULL,
  `CTime` time NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`TenderID`, `TenderTitle`, `TenderFile`, `TOwner`, `ODate`, `OTime`, `CDate`, `CTime`, `Category`) VALUES
('Ted002', 'Required 50 Chairs', '../../../tenderinfo/03 - Octave - I.pdf', 'GK (Pvt) Lt', '2017-12-11', '08:52:56', '2017-12-03', '15:30:00', 'Goods'),
('Ted003', 'Required 40 laptops', '../../../tenderinfo/02 - PHP - I.pdf', 'UCSC', '2017-12-11', '08:55:08', '2017-12-10', '15:00:00', 'Goods'),
('Ted004', 'Required 60 fans', '../../../tenderinfo/02 - PHP - I.pdf', 'Bodim', '2017-12-11', '08:55:08', '2017-12-11', '15:00:00', 'Goods');

-- --------------------------------------------------------

--
-- Table structure for table `wbid`
--

CREATE TABLE `wbid` (
  `BidderID` varchar(10) NOT NULL,
  `TenderID` varchar(10) NOT NULL,
  `Amount` decimal(25,0) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbid`
--

INSERT INTO `wbid` (`BidderID`, `TenderID`, `Amount`, `Date`) VALUES
('B98765', 'T123456', '250000', '2017-10-11 07:30:36'),
('B74523', 'T36587', '78000', '2017-10-26 09:24:26'),
('B98765', 'T123456', '250000', '2017-10-11 07:30:36'),
('B74523', 'T36587', '78000', '2017-10-26 09:24:26'),
('B98765', 'T123456', '250000', '2017-10-11 07:30:36'),
('B74523', 'T36587', '78000', '2017-10-26 09:24:26'),
('B98765', 'T123456', '250000', '2017-10-11 07:30:36'),
('B74523', 'T36587', '78000', '2017-10-26 09:24:26'),
('B56789', 'T23456', '985000', '2017-10-11 07:30:35'),
('B45376', 'T6549', '745000', '2017-09-26 08:30:26'),
('B56789', 'T23456', '985000', '2017-10-11 07:30:35'),
('B45376', 'T6549', '745000', '2017-09-26 08:30:26');

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
-- Indexes for table `finaleval`
--
ALTER TABLE `finaleval`
  ADD PRIMARY KEY (`TenderID`,`BidderID`),
  ADD KEY `BidderID` (`BidderID`);

--
-- Indexes for table `gaccess`
--
ALTER TABLE `gaccess`
  ADD PRIMARY KEY (`TenderID`,`TecID`),
  ADD KEY `TecID` (`TecID`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`OperatorID`);

--
-- Indexes for table `pasttender`
--
ALTER TABLE `pasttender`
  ADD PRIMARY KEY (`TenderID`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`PcID`);

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
-- Indexes for table `wbid`
--
ALTER TABLE `wbid`
  ADD KEY `BidderID` (`BidderID`);

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
-- Constraints for table `finaleval`
--
ALTER TABLE `finaleval`
  ADD CONSTRAINT `finaleval_ibfk_1` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `finaleval_ibfk_2` FOREIGN KEY (`BidderID`) REFERENCES `bidder` (`BidderID`);

--
-- Constraints for table `gaccess`
--
ALTER TABLE `gaccess`
  ADD CONSTRAINT `gaccess_ibfk_1` FOREIGN KEY (`TecID`) REFERENCES `tec` (`TecID`),
  ADD CONSTRAINT `gaccess_ibfk_2` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `gaccess_ibfk_3` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `gaccess_ibfk_4` FOREIGN KEY (`TecID`) REFERENCES `tec` (`TecID`),
  ADD CONSTRAINT `gaccess_ibfk_5` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`);

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
