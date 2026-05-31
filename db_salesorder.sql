-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2026 at 05:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_salesorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_produk`, `jumlah`, `harga_satuan`, `subtotal`) VALUES
(1, 1, 1, 2, '4500000.00', '9000000.00'),
(2, 1, 7, 3, '850000.00', '2550000.00'),
(3, 1, 8, 1, '1200000.00', '1200000.00'),
(4, 2, 4, 2, '4200000.00', '8400000.00'),
(5, 3, 5, 1, '7500000.00', '7500000.00'),
(6, 4, 3, 1, '2800000.00', '2800000.00'),
(7, 4, 6, 1, '2300000.00', '2300000.00'),
(8, 5, 6, 1, '2300000.00', '2300000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_telepon`, `created_at`) VALUES
(1, 'Toko Elektronik Maju', 'Jl. Pahlawan No. 12, Jakarta', '081234567890', '2026-05-30 14:43:36'),
(2, 'CV Berkah Jaya', 'Jl. Sudirman No. 45, Bandung', '082345678901', '2026-05-30 14:43:36'),
(3, 'UD Sumber Rezeki', 'Jl. Gatot Subroto No. 7, Surabaya', '083456789012', '2026-05-30 14:43:36'),
(4, 'PT Cahaya Elektronik', 'Jl. Diponegoro No. 33, Semarang', '084567890123', '2026-05-30 14:43:36'),
(5, 'Toko Murah Meriah', 'Jl. Ahmad Yani No. 88, Yogyakarta', '085678901234', '2026-05-30 14:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(20) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `harga`, `stok`, `created_at`) VALUES
(1, 'PRD-001', 'TV LED Samsung 43 inch', '4500000.00', 20, '2026-05-30 14:43:17'),
(2, 'PRD-002', 'Kulkas Sharp 2 Pintu', '3200000.00', 15, '2026-05-30 14:43:17'),
(3, 'PRD-003', 'Mesin Cuci LG 8kg', '2800000.00', 10, '2026-05-30 14:43:17'),
(4, 'PRD-004', 'AC Daikin 1 PK', '4200000.00', 12, '2026-05-30 14:43:17'),
(5, 'PRD-005', 'Laptop ASUS VivoBook 14', '7500000.00', 8, '2026-05-30 14:43:17'),
(6, 'PRD-006', 'HP Xiaomi Redmi Note 13', '2300000.00', 25, '2026-05-30 14:43:17'),
(7, 'PRD-007', 'Speaker Bluetooth JBL', '850000.00', 30, '2026-05-30 14:43:17'),
(8, 'PRD-008', 'Kamera CCTV Hikvision', '1200000.00', 18, '2026-05-30 14:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `no_order` varchar(20) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `status` enum('draft','dikirim','selesai','dibatalkan') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `no_order`, `id_sales`, `id_pelanggan`, `tanggal`, `total_harga`, `status`, `created_at`) VALUES
(1, 'SO-20260501-001', 2, 1, '2026-05-01', '13500000.00', 'selesai', '2026-05-30 14:44:11'),
(2, 'SO-20260510-002', 2, 2, '2026-05-10', '8400000.00', 'dikirim', '2026-05-30 14:44:11'),
(3, 'SO-20260515-003', 3, 3, '2026-05-15', '7500000.00', 'selesai', '2026-05-30 14:44:11'),
(4, 'SO-20260520-004', 3, 4, '2026-05-20', '4600000.00', 'draft', '2026-05-30 14:44:11'),
(5, 'SO-20260525-005', 2, 5, '2026-05-25', '2300000.00', 'dibatalkan', '2026-05-30 14:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','sales','manager') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', '2026-05-30 13:23:06'),
(2, 'Budi Santoso', 'budi', '3f59a0fcfb5bd8f8a6b595a42f1b4b05', 'sales', '2026-05-30 13:23:06'),
(3, 'Sari Dewi', 'sari', '3f59a0fcfb5bd8f8a6b595a42f1b4b05', 'sales', '2026-05-30 13:23:06'),
(4, 'Rina Marlina', 'manager', '6ca526e78d48869d95b5b00b7bfa3f5b', 'manager', '2026-05-30 13:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_order` (`no_order`),
  ADD KEY `id_sales` (`id_sales`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `sales_order` (`id`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`id_sales`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sales_order_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
