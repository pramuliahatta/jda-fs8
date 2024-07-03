-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table jda_fs8.jobs: ~0 rows (approximately)

-- Dumping data for table jda_fs8.job_batches: ~0 rows (approximately)

-- Dumping data for table jda_fs8.migrations: ~0 rows (approximately)
-- INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
-- 	(1, '0001_01_01_000000_create_users_table', 1),
-- 	(2, '0001_01_01_000001_create_cache_table', 1),
-- 	(3, '0001_01_01_000002_create_jobs_table', 1),
-- 	(4, '2024_06_13_042512_create_galleries_table', 1),
-- 	(5, '2024_06_13_042523_create_articles_table', 1),
-- 	(6, '2024_06_13_042531_create_products_table', 1),
-- 	(7, '2024_06_13_042629_create_files_table', 1),
-- 	(8, '2024_06_13_042726_create_product_photos_table', 1),
-- 	(9, '2024_06_14_063428_create_personal_access_tokens_table', 1);

-- Dumping data for table jda_fs8.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `phone_number`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Budi', '6281212349876', 'budi@gmail.com', 'member', NULL, '$2y$12$dXZJc8HtKLWb7BcBzbSUVuYbMxADl48Xc9M1sHVnqbUYNhJ3ofY1O', NULL, '2024-07-01 23:11:45', '2024-07-01 23:11:45'),
	(3, 'Rima', '6281212346789', 'rima@gmail.com', 'member', NULL, '$2y$12$lRKtThMn/HyrKB4jasOkleFGPsLopi82DQ2WwYFXi3OWV1SYK7BkG', NULL, '2024-07-01 23:12:07', '2024-07-01 23:12:07'),
	(4, 'Tuti', '6281243219876', 'tuti@gmail.com', 'member', NULL, '$2y$12$sN7Vt3fD/k7f7kPmLCs5relLVx2171j1xZKYsR/2gQsMjKMYXGOi2', NULL, '2024-07-01 23:12:31', '2024-07-01 23:12:31');

