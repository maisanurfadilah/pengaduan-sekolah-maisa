-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2026 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `status` enum('baru','diproses','selesai') DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id_aspirasi`, `id_user`, `id_kategori`, `judul`, `isi`, `tanggal`, `status`) VALUES
(1, 2, 3, 'Perbaikan Fasilitas Toilet', 'Saya berharap pihak sekolah dapat memperhatikan kebersihan dan kelayakan toilet siswa, karena beberapa toilet sering mengalami kerusakan dan kekurangan air. Dengan perbaikan ini, kenyamanan dan kesehatan siswa dapat lebih terjaga.', '2026-02-09 20:43:30', 'diproses'),
(2, 2, 1, 'bocor', 'di kelas 10 akl ada yang bocor', '2026-02-12 20:21:57', 'diproses'),
(3, 2, 1, 'kotor', 'lorong sekolah kotor', '2026-02-25 08:09:08', 'selesai'),
(4, 2, 4, 'buku rusak', 'buku banyak yg rusak', '2026-03-17 16:50:13', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Ruang Kelas'),
(2, 'Laboratorium'),
(3, 'Toilet'),
(4, 'Perpustakaan'),
(5, 'Lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `umpan_balik`
--

CREATE TABLE `umpan_balik` (
  `id_feedback` int(11) NOT NULL,
  `id_aspirasi` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umpan_balik`
--

INSERT INTO `umpan_balik` (`id_feedback`, `id_aspirasi`, `pesan`, `tanggal`) VALUES
(1, 1, 'okee siapp bosss', '2026-02-09 20:44:07'),
(2, 2, 'akan di sampaikan', '2026-02-12 20:22:57'),
(3, 3, 'selesai', '2026-02-25 08:47:46'),
(4, 4, 'oke,nanti d chek', '2026-03-17 17:01:44'),
(5, 4, 'oke', '2026-04-01 19:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`) VALUES
(2, 'siswa', '123', 'Siswa Satu', 'siswa'),
(6, 'admin', '1234', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_aspirasi` (`id_aspirasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `aspirasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `aspirasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `aspirasi` (`id_aspirasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
