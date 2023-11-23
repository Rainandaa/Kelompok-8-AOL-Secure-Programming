-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 18.17
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
-- Struktur dari tabel `coms`
--

CREATE TABLE `coms` (
  `recipient_id` int(11) NOT NULL,
  `messages` varchar(150) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coms`
--

INSERT INTO `coms` (`recipient_id`, `messages`, `title`) VALUES
(3, NULL, NULL),
(3, NULL, NULL),
(3, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, NULL, NULL),
(1, 'aaa', NULL),
(3, 'BBBBBBBBBBBBBBBB', NULL),
(1, 'aaaaa', 'aaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
