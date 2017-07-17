-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 17, 2017 at 04:47 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
CREATE TABLE IF NOT EXISTS `contacts` (
  `contId` int(11) unsigned NOT NULL,
  `contFName` varchar(50) DEFAULT NULL,
  `contLName` varchar(50) DEFAULT NULL,
  `contPhone` varchar(50) DEFAULT NULL,
  `contEmail` varchar(50) DEFAULT NULL,
  `contTitle` varchar(50) DEFAULT NULL,
  `contCo` varchar(50) DEFAULT NULL,
  `contDept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contId`, `contFName`, `contLName`, `contPhone`, `contEmail`, `contTitle`, `contCo`, `contDept`) VALUES
(27, 'test', 'bob', '1234567980', 'me@test.com', '', NULL, NULL),
(28, 'test', 'bob', '1234567980', 'me@test.com', '', NULL, NULL),
(29, 'test', 'bob', '1234567980', 'me@test.com', '', NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Test', 'Best', '12345647890', 'me@test.com', 'tester', NULL, NULL),
(32, 'Test', 'Best', '12345647890', 'me@test.com', 'tester', 'tester', 'test'),
(33, 'Test', 'Best', '1234567980', 'me@test.com', 'tester', 'tester', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) unsigned NOT NULL,
  `userFName` varchar(50) DEFAULT NULL,
  `userLName` varchar(50) DEFAULT NULL,
  `userPhone` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userTitle` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userFName`, `userLName`, `userPhone`, `userEmail`, `userTitle`, `username`, `password`) VALUES
(3, 'tester', 'test', '1234567890', 'me@me.com', 'tester', 'root', '6378c16318e6edac49f80e776854e9ef');

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
  MODIFY `contId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
