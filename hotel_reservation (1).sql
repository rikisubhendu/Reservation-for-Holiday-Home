-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 10:32 AM
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
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_name`, `room_number`, `check_in_date`, `check_out_date`, `booking_date`, `guests`, `total_price`) VALUES
(3, 'sub', 201, '2023-08-31', '2023-09-02', NULL, 5, '2000.00'),
(5, 'sub1', 202, '2023-08-30', '2023-09-01', NULL, 5, '2000.00'),
(16, 'sub1', 204, '2023-09-01', '2023-09-08', NULL, 2, '0.00'),
(18, 'sub1', 202, '2023-08-30', '2023-09-01', NULL, 1, '12334.00'),
(19, 'sub', 202, '2023-09-28', '2023-09-30', '2023-09-02 14:04:20', 1, '12334.00'),
(20, 'sub1', 201, '2023-09-13', '2023-09-16', '2023-09-02 16:10:53', 0, '12334.00'),
(21, 'sub1', 204, '2023-09-13', '2023-09-15', '2023-09-03 12:01:46', 1, '12334.00'),
(25, 'rahul123', 203, '2023-09-13', '2023-09-15', '2023-09-10 11:52:24', 0, '12334.00'),
(28, 'riki', 201, '2023-10-11', '2023-10-19', '2023-10-08 12:44:17', 0, '12334.00');

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
(5, 16, 'sub1', 'riki', 'saha', 'son', '2023-09-07'),
(7, 18, 'sub1', 'riki', 'saha', 'son', '2023-08-31'),
(8, 19, 'sub', 'riki', 'saha', 'son', '2023-08-31'),
(9, 21, 'sub1', 'riki', 'saha', 'son', '2023-08-30');

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
(1, 'TV', ' Immerse yourself in entertainment with a high-quality television, offering a wide range of channels and content for your enjoyment.'),
(2, 'Mini Bar', 'Quench your thirst and cravings with a well-stocked mini bar, providing a selection of beverages and snacks at your fingertips.'),
(3, 'Wi-Fi', 'Stay connected and browse the web seamlessly with complimentary Wi-Fi access, ensuring you\'re always in touch with the world.'),
(4, 'Air Conditioning', 'Maintain your ideal room temperature year-round with efficient air conditioning, creating a comfortable and relaxing atmosphere.'),
(5, 'Car Parking', 'Enjoy the convenience of secure car parking facilities, ensuring your vehicle is safe and easily accessible during your stay.'),
(9, 'smart tv', 'Elevate your entertainment experience with a Smart TV. Access streaming services, browse the web, and enjoy apps on a brilliant, connected display.'),
(12, 'swiming pool', 'Elevate your entertainment experience with a Smart TV. Access streaming services, browse the web, and enjoy apps on a brilliant, connected display.'),
(17, 'smart tv', 'Elevate your entertainment experience with a Smart TV. Access streaming services, browse the web, and enjoy apps on a brilliant, connected display.');

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
  `features_ids` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_number`, `room_type`, `occupancy`, `bed_type`, `view_type`, `price`, `is_available`, `description`, `floor`, `image_url`, `features_ids`) VALUES
(201, 'standard', 2, 'king', 'sea', '12334.00', 1, '', 2, '2_rooms.jpg', '1,2,3,4'),
(202, 'standard', 2, 'king', 'sea', '12334.00', 0, '', 2, 'room1.jpeg', '1,2,3'),
(203, 'standard', 2, 'king', 'sea', '12334.00', 1, '', 2, 'room1.jpeg', '1,2,3'),
(204, 'standard', 2, 'king', 'sea', '12334.00', 0, '', 2, 'room1.jpeg', '1,2,3,4');

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
('sub', 'Subhendu s', 'ghdfgsdg@g', '2147483647', 'on', '123@qw'),
('sub1', 'Subhendu saha', 'ghdfgsdg@g', '2147483647', 'on', 'Riki@12');

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hotel_admin`
--
ALTER TABLE `hotel_admin`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
