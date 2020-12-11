-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2019 às 01:35
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gu1800078`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `service_name` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(16) NOT NULL,
  `atendido` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `name`, `email`, `service_name`, `date`, `timeslot`, `atendido`) VALUES
(32, 10, 'Suelly Mirella Brenna Peres', 'manu.mire@outlook.com', 'Volume Russo', '2019-11-27', '15:00 - 17:00', ''),
(35, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Fio a Fio', '2019-11-29', '13:00 - 15:00', ''),
(36, 10, 'Suelly Mirella Brenna Peres', 'manu.mire@outlook.com', 'Mega Volume', '2019-11-27', '17:00 - 19:00', ''),
(37, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Mega Volume', '2019-12-18', '13:00 - 15:00', ''),
(38, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Fio a Fio', '2019-12-20', '17:00 - 19:00', ''),
(39, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Fio a Fio', '2019-12-31', '13:00 - 15:00', ''),
(40, 10, 'Suelly Mirella Brenna Peres', 'manu.mire@outlook.com', 'Volume Russo', '2019-12-24', '13:00 - 15:00', ''),
(41, 16, 'Caroline Lira Albuquerque', 'keron@gmail.com', 'Mega Volume', '2019-12-06', '13:00 - 15:00', ''),
(42, 16, 'Caroline Lira Albuquerque', 'keron@gmail.com', 'Volume Russo', '2019-12-18', '17:00 - 19:00', ''),
(43, 16, 'Caroline Lira Albuquerque', 'keron@gmail.com', 'Mega Volume', '2019-12-27', '15:00 - 17:00', ''),
(44, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Volume Russo', '2019-12-13', '13:00 - 15:00', ''),
(45, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Mega Volume', '2019-12-27', '13:00 - 15:00', ''),
(46, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Mega Volume', '2019-12-27', '17:00 - 19:00', ''),
(47, 18, 'Isabela Ferreira', 'rosy22@hotmail.com', 'Fio a Fio', '2019-12-30', '13:00 - 15:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimento`
--

CREATE TABLE `depoimento` (
  `dep_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dep_titulo` varchar(64) NOT NULL,
  `dep_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `depoimento`
--

INSERT INTO `depoimento` (`dep_id`, `user_id`, `dep_titulo`, `dep_text`) VALUES
(11, 13, 'Gostei bastante, maybe', 'Muito bom, minha autoestima está nas alturas agora.....'),
(12, 10, 'Muito bom este sistema hein', 'Só falta a estrelinha...'),
(15, 14, 'Não sobreescreva', 'Por favor, acho ke foi'),
(17, 15, 'estou cansado.... Ainda resisto', 'jjj5'),
(19, 16, 'Adorei!', 'Meus cílios estão incríveis agora, tudo graças ao trabalho desta excelente profissional da estética!!!'),
(20, 17, 'Ótimo', 'Site muito bonito, né?.'),
(21, 18, 'Bem legal!', 'Meus cílios estão incríveis agora :) Graças a este site espetacular, conheci uma grande profissional da área da estética.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `ficha_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `data_nasc` date NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(212) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(128) NOT NULL,
  `cidade` varchar(64) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `resp_nome` varchar(128) DEFAULT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `nasc_resp` varchar(12) NOT NULL,
  `rimel` varchar(12) NOT NULL,
  `alergia` varchar(12) NOT NULL,
  `prob_tir` varchar(12) NOT NULL,
  `gravida` varchar(12) NOT NULL,
  `lado` varchar(12) NOT NULL,
  `trat_onco` varchar(18) NOT NULL,
  `proc_rec` varchar(12) NOT NULL,
  `prob_oc` varchar(12) NOT NULL,
  `prob_out` text NOT NULL,
  `extensao` varchar(32) NOT NULL,
  `data_proc` date NOT NULL,
  `cola` varchar(16) NOT NULL,
  `assinatura` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`ficha_id`, `user_id`, `nome`, `telefone`, `data_nasc`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `resp_nome`, `fone`, `cpf`, `rg`, `nasc_resp`, `rimel`, `alergia`, `prob_tir`, `gravida`, `lado`, `trat_onco`, `proc_rec`, `prob_oc`, `prob_out`, `extensao`, `data_proc`, `cola`, `assinatura`) VALUES
