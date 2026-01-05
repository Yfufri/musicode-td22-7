USE musicode;

DROP TABLE IF EXISTS `musique`;
CREATE TABLE `musique` (
  `Id_Musique` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `Titre_Musique` VARCHAR(50) NOT NULL,
  `Artiste_Musique` VARCHAR(50) NOT NULL,
  `Album_Musique` VARCHAR(50) DEFAULT NULL,
  `Duree_Musique` INT(11) NOT NULL,
  PRIMARY KEY (`Id_Musique`)
);

INSERT INTO `musique` (`Titre_Musique`, `Artiste_Musique`, `Album_Musique`, `Duree_Musique`) VALUES
('Prayer in C', 'Lilly Wood and the Prick & Robin Schulz', 'Invincible Friends', 158),
('Habits (Stay High)', 'Tove Lo', 'Truth Serum', 209),
('Dangerous', 'David Guetta feat. Sam Martin', NULL, 203),
('Uptown Funk', 'Mark Ronson feat. Bruno Mars', NULL, 270),
('Take Me to Church', 'Hozier', NULL, 243);

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `Id_Utilisateur` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `Nom_Utilisateur` VARCHAR(50) NOT NULL,
  `Mail_Utilisateur` VARCHAR(100) NOT NULL,
  `Mot_De_Passe_Utilisateur` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`Id_Utilisateur`)
);

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE `bibliotheque` (
  `Id_Musique` SMALLINT(6) NOT NULL,
  `Id_Utilisateur` SMALLINT(6) NOT NULL,
  `Note` TINYINT(4),
  PRIMARY KEY (`Id_Musique`, `Id_Utilisateur`),
  CONSTRAINT `fk_biblio_musique` FOREIGN KEY (`Id_Musique`) REFERENCES `musique` (`Id_Musique`),
  CONSTRAINT `fk_biblio_utilisateur` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`)
);
