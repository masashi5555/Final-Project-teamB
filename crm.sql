-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2022 at 10:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_manager`
--

CREATE TABLE `sales_manager` (
  `manager` text NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_manager`
--

INSERT INTO `sales_manager` (`manager`, `sales`) VALUES
('Manager 1', 3000),
('Manager 2', 4000),
('Manager 3', 3000),
('Manager 4', 5000),
('Manager 5', 6000),
('Manager 6', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_month`
--

CREATE TABLE `sales_month` (
  `month` text NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_month`
--

INSERT INTO `sales_month` (`month`, `sales`) VALUES
('January', 800),
('February', 1000),
('March', 1100),
('April', 900),
('May', 1200),
('June', 800),
('July', 1000),
('August', 1200),
('September', 700),
('October', 900),
('November', 1000),
('December', 1200);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
