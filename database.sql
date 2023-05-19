-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 06:17 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_mk` varchar(100) NOT NULL,
  `hoten` text NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` text NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `role_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password_mk`, `hoten`, `ngaysinh`, `email`, `sdt`, `role_user`) VALUES
('90080010', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn Admin', '2000-05-12', 'tanphat5671985@gmail.com', '0836925412', 1),
('51800341', 'An12345', 'e10adc3949ba59abbe56e057f20f883e', 'Trinh Phieu An', '2020-12-09', 'trinhphieuan@gmail.com', '0367430529', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tableID` int(11) NOT NULL,
  `types` varchar(250) NOT NULL,
  `prices` float NOT NULL,
  `timeToStart` time NOT NULL,
  `timeToEnd` time NOT NULL,
  `customerName` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`orderID`, `quantity`, `tableID`, `types`, `prices`, `timeToStart`, `timeToEnd`, `customerName`) VALUES
(654, 1, 995, 'Bida crom', 75000, '10:00:00', '11:00:00', 'Trinh Phieu An');

-- --------------------------------------------------------

--
-- Table structure for table `billiards`
--

CREATE TABLE `billiards` (
  `tableID` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `types` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `prices` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billiards`
--

INSERT INTO `billiards` (`tableID`, `numbers`, `types`, `prices`) VALUES
(995, 1, 'Bida snooker', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(100) NOT NULL,
  `employeeName` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `birthDate` date NOT NULL,
  `phone` varchar(100) NOT NULL,
  `salary` float NOT NULL,
  `position` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `typeofbilliards`
--

CREATE TABLE `typeofbilliards` (
  `typeID` int(11) NOT NULL,
  `types` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofbilliards`
--

INSERT INTO `typeofbilliards` (`typeID`, `types`) VALUES
(1, 'Bida crom'),
(2, 'Bida snooker'),
(3, 'Bida pool'),
(4, 'Bida 4 bi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `billiards`
--
ALTER TABLE `billiards`
  ADD PRIMARY KEY (`tableID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `typeofbilliards`
--
ALTER TABLE `typeofbilliards`
  ADD PRIMARY KEY (`typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
