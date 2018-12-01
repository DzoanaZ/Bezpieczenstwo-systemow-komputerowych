-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Sty 2018, 11:20
-- Wersja serwera: 10.1.25-MariaDB
-- Wersja PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis`
--
CREATE DATABASE IF NOT EXISTS `serwis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `serwis`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `email`, `haslo`) VALUES
(1, 'skoczp@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `serwisy`
--

CREATE TABLE `serwisy` (
  `id` int(11) NOT NULL,
  `urzadzenie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` decimal(5,2) DEFAULT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `serwisy`
--

INSERT INTO `serwisy` (`id`, `urzadzenie_id`, `user_id`, `status`, `cena`, `opis`, `data`) VALUES
(11, 2, 9, 'archiwalne', '0.00', 'Nie Å‚aduje baterii.', '2018-01-18 23:53:55'),
(12, 3, 11, 'nowe', '40.00', 'Wymiana przewodu', '2018-01-18 23:58:24'),
(13, 4, 11, 'gwarancja', '0.00', 'Nie uruchamia siÄ™', '2018-01-21 09:05:33'),
(15, 6, 13, 'gwarancja', '0.00', 'Nie uruchamia siÄ™', '2018-01-21 11:02:13'),
(16, 5, 13, 'archiwalne', '0.00', 'Zalany sokiem\r\nSpalona pÅ‚yta ', '2018-01-21 11:06:48'),
(18, 7, 14, 'nowe', '100.00', 'Formatowanie dysku i nowy system', '2018-01-21 11:10:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `urzadzenia`
--

CREATE TABLE `urzadzenia` (
  `id` int(11) NOT NULL,
  `producent` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `sn` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `urzadzenia`
--

INSERT INTO `urzadzenia` (`id`, `producent`, `model`, `sn`) VALUES
(1, 'Asus', 'X550VC', NULL),
(2, 'Lenovo', 'Y100', ''),
(3, 'Dell', 'Inspiron', ''),
(4, 'Apple', 'i3', ''),
(5, 'Hp', 'Elitebook', ''),
(6, 'Lenovo', 'Yoga 2', ''),
(7, 'Acer', 'Aspire v7', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `imie`, `nazwisko`, `tel`, `email`) VALUES
(1, 'JÃ³zef', 'Nowak', 17443536, 'dawidoo76@gmail.com'),
(9, 'PaweÅ‚', 'Skocz', 778996222, 'skoczp@gmail.com'),
(10, 'Jan', 'Kowalski', 111222333, 'jankowalski@onet.pl'),
(11, 'Tadeusz', 'Kwiatkowski', 123, 'kwiatkowskit@o2.pl'),
(12, 'Magdalena', 'GwiÅ¼dÅ¼', 2147483647, 'mgwizdz@vp.pl'),
(13, 'Ewelina', 'MamroÅ‚', 111222333, 'evkam@onet.pl'),
(14, 'Sylwester', 'Bontur', 123456987, 'bontur.s@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serwisy`
--
ALTER TABLE `serwisy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serwisy_urzadzenia` (`urzadzenie_id`),
  ADD KEY `serwisy_users` (`user_id`);

--
-- Indexes for table `urzadzenia`
--
ALTER TABLE `urzadzenia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `serwisy`
--
ALTER TABLE `serwisy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT dla tabeli `urzadzenia`
--
ALTER TABLE `urzadzenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `serwisy`
--
ALTER TABLE `serwisy`
  ADD CONSTRAINT `serwisy_urzadzenia` FOREIGN KEY (`urzadzenie_id`) REFERENCES `urzadzenia` (`id`),
  ADD CONSTRAINT `serwisy_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
