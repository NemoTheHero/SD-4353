-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 01:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axelserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuelquote`
--

CREATE TABLE `fuelquote` (
  `qid` int(11) NOT NULL,
  `client_username` varchar(100) NOT NULL,
  `gallons_requested` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `date_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuelquote`
--

INSERT INTO `fuelquote` (`qid`, `client_username`, `gallons_requested`, `purchase_price`, `date_purchased`) VALUES
(1, 'nemo', 50, 59, '0000-00-00'),
(6, 'jinmancai', 1000, 1770, '2019-04-27'),
(7, 'jinmancai', 120, 212, '2019-04-27'),
(8, 'nemothefish', 100, 180, '2019-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `uid` int(11) NOT NULL,
  `currentUser` varchar(100) NOT NULL,
  `uFullname` varchar(50) NOT NULL,
  `uAddress` varchar(100) NOT NULL,
  `uAddresstwo` varchar(100) NOT NULL,
  `uCity` varchar(100) NOT NULL,
  `uZip` int(9) NOT NULL,
  `uState` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`uid`, `currentUser`, `uFullname`, `uAddress`, `uAddresstwo`, `uCity`, `uZip`, `uState`) VALUES
(1, 'anhthegoat', 'Ivan Le', '12140 Spring Oaks Drive', '13324 Rustic Springs Rd', 'Osaka', 77012, 'KY'),
(14, 'testuser1', 'Kevin Vinh', '231321 Testing Street', '1440 Testing Drive', 'Houston', 77023, 'MA'),
(15, 'jinmancai', 'Jinman Cai', '1234 Garden Springs Rd', '', 'Houston', 77036, 'TX'),
(16, 'nemothefish', 'Nemo Robles', '42343 Testing Oaks Drive', '', 'Orlando', 23432, 'FL'),
(17, 'testaccount', 'Hal Jordan', '1500 Rustic Springs Drive', '', 'Houston', 77083, 'TX'),
(18, 'nemothefish', 'Nemo', 'Wemoem', 'APT 222', 'Houston', 77054, 'TX');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(20) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'anhnguyen', 'test2@yahoo.com', '123123'),
(2, 'anhthegoat', 'imthegoat@gmail.com', '$2y$10$cymihE3VCJcLzFfCqs4sqeAjzvoHfitaA88obL2k4ehnyclGFiQ46'),
(3, 'tester1', 'test1@yahoo.com', '$2y$10$DNvJxNpmFjBHsW0rBdM0V.nzo/uRooCmBMtdEWWyggxAGOvgTYvGi'),
(4, 'testuser1', 'testuser@gmail.com', '$2y$10$CpO63d4l3X96vjygMc85felzNCk4JYyZyRHjUqn/i0duwSqcftRLu'),
(5, 'testuser', 'TEST@GMAIL.COM', '$2y$10$6xfrrHKAWb0Ejb3jYaE6f.zAqv.DbTCLHFi6zW2XSyXdh3FGEsLyK'),
(6, 'john123', 'john123@gmail.com', '$2y$10$mwYNBw.IMogz/QFkVnyL4.PFbvEDfY7qQM1Or9MEu6a/1ml6xJ0ly'),
(7, 'johnadams', 'john@gmail.com', '$2y$10$BQD2b0zNwYLvQQ10JDwX9eKWwIl2MQi8GX9xiXDgn.SMLkixZ..sa'),
(8, 'benjamin123', 'benjamin@gmail.com', '$2y$10$gUsmTmjD8THPj90WhGQ/1./iSvh77tMoA305w.N2ASrGjNhIZDjLS'),
(9, 'kaisser123', 'kaiser@gmail.com', '$2y$10$ABToYxvw7Ui6GxRXz1B40u9MCa9MZ2SxPxtjfesqzIlDAUOV53wMm'),
(10, 'jinmancai', 'jinman@gmail.com', '$2y$10$KLLCEqYMEuttrnAs9LomI.860laL2CbYI5O2CMDc0ZU.OwrkEQAX6'),
(11, 'nemothefish', 'nemo@gmail.com', '$2y$10$..NLRvn.T2uWBxHtf/OqEegW16oN8N8/MwrU6ciXPgHm3qFEPas0m'),
(12, 'testaccount', 'testtest@gamil.com', '$2y$10$yoIzrTpa/1OqtOmzF00.Ie9H1Dc5.uGVcZ2XCbV5kTdWOowYwJeGy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuelquote`
--
ALTER TABLE `fuelquote`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuelquote`
--
ALTER TABLE `fuelquote`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
