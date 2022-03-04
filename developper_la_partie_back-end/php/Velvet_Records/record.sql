-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 jan. 2022 à 16:08
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `record`
--
CREATE DATABASE IF NOT EXISTS `record` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `record`;

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) DEFAULT NULL,
  `artist_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_url`) VALUES
(1, 'Neil Young', NULL),
(2, 'YES', NULL),
(3, 'Rolling Stones', NULL),
(4, 'Queens of the Stone Age', NULL),
(5, 'Serge Gainsbourg', NULL),
(6, 'AC/DC', NULL),
(7, 'Marillion', NULL),
(8, 'Bob Dylan', NULL),
(9, 'Fleshtones', NULL),
(10, 'The Clash', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `disc`
--

DROP TABLE IF EXISTS `disc`;
CREATE TABLE IF NOT EXISTS `disc` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_title` varchar(255) DEFAULT NULL,
  `disc_year` int(11) DEFAULT NULL,
  `disc_picture` varchar(255) DEFAULT NULL,
  `disc_label` varchar(255) DEFAULT NULL,
  `disc_genre` varchar(255) DEFAULT NULL,
  `disc_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`disc_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `disc`
--

INSERT INTO `disc` (`disc_id`, `disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES
(1, 'Fugazi', 1984, 'Fugazi.jpeg', 'EMI', 'Prog', '14.99', 7),
(2, 'Songs for the Deaf', 2002, 'Songs for the Deaf.jpeg', 'Interscope Records', 'Rock/Stoner', '12.99', 4),
(3, 'Harvest Moon', 1992, 'Harvest Moon.jpeg', 'Reprise Records', 'Rock', '4.20', 1),
(4, 'Initials BB', 1968, 'Initials BB.jpeg', 'Philips', ' Chanson, Pop Rock', '12.99', 5),
(5, 'After the Gold Rush', 1970, 'After the Gold Rush.jpeg', ' Reprise Records', 'Country Rock', '20.00', 1),
(6, 'Broken Arrow', 1996, 'Broken Arrow.jpeg', 'Reprise Records', ' Country Rock, Classic Rock', '15.00', 1),
(7, 'Highway To Hell', 1979, 'Highway To Hell.jpeg', 'Atlantic', 'Hard Rock', '15.00', 6),
(8, 'Drama', 1980, 'Drama.jpeg', 'Atlantic', 'Prog', '15.00', 2),
(9, 'Year of the Horse', 1997, 'Year of the Horse.jpeg', 'Reprise Records', 'Country Rock, Classic Rock', '7.50', 1),
(10, 'Ragged Glory', 1990, 'Ragged Glory.jpeg', 'Reprise Records', 'Country Rock, Grunge', '11.00', 1),
(11, 'Rust Never Sleeps', 1979, 'Rust Never Sleeps.jpeg', 'Reprise Records', 'Classic Rock, Arena Rock', '15.00', 1),
(12, 'Exile on main street', 1972, 'Exile on main street.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', '33.00', 1),
(13, 'London Calling', 1971, 'London Calling.jpeg', 'CBS', 'Punk, New Wave', '33.00', 1),
(14, 'Beggars Banquet', 1968, 'Beggars Banquet.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', '33.00', 1),
(15, 'Laboratory of sound', 1995, 'Laboratory of sound.jpeg', 'Rebel Rec.', 'Rock', '33.00', 9),
(20, 'TAKE A GOOD LOOK LP', 2008, '51C270GPitL._AC_UY218_[1].jpg', 'Album vinyle', 'j\'en sais rien', '7.00', 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `date_register` datetime NOT NULL DEFAULT current_timestamp(),
  `date_connect` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