(3, 18, 'Isabela Ferreira', '(93) 9458-30945', '1999-04-28', '11660-440', 'Rua Tertuliano Fogaça', 234, 'Caputera', 'Caraguatatuba', 'SP', '', '', '0', '0', '', 'rimel_nao', 'alergia_nao', 'tireoide_nao', 'gravida_sim', 'lado_dir', 'trat_onco_nao', 'proc_rec_nao', 'prob_oc_nao', 'Não.', 'extensao_mega', '2019-12-27', 'Colante', 'Isabela'),
(4, 10, 'Suelly Mirella Brenna Peres', '(11) 9874-65355', '2004-04-26', '77015-454', '307 Sul Rua 10', 538, 'Plano Diretor Sul', 'Palmas', 'TO', 'Claudineide Ewellynn da Silva Peres', '(65) 8439-4328', '495.564.516-09', '43.875.923-4', '1988-08-06', 'rimel_nao', 'alergia_sim', 'tireoide_nao', 'gravida_nao', 'lado_out', 'trat_onco_sim', 'proc_rec_sim', 'prob_oc_sim', 'Uso óculos', 'extensao_mega', '2019-12-04', 'Permanente', 'Suelly Peres'),
(5, 16, 'Caroline Lira Albuquerque', '(22) 9834-4444', '1998-05-07', '79070-143', 'Travessa C', 798, 'Pioneiros', 'Campo Grande', 'MS', '', '', '', '', '', 'rimel_nao', 'alergia_nao', 'tireoide_nao', 'gravida_nao', 'lado_esq', 'trat_onco_nao', 'proc_rec_nao', 'prob_oc_nao', '', 'extensao_outra', '2019-12-18', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administradores'),
(2, 'members', 'Usuários'),
(3, 'CUBO', 'Desenvolvedores da CUBO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(128) NOT NULL,
  `service_img` varchar(128) NOT NULL,
  `service_description` text NOT NULL,
  `service_details` text NOT NULL,
  `service_price` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_img`, `service_description`, `service_details`, `service_price`) VALUES
(7, 'Fio a Fio', '/public/assets/img/services/c1.png', 'O alongamento de cílios fio a fio traz um método que consiste na aplicação de um fio sintético ou de seda sobre cada cílio natural.', 'Os cílios tradicionais são os clássicos fio a fio, conhecidos mundialmente. São cílios sintéticos colados um a um, em um único cílio natural. <p>Para criar volume nos cílios clássicos é preciso aumentar a densidade, ou seja, aplicar cílios mais grossos e, para isso, é feita uma análise prévia do cílio natural para uma aplicação de extensão ideal para sua estrutura. O procedimento dura em média 2h.</p>', 'R$ 110,00'),
(8, 'Volume Russo', '/public/assets/img/services/c3.png', 'No volume russo é aplicado um leque com maior quantidades de sintéticos e de espessura mais fina e mais leve.', ' No Volume Russo são aplicados de 3 a 7 fios sintéticos em cada fio natural. E também o fio sintético é superleve e o usado nesta técnica, em específico, pesa bem menos do que o utilizado no método Fio a Fio. Afinal, é colocada uma quantidade superior de cílios. <p>A técnica do Volume Russo gera aquele incrível olhas de boneca super atraente.</p><p>Os Cílios Volume Russo permitem uma otimização de tempo e segurança gigantesca, pois ela tem a mais absoluta certeza de que o seu olhar está impecável em todos os momentos.</p>', 'R$ 89,00'),
(9, 'Mega Volume', '/public/assets/img/services/c4.png', 'Essa técnica de extensão cria um efeito muito mais cheio, por sua forma de buquê em cada cílios natural.', 'Se você está buscando cílios ainda mais cheios, uma alternativa é o megavolume. Neste caso, a profissional utiliza uma quantidade de fios ainda maior, entre 8 e 15 ou mais. Ele é o novo serviço da <b>Space Lashes</b> em que são colados acima de seis cílios e cria um efeito muito marcado, denso e volumoso.<p>E ela é ideal para quem já se acostumou com o Volume Russo e deseja o efeito de cílios postiços, nas alturas. A a técnica não dá a sensação de olhar pesado, não dá aparência de cansaço, nem incômodo ou ardência nos olhos.</p>', 'R$ 95,99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_img` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `user_img`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$L5a9mJBwEjimk5gUqCJHaev8g3ugDYtGXhbsRXP/UEieh5d783fRu', 'admin@admin.com', '9878ca9c24feeb9d1263', '$2y$10$puMRRN6T6.mjjl7fgZfO5eQDZvt3snOqIuBHn5vU0ROfvLSYKTxzO', NULL, NULL, NULL, NULL, NULL, 1268889823, 1571669419, 0, 'Admin', 'Istrador', 'ADMIN', '0', ''),
(2, '::1', 'vitoria_souza002@outlook.com', '$2y$12$earXK7zimc.R0ueiHgUiCeSvL3pwC5tKtKWQAngoKJZGVzK6CW5gS', 'vitoria_souza002@outlook.com', NULL, NULL, '1c7e7cb88c9677f9e328', '$2y$10$Fz/2DAtrkZG9.ugr4.nJQOlM8geVbdSj7z/bdU8e46Cvo9TcTSRke', 1570222123, 'ca460ba8ce55ee368eb1db81df2b591b8efcff80', NULL, 1567891665, 1567892781, 1, 'Vitória', 'Souza', '', '+55 (90) 94390-8324', ''),
(3, '::1', 'pamoliva_23@bol.com.br', '$2y$10$TFEYp7iLUzWtp1RFqyVUue8qFP1tX9/ELNM9fKrvMYmFaCBSbfv/W', 'pamoliva_23@bol.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1567892830, NULL, 1, 'Pamela', 'Oliveira', '', '+55 (42) 95670-8320', ''),
(4, '::1', 'joanadinno@gmail.com', '$2y$10$tsfzHDfj5IP.BaRqPe0ibeVkO0kp/WHPKWQXFmIUOOSI9HXhK0EvW', 'joanadinno@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1570410351, 1570410365, 1, 'Joana', 'Carvalho', '', '+55 (25) 92452-7623', ''),
(5, '::1', 'meliand223@hotmail.com', '$2y$10$PO22eaUGZyI/P3Zjc7c8tuqT5c2dNY/uxWYQI2xtn5wsABXTcO1va', 'meliand223@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1571613810, 1571613828, 1, 'Melissa', 'Andrade', '', '+55 (23) 93546-4583', ''),
(6, '::1', 'maria.pereira@hotmail.com', '$2y$10$r6O5rUh4HQt6ds1IMFlfr.aWXlpVIbUyKBJXHkhNma5KsOIL5Jn9S', 'maria.pereira@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1571665795, 1571668724, 1, 'Maria', 'Pereira', '', '+55 (13) 93545-7489', ''),
(7, '::1', 'samela@cubo.if', '$2y$12$Bc3Nfnjmuek.D.fzB6pYZurNLhbxwhWXRjZ6agqzL2MCVEaZRZkki', 'samela@cubo.if', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1571669148, 1572135488, 1, 'Samela', 'Claudino', 'CUBO', '+55 (11) 96017-9646', ''),
(8, '::1', 'shantal@cubo.if', '$2y$10$AO8gvdUNhNoIn.DN2CdtEu7EWLJYLWrd9RoB1AkdQ/vV.0ZhzGdFS', 'shantal@cubo.if', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1571669281, 1571669303, 1, 'Shantal', 'de Morais', 'CUBO', '+55 (11) 98733-6375', ''),
(9, '::1', 'victor@cubo.if', '$2y$12$CRZENYXta1V/dR5xkyFG8eZ8SHayeo11CxgY91HPnPKEvO5P9feDO', 'victor@cubo.if', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1571669378, 1576197232, 1, 'Victor', 'Sousa', 'CUBO', '+55 (11) 99337-8341', ''),
(10, '::1', 'manu.mire@outlook.com', '$2y$10$qk84WtaWWqipf5n6sOPtmup00cs9ogi9LOYWQ2VKJU1Ri4C5z5xni', 'manu.mire@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572128259, 1575293877, 1, 'Suelly Mirella', 'Brenna Peres', NULL, '(11) 9874-65355', 'http://localhost/space_lashes/tmp/Magdalena_Zalejska.jpg'),
(11, '::1', 'isa.bella_nat@pp33.com.br', '$2y$10$dSUebEE6WTH36jyHXlE2X.1KOIGcTB8oDICyG158Y7KZNlP788C1i', 'isa.bella_nat@pp33.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572135476, NULL, 1, 'Isabella', 'Costa', NULL, '(16) 7985-3248', ''),
(12, '::1', 'lilicapaz@hotmail.com', '$2y$10$AO8gvdUNhNoIn.DN2CdtEu7EWLJYLWrd9RoB1AkdQ/vV.0ZhzGdFS', 'lilicapaz@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572732994, 1572803933, 1, 'Aline Cláudia', 'da Paz', NULL, '(22) 9834-74477', 'http://localhost/space_lashes/tmp/Reem_Lashes3_1200x630.jpg'),
(13, '::1', 'jujulinha0054@hotmail.com', '$2y$10$YqkaLSJvVNVO/zdsYmPAruDQ5Rr4J0RYS76uI.5nKuWJSqYpaaALe', 'jujulinha0054@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573332262, 1573341356, 1, 'Júlia Andrade', 'Bittencourt', NULL, '(11) 9745-4634', 'http://localhost/space_lashes/tmp/200947.jpg'),
(14, '::1', 'jonana@gmail.com', '$2y$10$LsugaJqY4zVOrWRtjfOSn.jSp43ALQXGhCaFMQ8VWhtmL2ry3KBvq', 'jonana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573333803, 1573341297, 1, 'Monalisa Ferraz', 'Carvalho', NULL, '(14) 9837-46837', 'http://localhost/space_lashes/tmp/175220.jpg'),
(15, '::1', 'letysgo@bol.com', '$2y$10$.NTIm4jM2A1kOZ6eTJV4s.E2hZYJp7RIkrTrorwNRMM1zQWdRQ3Bi', 'letysgo@bol.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573334273, 1573340855, 1, 'Viviane', 'Muniz e Vargas', NULL, '(33) 2443-5654', 'http://localhost/space_lashes/tmp/83407.jpg'),
(16, '::1', 'keron@gmail.com', '$2y$10$vu3S05RVa0rokkRbayqURet8fSVxSXI/TVWQCA0Xe6SVtQiutrBpq', 'keron@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573335652, 1575296143, 1, 'Caroline', 'Lira Albuquerque', NULL, '(22) 9834-4444', 'http://localhost/space_lashes/tmp/177127.jpg'),
(17, '::1', 'jajafamilia@bol.com', '$2y$10$QXIT9v//FVOvD5XcwStcNOyT4AvjNAToiCeaffbH3PwyRaf78HPgm', 'jajafamilia@bol.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573335859, 1573341166, 1, 'Emília', 'Boaventura Dantas', NULL, '(98) 9575-36248', 'http://localhost/space_lashes/tmp/Imagen_relacionada.jpg'),
(18, '::1', 'rosy22@hotmail.com', '$2y$10$ZzCJNt1ql8neVaoQGFgvLue2L2wfQ61.YbYEo873NPwkMBTxv5bRi', 'rosy22@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573402172, 1576196896, 1, 'Isabela', 'Ferreira', NULL, '(93) 9458-30945', 'http://localhost/space_lashes/tmp/l0v3kdfs.jpg'),
(19, '::1', 'vitor.pds1@gmail.com', '$2y$10$EVwcYZsJg6/q6Mnnixazo.z0MNeyCsj61p/jZSpt720xuSnpErT1u', 'vitor.pds1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1573436885, 1573568631, 1, 'Vitor', 'Souza', NULL, '', NULL),
(20, '::1', 'prof@prado.com', '$2y$12$2BcfwrBJ1qVAhc2.vEvfm.lzLYryvLZ4HmcWA7jmTlu9wZUJH2bvm', 'prof@prado.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1576197211, 1576197264, 1, 'Prof', 'Prado', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(45, 1, 1),
(46, 1, 2),
(33, 2, 2),
(32, 3, 2),
(31, 4, 2),
(44, 5, 2),
(43, 6, 2),
(40, 7, 1),
(41, 7, 2),
(42, 7, 3),
(37, 8, 1),
(38, 8, 2),
(39, 8, 3),
(34, 9, 1),
(35, 9, 2),
(36, 9, 3),
(47, 10, 2),
(48, 11, 2),
(49, 12, 2),
(50, 13, 2),
(51, 14, 2),
(52, 15, 2),
(53, 16, 2),
(54, 17, 2),
(55, 18, 2),
(56, 19, 2),
(58, 20, 1),
(59, 20, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depoimento`
--
ALTER TABLE `depoimento`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`ficha_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `depoimento`
--
ALTER TABLE `depoimento`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `ficha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
