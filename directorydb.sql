-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 24, 2019 at 10:23 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `deptID` int(11) NOT NULL,
  `deptName` varchar(25) NOT NULL,
  `deptPhone` varchar(20) NOT NULL,
  `deptEmail` varchar(50) NOT NULL,
  `deptOffice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptID`, `deptName`, `deptPhone`, `deptEmail`, `deptOffice`) VALUES
(1, 'Software', '4042224466', 'software@company.com', 'Atlanta'),
(2, 'Accounting', '4044445599', 'accounting@company.com', 'New'),
(3, 'Advising', '4046667777', 'advising@company.com', 'Macon Office');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `persID` int(11) NOT NULL,
  `persEmail` varchar(50) NOT NULL,
  `persPassword` varchar(50) NOT NULL,
  `persFName` varchar(50) NOT NULL,
  `persLName` varchar(50) NOT NULL,
  `persPhone` varchar(20) NOT NULL,
  `persOffice` varchar(100) NOT NULL,
  `persDept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`persID`, `persEmail`, `persPassword`, `persFName`, `persLName`, `persPhone`, `persOffice`, `persDept`) VALUES
(1, 'HannahW@company.com', 'HW1587*', 'Hannah', 'White', '4041231234', 'Remote', 2),
(2, 'JoshG@company.com', '15Jg87*', 'Josh', 'Gold', '4041342312', 'Remote', 2),
(3, 'BillS@company.com', 'B323S@u', 'Bill', 'Sawman', '404188312', 'Remote', 1),
(4, 'AnneP@company.com', 'B323S@u', 'Anne', 'Pongstein', '404188312', 'Macon Office', 3),
(5, 'BlankB@company.com', 'B39Hd#', 'Blake', 'Brown', '4448988312', 'New York Office', 2),
(7, 'JoshG@company.com', '15Jg87*', 'Yocheved', 'Shkarofsky', '2324234242', 'Arlanta', 2),
(8, 'ShkaFam@company.com', 'aaaaasssssddddd', 'Yocheved', 'Shkarofsky', '4703818329', 'Arlanta', 1),
(9, 'JoshG@company.com', '15Jg87*bbbbb', 'Yocheved', 'Shkarofsky', '4703818329', 'Arlanta', 1),
(10, 'fgggggg@company.com', '15Jg87*gggggggg', 'Yocheved', 'Shkarofsky', '4703818329', 'Arlanta', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`persID`),
  ADD KEY `FK` (`persDept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `deptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `persID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `FK` FOREIGN KEY (`persDept`) REFERENCES `departments` (`deptID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