-- Dumping data for table jda_fs8.articles: ~3 rows (approximately)
INSERT INTO `articles` (`id`, `created_at`, `updated_at`, `title`, `body`, `photo`, `category`) VALUES
	(1, '2024-07-02 00:35:54', '2024-07-02 00:35:54', 'Tagihan Pajak Bumi Dan Bangunan', '<h2>Pemahaman yang Lebih Dalam Mengenai Tagihan Pajak Bumi dan Bangunan (PBB) di Desa Cidadap</h2>\r\n\r\n<p>Pajak Bumi dan Bangunan (PBB) merupakan salah satu sumber pendapatan bagi pemerintah desa untuk membiayai berbagai program pembangunan dan pelayanan masyarakat. Desa Cidadap, sebagai salah satu wilayah yang berkembang di daerah ini, juga menerapkan sistem pemungutan PBB yang berlaku secara adil dan transparan.</p>\r\n\r\n<h3>Apa Itu Pajak Bumi dan Bangunan (PBB)?</h3>\r\n\r\n<p>PBB adalah pajak yang dikenakan atas kepemilikan properti seperti tanah dan bangunan yang dimiliki oleh warga negara Indonesia. Besaran PBB ditentukan berdasarkan nilai jual objek pajak yang ditetapkan oleh pemerintah setempat, termasuk di Desa Cidadap. Pendapatan dari PBB digunakan untuk mendukung pembangunan infrastruktur, pendidikan, kesehatan, serta berbagai program sosial lainnya di tingkat desa.</p>\r\n\r\n<h3>Cara Pembayaran PBB di Desa Cidadap</h3>\r\n\r\n<p>Pembayaran PBB di Desa Cidadap dapat dilakukan secara tahunan atau dalam beberapa kali cicilan, sesuai dengan kebijakan yang ditetapkan oleh pemerintah desa setempat. Warga yang memiliki properti di desa ini wajib memperhatikan jadwal pembayaran yang telah ditetapkan agar terhindar dari sanksi administrasi.</p>\r\n\r\n<h3>Pentingnya Kepatuhan dalam Membayar PBB</h3>\r\n\r\n<p>Kepatuhan dalam membayar PBB sangat penting untuk mendukung berbagai kegiatan pembangunan dan pelayanan masyarakat di Desa Cidadap. Melalui kontribusi ini, pemerintah desa dapat meningkatkan kualitas infrastruktur dan pelayanan dasar yang dapat dinikmati oleh seluruh warga.</p>\r\n\r\n<h3>Langkah-langkah Mengatasi Permasalahan Terkait PBB</h3>\r\n\r\n<p>Bagi warga yang mengalami kesulitan terkait PBB, seperti ketidaksesuaian nilai pajak atau masalah administrasi lainnya, dapat mengajukan keberatan secara tertulis kepada pemerintah desa. Proses ini memungkinkan untuk menyelesaikan permasalahan dengan cara yang adil dan transparan.</p>\r\n\r\n<h3>Kesimpulan</h3>\r\n\r\n<p>Pajak Bumi dan Bangunan (PBB) di Desa Cidadap tidak hanya merupakan kewajiban hukum, tetapi juga merupakan bentuk partisipasi dalam pembangunan dan pelayanan masyarakat. Dengan membayar PBB tepat waktu dan sesuai dengan ketentuan yang berlaku, warga desa turut berperan aktif dalam meningkatkan kualitas hidup bersama.</p>\r\n\r\n<p>Melalui pemahaman yang lebih dalam mengenai PBB, diharapkan kesadaran dan partisipasi warga dalam pembangunan desa semakin meningkat.</p>', 'upload/article/1719905754.jpeg', 'Berita'),
	(2, '2024-07-02 00:43:45', '2024-07-02 00:48:46', 'Anggaran Pendapatan Dan Belanja Desa 2024', '<p>PENDAPATAN DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp; 1,530,406,900&nbsp;</p>\r\n\r\n<p>PENDAPATAN ASLI DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; &nbsp;62,000,000&nbsp;</p>\r\n\r\n<p>DANA DESA ( DD )&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;927,434,000</p>\r\n\r\n<p>ALOKASI DANA DESA ( ADD )&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;369,679,000</p>\r\n\r\n<p>BANTUAN KEUANGAN PROVINSI ( BANPROF )&nbsp; :&nbsp;&nbsp; &nbsp; 130,000,000&nbsp;</p>\r\n\r\n<p>DANA BAGI HASIL ( DBH )&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp;41,293,900</p>\r\n\r\n<p>PENDAPATAN LAIN-LAIN YANG SAH&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp; &nbsp; 0&nbsp;</p>\r\n\r\n<p>BELANJA DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp; 1,530,406,900&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;BIDANG PENYELENGGARAAN PEMERINTAHAN DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;503,608,855</p>\r\n\r\n<p>2&nbsp;&nbsp; &nbsp;BIDANG PENYELENGGARAAN PEMBANGUNAN DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;849,454,145</p>\r\n\r\n<p>3&nbsp;&nbsp; &nbsp;BIDANG PEMBINAAN KEMASYARAKATAN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp;79,743,900</p>\r\n\r\n<p>4&nbsp;&nbsp; &nbsp;BIDANG PEMBERDAYAAN MASYARAKAT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;4,000,000</p>\r\n\r\n<p>5&nbsp;&nbsp; &nbsp;BIDANG PENANGGULANGAN BENCANA DARURAT DAN MENDESAK DESA :&nbsp;&nbsp;&nbsp;93,600,000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PEMBIAYAAN &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>JUMLAH PENDAPATAN DESA&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp; &nbsp; 1,530,406,900&nbsp;</p>\r\n\r\n<p>JUMLAH BELANJA DESA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp; 1,530,406,900&nbsp;</p>\r\n\r\n<p>SURPLUS / DEFISIT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;&nbsp; &nbsp; 0&nbsp;</p>\r\n\r\n<p>PEMBIAYAAN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;&nbsp; &nbsp; 5,000,000&nbsp;</p>\r\n\r\n<p>SISA LEBIH PEMBIAYAAN ANGGARAN DESA&nbsp; &nbsp;:&nbsp;&nbsp; &nbsp; 5,000,000&nbsp;</p>', 'upload/article/1719906225.jpeg', 'Berita'),
	(3, '2024-07-02 00:54:58', '2024-07-02 00:54:58', 'UMKM Desa Cidadap', '<h3>Meriahnya Acara UMKM Desa Cidadap: Memajukan Ekonomi Lokal Bersama</h3>\r\n\r\n<p>Pada tanggal yang akan datang, Desa Cidadap akan menggelar acara yang sangat dinanti-nantikan, yakni Pameran dan Bazaar UMKM (Usaha Mikro, Kecil, dan Menengah). Acara ini bertujuan untuk mempromosikan produk-produk unggulan dari para pelaku UMKM di wilayah ini serta mendukung perkembangan ekonomi lokal secara berkelanjutan.</p>\r\n\r\n<p>Apa yang Menjadi Sorotan Utama?</p>\r\n\r\n<p>Pameran dan Bazaar UMKM Desa Cidadap akan menampilkan beragam produk kreatif dan inovatif yang dibuat oleh para pengusaha lokal. Mulai dari kuliner khas, kerajinan tangan, hingga produk-produk fashion dan peralatan rumah tangga, semua dapat ditemui dalam satu tempat. Acara ini tidak hanya sekadar berbelanja, tetapi juga menjadi ajang untuk membangun jejaring antara pelaku UMKM dengan konsumen potensial serta pelaku usaha lainnya.</p>\r\n\r\n<p>Keuntungan bagi Pengunjung</p>\r\n\r\n<p>Bagi pengunjung, acara ini merupakan kesempatan emas untuk mendapatkan produk berkualitas dengan harga yang kompetitif langsung dari produsennya. Selain itu, mereka juga dapat mengenal lebih dekat dengan cerita dan proses di balik setiap produk, yang tentunya memperkuat rasa terhubung dengan komunitas UMKM Desa Cidadap.</p>\r\n\r\n<p>Dukungan Pemerintah Desa</p>\r\n\r\n<p>Pemerintah Desa Cidadap mendukung penuh kegiatan ini sebagai bagian dari upaya untuk meningkatkan perekonomian masyarakat lokal. Dengan memberikan platform seperti ini, diharapkan UMKM dapat semakin berkembang dan mampu bersaing di pasar yang lebih luas.</p>\r\n\r\n<p>Aktivitas Menarik Lainnya</p>\r\n\r\n<p>Selain pameran produk, acara ini juga akan diisi dengan berbagai kegiatan menarik seperti demo memasak, workshop kerajinan, serta pertunjukan seni dan budaya dari para komunitas lokal. Ini semua bertujuan untuk memberikan pengalaman yang lebih berwarna bagi pengunjung sekaligus mempromosikan kekayaan budaya Desa Cidadap.</p>\r\n\r\n<p>Jadwal dan Lokasi</p>\r\n\r\n<p>Acara Pameran dan Bazaar UMKM Desa Cidadap akan diselenggarakan pada tanggal [tanggal acara] di [lokasi acara]. Pastikan untuk datang dan bergabung dalam merayakan keberagaman produk dan kreativitas UMKM Desa Cidadap!</p>\r\n\r\n<p>Kesimpulan</p>\r\n\r\n<p>Acara Pameran dan Bazaar UMKM Desa Cidadap adalah bukti nyata dari semangat gotong royong dan keberagaman kreatifitas yang ada dalam masyarakat. Mari bersama-sama mendukung perkembangan UMKM lokal dan membangun ekonomi yang lebih inklusif dan berkelanjutan!</p>\r\n\r\n<p>Jangan lewatkan kesempatan ini untuk mendukung para pelaku UMKM Desa Cidadap dan nikmati pengalaman belanja yang berbeda dalam suasana yang meriah dan penuh inspirasi.</p>', 'upload/article/1719906898.jpeg', 'Acara');

