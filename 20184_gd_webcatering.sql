-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 02:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `20184_gd_webcatering`
--
CREATE DATABASE IF NOT EXISTS `20184_gd_webcatering` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `20184_gd_webcatering`;

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(8) NOT NULL,
  `online` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '127.0.0.1', '2014-03-17', 63, '1395034465'),
(2, '127.0.0.1', '2014-03-18', 53, '1395129935'),
(3, '127.0.0.1', '2014-03-22', 122, '1395493770'),
(4, '127.0.0.1', '2014-04-17', 50, '1397733464'),
(5, '127.0.0.1', '2014-04-18', 55, '1397839756'),
(6, '127.0.0.1', '2014-04-19', 26, '1397883619'),
(7, '127.0.0.1', '2014-05-28', 9, '1401282009'),
(8, '127.0.0.1', '2014-05-31', 39, '1401531874'),
(9, '127.0.0.1', '2014-06-03', 30, '1401783305'),
(10, '127.0.0.1', '2014-06-09', 12, '1402299670'),
(11, '127.0.0.1', '2014-06-18', 8, '1403092882'),
(12, '127.0.0.1', '2014-06-20', 1954, '1403269933'),
(13, '127.0.0.1', '2014-10-15', 86, '1413374159'),
(14, '127.0.0.1', '2014-10-22', 107, '1413951013'),
(15, '127.0.0.1', '2014-10-24', 3, '1414149898'),
(16, '127.0.0.1', '2014-11-04', 20, '1415070918'),
(17, '127.0.0.1', '2014-11-05', 46, '1415154829'),
(18, '127.0.0.1', '2014-11-11', 24, '1415666142'),
(19, '127.0.0.1', '2014-11-23', 35, '1416719646'),
(20, '127.0.0.1', '2015-01-02', 196, '1420215747'),
(21, '127.0.0.1', '2015-01-03', 24, '1420264639'),
(22, '127.0.0.1', '2015-01-06', 45, '1420511116'),
(23, '127.0.0.1', '2015-02-01', 271, '1422770430'),
(24, '::1', '2018-04-24', 34, '1524579295'),
(25, '::1', '2018-04-25', 275, '1524665549'),
(26, '::1', '2018-04-26', 119, '1524746279'),
(27, '::1', '2018-04-28', 154, '1524921710');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `kode_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT 'Kasir',
  PRIMARY KEY (`kode_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Super Admin'),
