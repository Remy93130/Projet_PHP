-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 03:23 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibli`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE `adherent` (
  `numero` int(11) NOT NULL,
  `annInscrip` year(4) NOT NULL,
  `datPret` date DEFAULT NULL,
  `interdit` tinyint(4) DEFAULT NULL,
  `nombreEmprunt` tinyint(4) DEFAULT NULL,
  `login` varchar(65) NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`numero`, `annInscrip`, `datPret`, `interdit`, `nombreEmprunt`, `login`, `pwd`) VALUES
(1, 2017, '2017-12-14', NULL, NULL, 'user1', '435b41068e8665513a20070c033b08b9c66e4332'),
(2, 2017, '2018-05-14', NULL, NULL, 'user2', '435b41068e8665513a20070c033b08b9c66e4332'),
(3, 2017, '2017-11-02', 4, 1, 'user3', '435b41068e8665513a20070c033b08b9c66e4332'),
(4, 2017, '2017-12-11', NULL, NULL, 'user4', '435b41068e8665513a20070c033b08b9c66e4332'),
(5, 2017, '2017-12-02', NULL, NULL, 'user5', '435b41068e8665513a20070c033b08b9c66e4332'),
(6, 2018, '2018-05-14', NULL, NULL, 'user6', '435b41068e8665513a20070c033b08b9c66e4332'),
(7, 2018, NULL, NULL, NULL, 'user7', '435b41068e8665513a20070c033b08b9c66e4332');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pwd`) VALUES
(1, 'root', '435b41068e8665513a20070c033b08b9c66e4332'),
(2, 'remy', '93ef5dde44b5cb1d8f3795982ee918c64b7114f6'),
(3, 'leo', '347089886b69e44a5e133eecc740d765d533546b');

-- --------------------------------------------------------

--
-- Table structure for table `editeur`
--

CREATE TABLE `editeur` (
  `Nuedit` int(11) NOT NULL,
  `Nomedit` varchar(25) DEFAULT NULL,
  `Teledit` int(11) DEFAULT NULL,
  `Ruedit` varchar(25) DEFAULT NULL,
  `Postedit` varchar(25) DEFAULT NULL,
  `Villedit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editeur`
--

INSERT INTO `editeur` (`Nuedit`, `Nomedit`, `Teledit`, `Ruedit`, `Postedit`, `Villedit`) VALUES
(1, 'Yolo edition', 155448542, 'Rue de la vie', '93250', 'Villemomble'),
(2, 'Super Editeur', 899234567, 'Rue du bon pilo', '93200', 'Saint Denis'),
(3, 'Editeur random', 568169763, 'Boulevard de quelque part', '93160', 'Noisy le Grand'),
(4, 'Editeur insertion', 199784820, '47 rue du test php', '93130', 'Noisy le sec');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `CommunEns` varchar(25) DEFAULT NULL,
  `nomEns` varchar(25) DEFAULT NULL,
  `postEns` int(11) DEFAULT NULL,
  `prenEns` varchar(25) DEFAULT NULL,
  `rueEns` varchar(65) DEFAULT NULL,
  `telEns` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`CommunEns`, `nomEns`, `postEns`, `prenEns`, `rueEns`, `telEns`, `numero`) VALUES
('Noisy-le-Sec', 'Jean', 93130, 'Didier', '24 Rue du Charo', 789532656, 1),
('Chessy', 'Einstein', 77700, 'Albert', 'Rue de la Relativité', 632478591, 7);

-- --------------------------------------------------------

--
-- Table structure for table `enseigne`
--

