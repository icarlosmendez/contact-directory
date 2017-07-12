-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 12, 2017 at 09:09 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `contId` int(11) UNSIGNED NOT NULL,
  `contFName` varchar(50) DEFAULT NULL,
  `contLName` varchar(50) DEFAULT NULL,
  `contPhone` varchar(50) DEFAULT NULL,
  `contEmail` varchar(50) DEFAULT NULL,
  `contTitle` varchar(50) DEFAULT NULL,
  `contCo` varchar(50) DEFAULT NULL,
  `contDept` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'Road', 'Runner', '555-1243', 'beepbeep@wb.com', '', NULL, NULL, 'beepbeep', '96b70bd61bba64d060891c9b71298aa2'),
(11, 'Wiley', 'Coyote', '555-1244', 'wiley@wb.com', '', NULL, NULL, 'wiley', '96b70bd61bba64d060891c9b71298aa2'),
(14, 'Jimin', 'Hong', '1231231234', 'jhong@fullsail.edu', '', NULL, NULL, 'jimin', '5613cc8024431f1ad282e55b5c3a1562'),
(15, 'Mika', 'Gurrola', '12817486289', 'MIkagrr@gmail.com', '', NULL, NULL, 'mikagrrrrrr', 'e1c66c9868c0d8b9bb0b7a570b9a5e7d'),
(16, 'eric', 'Rose', '9169902151', 'erictrose@gmail.com', '', NULL, NULL, 'erictrose', '993e301ba7f67db9557183bf02cacdd0'),
(18, 'Paul', 'Diederichs', '911', 'someEmail@gmail.com', '', NULL, NULL, 'canttouchthis', '4b9c399b72884f3082135aaada248a91'),
(19, 'Jeff', 'Carroll', 'bab', 'bsrgj@bob.com', '', NULL, NULL, 'jcarroll', '96b70bd61bba64d060891c9b71298aa2'),
(20, 'Fia', 'OLoughlin', '407.982.1050', 'foloughlin@fullsail.com', '', NULL, NULL, 'fiafia', 'd261e7aeeead755077f27d559524719b'),
(21, 'hilson', 'francis', '4456678', 'hdf@gmail.com', '', NULL, NULL, 'hilson', '96b70bd61bba64d060891c9b71298aa2'),
(22, 'Johnny ', 'Dizzle', 'some some', 'gamil@mail.com', '', NULL, NULL, 'djibba22', '4e678f9725c8b6c875900ac2cc9ae869'),
(23, 'Carlos', 'Mendez', '407-920-8057', 'calicci.gardachi@gmail.com', 'Graphic Artist', '24Seven Graphics', 'Graphics', 'carlos', '96b70bd61bba64d060891c9b71298aa2');

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
  MODIFY `contId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
