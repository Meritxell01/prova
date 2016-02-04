-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2011 at 05:24 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myclientbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcb_clients`
--

DROP TABLE IF EXISTS `mcb_clients`;
CREATE TABLE IF NOT EXISTS `mcb_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL DEFAULT '',
  `client_address` varchar(100) NOT NULL DEFAULT '',
  `client_address_2` varchar(100) NOT NULL DEFAULT '',
  `client_city` varchar(50) NOT NULL DEFAULT '',
  `client_state` varchar(50) NOT NULL DEFAULT '',
  `client_zip` varchar(10) NOT NULL DEFAULT '',
  `client_country` varchar(50) NOT NULL DEFAULT '',
  `client_phone_number` varchar(25) NOT NULL DEFAULT '',
  `client_fax_number` varchar(25) NOT NULL DEFAULT '',
  `client_mobile_number` varchar(25) NOT NULL DEFAULT '',
  `client_email_address` varchar(100) NOT NULL DEFAULT '',
  `client_web_address` varchar(255) NOT NULL DEFAULT '',
  `client_notes` longtext,
  `client_tax_id` varchar(25) NOT NULL DEFAULT '',
  `client_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mcb_clients`
--

INSERT INTO `mcb_clients` VALUES(2, 'A Sample Customer', '', '', '', '', '', '', '', '', '', '', '', '', '124242423', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_client_data`
--

DROP TABLE IF EXISTS `mcb_client_data`;
CREATE TABLE IF NOT EXISTS `mcb_client_data` (
  `mcb_client_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `mcb_client_key` varchar(50) NOT NULL DEFAULT '',
  `mcb_client_value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`mcb_client_data_id`),
  KEY `client_id` (`client_id`),
  KEY `mcb_client_key` (`mcb_client_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mcb_client_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_contacts`
--

DROP TABLE IF EXISTS `mcb_contacts`;
CREATE TABLE IF NOT EXISTS `mcb_contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `address_2` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(50) NOT NULL DEFAULT '',
  `zip` varchar(10) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  `phone_number` varchar(25) NOT NULL DEFAULT '',
  `fax_number` varchar(25) NOT NULL DEFAULT '',
  `mobile_number` varchar(25) NOT NULL DEFAULT '',
  `email_address` varchar(100) NOT NULL DEFAULT '',
  `web_address` varchar(255) NOT NULL DEFAULT '',
  `notes` longtext,
  PRIMARY KEY (`contact_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mcb_contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_data`
--

DROP TABLE IF EXISTS `mcb_data`;
CREATE TABLE IF NOT EXISTS `mcb_data` (
  `mcb_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcb_key` varchar(50) NOT NULL DEFAULT '',
  `mcb_value` varchar(255) DEFAULT '',
  PRIMARY KEY (`mcb_data_id`),
  UNIQUE KEY `mcb_data_key` (`mcb_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `mcb_data`
--

INSERT INTO `mcb_data` VALUES(1, 'default_tax_rate_id', '2');
INSERT INTO `mcb_data` VALUES(2, 'default_item_tax_rate_id', '2');
INSERT INTO `mcb_data` VALUES(3, 'currency_symbol', '$');
INSERT INTO `mcb_data` VALUES(4, 'dashboard_show_open_invoices', 'TRUE');
INSERT INTO `mcb_data` VALUES(5, 'dashboard_show_closed_invoices', 'TRUE');
INSERT INTO `mcb_data` VALUES(6, 'default_date_format', 'd/m/Y');
INSERT INTO `mcb_data` VALUES(7, 'default_date_format_mask', '99/99/9999');
INSERT INTO `mcb_data` VALUES(8, 'default_date_format_picker', 'dd/mm/yy');
INSERT INTO `mcb_data` VALUES(9, 'default_invoice_template', 'default');
INSERT INTO `mcb_data` VALUES(10, 'currency_symbol_placement', 'before');
INSERT INTO `mcb_data` VALUES(11, 'invoices_due_after', '15');
INSERT INTO `mcb_data` VALUES(12, 'pdf_plugin', 'mpdf');
INSERT INTO `mcb_data` VALUES(13, 'email_protocol', 'php_mail_function');
INSERT INTO `mcb_data` VALUES(14, 'dashboard_show_pending_invoices', 'TRUE');
INSERT INTO `mcb_data` VALUES(15, 'default_open_status_id', '1');
INSERT INTO `mcb_data` VALUES(16, 'default_closed_status_id', '3');
INSERT INTO `mcb_data` VALUES(17, 'default_language', 'english');
INSERT INTO `mcb_data` VALUES(18, 'include_logo_on_invoice', 'FALSE');
INSERT INTO `mcb_data` VALUES(19, 'dashboard_show_overdue_invoices', 'TRUE');
INSERT INTO `mcb_data` VALUES(20, 'decimal_taxes_num', '2');
INSERT INTO `mcb_data` VALUES(21, 'default_receipt_template', 'default');
INSERT INTO `mcb_data` VALUES(22, 'dashboard_override', '');
INSERT INTO `mcb_data` VALUES(23, 'decimal_symbol', '.');
INSERT INTO `mcb_data` VALUES(24, 'thousands_separator', ',');
INSERT INTO `mcb_data` VALUES(25, 'default_quote_template', 'default_quote');
INSERT INTO `mcb_data` VALUES(26, 'results_per_page', '15');
INSERT INTO `mcb_data` VALUES(27, 'display_quantity_decimals', '1');
INSERT INTO `mcb_data` VALUES(28, 'default_invoice_group_id', '1');
INSERT INTO `mcb_data` VALUES(29, 'disable_invoice_audit_history', '0');
INSERT INTO `mcb_data` VALUES(30, 'default_quote_group_id', '2');
INSERT INTO `mcb_data` VALUES(31, 'version', '0.9.5');
INSERT INTO `mcb_data` VALUES(32, 'enable_profiler', '0');
INSERT INTO `mcb_data` VALUES(33, 'application_title', '0');
INSERT INTO `mcb_data` VALUES(34, 'dashboard_total_paid_cutoff_date', '0');
INSERT INTO `mcb_data` VALUES(35, 'default_tax_rate_option', '1');
INSERT INTO `mcb_data` VALUES(36, 'cron_key', '');
INSERT INTO `mcb_data` VALUES(37, 'sendmail_path', '');
INSERT INTO `mcb_data` VALUES(38, 'smtp_host', '');
INSERT INTO `mcb_data` VALUES(39, 'smtp_user', '');
INSERT INTO `mcb_data` VALUES(40, 'smtp_pass', '');
INSERT INTO `mcb_data` VALUES(41, 'smtp_port', '');
INSERT INTO `mcb_data` VALUES(42, 'smtp_timeout', '');
INSERT INTO `mcb_data` VALUES(43, 'default_cc', '');
INSERT INTO `mcb_data` VALUES(44, 'default_bcc', '');
INSERT INTO `mcb_data` VALUES(45, 'email_footer', '');
INSERT INTO `mcb_data` VALUES(46, 'default_email_body', '0');
INSERT INTO `mcb_data` VALUES(47, 'cc_enable_client_tax_id', '0');
INSERT INTO `mcb_data` VALUES(48, 'cc_enable_client_address', '0');
INSERT INTO `mcb_data` VALUES(49, 'cc_enable_client_address_2', '0');
INSERT INTO `mcb_data` VALUES(50, 'cc_enable_client_city', '0');
INSERT INTO `mcb_data` VALUES(51, 'cc_enable_client_state', '0');
INSERT INTO `mcb_data` VALUES(52, 'cc_enable_client_zip', '0');
INSERT INTO `mcb_data` VALUES(53, 'cc_enable_client_country', '0');
INSERT INTO `mcb_data` VALUES(54, 'cc_enable_client_phone_number', '0');
INSERT INTO `mcb_data` VALUES(55, 'cc_enable_client_fax_number', '0');
INSERT INTO `mcb_data` VALUES(56, 'cc_enable_client_mobile_number', '0');
INSERT INTO `mcb_data` VALUES(57, 'cc_enable_client_email_address', '0');
INSERT INTO `mcb_data` VALUES(58, 'cc_enable_client_web_address', '0');
INSERT INTO `mcb_data` VALUES(59, 'cc_edit_enabled', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_fields`
--

DROP TABLE IF EXISTS `mcb_fields`;
CREATE TABLE IF NOT EXISTS `mcb_fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `field_name` varchar(50) NOT NULL DEFAULT '',
  `field_index` int(11) NOT NULL,
  `column_name` varchar(25) NOT NULL DEFAULT '',
  `field_default_value` varchar(255) NOT NULL,
  PRIMARY KEY (`field_id`),
  KEY `object_id` (`object_id`),
  KEY `field_index` (`field_index`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mcb_fields`
--

INSERT INTO `mcb_fields` VALUES(1, 1, 'Terms and Conditions', 1, 'invoice_custom_1', 'If you''re seeing this, you haven''t configured your T&C. Go to System -> Custom Fields to do so.\n1. Sample T&C 1\n2. T&C 2. ');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_inventory`
--

DROP TABLE IF EXISTS `mcb_inventory`;
CREATE TABLE IF NOT EXISTS `mcb_inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_type_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `inventory_name` varchar(255) NOT NULL DEFAULT '',
  `inventory_unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `inventory_description` longtext NOT NULL,
  `inventory_track_stock` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inventory_id`),
  KEY `inventory_type_id` (`inventory_type_id`),
  KEY `tax_rate_id` (`tax_rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mcb_inventory`
--

INSERT INTO `mcb_inventory` VALUES(4, 0, 1, 'A sample item', 1.00, 'Description of item', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_inventory_stock`
--

DROP TABLE IF EXISTS `mcb_inventory_stock`;
CREATE TABLE IF NOT EXISTS `mcb_inventory_stock` (
  `inventory_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) NOT NULL,
  `invoice_item_id` int(11) NOT NULL,
  `inventory_stock_quantity` decimal(10,2) NOT NULL DEFAULT '0.00',
  `inventory_stock_date` varchar(14) NOT NULL,
  `inventory_stock_notes` longtext NOT NULL,
  PRIMARY KEY (`inventory_stock_id`),
  KEY `inventory_id` (`inventory_id`),
  KEY `invoice_item_id` (`invoice_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mcb_inventory_stock`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_inventory_types`
--

DROP TABLE IF EXISTS `mcb_inventory_types`;
CREATE TABLE IF NOT EXISTS `mcb_inventory_types` (
  `inventory_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_type` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`inventory_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mcb_inventory_types`
--

INSERT INTO `mcb_inventory_types` VALUES(1, 'A sample inventory type');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoices`
--

DROP TABLE IF EXISTS `mcb_invoices`;
CREATE TABLE IF NOT EXISTS `mcb_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_status_id` int(11) NOT NULL,
  `invoice_date_entered` varchar(25) NOT NULL DEFAULT '',
  `invoice_number` varchar(50) NOT NULL DEFAULT '',
  `invoice_notes` longtext,
  `invoice_due_date` varchar(25) NOT NULL DEFAULT '',
  `invoice_is_quote` int(1) NOT NULL DEFAULT '0',
  `invoice_group_id` int(11) NOT NULL,
  `invoice_custom_1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  KEY `invoice_status_id` (`invoice_status_id`),
  KEY `is_quote` (`invoice_is_quote`),
  KEY `invoice_group_id` (`invoice_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mcb_invoices`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_amounts`
--

DROP TABLE IF EXISTS `mcb_invoice_amounts`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_amounts` (
  `invoice_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_item_taxable` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_item_tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_shipping` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invoice_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`invoice_amount_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mcb_invoice_amounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_groups`
--

DROP TABLE IF EXISTS `mcb_invoice_groups`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_groups` (
  `invoice_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_group_name` varchar(50) NOT NULL DEFAULT '',
  `invoice_group_prefix` varchar(10) NOT NULL DEFAULT '',
  `invoice_group_next_id` int(11) NOT NULL,
  `invoice_group_left_pad` int(2) NOT NULL,
  `invoice_group_prefix_year` int(1) NOT NULL DEFAULT '0',
  `invoice_group_prefix_month` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`invoice_group_id`),
  KEY `invoice_group_next_id` (`invoice_group_next_id`),
  KEY `invoice_group_left_pad` (`invoice_group_left_pad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mcb_invoice_groups`
--

INSERT INTO `mcb_invoice_groups` VALUES(1, 'InvoiceID', 'I', 1, 7, 1, 0);
INSERT INTO `mcb_invoice_groups` VALUES(2, 'QuotationID', 'Q', 1, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_history`
--

DROP TABLE IF EXISTS `mcb_invoice_history`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_history` (
  `invoice_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_history_date` varchar(14) NOT NULL DEFAULT '',
  `invoice_history_data` longtext,
  PRIMARY KEY (`invoice_history_id`),
  KEY `user_id` (`user_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `mcb_invoice_history`
--

INSERT INTO `mcb_invoice_history` VALUES(23, 2, 1, '1318609993', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(20, 3, 1, '1318609926', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(21, 1, 1, '1318609928', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(19, 4, 1, '1318609922', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(22, 5, 1, '1318609935', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(65, 6, 1, '1318858236', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(66, 10, 1, '1318858238', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(71, 11, 1, '1318858892', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(62, 9, 1, '1318858228', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(63, 8, 1, '1318858230', 'Deleted Invoice');
INSERT INTO `mcb_invoice_history` VALUES(64, 7, 1, '1318858235', 'Deleted Invoice');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_items`
--

DROP TABLE IF EXISTS `mcb_invoice_items`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_items` (
  `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `item_name` longtext,
  `item_description` longtext NOT NULL,
  `item_date` varchar(14) NOT NULL,
  `item_qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_rate_id` int(11) NOT NULL DEFAULT '0',
  `is_taxable` int(1) NOT NULL DEFAULT '0',
  `item_tax_option` int(1) NOT NULL DEFAULT '0',
  `item_order` int(11) NOT NULL,
  PRIMARY KEY (`invoice_item_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `tax_rate_id` (`tax_rate_id`),
  KEY `inventory_id` (`inventory_id`),
  KEY `item_order` (`item_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mcb_invoice_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_item_amounts`
--

DROP TABLE IF EXISTS `mcb_invoice_item_amounts`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_item_amounts` (
  `invoice_item_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_item_id` int(11) NOT NULL,
  `item_subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`invoice_item_amount_id`),
  KEY `invoice_item_id` (`invoice_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mcb_invoice_item_amounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_statuses`
--

DROP TABLE IF EXISTS `mcb_invoice_statuses`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_statuses` (
  `invoice_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_status` varchar(255) NOT NULL DEFAULT '',
  `invoice_status_type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`invoice_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mcb_invoice_statuses`
--

INSERT INTO `mcb_invoice_statuses` VALUES(1, 'Open', 1);
INSERT INTO `mcb_invoice_statuses` VALUES(2, 'Pending', 2);
INSERT INTO `mcb_invoice_statuses` VALUES(3, 'Closed', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_tags`
--

DROP TABLE IF EXISTS `mcb_invoice_tags`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_tags` (
  `invoice_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_tag_id`),
  KEY `invoice_id` (`invoice_id`,`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mcb_invoice_tags`
--

INSERT INTO `mcb_invoice_tags` VALUES(1, 2, 1);
INSERT INTO `mcb_invoice_tags` VALUES(2, 2, 2);
INSERT INTO `mcb_invoice_tags` VALUES(3, 2, 3);
INSERT INTO `mcb_invoice_tags` VALUES(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_invoice_tax_rates`
--

DROP TABLE IF EXISTS `mcb_invoice_tax_rates`;
CREATE TABLE IF NOT EXISTS `mcb_invoice_tax_rates` (
  `invoice_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `tax_rate_option` int(1) NOT NULL DEFAULT '1',
  `tax_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`invoice_tax_rate_id`),
  KEY `invoice_id` (`invoice_id`,`tax_rate_id`),
  KEY `tax_rate_option` (`tax_rate_option`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mcb_invoice_tax_rates`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_modules`
--

DROP TABLE IF EXISTS `mcb_modules`;
CREATE TABLE IF NOT EXISTS `mcb_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_path` varchar(50) NOT NULL DEFAULT '',
  `module_name` varchar(50) NOT NULL DEFAULT '',
  `module_description` varchar(255) NOT NULL DEFAULT '',
  `module_enabled` int(1) NOT NULL DEFAULT '0',
  `module_author` varchar(50) NOT NULL DEFAULT '',
  `module_homepage` varchar(255) NOT NULL DEFAULT '',
  `module_version` varchar(25) NOT NULL DEFAULT '',
  `module_available_version` varchar(25) NOT NULL DEFAULT '',
  `module_config` longtext,
  `module_core` int(1) NOT NULL DEFAULT '0',
  `module_order` int(2) NOT NULL DEFAULT '99',
  PRIMARY KEY (`module_id`),
  KEY `module_order` (`module_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mcb_modules`
--

INSERT INTO `mcb_modules` VALUES(1, 'client_center', 'Client Center', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:36:"client_center/admin_settings/display";s:13:"settings_save";s:33:"client_center/admin_settings/save";}', 1, 99);
INSERT INTO `mcb_modules` VALUES(2, 'dashboard', 'Dashboard', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:36:"dashboard/dashboard_settings/display";s:13:"settings_save";s:33:"dashboard/dashboard_settings/save";}', 1, 2);
INSERT INTO `mcb_modules` VALUES(3, 'inventory', 'Inventory', '', 0, '', '', '', '', 'a:0:{}', 1, 4);
INSERT INTO `mcb_modules` VALUES(4, 'invoice_search', 'Invoice Search', '', 0, '', '', '', '', 'a:0:{}', 1, 99);
INSERT INTO `mcb_modules` VALUES(5, 'invoices', 'Invoices', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:33:"invoices/invoice_settings/display";s:13:"settings_save";s:30:"invoices/invoice_settings/save";}', 1, 3);
INSERT INTO `mcb_modules` VALUES(6, 'mailer', 'Email', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:23:"mailer/display_settings";s:13:"settings_save";s:20:"mailer/save_settings";}', 1, 5);
INSERT INTO `mcb_modules` VALUES(7, 'payments', 'Payments', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:33:"payments/payment_settings/display";s:13:"settings_save";s:30:"payments/payment_settings/save";}', 1, 4);
INSERT INTO `mcb_modules` VALUES(8, 'settings', 'General', '', 0, '', '', '', '', 'a:2:{s:13:"settings_view";s:31:"settings/other_settings/display";s:13:"settings_save";s:28:"settings/other_settings/save";}', 1, 1);
INSERT INTO `mcb_modules` VALUES(9, 'export', 'Export', 'Export data from MyClientBase.', 0, 'Jesse Terry', 'http://www.myclientbase.com', '0.9.3', '0.9.3', NULL, 0, 99);
INSERT INTO `mcb_modules` VALUES(10, 'tasks', 'Tasks', 'A simple task manager which allows task based invoice creation.', 0, 'Jesse Terry', 'http://www.myclientbase.com', '0.9.3', '0.9.3', 'a:4:{s:16:"dashboard_widget";s:22:"tasks/dashboard_widget";s:13:"settings_view";s:27:"tasks/task_settings/display";s:13:"settings_save";s:24:"tasks/task_settings/save";s:14:"dashboard_menu";s:17:"tasks/header_menu";}', 0, 99);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_payments`
--

DROP TABLE IF EXISTS `mcb_payments`;
CREATE TABLE IF NOT EXISTS `mcb_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `payment_date` varchar(25) NOT NULL DEFAULT '',
  `payment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_note` longtext,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mcb_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcb_payment_methods`
--

DROP TABLE IF EXISTS `mcb_payment_methods`;
CREATE TABLE IF NOT EXISTS `mcb_payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(25) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mcb_payment_methods`
--

INSERT INTO `mcb_payment_methods` VALUES(1, 'Cash');
INSERT INTO `mcb_payment_methods` VALUES(2, 'Check');
INSERT INTO `mcb_payment_methods` VALUES(3, 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_tags`
--

DROP TABLE IF EXISTS `mcb_tags`;
CREATE TABLE IF NOT EXISTS `mcb_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mcb_tags`
--

INSERT INTO `mcb_tags` VALUES(1, 'default');
INSERT INTO `mcb_tags` VALUES(2, 'note');
INSERT INTO `mcb_tags` VALUES(3, 'in');
INSERT INTO `mcb_tags` VALUES(4, 'quote');

-- --------------------------------------------------------

--
-- Table structure for table `mcb_tax_rates`
--

DROP TABLE IF EXISTS `mcb_tax_rates`;
CREATE TABLE IF NOT EXISTS `mcb_tax_rates` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_rate_name` varchar(25) NOT NULL DEFAULT '',
  `tax_rate_percent` decimal(5,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`tax_rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mcb_tax_rates`
--

INSERT INTO `mcb_tax_rates` VALUES(1, 'No Tax', 0.00);
INSERT INTO `mcb_tax_rates` VALUES(2, 'GST', 7.00);

-- --------------------------------------------------------

--
-- Table structure for table `mcb_users`
--

DROP TABLE IF EXISTS `mcb_users`;
CREATE TABLE IF NOT EXISTS `mcb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `address_2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(50) NOT NULL DEFAULT '',
  `zip` varchar(10) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL,
  `phone_number` varchar(25) NOT NULL DEFAULT '',
  `fax_number` varchar(25) NOT NULL DEFAULT '',
  `mobile_number` varchar(25) NOT NULL DEFAULT '',
  `email_address` varchar(100) NOT NULL DEFAULT '',
  `web_address` varchar(255) NOT NULL DEFAULT '',
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `last_login` varchar(25) NOT NULL DEFAULT '',
  `global_admin` int(1) NOT NULL DEFAULT '0',
  `tax_id_number` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mcb_users`
--

INSERT INTO `mcb_users` VALUES(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Person', 'Your Address', '', 'Singapore', '', '-', 'Singapore', '', '', '', 'youremail@company.com', 'yourwebsite.com', 'Your Company', '1318856966', 1, '123');
