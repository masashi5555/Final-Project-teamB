-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 07:49 PM
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
(12, 15, 'ooooooooo', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(13, 15, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(14, 1, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(15, 15, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(16, 15, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222'),
(17, 15, 'john', 'doe', 'johndoe@gmail.com', '222-222-2222');

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
  `price` float NOT NULL,
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
(3, 7, 15, 'pineapples', 5, 500, '2022-12-24', 0, 'my home', 'online appoinement'),
(4, 7, 15, 'orange', 333, 100, '2022-12-27', 0, 'over there', 'lalalalal'),
(5, 7, 15, 'protain', 50, 800, '2022-12-28', 0, 'gym', 'macho manager'),
(6, 7, 15, 'apple', 5, 500, '2022-12-12', 0, 'here', 'aaaaa'),
(7, 7, 15, 'apple pit', 577, 506, '2023-01-03', 0, 'somewhere', 'yummy '),
(8, 8, 15, 'apple', 5, 500, '2022-12-20', 0, 'here', 'first appointment with customer 8'),
(9, 1, 1, 'orangerange', 5, 500, '2022-12-27', 0, 'here', 'first appointment'),
(10, 6, 15, 'apple', 5, 500, '2022-12-28', 0, 'here', 'first appointment'),
(11, 6, 15, 'grape', 3333, 90, '2023-01-26', 0, 'Tim horton', 'coffee break'),
(12, 6, 15, 'apple', 5, 500, '2022-12-21', 0, 'here66666', 'lkjhljhlk'),
(13, 6, 15, 'apple', 5, 500, '2022-12-15', 0, 'here', 'done'),
(14, 6, 15, 'orange', 9, 497, '2022-12-31', 0, 'here', 'lorem ipsum'),
(15, 6, 15, 'apple', 5, 500, '2022-12-09', 0, 'here', 'zzz'),
(16, 6, 15, 'done', 999, 999, '2022-12-16', 0, 'here', 'done'),
(17, 6, 15, 'apple', 5, 500, '2022-12-09', 0, 'here', 'les_month.php config.php data login.php regCustomer.php sellsPage.php ➜ finalAssignment3 git:(riku) ✗ mkdir component ➜ finalAssignment3 git:(riku) ✗ ls addProduct.php config.php data login.php regCustomer.php sellsPage.php calendar.php css header.php login2.php sales_manager.php component customerPage.php img logout.'),
(18, 6, 15, 'apple', 5, 500, '2022-12-30', 0, 'here', 'les_month.php config.php data login.php regCustomer.php sellsPage.php ➜ finalAssignment3 git:(riku) ✗ mkdir component ➜ finalAssignment3 git:(riku) ✗ ls addProduct.php config.php data login.php regCustomer.php sellsPage.php calendar.php css header.php login2.php sales_manager.php component customerPage.php img logout.'),
(19, 6, 15, 'apple', 5, 500, '2022-12-21', 0, 'here', 'les_month.php config.php data login.php regCustomer.php sellsPage.php ➜ finalAssignment3 git:(riku) ✗ mkdir component ➜ finalAssignment3 git:(riku) ✗ ls addProduct.php config.php data login.php regCustomer.php sellsPage.php calendar.php css header.php login2.php sales_manager.php component customerPage.php img logout.'),
(20, 6, 15, 'apple', 5, 500, '2022-12-15', 0, 'here', 'les_month.php config.php data login.php regCustomer.php sellsPage.php ➜ finalAssignment3 git:(riku) ✗ mkdir component ➜ finalAssignment3 git:(riku) ✗ ls addProduct.php config.php data login.php regCustomer.php sellsPage.php calendar.php css header.php login2.php sales_manager.php component customerPage.php img logout.'),
(21, 6, 15, 'apple', 5, 500, '2022-12-03', 0, 'here', 'saa'),
(22, 8, 15, 'apple', 5, 500, '2022-12-28', 0, 'here', 'kjkljlk'),
(23, 8, 15, 'grape', 2111, 500, '2022-12-31', 0, 'here', 'fdafada'),
(24, 1, 1, 'apple pit', 9, 50000, '2022-12-30', 0, 'here', 'jkhljkhlkj'),
(27, 11, 15, 'apple', 5, 500, '2022-12-24', 0, 'here', 'first product'),
(28, 11, 15, 'orange', 444, 544, '2023-01-07', 0, 'my house', 'see you later'),
(30, 3, 1, 'apple', 5, 100000, '2022-12-31', 0, 'here', 'fafasdfasdf'),
(32, 3, 1, 'apple', 5, 500, '2022-12-08', 0, 'here', 'wssswfwefqwefqwefqwfqwefqwefqwefqqwefqwefqwefqwfqwefqw'),
(34, 3, 1, 'apple', 5, 500, '2022-12-28', 0, 'here', 'done'),
(35, 3, 1, 'apple', 5, 500, '2022-12-30', 0, 'here', 'a'),
(37, 11, 15, 'banana', 40, 2, '2023-01-06', 0, 'no frills', 'talking with discount because we bought a lot of bananas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
