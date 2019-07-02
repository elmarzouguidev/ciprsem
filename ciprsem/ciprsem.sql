-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Septembre 2017 à 15:03
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ciprsem`
--

-- --------------------------------------------------------

--
-- Structure de la table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `about_ar` text COLLATE utf8mb4_unicode_ci,
  `about_fr` text COLLATE utf8mb4_unicode_ci,
  `about_en` text COLLATE utf8mb4_unicode_ci,
  `about_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` text COLLATE utf8mb4_unicode_ci,
  `body_fr` text COLLATE utf8mb4_unicode_ci,
  `body_en` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci,
  `translated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `profile_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `active`, `profile_id`, `remember_token`, `created_at`, `updated_at`, `phone`, `avatar`, `created_by`, `confirmation_token`, `job`, `is_admin`) VALUES
(1, 'Elmarzougui Abdelghafour', 'goldvision93@gmail.com', '$2y$10$0e85pcruGFHzEd88xn0PQusLvRKRHnb9NoB4SZQezTrv93CoQmds6', 1, 1, 'osGUjWFcZbMWH4GjxieTkMV0IGaCD2L4wo3mumP32ofweIjvCNZ81EWHF4Ui', '2017-07-29 22:15:57', '2017-08-09 19:01:43', NULL, '1501604905_2017-08-01_avatar_admin_Elmarzougui Abdelghafour.jpg', NULL, NULL, 'Programmer', 0),
(5, 'Elmarzougui Abdo', 'goldvision106@hotmail.fr', '$2y$10$2O4Lq9EkQ4vy7y0iZk7kdulaoY2BEsej55p6bJ.dSn2bLSze2ZHr.', 1, NULL, 'TFK5ak4XQFP782gNOH61Pp3WbdXJPBp9K09pcEHAovt9OfEDkWbzZTRjUS0R', '2017-08-12 14:51:51', '2017-08-12 14:51:51', NULL, NULL, 'Elmarzougui Abdelghafour', '15687fbbd0aa84585baf8a0620200216', NULL, 0),
(6, 'El Abdo', 'goldvision106@hotmail.com', '$2y$10$R5gTzmVulOS0qyHLq1eam.vbsjHLkngoIgvOB4rcIEydcWi4arcjC', 1, NULL, '4UxsH3qzs9vPuDwCKHytpIGOUTSuV8U2bWYefKBg0BjTvTn3MERKnMSjYuXR', '2017-08-12 15:38:36', '2017-08-12 15:38:36', NULL, NULL, 'Elmarzougui Abdo', '5ecb279527b531eb3817869ed2214261', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` text COLLATE utf8mb4_unicode_ci,
  `body_fr` text COLLATE utf8mb4_unicode_ci,
  `body_en` text COLLATE utf8mb4_unicode_ci,
  `pic` text COLLATE utf8mb4_unicode_ci,
  `translated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `category_id` int(11) DEFAULT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title_ar`, `title_fr`, `title_en`, `slug`, `body_ar`, `body_fr`, `body_en`, `pic`, `translated`, `user_id`, `admin_id`, `user_name`, `active`, `created_at`, `updated_at`, `user_type`, `category_id`, `view_counter`) VALUES
