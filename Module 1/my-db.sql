-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 08:31 AM
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
-- Database: `my-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `expert_id` int(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `biography` text DEFAULT NULL,
  `research_areas` text DEFAULT NULL,
  `publications` text DEFAULT NULL,
  `academic_status` varchar(100) DEFAULT NULL,
  `cv_file` varchar(255) DEFAULT NULL,
  `social_media_accounts` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expert_id`, `password`, `name`, `email`, `phone`, `biography`, `research_areas`, `publications`, `academic_status`, `cv_file`, `social_media_accounts`) VALUES
(3, 'a1b1c1', 'Hana Lydia', 'hana02@gmail.com', '012345678', 'Work hard', 'Soft Computing & Optimization(SCORE)', 'Introduction to PHP', 'Master', 'cv_files/janesmith_cv.pdf', NULL),
(12, 'aina', 'Aina Jaleena', 'ainajaleena@gmail.com', '0123456789', 'Work Hard !', 'Cyber Security Interest Group (Cy-SIG)', 'The journey of Network', 'PhD', 'cv_files/johndoe_cv.pdf', 'ainajaleena');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(30) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_type`, `report_description`, `created_at`) VALUES
(1, 'System Performance', 'The system performance is optimal', '2023-06-14 17:51:59'),
(2, 'Vulnerability', 'A security vulnerability has been identified', '2023-06-14 17:51:59'),
(3, 'Vulnerability', 'Another security vulnerability has been found', '2023-06-14 17:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `system_performance`
--

CREATE TABLE `system_performance` (
  `month` varchar(20) NOT NULL,
  `performance_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_performance`
--

INSERT INTO `system_performance` (`month`, `performance_value`) VALUES
('January', 500),
('February', 800),
('March', 600),
('April', 900),
('May', 1200),
('June', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin','expert','') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `email`) VALUES
(1, 'admin', 'Nuratika', '81dc9bdb52d04dc20036dbd8313ed055', 'Nuratika Elya', 'nuratika@gmail.com'),
(2, 'user', 'John', 'e2fc714c4727ee9395f324cd2e7f331f', 'John Doe', 'John23@gmail.com'),
(3, 'expert', 'Hana', 'ae9975cbedcea3021a2eb36f4cea4fde', 'Hana Lydia', 'hana02@gmail.com'),
(5, 'expert', 'Ali', '86318e52f5ed4801abe1d13d509443de', 'Ali Ahmad', 'ali@gmail.com'),
(12, 'expert', 'ainajaleena', '3cdb565aff92bf77e32662b013d7c625', 'Aina Jaleena', 'ainajaleena@gmail.com'),
(20, 'user', 'lia', '', 'lia lia', 'lia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`expert_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `expert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
