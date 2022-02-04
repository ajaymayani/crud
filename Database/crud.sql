-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 08:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `inotes`
--

CREATE TABLE `inotes` (
  `id` int(11) NOT NULL,
  `nTitle` varchar(50) NOT NULL,
  `nDescription` text NOT NULL,
  `nTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inotes`
--

INSERT INTO `inotes` (`id`, `nTitle`, `nDescription`, `nTime`) VALUES
(11, 'sfdsd12', 'dsffs', '2022-01-14'),
(15, 'this is a note title', 'this is a note description', '2022-01-14'),
(19, 'surbhee111', 'surbhee description', '2022-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(10) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `sclass` int(10) NOT NULL,
  `sphone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `saddress`, `sclass`, `sphone`) VALUES
(11, 'Jasmine Singh', '#34 JC Road, abc', 1, '9845546546'),
(12, 'Sangam B', '#76 SK Building,Pkr', 3, '9827135435'),
(13, 'Ritika Singh', '#45 RS Buiding', 3, '34435435'),
(15, 'aa', 'aaaa', 4, '12333333'),
(16, 'aa', 'aaaa', 2, '12333333'),
(17, 'aa', 'aaaa', 2, '12333333'),
(18, 'aa', 'aaaa', 1, '12333333');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `cid` int(11) NOT NULL,
  `cname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`cid`, `cname`) VALUES
(1, 'BCA'),
(2, 'Btech'),
(3, 'Bsc'),
(4, 'Bcom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inotes`
--
ALTER TABLE `inotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inotes`
--
ALTER TABLE `inotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
