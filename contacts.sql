-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 29, 2017 at 04:37 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--
CREATE DATABASE IF NOT EXISTS `contacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `contacts`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `contId` int(11) UNSIGNED NOT NULL,
  `contFName` varchar(50) DEFAULT NULL,
  `contLName` varchar(50) DEFAULT NULL,
  `contCell` varchar(50) DEFAULT NULL,
  `contLand` varchar(25) NOT NULL,
  `contEmail` varchar(50) DEFAULT NULL,
  `contTitle` varchar(50) DEFAULT NULL,
  `contCo` varchar(50) DEFAULT NULL,
  `contDept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contId`, `contFName`, `contLName`, `contCell`, `contLand`, `contEmail`, `contTitle`, `contCo`, `contDept`) VALUES
(39, 'First', 'Contact', '1234567890', '1234567980', 'first@here.com', 'First', 'Contacts', 'None'),
(40, 'Second', 'Contact', '123456789', '', 'second@here.com', 'Tester', '', ''),
(41, 'Third', 'Contact', '1234567890', '', 'third@here.com', 'QA', 'Quality Control Associates', 'Testing'),
(42, 'Fourth', 'Contact', '1234567890', '', 'fourth@here.com', 'Sales Manager', 'Quality Control Associates', 'Acquisitions'),
(43, 'Fifth', 'Contact', '1234567890', '', 'fifth@here.com', 'Inspector', 'Quality Control Associates', 'Inspections'),
(44, 'Sixth', 'Contact', '1234567890', '', 'sixth@here.com', 'Runner', 'Quality Control Associates', 'Logistics'),
(45, 'Seventh', 'Contact', '1234567890', '', 'seventh@here.com', 'Human Resources Coordinator', 'Quality Control Associates', 'HR'),
(46, 'Eighth', 'Contact', '1234567890', '', 'eighth@here.com', 'Translator', 'Quality Control Associates', 'HR'),
(47, 'Ninth', 'Contact', '1234567890', '', 'ninth@here.com', 'Cook', 'Quality Control Associates', 'Employee Services'),
(48, 'Tenth', 'Contact', '1234567890', '1234567890', 'tenth@here.com', 'Driver', 'Quality Control Associates', 'Logistics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) UNSIGNED NOT NULL,
  `userFName` varchar(50) DEFAULT NULL,
  `userLName` varchar(50) DEFAULT NULL,
  `userPhone` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userTitle` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userFName`, `userLName`, `userPhone`, `userEmail`, `userTitle`, `username`, `password`) VALUES
(3, 'tester', 'test', '1234567890', 'me@me.com', 'tester', 'root', '6378c16318e6edac49f80e776854e9ef'),
(4, 'Tester', 'Test', '1234567890', 'me@me.com', 'tester', 'tester', '6378c16318e6edac49f80e776854e9ef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
