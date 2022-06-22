-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Pát 14. čen 2019, 17:56
-- Verze serveru: 5.7.26-0ubuntu0.18.04.1
-- Verze PHP: 7.2.19-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `mvc_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `clanky`
--

CREATE TABLE `clanky` (
  `clanky_id` int(11) NOT NULL,
  `titulek` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `obsah` text COLLATE utf8_czech_ci,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `popisek` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `klicova_slova` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `clanky`
--

INSERT INTO `clanky` (`clanky_id`, `titulek`, `obsah`, `url`, `popisek`, `klicova_slova`) VALUES
(1, 'Úvod', '<p>Vítejte na našem webu!</p>\r\n\r\n<p>Tento web je postaven na <strong>jednoduchém MVC frameworku v PHP</strong>. Toto je úvodní článek, načtený z databáze.</p>', 'uvod', 'Úvodní článek na webu v MVC v PHP', 'úvod, mvc, web');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatele_id` int(11) NOT NULL,
  `jmeno` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `heslo` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `clanky`
--
ALTER TABLE `clanky`
  ADD PRIMARY KEY (`clanky_id`);

--
-- Klíče pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`uzivatele_id`),
  ADD UNIQUE KEY `jmeno` (`jmeno`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `clanky`
--
ALTER TABLE `clanky`
  MODIFY `clanky_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
