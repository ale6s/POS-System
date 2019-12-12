-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 05:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `i_desc` varchar(50) NOT NULL,
  `i_qty` int(11) NOT NULL,
  `i_price` varchar(50) NOT NULL,
  `i_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_desc`, `i_qty`, `i_price`, `i_sold`) VALUES
(7, 'Alcohol2', 3, '39', 5),
(9, 'Digital Calculator', 7, '165.40', 3),
(10, 'add', 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_cart`
--

CREATE TABLE `items_cart` (
  `i_id` int(11) NOT NULL,
  `i_desc` varchar(50) NOT NULL,
  `i_qty` int(11) NOT NULL,
  `i_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `i_id` int(11) NOT NULL,
  `i_desc` varchar(50) NOT NULL,
  `qty` int(30) NOT NULL,
  `date` date NOT NULL,
  `amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`i_id`, `i_desc`, `qty`, `date`, `amount`) VALUES
(1, 'Digital Calculator', 3, '2019-08-08', 79),
(12, 'add', 1, '2019-11-12', 1),
(111, 'Digital Calculator', 3, '2019-08-08', 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `items_cart`
--
ALTER TABLE `items_cart`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items_cart`
--
ALTER TABLE `items_cart`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
