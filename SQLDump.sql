-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Gru 2018, 17:13
-- Wersja serwera: 10.1.24-MariaDB
-- Wersja PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `idprac` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idoper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `log`
--

INSERT INTO `log` (`idlog`, `idprac`, `data`, `idoper`) VALUES
(1, 3, '2018-12-04 16:09:49', 1),
(2, 3, '2018-12-04 16:09:55', 2),
(3, 3, '2018-12-04 17:07:54', 1),
(4, 3, '2018-12-04 17:07:59', 2),
(5, 3, '2018-12-04 17:10:19', 1),
(6, 3, '2018-12-04 17:10:22', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oper`
--

CREATE TABLE `oper` (
  `id_oper` int(11) NOT NULL,
  `opis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `oper`
--

INSERT INTO `oper` (`id_oper`, `opis`) VALUES
(1, 'wejscie'),
(2, 'wyjscie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `idprac` int(11) NOT NULL,
  `nazwisko` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rf_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`idprac`, `nazwisko`, `imie`, `rf_id`) VALUES
(1, 'Kowalski', 'Adam', '3'),
(2, 'Ko', 'Ann', '111111'),
(3, 'Markowska', 'Anna', '42681f0d'),
(4, 'Adamski', 'Adam', 'none'),
(12, 'Helena', 'Åšwiderek', '222233');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `passuser` varchar(32) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `passuser`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indeksy dla zrzutów tabel
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
  ADD PRIMARY KEY (`idprac`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `oper`
--
ALTER TABLE `oper`
  MODIFY `id_oper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `idprac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`idoper`) REFERENCES `oper` (`id_oper`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`idprac`) REFERENCES `pracownicy` (`idprac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
