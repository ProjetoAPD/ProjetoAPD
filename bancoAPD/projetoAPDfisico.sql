-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2018 às 19:06
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetoapd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cfp`
--

CREATE TABLE `cfp` (
  `registro` int(11) NOT NULL,
  `nome_psicologo` varchar(100) NOT NULL,
  `cpf` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cfp`
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
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `texto_comentario` varchar(2000) NOT NULL,
  `postagem_cod_postagem` int(11) NOT NULL,
  `usuario_cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`cod_comentario`, `dt_comentario`, `texto_comentario`, `postagem_cod_postagem`, `usuario_cod_usuario`) VALUES
(18, '2018-11-25 12:22:33', 'Tiago, nÃ£o deixe com que as pessoas te coloquem para baixo. Acredite em vocÃª mesma, assim vocÃª conseguirÃ¡ alcanÃ§ar os teus objetivos. Se eles nÃ£o acreditam em vocÃª, prove para eles que vocÃª consegue sim, que vocÃª pode fazer o que vocÃª quiser! VocÃª jÃ¡ acabou os estudos?', 32, 356),
(19, '2018-11-25 12:23:13', 'Ainda nÃ£o estou no 3 ano jÃ¡.', 32, 360),
(20, '2018-11-25 12:23:52', 'Luana, acho que a melhor coisa que vocÃª tem a fazer Ã© focar no teu futuro, nÃ£o deixe que a opiniÃ£o das pessoas te influencie. Eu tinha problemas com a minha mÃ£e e a melhor coisa que eu fiz foi sair de casa, minha vida mudou completamente! Quando a gente se desprende de pessoas que nos colocam para baixo as coisas comeÃ§am a dar certo.', 32, 359),
(22, '2018-11-25 12:26:48', 'Oi Evelyn. A minha mÃ£e tambÃ©m Ã© autoritÃ¡ria e adora ficar falando o que eu devo fazer ou nÃ£o da minha vida. Sei como Ã© essa coisa de estar sempre sendo controlada. A minha mÃ£e adora uma manipulaÃ§Ã£o tambÃ©m, o que faz com que eu me sinta um ser humano horrÃ­vel. Eu sei que essas coisas sÃ£o difÃ­ceis, mas a gente tambÃ©m nÃ£o pode deixar de viver a nossa vida por causa delas, nÃ©.  VocÃª jÃ¡ tentou conversar com ela sobre tudo isso?', 33, 360),
(23, '2018-11-25 12:27:23', 'A minha vida tb Ã© um inferno dentro de casa.. meus pais sÃ³ sabem brigar entre eles e estÃ£o sempre descontando td em mim.. nÃ£o aguento mais.. eu sÃ³ queria sumir de casa, minha irmÃ£ saiu de casa, queria ir morar com ela mas ela nÃ£o deixou.. eu tb nÃ£o posso fazer nd.. nÃ£o me deixam sair.. estÃ£o sempre reclamando de td..  Ã© horrÃ­vel viver assim..', 33, 359),
(24, '2018-11-25 12:35:08', 'OlÃ¡ Gulherme, obrigado por confiar no nosso fÃ³rum para dividir seu problema. Te passo uma lista de psicÃ³logos na sua cidade especialistas em alcoolismo: https://goo.gl/bHfGRU. Para saber se atendem convÃªnio, vocÃª deve entrar em contato diretamente.  Se tiver qualquer outra dÃºvida, entre em contato conosco. Atenciosamente, Leonardo - Equipe ProjetoAPD', 34, 340),
(26, '2018-11-25 13:23:06', 'VocÃª precisa Ã© se ligar que vocÃª nÃ£o Ã© nada e nunca vai ser!', 33, 343);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversa`
--

