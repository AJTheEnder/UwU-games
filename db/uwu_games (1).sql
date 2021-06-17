-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 juin 2021 à 14:47
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
-- Base de données : `uwu_games`
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
  `gamesLink` varchar(45) NOT NULL,
  `gamesCreator` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`gamesId`, `gamesName`, `gamesDescription`, `gamesLink`, `gamesCreator`) VALUES
(1, 'Minecraft', 'Un jeu avec des cubes', 'blabla', 'Mojang'),
(2, 'Wakfu', 'Un jeu avec pleins de classes trop cool', 'blabla2', 'Ankama');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(45) NOT NULL,
  `usersEmail` varchar(45) NOT NULL,
  `usersUid` varchar(45) NOT NULL,
  `usersPwd` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Michel', 'michel@gmail.com', 'Michou', 'password'),
(2, 'Titouan', 'hackerdu75@gmail.com', 'HackerDu75', 'infoLover');

-- --------------------------------------------------------

--
-- Structure de la table `usersgames`
--

CREATE TABLE `usersgames` (
  `usergamesId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usersgames`
--

INSERT INTO `usersgames` (`usergamesId`, `userId`, `gameId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesId`);

--
-- Index pour la table `categoriesgames`
--
ALTER TABLE `categoriesgames`
  ADD PRIMARY KEY (`categoriesgamesId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `gameId` (`gameId`);

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
-- Index pour la table `usersgames`
--
ALTER TABLE `usersgames`
  ADD PRIMARY KEY (`usergamesId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `gameId` (`gameId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categoriesgames`
--
ALTER TABLE `categoriesgames`
  MODIFY `categoriesgamesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `gamesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `usersgames`
--
ALTER TABLE `usersgames`
  MODIFY `usergamesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categoriesgames`
--
ALTER TABLE `categoriesgames`
  ADD CONSTRAINT `categoriesgames_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoriesId`),
  ADD CONSTRAINT `categoriesgames_ibfk_2` FOREIGN KEY (`gameId`) REFERENCES `games` (`gamesId`);

--
-- Contraintes pour la table `usersgames`
--
ALTER TABLE `usersgames`
  ADD CONSTRAINT `usersgames_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`usersId`),
  ADD CONSTRAINT `usersgames_ibfk_2` FOREIGN KEY (`gameId`) REFERENCES `games` (`gamesId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
