-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 07:24 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e21bdfilms`
--
CREATE DATABASE IF NOT EXISTS `e21bdfilms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `e21bdfilms`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE `actors` (
  `idActor` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE `connexion` (
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `statue` tinyint(4) NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`email`, `password`, `statue`, `role`, `idMembre`) VALUES
('hakam@gmail.com', 'aaa', 1, 'A', 4),
('orlando@gmail.com', 'aaa', 1, 'A', 5),
('anas@gmail.com', 'aaa', 1, 'A', 6),
('test22@gmail.com', 'aaa', 1, 'M', 8);

-- --------------------------------------------------------

--
-- Table structure for table `filmcategorie`
--

DROP TABLE IF EXISTS `filmcategorie`;
CREATE TABLE `filmcategorie` (
  `idFilm` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `idFilm` int(11) NOT NULL,
  `titre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL,
  `langue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`idFilm`, `titre`, `duree`, `langue`, `date`, `montant`, `photo`, `description`) VALUES
(1, 'The Avengers (2012)', 143, 'Anglais', '2012-04-05', '30.00', 'client/public/images/theavengers_lob_crd_03_0.jpg', ''),
(2, 'Grand Isle (2019)', 97, 'Anglais', '2019-06-12', '27.00', 'client/public/images/grandile.jpg', ''),
(3, 'The Good Doctor (2017)', 104, 'Anglais', '2017-07-04', '42.00', 'client/public/images/goodDoctor.jpg', ''),
(4, 'Cruella (2021)', 134, 'Anglais', '2019-05-28', '23.00', 'client/public/images/cruella.jpg', ''),
(5, 'Wrath of Man (2021)', 119, 'Anglais', '2021-05-07', '41.00', 'client/public/images/wrathofman.jpg', ''),
(6, 'Game of Thrones (2011)', 57, 'Anglais', '2011-07-24', '48.00', 'client/public/images/got.jpg', ''),
(7, 'Fury (2014)', 135, 'Anglais', '2014-10-17', '27.00', 'client/public/images/fury.jpg', ''),
(8, 'Jolt (2021)', 91, 'Anglais', '2021-07-15', '33.00', 'client/public/images/jolt.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `filmsactors`
--

DROP TABLE IF EXISTS `filmsactors`;
CREATE TABLE `filmsactors` (
  `idFilm` int(11) NOT NULL,
  `idActor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filmsrealisateurs`
--

DROP TABLE IF EXISTS `filmsrealisateurs`;
CREATE TABLE `filmsrealisateurs` (
  `idFilm` int(11) NOT NULL,
  `idRealisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filmsrealisateurs`
--

INSERT INTO `filmsrealisateurs` (`idFilm`, `idRealisateur`) VALUES
(3, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `idLocation` int(11) NOT NULL,
  `dateDeLocation` date NOT NULL,
  `dateExpiration` date NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE `membres` (
  `idMembre` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`idMembre`, `nom`, `prenom`, `email`, `sexe`, `date`, `photo`) VALUES
(4, 'hakam', 'almotlak', 'hakam@gmail.com', 'Homme', '2000-01-01', ''),
(5, 'orlando', 'je sais pas quoi', 'orlando@gmail.com', 'Homme', '2000-01-01', ''),
(6, 'anas', 'je sais pas quoi', 'anas@gmail.com', 'Homme', '2000-01-01', ''),
(8, 'test', 'test', 'test22@gmail.com', 'Homme', '2000-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `paiments`
--

DROP TABLE IF EXISTS `paiments`;
CREATE TABLE `paiments` (
  `idPaiment` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paiments`
--

INSERT INTO `paiments` (`idPaiment`, `montant`, `date`, `idMembre`) VALUES
(34, '60.00', '2021-11-06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `paimentsfilms`
--

DROP TABLE IF EXISTS `paimentsfilms`;
CREATE TABLE `paimentsfilms` (
  `idPaiment` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
CREATE TABLE `paniers` (
  `idPanier` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paniers`
--

INSERT INTO `paniers` (`idPanier`, `idMembre`) VALUES
(24, 8);

-- --------------------------------------------------------

--
-- Table structure for table `paniersfilms`
--

DROP TABLE IF EXISTS `paniersfilms`;
CREATE TABLE `paniersfilms` (
  `idPanier` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE `prix` (
  `idPrix` int(11) NOT NULL,
  `nbJour` smallint(6) NOT NULL,
  `montant` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prix`
--

INSERT INTO `prix` (`idPrix`, `nbJour`, `montant`) VALUES
(1, 3, '1.35'),
(2, 7, '1.40'),
(3, 1, '1.00'),
(4, 2, '1.20');

-- --------------------------------------------------------

--
-- Table structure for table `realisateurs`
--

DROP TABLE IF EXISTS `realisateurs`;
CREATE TABLE `realisateurs` (
  `idRealisateur` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `realisateurs`
--

INSERT INTO `realisateurs` (`idRealisateur`, `nom`) VALUES
(1, 'Zak Penn'),
(2, 'David Shore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`idActor`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `idMembre` (`idMembre`);

--
-- Indexes for table `filmcategorie`
--
ALTER TABLE `filmcategorie`
  ADD KEY `idCategorie` (`idCategorie`),
  ADD KEY `idFilm` (`idFilm`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idFilm`);

--
-- Indexes for table `filmsactors`
--
ALTER TABLE `filmsactors`
  ADD KEY `idActor` (`idActor`),
  ADD KEY `idFilm` (`idFilm`);

--
-- Indexes for table `filmsrealisateurs`
--
ALTER TABLE `filmsrealisateurs`
  ADD KEY `idFilm` (`idFilm`),
  ADD KEY `idRealisateur` (`idRealisateur`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`idLocation`),
  ADD KEY `idFilm` (`idFilm`),
  ADD KEY `idMembre` (`idMembre`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idMembre`);

--
-- Indexes for table `paiments`
--
ALTER TABLE `paiments`
  ADD PRIMARY KEY (`idPaiment`),
  ADD KEY `idMembre` (`idMembre`);

--
-- Indexes for table `paimentsfilms`
--
ALTER TABLE `paimentsfilms`
  ADD KEY `idFilm` (`idFilm`),
  ADD KEY `idPaiment` (`idPaiment`);

--
-- Indexes for table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idMembre` (`idMembre`);

--
-- Indexes for table `paniersfilms`
--
ALTER TABLE `paniersfilms`
  ADD KEY `idPanier` (`idPanier`),
  ADD KEY `idFilm` (`idFilm`);

--
-- Indexes for table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`idPrix`);

--
-- Indexes for table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD PRIMARY KEY (`idRealisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `idActor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `idLocation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paiments`
--
ALTER TABLE `paiments`
  MODIFY `idPaiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `prix`
--
ALTER TABLE `prix`
  MODIFY `idPrix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `realisateurs`
--
ALTER TABLE `realisateurs`
  MODIFY `idRealisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filmcategorie`
--
ALTER TABLE `filmcategorie`
  ADD CONSTRAINT `filmcategorie_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filmcategorie_ibfk_2` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filmsactors`
--
ALTER TABLE `filmsactors`
  ADD CONSTRAINT `filmsactors_ibfk_1` FOREIGN KEY (`idActor`) REFERENCES `actors` (`idActor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filmsactors_ibfk_2` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filmsrealisateurs`
--
ALTER TABLE `filmsrealisateurs`
  ADD CONSTRAINT `filmsrealisateurs_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filmsrealisateurs_ibfk_2` FOREIGN KEY (`idRealisateur`) REFERENCES `realisateurs` (`idRealisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paiments`
--
ALTER TABLE `paiments`
  ADD CONSTRAINT `paiments_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`) ON DELETE CASCADE;

--
-- Constraints for table `paimentsfilms`
--
ALTER TABLE `paimentsfilms`
  ADD CONSTRAINT `paimentsfilms_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paimentsfilms_ibfk_2` FOREIGN KEY (`idPaiment`) REFERENCES `paiments` (`idPaiment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paniersfilms`
--
ALTER TABLE `paniersfilms`
  ADD CONSTRAINT `paniersfilms_ibfk_1` FOREIGN KEY (`idPanier`) REFERENCES `paniers` (`idPanier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paniersfilms_ibfk_2` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
