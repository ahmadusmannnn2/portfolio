/*
 Navicat Premium Data Transfer

 Source Server         : database
 Source Server Type    : MariaDB
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : portfolio_db

 Target Server Type    : MariaDB
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 29/07/2025 16:18:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'UI/UX Design', 'ui-ux-design', '2025-07-29 16:11:10', '2025-07-29 16:11:10');
INSERT INTO `categories` VALUES (2, 'Graphic Design', 'graphic-design', '2025-07-29 16:11:10', '2025-07-29 16:11:10');
INSERT INTO `categories` VALUES (3, 'Web Development', 'web-development', '2025-07-29 16:11:10', '2025-07-29 16:11:10');
INSERT INTO `categories` VALUES (4, 'Mobile App Design', 'mobile-app-design', '2025-07-29 16:11:10', '2025-07-29 16:11:10');
INSERT INTO `categories` VALUES (5, 'Branding', 'branding', '2025-07-29 16:11:10', '2025-07-29 16:11:10');

-- ----------------------------
-- Table structure for certificates
-- ----------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `thumbnail_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pdf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificates
-- ----------------------------
INSERT INTO `certificates` VALUES (1, 'Dasar-Dasar UX Design', 'Google', '2024-01-15', 'certificate_thumbnails/google-ux.jpg', 'certificate_pdfs/google-ux.pdf', '2025-07-29 16:12:41', '2025-07-29 16:12:41');
INSERT INTO `certificates` VALUES (2, 'Desain Grafis Masterclass', 'Udemy', '2023-11-20', 'certificate_thumbnails/udemy-grafis.jpg', 'certificate_pdfs/udemy-grafis.pdf', '2025-07-29 16:12:41', '2025-07-29 16:12:41');
INSERT INTO `certificates` VALUES (3, 'Belajar Dasar Pemrograman Web', 'Dicoding', '2023-09-05', 'certificate_thumbnails/dicoding-web.jpg', 'certificate_pdfs/dicoding-web.pdf', '2025-07-29 16:12:41', '2025-07-29 16:12:41');
INSERT INTO `certificates` VALUES (4, 'Certified UI Designer', 'Interaction Design Foundation', '2024-03-10', 'certificate_thumbnails/idf-ui.jpg', 'certificate_pdfs/idf-ui.pdf', '2025-07-29 16:12:41', '2025-07-29 16:12:41');
INSERT INTO `certificates` VALUES (5, 'Responsive Web Design', 'freeCodeCamp', '2023-07-22', 'certificate_thumbnails/fcc-responsive.jpg', 'certificate_pdfs/fcc-responsive.pdf', '2025-07-29 16:12:41', '2025-07-29 16:12:41');

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `contents_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES (1, 'home_greeting', 'Hello, It\'s Me', 'text', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (2, 'home_name', 'Ahmad Usman', 'text', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (3, 'home_roles', 'UI/UX Designer,Graphic Designer,Frontend Developer', 'text', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (4, 'home_paragraph', 'I am passionate about creating user-centered digital experiences that are not only visually appealing but also highly functional. My portfolio showcases a selection of my best work, highlighting my skills in user interface (UI) and user experience (UX) design.', 'textarea', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (5, 'home_cv', 'site/Dekc8M4SnkDVzebEZrlFMNMfna8gH6dc651qHvxN.pdf', 'file', '2025-07-29 08:04:57', '2025-07-29 09:14:52');
INSERT INTO `contents` VALUES (6, 'home_image', 'site/ObLEIHSb1Vb4MJDczStOwFWwZuS4TBHwk97PYUQM.png', 'image', '2025-07-29 08:04:57', '2025-07-29 09:14:53');
INSERT INTO `contents` VALUES (7, 'about_heading', 'About <span>Me</span>', 'text', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (8, 'about_subheading', 'UX Designer', 'text', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (9, 'about_paragraph', 'I am a professional in the field of UX Designer, with 2 year of experience. My education includes an Associate Degree in Computer Science, which gave me a strong foundation in Information Management. Outside of work, I have an interest in music and art.', 'textarea', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (10, 'about_certificate', 'file/sertifikat.pdf', 'file', '2025-07-29 08:04:57', '2025-07-29 08:04:57');
INSERT INTO `contents` VALUES (11, 'about_image', 'site/W8igZhHedJyXtNFjQ3wcqzpK3Te0Gsnpowjndi1b.png', 'image', '2025-07-29 08:04:57', '2025-07-29 09:14:53');
INSERT INTO `contents` VALUES (12, 'footer_text', 'by Ahmad Usman 👋 | All Rights Reserved.', 'text', '2025-07-29 08:04:57', '2025-07-29 08:07:56');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cancelled_at` int(11) NULL DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 'Budi Santoso', 'budi.s@example.com', '6281234567890', 'Saya sangat tertarik dengan layanan UI/UX Design Anda. Bisakah kita diskusikan lebih lanjut mengenai proyek redesign website kami?', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (2, 'Citra Lestari', 'citra.lestari@example.com', '6285678901234', 'Halo, saya ingin bertanya mengenai harga untuk paket branding identity. Terima kasih.', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (3, 'Doni Firmansyah', 'doni.f@example.com', '6287712345678', 'Apakah Anda menyediakan jasa maintenance website bulanan? Website saya sering lambat.', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (4, 'Eka Putri', 'eka.putri@example.com', '6281198765432', 'Desain portofolio Anda sangat menginspirasi! Saya ingin membuat logo baru untuk usaha kuliner saya.', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (5, 'Fajar Nugroho', 'fajar.n@example.com', '6289955554444', 'Saya butuh bantuan untuk mengubah desain Figma saya menjadi website HTML/CSS yang responsif. Apakah Anda bisa bantu?', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (6, 'Gita Wulandari', 'gita.w@example.com', '6282122223333', 'Saya melihat sertifikat Anda dari Google. Saya juga sedang mengambil kursus yang sama. Keren!', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (7, 'Hendra Wijaya', 'hendra.w@example.com', '6281344445555', 'Bisakah Anda mengirimkan penawaran harga untuk pembuatan desain aplikasi mobile?', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (8, 'Indah Permata', 'indah.p@example.com', '6287866667777', 'Saya ingin membuat beberapa desain grafis untuk promosi di Instagram. Apakah bisa?', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (9, 'Joko Susilo', 'joko.s@example.com', '6285788889999', 'Saya ingin berkonsultasi mengenai alur pengguna (user flow) untuk aplikasi startup saya.', '2025-07-29 16:15:06', '2025-07-29 16:15:06');
INSERT INTO `messages` VALUES (10, 'Kartika Dewi', 'kartika.d@example.com', '6281211112222', 'Terima kasih atas portofolio yang hebat. Saya akan menghubungi Anda kembali minggu depan untuk proyek potensial.', '2025-07-29 16:15:06', '2025-07-29 16:15:06');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_07_28_001007_create_categories_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_07_28_073323_create_portfolios_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_07_28_095100_create_contents_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_07_28_102359_create_messages_table', 1);
INSERT INTO `migrations` VALUES (8, '2025_07_28_104009_create_social_links_table', 1);
INSERT INTO `migrations` VALUES (9, '2025_07_28_105814_create_certificates_table', 1);
INSERT INTO `migrations` VALUES (10, '2025_07_28_134253_add_profile_photo_path_to_users_table', 1);
INSERT INTO `migrations` VALUES (11, '2025_07_28_142354_create_services_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for portfolios
-- ----------------------------
DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `project_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `portfolios_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `portfolios_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of portfolios
-- ----------------------------
INSERT INTO `portfolios` VALUES (1, 'Desain Aplikasi Kopi Shop', 1, 'https://dribbble.com/', 'portfolio_images/kopi-app.jpg', '2025-07-29 16:12:54', '2025-07-29 16:12:54');
INSERT INTO `portfolios` VALUES (2, 'Redesign Website E-Commerce', 3, 'https://behance.net/', 'portfolio_images/ecommerce-web.jpg', '2025-07-29 16:12:54', '2025-07-29 16:12:54');
INSERT INTO `portfolios` VALUES (3, 'Branding Guide Perusahaan Tech', 5, 'https://behance.net/', 'portfolio_images/branding-tech.jpg', '2025-07-29 16:12:54', '2025-07-29 16:12:54');
INSERT INTO `portfolios` VALUES (4, 'Desain Poster Event Musik', 2, 'https://instagram.com/', 'portfolio_images/poster-musik.jpg', '2025-07-29 16:12:54', '2025-07-29 16:12:54');
INSERT INTO `portfolios` VALUES (5, 'Prototipe Aplikasi Travel', 4, 'https://figma.com/', 'portfolio_images/travel-app.jpg', '2025-07-29 16:12:54', '2025-07-29 16:12:54');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `services_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'UI/UX Design', 'ui-ux-design', 'bx bx-pen', 'Desain antarmuka yang intuitif dan pengalaman pengguna yang menyenangkan.', 'Kami merancang alur pengguna dari awal hingga akhir, membuat wireframe, prototipe interaktif, dan desain visual yang tidak hanya indah tetapi juga fungsional untuk memastikan pengguna mencapai tujuan mereka dengan mudah.', '2025-07-29 16:11:37', '2025-07-29 16:11:37');
INSERT INTO `services` VALUES (2, 'Graphic Design', 'graphic-design', 'bx bxs-paint', 'Solusi desain grafis untuk kebutuhan branding dan marketing Anda.', 'Mulai dari pembuatan logo, brosur, hingga konten media sosial, kami menyediakan layanan desain grafis yang akan memperkuat identitas merek Anda dan menarik perhatian audiens.', '2025-07-29 16:11:37', '2025-07-29 16:11:37');
INSERT INTO `services` VALUES (3, 'Frontend Development', 'frontend-development', 'bx bx-code-alt', 'Mengubah desain menjadi website yang responsif dan interaktif.', 'Dengan menggunakan teknologi web modern seperti HTML5, CSS3, dan JavaScript, kami membangun sisi depan (frontend) website yang cepat, mudah diakses, dan bekerja dengan baik di semua perangkat, dari desktop hingga mobile.', '2025-07-29 16:11:37', '2025-07-29 16:11:37');
INSERT INTO `services` VALUES (4, 'Web Maintenance', 'web-maintenance', 'bx bx-server', 'Menjaga website Anda tetap aman, cepat, dan selalu update.', 'Layanan pemeliharaan kami mencakup pembaruan rutin, backup data, pemantauan keamanan, dan optimasi kecepatan agar website Anda selalu dalam kondisi prima dan terhindar dari masalah teknis.', '2025-07-29 16:11:37', '2025-07-29 16:11:37');
INSERT INTO `services` VALUES (5, 'Branding Identity', 'branding-identity', 'bx bxs-color-fill', 'Membangun identitas merek yang kuat dan mudah dikenali.', 'Kami membantu Anda dari nol, mulai dari filosofi merek, pemilihan warna, tipografi, hingga pembuatan logo dan panduan gaya (style guide) yang akan menjadi fondasi dari seluruh materi komunikasi Anda.', '2025-07-29 16:11:37', '2025-07-29 16:11:37');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('6H5bx2BfGcUHCDwmr1lrno0xkTBCepDDExgkMxOE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0FDcEQ4QnJaOVZqMU01Nm1WN2pzOFVsTkExbmhSS3ZtaGRYbEUxdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1753780521);
INSERT INTO `sessions` VALUES ('8KhDpJvpQDaZIXnjLP4de0oVy8TaDNo9nfv3soqt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnp2RmFKT3VxSU80QjdWWUc2R245bXRKaW13d3ZhVG1EQ2RES2xJeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753780098);
INSERT INTO `sessions` VALUES ('rrTnEak2YWeADVm4Gx1xO3PX0UBwIjevYBkRFnPL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicXVxYXpxcXlaRVBRaFJ4ekdmdW0yWE03c3JISFZVS1hUdm1sSXYxWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc29jaWFsX2xpbmtzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1753780657);

-- ----------------------------
-- Table structure for social_links
-- ----------------------------
DROP TABLE IF EXISTS `social_links`;
CREATE TABLE `social_links`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of social_links
-- ----------------------------
INSERT INTO `social_links` VALUES (1, 'WhatsApp', 'https://wa.me/6281234567890', 'bx bxl-whatsapp', '2025-07-29 16:12:28', '2025-07-29 16:12:28');
INSERT INTO `social_links` VALUES (2, 'Instagram', 'https://www.instagram.com/akunanda/', 'bx bxl-instagram-alt', '2025-07-29 16:12:28', '2025-07-29 16:12:28');
INSERT INTO `social_links` VALUES (3, 'Dribbble', 'https://dribbble.com/akunanda', 'bx bxl-dribbble', '2025-07-29 16:12:28', '2025-07-29 16:12:28');
INSERT INTO `social_links` VALUES (4, 'LinkedIn', 'https://www.linkedin.com/in/akunanda/', 'bx bxl-linkedin', '2025-07-29 16:12:28', '2025-07-29 16:12:28');
INSERT INTO `social_links` VALUES (5, 'Github', 'https://github.com/akunanda', 'bx bxl-github', '2025-07-29 16:12:28', '2025-07-29 16:12:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Ahmad Usman', 'ahmadusmannnn@gmail.com', 'profile-photos/4k8drEHlDtEm3t4dYAf34V3JFhweVRXEubeHjolG.jpg', NULL, '$2y$12$ZFrJ6nt5ZFh37V2QDj/xMedjmxZhC.OrPKcSDTdGoIlLKOeZF.uli', NULL, '2025-07-29 08:07:15', '2025-07-29 08:09:05');
INSERT INTO `users` VALUES (2, 'Ahmad Usman', 'ahmadusmannnn2@gmail.com', NULL, NULL, '$2y$12$al3fuTcOP28qakRzy0FqpOt69ta01xJyFkX6JwZtwyelaITNJthXK', NULL, '2025-07-29 09:01:14', '2025-07-29 09:01:14');

SET FOREIGN_KEY_CHECKS = 1;
