-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Feb 2023 pada 03.16
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
-- Struktur dari tabel `sys_param`
--

-- CREATE TABLE `sys_param` (
--   `sys_id` varchar(40) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `value_name` varchar(50) NOT NULL,
--   `value_max` varchar(10) NOT NULL,
--   `value_size` varchar(10) NOT NULL,
--   `value_id` varchar(50) NOT NULL,
--   `value_type` varchar(50) NOT NULL,
--   `value_1` varchar(1000) NOT NULL,
--   `value_2` varchar(50) NOT NULL,
--   `value_3` varchar(50) NOT NULL,
--   `value_4` varchar(50) NOT NULL,
--   `value_5` varchar(50) NOT NULL,
--   `value_position` varchar(10) NOT NULL,
--   `is_inactive` varchar(1) NOT NULL,
--   `ByUserUUID` varchar(50) NOT NULL,
--   `ByUserIP` varchar(40) NOT NULL,
--   `OnDateTime` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sys_param`
--

INSERT INTO `sys_param` (`sys_id`, `name`, `value_name`, `value_max`, `value_size`, `value_id`, `value_type`, `value_1`, `value_2`, `value_3`, `value_4`, `value_5`, `value_position`, `is_inactive`, `ByUserUUID`, `ByUserIP`, `OnDateTime`) VALUES
('SYS_PARAM_01', 'Maximum Login Attemp', 'login_attemp', '2', '5', 'login_attemp', 'text', '5', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_02', 'Footer Email Address', 'footer_email_address', '200', '200', 'footer_email_address', 'text', 'Jl. Angin Ribut No 2 Blok 3', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_03', 'Footer Email City Address', 'footer_email_city', '100', '100', 'footer_email_city', 'text', 'Tangerang', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_04', 'Maximum Image per Product', 'max_image_per_product', '1', '1', 'max_image_per_product', 'text', '5', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_05', 'Allowed Image File Type for Upload', 'image_type', '50', '50', 'image_type', 'text', 'png|jpg|jpeg|gif', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_06', 'Max Image File SIze for Upload', 'image_size', '4', '4', 'image_size', 'text', '5000000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_07', 'Max Width of Image for Upload', 'image_width', '4', '4', 'image_width', 'text', '5000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_08', 'Max Height of Image for Upload', 'image_height', '4', '4', 'image_height', 'text', '5000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_09', 'Max Image per Article Gallery', 'max_image_article', '6', '6', 'max_image_article', 'text', '15', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_10', 'Max Image per Product Gallery', 'max_image_gallery', '6', '6', 'max_image_gallery', 'text', '15', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_100', 'Running Text', 'running_text', '100', '100', 'running_text', 'text', 'PO US OPEN DAILY | NEW WEBSITE  - PO US OPEN Everyday - Personal Shopper By Houseofmakeup', '', '', '', '', 'GEN', 'N', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_11', 'Max Slideshow No', 'max_slideshow_no', '2', '2', 'max_slideshow_no', 'text', '5', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_12', 'Logo Image', 'image_logo', '1000', '10000', 'image_logo', 'file', '/img/logo.png', 'image', '100', '100', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_13', 'Website Title', 'website_title', '50', '50', 'website_title', 'text', 'GDPI - Tanah TInggi', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_14', 'Website Tagline', 'website_tag', '50', '50', 'website_tag', 'text', 'Shandy & Yovannie\'s Journey', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_15', 'Footer Contact Phone', 'footer_contact_phone', '50', '50', 'footer_contact_phone', 'text', '1234 5678 902', '', '', '', '', 'FOOT', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_16', 'Admin Email Notification', 'admin_email_notif', '50', '50', 'admin_email_notif', 'text', 'order@psbyhom.com', '', '', '', '', 'FOOT', 'N', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_17', 'Max Image per Photo Gallery', 'max_image', '5', '5', 'max_image', 'text', '15', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_18', 'Allowed File Media Type for Upload ', 'file_type', '50', '50', 'file_type', 'text', 'pdf', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_19', 'Max File Media SIze for Upload', 'file_size', '4', '4', 'file_size', 'text', '7500000000000000000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_20', 'Website Description', 'web_description', '500', '500', 'web_description', 'textarea', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>\n', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_21', 'Slideshow Image WIdth Dimension', 'slide_width', '4', '4', 'slide_width', 'text', '2000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_22', 'Slideshow Image Height Dimension', 'slide_height', '4', '4', 'slide_height', 'text', '2000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_23', 'Main Photo Gallery WIdth Dimension', 'photo_width', '4', '4', 'photo_width', 'text', '2000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_24', 'Main Photo Gallery Height Dimension', 'photo_height', '4', '4', 'photo_height', 'text', '2000', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_25', 'Total Related Article', 'article_related', '4', '4', 'article_related', 'text', '3', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_26', 'Facebook Link', 'facebook_link', '100', '100', 'facebook_link', 'text', 'http://facebook.com', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_27', 'Twitter Link', 'twitter_link', '100', '100', 'twitter_link', 'text', 'http://twitter.com.com', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_28', 'google_link', 'google_link', '100', '100', 'google_link', 'text', 'http://google.com', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_29', 'Bank 1 Name', 'bank_1_name', '100', '100', 'bank_1_name', 'text', 'BCA', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_30', 'Bank 1 Account Name', 'bank_1_acct_name', '100', '100', 'bank_1_acct_name', 'text', 'Shandy Putra Kurnia', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_31', 'Bank 1 Account Number', 'bank_1_acct_no', '100', '100', 'bank_1_acct_no', 'text', '1234567890', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_32', 'Bank 2 Name', 'bank_2_name', '100', '100', 'bank_2_name', 'text', 'CIMB Niaga', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_33', 'Bank 2 Account Name', 'bank_2_acct_name', '100', '100', 'bank_2_acct_name', 'text', 'Shandy Putra Kurnia', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_34', 'Bank 2 Account Number', 'bank_2_acct_no', '100', '100', 'bank_2_acct_no', 'text', '1234567890', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_38', 'Default_city', 'default_city', '100', '100', 'default_city', 'text', '152', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_39', 'Footer Address Email Notif', 'footer_notif_address', '300', '400', 'footer_notif_address', 'text', 'Jl. Angin Ribut 3 No 45', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_40', 'Footer City Email Notif', 'footer_notif_city', '100', '100', 'footer_notif_city', 'text', 'Jakarta Barat', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_41', 'Footer Phone Notif', 'footer_notif_phone', '100', '100', 'footer_notif_phone', 'text', '(021)585242', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_42', 'Footer Fax Notif', 'footer_notif_fax', '100', '100', 'footer_notif_fax', 'text', '(021)585242', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_43', 'Footer Email Notif', 'footer_notif_email', '100', '100', 'footer_notif_email', 'text', 'info@psbyhom.com', '', '', '', '', 'GEN', 'N', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_44', 'USD Exhange Rate', 'exchange_rate', '100', '100', 'exchange_rate', 'text', '16000', '', '', '', '', 'GEN', 'N', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_99', 'SGD Exhange Rate', 'exchange_rate_sgd', '100', '100', 'exchange_rate_sgd', 'text', '13000', '', '', '', '', 'GEN', 'N', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_45', 'Calculate Price Factor', 'factor', '100', '100', 'factor', 'text', '1.07', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32'),
('SYS_PARAM_63', 'Path Header Pages', 'Path Header Pages', '100', '100', 'rekening_bca', 'text', '0', '', '', '', '', 'GEN', 'Y', 'be1236a9-0b74-11e2-8d29-b8ac6fc3234d', '127.0.0.1', '2012-10-05 10:12:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sys_param`
--
ALTER TABLE `sys_param`
  ADD UNIQUE KEY `sys_id` (`sys_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
