-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Gera��o: 06/10/2011 �s 08h48min
-- Vers�o do Servidor: 5.0.92
-- Vers�o do PHP: 5.2.9

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
(1, 'Portugu�s'),
(2, '�lgebra'),
(3, 'Geometria'),
(4, 'Ingl�s'),
(5, 'Artes'),
(6, 'Ed. F�sica'),
(7, 'Ci�ncias'),
(8, 'Geografia'),
(9, 'Hist�ria'),
(10, 'Espanhol'),
(11, 'Ensino Religioso');