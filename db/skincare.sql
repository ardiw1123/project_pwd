-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2025 pada 20.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'cleanser'),
(2, 'moisturizer'),
(3, 'serum'),
(4, 'toner'),
(5, 'sunscreen'),
(6, 'masker'),
(7, 'lipcare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `id`, `username`, `tanggal`, `total`) VALUES
(25, NULL, 'cl@gmail.com', '2025-05-21 20:06:46', 180000),
(26, NULL, 'cl@gmail.com', '2025-05-21 20:07:33', 75000),
(27, NULL, 'cl@gmail.com', '2025-05-21 20:08:36', 45000),
(28, NULL, 'cl@gmail.com', '2025-05-21 20:22:38', 125000),
(29, NULL, 'cl@gmail.com', '2025-05-21 20:23:04', 125000),
(30, NULL, 'cl@gmail.com', '2025-05-22 15:49:09', 279000),
(31, NULL, 'cl@gmail.com', '2025-05-22 16:04:06', 474000),
(32, NULL, 'cl@gmail.com', '2025-05-22 16:10:51', 70000),
(33, NULL, 'cl@gmail.com', '2025-05-22 20:10:00', 180000),
(34, NULL, 'cl@gmail.com', '2025-05-22 20:12:25', 25000),
(35, NULL, 'cl@gmail.com', '2025-05-22 21:21:35', 86000),
(36, NULL, 'cl@gmail.com', '2025-05-22 21:22:43', 86000),
(37, NULL, 'cl@gmail.com', '2025-05-22 21:23:54', 125000),
(38, NULL, '', '2025-05-22 21:39:42', 70000),
(39, NULL, '', '2025-05-22 22:07:21', 125000),
(40, NULL, '', '2025-05-22 22:11:26', 70000),
(41, NULL, '', '2025-05-22 22:18:12', 70000),
(42, NULL, '', '2025-05-22 22:20:51', 155000),
(43, NULL, '', '2025-05-22 22:46:10', 125000),
(44, NULL, 'tata@gmail.com', '2025-05-22 22:50:50', 25000),
(45, NULL, 'cl@gmail.com', '2025-05-23 16:30:30', 70000),
(46, NULL, '', '2025-05-23 17:10:13', 280000),
(47, NULL, '', '2025-05-23 17:11:18', 180000),
(48, NULL, '', '2025-05-23 17:16:48', 170000),
(49, NULL, 'cl@gmail.com', '2025-05-23 17:30:24', 75000),
(50, NULL, 'cl@gmail.com', '2025-05-23 17:32:08', 205000),
(51, NULL, '', '2025-05-23 17:37:15', 120000),
(52, NULL, 'cl@gmail.com', '2025-05-23 17:39:23', 70000),
(53, NULL, 'cl@gmail.com', '2025-05-23 17:43:37', 216000),
(54, NULL, 'cl@gmail.com', '2025-05-23 17:45:45', 86000),
(55, NULL, 'cl@gmail.com', '2025-05-23 17:52:30', 320000),
(56, NULL, '', '2025-05-23 18:08:51', 45000),
(57, NULL, '', '2025-05-23 18:10:00', 86000),
(58, NULL, 'cl@gmail.com', '2025-05-23 18:15:38', 125000),
(59, NULL, 'cl@gmail.com', '2025-05-23 18:31:15', 115000),
(60, NULL, 'cl@gmail.com', '2025-05-23 18:33:45', 285000),
(61, NULL, 'cl@gmail.com', '2025-05-23 19:30:08', 889000),
(62, NULL, 'cl@gmail.com', '2025-05-23 19:48:10', 690000),
(63, NULL, 'cl@gmail.com', '2025-05-23 20:00:55', 180000),
(64, NULL, 'cl@gmail.com', '2025-05-23 20:01:46', 75000),
(65, NULL, 'cl@gmail.com', '2025-05-23 20:03:06', 155000),
(66, NULL, 'cl@gmail.com', '2025-05-23 20:21:40', 419000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `id_product`, `nama_produk`, `harga`, `jumlah`, `subtotal`) VALUES
(26, 25, 15, 'GLYCOLIC ACID EXFOLIATING TONER', 90000, 2, 180000),
(51, 47, 13, 'RETINOL ANTI-AGING NIGHT SERUM', 180000, 1, 180000),
(52, 48, 11, 'TINTED LIP SERUM with Jojoba Oil', 60000, 1, 60000),
(53, 48, 18, 'LIGHTWEIGHT DAILY SUNSCREEN SPF 50 PA+++', 110000, 1, 110000),
(54, 49, 10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 1, 75000),
(55, 50, 17, 'PORE PURIFYING WITCH HAZEL TONER', 80000, 1, 80000),
(56, 50, 6, 'HYALURONIC ACID HYDRATING CREAM', 125000, 1, 125000),
(57, 51, 19, 'TONE-UP MINERAL SUNSCREEN SPF 30', 120000, 1, 120000),
(58, 52, 16, 'HYDRATING ROSE WATER TONER', 70000, 1, 70000),
(59, 53, 2, 'BRIGHTENING FOAMING CLEANSER with Vitamin C', 86000, 1, 86000),
(60, 53, 22, 'HYDRATING MASK with Aloe Vera', 25000, 1, 25000),
(61, 53, 20, 'MATTE FINISH SUNSCREEN GEL SPF 50', 105000, 1, 105000),
(62, 54, 2, 'BRIGHTENING FOAMING CLEANSER with Vitamin C', 86000, 1, 86000),
(63, 55, 3, 'GENTLE HYDRATING CLEANSING BALM', 115000, 1, 115000),
(64, 55, 6, 'HYALURONIC ACID HYDRATING CREAM', 125000, 1, 125000),
(65, 55, 17, 'PORE PURIFYING WITCH HAZEL TONER', 80000, 1, 80000),
(66, 58, 9, 'HYDRATING LIP BALM SPF 15', 45000, 1, 45000),
(67, 58, 17, 'PORE PURIFYING WITCH HAZEL TONER', 80000, 1, 80000),
(68, 59, 3, 'GENTLE HYDRATING CLEANSING BALM', 115000, 1, 115000),
(69, 60, 19, 'TONE-UP MINERAL SUNSCREEN SPF 30', 120000, 1, 120000),
(70, 60, 15, 'GLYCOLIC ACID EXFOLIATING TONER', 90000, 1, 90000),
(71, 60, 10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 1, 75000),
(72, 61, 22, 'HYDRATING MASK with Aloe Vera', 25000, 2, 50000),
(73, 61, 19, 'TONE-UP MINERAL SUNSCREEN SPF 30', 120000, 2, 240000),
(74, 61, 10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 1, 75000),
(75, 61, 14, 'PORES MINIMIZING & CLARIFYING SERUM', 140000, 1, 140000),
(76, 61, 15, 'GLYCOLIC ACID EXFOLIATING TONER', 90000, 2, 180000),
(77, 61, 5, '5X CERAMIDE LOW pH CLEANSER 80ML', 99000, 1, 99000),
(78, 61, 20, 'MATTE FINISH SUNSCREEN GEL SPF 50', 105000, 1, 105000),
(79, 62, 13, 'RETINOL ANTI-AGING NIGHT SERUM', 180000, 1, 180000),
(80, 62, 16, 'HYDRATING ROSE WATER TONER', 70000, 4, 280000),
(81, 62, 3, 'GENTLE HYDRATING CLEANSING BALM', 115000, 2, 230000),
(82, 63, 13, 'RETINOL ANTI-AGING NIGHT SERUM', 180000, 1, 180000),
(83, 64, 10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 1, 75000),
(84, 65, 12, 'VITAMIN C GLOWING SERUM', 155000, 1, 155000),
(85, 66, 10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 1, 75000),
(86, 66, 7, 'NIACINAMIDE BRIGHTENING MOISTURIZER GEL\r\n\r\n', 135000, 1, 135000),
(87, 66, 18, 'LIGHTWEIGHT DAILY SUNSCREEN SPF 50 PA+++', 110000, 1, 110000),
(88, 66, 1, '3X ACID ACNE GEL CLEANSER', 99000, 1, 99000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(255) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `idKategori` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  `manfaat` text DEFAULT NULL,
  `hero_ingredients` text DEFAULT NULL,
  `cara_penggunaan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `harga`, `idKategori`, `description`, `file_path`, `stok`, `size`, `manfaat`, `hero_ingredients`, `cara_penggunaan`) VALUES
(1, '3X ACID ACNE GEL CLEANSER', 99000, 1, 'Diformulasikan dengan Pro-Potent Ingredients, kombinasi 3 jenis acid dalam satu produk yang berfokus lebih untuk mengatasi masalah jerawat secara efisien namun lembut. Green Synthesis Technology, perpaduan bahan kimia dan natural, memberikan formula yang lebih ramah lingkungan dan lebih lembut. Centella asiatica dan Pionin (Quaternium-73) menenangkan jerawat dan melawan bakteri penyebab jerawat. Tekstur gel to foam dengan busa micro bubble membantu membersihkan pori-pori yang tersumbat, minyak berlebih, dan memberikan sensasi dingin yang menyegarkan. Cocok untuk semua jenis kulit, sangat direkomendasikan untuk kulit berminyak dan berjerawat.   ', './assets/cleanser/fw1.jpg', 5, '120ml', 'Membersihkan pori-pori lebih dalam dari debu dan kotoran\r\nMenenangkan jerawat dan mengurangi minyak berlebih\r\nSensasi dingin yang menyegarkan\r\nCocok untuk semua jenis kulit, terutama kulit berminyak dan berjerawat.', '3X Acid Complex (Salicylic acid, Lactic acid, dan Lactobionic acid): kombinasi 3 jenis acid dalam rasio yang tepat, seimbang secara ilmiah dalam satu produk, efektif untuk merawat jerawat melalui pengangkatan sel kulit mati.\r\nBetaine: Humektan kuat untuk melembapkan, melindungi skin barrier, mencegah hilangnya air, dan melembutkan kulit.\r\nPionin (Quaternium-37): Melawan bakteri penyebab jerawat\r\nCentella asiatica: menenangkan dan meredakan jerawat', 'Aplikasikan pada wajah yang basah, pijat lembut dengan gerakan melingkar, hindari area mata. Bilas hingga bersih dan keringkan dengan lembut. Lanjutkan dengan langkah perawatan kulit berikutnya.'),
(2, 'BRIGHTENING FOAMING CLEANSER with Vitamin C', 86000, 1, 'Pembersih wajah berbusa lembut yang dirancang untuk membersihkan kulit secara menyeluruh sambil membantu mencerahkan tampilan kulit kusam. Mengandung Vitamin C dan ekstrak Licorice untuk membantu meratakan warna kulit dan memberikan efek glowing alami. Teksturnya yang ringan menghasilkan busa melimpah yang efektif mengangkat kotoran, minyak, dan sisa makeup tanpa membuat kulit terasa kering ketarik. Cocok untuk semua jenis kulit, terutama kulit kusam.', './assets/cleanser/fw2.jpg', 3, '100ml', 'Membersihkan kulit dari kotoran dan minyak\r\nMencerahkan tampilan kulit kusam\r\nMembantu meratakan warna kulit\r\nTidak membuat kulit kering', 'Vitamin C: Antioksidan, mencerahkan kulit\r\nEkstrak Licorice: Membantu meratakan warna kulit, anti-inflamasi\r\nGliserin: Menjaga kelembapan kulit', 'Basahi wajah dengan air. Ambil sedikit cleanser, busakan di telapak tangan, lalu aplikasikan ke seluruh wajah dengan gerakan melingkar. Bilas hingga bersih.'),
(3, 'GENTLE HYDRATING CLEANSING BALM', 115000, 1, 'Cleansing balm dengan tekstur lembut yang meleleh saat kontak dengan kulit, efektif membersihkan makeup waterproof, sunscreen, dan kotoran tanpa meninggalkan residu. Diformulasikan dengan campuran minyak alami dan Ceramide untuk menjaga kelembapan dan kesehatan skin barrier. Setelah dibilas, kulit terasa bersih, lembut, dan lembap. Sangat cocok untuk first cleanser dalam metode double cleansing, terutama untuk kulit kering dan sensitif.', './assets/cleanser/fw3.jpg', 4, '80gr', 'Membersihkan makeup waterproof dan kotoran secara efektif\r\nMenjaga kelembapan dan skin barrier\r\nTidak membuat kulit terasa kering\r\nKulit terasa lembut dan halus', 'Minyak Biji Bunga Matahari: Melarutkan kotoran dan makeup\r\nShea Butter: Melembapkan dan melembutkan\r\nCeramide: Memperkuat skin barrier', 'Ambil secukupnya cleansing balm dengan spatula pada kulit wajah yang kering. Pijat lembut dengan gerakan melingkar hingga makeup dan kotoran terangkat. Tambahkan sedikit air, pijat kembali hingga balm berubah tekstur, lalu bilas hingga bersih.'),
(5, '5X CERAMIDE LOW pH CLEANSER 80ML', 99000, 1, 'Cleanser yang efektif membersihkan wajah dari debu dan kotoran dengan lembut tanpa membuat kulit terasa kencang. Mengandung 5 jenis ceramide yang menutrisi dan menjaga lapisan kulit. Kandungan Hyaluronic Acid membantu menjaga kelembaban kulit setelah dibilas.', './assets/cleanser/fw4.jpg', 4, '80ml', 'Membersihkan wajah dari debu dan kotoran\r\nMemiliki pH yang mendekati pH kulit wajah\r\nTidak membuat kulit terasa kencang', 'Ceramide: mengandung 5 jenis ceramide yang berbeda untuk menutrisi dan menjaga lapisan kulit.\r\nAsam amino: membantu membersihkan kulit.\r\nAsam hialuronat: mengembalikan dan mengunci kelembapan pada kulit.', '1. Basahi wajah dan ambil produk secukupnya.\r\n2. Pijatkan ke wajah dengan gerakan memutar.\r\n3. Bilas hingga bersih.'),
(6, 'HYALURONIC ACID HYDRATING CREAM', 125000, 2, 'Pelembap dengan tekstur cream yang ringan dan cepat meresap, memberikan hidrasi intensif tanpa rasa lengket. Mengandung Triple Hyaluronic Acid Complex yang bekerja di berbagai lapisan kulit untuk menarik dan mengunci kelembapan. Diperkaya dengan Vitamin E sebagai antioksidan. Kulit terasa kenyal, halus, dan terhidrasi sepanjang hari. Cocok untuk semua jenis kulit, terutama kulit normal cenderung kering.', './assets/moist/moist1.jpg', 5, '50gr', 'Melembapkan kulit secara mendalam\r\nMenjaga kulit tetap kenyal dan halus\r\nTidak terasa lengket\r\nMengandung antioksidan', 'Triple Hyaluronic Acid: Menarik dan mengunci kelembapan di berbagai lapisan kulit\r\nVitamin E: Antioksidan', 'Aplikasikan secukupnya pada wajah dan leher setelah serum. Gunakan pagi dan malam hari.\r\n\r\n'),
(7, 'NIACINAMIDE BRIGHTENING MOISTURIZER GEL\r\n\r\n', 135000, 2, 'Pelembap bertekstur gel yang segar dan ringan, ideal untuk kulit berminyak dan kombinasi. Diformulasikan dengan konsentrasi Niacinamide yang optimal untuk membantu mencerahkan kulit, menyamarkan noda hitam, dan mengontrol produksi minyak berlebih. Kandungan Panthenol dan Centella Asiatica membantu menenangkan kulit. Hasilnya, kulit tampak lebih cerah, pori-pori tersamarkan, dan produksi minyak lebih terkontrol.', './assets/moist/moist2.jpg', 5, '50ml', 'Mencerahkan kulit dan menyamarkan noda hitam\r\nMengontrol minyak berlebih dan menyamarkan pori\r\nMenenangkan kulit\r\nTekstur gel yang ringan dan cepat meresap', 'Niacinamide: Mencerahkan, mengontrol minyak, menyamarkan pori\r\nPanthenol: Melembapkan, menenangkan\r\nCentella Asiatica: Menenangkan, anti-inflamasi', 'Aplikasikan merata pada wajah dan leher setelah menggunakan serum. Gunakan pagi dan malam hari.'),
(8, 'BARRIER REPAIR CERAMIDE CREAM', 145000, 2, 'Cream pelembap intensif yang diformulasikan khusus untuk memperbaiki dan memperkuat fungsi skin barrier yang rusak. Mengandung 5 jenis Ceramide esensial yang bekerja sinergis dengan Fatty Acid dan Cholesterol untuk mengembalikan lapisan lipid kulit. Teksturnya kaya namun mudah menyerap, memberikan perlindungan dan kelembapan tahan lama. Sangat direkomendasikan untuk kulit kering, sensitif, iritasi, atau setelah prosedur eksfoliasi/peeling.', './assets/moist/moist3.jpg', 5, '60gr', 'Memperbaiki dan memperkuat skin barrier\r\nMemberikan kelembapan mendalam dan tahan lama\r\nMenenangkan kulit kemerahan dan iritasi\r\nMengembalikan kesehatan kulit', '5x Ceramide Complex: Membangun kembali lapisan lipid kulit\r\nFatty Acid: Komponen esensial skin barrier\r\nCholesterol: Memperkuat struktur skin barrier', 'Aplikasikan pada wajah dan leher. Gunakan pagi dan malam hari, atau kapan pun kulit terasa kering dan membutuhkan kelembapan ekstra.'),
(9, 'HYDRATING LIP BALM SPF 15', 45000, 7, 'Lip balm harian yang melembapkan bibir kering dan pecah-pecah, sekaligus memberikan perlindungan dari sinar UV dengan SPF 15. Diperkaya dengan Shea Butter dan Beeswax untuk menciptakan lapisan pelindung yang tahan lama. Bibir terasa lembut, halus, dan terlindungi dari kekeringan serta efek buruk matahari. Tersedia dalam beberapa varian aroma ringan.', './assets/lipcare/lip1.jpg', 5, '4gr', 'Melembapkan dan mencegah bibir kering\r\nMelindungi dari sinar matahari (UV)\r\nMembuat bibir terasa halus\r\nMemberikan rasa nyaman di bibir', 'Shea Butter: Melembapkan, melembutkan\r\nBeeswax: Membuat lapisan pelindung\r\nSPF 15: Perlindungan dari sinar UV', 'Aplikasikan pada bibir kapan saja saat dibutuhkan, terutama sebelum beraktivitas di luar ruangan.'),
(10, ' OVERNIGHT LIP SLEEPING MASK', 75000, 7, 'Masker bibir yang digunakan semalaman untuk hidrasi intensif. Teksturnya seperti balm yang kental namun meleleh saat diaplikasikan. Mengandung campuran Berry Extract dan Vitamin C untuk menutrisi dan mencerahkan bibir kusam. Bangun tidur dengan bibir yang terasa sangat lembap, plump, dan bebas pecah-pecah.', './assets/lipcare/lip2.jpg', 4, '10gr', 'Melembapkan bibir secara intensif semalaman\r\nMenutrisi dan membantu mencerahkan bibir\r\nMembuat bibir terasa plump dan sehat\r\nMengatasi bibir kering dan pecah-pecah', 'Berry Mix Complex (Strawberry, Blueberry, Raspberry, etc.): Antioksidan, menutrisi\r\nVitamin C: Mencerahkan\r\nShea Butter: Melembapkan', 'Aplikasikan lapisan tebal pada bibir sebelum tidur. Biarkan semalaman dan bersihkan sisanya di pagi hari jika perlu.'),
(11, 'TINTED LIP SERUM with Jojoba Oil', 60000, 7, 'Perpaduan antara lip serum yang menutrisi dan lip tint yang memberikan warna alami. Diformulasikan dengan Jojoba Oil dan Vitamin E untuk melembapkan dan merawat bibir. Memberikan sedikit warna yang fresh dan sehat, sekaligus menjaga bibir tetap lembap sepanjang hari. Tidak terasa berat atau lengket. Tersedia dalam beberapa pilihan shade.', './assets/lipcare/lip3.jpg', 4, '3ml', 'Melembapkan dan menutrisi bibir\r\nMemberikan warna alami dan segar\r\nTidak lengket atau terasa berat\r\nMerawat bibir agar lebih sehat', 'Jojoba Oil: Melembapkan, mirip sebum alami kulit\r\nVitamin E: Antioksidan, melembutkan\r\nNatural Pigments: Memberikan warna alami', 'Aplikasikan langsung pada bibir menggunakan aplikator. Dapat digunakan sendiri atau sebagai base sebelum lipstik.'),
(12, 'VITAMIN C GLOWING SERUM', 155000, 3, 'Serum pencerah yang ampuh dengan konsentrasi Vitamin C stabil untuk membantu mengurangi noda hitam, meratakan warna kulit, dan memberikan efek glowing. Mengandung Ferulic Acid dan Vitamin E yang bekerja sinergis dengan Vitamin C untuk meningkatkan efektivitasnya sebagai antioksidan. Teksturnya ringan dan cepat meresap. Cocok untuk kulit kusam dengan masalah hiperpigmentasi.', './assets./serum/serum2.jpg', 4, '30ml', 'Mencerahkan kulit dan meratakan warna kulit\r\nMenyamarkan noda hitam dan bekas jerawat\r\nMemberikan efek glowing\r\nSebagai antioksidan melindungi kulit dari radikal bebas', 'Vitamin C (Ascorbic Acid Stabil): Agen pencerah dan antioksidan\r\nFerulic Acid: Meningkatkan stabilitas dan efektivitas Vitamin C\r\nVitamin E: Antioksidan', 'Aplikasikan 2-3 tetes pada wajah yang bersih, tepuk-tepuk lembut hingga meresap. Gunakan di pagi hari sebelum sunscreen untuk perlindungan antioksidan maksimal.'),
(13, 'RETINOL ANTI-AGING NIGHT SERUM', 180000, 3, 'Serum malam hari yang diformulasikan dengan Retinol encapsulated (terenkapsulasi) untuk penetrasi yang lebih stabil dan minim iritasi. Membantu menyamarkan tanda-tanda penuaan seperti garis halus dan kerutan, meningkatkan elastisitas kulit, dan memperbaiki tekstur kulit. Diperkaya dengan Hyaluronic Acid dan Ceramide untuk menjaga kelembapan dan kenyamanan kulit selama penggunaan Retinol. Gunakan secara bertahap.', './assets/serum/serum3.jpg', 5, '20ml', 'Menyamarkan garis halus dan kerutan\r\nMeningkatkan elastisitas dan kekencangan kulit\r\nMemperbaiki tekstur kulit\r\nMerangsang regenerasi sel kulit', 'Encapsulated Retinol: Agen anti-aging, minim iritasi\r\nHyaluronic Acid: Melembapkan\r\nCeramide: Memperkuat skin barrier', 'Gunakan hanya di malam hari. Aplikasikan 2-3 tetes setelah toner, hindari area mata dan sudut bibir. Awali dengan 2-3 kali seminggu, tingkatkan frekuensi secara bertahap jika kulit sudah terbiasa. Wajib gunakan sunscreen di pagi hari.'),
(14, 'PORES MINIMIZING & CLARIFYING SERUM', 140000, 3, 'Serum yang menargetkan masalah pori-pori besar dan kulit kusam akibat penumpukan sel kulit mati. Mengandung BHA (Salicylic Acid) untuk membersihkan pori-pori secara mendalam dan PHA untuk eksfoliasi permukaan yang lembut. Diperkaya dengan Zinc PCA untuk mengontrol produksi sebum. Kulit terasa lebih bersih, pori-pori tampak tersamarkan, dan tekstur kulit lebih halus.', './assets/serum/serum4.jpg', 5, '30ml', 'Menyamarkan tampilan pori-pori besar\r\nMembersihkan pori-pori dari komedo dan kotoran\r\nMengontrol produksi minyak berlebih\r\nMengeksfoliasi sel kulit mati secara lembut', 'BHA (Salicylic Acid): Mengeksfoliasi di dalam pori, anti-inflamasi\r\nPHA (Gluconolactone): Mengeksfoliasi permukaan kulit, melembapkan\r\nZinc PCA: Mengontrol sebum, antibakteri', 'Aplikasikan 2-3 tetes pada wajah setelah toner. Gunakan di malam hari, atau pagi/malam jika kulit sudah terbiasa. Hindari penggunaan bersamaan dengan produk eksfoliasi kuat lainnya.'),
(15, 'GLYCOLIC ACID EXFOLIATING TONER', 90000, 4, 'Toner eksfoliasi yang efektif mengangkat sel kulit mati dan membersihkan pori-pori tersumbat berkat kandungan Glycolic Acid (AHA). Membantu memperbaiki tekstur kulit, mencerahkan tampilan kulit kusam, dan mengurangi komedo. Diformulasikan dengan Allantoin dan Aloe Vera untuk menenangkan kulit setelah eksfoliasi. Gunakan beberapa kali seminggu di malam hari.', './assets/toner/toner1.jpg', 5, '150ml', 'Mengeksfoliasi sel kulit mati\r\nMembersihkan pori-pori dan mengurangi komedo\r\nMemperbaiki tekstur kulit\r\nMencerahkan kulit kusam', 'Glycolic Acid (AHA): Mengeksfoliasi permukaan kulit\r\nAllantoin: Menenangkan, melembutkan\r\nAloe Vera Extract: Melembapkan, menenangkan', 'Setelah membersihkan wajah di malam hari, tuang secukupnya pada kapas dan usapkan lembut ke seluruh wajah, hindari area mata dan bibir. Jangan dibilas. Lanjutkan dengan serum/pelembap. Awali penggunaan 2-3 kali seminggu. Wajib gunakan sunscreen di pagi hari.'),
(16, 'HYDRATING ROSE WATER TONER', 70000, 4, 'Toner ringan berbasis air mawar alami yang menyegarkan dan menghidrasi kulit setelah mencuci muka. Membantu mengembalikan keseimbangan pH kulit dan mempersiapkan kulit untuk menerima produk skincare selanjutnya. Mengandung Hyaluronic Acid untuk kelembapan ekstra. Cocok untuk semua jenis kulit, terutama kulit normal dan kering.', './assets/toner/toner2.jpg', 5, '180ml', 'Menyegarkan dan menghidrasi kulit\r\nMengembalikan pH kulit setelah mencuci muka\r\nMempersiapkan kulit untuk skincare berikutnya\r\nMemberikan rasa nyaman', 'Air Mawar (Rose Water): Menyegarkan, antioksidan ringan\r\nHyaluronic Acid: Melembapkan', 'Setelah membersihkan wajah, tuang toner ke telapak tangan atau kapas, lalu tepuk-tepuk atau usapkan lembut ke seluruh wajah hingga meresap. Gunakan pagi dan malam hari.'),
(17, 'PORE PURIFYING WITCH HAZEL TONER', 80000, 4, 'Toner astringent yang membantu membersihkan pori-pori dari sisa kotoran dan minyak, serta memberikan efek menenangkan pada kulit berminyak dan berjerawat. Mengandung Witch Hazel Extract yang dikenal dapat membantu menyamarkan tampilan pori dan mengurangi minyak. Diperkaya dengan ekstrak Green Tea sebagai antioksidan. Gunakan setelah mencuci muka untuk rasa segar dan bersih.', './assets/toner/toner3.jpg', 4, '150ml', 'Membantu membersihkan pori-pori\r\nMengurangi tampilan pori-pori\r\nMengontrol minyak berlebih\r\nMenyegarkan kulit', 'Witch Hazel Extract: Astringent, menyamarkan pori, anti-inflamasi ringan\r\nGreen Tea Extract: Antioksidan', 'Setelah membersihkan wajah, tuang toner pada kapas dan usapkan ke seluruh wajah, fokus pada area T-zone jika kulit berminyak. Gunakan pagi dan malam hari.'),
(18, 'LIGHTWEIGHT DAILY SUNSCREEN SPF 50 PA+++', 110000, 5, 'Sunscreen harian dengan perlindungan tinggi SPF 50 PA+++ dari sinar UVA dan UVB. Teksturnya sangat ringan seperti lotion, mudah meresap, dan tidak meninggalkan white cast atau rasa lengket. Cocok untuk semua jenis kulit, termasuk di bawah makeup. Diformulasikan dengan beberapa agen pelembap agar kulit tidak kering saat menggunakan sunscreen.', './assets/sunscreen/ss1.jpg', 5, '50ml', 'Perlindungan tinggi dari sinar UVA dan UVB\r\nTekstur ringan, cepat meresap\r\nTidak white cast dan tidak lengket\r\nMelembapkan kulit', 'Chemical UV Filters (contoh: Avobenzone, Octinoxate): Melindungi dari sinar UV\r\nHyaluronic Acid: Melembapkan', 'Aplikasikan merata ke seluruh wajah dan leher sebagai langkah terakhir skincare di pagi hari, minimal 15-20 menit sebelum terpapar sinar matahari. Aplikasikan kembali setiap 2-3 jam jika beraktivitas di luar ruangan atau berkeringat.'),
(19, 'TONE-UP MINERAL SUNSCREEN SPF 30', 120000, 5, 'Sunscreen berbasis mineral (mengandung Zinc Oxide dan Titanium Dioxide) yang cocok untuk kulit sensitif. Memberikan efek tone-up ringan yang membantu mencerahkan tampilan kulit secara instan tanpa terlihat abu-abu. Dengan SPF 30, memberikan perlindungan harian yang cukup dari sinar UV. Formulanya lembut dan minim iritasi.', './assets/sunscreen/ss2.jpg', 5, '50gr', 'Perlindungan dari sinar UV (mineral filter)\r\nCocok untuk kulit sensitif\r\nMemberikan efek tone-up/mencerahkan instan\r\nMeminimalkan risiko iritasi', 'Zinc Oxide: UV filter fisik, menenangkan\r\nTitanium Dioxide: UV filter fisik\r\nNiacinamide: Membantu mencerahkan', 'Aplikasikan merata ke seluruh wajah dan leher di pagi hari. Dapat digunakan sendiri atau sebagai dasar makeup.'),
(20, 'MATTE FINISH SUNSCREEN GEL SPF 50', 105000, 5, 'Sunscreen bertekstur gel yang memberikan hasil akhir matte, sangat ideal untuk kulit berminyak dan cenderung berjerawat. Melindungi kulit dari sinar UVA dan UVB dengan SPF 50 PA+++. Formulanya bebas minyak dan tidak menyumbat pori. Memberikan efek oil control yang membantu menjaga kulit tetap matte sepanjang hari.', './assets/sunscreen/ss3.jpg', 4, '50ml', 'Perlindungan tinggi dari sinar UVA dan UVB\r\nHasil akhir matte, mengontrol minyak\r\nTidak menyumbat pori (non-comedogenic)\r\nTekstur gel yang ringan', 'Chemical/Hybrid UV Filters (sesuai formula)\r\nSilica: Memberikan efek matte\r\nEkstrak Witch Hazel: Mengontrol minyak', 'Aplikasikan secukupnya pada wajah dan leher setelah semua skincare meresap, di pagi hari. Gunakan kembali jika diperlukan.'),
(21, 'DEEP PORE CLAY MASK with Charcoal', 95000, 6, 'Masker bilas berbasis clay yang efektif membersihkan pori-pori secara mendalam dan menyerap minyak berlebih. Mengandung Bentonite dan Kaolin Clay untuk menarik kotoran, serta Activated Charcoal untuk detoksifikasi. Membantu mengurangi tampilan pori-pori dan membuat kulit terasa lebih bersih dan halus. Cocok untuk kulit berminyak dan berjerawat.', './assets/mask/mask1.jpg', 5, '100gr', 'Membersihkan pori-pori secara mendalam\r\nMenyerap minyak berlebih\r\nMengurangi tampilan pori-pori\r\nDetoksifikasi kulit', 'Bentonite Clay: Menyerap minyak dan kotoran\r\nKaolin Clay: Membersihkan dan menenangkan\r\nActivated Charcoal: Menyerap racun dan kotoran', 'Aplikasikan lapisan tipis pada wajah yang bersih dan kering, hindari area mata dan bibir. Biarkan selama 10-15 menit atau hingga kering. Bilas dengan air hangat sambil memijat lembut. Gunakan 1-2 kali seminggu.'),
(22, 'HYDRATING MASK with Aloe Vera', 25000, 6, 'Mask yang memberikan hidrasi dan rasa menenangkan seketika. Essence-nya kaya akan ekstrak Aloe Vera dan Hyaluronic Acid yang membantu melembapkan kulit kering, meredakan kemerahan, dan memberikan kesegaran. Material sheet mask yang lembut menempel sempurna di wajah untuk penyerapan essence yang optimal. Cocok untuk semua jenis kulit yang membutuhkan hidrasi cepat atau setelah terpapar sinar matahari.', './assets/mask/mask2.jpg', 5, '25ml', 'Melembapkan kulit secara cepat\r\nMeredakan kemerahan dan iritasi\r\nMemberikan rasa segar dan nyaman\r\nKulit terasa lebih plump', 'Aloe Vera Extract: Menenangkan, melembapkan\r\nHyaluronic Acid: Menarik dan mengunci kelembapan\r\nGlycerin: Humektan', 'Bersihkan wajah dan gunakan toner. Aplikasikan mask pada wajah, sesuaikan dengan kontur wajah. Biarkan selama 15-20 menit. Lepaskan mask dan tepuk-tepuk sisa essence hingga meresap.'),
(23, 'OVERNIGHT RENEWAL SLEEPING MASK', 130000, 6, 'Masker wajah yang digunakan sebagai langkah terakhir perawatan di malam hari dan dibiarkan semalaman. Tekstur gel-cream yang ringan namun menutrisi, bekerja saat kamu tidur untuk merevitalisasi kulit. Mengandung Niacinamide untuk mencerahkan dan Ceramide untuk memperkuat barrier. Bangun dengan kulit yang terasa lebih kenyal, lembap, dan tampak lebih segar.', './assets/mask/mask3.jpg', 4, '80gr', 'Merevitalisasi kulit semalaman\r\nMemberikan hidrasi dan nutrisi\r\nMencerahkan tampilan kulit\r\nMembuat kulit terasa kenyal dan segar di pagi hari', 'Niacinamide: Mencerahkan, memperkuat barrier\r\nCeramide: Memperkuat barrier, menjaga kelembapan\r\nHyaluronic Acid: Melembapkan', 'Aplikasikan merata sebagai langkah terakhir skincare malam, ganti penggunaan pelembap. Biarkan semalaman. Bilas di pagi hari saat mencuci muka. Gunakan 2-3 kali seminggu.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kabupaten` varchar(25) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  `desa` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama_lengkap`, `no_telp`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `alamat`) VALUES
(1, 'ardigunawanpratama@gmail.com', 'ardi123', 'Ardi Gunawan Pratama', '081222769057', 'DI Yogyakarta', 'Kab. Sleman', 'Depok', 'Caturtunggal', 'Janti'),
(3, 'cl@gmail.com', '000', 'cleo', '088811112222', 'Prov. Jawa Barat', 'Kota Bekasi', 'Mustikajaya', 'Padurenan', 'Jl. Durian');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_id` (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_id_product` (`id_product`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_idKategori` (`idKategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_idkategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
