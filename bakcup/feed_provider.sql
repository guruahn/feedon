-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-07-28 06:16
-- 서버 버전: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tendencydev`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `feed_provider`
--

CREATE TABLE IF NOT EXISTS `feed_provider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='피드 제공자 정보' AUTO_INCREMENT=6 ;

--
-- 테이블의 덤프 데이터 `feed_provider`
--

INSERT INTO `feed_provider` (`id`, `name`, `url`) VALUES
(1, 'gongjam''s tumblr', 'http://gongjam.tumblr.com/rss'),
(2, '녹차프린스', 'http://kmoonki.tistory.com/rss'),
(4, 'SitePoint Forums', 'http://www.sitepoint.com/forums/external.php?type=RSS2'),
(5, 'SitePoint Forums', 'http://www.sitepoint.com/forums/external.php?type=RSS2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
