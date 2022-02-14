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

INSERT INTO `books` (`id`, `title`, `genre`, `status`, `last_update`, `first_update`, `author`, `cover`, `pvt`) VALUES
(1, 'Dragons', 'Fantasy', 'Ongoing', '2021-05-18', '2021-05-18', 'Admin', 'Dragons.jpg', 'YES'),
(2, 'Bidirectional love', 'Romance', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'Bidirectional love.png', 'YES'),
(3, 'Endless Dream', 'Horror', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'Endless Dream.jpg', 'YES'),
(4, 'Fleeting', 'Romance', 'On-hold', '2021-05-18', '2021-05-18', 'Admin', 'Fleeting.jpg', 'NO'),
(5, 'Stars', 'Facts', 'Complete', '2021-05-18', '2021-05-18', 'Admin', 'Stars.jpg', 'NO'),
(6, 'The origin is the Light house', 'Fantasy', 'Coming Soon', '2021-05-18', '2021-05-18', 'Admin', 'The origin is the Light house.jpg', 'YES'),
(7, 'Anderson\'s Play house', 'Children\'s stories', 'Coming Soon', '2021-12-10', '2021-07-18', 'Admin', 'Anderson\'s Play house.jpg', 'NO');

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

INSERT INTO `users` (`id`, `username`, `fullname`, `surname`, `DOB`, `email`, `cell`, `password`, `bio`, `profile_img`, `last_read`, `last_chapter`, `line_space`, `font_size`) VALUES
(1, 'Admin', 'Dino Jose', 'Almirall', '2001-01-29', 'almirall.dino@gmail.com', '00', '$2y$10$lSShNrK5I/Xu1qh06ifU3eiRNkHKUMuRyagbHdq2bkrObnLidtfYS', 'Administrator!', 'admin.png', 'Stars', '009', 2, 18);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `books`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
