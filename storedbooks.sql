-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 18. čec 2022, 22:15
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `knihovna`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `storedbooks`
--

CREATE TABLE `storedbooks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `borrowed` tinyint(1) NOT NULL DEFAULT 0,
  `img` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL DEFAULT 'default.png',
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `storedbooks`
--

INSERT INTO `storedbooks` (`id`, `name`, `genre`, `borrowed`, `img`, `authorid`) VALUES
(2, 'Nekonečný příběh', 'Fantasy', 0, 'default.png', 1),
(12, 'Harry Potter a Kámen mudrců', 'Fantasy', 1, 'book12.jpg', 2),
(35, '10000km pěšky Jižní Amerikou', 'Cestopisy', 0, 'book35.jpg', 3);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `storedbooks`
--
ALTER TABLE `storedbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`authorid`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `storedbooks`
--
ALTER TABLE `storedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `storedbooks`
--
ALTER TABLE `storedbooks`
  ADD CONSTRAINT `fk` FOREIGN KEY (`authorid`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
