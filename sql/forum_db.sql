-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 14.44
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_kategori`
--

CREATE TABLE `b_kategori` (
  `id` int(3) NOT NULL,
  `jenis` varchar(16) DEFAULT NULL,
  `nama` varchar(77) NOT NULL,
  `slug` varchar(77) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `b_kategori`
--

INSERT INTO `b_kategori` (`id`, `jenis`, `nama`, `slug`) VALUES
(1, 'platform', 'PC', 'pc'),
(2, 'platform', 'Console', 'console'),
(3, 'genre', 'Sandbox', 'sandbox'),
(4, 'genre', 'Strategy', 'strategy'),
(5, 'genre', 'FPS', 'fps'),
(6, 'genre', 'MOBA', 'moba'),
(7, 'genre', 'RPG', 'rpg'),
(8, 'genre', 'MMORPG', 'mmorpg'),
(9, 'genre', 'Simulation', 'simulation'),
(10, 'genre', 'Sports', 'sports'),
(11, 'genre', 'Puzzles', 'puzzles'),
(12, 'genre', 'Action', 'action'),
(13, 'genre', 'Adventure', 'adventure'),
(14, 'genre', 'Survival', 'survival'),
(15, 'genre', 'Horror', 'horror'),
(16, 'genre', 'Open World', 'open-world'),
(17, 'genre', 'Pixel', 'pixel'),
(18, 'genre', 'Racing', 'racing'),
(19, 'genre', 'Idle', 'idle'),
(20, 'genre', 'Card', 'card'),
(21, 'genre', 'Casino', 'casino'),
(22, 'role', 'Owner', 'owner'),
(23, 'role', 'Head Admin', 'head-admin'),
(24, 'role', 'Admin', 'admin'),
(25, 'role', 'Moderator', 'moderator'),
(26, 'role', 'Pendatang Baru', 'pendatang-baru'),
(27, 'role', 'Anggota', 'anggota'),
(28, 'role', 'Anggota Lama', 'anggota-lama'),
(29, 'role', 'Veteran', 'veteran'),
(30, 'role', 'VIP', 'vip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_user`
--

