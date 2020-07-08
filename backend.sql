-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 03:44 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `placement_id` int(10) UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `image` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_airport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_box` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_head_office` tinyint(1) NOT NULL DEFAULT '0',
  `is_outside_valley` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `meta_keys` text COLLATE utf8_unicode_ci,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `display_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `slug` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `short_desc` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, NULL, NULL),
(2, 'AO', 'Angola', 1, NULL, NULL),
(3, 'AR', 'Argentina', 1, NULL, NULL),
(4, 'AM', 'Armenia', 1, NULL, NULL),
(5, 'AU', 'Australia', 1, NULL, NULL),
(6, 'AT', 'Austria', 1, NULL, NULL),
(7, 'BH', 'Bahrain', 1, NULL, NULL),
(8, 'BD', 'Bangladesh', 1, NULL, NULL),
(9, 'BY', 'Belarus', 1, NULL, NULL),
(10, 'BE', 'Belgium', 1, NULL, NULL),
(11, 'BT', 'Bhutan', 1, NULL, NULL),
(12, 'B0', 'Bolivia', 1, NULL, NULL),
(13, 'BA', 'Bosnia', 1, NULL, NULL),
(14, 'BR', 'Brazil', 1, NULL, NULL),
(15, 'BN', 'Brunei darussalam', 1, NULL, NULL),
(16, 'BG', 'Bulgaria', 1, NULL, NULL),
(17, 'KH', 'Cambodia', 1, NULL, NULL),
(18, 'CM', 'Cameroon', 1, NULL, NULL),
(19, 'CA', 'Canada', 1, NULL, NULL),
(20, 'CL', 'Chile', 1, NULL, NULL),
(21, 'CN', 'China- peoples rep. of china', 1, NULL, NULL),
(22, 'CO', 'Colombia', 1, NULL, NULL),
(23, 'CR', 'Costa rica', 1, NULL, NULL),
(24, 'HR', 'Croatia', 1, NULL, NULL),
(25, 'CU', 'Cuba', 1, NULL, NULL),
(26, 'CY', 'Cyprus', 1, NULL, NULL),
(27, 'CZ', 'Czech republic', 1, NULL, NULL),
(28, 'KP', 'Dem.peop.rep. of korea', 1, NULL, NULL),
(29, 'DK', 'Denmark', 1, NULL, NULL),
(30, 'EC', 'Ecuador', 1, NULL, NULL),
(31, 'EG', 'Egypt', 1, NULL, NULL),
(32, 'EP', 'Espana', 1, NULL, NULL),
(33, 'EE', 'Estonia', 1, NULL, NULL),
(34, 'ET', 'Ethiopia', 1, NULL, NULL),
(35, 'FJ', 'Fiji', 1, NULL, NULL),
(36, 'FI', 'Finland', 1, NULL, NULL),
(37, 'FR', 'France', 1, NULL, NULL),
(38, 'GE', 'Georgia', 1, NULL, NULL),
(39, 'DE', 'Germany', 1, NULL, NULL),
(40, 'GR', 'Greece', 1, NULL, NULL),
(41, 'HT', 'Haiti', 1, NULL, NULL),
(42, 'HN', 'Honduras', 1, NULL, NULL),
(43, 'HK', 'Hong kong', 1, NULL, NULL),
(44, 'HU', 'Hungary', 1, NULL, NULL),
(45, 'IS', 'Iceland', 1, NULL, NULL),
(46, 'IN', 'India', 1, NULL, NULL),
(47, 'ID', 'Indonesia', 1, NULL, NULL),
(48, 'IR', 'Iran', 1, NULL, NULL),
(49, 'IQ', 'Iraq', 1, NULL, NULL),
(50, 'IE', 'Ireland', 1, NULL, NULL),
(51, 'IL', 'Israel', 1, NULL, NULL),
(52, 'IT', 'Italy', 1, NULL, NULL),
(53, 'JP', 'Japan', 1, NULL, NULL),
(54, 'JO', 'Jordan', 1, NULL, NULL),
(55, 'KZ', 'Kazakhstan', 1, NULL, NULL),
(56, 'KE', 'Kenya', 1, NULL, NULL),
(57, 'KW', 'Kuwait', 1, NULL, NULL),
(58, 'LV', 'Latvia', 1, NULL, NULL),
(59, 'LB', 'Lebanon', 1, NULL, NULL),
(60, 'LT', 'Lithuania', 1, NULL, NULL),
(61, 'LU', 'Luxembourg', 1, NULL, NULL),
(62, 'MO', 'Macau', 1, NULL, NULL),
(63, 'MY', 'Malaysia', 1, NULL, NULL),
(64, 'MV', 'Maldives', 1, NULL, NULL),
(65, 'MT', 'Malta', 1, NULL, NULL),
(66, 'MU', 'Mauritius', 1, NULL, NULL),
(67, 'MX', 'Mexico', 1, NULL, NULL),
(68, 'MN', 'Mongolia', 1, NULL, NULL),
(69, 'MA', 'Morocco', 1, NULL, NULL),
(70, 'MM', 'Myanmar', 1, NULL, NULL),
(71, 'NA', 'Namibia', 1, NULL, NULL),
(72, 'NP', 'Nepal', 1, NULL, NULL),
(73, 'NL', 'Netherlands', 1, NULL, NULL),
(74, 'NZ', 'New zealand', 1, NULL, NULL),
(75, 'NG', 'Nigeria', 1, NULL, NULL),
(76, 'NO', 'Norway', 1, NULL, NULL),
(77, 'OM', 'Oman', 1, NULL, NULL),
(78, 'PK', 'Pakistan', 1, NULL, NULL),
(79, 'PS', 'Palestine', 1, NULL, NULL),
(80, 'PY', 'Paraguay', 1, NULL, NULL),
(81, 'PE', 'Peru', 1, NULL, NULL),
(82, 'PH', 'Philippines', 1, NULL, NULL),
(83, 'PL', 'Poland', 1, NULL, NULL),
(84, 'PT', 'Portugal', 1, NULL, NULL),
(85, 'QA', 'Qatar', 1, NULL, NULL),
(86, 'CD', 'Rep dem of congo', 1, NULL, NULL),
(87, 'MD', 'Rep of moldova', 1, NULL, NULL),
(88, 'AZ', 'Rep. of azerbaijan', 1, NULL, NULL),
(89, 'GT', 'Republic of guatemala', 1, NULL, NULL),
(90, 'KR', 'Republic of korea', 1, NULL, NULL),
(91, 'RO', 'Romania', 1, NULL, NULL),
(92, 'RU', 'Russian federation', 1, NULL, NULL),
(93, 'RW', 'Rwanda', 1, NULL, NULL),
(94, 'SA', 'Saudi arabia', 1, NULL, NULL),
(95, 'SN', 'Senegal', 1, NULL, NULL),
(96, 'CS', 'Serbia and montenegro', 1, NULL, NULL),
(97, 'SG', 'Singapore', 1, NULL, NULL),
(98, 'SK', 'Slovakia', 1, NULL, NULL),
(99, 'SI', 'Slovenia', 1, NULL, NULL),
(100, 'SO', 'Somalia', 1, NULL, NULL),
(101, 'ZA', 'South africa', 1, NULL, NULL),
(102, 'ES', 'Spain', 1, NULL, NULL),
(103, 'LK', 'Sri lanka', 1, NULL, NULL),
(104, 'SE', 'Sweden', 1, NULL, NULL),
(105, 'CH', 'Switzerland', 1, NULL, NULL),
(106, 'SY', 'Syria', 1, NULL, NULL),
(107, 'TW', 'Taiwan', 1, NULL, NULL),
(108, 'TJ', 'Tajikistan', 1, NULL, NULL),
(109, 'TZ', 'Tanzania', 1, NULL, NULL),
(110, 'TH', 'Thailand', 1, NULL, NULL),
(111, 'TO', 'Tonga', 1, NULL, NULL),
(112, 'TN', 'Tunisia', 1, NULL, NULL),
(113, 'TR', 'Turkey', 1, NULL, NULL),
(114, 'TM', 'Turkmenistan', 1, NULL, NULL),
(115, 'UG', 'Uganda', 1, NULL, NULL),
(116, 'UA', 'Ukraine', 1, NULL, NULL),
(117, 'AE', 'United arab emirates', 1, NULL, NULL),
(118, 'UK', 'United kingdom', 1, NULL, NULL),
(119, 'US', 'United states', 1, NULL, NULL),
(120, 'UY', 'Uruguay', 1, NULL, NULL),
(121, 'UZ', 'Uzbekistan', 1, NULL, NULL),
(122, 'VE', 'Venezuela', 1, NULL, NULL),
(123, 'VN', 'Viet nam', 1, NULL, NULL),
(124, 'YE', 'Yemen', 1, NULL, NULL),
(125, 'YU', 'Yugoslavia', 1, NULL, NULL),
(126, 'ZM', 'Zambia', 1, NULL, NULL),
(127, 'ZW', 'Zimbabwe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D',
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_paths`
--

