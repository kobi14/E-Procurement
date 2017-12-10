-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2017 at 07:45 AM
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
('b45636', 'T12', '2017-12-02', 'files/pdf2.pdf', 1),
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
  `TdFile` text NOT NULL,
  `BidderKey` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Bemail` varchar(50) NOT NULL,
  `Bcontact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`BidderID`, `TdFile`, `BidderKey`, `Name`, `Bemail`, `Bcontact`) VALUES
('B10001', 'filis/bri_per_msi.pdf', '123654', 'Pasindu Weerainghe', '', 0),
('b12345', '', '123456789', 'Pasindu', '', 0),
('b12349', 'libri_per_msi.pdf', 'root', 'Kasun Kalhara', '', 0),
('b23458', 'Introduction(Aug 4th).pdf', 'kill', 'keesan Kalpana', '', 0),
('b45636', 'Introduction(Aug 4th).pdf', '123', 'Hasith', 'kjkeesan@gmail.com', 112361790),
('b71234', 'files/pdf1.pdf', '123', 'Punsala Rohana', '', 0),
('B78596', 'Introduction(Aug 4th).pdf', 'Hello123', 'Nisal', 'kjkeesan@gmail.com', 112361790);

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
('T12', 'b45636', 120, 1),
('T12', 'b71234', 256, 1),
('T12', 'B78596', 452, 1),
('T45', 'b45636', 603.5, 2),
('T46', 'b12345', 0, 0);

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
('pasindu124', 'T45', 1),
('hasith123', 'T46', 1);

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
('rohana123', 'Rohana Weerasinghe', 'rohana@gmail.com', '0712845454', 'rohana123', 'fdsfsdfs');

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
('hasith123', 'T12', 'b45636', 'evaluated_pdfs/sol_mat_1.pdf', 120),
('hasith123', 'T12', 'b71234', 'evaluated_pdfs/sol_sinhala_III.pdf', 256),
('hasith123', 'T12', 'B78596', 'evaluated_pdfs/sol_ICT_II nw.pdf', 452),
('hasith123', 'T45', 'b45636', 'evaluated_pdfs/sinhala-2016 à¶¯à·™à·€à¶± à·€à·à¶» à¶´à¶»à·“à¶šà·Šà·‚à¶«à¶º (à¶¶à·ƒà·Šà¶±à·à·„à·’à¶» à¶´à·…à·à¶­).pdf', 785),
('pasindu124', 'T45', 'b45636', 'evaluated_pdfs/sol_sinhala_II.pdf', 422);

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
  ADD CONSTRAINT `finaleval_ibfk_1` FOREIGN KEY (`BidderID`) REFERENCES `bidder` (`BidderID`),
  ADD CONSTRAINT `finaleval_ibfk_2` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`);

--
-- Constraints for table `gaccess`
--
ALTER TABLE `gaccess`
  ADD CONSTRAINT `gaccess_ibfk_1` FOREIGN KEY (`TenderID`) REFERENCES `tender` (`TenderID`),
  ADD CONSTRAINT `gaccess_ibfk_2` FOREIGN KEY (`TecID`) REFERENCES `tec` (`TecID`);

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
