-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Feb 2023 pada 06.25
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
-- Struktur dari tabel `ms_email`
--

-- CREATE TABLE `ms_email` (
--   `EmailUUID` varchar(50) NOT NULL,
--   `email_name` varchar(100) NOT NULL,
--   `email_title` varchar(500) NOT NULL,
--   `email_content` longtext NOT NULL,
--   `email_content_bottom` longtext NOT NULL,
--   `created_date` datetime NOT NULL,
--   `created_by` varchar(50) NOT NULL,
--   `ByUserUUID` varchar(50) NOT NULL,
--   `ByUserIP` varchar(25) NOT NULL,
--   `OnDateTime` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_email`
--

INSERT INTO `ms_email` (`EmailUUID`, `email_name`, `email_title`, `email_content`, `email_content_bottom`, `created_date`, `created_by`, `ByUserUUID`, `ByUserIP`, `OnDateTime`) VALUES
('55bc48fe-ec90-463c-9897-825c5ce3a393', 'Payment Confirmation Notification', 'New Payment Confirmation for PO ID : $po_id', '<p>Dear Admin,</p>\r\n\r\n<p>Customer has submitted payment confirmation for PO ID : $po_id/</p>\r\n\r\n<p>Please verify it&nbsp;</p>\r\n', '', '2019-04-19 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '::1', '2019-04-19 06:54:29'),
('609cd8c1-eb0b-4256-b2c6-e0942abd234e', 'Verified Payment Notification', 'Wohoo! Your Payment Verified $po_id', '<p>Dear $customer_name,</p>\n\n<p>Thankyou! Your Payment&nbsp;Rp. $payment_amount has been <strong>verified</strong>,</p>\n\n<p>Please patiently wait your products to arrive. The ETA is 4-5 weeks after kuota is full. Once your order arrive, we&#39;ll let you know.</p>\n\n<p>and if you finish your 2nd payment, we&#39;ll ship your order ASAP</p>\n\n<p>&nbsp;</p>\n', '', '2019-05-03 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'cf5466f3-e48b-4c23-a69d-3e6ac80dcc01', '139.228.81.120', '2020-11-24 10:20:16'),
('6ebb641b-4028-40fd-b1b2-78fada074132', 'Invoice PO for Last Payment', 'Your Goodies is Coming : $po_id', '<p>Dear $customer_name,</p>\n\n<p>Thank you so much for your patience!</p>\n\n<p>Your goodies&nbsp;has been arrived. We&#39;ll ship them once you pay the bill.</p>\n\n<p>We will send you the tracking number THE DAY AFTER&nbsp;we ship the goodies.</p>\n\n<p>To make a full payment confirmation click <a href=\"http://psbyhom.com/confirm_payment.html\">here</a></p>\n\n<p>Please check your order details below :</p>\n\n<p>&nbsp;</p>\n', '', '2019-04-19 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '118.137.116.85', '2019-11-15 07:42:24'),
('93e9ba8e-5baf-48ef-ae77-862c5a65e09e', 'Request E-Wallet Withdrawal Notification', 'Request E-Wallet Withdrawal : $customer_name', '<p>Dear Admin,</p>\n\n<p>Our customer named $customer_name, is request for withdrawal of his/her E-Wallet as much as Rp. $total_withdrawal. Please contact that customer regarding his/her bank information and process this request in less than 2x24 hours</p>\n', '', '2019-04-25 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '139.228.74.218', '2020-08-28 15:56:12'),
('9db5502b-cddb-4ae9-bd07-060a9fdc629c', 'Quotation ', 'Price Quotation $po_id ', '<p>Hi&nbsp;$customer_name !&nbsp;Thank you for interested PRE ORDER with us.</p>\n\n<p>Here is the price in rupiah.</p>\n\n<p>Please <a href=\"https://psbyhom.com/view_request/$po_id\">click here</a>&nbsp;to make an order.</p>\n\n<p>For check your PO detail:</p>\n', '', '2019-04-22 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '125.161.131.120', '2020-09-08 09:00:22'),
('a89c2b04-b29e-4dea-8efb-e03fb548a28e', 'Reset Password Notification', 'Reset Password', '<p>Dear $customer_name,</p>\n\n<p>Your password has been reset, please click below link to submit new password !</p>\n', '', '2019-06-03 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'cf5466f3-e48b-4c23-a69d-3e6ac80dcc01', '139.228.212.169', '2019-07-18 16:14:21'),
('b1aa97ee-6a1c-4ce5-be19-b664200f2784', 'New Order Notifications', 'New Order House of Makeup PO ID : $po_id', '<p>Dear Admin,</p>\n\n<p>Please verify the new order with PO ID : $po_id&nbsp; which have been submitted by the customer&nbsp;</p>\n', '', '2019-04-19 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '::1', '2019-04-19 09:10:37'),
('c40d3bd4-cd6c-4915-a76f-25c3c7d459a7', 'Invalid Payment Notification', 'House of Makeup - Invalid Payment $po_id', '<p>Dear $customer_name,</p>\n\n<p>The Payment confirmation you&#39;ve submitted is invalid cause after we check in our account balance, we didnt&#39;t find your payment. Please contact our Admin for further information</p>\n', '', '2019-04-23 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '140.213.41.46', '2019-04-23 18:40:50'),
('ce7926a7-126b-474c-b6d8-cdab04f96d88', 'No Resi Notification', 'Yay! Your Order Has Been Shipped $po_id', '<p>Dear $customer_name,</p>\n\n<p>Good News!</p>\n\n<p>Your order has shipped and is on&nbsp;a way.</p>\n\n<p>Here&#39;s your tracking number: $no_resi</p>\n\n<p>Thank you for your order in House of Makeup we looking forward your next order</p>\n', '', '2019-04-19 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '118.137.116.85', '2019-11-20 21:17:12'),
('d5dac8ca-f68d-4122-9b18-da8de83f93f2', 'Refund Notification', 'Goodies Arrived - Cancellation $po_id', '<p>Dear $customer_name,</p>\n\n<p>Thank you for your ordering in House of Makeup, unfortunately some or all of your pre ordered items are not available or cancelled.&nbsp;So we refund your down payment to your E-Wallet as much as&nbsp; Rp. $refund_amount.</p>\n\n<p>To withdraw all your wallet please <a href=\"https://psbyhom.com/view_ewallet.html\">click here</a></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '', '2019-04-25 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '140.213.36.168', '2019-07-18 17:48:03'),
('eb7498f1-0820-4171-a20f-1fe32b5b06e9', 'Invoice for DP', 'Invoice For Down Payment $po_id', '<p>Hi&nbsp;$customer_name!</p>\n\n<p>Your order has been received &amp; will be processed once down payment is confirmed (minimum 50%).</p>\n\n<p>Don&#39;t forget to confirm your payment after make a down payment <a href=\"https://psbyhom.com/confirm_payment.html\">here</a>.</p>\n', '', '2019-04-19 00:00:00', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', 'bddbcbc0-342b-4a4b-9633-5e4dfaaac280', '140.213.36.168', '2019-07-18 18:03:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_email`
--
-- ALTER TABLE `ms_email`
--   ADD PRIMARY KEY (`EmailUUID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
