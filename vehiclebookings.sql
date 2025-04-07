-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for vehiclebookings
CREATE DATABASE IF NOT EXISTS `vehiclebookings` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vehiclebookings`;

-- Dumping structure for table vehiclebookings.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table vehiclebookings.orders: ~48 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
	(1, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b503f94979', 'BDT'),
	(2, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b504151ffe', 'BDT'),
	(3, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b5043309e8', 'BDT'),
	(4, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b5073a08d2', 'BDT'),
	(5, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b5075b5642', 'BDT'),
	(6, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b51f89ecae', 'BDT'),
	(7, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b51fb7d209', 'BDT'),
	(8, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b544d37744', 'BDT'),
	(9, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b545004a30', 'BDT'),
	(10, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b546080197', 'BDT'),
	(11, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b54627fd79', 'BDT'),
	(12, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b54a991bd7', 'BDT'),
	(13, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b54ab528c8', 'BDT'),
	(14, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b5a61030b9', 'BDT'),
	(15, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b5a65a8ee6', 'BDT'),
	(16, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b636556604', 'BDT'),
	(17, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6368a9a4a', 'BDT'),
	(18, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b637557f7a', 'BDT'),
	(19, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b63788c158', 'BDT'),
	(20, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c0a69b0f', 'BDT'),
	(21, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c0c2c513', 'BDT'),
	(22, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c108ea04', 'BDT'),
	(23, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c1360001', 'BDT'),
	(24, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c2cc74ef', 'BDT'),
	(25, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6c31ccf09', 'BDT'),
	(26, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6dc7be096', 'BDT'),
	(27, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670b6dcde765a', 'BDT'),
	(28, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d1f66ec8d3', 'BDT'),
	(29, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d26e6c8395', 'BDT'),
	(30, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d26e7aa7f3', 'BDT'),
	(31, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d271c32f9f', 'BDT'),
	(32, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d271dbf146', 'BDT'),
	(33, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d2722e654e', 'BDT'),
	(34, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d2723de1e6', 'BDT'),
	(35, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d280ae0d00', 'BDT'),
	(36, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d2811ec62a', 'BDT'),
	(37, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d28148ba01', 'BDT'),
	(38, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d2831bb8ef', 'BDT'),
	(39, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d28b619e39', 'BDT'),
	(40, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d28b88c771', 'BDT'),
	(41, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d28d161ad3', 'BDT'),
	(42, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d28d36ea65', 'BDT'),
	(43, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d3787a1020', 'BDT'),
	(44, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d378b6d6f5', 'BDT'),
	(45, 'John Doe', 'john.doe@email.com', '01711111111', 10000, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d378ca8e5e', 'BDT'),
	(46, 'Customer Name', 'customer@example.com', '0123456789', 500, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d380dbc0f7', 'BDT'),
	(47, 'Customer Name', 'customer@example.com', '0123456789', 500, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d38134f0d4', 'BDT'),
	(48, 'Customer Name', 'customer@example.com', '0123456789', 500, 'Dhaka', 'Pending', 'SSLCZ_TEST_670d58af43840', 'BDT');

-- Dumping structure for table vehiclebookings.tms_admin
CREATE TABLE IF NOT EXISTS `tms_admin` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_admin: ~0 rows (approximately)
INSERT INTO `tms_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
	(1, 'System Admin', 'admin@mail.com', 'admin');

