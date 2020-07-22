-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 01:41 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(11) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` time NOT NULL,
  `AppointmentComment` text CHARACTER SET utf8 NOT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `Clinic_ID` int(11) DEFAULT NULL,
  `Lab_ID` int(11) DEFAULT NULL,
  `Hospital_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_ID`, `AppointmentDate`, `AppointmentTime`, `AppointmentComment`, `Section_ID`, `Clinic_ID`, `Lab_ID`, `Hospital_ID`, `User_ID`) VALUES
(1, '0000-00-00', '00:00:00', '', NULL, 5, NULL, 0, 2),
(2, '2020-07-23', '10:28:00', '', NULL, NULL, 5, NULL, 6),
(5, '2020-07-15', '10:32:00', '', NULL, 7, NULL, NULL, 6),
(6, '2020-07-23', '01:33:00', '', NULL, 7, NULL, NULL, 6),
(7, '2020-07-22', '09:28:00', '', 1, NULL, NULL, NULL, 6),
(8, '2020-07-22', '10:09:00', '', 1, NULL, NULL, 47, 6);

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `ClinicID` int(11) NOT NULL,
  `ClinicName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ClinicAddress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ClinicPhoneNumber` int(11) NOT NULL,
  `ClinicWorkingHours` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Clinicimage` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Region_ID` int(11) NOT NULL,
  `Clinic_email` varchar(255) NOT NULL,
  `Clinic_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`ClinicID`, `ClinicName`, `ClinicAddress`, `ClinicPhoneNumber`, `ClinicWorkingHours`, `Clinicimage`, `Region_ID`, `Clinic_email`, `Clinic_pass`) VALUES
(5, 'fff', 'fffff', 11, 'eeeee', '2067_17-2005-AERIALS-101-cropped-e1535295662889-1200x675.jpg', 1, '', 0),
(6, 'dddddd', '', 0, '', '376_17-2005-AERIALS-101-cropped-e1535295662889-1200x675.jpg', 1, '', 0),
(7, 'nnn', 'Hamed fahmy', 1099131353, '9:00 AM-12:00 AM', '', 1, 'Amr_Mohamed@outlook.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `HospitalID` int(11) NOT NULL,
  `HospitalName` varchar(255) NOT NULL,
  `HospitalAddress` text NOT NULL,
  `HospitalPhone` int(11) NOT NULL,
  `HospitalWorkingHour` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Region_ID` int(11) NOT NULL,
  `Hospital_email` varchar(255) NOT NULL,
  `Hospital_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`HospitalID`, `HospitalName`, `HospitalAddress`, `HospitalPhone`, `HospitalWorkingHour`, `image`, `Region_ID`, `Hospital_email`, `Hospital_pass`) VALUES
(46, 'ddd', 'ffff', 101010111, '1ddfsfdf', '2792_17-2005-AERIALS-101-cropped-e1535295662889-1200x675.jpg', 1, '', 0),
(47, 'aa', 'aaaaaa', 1099131353, '9:00 AM-12:00 AM', '', 1, 'i.aboelsouod@nu.edu.eg', 123);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_sec`
--

CREATE TABLE `hospital_sec` (
  `HSectionID` int(11) NOT NULL,
  `HSectionName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `Section_image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_sec`
--

INSERT INTO `hospital_sec` (`HSectionID`, `HSectionName`, `Hospital_ID`, `Section_image`) VALUES
(1, 'Dental Department', 47, '');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `LabID` int(11) NOT NULL,
  `LabName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `LabAddress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `LabPhoneNumber` int(11) NOT NULL,
  `LabWorkingHours` varchar(255) CHARACTER SET utf8 NOT NULL,
  `LabImage` varchar(255) NOT NULL,
  `Region_ID` int(11) NOT NULL,
  `Lab_email` varchar(255) NOT NULL,
  `Lab_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`LabID`, `LabName`, `LabAddress`, `LabPhoneNumber`, `LabWorkingHours`, `LabImage`, `Region_ID`, `Lab_email`, `Lab_pass`) VALUES
(2, 'ddd', '', 0, '', '', 18, '', 0),
(3, 'ddd', '', 0, '', '', 1, '', 0),
(4, 'ddddddd', '', 0, '', '9094_17-2005-AERIALS-101-cropped-e1535295662889-1200x675.jpg', 1, '', 0),
(5, 'lll', 'Hamed fahmy', 1099131353, '9:00 AM-12:00 AM', '', 1, 'A_Mohamed@outlook.com', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `RegionID` int(11) NOT NULL,
  `RegionName` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`RegionID`, `RegionName`) VALUES
(20, 'Dokki'),
(19, 'ffff'),
(18, 'Haram'),
(1, 'Nasr City');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserFullName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `UserEmail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `UserPhoneNumber` int(13) NOT NULL,
  `UserPassword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserFullName`, `UserEmail`, `UserPhoneNumber`, `UserPassword`, `GroupID`) VALUES
(1, 'ibrahim', 'ibrahim_mohamed65@outlook.com', 1099131353, '5b204025436cf3392591834e6c2b9292ab144099', 1),
(2, 'AMR Mohamed', 'Amr_Mohamed@outlook.com', 1005117631, '6f7c7ca423db4bc8860c43a689b645f59046a2c9', 1),
(3, 'Ibrahim Mohamed', 'Ibrahim@outlook.com', 1099131354, '7c222fb2927d828af22f592134e8932480637c0d', 0),
(5, 'ibrahim mohamed a', 'A_Mohamed@outlook.com', 1099131353, '8cb2237d0679ca88db6464eac60da96345513964', 0),
(6, 'Ibrahim Mohamed', 'i@outlook.com', 1099131353, '8cb2237d0679ca88db6464eac60da96345513964', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `appointment_1` (`Section_ID`),
  ADD KEY `App_user_1` (`User_ID`),
  ADD KEY `Aclinics_1` (`Clinic_ID`),
  ADD KEY `Alabs_1` (`Lab_ID`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`ClinicID`),
  ADD KEY `clinics_1` (`Region_ID`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`HospitalID`),
  ADD KEY `Rhospitals` (`Region_ID`);

--
-- Indexes for table `hospital_sec`
--
ALTER TABLE `hospital_sec`
  ADD PRIMARY KEY (`HSectionID`),
  ADD KEY `section_1` (`Hospital_ID`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`LabID`),
  ADD KEY `labs_1` (`Region_ID`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`RegionID`),
  ADD UNIQUE KEY `RegionName` (`RegionName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `ClinicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `hospital_sec`
--
ALTER TABLE `hospital_sec`
  MODIFY `HSectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `LabID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `RegionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `Aclinics_1` FOREIGN KEY (`Clinic_ID`) REFERENCES `clinics` (`ClinicID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Alabs_1` FOREIGN KEY (`Lab_ID`) REFERENCES `labs` (`LabID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `App_user_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_1` FOREIGN KEY (`Section_ID`) REFERENCES `hospital_sec` (`HSectionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `clinics_1` FOREIGN KEY (`Region_ID`) REFERENCES `regions` (`RegionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `Rhospitals` FOREIGN KEY (`Region_ID`) REFERENCES `regions` (`RegionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_sec`
--
ALTER TABLE `hospital_sec`
  ADD CONSTRAINT `section_1` FOREIGN KEY (`Hospital_ID`) REFERENCES `hospitals` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labs`
--
ALTER TABLE `labs`
  ADD CONSTRAINT `labs_1` FOREIGN KEY (`Region_ID`) REFERENCES `regions` (`RegionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
