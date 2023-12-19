-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 18, 2023 at 01:29 PM
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
-- Table structure for table `fee_paid`
--

DROP TABLE IF EXISTS `fee_paid`;
CREATE TABLE IF NOT EXISTS `fee_paid` (
  `iFee` int(100) NOT NULL,
  `vEmail` varchar(255) NOT NULL,
  `iprimary` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iprimary`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=greek COLLATE=greek_general_ci;

--
-- Dumping data for table `fee_paid`
--

INSERT INTO `fee_paid` (`iFee`, `vEmail`, `iprimary`) VALUES
(599, 'venkastraeo@gmail.com', 1),
(599, 'venkagfdgdftrao@gmail.com', 2),
(599, 'venkagfdgdftrao@gmail.com', 3),
(500, 'papa@gmail.com', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
