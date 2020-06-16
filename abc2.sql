-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 08:58 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `Email_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Adm_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` tinyint(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `Email_id`, `Password`, `Adm_name`, `active`, `area`, `city`, `birthdate`, `gender`, `register_date`) VALUES
(12, 'vishalsahoo45@gmail.com', '$2y$10$Lm2Q4Yb1eJ0ibkMgLR0uxeQHr8rG.obBm01JehpeddBu9rq.eEr6y', 'Admin Ambawadi', 'yes', 'Ambawadi', 'Ahmedabad', '1999-06-01', 0, '2020-05-05 06:58:00'),
(13, 'vishalsahoo161999@gmail.com', '$2y$10$ktZp9rAd/7NOPKskLm67IOh9dcTX1/2qAxHvPAUB2FGerafFRspfi', 'Admin Anandnagar', 'yes', 'Anandnagar', 'Ahmedabad', '1999-06-01', 0, '2020-05-05 06:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `A_id` int(11) NOT NULL,
  `A_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`A_id`, `A_name`) VALUES
(1, 'Ambawadi'),
(2, 'Anandnagar'),
(3, 'Asarwa'),
(4, 'Ashram Road'),
(5, 'Bapunagar'),
(6, 'Bhadaj'),
(8, 'Bodakdev'),
(9, 'Bopal'),
(10, 'C G Road'),
(11, 'Chandkheda'),
(12, 'Dariapur'),
(13, 'Ellisbridge'),
(14, 'Ghatlodia'),
(15, 'Ghodasar'),
(16, 'Gota'),
(17, 'Gurukul'),
(18, 'Hatkeshwar'),
(19, 'Isanpur'),
(20, 'Jamalpur'),
(21, 'Jodhpur'),
(22, 'Juhapura'),
(23, 'Kalupur'),
(24, 'Kankaria'),
(25, 'Khadia'),
(26, 'Khanpur'),
(27, 'Khokhra'),
(28, 'Maninagar'),
(29, 'Motera'),
(30, 'Naranpura'),
(31, 'Naroda'),
(32, 'Narol'),
(33, 'Nava Wadaj'),
(34, 'Nikol'),
(35, 'Oghnaj'),
(36, 'Paldi'),
(37, 'Prahladnagar'),
(38, 'Raipur'),
(39, 'Ramdev Nagar'),
(40, 'Ranip'),
(41, 'Sabarmati'),
(42, 'Sarkhej'),
(43, 'Satellite'),
(44, 'Shahibaug'),
(45, 'Sola'),
(46, 'Thaltej'),
(47, 'Vasna'),
(48, 'Vastrapur'),
(49, 'Vejalpur');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `ch_id` int(11) NOT NULL,
  `ch_date` date NOT NULL,
  `sender` varchar(500) NOT NULL,
  `sen_msg` varchar(2500) NOT NULL,
  `reciver` varchar(500) NOT NULL,
  `rec_msg` varchar(2500) NOT NULL,
  `ch_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cmp_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `area` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isSeller` enum('no','yes') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` enum('yes','no') NOT NULL DEFAULT 'no',
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `complain` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cmp_id`, `email`, `area`, `isSeller`, `isAdmin`, `subject`, `complain`, `date`) VALUES
(1, 'vishalsahoo161999@gmail.com', 'Anandnagar', 'no', 'no', 'complain', 'In legal terminology, a complaint is any formal legal document that sets out the facts and legal reasons that the filing party or parties believes are sufficient to support a claim against the party or parties against whom the claim is brought that entitles the plaintiff to a remedy. ', '2020-05-04 15:18:31'),
(2, 'sitar89athi@gmail.com', 'Ambawadi', 'no', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:00:44'),
(3, 'sitar89athi@gmail.com', 'Ambawadi', 'no', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:00:52'),
(4, 'vishalsahoo161999@gmail.com', 'Anandnagar', 'no', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:03:16'),
(5, 'sharmasanket742@gmail.com', 'Anandnagar', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:34:52'),
(6, 'sharmasanket742@gmail.com', 'Anandnagar', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:38:27'),
(7, 'vishalsahoo45@gmail.com', 'Ambawadi', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:43:35'),
(8, 'vishalsahoo45@gmail.com', 'Ambawadi', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:43:43'),
(9, 'vishalsahoo45@gmail.com', 'Ambawadi', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyâ€™s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-06 10:43:50'),
(10, 'sharmasanket742@gmail.com', 'Anandnagar', 'yes', 'no', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyÃ¢â‚¬â„¢s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-07 10:10:26'),
(11, 'vishalsahoo45@gmail.com', 'Ambawadi', 'no', 'yes', 'complain', 'In legal terminology, a complaint is any formal legal document that sets out the facts and legal reasons that the filing party or parties believes are sufficient to support a claim against the party or parties against whom the claim is brought that entitles the plaintiff to a remedy. ', '2020-06-16 14:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `hub`
--

CREATE TABLE `hub` (
  `sh_id` int(11) NOT NULL,
  `sh_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hub`
--

INSERT INTO `hub` (`sh_id`, `sh_name`, `time`, `description`, `address`, `mail`, `logo`, `date_created`) VALUES
(1, 'Nihar Eye Care - Dr Arpan Patel', '24X7', 'Eye care center in Ahmedabad, Gujarat.   Phone: 079 4890 4202', '202, 2nd Floor, Titanium City Centre Mall, 100ft. Anandnagar Road,, Near Sachin Tower,Satellite, Ahmedabad, Gujarat 380015', 'vishalsahoo161999@gmail.com', 'uploads/709c45d0d337e867a5f3bba391e8f131.jpg', '2020-06-06 13:58:11'),
(2, 'Physiocare Multi Speciality Physiotherapy Centre', '24X7 ', 'Physical therapy clinic in Ahmedabad, Gujarat.   Phone: 093778 56830              ', 'B-411 dev aurum corporate, near dev aurum flat,Kailash Parbat Chat Building,Anandnagar Cross Road, 100ft Road,Prahladnagar, Ahmedabad, Gujarat 380015', 'vishalsahoo161999@gmail.com', 'uploads/6bbe1f067ea450799541df3bdd6edffa.jpg', '2020-06-06 14:01:20'),
(7, 'Dr Rathod Eye Care Hospital', '24X7 ', 'Eye Care Hospital.   Phone: 079 2644 6133', '100 Feet Anand Nagar Rd, near Ishan 3, opp. Shell Petrol Pump, Anand Nagar, Prahlad Nagar, Ahmedabad, Gujarat 380015', 'vishalsahoo45@gmail.com', 'uploads/72bc1bc6b0dd6601ef6850a6e21bd6e5.jpg', '2020-06-16 09:48:35'),
(8, 'Dr Rathod Eye Care Hospital', '24X7 ', 'Eye Care Hospital.   Phone: 079 2644 6133', '100 Feet Anand Nagar Rd, near Ishan 3, opp. Shell Petrol Pump, Anand Nagar, Prahlad Nagar, Ahmedabad, Gujarat 380015', 'vishalsahoo45@gmail.com', 'uploads/31160234ec6de861d77ba6c67877a0c6.jpg', '2020-06-16 09:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `maadmin`
--

CREATE TABLE `maadmin` (
  `mad_id` int(11) NOT NULL,
  `uname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maadmin`
--

INSERT INTO `maadmin` (`mad_id`, `uname`, `email`, `password`, `register_date`) VALUES
(1, 'Master Admin', 'vishalsahoo45@gmail.com', '$2y$10$AdVJavbID33FLwSnvixSeukkb9NG3u/SLzksIT4N3bJqN1XSy8Vy.', '2020-04-27 17:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `to_role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `to_mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `to_role`, `to_mail`, `subject`, `message`, `date`) VALUES
(2, 'Master Admin', 'area admin', 'vishalsahoo45@gmail.com', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyÃ¢â‚¬â„¢s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-16 16:33:07'),
(3, 'Master Admin', 'seller', 'vishalsahoo45@gmail.com', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-16 16:41:25'),
(4, 'Master Admin', 'buyer', 'vishalsahoo161999@gmail.com', 'complain about ____ (name of product or service, with serial number or account number)', 'Dear (title) ____:\r\n\r\nI wish to complain about ____ (name of product or service, with serial number or account number) that I purchased on ____ (date and location of transaction).\r\n\r\nI am complaining because ____ (the reason you are dissatisfied). To resolve this problem I would like you to ____ (what you want the business to do).\r\n\r\nWhen I first learned of this problem, I contacted ____ (name of the person, date of the call) at your company, and was told that nothing could be done about my problem. I believe that this response is unfair because ____ (the reason you feel the company has an obligation to you). I would like a written statement explaining your companyÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s position and what you will do about my complaint.\r\n\r\nI look forward to hearing from you as soon as possible to resolve this problem. If I do not hear from you within ____ days I will file complaints with the appropriate consumer agencies and consider my legal alternatives.\r\n\r\nI am attaching copies of my receipt or ___________ (other proof of payment or documentation of complaint).\r\n\r\nYou may reply to me at this email or call me at (phone number).\r\n\r\nSincerely,\r\n\r\n(your full name)', '2020-06-16 18:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `ord_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `ord_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(12) NOT NULL,
  `prod_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_weight` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_qty` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_desc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_image` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sh_id` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prod_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_weight`, `prod_qty`, `prod_desc`, `prod_image`, `sh_id`, `email`, `prod_date`) VALUES
(1, 'Solimo Wall Clock', 'â‚¹ 629.00', '350 gms', '100 pieces available', 'Adorn your interiors with this beautiful time piece. ', 'uploads/44acc81221f3a0d11c066840cbad31dc.jpg', 1, 'sharmasanket742@gmail.com', '2020-06-06 13:00:49'),
(2, 'Decora Craft Poly', 'â‚¹ 95.00 ', '55 gms', '100 pieces available', 'Decora Craft Poly Resin Buddha Incense Smoke Burner.', 'uploads/ca04273117adcb116f2dd70a76cb339e.jpg', 1, 'sharmasanket742@gmail.com', '2020-06-06 13:11:13'),
(3, 'Digital Alarm Clock ', 'â‚¹ 298.00 ', '55 gms', '100 pieces available', 'Jeval Plastic Digital Alarm Clock ', 'uploads/7f62857a37de2b369657445b6e93772f.jpg', 1, 'sharmasanket742@gmail.com', '2020-06-06 13:14:11'),
(4, 'Ajanta Quartz Wall Clock ', 'â‚¹ 439.00 ', '55 gms', '100 pieces available', 'Jeval Plastic Digital Alarm Clock ', 'uploads/e75e7d6e4ea24aa43a7578514b85eeab.jpg', 1, 'sharmasanket742@gmail.com', '2020-06-06 13:17:00'),
(5, 'Solimo Wall Clock', 'â‚¹ 629.00', '55 gms', '100 pieces available', 'Adorn your interiors with this beautiful time piece. ', 'uploads/f4d0e20ac5ad5521f6c5210972f0d90b.jpg', 2, 'vishalsahoo45@gmail.com', '2020-06-06 13:45:17'),
(6, 'Decora Craft Poly', 'â‚¹ 95.00 ', '55 gms', '100 pieces available', 'Decora Craft Poly Resin Buddha Incense Smoke Burner.', 'uploads/727d17dad6353f08177696583e44ec40.jpg', 2, 'vishalsahoo45@gmail.com', '2020-06-06 13:46:03'),
(7, 'sonata clock', 'â‚¹ 298.00 ', '55 gms', '100 pieces available', 'Jeval Plastic Digital Alarm Clock ', 'uploads/91ef366d19c8aadaf514b8db4795ff43.jpg', 2, 'vishalsahoo45@gmail.com', '2020-06-06 13:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `us_id` int(11) NOT NULL,
  `uname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `e_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email_status` enum('not verified','verified') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'not verified',
  `r_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `r_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isSeller` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `reg_pass` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_activation_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reg_app` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `birthdate` date NOT NULL,
  `gender` tinyint(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`us_id`, `uname`, `active`, `e_mail`, `user_email_status`, `r_area`, `r_city`, `isSeller`, `reg_pass`, `user_activation_code`, `reg_app`, `birthdate`, `gender`, `register_date`) VALUES
(60, 'ram shah', 'yes', 'vishalsahoo161999@gmail.com', 'verified', 'Anandnagar', 'Ahmedabad', 'no', '$2y$10$/FmGXoAd3hmhMp9nuYlAdepCvV6vCFr9pak4a.8j6CMJ4IaoQrQAO', '2e89f064f9457a2fae0dc28d8dbe727c', 'no', '1999-06-01', 0, '2020-05-05 07:07:50'),
(62, 'sanket sharma', 'yes', 'sharmasanket742@gmail.com', 'verified', 'Anandnagar', 'Ahmedabad', 'yes', '$2y$10$CCewud90gaNUM.9kdPFTUOVP1RUzfqDWAOIvTIyBddEdTMdHSVOEe', 'a1c966f620df6a896054c44f03041754', 'yes', '1999-06-01', 0, '2020-05-05 07:28:33'),
(63, 'sita rathi', 'yes', 'sitar89athi@gmail.com', 'verified', 'Ambawadi', 'Ahmedabad', 'no', '$2y$10$ty4acGIiJaLzVXVxmEJhJOq/mmQMqKRA2w5/jzipT43RTIpzQuSr2', 'df796098c5dcf867b55e0b39f15b2c3e', 'no', '1999-06-01', 0, '2020-05-05 07:35:25'),
(65, 'vishal sahoo', 'yes', 'vishalsahoo45@gmail.com', 'verified', 'Ambawadi', 'Ahmedabad', 'yes', '$2y$10$e12ORJUDClerjm3rHADLx.njvXaxSYHly9urmTgcrMCnlVWwyL/4.', '8a6fb6561efbbc7e3edcd27c32b2a5ea', 'yes', '1999-06-01', 0, '2020-05-27 15:53:24'),
(67, 'manish rai', 'yes', 'manish964rai@gmail.com', 'verified', 'Anandnagar', 'Ahmedabad', 'yes', '$2y$10$UlGY5dh9eRPCVBGirdnSJeKZ/eBkQCOuN.DlxTrBXpFdhEgZv2HYW', '9df410c63add50dc06d754ee8beff95a', 'no', '1999-06-01', 0, '2020-06-06 09:31:52'),
(68, 'kareena punjabi', 'yes', 'punjabikareena236@gmail.com', 'verified', 'Ambawadi', 'Ahmedabad', 'yes', '$2y$10$3fSdKAZaiWoAUV4qDptaiuIkcf9ILuVYWo0S/XN0xCKI8wrFLIofS', '1080270f3f4f7bfa9fada64bbc59509e', 'no', '0000-00-00', 0, '2020-06-16 13:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `to_mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sallers`
--

CREATE TABLE `sallers` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `us_id` int(11) NOT NULL,
  `appr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sallers`
--

INSERT INTO `sallers` (`s_id`, `s_name`, `email`, `us_id`, `appr_time`) VALUES
(1, 'sanket sharma', 'sharmasanket742@gmail.com', 62, '2020-05-24 15:37:18'),
(2, 'vishal sahoo', 'vishalsahoo45@gmail.com', 65, '2020-06-06 09:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `sh_id` int(11) NOT NULL,
  `sh_name` text COLLATE utf8_unicode_ci NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`sh_id`, `sh_name`, `time`, `description`, `address`, `mail`, `logo`, `date_created`) VALUES
(1, 'Sharma gift shop', '7:00 a.m. to 10:00 p.m.', 'A gift shop or souvenir shop is a store primarily selling souvenirs, memorabilia, and other items relating to a particular topic or theme. The items sold often include coffee mugs, stuffed animals, toys, t-shirts, postcards, handmade collections and other souvenirs.', 'G-10, Akshardhara Complex Opp. Sachin Tower Petrol Pump 100 Feet Road Sattellite, Anand Nagar, Ahmedabad, Gujarat 380015', 'sharmasanket742@gmail.com', 'uploads/18915757a09c9c8b4f6fe4c663bff433.png', '2020-06-06 12:12:18'),
(2, 'Mahalakshmi gift shop', '7:00 a.m. to 10:00 p.m.', 'A gift shop or souvenir shop is a store primarily selling souvenirs, memorabilia, and other items relating to a particular topic or theme. The items sold often include coffee mugs, stuffed animals, toys, t-shirts, postcards, handmade collections and other souvenirs.', 'Gift Centre FF-4, Shanti Tower, BRTS Corridor Road Opp Manekbag, Nehru Nagar Cir, Tapovan Society, Ambawadi, Ahmedabad, Gujarat 380015', 'vishalsahoo45@gmail.com', 'uploads/3717b013685089cc197ad94ac6c63eab.jpg', '2020-06-06 13:41:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `hub`
--
ALTER TABLE `hub`
  ADD PRIMARY KEY (`sh_id`);

--
-- Indexes for table `maadmin`
--
ALTER TABLE `maadmin`
  ADD PRIMARY KEY (`mad_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`ord_id`),
  ADD UNIQUE KEY `ord_id` (`ord_id`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sallers`
--
ALTER TABLE `sallers`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`sh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hub`
--
ALTER TABLE `hub`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maadmin`
--
ALTER TABLE `maadmin`
  MODIFY `mad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sallers`
--
ALTER TABLE `sallers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
