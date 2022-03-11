-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2021 at 09:07 AM
-- Server version: 5.7.19
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekjasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Perawatan Rumah Tangga & Gedung', 'perawatan-rumah-tangga-gedung', '2021-05-25 21:12:43', '2021-05-29 07:55:33'),
(2, 'Bisnis & Ekonomi', 'bisnis-ekonomi', '2021-05-25 21:12:43', '2021-05-29 07:55:20'),
(3, 'Kesehatan & Keuangan', 'kesehatan-keuangan', '2021-05-25 21:12:43', '2021-05-29 07:55:55'),
(4, 'Transportasi & Travelling', 'transportasi-travelling', '2021-05-25 21:12:43', '2021-05-29 07:56:26'),
(5, 'Pendidikan & Pelatihan', 'pendidikan-pelatihan', '2021-05-25 21:12:43', '2021-05-29 07:56:48'),
(6, 'Perawatan Barang', 'perawatan-barang', '2021-05-25 21:12:43', '2021-05-29 07:57:41'),
(7, 'Dokumen & Percetakan', 'dokumen-percetakan', '2021-05-25 21:12:43', '2021-05-29 07:58:07'),
(8, 'Jasa Kreatif & Multimedia', 'jasa-kreatif-multimedia', '2021-05-25 21:12:43', '2021-05-29 07:58:30'),
(9, 'Fashion & Aksesoris', 'fashion-aksesoris', '2021-05-25 21:12:43', '2021-05-29 07:59:01'),
(10, 'Penitipan & Penyewaan', 'penitipan-penyewaan', '2021-05-25 21:12:43', '2021-05-29 07:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jasa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `cart_value` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT '2021-07-09'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `jasa_id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, 4, NULL, 'OFF5', 'fixed', 50, 500, '2021-07-08 08:15:06', '2021-07-08 22:36:45', '2021-07-09'),
(2, 4, NULL, 'OFF45', 'fixed', 5, 25, '2021-07-09 08:56:45', '2021-07-09 09:09:19', '2021-07-10');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_jasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_jasa`, `created_at`, `updated_at`) VALUES
(1, '1,2,3,4,5,6,7,8,10', '5', '2021-06-14 02:52:38', '2021-06-27 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `jasas`
--

CREATE TABLE `jasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('tersedia','tidaktersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_link` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasas`
--

INSERT INTO `jasas` (`id`, `name`, `slug`, `address`, `description`, `price`, `unit`, `sale_price`, `status`, `quantity`, `image`, `images`, `user_id`, `category_id`, `subcategory_id`, `province_id`, `regency_id`, `location_link`, `created_at`, `updated_at`) VALUES
(3, '1 guru 5 siswa', '1-guru-5-siswa', 'Jln panjaitan no. 49 Kel. Mantrijeron Kec. Mantrijeron', 'Ea ea sapiente nihil et beatae occaecati ut. Commodi totam rem voluptas voluptas quisquam. Nobis ea voluptas dolorum laboriosam porro.', 14669, NULL, NULL, 'tersedia', 11, '1623904930.jpg', NULL, 3, 5, 22, '12', '1275', NULL, '2021-05-25 21:21:37', '2021-06-16 21:42:10'),
(4, 'Pilar Putih', 'pilar-putih', 'No.1, Jl. Papandayan Sel., Gajahmungkur,', 'Nemo itaque quibusdam qui voluptas nihil rerum. Porro accusamus voluptatum dolorum aut voluptas ratione eveniet. Repellendus consequatur ullam tempora magni et.', 35538, NULL, NULL, 'tersedia', 52, '1624101798.jpg', NULL, 3, 3, 19, '33', '3374', NULL, '2021-05-25 21:21:37', '2021-06-19 04:23:18'),
(5, 'Sewa Oomatis', 'sewa-oomatis', 'Jalan Letjen MT Haryono Kav 52-53 Cikoko Pancoran', 'Eligendi sint totam omnis veritatis facere placeat. Dignissimos id non facere non fugiat dolores. Corrupti accusamus numquam accusantium rerum et. Nesciunt illo minima adipisci vel ipsum.', 33306, NULL, NULL, 'tersedia', 23, '1624101777.jpg', NULL, 3, 10, 15, '31', '3171', NULL, '2021-05-25 21:21:37', '2021-06-19 04:22:57'),
(6, 'Delima Sewa', 'delima-sewa', 'Jl. Jend. Soedirman No 28, Tanjung Selor, Bulungan', 'Quaerat ab nobis dolor autem tempore sapiente. Dolor modi neque sed consequatur odio rerum omnis. Nesciunt id necessitatibus unde dolores delectus dolores dolor repudiandae.', 48117, NULL, NULL, 'tersedia', 34, '1624101940.jpg', NULL, 4, 10, 15, '11', '1106', NULL, '2021-05-25 21:21:37', '2021-06-19 04:25:40'),
(7, 'Tailor Anda', 'tailor-anda', 'Jl. Opi Raya, Jakabaring Kel. 15 Ulu Kec. Seberang Ulu', 'Repellendus perspiciatis est veniam harum odit itaque. Iste doloremque nisi vero ut autem. Exercitationem nihil id quisquam ut dolores nulla nulla.', 43254, NULL, NULL, 'tersedia', 45, '1624101444.jpg', NULL, 2, 9, 5, '71', '7105', NULL, '2021-05-25 21:21:37', '2021-06-19 04:17:24'),
(8, 'Joki Murah', 'joki-murah', 'Jl. Kelapa Dua Nomor 83, Kecamatan Serang, Kota\nSerang Provinsi Banten.', 'Dolor sint placeat sunt aspernatur. Molestiae voluptate sit quia temporibus iste. Soluta labore placeat aut iste eos est sunt.', 47656, NULL, NULL, 'tersedia', 23, '1624101754.jpg', NULL, 3, 7, 9, '36', '3604', NULL, '2021-05-25 21:21:37', '2021-06-19 04:22:34'),
(9, 'Pemandu Kami Semua', 'pemandu-kami-semua', 'Jl. Indro Suratmin no 501 Sukarame', 'Temporibus voluptatibus impedit est et incidunt. Doloremque sequi nesciunt quis distinctio illo ut. Odio corporis ad eligendi. Dignissimos laborum facilis qui sed eligendi.', 21690, NULL, NULL, 'tersedia', 20, '1624101737.jpg', NULL, 3, 4, 20, '15', '1507', NULL, '2021-05-25 21:21:37', '2021-06-19 04:22:17'),
(10, 'Tailor Cepat', 'tailor-cepat', 'Jl. MT Haryono No.128, Karang Anyar, Sungai Kunjang', 'Assumenda qui qui natus fuga animi. Qui provident vitae itaque illum hic dolores. Mollitia est ut aut vitae voluptatem necessitatibus.', 20687, NULL, NULL, 'tersedia', 24, '1624101914.jpg', NULL, 4, 9, 5, '64', '6472', NULL, '2021-05-25 21:21:37', '2021-06-19 04:25:14'),
(11, 'Guidance Seru', 'guidance-seru', 'Jl. RE Martadinata No.3, Kertak Baru Ilir,', 'Labore ratione voluptates exercitationem quia quisquam. Enim officiis nam illo enim. Ipsa vitae esse ipsam non dolores est et.', 14711, NULL, NULL, 'tersedia', 50, '1624101894.jpg', NULL, 4, 4, 20, '11', '1102', NULL, '2021-05-25 21:21:37', '2021-06-19 04:24:54'),
(12, 'Service elektronic Bang Jago', 'service-elektronic-bang-jago', 'Jl. Pulau Mendanau No. 2 Kelurahan Air Itam,\nPangkalpinang,', 'Omnis sapiente fugit nesciunt. Nulla eos odit sunt non. Suscipit dicta non libero repudiandae optio odio ratione.', 44122, NULL, NULL, 'tersedia', 11, '1624101717.jpg', NULL, 3, 6, 11, '33', '3313', NULL, '2021-05-25 21:21:37', '2021-06-19 04:21:57'),
(13, 'Dari Anda Untuk Anda', 'dari-anda-untuk-anda', 'Jalan Indra Giri No. 01 Padang Harapan Bengkulu –\n38225', 'Voluptas hic ab dolores aut rerum. Laudantium minima cumque ducimus voluptatem et. Fugit autem at quia suscipit consequatur. Dolor magni quam sed eum soluta dolor.', 35270, NULL, NULL, 'tersedia', 10, '1624101651.jpg', NULL, 2, 2, 7, '17', '1705', NULL, '2021-05-25 21:21:37', '2021-06-19 04:20:51'),
(14, 'Adek Abang', 'adek-abang', 'Jalan Letjend S. Parman No.21, Benua Melayu Darat', 'Numquam molestias nihil dicta inventore laudantium. Sunt tempore cumque cumque quia perspiciatis qui.', 33744, NULL, NULL, 'tersedia', 38, '1624101875.jpg', NULL, 4, 7, 16, '61', '6171', NULL, '2021-05-25 21:21:37', '2021-06-19 04:24:35'),
(15, 'Iklas Pinjam', 'iklas-pinjam', 'Jl. G. Obos No.mor. 10, Menteng, Kec. Jekan Raya', 'Quia ipsum dolorem velit quia ab. Placeat veniam culpa id in. Quos iure quisquam enim ea quia rerum autem. Qui ipsam quia voluptatem nihil iusto aliquam.', 38076, NULL, NULL, 'tersedia', 22, '1624101852.jpg', NULL, 4, 2, 4, '62', '6271', NULL, '2021-05-25 21:21:37', '2021-06-19 04:24:12'),
(16, 'Medical Tradisional', 'medical-tradisional', 'Jln. Slamet Riyadi No. 07 Kel. Sungai Putri Kec. Danau', 'Enim illum ea suscipit accusantium et sequi. Quasi minus animi magni ipsam. Aperiam illo voluptatem expedita id quae suscipit eius. Ea voluptatem optio sed omnis.', 45524, NULL, NULL, 'tersedia', 17, '1624101631.jpg', NULL, 2, 3, 10, '31', '3172', NULL, '2021-05-25 21:21:37', '2021-06-19 04:20:31'),
(17, 'Toko Printing Anda', 'toko-printing-anda', 'JL. WR Supratman No.4-7km. 8 Tanjung PinangKepulauan Riau.', 'Voluptatem tempore fugit exercitationem veritatis odit sed similique. Nostrum et dolores doloribus cum consequatur praesentium aut aut.', 16202, NULL, 15500, 'tersedia', 15, '1624101609.jpg', NULL, 2, 8, 18, '14', '1401', NULL, '2021-05-25 21:21:37', '2021-06-19 04:20:09'),
(18, 'UTC Language', 'utc-language', 'Jl. Adi Sucipto No. 284 (Komplek Transito) Pekanbaru,\n28215.', 'Culpa aut adipisci ducimus sapiente. Quo vitae similique quae itaque quia quia atque. Sed quisquam rerum eos et ipsum nihil molestias rerum.', 12268, NULL, 11540, 'tersedia', 10, '1624258708.jpg', NULL, 2, 5, 21, '18', '1802', NULL, '2021-05-25 21:21:37', '2021-06-20 23:58:28'),
(19, 'Diamond Stay', 'diamond-stay', 'Jalan Prof. Mohammad Yamin No. 17-19 ', 'Beatae aut aperiam at asperiores. Quis nesciunt et qui omnis ullam. Id alias nihil eius et accusantium molestias.', 32043, NULL, NULL, 'tersedia', 32, '1625588700.jpg', NULL, 4, 4, 14, '51', '5171', NULL, '2021-05-25 21:21:37', '2021-07-06 09:25:00'),
(20, 'PT Aman Selalu', 'ptaman-selalu', 'Jl. Tanggulangin No.3, Keputran, Kec. Tegalsari, Kota\nSurabaya', 'Cumque aut nesciunt eos odio sed eum. Laborum aliquid veritatis debitis odio aperiam repellat aspernatur ut. Et maxime consequatur ducimus cumque animi rem fuga. Molestiae quis iusto ipsum in.', 44129, 'perjam', NULL, 'tersedia', 34, '1624334791.jpg', NULL, 4, 1, 1, '35', '3578', NULL, '2021-05-25 21:21:37', '2021-06-21 21:06:31'),
(21, 'Minor Reparasi', 'minor-reparasi', 'Jl. Adi Sucipto No. 284 (Komplek Transito)', 'Sit veritatis non aut magnam exercitationem. Nam sit ad quasi nihil est exercitationem. Doloribus qui qui aspernatur laboriosam. Eum dolorum hic quia dolor facilis tempora assumenda.', 11345, NULL, 11000, 'tersedia', 3, '1624101411.jpg', NULL, 2, 10, 8, '72', '7205', NULL, '2021-05-25 21:21:37', '2021-06-19 04:16:51'),
(22, 'Mari Cetak', 'mari-cetak', 'Jalan Pramuka Raya No.11 Kelurahan Lolong Belanti', 'Est dicta mollitia maiores et ratione. Quisquam molestias veniam dolor dignissimos.', 45443, 'perlembar', 35000, 'tersedia', 45, '1624851043.jpg', NULL, 2, 7, 16, '61', '6109', 'https://goo.gl/maps/uLbcPxtBccSffA7c8', '2021-05-25 21:21:37', '2021-06-27 20:30:43'),
(42, 'AT Cleaning Service', 'atcleaning-service', 'Jl. Soekarno Hatta Lr. H. Binti no 11‐16, Gampoeng\nEmperom, Kec. Jaya Baru, Kota Banda Aceh – Aceh', 'Pengen rumah selalu kinclong tapi tak punya waktu buat bersihin? Tenang, mitra super Beres selalu siap siaga bersihkan semua sisi-sisi rumahmu kapanpun kamu butuhkan', 50000, NULL, 40000, 'tersedia', 7, '1623601762.jpg', NULL, 2, 1, 17, '11', '1171', NULL, '2021-06-13 09:29:22', '2021-06-15 04:41:43'),
(43, 'Service Anda', 'service-anda', 'Jl. Udayana No. 10, Pejarakan Karya', 'Merancang pemetaan relationship table dan\nmenentukan property unutuk tiap table serta\nmenggambarkan segmen', 45000, NULL, NULL, 'tersedia', 5, '1623819676.jpg', NULL, 4, 1, 8, '11', '1106', NULL, '2021-06-15 22:01:16', '2021-06-15 22:01:16'),
(44, 'Pak Tano Cleaning', 'pak-tano-cleaning', 'Jalan Raya Manado Tomohon (Depan United Tractor)\nKelurahan Winangun 1 ', 'Membuat halaman beranda Aplikasi Jasa dan\nmenampilkan semua jasa yang terdaftar pada\naplikasi serta menampilkan jasa berdasarkan\nkategori dengan menggunakan data dummy', 35000, NULL, NULL, 'tersedia', 5, '1623819774.jpg', NULL, 4, 1, 17, '11', '1102', NULL, '2021-06-15 22:02:54', '2021-06-15 22:02:54'),
(45, 'Mampir Stellion', 'mampir-stellion', 'Jl. Drs. Ahmad Nadjamuddin No. 107 Kel. Limba U2', 'Membuat halaman beranda Aplikasi Jasa dan\nmenampilkan semua jasa yang terdaftar pada\naplikasi serta menampilkan jasa berdasarkan\nkategori dengan menggunakan data dummy', 45000, NULL, 40000, 'tersedia', 5, '1623819895.jpg', NULL, 4, 4, 20, '11', '1104', NULL, '2021-06-15 22:04:55', '2021-06-17 00:51:52'),
(46, 'Service Mackton', 'service-mackton', 'Jl. Pontingku Komplex Ruko Axuri Kelurahan Rimuku', 'Membuat halaman beranda Aplikasi Jasa dan\nmenampilkan semua jasa yang terdaftar pada\naplikasi serta menampilkan jasa berdasarkan\nkategori dengan menggunakan data dummy', 23000, NULL, 20000, 'tersedia', 5, '1623820004.jpg', NULL, 4, 6, 11, '11', '1103', 'https://g.page/hairos-water-park?share', '2021-06-15 22:06:44', '2021-06-19 04:30:29'),
(47, 'Jasa jahit Buk Tina', 'jasa-jahit-buk-tina', 'Here are some ways to disable Here are some ways to disable ', 'Here are some ways to disable Here are some ways to disable Here are some ways to disable ', 51000, 'peritem', NULL, 'tersedia', 8, '1624095151.jpg', NULL, 2, 9, 5, '21', '2104', 'https://goo.gl/maps/M2rePV65g1bptr9N9', '2021-06-19 02:32:31', '2021-06-19 02:42:38'),
(48, 'Toko Idea', 'tokoidea', 'Steven Feldstein argues in the opening essay, technonationalism plays a part in the strengthening of other autocracies too.', 'Steven Feldstein argues in the opening essay, technonationalism plays a part in the strengthening of other autocracies too.', 5000, 'permeter', 4000, 'tersedia', 50, '1624266605.jpg', NULL, 2, 7, 16, '11', '1106', 'https://goo.gl/maps/Qei1SAjDBuXwHLvi8', '2021-06-21 02:10:05', '2021-06-21 02:10:55'),
(49, 'Jasa service bersama', 'jasa-service-bersama', 'jalan teuku umar nomor 2', 'jasa menyediakan service apapun', 45000, 'perjam', NULL, 'tersedia', 8, '1625588340.jpg', NULL, 4, 1, 1, '17', '1707', NULL, '2021-07-06 09:19:00', '2021-07-06 09:19:00');

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
(1, '2012_05_02_140432_create_provinces_tables', 1),
(2, '2013_05_02_140444_create_regencies_tables', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_05_04_082835_create_sessions_table', 1),
(9, '2021_05_25_171739_create_categories_table', 2),
(10, '2021_05_25_171924_create_subcategories_table', 2),
(11, '2021_05_26_032249_create_jasas_table', 3),
(12, '2021_06_14_024811_create_home_categories_table', 4),
(13, '2021_06_14_155247_create_sales_table', 5),
(14, '2021_07_05_040931_create_orders_table', 6),
(15, '2021_07_05_041002_create_order_items_table', 6),
(16, '2021_07_05_041049_create_shippings_table', 6),
(17, '2021_07_05_041113_create_transactions_table', 6),
(18, '2021_07_08_100949_create_coupons_table', 7),
(19, '2021_07_09_142730_add_expiry_date_to_coupons_table', 8),
(20, '2021_07_26_062626_add_delivered_canceled_date_to_orders_table', 9),
(21, '2021_07_26_072538_create_reviews_table', 10),
(22, '2021_07_26_074049_add_rstatus_to_order_items_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penjual_id` bigint(20) UNSIGNED NOT NULL,
  `jasa_id` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL DEFAULT '0',
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `penjual_id`, `jasa_id`, `total`, `discount`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`) VALUES
(6, 6, 2, 48, 20, 0, 'delivered', 1, '2021-07-10 02:38:42', '2021-07-26 00:11:56', '2021-07-26', NULL),
(7, 6, 2, 7, 130, 0, 'ordered', 1, '2021-07-10 02:42:15', '2021-07-10 02:42:15', NULL, NULL),
(8, 5, 4, 49, 93, 0, 'canceled', 0, '2021-07-12 00:49:21', '2021-07-25 23:52:17', NULL, '2021-07-26'),
(9, 5, 3, 8, 93, 0, 'delivered', 0, '2021-07-12 00:49:21', '2021-07-25 23:49:23', '2021-07-26', NULL),
(10, 5, 3, 3, 29, 0, 'delivered', 0, '2021-07-29 09:18:18', '2021-07-29 09:54:22', '2021-07-29', NULL),
(11, 6, 3, 4, 71, 0, 'ordered', 1, '2021-07-29 09:43:39', '2021-07-29 09:43:39', NULL, NULL),
(12, 6, 3, 5, 33, 0, 'ordered', 1, '2021-07-29 09:48:53', '2021-07-29 09:48:53', NULL, NULL),
(13, 5, 2, 13, 71, 0, 'delivered', 1, '2021-07-29 10:01:23', '2021-07-29 10:02:35', '2021-07-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `jasa_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rstatus`) VALUES
(6, 48, 6, 5000, 4, '2021-07-10 02:38:42', '2021-07-10 02:38:42', 0),
(7, 7, 7, 43254, 3, '2021-07-10 02:42:15', '2021-07-10 02:42:15', 0),
(8, 49, 8, 45000, 1, '2021-07-12 00:49:21', '2021-07-12 00:49:21', 0),
(9, 8, 9, 47656, 1, '2021-07-12 00:49:21', '2021-07-26 21:53:59', 1),
(10, 3, 10, 14669, 2, '2021-07-29 09:18:18', '2021-07-29 09:18:18', 0),
(11, 4, 11, 35538, 2, '2021-07-29 09:43:39', '2021-07-29 09:43:39', 0),
(12, 5, 12, 33306, 1, '2021-07-29 09:48:53', '2021-07-29 09:48:53', 0),
(13, 13, 13, 35270, 2, '2021-07-29 10:01:23', '2021-07-29 10:01:23', 0);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'layanan bagus', 9, '2021-07-26 21:53:59', '2021-07-26 21:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-06-29 12:06:16', 0, NULL, '2021-06-27 03:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aMSVQpXh5RQ5z3loWFj5jKOur5Bow7DGnx8SHc7L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0tKV3JMNHhRNVczbG9mZXNqaFBVdVJPMEZUaEUzdmlzbzF1RDJYNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9wcm9qZWN0LWphc2EucHJpYmFkaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1627636016),
('TiQ8rmdzeuJgxo6IldRV6Z0xCCB1byQiAMcUTvfs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDg2b3lYZ1M3THJMZ21hQkttT0s1WHhuQXN5M29zd3oyN0F6ZnV3aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9wcm9qZWN0LWphc2EucHJpYmFkaSI7fX0=', 1627578470);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `phoneNumber`, `email`, `address`, `province_id`, `regency_id`, `created_at`, `updated_at`) VALUES
(4, 6, 'rahmat', '1233443534634', 'rahmat@gmail.com', 'jalan teuku umar', '51', '5104', '2021-07-10 02:38:42', '2021-07-10 02:38:42'),
(5, 7, 'jaka', '12345465645', 'jaka@gmail.com', 'jalan imam bonjol', '33', '3313', '2021-07-10 02:42:15', '2021-07-10 02:42:15'),
(6, 11, 'riska', '2345643545', 'user2@user.com', 'jalan teuku umar nomor 8756', '35', '3515', '2021-07-29 09:43:39', '2021-07-29 09:43:39'),
(7, 12, 'herdi', '2345643545', 'rahmat@user.com', 'jalan teuku umar nomor 8756', '35', '3514', '2021-07-29 09:48:53', '2021-07-29 09:48:53'),
(8, 13, 'Riska', '0852456667', 'user2@user.com', 'jalan teuku umar nomor 87', '51', '5103', '2021-07-29 10:01:23', '2021-07-29 10:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Jasa Keamanan Rumah', 'jasa-keamanan-rumah', 1, '2021-05-25 21:12:43', '2021-06-15 04:44:12'),
(2, 'Edit Video & Animasi', 'edit-video-animasi', 8, '2021-05-25 21:12:43', '2021-05-29 08:01:13'),
(3, 'Perbaikan Sepatu', 'perbaikan-sepatu', 9, '2021-05-25 21:12:43', '2021-05-29 08:03:11'),
(4, 'Reseller', 'reseller', 2, '2021-05-25 21:12:43', '2021-06-15 04:49:29'),
(5, 'Jahit Baju', 'jahit-baju', 9, '2021-05-25 21:12:43', '2021-05-29 08:02:46'),
(6, 'Penitipan Kendaraan', 'penitipan-kendaraan', 10, '2021-05-25 21:12:43', '2021-05-29 08:02:09'),
(7, 'Pengiriman online', 'pengiriman-online', 2, '2021-05-25 21:12:43', '2021-06-15 04:50:45'),
(8, 'Tukang Pipa', 'tukang-pipa', 1, '2021-05-25 21:12:43', '2021-06-15 04:45:20'),
(9, 'Joki Skripsi', 'joki-skripsi', 7, '2021-05-25 21:12:43', '2021-05-29 08:05:07'),
(10, 'Akupunktur medik', 'akupuntur', 3, '2021-05-25 21:12:43', '2021-06-15 04:59:27'),
(11, 'Service AC', 'service-ac', 6, '2021-05-25 21:16:53', '2021-06-15 04:57:15'),
(12, 'Kir Kacamata', 'kir-kacamata', 9, '2021-05-25 21:16:53', '2021-06-15 04:56:23'),
(13, 'Laundry', 'laundry', 6, '2021-05-25 21:16:53', '2021-06-15 04:51:18'),
(14, 'Penginapan', 'penginapan', 4, '2021-05-25 21:16:53', '2021-06-15 04:52:41'),
(15, 'Penyewaan Mobil', 'penyewaan-mobil', 10, '2021-05-25 21:16:53', '2021-05-29 08:06:00'),
(16, 'Printing', 'printing', 7, '2021-05-25 21:16:53', '2021-06-15 04:58:07'),
(17, 'Cleaning Service', 'cleaning-service', 1, '2021-05-25 21:16:53', '2021-06-15 04:59:50'),
(18, 'Membuat Brosur', 'membuat-brosur', 8, '2021-05-25 21:16:53', '2021-06-15 04:54:38'),
(19, 'Pinjaman Modal', 'pinjaman-modal', 3, '2021-05-25 21:16:53', '2021-06-15 04:48:52'),
(20, 'Pemandu Wisata', 'pemandu-wisata', 4, '2021-05-25 21:16:53', '2021-05-29 08:07:08'),
(21, 'Les Bahasa', 'les-bahasa', 5, '2021-06-15 05:00:44', '2021-06-15 05:00:44'),
(22, 'Les Pelajaran', 'les-pelajaran', 5, '2021-06-15 05:01:58', '2021-06-15 05:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 6, 'cod', 'pending', '2021-07-10 02:38:42', '2021-07-10 02:38:42'),
(4, 6, 7, 'cod', 'pending', '2021-07-10 02:42:15', '2021-07-10 02:42:15'),
(5, 5, 9, 'cod', 'pending', '2021-07-12 00:49:21', '2021-07-12 00:49:21'),
(6, 5, 10, 'cod', 'pending', '2021-07-29 09:18:18', '2021-07-29 09:18:18'),
(7, 6, 11, 'cod', 'pending', '2021-07-29 09:43:39', '2021-07-29 09:43:39'),
(8, 6, 12, 'cod', 'pending', '2021-07-29 09:48:53', '2021-07-29 09:48:53'),
(9, 5, 13, 'cod', 'pending', '2021-07-29 10:01:23', '2021-07-29 10:01:23');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `phoneNumber`, `address`, `province_id`, `regency_id`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$lcmBMnCkGK8zk0hGPmmrqeSeIyhGXxV3urhLxazQCQPFVeRTTdpXG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-05-25 08:17:13', '2021-05-25 08:17:13'),
(2, 'User', 'user@user.com', NULL, '$2y$10$CC.VC83AyWh3aZ5zm/hVhO9wyB5llgy1MAlZpwlLZy6xV83ThRYOa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2021-05-25 08:18:39', '2021-05-25 08:18:39'),
(3, 'User1', 'user1@user1.com', NULL, '$2y$10$N/GW4G/pClM9YyWCHhgWy.owxgUx4C1l2NI3RVpJYjRtGAdYFOYA2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2021-05-25 21:17:51', '2021-05-25 21:17:51'),
(4, 'User2', 'user2@user.com', NULL, '$2y$10$OBAKLeXikP9e3/DLYtqQTuhjSkkuCOA1v6Qm7WuHQDcq483P/lYci', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2021-05-25 21:18:07', '2021-05-25 21:18:07'),
(5, 'Rianti', 'rianti@user.com', NULL, '$2y$10$MLDC5InfGA3cdRuLkTPxRuEMN/x41Y3J1kMXx9buFfSONi4n0IKzu', NULL, NULL, NULL, NULL, NULL, '08527689881818', 'Jalan Muhammad Hatta NO 4', '34', '3403', 'USR', '2021-05-25 21:18:53', '2021-07-29 08:43:06'),
(6, 'Rahmat', 'rahmat@user.com', NULL, '$2y$10$G6zgweG7BzNsmaAMWHqJu.TrXUMkOMNaD9Oczcrnbt739ez7w9/Kq', NULL, NULL, NULL, NULL, NULL, '0998767881212', 'Jalan Kusuma Nomor 19', '11', '1103', 'USR', '2021-05-25 21:19:27', '2021-07-29 09:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_user_id_foreign` (`user_id`),
  ADD KEY `coupons_jasa_id_foreign` (`jasa_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasas`
--
ALTER TABLE `jasas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jasas_slug_unique` (`slug`),
  ADD KEY `jasas_user_id_foreign` (`user_id`),
  ADD KEY `jasas_category_id_foreign` (`category_id`),
  ADD KEY `jasas_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `jasas_province_id_foreign` (`province_id`),
  ADD KEY `jasas_regency_id_foreign` (`regency_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `fk_penjual_id` (`penjual_id`),
  ADD KEY `fk_jasa_id` (`jasa_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_jasa_id_foreign` (`jasa_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD KEY `provinces_id_index` (`id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD KEY `regencies_province_id_foreign` (`province_id`),
  ADD KEY `regencies_id_index` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_province_id_foreign` (`province_id`),
  ADD KEY `shippings_regency_id_foreign` (`regency_id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_province_id_foreign` (`province_id`),
  ADD KEY `users_regency_id_foreign` (`regency_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jasas`
--
ALTER TABLE `jasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_jasa_id_foreign` FOREIGN KEY (`jasa_id`) REFERENCES `jasas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jasas`
--
ALTER TABLE `jasas`
  ADD CONSTRAINT `jasas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasas_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasas_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasas_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_jasa_id` FOREIGN KEY (`jasa_id`) REFERENCES `jasas` (`id`),
  ADD CONSTRAINT `fk_penjual_id` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_jasa_id_foreign` FOREIGN KEY (`jasa_id`) REFERENCES `jasas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shippings_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shippings_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
