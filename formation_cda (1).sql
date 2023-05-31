-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 10:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation_cda`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Ajout_Personne` (IN `p_nom` VARCHAR(30), IN `p_prenom` VARCHAR(30), IN `p_poids` FLOAT, IN `p_taille` FLOAT, IN `p_date` DATE, IN `p_sexe` ENUM('MASCULIN','FEMININ'), IN `p_ville` VARCHAR(30))   BEGIN
	INSERT INTO Personne (Nom,Prenom,Ville,Date_De_Naissance,Poids,Taille,Sexe) VALUES (p_nom,p_prenom,p_ville,p_date,p_poids,p_taille,p_sexe);
END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Diagnostique` (`IMC` FLOAT) RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE RESULT VARCHAR (100);
	CASE
	WHEN IMC < 18.5 THEN SET RESULT = 'Insuffisance pondérale (maigreur)';
	WHEN IMC < 25 THEN SET RESULT = 'Corpulence normale';
	WHEN IMC < 30 THEN SET RESULT = 'Surpoids';
	WHEN IMC < 35 THEN SET RESULT = 'Obésité modérée';
	WHEN IMC < 40 THEN SET RESULT = 'Obésité sévère';
	ELSE SET RESULT = 'Obésité morbide ou massive';
	END CASE;
    RETURN RESULT;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `IMC` (`poids` FLOAT, `taille` FLOAT) RETURNS FLOAT  BEGIN
	RETURN ROUND((poids / (taille * taille)),2);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Nom_Complet` (`nom` VARCHAR(30), `prenom` VARCHAR(30)) RETURNS VARCHAR(64) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
	RETURN CONCAT(prenom,',',nom);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `PoidMin` (`Taille` FLOAT) RETURNS FLOAT  BEGIN
	RETURN ROUND((18.5 * (Taille*Taille)),2);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `PoidsMax` (`poids` FLOAT, `taille` FLOAT) RETURNS FLOAT  BEGIN
	RETURN ROUND((25 * (Taille*Taille)),2);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Poids_Ideal` (`taille` FLOAT, `sexe` VARCHAR(30)) RETURNS FLOAT  BEGIN
	DECLARE S FLOAT DEFAULT -1 ;
    IF UPPER(TRIM(Sexe)) = 'MASCULIN' THEN SET S = 22 * taille * taille;
    	ELSEIF UPPER(TRIM(Sexe)) = 'FEMININ' THEN SET S = 21 * taille * taille;
        END IF;
     RETURN ROUND(S,2);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `demande_inscription`
--

CREATE TABLE `demande_inscription` (
  `id` int(11) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Prenom` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_inscription`
--

INSERT INTO `demande_inscription` (`id`, `Nom`, `Prenom`, `Email`, `Password`) VALUES
(1, 'mouss', 'misso', 'tata@casablanca.ma', 'azerty1234'),
(2, 'ZIDANE', 'ZIZOU', 'zizou@madrid.es', 'Marseille13*'),
(3, 'titi', 'nini', 'lolo@casablanca.ma', 'azerty1234');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `User` varchar(80) NOT NULL,
  `Pwd` varchar(255) NOT NULL,
  `Role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `User`, `Pwd`, `Role`) VALUES
(4, 'Moumine@casablanca.ma', '$2y$10$IMmYNAYtehlhGil4NsHJ1.NPOZE0qAYZDk6JRPSOcRAofTVjiorFO', 'Administrateur'),
(5, 'avisen@casablanca.ma', '$2y$10$T3bv/Byt28sMdyHH1S0/nO12nsW/AYGGXHjoGqZlOMRFMIGFZZYgC', 'Formateur'),
(6, 'Rifi@casablanca.ma', '$2y$10$.AUhUoI9T.coAx8u1M6px.XmoPNlV85.zoU80TEjmCrJ/peDqtv8O', 'Stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Prenom` varchar(40) NOT NULL,
  `Date_De_Naissance` date NOT NULL,
  `Poids` float NOT NULL,
  `Taille` float NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `Sexe` enum('Masculin','Feminin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID`, `Nom`, `Prenom`, `Date_De_Naissance`, `Poids`, `Taille`, `Ville`, `Sexe`) VALUES
(1, 'Salam', 'Moumine', '2013-05-04', 83, 1.84, 'Laval', 'Masculin'),
(2, 'Salam', 'Moumine', '2013-05-04', 77, 1.82, 'Lyon', 'Masculin'),
(3, 'toto', 'tata', '2023-05-23', 79, 1.73, 'Grenoble', 'Feminin'),
(4, 'vetel', 'vicus', '2023-05-01', 68, 1.7, 'parisirap', 'Feminin'),
(5, 'stendhal', 'henry', '0000-00-00', 83, 1.73, 'Chambery', 'Masculin'),
(6, 'vinicius', 'lilou', '0000-00-00', 69, 1.7, 'chambery', 'Feminin'),
(7, 'toto', 'ninou', '2009-02-02', 72, 1.69, 'grenoble', 'Feminin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande_inscription`
--
ALTER TABLE `demande_inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User` (`User`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande_inscription`
--
ALTER TABLE `demande_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
