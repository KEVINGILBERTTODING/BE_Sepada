-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2023 pada 19.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_sepada`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_tamu` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `alasan` text NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `jam` time NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `id_status` int(12) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_tamu`, `id_user`, `tujuan`, `alasan`, `tanggal`, `tgl_diajukan`, `jam`, `jumlah`, `id_status`, `alasan_verifikasi`) VALUES
('cuti-0b177', 'cfac9ea69497b1135340dee542b63653', 'Umum', 'ahahhaaha', '2023-06-01', '2023-06-12', '07:51:00', '10 orang', 1, NULL),
('cuti-30e87', 'cfac9ea69497b1135340dee542b63653', 'Keuangan', 'adek lala ingin menemui kabag humas', '2023-06-30', '2023-06-06', '19:38:00', '10 orang', 2, 'ok msk'),
('cuti-f931d', 'cfac9ea69497b1135340dee542b63653', 'Umum', 'coba coba', '2023-06-30', '2023-06-05', '13:26:00', '10 orang', 2, 'menunggu sekitar 15 menit'),
('tamu-4bfde', 'cfac9ea69497b1135340dee542b63653', 'Komisi-A', 't7t7tut', '2023-06-01', '2023-06-12', '03:51:00', '10 orang', 2, 'okok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_cuti`
--

CREATE TABLE `status_cuti` (
  `id_status_cuti` int(11) NOT NULL,
  `status_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_cuti`
--

INSERT INTO `status_cuti` (`id_status_cuti`, `status_cuti`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Izin Cuti Diterima'),
(3, 'Izin Cuti Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('0000f879df9b442107cc359168ce33a6', 'intan', 'intan', 'intan@gmail.com', 1, '0000f879df9b442107cc359168ce33a6'),
('134e349e4f50a051d8ca3687d6a7de1a', 'admin', 'admin', 'admin@admin.com', 2, '134e349e4f50a051d8ca3687d6a7de1a'),
('26854cfcfae1ded0863628e86484d5c7', 'agus', 'agus', 'agusagus@gmail.com', 1, '26854cfcfae1ded0863628e86484d5c7'),
('269e970341d6928998b050f6234f85f1', 'admin1', 'admin123@gmail.com', 'admin123@gmail.com', 2, '269e970341d6928998b050f6234f85f1'),
('6376b019dd9869c6ffc6b4395cc1b78a', 'udinus', 'udinus', 'udinus@gmail.com', 1, '6376b019dd9869c6ffc6b4395cc1b78a'),
('cfac9ea69497b1135340dee542b63653', 'syahrul', 'syahrul', 'dprd_kota123@gmail.com', 1, 'cfac9ea69497b1135340dee542b63653'),
('f5972fbf4ef53843c1e12c3ae99e5005', 'super_admin', 'super_admin', 'kresna123@gmail.com', 3, 'f5972fbf4ef53843c1e12c3ae99e5005'),
('fe193b890916e6f8161c469774d55965', 'syahrul', '321', 'syahrul@gmail.com', 1, 'fe193b890916e6f8161c469774d55965'),
('ff3134128e3775d019d6168cf12b86fa', 'syahrul', '123', 'syahrulatmaja@gmail.com', 1, 'ff3134128e3775d019d6168cf12b86fa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `alamat`, `nip`, `pangkat`, `jabatan`) VALUES
('0000f879df9b442107cc359168ce33a6', 'DPRD Kota Surabaya', 2, '089878675654', 'Jl. Kendangsari 123', '0987456789', 'ketua', 'ketua'),
('134e349e4f50a051d8ca3687d6a7de1a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('26854cfcfae1ded0863628e86484d5c7', 'DPRD Surakarta', 1, '783890287333', 'Jalan Sudirman 123456', NULL, NULL, NULL),
('269e970341d6928998b050f6234f85f1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6376b019dd9869c6ffc6b4395cc1b78a', 'Universitas Dian Nuswantoro', 1, '105678909876', 'jalan pemuda', '123456789', 'prodi', 'ketua'),
('cfac9ea69497b1135340dee542b63653', 'DPRD Kota', 1, '087435789733', 'jalan pemuda 147 semarang', NULL, NULL, NULL),
('f5972fbf4ef53843c1e12c3ae99e5005', NULL, 1, NULL, NULL, NULL, NULL, NULL),
('fe193b890916e6f8161c469774d55965', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ff3134128e3775d019d6168cf12b86fa', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(2, 'admin'),
(3, 'super admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indeks untuk tabel `status_cuti`
--
ALTER TABLE `status_cuti`
  ADD PRIMARY KEY (`id_status_cuti`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_cuti`
--
ALTER TABLE `status_cuti`
  MODIFY `id_status_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
