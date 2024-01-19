-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2023 pada 08.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_kegiatan`
--

CREATE TABLE `tbl_jadwal_kegiatan` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal_kegiatan`
--

INSERT INTO `tbl_jadwal_kegiatan` (`id_jadwal`, `nama_kegiatan`, `waktu`, `isi_kegiatan`, `gambar`, `tempat`, `nama_user`) VALUES
(2, 'AGENDA KEGIATAN MEMERIAHKAN HUT KE 78 KEMERDEKAAN ', '2023-08-17', 'Panita Peringatan Hari Ulang Tahun Ke-78 Proklamasi Kemerdekaan Republik Indonesia Tahun 2023 Kelurahan Karang Timur akan mengadakan berbagai macam kegiatan. Dengan harapan bahwa Peringatan HUT dimaksud dapat berjalan dengan meriah, marak dan mampu menumbuhkan semangat kebangsaan di masyarakat. ', 'd3293f53d4bead5982cc6e1b86a3f3b4.png', 'Kelurahan Karang Timur', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `gambar`, `waktu`, `tempat`, `tanggal`, `nama_user`) VALUES
(5, 'Penyemprotan Disinfektan', 'Upaya pencegahan dan penyebaran virus dan mensemprot disetiap rumah ke rumah', '9c83eb25815dea343862cfc40058fe91.jpg', '2020-03-24', 'Kelurahan Karang Timur', '2023-09-06 08:51:47', 'admin'),
(6, 'Vaksinasi', 'Kegiatan vaksinasi ini untuk mengurangi resiko penularan covid19 dengan bertujuan untuk menjaga kekebalan tubuh atau daya tahan tubuh', 'f0b7295eaa1f539069291eebef308cdb.jpg', '2021-08-25', 'Kelurahan Karang Timur', '2023-09-06 08:57:33', 'admin'),
(7, 'Kegiatan lomba 17 agustus', 'Untuk meramaikan susasana kemerdekaan indonesia yang diselenggarakan pada tanggal 17 agustus 1945\r\n', '4dd2dcb4200ab4177c0a4cf2fc5cdf2e.jpg', '2023-08-17', 'Kelurahan Karang Timur', '2023-09-06 08:58:56', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ktp`
--

CREATE TABLE `tbl_ktp` (
  `id_ktp` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `akta` text NOT NULL,
  `kk` text NOT NULL,
  `surat_pengantar` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ktp`
--

INSERT INTO `tbl_ktp` (`id_ktp`, `kode_permohonan`, `nama`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `email`, `no_telp`, `pekerjaan`, `pendidikan`, `alamat`, `akta`, `kk`, `surat_pengantar`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 327901, 'MAULANA AGUNG PANGESTU', '', '2023-11-26', '123', 'pangestu2612@gmail.com', '087771831145', '13', 'd3', 'tangerang', '381410a675eb82434c97af850e7ded2c.pdf', '6bdf69636c98c42742add68695fe55fc.pdf', '451fa267a82a926221e2fa31ef93624f.pdf', 1, 'testing', 'admin', NULL, '2023-12-26 19:07:37'),
(2, 395662, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'maulanaagung543@gmail.com', '085756678029', '123', 'd3', 'KP. KARANGANYAR', '59bd9f5ffa3c1ef59725323c16d63652.pdf', 'a5c603ee18d17b96bfb88c7390670d52.pdf', '1eedcac7d9c4c3d84292abf49cb18339.pdf', 1, NULL, NULL, NULL, '2023-12-14 23:11:00'),
(4, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'f32d8a4ed19a1dbac56408ea05a25929.pdf', '430f7a803f6818221c64cdc73c2e8860.pdf', '41dc1fe447dd3dd7bf93048b2c950432.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:14'),
(6, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '1a9f57a1da70af4c99f7beabd9e3fc89.pdf', 'cc52fcab40cf41c6b2f76d88e923802f.pdf', '836ac72079aa1a7ac2297585597498b6.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:42'),
(7, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '29f5f9905e3c8d3dea57b1464e9c5d43.pdf', '275b3d0ca7f87b5c65254bb478465195.pdf', '9c698b7a46e2a7216e7c28f9b792709b.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:53'),
(8, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'faad4fa2f978ae3d9bdc367d64358ae3.pdf', '56ef062f787c53ac2bdc66d7fe492ab8.pdf', '59d80e697a1925b3bbfbd4092bf46b76.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:19:03'),
(9, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '615f65c055371c4cf7ced64066ff37f0.pdf', '95240dd2d5730517092cfe7df0021cbc.pdf', '295e81271012d101bee822bce83f312d.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:21:03'),
(10, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '58381af7a8ed5834df49b836aed52ad2.pdf', 'aea6816e93e7627d84eade07aa8d9a75.pdf', 'b790623d19d1f665ae4d5e54b8ac2579.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:23:38'),
(11, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '0e3c7af5cb0578475fb5a0cd8f10ec6d.pdf', 'b487deed2bce9dc87539f0c46a771d88.pdf', '01b56aa5d225f35529854a4c3c1d7102.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:23:53'),
(12, 453565, 'testing', 'Perempuan', '0000-00-00', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '9e689083856b7967b4e839bc38c284d0.pdf', '8aed6badbf9eafcf75f8f03209910733.pdf', 'd900ca13d3e5be4e69f44650f435fd7c.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:24:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permohonan_ktp_baru`
--

CREATE TABLE `tbl_permohonan_ktp_baru` (
  `id_ktp_baru` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_permohonan_ktp_baru`
--

INSERT INTO `tbl_permohonan_ktp_baru` (`id_ktp_baru`, `kode_permohonan`, `nik`, `nama_lengkap`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 631982, '1234', '', '1234', 1, 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', 'admin', 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', '1234', '2023-08-24 02:01:36'),
(3, 864777, '1234', '', 'testing ', 0, '76171e922bab866c1b62c1e97069affb.pdf', '', '', '', '2023-08-24 10:40:18'),
(4, 883401, '1234', '', '123', 0, 'b79cb2cfe1b226f91a7eaad17f6c0948.pdf', 'admin', '', '', '2023-07-25 10:43:17'),
(5, 912546, '1234', '', 'bikin pendatang', 0, '8bd0d25ba69fa9121f1767a60b68570c.pdf', '', '', '', '2023-08-25 01:54:01'),
(6, 855779, '1234', '', 'sadas', 0, '8300fb2c34ad54e19969ce512b191294.jpg', '', '', '', '2023-08-29 09:22:14'),
(7, 429955, NULL, '', '123', 0, 'cb87eb56ab4589070ead9df1b50e48f1.pdf', '', '', '', '2023-09-09 06:48:45'),
(8, 337070, NULL, 'budi', 'test', 0, '3461443c69e747a7aa897a6e2d61215d.pdf', '', '', '', '2023-09-09 07:02:29'),
(9, 266997, '3671012708670001', '', 'cek upload', 0, '24223eee7275d81ceb9066c79d9f5739.pdf', 'Budi', '', '', '2023-11-23 05:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permohonan_surat_kelahiran`
--

CREATE TABLE `tbl_permohonan_surat_kelahiran` (
  `id_surat_kelahiran` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_permohonan_surat_kelahiran`
--

INSERT INTO `tbl_permohonan_surat_kelahiran` (`id_surat_kelahiran`, `kode_permohonan`, `nik`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 909441, '1234', 'kelahiran', 1, '3e92e7febf80cf0d56a0cd4c2aae80c6.pdf', 'admin', '', 'sda', '2023-08-25 11:08:27'),
(2, 752149, '1234', 'surat lahir', 0, '7ae44cbd19b69c07003907f6aaa17b5f.pdf', '', '', '', '2023-08-25 02:02:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permohonan_surat_pendatang`
--

CREATE TABLE `tbl_permohonan_surat_pendatang` (
  `id_surat_pendatang` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_permohonan_surat_pendatang`
--

INSERT INTO `tbl_permohonan_surat_pendatang` (`id_surat_pendatang`, `kode_permohonan`, `nik`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 483390, '1234', 'pendatang', 1, '9bfc3e7228e21429724792ece3a99f0f.pdf', 'admin', '', '', '2023-08-25 10:44:25'),
(2, 16309, '1234', 'sdasda', 0, '5d55ce67dc17b7a69cea820e92b90575.pdf', '', '', '', '2023-08-25 01:55:20'),
(3, 691016, '3671012708670001', 'tesrub', 1, '5c82179f1bff12ba8d787da5f0f3ad5c.pdf', 'admin', '', 'silahkan ambil di kelrurahan', '2023-09-06 09:25:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_datang`
--

CREATE TABLE `tbl_surat_datang` (
  `id_surat_datang` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `selfi_pemohon` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_datang`
--

INSERT INTO `tbl_surat_datang` (`id_surat_datang`, `kode_permohonan`, `nik`, `nama`, `email`, `no_telp`, `alamat`, `ktp`, `kk`, `selfi_pemohon`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 505619, '3671102611970005', 'testing', 'pangestu2612@gmail.com', '085756678029', 'KP. KARANGANYAR', '3d1fb66834a280097156a6d790b81c0f.jpg', '58f8d5af5cab2949d3739ec2252861c7.jpg', '9dcef93276417ac1328aa334d1565e60.jpg', 1, '', 'admin', NULL, '2023-12-27 01:11:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_kelahiran`
--

CREATE TABLE `tbl_surat_kelahiran` (
  `id_surat_kelahiran` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir_anak` varchar(50) NOT NULL,
  `tgl_lahir_anak` date NOT NULL,
  `waktu_lahir` varchar(30) NOT NULL,
  `nama_rs` varchar(50) NOT NULL,
  `alamat_rs` text NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `alamat_ibu` text NOT NULL,
  `kk` text NOT NULL,
  `ktp_ayah` text NOT NULL,
  `ktp_ibu` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_kelahiran`
--

INSERT INTO `tbl_surat_kelahiran` (`id_surat_kelahiran`, `kode_permohonan`, `nama_anak`, `jenis_kelamin`, `tempat_lahir_anak`, `tgl_lahir_anak`, `waktu_lahir`, `nama_rs`, `alamat_rs`, `nik_ayah`, `nama_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `no_telp`, `email`, `pekerjaan_ayah`, `alamat_ayah`, `nik_ibu`, `nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `kk`, `ktp_ayah`, `ktp_ibu`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 288128, 'anak', 'Laki-Laki', 'tempat', '2023-12-25', '13:23', 'nama', 'alamat', '12313221', 'nama ayah', 'tempat lahir ayah', '2023-12-25', '085756678029', 'pangestu2612@gmail.com', 'kerja', 'tangeragn', '1234', 'nama ibu', 'jakarta', '2024-01-01', 'kerja', '', '92a8c3463b64fb4b6561b3b0c92c490c.jpg', 'a994d351ddff1cc18f6f3705995a370e.jpg', '08a63b0d5d16e9d534c852609a7d866d.jpg', 1, 'testing', 'admin', NULL, '2023-12-28 04:35:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_kematian`
--

CREATE TABLE `tbl_surat_kematian` (
  `id_surat_kematian` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_kematian` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nik_pelapor` varchar(16) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `lampiran_surat` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_kematian`
--

INSERT INTO `tbl_surat_kematian` (`id_surat_kematian`, `kode_permohonan`, `nik`, `nama`, `tgl_lahir`, `tgl_kematian`, `jenis_kelamin`, `nik_pelapor`, `nama_pelapor`, `no_telp`, `email`, `alamat`, `ktp`, `kk`, `lampiran_surat`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 556978, '123', 'tes', '2023-12-28', '2023-12-21', 'Laki-Laki', '12', 'nama pelapor', '087771831145', 'pangestu2612@gmail.com', 'KP. KARANGANYAR', 'e19c0cb628984c3cda900b08e23ebee0.jpg', '8557732a407e4ae22c30c4aa6d6e6f2b.jpg', '00dde260e0bae1bba8ac593e79069055.jpg', 1, 'tes', 'admin', NULL, '2023-12-27 19:11:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_pindah`
--

CREATE TABLE `tbl_surat_pindah` (
  `id_surat_pindah` int(10) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `selfi_pemohon` text NOT NULL,
  `surat_pengantar` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_pindah`
--

INSERT INTO `tbl_surat_pindah` (`id_surat_pindah`, `kode_permohonan`, `nik`, `nama`, `email`, `no_telp`, `alamat`, `ktp`, `kk`, `selfi_pemohon`, `surat_pengantar`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 757217, '3671102611970005', '123', 'pangestu2612@gmail.com', '123', 'KP. KARANGANYAR', '69dff0282adabf592a6f91b94035328d.jpg', '5bb51634044c98bec3ccf47ac6cd7f89.jpg', '65c7fd37ed1d3b3ca836c1a9d0da1f95.jpg', '905eb965c0bbcc657889a5bd66154b4f.jpg', 1, '', 'admin', NULL, '2023-12-27 02:02:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `hak_akses`, `waktu`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00 00:00:00'),
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-04-10 07:09:00'),
(3, 'lurah', 'lurah', '9d2a50653cfb887a750a903d363c6be5', 'lurah', '2023-10-14 09:11:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id_warga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah_anggota_keluarga` int(2) NOT NULL,
  `file` text,
  `status` int(2) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `nik`, `password`, `hak_akses`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `email`, `jumlah_anggota_keluarga`, `file`, `status`, `nama_user`, `tanggal`) VALUES
(1, '3671012708670001', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'Budi', 'Laki-Laki', 'Perum Rajeg', '1', '1', 'Rajeg', 'Senopati', 'Tangerang', 'Banten', '15540', '1', '123@gmail.com', 0, 'd268852944c5005fd2ff02883a809fcd.pdf', 1, 'admin', '2023-09-06 09:16:22'),
(2, '3671012708670004', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'Banu', 'Laki-Laki', 'adsa', '1', '1', 'Karawaci', 'Karawaci', 'Tangerang', 'Banten', '15114', '08976543221', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 1, 'admin', '2023-11-23 05:51:16'),
(3, '3671012708670004', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'didi', 'Laki-Laki', 'adsa', '1', '1', '1', '1', '1', '1', '1', '1', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 0, 'admin', '2023-09-10 04:54:21'),
(4, '3671102611970005', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'Julianto', 'Laki-Laki', 'Sepatan', '12', '12', 'Karawaci', 'Sepatan', 'Tangerang', 'Banten', '15520', '08976543211', '1@gmail.com', 1, 'd9f6210d4ba426208b5e53bdfc6b83ba.pdf', 2, 'admin', '2023-09-06 09:49:26'),
(5, '3671012708670004', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'Prastama', 'Laki-Laki', 'adsa', '11', '11', '13', '13', '12', '12', '12', '12', '123@gmail.com', 12, '0d11bb9be34c53288aa0811b359ce3c2.pdf', 1, 'admin', '2023-09-10 04:55:03'),
(6, '3671012708670004', '827ccb0eea8a706c4c34a16891f84e7b', 'warga', 'janu', 'Laki-Laki', 'adsa', '1', '1', '1', '1', '1', '1', '1', '1', '', 1, '4aedc1b313bed38f0f45ca489bcc176d.pdf', 1, 'admin', '2023-09-07 02:10:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jadwal_kegiatan`
--
ALTER TABLE `tbl_jadwal_kegiatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indeks untuk tabel `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  ADD PRIMARY KEY (`id_ktp_baru`);

--
-- Indeks untuk tabel `tbl_permohonan_surat_kelahiran`
--
ALTER TABLE `tbl_permohonan_surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indeks untuk tabel `tbl_permohonan_surat_pendatang`
--
ALTER TABLE `tbl_permohonan_surat_pendatang`
  ADD PRIMARY KEY (`id_surat_pendatang`);

--
-- Indeks untuk tabel `tbl_surat_datang`
--
ALTER TABLE `tbl_surat_datang`
  ADD PRIMARY KEY (`id_surat_datang`);

--
-- Indeks untuk tabel `tbl_surat_kelahiran`
--
ALTER TABLE `tbl_surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indeks untuk tabel `tbl_surat_kematian`
--
ALTER TABLE `tbl_surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`);

--
-- Indeks untuk tabel `tbl_surat_pindah`
--
ALTER TABLE `tbl_surat_pindah`
  ADD PRIMARY KEY (`id_surat_pindah`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_kegiatan`
--
ALTER TABLE `tbl_jadwal_kegiatan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  MODIFY `id_ktp_baru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_permohonan_surat_kelahiran`
--
ALTER TABLE `tbl_permohonan_surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_permohonan_surat_pendatang`
--
ALTER TABLE `tbl_permohonan_surat_pendatang`
  MODIFY `id_surat_pendatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_datang`
--
ALTER TABLE `tbl_surat_datang`
  MODIFY `id_surat_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_kelahiran`
--
ALTER TABLE `tbl_surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_kematian`
--
ALTER TABLE `tbl_surat_kematian`
  MODIFY `id_surat_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_pindah`
--
ALTER TABLE `tbl_surat_pindah`
  MODIFY `id_surat_pindah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
