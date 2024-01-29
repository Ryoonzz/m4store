-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2024 pada 16.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_m4store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `telp_admin` varchar(20) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `telp_admin`, `email_admin`, `alamat_admin`) VALUES
(30129012, 'Achmad Deniel Reza', 'ExeGOD', 'ff5ea5b9b96b52eaf28c3f3c13be1c09', '+6281334128471', 'achmadanielreza@gmail.com', 'Mlajah, Bangkalan'),
(31100607, 'Achmad Dandy', 'RZERO', 'ff5ea5b9b96b52eaf28c3f3c13be1c09', '+6287898040539', 'achdandycr01@gmail.com', 'Jl. Kh Abd Muin, Pejagan, Bangkalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(5) NOT NULL,
  `nama_category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `nama_category`) VALUES
(10, 'Laptop'),
(11, 'Mouse'),
(12, 'Keyboard'),
(13, 'Monitor'),
(14, 'Audio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `harga_product` int(11) NOT NULL,
  `deskripsi_product` text NOT NULL,
  `gambar_product` varchar(100) NOT NULL,
  `status_produk` tinyint(1) NOT NULL,
  `tanggal_diunggah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `id_category`, `nama_product`, `harga_product`, `deskripsi_product`, `gambar_product`, `status_produk`, `tanggal_diunggah`) VALUES
