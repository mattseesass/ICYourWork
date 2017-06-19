-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 jun 2017 om 11:17
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
(67, 2, 'Steve@jobs.com', '202cb962ac59075b964b07152d234b70', '2017-06-06 12:21:37', 'Steve', 'jobs'),
(68, 1, 'Remcovanderlinden78@gmail.com', '1801bc89e752077204c92b3dd9f9f62d', '2017-06-06 13:30:37', 'Remco', 'van der linden'),
(69, 1, 'Joey@looverbbosch.com', '8277e0910d750195b448797616e091ad', '2017-06-06 13:32:02', 'Joey', 'loovenbosch'),
(70, 1, 'Remcovanderlinden1118@gmail.com', '8277e0910d750195b448797616e091ad', '2017-06-06 14:03:22', 'Remco', 'van der linden'),
(71, 1, 'pietje@bel.com', '49b10fbde180f30ecd23a4155ecc5a6f', '2017-06-06 14:09:35', 'pietje', 'bel'),
(72, 1, '3wef@wd.com', '8277e0910d750195b448797616e091ad', '2017-06-07 08:39:42', 'ergew', 'ewgew'),
(73, 1, 'Ridwan@slegers.com', '5f02f0889301fd7be1ac972c11bf3e7d', '2017-06-08 07:05:08', 'Ridwan', 'Sleger');

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
(3, 67, 0),
(4, 68, 0),
(5, 69, 0),
(6, 70, 0),
(7, 71, 0),
(8, 72, 1),
(9, 73, 0);

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
(2, 'awdawda', 'awdwad', 'awdawda', '2017-06-07 08:11:42', 'default.png', '67'),
(3, 'Looking for raid', 'Looking for some wow addicts to help me in this damn dungeon because i ned items illv 890 and i cant do this aloner', 'ilvl 890 to illv 900', '2017-06-07 08:16:15', 'default.png', '67'),
(4, 'Poep', 'peope', 'peop', '2017-06-07 08:39:19', 'default.png', '67'),
(5, 'Hello', 'fiuwqhefuewhfiwou', 'qwieufwqiuofhqw', '2017-06-07 14:32:34', 'default.png', '71'),
(6, 'Need peasants', 'Hi i AM A world leader and i need followers', 'being a peasant', '2017-06-08 07:06:03', 'default.png', '73');

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor een tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT voor een tabel `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `vacatures`
--
ALTER TABLE `vacatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
