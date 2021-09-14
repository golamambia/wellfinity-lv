-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 07:36 PM
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
-- Database: `wellfinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `blogid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `fullname`, `email`, `message`, `blogid`, `created_at`, `updated_at`) VALUES
(1, 'test', 'demo2@gmail.com', 'good', 21, '2021-09-13 13:15:50', '2021-09-13 13:15:50');

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
  `website` text DEFAULT NULL,
  `fname` varchar(191) DEFAULT NULL,
  `lname` varchar(191) DEFAULT NULL,
  `function` varchar(191) DEFAULT NULL,
  `want` varchar(191) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `book_time` text DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_forms`
--

INSERT INTO `gs_forms` (`id`, `type`, `name`, `email`, `address`, `phone`, `zip`, `state`, `message`, `city`, `reason`, `website`, `fname`, `lname`, `function`, `want`, `resume`, `book_time`, `book_date`, `created_at`, `updated_at`) VALUES
(1, 0, 'Golam Ambia', 'seller@gmail.com', NULL, NULL, NULL, NULL, 'hythtyjy', NULL, NULL, 'bestshopsamb.blogspot.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-09 14:37:45', '2021-09-09 14:37:45'),
(2, 1, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-13 14:02:40', '2021-09-13 14:02:40'),
(3, 1, NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-13 14:04:48', '2021-09-13 14:04:48');

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
(1, 'site.title', 'Site Title', 'Wellfinity', '', 'text', 1, 'Site'),
(2, 'site.logo', 'Site Logo', '1631042437logo.png', '', 'image', 2, 'Site'),
(3, 'admin.pagination', 'Admin Pagination', '25', '', 'text', 1, 'Admin'),
(4, 'site.pagination', 'Front-end Pagination', '10', '', 'text', 1, 'Site'),
(5, 'site.meta_title', 'Meta Title', 'Wellfinity', '', 'text', 1, 'Site'),
(6, 'site.meta_keyword', 'Meta Keyword', 'Wellfinity', '', 'text', 1, 'Site'),
(7, 'site.meta_description', 'Meta Description', 'Wellfinity', '', 'text', 1, 'Site'),
(8, 'site.meta_image', 'Meta Image', '1631042568ftr-logo.png', '', 'image', 1, 'Site'),
(9, 'site.logo2', 'Site Logo 2', '1631042437service-details-icon6.png', '', 'image', 2, 'Site'),
(10, 'site.contact_email', 'Contact Email', 'info@Wellfinity.com', '', 'text', 1, 'Site'),
(11, 'site.support_email', 'Support Email', 'support@gmail.com', '', 'text', 1, 'Site'),
(12, 'site.address', 'Address', 'Building 3, 566 Chiswick High Road, Chiswick, W4 5YA', '', 'text', 1, 'Site'),
(13, 'site.email', 'Site Email', 'info@Wellfinity.com', '', 'text', 1, 'Site'),
(14, 'site.phone', 'Site Phone', '586-949-6220', '', 'text', 1, 'Site'),
(15, 'site.facebook_link', 'Site Facebook', 'https://www.facebook.com/', '', 'text', 1, 'Site'),
(16, 'site.twitter_link', 'Site Twitter', NULL, '', 'text', 1, 'Site'),
(17, 'site.instagram_link', 'Site Instagram', 'https://www.instagram.com/', '', 'text', 1, 'Site'),
(18, 'site.linkedin_link', 'Site Linkedin', NULL, '', 'text', 1, 'Site'),
(19, 'site.message_show_time', 'Site Message Show Time', '10', '', 'text', 1, 'Site'),
(20, 'site.inner_logo', 'Site Inner Page Logo', '1628791540flogo.png', '', 'text', 1, 'Site'),
(21, 'site.footer_logo', 'Site Footer Logo', '1631042437ftr-logo.jpg', '', 'text', 1, 'Site'),
(22, 'site.footer1_content', 'Site Footer1 content', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut', '', 'text', 1, 'Site'),
(25, 'site.address_title', 'Site address Title', 'address of our oﬃce', '', 'text', 1, 'Site'),
(26, 'site.social_title', 'Site Footer3 Title', 'CONNECT WITH US', '', 'text', 1, 'Site'),
(23, 'site.footer_map', 'Site Footer map', NULL, '', 'text', 1, 'Site'),
(24, 'site.footer2_title', 'Site Footer2 Title', 'About Us', '', 'text', 1, 'Site'),
(27, 'site.youtube_link', 'Site Footer4 Title', 'https://www.youtube.com/', '', 'text', 1, 'Site'),
(28, 'site.footer5_title', 'Site Footer5 Title', 'Contact Us', '', 'text', 1, 'Site'),
(29, 'site.pinterest', 'Site Footer5 Sub Title', 'https://in.pinterest.com/', '', 'text', 1, 'Site'),
(30, 'site.withoutbanner_logo', 'Without Banner logo', '1628796135footerbg.jpg', '', '', 1, 'Site'),
(31, 'site.google_analytics', 'Site Google Analytics', NULL, '', '', 0, ''),
(32, 'site.google_body_tag', 'Site Google Body Tag', NULL, '', 'text', 1, 'Site');

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
  `rank` int(10) DEFAULT 0,
  `image` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0''=>''Inactive'', ''1''=>''Active''',
  `rating` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_testimonial`
