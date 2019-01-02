-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 06:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_experiment`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaiable_time`
--

CREATE TABLE `avaiable_time` (
  `avaiable_time_id` int(11) NOT NULL,
  `avaiable_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaiable_time`
--

INSERT INTO `avaiable_time` (`avaiable_time_id`, `avaiable_time`) VALUES
(0, 'Not Available'),
(1, 'Morning (Within 8.00am - 12.00pm)'),
(2, 'Afternoon (Within 12.01pm - 5.00pm)'),
(3, 'Evening (Within 5.00pm - 8.00pm)');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(11) NOT NULL,
  `medium_id` int(11) NOT NULL,
  `Class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `medium_id`, `Class`) VALUES
(0, 0, 'Not Available'),
(1, 2, 'PSC'),
(2, 2, '6'),
(3, 2, '7'),
(4, 2, 'JSC'),
(5, 2, 'SSC'),
(6, 2, 'HSC'),
(7, 1, '5'),
(8, 1, '6'),
(9, 1, '7'),
(10, 1, '8'),
(11, 1, '9'),
(12, 1, 'O level'),
(13, 1, 'A level');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `avaiable_time_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day`, `avaiable_time_id`) VALUES
(0, 'Not Available', 0),
(1, 'Saturday', 1),
(2, 'Saturday', 2),
(3, 'Saturday', 3),
(4, 'Sunday', 1),
(5, 'Sunday', 2),
(6, 'Sunday', 3),
(7, 'Monday', 1),
(8, 'Monday', 2),
(9, 'Monday', 3),
(10, 'Tuesday', 1),
(11, 'Tuesday', 2),
(12, 'Tuesday', 3),
(13, 'Wednesday', 1),
(14, 'Wednesday', 2),
(15, 'Wednesday', 3),
(16, 'Thursday', 1),
(17, 'Thursday', 2),
(18, 'Thursday', 3),
(19, 'Friday', 1),
(20, 'Friday', 2),
(21, 'Friday', 3);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `Tutor_ID` int(11) DEFAULT NULL,
  `University_name` varchar(255) DEFAULT NULL,
  `University_dept` varchar(255) DEFAULT NULL,
  `University_result` decimal(10,0) DEFAULT NULL,
  `University_from_to` varchar(255) NOT NULL,
  `College_name` varchar(255) DEFAULT NULL,
  `College_dept` varchar(255) DEFAULT NULL,
  `College_result` decimal(10,0) DEFAULT NULL,
  `College_from_to` varchar(255) NOT NULL,
  `School_name` varchar(255) DEFAULT NULL,
  `School_dept` varchar(255) DEFAULT NULL,
  `School_result` decimal(10,0) DEFAULT NULL,
  `School_from_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`Tutor_ID`, `University_name`, `University_dept`, `University_result`, `University_from_to`, `College_name`, `College_dept`, `College_result`, `College_from_to`, `School_name`, `School_dept`, `School_result`, `School_from_to`) VALUES
