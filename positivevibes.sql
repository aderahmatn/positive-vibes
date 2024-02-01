-- -------------------------------------------------------------
-- TablePlus 5.8.4(532)
--
-- https://tableplus.com/
--
-- Database: positivevibes
-- Generation Time: 2024-02-01 9:31:17.3150 PM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` text,
  `telepon_admin` text,
  `email_admin` text,
  `user_auth` text,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `auth` (
  `id_auth` int NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  `level` text,
  `user_auth` text,
  PRIMARY KEY (`id_auth`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` text,
  `harga_sewa` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `gambar` text,
  `deskripsi` text,
  `deleted` int DEFAULT NULL,
  `kategori` text,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `item_sewa` (
  `id_item_sewa` int NOT NULL AUTO_INCREMENT,
  `id_barang` int DEFAULT NULL,
  `no_sewa` text,
  PRIMARY KEY (`id_item_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nik_ktp` text,
  `nama_pelanggan` text,
  `telepon_pelanggan` text,
  `email_pelanggan` text,
  `alamat_pelanggan` text,
  `lampiran` text,
  `isactive` int DEFAULT NULL,
  `user_auth` text,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `pengembalian` (
  `id_pengembalian` int NOT NULL AUTO_INCREMENT,
  `no_sewa` text,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda_pengembalian` int DEFAULT NULL,
  `note_pengembalian` text,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `ransel` (
  `id_ransel` int NOT NULL AUTO_INCREMENT,
  `id_barang` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`id_ransel`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `sewa` (
  `id_sewa` int NOT NULL AUTO_INCREMENT,
  `no_sewa` text,
  `id_user` int DEFAULT NULL,
  `total_bayar` int DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `total_hari` int DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `is_return` int DEFAULT NULL,
  `is_payment` int DEFAULT NULL,
  `total_harga` int DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin` (`id_admin`, `nama_admin`, `telepon_admin`, `email_admin`, `user_auth`) VALUES
(1, 'admin1', '087776431554', 'admin@positivevibes.com', '65b3f78ae1234');

INSERT INTO `auth` (`id_auth`, `username`, `password`, `level`, `user_auth`) VALUES
(1, 'udinbah', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan', '65b3f73736723'),
(2, 'udinbah1', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan', '65b3f78ae660f'),
(3, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '65b3f78ae1234'),
(4, 'udinbahktp', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan', '65b4098630aef'),
(5, 'udinbah2', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan', '65b409dba2e56'),
(6, 'udinbahedit', '4297f44b13955235245b2497399d7a93', 'pelanggan', '65b40bd29d623'),
(7, 'arifwijaya', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan', '65bb67d4b2561');

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_sewa`, `stok`, `gambar`, `deskripsi`, `deleted`, `kategori`) VALUES
(1, '0504MdOL6O', 4, 16202, 'BRG-65b5a469f391d-28012024.jpg', 'Kep3xu5xGC', 1, NULL),
(2, 'EIGER SENARU 2P', 200000, 5, 'BRG-65b634d1ca448-28012024.jpeg', 'Senaru 2P adalah tenda kemah untuk kapasitas 2 orang yang cocok digunakan untuk kegiatan berkemah dan hiking. Tenda ini memiliki tiang rangka berbahan duraluminium yang mudah dipasangkan, satu akses pintu masuk dan mesh sebagai ventilasi. Ketika tidak dipakai, Anda bisa menyimpannya kembali di carry bag. Inner tent: (60+140+60) x 150cm x 100cm, Packing size: 60x40x25 cmFitur:- Tiang rangka aluminium- Satu akses pintu masuk- Mudah dipasang- Mesh untuk ventilasi\r\n', 0, 'tenda'),
(3, 'CREEK 5P TENT', 260000, 3, 'BRG-65b63653a4a5f-28012024.jpeg', 'Creek adalah tenda kemah untuk kapasitas 5 orang yang cocok digunakan untuk kegiatan berkemah bersama keluarga di akhir pekan. Tenda ini memiliki jala di bagian atap dan dalam untuk ventilasi, teras di bagian depan, dan seam taped, yang berfungsi untuk mencegah masuknya air saat hujan. Ketika tidak dipakai, Anda bisa menyimpannya kembali di carry bag. Ukuran: 300x240x152 cmFitur:- Tiang rangka fiberglass- Jalan di bagian atap untuk ventilasi udara- Teras di bagian depan- Seam taped, berfungsi untuk menutupi jahitan pada tenda agar dapat menahan masuknya air saat hujan- Dilengkapi tas praktis untuk menyimpan produk ini saat dibawa berpergian', 0, 'tenda'),
(4, 'EIGER LONE BIVY 1P TENT', 150000, 4, 'BRG-65b636ab54a20-28012024.jpeg', 'Terbuat dari material polyester berdaya tahan kuat dan anti air, Lone bivy hadir dengan desain minimalis juga ringkas untuk memastikan perlindungan dan kenyamanan Anda terjaga dalam kegiatan camping maupun backpacking. Dilengkapi dengan ventilasi mesh dan ruang yang cukup luas, bivy ini memungkinkan sirkulasi udara dan pergerakan yang lebih baik, menjadikan bivy ini menjadi pilihan tepat untuk dibawa kemana pun.Dimension Packaging: 50 x 15 x 12cmDimension Product: 250 x 100 x 90cm100% PolyesterFly: 190T Polyester PU3000Floor: 210D Oxford PU 3000Pole: Aluminum AlloyFitur:Terbuat dari material polyester anti airTali reflektif untuk visibilitas dalam kondisi cahaya rendah dengan tensioner berbahan alumiunium alloyJendela mesh sebagai ventilasi udaraRitsleting dua sisi untuk memudahkan aksesBagian dalam bivy dilengkapi dengan kantong kecil untuk menyimpan barang dan gantungan untuk lampu', 0, 'tenda'),
(5, 'EIGER SALVATOR - 43', 260000, 2, 'BRG-65b6370c89c74-28012024.jpeg', 'Sepatu jungle boots Salvator dirancang untuk mendukung aktivitas luar ruang Anda di area hutan hujan. Material yang kokoh dilengkapi insole Ortholite yang breathable (memiliki daya evaporasi tinggi yang mampu menguapkan kelembapan sehingga cepat kering), dan ringan untuk menjaga kaki tetap nyaman. Sepatu ini juga dirancang dengan rubber sheets yang berfungsi sebagai pelindung kaki bagian depan dan sistem konstruksi gusset yang akan mencegah masuknya elemen seperti kerikil atau air dari bagian atas sepatu. Dilengkapi dengan lubang ventilasi yang membuat sepatu lebih cepat kering. Material: Full grain leather + Nylon Berfungsi untuk perlindungan pada kaki bagian depan dari gesekan dan benturan Lubang ventilasi yang membuat sepatu lebih cepat kering Sistem konstruksi gusset untuk mencegah kerikil atau air masuk ke dalam sepatu Insole Ortholite Grip outsole Vibram untuk cengkraman yang lebih baik', 0, 'sepatu'),
(6, 'EIGER POLLOCK 2.0 - 41', 250000, 5, 'BRG-65b63d8e16138-28012024.jpeg', 'Sepatu Pollock 2.0 adalah sepatu mid-cut yang dirancang untuk kegiatan hiking. Gusset construction pada sepatu mid-cut ini berfungsi untuk mencegah langsung masuknya air dari bagian atas sepatu. Sementara itu, teknologi heel support system dapat menyangga pergelangan kaki pada saat melakukan pendakian guna menunjang kaki agar tetap stabil. Sepatu ini juga didukung outsole Vibram untuk cengkraman yang lebih baik dan insole Ortholite yang memberikan bantalan, breathable (memiliki daya evaporasi tinggi yang mampu menguapkan kelembapan sehingga mudah kering), dan ringan untuk menjaga kaki tetap nyaman. Material:Upper: NubuckOutsole: Vibram Grivola Q757 Rubber Compound Features:Konstruksi gusset dengan waterproof membrane untuk mencegah langsung masuknya air.Teknologi heel support system, yang berfungsi untuk menyangga pergelangan kaki pada saat melakukan pendakian guna menunjang kaki agar tetap stabil di berbagai kondisi medan.Konstruksi PE shank di bagian midsole agar bagian outsole lebih kaku dan kokohOutsole Vibram GrivolaInsole OrtholiteBerfungsi untuk memastikan perlindungan pada kaki bagian depan dari benturan kerasTropic technology: Tropic Waterproof', 0, 'sepatu');

INSERT INTO `item_sewa` (`id_item_sewa`, `id_barang`, `no_sewa`) VALUES
(37, 2, 'sw65b9445b1f11b'),
(38, 4, 'sw65b9445b1f11b'),
(39, 6, 'sw65b9445b1f11b'),
(40, 5, 'sw65b944dc66886'),
(41, 4, 'sw65bb68a917459'),
(42, 2, 'sw65bb68a917459');

INSERT INTO `pelanggan` (`id_pelanggan`, `nik_ktp`, `nama_pelanggan`, `telepon_pelanggan`, `email_pelanggan`, `alamat_pelanggan`, `lampiran`, `isactive`, `user_auth`) VALUES
(1, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 1, '65b3f39cb55fa'),
(2, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 1, '65b3f53ed7705'),
(3, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 1, NULL),
(4, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 1, '65b3f6c3f39c2'),
(5, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 0, '65b3f73736723'),
(6, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'lampiran tes', 1, '65b3f78ae660f'),
(7, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', 'KTP-26012024.jpeg', 1, '65b4098630aef'),
(8, '1234567891234567', 'udin bahrudin', '087776551336', 'udin.bahrudin@gmail.com', 'jl.sukamaju makasar', NULL, 1, '65b409dba2e56'),
(9, '1234567891234500', 'udin bahrudin edit', '087776551300', 'udin.bahrudinedit@gmail.com', 'jl.sukamaju jakarta timur', 'KTP-65b4cc11e705527012024.jpg', 1, '65b40bd29d623'),
(10, '1234567898765432', 'arif wijaya', '087775432443', 'arif.wijaya@gmail.com', 'cikupa tangerang', 'KTP-65bb67d49544601022024.jpg', 1, '65bb67d4b2561');

INSERT INTO `pengembalian` (`id_pengembalian`, `no_sewa`, `tgl_pengembalian`, `denda_pengembalian`, `note_pengembalian`) VALUES
(7, 'sw65b9445b1f11b', '2024-02-01', 15620000, 'ppl'),
(8, 'sw65b9445b1f11b', '2024-01-08', 1220000, 'testing'),
(9, 'sw65b9445b1f11b', '2024-01-08', 1220000, 'testing'),
(10, 'sw65b944dc66886', '2024-01-25', 3920000, 'kkl'),
(11, 'sw65bb68a917459', '2024-02-28', 1070000, 'tsting');

INSERT INTO `ransel` (`id_ransel`, `id_barang`, `id_user`, `deleted`) VALUES
(1, 5, 6, 1),
(2, 2, 6, 1),
(3, 3, 6, 1),
(4, 4, 6, 1),
(5, 5, 6, 1),
(6, 6, 6, 1),
(7, 6, 6, 1),
(8, 5, 6, 1),
(9, 2, 6, 1),
(10, 4, 6, 1),
(11, 6, 6, 1),
(12, 5, 6, 1),
(13, 5, 6, 1),
(14, 4, 6, 1),
(15, 3, 6, 1),
(16, 6, 6, 1),
(17, 6, 6, 1),
(18, 5, 6, 1),
(19, 5, NULL, 0),
(20, 4, 10, 1),
(21, 2, 10, 1);

INSERT INTO `sewa` (`id_sewa`, `no_sewa`, `id_user`, `total_bayar`, `tgl_awal`, `tgl_akhir`, `total_hari`, `tgl_transaksi`, `is_return`, `is_payment`, `total_harga`, `deleted`) VALUES
(3, 'sw65b9445b1f11b', 6, 1200000, '2024-01-04', '2024-01-06', 2, '2024-01-30', 1, 1, 600000, 0),
(4, 'sw65b944dc66886', 6, 520000, '2024-01-08', '2024-01-10', 2, '2024-01-30', 1, 1, 260000, 0),
(5, 'sw65bb68a917459', 10, 700000, '2024-02-23', '2024-02-25', 2, '2024-02-01', 1, 0, 350000, 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;