--

INSERT INTO `gs_testimonial` (`id`, `name`, `designation`, `rank`, `image`, `body`, `status`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Phiwe', 'Srinko', 1, '1631440747hm-testimonial.jpg', '<p>I&#39;ve had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>', 1, '5', '2021-09-12 02:13:10', '2021-09-12 04:29:07'),
(2, 'Phiwe', 'Srinko', 2, '1631440790hm-testimonial.jpg', '<p>I&#39;ve had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>', 1, '5', '2021-09-12 02:13:10', '2021-09-12 04:29:50'),
(3, 'Phiwe', 'Srinko', 3, '1631440807hm-testimonial.jpg', '<p>I&#39;ve had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>', 1, '5', '2021-09-12 02:13:10', '2021-09-12 04:30:07');

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
  `category_id` int(11) DEFAULT 0,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_title`, `body`, `posttype`, `bannerimage`, `bannertext`, `image2`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `parent_id`, `display_in`, `menu_order`, `menu_link`, `page_template`, `job_type`, `category_id`, `location`, `schema_code`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, NULL, 'page', NULL, NULL, NULL, 'home', 'Home', 'Home', 'Home', 0, 3, 1, NULL, 1, NULL, 0, NULL, NULL, '2021-09-07 18:17:19', NULL),
(2, 'About Us', 'About Us', NULL, 'page', NULL, NULL, NULL, 'about', 'About Us', 'About Us', 'About Us', 0, 3, 2, NULL, 2, NULL, 0, NULL, NULL, '2021-09-07 19:41:56', NULL),
(3, 'Services', 'Services', NULL, 'page', NULL, NULL, NULL, 'services', 'Services', 'Services', 'Services', 0, 3, 3, NULL, 3, NULL, 0, NULL, NULL, '2021-09-07 19:43:17', NULL),
(4, 'Blog', 'Blog', NULL, 'page', NULL, NULL, NULL, 'blog', 'Blog', 'Blog', 'Blog', 0, 3, 4, NULL, 4, NULL, NULL, NULL, NULL, '2021-09-07 19:44:14', NULL),
(5, 'Gallery', 'Gallery', NULL, 'page', NULL, NULL, NULL, 'gallery', 'Gallery', 'Gallery', 'Gallery', 0, 3, 5, NULL, 5, NULL, 0, NULL, NULL, '2021-09-07 19:45:38', NULL),
(6, 'Privacy Policy', 'Privacy Policy', NULL, 'page', NULL, NULL, NULL, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 0, 2, 6, NULL, 6, NULL, 0, NULL, NULL, '2021-09-07 19:46:33', NULL),
(7, 'Contact', 'Contact', NULL, 'page', NULL, NULL, NULL, 'contact', 'Contact', 'Contact', 'Contact', 0, 3, 7, NULL, 7, NULL, 0, NULL, NULL, '2021-09-07 19:47:02', NULL),
(8, 'Corporate Wellbeing', 'Corporate Wellbeing', NULL, 'service', NULL, NULL, NULL, 'corporate-wellbeing', 'Corporate Wellbeing', 'Corporate Wellbeing', 'Corporate Wellbeing', 3, 1, 8, NULL, 8, NULL, 0, NULL, NULL, '2021-09-10 12:58:27', NULL),
(9, 'Events', 'Events', NULL, 'service', NULL, NULL, NULL, 'events', 'Events', 'Events', 'Events', 3, 1, 8, NULL, 8, NULL, 0, NULL, NULL, '2021-09-10 13:10:23', NULL),
(10, 'Strategy', 'Strategy', NULL, 'service', NULL, NULL, NULL, 'strategy', 'Strategy', 'Strategy', 'Strategy', 3, 1, 8, NULL, 8, NULL, 0, NULL, NULL, '2021-09-10 13:11:05', NULL),
(11, 'Creative', 'Creative', NULL, 'service', NULL, NULL, NULL, 'creative', 'Creative', 'Creative', 'Creative', 3, 1, 8, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:40:57', NULL),
(12, 'Digital', 'Digital', NULL, 'service', NULL, NULL, NULL, 'digital', 'Digital', 'Digital', 'Digital', 3, 1, 9, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:42:54', NULL),
(13, 'Talks', 'Talks', NULL, 'service', NULL, NULL, NULL, 'talks', 'Talks', 'Talks', 'Talks', 3, 1, 10, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:43:54', NULL),
(14, 'Production', 'Production', NULL, 'service', NULL, NULL, NULL, 'production', 'Production', 'Production', 'Production', 3, 1, 11, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:44:27', NULL),
(15, 'Unleashed', 'Unleashed', NULL, 'service', NULL, NULL, NULL, 'unleashed', 'Unleashed', 'Unleashed', 'Unleashed', 3, 1, 12, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:44:55', NULL),
(16, 'Scribe', 'Scribe', NULL, 'service', NULL, NULL, NULL, 'scribe', 'Scribe', 'Scribe', 'Scribe', 3, 1, 13, NULL, 8, NULL, 0, NULL, NULL, '2021-09-11 14:45:23', NULL),
(18, 'Ten Tips  for Working from Home', '<span>Ten Tips</span> for Working from Home', '<p>Being able to work from home pre-COVID might have seemed like a dream, far preferable to the Monday-Friday office grind.</p>\r\n\r\n<p>Sleeping in, working in pj&rsquo;s, making fresh lunches, saving hours and hundreds of dollars or pounds a month on commutes (actually, always a win!), there&rsquo;s a lot to like about it. Some of us, like the Wellfinity team, are used to working remotely &mdash; making cafes, co-working spaces, gym lounges, restaurants and our homes our very own workspaces.</p>\r\n\r\n<p><strong>1. Team Updates &ndash;</strong> Weekly, bi-weekly, or minimum once a month as a whole team, jump on a group video call to stay motivated. Aside from the work updates, mention more team wins, life milestones anyone has reached or notable events happening in people&rsquo;s lives. You can also create an award system with fun prizes for individual and team accomplishments.</p>\r\n\r\n<p><strong>2. Create Channels &ndash;</strong> lack, among many others, is a great internal messaging tool for setting up specific channels for work. We use channels like <strong>#WellfinityDigital</strong> and <strong>#WellfinityScribe</strong>. You can also create social channels like <strong>#MustLoveDogs, #MovieBuffs, #StrangerThings, #MumWins, #LetsTalkFashion</strong> or <strong>#TryThisFood</strong> &mdash; whatever topics you like to help your team break away from work and get everyone socialising.</p>\r\n\r\n<p><strong>3. Conference Calls and Scenes &ndash;</strong> Show yourself! Being able to see each other&rsquo;s faces helps build and strengthen relationships. When you&rsquo;re not sharing a presentation, be playful and change your background to mountains, Paris or a beach. If you&rsquo;re able to be outside, share where you&rsquo;re at.</p>\r\n\r\n<p><strong>4. Celebrate International / National Days &ndash;</strong> Margarita Day, Pancake Day, Dog Day, there&rsquo;s always something to celebrate! You can also create some sort of competition or game involving the theme. Or you can create your own company days every month, that&rsquo;s an option too!</p>\r\n\r\n<p><strong>5. Random Acts of Kindness &ndash;</strong> Send your co-workers a fun digital note to say thank you, with a gift card, an eBook, or something that supports any personal goals.</p>\r\n\r\n<p><strong>6. Allocate Your Workspace &ndash;</strong> Aim to keep this separate from where you sleep, to avoid mixing your &ldquo;switched on&rdquo; work mode with your place of rest and relaxation. This helps with productivity as much as your downtime.</p>\r\n\r\n<p><strong>7. You Shall Not Pass! &ndash;</strong> Keep work to your 8-4, 9-5 or 6-2 work hours and don&rsquo;t go over them! As tempting as it can be to answer one more email or reply to that last-minute message on Skype or WhatsApp to lighten the load &mdash; leave it for tomorrow.</p>\r\n\r\n<p><strong>8. Do a Little Dance &ndash;</strong> Or move in a way that works for you. Being seated for extended periods can add to your back or hip pain as your muscles tighten up into a locked position. Two-minute breaks every half-hour or 90 minutes to walk in place or around your apartment gets the blood flowing and improves your mood.</p>\r\n\r\n<p><strong>9. Take a Screen Break &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>\r\n\r\n<p><strong>10. End of Week Stats &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>', 'post', '1631467278blog.png', NULL, NULL, 'span-ten-tips-span-for-working-from-home', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 0, 1, 9, '4', 9, NULL, 1, NULL, NULL, '2021-09-12 17:21:18', NULL),
(19, 'Ten Tips  for Working from Home2', '<span>Ten Tips</span> for Working from Home', '<p>Being able to work from home pre-COVID might have seemed like a dream, far preferable to the Monday-Friday office grind.</p>\r\n\r\n<p>Sleeping in, working in pj&rsquo;s, making fresh lunches, saving hours and hundreds of dollars or pounds a month on commutes (actually, always a win!), there&rsquo;s a lot to like about it. Some of us, like the Wellfinity team, are used to working remotely &mdash; making cafes, co-working spaces, gym lounges, restaurants and our homes our very own workspaces.</p>\r\n\r\n<p><strong>1. Team Updates &ndash;</strong> Weekly, bi-weekly, or minimum once a month as a whole team, jump on a group video call to stay motivated. Aside from the work updates, mention more team wins, life milestones anyone has reached or notable events happening in people&rsquo;s lives. You can also create an award system with fun prizes for individual and team accomplishments.</p>\r\n\r\n<p><strong>2. Create Channels &ndash;</strong> lack, among many others, is a great internal messaging tool for setting up specific channels for work. We use channels like <strong>#WellfinityDigital</strong> and <strong>#WellfinityScribe</strong>. You can also create social channels like <strong>#MustLoveDogs, #MovieBuffs, #StrangerThings, #MumWins, #LetsTalkFashion</strong> or <strong>#TryThisFood</strong> &mdash; whatever topics you like to help your team break away from work and get everyone socialising.</p>\r\n\r\n<p><strong>3. Conference Calls and Scenes &ndash;</strong> Show yourself! Being able to see each other&rsquo;s faces helps build and strengthen relationships. When you&rsquo;re not sharing a presentation, be playful and change your background to mountains, Paris or a beach. If you&rsquo;re able to be outside, share where you&rsquo;re at.</p>\r\n\r\n<p><strong>4. Celebrate International / National Days &ndash;</strong> Margarita Day, Pancake Day, Dog Day, there&rsquo;s always something to celebrate! You can also create some sort of competition or game involving the theme. Or you can create your own company days every month, that&rsquo;s an option too!</p>\r\n\r\n<p><strong>5. Random Acts of Kindness &ndash;</strong> Send your co-workers a fun digital note to say thank you, with a gift card, an eBook, or something that supports any personal goals.</p>\r\n\r\n<p><strong>6. Allocate Your Workspace &ndash;</strong> Aim to keep this separate from where you sleep, to avoid mixing your &ldquo;switched on&rdquo; work mode with your place of rest and relaxation. This helps with productivity as much as your downtime.</p>\r\n\r\n<p><strong>7. You Shall Not Pass! &ndash;</strong> Keep work to your 8-4, 9-5 or 6-2 work hours and don&rsquo;t go over them! As tempting as it can be to answer one more email or reply to that last-minute message on Skype or WhatsApp to lighten the load &mdash; leave it for tomorrow.</p>\r\n\r\n<p><strong>8. Do a Little Dance &ndash;</strong> Or move in a way that works for you. Being seated for extended periods can add to your back or hip pain as your muscles tighten up into a locked position. Two-minute breaks every half-hour or 90 minutes to walk in place or around your apartment gets the blood flowing and improves your mood.</p>\r\n\r\n<p><strong>9. Take a Screen Break &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>\r\n\r\n<p><strong>10. End of Week Stats &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>', 'post', '1631467678blog.png', NULL, NULL, 'ten-tips-for-working-from-home2', 'Ten Tips  for Working from Home2', 'Ten Tips  for Working from Home2', 'Ten Tips  for Working from Home2', 0, 1, 10, NULL, 9, NULL, 1, NULL, NULL, '2021-09-12 17:27:58', NULL),
(20, 'Ten Tips  for Working from Home 3', '<span>Ten Tips</span> for Working from Home', '<p>Being able to work from home pre-COVID might have seemed like a dream, far preferable to the Monday-Friday office grind.</p>\r\n\r\n<p>Sleeping in, working in pj&rsquo;s, making fresh lunches, saving hours and hundreds of dollars or pounds a month on commutes (actually, always a win!), there&rsquo;s a lot to like about it. Some of us, like the Wellfinity team, are used to working remotely &mdash; making cafes, co-working spaces, gym lounges, restaurants and our homes our very own workspaces.</p>\r\n\r\n<p><strong>1. Team Updates &ndash;</strong> Weekly, bi-weekly, or minimum once a month as a whole team, jump on a group video call to stay motivated. Aside from the work updates, mention more team wins, life milestones anyone has reached or notable events happening in people&rsquo;s lives. You can also create an award system with fun prizes for individual and team accomplishments.</p>\r\n\r\n<p><strong>2. Create Channels &ndash;</strong> lack, among many others, is a great internal messaging tool for setting up specific channels for work. We use channels like <strong>#WellfinityDigital</strong> and <strong>#WellfinityScribe</strong>. You can also create social channels like <strong>#MustLoveDogs, #MovieBuffs, #StrangerThings, #MumWins, #LetsTalkFashion</strong> or <strong>#TryThisFood</strong> &mdash; whatever topics you like to help your team break away from work and get everyone socialising.</p>\r\n\r\n<p><strong>3. Conference Calls and Scenes &ndash;</strong> Show yourself! Being able to see each other&rsquo;s faces helps build and strengthen relationships. When you&rsquo;re not sharing a presentation, be playful and change your background to mountains, Paris or a beach. If you&rsquo;re able to be outside, share where you&rsquo;re at.</p>\r\n\r\n<p><strong>4. Celebrate International / National Days &ndash;</strong> Margarita Day, Pancake Day, Dog Day, there&rsquo;s always something to celebrate! You can also create some sort of competition or game involving the theme. Or you can create your own company days every month, that&rsquo;s an option too!</p>\r\n\r\n<p><strong>5. Random Acts of Kindness &ndash;</strong> Send your co-workers a fun digital note to say thank you, with a gift card, an eBook, or something that supports any personal goals.</p>\r\n\r\n<p><strong>6. Allocate Your Workspace &ndash;</strong> Aim to keep this separate from where you sleep, to avoid mixing your &ldquo;switched on&rdquo; work mode with your place of rest and relaxation. This helps with productivity as much as your downtime.</p>\r\n\r\n<p><strong>7. You Shall Not Pass! &ndash;</strong> Keep work to your 8-4, 9-5 or 6-2 work hours and don&rsquo;t go over them! As tempting as it can be to answer one more email or reply to that last-minute message on Skype or WhatsApp to lighten the load &mdash; leave it for tomorrow.</p>\r\n\r\n<p><strong>8. Do a Little Dance &ndash;</strong> Or move in a way that works for you. Being seated for extended periods can add to your back or hip pain as your muscles tighten up into a locked position. Two-minute breaks every half-hour or 90 minutes to walk in place or around your apartment gets the blood flowing and improves your mood.</p>\r\n\r\n<p><strong>9. Take a Screen Break &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>\r\n\r\n<p><strong>10. End of Week Stats &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>', 'post', '1631467814blog.png', NULL, NULL, 'ten-tips-for-working-from-home-3', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 0, 1, 11, NULL, 9, NULL, 1, NULL, NULL, '2021-09-12 17:30:14', NULL),
(21, 'Ten Tips  for Working from Home 4', '<span>Ten Tips</span> for Working from Home', '<p>Being able to work from home pre-COVID might have seemed like a dream, far preferable to the Monday-Friday office grind.</p>\r\n\r\n<p>Sleeping in, working in pj&rsquo;s, making fresh lunches, saving hours and hundreds of dollars or pounds a month on commutes (actually, always a win!), there&rsquo;s a lot to like about it. Some of us, like the Wellfinity team, are used to working remotely &mdash; making cafes, co-working spaces, gym lounges, restaurants and our homes our very own workspaces.</p>\r\n\r\n<p><strong>1. Team Updates &ndash;</strong> Weekly, bi-weekly, or minimum once a month as a whole team, jump on a group video call to stay motivated. Aside from the work updates, mention more team wins, life milestones anyone has reached or notable events happening in people&rsquo;s lives. You can also create an award system with fun prizes for individual and team accomplishments.</p>\r\n\r\n<p><strong>2. Create Channels &ndash;</strong> lack, among many others, is a great internal messaging tool for setting up specific channels for work. We use channels like <strong>#WellfinityDigital</strong> and <strong>#WellfinityScribe</strong>. You can also create social channels like <strong>#MustLoveDogs, #MovieBuffs, #StrangerThings, #MumWins, #LetsTalkFashion</strong> or <strong>#TryThisFood</strong> &mdash; whatever topics you like to help your team break away from work and get everyone socialising.</p>\r\n\r\n<p><strong>3. Conference Calls and Scenes &ndash;</strong> Show yourself! Being able to see each other&rsquo;s faces helps build and strengthen relationships. When you&rsquo;re not sharing a presentation, be playful and change your background to mountains, Paris or a beach. If you&rsquo;re able to be outside, share where you&rsquo;re at.</p>\r\n\r\n<p><strong>4. Celebrate International / National Days &ndash;</strong> Margarita Day, Pancake Day, Dog Day, there&rsquo;s always something to celebrate! You can also create some sort of competition or game involving the theme. Or you can create your own company days every month, that&rsquo;s an option too!</p>\r\n\r\n<p><strong>5. Random Acts of Kindness &ndash;</strong> Send your co-workers a fun digital note to say thank you, with a gift card, an eBook, or something that supports any personal goals.</p>\r\n\r\n<p><strong>6. Allocate Your Workspace &ndash;</strong> Aim to keep this separate from where you sleep, to avoid mixing your &ldquo;switched on&rdquo; work mode with your place of rest and relaxation. This helps with productivity as much as your downtime.</p>\r\n\r\n<p><strong>7. You Shall Not Pass! &ndash;</strong> Keep work to your 8-4, 9-5 or 6-2 work hours and don&rsquo;t go over them! As tempting as it can be to answer one more email or reply to that last-minute message on Skype or WhatsApp to lighten the load &mdash; leave it for tomorrow.</p>\r\n\r\n<p><strong>8. Do a Little Dance &ndash;</strong> Or move in a way that works for you. Being seated for extended periods can add to your back or hip pain as your muscles tighten up into a locked position. Two-minute breaks every half-hour or 90 minutes to walk in place or around your apartment gets the blood flowing and improves your mood.</p>\r\n\r\n<p><strong>9. Take a Screen Break &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>\r\n\r\n<p><strong>10. End of Week Stats &ndash;</strong> Disconnect from your laptop, iPad, personal phone, work phone, even television. Step outside, look up at the sky, take a walk in nature, do whatever you like to switch off and just appreciate being in the moment.</p>', 'post', '1631467905blog.png', NULL, NULL, 'ten-tips-for-working-from-home-4', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 'Ten Tips  for Working from Home', 0, 1, 12, NULL, 9, NULL, 1, NULL, NULL, '2021-09-12 17:31:45', NULL);

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
(1, 2, 1, 1, 'We work with companies of all sizes', '1631208248inner-banner-bg.png', '', NULL, NULL, NULL, NULL, 1),
(2, 2, 2, 8, 'How Do <span>We Work</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod                  tempor invidunt ut labore et dolore', NULL, NULL, 1),
(3, 2, 3, 21, 'We <span>Think</span>', '1631208862abt1.png', '', '<p>We believe that people deserve to love what they do, that growing your business should be enjoyable and that organisations should focus on what they do best. We believe that the most successful teams are the ones that have days where they just don&#39;t feel like they&#39;re working.</p>', NULL, NULL, NULL, 1),
(4, 2, 3, 21, 'We <span>Feel</span>', '1631209893abt2.png', '', '<p>We feel happiest when we are excited about what we do, when we share in your experiences and when we work with you towards common goals. We love to be creative and to go the extra mile to be the best we can. We find ways to keep the excitement going in what you do.</p>', NULL, NULL, NULL, 2),
(5, 2, 3, 21, 'We <span>Do</span>', '1631209981abt3.png', '', '<p>We take the time to understand your values and to take care of all the noise so that you can focus on doing what you do best. We do everything we can to facilitate the success of the people we work with. We do more than simply deliver the service.</p>', NULL, NULL, NULL, 3),
(6, 2, 4, 2, 'Let\'s <span>get connected</span>', '', '', NULL, NULL, NULL, NULL, 1),
(7, 2, 4, 6, NULL, '', '', NULL, NULL, 'Send message', NULL, 2),
(8, 2, 4, 3, NULL, '1631211556hm-contact-img.png', '', NULL, NULL, NULL, NULL, 3),
(9, 5, 1, 1, 'Our Gallery', '1631212946inner-banner-bg.png', '', NULL, NULL, NULL, NULL, 1),
(10, 5, 2, 3, NULL, '1631213130gallery1.png', '', NULL, NULL, NULL, NULL, 1),
(11, 5, 2, 3, NULL, '1631213215gallery2.png', '', NULL, NULL, NULL, NULL, 2),
(12, 5, 2, 3, NULL, '1631213215gallery3.png', '', NULL, NULL, NULL, NULL, 3),
(13, 5, 2, 3, NULL, '1631213215gallery4.png', '', NULL, NULL, NULL, NULL, 4),
(14, 5, 2, 3, NULL, '1631213215gallery5.png', '', NULL, NULL, NULL, NULL, 5),
(15, 5, 2, 3, NULL, '1631213215gallery6.png', '', NULL, NULL, NULL, NULL, 6),
(16, 7, 1, 1, 'Connect with us', '1631213893inner-banner-bg.png', '', NULL, NULL, NULL, NULL, 1),
(17, 7, 2, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14746.536057470747!2d88.35307365!3d22.48038355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sin!4v1630266240138!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '', '', NULL, NULL, NULL, NULL, 1),
(18, 7, 3, 8, 'Let\'s <span>get connected</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(19, 7, 3, 6, NULL, '', '', NULL, NULL, 'Send message', NULL, 2),
(20, 3, 1, 1, 'What we Serve', '1631215812inner-banner-bg.png', '', NULL, NULL, NULL, NULL, 1),
(21, 3, 2, 8, 'Our <span>Services</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and                 Our Engorgio Can Prove it!', NULL, NULL, 1),
(22, 3, 3, 7, 'Lorem ipsum dolor sit amet, consetetur sadipscing elit', '', '', NULL, NULL, 'Contact us', 'contact', 1),
(23, 3, 4, 8, 'What our <span>Customer say</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod            tempor invidunt ut labore et dolore', NULL, NULL, 1),
(24, 3, 5, 2, 'Let\'s <span>get connected</span>', '', '', NULL, NULL, NULL, NULL, 1),
(27, 3, 5, 6, NULL, '', '', NULL, NULL, 'Send message', NULL, 2),
(28, 3, 5, 3, NULL, '1631217378hm-contact-img.png', '', NULL, NULL, NULL, NULL, 3),
(29, 8, 1, 11, 'Corporate Wellbeing', '1631373753serv1.png', '1631373753service1.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(30, 9, 1, 11, 'Events', '1631373816serv2.png', '1631373816service2.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(31, 10, 1, 11, 'Corporate Wellbeing', '1631373855serv3.png', '1631373855service3.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(32, 11, 1, 11, 'Corporate Wellbeing', '1631373968serv4.png', '1631373968service4.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(33, 12, 1, 11, 'Corporate Wellbeing', '1631373992serv5.png', '1631373992service5.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(34, 13, 1, 11, 'Corporate Wellbeing', '1631374020serv6.png', '1631374020service6.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(35, 14, 1, 11, 'Corporate Wellbeing', '1631374060serv7.png', '1631374060service7.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(36, 15, 1, 11, 'Corporate Wellbeing', '1631374096serv8.png', '1631374096service8.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(37, 16, 1, 11, 'Corporate Wellbeing', '1631374125serv9.png', '1631374125service9.jpg', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore', NULL, NULL, 1),
(38, 8, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(39, 9, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(40, 10, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(41, 11, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(42, 12, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(43, 13, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(44, 14, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(45, 15, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(46, 16, 2, 23, 'Our Strategy', '1631378142service-details-icon.png', '1631378142service-details.png', '<p>There&rsquo;s no greater feeling than watching your company expand and flourish, and healthy growth starts with a solid strategy. Our talented sales, management and marketing strategists specialize in making that feeling a consistent reality by combining the thoughtful insights with a customized, innovative approach that keeps your business flexible in an ever-changing digital world.</p>\r\n\r\n<p>Has the change in market affected your business?</p>\r\n\r\n<p>Reach out to our incredible marketing team today, we&rsquo;d love to join you on your journey to success!</p>', NULL, 'Get in touch', '#', 1),
(47, 11, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and                   Our Engorgio Can Prove it!', NULL, NULL, 1),
(48, 9, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and                   Our Engorgio Can Prove it!', NULL, NULL, 1),
(49, 10, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(50, 12, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(51, 13, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(52, 14, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(53, 15, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(54, 16, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(55, 8, 3, 8, 'Here\'s What <span>We offer</span>', '', '', NULL, 'We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!', NULL, NULL, 1),
(56, 8, 4, 21, 'Revenue Generation &<br>                   <span>Monetisation</span>', '1631442656service-details-icon1.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(57, 8, 4, 21, 'Revenue Generation &<br>                   <span>Monetisation</span>', '1631442613service-details-icon2.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(58, 8, 4, 21, 'Revenue Generation &<br>                   <span>Monetisation</span>', '1631442613service-details-icon3.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(59, 8, 4, 21, 'Sales & Marketing                  <br>                   <span>Plans</span>', '1631442613service-details-icon4.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(60, 8, 4, 21, 'Management<br>                   <span>Consultancy</span>', '1631442613service-details-icon5.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(61, 8, 4, 21, 'New Business &<br>                 <span>Start UPs</span>', '1631442613service-details-icon6.png', '', '<p>Growing the bottom line is something every business needs. We&#39;ll work with you to identify resources that have been untapped, and explore monetisation strategies to increase revenue into your business</p>', NULL, NULL, NULL, 1),
(62, 1, 1, 10, 'Hello! We are Wellfinity!', '1631384042banner.jpg', '', NULL, 'We’re here to make you fall in love all over again with what you do.', 'Contact Us', 'contact', 1),
(63, 1, 1, 10, 'Hello! We are Wellfinity!', '1631384138banner.jpg', '', NULL, 'We’re here to make you fall in love all over again with what you do.', 'Contact Us', 'contact', 1),
(64, 1, 1, 10, 'Hello! We are Wellfinity!', '1631384138banner.jpg', '', NULL, 'We’re here to make you fall in love all over again with what you do.', 'Contact Us', 'contact', 1),
(65, 1, 2, 8, 'Our <span>Services</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod            tempor invidunt ut labore et dolore', NULL, NULL, 1),
(70, 1, 3, 5, NULL, '', '', NULL, NULL, 'Coffee', '#', 3),
(71, 1, 3, 5, NULL, '', '', NULL, NULL, 'Tea', '#', 2),
(72, 1, 3, 8, 'Grab a <span>virtual drink</span> with us', '', '', NULL, 'Let\'s talk about how we can help', NULL, NULL, 1),
(74, 1, 4, 8, 'What our <span>Customer say</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod          tempor invidunt ut labore et dolore', NULL, NULL, 1),
(75, 1, 5, 2, 'Let\'s <span>get connected</span>', '', '', NULL, NULL, NULL, NULL, 1),
(76, 1, 5, 6, NULL, '', '', NULL, NULL, 'Send message', NULL, 2),
(77, 1, 5, 3, NULL, '1631385169hm-contact-img.png', '', NULL, NULL, NULL, NULL, 3),
(78, 1, 6, 8, 'Our <span>Clients</span>', '', '', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod        tempor invidunt ut labore et dolore', NULL, NULL, 1),
(79, 1, 6, 3, NULL, '1631385310client1.jpg', '', NULL, NULL, NULL, NULL, 2),
(80, 1, 6, 3, NULL, '1631385345client2.jpg', '', NULL, NULL, NULL, NULL, 3),
(81, 1, 6, 3, NULL, '1631385345client3.jpg', '', NULL, NULL, NULL, NULL, 4),
(82, 1, 6, 3, NULL, '1631385345client4.jpg', '', NULL, NULL, NULL, NULL, 5),
(83, 1, 1, 10, 'Hello! We are Wellfinity!', '1631423538banner.jpg', '', NULL, 'We’re here to make you fall in love all over again with what you do.', 'Contact Us', 'contact', 2),
(84, 1, 6, 3, NULL, '1631443095client5.jpg', '', NULL, NULL, NULL, NULL, 6),
(85, 1, 6, 3, NULL, '1631443095client6.jpg', '', NULL, NULL, NULL, NULL, 7),
(86, 1, 6, 3, NULL, '1631443095client7.jpg', '', NULL, NULL, NULL, NULL, 8),
(87, 1, 6, 3, NULL, '1631443095client8.jpg', '', NULL, NULL, NULL, NULL, 9),
(88, 1, 6, 3, NULL, '1631443095client10.jpg', '', NULL, NULL, NULL, NULL, 10),
(89, 1, 6, 3, NULL, '1631443095client11.jpg', '', NULL, NULL, NULL, NULL, 11),
(90, 1, 6, 3, NULL, '1631443095client12.jpg', '', NULL, NULL, NULL, NULL, 12),
(91, 1, 6, 3, NULL, '1631443095client13.jpg', '', NULL, NULL, NULL, NULL, 13),
(92, 1, 6, 3, NULL, '1631443095client14.jpg', '', NULL, NULL, NULL, NULL, 14),
(93, 1, 6, 3, NULL, '1631443095client15.jpg', '', NULL, NULL, NULL, NULL, 15),
(94, 1, 6, 3, NULL, '1631443275client16.jpg', '', NULL, NULL, NULL, NULL, 16),
(95, 1, 6, 3, NULL, '1631443275client17.jpg', '', NULL, NULL, NULL, NULL, 17),
(96, 1, 6, 3, NULL, '1631443275client18.jpg', '', NULL, NULL, NULL, NULL, 18),
(97, 1, 6, 3, NULL, '1631443275client19.jpg', '', NULL, NULL, NULL, NULL, 19),
(98, 1, 6, 3, NULL, '1631443275client20.jpg', '', NULL, NULL, NULL, NULL, 20),
(99, 1, 6, 3, NULL, '1631443275client21.jpg', '', NULL, NULL, NULL, NULL, 21),
(100, 1, 6, 3, NULL, '1631443275client22.jpg', '', NULL, NULL, NULL, NULL, 22),
(101, 1, 6, 3, NULL, '1631443275client23.jpg', '', NULL, NULL, NULL, NULL, 23),
(102, 1, 6, 3, NULL, '1631443275client24.jpg', '', NULL, NULL, NULL, NULL, 24),
(103, 1, 6, 3, NULL, '1631443275client25.jpg', '', NULL, NULL, NULL, NULL, 25),
(104, 1, 6, 3, NULL, '1631443440client26.jpg', '', NULL, NULL, NULL, NULL, 26),
(105, 1, 6, 3, NULL, '1631443440client27.jpg', '', NULL, NULL, NULL, NULL, 27),
(106, 1, 6, 3, NULL, '1631443440client28.jpg', '', NULL, NULL, NULL, NULL, 28),
(107, 1, 6, 3, NULL, '1631443440client29.jpg', '', NULL, NULL, NULL, NULL, 29),
(108, 1, 6, 3, NULL, '1631443440client30.jpg', '', NULL, NULL, NULL, NULL, 30),
(109, 1, 6, 3, NULL, '1631443440client31.jpg', '', NULL, NULL, NULL, NULL, 31),
(110, 1, 6, 3, NULL, '1631443440client32.jpg', '', NULL, NULL, NULL, NULL, 32),
(111, 1, 6, 3, NULL, '1631443440client33.jpg', '', NULL, NULL, NULL, NULL, 33),
(112, 1, 6, 3, NULL, '1631443440client34.jpg', '', NULL, NULL, NULL, NULL, 34),
(113, 1, 6, 3, NULL, '1631443440client35.jpg', '', NULL, NULL, NULL, NULL, 35),
(114, 1, 6, 3, NULL, '1631443440client36.jpg', '', NULL, NULL, NULL, NULL, 36),
(115, 1, 6, 3, NULL, '1631443594client9.jpg', '', NULL, NULL, NULL, NULL, 37),
(118, 4, 1, 1, 'We work with companies of all sizes', '1631468391inner-banner-bg.png', '', NULL, NULL, NULL, NULL, 1),
(119, 4, 2, 8, 'Our <span>Blog</span>', '', '', NULL, 'Keep up to date with our latest blogs, newsletters and top tips! We bring you content from Industry Leaders.', NULL, NULL, 1),
(120, 4, 3, 13, 'About The Blog', '', '', '<p>We&rsquo;ve always got something exciting to share. We&rsquo;ll be bringing you posts around the four pillars of our business, nutrition, fitness, lifestyle, and mindfulness.</p>\r\n\r\n<p>Have an interesting post to share? Get in touch!</p>', NULL, NULL, NULL, 1);

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
(1, 'UNCATEGORIZED', 1, 1, '2021-07-31 15:11:54', '2021-09-12 06:13:45'),
(2, 'Health & Wellness', 2, 1, '2021-08-01 06:36:19', '2021-09-12 06:14:10'),
(3, 'Lifestyle', 3, 1, '2021-08-01 06:36:53', '2021-09-12 06:14:24'),
(4, 'Nutrition', 4, 1, '2021-09-12 06:14:42', '2021-09-12 06:14:42'),
(5, 'Scribe', 5, 1, '2021-09-12 06:14:55', '2021-09-12 06:14:55'),
(6, 'Wellfinity Events', 6, 1, '2021-09-12 06:15:11', '2021-09-12 06:15:11');

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
(1, 1, 'Super Admin', 'admin@admin.com', '2021-07-01 19:30:00', '$2y$10$fafvoHo6AAqo2XOy8HjFq.ENezfr17PcQ7XcZAJ1DWb1wLp1poDeq', NULL, 1, NULL, '2021-09-13 11:07:20', 1, '2021-07-02 05:30:27', '2021-07-02 05:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages_extra`
--
ALTER TABLE `pages_extra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
