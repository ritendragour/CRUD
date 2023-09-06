-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 02:41 PM
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
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`, `email`, `password`, `securityquestion`, `securityanswer`, `birthdate`, `phone`, `gender`, `pincode`, `location`, `role`, `dt`) VALUES
(1, 'Ritendra', 'gour', 'ritendragour5@gmail.com', '$2y$10$8DVVoyVdMvjwpIjj2JsZ/uodha2V5FKy0AvH/I8I8OE5T6wLzj5k2', 'nick name', 'ashwani', '1998-03-27', '+919826964395', '', 461223, 'Seoni Malwa', '10', '2023-09-01 12:57:19'),
(11, 'Ashwani', 'gour', 'info@ritendra.tech', '$2y$10$cLNPRopo2BC4Hev7cLgjgOYAg8pMtFqdEHzD11KdhMKdwYlIYIm9W', 'nick name', 'ashwani', '1998-03-27', '+919826964395', '', 4612232, 'Seoni Malwaa', '', '2023-09-02 14:44:22'),
(12, 'anurag', 'gour', 'anuraggour7000@gmail.com', '$2y$10$esR3KrwnhxrSYBQ4U0Vt1.AasuowT.Q5c5v9xBTKBrNH3iPIt0CCq', 'nick name', 'annu', '2002-08-01', '8103041752', '', 452010, 'indore', '0', '2023-09-03 01:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfig`
--

CREATE TABLE `systemconfig` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `systemconfig`
--

INSERT INTO `systemconfig` (`id`, `company_name`, `dt`) VALUES
(1, 'Testing Version', '2023-09-01 12:58:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `systemconfig`
--
ALTER TABLE `systemconfig`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `systemconfig`
--
ALTER TABLE `systemconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
