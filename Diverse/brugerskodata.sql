-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 11. 05 2020 kl. 10:03:44
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skodb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `brugerskodata`
--

CREATE TABLE `brugerskodata` (
  `Id` int(11) NOT NULL,
  `Navn` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Alder` int(11) NOT NULL,
  `Skostørrelse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `brugerskodata`
--

INSERT INTO `brugerskodata` (`Id`, `Navn`, `Email`, `Alder`, `Skostørrelse`) VALUES
(2, 'Mads', 'Mads@mail.dk', 23, 42),
(3, 'Benny', 'benny@mail.dk', 32, 41),
(5, 'Linda', 'linda@mail.dk', 43, 38),
(6, 'Troels', 'troels@mail.dk', 34, 47),
(7, 'Jakob', 'jakob@mail.dk', 32, 39),
(8, 'Bent', 'bent@email.dk', 63, 45),
(10, 'Karl', 'karl@mail.dk', 67, 41),
(11, 'Jarl', 'jarl@mail.dk', 65, 42),
(12, 'Poul', 'poul@mail.dk', 67, 40),
(13, 'Mark', 'mark@mail.dk', 23, 39),
(14, 'Muhammed', 'muhammed@mail.dk', 34, 41),
(15, 'Sigurd', 'sigurd@mail.dk', 44, 43),
(16, 'Signe', 'signe@mail.dk', 35, 37),
(17, 'Morten', 'morten@mail.dk', 37, 43),
(18, 'Mikkel', 'mikkel@mail.dk', 28, 41),
(19, 'Julie', 'julie@mail.dk', 32, 40),
(20, 'Wagner', 'wagner@mail.dk', 55, 40),
(21, 'Martin', 'martin@mail.dk', 28, 42),
(22, 'Hans', 'hans@mail.dk', 45, 38),
(23, 'Allan', 'allan@mail.dk', 47, 39),
(24, 'Peter', 'peter@mail.dk', 23, 40),
(25, 'Trine', 'trine@mail.dk', 34, 41),
(26, 'Mahmoud', 'mahmoud@email.dk', 41, 42),
(27, 'Svend', 'svend@mail.dk', 40, 43),
(29, 'Kjeld', 'kjeld@mail.dk', 72, 45),
(30, 'Jens', 'jens@mail.dk', 23, 42),
(31, 'Per', 'per@mail.dk', 34, 44),
(32, 'Pernille', 'pernille@mail.dk', 26, 41),
(33, 'Kalle', 'kalle@mail.dk', 29, 48),
(34, 'Yrsa', 'yrsa@email.dk', 64, 36),
(35, 'Palle', 'palle@mail.dk', 43, 38);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `brugerskodata`
--
ALTER TABLE `brugerskodata`
  ADD PRIMARY KEY (`Id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `brugerskodata`
--
ALTER TABLE `brugerskodata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