CREATE TABLE `b_user` (
  `id` int(11) NOT NULL,
  `username` varchar(78) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `user_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `b_user`
--

INSERT INTO `b_user` (`id`, `username`, `email`, `password`, `role`, `user_img`) VALUES
(5, 'akuntester', 'test@gmail.com', '$2y$10$BuatKSZZ/qKQZ1qX3.9D/e5D91UqhvLdCVmfXdDJvyqlA7A9yknCe', 22, ''),
(8, 'egi', 'egi@gmail.com', '$2y$10$KUFjeY5nW1vcHFfxJY.N9utCkMZFyDpkK8qaQowvN3oZ6n24F1Zne', 0, ''),
(9, 'teo', 'teo@gmail.com', '$2y$10$Gzpulapc/lHJ8TzdbfseU.0GlTNwlUjmSx5ZeBHtsofz2kgs0lSAm', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `c_konten`
--

CREATE TABLE `c_konten` (
  `id` int(11) NOT NULL,
  `b_user_id` int(11) DEFAULT NULL,
  `b_kategori_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `c_konten_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `c_konten`
--

INSERT INTO `c_konten` (`id`, `b_user_id`, `b_kategori_id`, `judul`, `img`, `isi`, `c_konten_id`) VALUES
(1, 5, 1, 'Lorem Ipsum', 'https://akcdn.detik.net.id/visual/2019/07/11/26d3df53-6d57-4cde-8872-05c78c830b9b_169.jpeg?w=650', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', NULL),
(2, 5, 2, 'Game \"Demon Slayer: Hinokami Chronicles\" siap hadir di PS4 dan PS5', 'https://www.play-verse.com/wp-content/uploads/2021/02/Kimetsu-no-Yaiba-Japan-Banner.jpg', 'Pada bulan Maret tahun lalu Aniplex sempat mengumumkan kehadiran game yang diangkat dari serial animasi dan manga terkenal yaitu Kimetsu no Yaiba (Demon Slayer). Kehadirannya sukses membuat para fans tidak sabar untuk menunggu game tersebut.\r\n\r\nNamun awalnya pihak Aniplex mengatakan bahwa game yang dikembangkan oleh CyberConnect2 ini bakal diluncurkan untuk console PlayStation 4. Kini pihaknya pun telah memberikan informasi terbaru tentang ketersediaan gamenya.\r\n\r\nDikutip dari situs PR Times, Aniplex mengumumkan bahwa game yang berjudul Demon Slayer: Kimetsu no Yaiba - Hinokami Keppuutan ini juga akan hadir untuk platform PlayStation 5, Xbox Series X/S, Xbox One, dan juga PC, termasuk PlayStation 4 sendiri.', NULL),
(3, 5, 16, 'The GTA Remastered Trilogy Appears To Be Real, And Coming To Switch', 'https://gamefinity.id/wp-content/uploads/2021/08/GTA-Trilogy-Remastered.jpg', 'After months of rumors and speculation, Kotaku has learned from sources that Rockstar Games may be remastering three classic Grand Theft Auto games. Currently, it appears these games will be released later this fall for a multitude of platforms, including the portable Nintendo Switch.\r\n\r\nFor the past year, rumors have swirled on Twitter, Reddit, and various message boards that Rockstar is working on remakes or remasters of classic, PS2-era Grand Theft Auto titles. These rumors only grew in popularity as Rockstar’s parent company, Take-Two Interactive, used DMCA takedowns to remove classic GTA mods from the internet while announcing that the publisher had three remastered games in development. While Kotaku can’t confirm what all of those teased remastered titles specifically are, we can confirm via corroborating details from three sources that GTA remasters are currently in the final stages of development.\r\n\r\nKotaku has reached out to Rockstar about these remastered games and future GTA re-releases. But our sources have, so far, had reliable track records that have alerted us to updates in GTA Online and Red Dead Online weeks if not months in advance.\r\n\r\nAccording to these sources, Rockstar is actively developing remastered versions of Grand Theft Auto III, Grand Theft Auto Vice City, and Grand Theft Auto San Andreas. All three of these games are being remastered using Unreal Engine and will be a mix of “new and old graphics.” One source who claims to have seen a snippet of the games in action said that the visuals reminded them of a heavily-modded version of a classic GTA title. The UI for the games are being updated too, but will retain the same classic style. No details were shared about gameplay, but Kotaku has been told these remastered titles are trying to stay true to the PS2-era GTA games as much as possible.\r\n\r\nSources confirmed that Rockstar Dundee, a Scottish outpost and one of the newest studios at the company, is leading the charge on developing the remastered games. Another source explained that the studio is heavily involved in not just the remasters, but is even helping Rockstar on developing the next-gen GTA V ports that are due out later this year. This lines up with information I had heard last year, after the studio was purchased by Rockstar Games. Before becoming Rockstar Dundee, the studio was Ruffian games and had previously worked on Crackdown 2, Crackdown 3 and assisted with development on the Master Chief Collection.\r\n\r\nPlans around these remastered GTA titles have shifted quite a bit over the last year as a result of the ongoing covid-19 pandemic, and they might continue to do so until things are officially announced. Originally, it seemed that these re-releases were going to be packaged together and given to players who purchased the upcoming next-gen ports of GTA V and GTA Online as a sort of bonus or “thank you gift” from Rockstar. Then plans changed, and the remastered trilogy was scheduled to be released earlier this year. However, plans have changed again, and now the remastered titles are planned to launch around late October or early November for PS4, PS5, Xbox One, Xbox Series X/S, Switch, PC, Stadia, and mobile phones.\r\n\r\nIt appears the PC and mobile ports might slip to next year as Rockstar focuses on developing the console ports first. While some might have expected Rockstar to space these releases out, if not releasing them on each games’ respective 20 year anniversary, sources told me that this isn’t the current plan. Instead, it seems all three games are to be released in one collected package that may only be sold digitally.\r\n\r\nFor fans who are more interested in other classic Rockstar games getting remastered and rereleased, sources tell me that Rockstar has plans to develop new ports of games like Red Dead Redemption. But the future of these remastered games depends on how well these initial re-releases sell.\r\n\r\nHowever, for now, Rockstar is focused on getting these three remastered Grand Theft Auto games out the door alongside the GTA V next-gen ports. Dundee is leading development, and many other studios across Rockstar’s vast network of teams are also pitching in on both projects. According to one source, everyone shifting to support these titles is one major reason why Red Dead Online has seen fewer and smaller updates. But if all of this pans out it might be a very exciting year for fans of classic GTA games.', NULL),
(4, 5, 5, 'Tampilkan Minigame Sabung Ayam, Far Cry 6 Diprotes PETA', 'https://cdn.medcom.id/dynamic/content/2021/09/07/1323660/qFPljYsL9v.jpg?w=1024', 'Organisasi pembela hak-hak hewan PETA memprotes adanya fitur berupa minigame sabung ayam di game terbaru keluaran terbaru Ubisoft yaitu Far Cry 6.\r\n\r\nPernyataan itu disampaikan PETA Latino Senior Manager, Alicia Aguayo, di laman resmi mereka. \r\n\r\n\"Mengubah olahraga berdarah yang mengerikan seperti sabung ayam menjadi pertandingan video game bergaya Mortal Kombat adalah jauh dari inovasi yang nyata,\" tulis Aguayo, dikutip Selasa (12/10/2021).\r\n\r\nMereka mengklaim, saat ini masyarakat sangat menentang memaksa hewan untuk bertarung sampai mati.\r\n\r\n\"Ayam jantan yang digunakan dalam sabung ayam dilengkapi dengan taji tajam yang merobek daging dan tulang, menyebabkan luka yang menyiksa dan fatal,\" tulis mereka.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `b_kategori`
--
ALTER TABLE `b_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `b_user`
--
ALTER TABLE `b_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `c_konten`
--
ALTER TABLE `c_konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_user_id` (`b_user_id`),
  ADD KEY `b_kategori_id` (`b_kategori_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `b_kategori`
--
ALTER TABLE `b_kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `b_user`
--
ALTER TABLE `b_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `c_konten`
--
ALTER TABLE `c_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
