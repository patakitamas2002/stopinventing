-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Sze 24. 17:09
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `songlib`
--
CREATE DATABASE IF NOT EXISTS `songlib` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `songlib`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `posttext` varchar(200) NOT NULL,
  `uploaded` varchar(5) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`id`, `posttext`, `uploaded`, `userId`) VALUES
(1, 'test', 'true', 35),
(15, 'uwu', 'true', 36);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `artist` varchar(30) NOT NULL,
  `name` varchar(70) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(20) NOT NULL,
  `language` varchar(30) NOT NULL,
  `file` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `songs`
--

INSERT INTO `songs` (`id`, `artist`, `name`, `genre`, `language`, `file`, `userId`) VALUES
(5, 'this', 'download', 'test', 'please', 'song.mp3', 34),
(6, 'YaboiMatoi', 'Pure Furies', 'Metal', 'Instrumental', 'song.mp3', 35),
(8, 'YaboiMatoi', 'Pure Furies', 'Metal', 'Instrumental', 'song.mp3', 35),
(9, 'Undead Corporation', 'Better Off Alive', 'Metal', 'Instrumental', 'song.mp3', 1),
(10, 'YaboiMatoi', 'Pure Furies', 'Metal', 'Instrumental', 'song.mp3', 39);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `permissions` varchar(15) NOT NULL,
  `pfp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `permissions`, `pfp`) VALUES
(1, 'abc', '202cb962ac59075b964b07152d234b70', 'abc@valami', 'mod', ''),
(2, '1234', 'd41d8cd98f00b204e9800998ecf8427e', 'abcd@valami', 'mod', ''),
(5, 'xteamcrafterx', '202cb962ac59075b964b07152d234b70', 'abc@valami', 'mod', ''),
(6, 'jfxsnq', '202cb962ac59075b964b07152d234b70', 'abc@valami', 'user', ''),
(27, '123', '202cb962ac59075b964b07152d234b70', 'xteamcrafterx@gmail.com', 'mod', '7231c0258aa74aac74074c7932379101.png'),
(29, 'test2', '098f6bcd4621d373cade4e832627b4f6', 'test@test', 'user', 'download20220304220226.png'),
(31, 'pfp3', 'd41d8cd98f00b204e9800998ecf8427e', 'pfptest@valami', 'user', ''),
(32, '12345', '202cb962ac59075b964b07152d234b70', 'xteamcrafterburner@gmail.com', 'mod', 'ab67616d0000b273701403abb8816ea63c5fb042.jpg'),
(33, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'xteamcrafterburner2@gmail.com', 'mod', 'maxresdefault.jpg'),
(34, 'akuroujin', '202cb962ac59075b964b07152d234b70', 'valaki@valami2', 'mod', ''),
(35, 'blub', '455523d86a8a1ab7c7d33208fe0219e7', 'blub@blub', 'mod', ''),
(36, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@random', 'user', ''),
(37, 'yuri', '202cb962ac59075b964b07152d234b70', 'yuri@valaki', 'mod', ''),
(38, 'mod', 'ad148a3ca8bd0ef3b48c52454c493ec5', 'mod@mod', 'mod', ''),
(39, 'bemutatas2', '202cb962ac59075b964b07152d234b70', 'bemutatas@a', 'mod', ''),
(40, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'valaki@valami', 'user', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
