-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2019 at 11:40 PM
-- Server version: 10.3.17-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic_no` varchar(255) DEFAULT '0',
  `contact_no` int(10) UNSIGNED DEFAULT 0,
  `emergency_no` int(10) UNSIGNED DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `ic_no`, `contact_no`, `emergency_no`, `username`, `password`, `level`) VALUES
(1, 'admin', '80982405721', 178773244, 189664533, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic_no` varchar(255) NOT NULL DEFAULT '0',
  `contact_no` int(40) UNSIGNED NOT NULL DEFAULT 0,
  `emergency_no` int(40) UNSIGNED NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `depart` date NOT NULL DEFAULT current_timestamp(),
  `arrival` date NOT NULL DEFAULT current_timestamp(),
  `status` int(2) UNSIGNED NOT NULL DEFAULT 1,
  `level` varchar(255) NOT NULL DEFAULT 'guest',
  `guider` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `ic_no`, `contact_no`, `emergency_no`, `username`, `password`, `depart`, `arrival`, `status`, `level`, `guider`) VALUES
(46, 'Zaid bin Ahmad', '9809234567823', 198765233, 198990977, 'guest', 'guest', '2019-12-15', '2019-12-15', 1, 'guest', '11');

-- --------------------------------------------------------

--
-- Table structure for table `guider`
--

CREATE TABLE `guider` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic_no` varchar(255) CHARACTER SET utf8 DEFAULT '000000-00-0000',
  `contact_no` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `emergency_no` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `depart` date NOT NULL DEFAULT current_timestamp(),
  `arrival` date NOT NULL DEFAULT current_timestamp(),
  `longitude` decimal(10,7) NOT NULL DEFAULT 1.1111100,
  `latitude` decimal(10,7) UNSIGNED NOT NULL DEFAULT 1.1111100,
  `modify_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `level` varchar(255) NOT NULL DEFAULT 'guider'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guider`
--

INSERT INTO `guider` (`id`, `name`, `ic_no`, `contact_no`, `emergency_no`, `username`, `password`, `depart`, `arrival`, `longitude`, `latitude`, `modify_date`, `level`) VALUES
(11, 'Ramly bin Bakar', '890987265621', 176552433, 198762544, 'guider', 'guider', '2019-12-15', '2019-12-15', '101.5913537', '3.0374972', '2019-12-15 05:47:23', 'guider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `level` (`level`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `name` (`name`,`status`,`level`,`guider`);

--
-- Indexes for table `guider`
--
ALTER TABLE `guider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `name` (`name`),
  ADD KEY `longitude` (`longitude`),
  ADD KEY `latitude` (`latitude`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `guider`
--
ALTER TABLE `guider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
