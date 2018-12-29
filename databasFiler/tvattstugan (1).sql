-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 29 dec 2018 kl 17:58
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
  `id` int(11) NOT NULL,
  `agare` int(3) UNSIGNED NOT NULL,
  `tidForBokning` time(6) NOT NULL,
  `dagforbokning` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `schemat`
--

INSERT INTO `schemat` (`id`, `agare`, `tidForBokning`, `dagforbokning`) VALUES
(62, 4, '10:00:00.000000', '2018-12-07'),
(63, 1, '08:30:00.000000', '2018-12-07');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lagenhetsnummer` int(255) NOT NULL,
  `losenord` varchar(255) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `bild` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `lagenhetsnummer`, `losenord`, `namn`, `adress`, `bild`) VALUES
(0, 0, '828fd9255753432d51df95eb62d61722', 'admin', 'admin', 'admin'),
(10, 1, '828fd9255753432d51df95eb62d61722', 'Tor Bjurbom', 'Kalkstensvã¤gen 4', 'includes/images/test.jpg'),
(23, 4, '828fd9255753432d51df95eb62d61722', 'Tor Bjurbom', 'Kalkstensvã¤gen 4', 'profilePic/hirohito_macarthur_1945.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `schemat`
--
ALTER TABLE `schemat`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `schemat`
--
ALTER TABLE `schemat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