-- Dumping data for table jda_fs8.cache: ~0 rows (approximately)

-- Dumping data for table jda_fs8.cache_locks: ~0 rows (approximately)

-- Dumping data for table jda_fs8.failed_jobs: ~0 rows (approximately)

-- Dumping data for table jda_fs8.files: ~7 rows (approximately)
INSERT INTO `files` (`id`, `created_at`, `updated_at`, `name`, `file`) VALUES
	(1, '2024-07-01 22:00:41', '2024-07-01 22:00:41', 'FORMULIR-F-15 KARTU KELUARGA BARU', 'upload/file/1719896441.pdf'),
	(2, '2024-07-01 22:01:05', '2024-07-01 22:01:05', 'FORMULIR-KK-F-16 PERUBAHAN KARU KELUARGA', 'upload/file/1719896465.pdf'),
	(3, '2024-07-01 22:01:19', '2024-07-01 22:01:19', 'SURAT KET DOMISILI', 'upload/file/1719896479.pdf'),
	(4, '2024-07-01 22:02:10', '2024-07-01 22:02:10', 'SURAT KET PENGHASILAN ORANG TUA 1', 'upload/file/1719896530.pdf'),
	(5, '2024-07-01 22:02:46', '2024-07-01 22:02:46', 'SURAT KET TIDAK MAMPU', 'upload/file/1719896566.pdf'),
	(6, '2024-07-01 22:03:05', '2024-07-01 22:03:05', 'SURAT KET USAHA', 'upload/file/1719896585.pdf'),
	(7, '2024-07-01 22:03:22', '2024-07-01 22:03:22', 'SURAT PENGANTAR SKCK', 'upload/file/1719896602.pdf');

