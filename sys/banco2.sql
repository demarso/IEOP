CREATE TABLE IF NOT EXISTS `acesso` (
  `usu` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `addr` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `cnpj` varchar(19) character set utf8 collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `usuns` (
  `id` int(2) NOT NULL auto_increment,
  `login` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `senha` varchar(8) character set utf8 collate utf8_unicode_ci NOT NULL,
  `nome` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuns`
--

INSERT INTO `usuns` (`id`, `login`, `senha`, `nome`) VALUES
(1, 'denilson', 'dms1204','Denilson Soares'),
(1, 'cleusa', 'cleusa','Cleusa');
