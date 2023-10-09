-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 05:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(4) NOT NULL,
  `id_menu_keranjang` int(4) NOT NULL,
  `banyak` text NOT NULL,
  `maker_keranjang` int(4) NOT NULL,
  `tanggal_keranjang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_menu_keranjang`, `banyak`, `maker_keranjang`, `tanggal_keranjang`) VALUES
(79, 2, '1', 6, '2023-09-14 09:31:23'),
(83, 32, '2', 7, '2023-09-16 11:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log` int(4) NOT NULL,
  `id_user_log` int(4) NOT NULL,
  `activity` text NOT NULL,
  `tanggal_activity` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `id_user_log`, `activity`, `tanggal_activity`) VALUES
(2, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 07:22:55'),
(3, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 07:22:58'),
(4, 4, 'Mengedit Website N - Nick Frosh Restaurant', '2023-09-09 07:25:24'),
(5, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 07:25:24'),
(6, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 07:25:34'),
(7, 4, 'Mengedit Website N - Nick Frosh Restaurant', '2023-09-09 07:25:44'),
(8, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 07:25:44'),
(9, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 07:25:56'),
(10, 4, 'Menambah Akun Pegawai 1', '2023-09-09 07:30:37'),
(11, 4, 'Mereset Password Pada Akun Pegawai Dengan ID 18', '2023-09-09 07:30:43'),
(12, 4, 'Mengedit Akun Pegawai 12 Dengan ID 18', '2023-09-09 07:30:52'),
(13, 4, 'Menghapus Akun Pegawai Dengan ID 18', '2023-09-09 07:30:55'),
(14, 4, 'Mengedit Profile norman ang', '2023-09-09 07:33:29'),
(15, 4, 'Mengganti Password Dengan ID 4', '2023-09-09 07:34:10'),
(16, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 07:34:10'),
(17, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 07:34:22'),
(18, 4, 'Mengganti Password Dengan ID 4', '2023-09-09 07:34:40'),
(19, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 07:34:40'),
(20, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 07:34:47'),
(21, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-09 07:38:11'),
(22, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-09 07:40:12'),
(23, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-09 07:59:00'),
(24, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 08:11:44'),
(25, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 09:03:01'),
(26, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-09 09:17:49'),
(27, 4, 'Mencari Aktivitas ', '2023-09-09 09:22:29'),
(28, 4, 'Mencari Aktivitas 4', '2023-09-09 09:22:58'),
(29, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 09:27:02'),
(30, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-09 09:27:14'),
(31, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 09:28:18'),
(32, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 09:33:18'),
(33, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-09 09:33:32'),
(34, 6, 'Menambah Menu beef steak ', '2023-09-09 09:47:33'),
(35, 6, 'Status Menu Dengan ID 14 Tersedia', '2023-09-09 09:47:41'),
(36, 6, 'Status Menu Dengan ID 14 Tidak Tersedia', '2023-09-09 09:47:55'),
(37, 6, 'Mengedit Menu beef steak  Dengan Id 14', '2023-09-09 09:48:11'),
(38, 6, 'Menghapus Menu Dengan ID 14', '2023-09-09 09:50:25'),
(39, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-09 09:50:32'),
(40, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 09:50:44'),
(41, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 09:51:26'),
(42, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-09 09:51:40'),
(43, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-09 09:52:55'),
(44, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-09 09:53:03'),
(45, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-09 10:00:12'),
(46, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-09 10:00:24'),
(47, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-09 10:11:13'),
(48, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-09 10:20:22'),
(49, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-09 23:41:29'),
(50, 6, 'Status Menu Dengan ID 5 Tersedia', '2023-09-09 23:41:46'),
(51, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-09 23:41:48'),
(52, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-09 23:42:01'),
(53, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-09 23:43:49'),
(54, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:08:36'),
(55, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:08:38'),
(56, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:00'),
(57, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:12'),
(58, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:26'),
(59, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:31'),
(60, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:34'),
(61, 6, 'Status Menu Dengan ID 2 Tidak Tersedia', '2023-09-10 00:09:37'),
(62, 6, 'Status Menu Dengan ID 2 Tersedia', '2023-09-10 00:09:43'),
(63, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:46'),
(64, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:09:48'),
(65, 6, 'Status Menu Dengan ID 2 Tidak Tersedia', '2023-09-10 00:09:50'),
(66, 6, 'Status Menu Dengan ID 5 Tersedia', '2023-09-10 00:09:53'),
(67, 6, 'Status Menu Dengan ID 2 Tersedia', '2023-09-10 00:09:55'),
(68, 6, 'Status Menu Dengan ID 2 Tidak Tersedia', '2023-09-10 00:09:58'),
(69, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:10:21'),
(70, 6, 'Status Menu Dengan ID 5 Tersedia', '2023-09-10 00:10:22'),
(71, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 00:10:30'),
(72, 6, 'Status Menu Dengan ID 5 Tidak Tersedia', '2023-09-10 00:12:47'),
(73, 6, 'Status Menu Dengan ID 2 Tersedia', '2023-09-10 00:12:52'),
(74, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 00:30:34'),
(75, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 00:52:37'),
(76, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 00:53:35'),
(77, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 01:36:56'),
(78, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 01:55:55'),
(79, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 01:56:07'),
(80, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 02:07:09'),
(81, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 02:07:26'),
(82, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 02:18:35'),
(83, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 04:35:55'),
(84, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 04:49:39'),
(85, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 05:09:57'),
(86, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 05:13:58'),
(87, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 05:31:47'),
(88, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 05:41:45'),
(89, 7, 'Menambahkan Menu Ke Keranjang 2', '2023-09-10 05:44:44'),
(90, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-10 05:44:59'),
(91, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-10 05:45:25'),
(92, 7, 'Menhapus Menu Dari Keranjang Dengan ID 28', '2023-09-10 05:46:15'),
(93, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-10 05:46:41'),
(94, 7, 'Menghapus Menu Dari Keranjang Dengan ID 29', '2023-09-10 05:46:46'),
(95, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 05:48:50'),
(96, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 05:49:42'),
(97, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 06:07:41'),
(98, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 06:09:29'),
(99, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 06:20:55'),
(100, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 06:34:03'),
(101, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 07:13:10'),
(102, 7, 'Menambahkan Menu Ke Keranjang / Menu Payment Dengan ID 5', '2023-09-10 07:39:45'),
(103, 7, 'Menghapus Menu Dari Keranjang / Menu Payment Dengan ID 30', '2023-09-10 07:39:57'),
(104, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 07:58:54'),
(105, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 07:59:10'),
(106, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-10 07:59:16'),
(107, 4, 'Menambah Akun Pegawai 1', '2023-09-10 08:01:11'),
(108, 4, 'Menghapus Akun Pegawai Dengan ID 19', '2023-09-10 08:01:15'),
(109, 4, 'Mengedit Akun Pegawai ong yan daa Dengan ID 7', '2023-09-10 08:06:13'),
(110, 4, 'Mengedit Akun Pegawai ong yan da Dengan ID 7', '2023-09-10 08:06:23'),
(111, 4, 'Mengedit Profile norman ang', '2023-09-10 08:15:20'),
(112, 4, 'Mengedit Profile norman ang', '2023-09-10 08:15:28'),
(113, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-10 08:15:58'),
(114, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 08:16:06'),
(115, 6, 'Menambah Menu 12', '2023-09-10 08:29:25'),
(116, 6, 'Menghapus Menu Dengan ID 15', '2023-09-10 08:29:30'),
(117, 6, 'Menambah Menu 12', '2023-09-10 08:29:39'),
(118, 6, 'Menghapus Menu Dengan ID 16', '2023-09-10 08:29:41'),
(119, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 08:35:49'),
(120, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 08:36:03'),
(121, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 08:36:45'),
(122, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 08:47:11'),
(123, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-10 08:47:14'),
(124, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-10 08:47:48'),
(125, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 08:47:55'),
(126, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 08:54:12'),
(127, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 08:54:16'),
(128, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 20:11:40'),
(129, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 21:29:14'),
(130, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 21:29:22'),
(131, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 21:29:38'),
(132, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 21:39:51'),
(133, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 21:50:42'),
(134, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 21:51:50'),
(135, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 21:59:45'),
(136, 6, 'Mengedit Menu pizza Dengan Id 2', '2023-09-10 22:00:14'),
(137, 6, 'Menambah Menu 12', '2023-09-10 22:02:40'),
(138, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 22:12:43'),
(139, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 22:13:23'),
(140, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 22:28:18'),
(141, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-10 22:30:23'),
(142, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-10 22:30:28'),
(143, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-10 22:30:41'),
(144, 6, 'Menghapus Menu Dengan ID 17', '2023-09-10 22:30:48'),
(145, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 22:30:58'),
(146, 6, 'Menambah Menu 1', '2023-09-10 22:35:31'),
(147, 6, 'Menambah Menu 2', '2023-09-10 22:35:45'),
(148, 6, 'Menambah Menu 3', '2023-09-10 22:35:57'),
(149, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-10 22:36:39'),
(150, 6, 'Mengedit Menu pizza Dengan Id 2', '2023-09-10 22:36:50'),
(151, 6, 'Menghapus Menu Dengan ID 20', '2023-09-10 22:37:16'),
(152, 6, 'Menghapus Menu Dengan ID 19', '2023-09-10 22:37:18'),
(153, 6, 'Menghapus Menu Dengan ID 18', '2023-09-10 22:37:19'),
(154, 6, 'Menambah Menu choco crunchy waffle', '2023-09-10 22:42:39'),
(155, 6, 'Menambah Menu nick frosh plater', '2023-09-10 22:43:43'),
(156, 6, 'Menambah Menu risoles', '2023-09-10 22:44:20'),
(157, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-10 22:55:43'),
(158, 7, 'Menambahkan Menu Ke Keranjang / Menu Payment Dengan ID 2', '2023-09-10 23:24:30'),
(159, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-10 23:37:11'),
(160, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-10 23:49:22'),
(161, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 01:05:46'),
(162, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 01:08:17'),
(163, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 01:22:35'),
(164, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 01:37:02'),
(165, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 01:47:10'),
(166, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 01:51:59'),
(167, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 02:09:50'),
(168, 6, 'Menambah Menu 12', '2023-09-11 02:25:02'),
(169, 6, 'Status Menu Dengan ID 23 Tersedia', '2023-09-11 02:26:12'),
(170, 6, 'Status Menu Dengan ID 23 Tidak Tersedia', '2023-09-11 02:26:16'),
(171, 6, 'Mengedit Menu risoles Dengan Id 23', '2023-09-11 02:26:37'),
(172, 6, 'Status Menu Dengan ID 23 Tersedia', '2023-09-11 02:26:43'),
(173, 6, 'Mengedit Menu risoles Dengan Id 23', '2023-09-11 02:26:58'),
(174, 6, 'Menambah Menu kali linux', '2023-09-11 02:27:28'),
(175, 6, 'Menghapus Menu Dengan ID 25', '2023-09-11 02:27:33'),
(176, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 02:29:29'),
(177, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-11 02:29:35'),
(178, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-11 02:32:02'),
(179, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 02:32:12'),
(180, 6, 'Status Menu Dengan ID 5 Tersedia', '2023-09-11 02:32:48'),
(181, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-11 02:32:57'),
(182, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 02:33:02'),
(183, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-11 02:37:14'),
(184, 7, 'Menambahkan Menu Ke Keranjang / Menu Payment Dengan ID ', '2023-09-11 02:45:06'),
(185, 7, 'Menambahkan Menu Ke Keranjang / Menu Payment Dengan ID ', '2023-09-11 02:50:41'),
(186, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 06:42:54'),
(187, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 06:48:31'),
(188, 6, 'Status Menu Dengan ID 22 Tersedia', '2023-09-11 06:48:40'),
(189, 6, 'Status Menu Dengan ID 22 Tidak Tersedia', '2023-09-11 06:48:44'),
(190, 6, 'Mengedit Menu nick frosh plater Dengan Id 22', '2023-09-11 06:52:54'),
(191, 7, 'Menghapus Menu Dari Keranjang / Menu Payment Dengan ID 32', '2023-09-11 06:54:56'),
(192, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-11 07:04:18'),
(193, 7, 'Menambahkan Menu Ke Keranjang Dengan ID ', '2023-09-11 07:10:57'),
(194, 7, 'Menambahkan Menu Ke Keranjang Dengan ID ', '2023-09-11 07:12:24'),
(195, 7, 'Menghapus Menu Dari Keranjang / Menu Payment Dengan ID 34', '2023-09-11 07:12:30'),
(196, 7, 'Menghapus Menu Dari Keranjang Dengan ID 33', '2023-09-11 07:13:41'),
(197, 7, 'Menghapus Menu Dari Keranjang Dengan ID 31', '2023-09-11 07:13:52'),
(198, 7, 'Menambahkan Menu Ke Keranjang Dengan ID ', '2023-09-11 07:14:07'),
(199, 7, 'Menghapus Menu Dari Keranjang Dengan ID 35', '2023-09-11 07:14:15'),
(200, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 07:17:02'),
(201, 6, 'Mengedit Menu nick frosh plater Dengan Id 22', '2023-09-11 07:19:21'),
(202, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-11 07:22:29'),
(203, 6, 'Mengedit Menu es kopi susu Dengan Id 5', '2023-09-11 07:22:55'),
(204, 6, 'Menambah Menu 1', '2023-09-11 07:23:12'),
(205, 6, 'Menghapus Menu Dengan ID 26', '2023-09-11 07:23:17'),
(206, 6, 'Menambah Menu 1', '2023-09-11 07:23:43'),
(207, 6, 'Menghapus Menu Dengan ID 27', '2023-09-11 07:23:52'),
(208, 7, 'Menghapus Menu Dari Keranjang Dengan ID 25', '2023-09-11 07:24:10'),
(209, 6, 'Menambah Menu sausage waffle', '2023-09-11 07:36:33'),
(210, 6, 'Menambah Menu smoked beef waffle', '2023-09-11 07:37:04'),
(211, 6, 'Menambah Menu smoked chicken waffle', '2023-09-11 07:37:32'),
(212, 6, 'Menambah Menu waffle kaya butter', '2023-09-11 07:38:36'),
(213, 6, 'Menambah Menu mie bangladesh nyemek', '2023-09-11 07:39:29'),
(214, 6, 'Menambah Menu nasi telur sambal matah', '2023-09-11 07:40:23'),
(215, 6, 'Menambah Menu nasi telur sambal matah', '2023-09-11 07:40:23'),
(216, 6, 'Menambah Menu spicy curry rendang', '2023-09-11 07:41:06'),
(217, 6, 'Menambah Menu salted egg chicken', '2023-09-11 07:41:49'),
(218, 6, 'Status Menu Dengan ID 35 Tersedia', '2023-09-11 07:42:33'),
(219, 6, 'Status Menu Dengan ID 34 Tersedia', '2023-09-11 07:42:36'),
(220, 6, 'Status Menu Dengan ID 33 Tersedia', '2023-09-11 07:42:39'),
(221, 6, 'Status Menu Dengan ID 32 Tersedia', '2023-09-11 07:42:42'),
(222, 6, 'Status Menu Dengan ID 31 Tersedia', '2023-09-11 07:42:47'),
(223, 6, 'Status Menu Dengan ID 30 Tersedia', '2023-09-11 07:42:50'),
(224, 6, 'Status Menu Dengan ID 29 Tersedia', '2023-09-11 07:42:53'),
(225, 6, 'Status Menu Dengan ID 21 Tersedia', '2023-09-11 07:42:58'),
(226, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-11 07:44:43'),
(227, 7, 'Menghapus Menu Dari Keranjang Dengan ID 36', '2023-09-11 07:44:51'),
(228, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 07:54:42'),
(229, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-11 07:54:46'),
(230, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-11 07:55:24'),
(231, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 07:55:32'),
(232, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-11 07:55:51'),
(233, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 07:55:55'),
(234, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-11 07:57:06'),
(235, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-11 07:57:11'),
(236, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-11 07:59:16'),
(237, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-11 08:02:00'),
(238, 7, 'Menghapus Menu Dari Keranjang Dengan ID 40', '2023-09-11 08:02:08'),
(239, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 28', '2023-09-11 08:02:14'),
(240, 7, 'Menghapus Menu Dari Keranjang Dengan ID 41', '2023-09-11 08:02:18'),
(241, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-11 08:03:46'),
(242, 7, 'Menghapus Menu Dari Keranjang Dengan ID 42', '2023-09-11 08:03:53'),
(243, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 30', '2023-09-11 08:04:00'),
(244, 7, 'Menghapus Menu Dari Keranjang Dengan ID 43', '2023-09-11 08:04:05'),
(245, 7, 'Mengedit Profile asep sumanto', '2023-09-11 08:08:04'),
(246, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 08:08:12'),
(247, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 08:08:16'),
(248, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 08:10:17'),
(249, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 08:10:28'),
(250, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-11 08:48:53'),
(251, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-11 09:44:42'),
(252, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-11 09:44:50'),
(253, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 32', '2023-09-11 09:44:54'),
(254, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-11 09:44:59'),
(255, 7, 'Menghapus Menu Dari Keranjang Dengan ID 37', '2023-09-11 09:52:32'),
(256, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 19:26:33'),
(257, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 20:16:36'),
(258, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 20:28:56'),
(259, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-11 22:06:01'),
(260, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-11 23:18:03'),
(261, 7, 'Menghapus Menu Dari Keranjang Dengan ID 44', '2023-09-11 23:28:05'),
(262, 7, 'Menghapus Menu Dari Keranjang Dengan ID 46', '2023-09-11 23:57:24'),
(263, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:05:42'),
(264, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 22', '2023-09-12 00:08:30'),
(265, 7, 'Menghapus Menu Dari Keranjang Dengan ID 49', '2023-09-12 00:09:09'),
(266, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:09:40'),
(267, 7, 'Menghapus Menu Dari Keranjang Dengan ID 45', '2023-09-12 00:23:06'),
(268, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-12 00:44:59'),
(269, 6, 'Status Menu Dengan ID 34 Tidak Tersedia', '2023-09-12 00:45:07'),
(270, 6, 'Status Menu Dengan ID 30 Tidak Tersedia', '2023-09-12 00:45:18'),
(271, 6, 'Status Menu Dengan ID 35 Tidak Tersedia', '2023-09-12 00:45:37'),
(272, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:48:25'),
(273, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-12 00:48:33'),
(274, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:54:54'),
(275, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:54:57'),
(276, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-12 00:59:56'),
(277, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 34', '2023-09-12 01:00:00'),
(278, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 34', '2023-09-12 01:00:54'),
(279, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 29', '2023-09-12 01:03:29'),
(280, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-12 01:14:22'),
(281, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 32', '2023-09-12 01:14:26'),
(282, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-12 01:25:08'),
(283, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-12 01:54:54'),
(284, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-12 06:18:27'),
(285, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-12 06:18:51'),
(286, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 32', '2023-09-12 06:31:25'),
(287, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-12 06:39:43'),
(288, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 21', '2023-09-12 06:39:49'),
(289, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-12 06:39:56'),
(290, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-12 06:42:29'),
(291, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-12 07:01:14'),
(292, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-12 07:59:38'),
(293, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 08:07:18'),
(294, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-12 08:07:21'),
(295, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-12 08:07:23'),
(296, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-12 21:55:11'),
(297, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 21:55:53'),
(298, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 21:56:01'),
(299, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 21:57:46'),
(300, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 21:59:29'),
(301, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:00:38'),
(302, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:00:54'),
(303, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:03:31'),
(304, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:05:50'),
(305, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-12 22:06:58'),
(306, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:08:25'),
(307, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:08:40'),
(308, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:09:03'),
(309, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:09:11'),
(310, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:09:25'),
(311, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:09:31'),
(312, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 22:10:07'),
(313, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:01:10'),
(314, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:01:22'),
(315, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:01:46'),
(316, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:01:53'),
(317, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:02:00'),
(318, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:02:04'),
(319, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:02:15'),
(320, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:03:10'),
(321, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:03:23'),
(322, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:03:38'),
(323, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:04:36'),
(324, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:04:46'),
(325, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:08:29'),
(326, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:08:38'),
(327, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:08:54'),
(328, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:09:05'),
(329, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:10:10'),
(330, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:10:22'),
(331, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:11:49'),
(332, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:12:01'),
(333, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:12:42'),
(334, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:13:34'),
(335, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:13:45'),
(336, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:14:16'),
(337, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:14:26'),
(338, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:14:40'),
(339, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:14:46'),
(340, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:14:56'),
(341, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:16:26'),
(342, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:16:42'),
(343, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:16:50'),
(344, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:17:03'),
(345, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:18:52'),
(346, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:18:58'),
(347, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:19:03'),
(348, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:19:12'),
(349, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:21:20'),
(350, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:22:00'),
(351, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:22:24'),
(352, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:23:21'),
(353, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:23:32'),
(354, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:26:17'),
(355, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:26:48'),
(356, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:26:59'),
(357, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:27:05'),
(358, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:27:52'),
(359, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:28:17'),
(360, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:28:25'),
(361, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:28:58'),
(362, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:29:21'),
(363, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:29:46'),
(364, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:29:54'),
(365, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:30:01'),
(366, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:30:54'),
(367, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:31:16'),
(368, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:31:22'),
(369, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:31:28'),
(370, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:31:33'),
(371, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:31:39'),
(372, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:35:30'),
(373, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:35:44'),
(374, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:35:53'),
(375, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:36:34'),
(376, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:37:43'),
(377, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:38:06'),
(378, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:38:30'),
(379, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:39:04'),
(380, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:39:14'),
(381, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:39:44'),
(382, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-12 23:39:55'),
(383, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:16:04'),
(384, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:17:05'),
(385, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:28:41'),
(386, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:28:55'),
(387, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 00:30:02'),
(388, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 00:34:44'),
(389, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 23', '2023-09-13 00:36:47'),
(390, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:37:48'),
(391, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:37:56'),
(392, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:38:15'),
(393, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:38:32'),
(394, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:38:41'),
(395, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:38:59'),
(396, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:39:20'),
(397, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:47:26'),
(398, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:47:38'),
(399, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:47:44'),
(400, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:47:57'),
(401, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-13 00:48:04'),
(402, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:48:05'),
(403, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:49:36'),
(404, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:49:51'),
(405, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 00:50:00'),
(406, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 00:51:26'),
(407, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 00:54:00'),
(408, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 00:56:02'),
(409, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 01:06:01'),
(410, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 06:22:36'),
(411, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 06:23:28'),
(412, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 06:24:26'),
(413, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 06:25:52'),
(414, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 06:28:12'),
(415, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:30:41'),
(416, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:31:47'),
(417, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:33:55'),
(418, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:33:59'),
(419, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:39:40'),
(420, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:40:38'),
(421, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:44:37'),
(422, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:46:26'),
(423, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:51:01'),
(424, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:51:37'),
(425, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:55:15'),
(426, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:55:19'),
(427, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:57:09'),
(428, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 06:57:29'),
(429, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:01:47'),
(430, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:03:04'),
(431, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:03:29'),
(432, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 07:04:13'),
(433, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 29', '2023-09-13 07:04:21'),
(434, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 07:05:30'),
(435, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:05:41'),
(436, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:10:04'),
(437, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:13:47'),
(438, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:19:22'),
(439, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:20:11'),
(440, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 07:20:47'),
(441, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 07:32:19'),
(442, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 07:32:34'),
(443, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 08:25:20'),
(444, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 08:25:25'),
(445, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-13 08:25:43'),
(446, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-13 08:25:48'),
(447, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-13 08:28:32'),
(448, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 08:28:35'),
(449, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-13 08:28:48'),
(450, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 08:28:57'),
(451, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 08:29:35'),
(452, 6, 'Mengganti Password Dengan ID 6', '2023-09-13 08:40:01'),
(453, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 08:40:01'),
(454, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 08:40:04'),
(455, 6, 'Mengganti Password Dengan ID 6', '2023-09-13 08:40:16'),
(456, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 08:40:16'),
(457, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 08:40:21'),
(458, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 08:41:23'),
(459, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-13 08:50:54'),
(460, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-13 08:51:06'),
(461, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-13 09:08:45'),
(462, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-13 20:46:56'),
(463, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-13 20:48:56'),
(464, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 20:49:43'),
(465, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 20:50:04'),
(466, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 20:50:18'),
(467, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-13 20:50:25'),
(468, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-13 20:50:41'),
(469, 6, 'Menampilkan Laporan Pendapatan Dengan Format Excel', '2023-09-13 20:50:54'),
(470, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 35', '2023-09-13 20:52:05'),
(471, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 34', '2023-09-13 20:52:16'),
(472, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-13 20:55:03'),
(473, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 32', '2023-09-13 20:55:08'),
(474, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 29', '2023-09-13 20:59:56'),
(475, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-13 21:01:57'),
(476, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 21', '2023-09-13 21:03:37'),
(477, 7, 'Membayar Makanan Dari Keranjang Dengan No Meja 4', '2023-09-13 21:04:11'),
(478, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-13 21:04:41'),
(479, 7, 'Menghapus Menu Dari Keranjang Dengan ID 75', '2023-09-13 21:04:47'),
(480, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-13 21:05:52'),
(481, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 34', '2023-09-13 21:31:13'),
(482, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-13 21:31:17'),
(483, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 2', '2023-09-13 21:31:23'),
(484, 7, 'Membayar Makanan Dari Keranjang Dengan No Meja 1', '2023-09-13 21:32:07'),
(485, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-13 21:33:11'),
(486, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-13 21:33:16'),
(487, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-14 00:05:09'),
(488, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-14 00:13:54'),
(489, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-14 00:27:24'),
(490, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-14 00:36:19'),
(491, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-14 01:42:38'),
(492, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-14 01:43:36'),
(493, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-14 01:43:55'),
(494, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-14 07:46:21'),
(495, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-14 10:56:12'),
(496, 4, 'Mengedit Akun Pegawai okta lika ng Dengan ID 6', '2023-09-14 10:56:34'),
(497, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-14 10:56:41'),
(498, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-14 10:56:51'),
(499, 6, 'Menambah Menu 1', '2023-09-14 10:57:02'),
(500, 6, 'Mengedit Menu 1 Dengan Id 36', '2023-09-14 10:57:17'),
(501, 6, 'Menghapus Menu Dengan ID 36', '2023-09-14 10:57:22'),
(502, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-14 10:57:27'),
(503, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-14 10:57:40'),
(504, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-14 10:58:05'),
(505, 7, 'Membayar Makanan Dari Keranjang Dengan No Meja 1', '2023-09-14 10:58:20'),
(506, 7, 'Membayar Makanan Dari Keranjang Dengan No Meja 1', '2023-09-14 10:58:21'),
(507, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-14 10:58:27'),
(508, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-15 01:14:15'),
(509, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-15 01:28:51'),
(510, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-15 22:00:59'),
(511, 4, 'Mengedit Website N - Nick Frosh Restaurant_SPH', '2023-09-15 22:02:34'),
(512, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-15 22:02:34'),
(513, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-15 22:02:53'),
(514, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-15 22:04:13'),
(515, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-15 22:04:24'),
(516, 6, 'Menambah Menu 1', '2023-09-15 22:05:07'),
(517, 6, 'Status Menu Dengan ID 37 Tersedia', '2023-09-15 22:05:52'),
(518, 6, 'Mengedit Menu roti Dengan Id 37', '2023-09-15 22:06:24'),
(519, 6, 'Menghapus Menu Dengan ID 37', '2023-09-15 22:06:31'),
(520, 6, 'Menampilkan Laporan Pendapatan Dengan Format Print', '2023-09-15 22:08:19'),
(521, 6, 'Menampilkan Laporan Pendapatan Dengan Format PDF', '2023-09-15 22:09:05'),
(522, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-15 22:09:15'),
(523, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-15 22:09:21'),
(524, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 33', '2023-09-15 22:09:54'),
(525, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 5', '2023-09-15 22:10:05'),
(526, 7, 'Menghapus Menu Dari Keranjang Dengan ID 82', '2023-09-15 22:10:30'),
(527, 7, 'Membayar Makanan Dari Keranjang Dengan No Meja 20', '2023-09-15 22:11:16'),
(528, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-15 22:22:41'),
(529, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-15 22:32:14'),
(530, 4, 'Mengedit Website N - Nick Frosh Restaurant_SPH', '2023-09-15 22:32:50'),
(531, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-15 22:32:50'),
(532, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-15 22:33:04'),
(533, 4, 'Mengedit Website N - Nick Frosh Restaurant', '2023-09-15 22:33:15'),
(534, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-15 22:33:15'),
(535, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-15 23:26:17'),
(536, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-15 23:40:59'),
(537, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-15 23:41:16'),
(538, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-15 23:48:34'),
(539, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-15 23:48:42'),
(540, 7, 'Menambahkan Menu Ke Keranjang Dengan ID 32', '2023-09-15 23:48:53'),
(541, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-17 02:24:54'),
(542, 4, 'Menambah Akun Pegawai 12121', '2023-09-17 02:51:32'),
(543, 4, 'Menghapus Akun Pegawai Dengan ID 20', '2023-09-17 02:51:36'),
(544, 4, 'Menambah Akun Pegawai 1', '2023-09-17 03:04:15'),
(545, 4, 'Menghapus Akun Pegawai Dengan ID 21', '2023-09-17 03:04:18'),
(546, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-17 03:15:54'),
(547, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-17 03:44:55'),
(548, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-17 03:58:26'),
(549, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-17 23:34:37'),
(550, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-17 23:35:31'),
(551, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-18 05:54:05'),
(552, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-21 22:38:19'),
(553, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-21 22:51:35'),
(554, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-21 22:57:45'),
(555, 7, 'Logout Dari Sistem Dengan Akun ID 7', '2023-09-21 23:14:08'),
(556, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-09-21 23:14:20'),
(557, 6, 'Logout Dari Sistem Dengan Akun ID 6', '2023-09-21 23:14:26'),
(558, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-09-21 23:14:36'),
(559, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-09-21 23:15:01'),
(560, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-21 23:15:07'),
(561, 7, 'Login Pada Sistem Dengan Akun ID 7', '2023-09-28 07:53:20'),
(562, 4, 'Login Pada Sistem Dengan Akun ID 4', '2023-10-03 21:55:28'),
(563, 4, 'Logout Dari Sistem Dengan Akun ID 4', '2023-10-03 21:55:36'),
(564, 6, 'Login Pada Sistem Dengan Akun ID 6', '2023-10-03 21:55:42'),
(565, 6, 'Status Menu Dengan ID 35 Tersedia', '2023-10-03 21:55:51'),
(566, 6, 'Status Menu Dengan ID 35 Tidak Tersedia', '2023-10-03 21:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(4) NOT NULL,
  `foto_menu` text NOT NULL,
  `nama_menu` text NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `harga_menu` text NOT NULL,
  `status` varchar(1000) NOT NULL,
  `tanggal_menu` datetime NOT NULL DEFAULT current_timestamp(),
  `maker_menu` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `foto_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`, `status`, `tanggal_menu`, `maker_menu`) VALUES
(2, '1694403410_32c81553cd30f885e023.jpeg', 'pizza', 'Pizza is a flat, round bread with a diameter of 30 cm that is baked in the oven and usually smothered in tomato sauce and cheese and with other additional foods (toppings) according to the taste of the connoisseur.', '100000', 'Menu Tersedia', '2023-09-04 20:10:41', 6),
(5, '1694403399_9e720d31c593a4809c8e.jpeg', 'es kopi susu', 'Milk coffee is a coffee drink mixed with milk, generally made using certain methods ranging from traditional coffee mixed with milk to coffee mixed with milk made by baristas in coffee shops.', '20000', 'Menu Tersedia', '2023-09-05 11:26:27', 6),
(21, '1694403759_8dade5a9ba97c2c4fca2.jpg', 'choco crunchy waffle', 'Waffles in Indonesia are made with a sweet taste so this snack has become a favorite, especially among teenagers (Alexandra, 2009). a cup of warm coffee or tea. The main ingredient for making waffles is generally flour or you can use wheat, milk, sugar, butter, eggs and baking powder.', '22000', 'Menu Tersedia', '2023-09-11 10:42:39', 6),
(22, '1694403823_22be69b635b16f2f2109.jpg', 'nick frosh plater', 'A platter is a large type of dishware used for serving food. It is a tray on which food is displayed and served to people. Its shape can be oval, round, rectangular, or square. It can be made of metal, ceramic, plastic, glass or wood.', '48000', '<span style=\"color: red;\">Tidak Tersedia</span>', '2023-09-11 10:43:43', 6),
(23, '1694403860_a7c3c7925b2c904587a6.jpg', 'risoles', 'A rissole is a small patty created in France, enclosed in pastry, or rolled in breadcrumbs, usually baked or deep fried. The filling has savory ingredients, most often minced meat, fish or cheese, and is served as an entrée, main course, or side dish.', '28000', 'Menu Tersedia', '2023-09-11 10:44:20', 6),
(28, '1694435793_ef2c17c262cfd9447a3a.jpg', 'sausage waffle', '-', '25000', '<span style=\"color: red;\">Tidak Tersedia</span>', '2023-09-11 19:36:33', 6),
(29, '1694435824_826a33bd2fbf52160a47.jpg', 'smoked beef waffle', '-', '37000', 'Menu Tersedia', '2023-09-11 19:37:04', 6),
(30, '1694435852_b9324f86bfea01aa80ba.jpg', 'smoked chicken waffle', '-', '35000', '<span style=\"color: red;\">Tidak Tersedia</span>', '2023-09-11 19:37:32', 6),
(31, '1694435916_498e79263fa9740bf2a3.jpg', 'waffle kaya butter', '-', '25000', 'Menu Tersedia', '2023-09-11 19:38:36', 6),
(32, '1694435969_a2993f6813bb6aabb12d.jpg', 'mie bangladesh nyemek', '-', '29000', 'Menu Tersedia', '2023-09-11 19:39:29', 6),
(33, '1694436023_965cfff57183061f3aaf.jpg', 'nasi telur sambal matah', '-', '18000', 'Menu Tersedia', '2023-09-11 19:40:23', 6),
(34, '1694436066_6810d37c82415aa4492b.jpg', 'spicy curry rendang', '-', '38000', '<span style=\"color: red;\">Tidak Tersedia</span>', '2023-09-11 19:41:06', 6),
(35, '1694436109_542bd64e21f2629bdc3b.jpg', 'salted egg chicken', '-', '38000', '<span style=\"color: red;\">Tidak Tersedia</span>', '2023-09-11 19:41:49', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `id_user_pengguna` int(4) NOT NULL,
  `nama_pengguna` varchar(1000) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `tanggal_pengguna` datetime NOT NULL DEFAULT current_timestamp(),
  `maker_pengguna` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_user_pengguna`, `nama_pengguna`, `jk`, `email`, `tanggal_pengguna`, `maker_pengguna`) VALUES
(2, 4, 'norman ang', 'Male', 'norman@gmail.com', '2023-09-03 18:33:09', 4),
(4, 6, 'okta lika ng', 'Male', 'okta1_ng@gmail.com', '2023-09-05 11:54:19', 4),
(5, 7, 'asep sumanto', 'Male', 'asep.sumantoaja@gmail.com', '2023-09-05 12:11:59', 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings_website`
--

CREATE TABLE `settings_website` (
  `id_settings` int(11) NOT NULL,
  `foto` text NOT NULL,
  `text` text NOT NULL,
  `login` text NOT NULL,
  `nama_website` text NOT NULL,
  `dipakai` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_website`
--

INSERT INTO `settings_website` (`id_settings`, `foto`, `text`, `login`, `nama_website`, `dipakai`) VALUES
(1, '1694835195_ae5836d669887b47ce72.png', '1694180541_5ad2311127ca64181fcd.png', '1694181162_9a3772f90206c48ead1a.jpeg', 'N - Nick Frosh Restaurant', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `no_meja` varchar(100) NOT NULL,
  `dengan` varchar(1000) NOT NULL,
  `pembayaran` varchar(5) NOT NULL,
  `total_harga` varchar(1000) NOT NULL,
  `dibayar` varchar(1000) NOT NULL,
  `kembalian` varchar(1000) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_laporan` date NOT NULL DEFAULT current_timestamp(),
  `maker_transaksi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_meja`, `dengan`, `pembayaran`, `total_harga`, `dibayar`, `kembalian`, `tanggal_transaksi`, `tanggal_laporan`, `maker_transaksi`) VALUES
(34, 'Table 1', 'norman', 'Cash', '92000', '100000', 'Rp 8.000,00', '2023-09-14 09:32:07', '2023-09-14', 7),
(35, 'Table 1', '1', 'Cash', '18000', '18000', 'Rp 0,00', '2023-09-14 22:58:20', '2023-09-14', 7),
(36, 'Table 1', '1', 'Cash', '18000', '18000', 'Rp 0,00', '2023-09-14 22:58:21', '2023-09-14', 7),
(37, 'Table 20', 'norman', 'Cash', '36000', '40000', 'Rp 4.000,00', '2023-09-16 10:11:16', '2023-09-16', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1694351728_8979d92a362f5a64f4a0.jpeg'),
(6, 'manager', '1d0258c2440a8d19e716292b231e3190', 2, '1693975655_93bdd0c041f5f517396b.jpg'),
(7, 'Cashier 01', 'fb53afae97460f01995f9aa75a4ff5ac', 3, '1693975559_037a4b9099adcff79ac3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `NAMA_MENU` (`nama_menu`) USING HASH;

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `E-MAIL` (`email`) USING HASH;

--
-- Indexes for table `settings_website`
--
ALTER TABLE `settings_website`
  ADD PRIMARY KEY (`id_settings`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `USERNAME` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings_website`
--
ALTER TABLE `settings_website`
  MODIFY `id_settings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
