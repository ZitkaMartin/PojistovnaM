-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 21. lis 2022, 20:22
-- Verze serveru: 10.4.25-MariaDB
-- Verze PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pojistovnamartin`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenci`
--

CREATE TABLE `pojistenci` (
  `pojistenecId` int(11) NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci DEFAULT NULL,
  `prijmeni` varchar(60) COLLATE utf8_czech_ci DEFAULT NULL,
  `datumNarozeni` date DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenci`
--

INSERT INTO `pojistenci` (`pojistenecId`, `jmeno`, `prijmeni`, `datumNarozeni`, `telefon`) VALUES
(7, 'Martin', 'Zátka', '1919-12-19', '333333666'),
(10, 'Martin', 'Kladivo', '0220-02-20', 'asfdaf'),
(46, 'Jaroslav ', 'Kaše', '1987-04-18', '+420773931988'),
(76, 'Jaroslav', 'Weigl', '1948-05-15', '456698745'),
(84, 'Honza', 'Bittner', '2000-03-31', '+420 773 931 988'),
(100, 'Kamil', 'Hubálovský', '0000-00-00', 'assadsa'),
(108, 'Martin', 'Zítka', '1555-05-15', 'adfadsf'),
(110, 'Pavlína', 'Volejníková', '2022-03-16', 'nevím');

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenci_pojisteni`
--

CREATE TABLE `pojistenci_pojisteni` (
  `sjednaniId` int(11) NOT NULL,
  `pojistenecId` int(11) DEFAULT NULL,
  `pojisteniId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenci_pojisteni`
--

INSERT INTO `pojistenci_pojisteni` (`sjednaniId`, `pojistenecId`, `pojisteniId`) VALUES
(21, 76, 1),
(22, 46, 7),
(23, 46, 1),
(24, 84, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `pojisteni`
--

CREATE TABLE `pojisteni` (
  `pojisteniId` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `popis` text COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojisteni`
--

INSERT INTO `pojisteni` (`pojisteniId`, `nazev`, `popis`) VALUES
(1, 'Upravené pojištění', 'Pokus o úpravu pojištění'),
(3, 'Druhé pojištění s indexem 3', 'Druhé pojištění s indexem 3'),
(7, 'Pojištění na blbost +', 'Premium'),
(8, 'osmička', '8'),
(14, 'Čtrnácté', '14');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`pojistenecId`);

--
-- Indexy pro tabulku `pojistenci_pojisteni`
--
ALTER TABLE `pojistenci_pojisteni`
  ADD PRIMARY KEY (`sjednaniId`),
  ADD KEY `pojistenci_pojisteni_ibfk_2` (`pojisteniId`),
  ADD KEY `pojistenci_pojisteni_ibfk_1` (`pojistenecId`);

--
-- Indexy pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD PRIMARY KEY (`pojisteniId`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pro tabulku `pojistenci_pojisteni`
--
ALTER TABLE `pojistenci_pojisteni`
  MODIFY `sjednaniId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `pojisteniId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `pojistenci_pojisteni`
--
ALTER TABLE `pojistenci_pojisteni`
  ADD CONSTRAINT `pojistenci_pojisteni_ibfk_1` FOREIGN KEY (`pojistenecId`) REFERENCES `pojistenci` (`pojistenecId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pojistenci_pojisteni_ibfk_2` FOREIGN KEY (`pojisteniId`) REFERENCES `pojisteni` (`pojisteniId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
