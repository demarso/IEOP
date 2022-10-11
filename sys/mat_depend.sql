-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 06/10/2011 às 08h48min
-- Versão do Servidor: 5.0.92
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `ieopcom_ieop`
--

USE `ieopcom_ieop`;

CREATE TABLE IF NOT EXISTS `materia_depend` (
  `id` int(2) NOT NULL auto_increment,
  `Materia` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `materia_depend`
--

INSERT INTO `materia_depend` (`id`, `Materia`) VALUES
(1, 'Português'),
(2, 'Álgebra'),
(3, 'Geometria'),
(4, 'Inglês'),
(5, 'Artes'),
(6, 'Ed. Física'),
(7, 'Ciências'),
(8, 'Geografia'),
(9, 'História'),
(10, 'Espanhol'),
(11, 'Ensino Religioso');