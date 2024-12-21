-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 01:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wi-test-groupe-abbatiello`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `poste` enum('Gérant','Livreur','Cuisinier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nom`, `prenom`, `mail`, `adresse`, `telephone`, `poste`) VALUES
(1, 'Ea commodo error quo', 'Officiis at vel et c', 'tocu@mailinator.com', 'Molestias dolor aut ', '+13214412885', 'Livreur'),
(2, 'Laborum dolorem vel ', 'Quia dolor ea eligen', 'tevywud@mailinator.com', 'Et nulla dolor quod ', '+13214412885', 'Livreur'),
(3, 'Reprehenderit dolore', 'Facilis doloribus op', 'tyhu@mailinator.com', 'Sit laudantium sapi', '+13214412885', 'Gérant'),
(4, 'Dolorem est ut in v', 'Sit maiores non fac', 'gulakorak@mailinator.com', 'Sapiente totam dolor', '+13214412885', 'Livreur'),
(5, 'Sit non qui sit est', 'Sint nisi aut bland', 'vexat@mailinator.com', 'Repudiandae cupidata', '+13214412885', 'Gérant'),
(6, 'Rerum optio non aut', 'Voluptatem sit qui ', 'rocexe@mailinator.com', 'Dolore repellendus ', '+13214412885', 'Cuisinier'),
(7, 'Omnis debitis accusa', 'Maxime aut explicabo', 'tisevaxace@mailinator.com', 'Aliqua Mollit natus', '+13214412885', 'Gérant'),
(8, 'Corporis natus at om', 'In eos in molestiae ', 'hutu@mailinator.com', 'Eum inventore molest', '+13214412885', 'Gérant');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20241220152211);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` longtext NOT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mot_de_passe`, `role`) VALUES
(1, 'Veritatis perferendi', 'Et iste nobis volupt', 'proidentdolorumin', '$2y$10$.qxUklfO0OaS/B.9qBR4o.OZM0psmmTMEmjsNJnsgET/cAZoXtIT2', 'Admin'),
(2, 'Provident minus dol', 'Obcaecati eiusmod du', 'sintrepudiandaedes', '$2y$10$AFAYY2VSWcmpTeMytde1EegkkGTPl4qIfZyrtdMjuZuW3c4aDF15S', 'User'),
(3, 'Rerum corporis omnis', 'Minima error autem q', 'quivelitdistinctio', '$2y$10$qJ/zx64WWLMQ6tnSrbeBNurvgxnvSp8KxDt0O3Wk.ogDCi.XMviMy', 'User'),
(4, 'Et cupiditate quibus', 'Vero consequat Ab d', 'culpaadvelreruma', '$2y$10$3zQUUwONyqKtzRilhVZBGe5qlvVfwoaui34VmZ4.eUZVd7V..FIjK', 'User'),
(5, 'In aut facere proide', 'Nihil dolore corpori', 'blanditiisculpavol', '$2y$10$Ni6CIJkwOkT0nIU.dcSDfOgYJ9LhjIVD/i7RN9U2wmPGL.uikE5gq', 'Admin'),
(6, 'Occaecat laudantium', 'Aut rerum aliquip ni', 'aspernaturmolestiae', '$2y$10$vAc2nydrZjitNxSLvkJ84uCfZDuJ9UclJq01lKJ.pZcexp9NCQXCu', 'User'),
(7, 'Sequi in dolorum ali', 'Delectus ea ea occa', 'suscipitsuntipsum', '$2y$10$6EoDxA1JHABZMjtBA5516eUbR.A5sXrIpXhh7n8He62BCDdCGcuAy', 'User'),
(8, 'Perferendis aut est ', 'Voluptate ipsum obca', 'molestiaevitaeutd', '$2y$10$CC/MZEEzEEXkmNql9Yf6e.RX/q3CqdOVgzL5seJAMdYodUslNxREa', 'Admin'),
(9, 'Culpa itaque ullam d', 'Et pariatur Sint s', 'suscipitrepudiandae', '$2y$10$OTIxzIUMeC2Z1OkfCOAglOoYZlzH3fYHGRYamIi6j.w912VN8C9r.', 'User'),
(10, 'Libero hic magna ea ', 'Reprehenderit dicta', 'nullaullamaliaste', '$2y$10$Rmz4sDLCmvgBBBb6Rdp0I.Ysvk0SkNBLBD5JvmKghX3Xin/12ULA2', 'Admin'),
(11, 'Cumque laborum Offi', 'Dolor facere tempora', 'aspernaturvelitmod', '$2y$10$Yfp6ldOEA6Qsa1C4BeIgOOkr8AvAzgsIadEvVkDKm1zilrkxRbrkO', 'User'),
(12, 'Aut ipsum sapiente ', 'Autem aliqua Dolor ', 'perspiciatisinet', '$2y$10$OWU.XKWxYR59OJEmbfoKjOAlYGvLtA9SwB0Zu8pRRitgOqHb3yry2', 'User'),
(13, 'Nesciunt minim sint', 'Quia nostrud magna e', 'voluptateipsamculp', '$2y$10$mLWjC28wE7JjnRr8vtA9FeJ8tLJXG0g64wNi7wel76dM8nr52CZgy', 'Admin'),
(14, 'Eum esse consequatur', 'Odit sapiente facere', 'sintnullaiuresim', '$2y$10$d.kQfQdpEVVsy5uBdiILs.fKq4gNWCXAV9EBE224QNr5gGc5Bmp3S', 'User'),
(15, 'Et ut numquam repreh', 'Iste magna qui omnis', 'expeditacumqueipsa', '$2y$10$dW/cH0vb4hco3tv6s50/ueRXVzgHC8Q6OSOxh5cIWYTO6pLcCjxZG', 'Admin'),
(16, 'A commodi sit conse', 'Quia unde qui dolor ', 'sapientevoluptasin', '$2y$10$.GIpdTx6OqLbJIc3upesEOa67FfdJG8xdpRAXierwEK1fGtLI18v2', 'Admin'),
(17, 'Enim non ut minus in', 'Vitae in enim dolore', 'dolorvoluptasminus', '$2y$10$vFRyR84ZTaVwfN9fADv3uuI5CSCAU.PlNGPQpFyEU7G5wDTuJAULy', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
