DROP  TABLE IF EXISTS `bibliotheque`;

CREATE TABLE `bibliotheque` (
  `Id_Musique` smallint(6) NOT NULL,
  `Id_Utilisateur` smallint(6) NOT NULL,
  `Note` tinyint(11) NOT NULL
);

DROP TABLE IF EXISTS `musique`;
CREATE TABLE `musique` (
  `Id_Musique` smallint(6) NOT NULL,
  `Titre_Musique` varchar(50) NOT NULL,
  `Artiste_Musique` varchar(50) NOT NULL,
  `Album_Musique` varchar(50) DEFAULT NULL,
  `Duree_Musique` int(11) NOT NULL
);


INSERT INTO `musique` (`Id_Musique`, `Titre_Musique`, `Artiste_Musique`, `Album_Musique`, `Duree_Musique`) VALUES
(1, 'Prayer in C', 'Lilly Wood and the Prick & Robin Schulz', 'Invincible Friends', 158),
(2, 'Habits (Stay High)', 'Tove Lo', 'Truth Serum', 209),
(3, 'Dangerous', 'David Guetta feat. Sam Martin', NULL, 203),
(4, 'Uptown Funk', 'Mark Ronson feat. Bruno Mars', NULL, 270),
(5, 'Take Me to Church', 'Hozier', NULL, 243);

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `Id_Utilisateur` smallint(6) NOT NULL,
  `Nom_Utilisateur` int(11) NOT NULL,
  `Mail_Utilisateur` int(11) NOT NULL,
  `Mot_De_Passe_Utilisateur` int(11) NOT NULL
);

ALTER TABLE `bibliotheque`
  ADD KEY `Id_Musique` (`Id_Musique`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`);

ALTER TABLE `musique`
  ADD PRIMARY KEY (`Id_Musique`);

ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`);

ALTER TABLE `bibliotheque`
  ADD CONSTRAINT `bibliotheque_ibfk_1` FOREIGN KEY (`Id_Musique`) REFERENCES `musique` (`Id_Musique`),
  ADD CONSTRAINT `bibliotheque_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

