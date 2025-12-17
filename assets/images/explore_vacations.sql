-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2025 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explore_vacations`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `key_activities` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_codes`
--

CREATE TABLE `country_codes` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country_codes`
--

INSERT INTO `country_codes` (`id`, `country_name`, `country_code`) VALUES
(1, 'USA', '+1'),
(2, 'Austria', '+43'),
(3, 'Australia', '+61'),
(4, 'Belgium', '+32'),
(5, 'Brazil', '+55'),
(6, 'Bulgaria', '+359'),
(7, 'Bahrain', '+973'),
(8, 'Burkina Faso', '+226'),
(9, 'Burundi', '+257'),
(10, 'Vatican City', '+379'),
(11, 'Cambodia', '+855'),
(12, 'Canada', '+1'),
(13, 'Cape Verde', '+238'),
(14, 'Chile', '+56'),
(15, 'China', '+86'),
(16, 'Colombia', '+57'),
(17, 'Costa Rica', '+506'),
(18, 'Côte d\'Ivoire', '+225'),
(19, 'Cyprus', '+357'),
(20, 'Czech Republic', '+420'),
(21, 'Denmark', '+45'),
(22, 'Djibouti', '+253'),
(23, 'Dominican Republic', '+1'),
(24, 'Ecuador', '+593'),
(25, 'Egypt', '+20'),
(26, 'El Salvador', '+503'),
(27, 'Equatorial Guinea', '+240'),
(28, 'Eritrea', '+291'),
(29, 'Estonia', '+372'),
(30, 'Finland', '+358'),
(31, 'France', '+33'),
(32, 'Germany', '+49'),
(33, 'Ghana', '+233'),
(34, 'Greece', '+30'),
(35, 'Guatemala', '+502'),
(36, 'Guinea', '+224'),
(37, 'Guinea-Bissau', '+245'),
(38, 'Guyana', '+592'),
(39, 'Honduras', '+504'),
(40, 'Hungary', '+36'),
(41, 'Iceland', '+354'),
(42, 'India', '+91'),
(43, 'Indonesia', '+62'),
(44, 'Iraq', '+964'),
(45, 'Ireland', '+353'),
(46, 'Israel', '+972'),
(47, 'Italy', '+39'),
(48, 'Japan', '+81'),
(49, 'Jordan', '+962'),
(50, 'Kenya', '+254'),
(51, 'Kiribati', '+686'),
(52, 'Kuwait', '+965'),
(53, 'Kyrgyzstan', '+996'),
(54, 'Latvia', '+371'),
(55, 'Lebanon', '+961'),
(56, 'Lesotho', '+266'),
(57, 'Liberia', '+231'),
(58, 'Libya', '+218'),
(59, 'Liechtenstein', '+423'),
(60, 'Lithuania', '+370'),
(61, 'Luxembourg', '+352'),
(62, 'Macao', '+853'),
(63, 'North Macedonia', '+389'),
(64, 'Madagascar', '+261'),
(65, 'Malawi', '+265'),
(66, 'Malaysia', '+60'),
(67, 'Maldives', '+960'),
(68, 'Mali', '+223'),
(69, 'Malta', '+356'),
(70, 'Marshall Islands', '+692'),
(71, 'Martinique', '+596'),
(72, 'Mauritania', '+222'),
(73, 'Mauritius', '+230'),
(74, 'Mayotte', '+262'),
(75, 'Mexico', '+52'),
(76, 'Micronesia', '+691'),
(77, 'Moldova', '+373'),
(78, 'Monaco', '+377'),
(79, 'Mongolia', '+976'),
(80, 'Montenegro', '+382'),
(81, 'Montserrat', '+1'),
(82, 'Morocco', '+212'),
(83, 'Mozambique', '+258'),
(84, 'Myanmar', '+95'),
(85, 'Namibia', '+264'),
(86, 'Nauru', '+674'),
(87, 'Nepal', '+977'),
(88, 'Netherlands', '+31'),
(89, 'New Zealand', '+64'),
(90, 'Nicaragua', '+505'),
(91, 'Niger', '+227'),
(92, 'Nigeria', '+234'),
(93, 'Niue', '+683'),
(94, 'Norfolk Island', '+672'),
(95, 'Norway', '+47'),
(96, 'Oman', '+968'),
(97, 'Pakistan', '+92'),
(98, 'Palau', '+680'),
(99, 'Palestine', '+970'),
(100, 'Panama', '+507'),
(101, 'Papua New Guinea', '+675'),
(102, 'Paraguay', '+595'),
(103, 'Peru', '+51'),
(104, 'Philippines', '+63'),
(105, 'Poland', '+48'),
(106, 'Portugal', '+351'),
(107, 'Puerto Rico', '+1787'),
(108, 'Qatar', '+974'),
(109, 'Réunion', '+262'),
(110, 'Romania', '+40'),
(111, 'Russia', '+7'),
(112, 'Rwanda', '+250'),
(113, 'San Marino', '+378'),
(114, 'São Tomé and Príncipe', '+239'),
(115, 'Saudi Arabia', '+966'),
(116, 'Senegal', '+221'),
(117, 'Serbia', '+381'),
(118, 'Seychelles', '+248'),
(119, 'Sierra Leone', '+232'),
(120, 'Singapore', '+65'),
(121, 'Slovakia', '+421'),
(122, 'Slovenia', '+386'),
(123, 'Solomon Islands', '+677'),
(124, 'Somalia', '+252'),
(125, 'South Africa', '+27'),
(126, 'South Korea', '+82'),
(127, 'South Sudan', '+211'),
(128, 'Spain', '+34'),
(129, 'Sri Lanka', '+94'),
(130, 'St. Kitts and Nevis', '+1'),
(131, 'St. Lucia', '+758'),
(132, 'St. Vincent and the Grenadines', '+1'),
(133, 'Suriname', '+597'),
(134, 'Swaziland', '+268'),
(135, 'Sweden', '+46'),
(136, 'Switzerland', '+41'),
(137, 'Syria', '+963'),
(138, 'Tajikistan', '+992'),
(139, 'Tanzania', '+255'),
(140, 'Thailand', '+66'),
(141, 'Timor-Leste', '+670'),
(142, 'Togo', '+228'),
(143, 'Tonga', '+676'),
(144, 'Trinidad and Tobago', '+1'),
(145, 'Tunisia', '+216'),
(146, 'Turkey', '+90'),
(147, 'Turkmenistan', '+993'),
(148, 'Turks and Caicos Islands', '+1'),
(149, 'Tuvalu', '+688'),
(150, 'Uganda', '+256'),
(151, 'Ukraine', '+380'),
(152, 'United Arab Emirates', '+971'),
(153, 'United Kingdom', '+44'),
(154, 'United States', '+1'),
(155, 'Uruguay', '+598'),
(156, 'Uzbekistan', '+998'),
(157, 'Vanuatu', '+678'),
(158, 'Venezuela', '+58'),
(159, 'Vietnam', '+84'),
(160, 'Wallis and Futuna', '+681'),
(161, 'Yemen', '+967'),
(162, 'Zambia', '+260'),
(163, 'Zimbabwe', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`) VALUES
(1, 'Colombo', 1),
(2, 'Gampaha', 1),
(3, 'Kalutara', 1),
(4, 'Kandy', 2),
(5, 'Matale', 2),
(6, 'Nuwara Eliya', 2),
(7, 'Galle', 3),
(8, 'Matara', 3),
(9, 'Hambantota', 3),
(10, 'Jaffna', 4),
(11, 'Kilinochchi', 4),
(12, 'Mullaitivu', 4),
(13, 'Vavuniya', 4),
(14, 'Batticaloa', 5),
(15, 'Ampara', 5),
(16, 'Trincomalee', 5),
(17, 'Kurunegala', 6),
(18, 'Puttalam', 6),
(19, 'Anuradhapura', 7),
(20, 'Polonnaruwa', 7),
(21, 'Badulla', 8),
(22, 'Moneragala', 8),
(23, 'Kegalle', 9),
(24, 'Ratnapura', 9),
(25, 'Mannar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_customer`
--

CREATE TABLE `itinerary_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `theme_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`theme_ids`)),
  `city_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`city_ids`)),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nights` int(10) UNSIGNED NOT NULL,
  `adults` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `children_6_11` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `children_above_11` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `infants` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `hotel_rating` tinyint(3) UNSIGNED NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `allergy_issues` enum('Yes','No') NOT NULL DEFAULT 'No',
  `allergy_reason` varchar(255) DEFAULT NULL,
  `title` varchar(10) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `whatsapp_code` varchar(10) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `flight_number` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `dropoff_location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itinerary_customer`
--

