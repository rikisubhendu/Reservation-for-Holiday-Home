-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 07:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `room_number` int(10) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `booking_date` datetime DEFAULT NULL,
  `guests` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `iscancel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_name`, `room_number`, `check_in_date`, `check_out_date`, `booking_date`, `guests`, `total_price`, `iscancel`) VALUES
(48, 'test', 203, '2023-11-14', '2023-11-16', '2023-11-05 17:37:08', 1, '1200.00', 1),
(50, 'test', 203, '2023-11-14', '2023-11-17', '2023-11-05 18:11:43', 1, '1200.00', 0),
(52, 'test', 203, '2023-11-05', '2023-11-07', '2023-11-05 19:12:29', 1, '1200.00', 1),
(53, 'test', 203, '2023-11-09', '2023-11-11', '2023-11-08 20:40:17', 1, '1200.00', 1),
(55, 'test', 203, '2023-11-08', '2023-11-10', '2023-11-08 20:43:53', 1, '1200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `booking_id`, `user_name`, `first_name`, `last_name`, `relationship`, `date_of_birth`) VALUES
(21, 48, 'test', 'Subhendu ', 'saha', 'Myself', '2023-10-31'),
(22, 50, 'test', 'Subhendu ', 'saha', 'Myself', '2023-10-31'),
(23, 52, 'test', 'sandipan', 'singha', 'Myself', '2023-10-31'),
(24, 53, 'test', 'Subhendu ', 'Saha', 'Myself', '2023-11-14'),
(25, 55, 'test', 'Subhendu ', 'Saha', 'Myself', '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`) VALUES
(3, 'Wi-Fi', 'Stay connected and browse the web seamlessly with complimentary Wi-Fi access, ensuring you\'re always in touch with the world.'),
(47, 'Car Parking', 'Elevate your entertainment experience with a Smart TV. Access streaming services, browse the web, and enjoy apps on a brilliant, connected display.'),
(48, 'swiming pool', 'Elevate your entertainment experience with a Smart TV. Access streaming services, browse the web, and enjoy apps on a brilliant, connected display.');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_admin`
--

CREATE TABLE `hotel_admin` (
  `sl_no` int(11) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_admin`
--

INSERT INTO `hotel_admin` (`sl_no`, `admin_id`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refund_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `refund_amount` decimal(10,2) DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `isrefund` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`refund_id`, `booking_id`, `refund_amount`, `cancel_date`, `isrefund`) VALUES
(6, 48, '1200.00', '2023-11-05 18:01:23', 0),
(7, 52, '960.00', '2023-11-05 19:20:42', 0),
(8, 53, '1200.00', '2023-11-08 20:40:27', 0),
(9, 55, '960.00', '2023-11-08 20:44:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_number` int(10) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `occupancy` int(11) NOT NULL,
  `bed_type` varchar(20) NOT NULL,
  `view_type` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `description` text DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `features_ids` varchar(255) DEFAULT NULL,
  `isMaintain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_number`, `room_type`, `occupancy`, `bed_type`, `view_type`, `price`, `is_available`, `description`, `floor`, `image_url`, `features_ids`, `isMaintain`) VALUES
(201, 'deluxe', 4, 'king', 'Sea', '1000.00', 0, '', 2, '2_rooms.jpg', '1,2,3,4', 0),
(203, 'suite', 4, 'king', 'sea', '1200.00', 1, '', 2, '1.jpg', '2,3,47', 0),
(205, 'standard', 2, 'king', 'Sea', '1000.00', 0, '', 2, '2_rooms.jpg', '3,47', 0),
(302, 'deluxe', 2, 'twin', 'Sea', '5000.00', 0, '', 3, '2_rooms.jpg', '2,3,47', 0),
(304, 'deluxe', 4, 'king', 'Null', '1000.00', 0, '', 3, '1.jpg', '2,3,47,48', 0),
(401, 'standard', 3, 'queen', 'Sea', '1200.00', 0, '', 4, 'room1.jpeg', '2,3,47', 1),
(402, 'suite', 4, 'king', 'Sea', '10000.00', 0, '', 4, '2_rooms.jpg', '3,47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_name` varchar(10) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ph_no` varchar(15) NOT NULL,
  `gender` text NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_name`, `full_name`, `email`, `ph_no`, `gender`, `pass`) VALUES
('rahul123', 'Rahul sharma', 'sahasubhendu2000@gmail.com', '9878393421', 'M', 'a6af7b078ebaf1bf6a5d111fdc2052e6'),
('rahul1231', 'Rahul sharma', 'sahasubhendu2000@gmail.com', '9878393421', 'M', 'a6af7b078ebaf1bf6a5d111fdc2052e6'),
('riki', 'Rahul sharma', 'sahasubhendu2000@gmail.com', '9878393421', 'M', '21a96efa6d46151db471e504b84c8009'),
('sub1', 'Rahul sharma', 'sahasubhendu2000@gmail.com', '9878393421', 'M', 'bb14121c1b37acca96a0558e1b359167'),
('test', 'Rahul sharma', 'sahasubhendu2000@gmail.com', '9878393421', 'M', 'bb14121c1b37acca96a0558e1b359167');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bookings_ibfk_1` (`room_number`),
  ADD KEY `bookings_ibfk_2` (`user_name`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_details_ibfk_1` (`user_name`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_admin`
--
ALTER TABLE `hotel_admin`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refund_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `hotel_admin`
--
ALTER TABLE `hotel_admin`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `rooms` (`room_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `table_user` (`user_name`) ON DELETE CASCADE;

--
-- Constraints for table `family_details`
--
ALTER TABLE `family_details`
  ADD CONSTRAINT `family_details_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `table_user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `family_details_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