-- Dumping structure for table vehiclebookings.tms_feedback
CREATE TABLE IF NOT EXISTS `tms_feedback` (
  `f_id` int NOT NULL AUTO_INCREMENT,
  `f_uname` varchar(200) NOT NULL,
  `f_content` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_feedback: ~3 rows (approximately)
INSERT INTO `tms_feedback` (`f_id`, `f_uname`, `f_content`, `f_status`) VALUES
	(1, 'Tarin Sharmily', 'This is a demo feedback text. This is a demo feedback text. This is a demo feedback text.', 'Published'),
	(2, 'Mark L. Anderson', 'Sample Feedback Text for testing! Sample Feedback Text for testing! Sample Feedback Text for testing!', 'Published'),
	(3, 'Liam Moore ', 'test number 3', '');

-- Dumping structure for table vehiclebookings.tms_pwd_resets
CREATE TABLE IF NOT EXISTS `tms_pwd_resets` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `r_email` varchar(200) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_pwd_resets: ~0 rows (approximately)
INSERT INTO `tms_pwd_resets` (`r_id`, `r_email`) VALUES
	(2, 'admin@mail.com');

-- Dumping structure for table vehiclebookings.tms_syslogs
CREATE TABLE IF NOT EXISTS `tms_syslogs` (
  `l_id` int NOT NULL AUTO_INCREMENT,
  `u_id` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_ip` varbinary(200) NOT NULL,
  `u_city` varchar(200) NOT NULL,
  `u_country` varchar(200) NOT NULL,
  `u_logintime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_syslogs: ~0 rows (approximately)

-- Dumping structure for table vehiclebookings.tms_user
CREATE TABLE IF NOT EXISTS `tms_user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_phone` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_addr` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_category` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_pwd` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_car_type` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_car_regno` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_car_bookdate` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `u_car_book_status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_user: ~10 rows (approximately)
INSERT INTO `tms_user` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_addr`, `u_category`, `u_email`, `u_pwd`, `u_car_type`, `u_car_regno`, `u_car_bookdate`, `u_car_book_status`) VALUES
	(3, 'Demo', 'User', '070678909', '90100 Machakos ', 'Driver', 'demouser@tms.com', 'demo123', 'SUV', 'CA1001', '2022-09-01', 'Approved'),
	(4, 'John', 'Settles', '7145698540', '45 Clearview Drive', 'Driver', 'johns@mail.com', 'password', '', '', '', ''),
	(5, 'Joseph', 'Yung', '7896587777', '72 Doe Meadow Drive', 'Driver', 'joseph@mail.com', 'password', '', '', '', ''),
	(6, 'Vincent', 'Pelletier', '4580001456', '58 Farland Avenue', 'Driver', 'vincentp@mail.com', 'password', '', '', '', ''),
	(7, 'Jesse', 'Robinson', '1458887855', '73 Fleming Way', 'Driver', 'jesser@mail.com', 'password', '', '', '', ''),
	(8, 'Nelson', 'Ford', '7458965874', '58 West Side Avenue', 'User', 'nelford@mail.com', 'password', 'Sedan', 'CA1690', '2022-09-13', 'Approved'),
	(9, 'Paul', 'Mills', '7412563258', '12 Red Maple Drive', 'User', 'paul@mail.com', 'password', 'Sedan', 'CA2077', '2022-09-14', 'Pending'),
	(10, 'Liam', 'Moore', '7410001212', '114 Bleck Street', 'User', 'liamoore@mail.com', 'password', 'Sedan', 'CA1690', '2022-09-14', 'Approved'),
	(11, 'Jeff', 'Lewis', '7854545454', '114 Test Adr', 'User', 'jeff@mail.com', 'password', 'Sedan', 'CA7700', '2022-09-14', 'Pending'),
	(12, 'Kenya', 'Norman', '7896547855', '114 Test Addr', 'User', 'normank@mail.com', 'password', 'Bus', 'CA7766', '2022-09-15', 'Pending'),
	(13, 'solo', 'boss', '01234567890', 'somwhere in the world', 'User', 'solo@gmail.com', '12345', 'Nissan Rogue', 'CA1001', '2024-11-11', 'pending');

-- Dumping structure for table vehiclebookings.tms_vehicle
CREATE TABLE IF NOT EXISTS `tms_vehicle` (
  `v_id` int NOT NULL AUTO_INCREMENT,
  `v_name` varchar(200) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_pass_no` varchar(200) NOT NULL,
  `v_driver` varchar(200) NOT NULL,
  `v_category` varchar(200) NOT NULL,
  `v_price` int NOT NULL DEFAULT '0',
  `v_dpic` varchar(200) NOT NULL,
  `v_status` varchar(200) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table vehiclebookings.tms_vehicle: ~5 rows (approximately)
INSERT INTO `tms_vehicle` (`v_id`, `v_name`, `v_reg_no`, `v_pass_no`, `v_driver`, `v_category`, `v_price`, `v_dpic`, `v_status`) VALUES
	(3, 'Euro Bond', 'CA7766', '50', 'Vincent Pelletier', 'Matatu', 3000, '', 'Booked'),
	(4, 'Honda Accord', 'CA2077', '5', 'Joseph Yung', 'Sedan', 1500, '2019_honda_accord_angularfront.jpg', 'Available'),
	(5, 'Volkswagen Passat', 'CA1690', '5', 'Jesse Robinson', 'Sedan', 5000, 'volkswagen-passat-500.jpg', 'Available'),
	(6, 'Nissan Rogue', 'CA1001', '7', 'Demo User', 'SUV', 6500, 'Nissan_Rogue_SV_2021.jpg', 'Available'),
	(7, 'Subaru Legacy', 'CA7700', '5', 'John Settles', 'Sedan', 2500, 'Subaru_Legacy_Premium_2022_2.jpg', 'Available');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
