-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 06.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kub_merci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_umum`
--

CREATE TABLE `kas_umum` (
  `id` int(20) NOT NULL,
  `id_transaksi` int(20) NOT NULL,
  `id_member` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `jumlah_masuk` bigint(100) NOT NULL,
  `jumlah_keluar` bigint(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `keperluan` text NOT NULL,
  `bukti_bayar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas_umum`
--

INSERT INTO `kas_umum` (`id`, `id_transaksi`, `id_member`, `nama`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `keterangan`, `keperluan`, `bukti_bayar`) VALUES
(25, 11112, 11111, 'user 1', '2022-07-06 04:55:13', 50000, 0, 'Bayar Kas', '', 'Screenshot_2022-06-19-15-56-23-346_com.example.praktikum_pertemuan_10.jpg'),
(26, 11113, 11111, 'user 1', '2022-07-06 04:55:22', 30000, 0, 'Bayar Kas', '', 'teahub.io-computer-wallpaper-hd-137909.jpg'),
(27, 11124, 44444, 'Renita Fauziah', '2022-07-06 14:37:37', 50000000000, 0, 'Bayar Kas', '', 'profil-ayya-renita-kiki-di-ikatan-cinta-8NCWvPEM6N.jpg'),
(29, 11125, 44444, 'Renita Fauziah', '2022-07-06 15:08:03', 10000, 0, 'Bayar Kas', '', 'random.jpg'),
(30, 11128, 44444, 'Renita Fauziah', '2022-07-07 11:56:15', 10000, 0, 'Bayar Kas', '', 'sasad.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_bulanan`
--