CREATE TABLE `enseigne` (
  `numero` int(11) NOT NULL,
  `nuURF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseigne`
--

INSERT INTO `enseigne` (`numero`, `nuURF`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `envoiecourrieretudiant`
-- (See below for the actual view)
--
CREATE TABLE `envoiecourrieretudiant` (
`nomET` varchar(25)
,`prenET` varchar(25)
,`communEt` varchar(25)
,`postEt` int(11)
,`rueEt` varchar(65)
);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `communEt` varchar(25) DEFAULT NULL,
  `nomEt` varchar(25) DEFAULT NULL,
  `posCurs` varchar(25) DEFAULT NULL,
  `postEt` int(11) DEFAULT NULL,
  `prenEt` varchar(25) DEFAULT NULL,
  `rueEt` varchar(65) DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`communEt`, `nomEt`, `posCurs`, `postEt`, `prenEt`, `rueEt`, `numero`) VALUES
('Villemomble', 'Paul', 'DUT 1', 93250, 'Kevin', 'Rue du rouet', 2),
('Montreuil', 'Aleta', 'Licence 2', 93300, 'Guillaume', 'Rue de l imaginaire', 3),
('Sevran', 'Talsadoum', 'Master 1', 93270, 'Kaaris', 'Rue du bouchon de liege', 4),
('Champs sur Marne', 'Didier', 'DUT 2', 77420, 'Jean', '2 Rue Albert Einstein', 5),
('Noisy Le Sec', 'Barberet', 'DUT1', 93130, 'Rémy', '24 rue henri barbusse', 6);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `abrege` varchar(4) NOT NULL,
  `matiere` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`abrege`, `matiere`) VALUES
('CHIM', 'chimie'),
('ECON', 'Economie'),
('HIST', 'Histoire'),
('INFO', 'Informatique'),
('MATH', 'Mathematique');

-- --------------------------------------------------------

--
-- Table structure for table `non_periodique`
--

