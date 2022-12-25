-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 01:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appo_tb`
--

CREATE TABLE `appo_tb` (
  `date` date NOT NULL,
  `day` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appo_tb`
--

INSERT INTO `appo_tb` (`date`, `day`, `month`, `year`) VALUES
('2022-12-01', '1', '12', '2022'),
('2022-12-03', '3', '12', '2022'),
('2022-12-08', '8', '12', '2022'),
('2022-12-09', '9', '12', '2022'),
('2022-12-10', '10', '12', '2022'),
('2022-12-15', '15', '12', '2022'),
('2022-12-16', '16', '12', '2022'),
('2022-12-17', '17', '12', '2022'),
('2022-12-20', '20', '12', '2022'),
('2022-12-21', '21', '12', '2022'),
('2023-01-08', '8', '1', '2023'),
('2023-01-09', '9', '1', '2023'),
('2023-01-16', '16', '1', '2023'),
('2023-02-14', '14', '2', '2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appo_tb`
--
ALTER TABLE `appo_tb`
  ADD UNIQUE KEY `date` (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
