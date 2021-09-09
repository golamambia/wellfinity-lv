-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 05:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandalwood`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gs_category`
--

CREATE TABLE `gs_category` (
  `id` int(10) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''',
  `rank` int(10) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gs_country`
--

CREATE TABLE `gs_country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '''0''=>''Inactive'', ''1''=>''Active''',
  `rank` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gs_country`
--

INSERT INTO `gs_country` (`id`, `country_name`, `image`, `status`, `rank`, `created_at`, `updated_at`) VALUES
(2, 'United Kingdom', '1626096607cityimg1.jpg', 1, 1, '2021-07-12 05:30:07', '2021-07-15 04:44:49'),
(3, 'China', '1626097382cityimg2.jpg', 1, 2, '2021-07-12 05:43:02', '2021-07-16 11:34:03'),
(4, 'USA', '1626097670cityimg3.jpg', 1, 4, '2021-07-12 05:47:50', '2021-07-15 04:45:17'),
(5, 'India', '1626097687cityimg4.jpg', 1, 5, '2021-07-12 05:48:07', '2021-07-15 04:45:26'),
(6, 'Australia', '1626097728cityimg5.jpg', 1, 6, '2021-07-12 05:48:48', '2021-07-15 04:45:56'),
(7, 'Canada', '1626097754cityimg6.jpg', 1, 7, '2021-07-12 05:49:14', '2021-07-15 04:46:06'),
(8, 'New Zealand', '1626097785cityimg7.jpg', 1, 8, '2021-07-12 05:49:45', '2021-07-15 04:46:14'),
(9, 'Brazil', '1626097904cityimg8.jpg', 1, 9, '2021-07-12 05:51:44', '2021-07-15 04:46:23'),
(10, 'Mexico', '1626097925cityimg9.jpg', 1, 10, '2021-07-12 05:52:05', '2021-07-15 04:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `gs_email_template`
--

CREATE TABLE `gs_email_template` (
  `id` int(2) NOT NULL,
  `registration_email` longtext NOT NULL,
  `user_registration_email_to_admin` text DEFAULT NULL,
  `forgotpass_email` longtext NOT NULL,
  `referral_email` text DEFAULT NULL,
  `account_approved_email` text DEFAULT NULL,
  `password_change_email` text DEFAULT NULL,
  `order_email` longtext DEFAULT NULL,
  `order_email_to_admin` text DEFAULT NULL,
  `order_complete_email` text DEFAULT NULL,
  `order_complete_email_to_admin` text DEFAULT NULL,
  `order_accept_email` text DEFAULT NULL,
  `order_cancel_email` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_email_template`
--

INSERT INTO `gs_email_template` (`id`, `registration_email`, `user_registration_email_to_admin`, `forgotpass_email`, `referral_email`, `account_approved_email`, `password_change_email`, `order_email`, `order_email_to_admin`, `order_complete_email`, `order_complete_email_to_admin`, `order_accept_email`, `order_cancel_email`) VALUES
(1, '<p style=\"text-align: left;\">Hello&nbsp;{#Firstname#},</p><p style=\"text-align: left;\">Welcome to Offneeds, and thank you for joining the family!</p><div><div style=\"text-align: left;\">Your account has been created.</div><div style=\"text-align: left;\">To get started, login with your user details at:</div><div style=\"text-align: left;\"><br></div><div><br></div><div><a href=\"{#Loginurl#}\" class=\"custom-button\" target=\"_blank\" style=\"mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#056B4E;border-width:15px 30px;display:inline-block;background:#056B4E;border-radius:4px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center\">Login</a></div></div><div><br></div><p style=\"text-align: left;\">Email / Username:&nbsp;<span style=\"font-weight: 700;\">{#Email#}</span></p><p style=\"text-align: left;\">Password: <b>{#Password#}</b></p>\r\n\r\n<p style=\"text-align: left;\">Thank you,</p><p style=\"text-align: left;\">The Offneeds Team</p><p style=\"text-align: left;\">P.S. If you have any questions or need any assistance, reply to this email and our friendly support staff can help you out.</p>', '<p>Hello {#Firstname#},</p><p>A new user has been registered. Details have been given below.</p> <p>{#UserDetails#}. </p><p>Thank you,</p><p>The Juve Team<br></p>', '<p style=\"text-align: left;\">Dear Member,</p>\r\n\r\n<p style=\"text-align: left;\">Please <a href=\"{#ResetPasswordLink#}\">click here</a> to reset your password or directly open the below link.</p>\r\n\r\n<p style=\"text-align: left;\">{#ResetPasswordLink#}</p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\">Regards,</p><p style=\"text-align: left;\"><span style=\"color: rgb(51, 51, 51); font-size: 11.9px;\">{#Sitename#}</span><br></p>', '<p style=\"text-align: left;\">Hello,</p><p style=\"text-align: left;\">{#Fullname#} has invited you to register on&nbsp; \"{#Sitename#}\".</p><p style=\"text-align: left;\">Thank you,</p><p style=\"text-align: left;\">The Offneeds Team<br></p><div><br></div><p><br></p>', '<p style=\"text-align: left;\"><b>Hello {#Fullname#},</b></p>\r\n<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:22px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:33px;color:#434343\"><strong>Your account has been approved!</strong></p></td> \r\n                     </tr> \r\n                     <tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" style=\"padding:0;Margin:0;padding-left:10px;padding-right:10px;padding-top:30px\"><span class=\"es-button-border\" style=\"border-style:solid;border-color:transparent;background:#056B4E;border-width:0px;display:inline-block;border-radius:4px;width:auto\"><a href=\"{#Loginurl#}\" class=\"es-button\" target=\"_blank\" style=\"mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#056B4E;border-width:15px 30px;display:inline-block;background:#056B4E;border-radius:4px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center\">Login my account</a></span></td> \r\n                     </tr> \r\n                   </tbody></table>', '<p>Hi &nbsp;{#Fullname#},</p><p>The password for your Offneeds&nbsp;Account was recently changed.</p><p><br></p>\r\n\r\n<p>If you did not change your password, please notify our support team at support@offneeds.com<br></p>\r\n\r\n<p>Thank you,</p><p>The Offneeds&nbsp;Team</p>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\">\r\n<h3>Thank you!</h3>\r\n<h4>Your order number is: <span>{#OrderID#}</span></h4>\r\n<p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:22px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:33px;color:#434343\"><br></p></td> \r\n                     </tr> \r\n                     <tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" style=\"padding:0;Margin:0;padding-left:10px;padding-right:10px;padding-top:30px\"><span class=\"es-button-border\" style=\"border-style:solid;border-color:transparent;background:#056B4E;border-width:0px;display:inline-block;border-radius:4px;width:auto\"><a href=\"{#MyOrderurl#}\" class=\"es-button\" target=\"_blank\" style=\"mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#056B4E;border-width:15px 30px;display:inline-block;background:#056B4E;border-radius:4px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center\">My Order</a></span></td> \r\n                     </tr> \r\n                   </tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\">\r\n<h3>Dear Admin!</h3>\r\n<h4>Order number is: <span>{#OrderID#}</span></h4>\r\n</td> \r\n                     </tr> \r\n                   </tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\">\r\n<h3>Dear {#Fullname#}!</h3>\r\n<h4>Order number is: <span>{#OrderID#}</span></h4>\r\n</td> \r\n                     </tr> \r\n                   </tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\">\r\n<h3>Dear Admin!</h3>\r\n<h4>Order number is: <span>{#OrderID#}</span></h4>\r\n</td> \r\n                     </tr> \r\n                   </tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px\"> \r\n                     <tbody><tr style=\"border-collapse:collapse\"> \r\n                      <td align=\"center\" class=\"es-m-txt-c\" style=\"padding:0;Margin:0\">\r\n<h3>Dear {#Fullname#}!</h3>\r\n<h4>Order number is: <span>{#OrderID#}</span></h4>\r\n</td> \r\n                     </tr> \r\n                   </tbody></table>', '<h3>Dear {#Fullname#}!</h3>\r\n<h4 style=\"text-align: center; \">Order number is: <span>{#OrderID#}</span></h4><h4 style=\"text-align: center; \"><span>Order has been cancelled.</span></h4>');

-- --------------------------------------------------------

--
-- Table structure for table `gs_forms`
--

CREATE TABLE `gs_forms` (
  `id` bigint(20) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `expand` varchar(191) DEFAULT NULL,
  `fname` varchar(191) DEFAULT NULL,
  `lname` varchar(191) DEFAULT NULL,
  `function` varchar(191) DEFAULT NULL,
  `want` varchar(191) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_forms`
--

INSERT INTO `gs_forms` (`id`, `type`, `name`, `email`, `address`, `phone`, `zip`, `state`, `message`, `city`, `reason`, `expand`, `fname`, `lname`, `function`, `want`, `resume`, `created_at`, `updated_at`) VALUES
(4, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'fbfgbgfnghnghnghnh dfbfb', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 12:26:18', '2021-08-22 12:26:18'),
(3, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'gnghh', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 04:04:41', '2021-08-22 04:04:41'),
(5, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'vfbgfbgfvfv fvfb', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 12:48:47', '2021-08-22 12:48:47'),
(6, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'vfbb', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 12:49:45', '2021-08-22 12:49:45'),
(18, 1, 'Golam', 'wtm.dev2020@gmail.com', NULL, '4535335656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-08-23 01:10:51', '2021-08-23 01:10:51'),
(8, 0, NULL, 'seller@gmail.com', NULL, '7003832809', NULL, 'West Bengal', 'ghnhnh', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:06:04', '2021-08-22 13:06:04'),
(9, 2, NULL, 'seller@gmail.com', NULL, '7003832809', NULL, 'West Bengal', 'gbgnhgn', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:10:50', '2021-08-22 13:10:50'),
(16, 1, 'Golam', 'wtm.dev2020@gmail.com', NULL, '45353.5656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-08-23 01:10:47', '2021-08-23 01:10:47'),
(17, 1, 'Golam', 'wtm.dev2020@gmail.com', NULL, '45353.5656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-08-23 01:10:51', '2021-08-23 01:10:51'),
(11, 2, NULL, 'seller@gmail.com', NULL, '7003832809', NULL, 'West Bengal', 'bbtbtb', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:14:48', '2021-08-22 13:14:48'),
(12, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'jhjhjh', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:16:12', '2021-08-22 13:16:12'),
(13, 0, NULL, 'seller@gmail.com', 'horishpur nayagram,', '7003832809', '731219', 'West Bengal', 'bbtgeabb', 'Birbhum', 'n vgnhm', NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:19:44', '2021-08-22 13:19:44'),
(14, 2, NULL, 'seller@gmail.com', NULL, '7003832809', NULL, 'West Bengal', 'vffbgfb', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-22 13:22:16', '2021-08-22 13:22:16'),
(19, 2, NULL, 'seller@gmail.com', NULL, '123456789', NULL, 'West Bengal', 'gnnnh', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-23 02:08:27', '2021-08-23 02:08:27'),
(20, 2, NULL, 'seller@gmail.com', NULL, '5235365365356356', NULL, 'West Bengal', 'grrhrth', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-23 03:24:12', '2021-08-23 03:24:12'),
(21, 2, NULL, 'seller@gmail.com', NULL, '5235365365356356', NULL, 'West Bengal', 'grrhrth', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-23 03:24:13', '2021-08-23 03:24:13'),
(22, 2, NULL, 'seller@gmail.com', NULL, '523536536535635656', NULL, 'West Bengal', 'grrhrth', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-23 03:24:13', '2021-08-23 03:24:13'),
(23, 2, NULL, 'seller@gmail.com', NULL, '52353653653563565656', NULL, 'West Bengal', 'grrhrth', 'Birbhum', NULL, NULL, 'Golam', 'Ambia', NULL, NULL, '', '2021-08-23 03:24:13', '2021-08-23 03:24:13'),
(24, 3, 'Golam', 'wtm.dev2020@gmail.com', NULL, '5536556545546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-08-23 11:35:09', '2021-08-23 11:35:09'),
(25, 3, 'Golam', 'wtm.dev2020@gmail.com', NULL, '12135454578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1629738485engagement_Notice_CMOH_Msd.pdf', '2021-08-23 11:38:05', '2021-08-23 11:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `gs_settings`
--

CREATE TABLE `gs_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gs_settings`
--

INSERT INTO `gs_settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Sandalwood', '', 'text', 1, 'Site'),
(2, 'site.logo', 'Site Logo', '1628791782logo.png', '', 'image', 2, 'Site'),
(3, 'admin.pagination', 'Admin Pagination', '25', '', 'text', 1, 'Admin'),
(4, 'site.pagination', 'Front-end Pagination', '10', '', 'text', 1, 'Site'),
(5, 'site.meta_title', 'Meta Title', 'Sandalwood', '', 'text', 1, 'Site'),
(6, 'site.meta_keyword', 'Meta Keyword', 'Sandalwood', '', 'text', 1, 'Site'),
(7, 'site.meta_description', 'Meta Description', 'Sandalwood', '', 'text', 1, 'Site'),
(8, 'site.meta_image', 'Meta Image', '1628864795logo.png', '', 'image', 1, 'Site'),
(9, 'site.logo2', 'Site Logo 2', '1628795075favicon.png', '', 'image', 2, 'Site'),
(10, 'site.contact_email', 'Contact Email', 'ambia@yopmail.com', '', 'text', 1, 'Site'),
(11, 'site.support_email', 'Support Email', 'support@gmail.com', '', 'text', 1, 'Site'),
(12, 'site.address', 'Address', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit,', '', 'text', 1, 'Site'),
(13, 'site.email', 'Site Email', 'info@sandalwoodseniorkiving.com', '', 'text', 1, 'Site'),
(14, 'site.phone', 'Site Phone', '586-949-6220', '', 'text', 1, 'Site'),
(15, 'site.facebook_link', 'Site Facebook', 'https://www.facebook.com/', '', 'text', 1, 'Site'),
(16, 'site.twitter_link', 'Site Twitter', NULL, '', 'text', 1, 'Site'),
(17, 'site.instagram_link', 'Site Instagram', 'https://www.instagram.com/', '', 'text', 1, 'Site'),
(18, 'site.linkedin_link', 'Site Linkedin', NULL, '', 'text', 1, 'Site'),
(19, 'site.message_show_time', 'Site Message Show Time', '10', '', 'text', 1, 'Site'),
(20, 'site.inner_logo', 'Site Inner Page Logo', '1628791540flogo.png', '', 'text', 1, 'Site'),
(21, 'site.footer_logo', 'Site Footer Logo', '1628791782flogo.png', '', 'text', 1, 'Site'),
(22, 'site.footer1_content', 'Site Footer1 content', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut', '', 'text', 1, 'Site'),
(25, 'site.address_title', 'Site address Title', 'address of our oﬃce', '', 'text', 1, 'Site'),
(26, 'site.social_title', 'Site Footer3 Title', 'CONNECT WITH US', '', 'text', 1, 'Site'),
(23, 'site.footer_map', 'Site Footer map', NULL, '', 'text', 1, 'Site'),
(24, 'site.footer2_title', 'Site Footer2 Title', 'About Us', '', 'text', 1, 'Site'),
(27, 'site.footer4_title', 'Site Footer4 Title', NULL, '', 'text', 1, 'Site'),
(28, 'site.footer5_title', 'Site Footer5 Title', 'Contact Us', '', 'text', 1, 'Site'),
(29, 'site.footer5_sub_title', 'Site Footer5 Sub Title', 'Global Headquarters', '', 'text', 1, 'Site'),
(30, 'site.withoutbanner_logo', 'Without Banner logo', '1628796135footerbg.jpg', '', '', 1, 'Site'),
(31, '', 'gmm', NULL, '', '', 0, ''),
(32, 'site.footer_map', 'Site Footer map', NULL, '', 'text', 1, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `gs_team`
--

CREATE TABLE `gs_team` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gs_team_category`
--

CREATE TABLE `gs_team_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gs_testimonial`
--

CREATE TABLE `gs_testimonial` (
  `id` int(10) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `rank` int(10) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_testimonial`
--

INSERT INTO `gs_testimonial` (`id`, `name`, `designation`, `rank`, `image`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Name', 'Company/ Position', 1, '1627758857banner.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p>', 1, '2021-07-31 13:44:17', '2021-07-31 13:44:17'),
(2, 'Full Name', 'Company/ Position', 2, '1627758916banner.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p>', 1, '2021-07-31 13:45:16', '2021-07-31 13:45:16'),
(3, 'Full Name', 'Company/ Position', 3, '1627758942banner.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p>', 1, '2021-07-31 13:45:42', '2021-07-31 13:45:42'),
(4, 'Full Name', 'Company/ Position', 4, '1627758965banner.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed</p>', 1, '2021-07-31 13:46:05', '2021-07-31 13:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posttype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page' COMMENT '''page'',''service''',
  `bannerimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bannertext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `display_in` int(5) NOT NULL DEFAULT 0 COMMENT '''0''=>''None'', ''1''=>''Header'', ''2''=>''Footer'', ''3''=>''Header & Footer''',
  `menu_order` int(10) NOT NULL DEFAULT 0,
  `menu_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_template` int(10) NOT NULL DEFAULT 0,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_title`, `body`, `posttype`, `bannerimage`, `bannertext`, `image2`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `parent_id`, `display_in`, `menu_order`, `menu_link`, `page_template`, `job_type`, `location`, `schema_code`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, NULL, 'page', NULL, NULL, NULL, 'home', 'sandalwood', 'sandalwood', 'sandalwood', 0, 0, 1, NULL, 1, NULL, NULL, NULL, '2021-08-12 18:51:18', NULL),
(2, 'Where To Begin', 'Where To Begin', NULL, 'page', NULL, NULL, NULL, 'where-to-begin', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 2, NULL, 2, NULL, NULL, NULL, '2021-08-12 19:54:41', NULL),
(3, 'Services Offered', 'Services Offered', NULL, 'page', NULL, NULL, NULL, 'services-offered', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 3, NULL, 3, NULL, NULL, NULL, '2021-08-12 19:57:21', NULL),
(4, 'Locations', 'Locations', NULL, 'page', NULL, NULL, NULL, 'locations', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 4, NULL, 4, NULL, NULL, NULL, '2021-08-12 19:58:00', NULL),
(5, 'Contact Us', 'Contact Us', NULL, 'page', NULL, NULL, NULL, 'contact-us', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 5, NULL, 5, NULL, NULL, NULL, '2021-08-12 19:58:37', NULL),
(6, 'Employment', 'Employment', NULL, 'page', NULL, NULL, NULL, 'employment', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 6, NULL, 6, NULL, NULL, NULL, '2021-08-12 19:59:14', NULL),
(7, 'Payment', 'Payment', NULL, 'page', NULL, NULL, NULL, 'payment', 'sandalwood', 'sandalwood', 'sandalwood', 0, 3, 7, NULL, 7, NULL, NULL, NULL, '2021-08-12 19:59:53', NULL),
(8, 'Our Company', 'Our Company', NULL, 'page', NULL, NULL, NULL, 'our-company', 'sandalwood', 'sandalwood', 'sandalwood', 2, 1, 8, '2', 0, NULL, NULL, NULL, '2021-08-12 20:06:46', NULL),
(9, 'Sandalwood Creek', 'Sandalwood Creek', NULL, 'location', NULL, NULL, NULL, 'sandalwood-strong-creek-strong', 'Sandalwood Creek', 'Sandalwood Creek', 'Sandalwood Creek', 0, 0, 1, NULL, 8, NULL, NULL, NULL, '2021-08-21 10:43:12', NULL),
(10, 'Sandalwood Village', 'Sandalwood Village', NULL, 'location', NULL, NULL, NULL, 'sandalwood-village', 'Sandalwood Village', 'Sandalwood Village', 'Sandalwood Village', 4, 0, 8, NULL, 8, NULL, NULL, NULL, '2021-08-21 12:34:36', NULL),
(11, 'Jobs search', 'Jobs search', NULL, 'page', NULL, NULL, NULL, 'jobs-search', 'Jobs search', 'Jobs search', 'Jobs search', 0, 0, 8, NULL, 9, NULL, NULL, NULL, '2021-08-23 09:23:02', NULL),
(12, 'Director, Dining Services', 'Director, Dining Services', '<p>Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>\r\n\r\n<p>service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>', 'jobsearch', NULL, NULL, NULL, 'director-dining-services', NULL, NULL, NULL, 0, 0, 9, '0', 10, 'Brookdale Monroe', '380 Forsgate Drive,  Monroe Township, NJ', NULL, '2021-08-23 12:08:19', NULL),
(13, 'Director, Dining Services new1', 'Director, Dining Services new1', '<p>Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>\r\n\r\n<p>service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>', 'jobsearch', NULL, NULL, NULL, 'director-dining-services-new1', NULL, NULL, NULL, 0, 0, 10, '0', 10, 'Brookdale Monroe', '380 Forsgate Drive,  Monroe Township, NJ', NULL, '2021-08-23 12:15:15', NULL),
(14, 'Director, Dining Services 3', 'Director, Dining Services3', '<p>Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>\r\n\r\n<p>service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>', 'jobsearch', NULL, NULL, NULL, 'director-dining-services-3', NULL, NULL, NULL, 0, 0, 11, '0', 10, 'Brookdale Monroe', '380 Forsgate Drive,  Monroe Township, NJ', NULL, '2021-08-23 12:16:39', NULL),
(15, 'Director, Dining Services 4', 'Director, Dining Services4', '<p>Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>\r\n\r\n<p>service and quality. Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...Directs food service operations within the community including all food preparation, dining room operations and dining delivery services. Purchases all food and manages inventory ensuring effective cost controls and vendor service and quality. Ensure...</p>', 'jobsearch', NULL, NULL, NULL, 'director-dining-services-4', NULL, NULL, NULL, 0, 0, 12, '0', 10, 'Brookdale Monroe', '380 Forsgate Drive,  Monroe Township, NJ', NULL, '2021-08-23 12:17:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages_extra`
--

CREATE TABLE `pages_extra` (
  `id` bigint(20) NOT NULL,
  `page_id` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `section_type` int(10) NOT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `btn_text` varchar(191) DEFAULT NULL,
  `btn_url` text DEFAULT NULL,
  `rank` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_extra`
--

INSERT INTO `pages_extra` (`id`, `page_id`, `type`, `section_type`, `title`, `image`, `image2`, `body`, `sub_title`, `btn_text`, `btn_url`, `rank`) VALUES
(1, 2, 1, 1, 'Where to <strong>Begin</strong>', '1629119473subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(2, 2, 2, 20, 'Finding <span>Right Option</span>', '1629124484begin1.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo.</p>\r\n\r\n<p>Curabitur vitae est justo. Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', '#', 1),
(3, 2, 2, 20, 'Discussion', '1629124666begin2.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo.</p>\r\n\r\n<p>Curabitur vitae est justo. Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', '#', 1),
(4, 2, 2, 20, 'Prepare for <span>Move</span>', '1629124783begin3.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo.</p>\r\n\r\n<p>Curabitur vitae est justo. Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 1),
(5, 6, 1, 1, 'Employment', '1629185277subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(6, 6, 2, 20, 'Sandalwood <strong>Living Room</strong>', '1629185442employment1.png', '', '<p><strong>Sandalwood Living Room</strong> is growing and we have opportunities for qualified senior care professionals who want to grow with us! We offer a friendly, professional environment where both staff and residents are both respected and valued.</p>\r\n\r\n<p>If you have a strong work ethic and are interested in assisting others and knowing you made a difference, then joining our team at Serenity Village may be the career opportunity for you. Working at Serenity Village offers the opportunity to truly make a significant contribution in the lives of our residents - every day.</p>', NULL, NULL, NULL, 1),
(7, 6, 3, 2, 'As a result of our ongoing expansion, Serenity Village is actively seeking dedicated, professional and qualified individuals for a variety of positions at our locations including:', '', '', NULL, NULL, NULL, NULL, 1),
(10, 6, 4, 2, 'Facility Coordinator', '', '', NULL, NULL, NULL, NULL, 1),
(11, 6, 4, 2, 'Shift Leaders', '', '', NULL, NULL, NULL, NULL, 2),
(12, 6, 4, 2, 'Direct Care Workers', '', '', NULL, NULL, NULL, NULL, 3),
(13, 6, 4, 2, 'Medication Coordinators', '', '', NULL, NULL, NULL, NULL, 4),
(14, 6, 4, 2, 'Cooks', '', '', NULL, NULL, NULL, NULL, 5),
(15, 6, 4, 2, 'Housekeeping Staff', '', '', NULL, NULL, NULL, NULL, 6),
(16, 6, 4, 2, 'Building Services', '', '', NULL, NULL, NULL, NULL, 7),
(17, 6, 3, 5, NULL, '', '', NULL, NULL, 'Employment Application', NULL, 2),
(18, 3, 1, 1, 'Services <strong>Offered</strong>', '1629616056subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(19, 3, 2, 20, 'Assisted <span>Living</span>', '1629189593service1.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo. Curabitur vitae est justo.</p>\r\n\r\n<p>Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 1),
(20, 3, 2, 20, 'Memory <span>Care</span>', '1629189658service2.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo. Curabitur vitae est justo.</p>\r\n\r\n<p>Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 2),
(21, 3, 2, 20, 'Home Health <span>Care</span>', '1629189705service3.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo. Curabitur vitae est justo.</p>\r\n\r\n<p>Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 3),
(22, 3, 2, 20, 'Hospice', '1629189758service4.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo. Curabitur vitae est justo.</p>\r\n\r\n<p>Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 4),
(23, 3, 2, 20, 'Amenities', '1629189816service5.png', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus, elit et eleifend aliquet, nunc purus semper dui, vel iaculis nisi urna in mi. In maximus faucibus massa at convallis. Sed vestibulum ut lacus eget commodo. Curabitur vitae est justo.</p>\r\n\r\n<p>Nunc in auctor magna. Nullam pulvinar auctor massa ut interdum. Aenean ullamcorper in mi ac ornare. Morbi at leo metus. Etiam et nisl tincidunt, commodo orci mollis, convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>', NULL, 'Learn more', NULL, 5),
(24, 1, 1, 10, 'Experience Our <br>               Approch to <span>Senior Living <br>               & Support</span>', '1629382991banner.jpg', '', NULL, 'Assistance with daily tasks in group or shared living arrangements to help individuals to live as autonomously as possible.', 'contact Us', '#', 1),
(25, 1, 1, 10, 'Experience Our <br>               Approch to <span>Senior Living <br>               & Support</span>', '1629383121banner1.jpg', '', NULL, 'Assistance with daily tasks in group or shared living arrangements to help individuals to live as autonomously as possible.', 'contact Us', '#', 2),
(26, 1, 2, 2, 'Excellent Experience  <br>Since 2015', '', '', NULL, NULL, NULL, NULL, 1),
(27, 1, 2, 3, NULL, '1629451885aboutimg.png', '', NULL, NULL, NULL, NULL, 2),
(28, 1, 3, 13, 'Welcome <br>             to <span> Sandalwood <small>senior living</small></span>', '', '', '<p>Sandalwood living room is a newly renovated property that strives to provide our residents with all the comforts of home. &nbsp;Our goal is to help ease the transition from hospital, rehabilitation, or independent living to assisted living, focusing on personalized care specific to an individual&#39;s needs that help encourage both choice and independence.</p>', NULL, NULL, NULL, 1),
(29, 1, 4, 9, 'Resuming Group Activities', '1629386751abouticon.png', '', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh.', NULL, NULL, 1),
(30, 1, 4, 9, 'Open to Family Visits', '1629386798abouticon1.png', '', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh.', NULL, NULL, 2),
(31, 1, 5, 13, '>A Higher Standard <br>           in <span>Senior Living</span>', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin magna consequat posuere. Orci varius natoque penatibus et magnis dis parturient montes.</p>', NULL, NULL, NULL, 1),
(32, 1, 6, 11, 'Prepare for Move', '1629389642standardimg2.jpg', '1629389642icon2.png', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', NULL, NULL, 1),
(33, 1, 6, 11, 'Discussion', '1629389771standardimg1.jpg', '1629389771icon3.png', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', NULL, NULL, 2),
(34, 1, 6, 11, 'Finding Right Option', '1629389940standardimg.jpg', '1629389940icon1.png', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', NULL, NULL, 3),
(35, 1, 7, 20, 'Book an Appointment - <span>Today</span>', '1629391771bookanbg.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin magna consequat posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>', NULL, 'Call Us', '#', 1),
(36, 1, 8, 13, 'Why <span>Choose Us</span>', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin.</p>', NULL, NULL, NULL, 1),
(37, 1, 8, 5, NULL, '', '', NULL, NULL, 'Email Us', '#', 2),
(38, 1, 9, 9, 'Meeting Your Emotional Needs', '1629433162whyicon.png', '', NULL, 'In vitae ullamcorper justo. Curabitur tincidunt congue in auctor quam lacinia nec. Etiam eros lorem.', NULL, NULL, 1),
(39, 1, 9, 9, 'Meeting Your Emotional Needs', '1629433162whyicon1.png', '', NULL, 'In vitae ullamcorper justo. Curabitur tincidunt congue in auctor quam lacinia nec. Etiam eros lorem.', NULL, NULL, 2),
(40, 1, 9, 9, 'Meeting Your Emotional Needs', '1629433162whyicon2.png', '', NULL, 'In vitae ullamcorper justo. Curabitur tincidunt congue in auctor quam lacinia nec. Etiam eros lorem.', NULL, NULL, 3),
(41, 1, 10, 10, 'Our <span>Services</span>', '1629433814videoimg.jpg', '', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin.', NULL, 'https://www.youtube.com/watch?v=pBFQdxA-apI', 1),
(42, 1, 11, 10, 'Sandalwood Valley', '1629434364Locationsimg.jpg', '', NULL, NULL, NULL, '#', 1),
(43, 1, 11, 10, 'Sandalwood Valley', '1629434405Locationsimg.jpg', '', NULL, NULL, NULL, '#', 2),
(44, 1, 11, 10, 'Sandalwood Valley', '1629434457Locationsimg.jpg', '', NULL, NULL, NULL, NULL, 3),
(45, 1, 12, 14, 'Our <span>Latest News</span>', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin magna consequat posuere. Orci varius natoque penatibus et magnis dis parturient montes.</p>', 'How can <span>we help?</span>', NULL, NULL, 1),
(46, 1, 13, 16, 'Helping Seniors Learn New Hobbies', '1629436440newimg.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh.</p>', 'July 24, 2021', NULL, NULL, 1),
(47, 1, 13, 16, 'Helping Seniors Learn New Hobbies', '1629436632newimg1.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh.</p>', 'July 24, 2021', NULL, NULL, 2),
(48, 1, 13, 16, 'Helping Seniors Learn New Hobbies', '1629436632newimg2.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh.</p>', 'July 24, 2021', NULL, NULL, 3),
(50, 1, 14, 8, 'How Can We Help?', '', '', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1627911753138!5m2!1sen!2sin', NULL, NULL, 1),
(51, 9, 1, 13, 'Sandalwood <strong>Creek</strong>', '', '', '<p>Nunc mollis, libero non pretium cursus, ante enim tempus lacus, vitae scelerisque velit nibh et neque. Donec sit amet dictum velit. Cras rhoncus ac felis fringilla rhoncus. Nullam lacinia quis purus in viverra. Curabitur ullamcorper suscipit aliquam. Nam iaculis ac massa vel aliquet. Nunc elementum velit at odio facilisis fringilla. Mauris euismod tincidunt rutrum.</p>\r\n\r\n<p>Praesent neque ex, hendrerit et risus a, consectetur volutpat eros. Curabitur luctus accumsan magna, nec malesuada leo dapibus sit amet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras a massa ac nisl dignissim auctor. Duis semper placerat congue. Pellentesque sagittis iaculis velit, ac elementum sapien suscipit vel.</p>', NULL, NULL, NULL, 1),
(52, 9, 2, 15, '810-367-7192', '', '', '<p>5485 Smiths Creek Rd. Kimball,<br />\r\nMI 48074</p>', '810-367-4308', 'sandalwoofcreek@gmail.com', 'www.sandalwood.com', 1),
(53, 9, 3, 8, '<strong>Property Id :</strong> 59', '', '', NULL, '<strong>Rooms:</strong> 9', NULL, NULL, 1),
(54, 9, 3, 8, '<strong>Property Size :</strong> 190 ft2', '', '', NULL, '<strong>Bedrooms :</strong> 5', NULL, NULL, 2),
(55, 9, 3, 8, '<strong>Property Lot Size:</strong> 2,000 ft2', '', '', NULL, '<strong>Structure Type :</strong> Brick', NULL, NULL, 3),
(56, 9, 1, 3, NULL, '1629548280location-img1.png', '', NULL, NULL, NULL, NULL, 2),
(57, 9, 4, 3, NULL, '1629548381location-img2.png', '', NULL, NULL, NULL, NULL, 1),
(58, 9, 4, 3, NULL, '1629548381location-img3.png', '', NULL, NULL, NULL, NULL, 2),
(59, 9, 4, 3, NULL, '1629548381location-img4.png', '', NULL, NULL, NULL, NULL, 3),
(60, 9, 4, 3, NULL, '1629548381location-img5.png', '', NULL, NULL, NULL, NULL, 4),
(61, 10, 1, 13, 'Sandalwood <strong>Creek</strong>', '', '', '<p>Nunc mollis, libero non pretium cursus, ante enim tempus lacus, vitae scelerisque velit nibh et neque. Donec sit amet dictum velit. Cras rhoncus ac felis fringilla rhoncus. Nullam lacinia quis purus in viverra. Curabitur ullamcorper suscipit aliquam. Nam iaculis ac massa vel aliquet. Nunc elementum velit at odio facilisis fringilla. Mauris euismod tincidunt rutrum.</p>\r\n\r\n<p>Praesent neque ex, hendrerit et risus a, consectetur volutpat eros. Curabitur luctus accumsan magna, nec malesuada leo dapibus sit amet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras a massa ac nisl dignissim auctor. Duis semper placerat congue. Pellentesque sagittis iaculis velit, ac elementum sapien suscipit vel.</p>', NULL, NULL, NULL, 1),
(62, 10, 1, 3, NULL, '1629549523location-img7.png', '', NULL, NULL, NULL, NULL, 2),
(63, 10, 2, 15, '810-367-7192', '', '', '<p>5485 Smiths Creek Rd. Kimball,<br />\r\nMI 48074</p>', '810-367-4308', 'sandalwoofcreek@gmail.com', 'www.sandalwood.com', 1),
(64, 10, 3, 8, '<strong>Property Id :</strong> 59', '', '', NULL, '<strong>Rooms:</strong> 9', NULL, NULL, 1),
(65, 10, 3, 8, '<strong>Property Size :</strong> 190 ft2', '', '', NULL, '<strong>Bedrooms :</strong> 5', NULL, NULL, 2),
(66, 10, 3, 8, '<strong>Property Lot Size:</strong> 2,000 ft2', '', '', NULL, '<strong>Structure Type :</strong> Brick', NULL, NULL, 3),
(67, 10, 4, 3, NULL, '1629550016location-img1.png', '', NULL, NULL, NULL, NULL, 1),
(68, 10, 4, 3, NULL, '1629550080location-img8.png', '', NULL, NULL, NULL, NULL, 2),
(69, 10, 4, 3, NULL, '1629550080location-img6.png', '', NULL, NULL, NULL, NULL, 3),
(70, 10, 4, 3, NULL, '1629550080location-img4.png', '', NULL, NULL, NULL, NULL, 4),
(71, 10, 4, 3, NULL, '1629550080location-img3.png', '', NULL, NULL, NULL, NULL, 5),
(72, 4, 1, 1, 'Locations', '1629551714subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(73, 5, 1, 1, 'Contact <strong>Us</strong>', '1629614712subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(74, 5, 2, 13, 'contact <span>us</span>', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin.</p>', NULL, NULL, NULL, 1),
(75, 5, 3, 15, 'Sandalwood <span>Village</span>', '', '', '<p>586-949-6220</p>', '47640 Gratiot Ave. Chesterfield,  MI  48051', '586-949-6225', 'info@sandalwood.com', 1),
(76, 5, 3, 15, 'Sandalwood <span>Village</span>', '', '', '<p>586-949-6220</p>', '47640 Gratiot Ave. Chesterfield,  MI  48051', '586-949-6225', 'info@sandalwood.com', 2),
(77, 5, 3, 15, 'Sandalwood <span>Village</span>', '', '', '<p>586-949-6220</p>', '47640 Gratiot Ave. Chesterfield,  MI  48051', '586-949-6225', 'info@sandalwood.com', 3),
(78, 5, 4, 13, 'Request A Quote', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin.</p>', NULL, NULL, NULL, 1),
(79, 7, 1, 1, 'Payment', '1629616182subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1),
(80, 7, 2, 6, NULL, '', '', NULL, NULL, 'PAY NOW', NULL, 1),
(81, 7, 3, 8, 'Personal <span>Information</span>', '', '', NULL, NULL, NULL, NULL, 1),
(82, 1, 15, 8, 'Our <span>Locations</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sollicitudin tortor, sit amet iaculis nibh. Ut rhoncus metus sollicitudin magna consequat posuere.', NULL, NULL, 1),
(83, 11, 1, 1, 'Employment', '1629710582subbanner1.jpg', '', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wtm.dev2020@gmail.com', '$2y$10$pPPO36QDWU5C5DDpkURhbuMV1rnc/tVD6R9GwnjUk1yaTM7tZoApy', '2021-07-08 01:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `add_module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `add_module`, `edit_module`, `view_module`, `delete_module`) VALUES
(1, 'admin', 'Administrator', '2020-07-07 06:50:45', '2021-02-01 05:45:11', 'test,dashboard,order,transaction,payment_request,earning,page,user', 'test,dashboard,order,transaction,payment_request,earning,page,user', 'test,dashboard,order,transaction,payment_request,earning,page,user', 'test,dashboard,order,transaction,payment_request,earning,page,user'),
(2, 'customer', 'Customer', '2020-07-07 06:50:45', '2021-02-02 03:20:11', 'test', 'test,order,page', 'test,dashboard,order,transaction,page', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `name`, `rank`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEVELOPER', 1, 1, '2021-07-31 15:11:54', '2021-07-31 15:13:05'),
(2, 'Design', 2, 1, '2021-08-01 06:36:19', '2021-08-01 06:36:19'),
(3, 'Graphics', 3, 1, '2021-08-01 06:36:53', '2021-08-01 06:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `service_work`
--

CREATE TABLE `service_work` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_logo`
--

CREATE TABLE `testimonial_logo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(5) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active'', ''2''=>''Deleted Account''',
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `already_logged` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `avatar`, `last_login`, `already_logged`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'admin@admin.com', '2021-07-01 19:30:00', '$2y$10$fafvoHo6AAqo2XOy8HjFq.ENezfr17PcQ7XcZAJ1DWb1wLp1poDeq', NULL, 1, NULL, '2021-08-23 00:58:30', 1, '2021-07-02 05:30:27', '2021-07-02 05:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gs_category`
--
ALTER TABLE `gs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_country`
--
ALTER TABLE `gs_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_email_template`
--
ALTER TABLE `gs_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_forms`
--
ALTER TABLE `gs_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_settings`
--
ALTER TABLE `gs_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_team`
--
ALTER TABLE `gs_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_team_category`
--
ALTER TABLE `gs_team_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_testimonial`
--
ALTER TABLE `gs_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `pages_extra`
--
ALTER TABLE `pages_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(250));

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_work`
--
ALTER TABLE `service_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_logo`
--
ALTER TABLE `testimonial_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_category`
--
ALTER TABLE `gs_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_country`
--
ALTER TABLE `gs_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gs_forms`
--
ALTER TABLE `gs_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gs_settings`
--
ALTER TABLE `gs_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gs_team`
--
ALTER TABLE `gs_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_team_category`
--
ALTER TABLE `gs_team_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_testimonial`
--
ALTER TABLE `gs_testimonial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages_extra`
--
ALTER TABLE `pages_extra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_work`
--
ALTER TABLE `service_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_logo`
--
ALTER TABLE `testimonial_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
