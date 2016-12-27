-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 12:17 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `bed` (
  `id` int(100) NOT NULL,
  `nama_kamar` varchar(100) DEFAULT NULL,
  `group_bed` varchar(100) DEFAULT NULL,
  `tarif` varchar(100) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kode_bed` varchar(100) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_lab`
--

CREATE TABLE IF NOT EXISTS `bidang_lab` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_hutang`
--

CREATE TABLE IF NOT EXISTS `detail_hutang` (
  `id` int(100) NOT NULL,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_pembelian` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_keluar`
--

CREATE TABLE IF NOT EXISTS `detail_item_keluar` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `hpp` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_masuk`
--

CREATE TABLE IF NOT EXISTS `detail_item_masuk` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(100) NOT NULL,
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
  `suplier` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id` int(100) NOT NULL,
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
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=19934 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_piutang`
--

CREATE TABLE IF NOT EXISTS `detail_piutang` (
  `id` int(100) NOT NULL,
  `no_faktur_penjualan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jt` date NOT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `penjamin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_retur_pembelian` (
  `id` int(100) NOT NULL,
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
  `tax` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_retur_penjualan` (
  `id` int(100) NOT NULL,
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
  `no_retur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_stok_opname`
--

CREATE TABLE IF NOT EXISTS `detail_stok_opname` (
  `id` int(100) NOT NULL,
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
  `hpp` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_pasien`
--

CREATE TABLE IF NOT EXISTS `fee_pasien` (
  `id` int(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `jumlah_prosentase` int(100) DEFAULT NULL,
  `jumlah_uang` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_produk`
--

CREATE TABLE IF NOT EXISTS `fee_produk` (
  `id` int(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_prosentase` int(100) DEFAULT NULL,
  `jumlah_uang` int(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9187 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_bed`
--

CREATE TABLE IF NOT EXISTS `group_bed` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpp_barang`
--

CREATE TABLE IF NOT EXISTS `hpp_barang` (
  `id` int(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `petugas` varchar(100) NOT NULL,
  `petugas_edit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `ke_kas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `icd`
--

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
  `not_used_8` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `item_keluar`
--

CREATE TABLE IF NOT EXISTS `item_keluar` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tangal_edit` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total_hpp` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_masuk`
--

CREATE TABLE IF NOT EXISTS `item_masuk` (
  `id` int(110) NOT NULL,
  `no_faktur` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` varchar(110) DEFAULT NULL,
  `user_edit` varchar(110) DEFAULT NULL,
  `tangal_edit` date DEFAULT NULL,
  `keterangan` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_lab`
--

CREATE TABLE IF NOT EXISTS `jasa_lab` (
  `id` int(100) NOT NULL,
  `kode_lab` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_1` int(100) NOT NULL,
  `harga_2` int(100) NOT NULL,
  `harga_3` int(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `persiapan` varchar(100) DEFAULT NULL,
  `metode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id_kab` int(100) NOT NULL,
  `id_prov` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jenis` int(100) NOT NULL,
  `status_pakai` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_stok`
--

CREATE TABLE IF NOT EXISTS `kartu_stok` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `pelanggan` varchar(100) DEFAULT NULL,
  `kode_produk` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2425 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE IF NOT EXISTS `kas` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

CREATE TABLE IF NOT EXISTS `kas_keluar` (
  `id` int(100) NOT NULL,
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
  `waktu_input` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE IF NOT EXISTS `kas_masuk` (
  `id` int(100) NOT NULL,
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
  `waktu_input` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2634 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_mutasi`
--

CREATE TABLE IF NOT EXISTS `kas_mutasi` (
  `id` int(100) NOT NULL,
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
  `total` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_keluar`
--

CREATE TABLE IF NOT EXISTS `kategori_keluar` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_masuk`
--

CREATE TABLE IF NOT EXISTS `kategori_masuk` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kec` int(100) NOT NULL,
  `id_kab` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status_pakai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kel` char(10) NOT NULL,
  `id_kec` char(6) DEFAULT NULL,
  `nama` tinytext,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_fee_pasien`
--

CREATE TABLE IF NOT EXISTS `laporan_fee_pasien` (
  `id` int(100) NOT NULL,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_fee_produk`
--

CREATE TABLE IF NOT EXISTS `laporan_fee_produk` (
  `id` int(100) NOT NULL,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6871 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(50) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `otoritas` varchar(30) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int(50) NOT NULL,
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
  `no_rm_lama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=440633 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

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
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penetapan_petugas`
--

CREATE TABLE IF NOT EXISTS `penetapan_petugas` (
  `id` int(100) NOT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `nama_paramedik` varchar(100) DEFAULT NULL,
  `nama_farmasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjamin`
--

CREATE TABLE IF NOT EXISTS `penjamin` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `cakupan_layanan` text,
  `jatuh_tempo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

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
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_lab`
--

CREATE TABLE IF NOT EXISTS `penjualan_lab` (
  `id` int(100) NOT NULL,
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
  `status_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tbs`
--

CREATE TABLE IF NOT EXISTS `penjualan_tbs` (
  `id` int(100) NOT NULL,
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
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2775 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perujuk`
--

CREATE TABLE IF NOT EXISTS `perujuk` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(35) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `singkatan_perusahaan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `no_fax` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE IF NOT EXISTS `piutang` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `penjamin` varchar(100) DEFAULT NULL,
  `petugas` varchar(100) NOT NULL,
  `petugas_edit` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `ke_kas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(100) NOT NULL,
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
  `golongan_produk` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1676 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_prov` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status_pakai` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `id` int(100) NOT NULL,
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
  `no_urut` int(100) DEFAULT NULL,
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
  `petugas_lain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2620 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE IF NOT EXISTS `rekam_medik` (
  `id` int(100) NOT NULL,
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
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2615 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik_inap`
--

CREATE TABLE IF NOT EXISTS `rekam_medik_inap` (
  `id` int(100) NOT NULL,
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
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik_ugd`
--

CREATE TABLE IF NOT EXISTS `rekam_medik_ugd` (
  `id` int(100) NOT NULL,
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
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `retur_pembelian` (
  `id` int(100) NOT NULL,
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
  `bayar` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan` (
  `id` int(100) NOT NULL,
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
  `cara` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_printer`
--

CREATE TABLE IF NOT EXISTS `setting_printer` (
  `id` int(100) NOT NULL,
  `nama_print` varchar(100) DEFAULT NULL,
  `status_print` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setup_hasil`
--

CREATE TABLE IF NOT EXISTS `setup_hasil` (
  `id` int(100) NOT NULL,
  `text_hasil` varchar(100) NOT NULL,
  `nama_pemeriksaan` varchar(100) NOT NULL,
  `kelompok_pemeriksaan` varchar(100) DEFAULT NULL,
  `model_hitung` varchar(100) NOT NULL,
  `normal_lk` varchar(100) DEFAULT NULL,
  `normal_pr` varchar(100) DEFAULT NULL,
  `metode` varchar(100) DEFAULT NULL,
  `kategori_index` varchar(100) NOT NULL,
  `normal_lk2` varchar(100) DEFAULT NULL,
  `normal_pr2` varchar(100) DEFAULT NULL,
  `satuan_nilai_normal` varchar(100) DEFAULT NULL,
  `text_reference` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_awal`
--

CREATE TABLE IF NOT EXISTS `stok_awal` (
  `id` int(100) NOT NULL,
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
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE IF NOT EXISTS `stok_opname` (
  `id` int(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `jumlah_selisih_harga` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_hpp` int(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `tanggal_edit` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id` int(100) NOT NULL,
  `kode_suplier` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_fee_produk`
--

CREATE TABLE IF NOT EXISTS `tbs_fee_produk` (
  `id` int(100) NOT NULL,
  `no_reg` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_fee` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4305 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_hutang`
--

CREATE TABLE IF NOT EXISTS `tbs_hutang` (
  `id` int(100) NOT NULL,
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_pembelian` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_item_keluar`
--

CREATE TABLE IF NOT EXISTS `tbs_item_keluar` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hpp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_item_masuk`
--

CREATE TABLE IF NOT EXISTS `tbs_item_masuk` (
  `id` int(100) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `subtotal` int(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbs_pembelian` (
  `id` int(100) NOT NULL,
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
  `suplier` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_penjualan`
--

CREATE TABLE IF NOT EXISTS `tbs_penjualan` (
  `id` int(100) NOT NULL,
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
  `session_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15344 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_piutang`
--

CREATE TABLE IF NOT EXISTS `tbs_piutang` (
  `no_faktur_pembayaran` varchar(100) NOT NULL,
  `no_faktur_penjualan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jt` date NOT NULL,
  `sisa` int(100) NOT NULL,
  `potongan` int(100) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `jumlah_total` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `penjamin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbs_retur_pembelian` (
  `id` int(110) NOT NULL,
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
  `tax` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `tbs_retur_penjualan` (
  `id` int(100) NOT NULL,
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
  `no_retur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_stok_awal`
--

CREATE TABLE IF NOT EXISTS `tbs_stok_awal` (
  `id` int(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbs_stok_opname`
--

CREATE TABLE IF NOT EXISTS `tbs_stok_opname` (
  `id` int(100) NOT NULL,
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
  `hpp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL,
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
  `status_pakai` int(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_lab`
--
ALTER TABLE `bidang_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_hutang`
--
ALTER TABLE `detail_hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_item_keluar`
--
ALTER TABLE `detail_item_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_item_masuk`
--
ALTER TABLE `detail_item_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_piutang`
--
ALTER TABLE `detail_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_retur_pembelian`
--
ALTER TABLE `detail_retur_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_retur_penjualan`
--
ALTER TABLE `detail_retur_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_stok_opname`
--
ALTER TABLE `detail_stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_pasien`
--
ALTER TABLE `fee_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_produk`
--
ALTER TABLE `fee_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_bed`
--
ALTER TABLE `group_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hpp_barang`
--
ALTER TABLE `hpp_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icd`
--
ALTER TABLE `icd`
  ADD PRIMARY KEY (`ICD`,`DTD`), ADD KEY `NewIndex1` (`Deskripsi`,`Deskripsi_ina`);

--
-- Indexes for table `item_keluar`
--
ALTER TABLE `item_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_masuk`
--
ALTER TABLE `item_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_lab`
--
ALTER TABLE `jasa_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indexes for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_mutasi`
--
ALTER TABLE `kas_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_keluar`
--
ALTER TABLE `kategori_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_masuk`
--
ALTER TABLE `kategori_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `laporan_fee_pasien`
--
ALTER TABLE `laporan_fee_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_fee_produk`
--
ALTER TABLE `laporan_fee_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `no_rm` (`no_rm`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penetapan_petugas`
--
ALTER TABLE `penetapan_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjamin`
--
ALTER TABLE `penjamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_lab`
--
ALTER TABLE `penjualan_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_tbs`
--
ALTER TABLE `penjualan_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perujuk`
--
ALTER TABLE `perujuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medik_inap`
--
ALTER TABLE `rekam_medik_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medik_ugd`
--
ALTER TABLE `rekam_medik_ugd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_printer`
--
ALTER TABLE `setting_printer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_hasil`
--
ALTER TABLE `setup_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_awal`
--
ALTER TABLE `stok_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_fee_produk`
--
ALTER TABLE `tbs_fee_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_hutang`
--
ALTER TABLE `tbs_hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_item_keluar`
--
ALTER TABLE `tbs_item_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_item_masuk`
--
ALTER TABLE `tbs_item_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_pembelian`
--
ALTER TABLE `tbs_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_penjualan`
--
ALTER TABLE `tbs_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_piutang`
--
ALTER TABLE `tbs_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_retur_pembelian`
--
ALTER TABLE `tbs_retur_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_retur_penjualan`
--
ALTER TABLE `tbs_retur_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_stok_awal`
--
ALTER TABLE `tbs_stok_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_stok_opname`
--
ALTER TABLE `tbs_stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `bidang_lab`
--
ALTER TABLE `bidang_lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `detail_hutang`
--
ALTER TABLE `detail_hutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_item_keluar`
--
ALTER TABLE `detail_item_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `detail_item_masuk`
--
ALTER TABLE `detail_item_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=288;
--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19934;
--
-- AUTO_INCREMENT for table `detail_piutang`
--
ALTER TABLE `detail_piutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_retur_pembelian`
--
ALTER TABLE `detail_retur_pembelian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_retur_penjualan`
--
ALTER TABLE `detail_retur_penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_stok_opname`
--
ALTER TABLE `detail_stok_opname`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_pasien`
--
ALTER TABLE `fee_pasien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_produk`
--
ALTER TABLE `fee_produk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9187;
--
-- AUTO_INCREMENT for table `group_bed`
--
ALTER TABLE `group_bed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `hpp_barang`
--
ALTER TABLE `hpp_barang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=288;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_keluar`
--
ALTER TABLE `item_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_masuk`
--
ALTER TABLE `item_masuk`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `jasa_lab`
--
ALTER TABLE `jasa_lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2425;
--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2634;
--
-- AUTO_INCREMENT for table `kas_mutasi`
--
ALTER TABLE `kas_mutasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kategori_keluar`
--
ALTER TABLE `kategori_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kategori_masuk`
--
ALTER TABLE `kategori_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `laporan_fee_pasien`
--
ALTER TABLE `laporan_fee_pasien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_fee_produk`
--
ALTER TABLE `laporan_fee_produk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6871;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=440633;
--
-- AUTO_INCREMENT for table `penetapan_petugas`
--
ALTER TABLE `penetapan_petugas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjamin`
--
ALTER TABLE `penjamin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `penjualan_lab`
--
ALTER TABLE `penjualan_lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan_tbs`
--
ALTER TABLE `penjualan_tbs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2775;
--
-- AUTO_INCREMENT for table `perujuk`
--
ALTER TABLE `perujuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1676;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2620;
--
-- AUTO_INCREMENT for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2615;
--
-- AUTO_INCREMENT for table `rekam_medik_inap`
--
ALTER TABLE `rekam_medik_inap`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekam_medik_ugd`
--
ALTER TABLE `rekam_medik_ugd`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `setting_printer`
--
ALTER TABLE `setting_printer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setup_hasil`
--
ALTER TABLE `setup_hasil`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_awal`
--
ALTER TABLE `stok_awal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbs_fee_produk`
--
ALTER TABLE `tbs_fee_produk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4305;
--
-- AUTO_INCREMENT for table `tbs_hutang`
--
ALTER TABLE `tbs_hutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_item_keluar`
--
ALTER TABLE `tbs_item_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_item_masuk`
--
ALTER TABLE `tbs_item_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_pembelian`
--
ALTER TABLE `tbs_pembelian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=422;
--
-- AUTO_INCREMENT for table `tbs_penjualan`
--
ALTER TABLE `tbs_penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15344;
--
-- AUTO_INCREMENT for table `tbs_piutang`
--
ALTER TABLE `tbs_piutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_retur_pembelian`
--
ALTER TABLE `tbs_retur_pembelian`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_retur_penjualan`
--
ALTER TABLE `tbs_retur_penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_stok_awal`
--
ALTER TABLE `tbs_stok_awal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbs_stok_opname`
--
ALTER TABLE `tbs_stok_opname`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=302;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
