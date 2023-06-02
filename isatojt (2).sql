-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 03:50 AM
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
-- Database: `isatojt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(255) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_name`, `admin_email`, `admin_username`, `admin_password`) VALUES
(5, 'ISAT-U ADMIN', 'isatu@gmail.com', 'isatu', '$2y$10$w017cLwsEYvcwJWiOWJxWewjooyLmTC1ue8kx/32zfDlyeI3FGdmy');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_ID` int(255) NOT NULL,
  `admin_ID` int(255) DEFAULT NULL,
  `campus_name` varchar(255) DEFAULT NULL,
  `campus_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_ID`, `admin_ID`, `campus_name`, `campus_address`) VALUES
(1, 5, 'Iloilo City Campus', 'La Paz, Iloilo'),
(2, 5, 'Leon Campus', 'Leon, Iloilo'),
(3, 5, 'Miag-ao Campus', 'Miag-ao, Iloilo'),
(4, 5, 'Barotac Viejo Campus', 'Barotac Viejo, Iloilo'),
(5, 5, 'Dumangas Campus', 'Dumangas, Iloilo');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `center_ID` int(255) NOT NULL,
  `center_title` varchar(255) NOT NULL,
  `center_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`center_ID`, `center_title`, `center_position`) VALUES
(7, 'Natural Sciences Research and Development', 'Center Chair'),
(8, 'Technology Research and Development', 'Center Chair'),
(9, 'Humanities and Social Sciences', 'Center Chair');

-- --------------------------------------------------------

--
-- Table structure for table `center_employee`
--

CREATE TABLE `center_employee` (
  `center_employee_ID` int(255) NOT NULL,
  `center_ID` int(255) NOT NULL,
  `department_ID` int(255) NOT NULL,
  `center_employee_name` varchar(255) NOT NULL,
  `center_employee_username` varchar(255) NOT NULL,
  `center_employee_password` varchar(255) NOT NULL,
  `center_employee_contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `center_employee`
--

INSERT INTO `center_employee` (`center_employee_ID`, `center_ID`, `department_ID`, `center_employee_name`, `center_employee_username`, `center_employee_password`, `center_employee_contact`) VALUES
(4, 7, 36, 'Maureen Nettie Linan', 'maureen', '$2y$10$/FsX10rLKte6fsacIxBQM.Oqmabgv142PYkBWkC.9h0QvR.OcWemi', '0989766666');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `cluster_ID` int(255) NOT NULL,
  `center_ID` int(255) NOT NULL,
  `cluster_title` varchar(255) NOT NULL,
  `cluster_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`cluster_ID`, `center_ID`, `cluster_title`, `cluster_position`) VALUES
