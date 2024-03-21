-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 11:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_timetable_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `period_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `staff_short_name` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `total_in_week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`period_id`, `dept_id`, `year`, `section`, `sub_id`, `staff_short_name`, `duration`, `total_in_week`) VALUES
(63, 8, 1, '2', 41, 'SSD', 2, 2),
(65, 8, 1, '2', 48, 'PSS', 2, 2),
(67, 8, 1, '2', 51, 'MJG', 1, 4),
(68, 8, 1, '2', 49, 'SPC', 2, 2),
(69, 8, 1, '2', 42, 'PGB', 1, 3),
(72, 8, 1, '2', 50, 'SPC', 1, 2),
(73, 8, 1, '2', 45, 'SSB', 1, 4),
(74, 8, 1, '2', 46, 'SSB', 2, 2),
(76, 8, 1, '2', 47, 'PSS', 1, 2),
(81, 8, 1, '2', 44, 'PGB', 1, 2),
(83, 8, 2, '2', 37, 'SRC', 1, 5),
(84, 8, 2, '2', 38, 'SRC', 2, 1),
(85, 8, 2, '2', 40, 'PSS', 1, 2),
(86, 8, 2, '2', 39, 'PSS', 2, 2),
(87, 8, 2, '2', 31, 'KAS', 1, 4),
(88, 8, 2, '2', 32, 'KAS', 2, 1),
(89, 8, 2, '2', 35, 'PSS', 1, 3),
(90, 8, 2, '2', 33, 'SNM', 1, 3),
(91, 8, 2, '2', 36, 'PSS', 2, 1),
(92, 8, 2, '2', 34, 'SNM', 2, 2),
(93, 8, 3, '2', 20, 'SRC', 1, 3),
(94, 8, 3, '2', 22, 'DTB', 1, 3),
(95, 8, 3, '2', 21, 'DTB', 2, 1),
(96, 8, 3, '2', 23, 'SPC', 1, 4),
(97, 8, 3, '2', 24, 'SPC', 2, 2),
(98, 8, 3, '2', 25, 'PSS', 1, 3),
(99, 8, 3, '2', 26, 'KAS', 1, 3),
(100, 8, 3, '2', 27, 'KAS', 2, 1),
(101, 8, 3, '2', 28, 'NRP', 1, 2),
(102, 8, 3, '2', 27, 'NRP', 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `class_list`
-- (See below for the actual view)
--
CREATE TABLE `class_list` (
`Department_Name` varchar(255)
,`Department_ID` int(11)
,`section_no` varchar(10)
,`Year` int(11)
,`Section` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `d_code` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sections` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `d_code`, `year`, `sections`) VALUES
(8, 'Computer Engineering', 'CM', 3, 2),
(32, 'Mechanical Engineering ', 'ME', 2, 2),
(33, 'Civil Engineering ', 'CE', 3, 1),
(36, 'Computer Science Engineering ', 'CW', 3, 2),
(37, 'Electrical Engineering ', 'EE', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rem_periods`
--

CREATE TABLE `rem_periods` (
  `period_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `staff_short_name` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `total_in_week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rem_periods`
--

INSERT INTO `rem_periods` (`period_id`, `dept_id`, `year`, `section`, `sub_id`, `staff_short_name`, `duration`, `total_in_week`) VALUES
(93, 8, 3, '2', 20, 'SRC', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_name` varchar(255) NOT NULL,
  `short_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_name`, `short_name`) VALUES
('Mr.D.T.Bharote', 'DTB'),
('Mrs. J. M. Suryavanshi', 'JMS'),
('Mrs.K.A.Sisodiya', 'KAS'),
('Ms. M. J. Gujar', 'MJG'),
('Mr.N.R.Patil', 'NRP'),
('Mr. P. G. Bhadane', 'PGB'),
('Mrs.P.S.Sonawane', 'PSS'),
('Mrs.S.N.Madavi', 'SNM'),
('Mr.S.P.Chavan', 'SPC'),
('Ms.S.R.Chaudhari', 'SRC'),
('Mr. S. S. Bafana', 'SSB'),
('Mr. S. S. Dutte', 'SSD');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `scode` varchar(20) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `stype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `scode`, `sname`, `stype`) VALUES
(19, '22060', 'CPE', 'Lab'),
(20, '22509', 'MGT', 'Theory'),
(21, '22616', 'PWP', 'Lab'),
(22, '22616', 'PWP', 'Theory'),
(23, '22617', 'MAD', 'Theory'),
(24, '22617', 'MAD', 'Lab'),
(25, '22618', 'ETI', 'Theory'),
(26, '22619', 'WBP', 'Theory'),
(27, '22619', 'WBP', 'Lab'),
(28, '22032', 'EDE', 'Theory'),
(29, '22032', 'EDE', 'Lab'),
(30, '-', 'Microproject', 'Lab'),
(31, '22414', 'DCC', 'Theory'),
(32, '22414', 'DCC', 'Lab'),
(33, '22412', 'JPR', 'Theory'),
(34, '22412', 'JPR', 'Lab'),
(35, '22413', 'SEN', 'Theory'),
(36, '22413', 'SEN', 'Lab'),
(37, '22415', 'MIC', 'Theory'),
(38, '22415', 'MIC', 'Lab'),
(39, '22034', 'GAD', 'Lab'),
(40, '22034', 'GAD', 'Theory'),
(41, '312002', 'PCO', 'Lab'),
(42, '312301', 'AMS', 'Theory'),
(44, '312301', 'AMS', 'Tutorial'),
(45, '312302', 'BEE', 'Theory'),
(46, '312302', 'BEE', 'Lab'),
(47, '22228', 'WPD', 'Theory'),
(48, '22228', 'WPD', 'Lab'),
(49, '3122001', 'BLP', 'Lab'),
(50, '312001', 'BLP', 'Theory'),
(51, '312303', 'PCI', 'Theory'),
(52, '312303', 'PCI', 'Lab');

-- --------------------------------------------------------

--
-- Stand-in structure for view `timetable_view`
-- (See below for the actual view)
--
CREATE TABLE `timetable_view` (
`Day` varchar(50)
,`Start_Time` time
,`End_Time` time
,`Department_ID` int(11)
,`Department_Name` varchar(255)
,`Year` int(11)
,`Section` varchar(10)
,`Subject_ID` int(11)
,`Subject_Code` varchar(20)
,`Subject_Name` varchar(255)
,`Staff_Short_Name` varchar(10)
,`Staff_Name` varchar(255)
,`recess` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `period_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `recess` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `day`, `period_id`, `start_time`, `end_time`, `recess`) VALUES
(1, 'Monday', 63, '10:00:00', '12:00:00', 0),
(2, 'Tuesday', 63, '10:00:00', '12:00:00', 0),
(3, 'Wednesday', 65, '10:00:00', '12:00:00', 0),
(4, 'Thursday', 65, '10:00:00', '12:00:00', 0),
(5, 'Friday', 67, '10:00:00', '11:00:00', 0),
(6, 'Saturday', 67, '10:00:00', '11:00:00', 0),
(7, 'Monday', 67, '12:00:00', '13:00:00', 1),
(8, 'Monday', 67, '13:00:00', '14:00:00', 0),
(9, 'Tuesday', 67, '12:00:00', '13:00:00', 1),
(10, 'Tuesday', 67, '13:00:00', '14:00:00', 0),
(11, 'Wednesday', 68, '12:00:00', '13:00:00', 1),
(12, 'Wednesday', 68, '13:00:00', '15:00:00', 0),
(13, 'Thursday', 68, '12:00:00', '13:00:00', 1),
(14, 'Thursday', 68, '13:00:00', '15:00:00', 0),
(15, 'Friday', 69, '11:00:00', '12:00:00', 0),
(16, 'Saturday', 69, '11:00:00', '12:00:00', 0),
(17, 'Monday', 69, '14:00:00', '15:00:00', 0),
(18, 'Tuesday', 72, '14:00:00', '15:00:00', 0),
(19, 'Wednesday', 72, '15:00:00', '16:00:00', 0),
(20, 'Thursday', 73, '15:00:00', '16:00:00', 0),
(21, 'Friday', 73, '12:00:00', '13:00:00', 1),
(22, 'Friday', 73, '13:00:00', '14:00:00', 0),
(23, 'Saturday', 73, '12:00:00', '13:00:00', 1),
(24, 'Saturday', 73, '13:00:00', '14:00:00', 0),
(25, 'Monday', 73, '15:00:00', '16:00:00', 0),
(26, 'Tuesday', 74, '15:00:00', '17:00:00', 0),
(27, 'Friday', 74, '14:00:00', '16:00:00', 0),
(28, 'Saturday', 76, '14:00:00', '15:00:00', 0),
(29, 'Monday', 76, '16:00:00', '17:00:00', 0),
(30, 'Wednesday', 81, '16:00:00', '17:00:00', 0),
(31, 'Thursday', 81, '16:00:00', '17:00:00', 0),
(32, 'Friday', 83, '10:00:00', '11:00:00', 0),
(33, 'Saturday', 83, '10:00:00', '11:00:00', 0),
(34, 'Monday', 83, '10:00:00', '11:00:00', 0),
(35, 'Tuesday', 83, '10:00:00', '11:00:00', 0),
(36, 'Wednesday', 83, '10:00:00', '11:00:00', 0),
(37, 'Thursday', 84, '10:00:00', '12:00:00', 0),
(38, 'Friday', 85, '11:00:00', '12:00:00', 0),
(39, 'Saturday', 85, '11:00:00', '12:00:00', 0),
(40, 'Monday', 86, '11:00:00', '13:00:00', 0),
(41, 'Tuesday', 86, '11:00:00', '13:00:00', 0),
(42, 'Wednesday', 87, '11:00:00', '12:00:00', 0),
(43, 'Thursday', 87, '12:00:00', '13:00:00', 1),
(44, 'Thursday', 87, '13:00:00', '14:00:00', 0),
(45, 'Friday', 87, '12:00:00', '13:00:00', 1),
(46, 'Friday', 87, '13:00:00', '14:00:00', 0),
(47, 'Saturday', 87, '12:00:00', '13:00:00', 1),
(48, 'Saturday', 87, '13:00:00', '14:00:00', 0),
(49, 'Monday', 88, '13:00:00', '14:00:00', 1),
(50, 'Monday', 88, '14:00:00', '16:00:00', 0),
(51, 'Tuesday', 89, '13:00:00', '14:00:00', 1),
(52, 'Tuesday', 89, '14:00:00', '15:00:00', 0),
(53, 'Wednesday', 89, '12:00:00', '13:00:00', 1),
(54, 'Wednesday', 89, '13:00:00', '14:00:00', 0),
(55, 'Thursday', 89, '14:00:00', '15:00:00', 0),
(56, 'Friday', 90, '14:00:00', '15:00:00', 0),
(57, 'Saturday', 90, '14:00:00', '15:00:00', 0),
(58, 'Monday', 90, '16:00:00', '17:00:00', 0),
(59, 'Tuesday', 91, '15:00:00', '17:00:00', 0),
(60, 'Wednesday', 92, '14:00:00', '16:00:00', 0),
(61, 'Thursday', 92, '15:00:00', '17:00:00', 0),
(62, 'Monday', 94, '10:00:00', '11:00:00', 0),
(63, 'Tuesday', 94, '10:00:00', '11:00:00', 0),
(64, 'Wednesday', 94, '10:00:00', '11:00:00', 0),
(65, 'Thursday', 95, '10:00:00', '12:00:00', 0),
(66, 'Friday', 96, '10:00:00', '11:00:00', 0),
(67, 'Saturday', 96, '10:00:00', '11:00:00', 0),
(68, 'Monday', 96, '11:00:00', '12:00:00', 0),
(69, 'Tuesday', 96, '11:00:00', '12:00:00', 0),
(70, 'Wednesday', 97, '11:00:00', '13:00:00', 0),
(71, 'Thursday', 97, '12:00:00', '13:00:00', 1),
(72, 'Friday', 97, '11:00:00', '13:00:00', 0),
(73, 'Monday', 98, '12:00:00', '13:00:00', 1),
(74, 'Monday', 98, '13:00:00', '14:00:00', 0),
(75, 'Tuesday', 98, '12:00:00', '13:00:00', 1),
(76, 'Wednesday', 98, '13:00:00', '14:00:00', 1),
(77, 'Wednesday', 98, '14:00:00', '15:00:00', 0),
(78, 'Thursday', 98, '13:00:00', '14:00:00', 0),
(79, 'Friday', 99, '13:00:00', '14:00:00', 1),
(80, 'Friday', 99, '14:00:00', '15:00:00', 0),
(81, 'Saturday', 99, '11:00:00', '12:00:00', 0),
(82, 'Tuesday', 99, '13:00:00', '14:00:00', 0),
(83, 'Wednesday', 100, '15:00:00', '17:00:00', 0),
(84, 'Thursday', 101, '14:00:00', '15:00:00', 0),
(85, 'Friday', 101, '15:00:00', '16:00:00', 0),
(86, 'Saturday', 102, '12:00:00', '13:00:00', 1),
(87, 'Saturday', 102, '13:00:00', '15:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Amey Pathe', 'ameypte@gmail.com', 'admin'),
(2, 'sushma patil', 'sushma3@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Structure for view `class_list`
--
DROP TABLE IF EXISTS `class_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `class_list`  AS SELECT DISTINCT `timetable_view`.`Department_Name` AS `Department_Name`, `timetable_view`.`Department_ID` AS `Department_ID`, `timetable_view`.`Section` AS `section_no`, `timetable_view`.`Year` AS `Year`, CASE WHEN `timetable_view`.`Section` = 1 THEN 'A' WHEN `timetable_view`.`Section` = 2 THEN 'B' WHEN `timetable_view`.`Section` = 3 THEN 'C' WHEN `timetable_view`.`Section` = 4 THEN 'D' WHEN `timetable_view`.`Section` = 5 THEN 'E' WHEN `timetable_view`.`Section` = 6 THEN 'F' WHEN `timetable_view`.`Section` = 7 THEN 'G' WHEN `timetable_view`.`Section` = 8 THEN 'H' WHEN `timetable_view`.`Section` = 9 THEN 'I' WHEN `timetable_view`.`Section` = 10 THEN 'J' WHEN `timetable_view`.`Section` = 11 THEN 'K' ELSE `timetable_view`.`Section` END AS `Section` FROM `timetable_view` ;

-- --------------------------------------------------------

--
-- Structure for view `timetable_view`
--
DROP TABLE IF EXISTS `timetable_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `timetable_view`  AS SELECT `tt`.`day` AS `Day`, `tt`.`start_time` AS `Start_Time`, `tt`.`end_time` AS `End_Time`, `d`.`id` AS `Department_ID`, `d`.`dept_name` AS `Department_Name`, `a`.`year` AS `Year`, `a`.`section` AS `Section`, `s`.`sub_id` AS `Subject_ID`, `s`.`scode` AS `Subject_Code`, `s`.`sname` AS `Subject_Name`, `st`.`short_name` AS `Staff_Short_Name`, `st`.`staff_name` AS `Staff_Name`, `tt`.`recess` AS `recess` FROM ((((`time_table` `tt` join `assigned` `a` on(`tt`.`period_id` = `a`.`period_id`)) join `subjects` `s` on(`a`.`sub_id` = `s`.`sub_id`)) join `staff` `st` on(`a`.`staff_short_name` = `st`.`short_name`)) join `departments` `d` on(`a`.`dept_id` = `d`.`id`)) ORDER BY field(`tt`.`day`,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') ASC, `tt`.`start_time` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`period_id`),
  ADD KEY `fk_dept` (`dept_id`),
  ADD KEY `fk_sub` (`sub_id`),
  ADD KEY `fk_staff` (`staff_short_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rem_periods`
--
ALTER TABLE `rem_periods`
  ADD PRIMARY KEY (`period_id`),
  ADD KEY `fk_dept` (`dept_id`),
  ADD KEY `fk_sub` (`sub_id`),
  ADD KEY `fk_staff` (`staff_short_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`short_name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `unique_subject_type` (`scode`,`stype`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_period_tt` (`period_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rem_periods`
--
ALTER TABLE `rem_periods`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_dept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_staff` FOREIGN KEY (`staff_short_name`) REFERENCES `staff` (`short_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sub` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `fk_period_tt` FOREIGN KEY (`period_id`) REFERENCES `assigned` (`period_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
