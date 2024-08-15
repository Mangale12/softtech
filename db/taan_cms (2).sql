-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2024 at 07:03 AM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taan_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement_titles`
--

CREATE TABLE `achievement_titles` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievement_titles`
--

INSERT INTO `achievement_titles` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'dss', '2024-07-28 23:30:15', '2024-07-29 00:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `achieve_ments`
--

CREATE TABLE `achieve_ments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achieve_ments`
--

INSERT INTO `achieve_ments` (`id`, `title`, `images`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'Harum quia dolor nos update', '/upload_file/achieve_ments/1723545818_377057695_trip-advisor (1).png', 1, NULL, '2024-07-29 00:44:39', '2024-08-13 04:58:52'),
(9, 'Commodi aperiam rati upsare', '/upload_file/achieve_ments/1723545827_1933506250_trustpilot-logo.png', 1, NULL, '2024-07-29 00:52:21', '2024-08-13 04:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `avchivements`
--

CREATE TABLE `avchivements` (
  `id` bigint UNSIGNED NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `marque`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nathaniel Cochran', 'Est non temporibus', NULL, '/upload_file/banner/1723705273_1211802704_home-banner (1).png', 1, NULL, '2024-08-11 01:08:03', '2024-08-15 01:16:14'),
(2, 'Moana Hooper', 'Alias nisi enim est', NULL, '/upload_file/banner/1723359465_2062467248_Screenshot from 2024-08-09 13-07-48.png', 1, '2024-08-11 01:13:43', '2024-08-11 01:12:46', '2024-08-11 01:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `season_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `course_content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `visit_no` int UNSIGNED NOT NULL DEFAULT '0',
  `faqs` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` json DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `days` json DEFAULT NULL,
  `more_details` longtext COLLATE utf8mb4_unicode_ci,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_difficulty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_altitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_map` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trail_address` text COLLATE utf8mb4_unicode_ci,
  `difficult_id` bigint UNSIGNED DEFAULT NULL,
  `month_id` bigint UNSIGNED DEFAULT NULL,
  `experience_id` bigint UNSIGNED DEFAULT NULL,
  `culture_id` bigint UNSIGNED DEFAULT NULL,
  `transport_id` bigint UNSIGNED DEFAULT NULL,
  `destination_id` bigint UNSIGNED DEFAULT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `category_id`, `user_id`, `season_id`, `title`, `post_unique_id`, `slug`, `thumbs`, `description`, `course_content`, `status`, `featured`, `tag`, `author`, `url`, `order`, `visit_no`, `faqs`, `videos`, `meta_title`, `meta_tag`, `meta_description`, `days`, `more_details`, `destination`, `durations`, `trip_difficulty`, `activities`, `max_altitude`, `group_size`, `route_map`, `trail_address`, `difficult_id`, `month_id`, `experience_id`, `culture_id`, `transport_id`, `destination_id`, `video_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(29, 'post', 1, 1, NULL, 'Itaque blanditiis qu', '1_66b478cab63a1', 'itaque-blanditiis-qu', 'uploads/videos/thumbnails/thumbnail_1723546042.jpeg', '<p>ssdadsadsadadsds</p>', NULL, 1, 0, NULL, NULL, NULL, '1', 14, '\"[{\\\"question\\\":\\\"Nihil quidem volupta\\\",\\\"ans\\\":\\\"Nostrud id reprehend\\\"},{\\\"question\\\":\\\"Maxime sed facere al\\\",\\\"ans\\\":\\\"Vel eiusmod nihil am\\\"}]\"', '\"[{\\\"id\\\":\\\"AQwHGbX80tI\\\",\\\"link\\\":\\\"https:\\\\/\\\\/www.youtube.com\\\\/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1\\\",\\\"thumbnail\\\":\\\"uploads\\\\/videos\\\\/thumbnails\\\\/thumbnail_1723185602.png\\\"},{\\\"id\\\":\\\"AQwHGbX80tI\\\",\\\"link\\\":\\\"https:\\\\/\\\\/www.youtube.com\\\\/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1\\\",\\\"thumbnail\\\":\\\"uploads\\\\/videos\\\\/thumbnails\\\\/thumbnail_1723185602.png\\\"},{\\\"id\\\":\\\"AQwHGbX80tI\\\",\\\"link\\\":\\\"https:\\\\/\\\\/www.youtube.com\\\\/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1\\\",\\\"thumbnail\\\":\\\"uploads\\\\/videos\\\\/thumbnails\\\\/thumbnail_1723185602.jpg\\\"}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"17\\\",\\\"days_title\\\":\\\"27\\\",\\\"days_descriptions\\\":\\\"Distinctio Ab minim\\\"}]\"', NULL, 'Quod ut temporibus q', 'Animi nesciunt ips', NULL, 'Duis voluptatem In', 'Aperiam autem conseq', 'Similique nihil poss', '/upload_file/blog/file/1723546122_1888906935_everest-base-camp-trek-map.jpg', 'Rerum expedita volup', NULL, 3, NULL, 1, 1, 2, NULL, NULL, '2024-08-08 02:05:35', '2024-08-13 05:03:42'),
(31, 'post', 1, 1, NULL, 'Quod et eos dignissi', '1_66b47a16310aa', 'quod-et-eos-dignissi', 'uploads/videos/thumbnails/thumbnail_1723546069.webp', '<p>Esse officiis molest</p>', NULL, 1, 0, NULL, NULL, NULL, '1', 50, '\"[{\\\"question\\\":\\\"Dolor est eos fugia\\\",\\\"ans\\\":\\\"Omnis nulla consequa\\\"}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"5\\\",\\\"days_title\\\":\\\"22\\\",\\\"days_descriptions\\\":\\\"Eius veniam veniam\\\"}]\"', NULL, 'Sit minim voluptatem', 'Eiusmod ut nostrud d', NULL, 'Quo in aliquid cupid', 'Ea ut eum enim fugit', 'Mollitia at voluptat', '/upload_file/blog/file/1723549925_1474864865_everest-base-camp-trek-map.jpg', 'Fuga Nesciunt offi', NULL, 2, NULL, 1, 1, NULL, NULL, NULL, '2024-08-08 02:11:06', '2024-08-13 23:46:51'),
(33, 'page', NULL, 1, NULL, 'Our Introduction', '1_66b8919222a66', 'our-introduction', 'uploads/videos/thumbnails/thumbnail_1723545681.webp', '<h5>&nbsp;</h5>\r\n\r\n<p>Trekking Agencies&#39; Association of Nepal (TAAN) is an umbrella association of trekking agencies in the country. It was established in 1979 by a handful of trekking agency operators who felt it was time to devise sound business principles as well as regulate the sector which was growing by leaps and bounds with every passing year. They also felt the need of a strong lobby group that could suggest to the government on several issues to promote the Nepali tourism industry and develop tourism as a revenue generating industry.</p>\r\n\r\n<h4><span style=\"color:#4da42f\">Initially, TAAN had limited its membership only to Nepalese trekking agencies. It later opened associate membership to foreign organizations to broaden the scope of the association&nbsp;</span>.</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<p>TAAN members (around 1,729 General Members, 7 Associate Members and 155 General Members of TAAN Regional Association Pokhara) meet annually to endorse policy guidelines which govern the executive body. The executive committee work as per the TAAN Statute and guidelines of the Annual General Body meeting. The association frequently communicates with different government agencies and other stakeholders to simplify working procedures and resolve problems related to the trekking sector. The executive committee, which is elected every two years, has eight office-bearers, nine executive committee members, four nominated executive members, one immediate past president and one representative from TAAN Regional Association Pokhara</p>\r\n\r\n<p>TAAN has 17 departments, which are led by office-bearers or executive committee members, which assist the executive committee to meet its objectives. The association organizes different trainings and workshops on a regular basis to enhance professionalism of its member agencies and their workforce. It organizes number of events like TAAN Lhosar Festival (February 17), Langtang Marathon Championship (April 25), International Sagarmatha Day and TAAN Day (May 29), World Environment Day (June 5), and World Tourism Day (September 27), among others. Likewise, programs like tree plantation, trekking trails and rivers clean-up campaign, and works to promote agro tourism and good sanitation are organized throughout the year.</p>\r\n\r\n<p>TAAN also join hands with number of government agencies and travel trade associations to organize different programs and activities.</p>\r\n\r\n<h5>Vision 2020</h5>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<p><span style=\"color:#4da42f\">Some principle visions of TAAN</span></p>\r\n\r\n<h4>Some principle visions of TAAN</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">Environment: environment is protected, not eroded by our operations; we will take every opportunity to enhance it.</li>\r\n	<li style=\"list-style-type:none\">Trekking employees: Trekking tourism sector employees are given opportunities to develop to their full potential; preserve their basic rights.</li>\r\n	<li style=\"list-style-type:none\">Customers: with higher values, quality service, our customers will be provided with mainstream sustainable products as the norm.</li>\r\n	<li style=\"list-style-type:none\">Communities: fully respected, will be benefit from all of our operations.</li>\r\n	<li style=\"list-style-type:none\">Infrastructure: well developed basic infrastructure through partnerships with national, international as well as local stakeholders.</li>\r\n	<li style=\"list-style-type:none\">Business value: socially and environmentally responsible, ensuring sustainable profits.</li>\r\n</ul>\r\n\r\n<h4>Objectives of TAAN</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">Develop and promote mountain tourism in Nepal.</li>\r\n	<li style=\"list-style-type:none\">Contribute to preserve the mountain environment of Nepal.</li>\r\n	<li style=\"list-style-type:none\">Contribute for the uplift of mountain economy of Nepal.</li>\r\n	<li style=\"list-style-type:none\">Preserve the rights and promote member trekking agencies.</li>\r\n	<li style=\"list-style-type:none\">Extend to the best of its ability, help, cooperate and advice individuals interested in trekking.</li>\r\n	<li style=\"list-style-type:none\">Make a wide search of the new trails and regions feasible for trekking and help the Government of Nepal and trekking agencies for its further development.</li>\r\n	<li style=\"list-style-type:none\">Regularize the facilities provided by member trekking agencies to their staff, including porters.</li>\r\n	<li style=\"list-style-type:none\">Provide necessary opinions and advise government for the formulation of the rules and regulations related to mountain tourism and facilities and incentives to be provided to trekking agencies.</li>\r\n	<li style=\"list-style-type:none\">Promote mountain tourism in collaboration with various government and semi-government bodies, domestic and international NGOs.</li>\r\n	<li style=\"list-style-type:none\">Cooperate with national and international organizations dealing with trekking and mountaineering training for the formulation of practical courses of study.</li>\r\n</ul>\r\n\r\n<p>TAAN conducts and participates in various activities in order to achieve its objectives. The main regular activities of the association are as follows:</p>\r\n\r\n<h4>Construction &amp; Developmental Activities</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">Construction and maintenance of trekking and transportation trails leading to the trekking and mountaineering destinations,</li>\r\n	<li style=\"list-style-type:none\">Construction of trail bridges, porter shelters and view towers.</li>\r\n</ul>\r\n\r\n<h4>Trainings &amp; Human Resources Development</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">To Organize different training programs to enhance the skill of Trekking Guides like: nature training, bird watching training, leadership training, first aid and mountain medicine, map and navigation training, travel photography training, campsite management training, media reporting trainings etc.</li>\r\n	<li style=\"list-style-type:none\">To organize training programs for the trekking cook and helpers.</li>\r\n	<li style=\"list-style-type:none\">To organize training for trekking tourism entrepreneurs / managers like business correspondence training, social media and digital marketing training and other management trainings</li>\r\n	<li style=\"list-style-type:none\">To organize training/workshop/seminars in the issues regarding business operation, international tourism marketing trends etc.</li>\r\n</ul>\r\n\r\n<h4>Promotional Activities</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">To organize different meetings, conferences, seminars and talks programs on tourism.</li>\r\n	<li style=\"list-style-type:none\">To participate in tourism related fairs, marts and conferences within and outside the country.</li>\r\n	<li style=\"list-style-type:none\">To submit advices/ suggestions on matters relating to tourism promotion to the Government of Nepal regularly.</li>\r\n	<li style=\"list-style-type:none\">To publish and distribute complimentary copies of newsletter, member directory and other useful booklets pertaining to tourism.</li>\r\n	<li style=\"list-style-type:none\">To establish cordial relations and exchange delegations with organizations of other countries.</li>\r\n	<li style=\"list-style-type:none\">To support and recommend its members on promotional activities.</li>\r\n</ul>\r\n\r\n<h4>Environmental Activities</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">To organize training and workshop on environment awareness courses.</li>\r\n	<li style=\"list-style-type:none\">To participate in and support government&#39;s World Environment Day program.</li>\r\n	<li style=\"list-style-type:none\">To organize various environment conservation programs such as Afforestation and Clean-up Program.</li>\r\n	<li style=\"list-style-type:none\">To organize various student level competitions to raise environment awareness among them.</li>\r\n	<li style=\"list-style-type:none\">To organize Talk Programs with the view to educate the concerned general public about the importance of tourism and maintenance of ecological balance. Talks are delivered by renowned experts on the subject.</li>\r\n	<li style=\"list-style-type:none\">TAAN T-shirts (with a slogan and logo for environmental awareness) are sold at the TAAN secretariat. Proceeds from the sales are used for conducting nature conservation activities.</li>\r\n</ul>\r\n\r\n<h4>Philanthropic Activities</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">To raise and deliver the fund for the victims of various disasters like earthquake, landslide, flood etc.</li>\r\n	<li style=\"list-style-type:none\">To assist people in distress by dispatching rescue teams to help at times of mishaps like bus, air and other accidents.</li>\r\n	<li style=\"list-style-type:none\">To raise and deliver the fund for the maintenance of bridges and roads in trekking region. The association has a well- managed secretariat headed by the Chief Executive Officer. The secretariat is happy to provide information on trekking, mountaineering and other aspects of tourism.</li>\r\n</ul>\r\n\r\n<h4>Emergency Response</h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li style=\"list-style-type:none\">Since its inception, TAAN has been extending its helpful hands in any emergency response. Its&rsquo; members have collected pennies to support the people in need. In many cases, it has mediated to provide relief to the victims of natural calamity. Its presence during the firing in eastern Nepal, flooding in Terai, landslides in hilly areas have been remarkable.</li>\r\n	<li style=\"list-style-type:none\">TAAN played a major role representing private sector to rescue the Hudhud victims in 2014 from Annapurnas of western Nepal.</li>\r\n	<li style=\"list-style-type:none\">Similarly, TAAN worked with World Food Program after mega earthquake of 2015, in opening community trails, reconstructing trekking trails and distributing relief material in several VDCs of Rasuwa, Dhading and Gorkha districts.</li>\r\n	<li style=\"list-style-type:none\">Likewise, TAAN launched TAAN relief cmapign to supportvictims of Bara and Parsa storm victimsvictims of Bara and Parsa storm victimsof Bara and Parsa storm victims. The fund collected was handed over formaking temporary building for Little Academic Primary School of Kalaiya</li>\r\n</ul>', NULL, 1, 0, NULL, NULL, NULL, '1', 55, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":null,\\\"days_title\\\":null,\\\"days_descriptions\\\":null}]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-11 04:40:22', '2024-08-13 05:31:53'),
(34, 'page', 3, 1, NULL, 'What We Do?', '1_66b8a16b6831a', 'what-we-do', NULL, '<p><span style=\"color:#212529; font-family:Roboto,sans-serif; font-size:18px\">TAAN members specialise in offering you an unrivalled collection of financially protected, quality adventure</span><br />\r\n<span style=\"color:#212529; font-family:Roboto,sans-serif; font-size:18px\">holidays to every corner of the Nepal.</span></p>', NULL, 1, 0, NULL, NULL, NULL, '1', 0, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"Day 1\\\",\\\"days_title\\\":null,\\\"days_descriptions\\\":null}]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-11 05:47:59', '2024-08-13 00:54:45'),
(35, 'page', 3, 1, NULL, 'Message from President', '1_66b8a29e50479', 'message-from-president', '/upload_file/blog/1723376286_234885220_nil-hari-bastola.jpg', '<h5>Nilhari Bastola (President)</h5>\r\n\r\n<p>I have been elected as President of Trekking Agencies&rsquo; Association of Nepal (TAAN) and I am very pleased to be appointed to this position and would like to congratulate entire executive committee for being elected for the tenure of 2 years. We look forward to the year ahead and we hope that, with the support of Executive Committee, Member Agencies and staff, we can strengthen and promote the tourism industry.</p>', NULL, 1, 0, NULL, NULL, NULL, '1', 4, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"Day 1\\\",\\\"days_title\\\":null,\\\"days_descriptions\\\":null}]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-11 05:53:06', '2024-08-13 00:54:58'),
(36, 'page', NULL, 1, NULL, 'Get Started by Speaking with our Support counsellors', '1_66b8a697c70d1', 'get-started-by-speaking-with-our-support-counsellors', 'uploads/videos/thumbnails/thumbnail_1723546376.jpg', '<p style=\"box-sizing: border-box; font-size: 18px; padding-top: 15px; color: rgb(255, 255, 255); font-family: Roboto, serif; background-color: rgb(77, 163, 47);\">Our Taan Support are working from home, ready to help you stay open for business with answers and advice 24/7/365. Send your queries about trekking, Help or complain your trekking services.<br></p>', NULL, 1, 0, NULL, NULL, 'https://www.youtube.com/watch?v=t9VwrxZ1nyM&list=RDt9VwrxZ1nyM&start_radio=1', '1', 4, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":null,\\\"days_title\\\":null,\\\"days_descriptions\\\":null}]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't9VwrxZ1nyM', NULL, '2024-08-11 06:10:03', '2024-08-13 05:07:56'),
(37, 'post', 4, 1, NULL, 'Tempore est ducimus', '1_66b9b8f6c6e33', 'tempore-est-ducimus', 'uploads/videos/thumbnails/thumbnail_1723447687.webp', '<p>At est dicta harum v</p>', NULL, 1, 0, NULL, NULL, NULL, '1', 15, '\"[{\\\"question\\\":\\\"Est incididunt est\\\",\\\"ans\\\":\\\"Eu autem veritatis e\\\"},{\\\"question\\\":\\\"Nemo aperiam cumque\\\",\\\"ans\\\":\\\"Voluptas mollit nost\\\"},{\\\"question\\\":\\\"In ratione et quos v\\\",\\\"ans\\\":\\\"Voluptas ipsa molli\\\"}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":\\\"https:\\\\/\\\\/www.kopan.biz\\\",\\\"thumbnail\\\":\\\"uploads\\\\/videos\\\\/thumbnails\\\\/thumbnail_1723447542.jpg\\\"}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"23\\\",\\\"days_title\\\":\\\"15\\\",\\\"days_descriptions\\\":\\\"Sint deleniti aute q\\\"},{\\\"day\\\":\\\"28\\\",\\\"days_title\\\":\\\"2\\\",\\\"days_descriptions\\\":\\\"Dolor eius odit dolo\\\"},{\\\"day\\\":\\\"5\\\",\\\"days_title\\\":\\\"1\\\",\\\"days_descriptions\\\":\\\"Sed nobis sed ducimu\\\"}]\"', NULL, 'Obcaecati sed earum', 'Ut dolore molestiae', NULL, 'Omnis consequatur ve', 'Sint et excepteur p', 'A officia occaecat s', '/upload_file/blog/file/1723549946_1268014874_everest-base-camp-trek-map.jpg', 'Omnis rerum qui dolo', 2, 3, NULL, 1, 1, NULL, NULL, NULL, '2024-08-12 01:40:42', '2024-08-13 06:07:26'),
(38, 'page', 1, 1, NULL, 'Aut a rem ratione vo', '1_66baefb6a8d5f', 'aut-a-rem-ratione-vo', '/upload_file/blog/1723527094_324710206_org-chart.jpg', '<p><span style=\"color:#212529; font-family:Roboto,sans-serif; font-size:18px\">Welcome to Trekking Agencies&#39; Association of Nepal (TAAN)</span></p>', NULL, 0, 0, NULL, NULL, NULL, '1', 10, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"8\\\",\\\"days_title\\\":\\\"5\\\",\\\"days_descriptions\\\":\\\"Labore ea fugiat po\\\"}]\"', NULL, 'Voluptate explicabo', 'Omnis quibusdam aliq', NULL, 'Cumque nostrum minim', 'In Nam quibusdam mag', 'Itaque tempore eum', NULL, 'Et autem aliqua Rer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 23:46:34', '2024-08-13 00:58:34'),
(39, 'page', 1, 1, NULL, 'FAQs', '1_66baf6aa0b8cc', 'faqs', NULL, '<p><span style=\"color:#212529; font-family:Roboto,sans-serif; font-size:18px\">An FAQ page is an important part of any business website. Learn the best strategies for creating FAQ pages that convert site visitors into paying customers.</span></p>', NULL, 1, 0, NULL, NULL, NULL, '1', 6, '\"[{\\\"question\\\":null,\\\"ans\\\":null}]\"', '\"[{\\\"id\\\":null,\\\"link\\\":null,\\\"thumbnail\\\":null}]\"', NULL, '[\"\"]', NULL, '\"[{\\\"day\\\":\\\"Day 1\\\",\\\"days_title\\\":null,\\\"days_descriptions\\\":null}]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-13 00:16:14', '2024-08-13 00:55:09'),
(40, 'page', NULL, 1, NULL, 'Start planning your next trail adventure', '1_66bb321eb5a3b', 'start-planning-your-next-trail-adventure', '/upload_file/blog/1723544094_554766287_home-banner.png', '<p><span style=\"color: rgb(255, 255, 255); font-family: Roboto, sans-serif; font-size: 18px; text-align: center; background-color: rgba(0, 0, 0, 0.38);\">TAAN helps adventure-seekers plan and book travel to some of the most popular mountain destinations around the Nepal</span><br></p>', NULL, 1, 0, NULL, NULL, NULL, '1', 0, '\"null\"', '\"[]\"', NULL, '[\"\"]', NULL, '\"null\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-13 04:29:55', '2024-08-13 04:29:55'),
(41, 'page', NULL, 1, NULL, 'What is Trail ?', '1_66bb32eeb3d87', 'what-is-trail', '/upload_file/blog/1723544302_1859268030_maxresdefault.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px;\">A trail, in its most fundamental sense, is a path or route created for walking, hiking, biking, or horseback riding. Trails can be found in a variety of environments, ranging from urban parks to remote wilderness areas. They provide a means for people to explore and appreciate the natural world, promoting physical activity and offering a respite from the hustle and bustle of everyday life. The term \"trail\" originates from the Old French word \"trailer,\" meaning \"to tow\" or \"to drag.\" Historically, trails were created by the repeated passage of people or animals, resulting in a visible path through vegetation or terrain. Today, trails are often intentionally designed and maintained to provide safe and accessible routes for recreational and educational purposes. Types of Trails Hiking Trails: Designed for walking and hiking, these trails vary in length and difficulty, from short nature walks to long-distance backpacking routes.</span><br></p>', NULL, 1, 0, NULL, NULL, 'https://www.youtube.com/watch?v=BchpIcqJy8w&t=6s', '1', 0, '\"null\"', '\"[]\"', NULL, '[\"\"]', NULL, '\"null\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BchpIcqJy8w', NULL, '2024-08-13 04:33:22', '2024-08-13 04:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_post_count` int UNSIGNED NOT NULL DEFAULT '0',
  `order` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `title`, `unique_id`, `slug`, `description`, `category_post_count`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Language Preparation  update', '2079261012478426', 'language-preparation-update', NULL, 0, NULL, 0, NULL, '2024-08-14 02:13:57'),
(3, NULL, 'langtang', '2079311153011808', 'langtang', 'dfds', 0, NULL, 1, '2024-07-31 06:08:01', '2024-08-09 04:26:18'),
(4, NULL, 'Assumenda aliquam ha', '2079090959372113', 'assumenda-aliquam-ha', NULL, 0, NULL, 1, '2024-08-09 04:14:37', '2024-08-09 04:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `image_path`, `user_id`, `created_at`, `updated_at`) VALUES
(18, NULL, 'uploads/blog/images/blag_1723028571.png', 1, '2024-08-07 05:17:51', '2024-08-07 05:17:51'),
(19, NULL, 'uploads/blog/images/blag_1723028571.png', 1, '2024-08-07 05:17:51', '2024-08-07 05:17:51'),
(23, NULL, 'uploads/blog/images/blag_1723028663.jpeg', 1, '2024-08-07 05:19:23', '2024-08-07 05:19:23'),
(26, NULL, 'uploads/blog/images/blag_1723031028.png', 1, '2024-08-07 05:58:48', '2024-08-07 05:58:48'),
(28, NULL, 'uploads/blog/images/blag_1723031094.png', 1, '2024-08-07 05:59:54', '2024-08-07 05:59:54'),
(29, NULL, 'uploads/blog/images/blag_1723031094.png', 1, '2024-08-07 05:59:54', '2024-08-07 05:59:54'),
(31, 29, 'uploads/blog/images/blag_1723115721.png', 1, '2024-08-08 05:30:21', '2024-08-08 05:30:21'),
(32, 29, 'uploads/blog/images/blag_1723115721.png', 1, '2024-08-08 05:30:21', '2024-08-08 05:30:21'),
(33, NULL, 'uploads/blog/images/blag_1723183228.png', 1, '2024-08-09 00:15:28', '2024-08-09 00:15:28'),
(34, NULL, 'uploads/blog/images/blag_1723183228.png', 1, '2024-08-09 00:15:28', '2024-08-09 00:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_before` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `clients_types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commons`
--

CREATE TABLE `commons` (
  `id` bigint UNSIGNED NOT NULL,
  `header_first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_first_description` text COLLATE utf8mb4_unicode_ci,
  `footer_second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_second_description` text COLLATE utf8mb4_unicode_ci,
  `footer_third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_third_description` text COLLATE utf8mb4_unicode_ci,
  `footer_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_fourth_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commons`
--

INSERT INTO `commons` (`id`, `header_first_title`, `header_second_title`, `header_third_title`, `header_fourth_title`, `footer_first_title`, `footer_first_description`, `footer_second_title`, `footer_second_description`, `footer_third_title`, `footer_third_description`, `footer_fourth_title`, `footer_fourth_description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'Default About Us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque unde facere repellendus, odio et iste voluptatum aspernatur ratione mollitia tempora eligendi maxime est, blanditiis accusamus. Incidunt, aut, quis!</p>', 'Latest Trails', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque unde facere repellendus,</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href=\"https://softechsportclub.org.np/trail-details#\">Everest Base Camp Helicopter Tour</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://softechsportclub.org.np/trail-details#\">Annapurna Base Camp Trek - 7 Days</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://softechsportclub.org.np/trail-details#\">Everest Base Camp Trek - 14 Days</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://softechsportclub.org.np/trail-details#\">Everest Base Camp Trek - 13 Things to Know for Your Trip</a></p>\r\n	</li>\r\n</ul>', 'PECM', '<p>PECM</p>', 'PECM', '<p>PECM</p>', NULL, '2024-08-04 04:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint UNSIGNED NOT NULL,
  `happy_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `culturals`
--

CREATE TABLE `culturals` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `culturals`
--

INSERT INTO `culturals` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Veniam eligendi vel', 1, NULL, '2024-08-14 06:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `defficults`
--

CREATE TABLE `defficults` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `defficults`
--

INSERT INTO `defficults` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nulla beatae tempori update', 1, NULL, '2024-08-14 02:18:23'),
(2, 'Eum velit dolorum d', 1, NULL, '2024-08-10 22:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `deman_courses`
--

CREATE TABLE `deman_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `order` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `destination_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `title`, `image`, `description`, `destination_id`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sunt qui ea delenit update', '/upload_file/destination/1723546210_296089867_maxresdefault (1).jpg', 'Totam aliquam nihil', NULL, 0, 'sunt-qui-ea-delenit-update', '2024-08-02 06:19:31', '2024-08-14 02:28:40'),
(2, 'In voluptatum debiti', '/upload_file/destination/1723546262_2130647932_images.jpeg', 'Est fugiat nisi accu', NULL, 1, 'in-voluptatum-debiti', '2024-08-11 04:07:45', '2024-08-13 05:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `district_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `district_en`, `district_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur', NULL, NULL, NULL),
(2, 1, 'Dhankuta', NULL, NULL, NULL),
(3, 1, 'Ilam', NULL, NULL, NULL),
(4, 1, 'Jhapa', NULL, NULL, NULL),
(5, 1, 'Morang', NULL, NULL, NULL),
(6, 1, 'Khotang', NULL, NULL, NULL),
(7, 1, 'Okhaldhunga', NULL, NULL, NULL),
(8, 1, 'Panchthar', NULL, NULL, NULL),
(9, 1, 'Sankhuwasabha', NULL, NULL, NULL),
(10, 1, 'Solukhumbu', NULL, NULL, NULL),
(11, 1, 'Sunsari', NULL, NULL, NULL),
(12, 1, 'Taplejung', NULL, NULL, NULL),
(13, 1, 'Tehrathum', NULL, NULL, NULL),
(14, 1, 'Udayapur', NULL, NULL, NULL),
(15, 2, 'Bara', NULL, NULL, NULL),
(16, 2, 'Dhanusa', NULL, NULL, NULL),
(17, 2, 'Mahottari', NULL, NULL, NULL),
(18, 2, 'Parsa', NULL, NULL, NULL),
(19, 2, 'Rautahat', NULL, NULL, NULL),
(20, 2, 'Saptari', NULL, NULL, NULL),
(21, 2, 'Sarlahi', NULL, NULL, NULL),
(22, 2, 'Siraha', NULL, NULL, NULL),
(23, 3, 'Bhaktapur', NULL, NULL, NULL),
(24, 3, 'Chitwan', NULL, NULL, NULL),
(25, 3, 'Dhading', NULL, NULL, NULL),
(26, 3, 'Dolakha', NULL, NULL, NULL),
(27, 3, 'Kavrepalanchok', NULL, NULL, NULL),
(28, 3, 'Kathmandu', NULL, NULL, NULL),
(29, 3, 'Lalitpur', NULL, NULL, NULL),
(30, 3, 'Makwanpur', NULL, NULL, NULL),
(31, 3, 'Nuwakot', NULL, NULL, NULL),
(32, 3, 'Ramechhap', NULL, NULL, NULL),
(33, 3, 'Rasuwa', NULL, NULL, NULL),
(34, 3, 'Sindhuli', NULL, NULL, NULL),
(35, 3, 'Sindhupalchowk', NULL, NULL, NULL),
(36, 4, 'Baglung', NULL, NULL, NULL),
(37, 4, 'Gorkha', NULL, NULL, NULL),
(38, 4, 'Kaski', NULL, NULL, NULL),
(39, 4, 'Lamjung', NULL, NULL, NULL),
(40, 4, 'Manang', NULL, NULL, NULL),
(41, 4, 'Mustang', NULL, NULL, NULL),
(42, 4, 'Myagdi', NULL, NULL, NULL),
(43, 4, 'Nawalparasi', NULL, NULL, NULL),
(44, 4, 'Parbat', NULL, NULL, NULL),
(45, 4, 'Syangja', NULL, NULL, NULL),
(46, 4, 'Tanahun', NULL, NULL, NULL),
(47, 5, 'Arghakhanchi', NULL, NULL, NULL),
(48, 5, 'Banke', NULL, NULL, NULL),
(49, 5, 'Bardiya', NULL, NULL, NULL),
(50, 5, 'Dang', NULL, NULL, NULL),
(51, 5, 'Gulmi', NULL, NULL, NULL),
(52, 5, 'Kapilvastu', NULL, NULL, NULL),
(53, 5, 'Nawalparasi (West)', NULL, NULL, NULL),
(54, 5, 'Palpa', NULL, NULL, NULL),
(55, 5, 'Pyuthan', NULL, NULL, NULL),
(56, 5, 'Rolpa', NULL, NULL, NULL),
(57, 5, 'Rukum (East)', NULL, NULL, NULL),
(58, 5, 'Rupandehi', NULL, NULL, NULL),
(59, 6, 'Dailekh', NULL, NULL, NULL),
(60, 6, 'Dolpa', NULL, NULL, NULL),
(61, 6, 'Humla', NULL, NULL, NULL),
(62, 6, 'Jajarkot', NULL, NULL, NULL),
(63, 6, 'Jumla', NULL, NULL, NULL),
(64, 6, 'Kalikot', NULL, NULL, NULL),
(65, 6, 'Mugu', NULL, NULL, NULL),
(66, 6, 'Rukum (West)', NULL, NULL, NULL),
(67, 6, 'Salyan', NULL, NULL, NULL),
(68, 6, 'Surkhet', NULL, NULL, NULL),
(69, 7, 'Acham', NULL, NULL, NULL),
(70, 7, 'Baitadi', NULL, NULL, NULL),
(71, 7, 'Bajhan', NULL, NULL, NULL),
(72, 7, 'Bajura', NULL, NULL, NULL),
(73, 7, 'Dadeldhura', NULL, NULL, NULL),
(74, 7, 'Darcula', NULL, NULL, NULL),
(75, 7, 'Doti', NULL, NULL, NULL),
(76, 7, 'Kailali', NULL, NULL, NULL),
(77, 7, 'Kanchanpur', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quisquam impedit se  update', 1, NULL, '2024-08-14 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'In mollitia aliquip', 'Dolore id recusandae', 1, '2024-08-02 23:38:13', '2024-08-02 23:38:13'),
(2, 'Quidem nisi odio nih', 'Quia do nisi amet q', 1, '2024-08-02 23:38:13', '2024-08-02 23:38:13'),
(3, 'Nihil cillum commodi', 'Cumque qui praesenti', 1, '2024-08-02 23:38:13', '2024-08-02 23:38:13'),
(4, 'Quo voluptatem labo', 'Aliquid provident o', 1, '2024-08-02 23:38:13', '2024-08-02 23:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int UNSIGNED DEFAULT NULL,
  `download_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Photo title goes here', '/upload_file/galleries/1723547248_884747827_taan-logo (1).jpg', 1, '2024-07-30 04:50:05', '2024-08-13 05:22:28'),
(2, 'Photo title goes here', '/upload_file/galleries/1723547260_1065978054_download (2).jpeg', 1, '2024-07-30 04:50:05', '2024-08-13 05:22:40'),
(3, 'Photo title goes here', '/upload_file/galleries/1723547274_1739464478_maxresdefault (1).jpg', 1, '2024-07-30 04:50:05', '2024-08-13 05:22:54'),
(4, 'Photo title goes here', '/upload_file/galleries/1723547287_451446899_download (1).jpeg', 1, '2024-08-07 03:29:57', '2024-08-13 05:23:07'),
(5, 'Photo title goes here', '/upload_file/galleries/1723022100_2103500663_Screenshot from 2024-07-22 20-05-39.png', 1, '2024-08-07 03:30:00', '2024-08-07 03:30:00'),
(6, 'Photo title goes here', '/upload_file/galleries/1723022104_100206902_Screenshot from 2022-11-26 12-12-28.png', 1, '2024-08-07 03:30:04', '2024-08-07 03:30:04'),
(7, 'Photo title goes here', '/upload_file/galleries/1723547303_533652319_home-banner.png', 1, '2024-08-07 03:30:07', '2024-08-13 05:23:24'),
(8, 'Photo title goes here', '/upload_file/galleries/1723547322_423159009_istockphoto-1341288649-612x612.jpg', 1, '2024-08-10 23:07:40', '2024-08-13 05:23:42'),
(9, 'Photo title goes here', '/upload_file/galleries/1723547348_1131839199_images.jpeg', 1, '2024-08-10 23:07:48', '2024-08-13 05:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Enim corporis quam p', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_questions`
--

CREATE TABLE `interview_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `order` int DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_types`
--

CREATE TABLE `interview_types` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_post_count` int UNSIGNED NOT NULL DEFAULT '0',
  `order` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `default` int DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `status`, `sort_order`, `default`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'en', 'en', 1, NULL, NULL, NULL, NULL, '2024-08-11 00:46:00', '2024-08-11 00:46:00'),
(2, 'np', 'np', 1, NULL, NULL, NULL, NULL, '2024-08-11 00:46:07', '2024-08-11 00:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `profile` json DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `member_type_id` bigint UNSIGNED DEFAULT NULL,
  `legal_documents` json DEFAULT NULL,
  `company` json DEFAULT NULL,
  `social` json DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_mail_send` tinyint(1) DEFAULT '0',
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` json DEFAULT NULL,
  `member_post` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_founded_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_clearance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `profile`, `user_id`, `member_type_id`, `legal_documents`, `company`, `social`, `about_us`, `is_active`, `is_mail_send`, `member_id`, `thumbnail`, `footer`, `member_post`, `created_at`, `updated_at`, `company_logo`, `company_name`, `company_website`, `company_founded_year`, `pan`, `pan_no`, `register_no`, `register_file`, `tax_clearance`) VALUES
(1, NULL, NULL, NULL, '{\"pan\": \"/upload_file/member/1722404975_280830866_Screenshot from 2024-07-17 20-37-02.png\", \"register_file\": \"/upload_file/member/1722404975_824063068_Screenshot from 2022-11-26 12-12-28.png\", \"tax_clearance\": \"/upload_file/member/1722404976_1090800033_taan-logo.jpg\"}', '{\"company_name\": \"\\\"Mcfadden Cherry Trading\\\"\"}', NULL, NULL, 0, 0, '8', NULL, NULL, NULL, '2024-07-30 23:26:33', '2024-07-31 01:18:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, '{\"pan\": \"/upload_file/member/1722409397_296347878_Screenshot from 2022-11-26 12-12-28.png\", \"register_file\": \"/upload_file/member/1722409397_1918426825_Screenshot from 2024-07-17 20-37-02.png\", \"tax_clearance\": \"/upload_file/member/1722409397_1569675898_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_name\": \"Mcdaniel and Mercer Associates\"}', NULL, NULL, 0, 0, '10', NULL, NULL, NULL, '2024-07-31 01:14:56', '2024-08-02 00:44:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 13, NULL, '{\"pan\": \"/upload_file/member/1722579863_1958375773_Screenshot from 2024-07-22 20-05-39.png\", \"register_file\": \"/upload_file/member/1722579864_1359961044_Screenshot from 2024-07-27 10-02-35.png\", \"tax_clearance\": \"/upload_file/member/1722579864_1762640568_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_name\": \"Frye Gibbs Co\"}', NULL, NULL, 0, 0, 'ZwrgTkfl', NULL, NULL, NULL, '2024-08-02 00:39:24', '2024-08-02 00:39:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 22, NULL, '{\"pan\": \"/upload_file/member/1722583889_526518712_Screenshot from 2024-07-22 20-05-39.png\", \"register_file\": \"/upload_file/member/1722583890_285341939_Screenshot from 2024-07-22 20-05-39.png\", \"tax_clearance\": \"/upload_file/member/1722583890_1500869985_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_name\": \"Fleming Guzman Traders\"}', NULL, NULL, 0, 0, '0051576785', NULL, NULL, NULL, '2024-08-02 01:46:30', '2024-08-02 01:46:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 24, NULL, '{\"pan\": {\"image\": \"/upload_file/member/1722595321_2113067978_Screenshot from 2022-11-26 12-12-28.png\", \"pan_no\": \"lling\"}, \"company\": {\"register_no\": \"eeeee\", \"register_file\": \"/upload_file/member/1722759282_576589489_Screenshot from 2022-11-26 12-12-28.png\"}, \"tax_clearance\": \"/upload_file/member/1722595321_1762738443_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_name\": \"aaa\"}', NULL, NULL, 0, 0, '0080818944', NULL, NULL, NULL, '2024-08-02 04:28:53', '2024-08-04 02:29:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 27, NULL, '{\"pan\": {\"image\": \"/upload_file/member/1722773474_1214720773_Screenshot from 2022-11-26 12-12-28.png\", \"pan_no\": \"Soluta hic sunt ex n\"}, \"company\": {\"register_no\": \"Ut vero voluptas fug\", \"company_logo\": \"/upload_file/member/1722834120_87304055_Screenshot from 2022-11-26 12-12-28.png\", \"register_file\": \"/upload_file/member/1722773474_1702349422_Screenshot from 2022-11-26 12-12-28.png\"}, \"tax_clearance\": \"/upload_file/member/1722773475_1880114925_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_logo\": \"/upload_file/member/1722834790_736266688_signal-2024-01-29-140713.jpeg\", \"company_name\": \"Gibbs and Hardy Co\", \"company_website\": \"https://www.rexyjyfokosu.biz\", \"company_founded_year\": \"Patrick Summers Traders\"}', '{\"twiter\": \"https://www.gezaso.mobi\", \"youtube\": \"https://www.todasufequwe.co.uk\", \"facebook\": \"https://www.duzaqyf.mobi\", \"instagram\": \"https://www.guronoq.biz\", \"linked_id\": null}', NULL, 0, 0, '0090754228', NULL, NULL, 'Asperiores quas ipsa', '2024-08-04 06:26:15', '2024-08-05 02:26:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 1, 2, '{\"pan\": {\"image\": \"/upload_file/member/1722843211_385866117_signal-2024-01-29-140713.jpeg\", \"pan_no\": \"Aspernatur laborum a\"}, \"company\": {\"register_no\": \"Architecto irure ad\", \"register_file\": \"/upload_file/member/1722843212_707418046_signal-2024-01-29-140713.jpeg\"}, \"tax_clearance\": \"/upload_file/member/1722843212_1625583033_signal-2024-01-29-140713.jpeg\"}', '{\"company_logo\": \"/upload_file/member/1722843212_1812220728_signal-2024-01-29-140713.jpeg\", \"company_name\": \"Rosario Sharp LLC\", \"company_website\": \"https://www.hehezypujo.cm\", \"company_founded_year\": \"Dyer Cohen Plc\"}', '{\"twiter\": \"https://www.kaqiq.info\", \"youtube\": \"https://www.velylureqahoxag.co.uk\", \"facebook\": \"https://www.qocinahazasezog.com.au\", \"instagram\": \"https://www.gafyno.org\", \"linked_id\": null, \"linked_in\": \"https://www.qybisapurug.com\"}', '<h2 class=\"my-3 mb-4\" style=\"box-sizing: border-box; font-weight: 700; line-height: 1.2; color: rgb(33, 37, 41); font-size: 42px; font-family: Literata, serif;\"><i style=\"box-sizing: border-box;\">DREAM, PLAN, AND DISCOVER WITH US</i></h2><h2 class=\"my-3 mb-4\" style=\"box-sizing: border-box; font-weight: 700; line-height: 1.2; font-size: 42px; font-family: Literata, serif;\">About Us</h2><h2 class=\"my-3 mb-4\" style=\"box-sizing: border-box; font-weight: 700; line-height: 1.2; color: rgb(33, 37, 41); font-size: 42px; font-family: Literata, serif; border-bottom: 2px solid rgb(77, 164, 47); padding-bottom: 15px;\"><span style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 16px; font-weight: 400;\">Nepal Trek Adventure and Expedition is a Kathmandu-based international adventure travel company specializing in high-altitude trekking, helicopter tours, adventure activities, and expeditions.</span><br style=\"box-sizing: border-box;\"></h2><h2 class=\"my-3 mb-4\" style=\"box-sizing: border-box; font-weight: 700; line-height: 1.2; color: rgb(33, 37, 41); font-size: 42px; font-family: Literata, serif;\"><div class=\" page_content\" style=\"box-sizing: border-box;\"><div class=\" page_content\" style=\"box-sizing: border-box; font-family: Roboto, sans-serif; font-size: 16px; font-weight: 400;\"><p style=\"box-sizing: border-box; font-size: 18px; padding-top: 0px;\">Nepal Trek Adventure and Expedition is one of the leading trekking companies of Nepal. It is a government-registered travel agency that is recognized by the Trekking Agencies Association of Nepal. It is a client-oriented organization that was established in 2006 with the sole objective of “Satisfied Customer Our Assets”. The organization has been providing a wide range of trek and tour services to thousands of tourists since then. The reviews of our customers speak aloud about us keeping NTA different from the crowd of trekking agencies.</p><p style=\"box-sizing: border-box; font-size: 18px; padding-top: 0px;\">NTA has a set of a well experienced, self-motivated, and dedicated teams who work around a clock to make your holiday package memorable, cherishable, and safe. The organization has more than 20 certified trekking guides and around 10 tour guides. NTA provides local trekking guides / Sherpa to the customers so that they (customers) are well informed about the social, geographical, historical, and economic conditions of the trekking routes or areas. The organization under Corporate Social Responsibility (CSR) has stepped up with the concept of the local guide. Most of the guides are English speaking. But, to meet your convenience and short out language problems, NTA also provides guides who can speak and communicate with you in your native language.</p><p style=\"box-sizing: border-box; font-size: 18px; padding-top: 0px;\">Our special trek itineraries of Mount Everest Base Camp trekking, Annapurna Sanctuary trekking, Manaslu Circuit Trekking, and Langtang trekking are always being memorable to our customers. Furthermore, the forest of the country also gives you an opportunity for bird watching and jungle safari. Furthermore, NTA offers trekking throughout Nepal, tours covering the historical, geographical, and cultural part of the country, and peak climbing ranging from easy to difficult. We assist with your VISA processing for Tibet and operate tours in Tibet, Mt. Kailash tour, trekking in Tibet, and climbing Everest from part of China.</p><div><br></div></div></div></h2>', 0, 0, '0077662014', '/upload_file/member/1722937823_803169975_signal-2024-01-29-140713.jpeg', '{\"footer_first_title\": \"Et ea dolore qui ali\", \"footer_third_title\": \"Et ea dolore qui ali\", \"footer_fourth_title\": \"Et ea dolore qui ali\", \"footer_second_title\": \"Et ea dolore qui ali\", \"footer_first_description\": \"<p>Et ea dolore qui ali</p>\", \"footer_third_description\": \"<p>Et ea dolore qui ali</p>\", \"footer_fourth_description\": \"<p>Et ea dolore qui ali</p>\", \"footer_second_description\": \"<p>Et ea dolore qui ali</p>\"}', 'company post', '2024-08-05 01:48:32', '2024-08-07 02:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 30, 1, '{\"pan\": {\"image\": \"/upload_file/member/1722928523_2120713776_Screenshot from 2022-11-26 12-12-28.png\", \"pan_no\": \"Laborum quis ut sint\"}, \"company\": {\"register_no\": \"Est laborum expedita\", \"register_file\": \"/upload_file/member/1722928523_40614779_Screenshot from 2022-11-26 12-12-28.png\"}, \"tax_clearance\": \"/upload_file/member/1722928523_1250517014_Screenshot from 2024-07-27 10-02-35.png\"}', '{\"company_logo\": \"/upload_file/member/1722928523_1093665030_Screenshot from 2022-11-26 12-12-28.png\", \"company_name\": \"Carson and Case Inc\", \"company_website\": \"https://www.pufopacosycu.tv\", \"company_founded_year\": \"Wong and Leonard Co\"}', '{\"twiter\": null, \"twitter\": null, \"youtube\": \"https://www.nizevaligy.com.au\", \"facebook\": \"https://www.jin.com\", \"instagram\": \"https://www.rakebal.net\", \"linked_id\": null}', NULL, 0, 0, '0087453912', NULL, NULL, 'Rem laborum Possimu', '2024-08-06 01:30:23', '2024-08-06 02:07:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 31, 2, '{\"pan\": {\"image\": \"/upload_file/member/1723613419_961933707_everest-base-camp-trek-map.jpg\", \"pan_no\": \"Proident ad volupta\"}, \"company\": {\"register_no\": \"Asperiores consequat\", \"register_file\": \"/upload_file/member/1723613419_1906054319_Screenshot from 2024-08-14 06-33-22.png\"}, \"tax_clearance\": \"/upload_file/member/1723613420_444586829_taan-logo (1).jpg\"}', '{\"company_logo\": null, \"company_name\": \"Cardenas and Roth LLC\", \"company_website\": \"https://www.xiloc.cc\", \"company_founded_year\": \"Browning Cox Co\"}', '{\"twitter\": null, \"youtube\": \"https://www.ruvu.org\", \"facebook\": \"https://www.fohydimato.com\", \"instagram\": \"https://www.cycygoqygifaze.us\", \"linked_id\": null}', NULL, 0, 0, '0081858184', NULL, NULL, 'Anim beatae officia', '2024-08-13 23:45:20', '2024-08-13 23:45:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 32, 2, '{\"pan\": {\"image\": \"/upload_file/member/1723633351_915774053_flag.png\", \"pan_no\": \"121212\"}, \"company\": {\"register_no\": null, \"register_file\": \"/upload_file/member/1723633351_1724811134_1722668578_2023241340_Screenshot from 2022-11-26 12-12-28.png\"}, \"tax_clearance\": \"/upload_file/member/1723633351_1361240701_Screenshot from 2024-08-14 06-33-22.png\"}', '{\"company_logo\": \"/upload_file/member/1723633351_448718638_Screenshot from 2024-08-14 06-33-22.png\", \"company_name\": \"Bolton and Acosta Associates\", \"company_website\": \"https://www.cekyzusicocem.co.uk\", \"company_founded_year\": \"Conley and Reed Plc\"}', '{\"twiter\": \"https://www.jaf.ca\", \"twitter\": null, \"youtube\": \"https://www.gydosi.org.uk\", \"facebook\": \"https://www.doxemymavuvepug.org.uk\", \"instagram\": \"https://www.vyde.me.uk\", \"linked_id\": null}', NULL, 0, 0, '0082659575', NULL, NULL, 'In et irure ad error', '2024-08-14 01:21:56', '2024-08-15 01:12:33', NULL, 'Bolton and Acosta Associates', 'https://www.cekyzusicocem.co.uk', 'Conley and Reed Plc', NULL, '121212', '21212234rerer', NULL, NULL),
(20, NULL, 35, 2, '{\"pan\": {\"image\": \"/upload_file/member/1723634898_777777079_1722668578_2023241340_Screenshot from 2022-11-26 12-12-28.png\", \"pan_no\": \"21212\"}, \"company\": {\"register_no\": \"21212\", \"register_file\": \"/upload_file/member/1723634899_1795428454_1722668578_2023241340_Screenshot from 2022-11-26 12-12-28.png\"}, \"tax_clearance\": \"/upload_file/member/1723634899_1978934886_1722668578_2023241340_Screenshot from 2022-11-26 12-12-28.png\"}', '{\"company_logo\": \"/upload_file/member/1723634899_1189736894_download.jpeg\", \"company_name\": \"21212\", \"company_website\": \"http://127.0.0.1:8000/admin/member-list/create\", \"company_founded_year\": \"21212\"}', '{\"twitter\": null, \"youtube\": \"http://127.0.0.1:8000/admin/member-list/create\", \"facebook\": \"http://127.0.0.1:8000/admin/member-list/create\", \"instagram\": \"http://127.0.0.1:8000/admin/member-list/create\", \"linked_id\": null}', NULL, 0, 0, '0080625020', NULL, NULL, '21212', '2024-08-14 05:43:19', '2024-08-14 05:43:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 36, 2, '{\"pan\": {\"image\": \"/upload_file/member/1723636342_464311361_trip-advisor (1).png\", \"pan_no\": \"Aliqua Autem volupt\"}, \"company\": {\"register_no\": \"Quis amet sed proid\", \"register_file\": \"/upload_file/member/1723635564_1097091665_maxresdefault (1).jpg\"}, \"tax_clearance\": \"/upload_file/member/1723635564_993818771_flag.png\"}', '{\"company_logo\": \"/upload_file/member/1723635564_148386141_download.jpeg\", \"company_name\": \"Vasquez Bond Trading\", \"company_website\": \"https://www.jihucoquka.co.uk\", \"company_founded_year\": \"Coffey Burks Traders\"}', '{\"twiter\": null, \"twitter\": null, \"youtube\": \"https://www.kewy.co\", \"facebook\": \"https://www.doj.mobi\", \"instagram\": \"https://www.nocawigyrejelih.co.uk\", \"linked_id\": null}', NULL, 0, 0, '0097700563', NULL, NULL, 'Mollit soluta eum ex', '2024-08-14 05:54:24', '2024-08-14 06:07:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, 40, 1, '{\"pan\": {\"image\": \"/upload_file/member/pan/1723701815_1959577934_download.jpeg\", \"pan_no\": \"1212\"}, \"company\": {\"register_no\": \"Nisi voluptatem saep\", \"register_file\": \"/upload_file/member/register_file/1723701815_264592016_download.jpeg\"}, \"tax_clearance\": \"/upload_file/member/tax_clearance/1723701815_568385783_download (2).jpeg\"}', '{\"company_logo\": \"/upload_file/member/1723701677_574147368_1722668578_2023241340_Screenshot from 2022-11-26 12-12-28.png\", \"company_name\": \"Kirkland Walker Plc\", \"company_website\": \"https://www.taxuqoter.cc\", \"company_founded_year\": \"Simon Wilcox Traders\"}', '{\"twiter\": null, \"twitter\": null, \"youtube\": \"https://www.bytowili.cm\", \"facebook\": \"https://www.mixujywaza.me.uk\", \"instagram\": \"https://www.vorad.net\", \"linked_id\": null}', NULL, 0, 0, '0029591502', NULL, NULL, 'Voluptatem eos sint', '2024-08-15 00:16:18', '2024-08-15 01:10:42', NULL, 'Kirkland Walker Plc', 'https://www.taxuqoter.cc', 'Simon Wilcox Traders', NULL, '1212', 'Nisi voluptatem saep', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Member', 'general-member', 1, NULL, '2024-08-14 02:12:02'),
(2, 'Associate Member', 'associate-member', 1, NULL, '2024-08-13 05:41:32'),
(3, 'Regional Associate Member', 'regional-associate-member', 1, NULL, '2024-08-13 05:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `type`, `order`, `parent_id`, `url`, `parameter`, `target`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'Custom Link', 1, NULL, 'http://localhost/Taan_cms/public/admin/menu/create', NULL, '_self', 1, '2024-08-11 00:46:22', '2024-08-12 06:09:35'),
(2, 'Members', NULL, 'Category', 2, NULL, '/category/', NULL, '_self', 1, '2024-08-11 01:17:58', '2024-08-12 06:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `menus_name`
--

CREATE TABLE `menus_name` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED NOT NULL,
  `lang_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus_name`
--

INSERT INTO `menus_name` (`id`, `menu_id`, `lang_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Home', NULL, NULL),
(2, 1, 2, 'Home', NULL, NULL),
(3, 2, 1, 'Members', NULL, NULL),
(4, 2, 2, 'Members', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(75, '2014_10_12_000000_create_users_table', 1),
(76, '2014_10_12_100000_create_password_resets_table', 1),
(77, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(78, '2019_08_19_000000_create_failed_jobs_table', 1),
(79, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(80, '2022_06_02_110352_create_permission_tables', 1),
(81, '2022_08_10_111341_create_provinces_table', 1),
(82, '2022_08_10_113258_create_districts_table', 1),
(83, '2022_08_11_072916_create_palikas_table', 1),
(84, '2022_08_16_051100_create_settings_table', 1),
(85, '2022_09_08_111850_create_notifications_table', 1),
(86, '2022_10_30_121906_create_categories_table', 1),
(87, '2022_10_31_115047_create_products_table', 1),
(88, '2022_11_02_115645_create_blog_categories_table', 1),
(89, '2022_11_04_070942_create_blogs_table', 1),
(90, '2022_11_17_054358_create_banners_table', 1),
(91, '2022_11_18_072951_create_popups_table', 1),
(92, '2022_12_05_105826_create_files_table', 1),
(93, '2022_12_07_064401_create_clients_table', 1),
(94, '2022_12_07_110616_create_careers_table', 1),
(95, '2022_12_12_163217_create_internships_table', 1),
(96, '2023_02_26_113705_create_testimonials_table', 1),
(97, '2023_02_27_102522_create_galleries_table', 1),
(98, '2023_02_28_121742_create_contacts_table', 1),
(99, '2023_03_08_072629_create_offers_table', 1),
(100, '2023_03_08_102515_create_programs_table', 1),
(101, '2023_03_09_051805_create_counters_table', 1),
(102, '2023_03_12_073524_create_staff_table', 1),
(103, '2023_03_13_063615_create_quiz_practices_table', 1),
(104, '2023_03_13_071025_create_videos_table', 1),
(105, '2023_03_13_075812_create_types_table', 1),
(106, '2023_03_13_080028_create_commons_table', 1),
(107, '2023_03_13_082450_create_deman_courses_table', 1),
(108, '2023_03_13_094644_create_interview_types_table', 1),
(109, '2023_03_13_104403_create_faqs_table', 1),
(110, '2023_03_13_104403_create_interview_questions_table', 1),
(111, '2023_03_13_110819_create_languages_table', 1),
(112, '2024_07_26_093448_create_our_services_table', 2),
(113, '2024_07_26_111628_create_avchivements_table', 3),
(114, '2024_07_26_112352_create_achieve_ments_table', 4),
(115, '2024_07_29_050507_create_achievement_titles_table', 5),
(116, '2024_07_29_104152_create_blog_images_table', 6),
(117, '2024_07_30_104509_create_members_table', 7),
(118, '2024_08_01_065010_create_seasons_table', 8),
(119, '2024_08_01_075119_create_defficults_table', 9),
(120, '2024_08_01_075153_create_culturals_table', 9),
(121, '2024_08_01_075218_create_experiences_table', 9),
(122, '2024_08_01_092610_create_months_table', 10),
(123, '2024_08_01_093535_create_hashtags_table', 11),
(124, '2024_08_01_101509_create_transports_table', 12),
(125, '2024_08_02_054636_create_member_types_table', 13),
(126, '2024_08_02_113940_create_destinations_table', 14),
(127, '2024_08_04_060105_create_testomonials_table', 15),
(128, '2024_08_04_081542_create_subscribe_mails_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'January', 1, NULL, NULL),
(2, 'February', 1, NULL, NULL),
(3, 'March', 1, NULL, NULL),
(4, 'April', 1, NULL, NULL),
(5, 'May', 1, NULL, NULL),
(6, 'June', 1, NULL, NULL),
(7, 'July', 1, NULL, NULL),
(8, 'August', 1, NULL, NULL),
(9, 'September', 1, NULL, NULL),
(10, 'October', 1, NULL, NULL),
(11, 'November', 1, NULL, NULL),
(12, 'December', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `main_description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `title`, `description`, `main_description`, `icon`, `status`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Necessitatibus esse', 'Laboriosam amet nu', NULL, 'fa fa-plane', 1, 1, NULL, '2024-08-11 01:44:12', '2024-08-13 05:18:24'),
(3, 'Molestiae ut repudia', 'Aspernatur dicta eni', NULL, 'fa fa-umbrella', 1, 1, NULL, '2024-08-11 01:48:36', '2024-08-11 01:48:36'),
(4, 'Dolor et irure qui s', 'In qui est impedit', NULL, 'fa fa-tablet', 1, 1, NULL, '2024-08-11 01:49:09', '2024-08-11 01:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `palikas`
--

CREATE TABLE `palikas` (
  `id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `palika_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palika_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `palikas`
--

INSERT INTO `palikas` (`id`, `district_id`, `palika_en`, `palika_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur Municipality', 'भोजपुर नगरपालिका', NULL, NULL),
(2, 1, 'Shadanand Municipality', 'षडानन्द नगरपालिका', NULL, NULL),
(3, 1, 'Tyamke Maiyum', 'ट्याम्केमैयुम गाउँपालिका', NULL, NULL),
(4, 1, 'Arun Rural Municipality', 'अरुण गाउँपालिका', NULL, NULL),
(5, 1, 'Pauwadungma Rural Municipality', 'पौवादुङमा गाउँपालिका', NULL, NULL),
(6, 1, 'Salpasilichho Rural Municipality', 'साल्पासिलिछो गाउँपालिका', NULL, NULL),
(7, 1, 'Hatuwagadhi Rural Municipality', 'हतुवागढी गाउँपालिका', NULL, NULL),
(8, 1, 'Ramprasad Rai Rural Municipality', 'रामप्रसाद राई गाउँपालिका', NULL, NULL),
(9, 2, 'Paakhribas Municipality', 'पाख्रिबास नगरपालिका', NULL, NULL),
(10, 2, 'Dhankuta Municipality', 'धनकुटा नगरपालिका', NULL, NULL),
(11, 2, 'Mahalaxmi Municipality', 'महालक्ष्मी नगरपालिका', NULL, NULL),
(12, 2, 'Sangurigadhi Rural Municipality', 'सागुरीगढी गाउँपालिका', NULL, NULL),
(13, 2, 'Sahidbhumi Rural Municipality', 'सहीदभूमि गाउँपालिका', NULL, NULL),
(14, 2, 'Chhathar Jorpati Rural Municipality', 'छथर जोरपाटी गाउँपालिका', NULL, NULL),
(15, 2, 'Chaubise Rural Municipality', 'चौविसे गाउँपालिका', NULL, NULL),
(16, 3, 'Iilam Municipality', 'ईलाम नगरपालिका', NULL, NULL),
(17, 3, 'Deumaai Municipality', 'देउमाई नगरपालिका', NULL, NULL),
(18, 3, 'Maai Municipality', 'माई नगरपालिका', NULL, NULL),
(19, 3, 'Suryodaya Municipality', 'सूर्योदय नगरपालिका', NULL, NULL),
(20, 3, 'Phakphokthum Rural Municipality', 'फाकफोकथुम गाउँपालिका', NULL, NULL),
(21, 3, 'Mai Jogmai Rural Municipality', 'माईजोगमाई गाउँपालिका', NULL, NULL),
(22, 3, 'Chulachuli Rural Municipality', 'चुलाचुली गाउँपालिका', NULL, NULL),
(23, 3, 'Rong Rural Municipality', 'रोङ गाउँपालिका', NULL, NULL),
(24, 3, 'Mangsebung Rural Municipality', 'माङसेबुङ गाउँपालिका', NULL, NULL),
(25, 3, 'Sandakpur Rural Municipality', 'सन्दकपुर गाउँपालिका', NULL, NULL),
(26, 4, 'Mechinagar Municipality', 'मेचीनगर नगरपालिका', NULL, NULL),
(27, 4, 'Damak Municipality', 'दमक नगरपालिका', NULL, NULL),
(28, 4, 'Kankai Municipality', 'कन्काई नगरपालिका', NULL, NULL),
(29, 4, 'Bhadrapur Municipality', 'भद्रपुर नगरपालिका', NULL, NULL),
(30, 4, 'Arjundhara Municipality', 'अर्जुनधारा नगरपालिका', NULL, NULL),
(31, 4, 'Shivasatakshi Municipality', 'शिवसताक्षी नगरपालिका', NULL, NULL),
(32, 4, 'Gauraadaha Municipality', 'गौरादह नगरपालिका', NULL, NULL),
(33, 4, 'Birtamod Municipality', 'विर्तामोड नगरपालिका', NULL, NULL),
(34, 4, 'Kamal Rural Municipality', 'कमल गाउँपालिका', NULL, NULL),
(35, 4, 'Buddha Shanti Rural Municipality', 'बुद्धशान्ति गाउँपालिका', NULL, NULL),
(36, 4, 'Kachankawal Rural Municipality', 'कचनकवल गाउँपालिका', NULL, NULL),
(37, 4, 'Jhapa Rural Municipality', 'झापा गाउँपालिका', NULL, NULL),
(38, 4, 'Barhadashi Rural Municipality', 'बाह्रदशी गाउँपालिका', NULL, NULL),
(39, 4, 'Gaurigunj Rural Municipality', 'गौरीगंज गाउँपालिका', NULL, NULL),
(40, 4, 'Haldibari Rural Municipality', 'हल्दीवारी गाउँपालिका', NULL, NULL),
(41, 5, 'Biratnagar Sub-Metropolitan', 'विराटनगर उपमहानगरपालिका', NULL, NULL),
(42, 5, 'Belbari Municipality', 'बेलबारी नगरपालिका', NULL, NULL),
(43, 5, 'Letang Municipality', 'लेटांग नगरपालिका', NULL, NULL),
(44, 5, 'Pathari Sanischari Municipality', 'पथरी शनिश्चरे नगरपालिका', NULL, NULL),
(45, 5, 'Rangeli Municipality', 'रंगेली नगरपालिका', NULL, NULL),
(46, 5, 'Ratuwamaai Municipality', 'रतुवामाई नगरपालिका', NULL, NULL),
(47, 5, 'Sunwarsi Municipality', 'सुनवर्षी नगरपालिका', NULL, NULL),
(48, 5, 'Urlabari Municipality', 'उर्लाबारी नगरपालिका', NULL, NULL),
(49, 5, 'Sundarharaicha Municipality', 'सुन्दरहरैचा नगरपालिका', NULL, NULL),
(50, 5, 'Jahada Rural Municipality', 'जहदा गाउँपालिका', NULL, NULL),
(51, 5, 'Budi Ganga Rural Municipality', 'बुढीगंगा गाउँपालिका', NULL, NULL),
(52, 5, 'Katahari Rural Municipality', 'कटहरी गाउँपालिका', NULL, NULL),
(53, 5, 'Dhanpalthan Rural Municipality', 'धनपालथान गाउँपालिका', NULL, NULL),
(54, 5, 'Kanepokhari Rural Municipality', 'कानेपोखरी गाउँपालिका', NULL, NULL),
(55, 5, 'Gramthan Rural Municipality', 'ग्रामथान गाउँपालिका', NULL, NULL),
(56, 5, 'Kerabari Rural Municipality', 'केरावारी गाउँपालिका', NULL, NULL),
(57, 5, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', NULL, NULL),
(58, 6, 'Halesituwanchung Municipality', 'हलेसीतुवांचुंग नगरपालिका', NULL, NULL),
(59, 6, 'Rupakot Majhuwagadhi Municipality', 'रुपाकोट मझुवागढ़ी नगरपालिका', NULL, NULL),
(60, 6, 'Khotehang Rural Municipality', 'खोटेहाङ गाउँपालिका', NULL, NULL),
(61, 6, 'Diprung Rural Municipality', 'दिप्रुङ गाउँपालिका', NULL, NULL),
(62, 6, 'Aiselukharka Rural Municipality', 'ऐसेलुखर्क गाउँपालिका', NULL, NULL),
(63, 6, 'Jantedhunga Rural Municipality', 'जन्तेढुंगा गाउँपालिका', NULL, NULL),
(64, 6, 'Kepilasgadhi Rural Municipality', 'केपिलासगढी गाउँपालिका', NULL, NULL),
(65, 6, 'Barahpokhari Rural Municipality', 'बराहपोखरी गाउँपालिका', NULL, NULL),
(66, 6, 'Lamidanda Rural Municipality', 'लामीडाँडा गाउँपालिका', NULL, NULL),
(67, 6, 'Sakela Rural Municipality', 'साकेला गाउँपालिका', NULL, NULL),
(68, 7, 'Siddhicharan Municipality', 'सिद्दिचरण नगरपालिका', NULL, NULL),
(69, 7, 'Manebhanjyang Rural Municipality', 'मानेभञ्ज्याङ गाउँपालिका', NULL, NULL),
(70, 7, 'Champadevi Rural Municipality', 'चम्पादेवी गाउँपालिका', NULL, NULL),
(71, 7, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', NULL, NULL),
(72, 7, 'Molung Rural Municipality', 'मोलुङ गाउँपालिका', NULL, NULL),
(73, 7, 'Chisankhugadhi Rural Municipality', 'चिसंखुगढी गाउँपालिका', NULL, NULL),
(74, 7, 'Khiji Demba Rural Municipality', 'खिजिदेम्बा गाउँपालिका', NULL, NULL),
(75, 7, 'Likhu Rural Municipality', 'लिखु गाउँपालिका', NULL, NULL),
(76, 8, 'Fidim Municipality', 'फिदिम नगरपालिका', NULL, NULL),
(77, 8, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', NULL, NULL),
(78, 8, 'Phalgunanda Rural Municipality', 'फाल्गुनन्द गाउँपालिका', NULL, NULL),
(79, 8, 'Hilihang Rural Municipality', 'हिलिहाङ गाउँपालिका', NULL, NULL),
(80, 8, 'Phalelung Rural Municipality', 'फालेलुङ गाउँपालिका', NULL, NULL),
(81, 8, 'Yangwarak Rural Municipality', 'याङवरक गाउँपालिका', NULL, NULL),
(82, 8, 'Kummayak Rural Municipality', 'कुम्मायक गाउँपालिका', NULL, NULL),
(83, 8, 'Tumbewa Rural Municipality', 'तुम्बेवा गाउँपालिका', NULL, NULL),
(84, 9, 'Chainpur Municipality', 'चैनपुर नगरपालिका', NULL, NULL),
(85, 9, 'Khandwari Municipality', 'धर्मदेवी नगरपालिका', NULL, NULL),
(86, 9, 'Dharmadevi Municipality', 'खांदवारी नगरपालिका', NULL, NULL),
(87, 9, 'Maadi Municipality', 'मादी नगरपालिका', NULL, NULL),
(88, 9, 'Panchkhapan Municipality', 'पाँचखपन नगरपालिका', NULL, NULL),
(89, 9, 'Makalu Rural Municipality', 'मकालु गाउँपालिका', NULL, NULL),
(90, 9, 'Silichong Rural Municipality', 'सिलीचोङ गाउँपालिका', NULL, NULL),
(91, 9, 'Sabhapokhari Rural Municipality', 'सभापोखरी गाउँपालिका', NULL, NULL),
(92, 9, 'Chichila Rural Municipality', 'चिचिला गाउँपालिका', NULL, NULL),
(93, 9, 'Bhot Khola Rural Municipality', 'भोटखोला गाउँपालिका', NULL, NULL),
(94, 10, 'Solukhumbu', 'सोलुदुधकुण्ड नगरपालिका', NULL, NULL),
(95, 10, 'Dudhakaushika Rural Municipality', 'दुधकौशिका गाउँपालिका', NULL, NULL),
(96, 10, 'Necha Salyan Rural Municipality', 'नेचासल्यान गाउँपालिका', NULL, NULL),
(97, 10, 'Dudhkoshi Rural Municipality', 'दुधकोशी गाउँपालिका', NULL, NULL),
(98, 10, 'Maha Kulung Rural Municipality', 'महाकुलुङ गाउँपालिका', NULL, NULL),
(99, 10, 'Sotang Rural Municipality', 'सोताङ गाउँपालिका', NULL, NULL),
(100, 10, 'Khumbu Pasang Lhamu Rural Municipality', 'खुम्बु पासाङल्हमु गाउँपालिका', NULL, NULL),
(101, 10, 'Likhu Pike Rural Municipality', 'लिखुपिके गाउँपालिका', NULL, NULL),
(102, 11, 'Sunsari', '', NULL, NULL),
(103, 12, 'Taplejung', '', NULL, NULL),
(104, 1, 'Tehrathum', '', NULL, NULL),
(105, 13, 'Udayapur', '', NULL, NULL),
(106, 14, 'Bara', '', NULL, NULL),
(107, 15, 'Dhanusa', '', NULL, NULL),
(108, 16, 'Mahottari', '', NULL, NULL),
(109, 17, 'Parsa', '', NULL, NULL),
(110, 18, 'Rautahat', '', NULL, NULL),
(111, 19, 'Saptari', '', NULL, NULL),
(112, 20, 'Sarlahi', '', NULL, NULL),
(113, 21, 'Siraha', '', NULL, NULL),
(114, 22, 'Bhaktapur', '', NULL, NULL),
(115, 23, 'Chitwan', '', NULL, NULL),
(116, 24, 'Dhading', '', NULL, NULL),
(117, 25, 'Dolakha', '', NULL, NULL),
(118, 26, 'Kavrepalanchok', '', NULL, NULL),
(119, 27, 'Kathmandu', '', NULL, NULL),
(120, 28, 'Lalitpur', '', NULL, NULL),
(121, 29, 'Makwanpur', '', NULL, NULL),
(122, 30, 'Nuwakot', '', NULL, NULL),
(123, 31, 'Ramechhap', '', NULL, NULL),
(124, 32, 'Rasuwa', '', NULL, NULL),
(125, 33, 'Sindhuli', '', NULL, NULL),
(126, 34, 'Sindhupalchowk', '', NULL, NULL),
(127, 35, 'Baglung', '', NULL, NULL),
(128, 36, 'Gorkha', '', NULL, NULL),
(129, 37, 'Kaski', '', NULL, NULL),
(130, 38, 'Lamjung', '', NULL, NULL),
(131, 39, 'Manang', '', NULL, NULL),
(132, 40, 'Mustang', '', NULL, NULL),
(133, 41, 'Myagdi', '', NULL, NULL),
(134, 42, 'Nawalparasi', '', NULL, NULL),
(135, 43, 'Parbat', '', NULL, NULL),
(136, 44, 'Syangja', '', NULL, NULL),
(137, 45, 'Tanahun', '', NULL, NULL),
(138, 46, 'Arghakhanchi', '', NULL, NULL),
(139, 47, 'Banke', '', NULL, NULL),
(140, 48, 'Bardiya', '', NULL, NULL),
(141, 49, 'Dang', NULL, NULL, NULL),
(142, 50, 'Gulmi', '', NULL, NULL),
(143, 51, 'Kapilvastu', '', NULL, NULL),
(144, 52, 'Nawalparasi (West)', '', NULL, NULL),
(145, 53, 'Palpa', '', NULL, NULL),
(146, 54, 'Pyuthan', '', NULL, NULL),
(147, 5, 'Rolpa', '', NULL, NULL),
(148, 56, 'Rukum (East)', '', NULL, NULL),
(149, 57, 'Rupandehi', '', NULL, NULL),
(150, 58, 'Dailekh', '', NULL, NULL),
(151, 59, 'Dolpa', '', NULL, NULL),
(152, 60, 'Humla', '', NULL, NULL),
(153, 61, 'Jajarkot', '', NULL, NULL),
(154, 62, 'Jumla', '', NULL, NULL),
(155, 63, 'Kalikot', '', NULL, NULL),
(156, 64, 'Mugu', '', NULL, NULL),
(157, 65, 'Rukum (West)', '', NULL, NULL),
(158, 67, 'Salyan', '', NULL, NULL),
(159, 68, 'Surkhet', '', NULL, NULL),
(160, 69, 'Acham', '', NULL, NULL),
(161, 70, 'Baitadi', '', NULL, NULL),
(162, 71, 'Bajhan', '', NULL, NULL),
(163, 72, 'Bajura', '', NULL, NULL),
(164, 73, 'Dadeldhura', '', NULL, NULL),
(165, 74, 'Darcula', '', NULL, NULL),
(166, 75, 'Doti', '', NULL, NULL),
(167, 76, 'Kailali', '', NULL, NULL),
(168, 77, 'Kanchanpur', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(2, 'role-create', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(3, 'role-edit', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(4, 'role-delete', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(5, 'product-list', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(6, 'product-create', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(7, 'product-edit', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46'),
(8, 'product-delete', 'web', NULL, '2024-07-26 04:27:46', '2024-07-26 04:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popups`
--

CREATE TABLE `popups` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `visit_no` int UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `province_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_en`, `province_np`, `created_at`, `updated_at`) VALUES
(1, 'Province No. 1', NULL, NULL, NULL),
(2, 'Province No. 2', NULL, NULL, NULL),
(3, 'Bagmati Pradesh', NULL, NULL, NULL),
(4, 'Gandaki Pradesh', NULL, NULL, NULL),
(5, 'Province No. 5', NULL, NULL, NULL),
(6, 'Karnali Pradesh', NULL, NULL, NULL),
(7, 'Sudurpashchim Pradesh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_practices`
--

CREATE TABLE `quiz_practices` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_explain` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-07-26 04:27:46', '2024-07-26 04:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jolene Simpson update', 0, NULL, '2024-08-14 02:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_first_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_second_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `member_notice_mail` text COLLATE utf8mb4_unicode_ci,
  `nepal_office_contact_one` text COLLATE utf8mb4_unicode_ci,
  `nepal_office_contact_two` text COLLATE utf8mb4_unicode_ci,
  `india_office_contact_one` text COLLATE utf8mb4_unicode_ci,
  `india_office_contact_two` text COLLATE utf8mb4_unicode_ci,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_notice_mail_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_counters` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_phone`, `site_mobile`, `site_fax`, `site_first_address`, `site_second_address`, `site_description`, `map`, `member_notice_mail`, `nepal_office_contact_one`, `nepal_office_contact_two`, `india_office_contact_one`, `india_office_contact_two`, `site_url`, `logo`, `member_notice_mail_subject`, `favicon`, `social_profile_fb`, `social_profile_twitter`, `social_profile_insta`, `social_profile_youtube`, `social_profile_linkedin`, `member_counters`, `created_at`, `updated_at`) VALUES
(1, 'PECMS.', 'thaman@softechfoundation.com', '9742867915', '9814618803', NULL, 'Kathmandu', 'Mid Baneshor KTM', 'Prabidhi Enterprises Content Management System', NULL, 'ewewew', NULL, NULL, NULL, NULL, 'http://127.0.0.1:8000/', 'upload_file/setting/1723357812_1115545084_Screenshot from 2024-08-09 13-07-48.png', 'ewewee', NULL, 'https://www.xojyve.co.uk', 'https://www.myd.ws', 'https://www.donakuzypo.ca', 'https://www.zolucilybywyj.tv', 'https://www.zohepunyvepawy.net', '22', NULL, '2024-08-14 04:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint UNSIGNED NOT NULL,
  `country_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `social_profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_mails`
--

CREATE TABLE `subscribe_mails` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe_mails`
--

INSERT INTO `subscribe_mails` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2024-08-04 03:35:38', '2024-08-04 03:35:38'),
(2, 'huzuba@mailinator.com', 1, '2024-08-04 03:36:50', '2024-08-04 03:36:50'),
(3, 'mangaletamang@gmail.com', 1, '2024-08-14 00:13:42', '2024-08-14 00:13:42'),
(4, 'gabyw@mailinator.com', 1, '2024-08-14 00:25:38', '2024-08-14 00:25:38'),
(5, 'syxenajozy@mailinator.com', 1, '2024-08-14 00:28:48', '2024-08-14 00:28:48'),
(6, 'gojile@mailinator.com', 1, '2024-08-14 00:34:47', '2024-08-14 00:34:47'),
(7, 'mangaletamang65@gmail.com', 1, '2024-08-14 00:38:40', '2024-08-14 00:38:40'),
(8, 'liqoteveq@mailinator.com', 1, '2024-08-14 00:39:07', '2024-08-14 00:39:07'),
(9, 'bakoc@mailinator.com', 1, '2024-08-14 00:39:27', '2024-08-14 00:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testomonials`
--

CREATE TABLE `testomonials` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Voluptatem perspicia update', 0, NULL, '2024-08-14 02:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint UNSIGNED NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('superadmin','admin','user','member') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_member` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `status`, `is_verified`, `is_member`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '98146188011', '/upload_file/profile/1723613276_1645835230_taan-logo (1).jpg', '2024-07-26 04:27:46', '$2y$10$GDmLVflXnF2aX4ZyrB6ZTOvocnCMmfbv/y3MPbmRcgY025oxpo4/O', NULL, NULL, NULL, 'admin', 'active', 1, 0, NULL, '2024-07-26 04:27:46', '2024-08-13 23:42:56'),
(5, 'Marshall Estes', 'lipaqiv@mailinator.com', '59', NULL, NULL, '$2y$10$TwWcsPan2zBQg7clrpZ/m.AqkXHbv5b8/Bes0k/ygKMxtJOlPVfGK', NULL, NULL, NULL, 'admin', 'active', 1, 0, NULL, '2024-07-30 23:04:32', '2024-07-31 05:58:26'),
(8, 'Brock Hodges', 'qupul@mailinator.com', '87', NULL, NULL, '$2y$10$QriPWOm.yLArZRcHq6XPD.z/GCJolAOPYm5q5u.veEKrk9tPDcODa', NULL, NULL, NULL, 'admin', 'active', 1, 0, NULL, '2024-07-30 23:26:32', '2024-07-31 01:04:22'),
(10, 'Flavia Kelley', 'gohujez@mailinator.com', '41', NULL, NULL, '$2y$10$aixTL/iMCj2yUWLlhUDyeueJydBrh6w4of15s8Gqv8f154FfVLhDS', NULL, NULL, NULL, 'admin', 'active', 1, 0, NULL, '2024-07-31 01:14:56', '2024-07-31 01:18:42'),
(13, 'Angela Hurst', 'vaboty@mailinator.com', '73', NULL, NULL, '$2y$10$xHxWfvg32affMWDF7RkFuuqNXq3DfL1lCMVuPaDpFRyWVzRLxsG4i', NULL, NULL, NULL, 'admin', 'active', 1, 0, NULL, '2024-08-02 00:39:23', '2024-08-02 05:45:47'),
(22, 'Aubrey House', 'geqavoq@mailinator.com', '62', NULL, NULL, '$2y$10$PBuoD5rBc7Ts/VtpxU441.6XDBrHPfQ7SFaJkOQX78wFtC0zPzjqy', NULL, NULL, NULL, 'user', 'active', 1, 0, NULL, '2024-08-02 01:46:29', '2024-08-02 05:45:51'),
(24, 'Cameron Scott', 'suxag@mailinator.com', '+1 (861) 636-4611', NULL, NULL, '$2y$10$X79HL07buGSPeD.j9g1gxebOk8vsPfqPq5Shnl1hnDOIJ9M.UbX/C', NULL, NULL, NULL, 'user', 'active', 0, 0, NULL, '2024-08-02 04:28:52', '2024-08-02 04:57:01'),
(27, 'Idola Castillo', 'quryv@mailinator.com', '+1 (197) 784-6397', '/upload_file/member/1722833730_1993006216_Screenshot from 2024-07-27 10-02-35.png', NULL, '$2y$10$ikS8zrNAHChuu39brFW2neBmWcnmxcndfaTmTcal4jsJGzIpa6E2W', NULL, NULL, NULL, 'admin', '', 0, 0, NULL, '2024-08-04 06:26:14', '2024-08-05 02:26:02'),
(28, 'Georgia Daugherty', 'nuzudeneqi@mailinator.com', '1', '/upload_file/member/1722843211_1004801886_signal-2024-01-29-140713.jpeg', NULL, '$2y$10$SGx/P5BchbgdPsqPTIl5/eswLKLrVBUeCC99XpXPF.rpTy.Au3asm', NULL, NULL, NULL, 'admin', '', 0, 0, NULL, '2024-08-05 01:48:31', '2024-08-05 04:07:46'),
(30, 'Macy Fuentes update test', 'zupocosu@mailinator.com', '36', '/upload_file/member/1722928523_1278872774_Screenshot from 2024-07-27 10-02-35.png', NULL, '$2y$10$K9k1P48r4V/wsIiwrL9qleG.1AGc7Pvv5LhMOaiuNqxE4KsZ02YAu', NULL, NULL, NULL, 'admin', 'active', 0, 0, NULL, '2024-08-06 01:30:23', '2024-08-06 01:58:25'),
(31, 'Britanni Cantrell', 'sygakefujo@mailinator.com', '32', '/upload_file/member/1723613420_1047339601_Screenshot from 2024-08-14 06-33-22.png', NULL, '$2y$10$ppEfc6HkOXxPYfQrBrVZI.5E88LOCtMg9VL8mSfhiMxoI8fjz5RHC', NULL, NULL, NULL, 'admin', 'active', 1, 1, NULL, '2024-08-13 23:45:20', '2024-08-13 23:45:34'),
(32, 'James Barry', 'xegid@mailinator.com', '+1 (926) 644-8646', NULL, NULL, '$2y$10$Gks8jfd6CH23MezHd5K91uf57I3kIltoQ96H6nGpUOmhuWmyTRVde', NULL, NULL, NULL, 'user', 'active', 0, 1, NULL, '2024-08-14 01:21:56', '2024-08-14 05:17:31'),
(33, 'Lareina Boyd', 'fygyh@mailinator.com', '42', '/upload_file/member/1723619939_1798857868_Screenshot from 2024-08-14 06-33-22.png', NULL, '$2y$10$mBS34NkDK7KOSiwEOyXd..I1qOHLBfe6NbsUTCfJKlqZLMPYj7VjC', NULL, NULL, NULL, 'user', 'active', 0, 0, NULL, '2024-08-14 01:33:59', '2024-08-14 01:33:59'),
(34, 'Emi White', 'hesupoduv@mailinator.com', '92', '/upload_file/member/1723619958_696037375_flag.png', NULL, '$2y$10$HDjrDae4Yd9ZfFeK5ESEOuxXGRb7KldWIApIx6oMbwj.WOl0RCIfi', NULL, NULL, NULL, 'user', 'active', 1, 0, NULL, '2024-08-14 01:34:18', '2024-08-14 04:10:45'),
(35, 'Mangal Tamang', 'superadewewewmin@gmail.com', '3212', NULL, NULL, '$2y$10$ACATRED8RoirWNhBt18mKuWKVcjpQ0dfhMwtWYfhiz8vI5FSwvnDm', NULL, NULL, NULL, 'user', 'active', 1, 1, NULL, '2024-08-14 05:43:19', '2024-08-14 05:44:26'),
(36, 'Ori French', 'doxuse@mailinator.com', '70', '/upload_file/member/1723635775_1108155836_flag.png', NULL, '$2y$10$WNANDYaWXVhzC1cdk96AcOxpCNcIqnDieDNCaS/MpXX9OrPvXScfS', NULL, NULL, NULL, 'user', 'active', 0, 1, NULL, '2024-08-14 05:54:24', '2024-08-14 05:57:55'),
(40, 'Alec Espinoza', 'lizezy@mailinator.com', '67', '/upload_file/member/1723701677_833363090_maxresdefault (1).jpg', NULL, '$2y$10$83DH3pdOFQtyMU5kotbI2eSh4oNXWQqrUxGaZtlz1XL0CbbJIteDe', NULL, NULL, NULL, 'user', 'active', 0, 1, NULL, '2024-08-15 00:16:18', '2024-08-15 00:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `video_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_unique_id`, `video_title`, `video_url`, `video_id`, `video_thumbnail`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Iure sed temporibus', 'https://www.youtube.com/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1', 'AQwHGbX80tI', '/upload_file/videos/1723546584_2068706854_download (1).jpeg', 1, NULL, '2024-08-03 01:17:58', '2024-08-13 05:11:24'),
(2, NULL, 'Voluptatem officia e', 'https://www.youtube.com/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1', 'AQwHGbX80tI', '/upload_file/videos/1723546573_1503612076_flag.png', 1, NULL, '2024-08-03 01:33:42', '2024-08-13 05:11:13'),
(3, NULL, 'Sed dolore ex earum', 'https://www.youtube.com/watch?v=AQwHGbX80tI&list=RDAQwHGbX80tI&start_radio=1', 'AQwHGbX80tI', '/upload_file/videos/1723546557_1612724804_download (1).jpeg', 0, NULL, '2024-08-07 05:26:52', '2024-08-13 05:10:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement_titles`
--
ALTER TABLE `achievement_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achieve_ments`
--
ALTER TABLE `achieve_ments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avchivements`
--
ALTER TABLE `avchivements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `season_id` (`season_id`),
  ADD KEY `month_id` (`month_id`),
  ADD KEY `culture_id` (`culture_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `experience_id` (`experience_id`),
  ADD KEY `difficult_id` (`difficult_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_images_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commons`
--
ALTER TABLE `commons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `culturals`
--
ALTER TABLE `culturals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defficults`
--
ALTER TABLE `defficults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deman_courses`
--
ALTER TABLE `deman_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_questions`
--
ALTER TABLE `interview_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interview_questions_slug_unique` (`slug`),
  ADD KEY `interview_questions_category_id_foreign` (`category_id`);

--
-- Indexes for table `interview_types`
--
ALTER TABLE `interview_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interview_types_slug_unique` (`slug`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `member_type_id` (`member_type_id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menus_name`
--
ALTER TABLE `menus_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_name_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palikas`
--
ALTER TABLE `palikas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `palikas_district_id_foreign` (`district_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_practices`
--
ALTER TABLE `quiz_practices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_mails`
--
ALTER TABLE `subscribe_mails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribe_mails_email_unique` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testomonials`
--
ALTER TABLE `testomonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement_titles`
--
ALTER TABLE `achievement_titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `achieve_ments`
--
ALTER TABLE `achieve_ments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `avchivements`
--
ALTER TABLE `avchivements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commons`
--
ALTER TABLE `commons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `culturals`
--
ALTER TABLE `culturals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `defficults`
--
ALTER TABLE `defficults`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deman_courses`
--
ALTER TABLE `deman_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_questions`
--
ALTER TABLE `interview_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_types`
--
ALTER TABLE `interview_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus_name`
--
ALTER TABLE `menus_name`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `palikas`
--
ALTER TABLE `palikas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_practices`
--
ALTER TABLE `quiz_practices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe_mails`
--
ALTER TABLE `subscribe_mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testomonials`
--
ALTER TABLE `testomonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_3` FOREIGN KEY (`culture_id`) REFERENCES `culturals` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_4` FOREIGN KEY (`transport_id`) REFERENCES `transports` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_5` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_6` FOREIGN KEY (`difficult_id`) REFERENCES `defficults` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_ibfk_7` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interview_questions`
--
ALTER TABLE `interview_questions`
  ADD CONSTRAINT `interview_questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `interview_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`member_type_id`) REFERENCES `member_types` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus_name`
--
ALTER TABLE `menus_name`
  ADD CONSTRAINT `menus_name_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `palikas`
--
ALTER TABLE `palikas`
  ADD CONSTRAINT `palikas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
