-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 juin 2021 à 19:24
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uwugames`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categoriesId` int(11) NOT NULL,
  `categoriesName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoriesId`, `categoriesName`) VALUES
(1, 'sandbox'),
(2, 'survival'),
(3, 'mmo'),
(4, 'rpg');

-- --------------------------------------------------------

--
-- Structure de la table `categoriesgames`
--

CREATE TABLE `categoriesgames` (
  `categoriesgamesId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categoriesgames`
--

INSERT INTO `categoriesgames` (`categoriesgamesId`, `categoryId`, `gameId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `gamesId` int(11) NOT NULL,
  `gamesName` varchar(45) NOT NULL,
  `gamesDescription` text NOT NULL,
  `gamesDate` date NOT NULL DEFAULT current_timestamp(),
  `gamesDownloads` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `gamesLink` varchar(45) NOT NULL,
  `gamesCreator` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`gamesId`, `gamesName`, `gamesDescription`, `gamesDate`, `gamesDownloads`, `gamesLink`, `gamesCreator`) VALUES
(29, 'Minecraft', 'Un jeu avec des cubes', '2011-10-18', 0, 'https://www.minecraft.net/fr-fr', 'admin'),
(30, 'Fez', 'Fez est un jeu vidéo de plates-formes et de réflexion développé par le studio indépendant montréalais Polytron Corporation, sorti le 13 avril 2012 sur Xbox 360 (XBLA), le 1er mai 2013 sur Windows (Steam), le 11 septembre 2013 sur GNU/Linux et MacOS X, le 26 mars 2014 sur les consoles PlayStation (PS3, PS4 et PSVita) et le 14 avril 2021 sur Nintendo Switch. Le jeu s\'est vendu à un million d\'exemplaires le 9 décembre 2013. À l\'Independent Games Festival, le jeu a remporté le prix Excellence in Visual Art en 2008, a été nommé pour Design innovation la même année et a remporté le grand prix en 2012.', '2013-05-01', 0, 'http://fezgame.com/', 'admin'),
(31, 'Solitaire windows', 'Solitaire est une adaptation informatique pour les PC du jeu de cartes et de patience du même nom, distribué avec le système d\'exploitation Windows.', '1990-01-01', 0, 'https://support.microsoft.com/fr-fr/account-b', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '$2y$10$JOwOzjGmChf58PAFF1aR9OEjIYlrZpiqTUs4My3bl0KVfyU34U44m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gamesId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `gamesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
