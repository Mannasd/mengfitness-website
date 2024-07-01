-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 24 Jun 2024 pada 18.47
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
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `bmi_category` varchar(20) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `description`, `bmi_category`, `image_url`) VALUES
(20, 'Push-up', 'Push-up adalah latihan dasar yang digunakan dalam pelatihan atletik atau pendidikan jasmani sipil dan umum dalam pelatihan fisik militer. Push-up terutama melatih otot dada, trisep, dan bahu.', 'underweight', 'uploads/pushup.jpg'),
(21, 'Bodyweight Squats', 'Squat dengan berat badan sendiri adalah latihan yang efektif untuk memperkuat otot tubuh bagian bawah dan inti tanpa perlu peralatan.\r\n', 'underweight', 'uploads/squat.jpg'),
(22, 'Lunges', 'Lunges adalah latihan dengan berat badan yang bagus untuk mengembangkan kekuatan kaki dan glute. Lunges juga meningkatkan keseimbangan dan fleksibilitas.', 'underweight', 'uploads/lunges.jpg'),
(27, 'Running', 'Berlari adalah latihan kardiovaskular yang meningkatkan kebugaran secara keseluruhan, daya tahan, dan kesehatan kardiovaskular. Berlari sangat baik untuk menjaga berat badan sehat.', 'normal', 'uploads/run.jpg'),
(28, 'Plank', 'Plank adalah latihan kekuatan inti isometrik yang melibatkan posisi seperti push-up selama mungkin. Plank melatih otot perut, punggung, dan bahu.', 'normal', 'uploads/plank.jpg'),
(29, 'Burpee', 'Burpee adalah latihan seluruh tubuh yang menggabungkan latihan kekuatan dan aerobik. Burpee melatih hampir setiap otot di tubuh Anda dan meningkatkan kebugaran kardiovaskular.', 'normal', 'uploads/Burpee.jpg'),
(31, 'Bersepeda', 'Bersepeda adalah latihan berdampak rendah yang dapat dilakukan di luar ruangan atau menggunakan sepeda statis. Bersepeda membantu meningkatkan kesehatan kardiovaskular dan kekuatan kaki.\r\n', 'overweight', 'uploads/bersepeda.jpg'),
(32, 'Berenang', ' Berenang adalah latihan seluruh tubuh yang tidak memberikan tekanan pada persendian dan efektif untuk menurunkan berat badan. Berenang meningkatkan kebugaran kardiovaskular dan kekuatan otot.', 'overweight', 'uploads/renang.jpg'),
(33, 'Walking', 'salah satu bentuk olahraga aerobik ringan yang dapat dilakukan hampir di mana saja. Berjalan kaki atau berjalan santai membantu membakar kalori, meningkatkan kebugaran jantung, dan mengurangi risiko cedera karena tidak terlalu membebani sendi seperti lari. Anda dapat memulainya dengan berjalan selama beberapa menit setiap hari dan secara bertahap meningkatkan durasinya.', 'obese', 'uploads/walking.jpg'),
(34, 'Yoga ', 'Yoga dapat disesuaikan untuk berbagai tingkat kebugaran dan fleksibilitas. Kelas yoga untuk pemula menekankan pada gerakan yang lembut, pernapasan, dan relaksasi, yang bisa membantu dalam meningkatkan fleksibilitas, kekuatan otot, dan kesejahteraan secara keseluruhan.', 'obese', 'uploads/yoga.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
