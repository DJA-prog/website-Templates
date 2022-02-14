-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2021 at 12:31 PM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywriter`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` tinyint(4) NOT NULL,
  `title` tinytext NOT NULL,
  `genre` tinytext DEFAULT NULL,
  `status` tinytext DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `first_update` date DEFAULT NULL,
  `author` tinytext DEFAULT NULL,
  `cover` tinytext DEFAULT NULL,
  `pvt` varchar(3) DEFAULT 'YES'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `genre`, `status`, `last_update`, `first_update`, `author`, `cover`, `pvt`) VALUES
(1, 'Dragons', 'Fantasy', 'Ongoing', '2021-05-18', '2021-05-18', 'Admin', 'Dragons.jpg', 'YES'),
(2, 'Bidirectional love', 'Romance', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'Bidirectional love.png', 'YES'),
(3, 'Endless Dream', 'Horror', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'Endless Dream.jpg', 'YES'),
(4, 'Fleeting', 'Romance', 'On-hold', '2021-05-18', '2021-05-18', 'Admin', 'Fleeting.jpg', 'NO'),
(5, 'Stars', 'Facts', 'Complete', '2021-05-18', '2021-05-18', 'Admin', 'Stars.jpg', 'NO'),
(6, 'The origin is the Light house', 'Fantasy', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'The origin is the Light house.jpg', 'YES'),
(7, 'Anderson\'s Play house', 'Children\'s stories', 'Coming Soon', '2021-12-10', '2021-07-18', 'Admin', 'Anderson\'s Play house.jpg', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `fullname` tinytext DEFAULT NULL,
  `surname` tinytext NOT NULL,
  `DOB` date DEFAULT NULL,
  `email` tinytext NOT NULL,
  `cell` varchar(15) DEFAULT NULL,
  `password` longtext NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_img` tinytext DEFAULT NULL,
  `last_read` tinytext NOT NULL,
  `last_chapter` tinytext NOT NULL,
  `line_space` int(11) NOT NULL DEFAULT 0,
  `font_size` int(11) NOT NULL DEFAULT 14
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `surname`, `DOB`, `email`, `cell`, `password`, `bio`, `profile_img`, `last_read`, `last_chapter`, `line_space`, `font_size`) VALUES
(1, 'Admin', 'Dino Jose', 'Almirall', '2001-01-29', 'almirall.dino@gmail.com', '00', '$2y$10$lSShNrK5I/Xu1qh06ifU3eiRNkHKUMuRyagbHdq2bkrObnLidtfYS', 'Administrator!', 'admin.png', 'Stars', '009', 2, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
