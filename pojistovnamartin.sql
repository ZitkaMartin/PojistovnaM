-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 08. pro 2022, 00:22
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
(148, 'Marek', 'Zbořil', '2014-06-13', '+420777666555'),
(149, 'Karel', 'Hořejší', '2000-04-04', '+420606789456'),
(150, 'Ivana', 'Franková', '1968-07-14', '+420 987 654 666'),
(151, 'Martin', 'Zítka', '1989-09-19', '+420 773 931 988'),
(152, 'Klára', 'Koutná', '1989-05-14', '+421698878965'),
(153, 'Maxmilián', 'Hanzl', '1995-05-14', '+420604587125'),
(154, 'Jan', 'Novák', '1996-02-12', '+420777865428'),
(155, 'Karolína', 'Tichá', '1987-05-14', '+421606547632'),
(156, 'Karel', 'Pavlíček', '1945-02-12', '+420774654396'),
(159, 'Adam', 'Mišík', '1984-05-14', '+420777654398'),
(160, 'Jaroslav', 'Kyselka', '1975-04-12', '+420 775 987 631');

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
(45, 148, 33),
(46, 154, 36),
(51, 151, 37),
(55, 155, 37),
(59, 154, 33),
(60, 153, 33);

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
(33, 'Úrazové pojištění', 'Úrazové pojištění je druh pojištění, který zahrnuje výplatu pojistného plnění v případě, že v důsledku úrazu dojde k přechodnému tělesnému poškození, trvalému tělesnému poškození, či smrti pojištěného. Pojištění se může vztahovat na jednotlivce i skupinu osob. Výplata pojistného plnění po úrazu neprobíhá ihned, ale až po skončení šetření úrazu, což bývá obvykle do několika měsíců od úrazu. V případě trvalých následků se může jednat až o několik let, kdy se čeká například na výši trvalých následků, které pojistná událost způsobila.'),
(34, 'Pojištění odpovědnosti za škodu', 'Pojištění odpovědnosti za škodu je typ pojištění vztahujícího se na škodu, kterou pojištěný způsobil přímo nebo nepřímo na zdraví jiné osoby (úraz, způsobení nemoci), poškozením nebo zničením věci, případně i za jinou škodu, za kterou pojištěný podle určitého právního předpisu (zákona) odpovídá. Odpovědnost za škodu je obecně dána občanským zákoníkem (část 6., hlava II), v pracovně-právních vztazích pak zákoníkem práce (část 2., hlava XIII).'),
(35, 'Pojištění domácnosti', 'Pojištění domácností snižuje finanční výdaje na znovupořízení majetku zapříčiněné živelními katastrofami, výbuchem, vypálením, krádežemi, vandalizmem, nebo dalšími neočekávanými událostmi.'),
(36, 'Pojištění majetku', 'Pojištění majetku je souhrnné označení pro několik odvětví neživotního pojištění. Všechna jsou upravena v Hlavě III zákona o pojistné smlouvě „Soukromé pojištění věci a jiného majetku“. Při těchto pojištěních poskytuje pojišťovna pojistnou ochranu majetku v případě, že dojde k jeho zničení, poškození nebo odcizení.'),
(37, 'Životní pojištění', 'Životní pojištění je taková pojistná smlouva mezi pojistníkem (klientem) a pojistitelem (pojišťovnou), ve které se pojistitel zavazuje zaplatit určenou peněžní částku pojištěné osobě v případě pracovní neschopnosti, doby nezbytného léčení úrazu, za trvalé následky úrazu, za hospitalizaci následkem úrazu, v případě invalidity 1., 2. nebo 3. stupně, závažných onemocnění a dalších připojištění nebo tuto částku zaplatit oprávněné (obmyšlené) osobě v případě úmrtí pojištěného. Pojištěný platí za tuto smlouvu v pravidelných dohodnutých intervalech pojistné.'),
(51, 'Havarijní pojištění', 'Havarijní pojištění (často označováno pojišťovnami jako kasko). Na rozdíl od povinného ručení, tedy pojištění odpovědnosti z provozu vozidla, se jedná o dobrovolné smluvní pojištění. Základní pojištění se sjednává pro minimalizaci rizik na vozidle či jeho části pro pojistná nebezpečí typu havárie, odcizení, vandalismu či živelních události (označováno jako All Risk) nebo pouze pro ochranu některých z výše uvedených (např. pouze havárie či pouze odcizení). V pojistných podmínkách či v samotné pojistné smlouvě nalezneme případy, pro které toto pojištění platí.');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(11) NOT NULL,
  `uzivatel` varchar(40) COLLATE utf8_czech_ci DEFAULT NULL,
  `heslo` varchar(40) COLLATE utf8_czech_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `uzivatel`, `heslo`, `admin`) VALUES
(1, 'MartinZ', '123', 1),
(4, 'LenkaZ', '123', 0),
(5, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 0),
(6, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 0);

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
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT pro tabulku `pojistenci_pojisteni`
--
ALTER TABLE `pojistenci_pojisteni`
  MODIFY `sjednaniId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `pojisteniId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
