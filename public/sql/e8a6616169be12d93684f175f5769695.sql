-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2016 at 08:39 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biroglos_simklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

DROP TABLE IF EXISTS `bed`;
CREATE TABLE IF NOT EXISTS `bed` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_kamar` varchar(100) DEFAULT NULL,
  `group_bed` varchar(100) DEFAULT NULL,
  `tarif` varchar(100) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kode_bed` varchar(100) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_lab`
--

DROP TABLE IF EXISTS `bidang_lab`;
CREATE TABLE IF NOT EXISTS `bidang_lab` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_hutang`
--

DROP TABLE IF EXISTS `detail_hutang`;
CREATE TABLE IF NOT EXISTS `detail_hutang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_pembelian` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_keluar`
--

DROP TABLE IF EXISTS `detail_item_keluar`;
CREATE TABLE IF NOT EXISTS `detail_item_keluar` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `hpp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_masuk`
--

DROP TABLE IF EXISTS `detail_item_masuk`;
CREATE TABLE IF NOT EXISTS `detail_item_masuk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hpp` int(100) NOT NULL,
  `sisa` int(100) NOT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `suplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  `harga_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `hpp` int(100) DEFAULT NULL,
  `sisa` int(100) NOT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_piutang`
--

DROP TABLE IF EXISTS `detail_piutang`;
CREATE TABLE IF NOT EXISTS `detail_piutang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur_penjualan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jt` date NOT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_pembelian`
--

DROP TABLE IF EXISTS `detail_retur_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_retur_pembelian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_retur` varchar(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_jual` int(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `jumlah_retur` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_penjualan`
--

DROP TABLE IF EXISTS `detail_retur_penjualan`;
CREATE TABLE IF NOT EXISTS `detail_retur_penjualan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_jual` int(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `jumlah_retur` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `no_retur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_stok_opname`
--

DROP TABLE IF EXISTS `detail_stok_opname`;
CREATE TABLE IF NOT EXISTS `detail_stok_opname` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `stok_terakhir` int(11) NOT NULL,
  `fisik` varchar(100) NOT NULL,
  `selisih` int(100) NOT NULL,
  `selisih_harga` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(100) NOT NULL,
  `hpp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fee_pasien`
--

DROP TABLE IF EXISTS `fee_pasien`;
CREATE TABLE IF NOT EXISTS `fee_pasien` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `jumlah_prosentase` int(100) DEFAULT NULL,
  `jumlah_uang` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fee_produk`
--

DROP TABLE IF EXISTS `fee_produk`;
CREATE TABLE IF NOT EXISTS `fee_produk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_prosentase` int(100) DEFAULT NULL,
  `jumlah_uang` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3952 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_bed`
--

DROP TABLE IF EXISTS `group_bed`;
CREATE TABLE IF NOT EXISTS `group_bed` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `hpp_barang`
--

DROP TABLE IF EXISTS `hpp_barang`;
CREATE TABLE IF NOT EXISTS `hpp_barang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

DROP TABLE IF EXISTS `hutang`;
CREATE TABLE IF NOT EXISTS `hutang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `petugas` varchar(100) NOT NULL,
  `petugas_edit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `ke_kas` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `icd`
--

DROP TABLE IF EXISTS `icd`;
CREATE TABLE IF NOT EXISTS `icd` (
  `ICD` varchar(20) NOT NULL DEFAULT '',
  `Deskripsi` varchar(250) NOT NULL DEFAULT '',
  `DTD` varchar(20) NOT NULL DEFAULT '',
  `Deskripsi_ina` varchar(250) NOT NULL DEFAULT '',
  `not_used_1` varchar(20) NOT NULL DEFAULT '',
  `not_used_2` varchar(20) NOT NULL DEFAULT '',
  `not_used_3` varchar(20) NOT NULL DEFAULT '',
  `not_used_4` varchar(20) NOT NULL DEFAULT '',
  `not_used_5` varchar(20) NOT NULL DEFAULT '',
  `not_used_6` varchar(20) NOT NULL DEFAULT '',
  `not_used_7` varchar(20) NOT NULL DEFAULT '',
  `not_used_8` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ICD`,`DTD`),
  KEY `NewIndex1` (`Deskripsi`,`Deskripsi_ina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `item_keluar`
--

DROP TABLE IF EXISTS `item_keluar`;
CREATE TABLE IF NOT EXISTS `item_keluar` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tangal_edit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total_hpp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_masuk`
--

DROP TABLE IF EXISTS `item_masuk`;
CREATE TABLE IF NOT EXISTS `item_masuk` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(110) DEFAULT NULL,
  `user_edit` varchar(110) DEFAULT NULL,
  `tangal_edit` date DEFAULT NULL,
  `keterangan` varchar(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_lab`
--

DROP TABLE IF EXISTS `jasa_lab`;
CREATE TABLE IF NOT EXISTS `jasa_lab` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_lab` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_1` int(100) NOT NULL,
  `harga_2` int(100) NOT NULL,
  `harga_3` int(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id_kab` int(100) NOT NULL,
  `id_prov` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jenis` int(100) NOT NULL,
  `status_pakai` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_kab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

DROP TABLE IF EXISTS `kas`;
CREATE TABLE IF NOT EXISTS `kas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

DROP TABLE IF EXISTS `kas_keluar`;
CREATE TABLE IF NOT EXISTS `kas_keluar` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `dari_akun` varchar(100) NOT NULL,
  `ke_akun` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `no_trx` varchar(100) NOT NULL,
  `petugas_akhir` varchar(100) DEFAULT NULL,
  `terakhir_edit` datetime DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu_input` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

DROP TABLE IF EXISTS `kas_masuk`;
CREATE TABLE IF NOT EXISTS `kas_masuk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dari_akun` varchar(100) NOT NULL,
  `ke_akun` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `no_trx` varchar(100) NOT NULL,
  `petugas_akhir` varchar(100) DEFAULT NULL,
  `terakhir_edit` datetime DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu_input` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_mutasi`
--

DROP TABLE IF EXISTS `kas_mutasi`;
CREATE TABLE IF NOT EXISTS `kas_mutasi` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_trx` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `dari_kas` varchar(100) NOT NULL,
  `mutasi_ke_kas` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `petugas_akhir` varchar(100) DEFAULT NULL,
  `terakhir_edit` datetime DEFAULT NULL,
  `waktu_input` time NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_keluar`
--

DROP TABLE IF EXISTS `kategori_keluar`;
CREATE TABLE IF NOT EXISTS `kategori_keluar` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_masuk`
--

DROP TABLE IF EXISTS `kategori_masuk`;
CREATE TABLE IF NOT EXISTS `kategori_masuk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kec` int(100) NOT NULL,
  `id_kab` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status_pakai` int(100) NOT NULL,
  PRIMARY KEY (`id_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kel` char(10) NOT NULL,
  `id_kec` char(6) DEFAULT NULL,
  `nama` tinytext,
  `id_jenis` int(11) NOT NULL,
  PRIMARY KEY (`id_kel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_fee_pasien`
--

DROP TABLE IF EXISTS `laporan_fee_pasien`;
CREATE TABLE IF NOT EXISTS `laporan_fee_pasien` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_fee_produk`
--

DROP TABLE IF EXISTS `laporan_fee_produk`;
CREATE TABLE IF NOT EXISTS `laporan_fee_produk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `otoritas` varchar(30) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `alamat_sekarang` varchar(100) DEFAULT NULL,
  `alamat_ktp` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `nama_suamiortu` varchar(50) DEFAULT NULL,
  `pekerjaan_suamiortu` varchar(50) DEFAULT NULL,
  `nama_penanggungjawab` varchar(50) DEFAULT NULL,
  `hubungan_dengan_pasien` varchar(50) DEFAULT NULL,
  `alamat_penanggung` varchar(50) DEFAULT NULL,
  `no_hp_penanggung` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `status_kawin` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `penjamin` varchar(50) DEFAULT NULL,
  `gol_darah` varchar(50) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alergi` varchar(100) DEFAULT NULL,
  `no_kk` varchar(100) DEFAULT NULL,
  `nama_kk` varchar(100) DEFAULT NULL,
  `no_rm_lama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=423194 ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `no_faktur_suplier` varchar(100) DEFAULT NULL,
  `sisa` int(100) DEFAULT NULL,
  `cara` varchar(100) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `bayar` int(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjamin`
--

DROP TABLE IF EXISTS `penjamin`;
CREATE TABLE IF NOT EXISTS `penjamin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `cakupan_layanan` text,
  `jatuh_tempo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(100) NOT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `dokter` varchar(100) DEFAULT NULL,
  `penjamin` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `total_penjualan` int(100) NOT NULL,
  `jam` time NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `total_hpp` int(100) DEFAULT NULL,
  `jenis_penjualan` varchar(30) DEFAULT NULL,
  `cara` varchar(100) NOT NULL,
  `sisa` int(100) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `bayar` int(100) DEFAULT NULL,
  `keterangan` text,
  `no_resep` varchar(100) DEFAULT NULL,
  `resep_dokter` varchar(100) DEFAULT NULL,
  `apoteker` varchar(100) DEFAULT NULL,
  `perawat` varchar(100) DEFAULT NULL,
  `petugas_lain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_lab`
--

DROP TABLE IF EXISTS `penjualan_lab`;
CREATE TABLE IF NOT EXISTS `penjualan_lab` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_lab` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `no_reg` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status_pembayaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tbs`
--

DROP TABLE IF EXISTS `penjualan_tbs`;
CREATE TABLE IF NOT EXISTS `penjualan_tbs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) DEFAULT NULL,
  `kode_produk` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah_produk` varchar(100) DEFAULT NULL,
  `tipe_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(100) DEFAULT NULL,
  `subtotal` int(100) DEFAULT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `hpp` int(100) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `perujuk`
--

DROP TABLE IF EXISTS `perujuk`;
CREATE TABLE IF NOT EXISTS `perujuk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `singkatan_perusahaan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `no_fax` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

DROP TABLE IF EXISTS `piutang`;
CREATE TABLE IF NOT EXISTS `piutang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `petugas_edit` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `ke_kas` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

DROP TABLE IF EXISTS `poli`;
CREATE TABLE IF NOT EXISTS `poli` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jenis_produk` varchar(100) DEFAULT NULL,
  `tipe_produk` varchar(100) DEFAULT NULL,
  `satuan_produk` varchar(100) DEFAULT NULL,
  `harga_beli` int(100) DEFAULT NULL,
  `stok_produk` int(100) DEFAULT NULL,
  `harga_jual_1` int(100) DEFAULT NULL,
  `harga_jual_2` int(100) DEFAULT NULL,
  `harga_jual_3` int(100) DEFAULT NULL,
  `suplier` varchar(100) DEFAULT NULL,
  `total` int(100) DEFAULT NULL,
  `status_stok_awal` varchar(100) DEFAULT NULL,
  `limit_stok` varchar(100) DEFAULT NULL,
  `over_stok` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1600 ;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_prov` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status_pakai` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

DROP TABLE IF EXISTS `registrasi`;
CREATE TABLE IF NOT EXISTS `registrasi` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(255) DEFAULT NULL,
  `no_rm` varchar(255) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `alamat_pasien` varchar(100) DEFAULT NULL,
  `hp_pasien` varchar(100) DEFAULT NULL,
  `umur_pasien` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `jenis_pasien` varchar(100) DEFAULT NULL,
  `penjamin` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `pengantar_pasien` varchar(100) DEFAULT NULL,
  `nama_pengantar` varchar(100) DEFAULT NULL,
  `alamat_pengantar` varchar(100) DEFAULT NULL,
  `hp_pengantar` varchar(100) DEFAULT NULL,
  `hubungan_dengan_pasien` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  `alamat_penanggung_jawab` varchar(100) DEFAULT NULL,
  `hp_penanggung_jawab` varchar(100) DEFAULT NULL,
  `pekerjaan_penanggung_jawab` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `dokter` varchar(100) DEFAULT NULL,
  `petugas` varchar(100) DEFAULT NULL,
  `bed` varchar(100) DEFAULT NULL,
  `group_bed` varchar(100) DEFAULT NULL,
  `menginap` varchar(100) DEFAULT NULL,
  `keadaan_pulang` varchar(100) DEFAULT NULL,
  `poli` varchar(100) DEFAULT NULL,
  `no_urut` varchar(100) DEFAULT NULL,
  `rujukan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `dokter_jaga` varchar(100) DEFAULT NULL,
  `dokter_pengirim` varchar(100) DEFAULT NULL,
  `status_nikah` varchar(100) DEFAULT NULL,
  `pekerjaan_pasien` varchar(100) DEFAULT NULL,
  `gol_darah` varchar(100) DEFAULT NULL,
  `surat_jaminan` varchar(100) NOT NULL,
  `alergi` varchar(100) DEFAULT NULL,
  `no_kk` varchar(100) DEFAULT NULL,
  `nama_kk` varchar(100) DEFAULT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `verbal` varchar(100) DEFAULT NULL,
  `motorik` varchar(100) DEFAULT NULL,
  `petugas_lain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

DROP TABLE IF EXISTS `rekam_medik`;
CREATE TABLE IF NOT EXISTS `rekam_medik` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `umur` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `sistole_distole` varchar(100) NOT NULL,
  `suhu` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `tinggi_badan` varchar(100) NOT NULL,
  `nadi` varchar(100) NOT NULL,
  `respiratory` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL,
  `anamnesa` varchar(100) DEFAULT NULL,
  `pemeriksaan_fisik` varchar(100) DEFAULT NULL,
  `keadaan_umum` varchar(100) DEFAULT NULL,
  `kondisi_keluar` varchar(100) DEFAULT NULL,
  `kesadaran` varchar(100) DEFAULT NULL,
  `icd_utama` varchar(100) DEFAULT NULL,
  `icd_penyerta` varchar(100) DEFAULT NULL,
  `icd_komplikasi` varchar(100) DEFAULT NULL,
  `kode_utama` varchar(100) DEFAULT NULL,
  `kode_penyerta` varchar(100) DEFAULT NULL,
  `kode_penyerta_tambahan` varchar(100) NOT NULL,
  `icd_penyerta_tambahan` varchar(100) NOT NULL,
  `kode_komplikasi` varchar(100) DEFAULT NULL,
  `tanggal_periksa` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `rujukan` varchar(100) NOT NULL,
  `alergi` varchar(100) DEFAULT NULL,
  `no_kk` varchar(100) DEFAULT NULL,
  `nama_kk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik_inap`
--

DROP TABLE IF EXISTS `rekam_medik_inap`;
CREATE TABLE IF NOT EXISTS `rekam_medik_inap` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `umur` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `sistole_distole` varchar(100) NOT NULL,
  `suhu` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `tinggi_badan` varchar(100) NOT NULL,
  `nadi` varchar(100) NOT NULL,
  `respiratory` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL,
  `anamnesa` varchar(100) DEFAULT NULL,
  `pemeriksaan_fisik` varchar(100) DEFAULT NULL,
  `keadaan_umum` varchar(100) DEFAULT NULL,
  `kondisi_keluar` varchar(100) DEFAULT NULL,
  `kesadaran` varchar(100) DEFAULT NULL,
  `icd_utama` varchar(100) DEFAULT NULL,
  `icd_penyerta` varchar(100) DEFAULT NULL,
  `icd_penyerta_tambahan` varchar(100) NOT NULL,
  `icd_komplikasi` varchar(100) DEFAULT NULL,
  `kode_utama` varchar(100) DEFAULT NULL,
  `kode_penyerta` varchar(100) DEFAULT NULL,
  `kode_penyerta_tambahan` varchar(100) NOT NULL,
  `kode_komplikasi` varchar(100) DEFAULT NULL,
  `tanggal_periksa` date NOT NULL,
  `jam` time NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `rujukan` varchar(100) NOT NULL,
  `dokter_penanggung_jawab` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `alergi` varchar(100) DEFAULT NULL,
  `group_bed` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik_ugd`
--

DROP TABLE IF EXISTS `rekam_medik_ugd`;
CREATE TABLE IF NOT EXISTS `rekam_medik_ugd` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `umur` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `sistole_distole` varchar(100) DEFAULT NULL,
  `suhu` varchar(100) DEFAULT NULL,
  `berat_badan` varchar(100) DEFAULT NULL,
  `tinggi_badan` varchar(100) DEFAULT NULL,
  `nadi` varchar(100) DEFAULT NULL,
  `respiratory` varchar(100) DEFAULT NULL,
  `poli` varchar(100) DEFAULT NULL,
  `anamnesa` varchar(100) DEFAULT NULL,
  `pemeriksaan_fisik` varchar(100) DEFAULT NULL,
  `keadaan_umum` varchar(100) DEFAULT NULL,
  `kondisi_keluar` varchar(100) DEFAULT NULL,
  `kesadaran` varchar(100) DEFAULT NULL,
  `icd_utama` varchar(100) DEFAULT NULL,
  `icd_penyerta` varchar(100) DEFAULT NULL,
  `icd_penyerta_tambahan` varchar(100) DEFAULT NULL,
  `icd_komplikasi` varchar(100) DEFAULT NULL,
  `kode_utama` varchar(100) DEFAULT NULL,
  `kode_penyerta` varchar(100) DEFAULT NULL,
  `kode_penyerta_tambahan` varchar(100) DEFAULT NULL,
  `kode_komplikasi` varchar(100) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `dokter` varchar(100) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `rujukan` varchar(100) DEFAULT NULL,
  `pengantar` varchar(100) DEFAULT NULL,
  `alergi` varchar(100) DEFAULT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `verbal` varchar(100) DEFAULT NULL,
  `motorik` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

DROP TABLE IF EXISTS `retur_pembelian`;
CREATE TABLE IF NOT EXISTS `retur_pembelian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_retur` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `jam` time NOT NULL,
  `cara` varchar(100) NOT NULL,
  `bayar` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

DROP TABLE IF EXISTS `retur_penjualan`;
CREATE TABLE IF NOT EXISTS `retur_penjualan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `jam` time NOT NULL,
  `no_return` varchar(100) NOT NULL,
  `bayar` int(100) DEFAULT NULL,
  `cara` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_awal`
--

DROP TABLE IF EXISTS `stok_awal`;
CREATE TABLE IF NOT EXISTS `stok_awal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(100) NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=459 ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

DROP TABLE IF EXISTS `stok_opname`;
CREATE TABLE IF NOT EXISTS `stok_opname` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `jumlah_selisih_harga` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_hpp` int(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tanggal_edit` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

DROP TABLE IF EXISTS `suplier`;
CREATE TABLE IF NOT EXISTS `suplier` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_suplier` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_fee_produk`
--

DROP TABLE IF EXISTS `tbs_fee_produk`;
CREATE TABLE IF NOT EXISTS `tbs_fee_produk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_hutang`
--

DROP TABLE IF EXISTS `tbs_hutang`;
CREATE TABLE IF NOT EXISTS `tbs_hutang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_pembelian` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_item_keluar`
--

DROP TABLE IF EXISTS `tbs_item_keluar`;
CREATE TABLE IF NOT EXISTS `tbs_item_keluar` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hpp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_item_masuk`
--

DROP TABLE IF EXISTS `tbs_item_masuk`;
CREATE TABLE IF NOT EXISTS `tbs_item_masuk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `subtotal` int(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_pembelian`
--

DROP TABLE IF EXISTS `tbs_pembelian`;
CREATE TABLE IF NOT EXISTS `tbs_pembelian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `suplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_penjualan`
--

DROP TABLE IF EXISTS `tbs_penjualan`;
CREATE TABLE IF NOT EXISTS `tbs_penjualan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) DEFAULT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `hpp` int(100) DEFAULT NULL,
  `diskon` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_piutang`
--

DROP TABLE IF EXISTS `tbs_piutang`;
CREATE TABLE IF NOT EXISTS `tbs_piutang` (
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_penjualan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jt` date NOT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `jumlah_total` int(100) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_retur_pembelian`
--

DROP TABLE IF EXISTS `tbs_retur_pembelian`;
CREATE TABLE IF NOT EXISTS `tbs_retur_pembelian` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `no_retur` varchar(110) NOT NULL,
  `no_faktur` varchar(110) NOT NULL,
  `kode_produk` varchar(110) NOT NULL,
  `nama_produk` varchar(110) NOT NULL,
  `jumlah_jual` int(110) NOT NULL,
  `tipe_produk` varchar(110) NOT NULL,
  `jumlah_retur` int(110) NOT NULL,
  `harga` int(110) NOT NULL,
  `subtotal` int(110) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `hpp` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_retur_penjualan`
--

DROP TABLE IF EXISTS `tbs_retur_penjualan`;
CREATE TABLE IF NOT EXISTS `tbs_retur_penjualan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_jual` int(100) NOT NULL,
  `tipe_produk` varchar(100) NOT NULL,
  `jumlah_retur` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `tax` int(100) DEFAULT NULL,
  `hpp` int(100) DEFAULT NULL,
  `no_retur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_stok_awal`
--

DROP TABLE IF EXISTS `tbs_stok_awal`;
CREATE TABLE IF NOT EXISTS `tbs_stok_awal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_stok_opname`
--

DROP TABLE IF EXISTS `tbs_stok_opname`;
CREATE TABLE IF NOT EXISTS `tbs_stok_opname` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `stok_terakhir` int(100) DEFAULT NULL,
  `fisik` varchar(100) DEFAULT NULL,
  `selisih` int(100) DEFAULT NULL,
  `selisih_harga` int(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(100) NOT NULL,
  `hpp` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `otoritas` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `status_pakai` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=229 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
