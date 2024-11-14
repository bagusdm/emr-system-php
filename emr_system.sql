-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 02:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emr_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `phone`, `email`) VALUES
(1, 'Dr. Emily White', 'Cardiologist', '555-1122', 'emily.white@example.com'),
(2, 'Dr. David Black', 'Neurologist', '555-3344', 'david.black@example.com'),
(3, 'Dr. Sarah Green', 'Pediatrician', '555-5566', 'sarah.green@example.com'),
(4, 'Dr. Michael Brown', 'Orthopedic', '555-7788', 'michael.brown@example.com'),
(5, 'Dr. Linda Blue', 'Dermatologist', '555-9900', 'linda.blue@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `record_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `diagnosis` text NOT NULL,
  `treatment` text NOT NULL,
  `date_of_record` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`record_id`, `patient_id`, `doctor_id`, `diagnosis`, `treatment`, `date_of_record`) VALUES
(1, 1, 1, 'Hypertension', 'Prescribed medication, Lifestyle changes', '2024-11-14 08:38:22'),
(2, 2, 2, 'Migraine', 'Pain relievers, Rest', '2024-11-14 08:38:22'),
(3, 3, 3, 'Viral Fever', 'Paracetamol, Bed rest, Fluids', '2024-11-14 08:38:22'),
(4, 4, 4, 'Arthritis', 'Anti-inflammatory drugs, Physical therapy', '2024-11-14 08:38:22'),
(5, 5, 5, 'Skin Rash', 'Topical creams, Hydration', '2024-11-14 15:02:00'),
(16, 3, 2, 'Heart attack', 'Angioplasti', '2024-11-14 00:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `full_name`, `date_of_birth`, `gender`, `address`, `phone`, `email`) VALUES
(1, 'John Doe', '1995-07-04', 'Male', '123 Maple St, Springfield', '555-1234', 'john.doe@example.com'),
(2, 'Jane Smith', '1990-03-22', 'Female', '456 Oak St, Springfield', '555-5678', 'jane.smith@example.com'),
(3, 'Alice Johnson', '1999-03-16', 'Female', '789 Pine St, Springfield', '555-8765', 'alice.johnson@example.com'),
(4, 'Bob Brown', '2000-09-13', 'Male', '101 Birch St, Springfield', '555-4321', 'bob.brown@example.com'),
(5, 'Charlie Davis', '1988-12-30', 'Male', '202 Cedar St, Springfield', '555-9876', 'charlie.davis@example.com'),
(8, 'Bagus Desna Mukti', '2024-11-14', 'Male', 'genuk', '0895415073669', 'bagusdm977@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
