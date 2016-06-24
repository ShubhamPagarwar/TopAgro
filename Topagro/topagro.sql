-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2016 at 03:15 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topagro`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `Produce_name` varchar(20) NOT NULL,
  `Quality` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Market_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`Produce_name`, `Quality`, `Quantity`, `Market_price`) VALUES
('', '', 0, 0),
('Bajara', 'Good', 67, 61),
('Brinjal', 'Best', 45, 122.1),
('Brinjal', 'Normal', 33, 24.2),
('Carrot', 'Good', 23, 12.1),
('Chilly', 'Good', 23, 2.2),
('Jawar', 'Good', 52, 49.5),
('Lady Finger', 'Best', 57, 80),
('Onion', 'Best', 4, 110),
('Onion', 'Good', 100, 55),
('Potato', 'Best', 12, 73.7),
('Potato', 'Good', 22, 12.1),
('Rice', 'Best', 50, 66),
('Tomato', 'Best', 40, 132),
('Wheat', 'Best', 33, 24.2);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `uid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mob` int(11) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `uname` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(10) DEFAULT NULL,
  `retype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`uid`, `fname`, `lname`, `gender`, `mob`, `role`, `address`, `uname`, `pass`, `retype`) VALUES
(24, 'Payal', 'Bhalerao', 'option2', 1234567890, 'farmer', 'Sangli', 'Payal', 'Shubham123', 'Shubham123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordid` int(11) NOT NULL,
  `vid` int(11) DEFAULT NULL,
  `produce_name` varchar(20) DEFAULT NULL,
  `quality` varchar(8) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordid`, `vid`, `produce_name`, `quality`, `quantity`, `total_price`, `date`, `status`) VALUES
(13, 4, 'Jawar', 'Good', 33, 1634, '2016-05-18', 'deliver'),
(15, 4, 'Jawar', 'Good', 5, 248, '2016-05-19', 'deliver'),
(16, 4, 'Carrot', 'Good', 4, 48, '2016-05-19', 'cancell'),
(17, 4, 'Rice', 'Best', 22, 1452, '2016-05-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `pay_id` int(4) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `date_of_transfer` date NOT NULL,
  `ammount` int(20) NOT NULL,
  `card_no` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `uid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `prod_name` varchar(20) DEFAULT NULL,
  `quality` varchar(20) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `market_price` int(11) DEFAULT NULL,
  `expected_price` int(11) DEFAULT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`uid`, `sid`, `prod_name`, `quality`, `quantity`, `market_price`, `expected_price`, `status`) VALUES
(24, 2, 'Carrot', 'Best', 22, 12, 11, 'accepted'),
(24, 3, 'Potato', 'Best', 12, 74, 67, 'accepted'),
(24, 4, 'Bajara', 'Good', 44, 24, 22, 'rejected'),
(24, 7, 'Chilly', 'Good', 23, 2, 2, 'accepted'),
(24, 8, 'Onion', 'Normal', 22, 12, 11, 'rejected'),
(24, 9, 'White Carrot', 'Best', 22, 209, 190, 'pending'),
(24, 10, 'Wheat', 'Best', 33, 12, 11, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vid` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mob` int(11) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `uname` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(20) DEFAULT NULL,
  `retype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vid`, `fname`, `lname`, `gender`, `mob`, `role`, `address`, `uname`, `pass`, `retype`) VALUES
(4, 'rohini', 'shinge', 'option2', 1123556326, 'vendor', 'Kolhapur', 'rohi', 'Rohini123', 'Rohini123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD UNIQUE KEY `Produce_name` (`Produce_name`,`Quality`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`uid`,`uname`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordid`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vid`,`uname`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
