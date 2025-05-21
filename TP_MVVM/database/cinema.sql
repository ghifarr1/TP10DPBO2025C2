-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2025 pada 08.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `showtime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id`, `title`, `genre_id`, `showtime_id`) VALUES
(1, 'Skyfall', 1, 3),
(2, 'The Grand Budapest Hotel', 2, 2),
(3, 'The Shawshank Redemption', 3, 1),
(4, 'Pertaruhan', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `showtime`
--

CREATE TABLE `showtime` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `showtime`
--

INSERT INTO `showtime` (`id`, `time`, `description`) VALUES
(1, '10:00:00', 'Morning Show'),
(2, '14:30:00', 'Afternoon Show'),
(3, '19:00:00', 'Evening Show');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `showtime_id` (`showtime_id`);

--
-- Indeks untuk tabel `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `showtime`
--
ALTER TABLE `showtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`showtime_id`) REFERENCES `showtime` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
