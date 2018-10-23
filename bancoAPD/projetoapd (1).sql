-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2018 às 13:43
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
(17, '2018-10-22 16:47:10', 'Puts Ã© foda minha filha tambÃ©m Ã© assim, deus abenÃ§oe', 35, 350),
(18, '2018-10-22 16:47:32', 'TambÃ©m estou na mesma situaÃ§Ã£o! Exatamente igual a da Natalia, minha filha de 16 anos estÃ¡ rebelde, agressiva, indo mal na escola.  Faz tempo que a sua filha comeÃ§ou a agir assim, Natalia? Olha Tania, o problema que manter o diÃ¡logo estÃ¡ muito difÃ­cil. Toda vez que tento conversar com ela, levo um xingamento. JÃ¡ estou tÃ£o chateada que pensei em desistir e deixar para lÃ¡, quem sabe um dia ela se arrependa, mas nÃ£o consigo! SÃ³ queria entender o que estÃ¡ acontecendo com ela.', 34, 350),
(19, '2018-10-22 16:47:46', 'Oi Fatima... que coisa louca essa coisa de filho adolescente... olha que sempre achei que era uma mÃ£e preparada, nunca quis ser mÃ£ezona nÃ£o mas sempre achei que levava jeito pra coisa e agora sinceramente jÃ¡ nÃ£o sei o que pensar... a relaÃ§Ã£o com a minha filha comeÃ§ou a complicar faz menos de 1 ano... mas vai numa velocidade que assusta.... fico com medo de nÃ£o conseguir voltar a ser o que era antes... de ter perdido a minha menina pra sempre... na escola eles reclamaram dela Fatima?', 33, 350),
(20, '2018-10-22 16:48:51', 'concordo com o leonardo', 35, 351),
(21, '2018-10-22 16:49:06', 'Ai Tania, nÃ£o sei se Ã© sÃ³ uma fase de adolescente. Converso com as mÃ£es das antigas amigas dela e elas nÃ£o estÃ£o passando por isso. Acho que isso acaba me deixando mais triste ainda, parece que errei em algum ponto, sabe? E ela nunca me escuta, quando vou falar qualquer coisa para ela, mal comeÃ§o e ela jÃ¡ solta os cavalos em cima de mim. Nem o pai dela estÃ¡ conseguindo conversar com ela. Estamos com medo de que alguma coisa ruim aconteÃ§a ou esteja acontecendo, pois nÃ£o conseguimos controlar nossos filhos 24 horas por dia. A escola jÃ¡ me chamou, pois ela ia muito bem nos estudos e comeÃ§ou a ir mal, desrespeitar professor, arrumar discussÃ£o na sala. Coisas que ela nunca fez, ela era uma menina muito querida.', 34, 351),
(22, '2018-10-22 16:49:44', 'TambÃ©m estou com problemas com meu filho. Sem querer desesperar vocÃªs com o meu caso, pois as coisas variam muito entre as famÃ­lias e as pessoas.  Infelizmente meu filho teve uma infÃ¢ncia um pouco conturbada, eu e minha esposa brigÃ¡vamos muito e, hoje enxergo que ele nÃ£o ganhou a atenÃ§Ã£o e o carinho que merecia. Com isso na adolescÃªncia se envolveu com drogas e agora quero ajudÃ¡-lo e nÃ£o consigo. JÃ¡ tentei pedir perdÃ£o por tudo de errado que eu fiz, mas mesmo assim nÃ£o consigo tirÃ¡-lo do vÃ­cio. Tenho medo de perdÃª-lo para as drogas.', 33, 351);

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
(351, 352, 'Oi, estou com depressÃ£o!', 28, '2018-10-22 16:50:14'),
(352, 351, 'Nossa! Me diz como vocÃª se sente...', 29, '2018-10-22 16:50:54'),
(351, 352, ':D', 30, '2018-10-23 11:22:40'),
(352, 351, ':(', 31, '2018-10-23 11:22:57');

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
(351, 'Oi, estou com depressÃ£o!', '2018-10-23 11:31:49', 28, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_coment`
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
(36, 355, '2018-10-22 19:11:27', 'tu Ã© gay\r\n', 4);

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
(33, 1, 'Meu padrasto nÃ£o aceita meu namorado namoramos a 1 ano e toda vez que saÃ­mos ele faz intriga pra minha mÃ£e brigar comigo. Vou fazer 18 anos e na minha casa nÃ£o tenho opiniÃ£o em nada, quero ser independente mais sempre que tento eles me esnobam e me colocam pra baixo flanado que nÃ£o vou ser ninguÃ©m. Eu nÃ£o sei mais o que fazer toda vez que passo por isso eu penso em desistir das coisas', 'Padrasto', '2018-10-22 16:44:44', 340),
(34, 1, 'JÃ¡ postei essa histÃ³ria aqui,mas muitas pessoas nÃ£o entenderam a histÃ³ria e me fizeram perguntas.Como perdi a conta,vou respostar com mais detalhes,e agradeÃ§o a todos que aconselharam.Para ficar mais fÃ¡cil o entendimento,vamos chamar com um nome fictÃ­cio,a minha filha de 14 anos,como Alicia,e a pequena de 3 anos, com tambÃ©m nome fictÃ­cio,Maria.\r\n\r\nEstÃ¡vamos fazendo um evento em famÃ­lia,e tÃ­nhamos colocado uma piscina para as crianÃ§as se divertirem.Minha filha,AlÃ­cia,estava isolada por um tempo em meu quarto.Logo depois dela sair de meu quarto,resolveu entrar na piscina com as outras crianÃ§as,e dentre elas,estava a menina de 3 anos,sua prima,Maria.\r\n\r\nToda a famÃ­lia estava reunida em volta da piscina,quando vi a AlÃ­cia brincando com a Maria, atÃ© que entÃ£o,vejo minha filha empurrar ela para debaixo da Ã¡gua,levantando Maria rapidamente apÃ³s o ocorrido.A pequena comeÃ§ou a chorar alto e a se desesperar, comeÃ§ou a andar em direÃ§Ã£o a borda da piscina pedindo ajuda ( Maria tinha medo de mergulhar).Todos olhavam diretamente para a pequena.Enquanto minha filha,sem demonstrar nada,como se nada estivesse acontecendo,ficou olhando para o chÃ£o por um tempo,com as mÃ£os no bolso ( estava de short).Meu marido foi ajudar a Maria secando seu rosto e acalmando a pequena,mas nÃ£o conseguia tirar ela de lÃ¡.Minha filha olhou para frente,e percebeu que os olhares estavam para ela,e logo ajudou a tirar a Maria de lÃ¡. Quando ela tirou a Maria de dentro da piscina , saiu do local em direÃ§Ã£o a cozinha.AtÃ© que a famÃ­lia procurando por explicaÃ§Ãµes, fez com que ela voltasse e mentisse sobre o que aconteceu.Ficou estranha por um tempo,mas voltou ao normal no resto do evento.\r\n\r\nRecebi um aconselhamento aqui,para ver ela de forma geral.Bem, ela sempre foi muito quieta quando estava sozinha,e muitas vezes se isolava.Agora na adolescÃªncia,ficou ainda mais frequente.Ela brigava muito com suas outras primas,quando pequena ( tinham uma relaÃ§Ã£o forte ). NÃ£o temos di', ' Minha filha de 14 e seus ciÃºmes com sua prima de 3,afoga a pequena', '2018-10-22 16:45:38', 340),
(35, 1, 'Minha filha nao gosta de obedecer, e depressiva, e um dai ela se arranhou a si propria', ' como lidar com uma filha adolescente rebelde,', '2018-10-22 16:46:33', 340),
(36, 1, 'tenho uma arma aqui pra quem quiser se matar\r\n\r\n#bolsonaro17', 'Que site lixo cheio de depressivos por que vocÃªs nÃ£o morrem', '2018-10-22 16:55:50', 355);

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
(350, 'leonardo', 'leonardo@vieira', 'bGVvbmFyZG8=', 3),
(351, 'guilherme', 'guilherme@boing', 'Z3VpbGhlcm1l', 3),
(352, 'Carol Psicologa', 'carol@psicologa', 'Y2Fyb2w=', 2),
(353, 'Riley English', 'riley@english', 'cmlsZXk=', 2),
(354, 'Florence Doyle', 'Florence@Doyle', 'ZmxvcmVuY2U=', 2),
(355, 'luan', 'luan@alflen', 'w6d1YW4=', 3),
(356, 'Lynn Carpenter', 'Lynn@Carpenter', 'bHlubg==', 2);

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
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `conversa`
--
ALTER TABLE `conversa`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `den_chat`
--
ALTER TABLE `den_chat`
  MODIFY `cod_den_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `den_coment`
--
ALTER TABLE `den_coment`
  MODIFY `cod_den_coment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `den_forum`
--
ALTER TABLE `den_forum`
  MODIFY `cod_den_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postagens_forum`
--
ALTER TABLE `postagens_forum`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

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
