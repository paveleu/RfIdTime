-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 07, 2018 at 11:15 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `RfIdTime`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `idprac` int(11) NOT NULL,
  `data` date NOT NULL,
  `czas` time NOT NULL,
  `idoper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`idlog`, `idprac`, `data`, `czas`, `idoper`) VALUES
(1, 2, '2018-11-07', '07:00:00', 1),
(2, 2, '2018-11-07', '19:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oper`
--

CREATE TABLE `oper` (
  `id_oper` int(11) NOT NULL,
  `opis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oper`
--

INSERT INTO `oper` (`id_oper`, `opis`) VALUES
(1, 'wejscie'),
(2, 'wyjscie');

-- --------------------------------------------------------

--
-- Table structure for table `pracownicy`
--

CREATE TABLE `pracownicy` (
  `idprac` int(11) NOT NULL,
  `nazwisko` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`idprac`, `nazwisko`, `imie`, `rf_id`) VALUES
(1, 'Kowalski', 'Adam', 3),
(2, 'Kowalska', 'Anna', 6),
(3, 'Markowska', 'Anna', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id_card` int(11) NOT NULL,
  `cardrfid` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id_card`, `cardrfid`) VALUES
(1, 'none'),
(2, '111111'),
(3, '222222'),
(4, '333333'),
(5, '444444'),
(6, '555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `idoper` (`idoper`),
  ADD KEY `idprac` (`idprac`);

--
-- Indexes for table `oper`
--
ALTER TABLE `oper`
  ADD PRIMARY KEY (`id_oper`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`idprac`),
  ADD KEY `rfid` (`rf_id`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id_card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oper`
--
ALTER TABLE `oper`
  MODIFY `id_oper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `idprac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`idoper`) REFERENCES `oper` (`id_oper`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`idprac`) REFERENCES `pracownicy` (`idprac`);

--
-- Constraints for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `pracownicy_ibfk_1` FOREIGN KEY (`rf_id`) REFERENCES `rfid` (`id_card`);
