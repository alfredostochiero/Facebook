-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2020 às 20:37
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `id_usuario`, `titulo`) VALUES
(4, 3, 'Grupo sobre Nintendo'),
(5, 3, 'Grupo de Pc'),
(6, 3, 'grupo teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_membros`
--

CREATE TABLE `grupos_membros` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupos_membros`
--

INSERT INTO `grupos_membros` (`id`, `id_grupo`, `id_usuario`) VALUES
(1, 0, 3),
(2, 4, 3),
(3, 5, 3),
(4, 4, 6),
(5, 5, 6),
(6, 4, 10),
(7, 5, 10),
(8, 6, 3),
(9, 6, 10),
(10, 4, 11),
(11, 5, 11),
(12, 6, 11),
(13, 4, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_usuario`, `data_criacao`, `tipo`, `texto`, `url`, `id_grupo`) VALUES
(2, 3, '2020-02-11 17:05:03', 'foto', 'Primeiro Post. Um piano', '1d57389966384573ad96cbe7c6cc7260.jpg', 0),
(3, 4, '2020-02-11 17:22:12', 'foto', ' OlÃ¡, aqui Ã© o primeiro post do Adolfo.', 'e78fa545c7bccb50c78ed37a024d7d79.jpg', 0),
(4, 3, '2020-02-12 12:59:30', 'texto', ' Bom dia a todos', '', 0),
(5, 3, '2020-02-12 20:44:56', 'texto', ' Post dodia 12/02/2020', '', 0),
(6, 6, '2020-02-13 12:39:40', 'texto', ' Post no grupo de pc', '', 5),
(7, 9, '2020-02-13 13:04:59', 'texto', ' Primeiro post do leonardo', '', 0),
(8, 10, '2020-02-13 13:15:41', 'texto', ' Carolina postou algo sobre o grupo nintendo', '', 4),
(9, 10, '2020-02-13 13:16:11', 'texto', ' Carolina postou algo sobre grupo Pc', '', 5),
(10, 3, '2020-02-13 13:26:11', 'texto', ' Acabei de posta no grupo da nintendo', '', 4),
(11, 3, '2020-02-13 13:27:21', 'texto', ' primeiro post grupo teste feito pelo alfredo', '', 6),
(12, 10, '2020-02-13 13:28:29', 'texto', ' ola, carolina postou sobre grupo teste as 13:28', '', 6),
(13, 11, '2020-02-13 13:48:17', 'texto', ' Post do max sobre Nintendo', '', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_comentarios`
--

CREATE TABLE `posts_comentarios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts_comentarios`
--

INSERT INTO `posts_comentarios` (`id`, `id_post`, `id_usuario`, `data_criacao`, `texto`) VALUES
(1, 4, 3, '2020-02-12 17:29:12', 'Primeiro ComentÃ¡rio'),
(2, 4, 3, '2020-02-12 19:04:27', 'Segundo comentÃ¡rio'),
(3, 4, 3, '2020-02-12 19:10:49', 'Terceiro Comentario'),
(4, 3, 3, '2020-02-12 19:11:04', 'Excelente Post Brother'),
(5, 3, 3, '2020-02-12 19:11:20', 'Outro post'),
(6, 4, 5, '2020-02-12 19:20:01', 'Comentario da Katiane '),
(7, 4, 6, '2020-02-12 19:20:55', 'comentario do Davi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_likes`
--

CREATE TABLE `posts_likes` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts_likes`
--

INSERT INTO `posts_likes` (`id`, `id_post`, `id_usuario`) VALUES
(4, 2, 3),
(5, 4, 5),
(12, 2, 6),
(14, 3, 3),
(15, 4, 3),
(17, 5, 3),
(18, 7, 9),
(19, 5, 5),
(20, 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionamentos`
--

CREATE TABLE `relacionamentos` (
  `id` int(11) NOT NULL,
  `usuario_de` int(11) NOT NULL,
  `usuario_para` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relacionamentos`
--

INSERT INTO `relacionamentos` (`id`, `usuario_de`, `usuario_para`, `status`) VALUES
(13, 3, 5, 1),
(14, 5, 3, 1),
(15, 3, 4, 1),
(17, 3, 7, 1),
(18, 3, 6, 1),
(19, 3, 8, 1),
(20, 5, 7, 1),
(22, 5, 6, 1),
(23, 3, 6, 1),
(24, 3, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `bio` text,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `sexo`, `bio`, `senha`) VALUES
(3, 'alfredo_stochiero@hotmail.com', 'Alfredo', 1, 'Desenvolvedor PHP Junior', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Adolfo@hotmail.com', 'Adolfo', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(5, 'katiane@hotmail.com', 'Katiane', 0, NULL, '202cb962ac59075b964b07152d234b70'),
(6, 'davi@hotmail.com', 'Davi', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(7, 'beth@hotmail.com', 'Beth', 0, NULL, '202cb962ac59075b964b07152d234b70'),
(8, 'nathalie@hotmail.com', 'Nathalie', 0, NULL, '202cb962ac59075b964b07152d234b70'),
(9, 'leonardo@hotmail.com', 'leonardo', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(10, 'carolina@hotmail.com', 'Carolina', 0, NULL, '202cb962ac59075b964b07152d234b70'),
(11, 'max@hotmail.com', 'Max', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(12, 'daniel@hotmail.com', 'daniel', 1, NULL, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos_membros`
--
ALTER TABLE `grupos_membros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupos_membros`
--
ALTER TABLE `grupos_membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
