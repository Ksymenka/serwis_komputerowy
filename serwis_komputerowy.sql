-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2024 at 11:38 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serwis_komputerowy`
--
CREATE DATABASE IF NOT EXISTS `serwis_komputerowy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `serwis_komputerowy`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzet`
--

CREATE TABLE IF NOT EXISTS `sprzet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producent` varchar(40) DEFAULT NULL,
  `problem` text NOT NULL,
  `stan` text DEFAULT NULL,
  `data_pobrania` date DEFAULT NULL,
  `data_wydania` date DEFAULT NULL,
  `typ_sprzetu` int(11) DEFAULT NULL,
  `wlasciciel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wlasciciel` (`wlasciciel`),
  KEY `typ_sprzetu` (`typ_sprzetu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_konta`
--

CREATE TABLE IF NOT EXISTS `typ_konta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typ` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `typ_konta`
--

INSERT INTO `typ_konta` (`id`, `typ`) VALUES
(1, 'uzytkownik'),
(2, 'pracownik'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_sprzetu`
--

CREATE TABLE IF NOT EXISTS `typ_sprzetu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typ` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `typ_sprzetu`
--

INSERT INTO `typ_sprzetu` (`id`, `typ`) VALUES
(1, 'komputer'),
(2, 'laptop'),
(3, 'telefon');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `nr_tel` varchar(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `typ_konta` int(11) DEFAULT NULL,
  'haslo' varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `typ_konta` (`typ_konta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sprzet`
--
ALTER TABLE `sprzet`
  ADD CONSTRAINT `sprzet_ibfk_1` FOREIGN KEY (`wlasciciel`) REFERENCES `uzytkownik` (`id`),
  ADD CONSTRAINT `sprzet_ibfk_2` FOREIGN KEY (`typ_sprzetu`) REFERENCES `typ_sprzetu` (`id`);

--
-- Constraints for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `uzytkownik_ibfk_1` FOREIGN KEY (`typ_konta`) REFERENCES `typ_konta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