(7, 10, 'Acer Aspire 3 Slim Laptop', 2999000, '<p>&bull; Processor : Intel&reg; Celeron N5100 processor<br />\r\n&bull; OS : Windows 11 Home<br />\r\n&bull; Memory : 8 GB Dual Channel Memory<br />\r\n&bull; Storage : 512 GB SSD NVMe<br />\r\n&bull; Inch, Res, Ratio, Panel : 14&quot; Full HD (1920 x 1080), Acer ComfyView<br />\r\n&bull; Graphics : Intel&reg; UHD Graphics<br />\r\n&bull; Features : Upgradeable Memory, Dual Storage Support, HD Camera</p>\r\n', 'produk1706435726.webp', 1, '2024-01-28 09:55:26'),
(8, 10, 'Nitro V 15 (ANV15-51) | Core i5 RTX2050', 10999000, '<p>&bull; Processor : Intel&reg; Core&trade; i5-13420H processor (12MB cache, up to 4.60Ghz)<br />\r\n&bull; OS : Windows 11 Home<br />\r\n&bull; Memory : 1*8GB DDR5<br />\r\n&bull; Storage : 512GB SSD NVMe<br />\r\n&bull; Inch, Res, Ratio, Panel : 15.6&quot; FHD LED IPS 144Hz<br />\r\n&bull; Graphics : NVIDIA&reg; GeForce&reg; RTX 2050 with 4GB of GDDR6</p>\r\n', 'produk1706435772.webp', 1, '2024-01-28 09:56:12'),
(9, 10, 'Acer Swift 3 Now Ultrathin Laptop', 11999000, '<p>&bull; Processor : Intel&reg; Core&trade; i5-1240P processor (Intel Evo Certified)<br />\r\n&bull; OS : Windows 11 Home<br />\r\n&bull; Memory : 16 GB LPDDR4X Dual Channel Memory<br />\r\n&bull; Storage : 512 GB SSD NVMe Gen4 (2 slot)<br />\r\n&bull; Inch, Res, Ratio, Panel : 14&rdquo; QHD (2560 x 1440), IPS 100% sRGB, Acer ComfyView<br />\r\n&bull; Graphics : Intel Iris Xe Graphics (80 EU)<br />\r\n&bull; Features : Wifi 6E, FHD Camera, Acer PurifiedVoice (Noise Cancellation)</p>\r\n', 'produk1706435851.webp', 1, '2024-01-28 09:57:31'),
(10, 11, 'Predator Cestus 335', 1299000, '<p>&bull; 2,000Hz polling rate (400 IPS, 0.5ms, 50g acceleration)<br />\r\n&bull; 5 dpi shift levels (up to 19000 dpi scrolling rate)<br />\r\n&bull; PixArt 3370 optical sensor<br />\r\n&bull; Hybrid scroll wheel and button<br />\r\n&bull; 16.8 million RGB colors; 10 programmable buttons; 5 customizable profile settings</p>\r\n', 'produk1706435975.webp', 1, '2024-01-28 09:59:35'),
(11, 13, 'Monitor ThinkVision P34w-20', 1940000, '<ul>\r\n	<li>34&quot; Monitor</li>\r\n	<li>Resolusi tinggi</li>\r\n	<li>Warna untuk Profesional</li>\r\n	<li>Perlindungan Mata</li>\r\n</ul>\r\n', 'produk1706436240.webp', 1, '2024-01-28 10:04:00'),
(12, 12, 'HyperX Alloy Elite 2 - Mechanical Gaming Keyboard ', 2090000, '<ul>\r\n	<li>HyperX Mechanical Switches[1] &amp; Pudding Keycaps</li>\r\n	<li>Signature light bar &amp; dynamic RGTB lighting effects</li>\r\n	<li>Dedicated media keys and large volume wheel</li>\r\n	<li>With 2 Year Manufacturer Warranty</li>\r\n</ul>\r\n', 'produk1706436546.avif', 1, '2024-01-28 10:09:06'),
(13, 14, 'HyperX Cloud II Wireless - Gaming Headset (Black-R', 2490000, '<ul>\r\n	<li>Gaming-grade wireless with long battery life</li>\r\n	<li>53mm drivers deliver immersive audio</li>\r\n	<li>Signature HyperX comfort</li>\r\n</ul>\r\n', 'produk1706436712.avif', 1, '2024-01-28 10:11:52'),
(14, 14, 'HyperX Cloud Alpha S - Gaming Headset (Black-Blue)', 1550000, '<ul>\r\n	<li>HyperX Dual Chamber Drivers</li>\r\n	<li>Bass adjustment sliders to personalize your sound</li>\r\n	<li>Game and chat audio balance</li>\r\n	<li>With 2 Year Warranty</li>\r\n</ul>\r\n', 'produk1706438317.avif', 1, '2024-01-28 10:38:37'),
(15, 12, 'OMEN by HP Keyboard 1100', 2000000, '<ul>\r\n	<li>Master-class mechanical switches</li>\r\n	<li>Dedicated LED for every keys that glows a deep red</li>\r\n	<li>Durable braided USB cord</li>\r\n	<li>2-way adjustable legs</li>\r\n	<li>Dimensions : 17.7 x 5.9 x 1.56 in</li>\r\n	<li>Weight : 0.99 kg</li>\r\n	<li>With 1 Year Limited Warranty</li>\r\n</ul>\r\n', 'produk1706438440.avif', 0, '2024-01-28 10:40:40'),
(16, 13, 'Monitor Lenovo T34w-30', 1440000, '<ul>\r\n	<li>34&quot; Monitor</li>\r\n	<li>Hampir Tak Bertepi</li>\r\n	<li>Produktivitas Luar Biasa</li>\r\n	<li>Ergonomis</li>\r\n</ul>\r\n', 'produk1706439007.png', 1, '2024-01-28 10:50:07'),
(17, 11, 'Predator Cestus 510 Gaming Mouse', 1080000, '<ul>\r\n	<li>Dual Omron&reg; Switches offer a total of 70M (50M + 20M) clicks</li>\r\n	<li>Up to 16000 DPI and 400 IPS (inches/second)</li>\r\n	<li>Detachable top cover &amp; side panel</li>\r\n	<li>16.8M RGB color options and 8 different lighting patterns</li>\r\n	<li>Customise lighting, 8 buttons, and more via Predator Quartermaster&nbsp;</li>\r\n</ul>\r\n', 'produk1706439094.webp', 1, '2024-01-28 10:51:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31100608;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
