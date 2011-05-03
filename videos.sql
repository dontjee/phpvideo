-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2011 at 10:14 PM
-- Server version: 4.1.22
-- PHP Version: 4.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `streaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `filename` varchar(64) NOT NULL default '',
  `hits` int(10) NOT NULL default '1',
  `pagename` text,
  PRIMARY KEY  (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`filename`, `hits`, `pagename`) VALUES
('6_multf_bp33_h_all.flv', 12, 'Bits 2, Prob 3.3, view all'),
('', 49, NULL),
('6_multf_bp3132_h_all.flv', 36, 'Bits 2, Prob 3.1, view all'),
('conn_conn_h_01.flv', 12, 'Connections Clip 1'),
('conn_conn_h_05.flv', 2, 'Connections Clip 5'),
('conn_conn_h_02.flv', 15, 'Connections Clip 2'),
('6_multd_dmult_21_h_all.flv', 6, 'Bits 3, Problem 2.1, view all'),
('conn_conn_h_46.flv', 2, 'Connections Clip 46'),
('conn_conn_h_45.flv', 1, 'Connections Clip 45'),
('conn_conn_h_44.flv', 1, 'Connections Clip 44'),
('conn_conn_h_43.flv', 1, 'Connections Clip 43'),
('conn_conn_h_42.flv', 1, 'Connections Clip 42'),
('conn_conn_h_41.flv', 1, 'Connections Clip 41'),
('conn_conn_h_40.flv', 1, 'Connections Clip 40'),
('conn_conn_h_39.flv', 1, 'Connections Clip 39'),
('conn_conn_h_38.flv', 1, 'Connections Clip 38'),
('conn_conn_h_37.flv', 1, 'Connections Clip 37'),
('conn_conn_h_36.flv', 1, 'Connections Clip 36'),
('conn_conn_h_35.flv', 1, 'Connections Clip 35'),
('conn_conn_h_34.flv', 1, 'Connections Clip 34'),
('conn_conn_h_33.flv', 1, 'Connections Clip 33'),
('conn_conn_h_32.flv', 1, 'Connections Clip 32'),
('conn_conn_h_31.flv', 1, 'Connections Clip 31'),
('conn_conn_h_30.flv', 1, 'Connections Clip 30'),
('conn_conn_h_29.flv', 1, 'Connections Clip 29'),
('conn_conn_h_28.flv', 1, 'Connections Clip 28'),
('conn_conn_h_27.flv', 1, 'Connections Clip 27'),
('conn_conn_h_26.flv', 1, 'Connections Clip 26'),
('conn_conn_h_25.flv', 1, 'Connections Clip 25'),
('conn_conn_h_24.flv', 1, 'Connections Clip 24'),
('conn_conn_h_23.flv', 1, 'Connections Clip 23'),
('conn_conn_h_22.flv', 1, 'Connections Clip 22'),
('conn_conn_h_21.flv', 2, 'Connections Clip 21'),
('conn_conn_h_20.flv', 1, 'Connections Clip 20'),
('conn_conn_h_03.flv', 1, 'Connections Clip 03'),
('conn_conn_h_04.flv', 1, 'Connections Clip 04'),
('conn_conn_h_06.flv', 1, 'Connections Clip 06'),
('conn_conn_h_07.flv', 1, 'Connections Clip 07'),
('conn_conn_h_08.flv', 1, 'Connections Clip 08'),
('conn_conn_h_09.flv', 1, 'Connections Clip 09'),
('conn_conn_h_10.flv', 1, 'Connections Clip 10'),
('conn_conn_h_11.flv', 1, 'Connections Clip 11'),
('conn_conn_h_12.flv', 1, 'Connections Clip 12'),
('conn_conn_h_13.flv', 1, 'Connections Clip 13'),
('conn_conn_h_14.flv', 2, 'Connections Clip 14'),
('conn_conn_h_15.flv', 1, 'Connections Clip 15'),
('conn_conn_h_16.flv', 1, 'Connections Clip 16'),
('conn_conn_h_17.flv', 1, 'Connections Clip 17'),
('conn_conn_h_18.flv', 1, 'Connections Clip 18'),
('conn_conn_h_19.flv', 1, 'Connections Clip 19'),
('8_eqrep_siws13_h_all.flv', 4, 'SIwS, Prob 1.3, view all'),
('6_multd_action_h_all.flv', 1, 'Gr. 6 Action Research, view all'),
('6_multf_skills_h_all.flv', 3, 'Gr. 6 Student Skills, view all'),
('6_multf_studisc_h_all.flv', 22, 'Gr. 6 Student Discourse, view all'),
('6_tq6_h_01.flv', 2, 'Gr. 6 Teacher Questions, ch. 1'),
('6_multf_bp3132_h_03.flv', 8, NULL),
('6_tq6_h_05.flv', 1, 'Gr. 6 Teacher Questions, ch. 5'),
('7_lr_stuusing_h_all.flv', 4, 'MSA, Prob 2.1, Day 1, view all'),
('7_lr_distraction_h_all.flv', 2, 'MSA, Prob 2.1, Day 2, view all'),
('7_lr_classrmnorms_h_all.flv', 12, 'Gr. 7 Classroom Norms, view all'),
('7_lr_mgmt_h_all.flv', 6, 'Gr. 7 Management, view all'),
('8_expdecay_gg_42_h_all.flv', 3, 'GGG, Prob 4.2, view all'),
('8_eqrep_siws11_h_all.flv', 3, 'SIwS, Prob 1.1, view all'),
('8_expdecay_gg_41_h_all.flv', 3, 'GGG, Prob 4.1, view all'),
('6_multf_bp3132_h_01.flv', 1, NULL),
('6_multf_bp3132_h_02.flv', 3, NULL),
('6_multf_bp3132_h_04.flv', 10, NULL),
('8_expdecay_gg_41_h_04.flv', 2, 'GGG, Prob 4.1, ch. 4'),
('6_multf_bp3132_h_05.flv', 2, 'Bits 2, Prob 3.1, ch. 5'),
('6_multf_bp3132_h_07.flv', 4, 'Bits 2, Prob 3.1, ch. 7'),
('6_multf_bp3132_h_06.flv', 1, 'Bits 2, Prob 3.1, ch. 6'),
('6_multf_bp3132_h_08.flv', 5, 'Bits 2, Prob 3.1, ch. 8'),
('6_multf_skills_h_06.flv', 2, 'Gr. 6 Student Skills, ch. 6'),
('6_multf_skills_h_11.flv', 1, 'Gr. 6 Student Skills, ch. 11'),
('6_multf_studisc_h_03.flv', 1, 'Gr. 6 Student Discourse, ch. 3'),
('6_multf_studisc_h_05.flv', 3, 'Gr. 6 Student Discourse, ch. 5'),
('6_multf_studisc_h_06.flv', 2, 'Gr. 6 Student Discourse, ch. 6'),
('8_expdecay_gg_41_h_07.flv', 3, 'GGG, Prob 4.1, ch. 7'),
('8_expdecay_gg_41_h_11.flv', 2, 'GGG, Prob 4.1, ch. 11'),
('8_expdecay_gg_42_h_06.flv', 2, 'GGG, Prob 4.2, ch. 6'),
('8_expdecay_gg_42_h_07.flv', 2, 'GGG, Prob 4.2, ch. 7'),
('6_multf_bp33_h_02.flv', 3, NULL),
('6_multf_bp33_h_03.flv', 3, 'Bits 2, Prob 3.3, ch. 3'),
('6_multf_bp33_h_04.flv', 6, 'Bits 2, Prob 3.3, ch. 4'),
('6_multf_bp33_h_08.flv', 1, 'Bits 2, Prob 3.3, ch. 8'),
('6_multf_studisc_h_02.flv', 1, 'Gr. 6 Student Discourse, ch. 2'),
('6_multf_skills_h_09.flv', 1, 'Gr. 6 Student Skills, ch. 9'),
('6_multf_skills_h_03.flv', 1, 'Gr. 6 Student Skills, ch. 3'),
('8_eqrep_siws11_h_08.flv', 2, 'SIwS, Prob 1.1, ch. 8'),
('8_eqrep_siws11_h_15.flv', 1, 'SIwS, Prob 1.1, ch. 15'),
('6_multf_bp33_h_05.flv', 1, 'Bits 2, Prob 3.3, ch. 5'),
('8_expdecay_reason_h_08.flv', 1, 'GGG, Prob 5.1, ch. 8'),
('8_tq8_h_all.flv', 1, 'Gr. 8 Teacher Questions, view all'),
('6_multd_action_h_06.flv', 1, 'Gr. 6 Action Research, ch. 6'),
('8_expdecay_reason_h_04.flv', 1, 'GGG, Prob 5.1, ch. 4'),
('8_expdecay_reason_l_all.flv', 3, 'GGG, Prob 5.1, view all'),
('7_lr_classrmnorms_h_11.flv', 1, 'Gr. 7 Classroom Norms, ch. 11'),
('7_lr_classrmnorms_h_08.flv', 2, 'Gr. 7 Classroom Norms, ch. 8'),
('7_lr_classrmnorms_h_01.flv', 2, NULL),
('7_lr_classrmnorms_h_05.flv', 1, NULL),
('6_multf_skills_h_01.flv', 1, NULL),
('8_expdecay_reason_h_07.flv', 1, NULL),
('7_lr_makingconn_h_all.flv', 1, NULL);