-- Dumping data for table jda_fs8.galleries: ~10 rows (approximately)
INSERT INTO `galleries` (`id`, `created_at`, `updated_at`, `title`, `photo`) VALUES
	(1, '2024-07-02 00:22:01', '2024-07-02 00:22:01', 'Kegiatan PKK (1)', 'upload/gallery/1719904921.JPG'),
	(2, '2024-07-02 00:22:24', '2024-07-02 00:22:24', 'Kegiatan PKK (2)', 'upload/gallery/1719904944.JPG'),
	(3, '2024-07-02 00:22:56', '2024-07-02 00:22:56', 'Kegiatan PKK (3)', 'upload/gallery/1719904976.JPG'),
	(4, '2024-07-02 00:23:09', '2024-07-02 00:23:09', 'Kegiatan PKK (4)', 'upload/gallery/1719904989.JPG'),
	(5, '2024-07-02 00:23:28', '2024-07-02 00:23:28', 'Kegiatan PKK (5)', 'upload/gallery/1719905008.JPG'),
	(6, '2024-07-02 00:23:53', '2024-07-02 00:23:53', 'AULA KANTOR DESA', 'upload/gallery/1719905033.jpg'),
	(7, '2024-07-02 00:24:11', '2024-07-02 00:24:11', 'RUANG BACA', 'upload/gallery/1719905051.jpg'),
	(8, '2024-07-02 00:24:28', '2024-07-02 00:24:28', 'RUANG DAPUR', 'upload/gallery/1719905068.jpg'),
	(9, '2024-07-02 00:24:50', '2024-07-02 00:24:50', 'RUANG KADES', 'upload/gallery/1719905090.jpg'),
	(10, '2024-07-02 00:25:09', '2024-07-02 00:25:09', 'RUANG PELAYANAN', 'upload/gallery/1719905109.jpg');

