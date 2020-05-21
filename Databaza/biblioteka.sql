-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 06:52 PM
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
  `full_name` varchar(50) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `full_name`, `birthplace`, `birthday`, `contact`) VALUES
(28, 'Sebastian Junger', 'America', '1962-01-17', 'unknown'),
(29, 'Brian Harbert', 'America', '1947-06-29', 'unknown'),
(30, 'Kevin J.Anderson', 'America', '0000-00-00', ' 35556255451'),
(31, 'Suzane Collins', 'America', '1899-01-06', 'unknown'),
(32, 'Veronica Roth', 'America', '1925-01-06', 'veronica@gmail.com'),
(33, 'Stephenie Mayer', 'America', '1988-12-06', 'unknown'),
(34, 'Thomas Reye', 'England', '1998-10-01', ' 35566854'),
(35, 'Nicholas Sparks', 'France', '1700-12-06', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(75) NOT NULL,
  `publication_year` date NOT NULL,
  `publish_house` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_points` int(11) NOT NULL,
  `cover_photo` varchar(150) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `monthly_likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `publication_year`, `publish_house`, `quantity`, `price`, `reservation_points`, `cover_photo`, `description`, `likes`, `monthly_likes`) VALUES
('9780060742690', 'A Death in Belmont', '2007-02-01', 10, 26, 15, 0, 'ADeathinBelmont1590075314.jpg', 'The quiet suburb of Belmont, Massacuusetts, is in the grip of fear. The Boston Strangler murders have taken place nearby, and now there is another shocking sex crime, right in Belmont. The victim is Bessie Goldberg, a middle-aged woman who had hired a cleaning man to help out around the house on that fall day in 1963. He is a black man named Roy Smith. He did the appointed chores, collected his money and left a receipt on the kitchen table. Neighbors will say that he looked furtive when he walked down the street, that he was in a hurry, that he stopped to buy cigarettes, that he looked over his shoulder. They didn\'t see a black man in Belmont very often, so, of course, they noticed him. So the story went, and on these slender threads, and his own checkered history, Roy Smith is convicted of the Belmont murder and sent to prison.', 0, 0),
('9780061013515', 'The Perfect Storm: A True Story of Men Against the Sea', '2001-02-01', 8, 50, 4, 10, 'ThePerfectStormATrueStoryofMenAgainsttheSea1590074052.jpg', 'October 1991. It was \"the perfect storm\"--a tempest that may happen only once in a century--a nor\'easter created by so rare a combination of factors that it could not possibly have been worse. Creating waves ten stories high and winds of 120 miles an hour, the storm whipped the sea to inconceivable levels few people on Earth have ever witnessed. Few, except the six-man crew of the Andrea Gail, a commercial fishing boat tragically headed towards its hellish center.', 0, 0),
('9780062345219', 'Four: A Divergent Collection', '2015-01-05', 13, 3, 20, 0, 'FourADivergentCollection1590077852.jpg', 'Two years before Beatrice Prior made her choice, the sixteen-year-old son of Abnegation\'s faction leader did the same. Tobias\'s transfer to Dauntless is a chance to begin again. Here, he will not be called the name his parents gave him. Here, he will not let fear turn him into a cowering child.', 0, 0),
('9780316024969', 'New Moon (The Twilight Saga)', '2015-01-05', 14, 20, 12, 0, 'NewMoonTheTwilightSaga1590078296.jpg', 'For Bella Swan, there is one thing more important than life itself: Edward Cullen. But being in love with a vampire is even more dangerous than Bella could ever have imagined. Edward has already rescued Bella from the clutches of one evil vampire, but now, as their daring relationship threatens all that is near and dear to them, they realize their troubles may be just beginning.', 0, 0),
('9780316160209', 'Eclipse (Twilight)', '2017-01-05', 14, 20, 12, 20, 'EclipseTwilight1590078608.jpg', 'As Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge, Bella once again finds herself surrounded by danger. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob-knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf.', 0, 0),
('9780316387842', 'The Chemist', '1888-03-05', 14, 20, 25, 50, 'TheChemist1590079060.jpg', 'She used to work for the U.S. government, but very few people ever knew that. An expert in her field, she was one of the darkest secrets of an agency so clandestine it doesn\'t even have a name. And when they decided she was a liability, they came for her without warning.', 0, 0),
('9780393010466', 'Fire', '2001-02-01', 9, 20, 12, 0, 'Fire1590074639.jpg', 'The events explored in Fire focus on \"people confronting situations that could easily destroy them,\" and as he demonstrated in The Perfect Storm, Sebastian Junger is skilled at breaking such situations down to their core elements. In this exciting book, he reports on raging forest fires in the Western U.S, war zones in Kosovo and Afghanistan, the deadly diamond trade in Sierra Leone, the plight of travelers kidnapped by guerrillas in Kashmir, the last living whale harpooner on the Caribbean isla', 0, 0),
('9780439023481', 'The Hunger Games', '2014-01-05', 12, 15, 20, 0, 'TheHungerGames1590077438.jpg', 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.', 0, 0),
('9780765322722', 'The winds of dune', '2009-01-05', 11, 15, 10, 0, 'TORBooks1590076345.jpg', 'With their usual skill, Brian Herbert and Kevin Anderson have taken ideas left behind by Frank Herbert and filled them with living characters and a true sense of wonder. Where Paul of Dune picked up the saga directly after the events of Dune, The Winds of Dune begins after the events of Dune Messiah.', 0, 0),
('9781455520633', 'The Longest Ride', '1898-03-05', 15, 20, 25, 25, 'TheLongestRide1590079780.jpg', 'From the dark days of WWII to present-day North Carolina, this New York Times bestseller shares the lives of two couples overcoming destructive secrets and finding joy together', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` varchar(30) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
('9780060742690', 28),
('9780061013515', 28),
('9780062345219', 32),
('9780316024969', 33),
('9780316160209', 33),
('9780316387842', 33),
('9780316387842', 34),
('9780393010466', 28),
('9780439023481', 31),
('9780765322722', 29),
('9780765322722', 30),
('9781455520633', 35);

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_id` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`book_id`, `category_id`) VALUES
('9780060742690', 3),
('9780060742690', 5),
('9780061013515', 1),
('9780061013515', 3),
('9780061013515', 5),
('9780062345219', 1),
('9780062345219', 4),
('9780062345219', 6),
('9780316024969', 2),
('9780316160209', 2),
('9780316387842', 3),
('9780393010466', 5),
('9780439023481', 1),
('9780439023481', 4),
('9780439023481', 5),
('9780439023481', 6),
('9780765322722', 1),
('9780765322722', 6),
('9781455520633', 2),
('9781455520633', 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_favourite`
--

CREATE TABLE `book_favourite` (
  `id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favourite_time` date NOT NULL,
  `book_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_favourite`
--

INSERT INTO `book_favourite` (`id`, `book_id`, `user_id`, `favourite_time`, `book_type`) VALUES
(13, '33', 15, '2020-05-18', 'onlineBook'),
(14, '32', 15, '2020-05-18', 'onlineBook'),
(15, '34', 15, '2020-05-18', 'onlineBook'),
(16, '36', 15, '2020-05-18', 'onlineBook'),
(17, '37', 15, '2020-05-18', 'onlineBook'),
(18, '39', 15, '2020-05-18', 'onlineBook'),
(19, '38', 15, '2020-05-18', 'onlineBook'),
(20, '34', 19, '2020-05-20', 'onlineBook');

-- --------------------------------------------------------

--
-- Table structure for table `book_like`
--

CREATE TABLE `book_like` (
  `id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_time` date NOT NULL,
  `book_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_online_categories`
--

CREATE TABLE `book_online_categories` (
  `book_online_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_online_categories`
--

INSERT INTO `book_online_categories` (`book_online_id`, `category_id`) VALUES
(32, 2),
(32, 7),
(33, 5),
(34, 2),
(34, 1),
(35, 5),
(35, 7),
(36, 5),
(36, 7),
(36, 1),
(37, 2),
(37, 1),
(38, 2),
(38, 1),
(39, 2),
(39, 5),
(39, 7),
(40, 2),
(40, 5),
(41, 5),
(41, 1),
(42, 2),
(42, 5),
(42, 7),
(43, 2),
(43, 7),
(44, 2),
(44, 1),
(45, 5),
(45, 7),
(46, 5),
(46, 1),
(47, 2),
(47, 1),
(48, 2),
(48, 7),
(48, 1),
(49, 2),
(49, 5),
(49, 7),
(50, 5),
(50, 1),
(51, 7),
(51, 1),
(52, 2),
(52, 1),
(53, 5),
(54, 7),
(55, 2),
(56, 1),
(57, 5),
(58, 2),
(58, 5),
(58, 7),
(58, 1),
(59, 5),
(59, 7),
(60, 2),
(60, 5),
(61, 2),
(61, 7),
(62, 6),
(62, 3),
(63, 7),
(64, 7),
(64, 5),
(65, 5),
(65, 2),
(66, 5),
(66, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_reservation`
--

CREATE TABLE `book_reservation` (
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `reservation_time` date NOT NULL,
  `returnTime` date NOT NULL,
  `delay_fine` int(11) NOT NULL,
  `taken` tinyint(4) DEFAULT 0
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
  `seat_number` int(11) NOT NULL,
  `reservation_start_time` timestamp NULL DEFAULT NULL,
  `reservation_end_time` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hall_structure`
--

CREATE TABLE `hall_structure` (
  `structure_id` int(11) NOT NULL,
  `library_hall` int(11) DEFAULT NULL,
  `row_numbers` int(11) DEFAULT NULL,
  `separation_1` int(11) DEFAULT NULL,
  `separation_2` int(11) DEFAULT NULL,
  `separation_3` int(11) DEFAULT NULL,
  `separation_4` int(11) DEFAULT NULL,
  `separation_5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_structure`
--

INSERT INTO `hall_structure` (`structure_id`, `library_hall`, `row_numbers`, `separation_1`, `separation_2`, `separation_3`, `separation_4`, `separation_5`) VALUES
(1, 1, 5, 3, 3, 4, NULL, NULL),
(2, 2, 5, 2, 2, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_halls`
--

CREATE TABLE `library_halls` (
  `id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `open_seats` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_halls`
--

INSERT INTO `library_halls` (`id`, `name`, `capacity`, `open_seats`, `librarian_id`) VALUES
(1, 'salla1', 50, 50, 1),
(2, 'salla2', 50, 50, 15);

-- --------------------------------------------------------

--
-- Table structure for table `online_books`
--

CREATE TABLE `online_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `publish_date` date NOT NULL,
  `likes` int(11) NOT NULL,
  `cover_photo` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `book_path` varchar(150) DEFAULT NULL,
  `monthly_likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_books`
--

INSERT INTO `online_books` (`id`, `user_id`, `title`, `publish_date`, `likes`, `cover_photo`, `description`, `book_path`, `monthly_likes`) VALUES
(32, 15, 'a', '2020-04-23', 4, 'a1587664787.jpg', 'a', 'a1587664787.pdf', 0),
(33, 15, 'b', '2020-04-23', 0, 'b1587664842.jpg', 'b', 'b1587664842.pdf', 0),
(34, 15, 'c', '2020-04-23', 0, 'c1587664886.jpg', 'd', 'c1587664886.pdf', 0),
(35, 15, 'banana', '2020-04-23', 0, 'banana1587664923.jpg', 'banana', 'banana1587664923.pdf', 0),
(36, 15, 'hello', '2020-04-23', 0, 'hello1587664954.jpg', 'hello', 'hello1587664954.pdf', 0),
(37, 15, 'f', '2020-04-23', 0, 'default.jpg', 'f', 'f1587665619.pdf', 0),
(38, 15, 'i', '2020-04-23', 0, 'i1587665727.jpg', 'i', 'i1587665727.pdf', 0),
(39, 15, 'test', '2020-04-23', 0, 'default.jpg', 'test', 'test1587665804.pdf', 0),
(40, 19, 'book1', '2020-05-08', 0, 'book11588936181.png', 'libri 1', 'book11588936181.txt', 0),
(41, 19, 'book2', '2020-05-08', 0, 'book21588936203.png', 'liber kot', 'book21588936203.txt', 0),
(42, 19, 'book3', '2020-05-08', 0, 'book31588936231.png', 'liber kot 3', 'book31588936231.txt', 0),
(43, 19, 'book4', '2020-05-08', 0, 'book41588936297.png', 'liber kot 4', 'book41588936297.txt', 0),
(44, 19, 'book5', '2020-05-08', 0, 'book51588936317.png', 'liber kot 5', 'book51588936317.txt', 0),
(45, 19, 'book6', '2020-05-08', 0, 'book61588936338.png', 'liber kot 6', 'book61588936338.txt', 0),
(46, 19, 'book7', '2020-05-08', 0, 'book71588936357.png', 'liber kot 7', 'book71588936357.txt', 0),
(47, 19, 'book8', '2020-05-08', 0, 'book81588936388.png', 'liber kot 8', 'book81588936388.txt', 0),
(48, 19, 'book9', '2020-05-08', 0, 'book91588936419.png', 'liber kot 9\r\n', 'book91588936419.txt', 0),
(49, 19, 'book10', '2020-05-08', 0, 'book101588936437.png', 'liber kot 10', 'book101588936437.txt', 0),
(50, 20, 'book11', '2020-05-08', 0, 'book111588936557.png', 'liber kot 11', 'book111588936557.txt', 0),
(51, 20, 'book12', '2020-05-08', 0, 'book121588936580.png', 'liber kot 12', 'book121588936580.txt', 0),
(52, 20, 'book13', '2020-05-08', 0, 'book131588936607.png', 'liber kot 13', 'book131588936607.txt', 0),
(53, 20, 'book14', '2020-05-08', 0, 'book141588936632.png', 'liber kot 14', 'book141588936632.txt', 0),
(54, 20, 'book15', '2020-05-08', 0, 'book151588936651.png', 'liber kot 15', 'book151588936651.txt', 0),
(55, 20, 'book16', '2020-05-08', 0, 'book161588936669.png', 'liber kot 16', 'book161588936669.txt', 0),
(56, 20, 'book17', '2020-05-08', 0, 'book171588936687.png', 'liber kot 17', 'book171588936687.txt', 0),
(57, 20, 'book18', '2020-05-08', 0, 'book181588936708.png', 'liber kot 18', 'book181588936708.txt', 0),
(58, 20, 'book19', '2020-05-08', 0, 'book191588936728.png', 'liber kot 19', 'book191588936728.txt', 0),
(59, 20, 'book20', '2020-05-08', 0, 'book201588936747.png', 'liber kot 20', 'book201588936747.txt', 0),
(60, 15, 'BookTest', '2020-05-11', 0, 'BookTest1589214304.png', 'liber formati doc', 'BookTest1589214304.docx', 0),
(61, 15, 'book25', '2020-05-18', 0, 'default.jpg', 'test', 'book251589799642.pdf', 0),
(62, 19, 'liber me titull te gjate shume ta shikoj', '2020-05-20', 0, 'book221589978884.jpg', 'hue hui hia', 'book221589978884.pdf', 0),
(63, 19, 'book23', '2020-05-20', 0, 'book231589978920.jpg', 'hue hui hia', 'book231589978920.pdf', 0),
(64, 19, 'book24', '2020-05-20', 0, 'book241589978942.jpg', 'hue hui hia', 'book241589978942.pdf', 0),
(65, 19, 'book25', '2020-05-20', 0, 'book251589978995.jpg', 'hue hui hia', 'book251589978995.pdf', 0),
(66, 19, 'book26', '2020-05-20', 0, 'book261589979028.jpg', 'hue hui hia', 'book261589979028.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publish_house`
--

CREATE TABLE `publish_house` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publish_house`
--

INSERT INTO `publish_house` (`id`, `name`) VALUES
(8, 'Harper Torch/HarperCollins'),
(9, 'W. W. Norton & Company'),
(10, 'Harper Perennial'),
(11, 'TOR Books'),
(12, 'Scholastic Press'),
(13, 'Katherine Tegen Books'),
(14, 'Little Brown'),
(15, 'Grand Central Publishing');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `review_time` date DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `book_type` varchar(30) NOT NULL
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
  `gender` varchar(10) NOT NULL,
  `points` int(11) NOT NULL,
  `user_rights` int(11) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `activationStatus` tinyint(1) NOT NULL,
  `securityString` varchar(40) NOT NULL,
  `recoverPasswordToken` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `mobile`, `password`, `birthday`, `gender`, `points`, `user_rights`, `profile_photo`, `activationStatus`, `securityString`, `recoverPasswordToken`) VALUES
(15, 'Andi', 'elezi', 'andi06121998', 'andielezi52@gmail.com', '+355684934250', '$2y$10$mCQdF6ERPR9K.oeifvG0DOdvXy./72eJgf6pma2BBpQuh74/N.J86', '1998-06-12', 'Male', 3510, 3, 'andi06121998gjfdioykhlsuwrepqta.jpg', 1, 'm3noby6hwfu80icjz2lktevsp71rdag4x5q9', NULL),
(19, 'Ardit', 'Kallaku', 'silence', 'ardit.kallaku@fshnstudent.info', '+355681122334', '$2y$10$9F50q0p7pXOS.VQLkLoU1eXgKuKTfQRiC1I1vVDDZq13YyDpWXHV6', '2020-01-01', 'Male', 1004, 3, 'silenceypaglsjkohfwqetirdu.jpg', 1, '45g28ob1a9wkl03x6njprevqdtficzmhusy7', NULL),
(20, 'Artenc', 'Cerumi', 'techno', 'artenc.cerumi8891@gmail.com', '+35556949250', '$2y$10$AaNUNpkRHb8RoZrDBw9TeOmfiw15Ff3f5DY87ZXHAzzVPjwHMhq1u', '2020-01-01', 'Male', 0, 3, NULL, 1, 'ds4lzngaqpm9e7516i2fcov8rxk30jytuhbw', NULL);

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_author_book`
-- (See below for the actual view)
--
CREATE TABLE `v_author_book` (
`author_Id` int(11)
,`full_name` varchar(50)
,`birthplace` varchar(30)
,`birthday` date
,`contact` varchar(50)
,`ISBN` varchar(30)
,`title` varchar(75)
,`publication_year` date
,`quantity` int(11)
,`price` int(11)
,`reservation_points` int(11)
,`cover_photo` varchar(150)
,`description` varchar(1000)
,`likes` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_book_categories`
-- (See below for the actual view)
--
CREATE TABLE `v_book_categories` (
`ISBN` varchar(30)
,`title` varchar(75)
,`c_description` varchar(50)
,`publication_year` date
,`publish_house` int(11)
,`quantity` int(11)
,`price` int(11)
,`reservation_points` int(11)
,`cover_photo` varchar(150)
,`description` varchar(1000)
,`likes` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_online_books_categories`
-- (See below for the actual view)
--
CREATE TABLE `v_online_books_categories` (
`id` int(11)
,`user_id` int(11)
,`title` varchar(75)
,`c_description` varchar(50)
,`publish_date` date
,`likes` int(11)
,`cover_photo` varchar(150)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_publish_house_book`
-- (See below for the actual view)
--
CREATE TABLE `v_publish_house_book` (
`ISBN` varchar(30)
,`title` varchar(75)
,`cover_photo` varchar(150)
,`name` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_online_books`
-- (See below for the actual view)
--
CREATE TABLE `v_user_online_books` (
`user_id` int(11)
,`name` varchar(30)
,`surname` varchar(30)
,`username` varchar(30)
,`email` varchar(40)
,`mobile` varchar(15)
,`birthday` date
,`gender` varchar(10)
,`points` int(11)
,`user_rights` int(11)
,`profile_photo` varchar(100)
,`book_id` int(11)
,`title` varchar(75)
,`publish_date` date
,`likes` int(11)
,`cover_photo` varchar(150)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `v_author_book`
--
DROP TABLE IF EXISTS `v_author_book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_author_book`  AS  select `author`.`id` AS `author_Id`,`author`.`full_name` AS `full_name`,`author`.`birthplace` AS `birthplace`,`author`.`birthday` AS `birthday`,`author`.`contact` AS `contact`,`book`.`ISBN` AS `ISBN`,`book`.`title` AS `title`,`book`.`publication_year` AS `publication_year`,`book`.`quantity` AS `quantity`,`book`.`price` AS `price`,`book`.`reservation_points` AS `reservation_points`,`book`.`cover_photo` AS `cover_photo`,`book`.`description` AS `description`,`book`.`likes` AS `likes` from ((`author` join `book_author` on(`author`.`id` = `book_author`.`author_id`)) join `book` on(`book`.`ISBN` = `book_author`.`book_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_book_categories`
--
DROP TABLE IF EXISTS `v_book_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_book_categories`  AS  select `b`.`ISBN` AS `ISBN`,`b`.`title` AS `title`,`c`.`description` AS `c_description`,`b`.`publication_year` AS `publication_year`,`b`.`publish_house` AS `publish_house`,`b`.`quantity` AS `quantity`,`b`.`price` AS `price`,`b`.`reservation_points` AS `reservation_points`,`b`.`cover_photo` AS `cover_photo`,`b`.`description` AS `description`,`b`.`likes` AS `likes` from ((`categories` `c` join `book_categories` `bc` on(`c`.`id` = `bc`.`category_id`)) join `book` `b` on(`b`.`ISBN` = `bc`.`book_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_online_books_categories`
--
DROP TABLE IF EXISTS `v_online_books_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_online_books_categories`  AS  select `ob`.`id` AS `id`,`ob`.`user_id` AS `user_id`,`ob`.`title` AS `title`,`c`.`description` AS `c_description`,`ob`.`publish_date` AS `publish_date`,`ob`.`likes` AS `likes`,`ob`.`cover_photo` AS `cover_photo`,`ob`.`description` AS `description` from ((`categories` `c` join `book_online_categories` `boc` on(`c`.`id` = `boc`.`category_id`)) join `online_books` `ob` on(`ob`.`id` = `boc`.`book_online_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_publish_house_book`
--
DROP TABLE IF EXISTS `v_publish_house_book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_publish_house_book`  AS  select `book`.`ISBN` AS `ISBN`,`book`.`title` AS `title`,`book`.`cover_photo` AS `cover_photo`,`publish_house`.`name` AS `name` from (`book` join `publish_house` on(`book`.`publish_house` = `publish_house`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_online_books`
--
DROP TABLE IF EXISTS `v_user_online_books`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_online_books`  AS  select `users`.`id` AS `user_id`,`users`.`name` AS `name`,`users`.`surname` AS `surname`,`users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`mobile` AS `mobile`,`users`.`birthday` AS `birthday`,`users`.`gender` AS `gender`,`users`.`points` AS `points`,`users`.`user_rights` AS `user_rights`,`users`.`profile_photo` AS `profile_photo`,`online_books`.`id` AS `book_id`,`online_books`.`title` AS `title`,`online_books`.`publish_date` AS `publish_date`,`online_books`.`likes` AS `likes`,`online_books`.`cover_photo` AS `cover_photo`,`online_books`.`description` AS `description` from (`users` join `online_books` on(`users`.`id` = `online_books`.`user_id`)) ;

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
-- Indexes for table `book_favourite`
--
ALTER TABLE `book_favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_like`
--
ALTER TABLE `book_like`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hall_structure`
--
ALTER TABLE `hall_structure`
  ADD PRIMARY KEY (`structure_id`),
  ADD KEY `fk_library_hall_structure` (`library_hall`);

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
  ADD KEY `fk_user_on_id` (`user_id`);

--
-- Indexes for table `publish_house`
--
ALTER TABLE `publish_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_review_id` (`user_id`),
  ADD KEY `fk_book_review_id` (`book_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `book_favourite`
--
ALTER TABLE `book_favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `book_like`
--
ALTER TABLE `book_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hall_structure`
--
ALTER TABLE `hall_structure`
  MODIFY `structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library_halls`
--
ALTER TABLE `library_halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_books`
--
ALTER TABLE `online_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `publish_house`
--
ALTER TABLE `publish_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `fk_book_ISBN` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hall_structure`
--
ALTER TABLE `hall_structure`
  ADD CONSTRAINT `fk_library_hall_structure` FOREIGN KEY (`library_hall`) REFERENCES `library_halls` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `online_books`
--
ALTER TABLE `online_books`
  ADD CONSTRAINT `fk_user_online_book` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `free_seats` ON SCHEDULE EVERY 1 MINUTE STARTS '2020-05-17 22:20:15' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM hall_booking WHERE reservation_end_time<CURRENT_TIMESTAMP$$

CREATE DEFINER=`root`@`localhost` EVENT `freeBookReservation` ON SCHEDULE EVERY 1 DAY STARTS '2020-05-18 22:20:10' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		UPDATE book SET quantity=quantity+1 WHERE ISBN IN (SELECT book_id FROM book_reservation WHERE reservation_time<CURRENT_DATE AND taken=0);
		DELETE FROM book_reservation WHERE reservation_time <CURRENT_DATE AND taken=0;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
