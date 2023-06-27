-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2023 at 02:35 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE IF NOT EXISTS `guest` (
  `guest_id` int NOT NULL AUTO_INCREMENT,
  `latin_first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `latin_last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_num` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `latin_first_name`, `latin_last_name`, `gender`, `email`, `phone_num`, `nationality`) VALUES
(2, 'vathanak', 'kosal', 'M', 'vathanak110@gmail.com', '0965537026', 'Khmer'),
(3, 'vathanak', 'kosal', 'M', 'vathanak110@gmail.com', '0965537026', 'Khmer'),
(4, 'vathanak', 'kosal', 'M', 'vathanak110@gmail.com', '0965537026', 'Khmer'),
(5, 'vathanak', 'kosal', 'M', 'vathanak110@gmail.com', '0965537026', 'Khmer'),
(6, 'nak', 'kosal', 'M', 'vathanak110@gmail.com', '0965537026', 'Khmer'),
(7, 'Kosal', 'Vathanak', 'M', 'nak@gmail.com', '0965537026', 'Korean'),
(8, 'dara', 'sokleng', 'M', 'nak@gmail.com', '096456789', 'Japanese'),
(9, 'Nka', 'Jasmine', 'F', 'jas@gmail.com', '096558729', 'Khmer'),
(10, 'nak ', 'kosal', 'M', 'v@gmail.com', '0965537026', 'Khmer');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `payment_method_id` int NOT NULL,
  `payment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` float NOT NULL,
  `reservation_id` int NOT NULL,
  `discount` float NOT NULL,
  `staff_id` int DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_payment_method` (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_method_id`, `payment_status`, `total_price`, `reservation_id`, `discount`, `staff_id`) VALUES
(1, 1, 'paid', 500, 1, 5, NULL),
(2, 1, 'Not Paid', 550, 8, 2, 1),
(3, 2, 'Paid', 600, 9, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `payment_method_id` int NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `method_name`) VALUES
(1, 'Visa'),
(2, 'MasterCard');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `guest_id` int NOT NULL,
  `room_id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `num_of_guest` int NOT NULL,
  `payment_id` int NOT NULL,
  `staff_id` int DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_reservation_room` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `guest_id`, `room_id`, `check_in`, `check_out`, `num_of_guest`, `payment_id`, `staff_id`) VALUES
(2, 6, 1, '2023-06-06', '2023-06-13', 5, 3, 2),
(3, 7, 1, '2023-06-13', '2023-06-14', 2, 1, 1),
(5, 8, 1, '2023-06-13', '2023-06-20', 3, 1, 1),
(6, 8, 1, '2023-06-13', '2023-06-20', 3, 1, 1),
(7, 8, 1, '2023-06-13', '2023-06-20', 3, 1, 1),
(8, 8, 1, '2023-06-13', '2023-06-20', 3, 1, 1),
(9, 9, 1, '2023-06-13', '2023-06-20', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `room_num` int NOT NULL,
  `max_occupancy` int NOT NULL,
  `price_per_night` float NOT NULL,
  `availability_status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `room_type_id` int NOT NULL,
  `staff_id` int DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `fk_room_room_type` (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_num`, `max_occupancy`, `price_per_night`, `availability_status`, `room_type_id`, `staff_id`) VALUES
(1, 111, 2, 500, 'not available', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `name`, `description`) VALUES
(1, 'Single', 'One bedroom'),
(2, 'Double ', 'Two bedrooms');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_payment_method` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`payment_method_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_room_type` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
