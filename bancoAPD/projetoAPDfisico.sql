-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 16/10/2018 às 09:06
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoapd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cfp`
--

CREATE TABLE `cfp` (
  `registro` int(11) NOT NULL,
  `nome_psicologo` varchar(100) NOT NULL,
  `cpf` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cfp`
--

INSERT INTO `cfp` (`registro`, `nome_psicologo`, `cpf`) VALUES
(11111, 'Carol Psicologa', 11111111111),
(11984, 'Florence Doyle', 44073067931),
(12205, 'Riley English', 56626397877),
(12345, 'Leonardo Adriano', 12345678999),
(12559, 'Latoria Maxwell', 39980027827),
(14173, 'Lynn Carpenter', 95080390603),
(15103, 'Williemae Bennett', 69584711300),
(15768, 'Louis Henry', 86512214951),
(16493, 'Eddie Atkinson', 27335063400),
(16598, 'Bebe Donnelly', 43143406810),
(17335, 'Oliva Field', 14843658014),
(22633, 'Kristin Eaton', 39393758107),
(23491, 'Joesph Sheppard', 128369230),
(23576, 'Hermelinda Denton', 68753907442),
(24886, 'Carmela Driscoll', 40588294195),
(25819, 'Marshall Carey', 59460892426),
(26096, 'Jordon Shields', 86472119520),
(28122, 'Maire Power', 75004451990),
(29089, 'Verla Cox', 9974392209),
(32679, 'Donovan Lane', 20738041360),
(32709, 'Diamond Marriott', 14176620692),
(33740, 'Amelia Blake', 42293637530),
(36910, 'Corrinne Rich', 67155222860),
(40262, 'Nella Barnett', 52445005540),
(42736, 'Candida Cottrell', 68026904460),
(43596, 'Shaun Rowland', 80578056330),
(43779, 'Han Brookes', 59862092149),
(45176, 'Vi Mclean', 753273411),
(45375, 'Ali Boyce', 44632165166),
(46764, 'Mei Fowler', 2850957909),
(47872, 'Windy Irving', 24406091700),
(48456, 'Tisha Bryan', 45840848158),
(52429, 'Ginger Macdonald', 88124594040),
(52583, 'Malissa Davie', 14837955193),
(52976, 'Danyel Wells', 11838226346),
(54420, 'Amado Macfarlane', 83218341752),
(61974, 'Lanita Reilly', 45446746031),
(66956, 'Deeanna Crisp', 26292263525),
(70717, 'Columbus Baird', 44680760389),
(72099, 'Sommer Stacey', 53732570797),
(73021, 'Carrie Clay', 43223877649),
(76214, 'Randy Baker', 52905375540),
(77812, 'Lenard Storer', 54135363997),
(83004, 'Rosaline Kaur', 52432678214),
(85255, 'Chung Sheldon', 70623636344),
(86627, 'Ted Stanton', 9705740100),
(89412, 'Setsuko Stevenson', 74025537109),
(95582, 'Asia Perry', 48598607487),
(95883, 'John Broughton', 22723244369),
(96208, 'Jame Hibbert', 89114998629),
(97936, 'Blanca Pugh', 69042903740),
(98381, 'Lekisha Nicol', 7287742837);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `texto_comentario` varchar(2000) NOT NULL,
  `postagem_cod_postagem` int(11) NOT NULL,
  `usuario_cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`cod_comentario`, `dt_comentario`, `texto_comentario`, `postagem_cod_postagem`, `usuario_cod_usuario`) VALUES
(15, '2018-10-16 11:48:43', 'Oi Victor! Acho que essa coisa de descrever o que a gente sente Ã© um pouco difÃ­cil, eu sofro de ansiedade e tenho crises de pÃ¢nico, mas nÃ£o consigo descrever bem. Parece que as palavras que eu uso para descrever tudo nÃ£o sÃ£o o suficiente. Ã‰ uma sensaÃ§Ã£o muito ruim, como se vocÃª perdesse o controle de tudo, como se vocÃª nÃ£o tivesse a capacidade de controlar o prÃ³prio corpo. O meu coraÃ§Ã£o acelerava, parecia que meu peito estava sendo esmagado, ficava com tontura, vontade de vomitar.  Aqui na comunidade tem vÃ¡rios artigos, eu salvei esses aqui logo que entrei, dÃ¡ uma olhada, e com certeza tem mais: https://br.mundopsicologos.com/artigos/5-pensamentos-de-uma-pessoa-ansiosa https://br.mundopsicologos.com/artigos/stress-sobrecarga-psicologica https://br.mundopsicologos.com/artigos/como-identificar-uma-crise-de-panico Mas o melhor Ã© vocÃª ir em algum mÃ©dico, porque por mais que a gente ache que tem uma coisa, sÃ³ o mÃ©dico vai poder te diagnosticar e te passar um tratamento. Faz tempo que vocÃª tem se sentindo ansioso?', 32, 341),
(16, '2018-10-16 11:49:23', 'Victor, acredito que possa ser da ansiedade sim. NÃ£o sou mÃ©dico, entÃ£o nÃ£o posso te dizer nada com certeza, mas pode ser que esses teus tremores sejam uma resposta do teu corpo Ã  ansiedade. Eu tambÃ©m tinha tremores, principalmente quando eu estava tendo as crises de pÃ¢nico, e junto a sensaÃ§Ã£o era horrÃ­vel. VocÃª nunca chegou a ir em algum mÃ©dico para ver o que realmente estÃ¡ acontecendo com vocÃª? Eu sei bem como Ã© conviver com a ansiedade e eu relutei bastante para buscar ajuda no inÃ­cio, deixei as coisas tomarem uma proporÃ§Ã£o desnecessÃ¡ria.', 31, 341);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conversa`
--