(7, 8, 'ICT', 'Cluster Coordinator'),
(8, 8, 'In iste eveniet des', 'Cluster Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_employee`
--

CREATE TABLE `cluster_employee` (
  `cluster_employee_ID` int(255) NOT NULL,
  `cluster_ID` int(255) NOT NULL,
  `department_ID` int(255) NOT NULL,
  `cluster_employee_name` varchar(255) NOT NULL,
  `cluster_employee_username` varchar(255) NOT NULL,
  `cluster_employee_password` varchar(255) NOT NULL,
  `cluster_employee_contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cluster_employee`
--

INSERT INTO `cluster_employee` (`cluster_employee_ID`, `cluster_ID`, `department_ID`, `cluster_employee_name`, `cluster_employee_username`, `cluster_employee_password`, `cluster_employee_contact`) VALUES
(19, 7, 36, 'Christian Fritz Esportono', 'fritz', '$2y$10$LBqOMgprhkkgepcFUQugVuvI2hBshwWS5kqKqId.J.bwjdd9ZC..O', '09070280374'),
(21, 7, 36, 'Alex Espanola', 'alex', '$2y$10$jl1PBwcqM9RgGR52xOiQRujgVlpB5okGN8Y2Oeu7Y2lK2qnN61v0e', '09234228482');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_ID` int(255) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_ID`, `college_name`) VALUES
(1, 'College of Arts and Sciences'),
(2, 'College of Education'),
(3, 'College of Industrial Technology'),
(4, 'College of Engineering and Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_ID` int(255) NOT NULL,
  `department_ID` int(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `department_ID`, `course_name`) VALUES
(6, 24, 'Computer Science'),
(7, 24, 'Information System'),
(8, 24, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_ID` int(255) NOT NULL,
  `admin_ID` int(255) DEFAULT NULL,
  `college_ID` int(255) NOT NULL,
  `campus_ID` int(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_ID`, `admin_ID`, `college_ID`, `campus_ID`, `department_name`) VALUES
(36, NULL, 1, NULL, 'Computer Department'),
(37, NULL, 2, NULL, 'English Department'),
(39, NULL, 4, NULL, 'Engineering Department');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposal_ID` int(255) NOT NULL,
  `cluster_employee_ID` int(255) NOT NULL,
  `center_employee_ID` int(255) NOT NULL,
  `research_cont_num` varchar(255) NOT NULL,
  `abstract` mediumtext NOT NULL,
  `title` mediumtext NOT NULL,
  `classification` mediumtext NOT NULL,
  `priority_agenda` mediumtext NOT NULL,
  `introduction` mediumtext NOT NULL,
  `research_prob_obj` mediumtext NOT NULL,
  `current_solution` mediumtext NOT NULL,
  `proposed_solution` mediumtext NOT NULL,
  `methodology` mediumtext NOT NULL,
  `bibliography` mediumtext NOT NULL,
  `significance` mediumtext NOT NULL,
  `review_literature` mediumtext NOT NULL,
  `milestone` mediumtext NOT NULL,
  `item_budget` mediumtext NOT NULL,
  `expected_output` mediumtext NOT NULL,
  `target_beneficiaries` mediumtext NOT NULL,
  `project_management` mediumtext NOT NULL,
  `monitoring_evaluation` mediumtext NOT NULL,
  `attachment` mediumtext NOT NULL,
  `result_recommendation` mediumtext NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `date_updated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposal_ID`, `cluster_employee_ID`, `center_employee_ID`, `research_cont_num`, `abstract`, `title`, `classification`, `priority_agenda`, `introduction`, `research_prob_obj`, `current_solution`, `proposed_solution`, `methodology`, `bibliography`, `significance`, `review_literature`, `milestone`, `item_budget`, `expected_output`, `target_beneficiaries`, `project_management`, `monitoring_evaluation`, `attachment`, `result_recommendation`, `date_added`, `date_updated`) VALUES
(6, 19, 0, '', 'Iusto incidunt temp', 'Qui voluptatem volup', '', '', 'Minima repellendus ', 'Nostrum eum porro er', 'Quia quisquam sunt ', '', 'Laboriosam consecte', 'Nihil Nam iste exped', 'Eaque perferendis vo', 'Nihil voluptatem id', '', '', 'Veniam magni rerum ', 'Tempora libero accus', 'Lorem velit officiis', 'Laboris officiis inc', '', 'Accusantium consequu', '2023-05-25 01:34:32.656795', '2023-05-25 01:36:31.130000'),
(8, 19, 0, '', 'Magni qui doloribus ', 'Necessitatibus beata', '', '', 'Ratione ratione ipsa', 'Ipsam vel est alias ', 'Eligendi sunt ipsam ', '', 'Quia quia aperiam re', 'Assumenda accusantiu', 'Veniam id quidem t', 'In et voluptatum cup', '', '', 'Est vel qui sit dol', 'Exercitation fugit ', 'Accusamus ea dolores', 'Rerum exercitationem', '', 'Ex maxime eligendi s', '2023-05-25 01:35:29.694462', '2023-05-25 01:36:22.554081');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `remark_ID` int(255) NOT NULL,
  `proposal_ID` int(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remark_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`remark_ID`, `proposal_ID`, `user_type`, `user_ID`, `remark`, `remark_date`) VALUES
(20, 2, 'center', 4, 'Autem et placeat si', '2023-05-13 11:17:57'),
(21, 2, 'center', 4, 'Quo repudiandae saep', '2023-05-13 11:18:07'),
(22, 8, 'center', 4, 'cjctctctcct', '2023-05-31 01:39:21'),
(23, 8, 'center', 4, 'gcgcgcg', '2023-05-31 01:39:40'),
(24, 6, 'center', 4, 'ddaad', '2023-05-31 02:52:55'),
(25, 6, 'center', 4, 'ddd', '2023-05-31 02:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(255) NOT NULL,
  `course_ID` int(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_username` varchar(255) DEFAULT NULL,
  `student_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_ID`),
  ADD KEY `admin_ID` (`admin_ID`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`center_ID`);

--
-- Indexes for table `center_employee`
--
ALTER TABLE `center_employee`
  ADD PRIMARY KEY (`center_employee_ID`),
  ADD KEY `department_ID` (`department_ID`),
  ADD KEY `center_ID` (`center_ID`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`cluster_ID`),
  ADD KEY `center_ID` (`center_ID`);

--
-- Indexes for table `cluster_employee`
--
ALTER TABLE `cluster_employee`
  ADD PRIMARY KEY (`cluster_employee_ID`),
  ADD KEY `department_ID` (`department_ID`),
  ADD KEY `cluster_ID` (`cluster_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`),
  ADD KEY `department_ID` (`department_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_ID`),
  ADD KEY `admin_ID` (`admin_ID`),
  ADD KEY `campus_ID` (`campus_ID`),
  ADD KEY `college_ID` (`college_ID`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposal_ID`),
  ADD KEY `cluster_employee_ID` (`cluster_employee_ID`),
  ADD KEY `center_employee_ID` (`center_employee_ID`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`remark_ID`),
  ADD KEY `proposal_ID` (`proposal_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `department_ID` (`course_ID`),
  ADD KEY `course_ID` (`course_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `center_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `center_employee`
--
ALTER TABLE `center_employee`
  MODIFY `center_employee_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `cluster_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cluster_employee`
--
ALTER TABLE `cluster_employee`
  MODIFY `cluster_employee_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposal_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `remark_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `campus_ibfk_1` FOREIGN KEY (`admin_ID`) REFERENCES `admin` (`admin_ID`);

--
-- Constraints for table `center_employee`
--
ALTER TABLE `center_employee`
  ADD CONSTRAINT `center_employee_ibfk_1` FOREIGN KEY (`center_ID`) REFERENCES `center` (`center_ID`),
  ADD CONSTRAINT `center_employee_ibfk_2` FOREIGN KEY (`department_ID`) REFERENCES `department` (`department_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
