-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 11:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sihk`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `name`, `departemen`, `jabatan`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Mifa Abiyyu', 'Departemen Advokesma', 'Kepala Departemen', 'Tes', '1613217046891.JPG', '2021-02-13 04:50:46', '2021-07-15 07:01:59'),
(3, 'Reynaldi Satriawan', 'Departemen Advokesma', 'Anggota', 'Semangat', '1613234711772.JPG', '2021-02-13 09:45:11', '2021-02-16 22:00:41'),
(6, 'Dandy Noor', 'Departemen Kaderisasi', 'Kepala Departemen', 'Sembarang', '1613237785930.JPG', '2021-02-13 10:36:25', '2021-02-16 21:56:17'),
(7, 'Aghil Syahputa', 'Departemen Kaderisasi', 'Anggota', 'tes', '1613237996931.JPG', '2021-02-13 10:39:56', '2021-05-26 00:29:43'),
(10, 'Ilham Ananda Rey', 'Departemen Luar Negeri', 'Kepala Departemen', 'Loss', '1613238415973.JPG', '2021-02-13 10:46:55', '2021-02-16 21:56:59'),
(11, 'Rafli Subeksi', 'Departemen Luar Negeri', 'Anggota', 'Loss', '1613238493910.JPG', '2021-02-13 10:48:13', '2021-02-16 22:00:20'),
(13, 'Chilyatun Nisa', 'Departemen Pendidikan', 'Kepala Departemen', 'Sembarang', '1613238574231.JPG', '2021-02-13 10:49:34', '2021-02-16 21:56:00'),
(14, 'Mohamad Ilham Prasetyo', 'Departemen Pendidikan', 'Anggota', 'Semba', '1613238747475.JPG', '2021-02-13 10:52:27', '2021-02-16 21:58:02'),
(16, 'Cherry Daniella', 'Departemen Kominfo', 'Kepala Departemen', 'tes', '1613238856757.JPG', '2021-02-13 10:54:16', '2021-05-26 00:30:01'),
(17, 'Muhammad Hilal', 'Departemen Kominfo', 'Anggota', 'Semba', '1613238898361.JPG', '2021-02-13 10:54:58', '2021-02-16 21:58:35'),
(19, 'Febryan Alif', 'Departemen Dana Usaha', 'Kepala Departemen', 'Loss', '1613238983770.JPG', '2021-02-13 10:56:23', '2021-02-16 21:56:39'),
(21, 'Joni Bastian', 'Departemen Dana Usaha', 'Anggota', 'Loss', '1613239052103.JPG', '2021-02-13 10:57:32', '2021-02-16 21:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `category`, `slug`, `konten`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Podcastics 12', 'PKL', 'podcastics-12', '<p style=\"text-align: center; \"><span style=\"text-align: left;\">Merupakan program kerja himatifa yang membuka sharing diskusi</span><p></p><p></p><p></p><p></p><p></p><p></p></p>\n', '1614587198956.jpg', '2021-03-01 01:26:38', '2021-05-26 03:16:15'),
(3, 'OPEN DONATION', 'Lain Lain', 'open-donation', '<p><span style=\'color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\'>[BAKTI SOSIAL RAMADHAN]</span><br></p>\n', '1614622052662.JPG', '2021-03-01 11:07:32', '2021-05-26 03:21:49'),
(5, 'Berita Acara Pemira', 'Lain Lain', 'berita-acara-pemira', '<p>Berita Acara Pemira</p>\n', '1614625397572.JPG', '2021-03-01 12:03:17', '2021-05-26 03:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datestart` datetime NOT NULL,
  `dateend` datetime NOT NULL,
  `colour` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textcolour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `tittle`, `datestart`, `dateend`, `colour`, `textcolour`, `description`, `created_at`, `updated_at`) VALUES
