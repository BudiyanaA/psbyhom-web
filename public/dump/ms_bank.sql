-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Feb 2023 pada 11.06
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psbyhom_hom_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_bank`
--

-- CREATE TABLE `ms_bank` (
--   `BankUUID` varchar(50) NOT NULL,
--   `bank_name` varchar(50) NOT NULL,
--   `bank_account_no` varchar(50) NOT NULL,
--   `bank_account_name` varchar(100) NOT NULL,
--   `status` varchar(2) NOT NULL,
--   `created_by` varchar(50) NOT NULL,
--   `created_date` datetime NOT NULL,
--   `ByUserUUID` varchar(50) NOT NULL,
--   `ByUserIP` varchar(50) NOT NULL,
--   `OnDateTime` datetime NOT NULL
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_bank`
--

INSERT INTO `ms_bank` (`BankUUID`, `bank_name`, `bank_account_no`, `bank_account_name`, `status`, `created_by`, `created_date`, `ByUserUUID`, `ByUserIP`, `OnDateTime`) VALUES
('a9c74b20-5d72-11e8-9fac-ac1f6b451820', 'BCA', '6730259652', 'Engeline Herawati', '00', '', '0000-00-00 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '140.213.13.210', '2019-07-17 12:06:54'),
('875db0b7-09f9-48ae-9b68-2ec6d731e5f8', 'Mandiri', '1420007355448', 'Astrid Hendrianti', '00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '2018-05-22 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '140.213.13.210', '2019-07-17 12:09:55'),
('3a1b9853-7790-11e9-8f37-7824af3a2381', 'E-Wallet Usage', '', '', '99', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_bank`
--
-- ALTER TABLE `ms_bank`
--   ADD PRIMARY KEY (`BankUUID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
