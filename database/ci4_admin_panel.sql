-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 03:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-20-124016', 'App\\Database\\Migrations\\Users', 'default', 'App', 1672284147, 1),
(2, '2021-05-20-124435', 'App\\Database\\Migrations\\Session', 'default', 'App', 1672284147, 1),
(3, '2021-05-20-125608', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1672284147, 1),
(4, '2021-05-20-125818', 'App\\Database\\Migrations\\UserAccess', 'default', 'App', 1672284147, 1),
(5, '2021-05-20-130307', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1672284147, 1),
(6, '2021-05-20-130307', 'App\\Database\\Migrations\\UserSubmenu', 'default', 'App', 1672284147, 1),
(7, '2021-05-24-100652', 'App\\Database\\Migrations\\User', 'default', 'App', 1672284147, 1),
(8, '2021-05-25-102709', 'App\\Database\\Migrations\\UserMenuCategory', 'default', 'App', 1672284147, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:1baqb9vnou4irblsrdb013cb41hfo1ck', '::1', '2023-01-01 02:33:06', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323533393339393b5f63695f70726576696f75735f75726c7c733a32373a22687474703a2f2f6c6f63616c686f73743a383038302f7573657273223b757365725f69647c733a313a2232223b757365726e616d657c733a31333a2264657640676d61696c2e636f6d223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b),
('ci_session:i5bvhmltau20c9elfhv2rh8dosv8juvf', '::1', '2022-12-31 16:08:46', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323530313639353b5f63695f70726576696f75735f75726c7c733a33303a22687474703a2f2f6c6f63616c686f73743a383038302f7265676973746572223b6e6f7469665f6572726f727c733a3131313a225468652050617373776f726420436f6e6669726d6174696f6e206669656c6420646f6573206e6f74206d61746368207468652050617373776f7264206669656c642e2054686520456d61696c206669656c64206d75737420636f6e7461696e206120756e697175652076616c75652e223b5f5f63695f766172737c613a313a7b733a31313a226e6f7469665f6572726f72223b733a333a226e6577223b7d),
('ci_session:ke7snqbqn81gfbrpk8qvql7hj3dvjqdg', '::1', '2022-12-30 15:54:33', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323431353637333b5f63695f70726576696f75735f75726c7c733a33323a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f223b),
('ci_session:lthjgumbeg21pt8hi36qc9afbifv8vne', '::1', '2022-12-31 15:53:09', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323530313938393b5f63695f70726576696f75735f75726c7c733a32373a22687474703a2f2f6c6f63616c686f73743a383038302f7573657273223b757365725f69647c733a313a2232223b757365726e616d657c733a31333a2264657640676d61696c2e636f6d223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b),
('ci_session:lukovp9q6b1pedede8b3g7chdmm9cuon', '::1', '2022-12-30 17:44:16', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323432323230313b5f63695f70726576696f75735f75726c7c733a32363a22687474703a2f2f6c6f63616c686f73743a383038302f686f6d65223b757365725f69647c733a313a2233223b757365726e616d657c733a31333a2272616d40676d61696c2e636f6d223b726f6c657c733a313a2232223b69734c6f67676564496e7c623a313b6e6f7469665f737563636573737c733a34333a223c623e596f7572206d61696c206964207375636365737366756c6c792076657269666965642e3c2f623e20223b5f5f63695f766172737c613a313a7b733a31333a226e6f7469665f73756363657373223b733a333a226f6c64223b7d),
('ci_session:qbapk6v4to991eiuu774rf80henjksi3', '::1', '2023-01-01 02:29:37', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323534303031333b5f63695f70726576696f75735f75726c7c733a33323a22687474703a2f2f6c6f63616c686f73743a383038302f6d792d70726f66696c65223b757365725f69647c733a313a2235223b757365726e616d657c733a32363a2264696e6573682e736861726d6130333640676d61696c2e636f6d223b726f6c657c733a313a2232223b69734c6f67676564496e7c623a313b),
('ci_session:r85td44ahaurumsml4170qv6klcokca1', '::1', '2022-12-31 04:05:12', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637323435393439383b5f63695f70726576696f75735f75726c7c733a32323a22687474703a2f2f6c6f63616c686f73743a383038302f223b);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) UNSIGNED NOT NULL,
  `mail_status` enum('Verified','Not Verified') NOT NULL DEFAULT 'Not Verified',
  `otp` int(11) DEFAULT NULL,
  `login_otp` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile_number`, `email`, `password`, `role`, `mail_status`, `otp`, `login_otp`, `created_at`, `updated_at`) VALUES
(2, 'Dinesh', 'Sharma', '9998899', 'dev@gmail.com', '$2y$10$CSYKd/C7FTHmsuOiBQCP9.Mf0MVn7oukmEUKqHtqvW9YYZd/NjTJ2', 1, 'Not Verified', NULL, 6001, '2022-12-28 09:28:35', '0000-00-00 00:00:00'),
(3, 'Ram', 'Kumar', '4544243', 'ram@gmail.com', '$2y$10$oY819e6OzrqeGcGa4GKcb.PjPNcuewvNqhaifXbLdGk1e3L4o7v3q', 2, 'Verified', 3896, NULL, '2022-12-28 09:33:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`ip_address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
