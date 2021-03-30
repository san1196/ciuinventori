-- --------------------------------------------------------
-- Host:                         127.0.0.10
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ciuinventori
CREATE DATABASE IF NOT EXISTS `ciuinventori` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ciuinventori`;

-- Dumping structure for table ciuinventori.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(20) NOT NULL,
  `id_pengadaan` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `code_barang` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jenis_barang` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `serial_number` varchar(35) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `tanggal_beli` varchar(25) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `status_barang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.barang: ~35 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id_barang`, `id_pengadaan`, `id_user`, `code_barang`, `kategori`, `nama_barang`, `jenis_barang`, `keterangan`, `serial_number`, `merk`, `tanggal_beli`, `harga_beli`, `status_barang`) VALUES
	('BI00001', 'PDN00001', 'PG00002', '58780001', 'Elektronik', 'Printer HP', 'Tidak Habis Pakai (5 Tahun)', 'new', 'FT5658HKI789797H', 'HP', '07-16-2019', '2500000', 'Beli'),
	('BI00002', 'PDN00004', 'PG00002', '58780004', 'Laptop', 'Laptop Acer', 'Tidak Habis Pakai (5 Tahun)', 'new', '678HGJJ75876786', 'Acer', '07-16-2019', '5600000', 'Beli'),
	('BI00003', 'PDN00010', 'PG00004', '58780010', 'Laptop', 'Macbook Pro air', 'Tidak Habis Pakai (5 Tahun)', 'baru', 'G678689GHG676', 'Apple', '07-16-2019', '22300000', 'Beli'),
	('BI00004', 'PDN00004', 'PG00002', '58780004', 'Laptop', 'Laptop Acer', 'Tidak Habis Pakai (5 Tahun)', 'baru', 'TXF789890GJ897', 'Acer', '07-16-2019', '5600000', 'Beli'),
	('BI00005', 'PDN00009', 'PG00002', '58780009', 'PC', 'PC Asus', 'Tidak Habis Pakai (5 Tahun)', 'baru ya', 'FJG657648CXX768', 'asus', '07-17-2019', '12000000', 'Beli'),
	('BI00006', 'PDN00015', '-', '58780015', 'PC', 'Mouse', 'Habis Pakai', 'Pembelian Bulan Juli untuk stock Marketing', 'GF6765GFH56586', 'M-Tech', '07-23-2019', '100000', 'Beli'),
	('BI00007', 'PDN00007', '-', '58780007', 'PC', 'Memory 4GB DDR 3', 'Habis Pakai', 'baru', 'HJFKH975698696', 'kingston', '08-18-2019', '500000', 'Beli'),
	('BI00008', 'PDN00007', '-', '58780007', 'PC', 'Memory 4GB DDR 3', 'Tidak Habis Pakai (5 tahun)', 'new', 'FFJU6758585875', 'kingston', '08-18-2019', '500000', 'Beli'),
	('BI00009', 'PDN00009', '-', '58780009', 'PC', 'PC Asus', 'Tidak Habis Pakai (5 tahun)', 'new guys', 'FH56789YHJB67586', 'asus', '08-18-2019', '12000000', 'Beli'),
	('BI00010', 'PDN00009', '-', '58780009', 'PC', 'PC Asus', 'Tidak Habis Pakai (5 tahun)', 'new', 'dhfdh47475875', 'asus', '08-18-2019', '12000000', 'Rental'),
	('BI00011', 'PDN00007', '-', '58780007', 'PC', 'Memory 4GB DDR 3', 'Tidak Habis Pakai (5 tahun)', 'new guys', 'FHJ56746754757', 'kingston', '08-19-2019', '500000', 'Beli'),
	('BI00012', 'PDN00002', '--', '58780002', 'Monitor', 'Monitor Acer', 'Tidak Habis Pakai (5 tahun)', 'monitor baru', '567GHJGJHGJ6578', 'acer', '08-19-2019', '1200000', 'Rental [Returned]'),
	('BI00013', 'PDN00015', '--', '58780015', 'PC', 'Mouse', 'Habis Pakai', 'mouse guys', 'xx56757', 'asus', '08-19-2019', '100000', 'Rental [Returned] [R'),
	('BI00014', 'PDN00007', '-', '58780007', 'PC', 'Memory 4GB DDR 3', 'Habis Pakai', 'ram baru ya', 'DH56758', 'vgen', '08-19-2019', '500000', 'Beli'),
	('BI00015', 'PDN00004', '-', '58780004', 'Laptop', 'Laptop Acer', 'Tidak Habis Pakai (5 tahun)', 'laptop siapa nih', 'GJG675778FFJ', 'acer', '08-19-2019', '5600000', 'Beli'),
	('BI00016', 'PDN00012', '-', '58780012', 'PC', 'Keyboard Asus', 'Tidak Habis Pakai (5 tahun)', 'ok mantap', 'XXX', 'asus', '08-26-2019', '150000', 'Rental'),
	('BI00017', 'PDN00016', '-', '58780016', 'Laptop', 'Laptop', 'Tidak Habis Pakai (5 tahun)', 'sip gan', 'XXXX', 'acer', '08-28-2019', '6700000', 'Rental'),
	('BI00018', 'PDN00011', '-', '58780011', 'PC', 'Mouse Asus', 'Habis Pakai', 'ok gan sedot', 'xxxxxxxxxxxxxx', 'asus', '08-09-2019', '80000', 'Beli'),
	('BI00019', 'PDN00001', '-', '58780001', 'PC', 'Printer HP', 'Tidak Habis Pakai (5 tahun)', 'printer baru nih', 'xxxxxx', 'hp', '08-22-2019', '2500000', 'Beli'),
	('BI00020', 'PDN00002', 'PG00002', '58780002', 'Monitor', 'Monitor Acer', 'Tidak Habis Pakai (5 tahun)', 'mantap guys', 'xx', 'acer', '08-20-2019', '1200000', 'Beli'),
	('BI00021', 'PDN00005', '-', '58780005', 'PC', 'Keyboard Logitech', 'Tidak Habis Pakai (5 tahun)', 'okokokok', 'xxxxxxx', 'logitech', '08-23-2019', '120000', 'Beli'),
	('BI00022', 'PDN00016', '-', '58780016', 'Laptop', 'Laptop', 'Tidak Habis Pakai (5 tahun)', 'sip mantap', 'ppppp', 'apple', '08-16-2019', '6700000', 'Beli'),
	('BI00023', 'PDN00002', '-', '58780002', 'Monitor', 'Monitor Acer', 'Tidak Habis Pakai (5 tahun)', 'tes aja', 'yutuytt', 'acer', '08-17-2019', '1200000', 'Beli'),
	('BI00024', 'PDN00012', '-', '58780012', 'PC', 'Keyboard Asus', 'Tidak Habis Pakai (5 tahun)', 'hgyuguguygugugugug', 'auahgelap', 'acer', '08-19-2019', '150000', 'Beli'),
	('BI00025', 'PDN00005', '-', '58780005', 'PC', 'Keyboard Logitech', 'Tidak Habis Pakai (5 tahun)', 'yjfyufuyfuyf', 'fyfyugf', 'kingston', '08-23-2019', '120000', 'Beli'),
	('BI00026', 'PDN00012', '-', '58780012', 'PC', 'Keyboard Asus', 'Tidak Habis Pakai (5 tahun)', 'jguyguytguytguy', 'hfthfhtg', 'asus', '08-17-2019', '150000', 'Beli'),
	('BI00027', 'PDN00011', '-', '58780011', 'PC', 'Mouse Asus', 'Tidak Habis Pakai (5 tahun)', 'mouse', 'ghffjfjufu', 'asus', '08-10-2019', '80000', 'Beli'),
	('BI00028', 'PDN00001', '-', '58780001', 'PC', 'Printer HP', 'Tidak Habis Pakai (5 tahun)', 'kjuihuihiuh', 'uihiuhiu', 'oihohogh', '08-09-2010', '2500000', 'Beli'),
	('BI00029', 'PDN00021', '-', '58780021', 'PC', 'Printer HP Complete', 'Tidak Habis Pakai (5 tahun)', 'new', 'hjff7856858758ghgjh', 'HP', '09-09-2019', '1200000', 'Beli'),
	('BI00030', 'PDN00023', '-', '58780023', 'Monitor', 'TV', 'Tidak Habis Pakai (5 tahun)', 'baru coy', '6785fjgfjgf78568', 'Samsung', '09-09-2019', '3000000', 'Beli'),
	('BI00031', 'PDN00012', '-', '58780012', 'PC', 'Keyboard Asus', 'Tidak Habis Pakai (5 tahun)', 'baru nich', 'fjhgj789769vjhfj', 'asus', '09-23-2019', '150000', 'Beli'),
	('BI00032', 'PDN00001', '-', '58780001', 'PC', 'Printer HP', 'Habis Pakai', 'print aja', '68gjhgj96879696', 'hp', '09-24-2019', '2500000', 'Beli'),
	('BI00033', '-', '-', '-', 'Laptop', 'Laptop Gaming', 'Tidak Habis Pakai (5 tahun)', 'barang baru coyyy', '5678678hjjhgjggk7887689', 'Asus', '09-25-2019', '10000000', 'Beli'),
	('BI00034', '-', '-', '-', 'PC', 'Kabel Roll', 'Habis Pakai', 'kabel aja', '689ghjg786868', 'King', '09-24-2019', '70000', 'Beli'),
	('BI00035', '-', '-', '-', 'PC', 'Printer Kuat', 'Habis Pakai', 'tinta aja', 'gjh876786', 'hp', '09-25-2019', '150000', 'Rental'),
	('BI00036', '-', '-', '-', 'Laptop', 'Macbook Kuat', 'Tidak Habis Pakai (5 tahun)', 'sipp', '68ugfugfu', 'apple', '09-25-2019', '5000000', 'Rental');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.helpdesk
