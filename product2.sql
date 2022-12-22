-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 12:04 AM
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
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `times` int(5) NOT NULL,
  `location` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`pid`, `cid`, `uid`, `productName`, `amount`, `price`, `appointmentDate`, `times`, `location`, `comment`) VALUES
(1, 9, 15, 'apple', 5, 500, '2023-01-07', 0, 'here', 'first product to db product2'),
(2, 7, 15, 'grape', 5, 5000, '2022-12-27', 0, 'tim horton', 'manager seems like donuts in timhorton'),
(3, 7, 15, 'pineapple', 5, 500, '2022-12-24', 0, 'my home', 'online appoinement'),
(4, 7, 15, 'orange', 333, 100, '2022-12-27', 0, 'over there', 'lalalalal'),
(5, 7, 15, 'protain', 50, 800, '2022-12-28', 0, 'gym', 'macho manager'),
(6, 7, 15, 'apple', 5, 500, '2022-12-12', 0, 'here', 'aaaaa'),
(7, 7, 15, 'apple pit', 577, 506, '2023-01-03', 0, 'somewhere', 'yummy '),
(8, 8, 15, 'apple', 5, 500, '2022-12-20', 0, 'here', 'first appointment with customer 8'),
(9, 1, 1, 'apple', 5, 500, '2022-12-27', 0, 'here', 'first appointment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
