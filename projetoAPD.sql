-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2018 às 04:05
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
  `cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2018-08-08 01:11:45', 'fghf', 17, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversa`
--

CREATE TABLE `conversa` (
  `cod_usuario1` int(11) NOT NULL,
  `cod_usuario2` int(11) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `cod_mensagem` int(11) NOT NULL,
  `dt_mensagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_chat`
--

CREATE TABLE `den_chat` (
  `cod_usuario` int(11) NOT NULL,
  `cod_chat` int(11) NOT NULL,
  `texto_den_chat` varchar(250) NOT NULL,
  `dt_den_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conversa_cod_mensagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_coment`
--

CREATE TABLE `den_coment` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_c` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `den_forum`
--

CREATE TABLE `den_forum` (
  `cod_postagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_f` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'a', 'a', '2018-07-03 11:41:27', 0),
(2, 1, '{$p->getTexto()}', '{$p->getTitulo()}', '2018-06-26 16:27:11', 0),
(3, 1, '{$p->getTexto()}', '{$p->getTitulo()}', '2018-06-26 16:27:11', 0),
(8, 1, 'oi', 'oi', '2018-06-26 16:27:11', 0),
(9, 1, 'teste', 'teste', '2018-06-26 16:27:11', 0),
(10, 1, 'eu nao to nem aiiiiiiiii', 'putaria louca Ã© bom para o cÃ©rebro', '2018-06-26 16:27:11', 0),
(11, 1, 'fesfs', 'zfsd', '2018-06-26 16:27:11', 0),
(12, 1, 'sdfgiosdfgosdfngiossiogn', 'sdasfhasduiofdf', '2018-06-26 16:27:11', 0),
(13, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'cu do conde', '2018-06-26 16:32:40', 0),
(14, 1, 'aa', 'aa', '2018-07-03 11:19:03', 0),
(15, 1, 'wdsad', 'asdwad', '2018-07-03 11:19:29', 0),
(16, 1, '123', '142', '2018-07-03 11:43:26', 0),
(17, 1, 'dfgfdg', 'dfgfdg', '2018-08-08 01:11:34', 15);

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
(4, 'a', 'admin@admin.admin', 'a', 3),
(15, 'admin', 'admin@admin', 'admin', 1),
(335, 'alo', 'BOING@BOING.BOING', 'alo', 2),
(336, 'fgtfgh', 'leo@leo', 'gfhfgh', 2);

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
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `fk_den_chat_conversa1_idx` (`conversa_cod_mensagem`);

--
-- Indexes for table `den_coment`
--
ALTER TABLE `den_coment`
  ADD KEY `cod_comentario` (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `den_forum`
--
ALTER TABLE `den_forum`
  ADD KEY `cod_postagem` (`cod_postagem`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `postagens_forum`
--
ALTER TABLE `postagens_forum`
  ADD PRIMARY KEY (`cod_postagem`),
  ADD KEY `fk_postagens_forum_usuario1_idx` (`usuario_cod_usuario`);

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
  ADD KEY `fk_usuario_tipo_usuario1_idx` (`cod_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conversa`
--
ALTER TABLE `conversa`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postagens_forum`
--
ALTER TABLE `postagens_forum`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

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
