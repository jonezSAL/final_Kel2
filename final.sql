-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `usser` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `usser`, `password`) VALUES
(1, 'admin', 'Admin123'),
(2, 'ikhwan', 'Ikhwan123'),
(3, 'fitri', 'Fitri123'),
(4, 'ana', 'Ana12345');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `ID_Destinasi` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `Nama_Destinasi` varchar(255) DEFAULT NULL,
  `Foto` varchar(255) NOT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Harga` int(50) DEFAULT NULL,
  `Lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`ID_Destinasi`, `ID_Kategori`, `Nama_Destinasi`, `Foto`, `Deskripsi`, `Harga`, `Lokasi`) VALUES
(1, 1, 'Taman Nasional Komodo', '935.jpg', 'Taman Nasional Komodo terkenal sebagai habitat bagi komodo, hewan kadal terbesar di dunia.', 150000, 'Nusa Tenggara Timur'),
(2, 1, 'Taman Nasional Gunung Bromo', '336.jpeg', 'Taman Nasional Gunung Bromo merupakan tujuan populer di Jawa Timur dengan pemandangan alam yang spektakuler. ', 100000, 'Jawa Timur'),
(3, 1, 'Taman Nasional Lorentz', '804.jpeg', 'Taman Nasional Lorentz mencakup hutan hujan tropis, pegunungan, dan gletser di Pegunungan Jayawijaya.', 170000, 'Papua'),
(4, 1, 'Taman Nasional Way Kambas', '184.jpeg', 'Taman Nasional Way Kambas adalah tujuan penting untuk melindungi satwa liar langka, termasuk gajah Sumatera, badak, dan harimau.', 80000, 'Lampung'),
(5, 1, 'Taman Nasional Ujung Kulon', '376.jpeg', 'Taman Nasional Ujung Kulon terkenal karena menjadi habitat badak bercula satu, spesies yang sangat langka dan terancam punah.', 70000, 'Banten'),
(6, 2, 'Bali Treetop Adventure Park', '434.jpeg', 'Bali Treetop Adventure Park adalah taman petualangan yang terletak di tengah hutan tropis.', 350000, 'Bali'),
(7, 2, 'Jatim Park 3', '345.jpeg', 'Jatim Park 3 adalah taman petualangan yang menawarkan berbagai wahana seru.', 250000, 'Malang'),
(8, 2, 'Jungleland Adventure Theme Park', '7.jpeg', 'Jungleland Adventure Theme Park menawarkan taman petualangan dengan wahana yang seru.', 350000, 'Bogor'),
(9, 2, 'Secret Garden Village', '', 'Secret Garden Village adalah taman petualangan yang terletak di Bedugul, Bali.', 200000, 'Bedugul Bali'),
(10, 2, 'Flying Fox Bukit Kasih', '', 'Flying Fox Bukit Kasih adalah tempat wisata petualangan yang menarik.', 100000, 'Sulawesi Utara'),
(11, 3, 'Pantai Kuta', '', 'Pantai Kuta adalah salah satu pantai paling terkenal di Bali', 30000, 'Bali'),
(12, 2, 'Pantai Pink', '', 'Pantai Pink adalah pantai yang terletak di Pulau Komodo, Nusa Tenggara Timur.', 25000, 'Nusa Tenggara Timur'),
(13, 3, 'Pantai Tanjung Bira', '', 'Pantai Tanjung Bira ini terkenal dengan pasir putihnya yang bersih.', 20000, 'Sulawesi Selatan'),
(14, 3, 'Pantai Popoh', '', 'Pantai Popoh adalah salah satu pantai yang terkenal di Tulungagung, Jawa Timur.', 20000, 'Tulungagung'),
(15, 3, 'Pantai Parangtritis', '', 'Pantai Parangtritis menawarkan panorama yang indah dengan pasir hitam.', 30000, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `detail_destinasi`
--

CREATE TABLE `detail_destinasi` (
  `ID_Detail` int(11) NOT NULL,
  `ID_Destinasi` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `ID_Gambar` int(11) NOT NULL,
  `ID_Detail` int(11) NOT NULL,
  `Nama_File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_destinasi`
--

CREATE TABLE `kategori_destinasi` (
  `ID_Kategori` int(11) NOT NULL,
  `Nama_Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_destinasi`
--

INSERT INTO `kategori_destinasi` (`ID_Kategori`, `Nama_Kategori`) VALUES
(1, 'Wisata Alam'),
(2, 'Wisata Petualangan'),
(3, 'Wisata Pantai'),
(4, 'Wisata Sejarah'),
(5, 'Wisata Hiburan'),
(6, 'Wisata Safari');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Destinasi` int(11) DEFAULT NULL,
  `Nama_Pemesan` varchar(255) NOT NULL,
  `Tanggal_Pemesanan` date DEFAULT NULL,
  `Jumlah_Tiket` int(100) DEFAULT NULL,
  `Total_Harga` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ID_Ulasan` int(11) NOT NULL,
  `ID_Detail` int(11) DEFAULT NULL,
  `Nama_User` varchar(255) NOT NULL,
  `Ulasan` varchar(255) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`ID_Destinasi`),
  ADD KEY `ID_Kategori` (`ID_Kategori`);

--
-- Indexes for table `detail_destinasi`
--
ALTER TABLE `detail_destinasi`
  ADD PRIMARY KEY (`ID_Detail`),
  ADD KEY `ID_Destinasi` (`ID_Destinasi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`ID_Gambar`),
  ADD KEY `ID_Detail` (`ID_Detail`);

--
-- Indexes for table `kategori_destinasi`
--
ALTER TABLE `kategori_destinasi`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_Pemesanan`),
  ADD KEY `ID_Destinasi` (`ID_Destinasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ID_Ulasan`),
  ADD KEY `ID_Destinasi` (`ID_Detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `ID_Destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `detail_destinasi`
--
ALTER TABLE `detail_destinasi`
  MODIFY `ID_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `ID_Gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori_destinasi`
--
ALTER TABLE `kategori_destinasi`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_Pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ID_Ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `destinasi_ibfk_1` FOREIGN KEY (`ID_Kategori`) REFERENCES `kategori_destinasi` (`ID_Kategori`);

--
-- Constraints for table `detail_destinasi`
--
ALTER TABLE `detail_destinasi`
  ADD CONSTRAINT `detail_destinasi_ibfk_3` FOREIGN KEY (`ID_Destinasi`) REFERENCES `destinasi` (`ID_Destinasi`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`ID_Detail`) REFERENCES `detail_destinasi` (`ID_Detail`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_Destinasi`) REFERENCES `destinasi` (`ID_Destinasi`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`ID_Detail`) REFERENCES `detail_destinasi` (`ID_Detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
