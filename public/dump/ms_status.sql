-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Feb 2023 pada 11.00
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
-- Struktur dari tabel `ms_status`
--

-- CREATE TABLE `ms_status` (
--   `StatusUUID` varchar(50) NOT NULL,
--   `status_id` varchar(15) NOT NULL,
--   `status_name` varchar(150) NOT NULL,
--   `created_by` varchar(50) NOT NULL,
--   `type` varchar(11) NOT NULL
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_status`
--

INSERT INTO `ms_status` (`StatusUUID`, `status_id`, `status_name`, `created_by`, `type`) VALUES
('1', '00', 'Pending Quotation', '', 'RO'),
('2', '01', 'Waiting Your Approval', '', 'RO'),
('3', '00', 'Pending Admin Payment Verification', '', ''),
('4', '01', 'Waiting Down Payment', '', ''),
('5', '02', 'Processed', '', ''),
('6', '03', 'Processed', '', ''),
('7', '04', 'Waiting Last Payment', '', ''),
('8', '05', 'Pending Admin Payment Verification', '', ''),
('9', '06', 'Ready to Ship', '', ''),
('10', '07', 'Shipped', '', ''),
('11', '08', 'Invalid Payment', '', ''),
('12', '09', 'Cancelled', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_status`
--
-- ALTER TABLE `ms_status`
--   ADD PRIMARY KEY (`StatusUUID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
