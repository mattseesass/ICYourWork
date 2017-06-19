-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 jun 2017 om 15:29
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icyourwork`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `apid` int(11) NOT NULL,
  `Name` text NOT NULL,
  `CV` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `applicants`
--

INSERT INTO `applicants` (`id`, `uid`, `vid`, `apid`, `Name`, `CV`, `email`) VALUES
(1, 85, 3, 91, 'hond hond', 'Ikben remco gallloweeofwfwfwfwoufgyewg iqwur qwoeiurhfwqeiouf weoiufhwqfwefwqef qwougyfbqegqegrerg wqeoufgbqregqepiubh', 'hond@hond.com'),
(2, 85, 3, 91, 'hond hond', 'Hoi ik ben remco', 'hond@hond.com'),
(3, 85, 3, 92, 'Fish fishers', 'Ik benn een goede kandidaat om dit bij uw bedrijf te werken', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `Userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL,
  `Accountid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `voornaam` varchar(110) NOT NULL,
  `achternaam` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `Accountid`, `email`, `password`, `join-date`, `voornaam`, `achternaam`) VALUES
(88, 1, 'R@al.com', '77963b7a931377ad4ab5ad6a9cd718aa', '2017-06-14 08:36:38', 'alal', 'ala'),
(89, 1, 'Remcovanderlinden78@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8', '2017-06-14 08:37:20', 'Aldi', 'Aldi'),
(91, 1, 'hond@hond.com', '80b1b3105f273c8b262a69fc4781d623', '2017-06-15 09:57:08', 'hond', 'hond'),
(92, 1, 'fish@fish', '83e4a96aed96436c621b9809e258b309', '2017-06-17 10:47:17', 'Fish', 'fishers');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES
(19, 83, 1),
(21, 85, 0),
(22, 86, 0),
(23, 87, 1),
(24, 88, 1),
(25, 86, 1),
(26, 90, 1),
(27, 91, 0),
(28, 92, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacatures`
--

CREATE TABLE `vacatures` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Comment` text NOT NULL,
  `Requirement` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture` varchar(150) NOT NULL,
  `uid` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vacatures`
--

INSERT INTO `vacatures` (`id`, `Name`, `Comment`, `Requirement`, `time`, `picture`, `uid`) VALUES
(3, 'qedqwedfweq', 'wsd', 'wdwqefweqf', '2017-06-13 14:43:20', 'default.png', '85'),
(4, 'Halllo', 'dt is ik', 'mmqwmqm', '2017-06-17 10:46:56', 'default.png', '91');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `vacatures`
--
ALTER TABLE `vacatures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT voor een tabel `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT voor een tabel `vacatures`
--
ALTER TABLE `vacatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
