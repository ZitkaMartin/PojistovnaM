-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 11. pro 2022, 17:28
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
-- Databáze: `admindb`
--
CREATE DATABASE IF NOT EXISTS `admindb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `admindb`;

-- --------------------------------------------------------

--
-- Struktura tabulky `admintable`
--

CREATE TABLE `admintable` (
  `id` int(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `admintable`
--

INSERT INTO `admintable` (`id`, `email`, `heslo`, `admin`) VALUES
(12, 'admin@admin.cz', '$2y$10$A8kdD56kK423sIOFA4631uTT.zjGhJYr47eaVOM3yGukkpZeJCFOW', 1),
(13, 'uzivatel@uzivatel.cz', '$2y$10$A8kdD56kK423sIOFA4631uvF8IiaHBOFnuH7LXIkfyA3qxhV18lm.', 0);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
