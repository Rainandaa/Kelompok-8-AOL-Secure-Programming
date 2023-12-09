-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 08.25
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
-- Database: `aol_secprog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_config`
--

CREATE TABLE `app_config` (
  `key` varchar(15) NOT NULL,
  `value` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `app_config`
--

INSERT INTO `app_config` (`key`, `value`, `created_at`) VALUES
('initialized', 1, '2019-04-30 07:13:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coms`
--

CREATE TABLE `coms` (
  `recipient_id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `messages` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coms`
--

INSERT INTO `coms` (`recipient_id`, `title`, `messages`) VALUES
(3, NULL, NULL),
(3, NULL, NULL),
(3, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(3, NULL, NULL),
(1, 'aaa', NULL),
(1, 'as', NULL),
(1, 'as', NULL),
(1, 'aaa', NULL),
(1, 'aa', NULL),
(1, 'as', NULL),
(1, 'kl', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'dummy1', 'dummy1', 'dummy1@dummy.com', 'user', 'dummy1dummy1', '2019-04-30 07:13:37', '2019-08-02 04:49:24'),
(2, 'dummy2', 'dummy2', 'dummy2@dummy.com', 'user', 'dummy2dummy2', '2019-04-30 07:13:37', '2019-08-02 04:49:24'),
(3, 'dummy3', 'dummy3', 'dummy3@dummy.com', 'user', 'dummy3dummy3', '2019-04-30 07:13:37', '2019-08-02 04:49:25'),
(5, 'admin', 'ando123', 'admin@gmail.com', 'admin', 'supers3cretp4sswordOyeah123', '2019-04-30 07:13:37', '2019-08-02 04:49:25'),
(6, '', 'AAAAA', '', '', 'ASAS', '2023-11-20 08:34:55', '2023-11-20 08:34:55'),
(7, '', 'Aaaaa', '', '', 'aaa', '2023-11-20 10:38:30', '2023-11-20 10:38:30'),
(8, '', 'AAAAA', '', '', 'asas', '2023-11-21 15:47:37', '2023-11-21 15:47:37'),
(9, '', 'sasasa', '', '', 'sasasasa', '2023-11-21 16:13:22', '2023-11-21 16:13:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(100) NOT NULL,
  `nama_asli` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_info`
--

INSERT INTO `user_info` (`email`, `nama_asli`, `tempat_lahir`, `tanggal_lahir`) VALUES
('asas@gmail.com', 'dsds', 'Jakarta', 2023),
('asas@gmail.com', 'dsds', 'Jakarta', 2023),
('asas@gmail.com', 'a', 'a', 2023),
('asas@gmail.com', '<br /><b>Warning</b>:  Undefined variable $nama_asli in <b>D:\\Binus\\Sem 5\\Secure Programming\\AoL\\Tug', '<br /><b>Warning</b>:  Undefined variable $tempat_lahir in <b>D:\\Binus\\Sem 5\\Secure Programming\\AoL\\', 2023),
('asas@gmail.com', '<br /><b>Warning</b>:  Undefined variable $nama_asli in <b>D:\\Binus\\Sem 5\\Secure Programming\\AoL\\Tug', '<br /><b>Warning</b>:  Undefined variable $tempat_lahir in <b>D:\\Binus\\Sem 5\\Secure Programming\\AoL\\', 2023),
('asas@gmail.com', 'a', 'a', 2023),
('asas@gmail.com', 'a', 'sa', 2023);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_config`
--
ALTER TABLE `app_config`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
