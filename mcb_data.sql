-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 31-01-2014 a les 09:08:31
-- Versió del servidor: 5.5.35
-- Versió de PHP : 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `ebreinvoice`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `mcb_data`
--

CREATE TABLE IF NOT EXISTS `mcb_data` (
  `mcb_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcb_key` varchar(50) NOT NULL DEFAULT '',
  `mcb_value` varchar(255) DEFAULT '',
  PRIMARY KEY (`mcb_data_id`),
  UNIQUE KEY `mcb_data_key` (`mcb_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Bolcant dades de la taula `mcb_data`
--

INSERT INTO `mcb_data` (`mcb_data_id`, `mcb_key`, `mcb_value`) VALUES
(1, 'default_tax_rate_id', '2'),
(2, 'default_item_tax_rate_id', '2'),
(3, 'currency_symbol', '€'),
(4, 'dashboard_show_open_invoices', 'FALSE'),
(5, 'dashboard_show_closed_invoices', 'TRUE'),
(6, 'default_date_format', 'd/m/Y'),
(7, 'default_date_format_mask', '99/99/9999'),
(8, 'default_date_format_picker', 'dd/mm/yy'),
(9, 'default_invoice_template', 'Factura'),
(10, 'currency_symbol_placement', 'after'),
(11, 'invoices_due_after', '15'),
(12, 'pdf_plugin', 'mpdf'),
(13, 'email_protocol', 'smtp'),
(14, 'dashboard_show_pending_invoices', 'TRUE'),
(15, 'default_open_status_id', '0'),
(16, 'default_closed_status_id', '3'),
(17, 'default_language', 'catala'),
(18, 'include_logo_on_invoice', 'TRUE'),
(19, 'dashboard_show_overdue_invoices', 'TRUE'),
(20, 'decimal_taxes_num', '2'),
(21, 'default_receipt_template', 'default'),
(22, 'dashboard_override', ''),
(23, 'decimal_symbol', ','),
(24, 'thousands_separator', '.'),
(25, 'default_quote_template', 'Pressupost'),
(26, 'results_per_page', '15'),
(27, 'display_quantity_decimals', '1'),
(28, 'default_invoice_group_id', '1'),
(29, 'disable_invoice_audit_history', '0'),
(30, 'default_quote_group_id', '3'),
(31, 'version', '0.9.5'),
(32, 'enable_profiler', '0'),
(33, 'application_title', '0'),
(34, 'dashboard_total_paid_cutoff_date', '0'),
(35, 'default_tax_rate_option', '1'),
(36, 'cron_key', ''),
(37, 'sendmail_path', ''),
(38, 'smtp_host', 'smtp.gmail.com'),
(39, 'smtp_user', 'administracio@ebretic.com'),
(40, 'smtp_pass', 'KmgTGd03'),
(41, 'smtp_port', '465'),
(42, 'smtp_timeout', ''),
(43, 'default_cc', ''),
(44, 'default_bcc', ''),
(45, 'email_footer', ''),
(46, 'default_email_body', '1'),
(47, 'cc_enable_client_tax_id', '0'),
(48, 'cc_enable_client_address', '0'),
(49, 'cc_enable_client_address_2', '0'),
(50, 'cc_enable_client_city', '0'),
(51, 'cc_enable_client_state', '0'),
(52, 'cc_enable_client_zip', '0'),
(53, 'cc_enable_client_country', '0'),
(54, 'cc_enable_client_phone_number', '0'),
(55, 'cc_enable_client_fax_number', '0'),
(56, 'cc_enable_client_mobile_number', '0'),
(57, 'cc_enable_client_email_address', '0'),
(58, 'cc_enable_client_web_address', '0'),
(59, 'cc_edit_enabled', '0'),
(62, 'smtp_security', 'ssl'),
(63, 'invoice_logo', 'logo_ebretic.jpg'),
(64, 'iban1', 'ES04 2100 0019 4002 0070 2332'),
(65, 'iban2', 'ES94 0081 0130 0600 0130 8235');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
