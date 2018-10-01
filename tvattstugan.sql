-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 okt 2018 kl 10:09
-- Serverversion: 10.1.31-MariaDB
-- PHP-version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `tvattstugan`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `schemat`
--

CREATE TABLE `schemat` (
  `ägare` int(3) UNSIGNED NOT NULL,
  `tidForBokning` time(6) NOT NULL,
  `dagforbokning` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `lagenhetsnummer` int(3) UNSIGNED NOT NULL,
  `losenord` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `bokning` time(6) NOT NULL,
  `namn` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `adress` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `bild` varchar(500) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`lagenhetsnummer`, `losenord`, `bokning`, `namn`, `adress`, `bild`) VALUES
(0, '828fd9255753432d51df95eb62d61722', '14:00:00.000000', '0', 'hejvägen 123', ''),
(1, '828fd9255753432d51df95eb62d61722', '14:00:00.000000', '0', 'hejvägen 123', '');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`lagenhetsnummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
