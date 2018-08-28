-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 28/08/2018 às 08:26
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
(3, '2018-08-13 18:14:37', 'Sei como vc se sente Henrique.. eu me sinto assim tb.. eu acabei trancando a minha faculdade pq nÃ£o aguentei mais.. mas me sinto ridÃ­cula e inÃºtil por nÃ£o ter aguentado..  eu tb nÃ£o faÃ§o nd.. depois q tranquei a faculdade tentei arranjar um emprego mas nÃ£o consegui.. parece q as pessoas percebem q eu sou uma inÃºtil e nÃ£o querem nem se incomodar em me chamar.. se vc nÃ£o pode pagar, pq vc nÃ£o procura um mÃ©dico pelo SUS? eles podem te encaminhar pro psicÃ³logo..', 23, 341),
(4, '2018-08-13 18:15:10', 'Oi Marcia.. eu sofro com depressÃ£o e acho q se eu tivesse em um relacionamento eu gostaria mto q a pessoa ficasse do meu lado para me apoiar.. mas isso digo por mim e hipoteticamente (jÃ¡ q eu n tenho ngm, pode ser q se eu tivesse eu pensaria diferente)..  mas tem mta gente q tem depressÃ£o e acaba se afastando de td mundo.. pode ser q teu namorado sÃ³ preferisse ficar sozinho, mesmo q ele goste de vc.. q de alguma maneira ele ache q nÃ£o merece vc ou q vc nÃ£o merece passar por isso com ele.. faz tempo q ele terminou com vc??', 21, 341),
(9, '2018-08-13 23:25:55', 'Muitos foram os autores e pensadores que tentaram explicar os sonhos. Por que sonhamos? Eles representam alguma coisa? Jung acreditava que os sonhos consistiam em puras e verdadeiras vontades do nosso inconsciente. E vocÃª, jÃ¡ parou para refletir sobre o motivo de sonharmos?', 22, 345),
(10, '2018-08-13 23:33:26', 'Caro leitor, a crise econÃ´mica acertou em cheio o Brasil em 2015. Em meio a este complexo cenÃ¡rio, a avicultura e a suinocultura foram impactadas em diversos momentos ao longo do ano. Por um lado, custos de produÃ§Ã£o apresentaram elevaÃ§Ã£o, em especial, no segundo semestre, com a alta dos preÃ§os de milho e de soja. Por outro, greves dos caminhoneiros e dos fiscais federais agropecuÃ¡rios reduziram, momentaneamente, o fluxo das exportaÃ§Ãµes. O clima tambÃ©m afetou o ritmo dos embarques, com o fechamento parcial e total do Porto de ItajaÃ­.', 20, 345),
(12, '2018-08-14 11:19:38', 'asdawdsdwdasdawdadas', 28, 349);

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
(343, 341, 'olÃ¡, estou com problemas', 21, '2018-08-14 11:14:21'),
(349, 348, 'ola', 22, '2018-08-14 11:21:43'),
(349, 348, 'tudo bem?', 23, '2018-08-14 11:22:04'),
(348, 349, 'ola', 24, '2018-08-14 11:22:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_chat`
--

CREATE TABLE `den_chat` (
  `cod_usuario` int(11) NOT NULL,
  `texto_den_chat` varchar(250) NOT NULL,
  `dt_den_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conversa_cod_mensagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_coment`
--

CREATE TABLE `den_coment` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_c` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `den_forum`
--

CREATE TABLE `den_forum` (
  `cod_postagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_f` varchar(200) NOT NULL
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
(22, 1, 'Tenho 19 anos, perdi meu emprego que era horrivel mas era o que pagava a minha faculdade, devido a isso tive que trancar meu curso. Fiz algo imperdoÃ¡vel Ã  minha namorada na impulsividade e acabei magoando e perdendo o amor da minha vida, meu pai nÃ£o liga para mim e faz questÃ£o de criticar tudo o que faÃ§o chegando a jÃ¡ ter dito na minha cara que eu nÃ£o tenho nenhuma capacidade em me formar na graduaÃ§Ã£o que escolhi (engenharia mecÃ¢nica) pagava minha faculdade com meu salÃ¡rio e ainda assim ele me criticava sinto um vazio enorme e me sinto sozinho nÃ£o vejo soluÃ§Ã£o pra nada e penso diariamente em suicidio mas nÃ£o tenho coragem o que me faz sentir pior ainda', ' Me sinto um monstro nÃ£o aguento mais viver', '2018-08-13 18:13:51', 343),
(27, 1, 'Apesar disto, a avicultura e a suinocultura\r\nencerraram 2015 com diversos recordes: na\r\nproduÃ§Ã£o e nas exportaÃ§Ãµes de frangos; na\r\nproduÃ§Ã£o e no consumo per capita de suÃ­nos;\r\nna produÃ§Ã£o e no consumo per capita\r\nde ovos. A carne de frango, consolidado\r\ncomo quarto item da pauta exportadora nacional,\r\nalcanÃ§ou em 2015 os trÃªs melhores\r\nresultados mensais da histÃ³ria das exportaÃ§Ãµes\r\ndo setor.\r\nNovos mercados abriram as portas para\r\naves e ovos, e outras foram reabertas para\r\nsuÃ­nos. Outros grandes importadores (como\r\nChina e MÃ©xico) ampliaram os nÃºmeros de\r\nplantas habilitadas (32, no total). ', 'MENSAGEM DO PRESIDENTE', '2018-08-13 23:34:25', 346),
(28, 1, 'Preciso de conselhos como lidar com um adolescente de 11 anos pois esta apresentando um comportamento muito agressivo,mentiroso, esta respondendo como nunca fez,enfrentando e achando que e esta certo em tudo. sou separada e o pai nao da assistÃªncia alguma para ele ele tem um irmÃ£o de 8 anos que ele acha que pode mandar no irmÃ£o.estou namorando ele gosta do meu namorado se da bem com ele mais sente ciumes dele comigo. disse que eu nÃ£o preciso de uma pessoa para cuidar de mim porque ele toma conta de mim . o que devo fazer?', ' adolescentes como lidar?', '2018-08-14 00:05:40', 346),
(29, 1, 'adawdasdwdasdawd', 'dsdasdawdasd', '2018-08-14 11:19:11', 349);

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
(340, 'Leonardo Edenir', 'leonardo@edenir', 'leonardo', 1),
(341, 'Leonardo Adriano', 'leonardo@adriano', 'leonardo', 2),
(343, 'Guilherme Boing', 'guilherme@boing', 'guilherme', 3),
(345, 'Florence Doyle', 'florence@doyle', 'florence', 2),
(346, 'Riley English', 'riley@english', 'riley', 2),
(347, 'Latoria Maxwell', 'latoria@maxwell', 'latoria', 2),
(348, 'Lynn Carpenter', 'Lynn@Carpenter', 'lynn', 2),
(349, 'pc@pc', 'PC@PC', 'pc', 3);

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
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `fk_den_chat_conversa1_idx` (`conversa_cod_mensagem`);

--
-- Índices de tabela `den_coment`
--
ALTER TABLE `den_coment`
  ADD KEY `cod_comentario` (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `den_forum`
--
ALTER TABLE `den_forum`
  ADD KEY `cod_postagem` (`cod_postagem`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD PRIMARY KEY (`cod_postagem`),
  ADD KEY `fk_postagens_forum_usuario1_idx` (`usuario_cod_usuario`);

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
  ADD KEY `fk_usuario_tipo_usuario1_idx` (`cod_tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `conversa`
--
ALTER TABLE `conversa`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de tabela `postagens_forum`
--
ALTER TABLE `postagens_forum`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
