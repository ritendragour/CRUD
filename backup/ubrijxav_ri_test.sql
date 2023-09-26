-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2023 at 06:58 PM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubrijxav_ri_test`
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
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`, `email`, `password`, `securityquestion`, `securityanswer`, `birthdate`, `phone`, `gender`, `pincode`, `location`, `role`, `dt`) VALUES
(1, 'Ritendra', 'gour', 'ritendragour5@gmail.com', '$2y$10$Ky4dSnxMpg3FHaz0a.jLkOTcFYC7PIOuvPrH1Rw4tT4rjthIcLpn6', 'nick name', 'ashwani', '1998-03-27', '+919826964395', 'Male', 461223, 'Seoni Malwa', '10', '2023-09-01 12:57:19'),
(11, 'Ashwani', 'gour', 'info@ritendra.in', '$2y$10$clMD9yRQ6aBdO0UiwHA8hODVFQEL83bXvENF1dywVUzykKeDQQd1K', 'nick name', 'ashwani', '1998-03-27', '+919826964395', 'Male', 4612232, 'Seoni Malwaa', '10', '2023-09-02 14:44:22'),
(12, 'anurag', 'gour', 'anuraggour7000@gmail.com', '$2y$10$esR3KrwnhxrSYBQ4U0Vt1.AasuowT.Q5c5v9xBTKBrNH3iPIt0CCq', 'nick name', 'annu', '2002-08-01', '8103041752', 'Male', 452010, 'indore', '0', '2023-09-03 01:11:33'),
(13, 'kochi', 'stein', 'koo@hotmail.com', '$2y$10$4MEatpsA8EMeeD3VcwltcOB5A2BO79tFn8gz1UmGNk4WOqkCvvAny', 'color', 'grey', '1998-01-06', '+28755-657-567', 'Female', 73301, 'texas', '0', '2023-09-09 12:53:09'),
(15, 'Gulshan', 'Lowanshi', 'gulshanlowanshi1234@gmail.com', '$2y$10$.7JEAz5XepVxMZ34jMqOEuOSm.bgcHFYMOuEPSa4jxyiLjpvx3L9C', 'Bike', 'Apache', '1998-08-06', '9131492775', 'Male', 461223, 'Seoni malwa', '0', '2023-09-09 17:46:46'),
(16, 'Abhishek', 'Chandravanshi', 'abhishekchandravanshi444@gmail.com', '$2y$10$KI7ObNR4J/g2j1one6gp3eYM.GNszH4vuIjv7XhGXEhflpYsL5B6u', 'City of born', 'Bhopal', '1999-06-15', '09074608293', 'Male', 452011, '452011', '0', '2023-09-09 18:27:30'),
(18, 'fd', 'kl', 'demo@gmail.com', '$2y$10$E7vrjpTJtu1Bdz9jP7V84e./5Cuf/Ef6phDzlQPmHbqxPTOiVK3ly', 'no', 'avii', '1997-05-19', '9425854309', 'Female', 452001, 'indore', '0', '2023-09-09 19:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category`, `title`, `description`, `file_path`, `created_by`, `dt`) VALUES
(1, 'Public', 'test', 'dskd', 'Screenshot 2023-08-19 142424.png', 1, '2023-09-16 22:18:42'),
(2, 'Public', 'd', 'dsdf', '', 1, '2023-09-16 22:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfig`
--

CREATE TABLE `systemconfig` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemconfig`
--

INSERT INTO `systemconfig` (`id`, `title`, `value`, `dt`) VALUES
(1, 'company_name', 'Web Book', '2023-09-01 12:58:06'),
(2, 'SuperAdminEmail', 'ritendragour5@gmail.com', '2023-09-16 13:23:54'),
(3, 'SupportEmail', 'Support@webbook.com', '2023-09-16 13:25:58'),
(4, 'domainName', 'gour.ritendra.in', '2023-09-16 13:25:58');

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
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `systemconfig`
--
ALTER TABLE `systemconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
