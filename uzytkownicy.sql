-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Paź 2022, 04:48
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `uzytkownicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowisko`
--

CREATE TABLE `stanowisko` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `stanowisko`
--

INSERT INTO `stanowisko` (`id`, `nazwa`) VALUES
(1, 'tester'),
(2, 'developer'),
(3, 'project manager');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umiejetnosci`
--

CREATE TABLE `umiejetnosci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `umiejetnosci`
--

INSERT INTO `umiejetnosci` (`id`, `nazwa`) VALUES
(1, 'systemy testujace'),
(2, 'systemy raportowe'),
(3, 'zna selenium'),
(4, 'srodowiska ide'),
(5, 'jezyki programowania'),
(6, 'zna mysql'),
(7, 'metodologie prowadzenia projektow'),
(8, 'zna scrum');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umiejetnosciuzytkownika`
--

CREATE TABLE `umiejetnosciuzytkownika` (
  `id` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_umiejetnosc` int(11) NOT NULL,
  `nazwa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `umiejetnosciuzytkownika`
--

INSERT INTO `umiejetnosciuzytkownika` (`id`, `id_uzytkownik`, `id_umiejetnosc`, `nazwa`) VALUES
(7, 19, 1, 'tak'),
(8, 19, 2, 'lir'),
(9, 19, 3, 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `id_stanowisko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `imie`, `nazwisko`, `email`, `opis`, `id_stanowisko`) VALUES
(19, 'Iga', 'Wilk', 'horanowytester@gmail.com', ' ', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `stanowisko`
--
ALTER TABLE `stanowisko`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `umiejetnosciuzytkownika`
--
ALTER TABLE `umiejetnosciuzytkownika`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umiejetnosciuzytkownika_ibfk_1` (`id_uzytkownik`),
  ADD KEY `umiejetnosciuzytkownika_ibfk_2` (`id_umiejetnosc`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_ibfk_1` (`id_stanowisko`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `stanowisko`
--
ALTER TABLE `stanowisko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `umiejetnosciuzytkownika`
--
ALTER TABLE `umiejetnosciuzytkownika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `umiejetnosciuzytkownika`
--
ALTER TABLE `umiejetnosciuzytkownika`
  ADD CONSTRAINT `umiejetnosciuzytkownika_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `umiejetnosciuzytkownika_ibfk_2` FOREIGN KEY (`id_umiejetnosc`) REFERENCES `umiejetnosci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `uzytkownik_ibfk_1` FOREIGN KEY (`id_stanowisko`) REFERENCES `stanowisko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