(1, 'منتدى دولة تونس الشقيقة منتدى دولة تونس الشقيقة', 'l\'etat du tunes', 'Tunes company Tunes company', 'l-etat-du-tunes', '<p>منتدى دولة تونس الشقيقة</p>\r\n<p>منتدى دولة تونس الشقيقة</p>', '<p>l\'etat du tunes l\'etat du tunes</p>\r\n<p>l\'etat du tunes l\'etat du tunes</p>', '<p>Tunes company Tunes company</p>\r\n<p>Tunes company Tunes company</p>', '1501857328_ciprsem_article_Elmarzougui Abdelghafour.jpg', 'to_ar', NULL, 2, 'Abdelghafour', 1, '2017-07-20 12:15:41', '2017-09-06 08:41:30', 'admin', NULL, 26),
(5, 'من فوائد التمر', 'La dat La dat', 'the dat the dat', 'la-dat-la-dat', '<p>من فوائد التمر من فوائد التمر</p>\r\n<p>من فوائد التمر من فوائد التمر</p>', '<p>La dat La dat </p>\r\n<p>La dat La dat</p>\r\n<p>La dat La dat</p>', '<p>the dat the dat</p>\r\n<p>the dat the dat</p>', '1500570043_Admin_article_Abdelghafour.png', 'to_ar', NULL, 2, 'Abdelghafour', 1, '2017-07-20 17:00:44', '2017-09-06 08:48:38', 'admin', NULL, 23),
(3, 'مبتكر لغة الجافاسكربت', 'le createure du javascript', 'The creator of javascript', 'le-createure-du-javascript', '<p><strong>مبتكر لغة الجافاسكربت مبتكر لغة الجافاسكربت</strong></p>\r\n<p><strong>مبتكر لغة الجافاسكربت</strong></p>\r\n<p><strong>&nbsp;</strong></p>', '<p>le createure du javascript</p>\r\n<p>le createure du javascript</p>', '<p>The creator of javascript</p>\r\n<p>The creator of javascript</p>', '1500557351_Admin_article_Abdelghafour.png', 'to_ar', NULL, 2, 'Abdelghafour', 1, '2017-07-20 13:29:12', '2017-09-24 14:47:28', 'admin', NULL, 29),
(6, 'الحمد لله الحمد لله الحمد لله', NULL, NULL, NULL, '<p>الحمد لله الحمد لله الحمد لله</p>\r\n<p>الحمد لله الحمد لله الحمد لله</p>', NULL, NULL, '1501717745_Admin_article_Elmarzougui Abdelghafour.jpg', 'to_ar', NULL, 1, 'Elmarzougui Abdelghafour', 0, '2017-08-02 23:49:06', '2017-08-02 23:49:06', 'admin', NULL, 0),
(7, 'الحمد لله الحمد لله الحمد لله', NULL, NULL, NULL, '<p>الحمد لله الحمد لله الحمد لله</p>', NULL, NULL, '1501717856_Admin_article_Elmarzougui Abdelghafour.jpg', 'to_ar', NULL, 1, 'Elmarzougui Abdelghafour', 0, '2017-08-02 23:50:56', '2017-08-02 23:50:56', 'admin', NULL, 0),
(8, 'الحمد لله الحمد لله الحمد لله', NULL, NULL, NULL, '<p>الحمد لله الحمد لله الحمد لله الحمد لله الحمد لله الحمد لله</p>\r\n<p>الحمد لله الحمد لله الحمد لله الحمد لله الحمد لله الحمد لله</p>', NULL, NULL, '1501770531_ciprsem_article_Elmarzougui Abdelghafour.jpg', 'to_ar', NULL, 1, 'Elmarzougui Abdelghafour', 0, '2017-08-03 14:28:51', '2017-08-03 14:28:51', 'admin', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_of` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `category_of`) VALUES
(1, 'skoura', NULL, NULL, NULL),
(2, 'ouarzazate', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_05_15_224342_create_roles_table', 1),
(2, '2017_05_15_224732_create_admin_role_table', 1),
(3, '2017_05_20_105723_create_abouts_table', 2),
(4, '2017_04_27_205047_create_comments_table', 3),
(5, '2017_07_21_140231_create_settings_table', 3),
(6, '2017_07_23_150931_add_col_admin_id_to_profiles', 4),
(7, '2017_07_25_150630_add_col_active_to_admins', 5),
(8, '2017_08_11_114836_add_col_is_admin_to_admins', 6),
(10, '2017_08_12_143935_add_col_private-to_roles', 7),
(11, '2017_08_13_232418_add_col_counter_to_roles', 8);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('goldvision106@hotmail.fr', '$2y$10$qvUEyuOYUkGx47/sxvwHnuyfC9jUPlSqfAx2U2LF.2QvTC1/Q7b86', '2017-07-29 18:17:08'),
('goldvision93@gmail.com', '$2y$10$./srpc4N71fWkbV0b5kIBuBGY9am56w.ACND/197IKcwRM3GVs0wG', '2017-08-04 01:00:31');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `title`, `linke`, `desc`, `photo`, `category_id`, `category_name`, `user_id`, `admin_id`, `user_name`, `created_at`, `updated_at`, `user_type`) VALUES
(10, 'الطبيعة', NULL, NULL, '1494950852.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 16:07:32', '2017-05-16 16:07:32', 'admin'),
(4, 'Fint', NULL, NULL, '1494946040.img_admin_Abdelghafour.jpg', 2, 'ouarzazate', NULL, 2, 'Abdelghafour', '2017-05-16 14:47:20', '2017-05-16 14:47:20', 'admin'),
(5, 'Fint 2', NULL, NULL, '1494946070.img_admin_Abdelghafour.jpg', 2, 'ouarzazate', NULL, 2, 'Abdelghafour', '2017-05-16 14:47:50', '2017-05-16 14:47:50', 'admin'),
(6, 'amridil', NULL, NULL, '1494946086.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 14:48:07', '2017-05-16 14:48:07', 'admin'),
(7, 'ouarzazate', NULL, NULL, '1494946125.img_admin_Abdelghafour.jpg', 2, 'ouarzazate', NULL, 2, 'Abdelghafour', '2017-05-16 14:48:45', '2017-05-16 14:48:45', 'admin'),
(8, 'ddddddd', NULL, NULL, '1494947274.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 15:07:54', '2017-05-16 15:07:54', 'admin'),
(9, 'الساقية', NULL, NULL, '1494947514.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 15:11:54', '2017-05-16 15:11:54', 'admin'),
(11, 'الصناعة التقليدية', NULL, NULL, '1494950909.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 16:08:29', '2017-05-16 16:08:29', 'admin'),
(12, 'الطبيعة', NULL, NULL, '1494950964.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 16:09:24', '2017-05-16 16:09:24', 'admin'),
(13, 'الطبيعة', NULL, NULL, '1494951002.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 16:10:02', '2017-05-16 16:10:02', 'admin'),
(14, 'الطبيعة', NULL, NULL, '1494951059.img_admin_Abdelghafour.jpg', 1, 'skoura', NULL, 2, 'Abdelghafour', '2017-05-16 16:10:59', '2017-05-16 16:10:59', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_n` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_fr` text COLLATE utf8mb4_unicode_ci,
  `about_en` text COLLATE utf8mb4_unicode_ci,
  `about_ar` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `number_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `profiles`
--

INSERT INTO `profiles` (`id`, `fullname`, `fullname_ar`, `date_n`, `about_fr`, `about_en`, `about_ar`, `facebook`, `gmail`, `photo`, `background`, `user_id`, `admin_id`, `user_name`, `active`, `created_at`, `updated_at`, `user_type`, `number_phone`, `address`) VALUES
(1, 'Elmarzougui Abdelghafour', NULL, '05-06-1993', 'Elmarzougui Abdelghafour  Programmer and Full stack  and hacker im trying to be a Responsable in google', NULL, NULL, 'www.facebook.com/devscript', 'goldvision93@gmail.com', NULL, NULL, NULL, 1, 'devscript', 0, '2017-07-23 15:19:47', '2017-07-23 15:56:47', 'admin', '0677512753', 'Ouarzazate Skoura Tiriguioute');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private` tinyint(1) DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `private`, `description`, `counter`) VALUES
(1, 'Global-Admin', 1, 'Global Admin', 2),
(3, 'Administrator', 0, 'Administrator', 1);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activities_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picturs_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `settings`
--

INSERT INTO `settings` (`id`, `home_background`, `news_background`, `activities_background`, `picturs_background`, `videos_background`, `contact_background`, `admin_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_id`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Elmarzougui', 'goldvision93@gmail.com', '$2y$10$4XqmK9Jg2hqtwTdYiTe/7Ot5jqdSyggLP4ZHQmFadgP3di8F3CRG2', 1, NULL, 'F8nDhyQ9MYEwdfi5nrTCUEkWRxzXD0DeWaN1MAqAgFs84au1XmAMhEAX1OKy', '2017-04-13 13:22:53', '2017-07-01 20:04:53'),
(2, 'Ahmed', 'goldvision106@hotmail.fr', '$2y$10$21Ef.Pc68ctQCx7l6xavi.Jp70S21AgHArq5waAYVaAapE9WYEWFa', 8, NULL, 'zeVtT7JwElqhitvEyeKGh6dpjqWN4rhH0n0khvG8xRw2pdlEY7ErswQ9aCjo', '2017-04-28 14:53:20', '2017-04-28 14:53:20');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_admin_id_foreign` (`user_id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_name_unique` (`name`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_profile_id_foreign` (`profile_id`);

--
-- Index pour la table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `photos_linke_unique` (`linke`),
  ADD KEY `photos_user_id_foreign` (`user_id`),
  ADD KEY `photos_user_name_foreign` (`user_name`);

--
-- Index pour la table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`),
  ADD KEY `profiles_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profile_id_foreign` (`profile_id`),
  ADD KEY `users_user_role_foreign` (`user_role`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_linke_unique` (`linke`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
