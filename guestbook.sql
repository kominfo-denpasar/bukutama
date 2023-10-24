-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2023 at 01:59 PM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spbedps_bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pesan` text NOT NULL,
  `kepuasan` text NOT NULL,
  `tgl` text NOT NULL,
  `jam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `alamat`, `pesan`, `kepuasan`, `tgl`, `jam`) VALUES
(10, 'Pande Suandana', 'Denpasar', 'Denpasar Mantap', 'Sangat Senang', '2022-04-07', '06:59:50am'),
(11, 'Tina Kristini', 'Tabanan', 'Sudah Bagus ditingkatkan lagi', 'Senang', '2022-04-07', '07:38:12am'),
(12, 'I Kadek Agus Arya Wibawa', 'Denpasar', 'Denpasar Maju.', 'Sangat Senang', '2022-04-08', '02:35:03am'),
(13, 'gede eka sedana yasa', 'Denpasar', 'mantap jos', 'Sangat Senang', '2022-04-08', '02:54:17am'),
(14, 'delinda', 'Denpasar', 'bagus', 'Senang', '2022-04-09', '03:59:22am'),
(15, 'Yanvir ', 'Denpasar', 'Mantap Selalu Denpasar', 'Sangat Senang', '2022-04-09', '08:25:44am'),
(16, 'dewa ayu krisna', 'Denpasar', 'tingkatkan inovasi', 'Senang', '2022-04-10', '02:27:30am'),
(17, 'arif purbantara', 'jakarta', 'hebatr denp[asar', 'Sangat Senang', '2022-04-10', '04:09:00am'),
(18, 'cempaka a.s', 'Denpasar', 'hapyy jos', 'Sangat Senang', '2022-04-10', '04:53:25am'),
(19, 'gung yudha', 'Denpasar', 'temen saya, gung tanggo, orang baik', 'Sangat Senang', '2022-04-10', '05:20:27am'),
(20, 'A.A. Raka', 'Denpasar', 'Keren. Semoga Denpasar tidak pernah berhenti berkembang', 'Sangat Senang', '2022-04-10', '05:20:57am'),
(21, 'cok kris', 'Denpasar', 'mantap', 'Sangat Senang', '2022-04-10', '07:30:22am'),
(22, 'ari permana', 'peliatan, ubud', 'baik', 'Senang', '2022-04-10', '08:40:51am'),
(23, 'Wahde', 'Denpasar', 'gembira', 'Senang', '2022-04-10', '08:47:02am'),
(24, 'surya', '', 'keren', 'Sangat Senang', '2023-06-02', '04:47:25am'),
(25, 'Tina ', '', 'sudah baik', 'Sangat Senang', '2023-06-02', '04:48:07am'),
(26, 'Wijaya', '', 'stand kurang luas', 'Senang', '2023-06-02', '04:48:57am'),
(27, 'krisna dewi', '', 'menarik', 'Sangat Senang', '2023-06-02', '05:05:31am'),
(28, 'diah', '', 'denpasar keren', 'Sangat Senang', '2023-06-02', '05:13:25am'),
(29, 'Laksmana', '', 'Peri Nais', 'Sangat Senang', '2023-06-02', '06:04:46am'),
(30, 'ayu suri afrida', '', 'kominfo denpasar mantap ', 'Senang', '2023-06-02', '11:23:41am'),
(31, 'Krisna', '', 'Keren, semoga kota Denpasar semakin maju', 'Senang', '2023-06-02', '11:28:38am'),
(32, 'Rupa', '', 'kegunaan dan pemanffat teknologi sangat baik untuk mempermudah masyarakat dalam bidang politik dan sosia budaya', 'Senang', '2023-06-03', '03:09:15am'),
(33, 'sekretariat DISPAR KOTA Denpasar', '', 'Pelayana sangat ramah ', 'Sangat Senang', '2023-06-03', '03:48:31am'),
(34, 'Made Deddy Darmawan, S.Pd., M.Pd', '', 'Bagus dan bersih', 'Sangat Senang', '2023-06-03', '05:23:18am'),
(35, 'suantika', '', 'puas', 'Sangat Senang', '2023-06-03', '07:33:32am'),
(36, 'Dodik Kustanto', '', 'Menarik, banyak informasi yang saya dapatkan. untuk selanjutnya jumlah booth / tenant tolong ditambahkan. terima kasih', 'Sangat Senang', '2023-06-03', '07:34:04am'),
(37, 'I Made semarayasa, S.Pd', '', 'sangat bagus dan memuaskan semoga acara seperti ini bisa terus berlanjut', 'Sangat Senang', '2023-06-03', '07:37:04am'),
(38, 'angjelia', '', 'sangat senang datang ke digifest, dan datang ke booth diskominfo kota denpasar\r\n', 'Sangat Senang', '2023-06-03', '08:06:21am'),
(39, 'nony', '', 'layanan sudah sangat bagus, pertahankan yg sdh bagus, dan tingkatkan yg msh hrs ditingkatkan', 'Senang', '2023-06-03', '08:24:24am'),
(40, 'jung is pkp', '', 'kominfos keren ', 'Sangat Senang', '2023-06-04', '02:58:23am'),
(41, 'octa', '', 'menarik dan mengesankan', 'Sangat Senang', '2023-06-04', '03:03:03am'),
(42, 'Utami Dewi', '', 'Mantap..Denpasar Kotaku Rumahku', 'Sangat Senang', '2023-06-04', '04:45:31am'),
(43, 'Mang Tri', '', 'Kakak yang memberi penjelasan mengenai aplikasi sangat dapat dimengerti, saya yang awalnya tidak tahu mengenai hal ini, jadi tertarik untuk mengikuti. Terima kasih', 'Senang', '2023-06-04', '04:47:09am'),
(44, 'desak risna', '', 'aplikasi DPS keren bangettt!!', 'Sangat Senang', '2023-06-04', '04:48:42am'),
(45, 'Agung Eka', '', 'Mantap', 'Sangat Senang', '2023-06-04', '06:46:22am'),
(46, 'IGAN RAINI', '', 'Denpasar keren', 'Sangat Senang', '2023-06-04', '07:18:40am'),
(47, 'pande gede adi pratama', '', 'kominfos keren', 'Sangat Senang', '2023-06-04', '07:20:09am'),
(48, 'i dewa putu putrakajaya', '', 'bagus buat sarana pembelajaran bagi masyarakat', 'Sangat Senang', '2023-06-04', '07:43:05am'),
(49, 'Danendra', '', 'Senang dapat informasi baru', 'Sangat Senang', '2023-06-04', '09:10:10am'),
(50, 'Saiful', '', 'Bagus', 'Sangat Senang', '2023-08-16', '03:24:02am'),
(51, 'Hery', '', 'Sangat bagus', 'Senang', '2023-08-16', '03:27:17am');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
