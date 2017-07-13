-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 13, 2017 at 01:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `contId` int(11) unsigned NOT NULL,
  `contFName` varchar(50) DEFAULT NULL,
  `contLName` varchar(50) DEFAULT NULL,
  `contPhone` varchar(50) DEFAULT NULL,
  `contEmail` varchar(50) DEFAULT NULL,
  `contTitle` varchar(50) DEFAULT NULL,
  `contCo` varchar(50) DEFAULT NULL,
  `contDept` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contId`, `contFName`, `contLName`, `contPhone`, `contEmail`, `contTitle`, `contCo`, `contDept`, `username`, `password`) VALUES
(1, 'Daffy', 'Duck', '555-1234', 'daffy@wb.com', '', NULL, NULL, 'daffy', '96b70bd61bba64d060891c9b71298aa2'),
(2, 'Elmer', 'Fudd', '555-1235', 'elmer@wb.com', '', NULL, NULL, 'elmer', '96b70bd61bba64d060891c9b71298aa2'),
(3, 'Porky', 'Pig', '555-1236', 'porky@wb.com', '', NULL, NULL, 'porky', '96b70bd61bba64d060891c9b71298aa2'),
(4, 'Bugs', 'Bunny', '555-1237', 'bugs@wb.com', '', NULL, NULL, 'bugs', '96b70bd61bba64d060891c9b71298aa2'),
(5, 'Tweety', 'Bird', '555-1238', 'tweety@wb.com', '', NULL, NULL, 'tweety', '96b70bd61bba64d060891c9b71298aa2'),
(6, 'Pepe', 'LePew', '555-1239', 'pepe@wb.com', '', NULL, NULL, 'pepe', '96b70bd61bba64d060891c9b71298aa2'),
(7, 'Yosemite', 'Sam', '555-1240', 'yosemite@wb.com', '', NULL, NULL, 'yosemite', '96b70bd61bba64d060891c9b71298aa2'),
(8, 'Foghorn', 'Leghorn', '555-1241', 'foghorn@wb.com', '', NULL, NULL, 'foghorn', '96b70bd61bba64d060891c9b71298aa2'),
(9, 'Marvin', 'Martian', '555-1242', 'marvin@wb.com', '', NULL, NULL, 'marvin', '96b70bd61bba64d060891c9b71298aa2'),
(10, 'Road', 'Runner', '555-1243', 'beepbeep@wb.com', 'Chief Coyote Frustrater', 'Border Patrol', 'Pursuit Operations', 'beepbeep', '96b70bd61bba64d060891c9b71298aa2'),
(11, 'Wiley', 'Coyote', '555-1244', 'wiley@wb.com', '', NULL, NULL, 'wiley', '96b70bd61bba64d060891c9b71298aa2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
