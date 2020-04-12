-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 01:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `publication_year` date NOT NULL,
  `publish_house` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_points` int(11) NOT NULL,
  `cover_photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `publication_year`, `publish_house`, `quantity`, `price`, `reservation_points`, `cover_photo`, `description`, `likes`) VALUES
('1', 'A', '2000-12-12', 1, 1, 10, 50, 'a.jpg', 'blablabla', 10),
('2', 'A', '2001-12-12', 1, 1, 10, 0, 'b.jpg', 'blablabla', 3),
('3', 'A', '2003-12-12', 1, 1, 10, 20, 'c.jpg', 'blablabla', 12),
('4', 'A', '0000-00-00', 1, 1, 10, 20, 'd.jpg', 'blablabla', 14),
('5', 'A', '2005-12-12', 1, 1, 10, 100, 'e.jpg', 'blablabla', 18),
('6', 'A', '2006-12-12', 1, 1, 10, 0, 'f.jpg', 'blablabla', 23);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` varchar(30) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_id` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_reservation`
--

CREATE TABLE `book_reservation` (
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `reservation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `returnTime` date NOT NULL,
  `delay_fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`) VALUES
(1, 'adventure'),
(2, 'romance'),
(3, 'thriller'),
(4, 'action'),
(5, 'mystery'),
(6, 'sci-fi'),
(7, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking`
--

CREATE TABLE `hall_booking` (
  `library_hall` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_halls`
--

CREATE TABLE `library_halls` (
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `open_seats` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_books`
--

CREATE TABLE `online_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `publish_date` date NOT NULL,
  `likes` int(11) NOT NULL,
  `cover_photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_books`
--

INSERT INTO `online_books` (`id`, `user_id`, `category_id`, `title`, `publish_date`, `likes`, `cover_photo`, `description`) VALUES
(1, 9, 1, 'A', '2000-12-12', 10, 'a.jpg', 'blslvallsl'),
(2, 9, 1, 'A', '2001-12-12', 20, 'b.jpg', 'blslvallsl'),
(3, 9, 1, 'A', '2003-12-12', 30, 'c.jpg', 'blslvallsl'),
(4, 9, 1, 'A', '2004-12-12', 40, 'd.jpg', 'blslvallsl'),
(5, 9, 1, 'A', '2006-12-12', 50, 'e.jpg', 'blslvallsl'),
(6, 9, 1, 'A', '2007-12-12', 60, 'f.jpg', 'blslvallsl'),
(7, 9, 1, 'A', '2008-12-12', 70, 'g.jpg', 'blslvallsl'),
(8, 9, 1, 'A', '2009-12-12', 80, 'j.jpg', 'blslvallsl');

-- --------------------------------------------------------

--
-- Table structure for table `publish_house`
--

CREATE TABLE `publish_house` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publish_house`
--

INSERT INTO `publish_house` (`id`, `name`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `time_review` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `library_hall_id` int(11) NOT NULL,
  `statusi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `points` int(11) NOT NULL,
  `user_rights` int(11) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `activationStatus` tinyint(1) NOT NULL,
  `securityString` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `mobile`, `password`, `birthday`, `gender`, `points`, `user_rights`, `profile_photo`, `activationStatus`, `securityString`) VALUES
(9, 'andi', 'elezi', 'andi06121998', 'andielezi52@gmail.com', '+3556849250', '$2y$10$x1nul6dQXAfs6H9hmkb08uA7Hsuef3alpzf0h0BYsbq3IoyMuf.ie', '1998-06-12', 'M', 0, 3, 'andi.jpg', 1, 'hbs3x8ciz75juqya1ew9pv2d4frgkl0tnmo6');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `description`) VALUES
(1, 'Administrator'),
(2, 'Librarian'),
(3, 'Perdorues normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_publish_house` (`publish_house`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `fk_author_id` (`author_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `fk_book_id_br` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_booking`
--
ALTER TABLE `hall_booking`
  ADD PRIMARY KEY (`library_hall`,`user_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `library_halls`
--
ALTER TABLE `library_halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_librarian_id` (`librarian_id`);

--
-- Indexes for table `online_books`
--
ALTER TABLE `online_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_on_id` (`user_id`),
  ADD KEY `fk_category_online_id` (`category_id`);

--
-- Indexes for table `publish_house`
--
ALTER TABLE `publish_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_user_review_id` (`user_id`),
  ADD KEY `fk_book_review_id` (`id_book`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_library_hall_id` (`library_hall_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_rights` (`user_rights`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `library_halls`
--
ALTER TABLE `library_halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_books`
--
ALTER TABLE `online_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publish_house`
--
ALTER TABLE `publish_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_publish_house` FOREIGN KEY (`publish_house`) REFERENCES `publish_house` (`id`);

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `fk_book_ISBN` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD CONSTRAINT `fk_book_id_br` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `fk_user_id_br` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hall_booking`
--
ALTER TABLE `hall_booking`
  ADD CONSTRAINT `fk_library_hall` FOREIGN KEY (`library_hall`) REFERENCES `library_halls` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `library_halls`
--
ALTER TABLE `library_halls`
  ADD CONSTRAINT `fk_librarian_id` FOREIGN KEY (`librarian_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `online_books`
--
ALTER TABLE `online_books`
  ADD CONSTRAINT `fk_category_online_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user_on_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_book_review_id` FOREIGN KEY (`id_book`) REFERENCES `online_books` (`id`),
  ADD CONSTRAINT `fk_user_review_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `fk_library_hall_id` FOREIGN KEY (`library_hall_id`) REFERENCES `library_halls` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_rights` FOREIGN KEY (`user_rights`) REFERENCES `user_rights` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
