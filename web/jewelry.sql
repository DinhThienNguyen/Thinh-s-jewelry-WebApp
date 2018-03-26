-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2018 at 03:26 AM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelry`
--

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `name`, `price`, `brand_id`) VALUES
(1, 'Đồng hồ nữ dây thép không gỉ chống nước Skagen SKW2445', 5650000, 1),
(4, 'Đồng hồ nam bộ máy ECO-DRIVE dây TITANIUM CITIZEN CA4011.55L', 13130000, 1),
(5, 'Đồng hồ nam dây thép không gỉ chống nước TISSOT T086.407.11.061.10', 26710000, 2),
(8, 'Đồng hồ nữ dây thép không gỉ chống nước CITIZEN EU6030.56D', 3800000, 2),
(9, 'Đồng hồ nữ dây thép không gỉ chống nước CK K5023404', 13070000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `watchbrand`
--

CREATE TABLE `watchbrand` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watchbrand`
--

INSERT INTO `watchbrand` (`id`, `name`) VALUES
(1, 'Longines'),
(2, 'Titoni'),
(7, 'CK'),
(8, 'Citizen'),
(9, 'Seiko'),
(10, 'Michael Kors'),
(11, 'Guess'),
(12, 'Tissot'),
(13, 'Skagen'),
(14, 'Bulova');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchbrand`
--
ALTER TABLE `watchbrand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `watchbrand`
--
ALTER TABLE `watchbrand`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
