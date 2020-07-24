-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 11:56 PM
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
  `Clinic_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Clinic_pass` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Hospital_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`HospitalID`, `HospitalName`, `HospitalAddress`, `HospitalPhone`, `HospitalWorkingHour`, `image`, `Region_ID`, `Hospital_email`, `Hospital_pass`) VALUES
(49, 'AL-SAFWA HOSPITAL', 'Hamed fahmy', 1099131353, '9:00 AM-12:00 AM', '', 1, 'i.aboelsouod@nu.edu.eg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
  `Lab_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Lab_pass` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