('ADM03', 'kasir', 'kasir', '02345678923456', 'array@a.com', 'keys.jpg', 'Super Admin'),
('ADM01', 'sa', 'sa', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE IF NOT EXISTS `tb_paket` (
  `kode_paket` varchar(15) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`kode_paket`, `nama_paket`, `deskripsi`, `harga`, `gambar`, `status`, `keterangan`) VALUES
('PKT1804003', 'Menu Buffet A', '1. NASI\r\n- Nasi Putih\r\n- Nasi Goreng Tradisional\r\n- Nasi Goreng Oriental\r\n2. SUP \r\n- Sup Bunga Melati\r\n- Sup Baso Tahu\r\n- Sup Pangsit\r\n- Sup Jamur Salju\r\n- Sup Mutiara\r\n3. DAGING/AYAM\r\n- Rolade Kombinasi\r\n- Sapi Lada Hitam\r\n- Beef Corned\r\n- Semur Bola Daging\r\n- Chicken Yakiniku\r\n- Ayam Fillet Cah Jamur\r\n- Chicken Saus Mentega\r\n- Chicken BBQ Ala Dapur Shamara\r\n4. IKAN\r\n- Ikan Kakap Fillet Saus Thailand\r\n- Ikan Kakap Fillet Saus Nanas\r\n- Ikan Kakap Fillet Ala Meuniere\r\n- Ikan Kakap Fillet Asam Manis\r\n5. CAH/SALAD\r\n- Kimlo Kering\r\n- Cah Spesial\r\n- Oseng Jagung Muda\r\n- Cah Soun Ala Thailand\r\n- Selada Pengantin\r\n- Asinan Bogor\r\n6. KERUPUK\r\n7. BUAH\r\n8. PUDING\r\n9. AIR PUTIH', 50000, 'buffetA.JPG', 'Tersedia', 'Gratis Soft Drink dan Snack untuk pesanan > 500'),
('PKT1804004', 'Menu Buffet B', '1. NASI\r\n- Nasi Putih\r\n- Nasi Goreng Tradisional\r\n- Nasi Goreng Oriental\r\n2. SUP\r\n- Sup Cocktail\r\n- Sup Oden\r\n- Sup Baso Hongkong\r\n- Sup Jamur Salju Seafood\r\n- Sup Kembang Tahu\r\n3. AYAM\r\n- Ayam FIllet Lada Hitam\r\n- Ayam Kung Pao\r\n- Chicken Roll\r\n- Ayam Cah Jamur\r\n- Chicken BBQ\r\n4. DAGING\r\n- Mongolian BBQ\r\n- Beef Roll\r\n- Beef BBQ Ala Dapur Shamara\r\n- Beef Stroganof\r\n5. IKAN\r\n- Ikan Dori Saus Thailand\r\n- Ikan Fillet Saus Leci \r\n- Ikan Kalamary Saus Tar-tar\r\n6. CAH/SALAD\r\n- Cah Brokoli Tahu\r\n- Cah Baby Buncis\r\n- Cah Pokcoy\r\n- Cah Pangsit\r\n- Oseng Sayuran Spesial\r\n- Salad Sayuran\r\n- Salad Bangkok\r\n- Asinan Bogor\r\n7. KERUPUK\r\n8. BUAH\r\n9. PUDING\r\n10. SOFT DRINK\r\n11. AIR PUTIH', 60000, 'buffetB.JPG', 'Tersedia', 'Gratis Soft Drink dan Snack untuk pesanan > 500'),
('PKT1804005', 'Menu Buffet C', '1. NASI\r\n- Nasi Putih\r\n- Nasi Goreng Tradisional\r\n- Nasi Goreng Oriental\r\n2. SUP\r\n- Sup Juan Lo\r\n- Sup Tom Yam\r\n- Sup Seafood\r\n- Sup Iga Bakar\r\n3. AYAM\r\n- Ayam BBQ Bungkus Pandan\r\n- Chicken Yakiniku\r\n- Chicken Yakitori\r\n- Chiken Taragon Sauce\r\n- Ayam Kodok Saus Putih\r\n- Steak Ayam Ala Dapur Shamara\r\n4. DAGING\r\n- Beef Wellington\r\n- Beef Steak Original Sauce\r\n- Rib Steak Tomato Sauce\r\n- Beef Steak Original Sauce\r\n- Beef Fetucine Black Pepper\r\n- Dendeng Balado\r\n5. IKAN\r\n- Fish Roll Smoke Beef\r\n- Udang Almond \r\n- Udang Telur Asin\r\n6. CAH/SALAD\r\n- Cah Brokoli Tiga Jamur\r\n- Cah Brokoli Seafood\r\n- Brokoli Jamur Sitake\r\n- Mixed Salad\r\n- Fruit Salad\r\n- Italian Salad\r\n7. KERUPUK\r\n8. BUAH\r\n9. PUDING\r\n10. FRUIT PUNCH \r\n11. AIR PUTIH', 75000, 'buffetC.JPG', 'Tersedia', 'Gratis Soft Drink dan Snack untuk pesanan > 500'),
('PKT1804006', 'Menu Tradisonal A', '1. Nasi Timbel\r\n2. Sayur Asem / Lodeh\r\n3. Empal Daging\r\n4. Ayam Panggang BB Kecap / BB Rujak Ayam Goreng Kelapa\r\n5. Oseng Cumi Cabe Ijo\r\n6. Ikan Tongkol Cue BB Comrang\r\n7. Oseng (Daun Singkong Pepaya Teri)\r\n8. Lalab + Sambal\r\n9. Rempeyek\r\n10. Buah\r\n11. Air Mineral\r\n', 55000, 'tradisionalA.JPG', 'Tersedia', 'Minimum Order 100 pax. Jika Pesanan 100 pax kena charge service Rp.500.000'),
('PKT1804007', 'Menu Tradisonal B ', '1. Nasi Timbel\r\n2. Sayur Asem / Lodeh\r\n3. Bacem Jeroan + Empal Daging\r\n4. Ayam Panggang BB Kecap / BB Rujak Ayam Goreng Kuning\r\n5. Ikan Kapas Balado, Cobek Ikan Mas\r\n6. Oseng (Daun Singkong Pepaya Teri)\r\n7. Pepes (Tahu, Jamur)\r\n8. Lalab + Sambal\r\n9. Rempeyek\r\n10. Cendol\r\n11. Buah\r\n12. Air Mineral\r\n', 60000, 'tradisionalB.JPG', 'Tersedia', 'Minimum Order 100 pax. Jika Pesanan 100 pax kena charge service Rp.500.000'),
('PKT1804008', 'Menu Tradisonal C', '1. Nasi Timbel\r\n2. Asem-asem Iga Buntut\r\n3. Empal Daging + Bacem Jeroan Campur\r\n4. Ayam Panggang BB Kecap / BB Rujak Ayam Goreng Kremes\r\n5. Cobek Ikan Mas, Gurame Bakar / Goreng Jentik\r\n6. Pepes ( Tahu, Jamur, Oncom)\r\n7. Oseng (Daun Singkong Pepaya Teri)\r\n8. Lalab + Sambal\r\n9. Rempeyek\r\n10. Buah\r\n11. Es Kelapa Muda Gula Aren\r\n12. Air Mineral', 80000, 'tradisionalC.JPG', 'Tersedia', 'Minimum Order 100 pax. Jika Pesanan 100 pax kena charge service Rp.500.000'),
('PKT1804009', 'NASI LIWET SOLO', '1. Nasi Putih Gurih\r\n2. Opor Ayam Sewir\r\n3. Ungkep Ati Ampela\r\n4. Pindang Telur  \r\n5. Sayur Pepaya\r\n6. Krupuk Kulit', 40000, 'nasiliwetsolo.JPG', 'Tersedia', ''),
('PKT1804010', 'NASI GUDEG YOGYA', '1. Nasi Putih \r\n2. Gudeg Nangka\r\n3. Opor Ayam Kering \r\n4. Sambal Krecek \r\n5. Pindang Telur\r\n6. Sambal Matang', 40000, 'nasigudegjogja.JPG', 'Tersedia', ''),
('PKT1804011', 'NASI JAMLANG', '1. Nasi Putih\r\n2. Semur Tahu\r\n3. Semur Daging\r\n4. Tempe Goreng  \r\n5. Sambal Goreng Irisan Cabe\r\n6. Sate Kentang\r\n7. Ikan Asin\r\n8. Kerupuk', 40000, 'nasijamlang.JPG', 'Tersedia', ''),
('PKT1804012', 'NASI BUNGKUS BEGANA', '1. Nasi Putih Gurih\r\n2. Dendeng Ragi\r\n3. Pindang Telur\r\n4. Orek Tempe \r\n5. Kentang Kering\r\n6. Sambal Ati\r\n7. Kerupuk', 40000, 'nasibungkusbegana.JPG', 'Tersedia', ''),
('PKT1804013', 'NASI KAPAU', '1. Nasi Putih\r\n2. Sayur Kapau\r\n3. Gulai Kikil\r\n4. Rendang Daging \r\n5. Daun Singkong\r\n6. Sambal Ijo\r\n7. Rempeyek\r\n', 40000, 'nasikapau.JPG', 'Tersedia', ''),
('PKT1804014', 'NASI PECEL', '1. Nasi Putih\r\n2. Pecel\r\n3. Bacem Tahu Tempe\r\n4. Bacem Paru\r\n5. Oseng Tempe Cabe Ijo\r\n6. Kerupuk Gendar\r\n', 40000, 'nasipecel.JPG', 'Tersedia', ''),
('PKT1804015', 'NASI LIWET PASUNDAN', '1. Nasi Liwet\r\n2. Empal Daging\r\n3. Cobek Ikan Mas\r\n4. Lalab Sambel\r\n5. Rempeyek', 40000, 'nasipasundan.JPG', 'Tersedia', ''),
('PKT1804016', 'NASI PEPES BAKAR', '1. Nasi Pepes\r\n2. Acar Mentah\r\n3. Lalab \r\n4. Sambal', 35000, 'nasipepesbakar.JPG', 'Tersedia', ''),
('PKT1804017', 'LONTONG OPOR', '1. Lontong\r\n2. Opor Ayam\r\n3. Pindang Telur\r\n4. Sambal Goreng Labu Siam\r\n5. Krecek\r\n6. Bumbu Kacang Kedelai\r\n7. Acar Mentah', 45000, 'lontongopor.jpg', 'Tersedia', ''),
('PKT1804018', 'NASI BALI', '1. Nasi Putih\r\n2. Sate Lilit\r\n3. Ayam BB Bali Sewir\r\n4. Urab\r\n5. Dendeng Ragi\r\n6. Sambel\r\n7. Rempeyek Udang', 45000, 'nasibali.JPG', 'Tersedia', ''),
('PKT1804019', 'NASI SOTO SEMARANG', '1. Nasi Putih\r\n2. Soto Ayam\r\n3. Perkedel\r\n4. Sate Kerang\r\n5. Sate Telur Puyuh\r\n6. Paru Goreng', 40000, 'nasisotosemarang.JPG', 'Tersedia', ''),
('PKT1804020', 'NASI BOX A', '1. Nasi Putih \r\n2. Ayam Woku\r\n3. Mie Goreng \r\n4. Oseng Buncis Cabe Ijo\r\n5. Kerupuk\r\n6. Air Mineral', 25000, 'nasiboxA.JPG', 'Tersedia', ''),
('PKT1804021', 'NASI BOX B', '1. Nasi Timbel \r\n2. Ayam Goreng / Bakar BB Rujak\r\n3. Ikan Asin Gabus / Ikan Combang Cabe Ijo\r\n4. Oseng Daun Singkong\r\n5. Lalab Sambel\r\n6. Rempeyek\r\n7. Buah\r\n8. Air Mineral', 30000, 'nasiboxB.JPG', 'Tersedia', ''),
('PKT1804022', 'NASI BOX C', '1, Nasi Timbel\r\n2. Empal Daging\r\n3. Ikan Balado, Oseng Ikan Asin Gabus\r\n4. Oseng Daun Singkong\r\n5. Pepes Tahu\r\n6. Sambal\r\n7. Rempeyek\r\n8. Buah / Puding Cap\r\n9. Air Mineral', 35000, 'nasiboxC.JPG', 'Tersedia', ''),
('PKT1804023', 'NASI BOX  D', '1. Nasi Putih\r\n2. Sapi Lada Hitam\r\n3. Ikan Saos Mangga\r\n4. Cah Campur\r\n5. Puding Cup\r\n6. Kerupuk\r\n7. Buah \r\n8. Air Mineral', 37500, 'nasiboxD.JPG', 'Tersedia', ''),
('PKT1804024', 'SNACK BOX A', '1. Arem - Arem\r\n2. Cheese Cake\r\n3. Lapis Beras / Lapis PP\r\n4. Aqua', 15000, 'snackboxA.JPG', 'Tersedia', ''),
('PKT1804025', 'SNACK BOX B', '1. Risoles Mayonaise\r\n2. Lemper Potong\r\n3. Pie Buah\r\n4. Cup Cake Tape\r\n5. Aqua', 17500, 'snackboxB.JPG', 'Tersedia', ''),
('PKT1804026', 'COFFE BREAK A', '1. Air Teh\r\n2. Kopi\r\n3. Susu\r\n4. Snack 2 Macam\r\n5. Keletisan', 22500, 'coffeebreakA.JPG', 'Tersedia', ''),
('PKT1804027', 'COFFE BREAK B ', '1. Air Teh \r\n2. Kopi\r\n3. Susu\r\n4. Snack 3 Macam\r\n5. Keletisan', 25000, 'coffeebreakB.JPG', 'Tersedia', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `kode_pemesanan` varchar(15) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `jam_pemesanan` time NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` text NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`kode_pemesanan`, `tgl_pemesanan`, `jam_pemesanan`, `nama_pemesan`, `email`, `telepon`, `status`, `alamat_pengiriman`, `keterangan`) VALUES
('PMS1804001', '2018-04-25', '20:07:00', 'Adam Rahmatul Pasha', 'robipradana96@gmail.com', '2147483647', 'Request', 'asds', 'sdaads'),
('PMS1804002', '2018-04-25', '20:30:30', 'Robi Pradana', 'robipradana96@gmail.com', '2147483647', 'Request', 'as', 'assa'),
('PMS1805002', '2018-05-04', '19:06:31', '', '', '0', 'Request', '', ''),
('PMS1805003', '2018-05-04', '19:10:37', 'upin', 'upin@gmail.com', '081200009999', 'Request', 'jakarta', 'sambel banyakin'),
('PMS1805004', '2018-05-04', '19:25:26', 'abal', 'abal@gmail.com', '083812121212', 'Request', 'jakarta timur', ''),
('PMS1805005', '2018-05-04', '19:43:45', 'abal', 'abal@gmail.com', '083812121212', 'Deal', 'jakarta timur', ''),
('PMS1805006', '2018-05-04', '19:49:20', 'upin', 'upin@gmail.com', '081200009999', 'Cancel', 'jakarta', 'sambel banyakin'),
('PMS1805007', '2018-05-04', '19:50:57', 'abal', 'abal@gmail.com', '083812121212', 'Confirmed', 'jakarta timur', ''),
('PMS1805008', '2018-05-04', '19:54:43', 'atik', 'atik@gmail.com', '081900009999', 'Request', 'bekasi', 'tambah pisang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_detail`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan_detail` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(15) NOT NULL,
  `kode_paket` varchar(15) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_pemesanan_detail`
--

INSERT INTO `tb_pemesanan_detail` (`id`, `kode_pemesanan`, `kode_paket`, `jumlah`, `subtotal`, `catatan`) VALUES
(3, 'PMS1804002', 'PKT1804006', 5, 275000, '-'),
(4, 'PMS1804002', 'PKT1804020', 3, 75000, '-'),
(6, 'PMS1805002', 'PKT1804027', 4, 100000, '-'),
(7, 'PMS1805001', 'PKT1804027', 100, 2500000, 'tes'),
(8, 'PMS1805002', 'PKT1804005', 8, 600000, 'Jangan pedas2'),
(9, 'PMS1805001', 'PKT1804017', 50, 2250000, 'tes'),
(10, 'PMS1805002', 'PKT1804003', 500, 25000000, 'wedding'),
(12, 'PMS1805003', 'PKT1804009', 70, 2800000, 'krupuk udang'),
(13, 'PMS1805004', 'PKT1804016', 95, 3325000, 'krupuk'),
(14, 'PMS1805004', 'PKT1804027', 95, 2375000, '-'),
(16, 'PMS1805008', 'PKT1804020', 100, 2500000, 'tambah pisang');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
