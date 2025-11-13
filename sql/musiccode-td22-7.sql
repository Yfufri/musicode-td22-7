-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 nov. 2025 à 15:58
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `musiccode-td22-7`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `Id_Musique` smallint(6) NOT NULL,
  `Id_Utilisateur` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `Id_Musique` smallint(6) NOT NULL,
  `Titre_Musique` varchar(50) NOT NULL,
  `Artiste_Musique` varchar(50) NOT NULL,
  `Album_Musique` varchar(50) DEFAULT NULL,
  `Duree_Musique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`Id_Musique`, `Titre_Musique`, `Artiste_Musique`, `Album_Musique`, `Duree_Musique`) VALUES
(1, 'Prayer in C', 'Lilly Wood and the Prick & Robin Schulz', 'Invincible Friends', 158),
(2, 'Habits (Stay High)', 'Tove Lo', 'Truth Serum', 209),
(3, 'Dangerous', 'David Guetta feat. Sam Martin', NULL, 203),
(4, 'Uptown Funk', 'Mark Ronson feat. Bruno Mars', NULL, 270),
(5, 'Take Me to Church', 'Hozier', NULL, 243);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` smallint(6) NOT NULL,
  `Nom_Utilisateur` int(11) NOT NULL,
  `Mail_Utilisateur` int(11) NOT NULL,
  `Mot_De_Passe_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD KEY `Id_Musique` (`Id_Musique`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`Id_Musique`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD CONSTRAINT `bibliotheque_ibfk_1` FOREIGN KEY (`Id_Musique`) REFERENCES `musique` (`Id_Musique`),
  ADD CONSTRAINT `bibliotheque_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
