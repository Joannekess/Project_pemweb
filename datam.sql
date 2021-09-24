-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 02:43 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemwebw4`
--

-- --------------------------------------------------------

--
-- Table structure for table `datam`
--

CREATE TABLE `datam` (
  `ID` int(11) NOT NULL,
  `StudentID` char(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datam`
--

INSERT INTO `datam` (`ID`, `StudentID`, `FirstName`, `LastName`) VALUES
(1, '00000043202', 'Nehemia', 'Gueldi'),
(2, '00000043299', 'Hansen', 'Dharma'),
(3, '00000042669', 'Yonas', 'Kurnia Wijaya'),
(4, '00000042606', 'Yohan', 'Kurnia Wijaya'),
(5, '00000056789', 'Sandi', 'Windara'),
(14, '00000043524', 'Christian', 'Alexander'),
(15, '00000043255', 'Feliciano', 'Surya Marcello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datam`
--
ALTER TABLE `datam`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datam`
--
ALTER TABLE `datam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
