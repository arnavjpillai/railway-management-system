-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cname`) VALUES
('AC1'),
('AC2'),
('AC3'),
('CC'),
('EC'),
('SL');

-- --------------------------------------------------------

--
-- Table structure for table `classseats`
--

CREATE TABLE `classseats` (
  `trainno` int(11) DEFAULT NULL,
  `sp` varchar(50) DEFAULT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `seatsleft` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classseats`
--

INSERT INTO `classseats` (`trainno`, `sp`, `dp`, `doj`, `class`, `fare`, `seatsleft`) VALUES
(12, 'Delhi', 'Mumbai', '2022-04-30', 'AC1', 2500, 50),
(12, 'Delhi', 'Mumbai', '2022-05-07', 'AC1', 2200, 102),
(12, 'Delhi', 'Mumbai', '2022-05-17', 'AC1', 3200, 20),
(12, 'Delhi', 'Mumbai', '2022-05-17', 'AC3', 2400, 60),
(12, 'Delhi', 'Mumbai', '2022-05-17', 'EC', 1200, 100),
(12, 'Delhi', 'Mumbai', '2022-05-17', 'SL', 500, 200),
(10, 'Jaipur', 'Lucknow', '2022-05-07', 'AC1', 1434, 243),
(10, 'Jaipur', 'Lucknow', '2022-05-17', 'AC1', 2900, 15),
(10, 'Jaipur', 'Lucknow', '2022-05-17', 'AC3', 2100, 40),
(10, 'Jaipur', 'Lucknow', '2022-05-17', 'EC', 1500, 120),
(10, 'Jaipur', 'Lucknow', '2022-05-17', 'SL', 800, 250),
(12, 'Kolkata', 'Lucknow', '2022-05-07', 'AC1', 934, 322),
(12, 'Kolkata', 'Lucknow', '2022-05-17', 'AC1', 3100, 30),
(12, 'Kolkata', 'Lucknow', '2022-05-17', 'AC3', 1900, 30),
(12, 'Kolkata', 'Lucknow', '2022-05-17', 'EC', 1700, 150),
(12, 'Kolkata', 'Lucknow', '2022-05-17', 'SL', 700, 220),
(12, 'Lucknow', 'Delhi', '2022-05-07', 'AC1', 344, 326),
(12, 'Lucknow', 'Delhi', '2022-05-17', 'AC1', 2750, 20),
(12, 'Lucknow', 'Delhi', '2022-05-17', 'AC3', 2350, 60),
(12, 'Lucknow', 'Delhi', '2022-05-17', 'EC', 1100, 118),
(12, 'Lucknow', 'Delhi', '2022-05-17', 'SL', 900, 180),
(18, 'Chandigarh', 'Jaipur', '2022-05-12', 'AC1', 2420, 50),
(18, 'Chandigarh', 'Jaipur', '2022-05-12', 'AC3', 1700, 20),
(18, 'Chandigarh', 'Jaipur', '2022-05-12', 'CC', 750, 120),
(18, 'Jaipur', 'Delhi', '2022-05-12', 'AC1', 2750, 20),
(18, 'Jaipur', 'Delhi', '2022-05-12', 'AC3', 1200, 20),
(18, 'Jaipur', 'Delhi', '2022-05-12', 'CC', 900, 150);

-- --------------------------------------------------------

--
-- Table structure for table `pd`
--