CREATE TABLE IF NOT EXISTS `helpdesk` (
  `id_helpdesk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `kategori_ot` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `id_user` varchar(30) NOT NULL,
  `last_update` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_tempo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_helpdesk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.helpdesk: ~0 rows (approximately)
/*!40000 ALTER TABLE `helpdesk` DISABLE KEYS */;
/*!40000 ALTER TABLE `helpdesk` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.pelelangan
CREATE TABLE IF NOT EXISTS `pelelangan` (
  `id_lelang` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `namabrg_lelang` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `tgl_lelang` varchar(20) NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `hrg_stlh_penyusutan` bigint(20) NOT NULL,
  `status_lelang` varchar(15) NOT NULL,
  `harga_penawaran` bigint(20) NOT NULL,
  `status_barang_lelang` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  PRIMARY KEY (`id_lelang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.pelelangan: ~28 rows (approximately)
/*!40000 ALTER TABLE `pelelangan` DISABLE KEYS */;
INSERT INTO `pelelangan` (`id_lelang`, `id_barang`, `namabrg_lelang`, `tanggal`, `tgl_lelang`, `harga_awal`, `hrg_stlh_penyusutan`, `status_lelang`, `harga_penawaran`, `status_barang_lelang`, `id_user`, `jam_mulai`, `jam_selesai`) VALUES
	('PL00001', 'BI00001', 'Printer HP', '07-16-2024', '-', 2500000, 1458333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00002', 'BI00002', 'Laptop Acer', '07-16-2024', '-', 5600000, 3266666, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00003', 'BI00003', 'Macbook Pro air', '07-16-2024', '-', 22300000, 13008333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00004', 'BI00004', 'Laptop Acer', '07-16-2024', '-', 5600000, 3266666, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00005', 'BI00005', 'PC Asus', '07-17-2024', '25-09-2019', 12000000, 7000000, 'Dilelang', 7200000, 'Lelang', 'PG00002', '22:56:00', '22:59:00'),
	('PL00006', 'BI00006', 'Mouse', '07-23-2024', '-', 100000, 58333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00007', 'BI00007', 'Memory 4GB DDR 3', '-', '-', 500000, 0, 'Diundi', 0, 'Undian', '-', '00:00:00', '00:00:00'),
	('PL00008', 'BI00008', 'Memory 4GB DDR 3', '08-18-2024', '-', 500000, 291667, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00009', 'BI00009', 'PC Asus', '08-18-2024', '-', 12000000, 7000000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00010', 'BI00011', 'Memory 4GB DDR 3', '08-19-2024', '-', 500000, 291667, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00011', 'BI00014', 'Memory 4GB DDR 3', '-', '-', 500000, 0, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00012', 'BI00015', 'Laptop Acer', '08-19-2024', '-', 5600000, 3266667, 'Diundi', 0, 'Undian', '-', '00:00:00', '00:00:00'),
	('PL00013', 'BI00018', 'Mouse Asus', '-', '-', 80000, 0, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00014', 'BI00019', 'Printer HP', '08-22-2019', '-', 2500000, 1458333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00015', 'BI00020', 'Monitor Acer', '', '-', 1200000, 700000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00016', 'BI00021', 'Keyboard Logitech', '', '-', 120000, 70000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00017', 'BI00022', 'Laptop', '08-16-2019', '-', 6700000, 3908333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00018', 'BI00023', 'Monitor Acer', '', '-', 1200000, 700000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00019', 'BI00024', 'Keyboard Asus', '01-01-1975', '-', 150000, 87500, 'Diundi', 0, 'Undian', '-', '00:00:00', '00:00:00'),
	('PL00020', 'BI00025', 'Keyboard Logitech', '', '-', 120000, 70000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00021', 'BI00026', 'Keyboard Asus', '08-17-2024', '-', 150000, 87500, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00022', 'BI00027', 'Mouse Asus', '08-10-2024', '24-09-2019', 80000, 46667, 'Dilelang', 46667, 'Lelang', '-', '23:15:00', '23:25:00'),
	('PL00023', 'BI00028', 'Printer HP', '08-09-2015', '25-09-2019', 2500000, 1458333, 'Dilelang', 1670000, 'Lelang', 'PG00004', '22:40:00', '22:45:00'),
	('PL00024', 'BI00029', 'Printer HP Complete', '09-09-2024', '25-09-2019', 1200000, 700000, 'Dilelang', 752000, 'Lelang', 'PG00002', '22:46:00', '22:50:00'),
	('PL00025', 'BI00030', 'TV', '09-09-2024', '-', 3000000, 1750000, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00026', 'BI00031', 'Keyboard Asus', '09-23-2024', '-', 150000, 87500, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00027', 'BI00032', 'Printer HP', '-', '-', 2500000, 0, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00028', 'BI00033', 'Laptop Gaming', '09-25-2024', '-', 0, 5833333, '-', 0, '-', '-', '00:00:00', '00:00:00'),
	('PL00029', 'BI00034', 'Kabel Roll', '-', '-', 0, 0, '-', 0, '-', '-', '00:00:00', '00:00:00');
/*!40000 ALTER TABLE `pelelangan` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.pemenang
CREATE TABLE IF NOT EXISTS `pemenang` (
  `Id_pemenang` int(20) NOT NULL AUTO_INCREMENT,
  `Nomor_pemenang` varchar(100) NOT NULL,
  `Nama_pemenang` varchar(20) NOT NULL,
  `Hadiah` varchar(100) NOT NULL,
  `Tanggal` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_pemenang`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.pemenang: 3 rows
/*!40000 ALTER TABLE `pemenang` DISABLE KEYS */;
INSERT INTO `pemenang` (`Id_pemenang`, `Nomor_pemenang`, `Nama_pemenang`, `Hadiah`, `Tanggal`) VALUES
	(3, '20120501', 'Teguh Restu', 'Laptop Acer', '08-25-2019'),
	(4, '20190709', 'Aldi', 'Memory 4GB DDR 3', '08-25-2019'),
	(5, '20190301', 'Anas', 'Keyboard Asus', '09-10-2019');
/*!40000 ALTER TABLE `pemenang` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` varchar(50) NOT NULL DEFAULT '',
  `id_user` varchar(50) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(50) NOT NULL DEFAULT '',
  `jenis_barang` varchar(50) NOT NULL DEFAULT '',
  `tanggal_pinjam` varchar(50) NOT NULL DEFAULT '',
  `tanggal_digunakan` varchar(50) NOT NULL DEFAULT '',
  `waktu_peminjaman` varchar(50) NOT NULL DEFAULT '',
  `keperluan` varchar(50) NOT NULL DEFAULT '',
  `lokasi` varchar(50) NOT NULL DEFAULT '',
  `lokasi_ext` varchar(50) NOT NULL DEFAULT '',
  `tanggal_penyerahan` varchar(50) NOT NULL DEFAULT '',
  `diserahkan` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL DEFAULT '',
  `kepada_ext` varchar(50) NOT NULL DEFAULT '',
  `merk` varchar(50) NOT NULL DEFAULT '',
  `serial_number` varchar(50) NOT NULL DEFAULT '',
  `kelengkapan` varchar(50) NOT NULL DEFAULT '',
  `tanggal_pengembalian` varchar(50) NOT NULL DEFAULT '',
  `dikembalikan_oleh` varchar(50) NOT NULL DEFAULT '',
  `diterima_oleh` varchar(50) NOT NULL,
  `kelengkapan_ext` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `tgl_tempo1` varchar(50) NOT NULL DEFAULT '',
  `tgl_tempo2` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.peminjaman: 11 rows
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `nama_pegawai`, `jenis_barang`, `tanggal_pinjam`, `tanggal_digunakan`, `waktu_peminjaman`, `keperluan`, `lokasi`, `lokasi_ext`, `tanggal_penyerahan`, `diserahkan`, `kepada`, `kepada_ext`, `merk`, `serial_number`, `kelengkapan`, `tanggal_pengembalian`, `dikembalikan_oleh`, `diterima_oleh`, `kelengkapan_ext`, `status`, `tgl_tempo1`, `tgl_tempo2`) VALUES
	('PMJ00001', 'PG00002', 'Farhan R', 'Proyektor', '08-29-2019', '31-08-2019', '5 hari', 'tester', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Permintaan', '01-01-1970', 'tgl_tempo2'),
	('PMJ00002', 'PG00002', 'Farhan R', 'Monitor', '08-29-2019', '29-08-2019', 'karyawan baru', 'ok', 'Dalam Kantor', '', '04-09-2019', 'Admin', 'Farhan R', '', 'acer', 'xx', 'ok', '', '', '', '', 'Digunakan', '-', '-'),
	('PMJ00003', 'PG00002', 'Farhan R', 'PC', '08-29-2019', '31-08-2019', '5 hari', 'ok', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Hilang', '09-01-2019', '09-12-2019'),
	('PMJ00004', 'PG00002', 'Farhan R', 'Converter HDMI', '08-29-2019', '31-08-2019', '6 hari', 'apa aja', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Permintaan', '09-07-2019', '09-18-2019'),
	('PMJ00005', 'PG00004', 'Hasan', 'Monitor', '08-30-2019', '01-09-2019', '3 hari', 'ttttt', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Hilang', '09-01-2019', '09-18-2019'),
	('PMJ00006', 'PG00004', 'Hasan', 'Proyektor', '08-30-2019', '01-09-2019', '5 hari', 'hjuhug', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Permintaan', '09-09-2019', '09-20-2019'),
	('PMJ00007', 'PG00004', 'Hasan', 'PC', '08-30-2019', '01-09-2019', '4 hari', 'uihihb', 'Dalam Kantor', '', '31-08-2019', 'Admin', 'Hasan', '', 'asus', 'dhfdh47475875', 'ok', '05-09-2019', 'Farhan R', 'Admin', 'ada yg hilang', 'Hilang', '09-01-2019', '09-08-2019'),
	('PMJ00008', 'PG00002', 'Farhan R', 'Laptop', '09-10-2019', '11-09-2019', '1 hari', 'tes', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Permintaan', '09-14-2019', '09-25-2019'),
	('PMJ00009', 'PG00002', 'Farhan R', 'Monitor', '09-10-2019', '11-09-2019', '3 hari', 'apa aja', 'Dalam Kantor', '', '', '', '', '', '', '', '', '', '', '', '', 'Permintaan', '09-16-2019', '09-27-2019'),
	('PMJ00010', 'PG00009', 'Alif Rachman', 'Laptop', '09-10-2019', '10-09-2019', '1 hari', 'meeting', 'Dalam Kantor', '', '10-09-2019', 'Admin', 'Alif Rachman', '', 'acer', 'GJG675778FFJ', 'Lengkap', '11-09-2019', 'Alif Rachman', 'Admin', 'Lengkap', 'Hilang', '09-10-2019', '09-10-2019'),
	('PMJ00011', 'PG00009', 'Alif Rachman', 'Converter HDMI', '09-10-2019', '10-09-2019', '1 hari', 'rapat intern', 'Dalam Kantor', '', '10-09-2019', 'Admin', 'Alif Rachman', '', '', '', 'kabel only', '', '', '', '', 'Hilang', '09-10-2019', '09-10-2019');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.penawar
CREATE TABLE IF NOT EXISTS `penawar` (
  `id_penawar` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) NOT NULL DEFAULT '0',
  `id_lelang` varchar(50) NOT NULL DEFAULT '0',
  `nama_penawar` varchar(50) NOT NULL DEFAULT '0',
  `nama_barang` varchar(50) NOT NULL DEFAULT '0',
  `harga` bigint(20) NOT NULL DEFAULT '0',
  `tanggal` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_penawar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.penawar: ~6 rows (approximately)
/*!40000 ALTER TABLE `penawar` DISABLE KEYS */;
INSERT INTO `penawar` (`id_penawar`, `id_user`, `id_lelang`, `nama_penawar`, `nama_barang`, `harga`, `tanggal`) VALUES
	(1, 'PG00002', 'PL00024', 'Farhan R', 'Printer HP Complete', 720000, '09-25-2019'),
	(2, 'PG00004', 'PL00024', 'Hasan', 'Printer HP Complete', 750000, '09-25-2019'),
	(3, 'PG00002', 'PL00024', 'Farhan R', 'Printer HP Complete', 752000, '09-25-2019'),
	(4, 'PG00002', 'PL00005', 'Farhan R', 'PC Asus', 7200000, '09-25-2019'),
	(5, 'PG00002', 'PL00023', 'Farhan R', 'Printer HP', 1500001, '09-25-2019'),
	(6, 'PG00002', 'PL00023', 'Farhan R', 'Printer HP', 1500020, '09-25-2019'),
	(7, 'PG00004', 'PL00023', 'Hasan', 'Printer HP', 1670000, '09-25-2019');
/*!40000 ALTER TABLE `penawar` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.pengadaan
CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `no_pengadaan` varchar(35) NOT NULL,
  `tgl_pengadaan` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah_pengadaan` bigint(20) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `harga_pengadaan` bigint(20) NOT NULL,
  `totalharga_pengadaan` bigint(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.pengadaan: ~23 rows (approximately)
/*!40000 ALTER TABLE `pengadaan` DISABLE KEYS */;
INSERT INTO `pengadaan` (`id_pengadaan`, `id_user`, `no_pengadaan`, `tgl_pengadaan`, `nama_barang`, `jumlah_pengadaan`, `jumlah`, `harga_pengadaan`, `totalharga_pengadaan`, `status`) VALUES
	('PDN00001', 'PG00003', '58780001', '03-05-2019', 'Printer HP', 2, 0, 2500000, 25000000, 'Disetujui'),
	('PDN00002', 'PG00003', '58780002', '03-05-2019', 'Monitor Acer', 9, 0, 1200000, 14400000, 'Disetujui'),
	('PDN00003', 'PG00003', '58780003', '03-05-2019', 'Laptop Lenovo', 3, 0, 7600000, 22800000, 'NULL'),
	('PDN00004', 'PG00003', '58780004', '03-05-2019', 'Laptop Acer', 0, 0, 5600000, 33600000, 'Disetujui'),
	('PDN00005', 'PG00003', '58780005', '03-05-2019', 'Keyboard Logitech', 17, 0, 120000, 2400000, 'Disetujui'),
	('PDN00006', 'PG00003', '58780006', '03-05-2019', 'Mouse Logitech', 20, 0, 75000, 1500000, 'NULL'),
	('PDN00007', 'PG00003', '58780007', '03-05-2019', 'Memory 4GB DDR 3', 0, 0, 500000, 2500000, 'Disetujui'),
	('PDN00008', 'PG00003', '58780008', '03-05-2019', 'Speaker Dolby', 2, 0, 350000, 700000, 'NULL'),
	('PDN00009', 'PG00003', '58780009', '03-05-2019', 'PC Asus', 0, 0, 12000000, 36000000, 'Disetujui'),
	('PDN00010', 'PG00003', '58780010', '03-05-2019', 'Macbook Pro air', 0, 0, 22300000, 89200000, 'Disetujui'),
	('PDN00011', 'PG00003', '58780011', '03-05-2019', 'Mouse Asus', 5, 0, 80000, 560000, 'Disetujui'),
	('PDN00012', 'PG00003', '58780012', '03-05-2019', 'Keyboard Asus', 10, 0, 150000, 2250000, 'Disetujui'),
	('PDN00013', 'PG00004', '58780013', '07-09-2019', 'Speaker JBL', 1, 0, 0, 0, 'NULL'),
	('PDN00014', 'PG00004', '58780014', '07-09-2019', 'Mouse Nirkabel Asus', 3, 0, 0, 0, 'NULL'),
	('PDN00015', 'PG00002', '58780015', '07-23-2019', 'Mouse', 3, 0, 100000, 500000, 'Disetujui'),
	('PDN00016', 'PG00002', '58780016', '07-23-2019', 'Laptop', 0, 0, 6700000, 13400000, 'Disetujui'),
	('PDN00017', 'PG00003', '58780017', '08-19-2019', 'Mouse Nirkabel Asus', 1, 0, 50000, 50000, 'NULL'),
	('PDN00018', 'PG00003', '58780018', '08-29-2019', 'Tester', 2, 0, 50000, 100000, 'Tidak Disetujui'),
	('PDN00019', 'PG00006', '58780019', '08-29-2019', 'Notebook', 1, 0, 4000000, 4000000, 'Tidak Disetujui'),
	('PDN00020', 'PG00005', '58780020', '08-30-2019', 'Laptop', 2, 0, 200000, 400000, 'Tidak Disetujui'),
	('PDN00021', 'PG00002', '58780021', '09-08-2019', 'Printer HP Complete', 2, 3, 1200000, 3600000, 'Disetujui'),
	('PDN00022', 'PG00006', '58780022', '09-08-2019', 'Proyektor', 2, 2, 1500000, 3000000, 'Disetujui'),
	('PDN00023', 'PG00007', '58780023', '09-09-2019', 'TV', 0, 1, 3000000, 3000000, 'Disetujui');
/*!40000 ALTER TABLE `pengadaan` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.pesan_helpdesk
CREATE TABLE IF NOT EXISTS `pesan_helpdesk` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_helpdesk` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `permission` varchar(50) DEFAULT NULL,
  `message` text,
  `komentar` text,
  `tanggal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.pesan_helpdesk: ~0 rows (approximately)
/*!40000 ALTER TABLE `pesan_helpdesk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesan_helpdesk` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.tbl_attachment
CREATE TABLE IF NOT EXISTS `tbl_attachment` (
  `id_attachment` int(11) NOT NULL AUTO_INCREMENT,
  `id_helpdesk` varchar(50) DEFAULT NULL,
  `id_pesan` varchar(50) DEFAULT NULL,
  `message` text,
  `tanggal` varchar(50) DEFAULT NULL,
  `attachment1` varchar(250) DEFAULT NULL,
  `attachment2` varchar(250) DEFAULT NULL,
  `attachment3` varchar(250) DEFAULT NULL,
  `attachment4` varchar(250) DEFAULT NULL,
  `attachment5` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_attachment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.tbl_attachment: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_attachment` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.tbl_hadiah
CREATE TABLE IF NOT EXISTS `tbl_hadiah` (
  `Id_hadiah` int(11) NOT NULL AUTO_INCREMENT,
  `Id_barang` varchar(50) NOT NULL,
  `Hadiah` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_hadiah`),
  KEY `Id_barang` (`Id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.tbl_hadiah: 2 rows
/*!40000 ALTER TABLE `tbl_hadiah` DISABLE KEYS */;
INSERT INTO `tbl_hadiah` (`Id_hadiah`, `Id_barang`, `Hadiah`) VALUES
	(1, 'BI00007', 'Memory 4GB DDR 3'),
	(2, 'BI00015', 'Laptop Acer');
/*!40000 ALTER TABLE `tbl_hadiah` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.tbl_peserta
CREATE TABLE IF NOT EXISTS `tbl_peserta` (
  `Id_peserta` int(20) NOT NULL AUTO_INCREMENT,
  `Nomor` varchar(30) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_peserta`),
  UNIQUE KEY `Nomor` (`Nomor`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.tbl_peserta: 6 rows
/*!40000 ALTER TABLE `tbl_peserta` DISABLE KEYS */;
INSERT INTO `tbl_peserta` (`Id_peserta`, `Nomor`, `Nama`) VALUES
	(1, '20170401', 'Farhan R'),
	(2, '20190401', 'Hasan'),
	(3, '20190709', 'Aldi'),
	(4, '20120501', 'Teguh Restu'),
	(6, '20190901', 'Test'),
	(7, '20190909', 'Alif Rachman');
/*!40000 ALTER TABLE `tbl_peserta` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.upload
CREATE TABLE IF NOT EXISTS `upload` (
  `id_upload` varchar(50) NOT NULL DEFAULT '',
  `spesifikasi` text NOT NULL,
  `merk` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  PRIMARY KEY (`id_upload`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.upload: ~0 rows (approximately)
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;

-- Dumping structure for table ciuinventori.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(20) NOT NULL,
  `nik_pegawai` varchar(40) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `satker` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_akun` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ciuinventori.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nik_pegawai`, `nama_pegawai`, `no_telp`, `email`, `satker`, `jabatan`, `username`, `password`, `status_akun`) VALUES
	('PG00002', '20170401', 'Farhan R', '082299569237', 'farhanramadhaan@gmail.com', 'IT', 'Karyawan', 'farhan', '7e68b707e4245e93487a596df5b95ed018dfa5c4', 1),
	('PG00003', '20190201', 'Admin', '02123456789', '', 'Super User', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
	('PG00004', '20190401', 'Hasan', '082123981612', 'hasansulistyo96@gmail.com', 'IT', 'Karyawan', 'hasan', 'c4757db13f1b1aa83111b5f9578af130dfd5a314', 1),
	('PG00005', '20190709', 'Aldi', '082299569239', 'aldi.alda@gmail.com', 'Teknik GHS', 'Karyawan', 'aldirham', '0b9cee78e405d2648710216c485115966dfa1cc1', 1),
	('PG00006', '20120501', 'Teguh Restu', '081513319347', 'teguh.restu@gmail.com', 'Marketing', 'Karyawan', 'birin', '6e9bd0110d98d32e317d258bf2d69c224c8ba2a9', 1),
	('PG00007', '20190301', 'Anas', '082244568765', 'anas@gmail.com', 'MKT', 'Karyawan', 'anas', '47a411d3c5e0a8fe7e9bda609c5dc5f162443f97', 1),
	('PG00008', '20190901', 'Test', '08986768887', 'admin.test@me.com', 'MKT', 'Karyawan', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1),
	('PG00009', '20190909', 'Alif Rachman', '082299569234', 'alif.rachman120997@gmail.com', 'IT', 'Karyawan', 'alif123', '455d1fa82287f63ddaf17bbdf93cf24e0096fadd', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
