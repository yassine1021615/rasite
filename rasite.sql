-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 01:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasite`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `short_disc` varchar(100) NOT NULL,
  `disc` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `title`, `short_disc`, `disc`, `username`, `date_time`, `level`) VALUES
(93, 'Gebruiker toegevoegt.', '', '', 'admin', '2019-05-27 09:33:19', 1),
(94, 'Gebruiker toegevoegt.', '', '', 'admin', '2019-05-27 09:33:55', 1),
(95, 'Ticket aangemaakt.', 'Nieuwe ticket gemaakt met prioriteit 0', '', 'admin', '2019-05-27 09:34:25', 1),
(96, 'Ticket aangemaakt.', 'Nieuwe ticket gemaakt met prioriteit 1', '', 'admin', '2019-05-27 09:35:29', 1),
(97, 'Ticket aangemaakt.', 'Nieuwe ticket gemaakt met prioriteit 2', '', 'admin', '2019-05-27 09:36:02', 1),
(98, 'Ticket aangemaakt.', 'Nieuwe ticket gemaakt met prioriteit 3', '', 'admin', '2019-05-27 09:36:24', 1),
(99, 'Gebruiker toegevoegt.', '', '', 'admin', '2019-05-27 09:50:59', 1),
(100, 'Gebruiker verweiderd.', 'Verweiderd: dummy', 'Gebruiker is op in-actief gezet en nog niet echt verweiderd. \r\n                Gebruiker kan weer actief gemaakt worden door een admin. \r\n                Het is ook mogelijk om de gebruiker permanent te verweideren.', 'admin', '2019-05-27 10:16:31', 0),
(101, 'Gebruiker herstelt.', 'Herstelt: dummy', 'Gebruiker is weer op actief gezet.', 'admin', '2019-05-27 10:16:40', 2),
(102, 'Gebruiker verweiderd.', 'Verweiderd: dummy', 'Gebruiker is op in-actief gezet en nog niet echt verweiderd. \r\n                Gebruiker kan weer actief gemaakt worden door een admin. \r\n                Het is ook mogelijk om de gebruiker permanent te verweideren.', 'admin', '2019-05-27 10:16:52', 0),
(103, 'Gebruiker permanent verweiderd.', 'Perm. Verweiderd: dummy', 'De gebruiker is permanent verweiderd. Het is niet mogelijk om de gebruiker weer op actief te zetten.\r\n                De gebruiker zal opnieuw aangemaakt moeten worden indien iemand de gebruiker weer wilt gebruiken.', 'admin', '2019-05-27 10:17:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `priority` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `discription`, `priority`, `date_time`, `status`) VALUES
(7, 'Dummy', 'Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy', 0, '2019-05-27 09:34:25', 0),
(8, 'Dummy 2', 'Dummy dummy dummy dummy dummy dummy dummy dummy dummy dummy 2', 1, '2019-05-27 09:35:29', 0),
(9, 'Dummy 3', 'Dummy dummy dummy dummy dummy dummy dummy dummy dummydummy dummydummy 3', 2, '2019-05-27 09:36:02', 0),
(10, 'Dummy 4', 'Dummy dummy dummy dummy dummy dummy dummy dummy dummydummydummy dummy dummy 4', 3, '2019-05-27 09:36:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `adverb` varchar(10) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `user_rights` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `adverb`, `surname`, `user_rights`, `deleted`) VALUES
(21, 'admin', '$2y$12$zxJxGyfFrzm87HGdWs8rjebmPknEhd9zlpjjRopSq0nre96z/sCtu', 'admin@rasite.nl', 'Admin', 'at', 'Admin', '0', 0),
(22, 'standaard', '$2y$12$dDl60gi0IS97vmGb/moPVOx6T421wB78W1WU4ZXMoV4tvQ8wcSgC2', 'standaard@rasite.nl', 'Standaard', 'Sta', 'Standaard', '0', 0),
(23, 'webmaster', '$2y$12$RKO9Z1sGoA7J7xgbuLV8bujTeDoDix7Lu9lavHxE5el5IU//H3PJa', 'webmaster@rasite.nl', 'Webmaster', 'Web', 'Webmaster', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
