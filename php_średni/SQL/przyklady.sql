-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2017, 13:40
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przyklady`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przyklady`
--

CREATE TABLE `przyklady` (
  `id` int(11) NOT NULL,
  `kat` text COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `link` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `przyklady`
--

INSERT INTO `przyklady` (`id`, `kat`, `opis`, `link`) VALUES
(27, 'Gra', 'BallBounce Game App', 'https://youtu.be/w0yxJSlC00w'),
(28, 'Program', 'DigitalDoodle Drawing App', 'https://www.youtube.com/watch?v=fQKNzLYEN0M'),
(26, 'Program', 'Extended TalkToMe App: Shake!', 'https://www.youtube.com/watch?v=0hikoCvM3oc'),
(25, 'Program', 'TalkToMe Text-to-Speech App', 'https://youtu.be/Vdo8UdkgDD8'),
(29, 'Program', 'PaintPot (Part 1) for App Inventor 2', 'http://appinventor.mit.edu/explore/ai2/paintpot-part1.html'),
(30, 'Program', 'PaintPot (Part 2) for App Inventor 2', 'http://appinventor.mit.edu/explore/ai2/paintpot-part2.html');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `przyklady`
--
ALTER TABLE `przyklady`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `przyklady`
--
ALTER TABLE `przyklady`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
