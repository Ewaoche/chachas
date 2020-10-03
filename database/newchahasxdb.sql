-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 04:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newchahasxdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `char_pages`
--

CREATE TABLE `char_pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `menutitle` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `contents` text DEFAULT NULL,
  `content_text` text DEFAULT NULL,
  `isnews` tinyint(11) NOT NULL DEFAULT 0,
  `page_photo` varchar(300) NOT NULL DEFAULT '/templates/assets/images/',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_pages`
--

INSERT INTO `char_pages` (`id`, `slug`, `menutitle`, `sort`, `contents`, `content_text`, `isnews`, `page_photo`, `created`) VALUES
(1, 'about-us', 'ABOUT US', 0, 'About Charchas', 'At CHACHAS BUY4ME  Logis\'cs, we are dedicated to bringing shoppers in Nigeria the *nest products from leading online stores from the UK and USA. We source fashion, toys, computers, kitchen items, and home electronics on your behalf and deliver them quickly and securely to you any where in Nigeria.\r\n\r\n', 0, './templates/assets/images/products/1.jpeg', '2020-06-17 16:10:21'),
(2, 'how-It-works', 'HOW IT WORKS', 0, 'How it Works Here', '', 0, './templates/assets/images/products/1.jpeg', '2020-06-17 16:10:21'),
(3, 'faqs', 'FAQS', 0, 'Frequently Asked Questions', '', 0, './templates/assets/images/products/1.jpeg', '2020-06-17 16:10:21'),
(4, 'contact-us', 'CONTACT US', 0, 'Contact Us', 'Adress: North Fourth Avenue, No. 11, Trans-Ekulu, Enugu, Enugu State, Nigeria.<br>\r\n\r\nPhone: +124836854068<br>\r\nEmail: buyme@chachasglobal.com<br>\r\n\r\nWebsite: www.chachasglobal.com<br>', 0, './templates/assets/images/products/1.jpeg', '2020-06-17 16:10:21'),
(6, 'news-&-blog', 'NEWS', 0, 'Sustainable Construction', 'Sustainable Construction', 1, '/templates/assets/images/', '2020-06-17 16:13:36'),
(7, 'news-&-blog', 'NEWS', 0, 'Industrial Coatings', 'Industrial Coatings', 1, '/templates/assets/images/', '2020-06-17 16:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `char_siteinfo`
--

CREATE TABLE `char_siteinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `type` enum('text','textarea') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_siteinfo`
--

INSERT INTO `char_siteinfo` (`id`, `name`, `value`, `type`) VALUES
(5, 'username', 'admin', 'text'),
(6, 'password', 'admin', 'text'),
(7, 'mobile', '8068258134', 'text'),
(8, 'header_delivery', 'chika', 'text'),
(9, 'email', 'radicemmy@gmail.com', 'text'),
(10, 'website', 'chachas.com', 'text'),
(11, 'address', 'NO: 2 idodo Street', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `char_slide`
--

CREATE TABLE `char_slide` (
  `id` int(11) NOT NULL,
  `top_title` varchar(100) DEFAULT NULL,
  `main_title` varchar(100) DEFAULT NULL,
  `buttom_text` varchar(200) DEFAULT NULL,
  `buttom_quote` varchar(200) DEFAULT NULL,
  `slide` varchar(200) NOT NULL DEFAULT '''./_store/sliders/photos/'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_slide`
--

INSERT INTO `char_slide` (`id`, `top_title`, `main_title`, `buttom_text`, `buttom_quote`, `slide`) VALUES
(1, 'BUY FOR ME', 'CONCISE SERVICES ARE WHAT WE OFFER', '\r\nWe are the best people you can find the market and the field\r\nWe are the best people you can find the market and the field', 'Request a Quote', './_store/sliders/photos/slider1.jpg'),
(2, 'BUY FOR ME', 'CONCISE SERVICES ARE WHAT WE OFFER', '\r\nWe are the best people you can find the market and the field\r\nWe are the best people you can find the market and the field', 'Request a Quote', './_store/sliders/photos/slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `char_social`
--

CREATE TABLE `char_social` (
  `id` int(11) NOT NULL,
  `social_icon` varchar(20) DEFAULT NULL,
  `social_link` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_social`
--

INSERT INTO `char_social` (`id`, `social_icon`, `social_link`) VALUES
(1, 'facebook', '#'),
(2, 'twitter', '#'),
(3, 'google-plus', '#'),
(4, 'linkedin', '#'),
(5, 'skype', '#'),
(6, 'youtube', '#'),
(7, 'instagram', '#'),
(8, 'pinterest', '#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `char_pages`
--
ALTER TABLE `char_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `char_siteinfo`
--
ALTER TABLE `char_siteinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `char_slide`
--
ALTER TABLE `char_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `char_social`
--
ALTER TABLE `char_social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `char_pages`
--
ALTER TABLE `char_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `char_siteinfo`
--
ALTER TABLE `char_siteinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `char_slide`
--
ALTER TABLE `char_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `char_social`
--
ALTER TABLE `char_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
