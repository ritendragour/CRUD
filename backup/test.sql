-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:40 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `securityquestion` varchar(255) NOT NULL,
  `securityanswer` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`, `email`, `password`, `securityquestion`, `securityanswer`, `birthdate`, `phone`, `gender`, `pincode`, `location`, `role`, `updated_by`, `dt`) VALUES
(1, 'Ritendra', 'gour', 'ritendragour5@gmail.com', '$2y$10$Ky4dSnxMpg3FHaz0a.jLkOTcFYC7PIOuvPrH1Rw4tT4rjthIcLpn6', 'nick name', 'ashwani', '1998-03-27', '+919826964395', 'Male', 461223, 'Seoni Malwa', '10', 11, '2023-09-01 12:57:19'),
(11, 'Ashwani', 'gourf', 'info@ritendra.in', '$2y$10$IIwpLmjnd15oTwJZhUEcmuHaZ.ivORAGqcFFIMdIxgy9q0.4DdmCG', 'In what city were you born?', 'ashwani', '1998-03-27', '+919826964395', 'Male', 461223, 'Seoni Malwaa', '10', 1, '2023-09-02 14:44:22'),
(12, 'anurag', 'gour', 'anuraggour7000@gmail.com', '$2y$10$esR3KrwnhxrSYBQ4U0Vt1.AasuowT.Q5c5v9xBTKBrNH3iPIt0CCq', 'nick name', 'annu', '2002-08-01', '8103041752', 'Male', 452010, 'indore', '0', 11, '2023-09-03 01:11:33'),
(16, 'Abhishek', 'Chandravanshi', 'abhishekchandravanshi444@gmail.com', '$2y$10$DuXnCdFfXVXVChthjvLnwOZHEY92ij/uBUen4bAvyr9e0jsoQvN1W', 'In what city were you born?', 'Bhopal', '1999-06-15', '09074608293', 'Male', 452011, '452011', '0', 11, '2023-09-09 18:27:30'),
(20, 'monica', 'mishra', 'monica@gmail.com', '$2y$10$DQKP1fT0byVTAVYmkl3XY.4/pOzMuY.mVRU7EIDM9PLjSLFVBSofe', 'In what city were you born?', 'seoni', '1997-03-29', '9893445141', 'Female', 452010, 'indore', '0', 11, '2023-09-20 10:19:46'),
(21, 'Ravi', 'Jain', 'rjravi0325@gmail.com', '$2y$10$ajoEajgNKqGRms2ZNnA6TeuVKq1y3WiqFE1R0m3tdXn95igB.XF5e', 'In what city were you born?', 'Gulab jamun ', '1999-03-25', '7073936166', 'Male', 452011, 'Indore', '0', 1, '2023-09-20 16:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `share_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category`, `title`, `description`, `share_id`, `file_path`, `created_by`, `dt`) VALUES
(2, 'Public', 'cs ', 'csrgai', 1, 'csrgai.zip', 20, '2023-09-20 13:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfig`
--

CREATE TABLE `systemconfig` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `systemconfig`
--

INSERT INTO `systemconfig` (`id`, `title`, `value`, `updated_by`, `dt`) VALUES
(1, 'company_name', 'Web Book', 1, '2023-09-01 12:58:06'),
(2, 'SuperAdminEmail', 'ritendragour5@gmail.com', 1, '2023-09-16 13:23:54'),
(3, 'SupportEmail', 'Support@webbook.com', 1, '2023-09-16 13:25:58'),
(4, 'domainName', 'gour.ritendra.in', 1, '2023-09-16 13:25:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `share_id` (`share_id`);

--
-- Indexes for table `systemconfig`
--
ALTER TABLE `systemconfig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `systemconfig`
--
ALTER TABLE `systemconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `info` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `info` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`share_id`) REFERENCES `info` (`id`);

--
-- Constraints for table `systemconfig`
--
ALTER TABLE `systemconfig`
  ADD CONSTRAINT `systemconfig_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