CREATE TABLE `saldo_bulanan` (
  `id` int(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_pemasukan` bigint(50) NOT NULL,
  `jumlah_pengeluaran` bigint(50) NOT NULL,
  `jumlah_keuntungan` bigint(20) NOT NULL,
  `saldo_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo_bulanan`
--

INSERT INTO `saldo_bulanan` (`id`, `bulan`, `tahun`, `jumlah_pemasukan`, `jumlah_pengeluaran`, `jumlah_keuntungan`, `saldo_total`) VALUES
(1, '0', 2022, 0, 0, 0, 0),
(2, 'July', 2022, 80000, 0, 80000, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `password`, `status`) VALUES
(12345, '12345', '12345', 'admin'),
(44444, 'Renita Fauziah', 'okkynak14', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keanggotaan`
--

CREATE TABLE `tbl_keanggotaan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `foto_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_keanggotaan`
--

INSERT INTO `tbl_keanggotaan` (`id`, `nama`, `no_hp`, `alamat`, `jenis_usaha`, `nama_usaha`, `foto_member`) VALUES
('010102', 'zie', '081347890523', 'purwokerto', 'elektronik', 'bakul pulsa', '6654928_7134a531-77a5-4191-a08f-c3263f3a57ee_1500_1500.jpg'),
('11111', 'user 1', '081312344321', 'blablalbla', 'usaha jenis 1', 'usaha anu', ''),
('22222', 'user 2', '081312344321', 'bkbalbaba', 'usaha jenis 1', 'usaha itu', ''),
('33333', 'Fajrin Nurhakim', '087865433456', 'jl. sunan giri', 'elektronik', 'bakul pulsa', 'Screenshot_2022-06-19-15-56-57-913_com.example.praktikum_pertemuan_10.jpg'),
('44444', 'Renita Fauziah', '087865433456', 'jl. anjay', 'baso tikus', 'dodolan', 'Screenshot_2022-06-19-15-56-42-788_com.example.praktikum_pertemuan_10.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_admin`
--

CREATE TABLE `temp_admin` (
  `id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_transaksi`
--

CREATE TABLE `temp_transaksi` (
  `id` int(20) NOT NULL,
  `id_member` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masuk` bigint(100) NOT NULL,
  `jumlah_keluar` bigint(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `keperluan` text NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `setatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp_transaksi`
--

INSERT INTO `temp_transaksi` (`id`, `id_member`, `nama`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `keterangan`, `keperluan`, `bukti_bayar`, `setatus`) VALUES
(11112, 11111, 'user 1', '2022-07-03', 50000, 0, 'Bayar Kas', '', 'Screenshot_2022-06-19-15-56-23-346_com.example.praktikum_pertemuan_10.jpg', 'Di Konfirmasi'),
(11113, 11111, 'user 1', '2022-07-03', 30000, 0, 'Bayar Kas', '', 'teahub.io-computer-wallpaper-hd-137909.jpg', 'Di Konfirmasi'),
(11114, 22222, 'user 2', '2022-07-04', 30000, 0, 'Bayar Kas', '', 'Screenshot_2022-06-19-15-56-36-715_com.example.praktikum_pertemuan_10.jpg', 'Menunggu Konfirmasi'),
(11115, 22222, 'user 2', '2022-07-05', 50000, 0, 'Bayar Kas', '', 'Screenshot_2022-06-19-15-56-55-001_com.example.praktikum_pertemuan_10.jpg', 'Menunggu Konfirmasi'),
(11116, 11111, 'user 1', '2022-07-13', 50000, 0, 'Bayar Kas', '', 'Screenshot_2022-06-19-15-56-42-788_com.example.praktikum_pertemuan_10.jpg', 'Menunggu Konfirmasi'),
(11117, 11111, 'user 1', '2022-07-03', 0, 300000, 'Peminjaman Kas', 'pengen pinjem aja si', '', 'Menunggu Konfirmasi'),
(11119, 33333, 'Fajrin Nurhakim', '2022-07-04', 300000, 0, 'Investasi', '', 'Screenshot_2022-06-19-15-56-42-788_com.example.praktikum_pertemuan_10.jpg', 'Menunggu Konfirmasi'),
(11120, 44444, 'Renita Fauziah', '2022-07-04', 500000, 0, 'Investasi', '', '723c7be47cf91ecf264b8fd07e3705c9.jpg', 'Menunggu Konfirmasi'),
(11121, 11111, 'user 1', '2022-07-04', 200000, 0, 'Bayar Kas', '', '6654928_7134a531-77a5-4191-a08f-c3263f3a57ee_1500_1500.jpg', 'Menunggu Konfirmasi'),
(11122, 11111, 'user 1', '2022-06-06', 0, 200000, 'Peminjaman Kas', 'sdadasdada', '', 'Menunggu Konfirmasi'),
(11123, 22222, 'user 2', '2022-07-09', 0, 222222, 'Peminjaman Kas', 'qweqweqwe', '', 'Menunggu Konfirmasi'),
(11124, 44444, 'Renita Fauziah', '2022-07-06', 50000000000, 0, 'Bayar Kas', '', 'profil-ayya-renita-kiki-di-ikatan-cinta-8NCWvPEM6N.jpg', 'Di Konfirmasi'),
(11125, 44444, 'Renita Fauziah', '2022-07-06', 10000, 0, 'Bayar Kas', '', 'random.jpg', 'Di Konfirmasi'),
(11126, 44444, 'Renita Fauziah', '2022-07-06', 0, 500000, 'Peminjaman Kas', 'membuka usaha ', '', 'Menunggu Konfirmasi'),
(11127, 33333, 'Fajrin Nurhakim', '2022-07-07', 500000, 0, 'Investasi', '', 'satu.jpg', 'Menunggu Konfirmasi'),
(11128, 44444, 'Renita Fauziah', '2022-07-07', 10000, 0, 'Bayar Kas', '', 'sasad.jpg', 'Di Konfirmasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kas_umum`
--
ALTER TABLE `kas_umum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `saldo_bulanan`
--
ALTER TABLE `saldo_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_keanggotaan`
--
ALTER TABLE `tbl_keanggotaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp_admin`
--
ALTER TABLE `temp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kas_umum`
--
ALTER TABLE `kas_umum`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `saldo_bulanan`
--
ALTER TABLE `saldo_bulanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
