-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2023 at 09:07 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shobanazam`
--

-- --------------------------------------------------------

--
-- Table structure for table `benazmi`
--

DROP TABLE IF EXISTS `benazmi`;
CREATE TABLE IF NOT EXISTS `benazmi` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sid` int(50) NOT NULL,
  `btid` int(50) NOT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benazmi`
--

INSERT INTO `benazmi` (`id`, `sid`, `btid`, `detail`, `date`) VALUES
(186, 278, 132, 's sc zc', '2023-10-05'),
(185, 278, 131, 'sc cSDS ', '2023-10-12'),
(184, 278, 130, 'scfzxzcsdz', '2023-10-26'),
(183, 272, 129, 'szdcXZc', '2023-10-20'),
(182, 302, 128, 'scxzcsd', '2023-10-06'),
(180, 287, 126, 'szSd', '2023-10-18'),
(178, 298, 124, 'sadfs', '2023-10-10'),
(179, 275, 125, 'sfxzdcs', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `btype`
--

DROP TABLE IF EXISTS `btype`;
CREATE TABLE IF NOT EXISTS `btype` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `btype`
--

INSERT INTO `btype` (`id`, `name`) VALUES
(132, 'zxc s'),
(131, 'xzcxzc'),
(130, 'xzcxzdc'),
(129, 'cszczx'),
(128, 'sfszcf'),
(126, 'szcsd'),
(124, 'کلاس'),
(125, 'نماز');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=305 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `fathername`, `code`, `class`) VALUES
(270, 'کونین عباس', 'علی مدد', '21-04', 'متوسطہ ثانیہ'),
(269, 'میثم عباس', 'عباس علی', '21-28', 'متوسطہ ثانیہ'),
(268, 'مہدی حسن جوتل (ششم)', 'الف شاہ', '23-108', 'متوسطہ اولیٰ'),
(267, 'حسین مہدی', 'محمد ظہیر', '23-107', 'متوسطہ اولیٰ'),
(266, 'محمد محمدی', 'محمد عیسیٰ', '22-80', 'متوسطہ اولیٰ'),
(265, 'شاکر حسین', 'ذاکر', '22-87', 'متوسطہ اولیٰ'),
(264, 'حسنین عباس جنتی', 'محمد علی', '22-90', 'متوسطہ اولیٰ'),
(263, 'اقبال حسین', 'فدا حسین', '22-82', 'متوسطہ اولیٰ'),
(262, 'رمیث علی', 'ناصر علی', '22-77', 'متوسطہ اولیٰ'),
(261, 'علی عباس کربلائی', 'رستم علی', '21-38', 'متوسطہ اولیٰ'),
(259, 'محمد مہدی رسولی', 'محمد حسین', '22-85', 'متوسطہ اولیٰ'),
(260, 'مہدی حسن جوتل (پنجم)', 'فقیر شاہ', '23-96', 'متوسطہ اولیٰ'),
(258, 'ظفر عباس', 'محمد ابراہیم', '22-89', 'متوسطہ اولیٰ'),
(271, 'مدبر حیات', 'امیر حیات', '21-39', 'متوسطہ ثانیہ'),
(272, 'یاداش حسین', 'محمد ابراہیم', '21-07', 'متوسطہ اولیٰ'),
(273, 'ضمیر عباس', 'ابراہیم شاہ', '21-63', 'متوسطہ ثانیہ'),
(274, 'مصطفیٰ کمال', 'یوسف علی', '22-88', 'متوسطہ اولیٰ'),
(275, 'محمد مہدی بسیجی', 'فدا حسین', '21-41', 'متوسطہ ثانیہ'),
(276, 'راحت حسین', 'مہربان علی', '21-66', 'متوسطہ اولیٰ'),
(277, 'کمیل عباس گلگتی', 'ذاہد علی', '21-48', 'متوسطہ ثانیہ'),
(278, 'شبر حسین', 'شبیر حسین', '21-02', 'متوسطہ اولیٰ'),
(279, 'منتظر عباس منتظری', 'شاہ باز علی', '21-56', 'متوسطہ ثانیہ'),
(280, 'علی عباس نگری', 'غلام عباس', '21-61', 'عامہ اولیٰ'),
(281, 'محمد ابرار', 'موسیٰ علی', '21-60', 'عامہ ثانیہ'),
(282, 'تنویر عباس', 'ابراہیم شاہ', '21-64', 'عامہ اولیٰ'),
(283, 'حسین احمد', 'ربیب الحسن', '22-73', 'متوسطہ ثانیہ'),
(284, 'مہدی حسن امتی', 'الیاس حسین', '22-91', 'متوسطہ اولیٰ'),
(285, 'حسنین نلتر', 'فروز', '23-98', 'متوسطہ اولیٰ'),
(286, 'علیان ', 'فروز', '23-97', 'متوسطہ اولیٰ'),
(287, 'محمد شعیب شمشیری', 'محمد شفاء شمشیری', '23-100', 'متوسطہ اولیٰ'),
(288, 'کاظم حسین', 'فرمان علی', '23-101', 'متوسطہ اولیٰ'),
(289, 'فہیم عباس', 'محمد عبداللہ', '22-71', 'متوسطہ ثانیہ'),
(290, 'قمر عباس', 'شکیل احمد', '22-70', 'عامہ ثانیہ'),
(291, 'عابس علی', 'ناصر علی', '21-50', 'عامہ ثانیہ'),
(292, 'علی ثقلین', 'الطاف حسین', '21-57', 'عامہ ثانیہ'),
(293, 'رہبر حسین', 'شبیر حسین', '21-01', 'عامہ ثانیہ'),
(294, 'کمیل عباس نگری', 'غلام مصطفیٰ', '22-79', 'متوسطہ ثانیہ'),
(295, 'محمد ریاض', 'محمد ابراہیم', '21-22', 'عامہ اولیٰ'),
(296, 'ناطق حسین', 'ربیب الحسن', '22-72', 'متوسطہ ثانیہ'),
(297, 'محمد اسرار', 'موسیٰ علی', '21-58', 'عامہ اولیٰ'),
(298, 'علی عباس (غلمت)', 'محمد شآمی', '23-102', 'متوسطہ اولیٰ'),
(299, 'علی زین', 'محمد حسین', '23-103', 'متوسطہ اولیٰ'),
(300, 'حسنین عباس سکندری', 'محمد حسین', '23-104', 'متوسطہ اولیٰ'),
(301, 'عاطف حسین', 'شکور علی', '23-105', 'متوسطہ اولیٰ'),
(302, 'محمد عرفان', 'شکور علی', '23-106', 'متوسطہ اولیٰ'),
(303, 'عدیل عباس', 'عباد اللہ', '23-109', 'متوسطہ اولیٰ'),
(304, 'راشد علی', 'شفاء علی', '22-95', 'متوسطہ ثانیہ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(5, 'nazamreport', 'nazrep123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