CREATE TABLE `non_periodique` (
  `Nuvol` tinyint(4) DEFAULT NULL,
  `Nombrevol` int(11) DEFAULT NULL,
  `Annedit` year(4) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_periodique`
--

INSERT INTO `non_periodique` (`Nuvol`, `Nombrevol`, `Annedit`, `ISBN`, `idProduit`) VALUES
(1, 2, 2018, 4987568, 1),
(1, 2, 2015, 2035789654, 6),
(1, 1, 2001, 123456, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `Auteur` varchar(25) DEFAULT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`Auteur`, `idProduit`) VALUES
('Charles Edouard', 2),
('Didier Charle', 5),
('Jean Paul', 6),
('Un savant fou', 8);

-- --------------------------------------------------------

--
-- Table structure for table `periodique`
--

CREATE TABLE `periodique` (
  `Periodebut` varchar(4) DEFAULT NULL,
  `Periodfin` varchar(4) DEFAULT NULL,
  `Periodicite` varchar(25) DEFAULT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodique`
--

INSERT INTO `periodique` (`Periodebut`, `Periodfin`, `Periodicite`, `idProduit`) VALUES
('2017', NULL, 'Hebdomadaire', 3),
('2017', NULL, 'Hebdomadaire', 4),
('2018', NULL, 'Mensuel', 11),
('2012', '2013', 'Mensuel', 12);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `idProduit` int(11) NOT NULL,
  `dispo` tinyint(1) DEFAULT NULL,
  `motMat` varchar(50) DEFAULT NULL,
  `rangement` varchar(3) DEFAULT NULL,
  `dateDerPret` date DEFAULT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `idEx` varchar(1) DEFAULT NULL,
  `NombreEx` tinyint(4) DEFAULT NULL,
  `Theme` varchar(25) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `numero_Adherent` int(11) DEFAULT NULL,
  `abrege` varchar(4) DEFAULT NULL,
  `Nuedit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`idProduit`, `dispo`, `motMat`, `rangement`, `dateDerPret`, `Titre`, `idEx`, `NombreEx`, `Theme`, `numero`, `numero_Adherent`, `abrege`, `Nuedit`) VALUES
(1, 1, 'Mathematique', 'A12', NULL, 'les math discrete', '1', 1, 'Mathematique ', NULL, NULL, 'MATH', 1),
(2, 0, 'Histoire', 'B12', NULL, 'L histoire du Congo', '2', 2, 'Histoire ', 3, NULL, 'HIST', 2),
(3, 1, 'Information', 'B01', NULL, 'Les information', '1', 1, 'Journal', NULL, NULL, 'HIST', 3),
(4, 1, 'Information', 'B01', NULL, 'Les information', '1', 1, 'Journal', NULL, NULL, 'HIST', 3),
(5, 1, 'Informatique', 'A13', NULL, 'Le SQL pour les nul', '1', 1, 'Programmation', NULL, NULL, 'INFO', 1),
(6, 1, 'Informatique', 'A13', NULL, 'Le language C', '1', 1, 'Programmation', NULL, NULL, 'INFO', 1),
(8, 1, NULL, 'B17', NULL, 'Les secrets de la chimie', NULL, NULL, 'Chimie', NULL, NULL, 'CHIM', 4),
(9, 1, NULL, 'E12', NULL, 'Comment devenir riche', NULL, NULL, 'Argent', NULL, NULL, 'ECON', 2),
(11, 1, NULL, 'B14', NULL, 'Ce que tu ne sais pas sur la France', NULL, NULL, 'Anecdote', NULL, NULL, 'HIST', 3),
(12, 1, NULL, 'A4', NULL, 'Comment calculer sans calculatrice', NULL, NULL, 'Tuto', NULL, NULL, 'MATH', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `retardretourproduction`
-- (See below for the actual view)
--
CREATE TABLE `retardretourproduction` (
`nomET` varchar(25)
,`prenET` varchar(25)
,`TempsEmprunt` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `urf`
--

CREATE TABLE `urf` (
  `nuURF` int(11) NOT NULL,
  `nomURF` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urf`
--

INSERT INTO `urf` (`nuURF`, `nomURF`) VALUES
(1, 'Histoire'),
(2, 'Informatique');

-- --------------------------------------------------------

--
-- Structure for view `envoiecourrieretudiant`
--
DROP TABLE IF EXISTS `envoiecourrieretudiant`;

CREATE VIEW `envoiecourrieretudiant`  AS  (select `e`.`nomEt` AS `nomET`,`e`.`prenEt` AS `prenET`,`e`.`communEt` AS `communEt`,`e`.`postEt` AS `postEt`,`e`.`rueEt` AS `rueEt` from (`adherent` `a` join `etudiant` `e`) where (((to_days(curdate()) - to_days(`a`.`datPret`)) >= 30) and (`e`.`numero` = `a`.`numero`))) ;

-- --------------------------------------------------------

--
-- Structure for view `retardretourproduction`
--
DROP TABLE IF EXISTS `retardretourproduction`;

CREATE VIEW `retardretourproduction`  AS  (select `e`.`nomEt` AS `nomET`,`e`.`prenEt` AS `prenET`,(to_days(curdate()) - to_days(`a`.`datPret`)) AS `TempsEmprunt` from (`adherent` `a` join `etudiant` `e`) where (((to_days(curdate()) - to_days(`a`.`datPret`)) >= 15) and (`e`.`numero` = `a`.`numero`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`Nuedit`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`numero`,`nuURF`),
  ADD KEY `FK_Enseigne_nuURF` (`nuURF`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`abrege`);

--
-- Indexes for table `non_periodique`
--
ALTER TABLE `non_periodique`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `periodique`
--
ALTER TABLE `periodique`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `FK_Production_numero` (`numero`),
  ADD KEY `FK_Production_numero_Adherent` (`numero_Adherent`),
  ADD KEY `FK_Production_abrege` (`abrege`),
  ADD KEY `FK_Production_Nuedit` (`Nuedit`);

--
-- Indexes for table `urf`
--
ALTER TABLE `urf`
  ADD PRIMARY KEY (`nuURF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `Nuedit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `urf`
--
ALTER TABLE `urf`
  MODIFY `nuURF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_Enseignant_numero` FOREIGN KEY (`numero`) REFERENCES `adherent` (`numero`);

--
-- Constraints for table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `FK_Enseigne_nuURF` FOREIGN KEY (`nuURF`) REFERENCES `urf` (`nuURF`),
  ADD CONSTRAINT `FK_Enseigne_numero` FOREIGN KEY (`numero`) REFERENCES `adherent` (`numero`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_numero` FOREIGN KEY (`numero`) REFERENCES `adherent` (`numero`);

--
-- Constraints for table `non_periodique`
--
ALTER TABLE `non_periodique`
  ADD CONSTRAINT `FK_Non_periodique_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `production` (`idProduit`);

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `FK_Ouvrage_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `production` (`idProduit`);

--
-- Constraints for table `periodique`
--
ALTER TABLE `periodique`
  ADD CONSTRAINT `FK_Periodique_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `production` (`idProduit`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `FK_Production_Nuedit` FOREIGN KEY (`Nuedit`) REFERENCES `editeur` (`Nuedit`),
  ADD CONSTRAINT `FK_Production_abrege` FOREIGN KEY (`abrege`) REFERENCES `matiere` (`abrege`),
  ADD CONSTRAINT `FK_Production_numero` FOREIGN KEY (`numero`) REFERENCES `adherent` (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
