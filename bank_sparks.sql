-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 04:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sparks`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `acc_no` int(11) NOT NULL,
  `email` varchar(28) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `acc_no`, `email`, `gender`, `balance`) VALUES
(1, 'anup', 1000, 'anoopraj@gmail.com', 'male', 1000000),
(2, 'raj', 1001, 'raj@gmail.com', 'male', 78644),
(3, 'leela', 1002, 'leela@gmail.com', 'female', 208838),
(4, 'radha', 1003, 'radha@gmail.com', 'female', 645627),
(5, 'ramesh', 1004, 'ramesh@rgbr.com', 'male', 78444),
(6, 'seeta', 1005, 'seeta@gmail.com', 'female', 454674),
(7, 'karthik', 1006, 'karthik@ymc.com', 'male', 80010),
(8, 'jesse', 1007, 'jesse@ymc.com', 'female', 43865),
(9, 'shiva', 1008, 'shiva@rgbr.com', 'male', 78544),
(10, 'gopal', 1009, 'gopal@rgbr.com', 'male', 78544);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(20) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `date/time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `sender`, `receiver`, `amount`, `date/time`) VALUES
(1, 'leela', 'raj', 10, '2021-11-04'),
(2, 'ramesh', 'raj', 100, '2021-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
