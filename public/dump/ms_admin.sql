-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Feb 2023 pada 09.26
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
-- Struktur dari tabel `ms_admin`
--

-- CREATE TABLE `ms_admin` (
--   `AdminUUID` varchar(40) NOT NULL,
--   `user_id` varchar(40) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `profile_pict` varchar(500) NOT NULL DEFAULT '\\img\\art_thumb\\default.jpeg',
--   `password` varchar(50) NOT NULL,
--   `email` varchar(50) NOT NULL,
--   `RoleUUID` varchar(50) NOT NULL,
--   `UsergroupUUID` varchar(50) NOT NULL,
--   `user_type` varchar(50) NOT NULL,
--   `created_date` date NOT NULL,
--   `created_by` varchar(40) NOT NULL,
--   `login_attemp` int(2) NOT NULL,
--   `last_logout` datetime NOT NULL,
--   `last_login` datetime NOT NULL,
--   `is_login` varchar(1) NOT NULL,
--   `is_delete` varchar(1) NOT NULL,
--   `is_superadmin` varchar(1) NOT NULL,
--   `status` varchar(10) NOT NULL,
--   `ByUserUUID` varchar(40) NOT NULL,
--   `ByUserIP` varchar(40) NOT NULL,
--   `OnDateTime` datetime NOT NULL,
--   `token_id` varchar(20) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_admin`
--

INSERT INTO `ms_admin` (`AdminUUID`, `user_id`, `name`, `profile_pict`, `password`, `email`, `RoleUUID`, `UsergroupUUID`, `user_type`, `created_date`, `created_by`, `login_attemp`, `last_logout`, `last_login`, `is_login`, `is_delete`, `is_superadmin`, `status`, `ByUserUUID`, `ByUserIP`, `OnDateTime`, `token_id`) VALUES
('7f6a1246-017e-4813-9f34-60abe675e7fe', 'sysadmin2', 'Shandy Kurnia', '/img/user_pict/sysadmin2.JPG', '236929cb4087ee12a735b25939dddbe277521db6', 'shandy.kurnia@ifabula.com', '1e8b5b1d-c3b4-47c8-ae5a-fcd519572e56', '0094eb82-bdc8-4cd1-b367-3f46191b21e5', 'APP', '2015-05-08', '7f6a1246-017e-4813-9f34-60abe675e7fe', 0, '2016-02-11 12:25:49', '2016-02-10 10:41:25', 'N', '0', '0', '01', '7f6a1246-017e-4813-9f34-60abe675e7fe', '::1', '2015-05-06 15:41:03', ''),
('adac2d62-e8a7-4e53-8794-e59834865527', 'bayu288', 'super super admin adawgaagagamin', '\\img\\art_thumb\\default.jpeg', 'd1adcd41f30ae02e0c2dc78b89c536e7ea6c58cb', 'rbayuhananto288@gmail.com', '2dbb1ab1-13fe-4f33-b411-c61e650ef1a7', '', '', '2015-11-11', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 0, '2015-11-11 08:07:43', '2015-11-11 08:07:33', 'N', '0', '', '01', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '112.215.201.168', '2018-07-12 15:44:20', ''),
('bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'admin', 'Administrator', '\\img\\art_thumb\\default.jpeg', 'beb34bfb94c045aaff19446f54758cf44e953888', 'rizky.bayu@ifabula.com', '2dbb1ab1-13fe-4f33-b411-c61e650ef1a7', '0094eb82-bdc8-4cd1-b367-3f46191b21e5', 'ADM', '2015-02-11', '6aff7bda-8a0d-4efc-a721-799eed04e84f', 4, '2021-03-05 11:33:16', '2021-06-28 08:34:18', 'Y', '0', '', '02', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '::1', '2016-01-26 04:10:26', 'JBGHW7UD'),
('cf5466f3-e48b-4c23-a69d-3e6ac80dcc01', 'myadmin', 'myadmin', '\\img\\art_thumb\\default.jpeg', '0ef6d898f184ade8bd830da38e59148c255e1fdb', 'shandy.kingstone@gmail.com', 'd1dc32cd-b12f-4e32-8541-590b1468d279', '', '', '2019-04-02', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 0, '2021-05-10 14:25:36', '2023-02-16 08:04:38', 'Y', '0', '', '01', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '112.215.65.110', '2019-04-02 10:37:09', ''),
('fa26b988-fbe8-4340-a971-40692f9baf52', 'Robot', 'Robot', '\\img\\art_thumb\\default.jpeg', 'd1adcd41f30ae02e0c2dc78b89c536e7ea6c58cb', 'rizkybayuhananto@gmail.com', '2dbb1ab1-13fe-4f33-b411-c61e650ef1a7', '', '', '2016-01-19', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N', '0', '', '01', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '::1', '2016-01-19 07:17:45', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_admin`
--
-- ALTER TABLE `ms_admin`
--   ADD PRIMARY KEY (`AdminUUID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
