-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2020 at 09:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FINANCE`
--

-- --------------------------------------------------------

--
-- Table structure for table `FANDANIANA`
--

CREATE TABLE `FANDANIANA` (
  `FandId` int(11) NOT NULL,
  `FandVola` int(11) NOT NULL,
  `FandDate` datetime NOT NULL DEFAULT current_timestamp(),
  `FandAntony` varchar(350) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FANDANIANA`
--

INSERT INTO `FANDANIANA` (`FandId`, `FandVola`, `FandDate`, `FandAntony`, `UserId`) VALUES
(3, 500, '2020-05-30 00:00:00', 'Nividianana siramamy', 1),
(4, 500, '2020-05-30 00:00:00', 'Nividianana siramamy', 1),
(5, 500, '2020-05-30 00:00:00', 'Nividianana siramamy', 1),
(6, 100, '2020-05-30 00:00:00', 'Nividianana sira', 1),
(7, 150, '2020-05-30 00:00:00', 'Nividianana sigara', 1),
(8, 1500, '2020-05-30 00:00:00', 'Nividianana vary', 1),
(9, 1000, '2020-05-30 00:00:00', 'Laoka atoandro', 1),
(10, 1000, '2020-05-30 00:00:00', 'Laoka hariva', 1),
(11, 6475, '2020-05-30 00:00:00', 'Nividianana siramamy', 1),
(12, 300, '2020-05-30 00:00:00', 'sora', 1),
(13, 5000, '2020-05-31 00:00:00', 'Nividianana Hena fa pantekoty', 1),
(14, 50000, '2020-05-31 00:00:00', 'Ecolage zaza', 1),
(15, 50000, '2020-05-31 00:00:00', 'Ecolage zaza', 1),
(16, 20000, '2020-05-31 00:00:00', 'nividianana revy fa fety ny andro', 1),
(17, 1000, '2020-04-15 18:00:03', 'Nividianana vary sy laoka', 1),
(18, 20000, '2020-01-23 18:05:41', 'Nanaovana fety', 1),
(19, 10000, '2020-04-15 18:45:51', 'Akanjon-jaza', 1),
(20, 5000, '2020-03-11 20:11:03', 'Nanaovana vacances.', 1),
(21, 40000, '2020-02-13 20:12:17', 'Samrampianaran\'ny ankizy', 1),
(22, 30000, '2020-03-04 20:14:41', 'Nividianana lambany madama.', 1),
(23, 20000, '2020-04-12 20:15:48', 'Natao rakitra', 1),
(24, 200000, '2019-10-16 21:03:28', 'Nividianana ordinateur', 1),
(25, 2000, '2020-05-31 21:41:54', 'Hividianana vary.', 1),
(26, 3000, '2020-05-31 21:51:01', 'Nividianana laoka hariva.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TAHIRY`
--

CREATE TABLE `TAHIRY` (
  `TahiryId` int(11) NOT NULL,
  `TahiryVola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TAHIRY`
--

INSERT INTO `TAHIRY` (`TahiryId`, `TahiryVola`) VALUES
(1, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserPass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`UserId`, `UserName`, `UserPass`) VALUES
(1, 'Rakoto', 'rakoto123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FANDANIANA`
--
ALTER TABLE `FANDANIANA`
  ADD PRIMARY KEY (`FandId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `TAHIRY`
--
ALTER TABLE `TAHIRY`
  ADD PRIMARY KEY (`TahiryId`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FANDANIANA`
--
ALTER TABLE `FANDANIANA`
  MODIFY `FandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `TAHIRY`
--
ALTER TABLE `TAHIRY`
  MODIFY `TahiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FANDANIANA`
--
ALTER TABLE `FANDANIANA`
  ADD CONSTRAINT `FANDANIANA_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `USER` (`UserId`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `MandrayVola` ON SCHEDULE EVERY 24 DAY STARTS '2020-05-31 11:10:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE TAHIRY SET TahiryVola=TahiryVola+10000$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
