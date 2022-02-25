-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Fev-2022 às 02:15
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisplag`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `fk_tipouser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`, `fk_tipouser`) VALUES
(13, 'presidente', 1),
(14, 'secretario geral', 1),
(15, 'secretario', 2),
(16, 'servidor/conselheiro', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `distritoadm`
--

CREATE TABLE `distritoadm` (
  `id_distrito` int(11) NOT NULL,
  `distritoAdm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `distritoadm`
--

INSERT INTO `distritoadm` (`id_distrito`, `distritoAdm`) VALUES
(1, 'DABEL'),
(2, 'DABEN'),
(3, 'DAGUA'),
(4, 'DAICO'),
(5, 'DAOUT'),
(6, 'DAMOS'),
(7, 'DAENT'),
(8, 'DASAC'),
(9, 'Sem Informação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `id_filial` int(11) NOT NULL,
  `nome_filial` varchar(50) DEFAULT NULL,
  `possuiFilial` varchar(5) DEFAULT 'Não',
  `fk_instituicao` int(11) DEFAULT NULL,
  `fk_sigla` int(11) DEFAULT NULL,
  `fundacao_filial` varchar(50) DEFAULT 'Não há data',
  `codigo_inepfilial` varchar(50) DEFAULT 'Sem informação',
  `cep_filial` int(11) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `telefone_filial` varchar(13) DEFAULT 'Sem telefone',
  `email_filial` varchar(50) DEFAULT 'Sem email',
  `resp_filial` varchar(50) DEFAULT 'Sem responsável',
  `email_respLegal` varchar(50) DEFAULT 'Sem email',
  `educacao_infantil` varchar(50) DEFAULT 'Sem dados',
  `fundamental_filial` varchar(50) DEFAULT 'Sem dados',
  `fundamentaleja_filial` varchar(50) DEFAULT 'Sem dados',
  `outrosniveis_filial` varchar(50) DEFAULT 'Sem dados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id_instituicao` int(11) NOT NULL,
  `fk_tipoInstituicao` int(11) DEFAULT NULL,
  `fk_sigla` int(11) DEFAULT NULL,
  `fk_distrito` int(11) DEFAULT NULL,
  `nome_instituicao` varchar(50) NOT NULL,
  `fundacao` date DEFAULT NULL,
  `codigo_inep` varchar(25) DEFAULT NULL,
  `cnpj_escola` varchar(20) DEFAULT NULL,
  `entidade_mantenedora` varchar(50) DEFAULT 'SEMEC',
  `cnpj_conselho` varchar(20) DEFAULT NULL,
  `vigencia_ce` varchar(50) DEFAULT NULL,
  `cep_escola` int(11) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `email_inst` varchar(50) DEFAULT 'Sem email',
  `telefone_inst` varchar(13) DEFAULT 'Sem telefone',
  `nome_gestor` varchar(50) DEFAULT 'Sem Gestor',
  `email_gestor` varchar(50) DEFAULT 'Sem email',
  `whats_gestor` varchar(50) DEFAULT 'Sem WhatsApp',
  `nome_secretario` varchar(50) DEFAULT 'Sem secretário',
  `email_secretario` varchar(50) DEFAULT 'Sem email',
  `whats_secretario` varchar(50) DEFAULT 'Sem WhatsApp',
  `nome_coordenador` varchar(50) DEFAULT 'Sem coordenador',
  `email_coordenador` varchar(50) DEFAULT 'Sem email',
  `whats_coordenador` varchar(50) DEFAULT 'Sem WhatsApp',
  `convenio_semec` varchar(50) DEFAULT 'Não',
  `n_convenio` int(11) DEFAULT 0,
  `objeto` varchar(50) DEFAULT 'Sem Objeto',
  `vigencia` date DEFAULT NULL,
  `educacao_infantil` varchar(50) DEFAULT 'Não há',
  `fundamental` varchar(50) DEFAULT 'Não há',
  `fundamental_eja` varchar(50) DEFAULT 'Não há',
  `outros_niveis` varchar(50) DEFAULT 'Não há',
  `status_inst` varchar(3) DEFAULT 'Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `siglainstituicao`
--

CREATE TABLE `siglainstituicao` (
  `id_sigla` int(11) NOT NULL,
  `sigla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `siglainstituicao`
--

INSERT INTO `siglainstituicao` (`id_sigla`, `sigla`) VALUES
(1, 'Comunitária'),
(2, 'Confessional'),
(3, 'OSC'),
(4, 'Privada'),
(5, 'EMEIF'),
(6, 'EMEF'),
(7, 'EMEI'),
(8, 'UEI'),
(9, 'Sem Informação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoinstituicao`
--

CREATE TABLE `tipoinstituicao` (
  `id_inst` int(11) NOT NULL,
  `nome_inst` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoinstituicao`
--

INSERT INTO `tipoinstituicao` (`id_inst`, `nome_inst`) VALUES
(1, 'Pública'),
(2, 'Privada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `permissao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `tipoUsuario`, `permissao`) VALUES
(1, 'administrador', '1'),
(2, 'comum', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `cpf_usuario` int(11) NOT NULL,
  `login_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(50) DEFAULT 'Sem email',
  `inicio_mandato` date DEFAULT NULL,
  `fim_mandato` date DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `fk_cargo` int(11) DEFAULT NULL,
  `fk_tipousuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`, `inicio_mandato`, `fim_mandato`, `data_nascimento`, `fk_cargo`, `fk_tipousuario`) VALUES
(1, 'admin', 0, NULL, 'admin', 'Sem email', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `fk_tpUser` (`fk_tipouser`);

--
-- Índices para tabela `distritoadm`
--
ALTER TABLE `distritoadm`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Índices para tabela `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`),
  ADD KEY `fk_instituicao` (`fk_instituicao`),
  ADD KEY `fk_siglaFilial` (`fk_sigla`);

--
-- Índices para tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id_instituicao`),
  ADD KEY `fk_tip` (`fk_tipoInstituicao`),
  ADD KEY `fk_distritoadm` (`fk_distrito`),
  ADD KEY `fk_siglainst` (`fk_sigla`);

--
-- Índices para tabela `siglainstituicao`
--
ALTER TABLE `siglainstituicao`
  ADD PRIMARY KEY (`id_sigla`);

--
-- Índices para tabela `tipoinstituicao`
--
ALTER TABLE `tipoinstituicao`
  ADD PRIMARY KEY (`id_inst`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_cg` (`fk_cargo`),
  ADD KEY `fk_tipo` (`fk_tipousuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `distritoadm`
--
ALTER TABLE `distritoadm`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id_instituicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `siglainstituicao`
--
ALTER TABLE `siglainstituicao`
  MODIFY `id_sigla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipoinstituicao`
--
ALTER TABLE `tipoinstituicao`
  MODIFY `id_inst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_tpUser` FOREIGN KEY (`fk_tipouser`) REFERENCES `tipousuario` (`id_tipousuario`);

--
-- Limitadores para a tabela `filial`
--
ALTER TABLE `filial`
  ADD CONSTRAINT `filial_ibfk_1` FOREIGN KEY (`fk_instituicao`) REFERENCES `instituicao` (`id_instituicao`),
  ADD CONSTRAINT `fk_siglaFilial` FOREIGN KEY (`fk_sigla`) REFERENCES `siglainstituicao` (`id_sigla`);

--
-- Limitadores para a tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD CONSTRAINT `fk_distritoadm` FOREIGN KEY (`fk_distrito`) REFERENCES `distritoadm` (`id_distrito`),
  ADD CONSTRAINT `fk_siglainst` FOREIGN KEY (`fk_sigla`) REFERENCES `siglainstituicao` (`id_sigla`),
  ADD CONSTRAINT `fk_tip` FOREIGN KEY (`fk_tipoInstituicao`) REFERENCES `tipoinstituicao` (`id_inst`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_cg` FOREIGN KEY (`fk_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`fk_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
