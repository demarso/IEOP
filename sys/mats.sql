-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 21, 2011 as 01:48 PM
-- Versão do Servidor: 5.0.92
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `ieopcom_ieop`
--



CREATE TABLE IF NOT EXISTS `materia_pri_qui` (
 `id` int(2) NOT NULL auto_increment,
 `Materia` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;


INSERT INTO `materia_pri_qui` (`id`, `Materia`) VALUES
(1, 'Português'),
(2, 'Matemática'),
(3, 'História'),
(4, 'Geografia'),
(5, 'Ciências'),
(6, 'Artes'),
(7, 'Ensino Religioso'),
(8, 'Leitura'),
(9, 'Educação Física'),
(10, 'Inglês'),
(11, 'Faltas'),
(12, 'Comportamentto');


CREATE TABLE IF NOT EXISTS `materia_sex_iot` (
  `id` int(2) NOT NULL auto_increment,
  `Materia` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;


INSERT INTO `materia_sex_iot` (`id`, `Materia`) VALUES
(1, 'Português'),
(2, 'Algebra'),
(3, 'Geometria'),
(4, 'Ingles'),
(5, 'Artes'),
(6, 'Ed. Fisica'),
(7, 'Ciências'),
(8, 'Geografia'),
(9, 'História'),
(10, 'Espanhol'),
(11, 'Ensino Religioso'),
(12, 'Comportamentto');

--
-- Estrutura da tabela `materia_nono`
--

CREATE TABLE IF NOT EXISTS `materia_nono` (
  `id` int(2) NOT NULL auto_increment,
  `Materia` varchar(20) character set latin1 collate latin1_general_ci NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;


INSERT INTO `materia_nono` (`id`, `Materia`) VALUES
(1, 'Português'),
(2, 'Algebra'),
(3, 'Geometria'),
(4, 'Ingles'),
(5, 'Artes'),
(6, 'Ed. Fisica'),
(7, 'Ciências'),
(8, 'Geografia'),
(9, 'História'),
(10, 'Espanhol'),
(11, 'Ensino Religioso'),
(12, 'Física'),
(13, 'Química'),
(14, 'Comportamentto');
