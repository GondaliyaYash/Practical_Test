-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `emaildetails`
--

---- Note DataBase Name : testdb

CREATE TABLE `emaildetails` (
  `Id` int(11) NOT NULL,
  `FromUserId` int(11) DEFAULT NULL,
  `ToUserId` int(11) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` varchar(500) DEFAULT NULL,
  `SentAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emaildetails`
--

INSERT INTO `emaildetails` (`Id`, `FromUserId`, `ToUserId`, `Subject`, `Message`, `SentAt`) VALUES
(1, 1, 3, 'Test', 'Testing page', '2024-08-13 16:31:53'),
(4, 1, 3, 'test2', 'testing purpose', '2024-08-13 16:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `UserName`, `Email`, `Password`) VALUES
(1, 'Yash', 'yash@yopmail.com', '111'),
(3, 'test', 'test@yopmail.com', '111'),
(5, 'test2', 'test2@yopmail.com', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emaildetails`
--
ALTER TABLE `emaildetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emaildetails`
--
ALTER TABLE `emaildetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