CREATE TABLE `conversa` (
  `cod_usuario1` int(11) NOT NULL,
  `cod_usuario2` int(11) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `cod_mensagem` int(11) NOT NULL,
  `dt_mensagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `conversa`
--

INSERT INTO `conversa` (`cod_usuario1`, `cod_usuario2`, `texto`, `cod_mensagem`, `dt_mensagem`) VALUES
(340, 345, 'olÃ¡, estou com problemas', 26, '2018-10-16 11:51:59'),
(340, 341, 'oi, serÃ¡ que vocÃª poderia me ajudar?', 27, '2018-10-16 11:52:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_chat`
--

CREATE TABLE `den_chat` (
  `cod_usuario` int(11) NOT NULL,
  `mensagem_den_chat` varchar(250) NOT NULL,
  `dt_den_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conversa_cod_mensagem` int(11) NOT NULL,
  `cod_den_chat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `den_chat`
--

INSERT INTO `den_chat` (`cod_usuario`, `mensagem_den_chat`, `dt_den_chat`, `conversa_cod_mensagem`, `cod_den_chat`) VALUES
(340, 'oi, serÃ¡ que vocÃª poderia me ajudar?', '2018-10-16 11:52:43', 27, 5),
(340, 'olÃ¡, estou com problemas', '2018-10-16 11:53:14', 26, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_coment`
--

CREATE TABLE `den_coment` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_c` varchar(200) NOT NULL,
  `cod_den_coment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_forum`
--

CREATE TABLE `den_forum` (
  `cod_postagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_f` varchar(200) NOT NULL,
  `cod_den_forum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagens_forum`
--

CREATE TABLE `postagens_forum` (
  `cod_postagem` int(11) NOT NULL,
  `status_postagem` int(11) NOT NULL,
  `texto_postagem` varchar(2000) NOT NULL,
  `titulo_postagem` varchar(75) NOT NULL,
  `data_postagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `postagens_forum`
--

INSERT INTO `postagens_forum` (`cod_postagem`, `status_postagem`, `texto_postagem`, `titulo_postagem`, `data_postagem`, `usuario_cod_usuario`) VALUES
(31, 1, 'Tou sofrendo junto com minha filha , pois ela passa mal , e nao sei mas o que fazer , e ansiedade deixar ela sem ar , sem fome , nÃ£o dorme direito.', 'Minha filha se isola', '2018-10-16 11:45:18', 347);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `cod_tipo_usuario` int(11) NOT NULL,
  `descricao_tipo_usuario` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipo_usuario`, `descricao_tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'psicologo'),
(3, 'comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `email`, `senha`, `cod_tipo_usuario`) VALUES
(340, 'Leonardo Edenir', 'leonardo@edenir', 'bGVvbmFyZG8=', 1),
(341, 'Leonardo Adriano', 'leonardo@adriano', 'bGVvbmFyZG8=', 2),
(343, 'Guilherme Boing', 'guilherme@boing', 'Z3VpbGhlcm1lCg==', 3),
(345, 'Florence Doyle', 'florence@doyle', 'ZmxvcmVuY2U=', 2),
(346, 'Riley English', 'riley@english', 'cmlsZXk=', 3),
(347, 'Latoria Maxwell', 'latoria@maxwell', 'bGF0b3JpYQ==', 3),
(349, 'pc@pc', 'PC@PC', 'cGM=', 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cfp`
--
ALTER TABLE `cfp`
  ADD PRIMARY KEY (`registro`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod_comentario`),
  ADD KEY `fk_comentario_postagens_forum1_idx` (`postagem_cod_postagem`),
  ADD KEY `fk_comentario_usuario1_idx` (`usuario_cod_usuario`);

--
-- Índices de tabela `conversa`
--
ALTER TABLE `conversa`
  ADD PRIMARY KEY (`cod_mensagem`),
  ADD KEY `cod_usuario1` (`cod_usuario1`),
  ADD KEY `cod_usuario2` (`cod_usuario2`);

--
-- Índices de tabela `den_chat`
--
ALTER TABLE `den_chat`
  ADD PRIMARY KEY (`cod_den_chat`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `fk_den_chat_conversa1_idx` (`conversa_cod_mensagem`);

--
-- Índices de tabela `den_coment`
--
ALTER TABLE `den_coment`
  ADD PRIMARY KEY (`cod_den_coment`),
  ADD KEY `cod_comentario` (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `den_forum`
--
ALTER TABLE `den_forum`
  ADD PRIMARY KEY (`cod_den_forum`),
  ADD KEY `cod_postagem` (`cod_postagem`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD PRIMARY KEY (`cod_postagem`),
  ADD KEY `fk_postagens_forum_usuario1_idx1` (`usuario_cod_usuario`);

--
-- Índices de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`cod_tipo_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `fk_usuario_tipo_usuario1_idx1` (`cod_tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `conversa`
--
ALTER TABLE `conversa`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `den_chat`
--
ALTER TABLE `den_chat`
  MODIFY `cod_den_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `den_coment`
--
ALTER TABLE `den_coment`
  MODIFY `cod_den_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `den_forum`
--
ALTER TABLE `den_forum`
  MODIFY `cod_den_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `postagens_forum`
--
ALTER TABLE `postagens_forum`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `conversa`
--
ALTER TABLE `conversa`
  ADD CONSTRAINT `conversa_ibfk_1` FOREIGN KEY (`cod_usuario1`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `conversa_ibfk_2` FOREIGN KEY (`cod_usuario2`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `den_chat`
--
ALTER TABLE `den_chat`
  ADD CONSTRAINT `den_chat_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `fk_den_chat_conversa1` FOREIGN KEY (`conversa_cod_mensagem`) REFERENCES `conversa` (`cod_mensagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `den_coment`
--
ALTER TABLE `den_coment`
  ADD CONSTRAINT `den_coment_ibfk_1` FOREIGN KEY (`cod_comentario`) REFERENCES `comentario` (`cod_comentario`),
  ADD CONSTRAINT `den_coment_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `den_forum`
--
ALTER TABLE `den_forum`
  ADD CONSTRAINT `den_forum_ibfk_1` FOREIGN KEY (`cod_postagem`) REFERENCES `postagens_forum` (`cod_postagem`),
  ADD CONSTRAINT `den_forum_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD CONSTRAINT `fk_postagens_forum_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
