-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2015 at 10:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
`admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `branch_contact_number` varchar(20) DEFAULT NULL,
  `number_of_employees` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','UNDER RENOVATION') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_address`, `branch_contact_number`, `number_of_employees`, `status`) VALUES
(1501, 'North Road, Jagobiao, 6014 Mandaue City', '09173088850', NULL, 'ACTIVE'),
(1502, 'Mandaue', '1234', NULL, 'INACTIVE'),
(1503, 'Talamban', '4321', NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `employee_address` varchar(255) DEFAULT NULL,
  `employee_contact_number` varchar(255) DEFAULT NULL,
  `employee_email_address` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','UNDER PROBATION') DEFAULT NULL,
  `position` enum('MANAGER','GRAPHIC ARTIST','SALES REPRESENTATIVE','PRINTER/INSTALLER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `branch_id`, `employee_name`, `gender`, `employee_address`, `employee_contact_number`, `employee_email_address`, `status`, `position`) VALUES
(1501, 1503, 'Ngalan Sa Taw', 'FEMALE', 'Wee', '0000', 'b@a.com', 'ACTIVE', 'MANAGER'),
(1502, 1503, 'Nawng Nimo Bati', 'FEMALE', 'Pardo', '555', 'g@x.com', 'ACTIVE', 'PRINTER/INSTALLER'),
(151001, 1501, 'Name Of Employee', 'MALE', 'House Lang', '5678', 'a@b.com', 'ACTIVE', 'GRAPHIC ARTIST');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`item_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_category` enum('TARPAULIN','STICKER','SIGNAGE','BANNER','DIGITAL PRINTING','T-SHIRT') DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` enum('AVAILABLE','UNAVAILABLE','OUT OF STOCK') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `branch_id`, `item_name`, `item_description`, `item_category`, `quantity`, `price`, `status`) VALUES
(1, 1501, '10 oz', '50ft x 50 ft dimension', 'TARPAULIN', 20, '12', 'AVAILABLE'),
(2, 1503, 'Lighted Signage (GI)', '1-side 10 sq. ft.', 'SIGNAGE', 20, '420', 'AVAILABLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
 ADD PRIMARY KEY (`branch_id`), ADD UNIQUE KEY `branch_id` (`branch_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`employee_id`,`branch_id`), ADD UNIQUE KEY `employee_id` (`employee_id`), ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`item_id`,`branch_id`), ADD UNIQUE KEY `item_id` (`item_id`), ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
