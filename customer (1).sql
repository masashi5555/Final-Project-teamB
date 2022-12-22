-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 05:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `uid`, `fname`, `lname`, `email`, `phone`) VALUES
(1, 1, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(2, 1, 'riku', 'hatano', 'johndoe@gmail.com', '222-222-6666'),
(3, 1, 'riku', 'hatano', 'johndoe@gmail.com', '222-222-6666'),
(4, 1, 'riku', 'hatano', 'johndoe@gmail.com', '222-222-6666'),
(5, 1, 'riku', 'hatano', 'johndoe@gmail.com', '222-222-6666'),
(6, 15, 'customer', 'tarou', 'johndoe@gmail.com', '222-333-4444'),
(7, 15, 'customer', 'tarou', 'japanese@gmail.com', '111-444-555'),
(8, 15, 'lu', 'tianye', 'chinese@gmail.com', '111-444-555'),
(9, 15, 'lu', 'tianye', 'chinese@gmail.com', '111-444-555'),
(10, 1, 'alalalala', 'doe', 'lutianye89@gmail.com', '222-222-0000'),
(11, 15, 'ooooooooo', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(12, 15, 'ooooooooo', 'doe', 'johndoe@gmail.com', '222-222-2222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
