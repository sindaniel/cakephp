-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2016 at 12:50 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `text_es` text NOT NULL,
  `text_en` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `text_es`, `text_en`) VALUES
(1, 'Prueba', 'Prueba es', 'Prueba en'),
(2, 'Prueba 2', 'Prueba 2', 'Prueba 2'),
(3, 'Prueba', 'Prueba', 'Prueba'),
(4, 'Prueba', 'Prueba', 'Prueba'),
(5, 'Prueba 2', 'Prueba 2', 'Prueba 2'),
(6, 'Prueba', 'Prueba', 'Prueba'),
(7, 'Prueba 2', 'Prueba 2', 'Prueba 2'),
(8, 'Nombre ', 't2', '');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE IF NOT EXISTS `seos` (
`id` int(11) NOT NULL,
  `section` varchar(300) NOT NULL,
  `meta_title_es` varchar(300) NOT NULL,
  `meta_title_en` varchar(300) NOT NULL,
  `meta_description_es` varchar(300) NOT NULL,
  `meta_description_en` varchar(300) NOT NULL,
  `meta_keywords_es` varchar(300) NOT NULL,
  `meta_keywords_en` varchar(300) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `section`, `meta_title_es`, `meta_title_en`, `meta_description_es`, `meta_description_en`, `meta_keywords_es`, `meta_keywords_en`, `picture`) VALUES
(1, 'home', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(300) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Santiago', 'admin', '8665dedf24c124090cb3fea4f348d4ae4044464d', 'srestrepo@webcreativa.com.co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
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
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
