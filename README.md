# PHP_Rating

This is what you need for DB in your phpMyAdmin:

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 25. Okt 2019 um 10:20
-- Server-Version: 5.7.26
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `PHP_Rating`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `php_rt_articles`
--

CREATE TABLE `php_rt_articles` (
  `id` int(11) NOT NULL,
  `art_name` text NOT NULL,
  `art_text` text NOT NULL,
  `art_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `php_rt_articles`
--

INSERT INTO `php_rt_articles` (`id`, `art_name`, `art_text`, `art_date`) VALUES
(1, 'Lorem ipsum dolor sit amet!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-10-24'),
(2, 'Lorem ipsum sit amet!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-10-25');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `php_rt_rating`
--

CREATE TABLE `php_rt_rating` (
  `id` int(11) NOT NULL,
  `rt_user_ip` text NOT NULL,
  `rt_likes` int(11) NOT NULL DEFAULT '0',
  `rt_dislikes` int(11) NOT NULL DEFAULT '0',
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `php_rt_rating`
--

INSERT INTO `php_rt_rating` (`id`, `rt_user_ip`, `rt_likes`, `rt_dislikes`, `art_id`) VALUES
(6, '::1', 0, 1, 1),
(7, '::1', 0, 1, 2),
(8, '::2', 0, 1, 2),
(9, '::3', 0, 1, 2),
(10, '::4', 1, 0, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `php_rt_articles`
--
ALTER TABLE `php_rt_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `php_rt_rating`
--
ALTER TABLE `php_rt_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `php_rt_articles`
--
ALTER TABLE `php_rt_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `php_rt_rating`
--
ALTER TABLE `php_rt_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
