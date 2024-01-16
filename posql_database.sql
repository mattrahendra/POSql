-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2024 pada 09.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'ada', 'dw', 'ad@mail.com', '222003332', 'adwafgf', 'customers/m2gPzqrAC0cCUVxt2mkt4i7cKA55apLWKOyKPf5F.png', 1, '2023-12-11 13:22:44', '2023-12-11 14:20:23'),
(4, 'pos', 'pas', 'pos@mail.com', '082312314', 'awfseij', 'customers/aJrfeI7OPntew33LKImPTttQWKxMeIx7CuzYrrj5.png', 1, '2023-12-11 14:23:30', '2023-12-11 14:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_04_19_081616_create_products_table', 1),
(6, '2020_04_22_181602_add_quantity_to_products_table', 1),
(7, '2020_04_24_170630_create_customers_table', 1),
(8, '2020_04_27_054355_create_settings_table', 1),
(9, '2020_04_30_053758_create_user_cart_table', 1),
(10, '2020_05_04_165730_create_orders_table', 1),
(11, '2020_05_04_165749_create_order_items_table', 1),
(12, '2020_05_04_165822_create_payments_table', 1),
(13, '2022_03_21_125336_change_price_column', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(17, NULL, 2, NULL, '2023-12-26 18:32:33', '2023-12-26 18:32:33'),
(18, NULL, 2, NULL, '2023-12-26 18:32:53', '2023-12-26 18:32:53'),
(19, NULL, 2, NULL, '2023-12-26 19:44:14', '2023-12-26 19:44:14'),
(20, NULL, 2, NULL, '2023-12-28 15:56:54', '2023-12-28 15:56:54'),
(21, NULL, 2, NULL, '2023-12-28 15:57:53', '2023-12-28 15:57:53'),
(22, NULL, 14, NULL, '2024-01-11 16:42:40', '2024-01-11 16:42:40'),
(23, NULL, 14, NULL, '2024-01-11 16:42:57', '2024-01-11 16:42:57'),
(24, NULL, 14, NULL, '2024-01-11 16:44:22', '2024-01-11 16:44:22'),
(25, NULL, 14, NULL, '2024-01-11 16:45:57', '2024-01-11 16:45:57'),
(26, NULL, 14, NULL, '2024-01-12 03:45:09', '2024-01-12 03:45:09'),
(27, NULL, 15, NULL, '2024-01-13 03:35:39', '2024-01-13 03:35:39'),
(28, NULL, 15, NULL, '2024-01-13 03:44:23', '2024-01-13 03:44:23'),
(29, NULL, 15, NULL, '2024-01-13 04:19:23', '2024-01-13 04:19:23'),
(30, NULL, 15, NULL, '2024-01-13 05:44:08', '2024-01-13 05:44:08'),
(31, NULL, 15, NULL, '2024-01-14 03:36:34', '2024-01-14 03:36:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(14,4) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `price`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(29, 36000.0000, 3, 26, 12, '2024-01-12 03:45:09', '2024-01-12 03:45:09'),
(30, 50000.0000, 1, 27, 19, '2024-01-13 03:35:44', '2024-01-13 03:35:44'),
(31, 50000.0000, 1, 28, 19, '2024-01-13 03:44:23', '2024-01-13 03:44:23'),
(32, 50000.0000, 1, 29, 14, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(33, 45000.0000, 9, 29, 15, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(34, 75000.0000, 3, 29, 17, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(35, 50000.0000, 1, 29, 19, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(36, 20000.0000, 2, 29, 13, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(37, 100000.0000, 2, 30, 19, '2024-01-13 05:44:08', '2024-01-13 05:44:08'),
(38, 25000.0000, 1, 30, 17, '2024-01-13 05:44:08', '2024-01-13 05:44:08'),
(39, 7500.0000, 1, 30, 16, '2024-01-13 05:44:08', '2024-01-13 05:44:08'),
(40, 25000.0000, 1, 31, 17, '2024-01-14 03:36:35', '2024-01-14 03:36:35'),
(41, 50000.0000, 1, 31, 14, '2024-01-14 03:36:35', '2024-01-14 03:36:35'),
(42, 50000.0000, 1, 31, 19, '2024-01-14 03:36:35', '2024-01-14 03:36:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(14,4) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `amount`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 10000.0000, 17, 2, '2023-12-26 18:32:33', '2023-12-26 18:32:33'),
(18, 45000.0000, 18, 2, '2023-12-26 18:32:53', '2023-12-26 18:32:53'),
(19, 110000.0000, 19, 2, '2023-12-26 19:44:14', '2023-12-26 19:44:14'),
(20, 110000.0000, 20, 2, '2023-12-28 15:56:54', '2023-12-28 15:56:54'),
(21, 5000.0000, 21, 2, '2023-12-28 15:57:53', '2023-12-28 15:57:53'),
(22, 1000000.0000, 22, 14, '2024-01-11 16:42:41', '2024-01-11 16:42:41'),
(23, 100000.0000, 23, 14, '2024-01-11 16:42:57', '2024-01-11 16:42:57'),
(24, 100000.0000, 24, 14, '2024-01-11 16:44:22', '2024-01-11 16:44:22'),
(25, 100000.0000, 25, 14, '2024-01-11 16:45:57', '2024-01-11 16:45:57'),
(26, 36000.0000, 26, 14, '2024-01-12 03:45:09', '2024-01-12 03:45:09'),
(27, 60000.0000, 27, 15, '2024-01-13 03:35:44', '2024-01-13 03:35:44'),
(28, 70000.0000, 28, 15, '2024-01-13 03:44:23', '2024-01-13 03:44:23'),
(29, 250000.0000, 29, 15, '2024-01-13 04:19:24', '2024-01-13 04:19:24'),
(30, 150000.0000, 30, 15, '2024-01-13 05:44:08', '2024-01-13 05:44:08'),
(31, 150000.0000, 31, 15, '2024-01-14 03:36:35', '2024-01-14 03:36:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `barcode` varchar(191) NOT NULL,
  `price` decimal(14,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `barcode`, `price`, `quantity`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Kopi Hitam', 'Kopi Hitam Size L', 'products/hL13oo0aIvDnH5yGD3CKuXo45xSeWnshOAYySqe5.png', '332134', 12000.00, 999996, 1, 14, '2024-01-12 03:44:27', '2024-01-12 03:45:09'),
(13, 'Kopi Hitam', 'Kopi hitam nikma', 'products/qA4VR0bWhpfKbZrKNDz0QOPwGlVdUkQhwfmikCqi.webp', '321333', 10000.00, 999997, 1, 15, '2024-01-13 02:46:06', '2024-01-13 04:19:24'),
(14, 'Mocacino', 'Moccacino panas', 'products/IL3bJ2mL3vS1oSlNuMNbU5PRl2k5wjEjLscZtWPX.jpg', '447552', 50000.00, 999997, 1, 15, '2024-01-13 02:50:29', '2024-01-14 03:36:35'),
(15, 'Teh Es', 'Teh es size l', 'products/1pnh8amG1FJK02QSeIticLxbLh2PZYOByvvEy0OR.jpg', '997755', 5000.00, 999990, 1, 15, '2024-01-13 02:52:18', '2024-01-13 04:19:24'),
(16, 'Green Tea', 'green tea size m', 'products/ynZubFZxHMr0sB0EcxIXzWumhEWhPw1UNYWzDiVf.jpg', '109921', 7500.00, 999999, 0, 15, '2024-01-13 02:53:37', '2024-01-14 02:59:12'),
(17, 'Lemon Tea', 'lemon tea manis', 'products/zrgEr1vSuUlaIbunixAxaDBKX3NRSniACoZap2N5.jpg', '133220', 25000.00, 999994, 1, 15, '2024-01-13 02:55:24', '2024-01-14 03:36:35'),
(19, 'Boba', 'boba dengan susu kental', 'products/Jfm4K8eW77KX0NMKHJYuH0WaiIHkEx7vcJbzc2ph.jpg', '650020', 50000.00, 999993, 1, 15, '2024-01-13 02:56:52', '2024-01-14 03:36:35'),
(22, 'Jus Alpukat', 'jus alpukat size M', 'products/qwLitR78XRtznNJlulcn7DFFLisHTT8bL8WZGGNp.jpg', '788990', 120000.00, 999999, 1, 15, '2024-01-14 03:51:12', '2024-01-14 03:51:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'POSql', '2023-12-09 12:28:05', '2023-12-12 10:04:06'),
(2, 'currency_symbol', 'Rp', '2023-12-09 12:28:05', '2023-12-09 12:36:59'),
(3, 'app_description', 'Deskripsi', '2023-12-09 12:36:59', '2023-12-10 19:26:13'),
(4, 'warning_quantity', NULL, '2023-12-09 12:36:59', '2023-12-09 12:36:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `image`, `email`, `alamat`, `email_verified_at`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'users/6L60tg9Ie3yWx1vHoEGSzg5fZJW3mhPna2f0dhKy.jpg', 'admin@gmail.com', '', NULL, '$2y$10$yG6q45X4LT4RAba/kHrtd.ORdh/kKk40xC4jbLKhNlu0of0Nee87i', 'admin', 'aman', 'Kn5MlJiCb3nbvaSYsiZZWqOUjnz7SF65rMfd0w9nEf3hnyICtRMCbYPJaZGC', '2023-12-09 12:28:05', '2024-01-11 07:28:09'),
(2, 'mamo', 'users/huPKPfyYXHjKGMnkg6xN0ifCIQBGn6liH0nBj3al.jpg', 'mamo@mail.com', 'Jalan sembako', NULL, '$2y$10$vUWDZtFob5Aa6ekHlFCHBuTgNYHiaBW1w2kLTbQNdDaYPTKY63gKO', 'user', 'aman', '6yfJRgMsr9lAFKCJ9iFV6axFbSVTUNYFLZDQeMj8wnpJVFICbsgH7OobvUML', '2023-12-09 12:39:44', '2024-01-11 20:56:28'),
(9, 'testblokir', '', 'blokir@mail.com', 'blokir', NULL, '$2y$10$oWubgyohoGwExTwXWWqGt.P8AvaHZpIx2dUeRNii9BYM9ee4c7sdi', 'user', 'blokir', NULL, '2024-01-03 16:14:12', '2024-01-03 16:14:12'),
(10, 'momo', 'users/FXduEVgHrm2mdRAWaRd979PnPvhCIjOftMxceUKU.jpg', 'momo@mail.com', 'Jalan utama popo', NULL, '$2y$10$kyqg03HThJwlmNeK5Pskiebq8/ZUs4hV/Scyg.99NutV3KGa39a0C', 'user', 'blokir', NULL, '2024-01-08 08:08:50', '2024-01-08 08:09:20'),
(11, 'mad', '', 'mad@mail.com', 'jalan pangkalan batang', NULL, '$2y$10$CItrfRULcQDHmgAOgcW30eHYnh.DH/3WB9XBHwgr/FLvizQDC19Zq', 'user', 'aman', NULL, '2024-01-08 14:42:03', '2024-01-10 15:45:58'),
(12, 'Mansur', 'users/hgiuf0mHWdNLiKCOER8r38FF9ulEem1kmrm28UyS.jpg', 'gabe@gabe.com', '-', NULL, '$2y$10$fp6l5fmGvYSAzHaVYTlRl.eP5slNHoHN53KDWv2jmsOKQlZZmrHC6', 'admin', 'blokir', NULL, '2024-01-11 12:06:04', '2024-01-11 22:58:08'),
(14, 'inkubator', 'users/51trFG5Vlgo0ZvzVkdyIkCNFCLEzPYZiWSdGA8B1.jpg', 'inkubator@gmail.com', 'polbeng', NULL, '$2y$10$UugPw/QkdTY62Q8VUVbdzO58xvKCVFGwb.gqL0SoxC./7ta0XJOEW', 'user', 'aman', NULL, '2024-01-11 16:38:55', '2024-01-11 16:41:17'),
(15, 'demoAcc', '', 'demo@mail.com', 'Jalan Bathin Alam', NULL, '$2y$10$jpoKf55citlfXTUB4RN16eaiU3itz7muZlYQ7QZ1PiD7RrdtREzDm', 'user', 'aman', NULL, '2024-01-13 02:43:13', '2024-01-13 02:43:13'),
(16, 'mdl', '', 'mdl@mail.com', 'momo', NULL, '$2y$10$8K.uiTdcc9EH53iN5YBY1epoaggotYMbLxbx92cdw18WK6wlGqvqe', 'user', 'aman', NULL, '2024-01-15 07:38:32', '2024-01-15 07:38:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_cart`
--
ALTER TABLE `user_cart`
  ADD KEY `user_cart_user_id_foreign` (`user_id`),
  ADD KEY `user_cart_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
