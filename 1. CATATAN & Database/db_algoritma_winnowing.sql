-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 10:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_algoritma_winnowing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(4) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `browser` varchar(25) DEFAULT NULL,
  `peramban_web` text,
  `sistem_operasi` text,
  `keterangan` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `ip`, `browser`, `peramban_web`, `sistem_operasi`, `keterangan`, `created`, `modified`) VALUES
(1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Moehammad Rizki Karianata telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-07 19:06:23', '2021-07-07 19:06:23'),
(2, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Moehammad Rizki Karianata telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-07 19:16:08', '2021-07-07 19:16:08'),
(3, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Moehammad Rizki Karianata telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-08 13:18:11', '2021-07-08 13:18:11'),
(4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Ferhan Davala telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-08 13:47:26', '2021-07-08 13:47:26'),
(5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Moehammad Rizki Karianata telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-08 16:21:10', '2021-07-08 16:21:10'),
(6, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Anisya Rahmawati telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-08 16:22:30', '2021-07-08 16:22:30'),
(7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Anisya Rahmawati telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-09 07:29:09', '2021-07-09 07:29:09'),
(8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Moehammad Rizki Karianata telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-09 15:23:17', '2021-07-09 15:23:17'),
(9, '139.228.62.76', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu 139.228.62.76 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:34:38', '2021-07-09 16:34:38'),
(10, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:41:37', '2021-07-09 16:41:37'),
(11, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Jafar Sidil telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:44:20', '2021-07-09 16:44:20'),
(12, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:44:55', '2021-07-09 16:44:55'),
(13, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Jafar Sidil telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:51:29', '2021-07-09 16:51:29'),
(14, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:55:11', '2021-07-09 16:55:11'),
(15, '180.246.150.246', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Jafar Sidil telah masuk ke dalam aplikasi dengan alamat ip yaitu 180.246.150.246 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 16:57:03', '2021-07-09 16:57:03'),
(16, '139.228.62.76', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu 139.228.62.76 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 17:25:32', '2021-07-09 17:25:32'),
(17, '139.228.62.76', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', 'Agung Dwi Pratama telah masuk ke dalam aplikasi dengan alamat ip yaitu 139.228.62.76 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Linux moltres.rapidplex.com 3.10.0-962.3.2.lve1.5.49.el7.x86_64 #1 SMP Thu Mar 4 05:39:46 EST 2021 x86_64', '2021-07-09 17:26:32', '2021-07-09 17:26:32'),
(18, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-29 20:03:58', '2021-07-29 20:03:58'),
(19, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Dosen Pembimbing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-29 20:12:47', '2021-07-29 20:12:47'),
(20, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-29 20:23:18', '2021-07-29 20:23:18'),
(21, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-07-30 13:56:41', '2021-07-30 13:56:41'),
(22, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 19:37:19', '2021-10-25 19:37:19'),
(23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 19:38:09', '2021-10-25 19:38:09'),
(24, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Ferhan Davala telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:02:56', '2021-10-25 20:02:56'),
(25, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Agung Dwi Pratama telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:03:42', '2021-10-25 20:03:42'),
(26, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:05:26', '2021-10-25 20:05:26'),
(27, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Agung Dwi Pratama telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:08:09', '2021-10-25 20:08:09'),
(28, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:09:17', '2021-10-25 20:09:17'),
(29, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', 'Agung Dwi Pratama telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT RASTAYOUTHCREW 6.3 build 9600 (Windows 8.1 Professional Edition) AMD64', '2021-10-25 20:09:49', '2021-10-25 20:09:49'),
(30, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', '2021-10-29 12:29:08', '2021-10-29 12:29:08'),
(31, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', 'Akhmad Ramadhan telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', '2021-10-29 12:36:24', '2021-10-29 12:36:24'),
(32, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT LAPTOP-T0S77PNL 10.0 build 18363 (Windows 10) AMD64', '2021-10-29 12:36:34', '2021-10-29 12:36:34'),
(33, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-04 14:59:48', '2023-04-04 14:59:48'),
(34, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-04 15:02:03', '2023-04-04 15:02:03'),
(35, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Dosen Pembimbing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-04 15:02:17', '2023-04-04 15:02:17'),
(36, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-05 10:39:24', '2023-04-05 10:39:24'),
(37, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Budi telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-05 10:57:07', '2023-04-05 10:57:07'),
(38, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-05 12:57:57', '2023-04-05 12:57:57'),
(39, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-05 13:11:30', '2023-04-05 13:11:30'),
(40, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-28 16:13:57', '2023-04-28 16:13:57'),
(41, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Budi telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-28 16:14:32', '2023-04-28 16:14:32'),
(42, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', 'Admin Algoritma Winnowing telah masuk ke dalam aplikasi dengan alamat ip yaitu ::1 menggunakan browser Chrome dan sistem operasi yang digunakan adalah Windows NT ANDROID-CE03DC2 6.2 build 9200 (Windows 8 Home Premium Edition) AMD64', '2023-04-28 16:15:03', '2023-04-28 16:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_kemiripan`
--

CREATE TABLE `tb_hasil_kemiripan` (
  `id_hasil_kemiripan` int(4) NOT NULL,
  `fk_judul_mahasiswa` int(11) DEFAULT NULL,
  `fk_judul_skripsi` int(11) DEFAULT NULL,
  `fk_mahasiswa` int(11) DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hasil_kemiripan`
--

INSERT INTO `tb_hasil_kemiripan` (`id_hasil_kemiripan`, `fk_judul_mahasiswa`, `fk_judul_skripsi`, `fk_mahasiswa`, `hasil`, `created`, `modified`) VALUES
(3, 9, 3, 7, 12.18, '2021-07-09 13:35:25', '2021-07-09 13:35:25'),
(4, 10, 5, 8, 9.92, '2021-07-09 16:51:54', '2021-07-09 16:51:54'),
(16, 24, 4, 18, 19.05, '2021-07-30 14:55:57', '2021-07-30 14:55:57'),
(22, 30, 25, 4, 16.18, '2021-10-25 20:10:08', '2021-10-25 20:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul_mahasiswa`
--

CREATE TABLE `tb_judul_mahasiswa` (
  `id_judul_mahasiswa` int(4) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `fk_mahasiswa` int(4) DEFAULT NULL,
  `judul` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_judul_mahasiswa`
--

INSERT INTO `tb_judul_mahasiswa` (`id_judul_mahasiswa`, `kode`, `fk_mahasiswa`, `judul`, `created`, `modified`) VALUES
(9, 'JM0001', 7, 'Sistem Pendukung Keputusan Pemilihan Kartu Perdana GSM Menggunakan Profile Matching', '2021-07-09 13:35:24', '2021-07-09 13:35:24'),
(10, 'JM0002', 8, 'Aplikasi Penjualan Bapak Parno Berbasis Web', '2021-07-09 16:51:54', '2021-07-09 16:51:54'),
(24, 'JM0004', 18, 'Aplikasi Deteksi Virus Covid-19 Menggunakan Metode Sinar Infra Merah', '2021-07-30 14:55:57', '2021-07-30 14:55:57'),
(30, 'JM0005', 4, 'Aplikasi Pencetak Uang Dalam Satuan Rupiah', '2021-10-25 20:10:08', '2021-10-25 20:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul_skripsi`
--

CREATE TABLE `tb_judul_skripsi` (
  `id_judul_skripsi` int(4) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `fk_mahasiswa` int(4) DEFAULT NULL,
  `judul` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_judul_skripsi`
--

INSERT INTO `tb_judul_skripsi` (`id_judul_skripsi`, `kode`, `fk_mahasiswa`, `judul`, `created`, `modified`) VALUES
(3, 'JS0001', 6, 'Penerapan Metode Promethee Dalam Penentuan Juara Kontes Kucing', '2021-07-08 13:46:13', '2021-10-29 12:42:49'),
(4, 'JS0002', 21, 'Implementasi Metode Weighted Product (WP) Pada Seleksi Penerimaan Tenaga Kontrak', '2021-07-08 13:46:25', '2021-10-29 12:46:56'),
(5, 'JS0003', 5, 'Predeksi Jumlah Penjualan Buku Menggunakan Metode Rata-Rata Bergerak (Moving Average)', '2021-07-08 13:46:38', '2021-10-29 12:45:05'),
(12, 'JS0004', 7, 'Penerapan Metode SAW Untuk Seleksi Operator Excavator Tetap Pada Pt. Panghegar Mitra Utama', '2021-07-09 13:35:25', '2021-10-29 12:45:26'),
(14, 'JS0005', 8, 'Aplikasi Pembelian Dan Penjualan Pada Toko Buku Amanah', '2021-07-09 16:51:54', '2021-10-29 12:45:41'),
(23, 'JS0006', 18, 'Klasifikasi Penerimaan Bantuan Stimulan Perumahan Swadaya Dengan Metode Bayesian Classification', '2021-07-30 14:55:57', '2021-10-29 12:45:54'),
(24, 'JS0007', 19, 'Sistem Penunjang Keputusan Pemilihan Power Bank Sesuai Kebutuhan Menggunakan Metode Analytical Hierarchy Process (AHP)', '2021-10-25 20:07:28', '2021-10-29 12:46:09'),
(25, 'JS0008', 20, 'Penilaian Proposal Untuk Bantuan Modal Usaha Kupp Dengan SAW', '2021-10-25 20:07:54', '2021-10-29 12:46:27'),
(27, 'JS0009', 4, 'Aplikasi Penjualan Hasil Produksi Besi', '2021-10-25 20:10:08', '2021-10-29 12:44:52'),
(28, 'JS0010', 22, 'hello world', '2023-04-28 16:14:41', '2023-04-28 16:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `id_konfigurasi` int(4) NOT NULL,
  `persentase` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `persentase`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(4) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fk_prodi` int(4) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT 'Laki - Laki',
  `alamat` text,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `kode`, `nim`, `telepon`, `email`, `fk_prodi`, `nama_mahasiswa`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `created`, `modified`) VALUES
(4, 'MH0001', '310109011333', '0895395333200', 'ArviAdhariyani@gmail.com', 2, 'Arvi Adhariyani', 'Laki - Laki', '-', 'Malang', '1998-11-05', '2021-07-07 21:31:10', '2021-10-29 12:37:51'),
(5, 'MH0002', '310109011469', '089654780912', 'BambangPurnomo@gmail.com', 2, 'Bambang Purnomo', 'Laki - Laki', '-', 'Malang', '2003-10-15', '2021-07-07 22:32:02', '2021-10-29 12:38:13'),
(6, 'MH0003', '310109011379', '082147980092', 'YunitaFitrianti@gmail.com', 2, 'Yunita Fitrianti', 'Perempuan', '-', 'Malang', '2000-09-12', '2021-07-07 23:38:04', '2021-10-29 12:38:41'),
(7, 'MH0004', '310109011435', '089654780911', 'BimaLuvyendraEdyPerkasa@gmail.com', 2, 'Bima Luvyendra Edy Perkasa', 'Laki - Laki', '-', 'Bogor', '1999-09-01', '2021-07-08 16:22:16', '2021-10-29 12:39:14'),
(8, 'MH0005', '310109011427', '081226410815', 'DekyAlfian@gmail.com', 2, 'Deky Alfian', 'Laki - Laki', 'jl. jafri', 'Banjarmasin', '1994-08-29', '2021-07-09 16:43:22', '2021-10-29 12:39:37'),
(18, 'MH0006', '310109011359', '0987654', 'Mustika@gmail.com', 2, 'Mustika', 'Perempuan', 'banjarbaru', 'Banjarbaru', '1997-06-09', '2021-07-30 14:55:57', '2021-10-29 12:40:02'),
(19, 'MH0007', '310108011078', '089237661772', 'KhairulMutahir@gmail.com', 2, 'Khairul Mutahir', 'Laki - Laki', '-', 'Malang', '2002-01-01', '2021-10-25 20:06:47', '2021-10-29 12:41:55'),
(20, 'MH0008', '310109011341', '0891327616622', 'Maslianita@gmail.com', 2, 'Maslianita', 'Perempuan', '-', 'Malang', '2002-01-01', '2021-10-25 20:07:08', '2021-10-29 12:42:23'),
(21, 'MH0009', '310109011478', '087654323456', 'MiftahRizki@gmail.com', 2, 'Miftah Rizki', 'Laki - Laki', '-', 'Banjarbaru', '1996-01-29', '2021-10-29 12:44:20', '2021-10-29 12:44:20'),
(22, 'MH0010', '123456789012', '87998', 'fgd@gmail.com', 3, 'Budi', 'Laki - Laki', 'kbkj', 'Bhkn', '2023-04-25', '2023-04-05 10:56:53', '2023-04-05 10:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` enum('Admin','Mahasiswa','Dosen') DEFAULT 'Mahasiswa',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `kode`, `email`, `nama_lengkap`, `username`, `password`, `level`, `created`, `modified`) VALUES
(1, 'AD0001', 'akhmadramadhan187@gmail.com', 'Akhmad Ramadhan', 'akhmad ramadhan', '310117023199', 'Admin', '2021-07-07 18:55:42', '2021-10-29 12:35:59'),
(5, 'MH0001', 'ArviAdhariyani@gmail.com', 'Arvi Adhariyani', '310109011333', '310109011333', 'Mahasiswa', '2021-07-07 21:31:10', '2021-10-29 12:37:51'),
(6, 'MH0002', 'BambangPurnomo@gmail.com', 'Bambang Purnomo', '310109011469', '310109011469', 'Mahasiswa', '2021-07-07 22:32:02', '2021-10-29 12:38:13'),
(7, 'MH0003', 'YunitaFitrianti@gmail.com', 'Yunita Fitrianti', '310109011379', '310109011379', 'Mahasiswa', '2021-07-07 23:38:04', '2021-10-29 12:38:41'),
(8, 'MH0004', 'BimaLuvyendraEdyPerkasa@gmail.com', 'Bima Luvyendra Edy Perkasa', '310109011435', '310109011435', 'Mahasiswa', '2021-07-08 16:22:16', '2021-10-29 12:39:14'),
(9, 'AD0002', 'admin_algoritma@gmail.com', 'Admin Algoritma Winnowing', 'admin', 'admin', 'Admin', '2021-07-09 15:56:36', '2021-07-09 15:56:36'),
(10, 'MH0005', 'DekyAlfian@gmail.com', 'Deky Alfian', '310109011427', '310109011427', 'Mahasiswa', '2021-07-09 16:43:22', '2021-10-29 12:39:37'),
(12, 'AD0003', 'dosen_pembimbing@gmail.com', 'Dosen Pembimbing', 'dosen', 'dosen', 'Dosen', '2021-07-29 20:12:38', '2021-07-29 20:12:38'),
(22, 'MH0006', 'Mustika@gmail.com', 'Mustika', '310109011359', '310109011359', 'Mahasiswa', '2021-07-30 14:55:57', '2021-10-29 12:40:02'),
(23, 'MH0007', 'KhairulMutahir@gmail.com', 'Khairul Mutahir', '310108011078', '310108011078', 'Mahasiswa', '2021-10-25 20:06:47', '2021-10-29 12:41:55'),
(24, 'MH0008', 'Maslianita@gmail.com', 'Maslianita', '310109011341', '310109011341', 'Mahasiswa', '2021-10-25 20:07:08', '2021-10-29 12:42:23'),
(25, 'MH0009', 'MiftahRizki@gmail.com', 'Miftah Rizki', '310109011478', '310109011478', 'Mahasiswa', '2021-10-29 12:44:20', '2021-10-29 12:44:20'),
(26, 'MH0010', 'fgd@gmail.com', 'Budi', '123456789012', '123456789012', 'Mahasiswa', '2023-04-05 10:56:53', '2023-04-05 10:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(4) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `kode`, `nama_prodi`, `created`, `modified`) VALUES
(2, 'PR0001', 'Sistem Informasi', '2021-07-07 19:54:55', '2021-10-29 12:34:16'),
(3, 'PR0002', 'Teknik Informatika', '2021-07-07 19:55:06', '2021-10-29 12:34:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tb_hasil_kemiripan`
--
ALTER TABLE `tb_hasil_kemiripan`
  ADD PRIMARY KEY (`id_hasil_kemiripan`),
  ADD KEY `FK_tb_hasil_kemiripan_tb_judul_mahasiswa` (`fk_judul_mahasiswa`),
  ADD KEY `FK_tb_hasil_kemiripan_tb_judul_skripsi` (`fk_judul_skripsi`),
  ADD KEY `FK_tb_hasil_kemiripan_tb_mahasiswa` (`fk_mahasiswa`);

--
-- Indexes for table `tb_judul_mahasiswa`
--
ALTER TABLE `tb_judul_mahasiswa`
  ADD PRIMARY KEY (`id_judul_mahasiswa`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `FK_tb_judul_mahasiswa_tb_mahasiswa` (`fk_mahasiswa`);

--
-- Indexes for table `tb_judul_skripsi`
--
ALTER TABLE `tb_judul_skripsi`
  ADD PRIMARY KEY (`id_judul_skripsi`) USING BTREE,
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `FK_tb_judul_tb_mahasiswa` (`fk_mahasiswa`);

--
-- Indexes for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `telepon` (`telepon`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_tb_mahasiswa_tb_prodi` (`fk_prodi`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_hasil_kemiripan`
--
ALTER TABLE `tb_hasil_kemiripan`
  MODIFY `id_hasil_kemiripan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_judul_mahasiswa`
--
ALTER TABLE `tb_judul_mahasiswa`
  MODIFY `id_judul_mahasiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_judul_skripsi`
--
ALTER TABLE `tb_judul_skripsi`
  MODIFY `id_judul_skripsi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id_konfigurasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hasil_kemiripan`
--
ALTER TABLE `tb_hasil_kemiripan`
  ADD CONSTRAINT `FK_tb_hasil_kemiripan_tb_judul_mahasiswa` FOREIGN KEY (`fk_judul_mahasiswa`) REFERENCES `tb_judul_mahasiswa` (`id_judul_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_hasil_kemiripan_tb_judul_skripsi` FOREIGN KEY (`fk_judul_skripsi`) REFERENCES `tb_judul_skripsi` (`id_judul_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_hasil_kemiripan_tb_mahasiswa` FOREIGN KEY (`fk_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_judul_mahasiswa`
--
ALTER TABLE `tb_judul_mahasiswa`
  ADD CONSTRAINT `FK_tb_judul_mahasiswa_tb_mahasiswa` FOREIGN KEY (`fk_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_judul_skripsi`
--
ALTER TABLE `tb_judul_skripsi`
  ADD CONSTRAINT `FK_tb_judul_tb_mahasiswa` FOREIGN KEY (`fk_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `FK_tb_mahasiswa_tb_prodi` FOREIGN KEY (`fk_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
