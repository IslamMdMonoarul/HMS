-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2024 at 05:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `routine` json NOT NULL,
  `fee` int NOT NULL
);

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `speciality`, `routine`, `fee`) VALUES
(2, 'Dr. Smith', 'Cardiology', '{\"Monday\": \"9:00 AM - 5:00 PM\", \"Wednesday\": \"9:00 AM - 1:00 PM\"}', 500),
(3, 'Dr. Johnson', 'Dermatology', '{\"Tuesday\": \"10:00 AM - 4:00 PM\", \"Thursday\": \"11:00 AM - 3:00 PM\"}', 450),
(4, 'Dr. Williams', 'Orthopedics', '{\"Friday\": \"9:00 AM - 12:00 PM\", \"Monday\": \"1:00 PM - 6:00 PM\"}', 550),
(5, 'Dr. Brown', 'Ophthalmology', '{\"Friday\": \"2:00 PM - 6:00 PM\", \"Wednesday\": \"8:00 AM - 12:00 PM\"}', 480),
(6, 'Dr. Davis', 'Pediatrics', '{\"Monday\": \"10:00 AM - 4:00 PM\", \"Thursday\": \"10:00 AM - 1:00 PM\"}', 400),
(7, 'Dr. Miller', 'Neurology', '{\"Friday\": \"11:00 AM - 5:00 PM\", \"Tuesday\": \"9:00 AM - 3:00 PM\"}', 600),
(8, 'Dr. Wilson', 'Gastroenterology', '{\"Friday\": \"9:00 AM - 1:00 PM\", \"Wednesday\": \"10:00 AM - 5:00 PM\"}', 520),
(9, 'Dr. Moore', 'Endocrinology', '{\"Tuesday\": \"8:00 AM - 12:00 PM\", \"Thursday\": \"2:00 PM - 6:00 PM\"}', 480),
(10, 'Dr. Taylor', 'Urology', '{\"Monday\": \"9:00 AM - 12:00 PM\", \"Wednesday\": \"1:00 PM - 4:00 PM\"}', 530),
(11, 'Dr. Anderson', 'Rheumatology', '{\"Tuesday\": \"1:00 PM - 6:00 PM\", \"Thursday\": \"9:00 AM - 12:00 PM\"}', 470);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL
);

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `address`, `phone`, `dob`) VALUES
(1, 'Athena Erickson', 'gufugicyj@gmail.com', 'Pa$$w0rd!', 'Ut eum est cons', '01363495401', '1987-02-06'),
(2, 'nnnn', 'nayeem@gmail.com', 'nayeem', '', '', '2024-05-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
