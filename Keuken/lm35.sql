-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 nov 2021 om 08:43
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lm35`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lm35data`
--

CREATE TABLE `lm35data` (
  `Temperatuur` varchar(30) NOT NULL,
  `Verwarming` varchar(30) NOT NULL,
  `Lamp` varchar(30) NOT NULL,
  `IdealeTemperatuur` varchar(30) NOT NULL,
  `LichtState` varchar(30) NOT NULL,
  `Plaats` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lm35data`
--

INSERT INTO `lm35data` (`Temperatuur`, `Verwarming`, `Lamp`, `IdealeTemperatuur`, `LichtState`, `Plaats`) VALUES
('22.24', 'Aan', 'Aan', '23', 'Aan', 'Keuken'),
('24.49', 'Aan', 'Aan', '25', 'Aan', 'Woonplaats'),
('25.78', 'Aan', 'Uit', '26', 'Uit', 'Hal'),
('25.78', 'Aan', 'Uit', '26', 'Uit', 'Slaapkamer 1'),
('25.78', 'Aan', 'Uit', '26', 'Uit', 'Slaapkamer 2'),
('25.78', 'Aan', 'Uit', '26', 'Uit', 'Garage');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
