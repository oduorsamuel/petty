-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 01:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `access_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'oduor', '1', 0),
(2, 'oduorsamuel', 'samuel', 0),
(3, 'petty', 'pro', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_payments`
--

CREATE TABLE `mobile_payments` (
  `transLoID` int(11) NOT NULL,
  `TransactionType` varchar(10) NOT NULL,
  `TransID` varchar(10) NOT NULL,
  `TransTime` varchar(14) NOT NULL,
  `TransAmount` varchar(6) NOT NULL,
  `BusinessShortCode` varchar(6) NOT NULL,
  `BillRefNumber` varchar(6) NOT NULL,
  `InvoiceNumber` varchar(6) NOT NULL,
  `OrgAccountBalance` varchar(10) NOT NULL,
  `ThirdPartyTransID` varchar(10) NOT NULL,
  `MSISDN` varchar(14) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_payments`
--

INSERT INTO `mobile_payments` (`transLoID`, `TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`) VALUES
(43, 'Pay Bill', 'NFE01H8ON2', '2019-06-11', '129', '600580', 'inv130', '', '70247.00', '', '254708374149', 'John', 'J.', 'Doe'),
(46, 'Pay Bill', 'NFE11H8ON3', '2019-06-12', '23000.', '600580', '14', '', '93247.00', '', '254708374149', 'John', 'J.', 'Doe'),
(49, 'Pay Bill', 'NFE41H8ON6', '20190614115447', '25000', '600580', '12', '', '118247.00', '', '254708374149', 'John', 'J.', 'Doe'),
(52, 'Pay Bill', 'NFE21H8OQG', '20190614135154', '65.00', '600580', 'inv12', '', '118312.00', '', '254708374149', 'John', 'J.', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `adm` varchar(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `student_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`adm`, `first_name`, `last_name`, `school`, `department`, `program`, `student_password`) VALUES
('', '', '', '', '', '', '$2y$10$RFTkuWWu0PTct.N56YBdFeFievNNl3YeDDPnwQjztYUC2Fkgf4Cru'),
('0', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$WhsFp/0gIZW8gRGWz3n7GuxFNIvkTj6.CzLx349MkCjNUxw4I..iK'),
('2', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$UaXbv15AWvyMcRTunrB/zetk4uDaBb5QjTm7NveVKt8PJ8qrEXg4q'),
('3', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$/jTbxZ24ACmrgw5n/H/di.uQq6q/80ZDVk2TdgNfYBYY.LIYUIZgm'),
('67', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$ii0kmf/Q0x638UgYzDO7XudAIeSj8SX6.MZDgpRAkau2dOYunYGeu'),
('ci/000/25/015', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$zHgG5.ZPSaXVYMsEw8cT3uZHVZ7JohUZTHAG4oS/sz7Bi/hWeK7NK'),
('ci/000/25/0153', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$pNwbAtWUs.W/RMPCmtyXvufv9o7Oya70jYWm/gmqLoW03MX8JEG3K'),
('ci/000/25/0157', 'ruth', 'ruth', 'computing', 'scjhjh', 'sam', '$2y$10$6nIkaoBHVndJwyUZuzNXWOSxRy.0NyZw5XA/S1EVHaLsvZlb422R2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  ADD PRIMARY KEY (`transLoID`),
  ADD UNIQUE KEY `TransID` (`TransID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`adm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  MODIFY `transLoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
