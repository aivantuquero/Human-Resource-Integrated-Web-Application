-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 07:09 PM
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
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` int(30) NOT NULL,
  `allowance` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `allowance`, `description`) VALUES
(1, 'Sample', 'Sample Allowance'),
(2, 'Phone', 'Phone Allowance'),
(3, 'Rice', 'Rice Allowance'),
(4, 'House', 'House Allowance');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `log_type` tinyint(1) NOT NULL COMMENT '1 = AM IN,2 = AM out, 3= PM IN, 4= PM out\r\n',
  `datetime_log` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `log_type`, `datetime_log`, `date_updated`) VALUES
(18, 10, 4, '2023-05-01 16:00:00', '2023-05-20 16:18:13'),
(20, 10, 4, '2023-05-02 16:16:00', '2023-05-20 16:18:13'),
(22, 10, 4, '2023-05-03 16:16:00', '2023-05-20 16:18:13'),
(24, 10, 4, '2023-05-04 16:00:00', '2023-05-20 16:18:13'),
(26, 10, 4, '2023-05-08 16:17:00', '2023-05-20 16:18:13'),
(28, 10, 4, '2023-05-09 16:17:00', '2023-05-20 16:18:13'),
(29, 10, 2, '2023-05-01 11:00:00', '2023-05-21 23:44:58'),
(30, 0, 3, '2023-05-01 12:00:00', '2023-05-21 23:44:58'),
(32, 10, 3, '2023-05-01 12:00:00', '2023-05-21 23:46:56'),
(33, 10, 2, '2023-05-02 12:00:00', '2023-05-22 21:23:47'),
(34, 10, 3, '2023-05-02 13:00:00', '2023-05-22 21:23:47'),
(35, 10, 1, '2023-05-02 08:00:00', '2023-05-22 21:27:31'),
(36, 10, 1, '2023-05-01 08:00:00', '2023-05-22 21:29:23'),
(37, 10, 1, '2023-05-03 08:00:00', '2023-05-22 21:35:14'),
(38, 10, 2, '2023-05-03 12:00:00', '2023-05-22 21:35:14'),
(40, 10, 1, '2023-05-04 08:00:00', '2023-05-22 21:35:14'),
(41, 10, 2, '2023-05-04 12:00:00', '2023-05-22 21:35:14'),
(42, 10, 3, '2023-05-04 13:00:00', '2023-05-22 21:35:14'),
(43, 10, 1, '2023-05-05 08:00:00', '2023-05-22 21:35:14'),
(44, 10, 2, '2023-05-05 12:00:00', '2023-05-22 21:35:14'),
(45, 10, 3, '2023-05-05 13:00:00', '2023-05-22 21:35:14'),
(46, 10, 4, '2023-05-05 17:00:00', '2023-05-22 21:35:14'),
(47, 10, 3, '2023-05-03 13:00:00', '2023-05-22 21:36:07'),
(48, 10, 1, '2023-05-08 08:00:00', '2023-05-22 21:37:05'),
(51, 10, 2, '2023-05-08 12:00:00', '2023-05-22 21:38:46'),
(52, 10, 3, '2023-05-08 13:00:00', '2023-05-22 21:38:46'),
(53, 10, 1, '2023-05-09 08:00:00', '2023-05-22 21:43:09'),
(54, 10, 2, '2023-05-09 12:00:00', '2023-05-22 21:43:09'),
(55, 10, 3, '2023-05-09 13:00:00', '2023-05-22 21:43:09'),
(56, 10, 1, '2023-05-10 08:00:00', '2023-05-22 21:43:09'),
(57, 10, 2, '2023-05-10 12:00:00', '2023-05-22 21:43:09'),
(58, 10, 3, '2023-05-10 13:00:00', '2023-05-22 21:43:09'),
(59, 10, 4, '2023-05-10 17:00:00', '2023-05-22 21:43:09'),
(60, 10, 1, '2023-05-11 08:00:00', '2023-05-22 21:43:09'),
(61, 10, 2, '2023-05-11 12:00:00', '2023-05-22 21:43:09'),
(62, 10, 3, '2023-05-11 13:00:00', '2023-05-22 21:43:09'),
(63, 10, 4, '2023-05-11 17:00:00', '2023-05-22 21:43:09'),
(64, 10, 1, '2023-05-12 08:00:00', '2023-05-22 21:43:09'),
(65, 10, 2, '2023-05-12 12:00:00', '2023-05-22 21:43:09'),
(66, 10, 3, '2023-05-12 13:00:00', '2023-05-22 21:43:09'),
(67, 10, 4, '2023-05-12 17:00:00', '2023-05-22 21:43:09'),
(68, 10, 1, '2023-05-15 08:00:00', '2023-05-22 21:43:09'),
(69, 10, 2, '2023-05-15 12:00:00', '2023-05-22 21:43:09'),
(70, 10, 3, '2023-05-15 13:00:00', '2023-05-22 21:43:09'),
(71, 10, 4, '2023-05-15 17:00:00', '2023-05-22 21:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(30) NOT NULL,
  `deduction` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `deduction`, `description`) VALUES
(4, 'Cash Advance', 'Cash advance for instant cash to be subtracted to your salary.');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(4, 'Administration'),
(5, 'Sales Lady'),
(6, 'Inventory'),
(7, 'Delivery'),
(8, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department_id` int(30) NOT NULL,
  `position_id` int(30) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `department_id`, `position_id`, `salary`) VALUES
(10, '2023-4797', 'Aivan Carlos', 'Barroa', 'Tuquero', 8, 5, 20000),
(11, '2023-7922', 'Tricia Anne', '', 'Borcelis', 5, 8, 19000);

-- --------------------------------------------------------

--
-- Table structure for table `employee_allowances`
--

CREATE TABLE `employee_allowances` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `allowance_id` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = Monthly, 2= Semi-Montly, 3 = once',
  `amount` float NOT NULL,
  `effective_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductions`
--

CREATE TABLE `employee_deductions` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `deduction_id` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = Monthly, 2= Semi-Montly, 3 = once',
  `amount` float NOT NULL,
  `effective_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = monthly ,2 semi-monthly',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =New,1 = computed',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `ref_no`, `date_from`, `date_to`, `type`, `status`, `date_created`) VALUES
(2, '2023-80', '2023-05-01', '2023-05-15', 2, 1, '2023-05-20 13:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` int(30) NOT NULL,
  `payroll_id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `present` int(30) NOT NULL,
  `absent` int(10) NOT NULL,
  `late` text NOT NULL,
  `salary` double NOT NULL,
  `allowance_amount` double NOT NULL,
  `allowances` text NOT NULL,
  `deduction_amount` double NOT NULL,
  `deductions` text NOT NULL,
  `net` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`id`, `payroll_id`, `employee_id`, `present`, `absent`, `late`, `salary`, `allowance_amount`, `allowances`, `deduction_amount`, `deductions`, `net`, `date_created`) VALUES
(46, 2, 10, 11, 0, '294', 20000, 0, '[]', 0, '[]', 9443, '2023-05-25 00:21:06'),
(47, 2, 11, 0, 11, '0', 19000, 0, '[]', 0, '[]', 0, '2023-05-25 00:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `department_id`, `name`) VALUES
(5, 8, 'Manager'),
(6, 8, 'General Manager'),
(7, 7, 'Delivery Employee'),
(8, 5, 'Employee'),
(9, 4, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'Administrator', '', '', 'admin', 'admin123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
