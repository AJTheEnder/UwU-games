-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 juin 2021 à 17:46
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
  `gamesLink` varchar(256) NOT NULL,
  `gamesCreator` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`gamesId`, `gamesName`, `gamesDescription`, `gamesDate`, `gamesDownloads`, `gamesLink`, `gamesCreator`) VALUES
(29, 'Minecraft', 'Un jeu avec des cubes', '2011-10-18', 7, 'https://www.minecraft.net/fr-fr', 'admin'),
(30, 'Fez', 'Fez est un jeu vidéo de plates-formes et de réflexion développé par le studio indépendant montréalais Polytron Corporation, sorti le 13 avril 2012 sur Xbox 360 (XBLA), le 1er mai 2013 sur Windows (Steam), le 11 septembre 2013 sur GNU/Linux et MacOS X, le 26 mars 2014 sur les consoles PlayStation (PS3, PS4 et PSVita) et le 14 avril 2021 sur Nintendo Switch. Le jeu s\'est vendu à un million d\'exemplaires le 9 décembre 2013. À l\'Independent Games Festival, le jeu a remporté le prix Excellence in Visual Art en 2008, a été nommé pour Design innovation la même année et a remporté le grand prix en 2012.', '2013-05-01', 3, 'http://fezgame.com/', 'admin'),
(31, 'Solitaire windows', 'Solitaire est une adaptation informatique pour les PC du jeu de cartes et de patience du même nom, distribué avec le système d\'exploitation Windows.', '1990-01-01', 0, 'https://support.microsoft.com/fr-fr/account-b', 'admin'),
(32, 'Wakfu', 'Wakfu est un jeu vidéo de rôle en ligne massivement multijoueur (MMORPG) produit, développé et édité principalement par Ankama Games, sorti en 2012 sur Linux, Mac OS et Windows, utilisant la technologie Java. Il est créé en France à Roubaix et constitue le quatrième MMORPG de l\'entreprise, après Dofus, Wakfu : Les Gardiens puis Arena. Il n\'a pas pour vocation de se substituer à ceux-ci et est développé en parallèle par une équipe spécifique. Le jeu, annoncé en 2006 pour 2008, est finalement sorti en février 2012 après quatre ans de bêta-test et de long développement.', '2012-02-29', 2, 'https://www.wakfu.com/fr/mmorpg/telecharger', 'admin'),
(34, 'E428', 'E428 est un jeu de plateforme 2D en pixel art dans lequel le joueur incarne le personnage de Glucose, un slime fait de sirop de maïs qui s\'est échappé de sa chaîne de production dans une usine alimentaire. Au cours de son périple pour sortir de l\'usine et regagner sa liberté, glucose va rencontrer toute sorte de créatures et de machine qu\'il devra combattre ou qui vont l\'aider à en savoir plus sur l\'usine et sur les événements qui ont lieux à l\'interieur.', '2021-06-05', 3, 'https://github.com/Paracetamol56/E428/releases', 'admin'),
(36, 'Rock simulator', 'Montez de niveau pour explorer les superbes paysages créés par mère nature sans aucune responsabilité et rien d\'autre que le vent soufflant par votre surface rocheuse dure. Écoutez les sons relaxants que la nature a à offrir dans de nombreux paysages différents tout en gagnant suffisamment de pierres pour débloquer vos skin de rocher préférés ! Commencez votre aventure dans les plaines tout en gagnant suffisamment d\'expérience pour débloquer beaucoup plus de cartes en faisant ce qu\'un rocher fait de mieux... exister !', '2019-10-27', 1, 'https://store.steampowered.com/app/1187510/Rock_Simulator/', 'admin'),
(37, 'Soviet hentai', 'CE PRODUIT PEUT INCLURE DU CONTENU QUI N\'EST PAS APPROPRIÉ POUR TOUS LES ÂGES\r\nOU POUR LA CONSULTATION AU TRAVAIL.', '2021-06-22', 1, 'https://github.com/Paracetamol56', 'admin'),
(38, 'azefazefazef', 'azefazefazfe', '0000-00-00', 0, 'https://gogole.com', 'admin');

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
(2, '&lt;script&gt;alert(&quot;T\'es sécurisé batard ?!&quot;);&lt;/script&gt;', 'admin@gmail.com', 'admin', '$2y$10$JOwOzjGmChf58PAFF1aR9OEjIYlrZpiqTUs4My3bl0KVfyU34U44m'),
(3, 'Gorgious', 'gorgious@gmail.com', 'Gorgious', '$2y$10$gh.OGUhJfU5B/ewaQ4ZWy.pAdZpgMTBLyQymSR9En2VDEN0PMXIY.');

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
  MODIFY `gamesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
