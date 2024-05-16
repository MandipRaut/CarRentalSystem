-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 07:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'm@Npass1', '2024-05-16 03:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(1, 'r@gmail.com', 1, '02/05/2024', '10/05/2024', 'bmkm', 2, '2024-05-01 20:09:43'),
(2, 'r@gmail.com', 1, '03/05/2024', '07/05/2024', 'jbjb', 0, '2024-05-04 03:54:44'),
(3, 'r@gmail.com', 1, '03/05/2024', '08/05/2024', 'book', 2, '2024-05-10 03:35:19'),
(4, 'akhatiwada@gmail.com', 1, '03/05/2024', '07/052024', 'no girl inside car', 1, '2024-05-14 03:50:14'),
(5, 'r@gmail.com', 1, '03/05/2024', '07/052024', 'lml', 2, '2024-05-14 07:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Toyota', '2024-05-02 10:17:58', NULL),
(2, 'Tesla', '2024-05-14 14:50:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contactusinfo`
--

INSERT INTO `contactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Kapan,Kathmandu', 'vroomrentals@gmail.com', '9844557890');

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contactusquery`
--

INSERT INTO `contactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'helo', 'helo@gmail.com', '9812123434', 'helo', '2024-05-04 08:33:52', NULL),
(2, 'Aayush', 'akhatiwada@gmail.com', '9801031828', 'I need a job.', '2024-05-14 03:59:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'About Us', 'aboutus', '										<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Welcome to Vroom Car Rental, your ultimate destination for convenient and reliable car rentals. At Vroom, we are dedicated to providing seamless transportation solutions for travelers and locals alike. With a diverse fleet of vehicles to suit every need and budget, we prioritize flexibility and affordability. Whether you\'re planning a weekend getaway, a business trip, or simply need a temporary replacement vehicle, Vroom has you covered. Our user-friendly mobile app allows you to browse available vehicles, compare prices, and make reservations on the go. With a commitment to customer satisfaction and excellence, Vroom Car Rental is here to make your rental experience smooth, convenient, and stress-free. Experience the difference with Vroom Car Rental today!</span>\r\n										'),
(22, 'Terms And Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Test</FONT></P>'),
(23, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Test</span>');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(2, 'sub@gmail.com', '2024-05-03 14:45:42'),
(3, 'akhatiwada@gmail.com', '2024-05-14 03:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'r@gmail.com', 'this is a test review.', '2024-05-03 09:45:13', 0),
(2, 'lunapara09@gmail.com', 'test review-2', '2024-05-04 08:42:37', 1),
(3, 'ridima@gmail.com', 'hello this is a review', '2024-05-06 04:25:03', 1),
(4, 'akhatiwada@gmail.com', 'I rented a Mercedes and it stopped working mid road.', '2024-05-14 03:48:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `LicenseNo` varchar(100) NOT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `LicenseNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Mandip Raut', 'r@gmail.com', 'pass', '9861366140', '1234567890', '', 'Kapan', '', 'Nepal', '2024-04-01 08:19:17', '2024-05-04 14:38:51'),
(2, 'Luna Parajuli', 'lunapara09@gmail.com', 'lunaaa@09', '9862653428', '3427645376', NULL, NULL, NULL, NULL, '2024-04-22 05:54:41', NULL),
(3, 'Ridima Tuladhar', 'ridima@gmail.com', 'lunaa0903', '9812345677', '6785532167', NULL, NULL, NULL, NULL, '2024-05-06 04:04:47', NULL),
(4, 'L__una@ /paraju*li', 'luna@gmail.com', 'lunaa@09', '9862653428', '4521765980', NULL, NULL, NULL, NULL, '2024-05-13 04:09:11', NULL),
(5, 'Luna Parajuli', 'lunaa@gmail.com', 'hiluna@09', '9862653428', '2354312087', NULL, NULL, NULL, NULL, '2024-05-13 04:18:35', '2024-05-13 04:43:42'),
(6, 'Mandipp Raut', 'mandipp@gmail.com', 'mandip00', 'abscdfrtji', '1234567890', NULL, NULL, NULL, NULL, '2024-05-13 05:07:48', NULL),
(7, 'Mandipp Raut', 'mandipp@gmail.com', 'aaaaaaaa', '9812345677', '9876534265', NULL, NULL, NULL, NULL, '2024-05-13 05:16:05', NULL),
(8, 'Mandipp Raut', 'mandipp@gmail.com', 'mandip@09', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-13 05:29:13', NULL),
(9, 'Mandipp Raut', 'mandipp@gmail.com', 'mandip@09', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-13 05:37:55', NULL),
(10, 'Aayush', 'akhatiwada@gmail.com', 'mandipraut', '9801031828', '4521765981', '07/09/2003', '', 'kathmandu', 'Nepal', '2024-05-14 03:36:35', '2024-05-14 03:37:30'),
(11, 'Mandipp @@@', 'mandipppppp@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 04:48:45', NULL),
(12, 'Mandip@ Raut', 'mandippppp@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 04:53:20', NULL),
(13, 'Someone', 'ss@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 04:55:06', NULL),
(14, 'Someone', 'ss@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 04:55:33', NULL),
(15, 'Milan', 'mil@gmail.com', 'password', '9812345677', '6785532167', NULL, NULL, NULL, NULL, '2024-05-14 04:56:12', NULL),
(16, 'helo', 'mandipp@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:04:00', NULL),
(17, 'helo', 'mandipp@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:05:49', NULL),
(18, 'helo', 'mandipp@gmail.com', 'password', '9812345677', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:08:18', NULL),
(19, 'helo', 'mandipp@gmail.com', 'password', '9812345678', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:09:10', NULL),
(20, 'helo', 'mandipp@gmail.com', 'password', '9812345678', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:09:51', NULL),
(21, 'helo', 'mandipppppppp@gmail.com', 'password', '9812345678', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 05:10:19', NULL),
(22, 'NABD@HGMAM', 'hellp@gmail.com', 'PASSWORD', '9812345678', '4521765980', NULL, NULL, NULL, NULL, '2024-05-14 15:10:19', NULL),
(23, 'Mahendra Bahubali', 'bahu@gmail.com', 'Password@123', '9812345678', '4521765980', NULL, NULL, NULL, NULL, '2024-05-15 00:56:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'aaa', 1, 'aaa', 12, 'Petrol', 2005, 4, 'car.jpg', 'car.jpg', 'car.jpg', 'car.jpg', '', NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '2024-05-02 14:37:36', '2024-05-04 15:13:13'),
(2, 'Nano', 2, 'Nice car for bekar people.', 10, 'Diesel', 2005, 4, 'car.jpg', 'car.jpg', 'car.jpg', 'car.jpg', 'car.jpg', 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1, '2024-05-14 14:53:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
