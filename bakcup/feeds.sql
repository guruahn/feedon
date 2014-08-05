-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-07-28 06:15
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
-- 테이블 구조 `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `providerId` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `regDate` datetime NOT NULL,
  `pubDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='피드 목록' AUTO_INCREMENT=121 ;

--
-- 테이블의 덤프 데이터 `feeds`
--

INSERT INTO `feeds` (`id`, `providerId`, `title`, `url`, `description`, `regDate`, `pubDate`) VALUES
(90, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(89, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(88, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(87, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(86, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(85, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(84, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(80, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(81, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(82, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(83, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(69, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(70, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(71, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(72, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(73, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(74, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(75, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(76, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(77, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(78, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(61, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(79, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(67, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(68, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(120, 5, 'Backend link color changed', 'http://www.sitepoint.com/forums/showthread.php?1218897-Backend-link-color-changed&goto=newpost', 'Hey all, I''ve been dealing with this for months now and i;m tired of it. \nSomewhere along the way (i have no idea how) the link color changed - in the backend of my wordpress install. \nI''ve tried changing the user color scheme, ive also tried reinstalling all wordpress core files. \nI''ve tried using...', '2014-07-25 11:16:42', '2014-07-24 17:14:11'),
(66, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(65, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(118, 5, 'Spell Check', 'http://www.sitepoint.com/forums/showthread.php?1218899-Spell-Check&goto=newpost', 'Hi all,  \nHope this is the right sub-forum for this.  \n \nI''m looking for the best spell check (preferably Chrome plug-in) for the *reading level*, as opposed to writing. Because we have many sites and many people working on adding content, it would be nice to be able to click on a spell-check...', '2014-07-25 11:16:42', '2014-07-24 17:33:28'),
(119, 5, 'Needing help with Positioning', 'http://www.sitepoint.com/forums/showthread.php?1218898-Needing-help-with-Positioning&goto=newpost', 'Hello, so I currently have this:  http://prntscr.com/45w458 \n \nAnd I want this:  http://prntscr.com/45w4b9 \n \nCan you please help me with positioning the links and also making the text on "union" more spread out? \n \nThis is my code(HTML): \n \nCode: \n---------', '2014-07-25 11:16:42', '2014-07-24 17:32:23'),
(64, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(115, 5, 'Creating a Dynamic Interactive Quiz with Timer and Hints', 'http://www.sitepoint.com/forums/showthread.php?1218927-Creating-a-Dynamic-Interactive-Quiz-with-Timer-and-Hints&goto=newpost', 'Hello! My experience in JavaScript & Jquery is mostly editing code and adding a few lines to make it do what I want. But now, I want to create a quiz like this one, which was created in flash, with javascript (or any other tool that you can recommend) so that it''s viewable across all devices -->...', '2014-07-25 11:16:42', '2014-07-24 23:59:52'),
(116, 5, 'custom font much smaller than others "Ventilla Script" how to make it bigger', 'http://www.sitepoint.com/forums/showthread.php?1218926-custom-font-much-smaller-than-others-quot-Ventilla-Script-quot-how-to-make-it-bigger&goto=newpost', 'I have been asked to use a font called Ventilla Script for the heading text of a website, \n \nI used the normal @font-face css rule to import the .tff file and this font appears to be about 3x smaller than the default font, this means I need to wind the font size up to a little over 100px to get the...', '2014-07-25 11:16:42', '2014-07-24 22:10:25'),
(117, 5, 'Something has stuck in the "WP memory"', 'http://www.sitepoint.com/forums/showthread.php?1218913-Something-has-stuck-in-the-quot-WP-memory-quot&goto=newpost', 'I noticed this issue on 2 WP blogs on diff domains: \n \n \n1. Once I made a SEO title (in the All in One SEO Pack plugin) below the article in WP; the title had 19 characters. Later I deleted that seo title and I copy-pasted a new one, which I had prepared in some other blog, and which had 60...', '2014-07-25 11:16:42', '2014-07-24 19:43:40'),
(62, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(63, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 11:46:47', '2014-07-25 10:14:33'),
(113, 5, 'Splitting design and development into 2 sections.', 'http://www.sitepoint.com/forums/showthread.php?1218933-Splitting-design-and-development-into-2-sections&goto=newpost', 'Hi \nI am developing a website and have made several mock ups. I plan on hiring a designer first to do the layout (javascript, jsp, ajax etc. ) and developer after the design of the website is completed, so they can see the code and what needs to go where.  \nOr is it better for 1 person to do the...', '2014-07-25 11:16:42', '2014-07-25 02:00:29'),
(114, 5, 'Image Gallery With Title, Descriptions', 'http://www.sitepoint.com/forums/showthread.php?1218928-Image-Gallery-With-Title-Descriptions&goto=newpost', 'Hi all! I''m brand new here. \nMy company provided a mockup to a client and we had a designer design his concept of the gallery image popup. Stupid me, I should have researched gallery software and had him include a screenshot of it. \n \nIt''s a modal-style popup that overlays the page when you click a...', '2014-07-25 11:16:42', '2014-07-25 00:14:59'),
(91, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-22 15:58:58', '2014-07-25 10:14:33'),
(92, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(93, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(94, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(95, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(112, 5, 'Increase column width of linear menu', 'http://www.sitepoint.com/forums/showthread.php?1218934-Increase-column-width-of-linear-menu&goto=newpost', 'Hi \nI am trying to have a linear css drop down menu on my site and found the following suitable \n \nhttp://telugugreetings.net/mymenu3.html \n \nI am not able to  increase the column width of main menu items Products,test5 etc without overlap on each other. \n   \nPlease help me', '2014-07-25 11:16:42', '2014-07-25 04:12:25'),
(96, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(97, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(98, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(111, 5, 'Introducing user selectable timezones to existing high-traffic web app?', 'http://www.sitepoint.com/forums/showthread.php?1218935-Introducing-user-selectable-timezones-to-existing-high-traffic-web-app&goto=newpost', 'Long story short, we developed a web app for internal use and one thing led to another and now it''s a SaaS with over 1,000 users. Problem is that everything date-related (which is a lot!) is hard-coded to Pacific time and users obviously want to select their own timezones. \n \nI''ve read up on the...', '2014-07-25 11:16:42', '2014-07-25 05:25:30'),
(99, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(100, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(110, 5, 'Is this a namespace infront of the colon?', 'http://www.sitepoint.com/forums/showthread.php?1218936-Is-this-a-namespace-infront-of-the-colon&goto=newpost', 'Is this a namespace infront of the colon? I''ve seen this a couple of times. Is this tie to xml in anyway? \n[code=es:0] \necmascript:void setInterval(function() {scrollBy(0,10)}, 200); \n[/code]', '2014-07-25 11:16:42', '2014-07-25 05:57:28'),
(101, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(102, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(109, 5, 'Undefined index when using Zero', 'http://www.sitepoint.com/forums/showthread.php?1218937-Undefined-index-when-using-Zero&goto=newpost', 'I am trying to get information from a database row/column. One of the fields contains the integer 0. Alternatively, it can contain 1. (0 for false, 1 for true). When I try to check this in php using the usual $row[''value''] I receive an undefined index notice. I have checked and I am definitely...', '2014-07-25 11:16:42', '2014-07-25 06:06:49'),
(103, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(104, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(108, 5, 'SEO using Scrapbox', 'http://www.sitepoint.com/forums/showthread.php?1218941-SEO-using-Scrapbox&goto=newpost', 'We all know, Google is being smart day by day. Still many people using automated tools to do SEO. \nIn my opinion, we should do manual SEO only, automated tools may *SPAM* the site. \n \nWhat is your opinion? Also I am interested to know about Scrapbox tool.... Because one of my project has been...', '2014-07-25 11:16:42', '2014-07-25 07:46:53'),
(105, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(106, 5, 'Hello everybody!', 'http://www.sitepoint.com/forums/showthread.php?1218959-Hello-everybody!&goto=newpost', 'Hello everyone! \nI am Cecilia, a new mumber here, hope we can share our life, work or any happy thing together!', '2014-07-25 11:03:53', '2014-07-25 10:14:33'),
(107, 5, 'pen drive', 'http://www.sitepoint.com/forums/showthread.php?1218948-pen-drive&goto=newpost', 'i have store lots of data inside my pen drive and its not opening, instead showing me to format the drive. But i wont do it my data will be loss after formatting it. so how to open the pendrive without formatting i want my all data,,,,kindly suggest.', '2014-07-25 11:16:42', '2014-07-25 09:19:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