(12, 'PEMABA 2021', '2021-02-03 02:35:00', '2021-02-03 04:35:00', '#6699ff', '', '<p><span style=\"font-family: Montserrat; font-size: 15px;\"><font color=\"#000000\">Terwujudnya KM UGM yang memiliki nilai ketaqwaan kepada Tuhan Yang Maha Esa, kerakyatan, pengembangan pengetahuan untuk kemajuan NKRI, kemasyarakatan, dan kebudayaan&nbsp;</font></span><a href=\"http://facebook.com\" target=\"_blank\"><b><span style=\"font-family: &quot;Arial Black&quot;;\">CLICK HERE</span></b></a><br></p>', '2021-02-24 12:35:24', '2021-02-24 22:33:35'),
(14, 'Pemira', '2021-02-25 13:35:00', '2021-02-27 13:35:00', '#ffccdd', '#ffffff', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);\">Serangkaian acara dari Ini Lho ITS! 2021 untuk kalian yang ingin mengenal lebih dalam mengenai kehidupan kampus dan keilmuan departemen di ITS beserta prospek kerja, prestasi, dan hal menarik lainnya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);\">Daftarkan dirimu segera!</p>', '2021-02-24 23:36:32', '2021-05-26 03:46:26'),
(15, 'HIMATIFA', '2021-02-01 14:08:00', '2021-02-04 14:09:00', '#99ffff', '#000000', '<p style=\"box-sizing: inherit; margin: 1.5em 0px; padding: 0px; border: 0px; font-size: 16px; font-stretch: inherit; line-height: inherit; font-family: Muli, sans-serif; vertical-align: baseline; color: rgb(32, 35, 42);\">A calendar is a block-level element that fills its entire avaiable width. The calendar’s height, however, is determined by this ratio of width to height. (Hint: larger numbers make smaller heights).</p><p style=\"box-sizing: inherit; margin: 1.5em 0px; padding: 0px; border: 0px; font-size: 16px; font-stretch: inherit; line-height: inherit; font-family: Muli, sans-serif; vertical-align: baseline; color: rgb(32, 35, 42);\">The following example will initialize a calendar with a width twice its height:</p>', '2021-02-25 00:09:08', '2021-02-25 00:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Lanik', '2021-02-19 11:03:52', '2021-02-19 11:03:52'),
(3, 'Pemaba', '2021-02-19 11:25:09', '2021-02-19 11:25:09'),
(4, 'StudiBanding', '2021-02-19 21:33:07', '2021-02-19 21:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `category_berita`
--

CREATE TABLE `category_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_berita`
--

INSERT INTO `category_berita` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'SKRIPSI', '2021-02-28 11:58:47', '2021-02-28 11:58:47'),
(3, 'PKL', '2021-02-28 11:58:53', '2021-02-28 11:58:53'),
(4, 'Info Maba', '2021-03-20 00:37:03', '2021-03-20 00:37:03'),
(5, 'Lain Lain', '2021-05-26 03:18:37', '2021-05-26 03:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `departemen`, `created_at`, `updated_at`) VALUES
(2, 'Departemen Advokesma', '2021-02-13 00:56:23', '2021-03-01 22:17:50'),
(3, 'Departemen Kaderisasi', '2021-02-13 00:56:33', '2021-02-16 11:40:32'),
(4, 'Departemen Luar Negeri', '2021-02-13 09:12:36', '2021-02-16 11:40:48'),
(5, 'Departemen Pendidikan', '2021-02-13 10:24:54', '2021-02-16 11:41:08'),
(6, 'Departemen Kominfo', '2021-02-13 10:25:23', '2021-02-16 11:41:21'),
(7, 'Departemen Dana Usaha', '2021-02-13 10:26:29', '2021-02-16 11:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_anggota`
--

CREATE TABLE `deskripsi_anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deskripsi_anggota`
--

INSERT INTO `deskripsi_anggota` (`id`, `departemen`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Departemen Advokesma', '<p style=\"text-align: justify; \">DEPARTEMEN ADVOKESMA ( Advokasi dan Kesejahteraan Mahasiswa ) ]\r\n</p><p style=\"text-align: justify; \"><b>\r\n<span style=\"font-family: &quot;Arial Black&quot;;\">Hallo KM Informatika 👋👋</span></b>\r\n.</p><ol><li style=\"text-align: justify; \"><br></li><li style=\"text-align: justify; \">\r\nPerkenalkan nih Departemen Advokesma, Ingin tau tugas dari departemen ini apa aja sih ?🤔 Swipe ke slide 2 yaa!!\r\n.\r\nYukk kenal lebih dekat dengan mereka!!😊😊\r\n.\r\nNama : Mifa Abiyyu H\r\nAsal : Surabaya\r\nJabatan : Kepala Departemen Advokesma\r\n\r\nNama : Reynaldi Satriawan Wikyanhadi\r\nAsal : Surabaya\r\nJabatan : Anggota Departemen Advokesma\r\n\r\nNama : Achmad Rizky Fatur Rochman\r\nAsal : Mojokerto\r\nJabatan : Anggota Departemen Advokesma\r\n\r\nNama : Aan Evian Nanda\r\nAsal : Magetan\r\nJabatan : Anggota Departemen Advokesma</li></ol>', '1613584203954.JPG', '2021-02-13 05:43:34', '2021-02-18 11:49:53'),
(3, 'Departemen Kaderisasi', 'Sak feeling e', '1613584620560.JPG', '2021-02-13 18:11:28', '2021-02-17 10:57:00'),
(4, 'Departemen Luar Negeri', 'Sembarang se', '1613584660214.JPG', '2021-02-13 18:12:56', '2021-02-17 10:57:40'),
(5, 'Departemen Pendidikan', 'Losssss', '1613584682447.JPG', '2021-02-13 18:13:23', '2021-02-17 10:58:02'),
(6, 'Departemen Kominfo', 'Losss neee', '1613584640309.JPG', '2021-02-13 18:13:50', '2021-02-17 10:57:20'),
(7, 'Departemen Dana Usaha', 'Sembarang lur', '1613584598734.JPG', '2021-02-13 18:14:16', '2021-02-17 10:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_bph`
--

CREATE TABLE `deskripsi_bph` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deskripsi_bph`
--

INSERT INTO `deskripsi_bph` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'Badan Pengurus Harian', 'BPH adalah', '2021-02-12 11:26:31', '2021-02-12 11:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Lanik', 'Lanik 2021', '1613758683115.jpg', '2021-02-19 11:18:03', '2021-02-19 11:46:05'),
(3, 'StudiBanding', 'Kunker UB', '1613795620814.jpg', '2021-02-19 21:33:40', '2021-02-19 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `kahima`
--

CREATE TABLE `kahima` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kahima`
--

INSERT INTO `kahima` (`id`, `name`, `jabatan`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(6, 'Ryan Eka', 'Kahima', 'Loss', '1613154274463.JPG', '2021-02-12 11:24:34', '2021-02-12 11:24:34'),
(7, 'Epit', 'Wakahima', 'Loss', '1613154699851.JPG', '2021-02-12 11:31:39', '2021-02-12 11:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kritik_saran` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `nama`, `npm`, `kritik_saran`, `created_at`, `updated_at`) VALUES
(1, 'asd', '213', 'asfasf', '2021-03-11 10:56:11', '2021-03-11 10:56:11'),
(2, 'ds', '12', 'Daftarkan diri anda dan jadilah penerus Pengurus HIMATIFA selaDaftarkan diri anda dan jadilah penerus Pengurus HIMATIFA selaDaftarkan diri anda dan jadilah penerus Pengurus HIMATIFA selaDaftarkan diri anda dan jadilah penerus Pengurus HIMATIFA selaDaftarkan diri anda dan jadilah penerus Pengurus HIMATIFA selaDaftarkan diri anda dan jadilah penerus Pengurus HIMATIFA sela', '2021-03-11 11:20:34', '2021-03-11 11:20:34'),
(3, 'Mifa Abiyyu Hibatulloh', '1634010066', 'sadasdasdasdasdasd', '2021-03-17 19:00:22', '2021-03-17 19:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_17_085234_create_permission_tables', 1),
(5, '2021_02_07_150348_create_slider_background_table', 1),
(6, '2021_02_10_171334_create_kahima_table', 2),
(7, '2021_02_10_181446_create_kahima_table', 3),
(8, '2021_02_11_191519_create_sekben_table', 4),
(9, '2021_02_13_044805_create_departemen_table', 5),
(10, '2021_02_13_071002_create_departemen_table', 6),
(11, '2021_02_14_013205_create_visimisi_table', 7),
(12, '2021_02_19_165822_create_gallery_table', 8),
(13, '2021_02_19_172107_create_gallery_table', 9),
(14, '2021_02_20_183611_create_calendar_table', 10),
(15, '2021_02_28_173332_create_berita_table', 11),
(16, '2021_02_28_182918_create_berita_table', 12),
(17, '2021_03_03_181529_create_contactus_table', 13),
(18, '2021_03_05_155826_create_kritik_saran_table', 14),
(19, '2021_03_14_075435_create_proposal_kegiatan_table', 15),
(20, '2021_03_14_080735_create_proposal_kegiatan_table', 16),
(21, '2021_05_04_094144_create_tipografi_check_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3);

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
-- Table structure for table `pendaftaran_hima`
--

CREATE TABLE `pendaftaran_hima` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_departemen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_hima` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran_hima`
--

INSERT INTO `pendaftaran_hima` (`id`, `nama`, `npm`, `visi`, `misi`, `departemen1`, `departemen2`, `alasan_departemen`, `alasan_hima`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdsd', 'dasda', 'dasd', 'dasd', 'dsdad', 'dasd', 'dasda', 'dasd', '1614969947340.jpg', 'Data Tidak Valid', '2021-03-05 11:45:47', '2021-03-11 08:09:29'),
(2, 'mifad', '1634010066', 'asdasd', 'ddsad', 'Departemen Kominfo', 'Departemen Luar Negeri', 'ad', 'dsd', '1615115035746.jpg', 'Data Valid', '2021-03-07 04:03:56', '2021-03-11 07:59:10'),
(3, 'Mifa Abiyyu Hibatulloh', '17081010090', 'Terwujudnya Himpunan Mahasiswa Teknik Informatika sebagai wadah KM Informatika yang inisiatif, aspiratif serta bersinergi dengan berlandaskan nafas kekeluargaan.', 'Menjadikan HIMATIFA sebagai wadah pengembangan potensi mahasiswa dalam aspek akademik dan non-akademik.\r\nMemfasilitasi segala bentuk aspirasi mahasiswa informatika.\r\nMewujudkan hubungan rukun bagi lingkungan informatika yang berorientasi pada kekeluargaan.', 'Departemen Kaderisasi', 'Departemen Pendidikan', 'Menjadikan HIMATIFA sebagai wadah pengembangan potensi mahasiswa dalam aspek akademik dan non-akademik.\r\nMemfasilitasi segala bentuk aspirasi mahasiswa informatika.\r\nMewujudkan hubungan rukun bagi lingkungan informatika yang berorientasi pada kekeluargaan.', 'Menjadikan HIMATIFA sebagai wadah pengembangan potensi mahasiswa dalam aspek akademik dan non-akademik.\r\nMemfasilitasi segala bentuk aspirasi mahasiswa informatika.\r\nMewujudkan hubungan rukun bagi lingkungan informatika yang berorientasi pada kekeluargaan.', '1615358532712.jpg', 'Data Valid', '2021-03-09 23:42:12', '2021-03-11 08:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'dashboard.view', 'web', 'dashboard', '2021-02-10 01:45:20', '2021-02-10 01:45:20'),
(2, 'dashboard.edit', 'web', 'dashboard', '2021-02-10 01:45:21', '2021-02-10 01:45:21'),
(3, 'landing.create', 'web', 'landing', '2021-02-10 01:45:21', '2021-02-10 01:45:21'),
(4, 'landing.view', 'web', 'landing', '2021-02-10 01:45:21', '2021-02-10 01:45:21'),
(5, 'landing.edit', 'web', 'landing', '2021-02-10 01:45:21', '2021-02-10 01:45:21'),
(6, 'landing.delete', 'web', 'landing', '2021-02-10 01:45:21', '2021-02-10 01:45:21'),
(8, 'user.create', 'web', 'user', '2021-02-10 01:45:22', '2021-02-10 01:45:22'),
(9, 'user.view', 'web', 'user', '2021-02-10 01:45:22', '2021-02-10 01:45:22'),
(10, 'user.edit', 'web', 'user', '2021-02-10 01:45:22', '2021-02-10 01:45:22'),
(11, 'user.delete', 'web', 'user', '2021-02-10 01:45:22', '2021-02-10 01:45:22'),
(12, 'role.create', 'web', 'role', '2021-02-10 01:45:22', '2021-02-10 01:45:22'),
(13, 'role.view', 'web', 'role', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(14, 'role.edit', 'web', 'role', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(15, 'role.delete', 'web', 'role', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(16, 'role.approve', 'web', 'role', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(17, 'profile.view', 'web', 'profile', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(18, 'profile.edit', 'web', 'profile', '2021-02-10 01:45:23', '2021-02-10 01:45:23'),
(19, 'pengurus.view', 'web', 'pengurus', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(20, 'pengurus.edit', 'web', 'pengurus', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(21, 'pengurus.update', 'web', 'pengurus', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(22, 'pengurus.delete', 'web', 'pengurus', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(23, 'gallery.create', 'web', 'gallery', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(24, 'gallery.view', 'web', 'gallery', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(25, 'gallery.edit', 'web', 'gallery', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(26, 'gallery.delete', 'web', 'gallery', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(27, 'contactus.create', 'web', 'contactus', '2021-03-26 10:22:34', '2021-03-26 10:22:34'),
(28, 'contactus.view', 'web', 'contactus', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(29, 'contactus.edit', 'web', 'contactus', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(30, 'contactus.delete', 'web', 'contactus', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(31, 'berita.create', 'web', 'berita', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(32, 'berita.view', 'web', 'berita', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(33, 'berita.edit', 'web', 'berita', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(34, 'berita.delete', 'web', 'berita', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(35, 'calendar.create', 'web', 'calendar', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(36, 'calendar.view', 'web', 'calendar', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(37, 'calendar.edit', 'web', 'calendar', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(38, 'calendar.delete', 'web', 'calendar', '2021-03-26 10:22:35', '2021-03-26 10:22:35'),
(39, 'proposal.create', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36'),
(40, 'proposal.view', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36'),
(41, 'proposal.edithima', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36'),
(42, 'proposal.editprodi', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36'),
(43, 'proposal.editfakultas', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36'),
(44, 'proposal.delete', 'web', 'proposal', '2021-03-26 10:22:36', '2021-03-26 10:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_kegiatan`
--

CREATE TABLE `proposal_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_kegiatan`
--

INSERT INTO `proposal_kegiatan` (`id`, `name`, `file`, `status`, `description`, `keterangan`, `created_at`, `updated_at`) VALUES
(18, 'Pemaba 2018', 'Lembar penilaian Pembimbing Test.pdf.pdf', '1', 'Pekan Mahasiswa Baru', '-', '2021-06-01 04:29:37', '2021-06-01 04:29:37'),
(19, 'Pelatihan KTI', 'Lembar penilaian Pembimbing Test.pdf.pdf', '3', 'Proposal KTI', '-', '2021-06-01 04:33:19', '2021-06-01 04:37:28'),
(21, 'Proposal Lanik', 'Sistem Informasi Akademik (SIAMIK).pdf.pdf', '10', 'Proposal Lanik', '-Kegiatan Salah', '2021-06-01 05:00:19', '2021-06-01 05:15:43'),
(22, 'Proposal BCD', 'Lembar penilaian Pembimbing Test.pdf.pdf', '3', 'Proposal BCD', '-', '2021-06-01 05:08:19', '2021-06-01 05:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2021-02-10 01:45:19', '2021-02-10 01:45:19'),
(2, 'prodi', 'web', '2021-02-10 01:45:19', '2021-03-26 10:26:35'),
(5, 'fakultas', 'web', '2021-03-26 10:27:17', '2021-03-26 10:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(17, 5),
(18, 1),
(18, 2),
(18, 5),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 2),
(43, 5),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekben`
--

CREATE TABLE `sekben` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekben`
--

INSERT INTO `sekben` (`id`, `name`, `jabatan`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'Della Maya', 'Sekretaris 1', 'Asdasd', '1613190598344.JPG', '2021-02-12 21:29:58', '2021-02-12 21:29:58'),
(4, 'Anneke Savira', 'Sekretaris 2', 'asdasd', '1613190626140.JPG', '2021-02-12 21:30:26', '2021-02-12 21:30:26'),
(5, 'Susi Semilikiti', 'Bendahara 1', 'asdasdd', '1613190663987.JPG', '2021-02-12 21:31:03', '2021-02-12 21:31:03'),
(6, 'Puteri', 'Bendahara 2', 'asdsd', '1613190685523.JPG', '2021-02-12 21:31:26', '2021-02-12 21:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `slider_background`
--

CREATE TABLE `slider_background` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tittle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_background`
--

INSERT INTO `slider_background` (`id`, `head`, `tittle`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'WE ARE', 'HIMATIFA', 'Selamat Datang di Himatifa <br> UPN Veteran Jawa Timur', '1612947469116.jpg', '2021-02-10 01:57:49', '2021-02-10 01:57:49'),
(2, 'KAMI', 'HIMATIFA', 'Bertugas untuk mewadahi aspirasi Mahasiswa <br> Program Studi Informatika <br> UPN \"Veteran\" Jawa Timur', '1612948174912.jpg', '2021-02-10 02:09:34', '2021-02-10 02:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `tipografi_check`
--

CREATE TABLE `tipografi_check` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipografi_check`
--

INSERT INTO `tipografi_check` (`id`, `file`, `created_at`, `updated_at`) VALUES
(142, 'text1.pdf.pdf', '2021-05-26 10:39:04', '2021-05-26 10:39:04'),
(143, 'text1.pdf.pdf', '2021-05-26 10:43:37', '2021-05-26 10:43:37'),
(144, 'text1.pdf.pdf', '2021-05-30 00:18:43', '2021-05-30 00:18:43'),
(145, 'text1.pdf.pdf', '2021-05-30 05:33:26', '2021-05-30 05:33:26'),
(146, 'text1.pdf.pdf', '2021-05-30 05:34:42', '2021-05-30 05:34:42'),
(147, 'text1.pdf.pdf', '2021-05-30 11:48:24', '2021-05-30 11:48:24'),
(148, 'text1.pdf.pdf', '2021-05-30 12:15:17', '2021-05-30 12:15:17'),
(149, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 21:56:54', '2021-05-30 21:56:54'),
(150, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 21:57:46', '2021-05-30 21:57:46'),
(151, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:00:50', '2021-05-30 22:00:50'),
(152, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:21:29', '2021-05-30 22:21:29'),
(153, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:23:43', '2021-05-30 22:23:43'),
(154, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:24:00', '2021-05-30 22:24:00'),
(155, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:24:17', '2021-05-30 22:24:17'),
(156, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:24:28', '2021-05-30 22:24:28'),
(157, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:24:46', '2021-05-30 22:24:46'),
(158, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:24:58', '2021-05-30 22:24:58'),
(159, '17081010090 - Mifa Abiyyu H_Lembar Penilaian Pembimbing dan Persetujuan Ujian .pdf.pdf', '2021-05-30 22:31:39', '2021-05-30 22:31:39'),
(160, 'text1.pdf.pdf', '2021-05-31 13:25:42', '2021-05-31 13:25:42'),
(161, 'text1.pdf.pdf', '2021-05-31 23:36:21', '2021-05-31 23:36:21'),
(162, 'Lembar penilaian Pembimbing Test.pdf.pdf', '2021-06-01 04:02:20', '2021-06-01 04:02:20'),
(163, 'Lembar penilaian Pembimbing Test.pdf.pdf', '2021-06-01 04:03:58', '2021-06-01 04:03:58'),
(164, 'Lembar penilaian Pembimbing Test.pdf.pdf', '2021-06-01 04:08:04', '2021-06-01 04:08:04'),
(165, 'Lembar penilaian Pembimbing Test.pdf.pdf', '2021-06-01 04:15:28', '2021-06-01 04:15:28'),
(166, 'Lembar penilaian Pembimbing Test.pdf.pdf', '2021-06-01 04:17:02', '2021-06-01 04:17:02'),
(167, 'text1.pdf.pdf', '2021-06-01 05:22:12', '2021-06-01 05:22:12'),
(168, 'text1.pdf.pdf', '2021-06-01 05:24:13', '2021-06-01 05:24:13'),
(169, 'text1.pdf.pdf', '2021-06-03 05:05:19', '2021-06-03 05:05:19'),
(170, 'text1.pdf.pdf', '2021-06-03 08:17:47', '2021-06-03 08:17:47'),
(171, '7719-1-54912-1-10-20200826.pdf.pdf', '2021-06-23 05:31:27', '2021-06-23 05:31:27'),
(172, 'Pedaftaran Wisuda UPN Veteran Jatim Verifikasi.pdf.pdf', '2021-11-25 23:48:03', '2021-11-25 23:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$3vSzD/68fuLJEva/RYy8SuLvCRqU/3XLBH4Afy9Hf7y4bm99UxGcy', NULL, '2021-02-10 01:45:19', '2021-05-25 22:01:22'),
(2, 'prodi informatika', 'prodi@email.com', NULL, '$2y$10$C4nCTpRbZAKV4kQKRJ68m.kaq3gCeVf6y7dE00aTAzZw/lMGbNQKy', NULL, '2021-02-10 01:54:09', '2021-03-26 10:25:55'),
(3, 'Fakultas Ilmu Komputer', 'fik@email.com', NULL, '$2y$10$ERdOzzToDoHD1SuiEAuDTuzzuaVpwxFhpB.7r1Ta2MUDh3LLmFNMW', NULL, '2021-03-26 10:28:10', '2021-03-26 10:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'Terwujudnya Himpunan Mahasiswa Teknik Informatika sebagai wadah KM Informatika yang inisiatif, aspiratif serta bersinergi dengan berlandaskan nafas kekeluargaan.', '<ol><li>Menjadikan HIMATIFA sebagai wadah pengembangan  potensi mahasiswa dalam aspek akademik dan non-akademik.</li><li>Memfasilitasi segala bentuk aspirasi mahasiswa informatika.</li><li>Mewujudkan hubungan rukun bagi lingkungan informatika yang berorientasi pada kekeluargaan.</li><li>Mengoptimalkan kinerja pengurus HIMATIFA yang inisiatif dan tanggap.</li></ol>', '2021-02-13 18:52:44', '2021-02-19 21:46:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_berita`
--
ALTER TABLE `category_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deskripsi_anggota`
--
ALTER TABLE `deskripsi_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deskripsi_bph`
--
ALTER TABLE `deskripsi_bph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kahima`
--
ALTER TABLE `kahima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran_hima`
--
ALTER TABLE `pendaftaran_hima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_kegiatan`
--
ALTER TABLE `proposal_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sekben`
--
ALTER TABLE `sekben`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_background`
--
ALTER TABLE `slider_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipografi_check`
--
ALTER TABLE `tipografi_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_berita`
--
ALTER TABLE `category_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `deskripsi_anggota`
--
ALTER TABLE `deskripsi_anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deskripsi_bph`
--
ALTER TABLE `deskripsi_bph`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kahima`
--
ALTER TABLE `kahima`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pendaftaran_hima`
--
ALTER TABLE `pendaftaran_hima`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `proposal_kegiatan`
--
ALTER TABLE `proposal_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sekben`
--
ALTER TABLE `sekben`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_background`
--
ALTER TABLE `slider_background`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipografi_check`
--
ALTER TABLE `tipografi_check`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
