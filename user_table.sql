-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 18, 2023 at 01:28 PM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aboutstudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `iId` int(10) NOT NULL AUTO_INCREMENT,
  `vName` varchar(255) DEFAULT NULL,
  `vEmail` varchar(255) DEFAULT NULL,
  `vMobile` varchar(20) DEFAULT NULL,
  `vPassword` varchar(255) DEFAULT NULL,
  `iBatchId` int(11) DEFAULT NULL,
  `iAge` int(10) NOT NULL DEFAULT 0,
  `dtAddedDate` varchar(255) NOT NULL,
  PRIMARY KEY (`iId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=greek COLLATE=greek_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`iId`, `vName`, `vEmail`, `vMobile`, `vPassword`, `iBatchId`, `iAge`, `dtAddedDate`) VALUES
(1, 'PRAVEEN REDDY KAKUNURU', 'praveenreddy.kakunuru@hiddenbrains.in', '3252352352', '123456', NULL, 23, ''),
(2, 'praveen', 'venkatrao@gmail.com', '3453463463', '483985348953', NULL, 23, '12PM-2PM'),
(3, 'PRAVEEN REDDY KAKUNURU', 'venkatraeo@gmail.com', '485924653465745', 'ajergerw73rcbw', NULL, 23, '2PM-4PM'),
(4, 'PRAVEEN REDDY KAKUNURU', 'venkastraeo@gmail.com', '485924653465745', 'ergnerjbejrkbyejyer', NULL, 23, '2PM-4PM'),
(5, 'venkatrao', 'venkagfdgdftrao@gmail.com', '235235823523', '3289588275725', NULL, 252, '2PM-4PM'),
(6, 'siva', 'ksivarama88@gmail.com', '75348563737436', '$2y$10$c1188cBeg3kktrHE4IDER.BmSeJwqvSchHfMr2O8K5/lkYKZy6ir.', NULL, 23, '4PM-6PM'),
(7, 'papa', 'papa@gmail.com', '485924653465745', '123456', NULL, 18, '8AM-9AM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
