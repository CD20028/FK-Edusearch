-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 08:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `userType` enum('ADMIN','EXPERT','STUDENT','STAFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `userName`, `phoneNumber`, `address`, `email`, `psw`, `userType`) VALUES
(2, 'syahkina othman', 'kino', '0182763534', 'Blok I, Universiti Malaysia Pahang, 26610 Gambang Pahang', 'gigblew122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'EXPERT'),
(3, 'nur afiqah', 'afiqah', '0182763534', 'Blok I, Universiti Malaysia Pahang, 26610 Pekan Pahang', 'gigblew122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'EXPERT'),
(4, 'sakina ', 'kina', '0111010961', 'Blok I, Universiti Malaysia Pahang, 26610 Gambang Pahang', 'gigblew122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'STUDENT'),
(5, 'akif', 'akif', '0192888883', 'ump pekan', 'charlotteolivia2000@hotmail.com', '774c643b4e9fd67bb70d7f648d439247', 'STAFF'),
(10, 'm ayyman ', 'ayyman', '0192888883', 'Blok I, Universiti Malaysia Pahang, 26610 Pekan Pahang', 'gigblew122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'STUDENT'),
(12, 'fakri', 'admin', '0138765070', 'Pekan', 'fakriamanah@gmail.com', '4159c22d065518d68b4270604093914f', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
