-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2021 at 02:15 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbi_smpn1muarojambi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(200) NOT NULL,
  `agenda_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_deskripsi` text NOT NULL,
  `agenda_mulai` varchar(100) NOT NULL,
  `agenda_selesai` varchar(100) NOT NULL,
  `agenda_tempat` varchar(100) NOT NULL,
  `agenda_waktu` varchar(30) NOT NULL,
  `agenda_keterangan` varchar(200) NOT NULL,
  `agenda_author` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_nama`, `agenda_tanggal`, `agenda_deskripsi`, `agenda_mulai`, `agenda_selesai`, `agenda_tempat`, `agenda_waktu`, `agenda_keterangan`, `agenda_author`, `created_at`, `updated_at`) VALUES
(1, 'Penyembelihan Hewan Kurban Idul Adha 2017', '2021-04-12 12:28:21', 'dalam rangka penyebelihan hewan kurabah pada tanggal 20 februari ini akan diadakah rapat seluruh guruS', '04/28/2021', '04/14/2021', 'Lapangan upacaraa', '08.00-12.00 WIB', 'ajadaad', 'admin', '2021-04-12 12:28:21', '2021-04-14 13:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `berita_judul` varchar(100) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategori_id` int(11) NOT NULL,
  `berita_views` int(11) NOT NULL DEFAULT '0',
  `berita_gambar` varchar(100) DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `berita_slug` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `berita_judul`, `berita_isi`, `berita_tanggal`, `kategori_id`, `berita_views`, `berita_gambar`, `author`, `berita_slug`, `created_at`, `updated_at`) VALUES
