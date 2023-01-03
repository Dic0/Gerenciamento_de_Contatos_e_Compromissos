-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bd_tai
CREATE DATABASE IF NOT EXISTS `bd_tai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `bd_tai`;

-- Copiando estrutura para tabela bd_tai.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_fim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_fim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_1` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convidado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `convidado_id` (`convidado_id`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`convidado_id`) REFERENCES `contato` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bd_tai.agenda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id`, `titulo`, `data_inicio`, `hora_inicio`, `data_fim`, `hora_fim`, `local_1`, `descricao`, `convidado_id`) VALUES
	(3, 'acdeira', '275760-02-04', '04:23', '3432-02-04', '23:23', 'rua sewrvidao', ' arrgaergaergearg', 7);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_tai.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobre_nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_telefone1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_telefone2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bd_tai.contato: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id`, `nome`, `sobre_nome`, `telefone1`, `tipo_telefone1`, `telefone2`, `tipo_telefone2`, `email`) VALUES
	(7, 'dieric kkkkk', 'walendorff', '49999456636', 'Tipo Telefone 01', '49998141536', 'Tipo Telefone 02', 'dieric.w@aluno.ifsc.edu.br'),
	(8, 'Iara', 'Marcante', '49998141536', 'Comercial', '49998141536', 'Casa', 'dwdieric@gmail.com');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