INSERT INTO `itinerary_customer` (`id`, `reference_no`, `theme_ids`, `city_ids`, `start_date`, `end_date`, `nights`, `adults`, `children_6_11`, `children_above_11`, `infants`, `hotel_rating`, `meal_plan`, `allergy_issues`, `allergy_reason`, `title`, `full_name`, `email`, `whatsapp_code`, `whatsapp`, `country`, `nationality`, `flight_number`, `remarks`, `pickup_location`, `dropoff_location`, `created_at`, `updated_at`) VALUES
(1, 'EV-69418A37917B8', '[\"3\"]', '[\"1\",\"23\"]', '2025-12-16', '2025-12-20', 4, 3, 1, 1, 1, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+506', '052863', 'Sri Lanka', 'df', 'dfgdg', 'dfg', 'Galle, Sri Lanka', 'Ratnapura, Sri Lanka', '2025-12-16 16:35:03', '2025-12-16 16:35:03'),
(2, 'EV-69418F824BA28', '[\"3\"]', '[\"1\",\"23\"]', '2025-12-16', '2025-12-20', 4, 2, 2, 2, 2, 4, 'Half Board', 'Yes', 'dfdf', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+506', '0312264215', 'Sri Lanka', 'sdf', 'sdfsdf', 'sdfsdf', 'Galle, Sri Lanka', 'Wattala, Sri Lanka', '2025-12-16 16:57:38', '2025-12-16 16:57:38'),
(3, 'EV-694191E0D9CAF', '[\"3\"]', '[\"1\",\"23\"]', '2025-12-16', '2025-12-19', 3, 2, 0, 1, 0, 4, 'All Inclusive', 'Yes', 'df', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+86', '343244', 'Sri Lanka', '3', 'fs', 'dsf', 'Dambulla, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-16 17:07:44', '2025-12-16 17:07:44'),
(4, 'EV-694194F05FFD5', '[\"8\",\"3\"]', '[\"16\",\"20\",\"9\"]', '2025-12-16', '2025-12-20', 4, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '343244', 'Sri Lanka', 'r', 'w', 'r', 'Negombo, Sri Lanka', 'Kandy, Sri Lanka', '2025-12-16 17:20:48', '2025-12-16 17:20:48'),
(5, 'EV-6941976CC7DBB', '[\"2\"]', '[\"20\",\"2\"]', '2025-12-16', '2025-12-22', 6, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '343244', 'Afghanistan', 'e', 'e', 'e', 'Fort, Colombo, Sri Lanka', 'Ella, Sri Lanka', '2025-12-16 17:31:24', '2025-12-16 17:31:24'),
(6, 'EV-6941991ADD58D', '[\"3\"]', '[\"9\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 1, 0, 0, 3, 'Full Board', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+973', '0312264215', 'Sri Lanka', 'ew', 'wewe', 'fd', 'Gampaha, Sri Lanka', 'Ella, Sri Lanka', '2025-12-16 17:38:34', '2025-12-16 17:38:34'),
(7, 'EV-69419A4B71399', '[\"2\"]', '[\"1\"]', '2025-12-23', '2025-12-26', 3, 2, 0, 0, 0, 3, 'All Inclusive', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+43', '052863', 'Sri Lanka', 'm', 'm', 'k', 'Lanka', 'Maharagama, Sri Lanka', '2025-12-16 17:43:39', '2025-12-16 17:43:39'),
(8, 'EV-69419AB3035C1', '[\"2\"]', '[\"1\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 3, 'All Inclusive', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+32', '0312264215', 'Sri Lanka', 'mm', 'kk', 'kk', 'Kandy, Sri Lanka', 'Kurunegala, Sri Lanka', '2025-12-16 17:45:23', '2025-12-16 17:45:23'),
(9, 'EV-69419B75924E5', '[\"2\"]', '[\"1\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Test', 'navodyadivyanjali2@gmail.com', '+506', '343244', 'Sri Lanka', 'wewe', 'we', 'we', 'Dankotuwa, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-16 17:48:37', '2025-12-16 17:48:37'),
(10, 'EV-694235126BCA6', '[\"2\",\"3\"]', '[\"20\",\"1\"]', '2025-12-24', '2025-12-26', 2, 3, 1, 0, 1, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+61', '052863', 'Sri Lanka', 'ert', 'te', 'ert', 'Galle, Sri Lanka', 'Ratnapura, Sri Lanka', '2025-12-17 04:44:02', '2025-12-17 04:44:02'),
(11, 'EV-69423864E47DD', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '052863', 'Sri Lanka', 'er', 'er', 'er', 'Dambulla, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 04:58:12', '2025-12-17 04:58:12'),
(12, 'EV-6942389262FFE', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '343244', 'Sri Lanka', 'r', 'r', 'r', 'Ragama, Sri Lanka', '42nd Lane, Colombo, Sri Lanka', '2025-12-17 04:58:58', '2025-12-17 04:58:58'),
(13, 'EV-69423A38E383B', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 1, 1, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+61', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 05:06:00', '2025-12-17 05:06:00'),
(14, 'EV-69423BDE7371F', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '052863', 'Sri Lanka', 't', 'w', 't', 'Horana, Sri Lanka', 'Trincomalee, Sri Lanka', '2025-12-17 05:13:02', '2025-12-17 05:13:02'),
(15, 'EV-69423C4A12CB6', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '052863', 'Sri Lanka', 'er', 'er', 'er', 'Eheliyagoda, Sri Lanka', 'Dambulla, Sri Lanka', '2025-12-17 05:14:50', '2025-12-17 05:14:50'),
(16, 'EV-69423E8F750C9', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 05:24:31', '2025-12-17 05:24:31'),
(17, 'EV-69423FCC7974A', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '052863', 'Afghanistan', 'er', 'er', 'er', '36th Lane, Colombo, Sri Lanka', 'Eravur, Sri Lanka', '2025-12-17 05:29:48', '2025-12-17 05:29:48'),
(18, 'EV-6942403CC98A4', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Embilipitiya, Sri Lanka', '36th Lane, Colombo, Sri Lanka', '2025-12-17 05:31:40', '2025-12-17 05:31:40'),
(19, 'EV-694241110BA3D', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '052863', 'Sri Lanka', 'w', 'w', 'w', 'Sigiriya, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 05:35:13', '2025-12-17 05:35:13'),
(20, 'EV-69424229A9E27', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+225', '052863', 'Sri Lanka', 'sf', 'sdf', 'sdf', 'Weligama, Sri Lanka', '3rd Cross Street, Colombo, Sri Lanka', '2025-12-17 05:39:53', '2025-12-17 05:39:53'),
(21, 'EV-694242566375C', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Sigiriya, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 05:40:38', '2025-12-17 05:40:38'),
(22, 'EV-69424324661C9', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Seeduwa, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 05:44:04', '2025-12-17 05:44:04'),
(23, 'EV-694243DD4CC31', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '343244', 'Sri Lanka', 'df', 'df', 'df', 'Ella, Sri Lanka', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', '2025-12-17 05:47:09', '2025-12-17 05:47:09'),
(24, 'EV-694246AD2C826', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+225', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Embilipitiya, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 05:59:09', '2025-12-17 05:59:09'),
(25, 'EV-694246BD474C4', '[\"2\"]', '[\"20\",\"15\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+225', '0312264215', 'Afghanistan', 'df', 'df', 'df', 'Dankotuwa, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 05:59:25', '2025-12-17 05:59:25'),
(26, 'EV-69424798BC207', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Embilipitiya, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 06:03:04', '2025-12-17 06:03:04'),
(27, 'EV-694248A555EE4', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-23', 6, 2, 0, 1, 0, 5, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Seeduwa, Sri Lanka', 'Chilaw, Sri Lanka', '2025-12-17 06:07:33', '2025-12-17 06:07:33'),
(28, 'EV-694249477BD41', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'ds', 'sdf', 'sdf', 'Wellampitiya, Sri Lanka', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', '2025-12-17 06:10:15', '2025-12-17 06:10:15'),
(29, 'EV-69424ADBDEE68', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0759191583', 'Sri Lanka', 'er', 'er', 'er', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 06:16:59', '2025-12-17 06:16:59'),
(30, 'EV-69424B5EA4BC9', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', 'sd', 'Sri Lanka', 'sd', 'sd', 'sd', 'Weligama, Sri Lanka', 'Sigiriya, Sri Lanka', '2025-12-17 06:19:10', '2025-12-17 06:19:10'),
(31, 'EV-69424D234B046', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'ert', 'ert', 'Fort Bus Station, West East Bastian Mawatha, Colombo, Sri Lanka', 'Ragama, Sri Lanka', '2025-12-17 06:26:43', '2025-12-17 06:26:43'),
(32, 'EV-69424F905BCBC', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '052863', 'Sri Lanka', 'er', 'er', 'er', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 06:37:04', '2025-12-17 06:37:04'),
(33, 'EV-694250BDB18B3', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Weligama, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 06:42:05', '2025-12-17 06:42:05'),
(34, 'EV-694250FDE8C46', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'SDTI Campus, High Level Road, Nugegoda, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 06:43:09', '2025-12-17 06:43:09'),
(35, 'EV-694251CB87F66', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Embilipitiya, Sri Lanka', 'Dambulla, Sri Lanka', '2025-12-17 06:46:35', '2025-12-17 06:46:35'),
(36, 'EV-6942526DAFF8E', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'erer', 'er', 'er', 'Ella, Sri Lanka', 'Dambulla, Sri Lanka', '2025-12-17 06:49:17', '2025-12-17 06:49:17'),
(37, 'EV-6942533588C21', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-19', 2, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Dankotuwa, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 06:52:37', '2025-12-17 06:52:37'),
(38, 'EV-694253CB07800', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-27', 10, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Faculty of Engineering - University of Ruhuna, Wakwella Road, Galle, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 06:55:07', '2025-12-17 06:55:07'),
(39, 'EV-6942548CBA818', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-22', 5, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'dg', 'Flower Road, Colombo, Sri Lanka', 'Ratnapura, Sri Lanka', '2025-12-17 06:58:20', '2025-12-17 06:58:20'),
(40, 'EV-69425519B8A0F', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+43', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Eheliyagoda, Sri Lanka', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', '2025-12-17 07:00:41', '2025-12-17 07:00:41'),
(41, 'EV-694255A43D0E3', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-21', 4, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Dankotuwa, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 07:03:00', '2025-12-17 07:03:00'),
(42, 'EV-69425618B4550', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-21', 4, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'sd', 'sd', 'sd', 'Wellampitiya, Sri Lanka', 'Sigiriya, Sri Lanka', '2025-12-17 07:04:56', '2025-12-17 07:04:56'),
(43, 'EV-694256CC7CC4C', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-22', 5, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'er', 'UL-123', 'er', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 07:07:56', '2025-12-17 07:07:56'),
(44, 'EV-6942576EBDA2A', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-22', 5, 2, 0, 0, 0, 3, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Sigiriya, Sri Lanka', 'Dambulla, Sri Lanka', '2025-12-17 07:10:38', '2025-12-17 07:10:38'),
(45, 'EV-69425889CA0B9', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-18', 1, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Sigiriya, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 07:15:21', '2025-12-17 07:15:21'),
(46, 'EV-694258B2D8881', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Sigiriya, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 07:16:02', '2025-12-17 07:16:02'),
(47, 'EV-694258F82EDED', '[\"2\",\"6\"]', '[\"20\",\"9\",\"28\",\"1\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Sigiriya, Sri Lanka', 'Ella, Sri Lanka', '2025-12-17 07:17:12', '2025-12-17 07:17:12'),
(48, 'EV-694259D8524CD', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'er', 'er', 'er', 'Weligama, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 07:20:56', '2025-12-17 07:20:56'),
(49, 'EV-69425A750965F', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 3, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Weligama, Sri Lanka', 'Weligama, Sri Lanka', '2025-12-17 07:23:33', '2025-12-17 07:23:33'),
(50, 'EV-69425ADAF0955', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Sigiriya, Sri Lanka', 'Seeduwa, Sri Lanka', '2025-12-17 07:25:14', '2025-12-17 07:25:14'),
(51, 'EV-69425B72001BD', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-18', 1, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Weligama, Sri Lanka', '2nd Lane, Dehiwala-Mount Lavinia, Sri Lanka', '2025-12-17 07:27:46', '2025-12-17 07:27:46'),
(52, 'EV-69425C6226F05', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+225', '0312264215', 'Sri Lanka', 'we', 'we', 'we', 'Wattala, Sri Lanka', 'Wellampitiya, Sri Lanka', '2025-12-17 07:31:46', '2025-12-17 07:31:46'),
(53, 'EV-69425CD4540F1', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 1, 1, 1, 4, 'Half Board', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '052863', 'Sri Lanka', 'erer', 'er', 'erer', 'Weligama, Sri Lanka', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', '2025-12-17 07:33:40', '2025-12-17 07:33:40'),
(54, 'EV-69425F0C25B44', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-19', 2, 2, 1, 1, 1, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Weligama, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 07:43:08', '2025-12-17 07:43:08'),
(55, 'EV-69425FB97A5AE', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 2, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'er', 'UL-123', 'ert', 'DFC - Data Futsal Club, Old Galle Road, Panadura, Sri Lanka', 'Faculty of Graduate Studies - University of Sri Jayawadenepura, Nugegoda, Sri Lanka', '2025-12-17 07:46:01', '2025-12-17 07:46:01'),
(56, 'EV-6942606B28A84', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'df', 'df', 'df', 'Wattala, Sri Lanka', 'Dambulla, Sri Lanka', '2025-12-17 07:48:59', '2025-12-17 07:48:59'),
(57, 'EV-69426123EB5B1', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-21', 4, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+357', '0312264215', 'Sri Lanka', 'd', 'abc', 'd', 'Dehiwala, Dehiwala-Mount Lavinia, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 07:52:03', '2025-12-17 07:52:03'),
(58, 'EV-694261B5EF0F8', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+32', '0312264215', 'Sri Lanka', 'e', 'e', 'e', 'Weligama, Sri Lanka', 'Embilipitiya, Sri Lanka', '2025-12-17 07:54:29', '2025-12-17 07:54:29'),
(59, 'EV-694262105DFE3', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mrs', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+45', '0312264215', 'Sri Lanka', 'sd', 'sd', 'sd', 'Weligama, Sri Lanka', 'Sigiriya, Sri Lanka', '2025-12-17 07:56:00', '2025-12-17 07:56:00'),
(60, 'EV-694262811CE2F', '[\"2\"]', '[\"4\",\"2\"]', '2025-12-17', '2025-12-20', 3, 2, 0, 0, 0, 4, 'Breakfast Only', 'No', '', 'Mr', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+420', '0312264215', 'Sri Lanka', 'sd', 'sd', 'sd', 'Wellampitiya, Sri Lanka', 'Dankotuwa, Sri Lanka', '2025-12-17 07:57:53', '2025-12-17 07:57:53'),
(61, 'EV-6942698B2B2BF', '[\"2\"]', '[\"20\",\"14\",\"13\",\"7\"]', '2025-12-17', '2025-12-20', 3, 2, 1, 0, 0, 4, 'Full Board', 'No', '', 'Ms', 'Navodya Divyanjali', 'navodyadivyanjali2@gmail.com', '+94', '759191583', 'Sri Lanka', 'Srilankan', 'UL-123', 'Nothing', 'Negombo, Sri Lanka', 'Kandy, Sri Lanka', '2025-12-17 08:27:55', '2025-12-17 08:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_actiondom`
--

CREATE TABLE `modx_access_actiondom` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_category`
--

CREATE TABLE `modx_access_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_context`
--

CREATE TABLE `modx_access_context` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_access_context`
--

INSERT INTO `modx_access_context` (`id`, `target`, `principal_class`, `principal`, `authority`, `policy`) VALUES
(1, 'web', 'MODX\\Revolution\\modUserGroup', 0, 9999, 3),
(2, 'mgr', 'MODX\\Revolution\\modUserGroup', 1, 0, 2),
(3, 'web', 'MODX\\Revolution\\modUserGroup', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_elements`
--

CREATE TABLE `modx_access_elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_media_source`
--

CREATE TABLE `modx_access_media_source` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_menus`
--

CREATE TABLE `modx_access_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_namespace`
--

CREATE TABLE `modx_access_namespace` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_permissions`
--

CREATE TABLE `modx_access_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `template` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `value` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_access_permissions`
--

INSERT INTO `modx_access_permissions` (`id`, `template`, `name`, `description`, `value`) VALUES
(1, 1, 'about', 'perm.about_desc', 1),
(2, 1, 'access_permissions', 'perm.access_permissions_desc', 1),
(3, 1, 'actions', 'perm.actions_desc', 1),
(4, 1, 'change_password', 'perm.change_password_desc', 1),
(5, 1, 'change_profile', 'perm.change_profile_desc', 1),
(6, 1, 'charsets', 'perm.charsets_desc', 1),
(7, 1, 'class_map', 'perm.class_map_desc', 1),
(8, 1, 'components', 'perm.components_desc', 1),
(9, 1, 'content_types', 'perm.content_types_desc', 1),
(10, 1, 'countries', 'perm.countries_desc', 1),
(11, 1, 'create', 'perm.create_desc', 1),
(12, 1, 'credits', 'perm.credits_desc', 1),
(13, 1, 'customize_forms', 'perm.customize_forms_desc', 1),
(14, 1, 'dashboards', 'perm.dashboards_desc', 1),
(15, 1, 'database', 'perm.database_desc', 1),
(16, 1, 'database_truncate', 'perm.database_truncate_desc', 1),
(17, 1, 'delete_category', 'perm.delete_category_desc', 1),
(18, 1, 'delete_chunk', 'perm.delete_chunk_desc', 1),
(19, 1, 'delete_context', 'perm.delete_context_desc', 1),
(20, 1, 'delete_document', 'perm.delete_document_desc', 1),
(21, 1, 'delete_weblink', 'perm.delete_weblink_desc', 1),
(22, 1, 'delete_symlink', 'perm.delete_symlink_desc', 1),
(23, 1, 'delete_static_resource', 'perm.delete_static_resource_desc', 1),
(24, 1, 'delete_eventlog', 'perm.delete_eventlog_desc', 1),
(25, 1, 'delete_plugin', 'perm.delete_plugin_desc', 1),
(26, 1, 'delete_propertyset', 'perm.delete_propertyset_desc', 1),
(27, 1, 'delete_snippet', 'perm.delete_snippet_desc', 1),
(28, 1, 'delete_template', 'perm.delete_template_desc', 1),
(29, 1, 'delete_tv', 'perm.delete_tv_desc', 1),
(30, 1, 'delete_role', 'perm.delete_role_desc', 1),
(31, 1, 'delete_user', 'perm.delete_user_desc', 1),
(32, 1, 'directory_chmod', 'perm.directory_chmod_desc', 1),
(33, 1, 'directory_create', 'perm.directory_create_desc', 1),
(34, 1, 'directory_list', 'perm.directory_list_desc', 1),
(35, 1, 'directory_remove', 'perm.directory_remove_desc', 1),
(36, 1, 'directory_update', 'perm.directory_update_desc', 1),
(37, 1, 'edit_category', 'perm.edit_category_desc', 1),
(38, 1, 'edit_chunk', 'perm.edit_chunk_desc', 1),
(39, 1, 'edit_context', 'perm.edit_context_desc', 1),
(40, 1, 'edit_document', 'perm.edit_document_desc', 1),
(41, 1, 'edit_weblink', 'perm.edit_weblink_desc', 1),
(42, 1, 'edit_symlink', 'perm.edit_symlink_desc', 1),
(43, 1, 'edit_static_resource', 'perm.edit_static_resource_desc', 1),
(44, 1, 'edit_locked', 'perm.edit_locked_desc', 1),
(45, 1, 'edit_plugin', 'perm.edit_plugin_desc', 1),
(46, 1, 'edit_propertyset', 'perm.edit_propertyset_desc', 1),
(47, 1, 'edit_role', 'perm.edit_role_desc', 1),
(48, 1, 'edit_snippet', 'perm.edit_snippet_desc', 1),
(49, 1, 'edit_template', 'perm.edit_template_desc', 1),
(50, 1, 'edit_tv', 'perm.edit_tv_desc', 1),
(51, 1, 'edit_user', 'perm.edit_user_desc', 1),
(52, 1, 'element_tree', 'perm.element_tree_desc', 1),
(53, 1, 'empty_cache', 'perm.empty_cache_desc', 1),
(54, 1, 'error_log_erase', 'perm.error_log_erase_desc', 1),
(55, 1, 'error_log_view', 'perm.error_log_view_desc', 1),
(56, 1, 'export_static', 'perm.export_static_desc', 1),
(57, 1, 'file_create', 'perm.file_create_desc', 1),
(58, 1, 'file_list', 'perm.file_list_desc', 1),
(59, 1, 'file_manager', 'perm.file_manager_desc', 1),
(60, 1, 'file_remove', 'perm.file_remove_desc', 1),
(61, 1, 'file_tree', 'perm.file_tree_desc', 1),
(62, 1, 'file_update', 'perm.file_update_desc', 1),
(63, 1, 'file_upload', 'perm.file_upload_desc', 1),
(64, 1, 'file_unpack', 'perm.file_unpack_desc', 1),
(65, 1, 'file_view', 'perm.file_view_desc', 1),
(66, 1, 'flush_sessions', 'perm.flush_sessions_desc', 1),
(67, 1, 'frames', 'perm.frames_desc', 1),
(68, 1, 'help', 'perm.help_desc', 1),
(69, 1, 'home', 'perm.home_desc', 1),
(70, 1, 'language', 'perm.language_desc', 1),
(71, 1, 'languages', 'perm.languages_desc', 1),
(72, 1, 'lexicons', 'perm.lexicons_desc', 1),
(73, 1, 'list', 'perm.list_desc', 1),
(74, 1, 'load', 'perm.load_desc', 1),
(75, 1, 'logout', 'perm.logout_desc', 1),
(76, 1, 'mgr_log_view', 'perm.mgr_log_view_desc', 1),
(77, 1, 'mgr_log_erase', 'perm.mgr_log_erase_desc', 1),
(78, 1, 'menu_reports', 'perm.menu_reports_desc', 1),
(79, 1, 'menu_security', 'perm.menu_security_desc', 1),
(80, 1, 'menu_site', 'perm.menu_site_desc', 1),
(81, 1, 'menu_support', 'perm.menu_support_desc', 1),
(82, 1, 'menu_system', 'perm.menu_system_desc', 1),
(83, 1, 'menu_tools', 'perm.menu_tools_desc', 1),
(84, 1, 'menu_trash', 'perm.menu_trash_desc', 1),
(85, 1, 'menu_user', 'perm.menu_user_desc', 1),
(86, 1, 'menus', 'perm.menus_desc', 1),
(87, 1, 'messages', 'perm.messages_desc', 1),
(88, 1, 'namespaces', 'perm.namespaces_desc', 1),
(89, 1, 'new_category', 'perm.new_category_desc', 1),
(90, 1, 'new_chunk', 'perm.new_chunk_desc', 1),
(91, 1, 'new_context', 'perm.new_context_desc', 1),
(92, 1, 'new_document', 'perm.new_document_desc', 1),
(93, 1, 'new_static_resource', 'perm.new_static_resource_desc', 1),
(94, 1, 'new_symlink', 'perm.new_symlink_desc', 1),
(95, 1, 'new_weblink', 'perm.new_weblink_desc', 1),
(96, 1, 'new_document_in_root', 'perm.new_document_in_root_desc', 1),
(97, 1, 'new_plugin', 'perm.new_plugin_desc', 1),
(98, 1, 'new_propertyset', 'perm.new_propertyset_desc', 1),
(99, 1, 'new_role', 'perm.new_role_desc', 1),
(100, 1, 'new_snippet', 'perm.new_snippet_desc', 1),
(101, 1, 'new_template', 'perm.new_template_desc', 1),
(102, 1, 'new_tv', 'perm.new_tv_desc', 1),
(103, 1, 'new_user', 'perm.new_user_desc', 1),
(104, 1, 'packages', 'perm.packages_desc', 1),
(105, 1, 'policy_delete', 'perm.policy_delete_desc', 1),
(106, 1, 'policy_edit', 'perm.policy_edit_desc', 1),
(107, 1, 'policy_new', 'perm.policy_new_desc', 1),
(108, 1, 'policy_save', 'perm.policy_save_desc', 1),
(109, 1, 'policy_view', 'perm.policy_view_desc', 1),
(110, 1, 'policy_template_delete', 'perm.policy_template_delete_desc', 1),
(111, 1, 'policy_template_edit', 'perm.policy_template_edit_desc', 1),
(112, 1, 'policy_template_new', 'perm.policy_template_new_desc', 1),
(113, 1, 'policy_template_save', 'perm.policy_template_save_desc', 1),
(114, 1, 'policy_template_view', 'perm.policy_template_view_desc', 1),
(115, 1, 'property_sets', 'perm.property_sets_desc', 1),
(116, 1, 'providers', 'perm.providers_desc', 1),
(117, 1, 'publish_document', 'perm.publish_document_desc', 1),
(118, 1, 'purge_deleted', 'perm.purge_deleted_desc', 1),
(119, 1, 'remove', 'perm.remove_desc', 1),
(120, 1, 'remove_locks', 'perm.remove_locks_desc', 1),
(121, 1, 'resource_duplicate', 'perm.resource_duplicate_desc', 1),
(122, 1, 'resourcegroup_delete', 'perm.resourcegroup_delete_desc', 1),
(123, 1, 'resourcegroup_edit', 'perm.resourcegroup_edit_desc', 1),
(124, 1, 'resourcegroup_new', 'perm.resourcegroup_new_desc', 1),
(125, 1, 'resourcegroup_resource_edit', 'perm.resourcegroup_resource_edit_desc', 1),
(126, 1, 'resourcegroup_resource_list', 'perm.resourcegroup_resource_list_desc', 1),
(127, 1, 'resourcegroup_save', 'perm.resourcegroup_save_desc', 1),
(128, 1, 'resourcegroup_view', 'perm.resourcegroup_view_desc', 1),
(129, 1, 'resource_quick_create', 'perm.resource_quick_create_desc', 1),
(130, 1, 'resource_quick_update', 'perm.resource_quick_update_desc', 1),
(131, 1, 'resource_tree', 'perm.resource_tree_desc', 1),
(132, 1, 'save', 'perm.save_desc', 1),
(133, 1, 'save_category', 'perm.save_category_desc', 1),
(134, 1, 'save_chunk', 'perm.save_chunk_desc', 1),
(135, 1, 'save_context', 'perm.save_context_desc', 1),
(136, 1, 'save_document', 'perm.save_document_desc', 1),
(137, 1, 'save_plugin', 'perm.save_plugin_desc', 1),
(138, 1, 'save_propertyset', 'perm.save_propertyset_desc', 1),
(139, 1, 'save_role', 'perm.save_role_desc', 1),
(140, 1, 'save_snippet', 'perm.save_snippet_desc', 1),
(141, 1, 'save_template', 'perm.save_template_desc', 1),
(142, 1, 'save_tv', 'perm.save_tv_desc', 1),
(143, 1, 'save_user', 'perm.save_user_desc', 1),
(144, 1, 'search', 'perm.search_desc', 1),
(145, 1, 'set_sudo', 'perm.set_sudo_desc', 1),
(146, 1, 'settings', 'perm.settings_desc', 1),
(147, 1, 'events', 'perm.events_desc', 1),
(148, 1, 'source_save', 'perm.source_save_desc', 1),
(149, 1, 'source_delete', 'perm.source_delete_desc', 1),
(150, 1, 'source_edit', 'perm.source_edit_desc', 1),
(151, 1, 'source_view', 'perm.source_view_desc', 1),
(152, 1, 'sources', 'perm.sources_desc', 1),
(153, 1, 'steal_locks', 'perm.steal_locks_desc', 1),
(154, 1, 'tree_show_element_ids', 'perm.tree_show_element_ids_desc', 1),
(155, 1, 'tree_show_resource_ids', 'perm.tree_show_resource_ids_desc', 1),
(156, 1, 'undelete_document', 'perm.undelete_document_desc', 1),
(157, 1, 'unpublish_document', 'perm.unpublish_document_desc', 1),
(158, 1, 'unlock_element_properties', 'perm.unlock_element_properties_desc', 1),
(159, 1, 'usergroup_delete', 'perm.usergroup_delete_desc', 1),
(160, 1, 'usergroup_edit', 'perm.usergroup_edit_desc', 1),
(161, 1, 'usergroup_new', 'perm.usergroup_new_desc', 1),
(162, 1, 'usergroup_save', 'perm.usergroup_save_desc', 1),
(163, 1, 'usergroup_user_edit', 'perm.usergroup_user_edit_desc', 1),
(164, 1, 'usergroup_user_list', 'perm.usergroup_user_list_desc', 1),
(165, 1, 'usergroup_view', 'perm.usergroup_view_desc', 1),
(166, 1, 'view', 'perm.view_desc', 1),
(167, 1, 'view_category', 'perm.view_category_desc', 1),
(168, 1, 'view_chunk', 'perm.view_chunk_desc', 1),
(169, 1, 'view_context', 'perm.view_context_desc', 1),
(170, 1, 'view_document', 'perm.view_document_desc', 1),
(171, 1, 'view_element', 'perm.view_element_desc', 1),
(172, 1, 'view_eventlog', 'perm.view_eventlog_desc', 1),
(173, 1, 'view_offline', 'perm.view_offline_desc', 1),
(174, 1, 'view_plugin', 'perm.view_plugin_desc', 1),
(175, 1, 'view_propertyset', 'perm.view_propertyset_desc', 1),
(176, 1, 'view_role', 'perm.view_role_desc', 1),
(177, 1, 'view_snippet', 'perm.view_snippet_desc', 1),
(178, 1, 'view_sysinfo', 'perm.view_sysinfo_desc', 1),
(179, 1, 'view_template', 'perm.view_template_desc', 1),
(180, 1, 'view_tv', 'perm.view_tv_desc', 1),
(181, 1, 'view_user', 'perm.view_user_desc', 1),
(182, 1, 'view_unpublished', 'perm.view_unpublished_desc', 1),
(183, 1, 'workspaces', 'perm.workspaces_desc', 1),
(184, 2, 'add_children', 'perm.add_children_desc', 1),
(185, 2, 'copy', 'perm.copy_desc', 1),
(186, 2, 'create', 'perm.create_desc', 1),
(187, 2, 'delete', 'perm.delete_desc', 1),
(188, 2, 'list', 'perm.list_desc', 1),
(189, 2, 'load', 'perm.load_desc', 1),
(190, 2, 'move', 'perm.move_desc', 1),
(191, 2, 'publish', 'perm.publish_desc', 1),
(192, 2, 'remove', 'perm.remove_desc', 1),
(193, 2, 'save', 'perm.save_desc', 1),
(194, 2, 'steal_lock', 'perm.steal_lock_desc', 1),
(195, 2, 'undelete', 'perm.undelete_desc', 1),
(196, 2, 'unpublish', 'perm.unpublish_desc', 1),
(197, 2, 'view', 'perm.view_desc', 1),
(198, 3, 'load', 'perm.load_desc', 1),
(199, 3, 'list', 'perm.list_desc', 1),
(200, 3, 'view', 'perm.view_desc', 1),
(201, 3, 'save', 'perm.save_desc', 1),
(202, 3, 'remove', 'perm.remove_desc', 1),
(203, 4, 'add_children', 'perm.add_children_desc', 1),
(204, 4, 'create', 'perm.create_desc', 1),
(205, 4, 'copy', 'perm.copy_desc', 1),
(206, 4, 'delete', 'perm.delete_desc', 1),
(207, 4, 'list', 'perm.list_desc', 1),
(208, 4, 'load', 'perm.load_desc', 1),
(209, 4, 'remove', 'perm.remove_desc', 1),
(210, 4, 'save', 'perm.save_desc', 1),
(211, 4, 'view', 'perm.view_desc', 1),
(212, 5, 'create', 'perm.create_desc', 1),
(213, 5, 'copy', 'perm.copy_desc', 1),
(214, 5, 'list', 'perm.list_desc', 1),
(215, 5, 'load', 'perm.load_desc', 1),
(216, 5, 'remove', 'perm.remove_desc', 1),
(217, 5, 'save', 'perm.save_desc', 1),
(218, 5, 'view', 'perm.view_desc', 1),
(219, 6, 'load', 'perm.load_desc', 1),
(220, 6, 'list', 'perm.list_desc', 1),
(221, 6, 'view', 'perm.view_desc', 1),
(222, 6, 'save', 'perm.save_desc', 1),
(223, 6, 'remove', 'perm.remove_desc', 1),
(224, 6, 'view_unpublished', 'perm.view_unpublished_desc', 1),
(225, 6, 'copy', 'perm.copy_desc', 1),
(226, 7, 'list', 'perm.list_desc', 1),
(227, 7, 'load', 'perm.load_desc', 1),
(228, 7, 'view', 'perm.view_desc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_policies`
--

CREATE TABLE `modx_access_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `template` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `class` varchar(191) NOT NULL DEFAULT '',
  `data` text DEFAULT NULL,
  `lexicon` varchar(255) NOT NULL DEFAULT 'permissions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_access_policies`
--

INSERT INTO `modx_access_policies` (`id`, `name`, `description`, `parent`, `template`, `class`, `data`, `lexicon`) VALUES
(1, 'Resource', 'policy_resource_desc', 0, 2, '', '{\"add_children\":true,\"create\":true,\"copy\":true,\"delete\":true,\"list\":true,\"load\":true,\"move\":true,\"publish\":true,\"remove\":true,\"save\":true,\"steal_lock\":true,\"undelete\":true,\"unpublish\":true,\"view\":true}', 'permissions'),
(2, 'Administrator', 'policy_administrator_desc', 0, 1, '', '{\"about\":true,\"access_permissions\":true,\"actions\":true,\"change_password\":true,\"change_profile\":true,\"charsets\":true,\"class_map\":true,\"components\":true,\"content_types\":true,\"countries\":true,\"create\":true,\"credits\":true,\"customize_forms\":true,\"dashboards\":true,\"database\":true,\"database_truncate\":true,\"delete_category\":true,\"delete_chunk\":true,\"delete_context\":true,\"delete_document\":true,\"delete_eventlog\":true,\"delete_plugin\":true,\"delete_propertyset\":true,\"delete_role\":true,\"delete_snippet\":true,\"delete_static_resource\":true,\"delete_symlink\":true,\"delete_template\":true,\"delete_tv\":true,\"delete_user\":true,\"delete_weblink\":true,\"directory_chmod\":true,\"directory_create\":true,\"directory_list\":true,\"directory_remove\":true,\"directory_update\":true,\"edit_category\":true,\"edit_chunk\":true,\"edit_context\":true,\"edit_document\":true,\"edit_locked\":true,\"edit_plugin\":true,\"edit_propertyset\":true,\"edit_role\":true,\"edit_snippet\":true,\"edit_static_resource\":true,\"edit_symlink\":true,\"edit_template\":true,\"edit_tv\":true,\"edit_user\":true,\"edit_weblink\":true,\"element_tree\":true,\"empty_cache\":true,\"error_log_erase\":true,\"error_log_view\":true,\"events\":true,\"export_static\":true,\"file_create\":true,\"file_list\":true,\"file_manager\":true,\"file_remove\":true,\"file_tree\":true,\"file_unpack\":true,\"file_update\":true,\"file_upload\":true,\"file_view\":true,\"flush_sessions\":true,\"frames\":true,\"help\":true,\"home\":true,\"language\":true,\"languages\":true,\"lexicons\":true,\"list\":true,\"load\":true,\"logout\":true,\"mgr_log_view\":true,\"mgr_log_erase\":true,\"menu_reports\":true,\"menu_security\":true,\"menu_site\":true,\"menu_support\":true,\"menu_system\":true,\"menu_tools\":true,\"menu_trash\":true,\"menu_user\":true,\"menus\":true,\"messages\":true,\"namespaces\":true,\"new_category\":true,\"new_chunk\":true,\"new_context\":true,\"new_document\":true,\"new_document_in_root\":true,\"new_plugin\":true,\"new_propertyset\":true,\"new_role\":true,\"new_snippet\":true,\"new_static_resource\":true,\"new_symlink\":true,\"new_template\":true,\"new_tv\":true,\"new_user\":true,\"new_weblink\":true,\"packages\":true,\"policy_delete\":true,\"policy_edit\":true,\"policy_new\":true,\"policy_save\":true,\"policy_template_delete\":true,\"policy_template_edit\":true,\"policy_template_new\":true,\"policy_template_save\":true,\"policy_template_view\":true,\"policy_view\":true,\"property_sets\":true,\"providers\":true,\"publish_document\":true,\"purge_deleted\":true,\"remove\":true,\"remove_locks\":true,\"resource_duplicate\":true,\"resource_quick_create\":true,\"resource_quick_update\":true,\"resource_tree\":true,\"resourcegroup_delete\":true,\"resourcegroup_edit\":true,\"resourcegroup_new\":true,\"resourcegroup_resource_edit\":true,\"resourcegroup_resource_list\":true,\"resourcegroup_save\":true,\"resourcegroup_view\":true,\"save\":true,\"save_category\":true,\"save_chunk\":true,\"save_context\":true,\"save_document\":true,\"save_plugin\":true,\"save_propertyset\":true,\"save_role\":true,\"save_snippet\":true,\"save_template\":true,\"save_tv\":true,\"save_user\":true,\"search\":true,\"set_sudo\":true,\"settings\":true,\"source_delete\":true,\"source_edit\":true,\"source_save\":true,\"source_view\":true,\"sources\":true,\"steal_locks\":true,\"tree_show_element_ids\":true,\"tree_show_resource_ids\":true,\"undelete_document\":true,\"unlock_element_properties\":true,\"unpublish_document\":true,\"usergroup_delete\":true,\"usergroup_edit\":true,\"usergroup_new\":true,\"usergroup_save\":true,\"usergroup_user_edit\":true,\"usergroup_user_list\":true,\"usergroup_view\":true,\"view\":true,\"view_category\":true,\"view_chunk\":true,\"view_context\":true,\"view_document\":true,\"view_element\":true,\"view_eventlog\":true,\"view_offline\":true,\"view_plugin\":true,\"view_propertyset\":true,\"view_role\":true,\"view_snippet\":true,\"view_sysinfo\":true,\"view_template\":true,\"view_tv\":true,\"view_unpublished\":true,\"view_user\":true,\"workspaces\":true}', 'permissions'),
(3, 'Load Only', 'policy_load_only_desc', 0, 3, '', '{\"load\":true}', 'permissions'),
(4, 'Load, List and View', 'policy_load_list_and_view_desc', 0, 3, '', '{\"load\":true,\"list\":true,\"view\":true}', 'permissions'),
(5, 'Object', 'policy_object_desc', 0, 3, '', '{\"load\":true,\"list\":true,\"view\":true,\"save\":true,\"remove\":true}', 'permissions'),
(6, 'Element', 'policy_element_desc', 0, 4, '', '{\"add_children\":true,\"create\":true,\"delete\":true,\"list\":true,\"load\":true,\"remove\":true,\"save\":true,\"view\":true,\"copy\":true}', 'permissions'),
(7, 'Content Editor', 'policy_content_editor_desc', 0, 1, '', '{\"change_profile\":true,\"class_map\":true,\"countries\":true,\"delete_document\":true,\"delete_static_resource\":true,\"delete_symlink\":true,\"delete_weblink\":true,\"edit_document\":true,\"edit_static_resource\":true,\"edit_symlink\":true,\"edit_weblink\":true,\"frames\":true,\"help\":true,\"home\":true,\"language\":true,\"list\":true,\"load\":true,\"logout\":true,\"menu_reports\":true,\"menu_site\":true,\"menu_support\":true,\"menu_tools\":true,\"menu_user\":true,\"new_document\":true,\"new_static_resource\":true,\"new_symlink\":true,\"new_weblink\":true,\"resource_duplicate\":true,\"resource_tree\":true,\"save_document\":true,\"source_view\":true,\"tree_show_resource_ids\":true,\"view\":true,\"view_document\":true,\"view_template\":true}', 'permissions'),
(8, 'Media Source Admin', 'policy_media_source_admin_desc', 0, 5, '', '{\"create\":true,\"copy\":true,\"load\":true,\"list\":true,\"save\":true,\"remove\":true,\"view\":true}', 'permissions'),
(9, 'Media Source User', 'policy_media_source_user_desc', 0, 5, '', '{\"load\":true,\"list\":true,\"view\":true}', 'permissions'),
(10, 'Developer', 'policy_developer_desc', 0, 1, '', '{\"about\":true,\"change_password\":true,\"change_profile\":true,\"charsets\":true,\"class_map\":true,\"components\":true,\"content_types\":true,\"countries\":true,\"create\":true,\"credits\":true,\"customize_forms\":true,\"dashboards\":true,\"database\":true,\"delete_category\":true,\"delete_chunk\":true,\"delete_context\":true,\"delete_document\":true,\"delete_eventlog\":true,\"delete_plugin\":true,\"delete_propertyset\":true,\"delete_role\":true,\"delete_snippet\":true,\"delete_template\":true,\"delete_tv\":true,\"delete_user\":true,\"directory_chmod\":true,\"directory_create\":true,\"directory_list\":true,\"directory_remove\":true,\"directory_update\":true,\"edit_category\":true,\"edit_chunk\":true,\"edit_context\":true,\"edit_document\":true,\"edit_locked\":true,\"edit_plugin\":true,\"edit_propertyset\":true,\"edit_role\":true,\"edit_snippet\":true,\"edit_static_resource\":true,\"edit_symlink\":true,\"edit_template\":true,\"edit_tv\":true,\"edit_user\":true,\"edit_weblink\":true,\"element_tree\":true,\"empty_cache\":true,\"error_log_erase\":true,\"error_log_view\":true,\"export_static\":true,\"file_create\":true,\"file_list\":true,\"file_manager\":true,\"file_remove\":true,\"file_tree\":true,\"file_unpack\":true,\"file_update\":true,\"file_upload\":true,\"file_view\":true,\"frames\":true,\"help\":true,\"home\":true,\"language\":true,\"languages\":true,\"lexicons\":true,\"list\":true,\"load\":true,\"logout\":true,\"mgr_log_view\":true,\"mgr_log_erase\":true,\"menu_reports\":true,\"menu_site\":true,\"menu_support\":true,\"menu_system\":true,\"menu_tools\":true,\"menu_user\":true,\"menus\":true,\"messages\":true,\"namespaces\":true,\"new_category\":true,\"new_chunk\":true,\"new_context\":true,\"new_document\":true,\"new_document_in_root\":true,\"new_plugin\":true,\"new_propertyset\":true,\"new_role\":true,\"new_snippet\":true,\"new_static_resource\":true,\"new_symlink\":true,\"new_template\":true,\"new_tv\":true,\"new_user\":true,\"new_weblink\":true,\"packages\":true,\"property_sets\":true,\"providers\":true,\"publish_document\":true,\"purge_deleted\":true,\"remove\":true,\"resource_duplicate\":true,\"resource_quick_create\":true,\"resource_quick_update\":true,\"resource_tree\":true,\"save\":true,\"save_category\":true,\"save_chunk\":true,\"save_context\":true,\"save_document\":true,\"save_plugin\":true,\"save_propertyset\":true,\"save_snippet\":true,\"save_template\":true,\"save_tv\":true,\"save_user\":true,\"search\":true,\"settings\":true,\"source_delete\":true,\"source_edit\":true,\"source_save\":true,\"source_view\":true,\"sources\":true,\"tree_show_element_ids\":true,\"tree_show_resource_ids\":true,\"undelete_document\":true,\"unlock_element_properties\":true,\"unpublish_document\":true,\"view\":true,\"view_category\":true,\"view_chunk\":true,\"view_context\":true,\"view_document\":true,\"view_element\":true,\"view_eventlog\":true,\"view_offline\":true,\"view_plugin\":true,\"view_propertyset\":true,\"view_role\":true,\"view_snippet\":true,\"view_sysinfo\":true,\"view_template\":true,\"view_tv\":true,\"view_unpublished\":true,\"view_user\":true,\"workspaces\":true}', 'permissions'),
(11, 'Context', 'policy_context_desc', 0, 6, '', '{\"load\":true,\"list\":true,\"view\":true,\"save\":true,\"remove\":true,\"copy\":true,\"view_unpublished\":true}', 'permissions'),
(12, 'Hidden Namespace', 'policy_hidden_namespace_desc', 0, 7, '', '{\"load\":false,\"list\":false,\"view\":true}', 'permissions');

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_policy_templates`
--

CREATE TABLE `modx_access_policy_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_group` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` mediumtext DEFAULT NULL,
  `lexicon` varchar(255) NOT NULL DEFAULT 'permissions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_access_policy_templates`
--

INSERT INTO `modx_access_policy_templates` (`id`, `template_group`, `name`, `description`, `lexicon`) VALUES
(1, 1, 'AdministratorTemplate', 'policy_template_administrator_desc', 'permissions'),
(2, 3, 'ResourceTemplate', 'policy_template_resource_desc', 'permissions'),
(3, 2, 'ObjectTemplate', 'policy_template_object_desc', 'permissions'),
(4, 4, 'ElementTemplate', 'policy_template_element_desc', 'permissions'),
(5, 5, 'MediaSourceTemplate', 'policy_template_mediasource_desc', 'permissions'),
(6, 7, 'ContextTemplate', 'policy_template_context_desc', 'permissions'),
(7, 6, 'NamespaceTemplate', 'policy_template_namespace_desc', 'permissions');

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_policy_template_groups`
--

CREATE TABLE `modx_access_policy_template_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_access_policy_template_groups`
--

INSERT INTO `modx_access_policy_template_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'policy_template_group_administrator_desc'),
(2, 'Object', 'policy_template_group_object_desc'),
(3, 'Resource', 'policy_template_group_resource_desc'),
(4, 'Element', 'policy_template_group_element_desc'),
(5, 'MediaSource', 'policy_template_group_mediasource_desc'),
(6, 'Namespace', 'policy_template_group_namespace_desc'),
(7, 'Context', 'policy_template_group_context_desc');

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_resources`
--

CREATE TABLE `modx_access_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_resource_groups`
--

CREATE TABLE `modx_access_resource_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_access_templatevars`
--

CREATE TABLE `modx_access_templatevars` (
  `id` int(10) UNSIGNED NOT NULL,
  `target` varchar(100) NOT NULL DEFAULT '',
  `principal_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modPrincipal',
  `principal` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999,
  `policy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_actiondom`
--

CREATE TABLE `modx_actiondom` (
  `id` int(10) UNSIGNED NOT NULL,
  `set` int(11) NOT NULL DEFAULT 0,
  `action` varchar(191) NOT NULL DEFAULT '',
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `xtype` varchar(100) NOT NULL DEFAULT '',
  `container` varchar(255) NOT NULL DEFAULT '',
  `rule` varchar(100) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `constraint` varchar(255) NOT NULL DEFAULT '',
  `constraint_field` varchar(100) NOT NULL DEFAULT '',
  `constraint_class` varchar(100) NOT NULL DEFAULT '',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `for_parent` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_actions_fields`
--

CREATE TABLE `modx_actions_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL DEFAULT 'field',
  `tab` varchar(191) NOT NULL DEFAULT '',
  `form` varchar(255) NOT NULL DEFAULT '',
  `other` varchar(255) NOT NULL DEFAULT '',
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_actions_fields`
--

INSERT INTO `modx_actions_fields` (`id`, `action`, `name`, `type`, `tab`, `form`, `other`, `rank`) VALUES
(1, 'resource/update', 'modx-resource-settings', 'tab', '', 'modx-panel-resource', '', 0),
(2, 'resource/update', 'modx-resource-main-left', 'tab', '', 'modx-panel-resource', '', 1),
(3, 'resource/update', 'id', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 0),
(4, 'resource/update', 'pagetitle', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 1),
(5, 'resource/update', 'alias', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 2),
(6, 'resource/update', 'longtitle', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 3),
(7, 'resource/update', 'description', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 4),
(8, 'resource/update', 'introtext', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 5),
(9, 'resource/update', 'modx-resource-content', 'field', 'modx-resource-content', 'modx-panel-resource', '', 0),
(10, 'resource/update', 'modx-resource-main-right', 'tab', '', 'modx-panel-resource', '', 3),
(11, 'resource/update', 'modx-resource-main-right-top', 'tab', '', 'modx-panel-resource', '', 4),
(12, 'resource/update', 'published', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 0),
(13, 'resource/update', 'deleted', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 1),
(14, 'resource/update', 'publishedon', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 2),
(15, 'resource/update', 'pub_date', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 3),
(16, 'resource/update', 'unpub_date', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 4),
(17, 'resource/update', 'modx-resource-main-right-middle', 'tab', '', 'modx-panel-resource', '', 5),
(18, 'resource/update', 'template', 'field', 'modx-resource-main-right-middle', 'modx-panel-resource', '', 0),
(19, 'resource/update', 'modx-resource-main-right-bottom', 'tab', '', 'modx-panel-resource', '', 6),
(20, 'resource/update', 'hidemenu', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 0),
(21, 'resource/update', 'menutitle', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 1),
(22, 'resource/update', 'link_attributes', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 2),
(23, 'resource/update', 'menuindex', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 3),
(24, 'resource/update', 'modx-page-settings', 'tab', '', 'modx-panel-resource', '', 7),
(25, 'resource/update', 'modx-page-settings-left', 'tab', '', 'modx-panel-resource', '', 8),
(26, 'resource/update', 'class_key', 'field', 'modx-page-settings-left', 'modx-panel-resource', '', 0),
(27, 'resource/update', 'content_type', 'field', 'modx-page-settings-left', 'modx-panel-resource', '', 1),
(28, 'resource/update', 'modx-page-settings-right', 'tab', '', 'modx-panel-resource', '', 9),
(29, 'resource/update', 'parent-cmb', 'field', 'modx-page-settings-right', 'modx-panel-resource', '', 0),
(30, 'resource/update', 'content_dispo', 'field', 'modx-page-settings-right', 'modx-panel-resource', '', 1),
(31, 'resource/update', 'modx-page-settings-box-left', 'tab', '', 'modx-panel-resource', '', 10),
(32, 'resource/update', 'isfolder', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 0),
(33, 'resource/update', 'show_in_tree', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 1),
(34, 'resource/update', 'hide_children_in_tree', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 2),
(35, 'resource/update', 'alias_visible', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 3),
(36, 'resource/update', 'uri_override', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 4),
(37, 'resource/update', 'uri', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 5),
(38, 'resource/update', 'modx-page-settings-box-right', 'tab', '', 'modx-panel-resource', '', 11),
(39, 'resource/update', 'richtext', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 0),
(40, 'resource/update', 'cacheable', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 1),
(41, 'resource/update', 'searchable', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 2),
(42, 'resource/update', 'syncsite', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 3),
(43, 'resource/update', 'modx-panel-resource-tv', 'tab', '', 'modx-panel-resource', 'tv', 12),
(44, 'resource/update', 'modx-resource-access-permissions', 'tab', '', 'modx-panel-resource', '', 13),
(45, 'resource/create', 'modx-resource-settings', 'tab', '', 'modx-panel-resource', '', 0),
(46, 'resource/create', 'modx-resource-main-left', 'tab', '', 'modx-panel-resource', '', 1),
(47, 'resource/create', 'id', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 0),
(48, 'resource/create', 'pagetitle', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 1),
(49, 'resource/create', 'alias', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 2),
(50, 'resource/create', 'longtitle', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 3),
(51, 'resource/create', 'description', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 4),
(52, 'resource/create', 'introtext', 'field', 'modx-resource-main-left', 'modx-panel-resource', '', 5),
(53, 'resource/create', 'modx-resource-content', 'field', 'modx-resource-content', 'modx-panel-resource', '', 0),
(54, 'resource/create', 'modx-resource-main-right', 'tab', '', 'modx-panel-resource', '', 3),
(55, 'resource/create', 'modx-resource-main-right-top', 'tab', '', 'modx-panel-resource', '', 4),
(56, 'resource/create', 'published', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 0),
(57, 'resource/create', 'deleted', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 1),
(58, 'resource/create', 'publishedon', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 2),
(59, 'resource/create', 'pub_date', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 3),
(60, 'resource/create', 'unpub_date', 'field', 'modx-resource-main-right-top', 'modx-panel-resource', '', 4),
(61, 'resource/create', 'modx-resource-main-right-middle', 'tab', '', 'modx-panel-resource', '', 5),
(62, 'resource/create', 'template', 'field', 'modx-resource-main-right-middle', 'modx-panel-resource', '', 0),
(63, 'resource/create', 'modx-resource-main-right-bottom', 'tab', '', 'modx-panel-resource', '', 6),
(64, 'resource/create', 'hidemenu', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 0),
(65, 'resource/create', 'menutitle', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 1),
(66, 'resource/create', 'link_attributes', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 2),
(67, 'resource/create', 'menuindex', 'field', 'modx-resource-main-right-bottom', 'modx-panel-resource', '', 3),
(68, 'resource/create', 'modx-page-settings', 'tab', '', 'modx-panel-resource', '', 7),
(69, 'resource/create', 'modx-page-settings-left', 'tab', '', 'modx-panel-resource', '', 8),
(70, 'resource/create', 'class_key', 'field', 'modx-page-settings-left', 'modx-panel-resource', '', 0),
(71, 'resource/create', 'content_type', 'field', 'modx-page-settings-left', 'modx-panel-resource', '', 1),
(72, 'resource/create', 'modx-page-settings-right', 'tab', '', 'modx-panel-resource', '', 9),
(73, 'resource/create', 'parent-cmb', 'field', 'modx-page-settings-right', 'modx-panel-resource', '', 0),
(74, 'resource/create', 'content_dispo', 'field', 'modx-page-settings-right', 'modx-panel-resource', '', 1),
(75, 'resource/create', 'modx-page-settings-box-left', 'tab', '', 'modx-panel-resource', '', 10),
(76, 'resource/create', 'isfolder', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 0),
(77, 'resource/create', 'show_in_tree', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 1),
(78, 'resource/create', 'hide_children_in_tree', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 2),
(79, 'resource/create', 'alias_visible', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 3),
(80, 'resource/create', 'uri_override', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 4),
(81, 'resource/create', 'uri', 'field', 'modx-page-settings-box-left', 'modx-panel-resource', '', 5),
(82, 'resource/create', 'modx-page-settings-box-right', 'tab', '', 'modx-panel-resource', '', 11),
(83, 'resource/create', 'richtext', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 0),
(84, 'resource/create', 'cacheable', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 1),
(85, 'resource/create', 'searchable', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 2),
(86, 'resource/create', 'syncsite', 'field', 'modx-page-settings-box-right', 'modx-panel-resource', '', 3),
(87, 'resource/create', 'modx-panel-resource-tv', 'tab', '', 'modx-panel-resource', 'tv', 12),
(88, 'resource/create', 'modx-resource-access-permissions', 'tab', '', 'modx-panel-resource', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `modx_active_users`
--

CREATE TABLE `modx_active_users` (
  `internalKey` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `username` varchar(50) NOT NULL DEFAULT '',
  `lasthit` int(20) NOT NULL DEFAULT 0,
  `id` int(10) DEFAULT NULL,
  `action` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_categories`
--

CREATE TABLE `modx_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT 0,
  `category` varchar(45) NOT NULL DEFAULT '',
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_categories_closure`
--

CREATE TABLE `modx_categories_closure` (
  `ancestor` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `descendant` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `depth` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_content_type`
--

CREATE TABLE `modx_content_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` tinytext DEFAULT NULL,
  `mime_type` tinytext DEFAULT NULL,
  `file_extensions` tinytext DEFAULT NULL,
  `icon` tinytext DEFAULT NULL,
  `headers` mediumtext DEFAULT NULL,
  `binary` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_content_type`
--

INSERT INTO `modx_content_type` (`id`, `name`, `description`, `mime_type`, `file_extensions`, `icon`, `headers`, `binary`) VALUES
(1, 'HTML', 'HTML content', 'text/html', '.html', '', NULL, 0),
(2, 'XML', 'XML content', 'text/xml', '.xml', 'icon-xml', NULL, 0),
(3, 'Text', 'Plain text content', 'text/plain', '.txt', 'icon-txt', NULL, 0),
(4, 'CSS', 'CSS content', 'text/css', '.css', 'icon-css', NULL, 0),
(5, 'JavaScript', 'JavaScript content', 'text/javascript', '.js', 'icon-js', NULL, 0),
(6, 'RSS', 'For RSS feeds', 'application/rss+xml', '.rss', 'icon-rss', NULL, 0),
(7, 'JSON', 'JSON', 'application/json', '.json', 'icon-json', NULL, 0),
(8, 'PDF', 'PDF Files', 'application/pdf', '.pdf', 'icon-pdf', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_context`
--

CREATE TABLE `modx_context` (
  `key` varchar(100) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_context`
--

INSERT INTO `modx_context` (`key`, `name`, `description`, `rank`) VALUES
('mgr', 'Manager', 'The default manager or administration context for content management activity.', 0),
('web', 'Website', 'The default front-end context for your web site.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modx_context_resource`
--

CREATE TABLE `modx_context_resource` (
  `context_key` varchar(191) NOT NULL,
  `resource` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_context_setting`
--

CREATE TABLE `modx_context_setting` (
  `context_key` varchar(191) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` mediumtext DEFAULT NULL,
  `xtype` varchar(75) NOT NULL DEFAULT 'textfield',
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `area` varchar(255) NOT NULL DEFAULT '',
  `editedon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_context_setting`
--

INSERT INTO `modx_context_setting` (`context_key`, `key`, `value`, `xtype`, `namespace`, `area`, `editedon`) VALUES
('mgr', 'allow_tags_in_post', '1', 'combo-boolean', 'core', 'system', NULL),
('mgr', 'modRequest.class', 'MODX\\Revolution\\modManagerRequest', 'textfield', 'core', 'system', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modx_dashboard`
--

CREATE TABLE `modx_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `hide_trees` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `customizable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_dashboard`
--

INSERT INTO `modx_dashboard` (`id`, `name`, `description`, `hide_trees`, `customizable`) VALUES
(1, 'Default', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_dashboard_widget`
--

CREATE TABLE `modx_dashboard_widget` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `namespace` varchar(191) NOT NULL DEFAULT '',
  `lexicon` varchar(191) NOT NULL DEFAULT 'core:dashboards',
  `size` varchar(255) NOT NULL DEFAULT 'half',
  `permission` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_dashboard_widget`
--

INSERT INTO `modx_dashboard_widget` (`id`, `name`, `description`, `type`, `content`, `properties`, `namespace`, `lexicon`, `size`, `permission`) VALUES
(1, 'w_newsfeed', 'w_newsfeed_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.modx-news.php', NULL, 'core', 'core:dashboards', 'one-third', ''),
(2, 'w_securityfeed', 'w_securityfeed_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.modx-security.php', NULL, 'core', 'core:dashboards', 'one-third', ''),
(3, 'w_whosonline', 'w_whosonline_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.grid-online.php', NULL, 'core', 'core:dashboards', 'one-third', ''),
(4, 'w_recentlyeditedresources', 'w_recentlyeditedresources_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.grid-rer.php', NULL, 'core', 'core:dashboards', 'two-thirds', 'view_document'),
(5, 'w_configcheck', 'w_configcheck_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.configcheck.php', NULL, 'core', 'core:dashboards', 'full', ''),
(6, 'w_buttons', 'w_buttons_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.buttons.php', '{\"create-resource\":{\"link\":\"[[++manager_url]]?a=resource\\/create\",\"icon\":\"file-o\",\"title\":\"[[%action_new_resource]]\",\"description\":\"[[%action_new_resource_desc]]\"},\"view-site\":{\"link\":\"[[++site_url]]\",\"icon\":\"eye\",\"title\":\"[[%action_view_website]]\",\"description\":\"[[%action_view_website_desc]]\",\"target\":\"_blank\"},\"advanced-search\":{\"link\":\"[[++manager_url]]?a=search\",\"icon\":\"search\",\"title\":\"[[%action_advanced_search]]\",\"description\":\"[[%action_advanced_search_desc]]\"},\"manage-users\":{\"link\":\"[[++manager_url]]?a=security\\/user\",\"icon\":\"user\",\"title\":\"[[%action_manage_users]]\",\"description\":\"[[%action_manage_users_desc]]\"}}', 'core', 'core:dashboards', 'full', ''),
(7, 'w_updates', 'w_updates_desc', 'file', '[[++manager_path]]controllers/default/dashboard/widget.updates.php', NULL, 'core', 'core:dashboards', 'one-third', 'workspaces');

-- --------------------------------------------------------

--
-- Table structure for table `modx_dashboard_widget_placement`
--

CREATE TABLE `modx_dashboard_widget_placement` (
  `user` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `dashboard` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `widget` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rank` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `size` varchar(255) NOT NULL DEFAULT 'half'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_dashboard_widget_placement`
--

INSERT INTO `modx_dashboard_widget_placement` (`user`, `dashboard`, `widget`, `rank`, `size`) VALUES
(0, 1, 1, 2, 'one-third'),
(0, 1, 2, 3, 'one-third'),
(0, 1, 3, 5, 'one-third'),
(0, 1, 4, 6, 'two-thirds'),
(0, 1, 5, 1, 'full'),
(0, 1, 6, 0, 'full'),
(0, 1, 7, 4, 'one-third'),
(1, 1, 1, 2, 'one-third'),
(1, 1, 2, 3, 'one-third'),
(1, 1, 3, 5, 'one-third'),
(1, 1, 4, 6, 'two-thirds'),
(1, 1, 5, 1, 'full'),
(1, 1, 6, 0, 'full'),
(1, 1, 7, 4, 'one-third');

-- --------------------------------------------------------

--
-- Table structure for table `modx_deprecated_call`
--

CREATE TABLE `modx_deprecated_call` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `call_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `caller` varchar(191) NOT NULL DEFAULT '',
  `caller_file` varchar(191) NOT NULL DEFAULT '',
  `caller_line` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_deprecated_call`
--

INSERT INTO `modx_deprecated_call` (`id`, `method`, `call_count`, `caller`, `caller_file`, `caller_line`) VALUES
(1, 1, 4, 'MODX\\Revolution\\Registry\\modRegistry::_initRegister', 'C:\\xampp\\htdocs\\ev\\core\\src\\Revolution\\Registry\\modRegistry.php', 173);

-- --------------------------------------------------------

--
-- Table structure for table `modx_deprecated_method`
--

CREATE TABLE `modx_deprecated_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `definition` varchar(191) NOT NULL DEFAULT '',
  `since` varchar(191) NOT NULL DEFAULT '',
  `recommendation` varchar(1024) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_deprecated_method`
--

INSERT INTO `modx_deprecated_method` (`id`, `definition`, `since`, `recommendation`) VALUES
(1, 'registry.modDbRegister', '3.0', 'Replace references to class registry.modDbRegister with MODX\\Revolution\\Registry\\modDbRegister to take advantage of PSR-4 autoloading.');

-- --------------------------------------------------------

--
-- Table structure for table `modx_documentgroup_names`
--

CREATE TABLE `modx_documentgroup_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `private_memgroup` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `private_webgroup` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_document_groups`
--

CREATE TABLE `modx_document_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `document_group` int(10) NOT NULL DEFAULT 0,
  `document` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_element_property_sets`
--

CREATE TABLE `modx_element_property_sets` (
  `element` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `element_class` varchar(100) NOT NULL DEFAULT '',
  `property_set` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_extension_packages`
--

CREATE TABLE `modx_extension_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `name` varchar(100) NOT NULL DEFAULT 'core',
  `path` text DEFAULT NULL,
  `table_prefix` varchar(255) NOT NULL DEFAULT '',
  `service_class` varchar(255) NOT NULL DEFAULT '',
  `service_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_fc_profiles`
--

CREATE TABLE `modx_fc_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_fc_profiles_usergroups`
--

CREATE TABLE `modx_fc_profiles_usergroups` (
  `usergroup` int(11) NOT NULL DEFAULT 0,
  `profile` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_fc_sets`
--

CREATE TABLE `modx_fc_sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile` int(11) NOT NULL DEFAULT 0,
  `action` varchar(191) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `template` int(11) NOT NULL DEFAULT 0,
  `constraint` varchar(255) NOT NULL DEFAULT '',
  `constraint_field` varchar(100) NOT NULL DEFAULT '',
  `constraint_class` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_lexicon_entries`
--

CREATE TABLE `modx_lexicon_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `topic` varchar(191) NOT NULL DEFAULT 'default',
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `language` varchar(20) NOT NULL DEFAULT 'en',
  `createdon` datetime DEFAULT NULL,
  `editedon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_manager_log`
--

CREATE TABLE `modx_manager_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `occurred` datetime NOT NULL DEFAULT current_timestamp(),
  `action` varchar(100) NOT NULL DEFAULT '',
  `classKey` varchar(100) NOT NULL DEFAULT '',
  `item` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_manager_log`
--

INSERT INTO `modx_manager_log` (`id`, `user`, `occurred`, `action`, `classKey`, `item`) VALUES
(1, 1, '2025-12-16 10:28:26', 'login', 'MODX\\Revolution\\modContext', 'mgr'),
(2, 1, '2025-12-16 10:31:45', 'chunk_create', 'MODX\\Revolution\\modChunk', '1'),
(3, 1, '2025-12-16 10:31:56', 'chunk_create', 'MODX\\Revolution\\modChunk', '2'),
(4, 1, '2025-12-16 10:32:30', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(5, 1, '2025-12-16 10:32:30', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(6, 1, '2025-12-16 10:33:06', 'chunk_create', 'MODX\\Revolution\\modChunk', '3'),
(7, 1, '2025-12-16 10:34:12', 'template_create', 'MODX\\Revolution\\modTemplate', '2'),
(8, 1, '2025-12-16 10:34:24', 'resource_create', 'MODX\\Revolution\\modDocument', '2'),
(9, 1, '2025-12-16 10:34:51', 'resource_update', 'MODX\\Revolution\\modResource', '2'),
(10, 1, '2025-12-16 10:36:08', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(11, 1, '2025-12-16 10:36:56', 'resource_update', 'MODX\\Revolution\\modResource', '2'),
(12, 1, '2025-12-16 10:37:55', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(13, 1, '2025-12-16 10:38:58', 'snippet_create', 'MODX\\Revolution\\modSnippet', '1'),
(14, 1, '2025-12-16 10:39:54', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(15, 1, '2025-12-16 10:40:22', 'snippet_update', 'MODX\\Revolution\\modSnippet', '1'),
(16, 1, '2025-12-16 10:40:22', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 1 Default'),
(17, 1, '2025-12-16 10:40:41', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(18, 1, '2025-12-16 10:42:23', 'snippet_update', 'MODX\\Revolution\\modSnippet', '1'),
(19, 1, '2025-12-16 10:42:24', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 1 Default'),
(20, 1, '2025-12-16 10:43:03', 'chunk_update', 'MODX\\Revolution\\modChunk', '3'),
(21, 1, '2025-12-16 10:43:04', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 3 Default'),
(22, 1, '2025-12-16 10:44:12', 'chunk_update', 'MODX\\Revolution\\modChunk', '3'),
(23, 1, '2025-12-16 10:44:13', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 3 Default'),
(24, 1, '2025-12-16 10:44:24', 'chunk_update', 'MODX\\Revolution\\modChunk', '3'),
(25, 1, '2025-12-16 10:44:24', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 3 Default'),
(26, 1, '2025-12-16 10:44:44', 'snippet_update', 'MODX\\Revolution\\modSnippet', '1'),
(27, 1, '2025-12-16 10:44:45', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 1 Default'),
(28, 1, '2025-12-16 10:47:39', 'snippet_update', 'MODX\\Revolution\\modSnippet', '1'),
(29, 1, '2025-12-16 10:47:39', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 1 Default'),
(30, 1, '2025-12-16 10:48:45', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(31, 1, '2025-12-16 10:49:12', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(32, 1, '2025-12-16 10:49:33', 'snippet_update', 'MODX\\Revolution\\modSnippet', '1'),
(33, 1, '2025-12-16 10:49:33', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 1 Default'),
(34, 1, '2025-12-16 10:51:10', 'snippet_create', 'MODX\\Revolution\\modSnippet', '2'),
(35, 1, '2025-12-16 10:52:10', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(36, 1, '2025-12-16 10:53:54', 'snippet_update', 'MODX\\Revolution\\modSnippet', '2'),
(37, 1, '2025-12-16 10:53:55', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 2 Default'),
(38, 1, '2025-12-16 10:54:09', 'snippet_update', 'MODX\\Revolution\\modSnippet', '2'),
(39, 1, '2025-12-16 10:54:10', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 2 Default'),
(40, 1, '2025-12-16 10:55:27', 'resource_update', 'MODX\\Revolution\\modResource', '2'),
(41, 1, '2025-12-16 10:55:34', 'resource_update', 'MODX\\Revolution\\modResource', '2'),
(42, 1, '2025-12-16 10:56:11', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(43, 1, '2025-12-16 10:56:11', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(44, 1, '2025-12-16 10:57:30', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(45, 1, '2025-12-16 10:57:51', 'chunk_update', 'MODX\\Revolution\\modChunk', '3'),
(46, 1, '2025-12-16 10:57:51', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 3 Default'),
(47, 1, '2025-12-16 10:59:08', 'resource_create', 'MODX\\Revolution\\modDocument', '3'),
(48, 1, '2025-12-16 10:59:41', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(49, 1, '2025-12-16 10:59:55', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(50, 1, '2025-12-16 10:59:55', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(51, 1, '2025-12-16 11:00:53', 'snippet_create', 'MODX\\Revolution\\modSnippet', '3'),
(52, 1, '2025-12-16 11:01:21', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(53, 1, '2025-12-16 11:01:54', 'snippet_update', 'MODX\\Revolution\\modSnippet', '3'),
(54, 1, '2025-12-16 11:01:54', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 3 Default'),
(55, 1, '2025-12-16 11:02:00', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(56, 1, '2025-12-16 11:02:05', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(57, 1, '2025-12-16 11:02:18', 'resource_create', 'MODX\\Revolution\\modDocument', '4'),
(58, 1, '2025-12-16 11:02:44', 'resource_update', 'MODX\\Revolution\\modResource', '4'),
(59, 1, '2025-12-16 11:02:47', 'resource_update', 'MODX\\Revolution\\modResource', '4'),
(60, 1, '2025-12-16 11:03:03', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(61, 1, '2025-12-16 11:03:03', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(62, 1, '2025-12-16 11:03:16', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(63, 1, '2025-12-16 11:03:17', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(64, 1, '2025-12-16 11:03:48', 'resource_update', 'MODX\\Revolution\\modResource', '4'),
(65, 1, '2025-12-16 11:04:04', 'resource_create', 'MODX\\Revolution\\modDocument', '5'),
(66, 1, '2025-12-16 11:04:22', 'resource_update', 'MODX\\Revolution\\modResource', '5'),
(67, 1, '2025-12-16 11:04:36', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(68, 1, '2025-12-16 11:04:37', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(69, 1, '2025-12-16 11:04:55', 'resource_create', 'MODX\\Revolution\\modDocument', '6'),
(70, 1, '2025-12-16 11:05:12', 'resource_update', 'MODX\\Revolution\\modResource', '6'),
(71, 1, '2025-12-16 11:05:35', 'resource_update', 'MODX\\Revolution\\modResource', '5'),
(72, 1, '2025-12-16 11:05:53', 'resource_create', 'MODX\\Revolution\\modDocument', '7'),
(73, 1, '2025-12-16 11:06:44', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(74, 1, '2025-12-16 11:06:58', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(75, 1, '2025-12-16 11:06:58', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(76, 1, '2025-12-16 11:07:37', 'snippet_create', 'MODX\\Revolution\\modSnippet', '4'),
(77, 1, '2025-12-16 11:08:01', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(78, 1, '2025-12-16 11:08:32', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(79, 1, '2025-12-16 11:08:32', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(80, 1, '2025-12-16 11:08:54', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(81, 1, '2025-12-16 11:10:29', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(82, 1, '2025-12-16 11:12:18', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(83, 1, '2025-12-16 11:12:18', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(84, 1, '2025-12-16 11:12:44', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(85, 1, '2025-12-16 11:12:44', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(86, 1, '2025-12-16 11:12:54', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(87, 1, '2025-12-16 11:12:55', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(88, 1, '2025-12-16 11:13:31', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(89, 1, '2025-12-16 11:13:31', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(90, 1, '2025-12-16 11:13:58', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(91, 1, '2025-12-16 11:13:58', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(92, 1, '2025-12-16 11:14:38', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(93, 1, '2025-12-16 11:18:11', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(94, 1, '2025-12-16 11:18:46', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(95, 1, '2025-12-16 11:19:21', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(96, 1, '2025-12-16 11:20:09', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(97, 1, '2025-12-16 11:20:10', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(98, 1, '2025-12-16 11:20:48', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(99, 1, '2025-12-16 11:21:42', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(100, 1, '2025-12-16 11:21:42', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(101, 1, '2025-12-16 11:23:05', 'resource_update', 'MODX\\Revolution\\modResource', '7'),
(102, 1, '2025-12-16 11:23:09', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(103, 1, '2025-12-16 11:23:10', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(104, 1, '2025-12-16 11:24:06', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(105, 1, '2025-12-16 11:24:06', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(106, 1, '2025-12-16 11:27:15', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(107, 1, '2025-12-16 11:27:15', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(108, 1, '2025-12-16 11:27:45', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(109, 1, '2025-12-16 11:27:45', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(110, 1, '2025-12-16 11:31:23', 'resource_create', 'MODX\\Revolution\\modDocument', '8'),
(111, 1, '2025-12-16 11:32:34', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(112, 1, '2025-12-16 11:33:55', 'snippet_create', 'MODX\\Revolution\\modSnippet', '5'),
(113, 1, '2025-12-16 11:34:14', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(114, 1, '2025-12-16 11:34:21', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(115, 1, '2025-12-16 11:34:50', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(116, 1, '2025-12-16 11:35:20', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(117, 1, '2025-12-16 11:35:21', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(118, 1, '2025-12-16 11:36:07', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(119, 1, '2025-12-16 11:40:03', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(120, 1, '2025-12-16 11:41:07', 'snippet_update', 'MODX\\Revolution\\modSnippet', '3'),
(121, 1, '2025-12-16 11:41:07', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 3 Default'),
(122, 1, '2025-12-16 11:43:00', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(123, 1, '2025-12-16 11:43:58', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(124, 1, '2025-12-16 11:43:58', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(125, 1, '2025-12-16 11:48:27', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(126, 1, '2025-12-16 11:50:37', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(127, 1, '2025-12-16 11:50:37', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(128, 1, '2025-12-16 11:50:46', 'resource_update', 'MODX\\Revolution\\modResource', '8'),
(129, 1, '2025-12-16 12:04:38', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(130, 1, '2025-12-16 12:04:38', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(131, 1, '2025-12-16 12:14:47', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(132, 1, '2025-12-16 12:15:34', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(133, 1, '2025-12-16 12:16:37', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(134, 1, '2025-12-16 12:17:57', 'resource_update', 'MODX\\Revolution\\modResource', '3'),
(135, 1, '2025-12-16 12:18:50', 'resource_create', 'MODX\\Revolution\\modDocument', '9'),
(136, 1, '2025-12-16 12:19:58', 'resource_update', 'MODX\\Revolution\\modResource', '9'),
(137, 1, '2025-12-16 12:20:00', 'resource_update', 'MODX\\Revolution\\modResource', '9'),
(138, 1, '2025-12-16 12:20:31', 'snippet_create', 'MODX\\Revolution\\modSnippet', '6'),
(139, 1, '2025-12-16 12:20:49', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(140, 1, '2025-12-16 12:20:49', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(141, 1, '2025-12-16 12:22:38', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(142, 1, '2025-12-16 12:22:39', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(143, 1, '2025-12-16 12:26:34', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(144, 1, '2025-12-16 12:26:35', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(145, 1, '2025-12-16 12:27:28', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(146, 1, '2025-12-16 12:27:28', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(147, 1, '2025-12-16 12:28:01', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(148, 1, '2025-12-16 12:28:01', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(149, 1, '2025-12-16 12:28:51', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(150, 1, '2025-12-16 12:28:51', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(151, 1, '2025-12-16 12:31:35', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(152, 1, '2025-12-16 12:31:36', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(153, 1, '2025-12-16 12:34:00', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(154, 1, '2025-12-16 12:34:00', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(155, 1, '2025-12-16 12:35:25', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(156, 1, '2025-12-16 12:35:25', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(157, 1, '2025-12-16 12:44:44', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(158, 1, '2025-12-16 12:44:44', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(159, 1, '2025-12-16 12:45:49', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(160, 1, '2025-12-16 12:45:49', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(161, 1, '2025-12-16 12:47:32', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(162, 1, '2025-12-16 12:47:32', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(163, 1, '2025-12-16 12:49:06', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(164, 1, '2025-12-16 12:49:07', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(165, 1, '2025-12-16 12:54:49', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(166, 1, '2025-12-16 12:54:49', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(167, 1, '2025-12-16 13:07:53', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(168, 1, '2025-12-16 13:07:53', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(169, 1, '2025-12-16 13:09:32', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(170, 1, '2025-12-16 13:09:32', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(171, 1, '2025-12-16 13:14:15', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(172, 1, '2025-12-16 13:14:15', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(173, 1, '2025-12-16 13:14:39', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(174, 1, '2025-12-16 13:14:39', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(175, 1, '2025-12-16 13:23:13', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(176, 1, '2025-12-16 13:23:13', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(177, 1, '2025-12-16 13:24:24', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(178, 1, '2025-12-16 13:24:24', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(179, 1, '2025-12-16 13:26:26', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(180, 1, '2025-12-16 13:26:26', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(181, 1, '2025-12-16 13:27:25', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(182, 1, '2025-12-16 13:27:25', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(183, 1, '2025-12-16 17:06:22', 'login', 'MODX\\Revolution\\modContext', 'mgr'),
(184, 1, '2025-12-16 17:33:55', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(185, 1, '2025-12-16 17:33:56', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(186, 1, '2025-12-16 17:56:53', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(187, 1, '2025-12-16 17:56:54', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(188, 1, '2025-12-16 18:07:07', 'chunk_update', 'MODX\\Revolution\\modChunk', '3'),
(189, 1, '2025-12-16 18:07:08', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 3 Default'),
(190, 1, '2025-12-16 18:09:34', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(191, 1, '2025-12-16 18:09:34', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(192, 1, '2025-12-16 18:12:17', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(193, 1, '2025-12-16 18:12:42', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(194, 1, '2025-12-16 18:13:16', 'resource_update', 'MODX\\Revolution\\modResource', '1'),
(195, 1, '2025-12-16 18:18:39', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(196, 1, '2025-12-16 18:18:39', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(197, 1, '2025-12-16 18:19:18', 'resource_update', 'MODX\\Revolution\\modResource', '2'),
(198, 1, '2025-12-16 18:19:58', 'resource_update', 'MODX\\Revolution\\modResource', '4'),
(199, 1, '2025-12-16 18:37:34', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(200, 1, '2025-12-16 18:37:34', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(201, 1, '2025-12-16 18:41:39', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(202, 1, '2025-12-16 18:41:40', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(203, 1, '2025-12-16 18:42:59', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(204, 1, '2025-12-16 18:43:00', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(205, 1, '2025-12-16 18:50:12', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(206, 1, '2025-12-16 18:50:12', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(207, 1, '2025-12-17 04:50:23', 'login', 'MODX\\Revolution\\modContext', 'mgr'),
(208, 1, '2025-12-17 05:24:19', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(209, 1, '2025-12-17 05:24:20', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(210, 1, '2025-12-17 05:25:04', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(211, 1, '2025-12-17 05:25:04', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(212, 1, '2025-12-17 10:17:21', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(213, 1, '2025-12-17 10:17:22', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(214, 1, '2025-12-17 10:21:01', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(215, 1, '2025-12-17 10:21:01', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(216, 1, '2025-12-17 10:21:15', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(217, 1, '2025-12-17 10:21:15', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(218, 1, '2025-12-17 10:22:01', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(219, 1, '2025-12-17 10:22:02', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(220, 1, '2025-12-17 10:23:03', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(221, 1, '2025-12-17 10:23:03', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(222, 1, '2025-12-17 10:24:07', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(223, 1, '2025-12-17 10:24:07', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(224, 1, '2025-12-17 10:27:35', 'snippet_update', 'MODX\\Revolution\\modSnippet', '4'),
(225, 1, '2025-12-17 10:27:35', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 4 Default'),
(226, 1, '2025-12-17 10:29:50', 'snippet_update', 'MODX\\Revolution\\modSnippet', '5'),
(227, 1, '2025-12-17 10:29:50', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 5 Default'),
(228, 1, '2025-12-17 10:30:26', 'snippet_update', 'MODX\\Revolution\\modSnippet', '6'),
(229, 1, '2025-12-17 10:30:26', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modSnippet 6 Default'),
(230, 1, '2025-12-17 10:31:51', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(231, 1, '2025-12-17 10:31:51', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(232, 1, '2025-12-17 10:32:28', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(233, 1, '2025-12-17 10:32:29', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(234, 1, '2025-12-17 10:47:58', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(235, 1, '2025-12-17 10:47:59', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(236, 1, '2025-12-17 10:53:44', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(237, 1, '2025-12-17 10:53:44', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(238, 1, '2025-12-17 10:54:23', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(239, 1, '2025-12-17 10:54:24', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(240, 1, '2025-12-17 10:57:56', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(241, 1, '2025-12-17 10:57:56', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(242, 1, '2025-12-17 10:58:06', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(243, 1, '2025-12-17 10:58:06', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(244, 1, '2025-12-17 10:59:15', 'chunk_update', 'MODX\\Revolution\\modChunk', '1'),
(245, 1, '2025-12-17 10:59:15', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 1 Default'),
(246, 1, '2025-12-17 11:00:30', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(247, 1, '2025-12-17 11:00:30', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default'),
(248, 1, '2025-12-17 11:01:13', 'chunk_update', 'MODX\\Revolution\\modChunk', '2'),
(249, 1, '2025-12-17 11:01:14', 'propertyset_update_from_element', 'MODX\\Revolution\\modPropertySet', 'MODX\\Revolution\\modChunk 2 Default');

-- --------------------------------------------------------

--
-- Table structure for table `modx_media_sources`
--

CREATE TABLE `modx_media_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `class_key` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\Sources\\modFileMediaSource',
  `properties` mediumtext DEFAULT NULL,
  `is_stream` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_media_sources`
--

INSERT INTO `modx_media_sources` (`id`, `name`, `description`, `class_key`, `properties`, `is_stream`) VALUES
(1, 'Filesystem', '', 'MODX\\Revolution\\Sources\\modFileMediaSource', 'a:0:{}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_media_sources_contexts`
--

CREATE TABLE `modx_media_sources_contexts` (
  `source` int(11) NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT 'web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_media_sources_elements`
--

CREATE TABLE `modx_media_sources_elements` (
  `source` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `object_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modTemplateVar',
  `object` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `context_key` varchar(100) NOT NULL DEFAULT 'web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_membergroup_names`
--

CREATE TABLE `modx_membergroup_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rank` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `dashboard` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_membergroup_names`
--

INSERT INTO `modx_membergroup_names` (`id`, `name`, `description`, `parent`, `rank`, `dashboard`) VALUES
(1, 'Administrator', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_member_groups`
--

CREATE TABLE `modx_member_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `member` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_member_groups`
--

INSERT INTO `modx_member_groups` (`id`, `user_group`, `member`, `role`, `rank`) VALUES
(1, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modx_menus`
--

CREATE TABLE `modx_menus` (
  `text` varchar(191) NOT NULL DEFAULT '',
  `parent` varchar(191) NOT NULL DEFAULT '',
  `action` varchar(191) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `menuindex` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `params` text NOT NULL,
  `handler` text NOT NULL,
  `permissions` text NOT NULL,
  `namespace` varchar(100) NOT NULL DEFAULT 'core'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_menus`
--

INSERT INTO `modx_menus` (`text`, `parent`, `action`, `description`, `icon`, `menuindex`, `params`, `handler`, `permissions`, `namespace`) VALUES
('about', 'usernav', 'help', 'about_desc', '<i class=\"icon-question-circle icon\"></i>', 3, '', '', 'help', 'core'),
('access', 'usernav', '', '', '<i class=\"icon-user-lock icon\"></i>', 1, '', '', 'access_permissions', 'core'),
('acls', 'access', 'security/permission', 'acls_desc', '', 2, '', '', 'access_permissions', 'core'),
('admin', 'usernav', '', '', '<i class=\"icon-gear icon\"></i>', 2, '', '', 'settings', 'core'),
('components', 'topnav', '', '', '<i class=\"icon-cube icon\"></i>', 2, '', '', 'components', 'core'),
('content_types', 'site', 'system/contenttype', 'content_types_desc', '', 4, '', '', 'content_types', 'core'),
('contexts', 'admin', 'context', 'contexts_desc', '', 4, '', '', 'view_context', 'core'),
('dashboards', 'admin', 'system/dashboards', 'dashboards_desc', '', 5, '', '', 'dashboards', 'core'),
('edit_menu', 'admin', 'system/action', 'edit_menu_desc', '', 3, '', '', 'actions', 'core'),
('eventlog_viewer', 'reports', 'system/event', 'eventlog_viewer_desc', '', 1, '', '', 'view_eventlog', 'core'),
('file_browser', 'media', 'media/browser', 'file_browser_desc', '', 0, '', '', 'file_manager', 'core'),
('flush_access', 'access', '', 'flush_access_desc', '', 3, '', 'MODx.msg.confirm({\n                            title: _(\'flush_access\')\n                            ,text: _(\'flush_access_confirm\')\n                            ,url: MODx.config.connector_url\n                            ,params: {\n                                action: \'security/access/flush\'\n                            }\n                            ,listeners: {\n                                \'success\': {fn:function() { location.href = \'./\'; },scope:this},\n                                \'failure\': {fn:function(response) { Ext.MessageBox.alert(\'failure\', response.responseText); },scope:this},\n                            }\n                        });', 'access_permissions', 'core'),
('flush_sessions', 'access', '', 'flush_sessions_desc', '', 4, '', 'MODx.msg.confirm({\n                            title: _(\'flush_sessions\')\n                            ,text: _(\'flush_sessions_confirm\')\n                            ,url: MODx.config.connector_url\n                            ,params: {\n                                action: \'security/flush\'\n                            }\n                            ,listeners: {\n                                \'success\': {fn:function() { location.href = \'./\'; },scope:this}\n                            }\n                        });', 'flush_sessions', 'core'),
('form_customization', 'admin', 'security/forms', 'form_customization_desc', '', 1, '', '', 'customize_forms', 'core'),
('installer', 'components', 'workspaces', 'installer_desc', '', 0, '', '', 'packages', 'core'),
('language', 'admin', '', 'language_desc', '', 8, '', '', 'language', 'core'),
('lexicon_management', 'admin', 'workspaces/lexicon', 'lexicon_management_desc', '', 7, '', '', 'lexicons', 'core'),
('logout', 'user', 'security/logout', 'logout_desc', '', 2, '', 'MODx.logout(); return false;', 'logout', 'core'),
('media', 'topnav', '', '', '<i class=\"icon-file-image-o icon\"></i>', 1, '', '', 'file_manager', 'core'),
('messages', 'user', 'security/message', 'messages_desc', '', 1, '', '', 'messages', 'core'),
('namespaces', 'admin', 'workspaces/namespace', 'namespaces_desc', '', 6, '', '', 'namespaces', 'core'),
('new_resource', 'site', 'resource/create', 'new_resource_desc', '', 0, '', '', 'new_document', 'core'),
('propertysets', 'admin', 'element/propertyset', 'propertysets_desc', '', 2, '', '', 'property_sets', 'core'),
('refreshuris', 'refresh_site', '', 'refreshuris_desc', '', 0, '', 'MODx.refreshURIs(); return false;', 'empty_cache', 'core'),
('refresh_site', 'site', '', 'refresh_site_desc', '', 1, '', 'MODx.clearCache(); return false;', 'empty_cache', 'core'),
('remove_locks', 'site', '', 'remove_locks_desc', '', 2, '', 'MODx.removeLocks();return false;', 'remove_locks', 'core'),
('reports', 'admin', '', 'reports_desc', '', 9, '', '', 'menu_reports', 'core'),
('resource_groups', 'access', 'security/resourcegroup', 'resource_groups_desc', '', 1, '', '', 'access_permissions', 'core'),
('site', 'topnav', '', '', '<i class=\"icon-file-text-o icon\"></i>', 0, '', '', 'menu_site', 'core'),
('site_schedule', 'site', 'resource/site_schedule', 'site_schedule_desc', '', 3, '', '', 'view_document', 'core'),
('sources', 'media', 'source', 'sources_desc', '', 1, '', '', 'sources', 'core'),
('system_settings', 'admin', 'system/settings', 'system_settings_desc', '', 0, '', '', 'settings', 'core'),
('topnav', '', '', 'topnav_desc', '', 0, '', '', '', 'core'),
('trash', 'site', 'resource/trash', 'trash_desc', '', 5, '', '', 'menu_trash', 'core'),
('user', 'usernav', '', '', '<span id=\"user-avatar\" title=\"{$username}\">{$userImage}</span> <span id=\"user-username\">{$username}</span>', 0, '', '', 'menu_user', 'core'),
('usernav', '', '', 'usernav_desc', '', 1, '', '', '', 'core'),
('users', 'access', 'security/user', 'user_management_desc', '', 0, '', '', 'view_user', 'core'),
('view_logging', 'reports', 'system/logs', 'view_logging_desc', '', 0, '', '', 'mgr_log_view', 'core'),
('view_sysinfo', 'reports', 'system/info', 'view_sysinfo_desc', '', 2, '', '', 'view_sysinfo', 'core'),
('{$username}', 'user', 'security/profile', 'profile_desc', '', 0, '', '', 'change_profile', 'core');

-- --------------------------------------------------------

--
-- Table structure for table `modx_namespaces`
--

CREATE TABLE `modx_namespaces` (
  `name` varchar(40) NOT NULL DEFAULT '',
  `path` text DEFAULT NULL,
  `assets_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_namespaces`
--

INSERT INTO `modx_namespaces` (`name`, `path`, `assets_path`) VALUES
('core', '{core_path}', '{assets_path}');

-- --------------------------------------------------------

--
-- Table structure for table `modx_property_set`
--

CREATE TABLE `modx_property_set` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `category` int(10) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL DEFAULT '',
  `properties` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_register_messages`
--

CREATE TABLE `modx_register_messages` (
  `topic` int(10) UNSIGNED NOT NULL,
  `id` varchar(191) NOT NULL,
  `created` datetime NOT NULL,
  `valid` datetime NOT NULL,
  `accessed` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `accesses` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `expires` int(20) NOT NULL DEFAULT 0,
  `payload` mediumtext NOT NULL,
  `kill` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_register_queues`
--

CREATE TABLE `modx_register_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `options` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_register_queues`
--

INSERT INTO `modx_register_queues` (`id`, `name`, `options`) VALUES
(1, 'locks', 'a:1:{s:9:\"directory\";s:5:\"locks\";}'),
(2, 'resource_reload', 'a:1:{s:9:\"directory\";s:15:\"resource_reload\";}');

-- --------------------------------------------------------

--
-- Table structure for table `modx_register_topics`
--

CREATE TABLE `modx_register_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `options` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_register_topics`
--

INSERT INTO `modx_register_topics` (`id`, `queue`, `name`, `created`, `updated`, `options`) VALUES
(1, 1, '/resource/', '2025-12-16 10:33:23', NULL, NULL),
(2, 2, '/resourcereload/', '2025-12-16 10:37:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modx_session`
--

CREATE TABLE `modx_session` (
  `id` varchar(191) NOT NULL DEFAULT '',
  `access` int(20) UNSIGNED NOT NULL,
  `data` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_session`
--

INSERT INTO `modx_session` (`id`, `access`, `data`) VALUES
('4vpqrlpuot4sligb140cpk6469', 1765901187, 'modx.user.0.resourceGroups|a:1:{s:3:\"web\";a:0:{}}modx.user.0.attributes|a:1:{s:3:\"web\";a:5:{s:32:\"MODX\\Revolution\\modAccessContext\";a:1:{s:3:\"web\";a:1:{i:0;a:3:{s:9:\"principal\";i:0;s:9:\"authority\";i:0;s:6:\"policy\";a:1:{s:4:\"load\";b:1;}}}}s:38:\"MODX\\Revolution\\modAccessResourceGroup\";a:0:{}s:33:\"MODX\\Revolution\\modAccessCategory\";a:0:{}s:44:\"MODX\\Revolution\\Sources\\modAccessMediaSource\";a:0:{}s:34:\"MODX\\Revolution\\modAccessNamespace\";a:0:{}}}modx.user.contextTokens|a:0:{}'),
('828vsosdfr6n3b1jdtfmg94loc', 1765965578, 'modx.user.contextTokens|a:0:{}'),
('9dhqm9rkqt1dgv4i1oeh4tocqg', 1765884536, 'modx.user.contextTokens|a:1:{s:3:\"mgr\";i:1;}manager_language|s:2:\"en\";modx.user.0.resourceGroups|a:1:{s:3:\"mgr\";a:0:{}}modx.user.0.attributes|a:1:{s:3:\"mgr\";a:5:{s:32:\"MODX\\Revolution\\modAccessContext\";a:1:{s:3:\"web\";a:1:{i:0;a:3:{s:9:\"principal\";i:0;s:9:\"authority\";i:0;s:6:\"policy\";a:1:{s:4:\"load\";b:1;}}}}s:38:\"MODX\\Revolution\\modAccessResourceGroup\";a:0:{}s:33:\"MODX\\Revolution\\modAccessCategory\";a:0:{}s:44:\"MODX\\Revolution\\Sources\\modAccessMediaSource\";a:0:{}s:34:\"MODX\\Revolution\\modAccessNamespace\";a:0:{}}}modx.mgr.user.token|s:52:\"modx694125ecad3793.81515359_16941263ad6c6b8.51278554\";modx.mgr.session.cookie.lifetime|i:0;modx.mgr.user.config|a:0:{}newResourceTokens|a:32:{i:0;s:23:\"69412764b7ed11.06970541\";i:1;s:23:\"694127a12ccd25.94320441\";i:2;s:23:\"69412804b7be98.61095157\";i:3;s:23:\"694128361e0832.81201434\";i:4;s:23:\"69412862eecfb1.36627473\";i:5;s:23:\"69412869777c79.05169848\";i:6;s:23:\"694128dd1dfab2.73319369\";i:7;s:23:\"6941290b474e21.07221251\";i:8;s:23:\"69412a448b51f6.52155162\";i:9;s:23:\"69412ac039bf07.27467755\";i:10;s:23:\"69412b957276e8.35740854\";i:11;s:23:\"69412c6b41b143.43282063\";i:12;s:23:\"69412c9a066bf4.07741484\";i:13;s:23:\"69412ce1dec025.64468201\";i:14;s:23:\"69412cfa4a15c3.61242355\";i:15;s:23:\"69412d6da0c552.82895509\";i:16;s:23:\"69412db99d5871.01587581\";i:17;s:23:\"69412e2ae67887.09640074\";i:18;s:23:\"69412e952ebcb9.75367534\";i:19;s:23:\"69412ec7df2a41.93094204\";i:20;s:23:\"69412edb70c331.00037315\";i:21;s:23:\"69412f029c5792.24115355\";i:22;s:23:\"69412f098240d4.90578803\";i:23;s:23:\"694134fc197990.00801207\";i:24;s:23:\"694135b19b1476.76645376\";i:25;s:23:\"69413607815048.19750451\";i:26;s:23:\"694136eacfb664.39997162\";i:27;s:23:\"69413769ebc5e5.55279303\";i:28;s:23:\"69413eabbef3a7.27167813\";i:29;s:23:\"69413ff2aa9d02.13702951\";i:30;s:23:\"6941401b43e672.80690016\";i:31;s:23:\"694142779d9b31.52601714\";}'),
('dcb18cbvbg59qk2ra7cadbtn48', 1765908428, 'modx.user.contextTokens|a:1:{s:3:\"mgr\";i:1;}manager_language|s:2:\"en\";modx.user.0.resourceGroups|a:1:{s:3:\"mgr\";a:0:{}}modx.user.0.attributes|a:1:{s:3:\"mgr\";a:5:{s:32:\"MODX\\Revolution\\modAccessContext\";a:1:{s:3:\"web\";a:1:{i:0;a:3:{s:9:\"principal\";i:0;s:9:\"authority\";i:0;s:6:\"policy\";a:1:{s:4:\"load\";b:1;}}}}s:38:\"MODX\\Revolution\\modAccessResourceGroup\";a:0:{}s:33:\"MODX\\Revolution\\modAccessCategory\";a:0:{}s:44:\"MODX\\Revolution\\Sources\\modAccessMediaSource\";a:0:{}s:34:\"MODX\\Revolution\\modAccessNamespace\";a:0:{}}}login_failed|i:1;modx.mgr.user.token|s:52:\"modx694125ecad3793.81515359_16941837e9185e8.90418642\";modx.mgr.session.cookie.lifetime|i:0;modx.mgr.user.config|a:0:{}newResourceTokens|a:4:{i:0;s:23:\"69419259e259b8.20537702\";i:1;s:23:\"694194848716a3.92399540\";i:2;s:23:\"694194a8276502.82098358\";i:3;s:23:\"69419fcccb4e54.68433626\";}'),
('tkvpitbtd9uqp80sra4r2g2jln', 1765963490, 'modx.user.0.resourceGroups|a:1:{s:3:\"mgr\";a:0:{}}modx.user.0.attributes|a:1:{s:3:\"mgr\";a:5:{s:32:\"MODX\\Revolution\\modAccessContext\";a:1:{s:3:\"web\";a:1:{i:0;a:3:{s:9:\"principal\";i:0;s:9:\"authority\";i:0;s:6:\"policy\";a:1:{s:4:\"load\";b:1;}}}}s:38:\"MODX\\Revolution\\modAccessResourceGroup\";a:0:{}s:33:\"MODX\\Revolution\\modAccessCategory\";a:0:{}s:44:\"MODX\\Revolution\\Sources\\modAccessMediaSource\";a:0:{}s:34:\"MODX\\Revolution\\modAccessNamespace\";a:0:{}}}modx.user.contextTokens|a:1:{s:3:\"mgr\";i:1;}manager_language|s:2:\"en\";modx.mgr.user.token|s:52:\"modx694125ecad3793.81515359_16942287f16e196.46270737\";modx.mgr.session.cookie.lifetime|i:0;modx.mgr.user.config|a:0:{}newResourceTokens|a:4:{i:0;s:23:\"69422887883dc9.95313642\";i:1;s:23:\"69423009e121f1.85046145\";i:2;s:23:\"694275a17d80f0.65085246\";i:3;s:23:\"694276e26c6d89.11682085\";}');

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_content`
--

CREATE TABLE `modx_site_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'document',
  `pagetitle` varchar(191) NOT NULL DEFAULT '',
  `longtitle` varchar(191) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `alias` varchar(191) DEFAULT '',
  `link_attributes` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `pub_date` int(20) NOT NULL DEFAULT 0,
  `unpub_date` int(20) NOT NULL DEFAULT 0,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `isfolder` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `introtext` text DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `richtext` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `template` int(10) NOT NULL DEFAULT 0,
  `menuindex` int(10) NOT NULL DEFAULT 0,
  `searchable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `cacheable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `createdby` int(10) NOT NULL DEFAULT 0,
  `createdon` int(20) NOT NULL DEFAULT 0,
  `editedby` int(10) NOT NULL DEFAULT 0,
  `editedon` int(20) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `deletedon` int(20) NOT NULL DEFAULT 0,
  `deletedby` int(10) NOT NULL DEFAULT 0,
  `publishedon` int(20) NOT NULL DEFAULT 0,
  `publishedby` int(10) NOT NULL DEFAULT 0,
  `menutitle` varchar(255) NOT NULL DEFAULT '',
  `content_dispo` tinyint(1) NOT NULL DEFAULT 0,
  `hidemenu` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `class_key` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modDocument',
  `context_key` varchar(100) NOT NULL DEFAULT 'web',
  `content_type` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `uri` text DEFAULT NULL,
  `uri_override` tinyint(1) NOT NULL DEFAULT 0,
  `hide_children_in_tree` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_tree` tinyint(1) NOT NULL DEFAULT 1,
  `properties` mediumtext DEFAULT NULL,
  `alias_visible` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_site_content`
--

INSERT INTO `modx_site_content` (`id`, `type`, `pagetitle`, `longtitle`, `description`, `alias`, `link_attributes`, `published`, `pub_date`, `unpub_date`, `parent`, `isfolder`, `introtext`, `content`, `richtext`, `template`, `menuindex`, `searchable`, `cacheable`, `createdby`, `createdon`, `editedby`, `editedon`, `deleted`, `deletedon`, `deletedby`, `publishedon`, `publishedby`, `menutitle`, `content_dispo`, `hidemenu`, `class_key`, `context_key`, `content_type`, `uri`, `uri_override`, `hide_children_in_tree`, `show_in_tree`, `properties`, `alias_visible`) VALUES
(1, 'document', 'Home', 'Congratulations!', '', 'index', '', 1, 0, 0, 0, 0, '', '\r\n\r\n<body id = \"homePage\">\r\n    <!-- Home hero starts -->\r\n    <section id=\"homeHero\">\r\n        <div class=\"swiper homeHeroSwiper\">\r\n            <div class=\"swiper-wrapper\">\r\n                <!-- Slide 1 -->\r\n                <div class=\"swiper-slide\">\r\n                    <img src=\"assets/images/home-hero/img-1.jpg\" alt=\"Explore Vacations\"class=\"img-fluid d-none d-md-block\">\r\n                    <img src=\"assets/images/home-hero/img-1-sm.jpg\" alt=\"Explore Vacations\" class=\"img-fluid d-md-none\">\r\n                </div>\r\n\r\n                <!-- Slide 2 -->\r\n                <div class=\"swiper-slide\">\r\n                    <img src=\"assets/images/home-hero/img-2.jpg\" alt=\"Explore Vacations\" class=\"img-fluid d-none d-md-block\">\r\n                    <img src=\"assets/images/home-hero/img-2-sm.jpg\" alt=\"Explore Vacations\" class=\"img-fluid d-md-none\">\r\n                </div>\r\n\r\n                <!-- Slide 3 -->\r\n                <div class=\"swiper-slide\">\r\n                    <img src=\"assets/images/home-hero/img-3.jpg\" alt=\"Explore Vacations\" class=\"img-fluid d-none d-md-block\">\r\n                    <img src=\"assets/images/home-hero/img-3-sm.jpg\" alt=\"Explore Vacations\" class=\"img-fluid d-md-none\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Hero Content -->\r\n        <div class=\"homehero-content\">\r\n            <h1 data-aos=\"fade-down-right\" data-aos-duration=\"1000\">Discover Wonders<br class=\"d-md-none\"> with<br class=\"d-none d-md-block\"> Every Step</h1>\r\n            <p class=\"mt-3\" data-aos=\"fade-down-left\" data-aos-duration=\"1000\">Discover unforgettable journeys with Explore Vacations. <br>Adventure, relaxation, and memories that last a lifetime.</p>\r\n            <a href=\"[[~3]]\" class=\"mt-3\">Plan Your Trip</a>\r\n        </div>\r\n    </section>\r\n    <!-- Home hero ends -->\r\n\r\n    <!-- Why choose us section starts -->\r\n     <section id=\"why-choose-us\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-12 col-md-6 d-flex align-items-center\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\" data-aos=\"fade-up\" data-aos-duration=\"1000\">\r\n                            <h2 class=\"heading mb-4\">Why Choose Us?</h2>\r\n                            <p class=\"supportive-text\">At Explore Vacations, we are passionate about creating unforgettable travel experiences. Here’s why you should choose us for your next adventure:</p> \r\n                            <ul class=\"list-unstyled\">\r\n                                <li><img src=\"assets/images/icons/map-marked.svg\" class=\"img-fluid\" alt=\"map-marked\"> <p><b>Personalized Itineraries :</b> We tailor each trip to your preferences, ensuring a unique and memorable experience.</p></li>\r\n                                <li><img src=\"assets/images/icons/user-tie.svg\" class=\"img-fluid\" alt=\"user-tie\"> <p><b>Expert Guides :</b> Our knowledgeable guides provide insights and local expertise to enrich your journey.</p></li>\r\n                                <li><img src=\"assets/images/icons/headset.svg\" class=\"img-fluid\" alt=\"headset\"> <p><b>24/7 Support :</b> We are available around the clock to assist you during your travels.</p></li>\r\n                                <li><img src=\"assets/images/icons/dollar-sign.svg\" class=\"img-fluid\" alt=\"dollar-sign\"> <p><b>Best Price Guarantee :</b> We offer competitive pricing without compromise.</p></li>\r\n                                <li><img src=\"assets/images/icons/leaf.svg\" class=\"img-fluid\" alt=\"leaf\"> <p><b>Commitment to Sustainability :</b> We prioritize eco-friendly practices to preserve the beauty of our destinations.</p></li>\r\n                            </ul>\r\n                        </div> \r\n                    </div>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 d-flex align-items-center mt-3 mt-md-0\" data-aos=\"fade-left\" data-aos-duration=\"1000\">\r\n                    <img src=\"assets/images/why-choose-us-img.jpg\" alt=\"Why Choose Us\" class=\"img-fluid why-choose-us-img\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n\r\n    <!-- Service Counter section starts -->\r\n    <section id=\"service-counter\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-12\">\r\n                    <div class=\"service-counter-wrapper d-flex flex-column flex-md-row justify-content-around align-items-center\">\r\n                        <div class=\"counter-item text-center\" data-aos=\"fade-up\" data-aos-duration=\"1000\">\r\n                            <h2 class=\"counter-number\">500+</h2>\r\n                            <p class=\"counter-label\">Happy Travellders</p>\r\n                        </div>\r\n                        <div class=\"counter-item text-center\" data-aos=\"fade-up\" data-aos-duration=\"1000\" data-aos-delay=\"200\">\r\n                            <h2 class=\"counter-number\">150+</h2>\r\n                            <p class=\"counter-label\">Destinations Covered</p>\r\n                        </div>\r\n                        <div class=\"counter-item text-center\" data-aos=\"fade-up\" data-aos-duration=\"1000\" data-aos-delay=\"400\">\r\n                            <h2 class=\"counter-number\">50+</h2>\r\n                            <p class=\"counter-label\">Expert Guides</p>\r\n                        </div>\r\n                        <div class=\"mb-0 counter-item text-center\" data-aos=\"fade-up\" data-aos-duration=\"1000\" data-aos-delay=\"600\">\r\n                            <h2 class=\"counter-number\">24/7</h2>\r\n                            <p class=\"counter-label\">Customer Support</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Service Counter section ends -->\r\n\r\n    <!-- Trending Destinations section starts -->\r\n    <section id=\"trending-destinations\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center\">Trending Destinations</h2>\r\n                </div>\r\n            </div>\r\n            <div class=\"swiper myDestinationsSwiper mt-3\">\r\n                <div class=\"swiper-wrapper\" data-aos=\"zoom-in\" data-aos-duration=\"1000\">\r\n\r\n                    <!-- Sigiriya -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/1.jpg\" alt=\"Sigiriya\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Sigiriya</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Kandy -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/2.jpg\" alt=\"Kandy\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Kandy</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Mirissa -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/3.jpg\" alt=\"Mirissa\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Mirissa</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Jaffna -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/4.jpg\" alt=\"Jaffna\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Jaffna</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Galle -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/5.jpg\" alt=\"Galle\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Galle</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Ella -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/6.jpg\" alt=\"Ella\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Ella</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Nuwara Eliya -->\r\n                    <div class=\"swiper-slide\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/7.jpg\" alt=\"Nuwara Eliya\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Nuwara Eliya</h3>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Trincomalee -->\r\n                    <div class=\"swiper-slide mb-4\">\r\n                        <div class=\"destination-item text-center\">\r\n                            <img src=\"assets/images/trending-destinations/8.jpg\" alt=\"Trincomalee\" class=\"img-fluid\">\r\n                            <h3 class=\"destination-name mt-2\">Trincomalee</h3>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"swiper-pagination\"></div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Trending Destinations section ends -->\r\n\r\n    <!-- Beauty of Srilanka section starts -->\r\n    <section id=\"beauty-of-srilanka\" class=\"pt-5\">\r\n        <div class=\"container-fluid\">\r\n            <div class=\"row\">\r\n                <div class=\"col px-0\">\r\n                    <div class=\"image-overlay\">\r\n                        <img src=\"assets/images/beauty-srilanka.png\" alt=\"Beauty of Srilanka\" class=\"img-fluid w-100\">\r\n                        <div class=\"overlay\"></div> \r\n                        <div class=\"overlay-text\">\r\n                            <h2 class=\"heading\">Journey Through Sri Lanka</h2>\r\n                            <a href=\"[[~3]]\" class=\"btn btn-primary mt-3\">Explore More</a>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Beauty of Srilanka section ends -->\r\n\r\n    <!-- Book your trip section starts -->\r\n    <section id=\"book-your-trip\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-12 col-md-6\">\r\n                    <span>Easy and Fast</span>\r\n                    <h2 class=\"heading\" data-aos=\"fade-up\" data-aos-duration=\"1000\">Book your next trip <br> in 3 easy steps</h2>\r\n                    <ul class=\"list-unstyled mt-5\" data-aos=\"fade-up\" data-aos-duration=\"1000\" data-aos-delay=\"200\">\r\n                        <div class=\"d-flex align-items-center mb-4\">\r\n                            <img src=\"assets/images/icons/destinations.svg\" alt=\"Choose Destination\" class=\"img-fluid\">\r\n                            <li>\r\n                                <h3>Choose Destination</h3>\r\n                                <p>Whether you love beaches, mountains, or cities—choose the destination that excites you.</p>\r\n                            </li>\r\n                        </div>\r\n                        <div class=\"d-flex align-items-center mb-4\">\r\n                            <img src=\"assets/images/icons/payment.svg\" alt=\"Choose Payment\" class=\"img-fluid\">\r\n                            <li>\r\n                                <h3>Plan Your Itinerary</h3>\r\n                                <p>Customize your trip schedule to match your interests and travel style</p>\r\n                            </li>\r\n                        </div>\r\n                        <div class=\"d-flex align-items-center\">\r\n                            <img src=\"assets/images/icons/travel.svg\" alt=\"Reach Airport on Selected Date\" class=\"img-fluid\">\r\n                            <li>\r\n                                <h3>Begin Your Adventure</h3>\r\n                                <p>Experience the beauty and excitement of your chosen destination to the fullest.</p>\r\n                            </li>\r\n                        </div>\r\n                    </ul>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 mt-3 mt-md-0 d-flex justify-content-center align-items-center\">\r\n                    <img src=\"assets/images/book-trip.png\" alt=\"Book your trip\" class=\"img-fluid beauty-srilanka\" data-aos=\"fade-left\" data-aos-duration=\"1000\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Book your trip section ends -->\r\n\r\n    <!-- Popular things to do section starts -->\r\n    <section id=\"popular-things-to-do\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row mb-4\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center\">Popular Things to Do</h2>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"row g-4\">\r\n                <!-- Left column: 2 stacked images -->\r\n                <div class=\"col-12 col-md-4\">\r\n                    <div class=\"popular-card mb-4\">\r\n                    <img src=\"assets/images/popular/1.jpg\" alt=\"Safari\">\r\n                    <div class=\"overlay\"></div>\r\n                    <span class=\"title\">Safari</span>\r\n                    </div>\r\n                    <div class=\"popular-card\">\r\n                    <img src=\"assets/images/popular/4.jpg\" alt=\"Train Rides\">\r\n                    <div class=\"overlay\"></div>\r\n                    <span class=\"title\">Train Rides</span>\r\n                    </div>\r\n                </div>\r\n\r\n                <!-- Center column: single tall image spanning rows naturally -->\r\n                <div class=\"col-12 col-md-4\">\r\n                    <div class=\"popular-card h-100\">\r\n                    <img src=\"assets/images/popular/2.jpg\" alt=\"Visiting Temples\" style=\"height: 100%; object-fit: cover;\">\r\n                    <div class=\"overlay\"></div>\r\n                    <span class=\"title\">Visiting Temples</span>\r\n                    </div>\r\n                </div>\r\n\r\n                <!-- Right column: 2 stacked images -->\r\n                <div class=\"col-12 col-md-4\">\r\n                    <div class=\"popular-card mb-4\">\r\n                    <img src=\"assets/images/popular/3.jpg\" alt=\"Tea Plantation Tours\">\r\n                    <div class=\"overlay\"></div>\r\n                    <span class=\"title\">Tea Plantation Tours</span>\r\n                    </div>\r\n                   <div class=\"col-12\">\r\n                        <div class=\"row g-2\">\r\n                            <!-- First image -->\r\n                            <div class=\"col-12 col-md-6\">\r\n                            <div class=\"popular-card\">\r\n                                <img src=\"assets/images/popular/5.jpg\" alt=\"Rafting\">\r\n                                <div class=\"overlay\"></div>\r\n                                <span class=\"title\">Rafting</span>\r\n                            </div>\r\n                            </div>\r\n\r\n                            <!-- Second image -->\r\n                            <div class=\"col-12 col-md-6\">\r\n                            <div class=\"popular-card\">\r\n                                <img src=\"assets/images/popular/6.jpg\" alt=\"Shopping\">\r\n                                <div class=\"overlay\"></div>\r\n                                <span class=\"title\">Shopping</span>\r\n                            </div>\r\n                            </div>\r\n                        </div>\r\n                        </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Popular things to do section ends -->\r\n\r\n    <!-- Featured Trips section starts -->\r\n    <section id=\"featured-trips\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row mb-4\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center\">Featured Trips</h2>\r\n                </div>\r\n            </div>\r\n            [[!HomeDB]]\r\n        </div>\r\n    </section>\r\n    <!-- Featured Trips section ends -->\r\n\r\n    <!--Get in Touch section starts -->\r\n    <section id=\"get-in-touch\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">   \r\n                <div class=\"col-12\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\">\r\n                            <div class=\"row align-items-center\">\r\n                                <div class=\"col-md-6 mb-4 mb-md-0\" data-aos=\"fade-up\" data-aos-duration=\"1000\">\r\n                                    <h2 class=\"heading mb-3\">Looking for a Personalized Trip or Tour ?</h2>\r\n                                    <p class=\"supportive-text mb-4\">\r\n                                        Tell us about your travel plans, and we’ll create a custom trip just for you. From relaxing holidays to adventure tours, we handle all the details so you can enjoy a smooth and stress-free journey.\r\n                                    </p>\r\n                                    <a href=\"[[~7]]\" class=\"btn btn-primary\" data-aos=\"fade-up\" data-aos-duration=\"1000\" data-aos-delay=\"400\">\r\n                                        Inquire Now\r\n                                    </a>\r\n                                </div>\r\n                                <div class=\"col-md-6 text-center\" data-aos=\"fade-left\" data-aos-duration=\"1000\">\r\n                                    <img src=\"assets/images/travel-cta.png\" alt=\"Travel\" class=\"img-fluid hover-zoom\">\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!--Get in Touch section ends -->\r\n\r\n  <!-- Customer Reviews section starts -->\r\n    <section id=\"customer-reviews\" class=\"pb-5\">\r\n        <div class=\"container text-center\">\r\n            <h2 class=\"heading\">What Our Customers Say</h2>\r\n            [[!GoogleReviews]]\r\n        </div>\r\n    </section>\r\n    <!-- Customer Reviews section ends -->\r\n\r\n    <!-- Travel Articles section starts -->\r\n    <section id=\"travel-articles\" class=\"pb-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center\">Travel Articles</h2>\r\n                </div>\r\n            </div>\r\n            <div class=\"row mt-4 g-4\">\r\n                <div class=\"col-12 col-md-6 col-lg-3\">\r\n                    <img src=\"assets/images/festivals/1.jpg\" alt=\"Travel Articles\" class=\"img-fluid\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\">\r\n                            <p class=\"card-text\">April 6 2024 | By Test</p>\r\n                            <h3 class=\"card-title\">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>\r\n                            <a href=\"[[~5]]\" class=\"btn btn-primary\">Read More</a>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 col-lg-3\">\r\n                    <img src=\"assets/images/festivals/2.jpg\" alt=\"Travel Articles\" class=\"img-fluid\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\">\r\n                            <p class=\"card-text\">April 6 2024 | By Test</p>\r\n                            <h3 class=\"card-title\">Hidden Cultural Gems: Temples, Forts & Ancient Cities Beyond the Usual</h3>\r\n                            <a href=\"[[~5]]\" class=\"btn btn-primary\">Read More</a>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 col-lg-3\">\r\n                    <img src=\"assets/images/festivals/3.jpg\" alt=\"Travel Articles\" class=\"img-fluid\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\">\r\n                            <p class=\"card-text\">April 6 2024 | By Test</p>\r\n                            <h3 class=\"card-title\">Tea Country & Colonial Charm: Discovering Hill Country Heritage</h3>\r\n                            <a href=\"[[~5]]\" class=\"btn btn-primary\">Read More</a>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 col-lg-3\">\r\n                    <img src=\"assets/images/festivals/1.jpg\" alt=\"Travel Articles\" class=\"img-fluid\">\r\n                    <div class=\"card\">\r\n                        <div class=\"card-body\">\r\n                            <p class=\"card-text\">April 6 2024 | By Test</p>\r\n                            <h3 class=\"card-title\">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>\r\n                            <a href=\"[[~5]]\" class=\"btn btn-primary\">Read More</a>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Travel Articles section ends -->\r\n\r\n    <script>\r\n        const heroSwiper = new Swiper(\".homeHeroSwiper\", {\r\n            loop: true,\r\n            autoplay: {\r\n                delay: 3500,\r\n                disableOnInteraction: false,\r\n            },\r\n            speed: 800,\r\n            effect: \"fade\",\r\n            fadeEffect: {\r\n                crossFade: true\r\n            }\r\n        });\r\n    </script>\r\n\r\n    <script>\r\n        var swiper = new Swiper(\".myDestinationsSwiper\", {\r\n            slidesPerView: 2,\r\n            spaceBetween: 20,\r\n            loop: true,\r\n\r\n            autoplay: {\r\n                delay: 2000,     \r\n                disableOnInteraction: false,\r\n            },\r\n\r\n            pagination: {\r\n                el: \".swiper-pagination\",\r\n                clickable: true,\r\n            },\r\n\r\n            breakpoints: {\r\n                576: { slidesPerView: 3 },\r\n                768: { slidesPerView: 4 },\r\n                992: { slidesPerView: 6 },\r\n            }\r\n        });\r\n    </script>\r\n\r\n    <script>\r\n       const slwiper = new Swiper(\'.featured-tours-swiper\', {\r\n            slidesPerView: 1,      \r\n            spaceBetween: 20,   \r\n            loop: true,          \r\n            autoplay: {           \r\n                delay: 3000,       \r\n                disableOnInteraction: false, \r\n            },\r\n            pagination: {\r\n                el: \'.swiper-pagination\',\r\n                clickable: true,\r\n            },\r\n            breakpoints: {\r\n                576: { slidesPerView: 2 },\r\n                768: { slidesPerView: 3 },\r\n                1200: { slidesPerView: 4 },\r\n            },\r\n        });\r\n    </script>\r\n\r\n    <script>\r\n        document.querySelectorAll(\'.read-more\').forEach(btn => {\r\n            btn.addEventListener(\'click\', function(e) {\r\n                e.preventDefault();\r\n                const shortText = this.parentElement.querySelector(\'.short-text\');\r\n                const fullText = this.parentElement.querySelector(\'.full-text\');\r\n\r\n                if (fullText.classList.contains(\'d-none\')) {\r\n                    fullText.classList.remove(\'d-none\');\r\n                    shortText.classList.add(\'d-none\');\r\n                    this.textContent = \"Read less\";\r\n                } else {\r\n                    fullText.classList.add(\'d-none\');\r\n                    shortText.classList.remove(\'d-none\');\r\n                    this.textContent = \"Read more\";\r\n                }\r\n            });\r\n        });\r\n    </script>\r\n</body>', 1, 2, 0, 1, 1, 1, 1765877278, 1, 1765905196, 0, 0, 0, 0, 0, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(2, 'document', 'about', '', '', 'index', '', 1, 0, 0, 0, 0, '', '<body id = \"aboutPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/about-hero.jpg\" alt=\"Explore Vacations - About Us\">\r\n        <div class=\"hero-content\">\r\n            <h1>About Us</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- Intro section starts -->\r\n    <section id=\"intro-section\" class=\"pt-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-12\">\r\n                    <p>\r\n                        \"Explore Vacations is dedicated to creating unforgettable travel experiences across Sri Lanka. We design personalized tours that match your interests, pace, and budget. From stunning beaches and lush tea plantations to ancient heritage sites and wildlife safaris, we carefully plan every detail of your journey. Our friendly and experienced team ensures comfortable transport, trusted accommodation, and 24/7 support, so you can relax and enjoy a smooth, memorable, and truly authentic Sri Lankan adventure.\"\r\n                    </p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Intro section ends -->\r\n\r\n    <!-- Vision mission section starts -->\r\n    <section id=\"vission-mission\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row align-items-center\">\r\n                <div class=\"col-12 col-md-6 col-lg-7\">\r\n                    <div class=\"mb-4\">\r\n                        <h2 class=\"heading\">Our Vision</h2>\r\n                        <p>To be the leading travel company in Sri Lanka, recognized globally for creating meaningful and memorable journeys. We aim to inspire travelers by showcasing Sri Lanka’s rich culture, breathtaking landscapes, and warm hospitality, while delivering world-class, personalized travel experiences that leave a lasting impression.</p>\r\n                    </div>\r\n\r\n                    <div>\r\n                        <h2 class=\"heading\">Our Mission</h2>\r\n                        <p>To deliver unforgettable travel experiences by providing personalized travel solutions, reliable customer support, and thoughtfully curated journeys that ensure comfort, safety, and complete customer satisfaction.</p>\r\n                    </div>\r\n                </div>\r\n\r\n                <div class=\"col-12 col-md-6 col-lg-5\">\r\n                    <div id=\"aboutImageCarousel\" class=\"carousel slide\" data-bs-ride=\"carousel\" data-bs-interval=\"3000\">\r\n                        <div class=\"carousel-inner\">\r\n                            <div class=\"carousel-item active\">\r\n                                <img src=\"assets/images/about-us.jpg\" class=\"img-fluid rounded\" alt=\"About Us 1\">\r\n                            </div>\r\n\r\n                            <div class=\"carousel-item\">\r\n                                <img src=\"assets/images/about-us-2.jpg\" class=\"img-fluid rounded\" alt=\"About Us 2\">\r\n                            </div>\r\n\r\n                            <div class=\"carousel-item\">\r\n                                <img src=\"assets/images/about-us-3.jpg\" class=\"img-fluid rounded\" alt=\"About Us 3\">\r\n                            </div>\r\n\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Vision mission section ends -->\r\n\r\n    <!-- Our Membership section starts -->\r\n    <section id=\"our-membership\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center mb-4\">Our Memberships & Affiliations</h2>\r\n                </div>\r\n            </div>\r\n            <div class=\"row\">\r\n                <div class=\"col-12 col-md-4 mb-4 mb-md-0 d-flex justify-content-center\">\r\n                    <img src=\"assets/images/memberships/1.jpg\" alt=\"Membership 1\" class=\"img-fluid\">\r\n                </div>\r\n                <div class=\"col-12 col-md-4 mb-4 mb-md-0 d-flex justify-content-center\">\r\n                    <img src=\"assets/images/memberships/2.jpg\" alt=\"Membership 2\" class=\"img-fluid\">\r\n                </div>\r\n                <div class=\"col-12 col-md-4 mb-4 mb-md-0 d-flex justify-content-center\">\r\n                    <img src=\"assets/images/memberships/3.jpg\" alt=\"Membership 1\" class=\"img-fluid\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Our Membership section ends -->\r\n\r\n    <!-- Hotel Partners section starts -->\r\n    <section id=\"hotel-partners\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center mb-4\">Our Hotel Partners</h2>\r\n                </div>\r\n            </div>\r\n           <div id=\"hotelPartnersCarousel\" class=\"carousel slide\" data-bs-ride=\"carousel\" data-bs-interval=\"2500\">\r\n                <div class=\"carousel-inner\">\r\n                    <!-- Slide 1 -->\r\n                    <div class=\"carousel-item active\">\r\n                        <div class=\"row text-center\">\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/1.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/2.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/3.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/4.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Slide 2 -->\r\n                    <div class=\"carousel-item\">\r\n                        <div class=\"row text-center\">\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/5.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/6.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/7.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/8.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Slide 3 -->\r\n                    <div class=\"carousel-item\">\r\n                        <div class=\"row text-center\">\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/9.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/10.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/11.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                            <div class=\"col-6 col-md-3\"><img src=\"assets/images/hotels/12.jpg\" class=\"img-fluid\" alt=\"\"></div>\r\n                        </div>\r\n                    </div>\r\n\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Hotel Partners section ends -->\r\n</body>', 1, 2, 1, 1, 1, 1, 1765877664, 1, 1765905558, 0, 0, 0, 1765877640, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(3, 'document', 'tours', '', '', 'tours', '', 1, 0, 0, 0, 0, '', '<body id=\"toursPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/tour-hero.jpg\" alt=\"Explore Vacations - Tours\">\r\n        <div class=\"hero-content\">\r\n            <h1>Tours</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- Tour Theme section starts -->\r\n    <section id=\"tour-theme\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center\">Discover Our Tour Themes</h2>\r\n                    <p class=\"supportive-text mb-0 text-center\">Select a theme and customize your tour. Explore various options and create a journey that suits your interests, whether it\'s adventure, culture, wildlife, or relaxation...</p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"row mt-2\">\r\n                <div class=\"col\">\r\n                    <div class=\"d-flex justify-content-end mb-3\">\r\n                        <a id=\"customizeBtn\" href=\"#\" class=\"btn btn-primary d-none\">Customize Your Tour</a>\r\n                    </div>                    \r\n                    [[!ToursDB]]\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Tour Theme section ends -->\r\n\r\n    <script>\r\n        const selectedThemes = new Set();\r\n        const cards = document.querySelectorAll(\'.selectable-card\');\r\n        const customizeBtn = document.getElementById(\'customizeBtn\');\r\n\r\n        cards.forEach(card => {\r\n            card.addEventListener(\'click\', () => {\r\n                const id = card.getAttribute(\'data-theme-id\');\r\n\r\n                if (selectedThemes.has(id)) {\r\n                    selectedThemes.delete(id);\r\n                    card.classList.remove(\'selected\');\r\n                } else {\r\n                    selectedThemes.add(id);\r\n                    card.classList.add(\'selected\');\r\n                }\r\n\r\n                // Show/hide button\r\n                if (selectedThemes.size > 0) {\r\n                    customizeBtn.classList.remove(\'d-none\');\r\n                } else {\r\n                    customizeBtn.classList.add(\'d-none\');\r\n                }\r\n\r\n                const url = new URL(\"[[~8]]\", window.location.href);\r\n                url.searchParams.set(\'themes\', Array.from(selectedThemes).join(\',\'));\r\n                customizeBtn.href = url.pathname + url.search;\r\n            });\r\n        });\r\n\r\n    </script>\r\n</body>', 1, 2, 2, 1, 1, 1, 1765879148, 1, 1765883877, 0, 0, 0, 1765879320, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(4, 'document', 'faq', '', '', 'faq', '', 1, 0, 0, 0, 0, '', '<body id = \"faqPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/faq-hero.jpg\" alt=\"Explore Vacations - FAQ\">\r\n        <div class=\"hero-content\">\r\n            <h1>Frequently Asked Questions</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- FAQ Intro section starts -->\r\n    <section id=\"faq-intro\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <p>\"Discover Sri Lanka with Explore Vacations and make every moment of your trip memorable. From pristine beaches and scenic mountains to vibrant culture and hidden gems, we’re here to guide you through an unforgettable journey. Find answers to common questions and tips that help you travel smoothly and enjoy the island to the fullest.\"<p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- FAQ Intro section ends -->\r\n\r\n    <!-- FAQ section starts -->\r\n    <section id=\"faq\" class=\"py-5 bg-light\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col\">\r\n                    <h2 class=\"heading text-center mb-2\">Frequently Asked Questions</h2>\r\n                    <p class=\"text-center mb-4\">Explore Vacations makes your Sri Lanka trip unforgettable. Here are answers to common questions.</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"row mt-2 mt-lg-4 d-flex align-items-center\">\r\n               <div class=\"col-12 col-md-6 col-lg-4 mb-3 mb-md-0 d-flex align-items-center\">\r\n                    <div class=\"swiper faq-swiper\">\r\n                        <div class=\"swiper-wrapper\">\r\n                            <div class=\"swiper-slide\">\r\n                                <img src=\"assets/images/faq-1.png\" alt=\"FAQ image 1\" class=\"img-fluid\">\r\n                            </div>\r\n                            <div class=\"swiper-slide\">\r\n                                <img src=\"assets/images/faq-2.png\" alt=\"FAQ image 2\" class=\"img-fluid\">\r\n                            </div>\r\n                            <div class=\"swiper-slide\">\r\n                                <img src=\"assets/images/faq-3.png\" alt=\"FAQ image 3\" class=\"img-fluid\">\r\n                            </div>\r\n                            <div class=\"swiper-slide\">\r\n                                <img src=\"assets/images/faq-4.png\" alt=\"FAQ image 3\" class=\"img-fluid\">\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-12 col-md-6 col-lg-8\">\r\n                    <div class=\"accordion\" id=\"faqAccordion\">\r\n                        <!-- FAQ Item 1 -->\r\n                        <div class=\"accordion-item\">\r\n                            <h2 class=\"accordion-header\" id=\"faqHeadingOne\">\r\n                                <button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#faqCollapseOne\" aria-expanded=\"true\" aria-controls=\"faqCollapseOne\">\r\n                                    What are the best times to visit Sri Lanka?\r\n                                </button>\r\n                            </h2>\r\n                            <div id=\"faqCollapseOne\" class=\"accordion-collapse collapse show\" aria-labelledby=\"faqHeadingOne\" data-bs-parent=\"#faqAccordion\">\r\n                                <div class=\"accordion-body\">\r\n                                    The best time to visit depends on the region. The west and south coasts are ideal from December to March, while the east coast is best from April to September.\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n\r\n                        <!-- FAQ Item 2 -->\r\n                        <div class=\"accordion-item\">\r\n                            <h2 class=\"accordion-header\" id=\"faqHeadingTwo\">\r\n                                <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#faqCollapseTwo\" aria-expanded=\"false\" aria-controls=\"faqCollapseTwo\">\r\n                                    Do you provide guided tours in Sri Lanka?\r\n                                </button>\r\n                            </h2>\r\n                            <div id=\"faqCollapseTwo\" class=\"accordion-collapse collapse\" aria-labelledby=\"faqHeadingTwo\" data-bs-parent=\"#faqAccordion\">\r\n                                <div class=\"accordion-body\">\r\n                                    Yes! Explore Vacations offers professional guided tours across popular destinations like Colombo, Kandy, Sigiriya, and Ella.\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n\r\n                        <!-- FAQ Item 3 -->\r\n                        <div class=\"accordion-item\">\r\n                            <h2 class=\"accordion-header\" id=\"faqHeadingThree\">\r\n                                <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#faqCollapseThree\" aria-expanded=\"false\" aria-controls=\"faqCollapseThree\">\r\n                                    Can you customize travel packages?\r\n                                </button>\r\n                            </h2>\r\n                            <div id=\"faqCollapseThree\" class=\"accordion-collapse collapse\" aria-labelledby=\"faqHeadingThree\" data-bs-parent=\"#faqAccordion\">\r\n                                <div class=\"accordion-body\">\r\n                                    Absolutely! We create tailor-made packages based on your interests, budget, and preferred travel dates.\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n\r\n                        <!-- FAQ Item 4 -->\r\n                        <div class=\"accordion-item\">\r\n                            <h2 class=\"accordion-header\" id=\"faqHeadingFour\">\r\n                                <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#faqCollapseFour\" aria-expanded=\"false\" aria-controls=\"faqCollapseFour\">\r\n                                    Are airport transfers included?\r\n                                </button>\r\n                            </h2>\r\n                            <div id=\"faqCollapseFour\" class=\"accordion-collapse collapse\" aria-labelledby=\"faqHeadingFour\" data-bs-parent=\"#faqAccordion\">\r\n                                <div class=\"accordion-body\">\r\n                                    Yes, all our packages include comfortable airport transfers to start and end your Sri Lanka journey hassle-free.\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n\r\n                        <!-- FAQ Item 5 -->\r\n                        <div class=\"accordion-item\">\r\n                            <h2 class=\"accordion-header\" id=\"faqHeadingFive\">\r\n                                <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#faqCollapseFive\" aria-expanded=\"false\" aria-controls=\"faqCollapseFive\">\r\n                                    What safety measures are in place for travelers?\r\n                                </button>\r\n                            </h2>\r\n                            <div id=\"faqCollapseFive\" class=\"accordion-collapse collapse\" aria-labelledby=\"faqHeadingFive\" data-bs-parent=\"#faqAccordion\">\r\n                                <div class=\"accordion-body\">\r\n                                    We prioritize safety with certified guides, well-maintained vehicles, and adherence to local travel regulations. Your comfort and security are our top priorities.\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- FAQ section ends -->\r\n\r\n    <!-- Contact section starts -->\r\n    <section id=\"contact\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col d-flex flex-column align-items-center\">\r\n                    <h2 class=\"heading text-center\">Contact Us</h2>\r\n                    <p class=\"text-center mb-4\">Ready to explore the beauty of Sri Lanka? Start your journey with Explore Vacations today <br> and let us help you plan an unforgettable adventure!</p>\r\n                    <a href=\"[[~7]]\" class=\"btn btn-primary\">Get In Touch</a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Contact section ends -->\r\n\r\n    <script>\r\n        const faqSwiper = new Swiper(\'.faq-swiper\', {\r\n            loop: true,\r\n            // spaceBetween: 20,\r\n            pagination: {\r\n                el: \'.swiper-pagination\',\r\n                clickable: true,\r\n            },\r\n            navigation: {\r\n                nextEl: \'.swiper-button-next\',\r\n                prevEl: \'.swiper-button-prev\',\r\n            },\r\n            autoplay: {\r\n                delay: 2000,\r\n                disableOnInteraction: false,\r\n            },\r\n        });\r\n    </script>\r\n</body>', 1, 2, 3, 1, 1, 1, 1765879338, 1, 1765905598, 0, 0, 0, 1765879320, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1);
INSERT INTO `modx_site_content` (`id`, `type`, `pagetitle`, `longtitle`, `description`, `alias`, `link_attributes`, `published`, `pub_date`, `unpub_date`, `parent`, `isfolder`, `introtext`, `content`, `richtext`, `template`, `menuindex`, `searchable`, `cacheable`, `createdby`, `createdon`, `editedby`, `editedon`, `deleted`, `deletedon`, `deletedby`, `publishedon`, `publishedby`, `menutitle`, `content_dispo`, `hidemenu`, `class_key`, `context_key`, `content_type`, `uri`, `uri_override`, `hide_children_in_tree`, `show_in_tree`, `properties`, `alias_visible`) VALUES
(5, 'document', 'blog', '', '', 'blog', '', 1, 0, 0, 0, 0, '', '<body id = \"blogPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/blog-hero.jpg\" alt=\"Explore Vacations - BLOGS\">\r\n        <div class=\"hero-content\">\r\n            <h1>BLOGS</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- Blogs section starts -->\r\n    <section id=\"blogs\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"col\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/1.jpg\" class=\"card-img-top\" alt=\"Sri Lanka Beaches\">\r\n                            <div class=\"card-body\">\r\n                                <h2 class=\"card-title\">Exploring Sri Lanka’s Beaches</h2>\r\n                                <p class=\"card-text\">\r\n                                    Discover the breathtaking coastline of Sri Lanka, from Mirissa to Trincomalee.\r\n                                </p>\r\n                                <a href=\"[[~6]]\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Blog Card 2 -->\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/2.jpg\" class=\"card-img-top\" alt=\"Sri Lankan Culture\">\r\n                            <div class=\"card-body\">\r\n                                <h2 class=\"card-title\">The Rich Culture of Sri Lanka</h2>\r\n                                <p class=\"card-text\">\r\n                                    A look into traditional dances, festivals, and heritage sites across the island.\r\n                                </p>\r\n                                <a href=\"[[~6]]\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Blog Card 3 -->\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/3.jpg\" class=\"card-img-top\" alt=\"Ella Sri Lanka\">\r\n                            <div class=\"card-body\">\r\n                                <h2 class=\"card-title\">Adventure in Ella</h2>\r\n                                <p class=\"card-text\">\r\n                                    Hike through tea plantations, waterfalls, and stunning viewpoints in Ella.\r\n                                </p>\r\n                                <a href=\"[[~6]]\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Blogs section ends -->\r\n</body>', 1, 2, 4, 1, 1, 1, 1765879444, 1, 1765879535, 0, 0, 0, 1765879440, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(6, 'document', 'blog-details', '', '', 'blog-details', '', 1, 0, 0, 0, 0, '', '<body id = \"blogDetailPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/blog-detail-hero.jpg\" alt=\"Explore Vacations - Blog Details\">\r\n        <div class=\"hero-content\">\r\n            <h1>Blog Details</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- Blog Details Section Starts -->\r\n    <section id=\"blog-details\" class=\"py-5\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-8\">\r\n                    <div class=\"mb-4\">\r\n                        <img src=\"assets/images/blogs/detail-img.jpg\" class=\"img-fluid rounded\" alt=\"Blog Featured Image\">\r\n                    </div>\r\n\r\n                    <!-- Title & Meta -->\r\n                    <h2 class=\"fw-bold mb-3\">Exploring the Beauty of Sri Lanka</h2>\r\n                    <div class=\"text-muted mb-4\">\r\n                        <span class=\"me-3\"><i class=\"fa-regular fa-user\"></i> Admin</span>\r\n                        <span class=\"me-3\"><i class=\"fa-regular fa-calendar\"></i> December 12, 2025</span>\r\n                        <span><i class=\"fa-solid fa-tag\"></i> Travel, Sri Lanka</span>\r\n                    </div>\r\n\r\n                    <!-- Blog Body -->\r\n                    <p>\r\n                        Sri Lanka is one of the most breathtaking islands in the world, rich with culture,\r\n                        wildlife, and unforgettable landscapes. From golden beaches to misty mountains, the\r\n                        island offers a diverse range of experiences for travelers.\r\n                    </p>\r\n\r\n                    <p>\r\n                        Whether you’re exploring ancient temples in Anuradhapura, hiking through the lush\r\n                        tea plantations of Ella, or watching the sunset in Galle Fort, each destination\r\n                        tells a story of heritage and natural beauty.\r\n                    </p>\r\n\r\n                    <!-- Highlighted Quote -->\r\n                    <blockquote class=\"blockquote border-start ps-3 my-4\">\r\n                        “Sri Lanka is an island that everyone loves at some level inside themselves.”\r\n                    </blockquote>\r\n\r\n                    <p>\r\n                        The island’s hospitality is unmatched. Locals warmly welcome visitors and share\r\n                        their love for traditional food, festivals, and cultural values. Combined with\r\n                        world-class hotels and scenic train rides, Sri Lanka should be on every traveler’s list.\r\n                    </p>\r\n\r\n                    <!-- Tags -->\r\n                    <div class=\"mt-4\">\r\n                        <strong>Tags:</strong>\r\n                        <a href=\"#\" class=\"badge bg-secondary text-decoration-none\">Sri Lanka</a>\r\n                        <a href=\"#\" class=\"badge bg-secondary text-decoration-none\">Travel</a>\r\n                        <a href=\"#\" class=\"badge bg-secondary text-decoration-none\">Culture</a>\r\n                    </div>\r\n\r\n                    <!-- Social Share -->\r\n                    <div class=\"mt-4\">\r\n                        <strong>Share:</strong>\r\n                        <a href=\"#\" class=\"text-muted ms-3\"><i class=\"fab fa-facebook\"></i></a>\r\n                        <a href=\"#\" class=\"text-muted ms-3\"><i class=\"fab fa-twitter\"></i></a>\r\n                        <a href=\"#\" class=\"text-muted ms-3\"><i class=\"fab fa-instagram\"></i></a>\r\n                        <a href=\"#\" class=\"text-muted ms-3\"><i class=\"fab fa-whatsapp\"></i></a>\r\n                    </div>\r\n                </div>\r\n\r\n                <!-- Sidebar -->\r\n                <div class=\"col-lg-4\">\r\n                    <div class=\"card p-3 shadow-sm mb-4\">\r\n                        <h5 class=\"mb-3\">Search</h5>\r\n                        <div class=\"input-group\">\r\n                            <input type=\"text\" class=\"form-control\" placeholder=\"Search blogs...\">\r\n                            <button class=\"btn btn-primary\"><i class=\"fa fa-search\"></i></button>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"card p-3 shadow-sm mb-4\">\r\n                        <h5 class=\"mb-3\">Recent Posts</h5>\r\n                        <ul class=\"list-unstyled\">\r\n                            <li class=\"mb-3\">\r\n                                <a href=\"#\" class=\"text-decoration-none\">Top 10 Beaches in Sri Lanka</a>\r\n                            </li>\r\n                            <li class=\"mb-3\">\r\n                                <a href=\"#\" class=\"text-decoration-none\">Why Ella Is a Must-Visit</a>\r\n                            </li>\r\n                            <li>\r\n                                <a href=\"#\" class=\"text-decoration-none\">Wildlife Adventures in Yala</a>\r\n                            </li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"card p-3 shadow-sm\">\r\n                        <h5 class=\"mb-3\">Categories</h5>\r\n                        <ul class=\"list-unstyled\">\r\n                            <li class=\"mb-2\"><a href=\"#\" class=\"text-decoration-none\">Travel</a></li>\r\n                            <li class=\"mb-2\"><a href=\"#\" class=\"text-decoration-none\">Culture</a></li>\r\n                            <li class=\"mb-2\"><a href=\"#\" class=\"text-decoration-none\">Adventure</a></li>\r\n                            <li><a href=\"#\" class=\"text-decoration-none\">Food</a></li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <hr>\r\n\r\n            <!-- Related Posts -->\r\n            <div class=\"mt-4 related-posts\">\r\n                <h3 class=\"fw-bold mb-4\">Related Blogs</h3>\r\n                <div class=\"row\">\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/1.jpg\" class=\"card-img-top\" alt=\"\">\r\n                            <div class=\"card-body\">\r\n                                <h5 class=\"card-title\">A Guide to Galle Fort</h5>\r\n                                <p class=\"card-text\">Explore the historic streets, cafes and coastlines.</p>\r\n                                <a href=\"#\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/2.jpg\" class=\"card-img-top\" alt=\"\">\r\n                            <div class=\"card-body\">\r\n                                <h5 class=\"card-title\">Hiking in Ella</h5>\r\n                                <p class=\"card-text\">Scenic mountains and peaceful tea estates.</p>\r\n                                <a href=\"#\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <div class=\"col-md-4 mb-4\">\r\n                        <div class=\"card h-100 shadow-sm\">\r\n                            <img src=\"assets/images/blogs/3.jpg\" class=\"card-img-top\" alt=\"\">\r\n                            <div class=\"card-body\">\r\n                                <h5 class=\"card-title\">Sri Lankan Cuisine</h5>\r\n                                <p class=\"card-text\">A journey through authentic island flavors.</p>\r\n                                <a href=\"#\" class=\"btn btn-primary\">View More</a>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Blog Details Section Ends -->\r\n</body>', 1, 2, 5, 1, 1, 1, 1765879495, 1, 1765879512, 0, 0, 0, 1765879512, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(7, 'document', 'contact-us', '', '', 'contact-us', '', 1, 0, 0, 0, 0, '', '\r\n<body id=\"contactPage\">\r\n    <!-- Hero starts -->\r\n    <section id=\"hero\">\r\n        <img src=\"assets/images/contact-hero.jpg\" alt=\"Explore Vacations - Contact Us\">\r\n        <div class=\"hero-content\">\r\n            <h1>Contact Us</h1>\r\n        </div>\r\n    </section>\r\n    <!-- Hero ends -->\r\n\r\n    <!-- Contact us starts -->\r\n    <section id=\"contactContent\" class=\"py-5 pb-xl-0\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-12\">\r\n                    <h2 class=\"heading\" data-aos=\"fade-down\">Get in touch with us</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"row\">\r\n                <p class=\"justify-text\">Have questions related to your adventures? We\'re here to assist you every step of the way. Contact us today to plan your tours or personalized adventures. Our dedicated team is eager to make your journey memorable, so don\'t hesitate to get in touch with us. Let your experience begins with just a click or a call!</p>\r\n                <div class=\"img-container col-12 col-lg-5 order-lg-2\" data-aos=\"fade-left\">\r\n                    <img src=\"assets/images/contact-form-img.png\" alt=\"Explore Vacations - contact image\" class= \"img-fluid\">\r\n                </div>\r\n                <div class=\"col-12 col-lg-7 pt-3\">\r\n                    <form action=\"[[~7]]\" method=\"POST\" data-aos=\"fade-right\">\r\n                        [[!ContactUs]]\r\n                    </form>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Contact us ends -->\r\n\r\n    <div style=\"margin-bottom: -22px;\">\r\n        <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.971585687321!2d79.87321017581856!3d7.129283315825712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f04b1fa95fa5%3A0x42cca08eb23de111!2sExplore%20Vacations%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1765448477674!5m2!1sen!2slk\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n    </div>\r\n</body>', 1, 2, 6, 1, 1, 1, 1765879553, 1, 1765880585, 0, 0, 0, 1765879560, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(8, 'document', 'select-city', '', '', 'select-city', '', 1, 0, 0, 0, 0, '', '[[!SelectCity]]', 1, 2, 7, 1, 1, 1, 1765881083, 1, 1765882246, 0, 0, 0, 1765881240, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1),
(9, 'document', 'customize-tour', '', '', 'customize-tour', '', 1, 0, 0, 0, 0, '', '[[!CustomizeTour]]', 1, 2, 8, 1, 1, 1, 1765883930, 1, 1765884000, 0, 0, 0, 1765884000, 1, '', 0, 0, 'MODX\\Revolution\\modDocument', 'web', 1, '', 0, 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_htmlsnippets`
--

CREATE TABLE `modx_site_htmlsnippets` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_preprocess` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT 'Chunk',
  `editor_type` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `cache_type` tinyint(1) NOT NULL DEFAULT 0,
  `snippet` mediumtext DEFAULT NULL,
  `locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `properties` text DEFAULT NULL,
  `static` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `static_file` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_site_htmlsnippets`
--

INSERT INTO `modx_site_htmlsnippets` (`id`, `source`, `property_preprocess`, `name`, `description`, `editor_type`, `category`, `cache_type`, `snippet`, `locked`, `properties`, `static`, `static_file`) VALUES
(1, 1, 0, 'footer', '', 0, 0, 0, '<footer>\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-12 col-lg-4 col order-lg-1 \">\n                <h6 class=\"footer-logo m-0\"><img src=\"assets/images/footer-logo.png\" alt=\"Explore Vacations | Logo\"></h6>\n                <p class=\"my-3 my-lg-4\">Join us in exploring Sri Lanka, <br>where adventure meets excellence.</p>\n                <ul class=\"list-unstyled d-flex\" id=\"footer-social-list\">\n                    <li class=\"me-2\">\n                        <a href=\"https://www.facebook.com/explorevacationssrilanka\" target=\"_blank\" alt=\"facebook\">\n                            <i class=\"fa-brands fa-facebook-f\"></i>\n                        </a>\n                    </li>\n                    <li class=\"mx-2\">\n                        <a href=\"https://www.instagram.com/explorevacationssrilanka/\" target=\"_blank\" alt=\"instragram\">\n                            <i class=\"fa-brands fa-instagram\"></i>\n                        </a>\n                    </li>\n                    <li class=\"ms-2\">\n                        <a href=\"https://wa.me/+94761414554\" target=\"_blank\" alt=\"whatsapp\">\n                            <i class=\"fa-brands fa-whatsapp\"></i>\n                        </a>\n                    </li>\n                </ul>\n            </div>\n            <div class=\"col-12 col-md-6 col-lg-4 order-lg-2\">\n                <h6 class=\"my-4 mt-lg-0\">Links</h6>\n                <ul class=\"list-unstyled\" id=\"footer-nav-link-list\">\n                    <li>\n                        <a href=\"./\">Home</a>\n                    </li>\n                    <li>\n                        <a href=\"[[~2]]\">About Us</a>\n                    </li>\n                    <li>\n                        <a href=\"[[~4]]\">FAQ</a>\n                    </li>\n                    <li>\n                        <a href=\"[[~5]]\">Blogs</a>\n                    </li>\n                    <li>\n                        <a href=\"[[~7]]\">Contact Us</a>\n                    </li>\n                </ul>\n            </div>\n            <div class=\"col-12 col-md-6 col-lg-4 order-lg-4\">\n                <h6 class=\"my-4 mt-lg-0\">Contact</h6>\n                <ul class=\"list-unstyled\" id=\"footer-contact-list\">\n                    <li>\n                        <img src=\"assets/images/icons/footer-phone.svg\" alt=\"Explore Vacations | Footer Contact Icon\" class=\"me-1\">\n                        <a href=\"tel:+94761414554\">+94 76 1414 554</a>\n                    </li>\n                    <li>\n                        <img src=\"assets/images/icons/footer-email.svg\" alt=\"Explore Vacations | Footer Contact Icon\" class=\"me-1\">\n                        <a href=\"mailto:info@explorevacations.lk\">info@explorevacations.lk</a>\n                    </li>\n                    <li>\n                        <img src=\"assets/images/icons/footer-location.svg\" alt=\"Explore Vacations | Footer Contact Icon\" class=\"me-1\">\n                        <a href=\"https://maps.app.goo.gl/Coi2NuS2utwZLLhC6\" target=\"_blank\">371/5 Negombo Rd, Seeduwa</a>\n                    </li>\n                </ul>\n            </div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col-12\">\n                <p class=\"m-0 py-4\">Designed and Developed by <a href=\"\" target=\"_blank\">Explore Vacations</a>. <br class=\"d-md-none\">© 2025</p>\n            </div>\n        </div>\n    </div>\n</footer>\n\n<!--Whatsapp widget-->\n<div id=\"whatsapp-widget\">\n    <div class=\"chat-header\" id=\"chat-header\">\n        <div class=\"avatar-container\">\n            <img src=\"assets/images/whatsapp-img.jpg\" alt=\"logo\">\n            <div class=\"online-dot\"></div>\n        </div>\n        <div class=\"chat-header-info\">\n            <span style=\"transform: translateY(2px);\">Explore Vacations</span>\n            <div style=\"color: #eeeeee;\">online</div>\n\n        </div>\n        <button class=\"close-btn\" id=\"close-btn\">&times;</button>\n    </div>\n    <div class=\"chat-content\" id=\"chat-content\">\n    </div>\n    <div class=\"message-input\" id=\"message-input\">\n        <button class=\"whatsapp-btn\" id=\"whatsapp-btn\">Chat in WhatsApp</button>\n    </div>\n    <div class=\"chat-icon\" id=\"chat-icon\">\n        <img src=\"https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg\" alt=\"WhatsApp\">\n    </div>\n</div>', 0, 'a:0:{}', 0, ''),
(2, 1, 0, 'navbar', '', 0, 0, 0, '<header>\n    <!-- Navbar starts-->\n    <nav class=\"navbar navbar-expand-lg p-lg-0\">\n        <div class=\"container\">\n            <a class=\"navbar-brand\" href=\"./\">\n                <img src=\"assets/images/logo.png\" alt=\"Explore Vacations | Logo\" class=\"d-none d-lg-inline\">\n                <!-- <span>\n                    Explore Vacations\n                </span> -->\n            </a>\n            <button class=\"navbar-toggler border-0\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasNavbar\" aria-controls=\"offcanvasNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n                <i class=\"fa-solid fa-bars\"></i>\n            </button>\n\n            <div class=\"offcanvas offcanvas-start\" tabindex=\"-1\" id=\"offcanvasNavbar\">\n                <div class=\"offcanvas-header\">\n                    <h5 class=\"offcanvas-title\">Explore Vacations</h5>\n                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>\n                </div>\n                <div class=\"offcanvas-body\">\n                    <ul class=\"navbar-nav ms-auto\">\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link active\" href=\"./\" page-name=\"home\">Home</a>\n                        </li>\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link\" href=\"[[~2]]\" page-name=\"about\">About</a>\n                        </li>\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link\" href=\"[[~3]]\" page-name=\"tours\">Tours</a>\n                        </li>\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link\" href=\"[[~4]]\" page-name=\"faq\">FAQ</a>\n                        </li>\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link\" href=\"[[~5]]\" page-name=\"blogs\">Blog</a>\n                        </li>\n                        <li class=\"nav-item\">\n                            <a class=\"nav-link\" href=\"[[~7]]\" page-name=\"contact\">Contact</a>\n                        </li>\n                    </ul>\n                </div>\n            </div>\n        </div>\n    </nav>\n    <!-- Navbar ends-->\n</header>', 0, 'a:0:{}', 0, ''),
(3, 1, 0, 'header', '', 0, 0, 0, '<!DOCTYPE html>\n<html lang=\"en\">\n\n<head>\n    <!-- Meta Tags -->\n    <meta charset=\"UTF-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <meta name=\"description\" content=\"<?php echo WEBSITE_DESCRIPTION; ?>\">\n    <meta name=\"keywords\" content=\"<?php echo WEBSITE_KEYWORDS; ?>\">\n    <meta name=\"author\" content=\"Explore Vacations\">\n    <meta name=\"robots\" content=\"index, follow\">\n\n    <!-- Page Title -->\n    <title>Explore Vacations</title>\n\n    <!-- Favicon -->\n    <link rel=\"icon\" href=\"assets/images/favicon.ico\" type=\"image/x-icon\">\n\n    <!-- Canonical URL -->\n    <link rel=\"canonical\" href=\"\">\n\n    <!-- Fontawesome -->\n    <link rel=\"stylesheet\" href=\"node_modules/@fortawesome/fontawesome-free/css/all.min.css\">\n    <!-- Swiper JS -->\n    <link rel=\"stylesheet\" href=\"node_modules/swiper/swiper-bundle.min.css\">\n    <!-- AOS Animations CSS -->\n    <link href=\"node_modules/aos/dist/aos.css\" rel=\"stylesheet\">\n\n    <!-- Stylesheets -->\n    <link rel=\"stylesheet\" href=\"node_modules/bootstrap/dist/css/bootstrap.min.css\">\n    <link rel=\"stylesheet\" href=\"assets/css/variables.css\">\n    <link rel=\"stylesheet\" href=\"assets/css/overrides.css\">\n    <link rel=\"stylesheet\" href=\"assets/css/style.css\">\n    <link rel=\"stylesheet\" href=\"assets/css/responsive.css\">\n</head>\n\n<body>\n    <!-- Bootstrap -->\n    <script src=\"node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>\n    <!-- Swiper JS -->\n    <script src=\"node_modules/swiper/swiper-bundle.min.js\"></script>\n    <!-- AOS Animations JS -->\n    <script src=\"node_modules/aos/dist/aos.js\"></script>\n    <!-- Whatsapp widget JS -->\n    <script src=\"assets/js/whatsapp-widget.js\"></script>\n    <!-- Custom JS -->\n    <script src=\"assets/js/script.js\"></script>\n<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>\n\n</body>\n</html>', 0, 'a:0:{}', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_plugins`
--

CREATE TABLE `modx_site_plugins` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_preprocess` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `editor_type` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `cache_type` tinyint(1) NOT NULL DEFAULT 0,
  `plugincode` mediumtext NOT NULL,
  `locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `properties` text DEFAULT NULL,
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `moduleguid` varchar(32) NOT NULL DEFAULT '',
  `static` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `static_file` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_plugin_events`
--

CREATE TABLE `modx_site_plugin_events` (
  `pluginid` int(10) NOT NULL DEFAULT 0,
  `event` varchar(191) NOT NULL DEFAULT '',
  `priority` int(10) NOT NULL DEFAULT 0,
  `propertyset` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_snippets`
--

CREATE TABLE `modx_site_snippets` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_preprocess` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `editor_type` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `cache_type` tinyint(1) NOT NULL DEFAULT 0,
  `snippet` mediumtext DEFAULT NULL,
  `locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `properties` text DEFAULT NULL,
  `moduleguid` varchar(32) NOT NULL DEFAULT '',
  `static` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `static_file` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_site_snippets`
--

INSERT INTO `modx_site_snippets` (`id`, `source`, `property_preprocess`, `name`, `description`, `editor_type`, `category`, `cache_type`, `snippet`, `locked`, `properties`, `moduleguid`, `static`, `static_file`) VALUES
(1, 1, 0, 'HomeDB', '', 0, 0, 0, 'include \'assets/includes/db_connect.php\';\n$stmt = $conn->query(\"\n    SELECT id, name, description, image, days, reviews\n    FROM tours\n    ORDER BY id ASC\n\");\n$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);\n?>\n\n<?php if (!empty($tours)): ?>\n<div class=\"swiper featured-tours-swiper\">\n    <div class=\"swiper-wrapper mb-5\">\n\n        <?php foreach ($tours as $tour): ?>\n            <div class=\"swiper-slide\">\n                <div class=\"card h-100\">\n\n                    <img\n                        src=\"assets/images/featured-trips/<?php echo htmlspecialchars($tour[\'image\']); ?>\"\n                        alt=\"<?php echo htmlspecialchars($tour[\'name\']); ?>\"\n                        class=\"img-fluid\"\n                    >\n\n                    <div class=\"card-body\" style=\"height:200px;\">\n                        <h3 class=\"card-title\">\n                            <?php echo htmlspecialchars($tour[\'name\']); ?>\n                        </h3>\n\n                        <p class=\"card-text\">\n                            <?php echo htmlspecialchars($tour[\'description\']); ?>\n                        </p>\n\n                        <hr class=\"mt-1\">\n\n                        <div class=\"d-flex justify-content-between\">\n                            <span><?php echo (int)$tour[\'days\']; ?> Days</span>\n                            <span>\n                                <?php echo (float)$tour[\'reviews\']; ?> ★\n                                (<?php echo (int)$tour[\'reviews\']; ?> reviews)\n                            </span>\n                        </div>\n                    </div>\n\n                </div>\n            </div>\n        <?php endforeach; ?>\n\n    </div>\n\n    <div class=\"swiper-pagination\"></div>\n</div>\n<?php endif;', 0, 'a:0:{}', '', 0, ''),
(2, 1, 0, 'GoogleReviews', '', 0, 0, 0, 'include \'assets/includes/db_connect.php\';\n\n$apiKey  = \"AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM\";\n$placeId = \"ChIJpV-pH0vw4joREeE9so6gzEI\";\n\n$url = \"https://maps.googleapis.com/maps/api/place/details/json\"\n     . \"?place_id={$placeId}\"\n     . \"&fields=rating,reviews.author_name,reviews.text,\"\n     . \"reviews.relative_time_description,reviews.profile_photo_url,\"\n     . \"reviews.rating\"\n     . \"&key={$apiKey}\";\n\n$response = @file_get_contents($url);\n$data = $response ? json_decode($response, true) : [];\n\n$reviews = $data[\'result\'][\'reviews\'] ?? [];\n?>\n\n<?php if (!empty($reviews)): ?>\n<div id=\"reviewCarousel\" class=\"carousel slide\" data-bs-ride=\"carousel\">\n    <div class=\"carousel-inner text-center\">\n\n        <?php foreach ($reviews as $index => $review): ?>\n            <div class=\"carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>\">\n                <div class=\"review-content px-3\">\n\n                    <img\n                        src=\"<?php echo htmlspecialchars($review[\'profile_photo_url\'] ?? \'\'); ?>\"\n                        onerror=\"this.src=\'assets/images/default-user.png\';\"\n                        class=\"mb-3 rounded-circle\"\n                        width=\"90\"\n                        height=\"90\"\n                        alt=\"User Photo\"\n                    >\n\n                    <!-- Rating Stars -->\n                    <div class=\"mb-2\">\n                        <?php\n                            $rating = isset($review[\'rating\']) ? (int) round($review[\'rating\']) : 0;\n                            for ($i = 1; $i <= 5; $i++):\n                                echo \'<span style=\"color:#cab449ff;\">&#9733;</span>\';\n                            endfor;\n                        ?>\n                    </div>\n\n                    <!-- Review Text -->\n                    <?php\n                        $full   = trim($review[\'text\'] ?? \'\');\n                        $short  = mb_substr($full, 0, 220);\n                        $isLong = mb_strlen($full) > 220;\n                    ?>\n                    <p class=\"review-text\">\n                        <span class=\"short-text\">\n                            <?php echo htmlspecialchars($short . ($isLong ? \'...\' : \'\')); ?>\n                        </span>\n\n                        <?php if ($isLong): ?>\n                            <span class=\"full-text d-none\">\n                                <?php echo htmlspecialchars($full); ?>\n                            </span>\n                            <a href=\"#\" class=\"read-more text-decoration-none ms-1\">\n                                Read more\n                            </a>\n                        <?php endif; ?>\n                    </p>\n\n                    <h5 class=\"mt-3 mb-0\">\n                        <?php echo ucwords(strtolower($review[\'author_name\'] ?? \'\')); ?>\n                    </h5>\n                    <small class=\"text-muted\">\n                        <?php echo htmlspecialchars($review[\'relative_time_description\'] ?? \'\'); ?>\n                    </small>\n\n                </div>\n            </div>\n        <?php endforeach; ?>\n</div>\n                <div class=\"swiper-pagination\"></div>\n\n    </div>\n</div>\n<?php endif;', 0, 'a:0:{}', '', 0, ''),
(3, 1, 0, 'ToursDB', '', 0, 0, 0, 'include (\'config-details.php\');\n    include \'assets/includes/db_connect.php\';\n\n    $query = \"SELECT * FROM tour_themes\";\n    $stmt = $conn->prepare($query);\n    $stmt->execute();\n    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);\n?>\n\n<?php\n    if (count($themes) > 0) {\n        echo \'<div class=\"row g-4\">\';\n\n        foreach ($themes as $row) {\n\n            $images = json_decode($row[\'theme_images\'], true);\n\n            if (!$images || count($images) === 0) {\n                $imgPath = \'assets/images/default-theme.jpg\';\n            } else {\n                $imgPath = \'assets/\' . ltrim($images[0], \'/\');\n            }\n\n            echo \'\n                <div class=\"col-md-4 col-lg-3\">\n                    <div class=\"theme-card card h-100 shadow-sm selectable-card\" data-theme-id=\"\' . $row[\'id\'] . \'\">\n                        <img src=\"\' . $imgPath . \'\" class=\"card-img-top\" alt=\"\' . htmlspecialchars($row[\'theme_name\']) . \'\">\n                        <div class=\"card-body text-center\">\n                            <h3 class=\"card-title\">\' . htmlspecialchars($row[\'theme_name\']) . \'</h3>\n                        </div>\n                    </div>\n                </div>\n            \';\n        }\n\n        echo \'</div>\';\n    } else {\n        echo \"<p class=\'text-center mt-4\'>No tour themes found.</p>\";\n    }', 0, 'a:0:{}', '', 0, ''),
(4, 1, 0, 'ContactUs', '', 0, 0, 0, 'ob_start();\n\ninclude(\'config-details.php\');\ninclude(\'assets/classes/EmailSender.php\');\n\n$errors = [];\n$successMessage = \'\';\n$errorMessage = \'\';\n\n$name = $email = $phone = $message = \'\';\n$recaptcha_response = \'\';\n\n// Handle form submission\nif ($_SERVER[\'REQUEST_METHOD\'] === \'POST\') {\n\n    $name    = test_input($_POST[\'name\'] ?? \'\');\n    $email   = test_input($_POST[\'email\'] ?? \'\');\n    $phone   = preg_replace(\'/\\D+/\', \'\', $_POST[\'phone\'] ?? \'\');\n    $message = test_input($_POST[\'message\'] ?? \'\');\n    $recaptcha_response = $_POST[\'recaptchaResponse\'] ?? \'\';\n\n    if (!verifyRecaptcha($recaptcha_response)) {\n        $errors[\'recaptcha\'] = \"reCAPTCHA validation failed.\";\n    }\n\n    if (empty($name)) {\n        $errors[\'name\'] = \"Name is required\";\n    }\n\n    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {\n        $errors[\'email\'] = \"Enter a valid email address\";\n    }\n\n    if (empty($phone)) {\n        $errors[\'phone\'] = \"Contact number is required\";\n    }\n\n    if (empty($message)) {\n        $errors[\'message\'] = \"Message is required\";\n    }\n\n    if (empty($errors)) {\n        $emailSender = new EmailSender();\n        $emailTo = SMTP_USERNAME;\n        $emailSubject = \'Contact Form Message\';\n\n        $emailContent = \"\n            <table cellpadding=\'6\'>\n                <tr><td><b>Name</b></td><td>{$name}</td></tr>\n                <tr><td><b>Email</b></td><td>{$email}</td></tr>\n                <tr><td><b>Phone</b></td><td>{$phone}</td></tr>\n                <tr><td><b>Message</b></td><td>\".nl2br($message).\"</td></tr>\n            </table>\n        \";\n\n        if ($emailSender->sendEmail($emailTo, $emailSubject, $emailContent)) {\n            $successMessage = \"Your message has been sent successfully!\";\n            $name = $email = $phone = $message = \'\';\n        } else {\n            $errorMessage = \"Sorry, there was an issue sending your message.\";\n        }\n    }\n}\n?>\n\n<div class=\"row\">\n\n    <!-- Success / Error Messages -->\n    <div class=\"col-12\">\n        <?php if (!empty($successMessage)): ?>\n            <div class=\"alert alert-success alert-dismissible fade show text-center\">\n                <?= $successMessage ?>\n                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>\n            </div>\n        <?php elseif (!empty($errorMessage)): ?>\n            <div class=\"alert alert-danger alert-dismissible fade show text-center\">\n                <?= $errorMessage ?>\n                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>\n            </div>\n        <?php endif; ?>\n    </div>\n\n    <!-- Name -->\n    <div class=\"col-12 my-3\">\n        <label class=\"form-label\">Name<span class=\"text-danger\">*</span></label>\n        <input type=\"text\" name=\"name\" class=\"form-control\" value=\"<?= htmlspecialchars($name) ?>\">\n        <?php if (!empty($errors[\'name\'])): ?>\n            <small class=\"text-danger\"><?= $errors[\'name\'] ?></small>\n        <?php endif; ?>\n    </div>\n\n    <!-- Email -->\n    <div class=\"col-md-6 my-3\">\n        <label class=\"form-label\">Email<span class=\"text-danger\">*</span></label>\n        <input type=\"email\" name=\"email\" class=\"form-control\" value=\"<?= htmlspecialchars($email) ?>\">\n        <?php if (!empty($errors[\'email\'])): ?>\n            <small class=\"text-danger\"><?= $errors[\'email\'] ?></small>\n        <?php endif; ?>\n    </div>\n\n    <!-- Phone -->\n    <div class=\"col-md-6 my-3\">\n        <label class=\"form-label\">Phone<span class=\"text-danger\">*</span></label>\n        <input type=\"tel\" name=\"phone\" class=\"form-control\" value=\"<?= htmlspecialchars($phone) ?>\">\n        <?php if (!empty($errors[\'phone\'])): ?>\n            <small class=\"text-danger\"><?= $errors[\'phone\'] ?></small>\n        <?php endif; ?>\n    </div>\n\n    <!-- Message -->\n    <div class=\"col-12 my-3\">\n        <label class=\"form-label\">Message<span class=\"text-danger\">*</span></label>\n        <textarea name=\"message\" rows=\"5\" class=\"form-control\"><?= htmlspecialchars($message) ?></textarea>\n        <?php if (!empty($errors[\'message\'])): ?>\n            <small class=\"text-danger\"><?= $errors[\'message\'] ?></small>\n        <?php endif; ?>\n    </div>\n\n    <!-- reCAPTCHA -->\n    <input type=\"hidden\" name=\"recaptchaResponse\" id=\"recaptchaResponse\">\n    <?php if (!empty($errors[\'recaptcha\'])): ?>\n        <div class=\"col-12\">\n            <small class=\"text-danger\"><?= $errors[\'recaptcha\'] ?></small>\n        </div>\n    <?php endif; ?>\n\n    <!-- Submit -->\n    <div class=\"col-12 mt-4\">\n        <input type=\"submit\" name=\"submit\" value=\"Send Message\">\n    </div>\n</div>\n\n\n\n<!-- Google reCAPTCHA -->\n<script src=\"https://www.google.com/recaptcha/api.js?render=<?= GOOGLE_RECAPTCHA_SITE_KEY ?>\"></script>\n<script>\n    grecaptcha.ready(function() {\n        grecaptcha.execute(\'<?= GOOGLE_RECAPTCHA_SITE_KEY ?>\', {action: \'submit\'}).then(function(token) {\n            document.getElementById(\'recaptchaResponse\').value = token;\n        });\n    });\n</script>\n\n\n<?php\nreturn ob_get_clean();', 0, 'a:0:{}', '', 0, ''),
(5, 1, 0, 'SelectCity', '', 0, 0, 0, 'ob_start();\n\n    include (\'config-details.php\');\n    include \'assets/includes/db_connect.php\';\n\n    // Get selected theme IDs from URL\n    $themeIDs = isset($_GET[\'themes\']) ? $_GET[\'themes\'] : \'\';\n    $themeIDsArray = array_filter(explode(\",\", $themeIDs));\n\n    $themesData = [];\n    $allImages = [];\n\n    if (!empty($themeIDsArray)) {\n\n        // Create dynamic placeholders (?, ?, ?)\n        $placeholders = rtrim(str_repeat(\'?,\', count($themeIDsArray)), \',\');\n        $query = \"SELECT * FROM tour_themes WHERE id IN ($placeholders)\";\n        $stmt = $conn->prepare($query);\n        $stmt->execute($themeIDsArray);\n        $themesData = $stmt->fetchAll(PDO::FETCH_ASSOC);\n    }\n\n    $citiesData = [];\n\n    $query = \"\n        SELECT id, name, images\n        FROM cities\n        ORDER BY name ASC\n    \";\n\n    $stmt = $conn->prepare($query);\n    $stmt->execute();\n    $citiesData = $stmt->fetchAll(PDO::FETCH_ASSOC);\n\n?>\n\n<body id=\"selectToursPage\">\n    <!-- Hero starts -->\n    <section id=\"hero\">\n        <img src=\"assets/images/tour-hero.jpg\" alt=\"Explore Vacations - Tours\">\n        <div class=\"hero-content\">\n            <h1>Tours</h1>\n        </div>\n    </section>\n    <!-- Hero ends -->\n\n    <!-- Customize Tours section starts -->\n    <section id=\"select-city\" class=\"py-5\">\n        <div class=\"container\">\n            <nav aria-label=\"breadcrumb\">\n                <ol class=\"breadcrumb\">\n                    <li class=\"breadcrumb-item\"><a href=\"tours\">Tours</a></li>\n                    <?php if (!empty($themesData)): ?>\n                        <?php foreach ($themesData as $t): ?>\n                            <li class=\"breadcrumb-item active\">\n                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>\n                            </li>\n                        <?php endforeach; ?>\n                    <?php endif; ?>\n                </ol>\n            </nav>\n\n            <div class=\"row g-4 mt-3 d-flex justify-content-center\">\n                <?php if (!empty($citiesData)): ?>\n                  <?php foreach ($citiesData as $city): ?>\n                        <?php \n                            $cityImages = json_decode($city[\'images\'], true); \n                            $firstImage = !empty($cityImages) ? \'assets/\' . $cityImages[0] : \'\';\n                        ?>\n                        <div class=\"col-12 col-lg-3 col-md-6\">\n                            <div  class=\"card h-100 shadow-sm city-card selectable-city\" data-city-id=\"<?php echo $city[\'id\']; ?>\" >\n                                <!-- Checkbox -->\n                                <div class=\"city-checkbox\">\n                                    <input type=\"checkbox\" name=\"cities[]\" value=\"<?php echo $city[\'id\']; ?>\">\n                                </div>\n                                <img src=\"<?php echo htmlspecialchars($firstImage); ?>\" class=\"card-img-top\" alt=\"<?php echo htmlspecialchars($city[\'name\']); ?>\">\n\n                                <div class=\"card-body text-center\">\n                                    <h3 class=\"card-title\">\n                                        <?php echo htmlspecialchars($city[\'name\']); ?>\n                                    </h3>\n                                </div>\n\n                            </div>\n                        </div>\n                        <?php endforeach; ?>\n\n                    <div class=\"text-center mt-4\">\n                        <button id=\"planTripBtn\" class=\"planTripBtn btn btn-success px-4\"style=\"display:none;\">\n                            Plan Trip\n                        </button>\n                    </div>\n                    <?php else: ?>\n                    <div class=\"col-12 text-center\">\n                        <p class=\"text-muted\">No cities found.</p>\n                    </div>\n                <?php endif; ?>\n            </div>\n        </div>\n    </section>\n\n    <script>\n        document.addEventListener(\'DOMContentLoaded\', function () {\n\n            const cards = document.querySelectorAll(\'.selectable-city\');\n            const planTripBtn = document.getElementById(\'planTripBtn\');\n\n            // Toggle checkbox selection\n            cards.forEach(card => {\n                card.addEventListener(\'click\', function (e) {\n                    if (e.target.tagName === \'INPUT\') return;\n\n                    const checkbox = card.querySelector(\'input[type=\"checkbox\"]\');\n                    checkbox.checked = !checkbox.checked;\n                    card.classList.toggle(\'selected\', checkbox.checked);\n                    togglePlanButton();\n                });\n            });\n\n            // Checkbox change event\n            document.querySelectorAll(\'.city-checkbox input\').forEach(cb => {\n                cb.addEventListener(\'change\', function () {\n                    cb.closest(\'.selectable-city\').classList.toggle(\'selected\', cb.checked);\n                    togglePlanButton();\n                });\n            });\n\n            // Show/hide Plan Trip button\n            function togglePlanButton() {\n                const checked = document.querySelectorAll(\'.city-checkbox input:checked\');\n                planTripBtn.style.display = checked.length ? \'inline-block\' : \'none\';\n            }\n\n            // Redirect to customize-tour.php with selected cities and themes\n            planTripBtn.addEventListener(\'click\', () => {\n                const selectedCities = Array.from(\n                    document.querySelectorAll(\'.city-checkbox input:checked\')\n                ).map(cb => cb.value);\n\n                const themeIDs = new URLSearchParams(window.location.search).get(\'themes\') || \'\';\n\n                // Base URL: use customize-tour.php directly\n                const baseUrl = \"[[~9]]\";\n\n                // Correct separator for query parameters\n                const separator = baseUrl.includes(\'?\') ? \'&\' : \'?\';\n\n                // Build URL safely\n                const url = `${baseUrl}${separator}themes=${encodeURIComponent(themeIDs)}&cities=${encodeURIComponent(selectedCities.join(\',\'))}`;\n\n                window.location.href = url;\n            });\n\n        });\n    </script>\n</body>\n\n<?php\nreturn ob_get_clean();', 0, 'a:0:{}', '', 0, '');
INSERT INTO `modx_site_snippets` (`id`, `source`, `property_preprocess`, `name`, `description`, `editor_type`, `category`, `cache_type`, `snippet`, `locked`, `properties`, `moduleguid`, `static`, `static_file`) VALUES
(6, 1, 0, 'CustomizeTour', '', 0, 0, 0, 'ob_start();\n\ninclude (\'config-details.php\');\n    include \'assets/includes/db_connect.php\';\n    include \'assets/includes/save_itenary.php\';\n\n    // Get selected city IDs\n    $cityIDs = isset($_GET[\'cities\']) ? $_GET[\'cities\'] : \'\';\n    $cityIDsArray = array_filter(explode(\',\', $cityIDs));\n\n    $selectedCities = [];\n\n    if (!empty($cityIDsArray)) {\n        $placeholders = rtrim(str_repeat(\'?,\', count($cityIDsArray)), \',\');\n        $query = \"\n            SELECT id, name\n            FROM cities\n            WHERE id IN ($placeholders)\n        \";\n        $stmt = $conn->prepare($query);\n        $stmt->execute($cityIDsArray);\n        $selectedCities = $stmt->fetchAll(PDO::FETCH_ASSOC);\n    }\n\n\n    // Get selected theme IDs from URL\n    $themeIDs = isset($_GET[\'themes\']) ? $_GET[\'themes\'] : \'\';\n    $themeIDsArray = array_filter(explode(\",\", $themeIDs));\n\n    $themesData = [];\n    $allImages = [];\n\n    if (!empty($themeIDsArray)) {\n\n        // Create dynamic placeholders (?, ?, ?)\n        $placeholders = rtrim(str_repeat(\'?,\', count($themeIDsArray)), \',\');\n        $query = \"SELECT * FROM tour_themes WHERE id IN ($placeholders)\";\n        $stmt = $conn->prepare($query);\n        $stmt->execute($themeIDsArray);\n        $themesData = $stmt->fetchAll(PDO::FETCH_ASSOC);\n\n        // Collect all images into one array\n        foreach ($themesData as $theme) {\n            $images = json_decode($theme[\'theme_images\'], true);\n\n            if ($images) {\n                foreach ($images as $img) {\n                    $allImages[] = $img;\n                }\n            }\n        }\n    }\n\n    // Fetch country codes from DB\n    $countryCodes = [];\n    try {\n        $stmt = $conn->prepare(\"SELECT country_name, country_code FROM country_codes ORDER BY country_name ASC\");\n        $stmt->execute();\n        $countryCodes = $stmt->fetchAll(PDO::FETCH_ASSOC);\n    } catch (Exception $e) {\n        // Handle error\n        error_log(\"Error fetching country codes: \" . $e->getMessage());\n    }\n\n?>\n\n<head>\n    <style>\n        .dropdown-menu {\n            display: none;\n            max-height: 0;\n            overflow: hidden;\n            transition: max-height 0.3s ease;\n        }\n\n        .dropdown-menu.show {\n            display: block;\n            max-height: 500px; \n        }\n\n        .input-group-sm > .btn, .input-group-sm > .form-control {\n            height: 30px;\n            font-size: 0.875rem;\n        }\n\n        .star-rating {\n            display: flex;\n            flex-direction: row-reverse;\n            font-size: 1.5rem;\n            justify-content: flex-start;\n        }\n\n        .star-rating input {\n            display: none;\n        }\n\n        .star-rating label {\n            color: #ddd;\n            cursor: pointer;\n            margin-right: 5px;\n            transition: color 0.2s;\n        }\n\n        .star-rating input:checked ~ label,\n        .star-rating label:hover,\n        .star-rating label:hover ~ label {\n            color: gold;\n        }\n    </style>\n</head>\n\n<body id=\"toursCustomizePage\">\n    <!-- Hero section starts -->\n    <section id=\"hero\">\n        <img src=\"assets/images/cutomize-tour-hero.jpg\" alt=\"Explore Vacations - Tours\">\n        <div class=\"hero-content\">\n            <h1>Customize Tours</h1>\n        </div>\n    </section>\n    <!-- Hero section ends -->\n\n    <!-- Customize Tours section starts -->\n    <section id=\"customize-tour\" class=\"py-5\">\n        <div class=\"container\">\n            <nav aria-label=\"breadcrumb\">\n                <ol class=\"breadcrumb\">\n                    <li class=\"breadcrumb-item\"><a href=\"tours\">Tours</a></li>\n                    <?php if (!empty($themesData)): ?>\n                        <?php foreach ($themesData as $t): ?>\n                            <li class=\"breadcrumb-item active\">\n                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>\n                            </li>\n                        <?php endforeach; ?>\n                    <?php endif; ?>\n                </ol>\n            </nav>\n\n            <h2 class=\"heading mb-4\">Plan Your Tour..</h2>\n            <div class=\"row justify-content-center\">\n                <div class=\"col-12\">\n                    <div class=\"card shadow-sm\">\n                        <div id=\"tourCarousel\" class=\"carousel slide\" data-bs-ride=\"carousel\">\n                            <div class=\"carousel-inner\">\n                                <?php if (!empty($allImages)): ?>\n                                    <?php foreach ($allImages as $index => $img): ?>\n                                        <div class=\"carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>\">\n                                            <img src=\"assets/<?php echo ltrim($img, \'/\'); ?>\" class=\"d-block w-100 rounded\" alt=\"Tour Image\">\n                                        </div>\n                                    <?php endforeach; ?>\n                                <?php else: ?>\n                                    <div class=\"carousel-item active\">\n                                        <img src=\"assets/images/default-theme.jpg\" class=\"d-block w-100 rounded\" alt=\"No Image\">\n                                    </div>\n                                <?php endif; ?>\n\n                            </div>\n                            <div class=\"carousel-indicators\">\n                                <?php foreach ($allImages as $index => $img): ?>\n                                    <button type=\"button\" data-bs-target=\"#tourCarousel\" data-bs-slide-to=\"<?php echo $index; ?>\" class=\"<?php echo $index === 0 ? \'active\' : \'\'; ?>\" aria-current=\"<?php echo $index === 0 ? \'true\' : \'false\'; ?>\" aria-label=\"Slide <?php echo $index + 1; ?>\"></button>\n                                <?php endforeach; ?>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n\n            <hr>\n\n            <div id=\"customizeForm\">\n                <div class=\"intro row align-items-center mt-4\">\n                    <div class=\"col\">\n                        <p class=\"mb-0\">\n                            ✨Customize your trip, and send us your plan. We\'ll guide you through the next steps and put together a full itinerary with cozy stays 🏨, fun activities 🎉, and all the details you need...\n                        </p>\n                    </div>\n                </div>\n                <hr>\n                <form method=\"post\" action=\"\" id=\"customTourForm\">\n                    <div class=\"card mt-4 border-0\">\n                        <div class=\"row g-3 align-items-center\">\n                            <div class=\"col-md-6 col-lg-4\">\n                                <label class=\"form-label fw-semibold\">Dates</label>\n                                <div class=\"input-group\">\n                                    <input type=\"date\" class=\"form-control text-center\" name=\"start_date\" placeholder=\"Start Date\">\n                                    <input type=\"text\" class=\"form-control text-center\" name=\"nights\" placeholder=\"Nights\" min=\"1\">\n                                    <input type=\"date\" class=\"form-control text-center\" name=\"end_date\" placeholder=\"End Date\">\n                                </div>\n                            </div>\n\n                            <div class=\"col-md-6 col-lg-4\">\n                                <label class=\"form-label fw-semibold\">Guests</label>\n                                <div class=\"dropdown\">\n                                    <button class=\"form-control text-start\" type=\"button\" id=\"guestDropdownButton\">\n                                        2 Adults, 0 Children, 0 Infants\n                                    </button>\n                                    <div class=\"dropdown-menu p-3\" id=\"guestDropdownMenu\" style=\"min-width: 250px;\">\n                                        <!-- Adults -->\n                                        <div class=\"d-flex justify-content-between align-items-center mb-2\">\n                                            <span>Adults</span>\n                                            <div class=\"input-group input-group-sm\" style=\"width: 100px;\">\n                                                <button class=\"btn btn-outline-secondary decrement\" type=\"button\" data-target=\"adults\">-</button>\n                                                <input type=\"number\" class=\"form-control text-center\" id=\"adults\" value=\"2\" min=\"1\" readonly>\n                                                <button class=\"btn btn-outline-secondary increment\" type=\"button\" data-target=\"adults\">+</button>\n                                            </div>\n                                        </div>\n\n                                        <!-- Children 6-11 -->\n                                        <div class=\"d-flex justify-content-between align-items-center mb-2\">\n                                            <span>Children (6-11)</span>\n                                            <div class=\"input-group input-group-sm\" style=\"width: 100px;\">\n                                                <button class=\"btn btn-outline-secondary decrement\" type=\"button\" data-target=\"children_6_11\">-</button>\n                                                <input type=\"number\" class=\"form-control text-center\" id=\"children_6_11\" value=\"0\" min=\"0\" readonly>\n                                                <button class=\"btn btn-outline-secondary increment\" type=\"button\" data-target=\"children_6_11\">+</button>\n                                            </div>\n                                        </div>\n\n                                        <!-- Children 12+ -->\n                                        <div class=\"d-flex justify-content-between align-items-center mb-2\">\n                                            <span>Children (12+)</span>\n                                            <div class=\"input-group input-group-sm\" style=\"width: 100px;\">\n                                                <button class=\"btn btn-outline-secondary decrement\" type=\"button\" data-target=\"children_above_11\">-</button>\n                                                <input type=\"number\" class=\"form-control text-center\" id=\"children_above_11\" value=\"0\" min=\"0\" readonly>\n                                                <button class=\"btn btn-outline-secondary increment\" type=\"button\" data-target=\"children_above_11\">+</button>\n                                            </div>\n                                        </div>\n\n                                        <!-- Infants -->\n                                        <div class=\"d-flex justify-content-between align-items-center mb-2\">\n                                            <span>Infants</span>\n                                            <div class=\"input-group input-group-sm\" style=\"width: 100px;\">\n                                                <button class=\"btn btn-outline-secondary decrement\" type=\"button\" data-target=\"infants\">-</button>\n                                                <input type=\"number\" class=\"form-control text-center\" id=\"infants\" value=\"0\" min=\"0\" readonly>\n                                                <button class=\"btn btn-outline-secondary increment\" type=\"button\" data-target=\"infants\">+</button>\n                                            </div>\n                                        </div>\n                                    </div>\n                                </div>\n                            </div>\n\n                            <input type=\"hidden\" name=\"adults\" id=\"adults_hidden\">\n                            <input type=\"hidden\" name=\"children_6_11\" id=\"children_6_11_hidden\">\n                            <input type=\"hidden\" name=\"children_above_11\" id=\"children_above_11_hidden\">\n                            <input type=\"hidden\" name=\"infants\" id=\"infants_hidden\">\n\n\n                            <div class=\"col-md-6 col-lg-4\">\n                                <label class=\"form-label fw-semibold\">Preferred Hotel Rating</label>\n                                <div class=\"d-flex gap-3 align-items-center\">\n                                    <div class=\"form-check\">\n                                        <input class=\"form-check-input\" type=\"radio\" name=\"hotelRating\" id=\"rating3\" value=\"3\">\n                                        <label class=\"form-check-label\" for=\"rating3\">3 <span style=\"color:#ab9629\">&#9733;</span></label>\n                                    </div>\n                                    <div class=\"form-check\">\n                                        <input class=\"form-check-input\" type=\"radio\" name=\"hotelRating\" id=\"rating4\" value=\"4\">\n                                        <label class=\"form-check-label\" for=\"rating4\">4 <span style=\"color:#ab9629\">&#9733;</span></label>\n                                    </div>\n                                    <div class=\"form-check\">\n                                        <input class=\"form-check-input\" type=\"radio\" name=\"hotelRating\" id=\"rating5\" value=\"5\">\n                                        <label class=\"form-check-label\" for=\"rating5\">5 <span style=\"color:#ab9629\">&#9733;</span></label>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        <hr>\n\n                        <div class=\"row my-3\">\n                            <div class=\"col-12 col-md-6\">\n                                <label for=\"pickupLocation\" class=\"form-label fw-semibold\">Pickup Location</label>\n                                <input type=\"text\" class=\"form-control\" id=\"pickupLocation\" name=\"pickupLocation\" placeholder=\"Enter pickup location\" required>\n                            </div>\n\n                            <div class=\"col-12 col-md-6\">\n                                <label for=\"dropoffLocation\" class=\"form-label fw-semibold\">Dropoff Location</label>\n                                <input type=\"text\" class=\"form-control\" id=\"dropoffLocation\" name=\"dropoffLocation\" placeholder=\"Enter dropoff location\" required>\n                            </div>\n                        </div>\n\n                        <?php if (!empty($selectedCities)): ?>\n                        <hr>\n                        <div class=\"row\">\n                            <!-- Selected Cities -->\n                            <div class=\"col-md-6\">\n                                <h3>Selected Cities</h3>\n                                <div class=\"row\">\n                                    <?php foreach ($selectedCities as $city): ?>\n                                        <div class=\"col-md-6 col-lg-6 mb-2\">\n                                            <div class=\"card p-2 text-center\" style=\"border-radius:0;\">\n                                                <?php echo htmlspecialchars($city[\'name\']); ?>\n                                            </div>\n                                        </div>\n                                    <?php endforeach; ?>\n                                </div>\n                            </div>\n\n                            <!-- Tour Map -->\n                            <div class=\"col-md-6\">\n                                <h3>Tour Map</h3>\n                                <div id=\"map\" style=\"height:200px;width:100%;\"></div>\n                            </div>\n                        </div>\n                        <?php endif; ?>\n\n                        <hr>\n\n                        <div class=\"row\">\n                            <div class=\"col-12 col-md-6 mb-4\">\n                                <label class=\"form-label fw-semibold d-block\">Preferred Meal Plan</label>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealPlan\" id=\"mealPlan1\" value=\"Breakfast Only\">\n                                    <label class=\"form-check-label\" for=\"mealPlan1\">Breakfast Only</label>\n                                </div>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealPlan\" id=\"mealPlan2\" value=\"Half Board\">\n                                    <label class=\"form-check-label\" for=\"mealPlan2\">Half Board</label>\n                                </div>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealPlan\" id=\"mealPlan3\" value=\"Full Board\">\n                                    <label class=\"form-check-label\" for=\"mealPlan3\">Full Board</label>\n                                </div>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealPlan\" id=\"mealPlan4\" value=\"All Inclusive\">\n                                    <label class=\"form-check-label\" for=\"mealPlan4\">All Inclusive</label>\n                                </div>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-4\">\n                                <label class=\"form-label fw-semibold d-block\">Do you have any meal allergy issues?</label>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealAllergy\" id=\"mealAllergyYes\" value=\"Yes\">\n                                    <label class=\"form-check-label\" for=\"mealAllergyYes\">Yes</label>\n                                </div>\n                                <div class=\"form-check form-check-inline\">\n                                    <input class=\"form-check-input\" type=\"radio\" name=\"mealAllergy\" id=\"mealAllergyNo\" value=\"No\">\n                                    <label class=\"form-check-label\" for=\"mealAllergyNo\">No</label>\n                                </div>\n                                <div class=\"mt-2\" id=\"allergyDetails\" style=\"display:none;\">\n                                    <input type=\"text\" class=\"form-control\" name=\"allergy_reason\" placeholder=\"Please specify your allergy\">\n                                </div>\n                            </div>\n                        </div>\n\n                        <hr>\n\n                        <div class=\"row\">\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <div class=\"row g-2 align-items-end\">\n                                    <div class=\"col-auto\">\n                                        <label for=\"title\" class=\"form-label small\">Title<span class=\"text-danger\">*</span></label>\n                                        <select class=\"form-select\" id=\"title\" name=\"title\" required>\n                                            <option value=\"\" selected disabled>Select</option>\n                                            <option value=\"Mr\">Mr</option>\n                                            <option value=\"Mrs\">Mrs</option>\n                                            <option value=\"Ms\">Ms</option>\n                                            <option value=\"Dr\">Dr</option>\n                                            <option value=\"Prof\">Prof</option>\n                                        </select>\n                                    </div>\n                                    <div class=\"col\">\n                                        <label for=\"fullName\" class=\"form-label\">Full Name<span class=\"text-danger\">*</span></label>\n                                        <input type=\"text\" class=\"form-control\" id=\"fullName\" name=\"fullName\" placeholder=\"Enter your full name\" required>\n                                    </div>\n                                </div>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <label class=\"form-label fw-semibold\" for=\"email\">Email<span class=\"text-danger\">*</span></label>\n                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Enter your email\" required>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <div class=\"row g-2 align-items-end\">\n                                    <div class=\"col-auto code\" style=\"width:50%;\">\n                                        <label for=\"whatsappCode\" class=\"form-label small\">Code<span class=\"text-danger\">*</span></label>\n                                        <select class=\"form-select\" id=\"whatsappCode\" name=\"whatsappCode\" required>\n                                            <option value=\"\" selected disabled>Select</option>\n                                            <?php foreach($countryCodes as $c): ?>\n                                                <option value=\"<?php echo htmlspecialchars($c[\'country_code\']); ?>\">\n                                                    <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>\n                                                </option>\n                                            <?php endforeach; ?>\n                                        </select>\n                                    </div>\n                                    <div class=\"col\">\n                                        <label for=\"whatsapp\" class=\"form-label\">WhatsApp Number<span class=\"text-danger\">*</span></label>\n                                        <input type=\"phone\" class=\"form-control\" id=\"whatsapp\" name=\"whatsapp\" placeholder=\"Enter WhatsApp number\" required>\n                                    </div>\n                                </div>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <label class=\"form-label fw-semibold\" for=\"country\">Country<span class=\"text-danger\">*</span></label>\n                                <select class=\"form-select\" id=\"country\" name=\"country\" required>\n                                    <option value=\"\" selected disabled>Select your country</option>\n                                </select>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <label class=\"form-label fw-semibold\" for=\"nationality\">Nationality<span class=\"text-danger\">*</span></label>\n                                <input type=\"text\" class=\"form-control\" id=\"nationality\" name=\"nationality\" placeholder=\"Enter your Nationality\" required>\n                            </div>\n\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <label class=\"form-label fw-semibold\" for=\"flightNumber\">Flight Number<span class=\"text-danger\">*</span></label>\n                                <input type=\"text\" class=\"form-control\" id=\"flightNumber\" name=\"flightNumber\" placeholder=\"Enter flight number\" required>\n                            </div>\n                        </div>\n                        <div class=\"row\">\n                            <div class=\"col-12 col-md-6 mb-3\">\n                                <label class=\"form-label fw-semibold\" for=\"remarks\">Remarks</label>\n                                <textarea class=\"form-control\" id=\"remarks\" name=\"remarks\" rows=\"4\" placeholder=\"Any remarks or requests\"></textarea>\n                            </div>\n                        </div>\n                        <div class=\"row\">\n                            <div class=\"col d-flex justify-content-end\">\n                                <button class=\"btn btn-primary submit-button\">Submit</button>\n                            </div>\n                        </div>\n                    </div>\n                </form>\n            </div>\n        </div>\n    </section>\n    <!-- Customize Tours section ends -->\n\n    <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM&libraries=places&callback=initMap\" async defer></script>\n\n    <script>\n        const btn = document.getElementById(\'guestDropdownButton\');\n        const menu = document.getElementById(\'guestDropdownMenu\');\n        const ids = [\'adults\',\'children_6_11\',\'children_above_11\',\'infants\'];\n\n        btn.addEventListener(\'click\', () => menu.classList.toggle(\'show\'));\n        document.addEventListener(\'click\', e => { if(!btn.contains(e.target)&&!menu.contains(e.target)) menu.classList.remove(\'show\'); });\n\n        function update() {\n            const adults = +document.getElementById(\'adults\').value;\n            const children = ids.slice(1).reduce((s,id)=>s + +document.getElementById(id).value,0);\n            btn.textContent = `${adults} Adults, ${children} Children`;\n\n            document.getElementById(\'adults_hidden\').value = adults;\n            document.getElementById(\'children_6_11_hidden\').value = document.getElementById(\'children_6_11\').value;\n            document.getElementById(\'children_above_11_hidden\').value = document.getElementById(\'children_above_11\').value;\n            document.getElementById(\'infants_hidden\').value = document.getElementById(\'infants\').value;\n        }\n\n        document.querySelectorAll(\'.increment,.decrement\').forEach(b=>{\n            b.addEventListener(\'click\', ()=>{\n                const i = document.getElementById(b.dataset.target);\n                const min = +i.min||0;\n                i.value = Math.max(min, +i.value + (b.classList.contains(\'increment\')?1:-1));\n                update();\n            });\n        });\n\n        update();\n\n    </script>\n\n    <script>\n        document.addEventListener(\"DOMContentLoaded\", () => {\n            const start = document.querySelector(\'input[name=\"start_date\"]\');\n            const end = document.querySelector(\'input[name=\"end_date\"]\');\n            const nights = document.querySelector(\'input[name=\"nights\"]\');\n            const today = new Date().toISOString().split(\'T\')[0];\n\n            start.min = today;\n            end.min = today;\n\n            const calcNights = () => {\n                const diff = (new Date(end.value) - new Date(start.value)) / (1000 * 60 * 60 * 24);\n                nights.value = diff > 0 ? `${diff} night${diff > 1 ? \'s\' : \'\'}` : \'\';\n            };\n\n            start.addEventListener(\'change\', () => {\n                if (end.value && new Date(end.value) < new Date(start.value)) end.value = nights.value = \'\';\n                end.min = start.value;\n                calcNights();\n            });\n\n            end.addEventListener(\'change\', calcNights);\n        });\n    </script>\n\n    <script>\n        let map;\n        let geocoder;\n        let bounds;\n        let markers = [];\n        let pathCoordinates = []; \n\n        function initMap() {\n            map = new google.maps.Map(document.getElementById(\"map\"), {\n                zoom: 7,\n                center: { lat: 7.8731, lng: 80.7718 } \n            });\n\n            geocoder = new google.maps.Geocoder();\n            bounds = new google.maps.LatLngBounds();\n\n            const selectedCities = <?php echo json_encode($selectedCities); ?>;\n\n            if (selectedCities.length === 0) return;\n\n            let geocodePromises = selectedCities.map(city => geocodeCity(city.name));\n\n            Promise.all(geocodePromises).then(coords => {\n                pathCoordinates = coords.filter(c => c !== null); \n\n                if (pathCoordinates.length > 1) {\n                    const tourPath = new google.maps.Polyline({\n                        path: pathCoordinates,\n                        geodesic: true,\n                        strokeColor: \'#FF0000\',\n                        strokeOpacity: 0.7,\n                        strokeWeight: 4\n                    });\n                    tourPath.setMap(map);\n                }\n\n                bounds = new google.maps.LatLngBounds();\n                pathCoordinates.forEach(coord => bounds.extend(coord));\n                map.fitBounds(bounds);\n            });\n\n            initAutocomplete();\n        }\n\n        function geocodeCity(cityName) {\n            return new Promise((resolve, reject) => {\n                geocoder.geocode({ address: cityName + \', Sri Lanka\' }, (results, status) => {\n                    if (status === \'OK\') {\n                        const location = results[0].geometry.location;\n\n                        new google.maps.Marker({\n                            map: map,\n                            position: location,\n                            title: cityName\n                        });\n\n                        resolve(location);\n                    } else {\n                        console.warn(\'Geocode failed for:\', cityName, status);\n                        resolve(null); \n                    }\n                });\n            });\n        }\n\n        function initAutocomplete() {\n            const pickupInput = document.getElementById(\'pickupLocation\');\n            const dropoffInput = document.getElementById(\'dropoffLocation\');\n\n            const options = {\n                types: [\'geocode\', \'establishment\'],\n                componentRestrictions: { country: \'LK\' } \n            };\n\n            if (pickupInput) {\n                new google.maps.places.Autocomplete(pickupInput, options);\n            }\n\n            if (dropoffInput) {\n                new google.maps.places.Autocomplete(dropoffInput, options);\n            }\n        }\n    </script>\n\n    <script>\n        const yesRadio = document.getElementById(\'mealAllergyYes\');\n        const noRadio = document.getElementById(\'mealAllergyNo\');\n        const allergyInput = document.getElementById(\'allergyDetails\');\n\n        yesRadio.addEventListener(\'change\', () => {\n            allergyInput.style.display = yesRadio.checked ? \'block\' : \'none\';\n        });\n\n        noRadio.addEventListener(\'change\', () => {\n            allergyInput.style.display = \'none\';\n        });\n    </script>\n\n    <script>\n        document.addEventListener(\"DOMContentLoaded\", () => {\n            const countrySelect = document.getElementById(\"country\");\n            fetch(\"https://restcountries.com/v3.1/all?fields=name\")\n                .then(res => res.json())\n                .then(data => Array.isArray(data) && \n                    data.sort((a,b) => a.name.common.localeCompare(b.name.common))\n                        .forEach(c => countrySelect.add(new Option(c.name.common, c.name.common)))\n                )\n                .catch(err => console.error(\"Error fetching countries:\", err));\n        });\n    </script>\n\n    <script>\n        document.addEventListener(\"DOMContentLoaded\", () => {\n            <?php if (!empty($_SESSION[\'itinerary_success\']) && !empty($_SESSION[\'pdf_to_download\'])): ?>\n                Swal.fire({\n                    icon: \'success\',\n                    title: \'Submitted Successfully\',\n                    text: \'Your tour request has been received.\',\n                    confirmButtonText: \'Download Itinerary\'\n                }).then(() => {\n                    window.location.href = \'<?php echo $_SESSION[\'pdf_to_download\']; ?>\';\n                });\n                <?php\n                unset($_SESSION[\'itinerary_success\'], $_SESSION[\'pdf_to_download\']);\n                ?>\n            <?php endif; ?>\n        });\n    </script>\n</body>\n\n<?php\nreturn ob_get_clean();', 0, 'a:0:{}', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_templates`
--

CREATE TABLE `modx_site_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_preprocess` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `templatename` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `editor_type` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) NOT NULL DEFAULT '',
  `template_type` int(11) NOT NULL DEFAULT 0,
  `content` mediumtext NOT NULL,
  `locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `properties` text DEFAULT NULL,
  `static` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `static_file` varchar(255) NOT NULL DEFAULT '',
  `preview_file` varchar(191) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_site_templates`
--

INSERT INTO `modx_site_templates` (`id`, `source`, `property_preprocess`, `templatename`, `description`, `editor_type`, `category`, `icon`, `template_type`, `content`, `locked`, `properties`, `static`, `static_file`, `preview_file`) VALUES
(1, 0, 0, 'BaseTemplate', '', 0, 0, '', 0, '<!doctype html>\n<html lang=\"en\">\n<head>\n    <title>[[*pagetitle]] - [[++site_name]]</title>\n    <base href=\"[[!++site_url]]\">\n    <meta charset=\"[[++modx_charset]]\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">\n\n    <style>\n        body {\n            background-color: #eee;\n            font-family: sans-serif;\n            font-size: 20px;\n            line-height: 1.4em;\n            padding: 0;\n            margin: 0;\n        }\n        body.loaded {\n            font-family: \'Open Sans\', sans-serif;\n        }\n        .container {\n            display: block;\n            max-width: 960px;\n            margin: 2em auto 2em;\n            padding: 2em;\n            background: #fff;\n            border: 1px solid #ddd;\n            border-radius: 3px;\n        }\n        .container > section {\n            height: 100%;\n            width: 60%;\n            display: inline-block;\n            float: left;\n            margin-bottom: 2em;\n        }\n        .container > aside {\n            height: 100%;\n            display: inline-block;\n            width: 30%;\n            border-left: 2px dashed #eee;\n            float: right;\n            padding-left: 1.5em;\n        }\n        .logo {\n            background: url(\'[[++manager_url]]templates/default/images/modx-logo-color.svg\') no-repeat center transparent;\n            width: 220px;\n            height: 85px;\n            background-size: contain;\n            display: block;\n            position: relative;\n            text-indent: -9999px;\n            margin: 2em auto;\n        }\n        h1, h2, h3, h4, h5 {\n            color: #494949;\n            font-family: \'Open Sans\', sans-serif;\n            font-weight: 700;\n        }\n        h1 {\n            font-size: 36px;\n            color: #137899;\n        }\n        h2 {\n            font-size: 29px;\n        }\n        h3 {\n            font-size: 24px;\n        }\n        a {\n            color: #0f7096;\n        }\n        ul {\n            padding-left: 2em;\n        }\n        img {\n            max-width: 100%;\n        }\n        .cta-button {\n            display: block;\n            text-align: center;\n            vertical-align: middle;\n            -webkit-transform: translateZ(0);\n            transform: translateZ(0);\n            box-shadow: 0 0 1px rgba(0, 0, 0, 0);\n            -webkit-backface-visibility: hidden;\n            backface-visibility: hidden;\n            -moz-osx-font-smoothing: grayscale;\n            position: relative;\n            overflow: hidden;\n            margin: .2em 0;\n            padding: 1em;\n            cursor: pointer;\n            background: #67a749;\n            text-decoration: none;\n            border-radius: 3px;\n            color: #fff;\n            -webkit-tap-highlight-color: rgba(0,0,0,0);\n        }\n        .cta-button:before {\n            content: \"\";\n            position: absolute;\n            z-index: -1;\n            left: 50%;\n            right: 50%;\n            bottom: 0;\n            background: #137899;\n            height: 5px;\n            -webkit-transition-property: left, right;\n            transition-property: left, right;\n            -webkit-transition-duration: 0.3s;\n            transition-duration: 0.3s;\n            -webkit-transition-timing-function: ease-out;\n            transition-timing-function: ease-out;\n        }\n        .cta-button:hover:before, .cta-button:focus:before, .cta-button:active:before {\n            left: 0;\n            right: 0;\n        }\n        .companies {\n            clear: both;\n            display: block;\n            width: 100%;\n            padding: 1em 0 0;\n            border-top: 2px dashed #eee;\n        }\n        .companies h3 {\n            text-align: center;\n            margin: 0;\n        }\n        .companies ul {\n            margin: 0;\n            padding: 0;\n            list-style: none;\n            text-align: center;\n        }\n        .companies ul li {\n            display: inline-block;\n            padding: 0 1em;\n        }\n        .companies ul li:first-child {\n            padding-left: 0;\n        }\n        .companies ul li:last-child {\n            padding-right: 0;\n        }\n        .companies ul li a {\n            display: block;\n            position: relative;\n            text-indent: -99999px;\n            width: 200px;\n            height: 75px;\n            background-repeat: no-repeat;\n            background-size: 200px;\n            background-position: center;\n        }\n        .companies ul li.modmore a {\n            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAABxCAMAAAAUAqFnAAADAFBMVEUgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToAgToB8YRCjAAAA/3RSTlMAAQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0eHyAhIiMkJSYnKCkqKywtLi8wMTIzNDU2Nzg5Ojs8PT4/QEFCQ0RFRkdISUpLTE1O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);\n        }\n        .companies ul li.extrasio a {\n            background-image: url(data:image/png;base64,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);\n        }\n        .companies ul li.modstore a {\n            background-image: url(data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMxaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzA2NyA3OS4xNTc3NDcsIDIwMTUvMDMvMzAtMjM6NDA6NDIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkM1OTk4RURBQjNCNTExRTVBNzdGRjlFOTdFNjM1MzEwIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkM1OTk4RURCQjNCNTExRTVBNzdGRjlFOTdFNjM1MzEwIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjlCOUZEN0ZCM0IwMTFFNUE3N0ZGOUU5N0U2MzUzMTAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjlCOUZEODBCM0IwMTFFNUE3N0ZGOUU5N0U2MzUzMTAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAACAgICAgICAgICAwIC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);\n        }\n        .companies ul li.modxextras a {\n            background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMjkuNDkgNjEuNTQiPjxkZWZzPjxzdHlsZT4uY2xzLTF7ZmlsbDojMDBiNWRlO30uY2xzLTJ7ZmlsbDojMDBkZWNjO30uY2xzLTN7ZmlsbDojZmY1NTI5O30uY2xzLTR7ZmlsbDojZmY5NjQwO30uY2xzLTV7ZmlsbDojMTAyYzUzO308L3N0eWxlPjwvZGVmcz48ZyBpZD0iTGF5ZXJfMiIgZGF0YS1uYW1lPSJMYXllciAyIj48ZyBpZD0iYnJhbmRfZ3VpZGVzIiBkYXRhLW5hbWU9ImJyYW5kIGd1aWRlcyI+PGcgaWQ9ImxvZ29fb25fbGlnaHQiIGRhdGEtbmFtZT0ibG9nbyBvbiBsaWdodCI+PHBvbHlnb24gY2xhc3M9ImNscy0xIiBwb2ludHM9IjU5LjI5IDUuOTUgMjkuNTggNS45NSAyNS41NiAxMi40IDQ2Ljk0IDI1LjcgNDYuOTQgMjUuNyA0Ni45NCAyNS43MSA1OS4yOSA1Ljk1Ii8+PHBvbHlnb24gY2xhc3M9ImNscy0yIiBwb2ludHM9IjI1LjU2IDEyLjQgNS42MiAwIDUuNjIgMjkuNzEgMTIuNDkgMzMuNzIgNDYuOTQgMjUuNyA0Ni45NCAyNS43IDI1LjU2IDEyLjQiLz48cG9seWdvbiBjbGFzcz0iY2xzLTMiIHBvaW50cz0iNDcuMDYgMjcuODIgNDcuMDYgMjcuODIgNDcuMDcgMjcuODIgNDcuMDYgMjcuODIiLz48cG9seWdvbiBjbGFzcz0iY2xzLTMiIHBvaW50cz0iNTMuNDcgMzEuODMgNDcuMDcgMjcuODIgMzMuNjUgNDkuMTUgNTMuNDcgNjEuNTQgNTMuNDcgMzEuODMiLz48cG9seWdvbiBjbGFzcz0iY2xzLTQiIHBvaW50cz0iNDcuMDcgMjcuODIgNDcuMDcgMjcuODIgNDcuMDYgMjcuODIgMTIuMzUgMzUuOTggMCA1NS40MSAyOS43MSA1NS40MSAzMy42NSA0OS4xNSA0Ny4wNyAyNy44MiA0Ny4wNyAyNy44MiIvPjxwYXRoIGNsYXNzPSJjbHMtNSIgZD0iTTEwNy42Niw0Ny44bDAtMTguODRMOTguMzcsNDQuNDhIOTUuMUw4NS45LDI5LjM3VjQ3LjhINzkuMDhWMTYuNGg2TDk2Ljg1LDM1LjkyLDEwOC40MiwxNi40aDZsLjA5LDMxLjRaIi8+PHBhdGggY2xhc3M9ImNscy01IiBkPSJNMTIxLjgyLDMyLjFjMC05LjMzLDcuMjctMTYuMjQsMTcuMTgtMTYuMjRzMTcuMTgsNi44NywxNy4xOCwxNi4yNFMxNDguODcsNDguMzQsMTM5LDQ4LjM0LDEyMS44Miw0MS40MywxMjEuODIsMzIuMVptMjcsMGMwLTYtNC4yMi0xMC05LjgzLTEwcy05LjgyLDQuMDktOS44MiwxMC4wNSw0LjIxLDEwLDkuODIsMTBTMTQ4LjgzLDM4LjA3LDE0OC44MywzMi4xWiIvPjxwYXRoIGNsYXNzPSJjbHMtNSIgZD0iTTE2My41OSwxNi40aDE0LjI2YzEwLjI3LDAsMTcuMzIsNi4xOSwxNy4zMiwxNS43cy03LDE1LjctMTcuMzIsMTUuN0gxNjMuNTlabTEzLjksMjUuNDRjNi4yNCwwLDEwLjMyLTMuNzMsMTAuMzItOS43NHMtNC4wOC05LjczLTEwLjMyLTkuNzNoLTYuNjRWNDEuODRaIi8+PHBhdGggY2xhc3M9ImNscy01IiBkPSJNMjIxLjEsNDcuOGwtNy41OC0xMC45LTcuNDUsMTAuOWgtOC4zNGwxMS42MS0xNi0xMS0xNS40M2g4LjI1bDcuMjIsMTAuMTgsNy4wOS0xMC4xOGg3Ljg1TDIxNy43OCwzMS41NiwyMjkuNDksNDcuOFoiLz48L2c+PC9nPjwvZz48L3N2Zz4=);\n        }\n        .disclaimer {\n            max-width: 960px;\n            display: block;\n            margin: 0 auto;\n            text-align: center;\n            color: #333;\n            font-size: .6em;\n        }\n        @media (min-width: 768px) and (max-width: 991px)  {\n            .container {\n                padding: 1em;\n                border: 0;\n                border-radius: 0;\n            }\n        }\n        @media (max-width: 767px)  {\n            body {\n                font-size: 16px;\n            }\n            .container {\n                padding: 1em;\n                margin: 0 0 1em;\n                border: 0;\n                border-radius: 0;\n            }\n            .container > section, .container > aside {\n                float: none;\n                width: 100%;\n            }\n            .container aside {\n                border: 0;\n                padding: 0;\n            }\n            .logo {\n                width: 100%;\n                height: 48px;\n            }\n            h1 {\n                font-size: 24px;\n            }\n            h2 {\n                font-size: 19px;\n            }\n            h3 {\n                font-size: 16px;\n            }\n            .companys ul li {\n                display: block;\n            }\n        }\n    </style>\n</head>\n<body>\n<a href=\"https://modx.com\" title=\"MODX\" class=\"logo\" target=\"_blank\">MODX</a>\n<div class=\"container\">\n    <section>\n        <h1>[[*longtitle:default=`[[*pagetitle]]`]]</h1>\n        [[*content]]\n    </section>\n    <aside>\n        <a href=\"[[++manager_url]]\" title=\"Your MODX manager\" class=\"cta-button\">Go to the&nbsp;manager</a>\n        <h3>Learn more about&nbsp;MODX</h3>\n        <ul>\n            <li><a href=\"https://docs.modx.com/3.x/en/index\" target=\"_blank\">Official&nbsp;Documentation</a></li>\n            <li><a href=\"https://docs.modx.com/3.x/en/getting-started/friendly-urls\" target=\"_blank\">Using Friendly&nbsp;URLs</a></li>\n            <li><a href=\"https://docs.modx.com/current/en/building-sites/extras\" target=\"_blank\">Package&nbsp;Management</a></li>\n            <li><a href=\"https://modx.com/blog/\" target=\"_blank\">Official MODX&nbsp;Blog</a></li>\n            <li><a href=\"http://www.discovermodx.com/\" target=\"_blank\">Discover&nbsp;MODX</a></li>\n            <li><a href=\"https://modx.today\" target=\"_blank\">MODX.today</a></li>\n        </ul>\n        <h3>Get help!</h3>\n        <ul>\n            <li><a href=\"https://community.modx.com\" target=\"_blank\">Official MODX&nbsp;Forums</a></li>\n            <li><a href=\"https://modx.org/\" target=\"_blank\">MODX on&nbsp;Slack</a></li>\n            <li><a href=\"https://twitter.com/modx\" target=\"_blank\">MODX on&nbsp;Twitter</a></li>\n            <li><a href=\"https://www.facebook.com/modxcms\" target=\"_blank\">MODX on&nbsp;Facebook</a></li>\n            <li><a href=\"https://modx.com/professionals/\" target=\"_blank\">Find a MODX&nbsp;Professional</a></li>\n        </ul>\n    </aside>\n    <div class=\"companies\">\n        <h3>Extend MODX with&nbsp;Extras</h3>\n        <ul>\n            <li class=\"modxextras\"><a href=\"https://modx.com/extras/\" title=\"MODX extras\" target=\"_blank\">MODX&nbsp;extras</a></li>\n            <li class=\"modmore\"><a href=\"https://www.modmore.com/extras/\" title=\"modmore.com\" target=\"_blank\">modmore.com</a></li>\n            <li class=\"modstore\"><a href=\"https://modstore.pro/\" title=\"modstore.pro\" target=\"_blank\">modstore.pro</a></li>\n            <li class=\"extrasio\"><a href=\"https://extras.io/extras/\" title=\"Extras.io\" target=\"_blank\">Extras.io</a></li>\n        </ul>\n    </div>\n</div>\n<footer class=\"disclaimer\">\n    <p>&copy; 2005-present the <a href=\"https://modx.com\" target=\"_blank\">MODX</a> Content Management Framework (CMF) project. All rights reserved. MODX is licensed under the GNU&nbsp;GPL.</p>\n</footer>\n\n<script>\n    // Load the Open Sans font\n    try {\n        document.addEventListener(\"DOMContentLoaded\", function() { // prevent a Flash Of Unstyled Text (FOUT)\n            document.querySelector(\'head\').innerHTML += \"<link href=\'https://fonts.googleapis.com/css?family=Open+Sans:400,700\' rel=\'stylesheet\' type=\'text/css\'>\";\n            document.body.classList.add(\'loaded\');\n        });\n    } catch (e) { }\n\n    // Shuffle the vendors to prevent favoritism of one vendor over the other\n    // with thanks to http://james.padolsey.com/javascript/shuffling-the-dom/\n    function shuffle(elems) {\n        var allElems = (function(){\n            var ret = [], l = elems.length;\n            while (l--) {\n                if (elems[l].className !== \'modxextras\') {\n                    ret[ret.length] = elems[l];\n                }\n            }\n            return ret;\n        })();\n\n        var shuffled = (function(){\n            var l = allElems.length, ret = [];\n            while (l--) {\n                var random = Math.floor(Math.random() * allElems.length),\n                        randEl = allElems[random].cloneNode(true);\n                allElems.splice(random, 1);\n                ret[ret.length] = randEl;\n            }\n            return ret;\n        })(), l = elems.length;\n\n        // To make sure the MODX logo stays #1, we lower the count by one here (shuffling 3 instead of 4 items)\n        // and refer to elems[l+1] in the loop below. This matches because allElems was also filtered to not include\n        // the official MODX logo.\n        l--;\n        while (l--) {\n            elems[l+1].parentNode.insertBefore(shuffled[l], elems[l+1].nextSibling);\n            elems[l+1].parentNode.removeChild(elems[l+1]);\n        }\n    }\n    shuffle(document.querySelectorAll(\'.companies li\'));\n</script>\n\n</body>\n</html>\n', 0, NULL, 0, '', ''),
(2, 1, 0, 'home', '', 0, 0, '', 0, '[[$header?]]\n[[$navbar?]]\n[[*content]]\n[[$footer?]]', 0, 'a:0:{}', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_tmplvars`
--

CREATE TABLE `modx_site_tmplvars` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_preprocess` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `caption` varchar(80) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `editor_type` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `elements` text DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `display` varchar(20) NOT NULL DEFAULT '',
  `default_text` mediumtext DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `input_properties` text DEFAULT NULL,
  `output_properties` text DEFAULT NULL,
  `static` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `static_file` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_tmplvar_access`
--

CREATE TABLE `modx_site_tmplvar_access` (
  `id` int(10) UNSIGNED NOT NULL,
  `tmplvarid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `documentgroup` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_tmplvar_contentvalues`
--

CREATE TABLE `modx_site_tmplvar_contentvalues` (
  `id` int(10) UNSIGNED NOT NULL,
  `tmplvarid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `contentid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_site_tmplvar_templates`
--

CREATE TABLE `modx_site_tmplvar_templates` (
  `tmplvarid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `templateid` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_system_eventnames`
--

CREATE TABLE `modx_system_eventnames` (
  `name` varchar(50) NOT NULL,
  `service` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `groupname` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_system_eventnames`
--

INSERT INTO `modx_system_eventnames` (`name`, `service`, `groupname`) VALUES
('OnBeforeCacheUpdate', 4, 'System'),
('OnBeforeChunkFormDelete', 1, 'Chunks'),
('OnBeforeChunkFormSave', 1, 'Chunks'),
('OnBeforeDocFormDelete', 1, 'Resources'),
('OnBeforeDocFormSave', 1, 'Resources'),
('OnBeforeEmptyTrash', 1, 'Resources'),
('OnBeforeManagerLogin', 2, 'Security'),
('OnBeforeManagerLogout', 2, 'Security'),
('OnBeforeManagerPageInit', 2, 'System'),
('OnBeforePluginFormDelete', 1, 'Plugins'),
('OnBeforePluginFormSave', 1, 'Plugins'),
('OnBeforeRegisterClientScripts', 5, 'System'),
('OnBeforeSaveWebPageCache', 4, 'System'),
('OnBeforeSnipFormDelete', 1, 'Snippets'),
('OnBeforeSnipFormSave', 1, 'Snippets'),
('OnBeforeTempFormDelete', 1, 'Templates'),
('OnBeforeTempFormSave', 1, 'Templates'),
('OnBeforeTVFormDelete', 1, 'Template Variables'),
('OnBeforeTVFormSave', 1, 'Template Variables'),
('OnBeforeUserActivate', 1, 'Users'),
('OnBeforeUserDeactivate', 1, 'Users'),
('OnBeforeUserDuplicate', 1, 'Users'),
('OnBeforeUserFormDelete', 1, 'Users'),
('OnBeforeUserFormSave', 1, 'Users'),
('OnBeforeUserGroupFormRemove', 1, 'User Groups'),
('OnBeforeUserGroupFormSave', 1, 'User Groups'),
('OnBeforeWebLogin', 3, 'Security'),
('OnBeforeWebLogout', 3, 'Security'),
('OnCacheUpdate', 4, 'System'),
('OnCategoryBeforeRemove', 1, 'Categories'),
('OnCategoryBeforeSave', 1, 'Categories'),
('OnCategoryRemove', 1, 'Categories'),
('OnCategorySave', 1, 'Categories'),
('OnChunkBeforeRemove', 1, 'Chunks'),
('OnChunkBeforeSave', 1, 'Chunks'),
('OnChunkFormDelete', 1, 'Chunks'),
('OnChunkFormPrerender', 1, 'Chunks'),
('OnChunkFormRender', 1, 'Chunks'),
('OnChunkFormSave', 1, 'Chunks'),
('OnChunkRemove', 1, 'Chunks'),
('OnChunkSave', 1, 'Chunks'),
('OnContextBeforeRemove', 1, 'Contexts'),
('OnContextBeforeSave', 1, 'Contexts'),
('OnContextFormPrerender', 2, 'Contexts'),
('OnContextFormRender', 2, 'Contexts'),
('OnContextInit', 1, 'Contexts'),
('OnContextRemove', 1, 'Contexts'),
('OnContextSave', 1, 'Contexts'),
('OnDocFormDelete', 1, 'Resources'),
('OnDocFormPrerender', 1, 'Resources'),
('OnDocFormRender', 1, 'Resources'),
('OnDocFormSave', 1, 'Resources'),
('OnDocPublished', 5, 'Resources'),
('OnDocUnPublished', 5, 'Resources'),
('OnElementNotFound', 1, 'System'),
('OnEmptyTrash', 1, 'Resources'),
('OnFileCreateFormPrerender', 1, 'System'),
('OnFileEditFormPrerender', 1, 'System'),
('OnFileManagerBeforeUpload', 1, 'System'),
('OnFileManagerDirCreate', 1, 'System'),
('OnFileManagerDirRemove', 1, 'System'),
('OnFileManagerDirRename', 1, 'System'),
('OnFileManagerFileCreate', 1, 'System'),
('OnFileManagerFileRemove', 1, 'System'),
('OnFileManagerFileRename', 1, 'System'),
('OnFileManagerFileUpdate', 1, 'System'),
('OnFileManagerMoveObject', 1, 'System'),
('OnFileManagerUpload', 1, 'System'),
('OnHandleRequest', 5, 'System'),
('OnInitCulture', 1, 'Internationalization'),
('OnLoadWebDocument', 5, 'System'),
('OnLoadWebPageCache', 4, 'System'),
('OnManagerAuthentication', 2, 'Security'),
('OnManagerLogin', 2, 'Security'),
('OnManagerLoginFormPrerender', 2, 'Security'),
('OnManagerLoginFormRender', 2, 'Security'),
('OnManagerLogout', 2, 'Security'),
('OnManagerPageAfterRender', 2, 'System'),
('OnManagerPageBeforeRender', 2, 'System'),
('OnManagerPageInit', 2, 'System'),
('OnMediaSourceBeforeFormDelete', 1, 'Media Sources'),
('OnMediaSourceBeforeFormSave', 1, 'Media Sources'),
('OnMediaSourceDuplicate', 1, 'Media Sources'),
('OnMediaSourceFormDelete', 1, 'Media Sources'),
('OnMediaSourceFormSave', 1, 'Media Sources'),
('OnMediaSourceGetProperties', 1, 'Media Sources'),
('OnMODXInit', 5, 'System'),
('OnPackageInstall', 2, 'Package Manager'),
('OnPackageRemove', 2, 'Package Manager'),
('OnPackageUninstall', 2, 'Package Manager'),
('OnPageNotFound', 1, 'System'),
('OnPageUnauthorized', 1, 'Security'),
('OnParseDocument', 5, 'System'),
('OnPluginBeforeRemove', 1, 'Plugins'),
('OnPluginBeforeSave', 1, 'Plugins'),
('OnPluginEventBeforeRemove', 1, 'Plugin Events'),
('OnPluginEventBeforeSave', 1, 'Plugin Events'),
('OnPluginEventRemove', 1, 'Plugin Events'),
('OnPluginEventSave', 1, 'Plugin Events'),
('OnPluginFormDelete', 1, 'Plugins'),
('OnPluginFormPrerender', 1, 'Plugins'),
('OnPluginFormRender', 1, 'Plugins'),
('OnPluginFormSave', 1, 'Plugins'),
('OnPluginRemove', 1, 'Plugins'),
('OnPluginSave', 1, 'Plugins'),
('OnPropertySetBeforeRemove', 1, 'Property Sets'),
('OnPropertySetBeforeSave', 1, 'Property Sets'),
('OnPropertySetRemove', 1, 'Property Sets'),
('OnPropertySetSave', 1, 'Property Sets'),
('OnResourceAddToResourceGroup', 1, 'Resources'),
('OnResourceAutoPublish', 1, 'Resources'),
('OnResourceBeforeSort', 1, 'Resources'),
('OnResourceCacheUpdate', 1, 'Resources'),
('OnResourceDelete', 1, 'Resources'),
('OnResourceDuplicate', 1, 'Resources'),
('OnResourceGroupBeforeRemove', 1, 'Security'),
('OnResourceGroupBeforeSave', 1, 'Security'),
('OnResourceGroupRemove', 1, 'Security'),
('OnResourceGroupSave', 1, 'Security'),
('OnResourceRemoveFromResourceGroup', 1, 'Resources'),
('OnResourceSort', 1, 'Resources'),
('OnResourceToolbarLoad', 1, 'Resources'),
('OnResourceTVFormPrerender', 1, 'Resources'),
('OnResourceTVFormRender', 1, 'Resources'),
('OnResourceUndelete', 1, 'Resources'),
('OnRichTextBrowserInit', 1, 'RichText Editor'),
('OnRichTextEditorInit', 1, 'RichText Editor'),
('OnRichTextEditorRegister', 1, 'RichText Editor'),
('OnSiteRefresh', 1, 'System'),
('OnSiteSettingsRender', 1, 'Settings'),
('OnSnipFormDelete', 1, 'Snippets'),
('OnSnipFormPrerender', 1, 'Snippets'),
('OnSnipFormRender', 1, 'Snippets'),
('OnSnipFormSave', 1, 'Snippets'),
('OnSnippetBeforeRemove', 1, 'Snippets'),
('OnSnippetBeforeSave', 1, 'Snippets'),
('OnSnippetRemove', 1, 'Snippets'),
('OnSnippetSave', 1, 'Snippets'),
('OnTempFormDelete', 1, 'Templates'),
('OnTempFormPrerender', 1, 'Templates'),
('OnTempFormRender', 1, 'Templates'),
('OnTempFormSave', 1, 'Templates'),
('OnTemplateBeforeRemove', 1, 'Templates'),
('OnTemplateBeforeSave', 1, 'Templates'),
('OnTemplateRemove', 1, 'Templates'),
('OnTemplateSave', 1, 'Templates'),
('OnTemplateVarBeforeRemove', 1, 'Template Variables'),
('OnTemplateVarBeforeSave', 1, 'Template Variables'),
('OnTemplateVarRemove', 1, 'Template Variables'),
('OnTemplateVarSave', 1, 'Template Variables'),
('OnTVFormDelete', 1, 'Template Variables'),
('OnTVFormPrerender', 1, 'Template Variables'),
('OnTVFormRender', 1, 'Template Variables'),
('OnTVFormSave', 1, 'Template Variables'),
('OnTVInputPropertiesList', 1, 'Template Variables'),
('OnTVInputRenderList', 1, 'Template Variables'),
('OnTVOutputRenderList', 1, 'Template Variables'),
('OnTVOutputRenderPropertiesList', 1, 'Template Variables'),
('OnUserActivate', 1, 'Users'),
('OnUserAddToGroup', 1, 'User Groups'),
('OnUserBeforeAddToGroup', 1, 'User Groups'),
('OnUserBeforeRemove', 1, 'Users'),
('OnUserBeforeRemoveFromGroup', 1, 'User Groups'),
('OnUserBeforeSave', 1, 'Users'),
('OnUserChangePassword', 1, 'Users'),
('OnUserDeactivate', 1, 'Users'),
('OnUserDuplicate', 1, 'Users'),
('OnUserFormDelete', 1, 'Users'),
('OnUserFormPrerender', 1, 'Users'),
('OnUserFormRender', 1, 'Users'),
('OnUserFormSave', 1, 'Users'),
('OnUserGroupBeforeRemove', 1, 'User Groups'),
('OnUserGroupBeforeSave', 1, 'User Groups'),
('OnUserGroupFormSave', 1, 'User Groups'),
('OnUserGroupRemove', 1, 'User Groups'),
('OnUserGroupSave', 1, 'User Groups'),
('OnUserNotFound', 1, 'Users'),
('OnUserProfileBeforeRemove', 1, 'User Profiles'),
('OnUserProfileBeforeSave', 1, 'User Profiles'),
('OnUserProfileRemove', 1, 'User Profiles'),
('OnUserProfileSave', 1, 'User Profiles'),
('OnUserRemove', 1, 'Users'),
('OnUserRemoveFromGroup', 1, 'User Groups'),
('OnUserSave', 1, 'Users'),
('OnWebAuthentication', 3, 'Security'),
('OnWebLogin', 3, 'Security'),
('OnWebLogout', 3, 'Security'),
('OnWebPageComplete', 5, 'System'),
('OnWebPageInit', 5, 'System'),
('OnWebPagePrerender', 5, 'System');

-- --------------------------------------------------------

--
-- Table structure for table `modx_system_settings`
--

CREATE TABLE `modx_system_settings` (
  `key` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `xtype` varchar(75) NOT NULL DEFAULT 'textfield',
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `area` varchar(255) NOT NULL DEFAULT '',
  `editedon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_system_settings`
--

INSERT INTO `modx_system_settings` (`key`, `value`, `xtype`, `namespace`, `area`, `editedon`) VALUES
('access_category_enabled', '1', 'combo-boolean', 'core', 'authentication', NULL),
('access_context_enabled', '1', 'combo-boolean', 'core', 'authentication', NULL),
('access_resource_group_enabled', '1', 'combo-boolean', 'core', 'authentication', NULL),
('allow_forward_across_contexts', '', 'combo-boolean', 'core', 'system', NULL),
('allow_manager_login_forgot_password', '1', 'combo-boolean', 'core', 'authentication', NULL),
('allow_multiple_emails', '1', 'combo-boolean', 'core', 'authentication', NULL),
('allow_tags_in_post', '', 'combo-boolean', 'core', 'system', NULL),
('anonymous_sessions', '1', 'combo-boolean', 'core', 'session', NULL),
('archive_with', '', 'combo-boolean', 'core', 'system', NULL),
('automatic_alias', '1', 'combo-boolean', 'core', 'furls', NULL),
('automatic_template_assignment', 'sibling', 'textfield', 'core', 'site', NULL),
('auto_check_pkg_updates', '1', 'combo-boolean', 'core', 'system', NULL),
('auto_check_pkg_updates_cache_expire', '15', 'numberfield', 'core', 'system', NULL),
('auto_isfolder', '1', 'combo-boolean', 'core', 'site', NULL),
('auto_menuindex', '1', 'combo-boolean', 'core', 'site', NULL),
('base_help_url', '//docs.modx.com/help/', 'textfield', 'core', 'manager', NULL),
('blocked_minutes', '60', 'numberfield', 'core', 'authentication', NULL),
('cache_alias_map', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_context_settings', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_db', '', 'combo-boolean', 'core', 'caching', NULL),
('cache_db_expires', '0', 'numberfield', 'core', 'caching', NULL),
('cache_db_session', '', 'combo-boolean', 'core', 'caching', NULL),
('cache_db_session_lifetime', '', 'numberfield', 'core', 'caching', NULL),
('cache_default', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_expires', '0', 'numberfield', 'core', 'caching', NULL),
('cache_format', '0', 'numberfield', 'core', 'caching', NULL),
('cache_handler', 'xPDO\\Cache\\xPDOFileCache', 'textfield', 'core', 'caching', NULL),
('cache_lang_js', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_lexicon_topics', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_noncore_lexicon_topics', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_resource', '1', 'combo-boolean', 'core', 'caching', NULL),
('cache_resource_clear_partial', '', 'combo-boolean', 'core', 'caching', NULL),
('cache_resource_expires', '0', 'numberfield', 'core', 'caching', NULL),
('cache_scripts', '1', 'combo-boolean', 'core', 'caching', NULL),
('clear_cache_refresh_trees', '', 'combo-boolean', 'core', 'caching', NULL),
('compress_css', '1', 'combo-boolean', 'core', 'manager', NULL),
('compress_js', '1', 'combo-boolean', 'core', 'manager', NULL),
('confirm_navigation', '1', 'combo-boolean', 'core', 'manager', NULL),
('container_suffix', '/', 'textfield', 'core', 'furls', NULL),
('context_tree_sort', '1', 'combo-boolean', 'core', 'manager', NULL),
('context_tree_sortby', 'rank', 'textfield', 'core', 'manager', NULL),
('context_tree_sortdir', 'ASC', 'textfield', 'core', 'manager', NULL),
('cultureKey', 'en', 'modx-combo-language', 'core', 'language', NULL),
('date_timezone', '', 'textfield', 'core', 'system', NULL),
('debug', '', 'numberfield', 'core', 'system', NULL),
('default_content_type', '1', 'modx-combo-content-type', 'core', 'site', NULL),
('default_context', 'web', 'modx-combo-context', 'core', 'site', NULL),
('default_duplicate_publish_option', 'preserve', 'textfield', 'core', 'manager', NULL),
('default_media_source', '1', 'modx-combo-source', 'core', 'manager', NULL),
('default_media_source_type', 'MODX\\Revolution\\Sources\\modFileMediaSource', 'modx-combo-source-type', 'core', 'manager', NULL),
('default_per_page', '20', 'textfield', 'core', 'manager', NULL),
('default_template', '1', 'modx-combo-template', 'core', 'site', NULL),
('default_username', '(anonymous)', 'textfield', 'core', 'session', NULL),
('emailsender', 'navodyadivyanjali2@gmail.com', 'textfield', 'core', 'authentication', '2025-12-16 09:27:58'),
('enable_dragdrop', '1', 'combo-boolean', 'core', 'manager', NULL),
('enable_gravatar', '', 'combo-boolean', 'core', 'manager', NULL),
('enable_template_picker_in_tree', '1', 'combo-boolean', 'core', 'manager', NULL),
('error_log_filename', 'error.log', 'textfield', 'core', 'system', NULL),
('error_log_filepath', '', 'textfield', 'core', 'system', NULL),
('error_page', '1', 'numberfield', 'core', 'site', NULL),
('failed_login_attempts', '5', 'numberfield', 'core', 'authentication', NULL),
('feed_modx_news', 'https://feeds.feedburner.com/modx-announce', 'textfield', 'core', 'system', NULL),
('feed_modx_news_enabled', '1', 'combo-boolean', 'core', 'system', NULL),
('feed_modx_security', 'https://forums.modx.com/board.xml?board=294', 'textfield', 'core', 'system', NULL),
('feed_modx_security_enabled', '1', 'combo-boolean', 'core', 'system', NULL),
('form_customization_use_all_groups', '', 'combo-boolean', 'core', 'manager', NULL),
('forward_merge_excludes', 'type,published,class_key', 'textfield', 'core', 'system', NULL),
('friendly_alias_lowercase_only', '1', 'combo-boolean', 'core', 'furls', NULL),
('friendly_alias_max_length', '0', 'numberfield', 'core', 'furls', NULL),
('friendly_alias_realtime', '', 'combo-boolean', 'core', 'furls', NULL),
('friendly_alias_restrict_chars', 'pattern', 'textfield', 'core', 'furls', NULL),
('friendly_alias_restrict_chars_pattern', '/[\\0\\x0B\\t\\n\\r\\f\\a&=+%#<>\"~:`@\\?\\[\\]\\{\\}\\|\\^\'\\\\]/', 'textfield', 'core', 'furls', NULL),
('friendly_alias_strip_element_tags', '1', 'combo-boolean', 'core', 'furls', NULL),
('friendly_alias_translit', 'none', 'textfield', 'core', 'furls', NULL),
('friendly_alias_translit_class', 'translit.modTransliterate', 'textfield', 'core', 'furls', NULL),
('friendly_alias_translit_class_path', '{core_path}components/', 'textfield', 'core', 'furls', NULL),
('friendly_alias_trim_chars', '/.-_', 'textfield', 'core', 'furls', NULL),
('friendly_alias_word_delimiter', '-', 'textfield', 'core', 'furls', NULL),
('friendly_alias_word_delimiters', '-_', 'textfield', 'core', 'furls', NULL),
('friendly_urls', '', 'combo-boolean', 'core', 'furls', NULL),
('friendly_urls_strict', '', 'combo-boolean', 'core', 'furls', NULL),
('global_duplicate_uri_check', '', 'combo-boolean', 'core', 'furls', NULL),
('hidemenu_default', '', 'combo-boolean', 'core', 'site', NULL),
('inline_help', '1', 'combo-boolean', 'core', 'manager', NULL),
('link_tag_scheme', '-1', 'textfield', 'core', 'site', NULL),
('locale', '', 'textfield', 'core', 'language', NULL),
('lock_ttl', '360', 'numberfield', 'core', 'system', NULL),
('login_background_image', '', 'textfield', 'core', 'authentication', NULL),
('login_help_button', '', 'combo-boolean', 'core', 'authentication', NULL),
('login_logo', '', 'textfield', 'core', 'authentication', NULL),
('log_deprecated', '1', 'combo-boolean', 'core', 'system', NULL),
('log_level', '1', 'numberfield', 'core', 'system', NULL),
('log_snippet_not_found', '1', 'combo-boolean', 'core', 'site', NULL),
('log_target', 'FILE', 'textfield', 'core', 'system', NULL),
('mail_charset', 'UTF-8', 'modx-combo-charset', 'core', 'mail', NULL),
('mail_dkim_domain', '', 'textfield', 'core', 'mail', NULL),
('mail_dkim_identity', '', 'textfield', 'core', 'mail', NULL),
('mail_dkim_passphrase', '', 'text-password', 'core', 'mail', NULL),
('mail_dkim_privatekeyfile', '', 'textfield', 'core', 'mail', NULL),
('mail_dkim_privatekeystring', '', 'textfield', 'core', 'mail', NULL),
('mail_dkim_selector', '', 'textfield', 'core', 'mail', NULL),
('mail_encoding', '8bit', 'textfield', 'core', 'mail', NULL),
('mail_smtp_auth', '', 'combo-boolean', 'core', 'mail', NULL),
('mail_smtp_autotls', '1', 'combo-boolean', 'core', 'mail', NULL),
('mail_smtp_helo', '', 'textfield', 'core', 'mail', NULL),
('mail_smtp_hosts', 'localhost', 'textfield', 'core', 'mail', NULL),
('mail_smtp_keepalive', '', 'combo-boolean', 'core', 'mail', NULL),
('mail_smtp_pass', '', 'text-password', 'core', 'mail', NULL),
('mail_smtp_port', '587', 'numberfield', 'core', 'mail', NULL),
('mail_smtp_secure', '', 'textfield', 'core', 'mail', NULL),
('mail_smtp_single_to', '', 'combo-boolean', 'core', 'mail', NULL),
('mail_smtp_timeout', '10', 'numberfield', 'core', 'mail', NULL),
('mail_smtp_user', '', 'textfield', 'core', 'mail', NULL),
('mail_use_smtp', '', 'combo-boolean', 'core', 'mail', NULL),
('main_nav_parent', 'topnav', 'textfield', 'core', 'manager', NULL),
('manager_datetime_empty_value', '—', 'textfield', 'core', 'manager', NULL),
('manager_datetime_separator', ', ', 'textfield', 'core', 'manager', NULL),
('manager_date_format', 'Y-m-d', 'textfield', 'core', 'manager', NULL),
('manager_direction', 'ltr', 'textfield', 'core', 'language', NULL),
('manager_favicon_url', 'favicon.ico', 'textfield', 'core', 'manager', NULL),
('manager_login_url_alternate', '', 'textfield', 'core', 'authentication', NULL),
('manager_logo', '', 'textfield', 'core', 'manager', NULL),
('manager_theme', 'default', 'modx-combo-manager-theme', 'core', 'manager', NULL),
('manager_time_format', 'H:i', 'textfield', 'core', 'manager', NULL),
('manager_tooltip_delay', '2300', 'numberfield', 'core', 'manager', NULL),
('manager_tooltip_enable', '1', 'combo-boolean', 'core', 'manager', NULL),
('manager_use_fullname', '', 'combo-boolean', 'core', 'manager', NULL),
('manager_week_start', '0', 'numberfield', 'core', 'manager', NULL),
('mgr_source_icon', 'icon-folder-open-o', 'textfield', 'core', 'manager', NULL),
('mgr_tree_icon_context', 'tree-context', 'textfield', 'core', 'manager', NULL),
('modx_browser_default_sort', 'name', 'textfield', 'core', 'manager', NULL),
('modx_browser_default_viewmode', 'grid', 'textfield', 'core', 'manager', NULL),
('modx_browser_tree_hide_files', '1', 'combo-boolean', 'core', 'manager', NULL),
('modx_browser_tree_hide_tooltips', '1', 'combo-boolean', 'core', 'manager', NULL),
('modx_charset', 'UTF-8', 'modx-combo-charset', 'core', 'language', NULL),
('package_installer_at_top', '1', 'combo-boolean', 'core', 'manager', NULL),
('parser_recurse_uncacheable', '1', 'combo-boolean', 'core', 'system', NULL),
('passwordless_activated', '', 'combo-boolean', 'core', 'authentication', NULL),
('passwordless_expiration', '3600', 'textfield', 'core', 'authentication', NULL),
('password_generated_length', '10', 'numberfield', 'core', 'authentication', NULL),
('password_min_length', '8', 'numberfield', 'core', 'authentication', NULL),
('photo_profile_source', '', 'modx-combo-source', 'core', 'manager', NULL),
('phpthumb_allow_src_above_docroot', '', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_cache_maxage', '30', 'numberfield', 'core', 'phpthumb', NULL),
('phpthumb_cache_maxfiles', '10000', 'numberfield', 'core', 'phpthumb', NULL),
('phpthumb_cache_maxsize', '100', 'numberfield', 'core', 'phpthumb', NULL),
('phpthumb_cache_source_enabled', '', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_document_root', '', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_error_bgcolor', 'CCCCFF', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_error_fontsize', '1', 'numberfield', 'core', 'phpthumb', NULL),
('phpthumb_error_textcolor', 'FF0000', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_far', 'C', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_imagemagick_path', '', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_nohotlink_enabled', '1', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_nohotlink_erase_image', '1', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_nohotlink_text_message', 'Off-server thumbnailing is not allowed', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_nohotlink_valid_domains', '{http_host}', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_enabled', '', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_erase_image', '1', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_require_refer', '', 'combo-boolean', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_text_message', 'Off-server linking is not allowed', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_valid_domains', '{http_host}', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_nooffsitelink_watermark_src', '', 'textfield', 'core', 'phpthumb', NULL),
('phpthumb_zoomcrop', '0', 'textfield', 'core', 'phpthumb', NULL),
('preserve_menuindex', '', 'combo-boolean', 'core', 'manager', NULL),
('principal_targets', 'MODX\\Revolution\\modAccessContext,MODX\\Revolution\\modAccessResourceGroup,MODX\\Revolution\\modAccessCategory,MODX\\Revolution\\Sources\\modAccessMediaSource,MODX\\Revolution\\modAccessNamespace', 'textfield', 'core', 'authentication', NULL),
('proxy_auth_type', 'BASIC', 'textfield', 'core', 'proxy', NULL),
('proxy_host', '', 'textfield', 'core', 'proxy', NULL),
('proxy_password', '', 'text-password', 'core', 'proxy', NULL),
('proxy_port', '', 'numberfield', 'core', 'proxy', NULL),
('proxy_username', '', 'textfield', 'core', 'proxy', NULL),
('publish_default', '', 'combo-boolean', 'core', 'site', NULL),
('quick_search_in_content', '1', 'combo-boolean', 'core', 'manager', NULL),
('quick_search_result_max', '10', 'numberfield', 'core', 'manager', NULL),
('request_controller', 'index.php', 'textfield', 'core', 'gateway', NULL),
('request_method_strict', '', 'combo-boolean', 'core', 'gateway', NULL),
('request_param_alias', 'q', 'textfield', 'core', 'gateway', NULL),
('request_param_id', 'id', 'textfield', 'core', 'gateway', NULL),
('resource_static_allow_absolute', '0', 'combo-boolean', 'core', 'static_resources', NULL),
('resource_static_path', '{assets_path}', 'textfield', 'core', 'static_resources', NULL),
('resource_tree_node_name', 'pagetitle', 'textfield', 'core', 'manager', NULL),
('resource_tree_node_name_fallback', 'alias', 'textfield', 'core', 'manager', NULL),
('resource_tree_node_tooltip', '', 'textfield', 'core', 'manager', NULL),
('richtext_default', '1', 'combo-boolean', 'core', 'manager', NULL),
('search_default', '1', 'combo-boolean', 'core', 'site', NULL),
('send_poweredby_header', '1', 'combo-boolean', 'core', 'system', '2025-12-16 09:27:58'),
('server_offset_time', '0', 'numberfield', 'core', 'system', NULL),
('session_cookie_domain', '', 'textfield', 'core', 'session', NULL),
('session_cookie_httponly', '1', 'combo-boolean', 'core', 'session', NULL),
('session_cookie_lifetime', '604800', 'numberfield', 'core', 'session', NULL),
('session_cookie_path', '', 'textfield', 'core', 'session', NULL),
('session_cookie_samesite', '', 'textfield', 'core', 'session', NULL),
('session_cookie_secure', '', 'combo-boolean', 'core', 'session', NULL),
('session_gc_maxlifetime', '604800', 'textfield', 'core', 'session', NULL),
('session_handler_class', 'MODX\\Revolution\\modSessionHandler', 'textfield', 'core', 'session', NULL),
('session_name', '', 'textfield', 'core', 'session', NULL),
('settings_distro', 'traditional', 'textfield', 'core', 'system', NULL),
('settings_version', '3.1.2-pl', 'textfield', 'core', 'system', NULL),
('set_header', '1', 'combo-boolean', 'core', 'system', NULL),
('show_tv_categories_header', '1', 'combo-boolean', 'core', 'manager', NULL),
('site_name', 'MODX Revolution', 'textfield', 'core', 'site', NULL),
('site_start', '1', 'numberfield', 'core', 'site', NULL),
('site_status', '1', 'combo-boolean', 'core', 'site', NULL),
('site_unavailable_message', '[[%site_unavailable_message]]', 'textfield', 'core', 'site', NULL),
('site_unavailable_page', '0', 'numberfield', 'core', 'site', NULL),
('static_elements_automate_chunks', '', 'combo-boolean', 'core', 'static_elements', NULL),
('static_elements_automate_plugins', '', 'combo-boolean', 'core', 'static_elements', NULL),
('static_elements_automate_snippets', '', 'combo-boolean', 'core', 'static_elements', NULL),
('static_elements_automate_templates', '', 'combo-boolean', 'core', 'static_elements', NULL),
('static_elements_automate_tvs', '', 'combo-boolean', 'core', 'static_elements', NULL),
('static_elements_basepath', '', 'textfield', 'core', 'static_elements', NULL),
('static_elements_default_category', '0', 'modx-combo-category', 'core', 'static_elements', NULL),
('static_elements_default_mediasource', '0', 'modx-combo-source', 'core', 'static_elements', NULL),
('static_elements_html_extension', '.tpl', 'textfield', 'core', 'static_elements', NULL),
('symlink_merge_fields', '1', 'combo-boolean', 'core', 'site', NULL),
('syncsite_default', '1', 'combo-boolean', 'core', 'caching', NULL),
('topmenu_show_descriptions', '1', 'combo-boolean', 'core', 'manager', NULL),
('tree_default_sort', 'menuindex', 'textfield', 'core', 'manager', NULL),
('tree_root_id', '0', 'numberfield', 'core', 'manager', NULL),
('tvs_below_content', '', 'combo-boolean', 'core', 'manager', NULL),
('unauthorized_page', '1', 'numberfield', 'core', 'site', NULL),
('upload_files', 'aac,au,avi,bmp,css,css.map,doc,docx,eot,gif,gz,htm,html,ico,jpeg,jpg,js,js.map,less,md,mp3,mp4,mpeg,mpg,odb,odf,odg,odp,ods,odt,pdf,png,ppt,pptx,psd,rar,scss,svg,svgz,tar,tgz,tiff,ttf,txt,wav,webp,wmv,woff,woff2,xls,xlsx,xml,z,zip', 'textfield', 'core', 'file', NULL),
('upload_file_exists', '1', 'combo-boolean', 'core', 'file', NULL),
('upload_maxsize', '41943040', 'numberfield', 'core', 'file', '2025-12-16 09:27:58'),
('upload_translit', '1', 'combo-boolean', 'core', 'file', NULL),
('upload_translit_restrict_chars_pattern', '/[\\0\\x0B\\t\\n\\r\\f\\a&=+%#<>\"~:`@\\?\\[\\]\\{\\}\\|\\^\'\\\\]/', 'textfield', 'core', 'file', NULL),
('user_nav_parent', 'usernav', 'textfield', 'core', 'manager', NULL),
('use_alias_path', '', 'combo-boolean', 'core', 'furls', NULL),
('use_context_resource_table', '1', 'combo-boolean', 'core', 'caching', NULL),
('use_editor', '1', 'combo-boolean', 'core', 'editor', NULL),
('use_frozen_parent_uris', '', 'combo-boolean', 'core', 'furls', NULL),
('use_multibyte', '1', 'combo-boolean', 'core', 'language', '2025-12-16 09:27:58'),
('use_weblink_target', '', 'combo-boolean', 'core', 'site', NULL),
('welcome_action', 'welcome', 'textfield', 'core', 'manager', NULL),
('welcome_namespace', 'core', 'textfield', 'core', 'manager', NULL),
('welcome_screen', '', 'combo-boolean', 'core', 'manager', '2025-12-16 09:28:27'),
('welcome_screen_url', '//misc.modx.com/revolution/welcome.31.html', 'textfield', 'core', 'manager', NULL),
('which_editor', '', 'modx-combo-rte', 'core', 'editor', NULL),
('which_element_editor', '', 'modx-combo-rte', 'core', 'editor', NULL),
('xhtml_urls', '1', 'combo-boolean', 'core', 'site', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modx_transport_packages`
--

CREATE TABLE `modx_transport_packages` (
  `signature` varchar(191) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `installed` datetime DEFAULT NULL,
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `workspace` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `provider` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `source` tinytext DEFAULT NULL,
  `manifest` text DEFAULT NULL,
  `attributes` mediumtext DEFAULT NULL,
  `package_name` varchar(191) NOT NULL,
  `metadata` text DEFAULT NULL,
  `version_major` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `version_minor` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `version_patch` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `release` varchar(100) NOT NULL DEFAULT '',
  `release_index` smallint(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_transport_providers`
--

CREATE TABLE `modx_transport_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `service_url` tinytext DEFAULT NULL,
  `username` varchar(191) NOT NULL DEFAULT '',
  `api_key` varchar(191) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `priority` tinyint(4) NOT NULL DEFAULT 10,
  `properties` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_transport_providers`
--

INSERT INTO `modx_transport_providers` (`id`, `name`, `description`, `service_url`, `username`, `api_key`, `created`, `updated`, `active`, `priority`, `properties`) VALUES
(1, 'modx.com', 'The official MODX transport provider for 3rd party components.', 'https://rest.modx.com/extras/', '', '', '2025-04-02 10:20:59', NULL, 1, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `modx_users`
--

CREATE TABLE `modx_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `cachepwd` varchar(255) NOT NULL DEFAULT '',
  `class_key` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\modUser',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `remote_key` varchar(191) DEFAULT NULL,
  `remote_data` text DEFAULT NULL,
  `hash_class` varchar(100) NOT NULL DEFAULT 'MODX\\Revolution\\Hashing\\modNative',
  `salt` varchar(100) NOT NULL DEFAULT '',
  `primary_group` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `session_stale` text DEFAULT NULL,
  `sudo` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `createdon` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_users`
--

INSERT INTO `modx_users` (`id`, `username`, `password`, `cachepwd`, `class_key`, `active`, `remote_key`, `remote_data`, `hash_class`, `salt`, `primary_group`, `session_stale`, `sudo`, `createdon`) VALUES
(1, 'admin', '$2y$10$3hYnlQVLnWdg38kup5P0ze3Lr1rZpyDS0giIPLvbaoMueWzXmbfCW', '', 'MODX\\Revolution\\modUser', 1, NULL, NULL, 'MODX\\Revolution\\Hashing\\modNative', 'ffa3e1d4850f4c8b030247a49f0de883', 1, NULL, 1, 1765877278);

-- --------------------------------------------------------

--
-- Table structure for table `modx_user_attributes`
--

CREATE TABLE `modx_user_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `internalKey` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `mobilephone` varchar(100) NOT NULL DEFAULT '',
  `blocked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `blockeduntil` int(11) NOT NULL DEFAULT 0,
  `blockedafter` int(11) NOT NULL DEFAULT 0,
  `logincount` int(11) NOT NULL DEFAULT 0,
  `lastlogin` int(11) NOT NULL DEFAULT 0,
  `thislogin` int(11) NOT NULL DEFAULT 0,
  `failedlogincount` int(10) NOT NULL DEFAULT 0,
  `sessionid` varchar(100) NOT NULL DEFAULT '',
  `dob` int(10) NOT NULL DEFAULT 0,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(25) NOT NULL DEFAULT '',
  `zip` varchar(25) NOT NULL DEFAULT '',
  `fax` varchar(100) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT '',
  `extended` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_user_attributes`
--

INSERT INTO `modx_user_attributes` (`id`, `internalKey`, `fullname`, `email`, `phone`, `mobilephone`, `blocked`, `blockeduntil`, `blockedafter`, `logincount`, `lastlogin`, `thislogin`, `failedlogincount`, `sessionid`, `dob`, `gender`, `address`, `country`, `city`, `state`, `zip`, `fax`, `photo`, `comment`, `website`, `extended`) VALUES
(1, 1, 'Default Admin User', 'navodyadivyanjali2@gmail.com', '', '', 0, 0, 0, 3, 1765901182, 1765943423, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modx_user_group_roles`
--

CREATE TABLE `modx_user_group_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `authority` int(10) UNSIGNED NOT NULL DEFAULT 9999
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_user_group_roles`
--

INSERT INTO `modx_user_group_roles` (`id`, `name`, `description`, `authority`) VALUES
(1, 'Member', NULL, 9999),
(2, 'Super User', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modx_user_group_settings`
--

CREATE TABLE `modx_user_group_settings` (
  `group` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `key` varchar(50) NOT NULL,
  `value` text DEFAULT NULL,
  `xtype` varchar(75) NOT NULL DEFAULT 'textfield',
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `area` varchar(255) NOT NULL DEFAULT '',
  `editedon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_user_messages`
--

CREATE TABLE `modx_user_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `recipient` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `private` tinyint(4) NOT NULL DEFAULT 0,
  `date_sent` datetime DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_user_settings`
--

CREATE TABLE `modx_user_settings` (
  `user` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `key` varchar(50) NOT NULL DEFAULT '',
  `value` text DEFAULT NULL,
  `xtype` varchar(75) NOT NULL DEFAULT 'textfield',
  `namespace` varchar(40) NOT NULL DEFAULT 'core',
  `area` varchar(255) NOT NULL DEFAULT '',
  `editedon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modx_workspaces`
--

CREATE TABLE `modx_workspaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '',
  `path` varchar(191) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `attributes` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modx_workspaces`
--

INSERT INTO `modx_workspaces` (`id`, `name`, `path`, `created`, `active`, `attributes`) VALUES
(1, 'Default MODX workspace', '{core_path}', '2025-12-16 10:27:16', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Western'),
(2, 'Central'),
(3, 'Southern'),
(4, 'Northern'),
(5, 'Eastern'),
(6, 'North Western'),
(7, 'North Central'),
(8, 'Uva'),
(9, 'Sabaragamuwa');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `description`, `days`, `reviews`, `image`) VALUES
(1, 'Sigiriya & Dambulla Tour', 'Explore the ancient rock fortress of Sigiriya and the Dambulla cave temples.', '2', '124', 'sigiriya_dambulla.jpg'),
(2, 'Kandy Cultural Tour', 'Visit the Temple of the Tooth and experience traditional Sri Lankan culture in Kandy.', '1', '98', 'kandy_tour.jpg'),
(3, 'Nuwara Eliya & Tea Plantation', 'See beautiful tea plantations, waterfalls, and the scenic town of Nuwara Eliya.', '2', '76', 'nuwara_eliya.jpg'),
(4, 'Yala Safari Adventure', 'Go on a thrilling safari in Yala National Park to spot elephants, leopards, and more.', '1', '145', 'yala_safari.jpg'),
(5, 'Ella Hiking & Scenic Train', 'Hike through the beautiful Ella area and enjoy the famous scenic train ride.', '2', '89', 'ella_hiking.jpg'),
(6, 'Galle & Southern Beaches', 'Relax on the beaches and explore the historic Galle Fort.', '3', '112', 'galle_beach.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_themes`
--

CREATE TABLE `tour_themes` (
  `id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `theme_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_themes`
--

INSERT INTO `tour_themes` (`id`, `theme_name`, `theme_images`, `created_at`) VALUES
(1, 'Adventure Tours', '[\n        \"images/themes/adventure1.jpg\",\n        \"images/themes/adventure2.jpg\",\n        \"images/themes/adventure3.jpg\"\n    ]', '2025-12-12 09:53:43'),
(2, 'Cultural Experiences', '[\n        \"images/themes/culture1.jpg\",\n        \"images/themes/culture2.jpg\",\n        \"images/themes/culture3.jpg\"\n    ]', '2025-12-12 09:54:57'),
(3, 'Wildlife & Safaris', '[\n        \"images/themes/wildlife1.jpg\",\n        \"images/themes/wildlife2.jpg\",\n        \"images/themes/wildlife3.jpg\"\n    ]', '2025-12-16 05:24:40'),
(4, 'Beaches & Coastline', '[\r\n        \"images/themes/beach1.jpg\",\r\n        \"images/themes/beach2.jpg\",\r\n        \"images/themes/beach2.jpg\"\r\n    ]', '2025-12-16 05:26:29'),
(5, 'Romantic Getaways', '[\r\n        \"images/themes/honeymoon1.jpg\",\r\n        \"images/themes/honeymoon1.jpg\",\r\n        \"images/themes/honeymoon1.jpg\"\r\n    ]', '2025-12-16 05:27:20'),
(6, 'Hill Country Escapes', '[\r\n        \"images/themes/hillcountry.jpg\"\r\n    ]', '2025-12-16 05:28:16'),
(8, 'Spiritual & Wellness Retreats', '[\r\n        \"images/themes/wellness.jpg\"\r\n    ]', '2025-12-16 05:30:52'),
(9, 'Photography Journeys', '[\r\n        \"images/themes/photography.jpg\"\r\n    ]', '2025-12-16 05:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `country_codes`
--
ALTER TABLE `country_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `itinerary_customer`
--
ALTER TABLE `itinerary_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modx_access_actiondom`
--
ALTER TABLE `modx_access_actiondom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`);

--
-- Indexes for table `modx_access_category`
--
ALTER TABLE `modx_access_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_context`
--
ALTER TABLE `modx_access_context`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`);

--
-- Indexes for table `modx_access_elements`
--
ALTER TABLE `modx_access_elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_media_source`
--
ALTER TABLE `modx_access_media_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_menus`
--
ALTER TABLE `modx_access_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`);

--
-- Indexes for table `modx_access_namespace`
--
ALTER TABLE `modx_access_namespace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_permissions`
--
ALTER TABLE `modx_access_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template` (`template`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `modx_access_policies`
--
ALTER TABLE `modx_access_policies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent` (`parent`),
  ADD KEY `class` (`class`),
  ADD KEY `template` (`template`);

--
-- Indexes for table `modx_access_policy_templates`
--
ALTER TABLE `modx_access_policy_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modx_access_policy_template_groups`
--
ALTER TABLE `modx_access_policy_template_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modx_access_resources`
--
ALTER TABLE `modx_access_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_resource_groups`
--
ALTER TABLE `modx_access_resource_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`,`target`,`principal`,`authority`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_access_templatevars`
--
ALTER TABLE `modx_access_templatevars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target` (`target`),
  ADD KEY `principal_class` (`principal_class`),
  ADD KEY `principal` (`principal`),
  ADD KEY `authority` (`authority`),
  ADD KEY `policy` (`policy`),
  ADD KEY `context_key` (`context_key`);

--
-- Indexes for table `modx_actiondom`
--
ALTER TABLE `modx_actiondom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set` (`set`),
  ADD KEY `action` (`action`),
  ADD KEY `name` (`name`),
  ADD KEY `active` (`active`),
  ADD KEY `for_parent` (`for_parent`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `modx_actions_fields`
--
ALTER TABLE `modx_actions_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action` (`action`),
  ADD KEY `type` (`type`),
  ADD KEY `tab` (`tab`);

--
-- Indexes for table `modx_active_users`
--
ALTER TABLE `modx_active_users`
  ADD PRIMARY KEY (`internalKey`);

--
-- Indexes for table `modx_categories`
--
ALTER TABLE `modx_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`parent`,`category`),
  ADD KEY `parent` (`parent`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `modx_categories_closure`
--
ALTER TABLE `modx_categories_closure`
  ADD PRIMARY KEY (`ancestor`,`descendant`);

--
-- Indexes for table `modx_content_type`
--
ALTER TABLE `modx_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `modx_context`
--
ALTER TABLE `modx_context`
  ADD PRIMARY KEY (`key`),
  ADD KEY `name` (`name`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `modx_context_resource`
--
ALTER TABLE `modx_context_resource`
  ADD PRIMARY KEY (`context_key`,`resource`);

--
-- Indexes for table `modx_context_setting`
--
ALTER TABLE `modx_context_setting`
  ADD PRIMARY KEY (`context_key`,`key`);

--
-- Indexes for table `modx_dashboard`
--
ALTER TABLE `modx_dashboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `hide_trees` (`hide_trees`);

--
-- Indexes for table `modx_dashboard_widget`
--
ALTER TABLE `modx_dashboard_widget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `type` (`type`),
  ADD KEY `namespace` (`namespace`),
  ADD KEY `lexicon` (`lexicon`);

--
-- Indexes for table `modx_dashboard_widget_placement`
--
ALTER TABLE `modx_dashboard_widget_placement`
  ADD PRIMARY KEY (`user`,`dashboard`,`widget`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `modx_deprecated_call`
--
ALTER TABLE `modx_deprecated_call`
  ADD PRIMARY KEY (`id`),
  ADD KEY `method` (`method`),
  ADD KEY `call_count` (`call_count`),
  ADD KEY `caller` (`caller`),
  ADD KEY `caller_file` (`caller_file`),
  ADD KEY `caller_line` (`caller_line`);

--
-- Indexes for table `modx_deprecated_method`
--
ALTER TABLE `modx_deprecated_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `definition` (`definition`);

--
-- Indexes for table `modx_documentgroup_names`
--
ALTER TABLE `modx_documentgroup_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `modx_document_groups`
--
ALTER TABLE `modx_document_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_group` (`document_group`),
  ADD KEY `document` (`document`);

--
-- Indexes for table `modx_element_property_sets`
--
ALTER TABLE `modx_element_property_sets`
  ADD PRIMARY KEY (`element`,`element_class`,`property_set`);

--
-- Indexes for table `modx_extension_packages`
--
ALTER TABLE `modx_extension_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `namespace` (`namespace`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `modx_fc_profiles`
--
ALTER TABLE `modx_fc_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `rank` (`rank`),
  ADD KEY `active` (`active`);

--
-- Indexes for table `modx_fc_profiles_usergroups`
--
ALTER TABLE `modx_fc_profiles_usergroups`
  ADD PRIMARY KEY (`usergroup`,`profile`);

--
-- Indexes for table `modx_fc_sets`
--
ALTER TABLE `modx_fc_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile` (`profile`),
  ADD KEY `action` (`action`),
  ADD KEY `active` (`active`),
  ADD KEY `template` (`template`);

--
-- Indexes for table `modx_lexicon_entries`
--
ALTER TABLE `modx_lexicon_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `topic` (`topic`),
  ADD KEY `namespace` (`namespace`),
  ADD KEY `language` (`language`);

--
-- Indexes for table `modx_manager_log`
--
ALTER TABLE `modx_manager_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_occurred` (`user`,`occurred`);

--
-- Indexes for table `modx_media_sources`
--
ALTER TABLE `modx_media_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `class_key` (`class_key`),
  ADD KEY `is_stream` (`is_stream`);

--
-- Indexes for table `modx_media_sources_contexts`
--
ALTER TABLE `modx_media_sources_contexts`
  ADD PRIMARY KEY (`source`,`context_key`);

--
-- Indexes for table `modx_media_sources_elements`
--
ALTER TABLE `modx_media_sources_elements`
  ADD PRIMARY KEY (`source`,`object`,`object_class`,`context_key`);

--
-- Indexes for table `modx_membergroup_names`
--
ALTER TABLE `modx_membergroup_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent` (`parent`),
  ADD KEY `rank` (`rank`),
  ADD KEY `dashboard` (`dashboard`);

--
-- Indexes for table `modx_member_groups`
--
ALTER TABLE `modx_member_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `modx_menus`
--
ALTER TABLE `modx_menus`
  ADD PRIMARY KEY (`text`),
  ADD KEY `parent` (`parent`),
  ADD KEY `action` (`action`),
  ADD KEY `namespace` (`namespace`);

--
-- Indexes for table `modx_namespaces`
--
ALTER TABLE `modx_namespaces`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `modx_property_set`
--
ALTER TABLE `modx_property_set`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `modx_register_messages`
--
ALTER TABLE `modx_register_messages`
  ADD PRIMARY KEY (`topic`,`id`),
  ADD KEY `created` (`created`),
  ADD KEY `valid` (`valid`),
  ADD KEY `accessed` (`accessed`),
  ADD KEY `accesses` (`accesses`),
  ADD KEY `expires` (`expires`);

--
-- Indexes for table `modx_register_queues`
--
ALTER TABLE `modx_register_queues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `modx_register_topics`
--
ALTER TABLE `modx_register_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue` (`queue`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `modx_session`
--
ALTER TABLE `modx_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access` (`access`);

--
-- Indexes for table `modx_site_content`
--
ALTER TABLE `modx_site_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alias` (`alias`),
  ADD KEY `published` (`published`),
  ADD KEY `pub_date` (`pub_date`),
  ADD KEY `unpub_date` (`unpub_date`),
  ADD KEY `parent` (`parent`),
  ADD KEY `isfolder` (`isfolder`),
  ADD KEY `template` (`template`),
  ADD KEY `menuindex` (`menuindex`),
  ADD KEY `searchable` (`searchable`),
  ADD KEY `cacheable` (`cacheable`),
  ADD KEY `hidemenu` (`hidemenu`),
  ADD KEY `class_key` (`class_key`),
  ADD KEY `context_key` (`context_key`),
  ADD KEY `uri` (`uri`(191)),
  ADD KEY `uri_override` (`uri_override`),
  ADD KEY `hide_children_in_tree` (`hide_children_in_tree`),
  ADD KEY `show_in_tree` (`show_in_tree`),
  ADD KEY `cache_refresh_idx` (`parent`,`menuindex`,`id`);
ALTER TABLE `modx_site_content` ADD FULLTEXT KEY `content_ft_idx` (`pagetitle`,`longtitle`,`description`,`introtext`,`content`);

--
-- Indexes for table `modx_site_htmlsnippets`
--
ALTER TABLE `modx_site_htmlsnippets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`),
  ADD KEY `locked` (`locked`),
  ADD KEY `static` (`static`);

--
-- Indexes for table `modx_site_plugins`
--
ALTER TABLE `modx_site_plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`),
  ADD KEY `locked` (`locked`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `static` (`static`);

--
-- Indexes for table `modx_site_plugin_events`
--
ALTER TABLE `modx_site_plugin_events`
  ADD PRIMARY KEY (`pluginid`,`event`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `modx_site_snippets`
--
ALTER TABLE `modx_site_snippets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`),
  ADD KEY `locked` (`locked`),
  ADD KEY `moduleguid` (`moduleguid`),
  ADD KEY `static` (`static`);

--
-- Indexes for table `modx_site_templates`
--
ALTER TABLE `modx_site_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `templatename` (`templatename`),
  ADD KEY `category` (`category`),
  ADD KEY `locked` (`locked`),
  ADD KEY `static` (`static`);

--
-- Indexes for table `modx_site_tmplvars`
--
ALTER TABLE `modx_site_tmplvars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`),
  ADD KEY `locked` (`locked`),
  ADD KEY `rank` (`rank`),
  ADD KEY `static` (`static`);

--
-- Indexes for table `modx_site_tmplvar_access`
--
ALTER TABLE `modx_site_tmplvar_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmplvar_template` (`tmplvarid`,`documentgroup`);

--
-- Indexes for table `modx_site_tmplvar_contentvalues`
--
ALTER TABLE `modx_site_tmplvar_contentvalues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tv_cnt` (`tmplvarid`,`contentid`),
  ADD KEY `tmplvarid` (`tmplvarid`),
  ADD KEY `contentid` (`contentid`);

--
-- Indexes for table `modx_site_tmplvar_templates`
--
ALTER TABLE `modx_site_tmplvar_templates`
  ADD PRIMARY KEY (`tmplvarid`,`templateid`);

--
-- Indexes for table `modx_system_eventnames`
--
ALTER TABLE `modx_system_eventnames`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `modx_system_settings`
--
ALTER TABLE `modx_system_settings`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `modx_transport_packages`
--
ALTER TABLE `modx_transport_packages`
  ADD PRIMARY KEY (`signature`),
  ADD KEY `workspace` (`workspace`),
  ADD KEY `provider` (`provider`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `package_name` (`package_name`),
  ADD KEY `version_major` (`version_major`),
  ADD KEY `version_minor` (`version_minor`),
  ADD KEY `version_patch` (`version_patch`),
  ADD KEY `release` (`release`),
  ADD KEY `release_index` (`release_index`);

--
-- Indexes for table `modx_transport_providers`
--
ALTER TABLE `modx_transport_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `api_key` (`api_key`),
  ADD KEY `username` (`username`),
  ADD KEY `active` (`active`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `modx_users`
--
ALTER TABLE `modx_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `class_key` (`class_key`),
  ADD KEY `remote_key` (`remote_key`),
  ADD KEY `primary_group` (`primary_group`);

--
-- Indexes for table `modx_user_attributes`
--
ALTER TABLE `modx_user_attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `internalKey` (`internalKey`);

--
-- Indexes for table `modx_user_group_roles`
--
ALTER TABLE `modx_user_group_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `authority` (`authority`);

--
-- Indexes for table `modx_user_group_settings`
--
ALTER TABLE `modx_user_group_settings`
  ADD PRIMARY KEY (`group`,`key`);

--
-- Indexes for table `modx_user_messages`
--
ALTER TABLE `modx_user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modx_user_settings`
--
ALTER TABLE `modx_user_settings`
  ADD PRIMARY KEY (`user`,`key`);

--
-- Indexes for table `modx_workspaces`
--
ALTER TABLE `modx_workspaces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `path` (`path`),
  ADD KEY `name` (`name`),
  ADD KEY `active` (`active`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_themes`
--
ALTER TABLE `tour_themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_codes`
--
ALTER TABLE `country_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `itinerary_customer`
--
ALTER TABLE `itinerary_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `modx_access_actiondom`
--
ALTER TABLE `modx_access_actiondom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_category`
--
ALTER TABLE `modx_access_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_context`
--
ALTER TABLE `modx_access_context`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modx_access_elements`
--
ALTER TABLE `modx_access_elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_media_source`
--
ALTER TABLE `modx_access_media_source`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_menus`
--
ALTER TABLE `modx_access_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_namespace`
--
ALTER TABLE `modx_access_namespace`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_permissions`
--
ALTER TABLE `modx_access_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `modx_access_policies`
--
ALTER TABLE `modx_access_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `modx_access_policy_templates`
--
ALTER TABLE `modx_access_policy_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modx_access_policy_template_groups`
--
ALTER TABLE `modx_access_policy_template_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modx_access_resources`
--
ALTER TABLE `modx_access_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_resource_groups`
--
ALTER TABLE `modx_access_resource_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_access_templatevars`
--
ALTER TABLE `modx_access_templatevars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_actiondom`
--
ALTER TABLE `modx_actiondom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_actions_fields`
--
ALTER TABLE `modx_actions_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `modx_categories`
--
ALTER TABLE `modx_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_content_type`
--
ALTER TABLE `modx_content_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modx_dashboard`
--
ALTER TABLE `modx_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_dashboard_widget`
--
ALTER TABLE `modx_dashboard_widget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modx_deprecated_call`
--
ALTER TABLE `modx_deprecated_call`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_deprecated_method`
--
ALTER TABLE `modx_deprecated_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_documentgroup_names`
--
ALTER TABLE `modx_documentgroup_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_document_groups`
--
ALTER TABLE `modx_document_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_extension_packages`
--
ALTER TABLE `modx_extension_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_fc_profiles`
--
ALTER TABLE `modx_fc_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_fc_sets`
--
ALTER TABLE `modx_fc_sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_lexicon_entries`
--
ALTER TABLE `modx_lexicon_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_manager_log`
--
ALTER TABLE `modx_manager_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `modx_media_sources`
--
ALTER TABLE `modx_media_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_membergroup_names`
--
ALTER TABLE `modx_membergroup_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_member_groups`
--
ALTER TABLE `modx_member_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_property_set`
--
ALTER TABLE `modx_property_set`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_register_queues`
--
ALTER TABLE `modx_register_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modx_register_topics`
--
ALTER TABLE `modx_register_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modx_site_content`
--
ALTER TABLE `modx_site_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modx_site_htmlsnippets`
--
ALTER TABLE `modx_site_htmlsnippets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modx_site_plugins`
--
ALTER TABLE `modx_site_plugins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_site_snippets`
--
ALTER TABLE `modx_site_snippets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modx_site_templates`
--
ALTER TABLE `modx_site_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modx_site_tmplvars`
--
ALTER TABLE `modx_site_tmplvars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_site_tmplvar_access`
--
ALTER TABLE `modx_site_tmplvar_access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_site_tmplvar_contentvalues`
--
ALTER TABLE `modx_site_tmplvar_contentvalues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_transport_providers`
--
ALTER TABLE `modx_transport_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_users`
--
ALTER TABLE `modx_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_user_attributes`
--
ALTER TABLE `modx_user_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modx_user_group_roles`
--
ALTER TABLE `modx_user_group_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modx_user_messages`
--
ALTER TABLE `modx_user_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modx_workspaces`
--
ALTER TABLE `modx_workspaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tour_themes`
--
ALTER TABLE `tour_themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `cities_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
