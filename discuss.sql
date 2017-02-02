-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2017 at 10:38 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Arts', 'arts'),
(2, 'Books', 'books'),
(3, 'Songs', 'songs');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 4, '12', 8, '2017-02-02 14:41:47', '2017-02-02 14:41:47'),
(2, 4, '3221', 8, '2017-02-02 14:41:49', '2017-02-02 14:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(73, '2014_10_12_000000_create_users_table', 1),
(74, '2014_10_12_100000_create_password_resets_table', 1),
(75, '2017_01_25_200642_create_categories_table', 1),
(76, '2017_01_25_200904_create_posts_table', 1),
(77, '2017_01_27_155037_create_comments_table', 1),
(78, '2017_01_28_131451_create_followers_table', 1),
(82, '2017_01_28_153847_create_settings_table', 2),
(83, '2017_01_31_210703_create_likes_table', 2),
(84, '2017_01_31_221045_create_replies_table', 2);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `category_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 6, 'Natus laudantium consequuntur quas aliquid quis non.', 'Rerum est qui enim. Doloremque ullam maiores asperiores non. Accusantium deserunt at iusto quaerat.', 2, 'numquam-nisi-reiciendis-totam-eius-qui-similique-possimus-dolorum', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(2, 1, 'Impedit libero veniam qui voluptatibus veritatis quod.', 'Quia harum rerum ratione dicta deserunt totam voluptatibus. Officiis fuga qui ut voluptatem et tempora quasi. Laudantium voluptatem odit autem eius aut earum ea. Quis consequatur id ut dolor.', 1, 'aut-similique-enim-molestias-optio-molestiae', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(3, 7, 'In enim aut optio qui consequatur culpa expedita at et sed deleniti.', 'Facere et illo pariatur et. Ut accusamus eveniet est accusantium enim aut. Fugit iure qui itaque hic quisquam voluptatem quia aut. Nobis illo quasi voluptatem voluptates aut.', 2, 'qui-eaque-aspernatur-inventore-velit-repudiandae', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(4, 7, 'Deserunt eius nemo doloribus aut minima soluta earum illo sit error.', 'Facere cupiditate pariatur culpa deleniti est. Dicta excepturi quas aut adipisci. Quia dignissimos mollitia quidem voluptatem eius ut harum enim.', 2, 'laudantium-dignissimos-dolor-consequatur-fugit', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(5, 10, 'Tenetur nesciunt dolorum explicabo quo aut quis ratione omnis perferendis atque laborum.', 'Voluptas eveniet rerum repudiandae sit sint. Hic sapiente quia enim incidunt nostrum deleniti mollitia rerum. Nulla ut aut voluptas cupiditate.', 1, 'provident-debitis-quisquam-ut', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(6, 8, 'Tempora ut quibusdam saepe quo quisquam fugiat est et totam rerum dolorum et aut.', 'Impedit quaerat laudantium ad praesentium vitae rerum. Velit architecto veritatis eum nihil laboriosam perferendis. Harum molestiae dignissimos est et pariatur sed.', 2, 'facere-accusantium-inventore-qui-perspiciatis-exercitationem-dolorem', '2017-02-02 12:48:49', '2017-02-02 12:48:49'),
(7, 2, 'Cumque et illo distinctio eaque nesciunt libero iste autem quis pariatur consequuntur magni omnis.', 'Vel officia sint est eos autem libero et. Quia voluptate optio dolorem officiis nemo voluptas tempora totam. Ea et et et dolorum. Et culpa sed minus.', 2, 'hic-numquam-magnam-id-sed-quisquam-tempora-tenetur-possimus', '2017-02-02 12:48:49', '2017-02-02 12:48:49'),
(8, 7, 'Incidunt sunt qui nesciunt dolore illo quod ut eius et unde.', 'Unde nostrum corrupti eos harum aut. Reprehenderit qui reprehenderit ut ab qui ipsam quo. Praesentium aut illo amet laborum facilis qui. Voluptas eius enim eos numquam et et harum.', 1, 'iure-et-ad-quae-magni-vero-officia-molestiae', '2017-02-02 12:48:49', '2017-02-02 12:48:49'),
(9, 2, 'Ut vero quisquam aut dicta voluptas dolore aut.', 'Totam quidem consequatur rerum cum et. Eum quia voluptas doloremque laborum voluptates. Nostrum non sit nostrum ut tenetur velit.', 3, 'nemo-ad-itaque-et-quasi-ut-eaque', '2017-02-02 12:48:49', '2017-02-02 12:48:49'),
(10, 5, 'Deserunt maxime nesciunt id in voluptas exercitationem mollitia tempore sunt veritatis sit similique.', 'Dolore voluptatem distinctio facilis officiis. Et vel in expedita. Vitae sunt eaque rerum cum suscipit placeat. At odit ullam possimus eius ratione quia necessitatibus.', 3, 'saepe-optio-vel-perferendis-dolorum-accusamus', '2017-02-02 12:48:49', '2017-02-02 12:48:49'),
(11, 4, 'Hello ?_1 How are you ...!>>', '21321Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>Hello ?_1 How are you ...!>>', 1, 'hello-1-how-are-you', '2017-02-02 13:25:26', '2017-02-02 13:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `key_words`) VALUES
(1, 'Discuss', '1,2,3,4,5,6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blocked` int(11) NOT NULL DEFAULT '0',
  `rank` int(11) NOT NULL DEFAULT '1',
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blocked`, `rank`, `slug`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Conner Lockman', 'mertz.aida@example.com', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'sigrid-aufderhar-iv', 'SlVGog2BIo', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(2, 'Carmine Parisian', 'dickinson.donnell@example.com', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'dejuan-zboncak-dvm', 'uwcrY3L2jF', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(3, 'Jazmin Upton', 'thahn@example.org', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'jimmy-schamberger', 'KeYKs7i4Nn', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(4, 'Fredrick Rueckerpoi', 'hattie04@example.net', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 2, 'madie-blick-phd', '6QQdPNXZVH5HY52LF9eQdKJTVsTOwMqFZ49ICmxoeRkY4eKRKFLZ8zq2w9S5', '2017-02-02 12:48:48', '2017-02-02 15:07:27'),
(5, 'Abagail Tremblay', 'theron.lockman@example.org', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'dr-luis-hansen', 'C5Yj5xAfNo', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(6, 'Dr. Broderick Pacocha II', 'farrell.felicia@example.com', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'lorine-lynch', 'zzEMZtFzjh', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(7, 'Brigitte Windler', 'demetrius.grimes@example.net', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'dr-zola-lang-md', 'hsQLV5c6DZ', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(8, 'Max Cremin', 'weston.ruecker@example.net', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'aylin-bins-dds', 'n8gvI9Uvw2', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(9, 'Brooks Spinka', 'fhand@example.org', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 1, 'prof-felipe-parisian-v', 'OdmMdH85KU', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(10, 'Maximilian Rowe', 'agoyette@example.net', '$2y$10$28SYAnzMZocZ5r5QeZTe0O1IegU7eZInTUAVkkPqUvO/XiNcup9DS', 0, 2, 'ursula-johnston', 'D1zKMnfut1', '2017-02-02 12:48:48', '2017-02-02 12:48:48'),
(12, 'Admin', 'dr.dp2007@gmail.com', '$2y$10$l/3TV7PQcTqqGlg3S04Ezud8JVNrsbhV5x4GKyNK473DPnksIdMlm', 0, 2, 'admin', NULL, '2017-02-02 15:10:15', '2017-02-02 15:10:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