-- Dumping data for table jda_fs8.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table jda_fs8.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table jda_fs8.products: ~7 rows (approximately)
INSERT INTO `products` (`id`, `user_id`, `created_at`, `updated_at`, `name`, `category`, `price`, `description`) VALUES
	(1, 2, '2024-07-01 23:30:20', '2024-07-01 23:30:20', 'Rengginang Ketan Asli Original', 'Makanan', '35000', '<p>Rengginang makanan asli khas indonesia yang di buat dengan terampil dan diolah tanpa bahan pengawet ingredients : beras ketan, ketumbar bawang putih.</p>'),
	(2, 2, '2024-07-01 23:30:50', '2024-07-01 23:30:50', 'Sumpiah', 'Makanan', '100000', '<p>Renyah gurih enak dan bikin nagih cocok untuk cemilan saat musim hujan, berani coba!</p>'),
	(3, 3, '2024-07-01 23:37:11', '2024-07-01 23:37:11', 'Hiasan Dinding Rajut Talikur', 'Lainnya', '152000', '<p>Ruangan nyaman dan suasana yang indah di rumah membuat mood buster sis/bro. terkadang semua ide berawal dari rumah Mterial : Talikur</p>'),
	(4, 3, '2024-07-01 23:37:47', '2024-07-01 23:44:46', 'Talenan Kayu', 'Lainnya', '6000', '<p>Untuk koleksi kelengkapan dapur, buat souvenir juga bisa di costum gaesss</p>'),
	(5, 4, '2024-07-01 23:39:05', '2024-07-01 23:40:33', 'Tepung Singkong Dan Tepung Ubi', 'Makanan', '20000', '<p>Tepung singkong dan tepung ubi yang bisa menjadi alternatif, bisa diolah menjadi berbagai olahan makanan</p>'),
	(6, 4, '2024-07-01 23:39:42', '2024-07-01 23:40:22', 'Sister (sistik Terigu)', 'Makanan', '10000', '<p>Hayuu gaes cuaca ujan emang enak buat ngemil, cobain rasanya pedes-pedes gurih ingredients: tepung terigu, tepung tapioka, mentega, telur, bawang, seledri, garam dan bubuk cabai</p>'),
	(7, 4, '2024-07-01 23:41:16', '2024-07-01 23:41:16', 'Saroja (kembang Goyang)', 'Makanan', '52000', '<p>Ngeunah gaess rasanya mantap rasanya kriuk-kriuk cocok untuk ngemil atau temen nasi ingredients : tepung terigu, tepung beras, garam, rempah-rempah</p>');

-- Dumping data for table jda_fs8.product_photos: ~7 rows (approximately)
INSERT INTO `product_photos` (`id`, `product_id`, `created_at`, `updated_at`, `photo`) VALUES
	(1, 1, '2024-07-01 23:30:20', '2024-07-01 23:30:20', 'upload/product/sWLLQyUuvUHY41Ao.jpeg'),
	(2, 2, '2024-07-01 23:30:50', '2024-07-01 23:30:50', 'upload/product/J6X6nSudqdMH2FBD.png'),
	(3, 3, '2024-07-01 23:37:11', '2024-07-01 23:37:11', 'upload/product/CvIpZ7Eyl7ojnxlY.jpeg'),
	(4, 4, '2024-07-01 23:37:47', '2024-07-01 23:37:47', 'upload/product/aaag1tTpqsuKTbeP.jpeg'),
	(5, 5, '2024-07-01 23:39:05', '2024-07-01 23:39:05', 'upload/product/RGizfOc1belI4sbn.jpeg'),
	(6, 6, '2024-07-01 23:39:42', '2024-07-01 23:39:42', 'upload/product/9qqDeoau8OiEUbGC.jpeg'),
	(7, 7, '2024-07-01 23:41:16', '2024-07-01 23:41:16', 'upload/product/8BD3z1hj2CKxuDkV.jpeg');

-- Dumping data for table jda_fs8.sessions: ~1 rows (approximately)
-- INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
-- 	('8FujJ7X4fk5cSAGzakzGiJYrXq1fShoRX1xM3lwS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVJhaEdpZmV0VWdmYWlpd2k1QURjYjR3R3hzelZ1cjIyVzN6UktTaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1719907352);


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
