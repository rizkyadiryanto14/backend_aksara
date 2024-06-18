-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 16.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajaraksara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `jenis_konten` enum('pengenalan_aksara','latihan_menulis','panduan') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `jenis_konten`, `judul`, `isi`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'latihan_menulis', 'dummy', 'asdasdsadsadsadsadsadsadsadsa', 1, 1, '2024-06-15 07:30:16', NULL),
(2, 'latihan_menulis', 'dummy', 'asdasdsadsadsadsadsadsadsadsa', 1, 1, '2024-06-15 07:30:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_history`
--

CREATE TABLE `quiz_history` (
  `id_quiz` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `waktu_selesai` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','superadmin') NOT NULL DEFAULT 'user',
  `level_kuis` int(11) DEFAULT 0,
  `waktu_belajar` int(11) DEFAULT 0,
  `tanggal_registrasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `nama`, `email`, `password`, `role`, `level_kuis`, `waktu_belajar`, `tanggal_registrasi`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$w3BXseh4eur/eGmrsK4g6OCgnFxGSNyD5XzlmpsXBlmpQ2bj5/.oC', 'admin', 2, 2, '2024-06-10 08:10:56'),
(2, 'user', 'user', 'user@gmail.com', '$2y$10$0RvlJ.3UPlcJberu4HfjW.qMs/d.wl/rec6rzsMwnCQpwNOEmMnji', 'user', 0, 0, '2024-06-10 03:03:11'),
(15, 'mia', 'mia', 'mia@gmail.com', '$2y$10$6PFV5DIliCg8pkiB1YtwxOECHbrls0Ck1X6jUm3S2j73fxRKgvdy2', 'admin', 0, 0, '2024-06-17 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `quiz_history`
--
ALTER TABLE `quiz_history`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_users`) ON DELETE SET NULL,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_users`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD CONSTRAINT `quiz_history_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
