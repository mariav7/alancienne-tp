-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 12:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alancienne-test-technique`
--

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(3) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id_membre`, `mdp`, `nom`, `prenom`, `email`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(12, '$2y$10$t3txLBEl25VuC034L0JMQeQtI9HEo/j0p0zy6XXrW.peHK1rokTby', 'Lolo', 'Lola', 'lolo@lola.com', 'Paris', 75013, '1 place d\'italie', 0),
(17, '$2y$10$ntOULnEYpoNm7HxVT/4nwu7AkZeSdyVCoIT6suXat7cNTuTYJmqxu', 'Admin', 'Admin', 'admin@admin.com', 'Paris', 75001, '2 rue de Rivoli', 1),
(18, '$2y$10$/V/1mqmCkrGI5tU1OtfJcucHkKb17QYxmvJboq4GvnBC7EI4T7NXa', 'Pierre', 'Jean', 'jean@gmail.com', 'Paris', 75019, '89 rue de crim&eacute;e', 0),
(19, '$2y$10$O.YBTC3WQnxl5DcXGQMbPuHqsrdHppQTc6P0PNc945JS.izUaJjqW', 'Levine', 'Adam', 'adam@yahoo.fr', 'Paris', 75013, '19 Place d\'Italie', 0),
(20, '$2y$10$XtHKsHZJ5UpFuG9jeGm96ewoTF6Hkwuh0O8GzFfwZCmAf..MWVpTa', 'Tata', 'Toto', 'tata@gmail.com', 'Paris', 75017, '15 rue Berz&eacute;lius', 0),
(21, '$2y$10$ajrakloUj28TpgmhkIuWeu/E9coLvQWvldvB/Ql5Is3qqYW275DNy', 'aze', 'aze', 'aze@aze.com', 'azeaze', 75001, 'azeaze', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `prix_ht` decimal(10,2) NOT NULL,
  `tva` decimal(10,1) NOT NULL,
  `stock_commande` int(3) NOT NULL,
  `stock_max_dispo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `prix_ht`, `tva`, `stock_commande`, `stock_max_dispo`) VALUES
(2, 'Chou Fleur', '3.00', '5.5', 3, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
