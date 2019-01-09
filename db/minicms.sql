-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2019 at 07:02 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(4, 'Fresh Book', 'http://freshbooks.com', 'freshbook.jpg', '2009-02-05'),
(7, 'Cinema 21', 'http://21cineplex.com', 'cinema21.jpg', '2008-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 3),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 2),
(1, 'Kalender Tahun 2009', 'kalender2009.rar', '2009-02-06', 8),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 3),
(9, 'Slide  Pemrograman VBA Excell', 'Excell_VBA.ppt', '2009-11-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_seo` varchar(255) DEFAULT NULL,
  `isi_halaman` text NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `create_at`, `update_at`) VALUES
(1, 'Profil', NULL, '<p>\r\n<strong>Bukulokomedia.com</strong> merupakan website resmi dari penerbit\r\nLokomedia yang bermarkas di Jl. Jambon. Perum. Pesona Alam Hijau 2 Blok B-4 Kricak, Jatimulyo, Yogyakarta\r\n55242. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret\r\n2008.<br />\r\n<br />\r\nProduk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema Web, terutama PHP (<span style=\"font-weight: bold; font-style: italic\">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.\r\n</p>\r\n', '2010-05-31', NULL),
(2, 'Visi dan Misi', NULL, '<p>\r\nVisi :\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nMisi :\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n', '2010-05-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'Ariawan', 'ariawan@gmail.com', 'Mohon Informasi', 'Mohon informasi mengenai buku yang diterbitkan oleh Lokomedia.', '2008-02-10'),
(4, 'lukman', 'lukman@hakim', 'Request Code', 'Tolong dunk ..', '2009-02-25'),
(8, 'lukman', 'lukman@bukulokomedia.com', 'kontak kami', 'tes modul hubungi kami', '2010-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `alamat_website` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `alamat_website`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'bukulokomedia.com - penerbit lokomedia yogyakartas', 'http://localhost/lokomedia', 'lokomedia adalah penerbit buku-buku komputer khususnya di bidang pemrograman web dan internet.', 'lokomedia, bukulokomedia, toko online, buku komputer, trik, tutorial, konsultasi, distro kaos, php', 'favicon.ico');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `updated_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`, `date_created`, `date_updated`, `created_from_ip`, `updated_from_ip`) VALUES
(855, 'berita', 'berita', 'Y', '2017-05-13 17:29:00', '2017-05-13 17:29:00', '::1', '::1'),
(854, 'gaming', 'gaming', 'Y', '2017-05-13 17:28:46', '2017-05-13 17:28:46', '::1', '::1'),
(856, 'pemrograman', 'pemrograman', 'Y', '2017-05-13 17:29:08', '2017-05-13 17:29:08', '::1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(12, 71, 'Wisnu', 'wisnu.wordpress.com', 'pertamax', '2009-02-02', '08:10:23', 'Y'),
(13, 71, 'Adrian', 'adrian.blogspot.com', 'CR 7 emang idola gua, melesat terus ya prestasinya.', '2009-02-02', '09:06:01', 'Y'),
(15, 79, 'Armen', 'detik.com', 'ahmadinejad emang idolaku', '2009-02-03', '10:05:20', 'Y'),
(17, 74, 'Lukman', 'hakim.com', 'apakah browser google secanggih search enginenya?', '2009-02-21', '10:12:23', 'Y'),
(34, 92, 'Rudi', 'bukulokomedia.com', ' Kalau  tentang  gue,  kapan  dibuat  filmnya  ya?   ', '2009-10-28', '21:21:21', 'Y'),
(22, 77, 'Raihan', 'bukulokomedia.com', 'mas .. tolong kirimin source code proyek lokomedia&nbsp; ke email saya di raihan@gmail.com', '2009-08-25', '16:30:00', 'Y'),
(23, 77, 'Wawan', 'bukulokomedia.com', 'woi .. kunjungin dong website saya di http://bukulokomedia.com, jangan lupa kasih komen dan sarannya ya.', '2009-08-25', '16:31:50', 'Y'),
(36, 93, 'Lukman', 'google.com', 'tes  kata-kata  jelek  sex   ', '2009-11-04', '10:04:26', 'Y'),
(65, 85, 'hilman', 'antonhilman.com', ' emang  sih,  windows  7  lebih  cepat  dibandingkan  vista,  tapi  masih  banyak  bug  bung.   ', '2010-01-15', '04:16:25', 'Y'),
(66, 78, 'ronaldinho', 'ronaldino.com', ' ronaldo  pantas  mendapatkannya  tahun  ini  dan  kayaknya  tahun  depan  masih  menjadi  miliknya.   ', '2010-01-15', '04:18:08', 'Y'),
(67, 99, 'lukman', 'bukulokomedia.com', ' tes   ', '2010-02-11', '02:42:46', 'Y'),
(69, 99, 'fathan', 'bukulokomedia.com', 'keduax', '2010-02-15', '07:44:12', 'Y'),
(70, 99, 'Rianto', 'bukulokomedia.com', ' kok  nggak  ada  yang  pertamax  ..  langsung  keduax  sih.   ', '2010-05-16', '11:33:26', 'Y'),
(72, 99, 'lokomedia', 'bukulokomedia.com', ' test  paging  komentar   ', '2012-01-03', '17:50:14', 'Y'),
(73, 99, 'husada', 'bukulokomedia.com', ' perbaikan  paging  halaman  komentar   ', '2012-01-03', '17:53:03', 'Y'),
(74, 99, 'hendra', 'bukulokomedia.com', ' iya  kemarin  sudah  saya  coba  yang  CMS  Lokomedia  versi  1.5,  paging  komentarnya  masih  error.   ', '2012-01-03', '17:53:59', 'Y'),
(75, 99, 'lukman', 'bukulokomedia.com', ' @  husada  dan  hendra:  terimakasih  atas  perbaikan  bugnya.   ', '2012-01-03', '17:54:41', 'Y'),
(76, 99, 'lokomedia', 'bukulokomedia.com', ' pada  versi  1.5.5,  bug  paging  halaman  komentar  sudah  diperbaiki.   ', '2012-01-03', '17:55:27', 'Y'),
(77, 99, 'hendra', 'bukulokomedia.com', ' paging  halaman  komentar  sudah  berjalan  dengan  baik,  thanks  lokomedia   ', '2012-01-03', '17:56:12', 'Y'),
(92, 124, 'lukman', 'bukulokomedia.com', ' tes  komentar  pakai  url  http://bukulokomedia.com   ', '2012-05-02', '11:27:28', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `data_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_from_ip` varchar(255) NOT NULL,
  `updated_from_ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `data_menu`, `aktif`, `date_created`, `date_updated`, `created_from_ip`, `updated_from_ip`) VALUES
(1, 'Menu 1', '[{\"link\":\"/\",\"tipe\":\"link\",\"label\":\"Home\"},{\"link\":\"#\",\"tipe\":\"link\",\"label\":\"Tutorials\",\"children\":[{\"link\":\"kategori/pemrograman\",\"tipe\":\"kategori\",\"label\":\"Pemrograman\"}]},{\"link\":\"kategori/gaming\",\"tipe\":\"kategori\",\"label\":\"Gaming\"}]', 'Y', '0000-00-00 00:00:00', '2017-05-01 18:57:30', '', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE `poling` (
  `id_poling` int(5) NOT NULL,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `rating`, `aktif`) VALUES
(1, 'Internet Explorer', 'Jawaban', 23, 'Y'),
(2, 'Mozilla Firefox', 'Jawaban', 81, 'Y'),
(3, 'Google Chrome', 'Jawaban', 21, 'Y'),
(4, 'Opera', 'Jawaban', 22, 'Y'),
(8, 'Apa Browser Favorit Anda?', 'Pertanyaan', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `readmore` text COLLATE latin1_general_ci NOT NULL,
  `isi_berita` longtext COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tags` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `updated_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `readmore`, `isi_berita`, `gambar`, `dibaca`, `tags`, `date_created`, `date_updated`, `created_from_ip`, `updated_from_ip`) VALUES
(862, 856, 'admin', 'Tutorial Web Programming Part II : Pengenalan CSS', 'tutorial-web-programming-part-ii-pengenalan-css', 'CSS atau singkat Cascading Style Sheet merupakan aturan untuk mengatur beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam. CSS bukan merupakan bahasa pemograman.', '<p><strong>Apa itu CSS ?</strong></p>\r\n\r\n<p>CSS atau singkat <em><strong>Cascading Style Sheet</strong></em> merupakan aturan untuk mengatur beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam. CSS bukan merupakan bahasa pemograman.</p>\r\n\r\n<p>CSS dapat mengendalikan ukuran gambar, warna bagian tubuh pada teks, warna tabel, ukuran border, warna border, warna hyperlink, warna mouse over, spasi antar paragraf, spasi antar teks, margin kiri, kanan, atas, bawah, dan parameter lainnya. CSS adalah bahasa style sheet yang digunakan untuk mengatur tampilan dokumen. Dengan adanya CSS memungkinkan kita untuk menampilkan halaman yang sama dengan format yang berbeda.</p>', 'http://localhost/new_website2/assets/upload/gallery/post2.png', 6, '[\"web\",\"css\",\"webprogramming\"]', '2017-05-13 17:49:23', '2017-05-13 17:49:23', '::1', '::1'),
(322, 856, 'admin', 'Tutorial Web Programming Part I : Pengenalan HTML', 'tutorial-web-programming-part-i-pengenalan-html', 'HTML adalah singkatan Hyper Text Markup Language merupakan sebuah bahasa yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah browser web dan pemformatan hiperteks sederhana yang ditulis dalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegerasi.', '<p><strong>Apa Itu HTML ?</strong></p>\r\n\r\n<p>HTML adalah singkatan Hyper Text Markup Language merupakan sebuah bahasa yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah browser web dan pemformatan hiperteks sederhana yang ditulis dalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegerasi. Dengan kata lain, berkas yang dibuat dalam perangkat lunak pengolah kata dan disimpan dalam format ASCII normal sehingga menjadi halaman web dengan perintah-perintah HTML. Bermula dari sebuah bahasa yang sebelumnya banyak digunakan di dunia penerbitan dan percetakan yang disebut dengan SGML (Standard Generalized Markup Language), HTML adalah sebuah standar yang digunakan secara luas untuk menampilkan halaman web. HTML saat ini merupakan standar Internet yang didefinisikan dan dikendalikan penggunaannya oleh World Wide Web Consortium (W3C). HTML dibuat oleh kolaborasi Caillau TIM dengan Berners-lee Robert ketika mereka bekerja di CERN pada tahun 1989.</p>\r\n\r\n<p><strong>Struktur Dasar HTML</strong></p>\r\n\r\n<p>Dokumen HTML disimpan dalam format file teks reguler dengan ekstensi <em><strong>.html</strong></em>, dokumen ini berisi tag-tag yang memerintah web browser untuk melakukan perintah yang telah di spesifikasi. di bawah adalah gambaran struktur dasar HTML :</p>\r\n\r\n<pre>\r\n<code class=\"language-html\">&lt;html&gt;\r\n &lt;head&gt;\r\n  ...... ---&gt; deskripsi dokumen \r\n &lt;/head&gt;\r\n &lt;body&gt;\r\n  ...... ---&gt; konten dokumen\r\n &lt;body&gt;\r\n&lt;/html&gt;</code></pre>\r\n\r\n<p>Contoh Dokumen HTML Sederhana :</p>\r\n\r\n<pre>\r\n<code class=\"language-html\"> &lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n &lt;head&gt;\r\n  &lt;title&gt;Judul Halaman&lt;/title&gt;\r\n &lt;/head&gt;\r\n &lt;body&gt;\r\n\r\n  &lt;h1&gt;Heading Pertama&lt;/h1&gt;\r\n  &lt;p&gt;Paragraf Pertama.&lt;/p&gt;\r\n\r\n &lt;/body&gt;\r\n&lt;/html&gt; </code></pre>\r\n\r\n<ul>\r\n	<li>&lt;!DOCTYPE html&gt; : adalah elemen mendeklarasi kan jika dokumen ini adalah dokumen HTML5</li>\r\n	<li><strong>&lt;html&gt; :</strong> adalah elemen yang menandai dimulainya sebuah dokumen HTML.</li>\r\n	<li><strong>&lt;head&gt; : </strong>adalah elemen yang berisi informasi mengenai dokumen tersebut.</li>\r\n	<li><strong>&lt;title&gt; : </strong>adalah elemen yang mendeskripsikan judul dari dokumen.</li>\r\n	<li><strong>&lt;body&gt; : </strong>adalah elemen berisi konten halaman yang terlihat pada web browser.</li>\r\n	<li><strong>&lt;h1&gt; : </strong>adalah elemen yang mendefinisikan sebuah heading(judul kepala) yang besar.</li>\r\n	<li><strong>&lt;p&gt; : </strong>adalah elemen yang mendefisikan sebuah paragraf.</li>\r\n</ul>', 'http://localhost/new_website2/assets/upload/gallery/post.png', 47, '[\"web\",\"html\",\"webprogramming\"]', '2017-05-13 17:31:23', '2017-05-16 10:30:43', '::1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(5) NOT NULL,
  `setting_params` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `setting_params`, `value`) VALUES
(1, 'site_title', 'DreanLab.com'),
(2, 'site_tag', 'Tech & Coder Blog'),
(3, 'seo_enabled', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `urutan` varchar(5) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_from_ip` varchar(255) NOT NULL,
  `updated_from_ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `judul`, `caption`, `gambar`, `urutan`, `link`, `date_created`, `date_updated`, `created_from_ip`, `updated_from_ip`) VALUES
(257, 'ksajklsas', '<p>asdasdassad</p>', 'http://localhost/new_website2/assets/upload/news_xlarge_Aimer_art201605_sub-e1463766535963.jpg', '1', 'https://www.asus.com/us/ROG-Republic-Of-Gamers/ROG-GL502VT/', '2017-04-29 13:48:14', '2017-04-29 13:48:14', '::1', '::1'),
(968, 'fvdfv', '<p>asdasdasd</p>', 'http://localhost/new_website2/assets/upload/absolver4-600x338.jpg', '2', 'https://www.asus.com/us/ROG-Republic-Of-Gamers/ROG-GL502VT/', '2017-05-13 16:45:17', '2017-05-13 16:45:17', '::1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL,
  `kode_negara` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`, `kode_negara`) VALUES
('36.84.68.144', '2016-06-26', 25, '1466888114', 'ID'),
('37.130.229.149', '2016-06-26', 5, '1466954941', 'GB'),
('37.130.229.149', '2016-06-26', 5, '1466954941', 'GB'),
('51.254.129.90', '2016-06-26', 1, '1466949949', 'FR'),
('36.84.68.160', '2016-06-26', 10, '1466956954', 'ID'),
('66.220.156.114', '2016-06-26', 1, '1466956344', 'US'),
('66.220.152.35', '2016-06-26', 2, '1466956353', 'US'),
('66.220.152.35', '2016-06-26', 2, '1466956353', 'US'),
('66.220.152.32', '2016-06-26', 1, '1466956353', 'US'),
('66.220.152.33', '2016-06-26', 1, '1466956353', 'US'),
('66.220.152.32', '2016-06-26', 1, '1466956354', 'US'),
('66.220.152.34', '2016-06-26', 1, '1466956354', 'US'),
('66.220.152.36', '2016-06-26', 1, '1466956353', 'US'),
('202.4.186.185', '2016-06-27', 1, '1467003262', 'ID'),
('69.30.213.18', '2016-06-28', 1, '1467077099', 'US'),
('77.248.252.113', '2016-07-01', 1, '1467379311', 'NL'),
('36.84.68.238', '2016-07-03', 15, '1467560684', 'ID'),
('158.69.200.205', '2016-07-04', 1, '1467613506', 'US'),
('36.84.225.83', '2016-07-10', 12, '1468147012', 'ID'),
('173.252.74.103', '2016-07-10', 1, '1468146028', 'US'),
('66.220.146.229', '2016-07-10', 2, '1468146035', 'US'),
('66.220.146.228', '2016-07-10', 1, '1468146035', 'US'),
('66.220.146.228', '2016-07-10', 1, '1468146035', 'US'),
('66.220.146.228', '2016-07-10', 1, '1468146035', 'US'),
('66.220.146.224', '2016-07-10', 1, '1468146035', 'US'),
('66.220.146.228', '2016-07-10', 1, '1468146035', 'US'),
('66.220.146.227', '2016-07-10', 1, '1468146036', 'US'),
('146.185.31.214', '2016-07-10', 1, '1468148725', 'GB'),
('146.185.31.214', '2016-07-10', 1, '1468148725', 'GB'),
('146.185.31.214', '2016-07-10', 1, '1468148725', 'GB'),
('146.185.31.214', '2016-07-10', 1, '1468148725', 'GB'),
('66.249.71.134', '2016-07-11', 1, '1468230600', 'US'),
('36.84.225.116', '2016-07-11', 1, '1468252178', 'ID'),
('66.249.71.249', '2016-07-14', 1, '1468483501', 'US'),
('174.34.135.242', '2016-07-15', 7, '1468516161', 'US'),
('192.187.104.235', '2016-07-15', 1, '1468533577', 'US'),
('69.63.188.202', '2016-07-15', 1, '1468553347', 'US'),
('173.252.122.123', '2016-07-15', 2, '1468553355', 'US'),
('173.252.122.118', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.117', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.116', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.121', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.120', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.120', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.118', '2016-07-15', 1, '1468553355', 'US'),
('173.252.122.118', '2016-07-15', 1, '1468553355', 'US'),
('66.249.71.249', '2016-07-16', 1, '1468684679', 'US'),
('151.80.41.169', '2016-07-18', 1, '1468797448', 'FR'),
('5.9.62.130', '2016-07-18', 3, '1468850685', 'DE'),
('66.249.71.249', '2016-07-19', 1, '1468901334', 'US'),
('51.255.48.152', '2016-07-20', 3, '1469003925', 'FR'),
('136.243.152.18', '2016-07-20', 5, '1469004878', 'DE'),
('159.253.145.183', '2016-07-20', 1, '1469033806', 'NL'),
('204.187.14.74', '2016-07-20', 2, '1469033944', 'CA'),
('159.253.145.183', '2016-07-21', 1, '1469034183', 'NL'),
('204.187.14.66', '2016-07-21', 2, '1469034251', 'CA'),
('138.99.167.232', '2016-07-21', 1, '1469050971', 'BR'),
('181.228.144.244', '2016-07-21', 1, '1469052121', 'AR'),
('202.4.186.185', '2016-07-21', 26, '1469081620', 'ID'),
('204.187.14.67', '2016-07-21', 4, '1469077645', 'CA'),
('173.252.88.95', '2016-07-21', 1, '1469075722', 'US'),
('173.252.115.167', '2016-07-21', 1, '1469075727', 'US'),
('173.252.115.166', '2016-07-21', 1, '1469075727', 'US'),
('173.252.115.169', '2016-07-21', 1, '1469075728', 'US'),
('173.252.115.166', '2016-07-21', 1, '1469075728', 'US'),
('173.252.115.171', '2016-07-21', 1, '1469075728', 'US'),
('173.252.115.166', '2016-07-21', 1, '1469075728', 'US'),
('204.187.14.74', '2016-07-21', 2, '1469079616', 'CA'),
('173.252.88.86', '2016-07-21', 1, '1469080926', 'US'),
('173.252.102.115', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.115', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.118', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.118', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.114', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.113', '2016-07-21', 1, '1469080932', 'US'),
('173.252.102.119', '2016-07-21', 1, '1469080933', 'US'),
('173.252.102.114', '2016-07-21', 1, '1469080933', 'US'),
('43.230.185.101', '2016-07-21', 1, '1469093062', 'IN'),
('92.251.85.21', '2016-07-21', 1, '1469104214', 'MT'),
('189.110.223.126', '2016-07-22', 1, '1469120628', 'BR'),
('177.79.47.124', '2016-07-22', 1, '1469135355', 'BR'),
('191.23.47.1', '2016-07-22', 1, '1469139526', 'BR'),
('177.193.63.98', '2016-07-22', 1, '1469146261', 'BR'),
('187.0.81.16', '2016-07-22', 1, '1469146591', 'BR'),
('187.195.233.98', '2016-07-22', 1, '1469153609', 'MX'),
('85.206.12.8', '2016-07-22', 1, '1469164717', 'LT'),
('79.143.178.116', '2016-07-22', 1, '1469169497', 'DE'),
('204.187.14.67', '2016-07-22', 8, '1469199451', 'CA'),
('204.187.14.75', '2016-07-22', 12, '1469202820', 'CA'),
('204.187.14.74', '2016-07-22', 8, '1469202077', 'CA'),
('204.187.14.73', '2016-07-22', 10, '1469201224', 'CA'),
('36.84.68.213', '2016-07-22', 116, '1469203004', 'ID'),
('204.187.14.66', '2016-07-22', 4, '1469203112', 'CA'),
('173.252.90.97', '2016-07-22', 2, '1469202465', 'US'),
('173.252.113.119', '2016-07-22', 4, '1469201271', 'US'),
('173.252.113.119', '2016-07-22', 4, '1469201271', 'US'),
('173.252.113.118', '2016-07-22', 1, '1469201271', 'US'),
('173.252.113.114', '2016-07-22', 1, '1469201271', 'US'),
('173.252.113.114', '2016-07-22', 1, '1469201271', 'US'),
('173.252.113.115', '2016-07-22', 1, '1469202468', 'US'),
('173.252.113.112', '2016-07-22', 1, '1469202469', 'US'),
('173.252.113.115', '2016-07-22', 1, '1469202469', 'US'),
('173.252.113.112', '2016-07-22', 1, '1469202469', 'US'),
('158.69.244.40', '2016-07-22', 1, '1469206646', 'CA'),
('177.55.218.106', '2016-07-23', 1, '1469241131', 'BR'),
('189.115.175.122', '2016-07-23', 1, '1469241873', 'BR'),
('66.249.71.249', '2016-07-23', 2, '1469248787', 'US'),
('59.90.138.131', '2016-07-23', 1, '1469249026', 'IN'),
('201.150.24.216', '2016-07-23', 1, '1469267559', 'BR'),
('66.249.71.237', '2016-07-23', 1, '1469277931', 'US'),
('66.249.71.231', '2016-07-23', 1, '1469280029', 'US'),
('177.53.244.200', '2016-07-23', 1, '1469289490', 'BR'),
('190.247.169.109', '2016-07-23', 1, '1469293116', 'AR'),
('191.23.14.29', '2016-07-24', 1, '1469321979', 'BR'),
('162.208.8.28', '2016-07-24', 1, '1469335393', 'US'),
('204.187.14.74', '2016-07-24', 2, '1469347885', 'CA'),
('66.249.71.249', '2016-07-24', 1, '1469352169', 'US'),
('151.20.0.63', '2016-07-25', 1, '1469390341', 'IT'),
('191.114.199.221', '2016-07-25', 1, '1469399649', 'CL'),
('66.249.71.134', '2016-07-25', 1, '1469404303', 'US'),
('64.246.165.50', '2016-07-25', 1, '1469408923', 'US'),
('191.247.229.54', '2016-07-25', 1, '1469409111', 'BR'),
('78.135.79.152', '2016-07-25', 2, '1469442491', 'TR'),
('177.170.231.98', '2016-07-25', 1, '1469457786', 'BR'),
('152.238.178.96', '2016-07-25', 1, '1469462233', 'BR'),
('191.32.70.182', '2016-07-26', 1, '1469470370', 'BR'),
('186.226.251.110', '2016-07-26', 1, '1469476361', 'BR'),
('189.102.198.239', '2016-07-26', 1, '1469485898', 'BR'),
('130.105.242.43', '2016-07-26', 1, '1469498467', 'PH'),
('181.165.38.231', '2016-07-26', 1, '1469498777', 'AR'),
('66.249.71.237', '2016-07-26', 2, '1469508327', 'US'),
('173.252.90.243', '2016-07-26', 1, '1469500497', 'US'),
('173.252.75.115', '2016-07-26', 1, '1469500501', 'US'),
('173.252.75.118', '2016-07-26', 1, '1469500501', 'US'),
('173.252.75.115', '2016-07-26', 1, '1469500501', 'US'),
('173.252.75.113', '2016-07-26', 1, '1469500501', 'US'),
('66.249.71.231', '2016-07-26', 1, '1469501720', 'US'),
('173.252.90.96', '2016-07-26', 1, '1469501729', 'US'),
('173.252.113.118', '2016-07-26', 1, '1469501734', 'US'),
('173.252.113.112', '2016-07-26', 1, '1469501734', 'US'),
('173.252.113.114', '2016-07-26', 1, '1469501734', 'US'),
('173.252.113.113', '2016-07-26', 1, '1469501734', 'US'),
('54.237.205.190', '2016-07-26', 2, '1469515974', 'US'),
('195.34.79.199', '2016-07-26', 1, '1469535871', 'GI'),
('186.212.194.159', '2016-07-26', 1, '1469538736', 'BR'),
('201.80.211.63', '2016-07-26', 1, '1469540070', 'BR'),
('207.46.13.41', '2016-07-27', 1, '1469557399', 'US'),
('179.208.229.149', '2016-07-27', 1, '1469560698', 'BR'),
('66.249.66.52', '2016-07-27', 1, '1469571524', 'US'),
('179.187.13.204', '2016-07-27', 1, '1469575505', 'BR'),
('197.93.154.185', '2016-07-27', 1, '1469596414', 'ZA'),
('66.249.71.243', '2016-07-27', 1, '1469614574', 'US'),
('189.114.170.79', '2016-07-27', 1, '1469619524', 'BR'),
('66.249.71.237', '2016-07-27', 1, '1469624271', 'US'),
('66.249.71.231', '2016-07-27', 1, '1469627254', 'US'),
('173.252.74.101', '2016-07-27', 1, '1469632923', 'US'),
('69.171.228.118', '2016-07-27', 1, '1469632930', 'US'),
('69.171.228.119', '2016-07-27', 1, '1469632931', 'US'),
('69.171.228.119', '2016-07-27', 1, '1469632931', 'US'),
('69.171.228.119', '2016-07-27', 1, '1469632931', 'US'),
('66.249.71.231', '2016-07-28', 1, '1469656952', 'US'),
('66.249.71.249', '2016-07-28', 1, '1469658579', 'US'),
('196.217.171.19', '2016-07-28', 1, '1469661416', 'MA'),
('66.249.69.137', '2016-07-28', 1, '1469664963', 'US'),
('54.164.184.21', '2016-07-28', 1, '1469671351', 'US'),
('66.249.71.237', '2016-07-28', 1, '1469680994', 'US'),
('92.81.49.15', '2016-07-28', 1, '1469692419', 'RO'),
('203.87.133.159', '2016-07-28', 1, '1469694462', 'PH'),
('80.139.172.244', '2016-07-28', 1, '1469696454', 'DE'),
('66.249.79.136', '2016-07-28', 1, '1469706565', 'US'),
('176.9.10.227', '2016-07-28', 1, '1469723748', 'DE'),
('5.9.151.22', '2016-07-29', 1, '1469795410', 'DE'),
('89.163.148.58', '2016-07-29', 1, '1469801073', 'DE'),
('119.94.186.131', '2016-07-29', 1, '1469803079', 'PH'),
('201.47.218.232', '2016-07-29', 1, '1469807785', 'BR'),
('191.179.251.162', '2016-07-29', 1, '1469808985', 'BR'),
('179.108.68.99', '2016-07-30', 1, '1469831234', 'BR'),
('93.70.190.153', '2016-07-30', 1, '1469853473', 'IT'),
('189.223.232.221', '2016-07-30', 1, '1469853567', 'MX'),
('66.249.79.150', '2016-07-30', 1, '1469854933', 'US'),
('66.249.71.249', '2016-07-30', 1, '1469864494', 'US'),
('207.46.13.41', '2016-07-30', 1, '1469867455', 'US'),
('117.195.39.79', '2016-07-30', 1, '1469872191', 'IN'),
('85.14.244.113', '2016-07-30', 1, '1469876057', 'DE'),
('91.121.109.55', '2016-07-30', 6, '1469888890', 'FR'),
('62.210.97.48', '2016-07-30', 6, '1469895008', 'FR'),
('201.10.17.199', '2016-07-30', 1, '1469895819', 'BR'),
('101.51.86.14', '2016-07-31', 1, '1469952804', 'TH'),
('177.85.206.230', '2016-07-31', 1, '1469967261', 'BR'),
('146.148.46.199', '2016-07-31', 1, '1469975132', 'US'),
('197.218.91.158', '2016-07-31', 1, '1469976078', 'MZ'),
('91.194.84.106', '2016-08-01', 1, '1469984474', 'DE'),
('86.97.8.40', '2016-08-01', 1, '1469985355', 'AE'),
('189.51.118.85', '2016-08-01', 1, '1469990208', 'BR'),
('201.80.63.39', '2016-08-01', 1, '1470009282', 'BR'),
('81.169.138.191', '2016-08-01', 1, '1470020250', 'DE'),
('89.10.139.52', '2016-08-01', 1, '1470052977', 'NO'),
('187.255.206.181', '2016-08-01', 1, '1470059944', 'BR'),
('191.250.164.171', '2016-08-01', 1, '1470066391', 'BR'),
('85.244.7.222', '2016-08-02', 1, '1470077377', 'PT'),
('86.23.45.206', '2016-08-02', 1, '1470082868', 'GB'),
('189.29.121.150', '2016-08-02', 1, '1470090408', 'BR'),
('186.205.154.80', '2016-08-02', 1, '1470097489', 'BR'),
('150.70.188.171', '2016-08-02', 1, '1470111010', 'JP'),
('187.16.44.115', '2016-08-02', 1, '1470127639', 'BR'),
('66.249.71.134', '2016-08-02', 1, '1470136788', 'US'),
('179.154.121.232', '2016-08-02', 1, '1470146771', 'BR'),
('179.105.246.124', '2016-08-03', 1, '1470162016', 'BR'),
('212.47.231.31', '2016-08-03', 6, '1470162759', 'FR'),
('179.233.198.52', '2016-08-03', 1, '1470178696', 'BR'),
('201.42.173.141', '2016-08-03', 1, '1470184781', 'BR'),
('197.221.242.203', '2016-08-03', 1, '1470210287', 'ZW'),
('174.34.135.242', '2016-08-03', 6, '1470239775', 'US'),
('189.203.141.6', '2016-08-04', 1, '1470246942', 'MX'),
('179.34.43.225', '2016-08-04', 1, '1470272204', 'BR'),
('179.252.20.234', '2016-08-04', 1, '1470315634', 'BR'),
('157.55.39.83', '2016-08-05', 1, '1470343062', 'US'),
('66.249.71.134', '2016-08-05', 1, '1470343995', 'US'),
('177.13.150.87', '2016-08-05', 1, '1470350847', 'BR'),
('148.251.126.37', '2016-08-05', 1, '1470400003', 'DE'),
('92.17.159.162', '2016-08-05', 1, '1470406693', 'GB'),
('179.159.56.28', '2016-08-05', 1, '1470409694', 'BR'),
('62.24.181.135', '2016-08-05', 1, '1470410471', 'GB'),
('177.148.144.195', '2016-08-06', 1, '1470438077', 'BR'),
('80.12.94.1', '2016-08-06', 1, '1470440475', 'FR'),
('210.186.59.101', '2016-08-06', 1, '1470446631', 'MY'),
('66.249.71.249', '2016-08-06', 2, '1470464748', 'US'),
('186.224.154.30', '2016-08-06', 1, '1470468691', 'BR'),
('185.129.62.63', '2016-08-07', 1, '1470512765', 'DK'),
('177.134.216.245', '2016-08-07', 1, '1470520743', 'BR'),
('69.58.178.57', '2016-08-07', 5, '1470529463', 'US'),
('134.249.159.113', '2016-08-07', 1, '1470535065', 'UA'),
('191.32.204.228', '2016-08-07', 1, '1470559905', 'BR'),
('109.177.97.245', '2016-08-07', 1, '1470567819', 'AE'),
('189.13.77.185', '2016-08-07', 1, '1470575553', 'BR'),
('144.76.29.66', '2016-08-07', 1, '1470588518', 'DE'),
('144.76.7.107', '2016-08-08', 1, '1470599573', 'DE'),
('195.154.185.20', '2016-08-08', 3, '1470613511', 'FR'),
('139.193.142.140', '2016-08-08', 1, '1470635273', 'ID'),
('177.18.104.124', '2016-08-08', 1, '1470649539', 'BR'),
('179.155.247.138', '2016-08-08', 1, '1470660974', 'BR'),
('195.189.227.99', '2016-08-08', 1, '1470664769', 'UA'),
('66.249.79.142', '2016-08-08', 1, '1470670173', 'US'),
('66.249.71.249', '2016-08-09', 1, '1470677177', 'US'),
('168.90.249.132', '2016-08-09', 1, '1470687671', 'BR'),
('66.249.71.134', '2016-08-09', 1, '1470690484', 'US'),
('66.249.71.231', '2016-08-09', 1, '1470701820', 'US'),
('201.212.131.2', '2016-08-09', 1, '1470701899', 'AR'),
('177.84.185.48', '2016-08-09', 1, '1470703280', 'BR'),
('138.36.193.43', '2016-08-09', 1, '1470743660', 'BR'),
('177.159.94.27', '2016-08-09', 1, '1470746142', 'BR'),
('79.26.92.132', '2016-08-10', 1, '1470774671', 'IT'),
('86.43.161.161', '2016-08-10', 1, '1470780045', 'IE'),
('179.106.163.152', '2016-08-10', 1, '1470780555', 'BR'),
('201.69.234.221', '2016-08-10', 1, '1470790382', 'BR'),
('187.33.174.179', '2016-08-10', 1, '1470795317', 'BR'),
('216.145.11.94', '2016-08-10', 1, '1470802470', 'US'),
('66.249.71.231', '2016-08-10', 1, '1470806575', 'US'),
('179.255.133.231', '2016-08-10', 1, '1470832875', 'BR'),
('186.193.121.163', '2016-08-10', 1, '1470843490', 'BR'),
('66.249.71.231', '2016-08-11', 1, '1470857356', 'US'),
('201.95.18.51', '2016-08-11', 1, '1470868385', 'BR'),
('177.43.243.120', '2016-08-11', 1, '1470917001', 'BR'),
('175.138.169.136', '2016-08-11', 1, '1470917002', 'MY'),
('138.97.252.127', '2016-08-11', 1, '1470919114', 'BR'),
('177.184.132.98', '2016-08-11', 1, '1470921734', 'BR'),
('201.48.88.31', '2016-08-11', 1, '1470923979', 'BR'),
('201.45.58.50', '2016-08-12', 1, '1470945007', 'BR'),
('66.249.71.134', '2016-08-12', 1, '1470947674', 'US'),
('66.249.71.231', '2016-08-12', 1, '1470955124', 'US'),
('173.252.90.237', '2016-08-12', 1, '1470955279', 'US'),
('173.252.122.118', '2016-08-12', 1, '1470955285', 'US'),
('173.252.122.120', '2016-08-12', 1, '1470955285', 'US'),
('173.252.122.122', '2016-08-12', 1, '1470955286', 'US'),
('173.252.122.119', '2016-08-12', 1, '1470955286', 'US'),
('80.91.162.98', '2016-08-12', 1, '1470967552', 'UA'),
('93.65.148.211', '2016-08-12', 1, '1470986610', 'IT'),
('116.102.145.238', '2016-08-12', 1, '1470987177', 'VN'),
('69.197.163.195', '2016-08-12', 3, '1470987510', 'US'),
('144.76.7.107', '2016-08-12', 2, '1470987924', 'DE'),
('179.71.164.98', '2016-08-12', 1, '1471007578', 'BR'),
('189.97.84.214', '2016-08-12', 1, '1471014805', 'BR'),
('187.19.200.58', '2016-08-12', 1, '1471016693', 'BR'),
('177.64.41.46', '2016-08-13', 1, '1471023055', 'BR'),
('201.132.172.87', '2016-08-13', 1, '1471025509', 'MX'),
('179.35.164.97', '2016-08-13', 1, '1471032781', 'BR'),
('177.86.181.214', '2016-08-13', 1, '1471042098', 'BR'),
('191.37.231.228', '2016-08-13', 1, '1471049159', 'BR'),
('66.249.71.243', '2016-08-13', 1, '1471057957', 'US'),
('66.249.71.141', '2016-08-13', 1, '1471064570', 'US'),
('66.249.71.237', '2016-08-13', 2, '1471103484', 'US'),
('66.249.71.249', '2016-08-13', 1, '1471082011', 'US'),
('195.154.187.115', '2016-08-13', 6, '1471094029', 'FR'),
('212.170.198.248', '2016-08-13', 1, '1471096593', 'ES'),
('177.52.246.221', '2016-08-14', 1, '1471113365', 'BR'),
('189.79.114.212', '2016-08-14', 1, '1471132291', 'BR'),
('66.249.71.231', '2016-08-14', 1, '1471138116', 'US'),
('109.236.8.6', '2016-08-14', 1, '1471139284', 'IE'),
('109.236.8.10', '2016-08-14', 1, '1471139286', 'IE'),
('190.100.66.14', '2016-08-14', 1, '1471139345', 'CL'),
('66.249.71.141', '2016-08-14', 1, '1471150703', 'US'),
('54.167.90.98', '2016-08-14', 1, '1471155170', 'US'),
('144.76.30.236', '2016-08-14', 1, '1471163922', 'DE'),
('66.249.71.243', '2016-08-14', 1, '1471170299', 'US'),
('69.30.221.250', '2016-08-15', 3, '1471199560', 'US'),
('66.249.71.243', '2016-08-15', 2, '1471240761', 'US'),
('179.189.56.14', '2016-08-15', 1, '1471203475', 'BR'),
('92.52.241.52', '2016-08-15', 2, '1471219534', 'HU'),
('191.185.210.209', '2016-08-15', 1, '1471220199', 'BR'),
('157.55.39.154', '2016-08-15', 1, '1471243310', 'US'),
('66.249.71.237', '2016-08-15', 1, '1471251815', 'US'),
('173.252.120.113', '2016-08-15', 1, '1471251821', 'US'),
('173.252.102.113', '2016-08-15', 1, '1471251825', 'US'),
('173.252.102.113', '2016-08-15', 1, '1471251825', 'US'),
('173.252.102.115', '2016-08-15', 1, '1471251826', 'US'),
('173.252.102.116', '2016-08-15', 1, '1471251826', 'US'),
('186.88.143.244', '2016-08-15', 1, '1471274920', 'VE'),
('61.92.129.228', '2016-08-15', 1, '1471277816', 'HK'),
('77.186.67.0', '2016-08-16', 1, '1471286950', 'DE'),
('66.249.71.231', '2016-08-16', 4, '1471365719', 'US'),
('125.25.252.136', '2016-08-16', 1, '1471315484', 'TH'),
('66.249.79.132', '2016-08-16', 1, '1471320533', 'US'),
('173.252.123.144', '2016-08-16', 1, '1471350617', 'US'),
('173.252.102.112', '2016-08-16', 1, '1471350621', 'US'),
('173.252.102.113', '2016-08-16', 1, '1471350621', 'US'),
('173.252.102.116', '2016-08-16', 1, '1471350621', 'US'),
('173.252.102.115', '2016-08-16', 1, '1471350621', 'US'),
('67.245.233.206', '2016-08-16', 1, '1471354072', 'US'),
('191.5.221.1', '2016-08-16', 1, '1471361712', 'BR'),
('109.48.85.14', '2016-08-16', 1, '1471364924', 'PT'),
('69.63.188.204', '2016-08-16', 1, '1471365765', 'US'),
('173.252.122.121', '2016-08-16', 1, '1471365769', 'US'),
('173.252.122.121', '2016-08-16', 1, '1471365769', 'US'),
('173.252.122.118', '2016-08-16', 1, '1471365769', 'US'),
('173.252.122.122', '2016-08-16', 1, '1471365769', 'US'),
('66.249.71.243', '2016-08-17', 2, '1471448741', 'US'),
('173.252.90.91', '2016-08-17', 1, '1471372900', 'US'),
('69.171.228.123', '2016-08-17', 1, '1471372903', 'US'),
('69.171.228.118', '2016-08-17', 1, '1471372904', 'US'),
('69.171.228.119', '2016-08-17', 1, '1471372904', 'US'),
('69.171.228.116', '2016-08-17', 1, '1471372904', 'US'),
('197.22.105.231', '2016-08-17', 1, '1471388748', 'TN'),
('206.226.72.53', '2016-08-17', 2, '1471392623', 'US'),
('2.34.110.189', '2016-08-17', 1, '1471417162', 'IT'),
('196.200.91.223', '2016-08-17', 1, '1471430299', 'ML'),
('138.59.128.249', '2016-08-17', 1, '1471432695', 'BR'),
('193.49.247.120', '2016-08-17', 1, '1471438750', 'FR'),
('66.249.71.237', '2016-08-17', 1, '1471441075', 'US'),
('38.100.21.66', '2016-08-18', 4, '1471499998', 'US'),
('66.249.71.231', '2016-08-18', 1, '1471519970', 'US'),
('66.249.79.136', '2016-08-18', 1, '1471524168', 'US'),
('189.91.115.162', '2016-08-18', 1, '1471524412', 'BR'),
('112.198.118.136', '2016-08-18', 1, '1471526117', 'PH'),
('184.72.6.236', '2016-08-18', 1, '1471529118', 'US'),
('66.249.79.146', '2016-08-18', 1, '1471531414', 'US'),
('5.9.85.4', '2016-08-19', 1, '1471588402', 'DE'),
('66.249.71.231', '2016-08-19', 1, '1471614636', 'US'),
('66.220.156.119', '2016-08-19', 1, '1471614722', 'US'),
('173.252.122.118', '2016-08-19', 1, '1471614726', 'US'),
('173.252.122.122', '2016-08-19', 1, '1471614726', 'US'),
('173.252.122.122', '2016-08-19', 1, '1471614726', 'US'),
('173.252.122.122', '2016-08-19', 1, '1471614726', 'US'),
('66.249.71.237', '2016-08-19', 1, '1471615226', 'US'),
('66.249.71.134', '2016-08-19', 1, '1471615527', 'US'),
('95.211.226.36', '2016-08-19', 3, '1471621059', 'NL'),
('125.162.5.16', '2016-08-19', 14, '1471621347', 'ID'),
('66.220.158.98', '2016-08-19', 1, '1471621284', 'US'),
('69.171.228.122', '2016-08-19', 1, '1471621287', 'US'),
('69.171.228.121', '2016-08-19', 1, '1471621287', 'US'),
('69.171.228.121', '2016-08-19', 1, '1471621287', 'US'),
('69.171.228.117', '2016-08-19', 1, '1471621287', 'US'),
('66.249.71.243', '2016-08-19', 1, '1471622638', 'US'),
('148.251.41.162', '2016-08-20', 1, '1471634733', 'DE'),
('91.121.44.159', '2016-08-20', 3, '1471635073', 'FR'),
('104.155.144.131', '2016-08-20', 1, '1471637049', 'US'),
('66.249.71.55', '2016-08-20', 2, '1471701102', 'US'),
('66.249.71.134', '2016-08-20', 1, '1471666406', 'US'),
('5.9.73.227', '2016-08-20', 1, '1471683610', 'DE'),
('66.249.71.68', '2016-08-20', 1, '1471701152', 'US'),
('180.76.15.11', '2016-08-21', 1, '1471719771', 'CN'),
('193.248.239.4', '2016-08-21', 1, '1471766224', 'FR'),
('66.249.71.134', '2016-08-21', 1, '1471780214', 'US'),
('207.46.13.171', '2016-08-22', 1, '1471836093', 'US'),
('66.249.71.134', '2016-08-22', 1, '1471868061', 'US'),
('157.55.39.204', '2016-08-22', 1, '1471874582', 'US'),
('104.155.153.76', '2016-08-22', 1, '1471874749', 'US'),
('66.249.71.141', '2016-08-23', 1, '1471930173', 'US'),
('162.210.196.98', '2016-08-23', 1, '1471942843', 'US'),
('66.249.71.68', '2016-08-23', 1, '1471946830', 'US'),
('66.249.71.249', '2016-08-23', 1, '1471949137', 'US'),
('66.249.71.76', '2016-08-23', 1, '1471962499', 'US'),
('66.220.158.112', '2016-08-23', 1, '1471969693', 'US'),
('173.252.113.118', '2016-08-23', 1, '1471969697', 'US'),
('173.252.113.113', '2016-08-23', 1, '1471969697', 'US'),
('173.252.113.117', '2016-08-23', 1, '1471969698', 'US'),
('173.252.113.116', '2016-08-23', 1, '1471969698', 'US'),
('66.249.79.106', '2016-08-23', 1, '1471970716', 'US'),
('66.249.71.55', '2016-08-24', 1, '1471988398', 'US'),
('66.249.71.134', '2016-08-24', 2, '1472046144', 'US'),
('66.249.71.76', '2016-08-24', 1, '1471995903', 'US'),
('66.249.79.128', '2016-08-24', 1, '1472000776', 'US'),
('66.249.71.68', '2016-08-24', 2, '1472045747', 'US'),
('207.46.13.140', '2016-08-24', 1, '1472041797', 'US'),
('157.55.39.159', '2016-08-24', 1, '1472050077', 'US'),
('157.55.39.52', '2016-08-24', 1, '1472057972', 'US'),
('31.132.183.106', '2016-08-25', 1, '1472078209', 'RU'),
('66.249.71.68', '2016-08-25', 1, '1472080699', 'US'),
('173.252.90.109', '2016-08-25', 1, '1472080732', 'US'),
('69.171.228.116', '2016-08-25', 1, '1472080736', 'US'),
('69.171.228.118', '2016-08-25', 1, '1472080737', 'US'),
('69.171.228.123', '2016-08-25', 1, '1472080737', 'US'),
('69.171.228.121', '2016-08-25', 1, '1472080737', 'US'),
('52.88.146.144', '2016-08-25', 1, '1472109985', 'US'),
('157.55.39.113', '2016-08-25', 1, '1472113174', 'US'),
('66.249.71.55', '2016-08-25', 1, '1472124827', 'US'),
('69.63.188.205', '2016-08-25', 1, '1472125265', 'US'),
('66.220.152.32', '2016-08-25', 1, '1472125269', 'US'),
('66.220.152.39', '2016-08-25', 1, '1472125270', 'US'),
('66.220.152.34', '2016-08-25', 1, '1472125270', 'US'),
('66.220.152.39', '2016-08-25', 1, '1472125270', 'US'),
('36.84.68.153', '2016-08-25', 1, '1472140562', 'ID'),
('94.23.168.141', '2016-08-26', 3, '1472145744', 'CZ'),
('66.249.71.249', '2016-08-26', 1, '1472182784', 'US'),
('64.246.187.42', '2016-08-26', 1, '1472187351', 'US'),
('66.249.71.68', '2016-08-26', 2, '1472194319', 'US'),
('173.252.90.232', '2016-08-26', 1, '1472191037', 'US'),
('66.220.148.106', '2016-08-26', 1, '1472191041', 'US'),
('66.220.148.101', '2016-08-26', 1, '1472191042', 'US'),
('31.13.114.75', '2016-08-26', 1, '1472191042', 'IE'),
('66.220.148.103', '2016-08-26', 1, '1472191042', 'US'),
('66.220.148.106', '2016-08-26', 1, '1472191042', 'US'),
('173.252.95.11', '2016-08-26', 1, '1472191047', 'US'),
('173.252.95.11', '2016-08-26', 1, '1472191047', 'US'),
('173.252.95.11', '2016-08-26', 1, '1472191047', 'US'),
('173.252.95.8', '2016-08-26', 1, '1472191047', 'US'),
('157.55.39.52', '2016-08-26', 1, '1472197455', 'US'),
('66.249.79.106', '2016-08-27', 1, '1472273930', 'US'),
('66.249.71.141', '2016-08-27', 1, '1472280078', 'US'),
('86.132.212.167', '2016-08-27', 6, '1472290142', 'GB'),
('36.84.68.181', '2016-08-28', 1, '1472326903', 'ID'),
('192.154.111.98', '2016-08-29', 2, '1472456592', 'US'),
('115.22.28.103', '2016-08-29', 2, '1472457253', 'KR'),
('180.76.15.24', '2016-08-29', 1, '1472467550', 'CN'),
('36.84.225.12', '2016-08-29', 1, '1472484395', 'ID'),
('64.233.173.50', '2016-08-29', 1, '1472484512', ''),
('40.77.167.77', '2016-08-30', 1, '1472497032', 'US'),
('109.86.72.191', '2016-08-30', 1, '1472522162', 'UA'),
('192.154.106.106', '2016-08-30', 2, '1472524769', 'US'),
('86.132.212.167', '2016-08-30', 2, '1472538771', 'GB'),
('180.241.56.162', '2016-08-30', 1, '1472566448', 'ID'),
('167.114.233.118', '2016-08-31', 1, '1472630983', 'FR'),
('66.249.71.141', '2016-08-31', 1, '1472646961', 'US'),
('180.76.15.149', '2016-09-02', 1, '1472772212', 'CN'),
('198.245.49.215', '2016-09-02', 1, '1472781774', 'CA'),
('69.63.188.198', '2016-09-02', 1, '1472790424', 'US'),
('173.252.102.113', '2016-09-02', 1, '1472790428', 'US'),
('173.252.102.113', '2016-09-02', 1, '1472790428', 'US'),
('173.252.102.117', '2016-09-02', 1, '1472790429', 'US'),
('173.252.102.113', '2016-09-02', 1, '1472790429', 'US'),
('69.30.211.2', '2016-09-02', 1, '1472793190', 'US'),
('66.249.71.134', '2016-09-03', 2, '1472877869', 'US'),
('54.173.159.241', '2016-09-03', 1, '1472879423', 'US'),
('66.249.71.55', '2016-09-03', 1, '1472916326', 'US'),
('69.171.230.96', '2016-09-03', 1, '1472916344', 'US'),
('173.252.79.112', '2016-09-03', 1, '1472916347', 'US'),
('173.252.79.119', '2016-09-03', 1, '1472916348', 'US'),
('173.252.79.118', '2016-09-03', 1, '1472916348', 'US'),
('173.252.79.119', '2016-09-03', 1, '1472916348', 'US'),
('66.249.79.136', '2016-09-04', 1, '1472922015', 'US'),
('66.249.79.132', '2016-09-04', 1, '1472922138', 'US'),
('173.252.120.113', '2016-09-04', 1, '1472922184', 'US'),
('173.252.80.118', '2016-09-04', 1, '1472922188', 'US'),
('173.252.80.119', '2016-09-04', 1, '1472922189', 'US'),
('173.252.80.113', '2016-09-04', 1, '1472922189', 'US'),
('173.252.80.119', '2016-09-04', 1, '1472922189', 'US'),
('66.249.71.55', '2016-09-04', 2, '1472976529', 'US'),
('66.249.71.76', '2016-09-04', 1, '1472941406', 'US'),
('69.171.230.116', '2016-09-04', 1, '1472976538', 'US'),
('173.252.80.115', '2016-09-04', 1, '1472976541', 'US'),
('173.252.80.116', '2016-09-04', 1, '1472976542', 'US'),
('173.252.80.112', '2016-09-04', 1, '1472976542', 'US'),
('173.252.80.112', '2016-09-04', 1, '1472976542', 'US'),
('163.172.28.159', '2016-09-05', 1, '1473034979', 'GB'),
('66.249.71.159', '2016-09-05', 1, '1473094358', 'US'),
('66.249.79.128', '2016-09-06', 1, '1473094947', 'US'),
('66.249.79.136', '2016-09-06', 1, '1473097552', 'US'),
('66.249.79.106', '2016-09-06', 1, '1473106039', 'US'),
('180.76.15.26', '2016-09-06', 1, '1473111733', 'CN'),
('66.249.71.128', '2016-09-06', 1, '1473113540', 'US'),
('207.46.13.123', '2016-09-06', 1, '1473118437', 'US'),
('66.249.71.159', '2016-09-06', 1, '1473142243', 'US'),
('178.32.203.32', '2016-09-06', 1, '1473177653', 'PL'),
('66.249.71.159', '2016-09-07', 2, '1473230403', 'US'),
('88.103.118.230', '2016-09-07', 1, '1473198356', 'CZ'),
('69.58.178.56', '2016-09-07', 5, '1473208505', 'US'),
('66.249.71.14', '2016-09-07', 2, '1473251624', 'US'),
('66.220.146.21', '2016-09-07', 1, '1473230060', 'US'),
('66.220.146.224', '2016-09-07', 1, '1473230064', 'US'),
('66.220.146.225', '2016-09-07', 1, '1473230065', 'US'),
('66.220.146.224', '2016-09-07', 1, '1473230065', 'US'),
('66.220.146.229', '2016-09-07', 1, '1473230065', 'US'),
('66.249.71.130', '2016-09-07', 1, '1473242537', 'US'),
('66.249.71.18', '2016-09-07', 1, '1473253928', 'US'),
('66.249.71.130', '2016-09-08', 1, '1473305090', 'US'),
('66.249.71.16', '2016-09-08', 1, '1473308038', 'US'),
('66.249.71.18', '2016-09-08', 1, '1473318231', 'US'),
('66.249.79.128', '2016-09-08', 1, '1473326607', 'US'),
('66.249.71.14', '2016-09-08', 3, '1473332473', 'US'),
('173.252.74.106', '2016-09-08', 1, '1473332032', 'US'),
('69.171.228.122', '2016-09-08', 1, '1473332036', 'US'),
('69.171.228.117', '2016-09-08', 1, '1473332036', 'US'),
('69.171.228.123', '2016-09-08', 1, '1473332036', 'US'),
('69.171.228.119', '2016-09-08', 1, '1473332036', 'US'),
('66.249.71.159', '2016-09-08', 1, '1473349914', 'US'),
('185.129.148.216', '2016-09-09', 1, '1473361732', 'LV'),
('66.249.71.130', '2016-09-09', 1, '1473404475', 'US'),
('66.249.79.132', '2016-09-09', 1, '1473414343', 'US'),
('66.220.156.113', '2016-09-09', 1, '1473414352', 'US'),
('173.252.113.112', '2016-09-09', 1, '1473414357', 'US'),
('173.252.113.114', '2016-09-09', 1, '1473414357', 'US'),
('173.252.113.112', '2016-09-09', 1, '1473414357', 'US'),
('173.252.113.114', '2016-09-09', 1, '1473414357', 'US'),
('66.249.71.18', '2016-09-09', 1, '1473414561', 'US'),
('36.84.225.5', '2016-09-09', 9, '1473428882', 'ID'),
('66.249.71.128', '2016-09-09', 1, '1473434192', 'US'),
('66.249.79.114', '2016-09-09', 1, '1473439187', 'US'),
('195.154.226.90', '2016-09-10', 1, '1473443800', 'FR'),
('180.76.15.20', '2016-09-10', 1, '1473446911', 'CN'),
('66.249.79.128', '2016-09-10', 2, '1473449388', 'US'),
('66.249.79.106', '2016-09-10', 2, '1473508270', 'US'),
('66.249.71.16', '2016-09-10', 1, '1473456015', 'US'),
('109.236.8.6', '2016-09-10', 1, '1473476587', 'IE'),
('109.236.8.6', '2016-09-10', 1, '1473476587', 'IE'),
('66.249.71.130', '2016-09-10', 1, '1473484069', 'US'),
('95.65.30.156', '2016-09-10', 1, '1473486152', 'MD'),
('36.84.225.32', '2016-09-10', 1, '1473494867', 'ID'),
('66.249.71.128', '2016-09-11', 2, '1473549617', 'US'),
('66.249.79.132', '2016-09-11', 1, '1473559883', 'US'),
('66.249.71.18', '2016-09-11', 2, '1473568195', 'US'),
('64.246.165.200', '2016-09-11', 1, '1473572096', 'US'),
('46.23.66.106', '2016-09-11', 1, '1473594143', 'GB'),
('46.105.100.149', '2016-09-11', 1, '1473600178', 'FR'),
('114.125.29.192', '2016-09-11', 8, '1473601038', 'ID'),
('173.252.123.137', '2016-09-11', 1, '1473601265', 'US'),
('173.252.113.113', '2016-09-11', 2, '1473601270', 'US'),
('173.252.113.116', '2016-09-11', 1, '1473601270', 'US'),
('173.252.113.114', '2016-09-11', 1, '1473601270', 'US'),
('66.249.71.130', '2016-09-11', 1, '1473604638', 'US'),
('66.249.71.16', '2016-09-11', 1, '1473604847', 'US'),
('114.125.45.178', '2016-09-11', 1, '1473606217', 'ID'),
('114.125.45.178', '2016-09-11', 1, '1473606217', 'ID'),
('66.249.71.128', '2016-09-12', 1, '1473636770', 'US'),
('66.249.71.16', '2016-09-12', 1, '1473640256', 'US'),
('178.238.235.184', '2016-09-12', 12, '1473642827', 'DE'),
('114.125.45.178', '2016-09-12', 1, '1473664037', 'ID'),
('36.84.225.16', '2016-09-12', 1, '1473688809', 'ID'),
('207.46.13.87', '2016-09-12', 1, '1473696375', 'US'),
('66.249.79.114', '2016-09-13', 1, '1473705287', 'US'),
('178.32.139.10', '2016-09-13', 1, '1473716908', 'IT'),
('66.249.79.106', '2016-09-13', 1, '1473754174', 'US'),
('66.249.71.14', '2016-09-13', 1, '1473755525', 'US'),
('95.211.226.36', '2016-09-13', 1, '1473758794', 'NL'),
('36.84.68.174', '2016-09-13', 14, '1473759921', 'ID'),
('173.252.90.94', '2016-09-13', 1, '1473759784', 'US'),
('173.252.95.8', '2016-09-13', 1, '1473759789', 'US'),
('173.252.95.13', '2016-09-13', 1, '1473759789', 'US'),
('173.252.95.13', '2016-09-13', 1, '1473759789', 'US'),
('173.252.95.11', '2016-09-13', 1, '1473759788', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Palestina', 'palestina', 7),
(2, 'Gaza', 'gaza', 11),
(9, 'Tenis', 'tenis', 5),
(10, 'Sepakbola', 'sepakbola', 7),
(8, 'Laskar Pelangi', 'laskar-pelangi', 2),
(11, 'Amerika', 'amerika', 18),
(12, 'George Bush', 'george-bush', 3),
(13, 'Browser', 'browser', 9),
(14, 'Google', 'google', 3),
(15, 'Israel', 'israel', 5),
(16, 'Komputer', 'komputer', 24),
(17, 'Film', 'film', 9),
(19, 'Mobil', 'mobil', 0),
(21, 'Gayus', 'gayus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(1, 'Berita 1', '', 'berita1', 'N'),
(2, 'tech1', 'anonym', 'tech1', 'N'),
(3, 'koding', 'anonym', 'koding', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `updated_from_ip` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `email`, `level`, `aktif`, `date_created`, `date_updated`, `created_from_ip`, `updated_from_ip`) VALUES
('admin', 'C7yQAs06CkpYNAoAgl9KrIr2H3Tn4hwwEd8fsO1Yr5g=', 'Administrator', 'admin@detik.com', 'admin', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
('user21', 'PefX8tdswfq5S9yZvRn6nvA0dRukxZlD8qXM45tsQbA=', 'user2', 'as;ldka@gmail.com', 'user', 'Y', '2017-04-30 12:51:32', '2017-04-30 12:57:59', '::1', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`id_poling`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=857;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `poling`
--
ALTER TABLE `poling`
  MODIFY `id_poling` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
