-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: projetoapd
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `texto_comentario` varchar(2000) NOT NULL,
  `postagem_cod_postagem` int(11) NOT NULL,
  `usuario_cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_comentario`),
  KEY `fk_comentario_postagens_forum1_idx` (`postagem_cod_postagem`),
  KEY `fk_comentario_usuario1_idx` (`usuario_cod_usuario`),
  CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversa`
--

DROP TABLE IF EXISTS `conversa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversa` (
  `cod_usuario1` int(11) NOT NULL,
  `cod_usuario2` int(11) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `dt_mensagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_mensagem`),
  KEY `cod_usuario1` (`cod_usuario1`),
  KEY `cod_usuario2` (`cod_usuario2`),
  CONSTRAINT `conversa_ibfk_1` FOREIGN KEY (`cod_usuario1`) REFERENCES `usuario` (`cod_usuario`),
  CONSTRAINT `conversa_ibfk_2` FOREIGN KEY (`cod_usuario2`) REFERENCES `usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversa`
--

LOCK TABLES `conversa` WRITE;
/*!40000 ALTER TABLE `conversa` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `den_chat`
--

DROP TABLE IF EXISTS `den_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `den_chat` (
  `cod_usuario` int(11) NOT NULL,
  `cod_chat` int(11) NOT NULL,
  `texto_den_chat` varchar(250) NOT NULL,
  `dt_den_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conversa_cod_mensagem` int(11) NOT NULL,
  KEY `cod_usuario` (`cod_usuario`),
  KEY `fk_den_chat_conversa1_idx` (`conversa_cod_mensagem`),
  CONSTRAINT `den_chat_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  CONSTRAINT `fk_den_chat_conversa1` FOREIGN KEY (`conversa_cod_mensagem`) REFERENCES `conversa` (`cod_mensagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `den_chat`
--

LOCK TABLES `den_chat` WRITE;
/*!40000 ALTER TABLE `den_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `den_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `den_coment`
--

DROP TABLE IF EXISTS `den_coment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `den_coment` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_c` varchar(200) NOT NULL,
  KEY `cod_comentario` (`cod_comentario`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `den_coment_ibfk_1` FOREIGN KEY (`cod_comentario`) REFERENCES `comentario` (`cod_comentario`),
  CONSTRAINT `den_coment_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `den_coment`
--

LOCK TABLES `den_coment` WRITE;
/*!40000 ALTER TABLE `den_coment` DISABLE KEYS */;
/*!40000 ALTER TABLE `den_coment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `den_forum`
--

DROP TABLE IF EXISTS `den_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `den_forum` (
  `cod_postagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tex_den_f` varchar(200) NOT NULL,
  KEY `cod_postagem` (`cod_postagem`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `den_forum_ibfk_1` FOREIGN KEY (`cod_postagem`) REFERENCES `postagens_forum` (`cod_postagem`),
  CONSTRAINT `den_forum_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `den_forum`
--

LOCK TABLES `den_forum` WRITE;
/*!40000 ALTER TABLE `den_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `den_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagens_forum`
--

DROP TABLE IF EXISTS `postagens_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagens_forum` (
  `cod_postagem` int(11) NOT NULL AUTO_INCREMENT,
  `status_postagem` int(11) NOT NULL,
  `texto_postagem` varchar(2000) NOT NULL,
  `titulo_postagem` varchar(75) NOT NULL,
  `data_postagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_postagem`),
  KEY `fk_postagens_forum_usuario1_idx` (`usuario_cod_usuario`),
  CONSTRAINT `fk_postagens_forum_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagens_forum`
--

LOCK TABLES `postagens_forum` WRITE;
/*!40000 ALTER TABLE `postagens_forum` DISABLE KEYS */;
INSERT INTO `postagens_forum` VALUES (1,1,'a','a','2018-07-03 11:41:27',0),(2,1,'{$p->getTexto()}','{$p->getTitulo()}','2018-06-26 16:27:11',0),(3,1,'{$p->getTexto()}','{$p->getTitulo()}','2018-06-26 16:27:11',0),(8,1,'oi','oi','2018-06-26 16:27:11',0),(9,1,'teste','teste','2018-06-26 16:27:11',0),(10,1,'eu nao to nem aiiiiiiiii','putaria louca Ã© bom para o cÃ©rebro','2018-06-26 16:27:11',0),(11,1,'fesfs','zfsd','2018-06-26 16:27:11',0),(12,1,'sdfgiosdfgosdfngiossiogn','sdasfhasduiofdf','2018-06-26 16:27:11',0),(13,1,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','cu do conde','2018-06-26 16:32:40',0),(14,1,'aa','aa','2018-07-03 11:19:03',0),(15,1,'wdsad','asdwad','2018-07-03 11:19:29',0),(16,1,'123','142','2018-07-03 11:43:26',0);
/*!40000 ALTER TABLE `postagens_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `cod_tipo_usuario` int(11) NOT NULL,
  `descricao_tipo_usuario` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'administrador'),(2,'psicologo'),(3,'comum');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `fk_usuario_tipo_usuario1_idx` (`cod_tipo_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,'a','admin@admin.admin','a',0),(15,'admin','admin@admin','admin',0),(334,'asd','a@a','a',0),(335,'alo','BOING@BOING.BOING','alo',0),(336,'fgtfgh','leo@leo','gfhfgh',0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-12 16:40:44
