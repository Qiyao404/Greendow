-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2022 at 10:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greendow_testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fenetres`
--

CREATE TABLE `fenetres` (
  `id_fenetre` int(11) NOT NULL,
  `salle` varchar(64) NOT NULL,
  `proprietaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fenetres`
--

INSERT INTO `fenetres` (`id_fenetre`, `salle`, `proprietaire`) VALUES
(1, 'salon', 1),
(2, 'cuisine', 1),
(3, 'chambre', 2),
(4, 'chambre', 1),
(5, 'salle de bain', 2),
(6, 'grenier', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'NGO Steven', 'steven.ngo@ibep.fr', 'hehehe', 'admin'),
(2, 'XU Qiyao', 'qiyao.xu@ibep.fr', 'xqy123', 'admin'),
(3, 'YU Edouard', 'edouard.yu@ibep.fr', 'edy567', 'gestionnaire'),
(4, 'BRASSEUR Matthieu', 'matthieu.brasseur@ibep.fr', 'mat987', 'client'),
(5, 'NIANE Haby', 'haby.niane@ibep.fr', 'password1', 'client'),
(6, 'GRIMALDI Cholé', 'chloe.grimaldi@ibep.fr', 'password2', 'client'),
(51, 'aaaa', 'aaa@gmail.com', 'azerty', 'client'),
(52, 'ssss', 'aze@gmail.com', 'aaa', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fenetres`
--
ALTER TABLE `fenetres`
  ADD PRIMARY KEY (`id_fenetre`),
  ADD KEY `fenetre_dctest` (`proprietaire`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fenetres`
--
ALTER TABLE `fenetres`
  MODIFY `id_fenetre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fenetres`
--
ALTER TABLE `fenetres`
  ADD CONSTRAINT `fenetre_dctest` FOREIGN KEY (`proprietaire`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
