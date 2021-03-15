-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2020 at 07:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14959968_crudlya`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`id`, `kode`, `nama`) VALUES
(3, 'jne', 'JNE'),
(4, 'pos', 'POS'),
(5, 'tiki', 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(5, 'Speaker', 'speaker'),
(6, 'Car Accecoris', 'car-accecoris'),
(7, 'Double Din', 'double-din');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_kustomer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_order` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `kurir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) DEFAULT NULL,
  `resi` int(11) DEFAULT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `user_id`, `nama_kustomer`, `alamat`, `telpon`, `email`, `status_order`, `kota`, `subtotal`, `ongkir`, `kurir`, `total`, `resi`, `tgl_order`) VALUES
(1, 5, 'qwe', 'qwe', '0879090', 'qwe@qwe.com', 'Diterima', 'sleman', 2230000, 10000, 'jne', 2240000, 0, '2020-09-21'),
(2, 5, 'qwe', 'qwe', '08790', 'qwe@qwe.com', 'Pending', 'sleman', 80000, 10000, 'jne', 90000, 0, '2020-09-21'),
(3, 0, 'Muda', 'Kp Gebang, Cimone, Tangerang', '0892342210', 'muda.p@gmail.com', 'Pending', 'Tangeran', 65000, 25000, 'jne', 90000, 0, '2020-09-22'),
(4, 5, 'Muda', 'Kp Gebang, Cimone, Tangerang', '0892342210', 'muda.p@gmail.com', 'Menunggu Konfirmasi', 'Tangeran', 65000, 25000, 'jne', 90000, 0, '2020-09-22'),
(5, 5, 'Tri W', 'Kasihan, Bantul, Yogyakarta', '0897655471', 'tri.w@gmail.com', 'Pending', 'Bantul', 110000, 10000, 'JNE', 120000, 0, '2020-09-24'),
(6, 5, 'Tri W', 'Kasihan, Bantul, Yogyakarta', '089723145643', 'tri.w@gmail.com', 'Dikirim', 'Bantul', 110000, 10000, 'JNE', 120000, 987899890, '2020-09-24'),
(7, 5, 'Tri W', 'Kasihan, Bantul, Yogyakarta', '0892342210', 'tri.w@gmail.com', 'Dikirim', 'Bantul', 110000, 10000, 'JNE', 120000, 987890, '2020-09-24'),
(8, 5, 'Tri Wahyuningsih', 'bangka belitung, indonesia', '0892342210', 'tri.w@gmail.com', 'Diterima', 'Bangka', 210000, 38000, 'jne', 248000, 998987765, '2020-09-25'),
(9, 5, 'muda bambang', 'Kp Gebang, Cimone, Tangerang, Banten', '089765671234', 'bambang.m@gmail.com', 'Proses', 'Tangerang', 65000, 14000, 'jne', 79000, NULL, '2020-09-28'),
(10, 5, 'muda bambang', 'kacangan, todanan, blora, jawa tengah', '0892342210', 'muda.p@gmail.com', 'Diterima', 'Blora', 210000, 16000, 'jne', 226000, 998987765, '2020-10-01'),
(11, 5, 'muda bambang', 'uluwatu, badung, bali', '0892342210', 'muda.p@gmail.com', 'Dikirim', 'Badung', 210000, 20000, 'jne', 230000, 123, '2020-10-02'),
(12, 5, 'muda bambang', 'uluwatu, badung, bali', '0892342210', 'muda.p@gmail.com', 'Dikirim', 'Badung', 65000, 26000, 'jne', 91000, 998987765, '2020-10-02'),
(13, 3, 'muda bambang', 'uluwatu, badung, bali', '0892342210', 'muda.p@gmail.com', 'Pending', 'Badung', 210000, 26000, 'jne', 236000, NULL, '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` double DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `subberat` double DEFAULT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `orders_id`, `produk_id`, `harga_produk`, `berat_produk`, `jumlah`, `subberat`, `subtotal`) VALUES
(1, 1, 19, 20000, 1, 1, 1, 20000),
(2, 1, 10, 700000, 2, 3, 6, 2100000),
(3, 1, 26, 110000, 1, 1, 1, 110000),
(4, 2, 24, 15000, 1, 1, 1, 15000),
(5, 2, 25, 65000, 1, 1, 1, 65000),
(6, 3, 25, 65000, 1, 1, 1, 65000),
(7, 4, 25, 65000, 1, 1, 1, 65000),
(8, 5, 26, 110000, 1, 1, 1, 110000),
(9, 6, 26, 110000, 1, 1, 1, 110000),
(10, 7, 26, 110000, 1, 1, 1, 110000),
(11, 8, 27, 210000, 1, 1, 1, 210000),
(12, 9, 25, 65000, 1, 1, 1, 65000),
(13, 10, 27, 210000, 1, 1, 1, 210000),
(14, 11, 27, 210000, 1, 1, 1, 210000),
(15, 12, 25, 65000, 1, 1, 1, 65000),
(16, 13, 27, 210000, 1, 1, 1, 210000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `order_id`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'qwe', '092376', 2240000, '2020-09-21', '20200921162649bukti-1.jpg'),
(2, 4, 'muda bambang', 'BRI', 90000, '2020-09-22', '20200922142011bukti-4.jpg'),
(3, 7, 'Tri Wahyuningsih', 'BRI 00862345878689001', 120000, '2020-09-24', '20200924140708bukti-7.jpg'),
(4, 7, 'Tri Wahyuningsih', 'BRI 00862345878689001', 120000, '2020-09-24', '20200924141457bukti-7.jpg'),
(5, 6, 'Tri Wahyuningsih', 'BRI 00862345878689001', 12000, '2020-09-24', '20200924141843bukti-6.jpg'),
(6, 8, 'Tri Wahyuningsih', 'BRI 00862345878689001', 248000, '2020-09-25', '20200925125520bukti-8.jpg'),
(7, 9, 'muda bambang', 'BRI 00862345878689001', 79000, '2020-09-28', '20200928121527bukti-9.jpg'),
(8, 10, 'muda bambang', 'BRI 00862345878689001', 226000, '2020-10-01', '20201001135843bukti-10.jpg'),
(9, 11, 'muda bambang', 'BRI 00862345878689001', 230000, '2020-10-02', '20201002000343bukti-11.jpg'),
(10, 12, 'muda bambang', 'BRI 00862345878689001', 91000, '2020-10-02', '20201002032216bukti-12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` double(8,2) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_id`, `nama_produk`, `slug_produk`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `status`) VALUES
(3, 7, 'Soundstream picasso P4.800', 'Soundstream', 'Amplifier Class: A/B, Number Of Channels: 4, RMS Power Range : 125-400 Watts', 2200000, 1, 3.00, '2020-01-19', '20200213125315picasso.jpg', 'Baru'),
(4, 5, 'Crescendo opus', 'crescendo-opus', 'Tweeter is using sturdy 6061 aluminium housing for less distortion. Tweeter flange curve design is patented. It acts as a guide horn to improve detail of sound. Tweeter diameter is smaller than 2010 product for improved flexibility and driving visibility.', 1550000, 1, 3.00, '2020-02-07', '20200213124820opus.jpg', 'Baru'),
(5, 5, 'Dobledin android', 'dobledin-android', 'Processor quadcore android 8, Suport wifi & GPS', 1500000, 5, 1.00, '2020-02-13', '20200213123614dbandroid.jpg', 'Baru'),
(6, 5, 'New old stock Cyber Audio ', 'old-stock-Cyber-Audio ', 'Doble coil, Doble magnet, 750 watt', 1600000, 3, 2.00, '2020-02-13', '20200213125907caudio.jpg', 'Baru'),
(7, 5, 'New Old Stock Audiobahn', 'Old-Stock-Audiobahn', 'Singel coil, Magnet 80 OZ, 300watt, Doble magnit', 2250, 4, 3.00, '2020-02-13', '20200213130145Audiobahn.jpg', 'Baru'),
(8, 7, '4 chanel venom virus ', '4 chanel venom virus ', '1000watt, Front LPF-FULL-HPF, Rear LPF-FULL-HPF, Input lowãƒ¼hight', 1100000, 5, 2.00, '2020-02-13', '20200213131204venomvirus.jpg', 'Baru'),
(9, 7, 'Dobledin layar slide ', 'Dobledin-layar-slide ', '7 inch with db meters, - TV - Radio - Usb -SD card memori -DVD - aux audio/video', 700000, 1, 5.00, '2020-02-13', '20200213131527Dobledin layar slide 7.jpg', 'Bekas'),
(10, 5, 'Dobledin 7 inch MP5 ', 'Dobledin-7inch --MP5 ', 'Fitur dobledin USB,MMC.AUX IN,Mirror link,bluetooth,radio, layar LED full HD 1080p, Fitur kamera belakang di dukung dengan lampu LED', 700000, 0, 2.00, '2020-02-13', '20200213133136Dobledin 7 inch MP5.jpg', 'Baru'),
(11, 5, 'JVC victory japan', 'JVC-victory-japan', '12 inch 1 x 4 ohm 500watt', 400000, 1, 3.00, '2020-02-13', '20200213133413JVC victory.jpg', 'Bekas'),
(12, 5, 'Skeleton tengkorak SKT S300', 'skeleton-tengkorak-skt-s300', 'Doble voice coil, 12 inch, 2 x 4 ohm, 1 x  ohm, 1 x 8 ohm', 900000, 2, 4.00, '2020-02-13', '20201002121125', 'Baru'),
(13, 5, 'Kenwood 12 inch', 'Kenwood-12-inch', 'doble magnet, singel coil 4 ohm, Made in vietnam', 1300000, 2, 4.00, '2020-02-13', '20200213140044Kenwood.jpg', 'Baru'),
(14, 6, 'Sandisk Cruzer Blade Flashdisk 16GB', 'Sandisk-Cruzer-Blade-Flashdisk-16GB', 'Operating temperature: 32â€™F~113â€™F (0â€™C~45â€™C); Storage temperature: 50â€™F~158â€™F (-10â€™C~70â€™C); Compatibility: USB 3.0 and USB 2.0; OS supported: Windows 98 / ME / 2000 / XP / Vista / 7 / 8; Macintosh OS 9.x or later; Linux Kernel 2.4.x or later', 1100000, 6, 1.00, '2020-02-13', '20200213141516sandisk2.jpeg', 'Baru'),
(15, 5, 'V-GEN Flashdisk 16GB', 'V-GEN-Flashdisk-16GB', 'Kapasitas: 8GB 16GB 32GB, Dimensi: 26 x 13 x 4 mm, Kecepatan: Read 19.36 MBPS, Write 8.97 MBPS', 85000, 5, 1.00, '2020-02-13', '20200213143706vgem.jpeg', 'Baru'),
(16, 6, 'Audio Jack 2,5 Meter', 'Audio-Jack-2.5Meter', 'Merk Hardquest', 20000, 8, 1.00, '2020-02-13', '20200213145117kabel.jpeg', 'Baru'),
(17, 6, 'Bluetooth Wireless Music Reciver', 'Bluetooth-Wireless-Music', 'powered by USB, 3.5 mm audio port', 20000, 5, 1.00, '2020-02-13', '20200213145916bt music.jpeg', 'Baru'),
(18, 6, 'LED Daytime Running Light', 'LED-Daytime-Running-Light', 'Type Lampu : DRL ( Daytime Running Light ) - Arus : DC 12V - Daya : 6W - Energy Saving - Ukuran : ( Panjang 17 cm ) ( Lebar 1,5 cm ) - 100% Waterproof - Desaign : Simple', 35000, 8, 1.00, '2020-02-13', '20200213150448lampu led.jpeg', 'Baru'),
(19, 6, 'Kabel Budi Micro 012 Mini', 'Kabel-Budi-Micro-012-Mini', 'Charge, Sync kabel', 20000, 8, 1.00, '2020-02-13', '20200213151718budi.jpeg', 'Baru'),
(20, 6, 'Antena DXX N1508', 'Antena-DXX-N1508', 'The Antenna Can be installed On any type of vehicle Supply Voltage : DC12V(8.5-12V) Mini Earthing Power Supply fuse : 1 A Lengh of the cord : 6 M Booster Gain (dB) : FM/VHF : 24-18 ; UHF : 17-11', 80000, 4, 1.00, '2020-02-13', '20200213152120antena.jpeg', 'Baru'),
(21, 6, 'Dummy Towing Hook Model Tempel', 'Dummy-Towing-Hook-Model-Tempel', 'aterial ABS. Pilihan warna : - merah Towing ini hanya sebagai dummy/variasi, tidak bisa berfungsi sebagai towing hook yg seharusnya.', 65000, 5, 1.00, '2020-02-13', '20200213152430dummy.jpeg', 'Baru'),
(22, 6, 'Towing Strap SPARCO Mobil JDM Style Tali Kain Derek Car Tow Strap', 'Towing-Strap-SPARCO ', 'ype : Towing Strap Merk / Motif : SPARCO Warna: HITAM Kualitas Terbaik Bahan : Kain Kuat, Tidak Mudah Sobek Mobil : Universal', 20000, 9, 1.00, '2020-02-13', '20200213152739strap.jpeg', 'Baru'),
(23, 5, 'Towing Hook Kuning', 'Towing-Hook-Kuning', 'gantungan tangan busway, biasa buat variais truk', 400000, 6, 1.00, '2020-02-13', '20200213153248towing kuning.jpeg', 'Baru'),
(24, 5, 'Kabel OTG Mobile Phone', 'Kabel-OTG-Mobile-Phone', '- Panjang kabel : 8 cm - Koneksi : microUSB ke standard USB - Support untuk semua smartphone dengan micro USB yang mendukung USB On-The-Go.', 15000, 5, 1.00, '2020-02-13', '20200213154519otg.jpeg', 'Baru'),
(25, 5, 'Car Charger', 'car-charger', 'Prolink PCC23301 33W 2-Port Car Charger with IntelliSense Qualcomm Quick Charge 3.0, USB Type-C, IntelliSense, 33W total charging output, Advanced Protection', 65000, 9, 1.00, '2020-02-13', '20200928145027car charger.jpg', 'Baru'),
(26, 5, 'Kingston Flasdisk 16 GB', 'kingston-flasdisk-16-gb', 'Flashdisk kingston 16GB', 110000, 10, 1.00, '2020-02-13', '20200928145131flasdisk kingstone.jpg', 'Baru'),
(27, 5, 'New FX 2000 Jett', 'new-fx-2000-jett', 'Anti Storing NEW FX~2000 JET. Auto Noise Filter. Daya : 6 ~ 24 Volt , 20 Amp', 210000, 6, 1.00, '2020-02-01', '20201001140228new fx 200.jpg', 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `username`, `no_hp`, `alamat`, `password`, `level`) VALUES
(3, NULL, 'admin', 'admin', NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(5, NULL, 'bambang', 'bambang', '0897653241657', 'kacangan, todanan, blora, jawa tengah', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'user'),
(7, NULL, 'alika', 'alikaram', NULL, NULL, 'edc8e32c4b6e86395a78e01e392199b8', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