CREATE TABLE `file_paths` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_videos`
--

CREATE TABLE `gallery_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `hotel_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci,
  `website` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `no_rooms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_persons` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 Star', 1, NULL, NULL, NULL),
(2, '2 Star', 1, NULL, NULL, NULL),
(3, '3 Star', 1, NULL, NULL, NULL),
(4, '4 Star', 1, NULL, NULL, NULL),
(5, '5 Star', 1, NULL, NULL, NULL),
(6, '6 Star', 1, NULL, NULL, NULL),
(7, '7 Star', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_markers`
--

CREATE TABLE `map_markers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `display_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'User Type', 2, NULL, NULL, NULL),
(3, 'Destination', 3, NULL, NULL, NULL),
(4, 'Branch', 4, NULL, NULL, NULL),
(6, 'Banners', 6, NULL, NULL, NULL),
(7, 'Notice', 7, NULL, NULL, NULL),
(8, 'Gallery', 8, NULL, NULL, NULL),
(9, 'Video Links', 9, NULL, NULL, NULL),
(10, 'Content', 10, NULL, NULL, NULL),
(11, 'News', 11, NULL, NULL, NULL),
(12, 'Travel Packages', 12, NULL, NULL, NULL),
(13, 'Hotels', 13, NULL, NULL, NULL),
(14, 'Vacancy', 14, NULL, NULL, NULL),
(15, 'Advertisements', 15, NULL, NULL, NULL),
(16, 'Download', 16, NULL, NULL, NULL),
(17, 'Store', 17, NULL, NULL, NULL),
(18, 'Blog', 18, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `published_date` date NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'C',
  `title` text COLLATE utf8_unicode_ci,
  `slug` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `timer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard - Right', NULL, NULL, NULL),
(2, 'Dashboard - Center Top', NULL, NULL, NULL),
(3, 'Dashboard - Center Bottom', NULL, NULL, NULL),
(4, 'Search Result - Outbound', NULL, NULL, NULL),
(5, 'Search Result - Inbound', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_destinations`
--

CREATE TABLE `search_destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `origin_rcd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `key`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Facebook', 'fb_link', '', 1, NULL, NULL, NULL),
(2, 'Google +', 'gplus_link', '', 1, NULL, NULL, NULL),
(3, 'Instagram', 'insta_link', '', 1, NULL, NULL, NULL),
(4, 'Twitter', 'twitter_link', '', 1, NULL, NULL, NULL),
(5, 'Youtube', 'youtube_link', '', 1, NULL, NULL, NULL),
(6, 'Linked In', 'linkedin_link', '', 1, NULL, NULL, NULL),
(7, 'Android App', 'android_app', '', 1, NULL, NULL, NULL),
(8, 'iOS App', 'ios_app', '', 1, NULL, NULL, NULL),
(9, 'Default Gmail Enable', 'gmail_enable', '', 1, NULL, NULL, NULL),
(10, 'Default Gmail Username', 'default_gmail', '', 1, NULL, NULL, NULL),
(11, 'Default Gmail Password', 'default_gmail_password', '', 1, NULL, NULL, NULL),
(12, 'Analytics', 'analytics', '', 1, NULL, NULL, NULL),
(13, 'Live chat', 'live_chat', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `material` text COLLATE utf8_unicode_ci,
  `size` text COLLATE utf8_unicode_ci,
  `fabric` text COLLATE utf8_unicode_ci,
  `other` text COLLATE utf8_unicode_ci,
  `usd` text COLLATE utf8_unicode_ci,
  `npr` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_packages`
--

CREATE TABLE `travel_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `cover_image` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `trip_overview` text COLLATE utf8_unicode_ci,
  `itinerary_details` text COLLATE utf8_unicode_ci,
  `includes_excludes` text COLLATE utf8_unicode_ci,
  `food` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `difficulty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accommodation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_end` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_altitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transportation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `best_season` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_package_dates`
--

CREATE TABLE `travel_package_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `travel_package_id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_package_images`
--

CREATE TABLE `travel_package_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `travel_package_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_package_itineraries`
--

CREATE TABLE `travel_package_itineraries` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `travel_package_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_package_requests`
--

CREATE TABLE `travel_package_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `travel_package_id` int(10) UNSIGNED DEFAULT NULL,
  `travel_package_date_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_persons` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `social_account_type` text COLLATE utf8_unicode_ci NOT NULL,
  `social_account_id` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_social_user_password_changed` tinyint(1) NOT NULL DEFAULT '0',
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_type`, `social_account_type`, `social_account_id`, `user_type_id`, `name`, `first_name`, `middle_name`, `last_name`, `email`, `username`, `password`, `is_social_user_password_changed`, `gender`, `reset_code`, `image`, `activation_token`, `is_active`, `blocked`, `closed`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'N', '', '', 1, 'Amit Shrestha', NULL, NULL, NULL, 'amitshrestha221@gmail.com', 'amitshrestha221@gmail.com', '$2y$10$Teo1LTWzm4kaSvr4W22yO.EksyKGoHPtCT9zSJQc7jHonbrTHPue.', 0, NULL, NULL, '', NULL, 1, 0, 0, '2018-12-20 09:33:11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_accesses`
--

CREATE TABLE `user_accesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `changeStatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_accesses`
--

INSERT INTO `user_accesses` (`id`, `user_type_id`, `module_id`, `view`, `add`, `edit`, `delete`, `changeStatus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(3, 1, 3, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(4, 1, 4, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(6, 1, 6, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(7, 1, 7, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(8, 1, 8, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(9, 1, 9, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(10, 1, 10, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(11, 1, 11, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(12, 1, 12, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(13, 1, 13, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(14, 1, 14, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(15, 1, 15, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(16, 1, 16, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(17, 1, 17, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(18, 1, 18, 1, 1, 1, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Backend User', 1, NULL, NULL),
(2, 'Frontend User', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_order` int(11) DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `designation` text COLLATE utf8_unicode_ci,
  `deadline` date DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_applicants`
--

CREATE TABLE `vacancy_applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `vacancy_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_letter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_type_id` int(10) UNSIGNED NOT NULL,
  `destination_rcd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_pax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_suitcase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_placement_id_foreign` (`placement_id`),
  ADD KEY `advertisements_created_by_foreign` (`created_by`),
  ADD KEY `advertisements_updated_by_foreign` (`updated_by`),
  ADD KEY `advertisements_status_by_foreign` (`status_by`),
  ADD KEY `advertisements_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_created_by_foreign` (`created_by`),
  ADD KEY `banners_updated_by_foreign` (`updated_by`),
  ADD KEY `banners_status_by_foreign` (`status_by`),
  ADD KEY `banners_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_parent_id_foreign` (`parent_id`),
  ADD KEY `contents_created_by_foreign` (`created_by`),
  ADD KEY `contents_updated_by_foreign` (`updated_by`),
  ADD KEY `contents_status_by_foreign` (`status_by`),
  ADD KEY `contents_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinations_created_by_foreign` (`created_by`),
  ADD KEY `destinations_updated_by_foreign` (`updated_by`),
  ADD KEY `destinations_status_by_foreign` (`status_by`),
  ADD KEY `destinations_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_created_by_foreign` (`created_by`),
  ADD KEY `downloads_updated_by_foreign` (`updated_by`),
  ADD KEY `downloads_status_by_foreign` (`status_by`),
  ADD KEY `downloads_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `file_paths`
--
ALTER TABLE `file_paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_created_by_foreign` (`created_by`),
  ADD KEY `galleries_updated_by_foreign` (`updated_by`),
  ADD KEY `galleries_status_by_foreign` (`status_by`),
  ADD KEY `galleries_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `gallery_videos`
--
ALTER TABLE `gallery_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_videos_created_by_foreign` (`created_by`),
  ADD KEY `gallery_videos_updated_by_foreign` (`updated_by`),
  ADD KEY `gallery_videos_status_by_foreign` (`status_by`),
  ADD KEY `gallery_videos_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_hotel_category_id_foreign` (`hotel_category_id`),
  ADD KEY `hotels_created_by_foreign` (`created_by`),
  ADD KEY `hotels_updated_by_foreign` (`updated_by`),
  ADD KEY `hotels_status_by_foreign` (`status_by`),
  ADD KEY `hotels_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_bookings_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_images_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_markers`
--
ALTER TABLE `map_markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_created_by_foreign` (`created_by`),
  ADD KEY `news_updated_by_foreign` (`updated_by`),
  ADD KEY `news_status_by_foreign` (`status_by`),
  ADD KEY `news_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_created_by_foreign` (`created_by`),
  ADD KEY `notices_updated_by_foreign` (`updated_by`),
  ADD KEY `notices_status_by_foreign` (`status_by`),
  ADD KEY `notices_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_destinations`
--
ALTER TABLE `search_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_packages`
--
ALTER TABLE `travel_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_packages_created_by_foreign` (`created_by`),
  ADD KEY `travel_packages_updated_by_foreign` (`updated_by`),
  ADD KEY `travel_packages_status_by_foreign` (`status_by`),
  ADD KEY `travel_packages_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `travel_package_dates`
--
ALTER TABLE `travel_package_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_package_dates_travel_package_id_foreign` (`travel_package_id`);

--
-- Indexes for table `travel_package_images`
--
ALTER TABLE `travel_package_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_package_images_travel_package_id_foreign` (`travel_package_id`);

--
-- Indexes for table `travel_package_itineraries`
--
ALTER TABLE `travel_package_itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_package_itineraries_travel_package_id_foreign` (`travel_package_id`);

--
-- Indexes for table `travel_package_requests`
--
ALTER TABLE `travel_package_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_package_requests_travel_package_id_foreign` (`travel_package_id`),
  ADD KEY `travel_package_requests_travel_package_date_id_foreign` (`travel_package_date_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `user_accesses`
--
ALTER TABLE `user_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_accesses_user_type_id_foreign` (`user_type_id`),
  ADD KEY `user_accesses_module_id_foreign` (`module_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacancies_created_by_foreign` (`created_by`),
  ADD KEY `vacancies_updated_by_foreign` (`updated_by`),
  ADD KEY `vacancies_status_by_foreign` (`status_by`),
  ADD KEY `vacancies_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `vacancy_applicants`
--
ALTER TABLE `vacancy_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacancy_applicants_vacancy_id_foreign` (`vacancy_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_vehicle_type_id_foreign` (`vehicle_type_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_paths`
--
ALTER TABLE `file_paths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_videos`
--
ALTER TABLE `gallery_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hotel_images`
--
ALTER TABLE `hotel_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `map_markers`
--
ALTER TABLE `map_markers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `search_destinations`
--
ALTER TABLE `search_destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_packages`
--
ALTER TABLE `travel_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_package_dates`
--
ALTER TABLE `travel_package_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_package_images`
--
ALTER TABLE `travel_package_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_package_itineraries`
--
ALTER TABLE `travel_package_itineraries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_package_requests`
--
ALTER TABLE `travel_package_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_accesses`
--
ALTER TABLE `user_accesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vacancy_applicants`
--
ALTER TABLE `vacancy_applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `advertisements_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `advertisements_placement_id_foreign` FOREIGN KEY (`placement_id`) REFERENCES `placements` (`id`),
  ADD CONSTRAINT `advertisements_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `advertisements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `banners_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `banners_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `banners_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contents_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contents_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `destinations_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `destinations_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `destinations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `downloads_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `downloads_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `downloads_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_videos`
--
ALTER TABLE `gallery_videos`
  ADD CONSTRAINT `gallery_videos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `gallery_videos_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `gallery_videos_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `gallery_videos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hotels_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hotels_hotel_category_id_foreign` FOREIGN KEY (`hotel_category_id`) REFERENCES `hotel_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotels_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hotels_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `hotel_bookings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD CONSTRAINT `hotel_images_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `news_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `news_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `news_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notices_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notices_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `travel_packages`
--
ALTER TABLE `travel_packages`
  ADD CONSTRAINT `travel_packages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `travel_packages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `travel_packages_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `travel_packages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `travel_package_dates`
--
ALTER TABLE `travel_package_dates`
  ADD CONSTRAINT `travel_package_dates_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travel_package_images`
--
ALTER TABLE `travel_package_images`
  ADD CONSTRAINT `travel_package_images_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travel_package_itineraries`
--
ALTER TABLE `travel_package_itineraries`
  ADD CONSTRAINT `travel_package_itineraries_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travel_package_requests`
--
ALTER TABLE `travel_package_requests`
  ADD CONSTRAINT `travel_package_requests_travel_package_date_id_foreign` FOREIGN KEY (`travel_package_date_id`) REFERENCES `travel_package_dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travel_package_requests_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_accesses`
--
ALTER TABLE `user_accesses`
  ADD CONSTRAINT `user_accesses_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_accesses_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vacancies_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vacancies_status_by_foreign` FOREIGN KEY (`status_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vacancies_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `vacancy_applicants`
--
ALTER TABLE `vacancy_applicants`
  ADD CONSTRAINT `vacancy_applicants_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_vehicle_type_id_foreign` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
