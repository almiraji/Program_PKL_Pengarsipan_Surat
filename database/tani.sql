-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2023 pada 16.34
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disp` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `isi_disposisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disp`, `id_suratmasuk`, `isi_disposisi`) VALUES
(2, 4, 'dsd'),
(3, 4, 'dasdddf'),
(7, 6, 'test'),
(8, 6, 'testt02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `username`, `password`, `level`) VALUES
(4, 'Jaya Abadi', 'poktan@gmail.com', 'jayaabadi', '11', 'pegawai'),
(7, 'Dita', 'dita@gmail.com', 'Dita', 'dita', 'admin'),
(12, 'er', 'er@gmail.com', 'er', 'ir', 'kepala dinas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id`, `nama_bidang`) VALUES
(1, 'Bidang Ketersediaan dan Distribusi Pangan'),
(2, 'Bidang Konsumsi Keamanan Pangan'),
(3, 'Bidang Peternakan dan Kesehatan Hewan'),
(4, 'Bidang Perikanan'),
(5, 'Bidang Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepala_dinas`
--

CREATE TABLE `tbl_kepala_dinas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kepala_dinas`
--

INSERT INTO `tbl_kepala_dinas` (`id`, `nama`, `username`, `password`) VALUES
(1, 'kadis', 'kadis', 'kadis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nama`, `id_bidang`, `username`, `password`) VALUES
(2, 'Budianto', 2, 'budi', 'budi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perihal`
--

CREATE TABLE `tbl_perihal` (
  `id` int(11) NOT NULL,
  `nama_perihal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perihal`
--

INSERT INTO `tbl_perihal` (`id`, `nama_perihal`) VALUES
(2, 'Penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suratkeluar`
--

CREATE TABLE `tbl_suratkeluar` (
  `id_surat` int(11) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `tindak_lanjut` enum('Perlu Balasan','Tidak Perlu') NOT NULL,
  `id_perihal` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_suratkeluar`
--

INSERT INTO `tbl_suratkeluar` (`id_surat`, `tujuan_surat`, `id_bidang`, `nomor_surat`, `tanggal_keluar`, `tindak_lanjut`, `id_perihal`, `keterangan`, `status`, `file`) VALUES
(6, 'ddadee', 1, 'dad114ee', '2023-09-15 00:00:00', 'Perlu Balasan', 2, 'czc', 'disetujui', ''),
(8, 'dff', 3, 'fsf', '2023-09-22 00:00:00', 'Tidak Perlu', 2, 'fsdf', 'disetujui', '1311-bank.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suratmasuk`
--

CREATE TABLE `tbl_suratmasuk` (
  `id` int(11) NOT NULL,
  `pengirim_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tindak_lanjut` enum('Perlu Balasan','Tidak Perlu') NOT NULL,
  `id_perihal` int(11) NOT NULL,
  `isi_disposisi` varchar(255) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_suratmasuk`
--

INSERT INTO `tbl_suratmasuk` (`id`, `pengirim_surat`, `nomor_surat`, `tanggal_masuk`, `tindak_lanjut`, `id_perihal`, `isi_disposisi`, `id_bidang`, `keterangan`, `status`, `file`) VALUES
(6, 'eff', 'sd42', '2023-09-19 00:00:00', '', 2, 'fdf', 2, '9963-254641-none-1206bc2a.pdf', 'disetujui', ''),
(7, 'rfff', 'fdfr2ff', '2023-09-13 00:00:00', '', 0, 'rwr', 0, '8736-CAHYA RAHMATIAH.pdf', '', ''),
(8, 'testtttttttt', '8697kgfsssv', '2023-10-20 02:02:00', 'Tidak Perlu', 2, 'test', 1, 'test', 'disetujui', '5465-background sidang.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disp`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kepala_dinas`
--
ALTER TABLE `tbl_kepala_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_perihal`
--
ALTER TABLE `tbl_perihal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kepala_dinas`
--
ALTER TABLE `tbl_kepala_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_perihal`
--
ALTER TABLE `tbl_perihal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
