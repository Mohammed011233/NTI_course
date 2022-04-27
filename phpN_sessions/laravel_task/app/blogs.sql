-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2022 at 01:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_table`
--

DROP TABLE IF EXISTS `auth_table`;
CREATE TABLE IF NOT EXISTS `auth_table` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `email` char(80) NOT NULL,
  `password` char(60) NOT NULL,
  `image` char(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_table`
--

INSERT INTO `auth_table` (`id`, `name`, `email`, `password`, `image`, `updated_at`, `created_at`, `remember_token`) VALUES
(27, 'mohamed', 'mohammedalinossir011233@gmail.com', '$2y$10$fwbjFO6oIxW54o6T8mBIy.efVgMHVuEpaf99yQ83qb7dPhVvDVmBG', '6268734ce5e72.jpg', '2022-04-26 20:33:49', '2022-04-26 20:33:49', ''),
(29, 'mohamed', 'mohamed@gmail.com', '$2y$10$bw7y.6OCFMY58HjHgUDqbecaVOhOrh1MJvgbuX18oj6TMBumSD2AS', '62689611c36f9.jpg', '2022-04-26 23:02:09', '2022-04-26 23:02:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_data`
--

DROP TABLE IF EXISTS `blog_data`;
CREATE TABLE IF NOT EXISTS `blog_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_data`
--

INSERT INTO `blog_data` (`id`, `title`, `content`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Aidan Crane', 'Ex dolor et accusamuEx dolor et accusamuEx dolor et accusamuEx dolor et accusamuEx dolor et accusamuEx dolor et accusamuEx dolor et accusamu', '2022-04-26 12:34:48', '2022-04-26 12:34:48', 'C:\\wamp64\\tmp\\php46A7.tmp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
