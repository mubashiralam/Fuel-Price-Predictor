-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 11:52 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

CREATE TABLE `client_information` (
  `USERNAME` varchar(20) NOT NULL,
  `FULL_NAME` varchar(50) DEFAULT NULL,
  `ADDRESS1` varchar(100) DEFAULT NULL,
  `ADDRESS2` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL,
  `STATE` varchar(2) DEFAULT NULL,
  `ZIPCODE` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_quote`
--

CREATE TABLE `fuel_quote` (
  `QUOTATION_ID` int(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `DATE` varchar(11) NOT NULL,
  `GALLONS` int(11) NOT NULL,
  `TOTAL_PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_information`
--
ALTER TABLE `client_information`
  ADD KEY `FK_USERNAME_UC` (`USERNAME`);

--
-- Indexes for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  ADD PRIMARY KEY (`QUOTATION_ID`),
  ADD KEY `FK_USERNAME_CI` (`USERNAME`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  MODIFY `QUOTATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_information`
--
ALTER TABLE `client_information`
  ADD CONSTRAINT `FK_USERNAME_UC` FOREIGN KEY (`USERNAME`) REFERENCES `user_credentials` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  ADD CONSTRAINT `FK_USERNAME_CI` FOREIGN KEY (`USERNAME`) REFERENCES `client_information` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
