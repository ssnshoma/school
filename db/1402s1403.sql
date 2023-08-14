-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 11:45 AM
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
-- Database: `1402s1403`
--

-- --------------------------------------------------------

--
-- Table structure for table `atendence`
--

CREATE TABLE `atendence` (
  `id` int(11) NOT NULL,
  `codemeli` bigint(10) NOT NULL,
  `atendence` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atendence`
--

INSERT INTO `atendence` (`id`, `codemeli`, `atendence`, `date`) VALUES
(2, 6320062967, 'not', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grade` int(2) NOT NULL,
  `major` varchar(20) NOT NULL,
  `school` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `grade`, `major`, `school`) VALUES
(28, 'دهم 102', 10, 'تجربی', 'شاهد'),
(29, 'دهم 103', 10, 'ادبیات', 'شاهد'),
(30, 'دهم 104', 10, 'ریاضی', 'شاهد'),
(31, 'دهم ادبیات', 10, 'ادبیات', 'ادب میلاس'),
(32, 'یازدهم ادبیات', 11, 'ادبیات', 'ادب میلاس'),
(33, 'دوازدهم ادبیات', 12, 'ادبیات', 'ادب میلاس'),
(34, 'دهم کامپیوتر', 10, 'کامپیوتر', 'ادب میلاس'),
(35, 'دهم صدرا', 10, 'ادبیات', 'دین و دانش');

-- --------------------------------------------------------

--
-- Table structure for table `mark_avg`
--

CREATE TABLE `mark_avg` (
  `id` int(11) NOT NULL,
  `mehr` double NOT NULL,
  `aban` double NOT NULL,
  `azar` double NOT NULL,
  `dey` double NOT NULL,
  `bahman` double NOT NULL,
  `esfand` double NOT NULL,
  `farvardin` double NOT NULL,
  `ordibehesht` double NOT NULL,
  `khordad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mark_avg`
--

INSERT INTO `mark_avg` (`id`, `mehr`, `aban`, `azar`, `dey`, `bahman`, `esfand`, `farvardin`, `ordibehesht`, `khordad`) VALUES
(1, 17.5, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monmark`
--

CREATE TABLE `monmark` (
  `id` int(11) NOT NULL,
  `codemeli` bigint(10) NOT NULL,
  `mark` varchar(5) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `monCode` int(2) NOT NULL,
  `tarikh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monmark`
--

INSERT INTO `monmark` (`id`, `codemeli`, `mark`, `fname`, `lname`, `class`, `school`, `monCode`, `tarikh`) VALUES
(212, 6320062967, '15', 'حسین', 'منصوری', 'دهم صدرا', 'دین و دانش', 7, '2023-10-12'),
(213, 6320062967, '20', 'حسین', 'منصوری', 'دهم صدرا', 'دین و دانش', 7, '2023-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `month_mark`
--

CREATE TABLE `month_mark` (
  `id` int(11) NOT NULL,
  `codemeli` bigint(10) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `class` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `mehr` double DEFAULT NULL,
  `aban` double DEFAULT NULL,
  `azar` double DEFAULT NULL,
  `dey` double DEFAULT NULL,
  `bahman` double DEFAULT NULL,
  `esfand` double DEFAULT NULL,
  `farvardin` double DEFAULT NULL,
  `ordibehesht` double DEFAULT NULL,
  `khordad` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month_mark`
--

INSERT INTO `month_mark` (`id`, `codemeli`, `fname`, `lname`, `class`, `school`, `mehr`, `aban`, `azar`, `dey`, `bahman`, `esfand`, `farvardin`, `ordibehesht`, `khordad`) VALUES
(149, 6320062967, 'حسین', 'منصوری', 'دهم صدرا', 'دین و دانش', 17.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `managername` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`Id`, `name`, `managername`, `phone`, `address`) VALUES
(13, 'ادب میلاس', 'جعفرقلی نادری', '09133853944', 'لردگان روستای میلاس'),
(14, 'دین و دانش', 'علی بخش جلیل', '0913', 'لردگان رو به روی بیمارستان'),
(15, 'شاهد', 'بهمن نادری', '091313', 'لردگان محله زمین شهری');

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `id` int(11) NOT NULL,
  `codemeli` bigint(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  `grade` int(2) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`id`, `codemeli`, `fname`, `lname`, `fathername`, `major`, `school`, `grade`, `class`) VALUES
(142, 6320037008, 'مریم', 'منصوری', 'بیژن', 'ادبیات', 'دین و دانش', 10, 'دهم صدرا'),
(143, 6320062967, 'حسین', 'منصوری', 'بیژن', 'ادبیات', 'دین و دانش', 10, 'دهم صدرا');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `profilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `phoneNumber`, `password`, `date`, `profilePicture`) VALUES
(17, 'hossein', 'hossein', 'mansoori', 'hossein', '09134469032', '81dc9bdb52d04dc20036dbd8313ed055', '2023-07-24 17:44:21', 'profile_pic24504_.jpg'),
(18, 'parpari', 'پریناز', 'خانی', 'parpari@gmail.com', '091', '81dc9bdb52d04dc20036dbd8313ed055', '2023-08-02 17:01:44', 'profile_pic18007_.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendence`
--
ALTER TABLE `atendence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codemeli` (`codemeli`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `mark_avg`
--
ALTER TABLE `mark_avg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monmark`
--
ALTER TABLE `monmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codemeli` (`codemeli`);

--
-- Indexes for table `month_mark`
--
ALTER TABLE `month_mark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codemeli` (`codemeli`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codemeli` (`codemeli`),
  ADD KEY `school` (`school`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendence`
--
ALTER TABLE `atendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mark_avg`
--
ALTER TABLE `mark_avg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monmark`
--
ALTER TABLE `monmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `month_mark`
--
ALTER TABLE `month_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `studentlist`
--
ALTER TABLE `studentlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atendence`
--
ALTER TABLE `atendence`
  ADD CONSTRAINT `atendence_ibfk_1` FOREIGN KEY (`codemeli`) REFERENCES `studentlist` (`codemeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monmark`
--
ALTER TABLE `monmark`
  ADD CONSTRAINT `codemeli` FOREIGN KEY (`codemeli`) REFERENCES `studentlist` (`codemeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `month_mark`
--
ALTER TABLE `month_mark`
  ADD CONSTRAINT `month_mark_ibfk_1` FOREIGN KEY (`codemeli`) REFERENCES `studentlist` (`codemeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD CONSTRAINT `class` FOREIGN KEY (`class`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school` FOREIGN KEY (`school`) REFERENCES `schools` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