CREATE TABLE `conversa` (
  `cod_usuario1` int(11) NOT NULL,
  `cod_usuario2` int(11) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `cod_mensagem` int(11) NOT NULL,
  `dt_mensagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conversa`
--

INSERT INTO `conversa` (`cod_usuario1`, `cod_usuario2`, `texto`, `cod_mensagem`, `dt_mensagem`) VALUES
(362, 347, 'olÃ¡', 3, '2018-11-25 13:58:39'),
(362, 347, 'vocÃª poderia me ajudar?', 4, '2018-11-25 13:58:49'),
(362, 347, 'estou com problemas na famÃ­lia e nÃ£o sei o que fazer', 5, '2018-11-25 13:59:04'),
(347, 362, 'nÃ£o, lide sozinha com seus problemas', 11, '2018-11-25 14:05:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_chat`
--

CREATE TABLE `den_chat` (
  `cod_usuario` int(11) NOT NULL,
  `mensagem_den_chat` varchar(250) NOT NULL,
  `dt_den_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conversa_cod_mensagem` int(11) NOT NULL,
  `cod_den_chat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `den_chat`
--

INSERT INTO `den_chat` (`cod_usuario`, `mensagem_den_chat`, `dt_den_chat`, `conversa_cod_mensagem`, `cod_den_chat`) VALUES
(347, 'nÃ£o, lide sozinha com seus problemas', '2018-11-25 14:15:21', 11, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_coment`
--

CREATE TABLE `den_coment` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_c` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cod_den_coment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `den_coment`
--

INSERT INTO `den_coment` (`cod_comentario`, `cod_usuario`, `data_hora`, `tex_den_c`, `cod_den_coment`) VALUES
(26, 343, '2018-11-25 13:45:36', 'Comentário ofensivo e desnecessário', 1),
(18, 356, '2018-11-25 13:46:31', 'Acredito que isso não vá ajudar no problema e ainda vá colocar o usuário para baixo', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_forum`
--

CREATE TABLE `den_forum` (
  `cod_postagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_f` varchar(200) NOT NULL,
  `cod_den_forum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `den_forum`
--

INSERT INTO `den_forum` (`cod_postagem`, `cod_usuario`, `data_hora`, `tex_den_f`, `cod_den_forum`) VALUES
(36, 358, '2018-11-25 13:54:35', 'O usuÃ¡rio estÃ¡ incentivando o suicÃ­dio', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens_forum`
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
-- Extraindo dados da tabela `postagens_forum`
--

INSERT INTO `postagens_forum` (`cod_postagem`, `status_postagem`, `texto_postagem`, `titulo_postagem`, `data_postagem`, `usuario_cod_usuario`) VALUES
(32, 1, 'Meu padrasto nÃ£o aceita meu namorado namoramos a 1 ano e toda vez que saÃ­mos ele faz intriga pra minha mÃ£e brigar comigo. Vou fazer 18 anos e na minha casa nÃ£o tenho opiniÃ£o em nada, quero ser independente mais sempre que tento eles me esnobam e me colocam pra baixo flanado que nÃ£o vou ser ninguÃ©m. Eu nÃ£o sei mais o que fazer toda vez que passo por isso eu penso em desistir das coisas', ' Padrasto', '2018-11-25 12:18:08', 360),
(33, 1, 'Ando meio perdida ultimamente, Ã s vezes eu piro no stress de algum momento q eu passo Ã© quero me dopar de remÃ©dios. Minha vida e um verdadeiro inferno sabe, minha mÃ£e sÃ³ faz reclamar cmg e xingar e xingar... sÃ³ mora eu e ela entÃ£o eu escuto tudo eu sou a culpada d tudo, estamos passando por problemas financeiros oq que piora ainda mais. Eu nÃ£o posso sair-se-Ã¡ quase lugar nenhum pq eu to sem grana seus amigos te chamam pra tudo que Ã© lugar atÃ© q um dos meus amigos fala q vai parar de me chamar pq vc nunca vai. AÃ­ passa o Ã³dio nÃ© de vc nÃ£o sair c sua galera de nÃ£o ter aquela vida q vc quer ter. EntÃ£o minha vida e um verdadeiro inferno. Tenho um menino q eu gosto a gente jÃ¡ namorava sÃ³ q terminamos por causa de minha mÃ£e e atÃ© hj nÃ£o conseguimos nos desconectar pq a gente se gosta morro de vontade de voltar c ele, sÃ³ nÃ£o volto por causa de minha mÃ£e. Sabe aquela sensaÃ§Ã£o q vc ta deixando de viver sua vida pra â€œdeixar as coisas na paz c sua mÃ£e?â€ Enfim Ã© isso q eu ri fazendo to largando minha vida minha felicidade pra nÃ£o brigar c ela. To passando por muito Ã³dio por dentro nÃ£o sei oq eu faÃ§o quero uma ajuda. NÃ£o quero comentar c nenhumas das minhas amigas. Aaaaa', 'NÃ£o sei oque fazer, minha vida tÃ¡ um verdadeiro desastre', '2018-11-25 12:25:38', 362),
(34, 1, 'AlguÃ©m sabe de algum psicÃ³logo bom voltado para dependÃªncia do Ã¡lcool que atenda Sul AmÃ©rica em SÃ£o JosÃ© dos Campos sp', 'DependÃªncia do alcool', '2018-11-25 12:33:16', 343),
(36, 1, 'NÃ³s estamos perdendo tempo, nÃ£o hÃ¡ o que fazer e a vida nÃ£o faz sentido, ponham fim em suas vidas ', 'A vida nÃ£o vale a pena', '2018-11-25 13:53:37', 358),
(39, 1, 'Posso ter defeitos, viver ansioso e ficar irritado algumas vezes, mas nÃ£o esqueÃ§o de que minha vida Ã© a maior empresa do mundo. E que posso evitar que ela vÃ¡ Ã  falÃªncia.<br />\r\nSer feliz Ã© reconhecer que vale a pena viver, apesar de todos os desafios, incompreensÃµes e perÃ­odos de crise.<br />\r\nSer feliz Ã© deixar de ser vÃ­tima dos problemas e se tornar autor da prÃ³pria histÃ³ria.<br />\r\nÃ‰ atravessar desertos fora de si, mas ser capaz de encontrar um oÃ¡sis no recÃ´ndito da sua alma.<br />\r\nÃ‰ agradecer a Deus a cada manhÃ£ pelo milagre da vida.<br />\r\nSer feliz Ã© nÃ£o ter medo dos prÃ³prios sentimentos. Ã‰ saber falar de si mesmo. Ã‰ ter coragem para ouvir um â€œnÃ£oâ€. Ã‰ ter seguranÃ§a para receber uma crÃ­tica, mesmo que injusta.', 'Sobre a vida', '2018-11-25 17:50:26', 345);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `cod_tipo_usuario` int(11) NOT NULL,
  `descricao_tipo_usuario` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipo_usuario`, `descricao_tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'psicologo'),
(3, 'comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `email`, `senha`, `cod_tipo_usuario`) VALUES
(340, 'Leonardo Edenir', 'leonardo@edenir', 'bGVvbmFyZG8=', 1),
(341, 'Leonardo Adriano', 'leonardo@adriano', 'bGVvbmFyZG8=', 2),
(343, 'Guilherme Boing', 'guilherme@boing', 'Z3VpbGhlcm1l', 3),
(345, 'Florence Doyle', 'florence@doyle', 'ZmxvcmVuY2U=', 2),
(346, 'Riley English', 'riley@english', 'cmlsZXk=', 2),
(347, 'Latoria Maxwell', 'latoria@maxwell', 'bGF0b3JpYQ==', 2),
(350, 'Nella Barnett', 'nella@barnett', 'bmVsbGE=', 2),
(351, 'Candida Cottrell', 'candida@cottrell', 'Y2FuZGlkYQ==', 2),
(352, 'Jordon Shields', 'jordon@shields', 'am9yZG9u', 2),
(353, 'Joesph Sheppard', 'joesph@sheppard', 'am9lc3Bo', 2),
(354, 'Carol Psicologa', 'carol@psicologa', 'Y2Fyb2w=', 2),
(355, 'Lynn Carpenter', 'lynn@carpenter', 'bHlubg==', 2),
(356, 'Louis Henry', 'louis@henry', 'bG91aXM=', 2),
(357, 'admin', 'admin@admin', 'YWRtaW4=', 1),
(358, 'FÃ¡bio Ribeiro', 'fabio@ribeiro', 'ZmFiaW8=', 3),
(359, 'Vinicius Almeida', 'vinicius@almeida', 'dmluaWNpdXM=', 3),
(360, 'Tiago Correia', 'tiago@correia', 'dGlhZ28=', 3),
(362, 'Evelyn Oliveira', 'evelyn@oliveira', 'ZXZlbHlu', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cfp`
--
ALTER TABLE `cfp`
  ADD PRIMARY KEY (`registro`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod_comentario`),
  ADD KEY `fk_comentario_postagens_forum1_idx` (`postagem_cod_postagem`),
  ADD KEY `fk_comentario_usuario1_idx` (`usuario_cod_usuario`);

--
-- Indexes for table `conversa`
--
ALTER TABLE `conversa`
  ADD PRIMARY KEY (`cod_mensagem`),
  ADD KEY `cod_usuario1` (`cod_usuario1`),
  ADD KEY `cod_usuario2` (`cod_usuario2`);

--
-- Indexes for table `den_chat`
--
ALTER TABLE `den_chat`
  ADD PRIMARY KEY (`cod_den_chat`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `fk_den_chat_conversa1_idx` (`conversa_cod_mensagem`);

--
-- Indexes for table `den_coment`
--
ALTER TABLE `den_coment`
  ADD PRIMARY KEY (`cod_den_coment`),
  ADD KEY `cod_comentario` (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `den_forum`
--
ALTER TABLE `den_forum`
  ADD PRIMARY KEY (`cod_den_forum`),
  ADD KEY `cod_postagem` (`cod_postagem`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD PRIMARY KEY (`cod_postagem`),
  ADD KEY `fk_postagens_forum_usuario1_idx1` (`usuario_cod_usuario`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`cod_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `fk_usuario_tipo_usuario1_idx1` (`cod_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `conversa`
--
ALTER TABLE `conversa`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `den_chat`
--
ALTER TABLE `den_chat`
  MODIFY `cod_den_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `den_coment`
--
ALTER TABLE `den_coment`
  MODIFY `cod_den_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `den_forum`
--
ALTER TABLE `den_forum`
  MODIFY `cod_den_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postagens_forum`
--
ALTER TABLE `postagens_forum`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `conversa`
--
ALTER TABLE `conversa`
  ADD CONSTRAINT `conversa_ibfk_1` FOREIGN KEY (`cod_usuario1`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `conversa_ibfk_2` FOREIGN KEY (`cod_usuario2`) REFERENCES `usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `den_chat`
--
ALTER TABLE `den_chat`
  ADD CONSTRAINT `den_chat_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `fk_den_chat_conversa1` FOREIGN KEY (`conversa_cod_mensagem`) REFERENCES `conversa` (`cod_mensagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `den_coment`
--
ALTER TABLE `den_coment`
  ADD CONSTRAINT `den_coment_ibfk_1` FOREIGN KEY (`cod_comentario`) REFERENCES `comentario` (`cod_comentario`),
  ADD CONSTRAINT `den_coment_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `den_forum`
--
ALTER TABLE `den_forum`
  ADD CONSTRAINT `den_forum_ibfk_1` FOREIGN KEY (`cod_postagem`) REFERENCES `postagens_forum` (`cod_postagem`),
  ADD CONSTRAINT `den_forum_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD CONSTRAINT `fk_postagens_forum_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