(10, 'NSU', 'CSE', '3', '2015 - 2019', 'UHSC', 'Science', '5', '2015 - 2019', 'TPSC', 'Science', '5', '2015 - 2019'),
(11, 'BUET', 'CSE', '3', '2015 - 2019', 'UHSC', 'Science', '5', '2015 - 2019', 'TPSC', 'Science', '5', '2015 - 2019'),
(12, 'DIU', 'BBA', '3', '2015 - 2019', 'RUMC', 'Commarce', '5', '2015 - 2019', 'MC', 'Commarce', '5', '2015 - 2019'),
(13, 'Dhaka University ', 'BBA', '3', '2015 - 2019', 'RUMC', 'Commarce', '5', '2015 - 2019', 'UHSC', 'Science', '5', '2015 - 2019'),
(14, 'Dhaka University ', 'BBA', '3', '2008 - 2014', 'VNC', 'Commarce', '5', '2008 - 2014', 'SSAC', 'Science', '5', '2008 - 2014'),
(15, 'Dhaka University ', 'BBA', '3', '2008 - 2014', 'MC', 'Commarce', '5', '2008 - 2014', 'TPSC', 'Science', '5', '2008 - 2014'),
(16, 'Dhaka University ', 'BBA', '3', '2008 - 2014', 'MC', 'Commarce', '5', '2008 - 2014', 'TPSC', 'Science', '5', '2008 - 2014'),
(17, 'CU', 'BBA', '3', '2010- 2014', 'RUMC', 'Commarce', '5', '2010- 2014', 'MC', 'Commarce', '4', '2010- 2014');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `Gender_id` int(11) NOT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`Gender_id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`) VALUES
(1, 'Uttara'),
(2, 'Bashundhara'),
(3, 'Mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `medium`
--

CREATE TABLE `medium` (
  `medium_id` int(11) NOT NULL,
  `medium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medium`
--

INSERT INTO `medium` (`medium_id`, `medium`) VALUES
(0, 'Not Available'),
(1, 'English'),
(2, 'Bangla');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `class_id`, `subject`) VALUES
(0, 0, 'Not Available'),
(1, 1, 'English'),
(2, 1, 'Math'),
(3, 1, 'Science'),
(4, 1, 'All'),
(5, 2, 'English'),
(6, 2, 'Math'),
(7, 2, 'Scince'),
(8, 2, 'All'),
(9, 3, 'English'),
(10, 3, 'Math'),
(11, 3, 'Science'),
(12, 3, 'All'),
(13, 4, 'English'),
(14, 4, 'Math'),
(15, 4, 'Science'),
(16, 4, 'All'),
(17, 5, 'English'),
(18, 5, 'Math'),
(19, 5, 'Physics'),
(20, 5, 'Chemistry'),
(21, 5, 'Biology'),
(22, 5, 'All'),
(23, 5, 'Accounting'),
(24, 6, 'English'),
(25, 6, 'Math'),
(26, 6, 'Physics'),
(27, 6, 'Chemistry'),
(28, 6, 'Biology'),
(29, 6, 'All'),
(30, 6, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `Tutor_ID` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`Tutor_ID`, `firstname`, `lastname`, `email`, `phonenumber`) VALUES
(10, 'Md Sharif Alam', 'Priom', 'priom@yahoo.com', '01832545345'),
(11, 'Akhi', 'Hasan', 'akhu@yahoo.com', '01672545345'),
(12, 'Asif', 'Khan', 'asif@yahoo.com', '01992545345'),
(13, 'Mim', 'Anjum', 'min@yahoo.com', '01772545345'),
(14, 'Sufia', 'Akika', 'afifa@yahoo.com', '01676254534'),
(15, 'Rakib', 'Khan', 'rakib@yahoo.com', '01634325453'),
(16, 'Anjum', 'Rafifa', 'rafifa@yahoo.com', '01999432545'),
(17, 'Ahsan', 'Khan', 'ahsan@yahoo.com', '01943254534');

-- --------------------------------------------------------

--
-- Table structure for table `tutors_gender`
--

CREATE TABLE `tutors_gender` (
  `Tutor_ID` int(11) NOT NULL,
  `Gender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors_gender`
--

INSERT INTO `tutors_gender` (`Tutor_ID`, `Gender_id`) VALUES
(10, 1),
(12, 1),
(15, 1),
(17, 1),
(11, 2),
(13, 2),
(14, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_livesin`
--

CREATE TABLE `tutor_livesin` (
  `Tutor_ID` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_livesin`
--

INSERT INTO `tutor_livesin` (`Tutor_ID`, `location_id`) VALUES
(10, 1),
(13, 1),
(17, 1),
(12, 2),
(15, 2),
(11, 3),
(14, 3),
(16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_schedule`
--

CREATE TABLE `tutor_schedule` (
  `Tutor_ID` int(11) NOT NULL,
  `day_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_schedule`
--

INSERT INTO `tutor_schedule` (`Tutor_ID`, `day_id`) VALUES
(10, 1),
(10, 2),
(10, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 7),
(12, 8),
(12, 9),
(13, 10),
(13, 11),
(13, 12),
(14, 13),
(14, 14),
(14, 15),
(15, 16),
(15, 17),
(15, 18),
(16, 0),
(16, 20),
(16, 21),
(17, 0),
(17, 20),
(17, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_teaches`
--

CREATE TABLE `tutor_teaches` (
  `Tutor_ID` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_teaches`
--

INSERT INTO `tutor_teaches` (`Tutor_ID`, `subject_id`) VALUES
(10, 1),
(10, 2),
(10, 4),
(11, 5),
(11, 6),
(11, 8),
(12, 9),
(12, 10),
(12, 12),
(13, 13),
(13, 14),
(13, 16),
(14, 17),
(14, 18),
(14, 22),
(15, 19),
(15, 20),
(15, 21),
(16, 26),
(16, 27),
(16, 28),
(17, 24),
(17, 25),
(17, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Tutor_ID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaiable_time`
--
ALTER TABLE `avaiable_time`
  ADD PRIMARY KEY (`avaiable_time_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_ID`,`medium_id`),
  ADD KEY `medium_id` (`medium_id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`),
  ADD KEY `avaiable_time_id` (`avaiable_time_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD KEY `education_ibfk_1` (`Tutor_ID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`Gender_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`medium_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`Tutor_ID`);

--
-- Indexes for table `tutors_gender`
--
ALTER TABLE `tutors_gender`
  ADD PRIMARY KEY (`Tutor_ID`),
  ADD KEY `tutors_gender_ibfk_2` (`Gender_id`);

--
-- Indexes for table `tutor_livesin`
--
ALTER TABLE `tutor_livesin`
  ADD PRIMARY KEY (`Tutor_ID`),
  ADD KEY `tutor_livesin_ibfk_2` (`location_id`);

--
-- Indexes for table `tutor_schedule`
--
ALTER TABLE `tutor_schedule`
  ADD PRIMARY KEY (`Tutor_ID`,`day_id`),
  ADD KEY `tutor_schedule_ibfk_2` (`day_id`);

--
-- Indexes for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD PRIMARY KEY (`Tutor_ID`,`subject_id`),
  ADD KEY `tutor_teaches_ibfk_2` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Tutor_ID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `Tutor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`medium_id`);

--
-- Constraints for table `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `day_ibfk_1` FOREIGN KEY (`avaiable_time_id`) REFERENCES `avaiable_time` (`avaiable_time_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`Class_ID`);

--
-- Constraints for table `tutors_gender`
--
ALTER TABLE `tutors_gender`
  ADD CONSTRAINT `tutors_gender_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutors_gender_ibfk_2` FOREIGN KEY (`Gender_id`) REFERENCES `gender` (`Gender_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutor_livesin`
--
ALTER TABLE `tutor_livesin`
  ADD CONSTRAINT `tutor_livesin_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor_livesin_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutor_schedule`
--
ALTER TABLE `tutor_schedule`
  ADD CONSTRAINT `tutor_schedule_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor_schedule_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD CONSTRAINT `tutor_teaches_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor_teaches_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
