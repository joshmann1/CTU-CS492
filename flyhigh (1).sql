-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 11:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flyhigh`
--

-- --------------------------------------------------------

--
-- Table structure for table `carinventory`
--

CREATE TABLE `carinventory` (
  `car_type` varchar(50) NOT NULL,
  `available_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carinventory`
--

INSERT INTO `carinventory` (`car_type`, `available_count`) VALUES
('compact', 6),
('economy', 10),
('luxury', 9),
('standard', 8),
('suv', 10);

-- --------------------------------------------------------

--
-- Table structure for table `carrentals`
--

CREATE TABLE `carrentals` (
  `id` int(11) NOT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  `dropoff_location` varchar(255) DEFAULT NULL,
  `dropoff_date` datetime DEFAULT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrentals`
--

INSERT INTO `carrentals` (`id`, `pickup_location`, `pickup_date`, `dropoff_location`, `dropoff_date`, `car_type`, `price`, `created_at`) VALUES
(2, 'New York', '2025-05-13 04:12:00', 'Chicago', '2025-05-23 04:12:00', 'compact', 70.00, '2025-05-27 09:12:35'),
(3, 'Chicago', '2025-05-12 04:19:00', 'Los Angeles', '2025-05-29 04:20:00', 'luxury', 90.00, '2025-05-27 09:20:06'),
(4, 'Chicago', '2025-05-14 04:24:00', 'Dallas', '2025-06-30 04:25:00', 'standard', 80.00, '2025-05-27 09:25:07'),
(5, 'Chicago', '2025-05-14 04:24:00', 'Dallas', '2025-06-30 04:25:00', 'standard', 80.00, '2025-05-27 09:25:17'),
(6, 'Chicago', '2025-05-27 04:26:00', 'Los Angeles', '2025-05-30 04:26:00', 'compact', 70.00, '2025-05-27 09:26:24'),
(7, 'Chicago', '2025-06-23 06:49:00', 'Chicago', '2025-06-30 06:49:00', 'compact', 70.00, '2025-05-27 11:49:44'),
(8, 'New York', '2025-05-27 16:10:00', 'Chicago', '2025-05-31 16:10:00', 'compact', 70.00, '2025-05-27 21:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `flightinventory`
--

CREATE TABLE `flightinventory` (
  `id` int(11) NOT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `depart_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `available_seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightinventory`
--

INSERT INTO `flightinventory` (`id`, `destination`, `depart_date`, `return_date`, `price`, `available_seats`) VALUES
(1, 'New York', '2025-06-15', '2025-06-22', 199.00, 20),
(2, 'Chicago', '2025-06-16', '2025-06-23', 179.00, 20),
(3, 'Los Angeles', '2025-06-17', '2025-06-24', 299.00, 22),
(4, 'Houston', '2025-06-18', '2025-06-25', 189.00, 16),
(5, 'Miami', '2025-06-19', '2025-06-26', 209.00, 15),
(6, 'Atlanta', '2025-06-20', '2025-06-27', 169.00, 12),
(7, 'Dallas', '2025-06-21', '2025-06-28', 195.00, 14),
(8, 'San Francisco', '2025-06-22', '2025-06-29', 275.00, 17),
(9, 'Seattle', '2025-06-23', '2025-06-30', 265.00, 10),
(10, 'Denver', '2025-06-24', '2025-07-01', 230.00, 13);

-- --------------------------------------------------------

--
-- Table structure for table `hotelinventory`
--

CREATE TABLE `hotelinventory` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelinventory`
--

INSERT INTO `hotelinventory` (`id`, `hotel_name`, `city`, `checkin_date`, `checkout_date`, `price`, `available_rooms`) VALUES
(1, 'Hilton Times Square', 'New York', '2025-06-15', '2025-06-18', 220.00, 10),
(2, 'Hyatt Magnificent Mile', 'Chicago', '2025-06-16', '2025-06-20', 210.00, 10),
(3, 'Sheraton Grand LA', 'Los Angeles', '2025-06-18', '2025-06-22', 230.00, 12),
(4, 'Marriott Marquis Houston', 'Houston', '2025-06-20', '2025-06-24', 190.00, 7),
(5, 'Fontainebleau Miami Beach', 'Miami', '2025-06-21', '2025-06-25', 240.00, 6),
(6, 'JW Marriott Atlanta Buckhead', 'Atlanta', '2025-06-22', '2025-06-26', 200.00, 9),
(7, 'Omni Dallas Hotel', 'Dallas', '2025-06-23', '2025-06-27', 195.00, 10),
(8, 'Hotel Nikko San Francisco', 'San Francisco', '2025-06-24', '2025-06-28', 250.00, 5),
(9, 'Grand Hyatt Seattle', 'Seattle', '2025-06-25', '2025-06-29', 215.00, 6),
(10, 'The Ritz-Carlton Denver', 'Denver', '2025-06-26', '2025-06-30', 225.00, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carinventory`
--
ALTER TABLE `carinventory`
  ADD PRIMARY KEY (`car_type`);

--
-- Indexes for table `carrentals`
--
ALTER TABLE `carrentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flightinventory`
--
ALTER TABLE `flightinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelinventory`
--
ALTER TABLE `hotelinventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrentals`
--
ALTER TABLE `carrentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flightinventory`
--
ALTER TABLE `flightinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotelinventory`
--
ALTER TABLE `hotelinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