(8, 'SMPN1 Muaro Jambi Launching Website Baru', '<p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: arial; vertical-align: baseline; color: rgb(0, 0, 0);\">Jambi – SMPN 1 Muaro Jambi meningkatkan kualitas di bidang IT diantaranya dengan membuat website baru untuk sekolah. Dengan tampilan yang lebih menarik dan indah dipandang. Website SMPN 1 Muaro Jambi dengan link <a href=\"http://www.smpn1muarojambi.sch.id\" target=\"_blank\">www.smpn1muarojambi.sch.id</a> ini diresmikan langsung Kepala Sekolah Erma Dewita.</p>', '2021-05-18 08:04:39', 3, 40, 'bg4.jpeg', 'admin', 'smpn1-muaro-jambi-launching-website-baru', '2021-05-18 01:04:39', '2021-05-18 11:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip_guru` varchar(100) NOT NULL,
  `nama_guru` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `avatar` varchar(110) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip_guru`, `nama_guru`, `user_id`, `mapel_id`, `jenis_kelamin`, `no_hp`, `tanggal_lahir`, `avatar`, `created_at`, `updated_at`) VALUES
(6, '1112223331', 'guru', 35, 3, 'Laki-Laki', '12313221312', '2021-04-20 00:00:00', 'jquan0755a199bfcb71d.png', '2021-04-16 07:32:17', '2021-05-18 12:11:26'),
(7, '21321321', 'asdas', 38, 1, 'Laki-Laki', '085266911477', '2021-05-26 00:00:00', 'WhatsApp Image 2021-05-03 at 11.24.18.jpeg', '2021-05-09 10:08:52', '2021-05-09 17:08:52'),
(8, '65465654651', 'guru', 39, 1, 'Laki-Laki', '2131231231231', '2021-05-20 00:00:00', '1.jpg', '2021-05-16 20:11:27', '2021-05-17 03:46:44'),
(9, '12345', 'admin', 40, 1, 'Laki-Laki', '085266911477', '2021-05-12 00:00:00', 'jquan0755a199bfcb71d.png', '2021-05-16 21:12:24', '2021-05-18 13:28:21'),
(10, '123212131', 'guru121', 41, 1, 'Laki-Laki', '0852669114771', '2021-05-13 00:00:00', 'jquan0755a199bfcb71d.png', '2021-05-18 04:39:04', '2021-05-18 12:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(3, 'liburan', '2021-04-16 19:14:52', '2021-04-17 02:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'VII A', '2021-04-12 12:22:49', '2021-04-12 19:22:49'),
(2, 'VII B', '2021-04-12 12:22:57', '2021-04-12 19:22:57'),
(3, 'VII C', '2021-04-14 06:02:55', '2021-04-14 13:02:55'),
(4, 'VII D', '2021-04-16 07:53:19', '2021-04-16 14:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `mapel_nama` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel_nama`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2021-04-12 10:57:41', '2021-04-16 14:55:48'),
(3, 'Penjas', '2021-04-12 10:58:11', '2021-04-12 17:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL DEFAULT '-',
  `kelas_id` int(11) NOT NULL,
  `file_materi` varchar(200) DEFAULT NULL,
  `link_materi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `materi`, `mapel_id`, `deskripsi`, `kelas_id`, `file_materi`, `link_materi`, `created_at`, `updated_at`) VALUES
(1, 'asdad', 1, 'asdad', 1, NULL, NULL, '2021-04-16 03:26:56', '2021-04-16 10:26:56'),
(3, 'adada', 1, 'wwww sssss', 1, 'KISI KISI UJIAN LABOR.xlsx', NULL, '2021-04-16 09:09:30', '2021-04-16 16:09:30'),
(4, 'dadsa', 1, 'asdasdasdasd', 1, NULL, 'https://datatables.net/examples/basic_init/scroll_x.html', '2021-04-16 09:10:46', '2021-04-16 16:10:46'),
(5, 'sdadassadas', 1, 'asddasdas', 1, 'SK PEMBAGIAN TUGAS.docx', NULL, '2021-04-16 09:11:26', '2021-04-16 16:11:26'),
(6, 'sdadassadas', 1, 'asddasdas', 1, 'SK PEMBAGIAN TUGAS.docx', NULL, '2021-04-16 09:11:26', '2021-04-16 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_31_043912_create_siswa_table', 1),
(4, '2020_10_27_125240_create_mapels_table', 1),
(5, '2021_03_17_191050_create_sessions_table', 1),
(6, '2021_04_08_231149_create_kelas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'Tentang Kami', '<p><font color=\"#2d2d2d\" face=\"Lora, serif\"><span style=\"font-size: 17px;\">SMP Negeri 1 Muaro Jambi resmi dibuka pada pada tahun 1981, terletak di Jl. Jambi – Muaro Bulian KM. 17 desa Sungai Duren Rt.02 Kec. Jambi Luar Kota Kab. Muaro Jambi Prov, Jambi. Memiliki bidang tanah seluas 4.743 M2 Dengan Luas Bangunan 1.556 M2.</span></font></p><p><font color=\"#2d2d2d\" face=\"Lora, serif\"><span style=\"font-size: 17px;\"><b>Informasi Sekolah Tahun Ajaran 2020/2021 </b></span></font></p><p><font color=\"#2d2d2d\" face=\"Lora, serif\"><span style=\"font-size: 17px;\">Jumlah Tenaga Kependidikan (PTK) :<i> 48 Orang</i></span></font></p><p><font color=\"#2d2d2d\" face=\"Lora, serif\"><span style=\"font-size: 17px;\">Jumlah Siswa : <i>461 Siswa</i></span></font></p>', 'bg4.jpeg', '2021-05-09 16:06:32', '2021-05-16 12:27:13'),
(2, 'Visi dan Misi', 'Visi Dan Misii', '<p style=\"box-sizing: inherit; font-size: 17px; color: rgb(45, 45, 45); line-height: 1.8; font-family: Lora, serif;\"><span style=\"box-sizing: inherit; font-weight: bolder;\"><u style=\"box-sizing: inherit;\">Visi</u></span><br style=\"box-sizing: inherit;\">Visi pada SMP Negeri 1 Muaro Jambi adalah sebagai berikut :</p><ul style=\"box-sizing: inherit; color: rgb(41, 43, 44); font-family: Lora, serif;\"><li style=\"box-sizing: inherit;\">Bertaqwa</li><li style=\"box-sizing: inherit;\">Berprestasi</li><li style=\"box-sizing: inherit;\">Kreatif</li><li style=\"box-sizing: inherit;\">Mandiri</li></ul><p style=\"box-sizing: inherit; font-size: 17px; color: rgb(45, 45, 45); line-height: 1.8; font-family: Lora, serif;\"></p><p style=\"box-sizing: inherit; font-size: 17px; color: rgb(45, 45, 45); line-height: 1.8; font-family: Lora, serif;\"><span style=\"box-sizing: inherit; font-weight: bolder;\"><u style=\"box-sizing: inherit;\">Misi</u></span><br style=\"box-sizing: inherit;\">Dalam upaya mewujudkan visi tersebut, Misi SMP Negeri 1 Muaro Jambi adalah sebagai berikut :</p><ol type=\"a\" style=\"box-sizing: inherit; color: rgb(41, 43, 44); font-family: Lora, serif;\"><li style=\"box-sizing: inherit;\">Menumbuh kembangkan penghayatan terhadap ajaran agama yang dianut dan budaya bangsa sehingga terbangun siswa yang kompeten dan berakhlak mulia</li><li style=\"box-sizing: inherit;\">Mewujudkan pembelajaran Aktif, Kreatif, Efektif dan Menyenangkan</li><li style=\"box-sizing: inherit;\">Mengembangkan keterampilan melalui kegiatan pembelajaran dan pelatihan berbasis IPTEK</li><li style=\"box-sizing: inherit;\">Menciptakan lingkungan pembelajaran yang kondusif dalam upaya meningkatkan mata pembelajaran</li><li style=\"box-sizing: inherit;\">Mewujudkan disiplin dalam proses belajar mengajar</li><li style=\"box-sizing: inherit;\">Menciptakan hubungan yang baik antara warga sekolah dan masyarakat untuk menciptakan mutu pendidikan</li></ol>', 'kepalasekolah.png', '2021-05-15 12:32:22', '2021-05-16 12:25:45'),
(3, 'Sejarah', 'Sejarah', '<p style=\"text-align: justify; margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\">SMP Negeri 1 Muaro Jambi berlokasi di Jl. K.H. Muhammad Agus, Desa Mudung Darat, Kecamatan Maro Sebo, Kabupaten Muaro Jambi. Provinsi Jambi merupakan SMP yang pertama kali berdiri di kecamatan Maro Sebo pada tahun 1982. Secara historis mengalami beberapa kali perubahan namanya dimulai dari Yayasan Kasih Ibu. Pada Tahun 1992 mulai berstatus sekolah negeri menjadi SMP 1 Maro Sebo kemudian SLTP 1 Maro Sebo dan sekarang menjadi SMP Negeri 1 Muaro Jambi.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\">Seiring perjalanan waktu, SMP Negeri 1 Muaro Jambi menjadi sekolah yang mampu bersaing dengan sekolah-sekolah lainnya. Banyak prestasi yang telah diraih baik di tingkat kabupaten, tingkat provinsi hingga ke tingkat nasional. Data kelulusan dan kelanjutan ke sekolah yang lebih tinggi para alumni mencapai 100 %. Hal ini menandakan bahwa SMP N 1 memiliki daya dukung dan potensi yang bagus dalam dunia pendidikan.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\">Upaya peningkatan kualitas pendidikan SMP Negeri 11 Muaro Jambi merupakan suatu hal mutlak dilakukan untuk mencapai tujuan pendidikan nasional yaitu mengembangkan kemampuan dan membentuk watak serta peradaban bangsa yang bermartabat dalam rangka mencerdaskan kehidupan bangsa, mengembangkan potensi peserta didik agar jadi manusia yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, berilmu, cakap, kreatif, mandiri, dan menjadi warga negara yang demokratis serta bertanggung jawab.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\">SMP Negeri 11 Muaro Jambi pada saat ini telah memiliki sumber daya potensial dengan jumlah tenaga pendidikan sebanyak 36 guru PNS dan 13 guru Non PNS yang mengampu mata pelajaran sesuai dengan bidang keprofesionalitasnya dan 7 orang tenaga non kependidikan sebgai pelaksana tugas ketatausahaan sekolah. Disamping itu, SMP Negeri 11 Muaro Jambi telah dilengkapi dengan sarana dan prasarana, diantaranya 3 Unit Laboratorium IPA yang lengkap, Laboratoruim Komputer, Laboratorium Bahasa, Perpustakaan yang memenuhi standar, Lapangan Olahraga, Instalasi air dan listrik yang memadai. Tingginya animo masyarakat sekitar untuk menyekolahkan putra-putrinya di SMP Negeri 11 Muaro Jambi merupakan suatu sumber daya dukung yang baik untuk kemajuan pendidikan khususnya di SMP Negeri 11 Muaro Jambi.</p>', NULL, '2021-05-17 05:32:27', '2021-05-17 05:43:43'),
(4, 'Sosial Media', 'Sosial Media', 'Facebook :<br>Instagram :', NULL, '2021-05-17 05:45:58', '2021-05-17 06:01:25'),
(5, 'Administrasi Kantor Sekolah', 'Administrasi Kantor Sekolah', '<span style=\"font-family: Lora, serif; font-size: 17px; text-align: justify;\"><font color=\"#000000\" style=\"\">Seperti sekolah lain, kegiatan belajar-mengajar yang berlangsung di SMP Negeri 1 Yogyakarta tidak dapat dipisahkan dengan proses administrasi yang sebagian besar dilakukan di ruang kantor sekolah. Selain di ruang kantor, proses administrasi juga dilakukan oleh para guru di ruang guru. Sebagai bagian dari pelaksanaan kegiatan di sekolah, terdapat bagian Tata Usaha (TU) yang mengurus bagian administrasi sekolah.</font></span>', NULL, '2021-05-17 05:57:27', '2021-05-17 06:02:48'),
(6, 'Perpustakaan', 'LAB Komputer', 'adas', 'Screenshot 2020-12-29 110413.png', '2021-05-17 06:05:27', '2021-05-17 06:23:46'),
(7, 'LAB Komputer', 'LAB Komputer', '<p><span style=\"font-family: Lora, serif; font-size: 17px; text-align: justify;\"><font color=\"#000000\" style=\"\">Laboratorium Komputer di SMP Negeri 1 Muaro Jambi setiap harinya digunakan untuk kegiatan belajar mengajar, baik mapel Informatika ataupun mapel lain yang membutuhkan komputer sebagai media belajarnya. Selain itu, Laboratorium Komputer juga digunakan untuk ujian berbasis komputer, misalnya Ulangan Harian, Tes pendalaman materi, dan ujian-ujian lainnya yang menggunakan komputer. Oh iya, beberapa siswa juga menghabiskan waktu luangnya di Laboratorium Komputer untuk mengasah kemampuannya di bidang komputer, loh! Jadi, besok kalau situasi sudah normal lagi, ramaikan lagi yah Laboratorium Komputer ini, kita belajar bersama, raih ilmu di bidang teknologi setinggi-tingginya, karena ada pepatah yang mengatakan “with technology, we can change the world”. Semangat belajar teknologi!</font></span>\r\n                                                                        </p>', 'bg6.jpeg', '2021-05-17 06:21:35', '2021-05-17 06:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(150) NOT NULL,
  `pengumuman_deskripsi` text NOT NULL,
  `pengumuman_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengumuman_author` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `pengumuman_judul`, `pengumuman_deskripsi`, `pengumuman_tanggal`, `pengumuman_author`, `created_at`, `updated_at`) VALUES
(1, 'Penyembelihan Hewan Kurban Idul Adha 2017', 'Siapkanlah pisau yang tajam untuk menyembelih hewan kurban. Jangan biarkan hewan kurban merasakan sakit dalam waktu yang lama hanya karena pisau yang tumpul. Selain itu, kita diwajibkan memperlakukan hewan kurban dengan baik sebelum disembelih. Dengan menajamkan pisau, maka penyembelihan akan semakin baik. Seperti sabda Rasulullah SAW.', '2021-04-12 12:23:27', 'admin', '2021-04-12 12:23:27', '2021-05-18 11:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama_siswa`, `agama`, `jenis_kelamin`, `tanggal_lahir`, `avatar`, `user_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(2, '0012311232', 'azwar', '085266911477', 'Perempuan', '2021-04-14 00:00:00', 'WhatsApp Image 2021-03-22 at 21.11.57 (2).jpeg', 28, 2, '2021-04-12 13:24:49', '2021-04-14 13:01:25'),
(4, '112334567', 'siswaa', 'Islam', 'Laki-Laki', '2021-04-13 00:00:00', NULL, 37, 1, '2021-04-16 07:51:10', '2021-04-16 14:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(25) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pembuat` varchar(200) NOT NULL,
  `mapel_id` int(25) NOT NULL,
  `waktu` varchar(100) DEFAULT NULL,
  `jenis_tugas` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'siswa', 'azwar', 'azwar@gmail.com', '$2y$10$FBC1FIuYrjoI7CAv3BWWke8v.Cfu8bHSNX2Q8JhATMBNbCs2XeXiu', '8q4YROCigrpzObvM0lR0gfyQTpGM11BTe2hndpk9PVK5aOsNm4h70XgGU4As', '2021-04-12 13:24:49', '2021-04-14 06:01:25'),
(35, 'guru', 'guru', 'guru@gmail.com', '$2y$10$utj1fNuLSYH4hDIKGd.1quz982kxRK6uSqHj1AbshkUG.n8vg9YWS', 'CreBAyCiBmALMvTCEjeka5BvxMOnypQzWL4P7K55QMqebgZw8ENdKzPTPqvy', '2021-04-16 07:32:17', '2021-05-18 05:11:26'),
(37, 'siswa', 'siswaa', 'siswa@gmail.com', '$2y$10$rLhVZA4GpvWnG6OjL2JS2O0EMcV6vDnv4MCqKRl./ZgWt3ESv2t3u', '8zguC5gJ4iNqiDqgQvdAcgeFdSkKXEPxbvZ54xwuVKgIq7kUhBjTgIW2nWLz', '2021-04-16 07:51:10', '2021-04-16 07:52:43'),
(38, 'guru', 'asdas', '2131@ada', '$2y$10$NqDGUlFx6lT1CMzys/3i..F5NsdO5J5xfrDXwSZAgts.qACBZ4n/S', 'O3HUQgBaFivmOdBSczLGL4znX38cFhtIovylbVP7twAKZ8jxAmz10FBqKW8H', '2021-05-09 10:08:52', '2021-05-09 10:08:52'),
(39, 'admin', 'guru', 'guruadmin@gmail.com', '$2y$10$RKiHxKFXC6cn0esg0mjUhu.knoZ8.kD59Vx9qxpneljarO2IR9UI6', 'po8JoYeog2iG6pb5GTlDVIuITLIGt3ROBa4SWccRZvidzAdXcYkfNHP8bjFM', '2021-05-16 20:11:27', '2021-05-16 20:46:54'),
(40, 'admin', 'admin', 'admin@admin.com', '$2y$10$iQJUoQdsGvWnzpZVkSVww.QSvcOur.1Hlg7Pn3JhYSgnQJxQ8Zv4.', 'ehWeDdMZtPHJ69tCnnqCYBLLGzsjyetJzFXzr0oNo6k4fq771Vx0FCLrWuP6', '2021-05-16 21:12:24', '2021-05-18 06:28:21'),
(41, 'guru', 'guru121', 'guru12@gmail.com', '$2y$10$fvzyrnmOG4gfNp/6AAfViOFfFUrApujVJcyNHWc9t0fGT79EAnOEi', 'YwM93MdT6mLHlNGo1yaRcq7fYoKtjGZAgbv17a2PhFv7eFLHQ0CeGKmst2VM', '2021-05-18 04:39:04', '2021-05-18 05:13:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
