-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 07:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_pv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_account`
--

CREATE TABLE `tbl_account_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `account_code` varchar(200) DEFAULT NULL,
  `account_username` varchar(500) NOT NULL,
  `account_password` varchar(500) NOT NULL,
  `account_fullname` varchar(500) NOT NULL,
  `account_email` varchar(500) NOT NULL,
  `account_phone` varchar(20) NOT NULL,
  `account_status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account_account`
--

INSERT INTO `tbl_account_account` (`id`, `id_type`, `account_code`, `account_username`, `account_password`, `account_fullname`, `account_email`, `account_phone`, `account_status`) VALUES
(1, 1, NULL, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fefefe', 'jn@gmail.com', '093333333', 'Y'),
(2, 1, NULL, 'adminn_2', 'e10adc3949ba59abbe56e057f20f883e', 'fefefe', 'jffffn@gmail.com', '093333333', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_authorize`
--

CREATE TABLE `tbl_account_authorize` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL,
  `grant_permission` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account_authorize`
--

INSERT INTO `tbl_account_authorize` (`id`, `id_admin`, `grant_permission`) VALUES
(504, 1, 1),
(505, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_permission`
--

CREATE TABLE `tbl_account_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission` varchar(500) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account_permission`
--

INSERT INTO `tbl_account_permission` (`id`, `permission`, `description`) VALUES
(1, 'module_customer', 'Quản lý khách hàng'),
(2, 'module_blog', 'Quản lý bài viết');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_type`
--

CREATE TABLE `tbl_account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_account` varchar(500) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account_type`
--

INSERT INTO `tbl_account_type` (`id`, `type_account`, `description`) VALUES
(1, 'admin', 'Quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_blog`
--

CREATE TABLE `tbl_blog_blog` (
  `id` int(11) NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(200) NOT NULL,
  `content_short` varchar(500) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog_blog`
--

INSERT INTO `tbl_blog_blog` (`id`, `id_customer`, `title`, `content_short`, `icon`, `content`, `created`, `updated`, `status`) VALUES
(23, 13, 'WP STAGING PRO – CLONE VÀ STAGING WEBSITE WORDPRESS ĐƠN GIẢN NHẤT', '(Liverpool - MU, vòng 26 Ngoại hạng Anh) Đây sẽ được nhớ đến là một trong những màn hủy diệt nổi tiếng nhất trong lịch sử đối đầu Liverpool - MU.', 'images/blog/156614076.png', '<p><img alt=\"\" src=\"http://127.0.0.1:8000/ckfinder/userfiles/images/blog-page1.png\" style=\"height:755px; width:1076px\" />fefefefe</p>', '2023-04-28', '2023-04-28 14:13:29', '1'),
(24, 13, 'Cao vân A hát', '(Liverpool - MU, vòng 26 Ngoại hạng Anh) Đây sẽ được nhớ đến là một trong những màn hủy diệt nổi tiếng nhất trong lịch sử đối đầu Liverpool - MU.', 'images/blog/1840699277.png', '', '2023-04-28', '2023-04-28 21:13:04', '1'),
(25, 0, 'lalalala', 'khkhkKKK', 'images/blog/992086725.png', '<p><img alt=\"\" src=\"http://127.0.0.1:8000/ckfinder/userfiles/images/product3-345x350.jpg\" style=\"height:350px; width:345px\" />xxxcfecdecvec</p>\r\n\r\n<p>cscscsc</p>\r\n\r\n<p>scscscs</p>\r\n\r\n<p>scscsc</p>\r\n\r\n<p>&nbsp;</p>', '2023-04-29', '2023-04-29 00:10:15', '1'),
(26, 13, 'fefefef', 'êfefefef', 'images/blog/1960936308.png', '<p>fefefefefe<img alt=\"\" src=\"http://127.0.0.1:8000/ckfinder/userfiles/images/product3-345x350.jpg\" style=\"height:350px; width:345px\" />fefefefefefefe</p>\r\n\r\n<p>fefefe</p>\r\n\r\n<p>fefefefe</p>', '2023-04-29', '2023-04-29 00:12:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_rate`
--

CREATE TABLE `tbl_blog_rate` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) UNSIGNED NOT NULL,
  `id_blog` int(11) UNSIGNED NOT NULL,
  `rate_star` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog_rate`
--

INSERT INTO `tbl_blog_rate` (`id`, `id_customer`, `id_blog`, `rate_star`, `comment`, `created`, `status`) VALUES
(19, 13, 23, '3', 'fefefe', '2023-03-07 00:42:11', '1'),
(20, 15, 23, '3', 'đw', '2023-03-07 00:43:00', '1'),
(23, 13, 23, '4', 'dshgdfhdhd', '2023-04-28 23:25:36', '1'),
(24, 19, 23, '3', 'nam', '2023-04-28 23:31:33', '1'),
(25, 13, 23, '3', 'htththththt', '2023-04-28 23:32:03', '1'),
(26, 13, 24, '4', 'fefefefefe', '2023-04-28 23:40:14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_customer`
--

CREATE TABLE `tbl_customer_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_code` varchar(10) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `customer_password` varchar(500) NOT NULL,
  `customer_fullname` varchar(500) DEFAULT NULL,
  `customer_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_disable` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Hoat dong tai khoan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_customer`
--

INSERT INTO `tbl_customer_customer` (`id`, `customer_code`, `customer_phone`, `customer_password`, `customer_fullname`, `customer_registered`, `customer_disable`) VALUES
(13, 'KH538751', '0336819000', 'e10adc3949ba59abbe56e057f20f883e', 'Test Test2', '2023-03-11 19:45:51', 'N'),
(15, 'KH597262', '0123455649', 'e10adc3949ba59abbe56e057f20f883e', 'khanhhh', '2023-04-27 19:07:42', 'N'),
(17, 'KH597262', '0123456749', 'e10adc3949ba59abbe56e057f20f883e', 'khanhhh', '2023-04-27 19:07:42', 'N'),
(18, 'KH624319', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', 'congan', '2023-04-28 02:38:39', 'N'),
(19, 'KH698329', '0336956262', 'e10adc3949ba59abbe56e057f20f883e', 'Nam Le', '2023-04-28 23:12:09', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_account`
--
ALTER TABLE `tbl_account_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_authorize`
--
ALTER TABLE `tbl_account_authorize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_permission`
--
ALTER TABLE `tbl_account_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_blog`
--
ALTER TABLE `tbl_blog_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_rate`
--
ALTER TABLE `tbl_blog_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_customer`
--
ALTER TABLE `tbl_customer_customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_account`
--
ALTER TABLE `tbl_account_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_account_authorize`
--
ALTER TABLE `tbl_account_authorize`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `tbl_account_permission`
--
ALTER TABLE `tbl_account_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog_blog`
--
ALTER TABLE `tbl_blog_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_blog_rate`
--
ALTER TABLE `tbl_blog_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_customer_customer`
--
ALTER TABLE `tbl_customer_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
