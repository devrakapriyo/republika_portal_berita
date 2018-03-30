-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30 Mar 2018 pada 10.02
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_republika_portal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `seo` varchar(250) DEFAULT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `tipe_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `teks` text,
  `gambar` varchar(100) DEFAULT NULL,
  `viewer` int(11) DEFAULT '0',
  `is_deleted` enum('Y','N') DEFAULT 'N',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `seo`, `judul`, `tipe_id`, `kategori_id`, `teks`, `gambar`, `viewer`, `is_deleted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'world-cup-2018', 'world cup 2018', 1, 1, '<p>Menyambut piala dunia 2018 di Rusia. Lalu apa saja yang harus dipersiapkan? kita punya solusinya loh seperti : kita harus memiliki jersey negara yang kita dukung, minuman dan cemilan, tv dan listrik. Itu tips yang dari kita.</p>', 'world-cup-2018.png', 1, 'N', 2, NULL, '2018-03-29 23:51:38', '2018-03-29 23:51:38'),
(2, 'abutours-kembali-memberangkatkan-jamaah', 'Abutours Kembali Memberangkatkan Jamaah', 1, 4, '<p>Walaupun abutours akhir akhir ini mengalami permasalahan seperti surat izin travel di cabut, dan sebagainya. Abutours tetap berkomitmen untuk bertanggung jawab dan memberangkatkan jamaah abutours menuju baitullah untuk melaksanakan umrah. Karena abutours lebih dari sekedar ibadah</p>', 'Abutours Kembali Memberangkatkan Jamaah.jpg', 1, 'N', 2, NULL, '2018-03-30 02:19:44', '2018-03-30 02:19:44'),
(3, 'elektabilitas-hingga-logistik-jadi-pertimbangan-prabowo', 'Elektabilitas Hingga Logistik Jadi Pertimbangan Prabowo', 1, 2, '<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">REPUBLIKA.CO.ID, JAKARTA -- Meski Dewan Pimpinan Pusat (DPP) dan Dewan Pimpinan Daerah (DPD) Partai Gerindra telah mendukung Prabowo Subianto maju sebagai calon presiden (capres) di Pilpres 2019, namun hingga saat ini belum ada ketegasan dari Prabowo. Wakil Sekjen Partai Gerindra Aryo Djojohadikusumo mengatakan, ada beberapa hal yang masih menjadi pertimbangan Prabowo.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Selain elektabilitas dan dukungan dari partai koalisi, diketahui beberapa faktor masih menjadi pertimbangan Prabowo untuk maju sebagai calon presiden (capres), antara lain kemenangan calon kepala daerah (cakada) yang diusung Partai Gerindra di beberapa daerah di Pemilihan Kepala Daerah (Pilkada) 2018.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">\"Bagi kami ada beberapa Pilgub yang amat sangat menjadi kunci. Jawa Barat, Jawa Tengah, Sumatera Utara, Sulawesi Selatan, NTB, NTT, Bali, dan Kalimantan Barat ini Provinsi penting. Apabila calon yang diusung Gerindra menang berarti dukungan Pak Prabowo sebagai tokoh nasional, berarti dukungan masyarakat&nbsp;<em>real,</em>\" kata Wakil Sekjen Partai Gerindra, Aryo Djojohadikusumo.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Aryo menganggap selain hasil survei, kemenangan Partai Gerindra di wilayah-wilayah kunci tersebut menjadi sangat penting untuk menghitung dukungan masyarakat terhadap Prabowo. Selain mengkalkulasi kemenangan di pilgub 2018, Partai Gerindra masih melihat kemungkinan lima partai baru yang lolos sebagai peserta Pemilu melakukan gugatan terhadap&nbsp;<em>Presidential Treshold</em>&nbsp;juga masih terbuka.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">\"Kalau mereka menggugat ke MK dalam waktu dekat dan dikabulkan gugatannya, ya jamin sehari setelah itu Pak Prabowo langsung deklarasi,\" ujarnya.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Dukungan solid dari sebagian besar pengurus partai berlambang kepala garuda tersebut tampaknya tidak cukup bagi Prabowo untuk memutuskan maju sebagai capres. Wakil Ketua Dewan Pembina Partai Gerindra, Hashim Djojohadikusumo menyebut ketersediaan logistik menjadi satu hal yang juga menjadi pertimbangan Prabowo.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">\"Iya itu kan ada (pertimbangan) apakah cukup atau tidak,\" kata Hashim yang juga merupakan adik kandung Prabowo.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Saat ditanya mengenai kemampuan logistik yang dimiliki Prabowo saat ini, Hashim mengaku Prabowo masih memiliki logistik yang cukup. Tidak hanya itu, calon wakil presiden (cawapres) yang memiliki akses logistik juga menjadi pertimbangan Prabowo.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">\"Cawapres ada akses ke logistik Alhamdulilah,\" katanya.</p>', 'Elektabilitas Hingga Logistik Jadi Pertimbangan Prabowo.jpeg', 0, 'N', 3, NULL, '2018-03-30 07:40:02', '2018-03-30 07:40:02'),
(4, 'dybala-jatuh-cinta-ke-atletico-madrid', 'Dybala Jatuh Cinta ke Atletico Madrid', 1, 1, '<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">REPUBLIKA.CO.ID,&nbsp;MADRID -- Kabar bakal berlabuhnya Paulo Dybala ke Atletico Madrid terus berembus. Penyerang Juventus itu dinilai sebagai pengganti ideal untuk Antoine Griezmann.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Nama kedua dirumorkan akan hengkang dari Atletico pada bursa transfer musim panas ini. Sejumlah media Spanyol memberitakan Dybala siap mengisi tempat Griezmann.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<div id=\"div-gpt-ad-1513928200450-0\" class=\"ads detail_text\" style=\"color: #191919; font-family: \'Open Sans\', sans-serif; font-size: 16px; margin: 0px auto; width: 300px; height: auto;\" data-google-query-id=\"COTA0O3Fk9oCFZAkaAod-akFXA\">\r\n<div id=\"google_ads_iframe_/12890435/desktop_sepakbola_detail_text_0__container__\" style=\"border: 0pt none; display: inline-block; width: 300px; height: 250px;\"><iframe id=\"google_ads_iframe_/12890435/desktop_sepakbola_detail_text_0\" style=\"border-width: 0px; border-style: initial; vertical-align: bottom;\" title=\"3rd party ad content\" src=\"http://tpc.googlesyndication.com/safeframe/1-0-17/html/container.html\" name=\"\" width=\"300\" height=\"250\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" sandbox=\"allow-forms allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" data-is-safeframe=\"true\"></iframe></div>\r\n</div>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">\"Menurut isu terbaru La Liga, sudah ada kesepakatan kontrak lima tahun antara Direktur Atleti, Andrea Berta dan Saudara sekaligus agen Dybala, Gustavo,\" demikian laporan yang dikutip dari&nbsp;<em>Football Italia</em>, Jumat (30/3).</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Jika skenario penjualan La Joya menjadi kenyataan, Juve diprediksi tidak akan melepas murah. Bianconeri mematok harga pesepak bola Argentina antara 150 hingga 200 juta euro.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Namun Atletico memiliki cara lain untuk menurunkan harga. Klub Spanyol itu akan memasukkan Stefan Safic sebagai bagian dari pembelian Dybala.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Beberapa pekan lalu, pemain nomor 10 si Nyonya Tua kedapatan makan bersama pelatih Atletico, Diego Simeone di Madrid. Saat itu mereka mengisi liburan jeda internasional.</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">&nbsp;</p>\r\n<p style=\"font-size: 19px; line-height: 31px; color: #191919; font-family: \'Open Sans\', sans-serif;\">Dybala memilih berlibur ke ibu kota Spanyol, lantaran tidak dipanggil tim nasional Argentina. Berkaitan dengan momen tersebut, rumor ia bakal bekerja sama dengan Simeone makin berkembang. Terlebih, Simeone dan Dybala sama-sama berasal dari Negeri Tango.</p>', 'Dybala Jatuh Cinta ke Atletico Madrid.jpg', 1, 'N', 3, NULL, '2018-03-30 07:44:02', '2018-03-30 07:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_kategori`
--

CREATE TABLE `tb_berita_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `is_deleted` enum('Y','N') DEFAULT 'N',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_kategori`
--

INSERT INTO `tb_berita_kategori` (`id`, `kategori`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'olah raga', 'N', '2018-03-29 22:41:30', '2018-03-29 22:41:30'),
(2, 'politik', 'N', '2018-03-29 22:41:30', '2018-03-29 22:41:30'),
(3, 'ekonomi', 'N', '2018-03-29 22:41:30', '2018-03-29 22:41:30'),
(4, 'islami', 'N', '2018-03-30 00:46:26', '2018-03-30 00:46:26'),
(5, 'masa kini', 'N', '2018-03-30 01:34:34', '2018-03-30 01:34:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_komentar`
--

CREATE TABLE `tb_berita_komentar` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `teks` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_komentar`
--

INSERT INTO `tb_berita_komentar` (`id`, `berita_id`, `users_id`, `teks`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Alhamdulillah, semoga abutours bisa kembali normal dan bisa menjadi kepercayaan melayani jamaah tamu Allah. Aamiin', '2018-03-30 09:31:15', '2018-03-30 09:31:15'),
(2, 2, 1, '<p>Alhamdulillah</p>', '2018-03-30 06:36:44', '2018-03-30 06:36:44'),
(3, 1, 1, '<p>Info yang bagus ini</p>', '2018-03-30 07:12:36', '2018-03-30 07:12:36'),
(4, 2, 6, '<p>Alhamdulillah</p>', '2018-03-30 07:35:03', '2018-03-30 07:35:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_komentar_report`
--

CREATE TABLE `tb_berita_komentar_report` (
  `id` int(11) NOT NULL,
  `komentar_id` int(11) DEFAULT NULL,
  `report_users_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_respon`
--

CREATE TABLE `tb_berita_respon` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `respon` enum('senang','sedih','marah') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_respon`
--

INSERT INTO `tb_berita_respon` (`id`, `berita_id`, `users_id`, `respon`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'senang', '2018-03-30 07:01:44', '2018-03-30 07:01:44'),
(2, 1, 1, 'marah', '2018-03-30 07:12:41', '2018-03-30 07:12:41'),
(3, 2, 6, 'senang', '2018-03-30 07:35:15', '2018-03-30 07:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_tipe`
--

CREATE TABLE `tb_berita_tipe` (
  `id` int(11) NOT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `is_deleted` enum('Y','N') DEFAULT 'N',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_tipe`
--

INSERT INTO `tb_berita_tipe` (`id`, `tipe`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'artikel', 'N', '2018-03-30 00:47:34', '2018-03-30 00:47:34'),
(2, 'video', 'N', '2018-03-30 00:47:50', '2018-03-30 00:47:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_viewer`
--

CREATE TABLE `tb_berita_viewer` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `ip_viewer` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_viewer`
--

INSERT INTO `tb_berita_viewer` (`id`, `berita_id`, `ip_viewer`, `created_at`, `updated_at`) VALUES
(1, 2, '127.0.0.1', '2018-03-30 07:12:00', '2018-03-30 07:12:00'),
(2, 1, '127.0.0.1', '2018-03-30 07:12:18', '2018-03-30 07:12:18'),
(3, 4, '127.0.0.1', '2018-03-30 07:49:51', '2018-03-30 07:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `role` enum('pengunjung','admin') DEFAULT NULL,
  `is_deleted` enum('Y','N') DEFAULT 'N',
  `remember_token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama_lengkap`, `jk`, `role`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pengunjung@republika.co.id', '$2y$10$jl.2C4ofg29/eFxJ1Rs7IuccAIoWJaNoMbHk5JqrHVuLc4cBIEF6m', 'Pengunjung', 'L', 'pengunjung', 'N', 'sBfTeUDAnKGEm8nZAta3WxL223lONrjb0y8Htd2m1Nk9wPoKpvIvi8BOmW7A', '2018-03-29 22:40:00', '2018-03-29 22:40:00'),
(2, 'admin@republika.co.id', '$2y$10$jl.2C4ofg29/eFxJ1Rs7IuccAIoWJaNoMbHk5JqrHVuLc4cBIEF6m', 'Admin', 'L', 'admin', 'N', 'J8jGKuoc8nl1esNZocrLE15YIndhsSi0UzrzSnprdtnuRSW8qbEpxwmNDOXw', '2018-03-29 22:40:56', '2018-03-29 22:40:56'),
(3, 'admin@rol.republika.co.id', '$2y$10$B8Hmv6av5p6CWRfK2gNFfeAF2frdj9nRkQ5z8jh8A9DMEcr3.7BzG', 'Admin Republika', 'L', 'admin', 'N', NULL, '2018-03-30 01:36:26', '2018-03-30 01:36:26'),
(4, 'pengunjung@gmail.com', '$2y$10$D6U9W81oJ8joA4rTYZuD2exkn1BA90IxnOp/hDlA6eXC7yE3CJoJi', 'Pengunjung Republika', 'L', 'pengunjung', 'N', 'xCI6b9mSGiXrY0b1tukvIxRXjtm9kwZFY3ITb9OnMbby7iSPZTlTiqenhL5l', '2018-03-30 07:29:02', '2018-03-30 07:29:02'),
(6, 'raka.priyo@gmail.com', '$2y$10$PaxwuQJvkD62bWfwWvfo9.0yERrmTMqH9wI7J5hz7vuIS63XbToVW', 'Raka Priyo', 'L', 'pengunjung', 'N', 'jXnEhgrDWb7DbtJo1M9maoXCFQlJ5DO9LN84msJTQRA2sWTLm6mhjWbPde9H', '2018-03-30 07:34:02', '2018-03-30 07:34:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_kategori`
--
ALTER TABLE `tb_berita_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_komentar`
--
ALTER TABLE `tb_berita_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_komentar_report`
--
ALTER TABLE `tb_berita_komentar_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_respon`
--
ALTER TABLE `tb_berita_respon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_tipe`
--
ALTER TABLE `tb_berita_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_viewer`
--
ALTER TABLE `tb_berita_viewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_berita_kategori`
--
ALTER TABLE `tb_berita_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_berita_komentar`
--
ALTER TABLE `tb_berita_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_berita_komentar_report`
--
ALTER TABLE `tb_berita_komentar_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_berita_respon`
--
ALTER TABLE `tb_berita_respon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_berita_tipe`
--
ALTER TABLE `tb_berita_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_berita_viewer`
--
ALTER TABLE `tb_berita_viewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
