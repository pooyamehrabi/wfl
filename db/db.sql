-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for crm
DROP DATABASE IF EXISTS `crm`;
CREATE DATABASE IF NOT EXISTS `crm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crm`;

-- Dumping structure for table crm.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `start_course_date` varchar(30) NOT NULL,
  `course_time` varchar(30) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `students` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.courses: 0 rows
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table crm.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `NID` varchar(10) NOT NULL DEFAULT '',
  `username` varchar(50) DEFAULT '',
  `password` varchar(40) DEFAULT '',
  `type` varchar(10) DEFAULT 'user',
  `firstname` varchar(20) DEFAULT '',
  `lastname` varchar(30) DEFAULT '',
  `birthday` varchar(30) DEFAULT '',
  `civil_status` varchar(10) DEFAULT '',
  `mobile` varchar(20) DEFAULT '',
  `phone` varchar(20) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `family_phone` varchar(20) DEFAULT '',
  `address` varchar(200) DEFAULT '',
  `degree` varchar(10) DEFAULT '',
  `study_field` varchar(200) DEFAULT '',
  `job_title` varchar(20) DEFAULT '',
  `experience` varchar(200) DEFAULT '',
  `about` varchar(500) DEFAULT '',
  `refree` varchar(20) DEFAULT '',
  `refree_name` varchar(20) DEFAULT '',
  `picture` varchar(20) DEFAULT '',
  `national_card` varchar(20) DEFAULT '',
  PRIMARY KEY (`NID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