CREATE TABLE `pd` (
  `pnr` int(11) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `PAGE` int(11) DEFAULT NULL,
  `pgender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pd`
--

INSERT INTO `pd` (`pnr`, `pname`, `PAGE`, `pgender`) VALUES
(1, 'abc', 23, 'M'),
(1, 'xyz', 24, 'F'),
(18, 'aks', 20, 'M'),
(52, 'dwak', 21, 'M'),
(59, 'hal', 12, 'M'),
(60, 'yam', 50, 'M'),
(60, 'abhinav', 20, 'M'),
(81, 'vikas', 40, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `resv`
--

CREATE TABLE `resv` (
  `pnr` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `trainno` int(11) DEFAULT NULL,
  `sp` varchar(50) DEFAULT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `tfare` int(11) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `nos` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resv`
--

INSERT INTO `resv` (`pnr`, `id`, `trainno`, `sp`, `dp`, `doj`, `tfare`, `class`, `nos`, `status`) VALUES
(1, 1, 12, 'Delhi', 'Mumbai', '2022-04-30', 5000, 'AC1', 2, 'BOOKED'),
(18, 5, 12, 'Delhi', 'Mumbai', '2022-05-17', 2200, 'AC1', 1, 'CANCELLED'),
(52, 6, 10, 'Jaipur', 'Lucknow', '2022-05-07', 11200, 'AC1', 1, 'CANCELLED'),
(59, 10, 12, 'Lucknow', 'Delhi', '2022-05-17', 2200, 'AC1', 1, 'BOOKED'),
(60, 11, 12, 'Kolkata', 'Lucknow', '2022-05-17', 2200, 'AC1', 2, 'BOOKED'),
(81, 4, 12, 'Delhi', 'Mumbai', '2022-05-07', 3300, 'AC1', 1, 'BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `trainno` int(11) DEFAULT NULL,
  `sname` varchar(10) DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `trainno`, `sname`, `arrival_time`, `departure_time`, `distance`) VALUES
(1, 12, 'Delhi', '16:35:00', '16:45:00', 200),
(2, 12, 'Mumbai', '09:00:00', '09:10:00', 200),
(3, 12, 'Kolkata', '05:00:00', '05:15:00', 300),
(4, 12, 'Lucknow', '11:50:10', '12:00:00', 450),
(5, 12, 'Delhi', '16:30:00', '16:30:00', 600),
(7, 13, 'Delhi', '04:00:00', '04:05:00', 700),
(8, 13, 'Rajasthan', '07:30:50', '07:33:00', 900),
(13, 14, 'Madras', '22:00:00', '22:00:00', 2500),
(14, 15, 'Delhi', '16:00:00', '16:00:00', 0),
(15, 15, 'Jaipur', '22:45:00', '22:45:00', 800),
(16, 16, 'Jaipur', '03:30:00', '03:30:00', 0),
(17, 16, 'Delhi', '09:30:00', '09:30:00', 800),
(18, 17, 'Delhi', '00:00:14', '00:00:14', 0),
(19, 17, 'Jaipur', '16:00:00', '16:10:00', 500),
(20, 17, 'Chandigarh', '20:30:00', '20:30:00', 1200),
(21, 18, 'Chandigarh', '08:05:00', '08:05:00', 0),
(22, 18, 'Jaipur', '10:15:00', '10:20:00', 700),
(23, 18, 'Delhi', '14:00:00', '14:00:00', 1200),
(24, 10, 'Jaipur', '03:30:00', '03:30:00', 0),
(25, 10, 'Allahbad', '08:00:00', '08:15:00', 200),
(26, 10, 'Lucknow', '15:15:00', '15:15:00', 700);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sname` varchar(10) NOT NULL,
  `st_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sname`, `st_id`) VALUES
('Allahbad', 9),
('Bangalore', 10),
('Chandigarh', 1),
('Delhi', 2),
('Jaipur', 3),
('Kolkata', 6),
('Lucknow', 4),
('Madras', 8),
('Mumbai', 5),
('Patna', 7);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `trainno` int(11) NOT NULL,
  `tname` varchar(50) DEFAULT NULL,
  `sp` varchar(50) DEFAULT NULL,
  `st` time DEFAULT NULL,
  `dp` varchar(10) DEFAULT NULL,
  `dt` time DEFAULT NULL,
  `dd` varchar(10) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`trainno`, `tname`, `sp`, `st`, `dp`, `dt`, `dd`, `distance`) VALUES
(10, 'Vishram Express', 'Jaipur', '10:00:00', 'Lucknow', '21:30:00', 'Day 1', 700),
(11, 'Abadi Express', 'Chandigarh', '01:00:12', 'Delhi', '16:30:00', 'Day 1', 600),
(12, 'Rajdhani Express', 'Delhi', '16:35:00', 'Mumbai', '09:00:00', 'Day 2', 2300),
(13, 'Bahujan Express', 'Jammu Kashmir', '22:00:00', 'Madhya Pra', '13:00:00', 'Day2', 3900),
(14, 'Jammu Mail Express', 'Jammu Kashmir', '01:00:12', 'Madras', '22:00:00', 'Day 1', 4500),
(15, 'Delhi Jaipur Double Decker', 'Delhi', '16:00:00', 'Jaipur', '22:45:00', 'Day 1', 1100),
(16, 'Jaipur Delhi Double Decker', 'Jaipur', '03:30:00', 'Delhi', '09:30:00', 'Day 1', 800),
(17, 'Delhi To Chandigarh Shatabdi', 'Delhi', '00:00:14', 'Chandigarh', '20:30:00', 'Day 1', 200),
(18, 'Chandigarh To Delhi Shatabdi', 'Chandigarh', '08:05:00', 'Delhi', '14:00:00', 'Day 2', 200),
(19, 'Ashram Express', 'Lucknow', '13:30:00', 'Jaipur', '05:15:00', 'Day 2', 700);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `emailid`, `mobileno`, `dob`) VALUES
(0, '123', 'arnavpillai17@gmail.com', '1234567890', '2003-03-31'),
(1, 'abc', 'xyz@gmail.com', '0987654321', '2002-02-19'),
(4, 'gqq', 'zain@gmail.com', '9311111343', '1994-02-01'),
(5, 'aqq', 'rupali@hotmail.com', '9313321123', '1994-02-02'),
(6, 'all', 'kumar@gmail.com', '9872889076', '1997-03-01'),
(7, 'alan', 'alan@rediffmail.com', '9810150525', '1995-01-03'),
(8, 'aashu', 'aashu@yahoo.com', '9013231115', '1993-12-30'),
(9, 'abc', 'amogh@gmail.com', '9876675567', '1991-03-01'),
(10, 'aoo', 'appa@mail.com', '9872939004', '1990-09-08'),
(11, 'kpp', 'kashyap@gmail.com', '9807890453', '1975-04-01'),
(12, 'laa', 'lata@bits.com', '9129111232', '1960-04-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cname`);

--
-- Indexes for table `classseats`
--
ALTER TABLE `classseats`
  ADD KEY `class` (`class`),
  ADD KEY `trainno` (`trainno`);

--
-- Indexes for table `pd`
--
ALTER TABLE `pd`
  ADD KEY `pnr` (`pnr`);

--
-- Indexes for table `resv`
--
ALTER TABLE `resv`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `trainno` (`trainno`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sname`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classseats`
--
ALTER TABLE `classseats`
  ADD CONSTRAINT `classseats_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`cname`) ON DELETE CASCADE,
  ADD CONSTRAINT `classseats_ibfk_2` FOREIGN KEY (`trainno`) REFERENCES `train` (`trainno`) ON DELETE CASCADE;

--
-- Constraints for table `pd`
--
ALTER TABLE `pd`
  ADD CONSTRAINT `pd_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `resv` (`pnr`) ON DELETE CASCADE;

--
-- Constraints for table `resv`
--
ALTER TABLE `resv`
  ADD CONSTRAINT `resv_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`trainno`) REFERENCES `train` (`trainno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
