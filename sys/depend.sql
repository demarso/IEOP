-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 24, 2011 as 05:02 PM
-- Versão do Servidor: 5.0.92
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `ieopcom_ieop`
--

--
-- Estrutura da tabela `notasDepend`
--

CREATE TABLE IF NOT EXISTS `notasDepend` (
  `id` int(11) NOT NULL auto_increment,
  `Matricula` varchar(14) collate latin1_general_ci NOT NULL,
  `Ano` year(4) NOT NULL,
  `Materia` varchar(20) collate latin1_general_ci NOT NULL,
  `Bim1` varchar(5) collate latin1_general_ci NOT NULL,
  `Bim2` varchar(5) collate latin1_general_ci NOT NULL,
  `Bim3` varchar(5) collate latin1_general_ci NOT NULL,
  `Bim4` varchar(5) collate latin1_general_ci NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

