-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 26. čec 2022, 12:32
-- Verze serveru: 10.4.16-MariaDB
-- Verze PHP: 7.4.12

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
-- Struktura tabulky `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `authors`
--

INSERT INTO `authors` (`id`, `jmeno`, `prijmeni`, `img`) VALUES
(1, 'Michael', 'Ende', 'default.png'),
(2, 'J.K.', 'Rowling', 'default.png'),
(3, 'Jan', 'Rendl', 'default.png'),
(7, 'Karel', 'Čapek', 'author7.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `borrowedbooks`
--

CREATE TABLE `borrowedbooks` (
  `id` int(11) NOT NULL,
  `idbook` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `untildate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `borrowedbooks`
--

INSERT INTO `borrowedbooks` (`id`, `idbook`, `iduser`, `fromdate`, `untildate`) VALUES
(13, 35, 2, '2022-07-26', '2022-08-09'),
(15, 2, 1, '2022-07-26', '2022-08-09');

-- --------------------------------------------------------

--
-- Struktura tabulky `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1658315465),
('m130524_201442_init', 1658315477),
('m190124_110200_add_verification_token_column_to_user_table', 1658315477);

-- --------------------------------------------------------

--
-- Struktura tabulky `storedbooks`
--

CREATE TABLE `storedbooks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `borrowed` tinyint(1) NOT NULL DEFAULT 0,
  `borrowedcount` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL DEFAULT 'default.png',
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `storedbooks`
--

INSERT INTO `storedbooks` (`id`, `name`, `genre`, `borrowed`, `borrowedcount`, `img`, `authorid`) VALUES
(2, 'Nekonečný příběh', 'Fantasy', 1, 7, 'default.png', 1),
(12, 'Harry Potter a Kámen mudrců', 'Fantasy', 0, 4, 'book12.jpg', 2),
(35, '10000km pěšky Jižní Amerikou', 'Cestopisy', 1, 2, 'book35.jpg', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'kucera', 'ahJedR1Q11LX7thyUZela5DrzDRkMxI6', '$2y$13$69nej5/VmjeNY8AG2Sbo3.ZX/7k5dAC7jQbY0GSuWnmYhSpgbbVBm', NULL, 'kuceral.99@spst.eu', 10, 1658315505, 1658315505, '6APlh3EjFgyLvcEjKhMSpUf6geTf4qnV_1658315505'),
(2, 'test', 'PnL-zG0Vhs216qiZWKHLqG0yQzvCQ3dw', '$2y$13$myb4AHulEsgACOdnATLQpe/YcyYNw3SRiLDWEnVjYlBmO.fSz7FDG', NULL, 'test@test.com', 10, 1658747404, 1658747404, '9Eui2vkPPKzu3iWI4mE28fYoHpU2VD2E_1658747404');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbook` (`idbook`),
  ADD KEY `borrowedbooks_ibfk_2` (`iduser`);

--
-- Klíče pro tabulku `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Klíče pro tabulku `storedbooks`
--
ALTER TABLE `storedbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`authorid`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `storedbooks`
--
ALTER TABLE `storedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD CONSTRAINT `borrowedbooks_ibfk_1` FOREIGN KEY (`idbook`) REFERENCES `storedbooks` (`id`),
  ADD CONSTRAINT `borrowedbooks_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
