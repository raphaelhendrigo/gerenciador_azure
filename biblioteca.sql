-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Mar-2023 às 03:43
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Bibliotecário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Gibi'),
(2, 'Romance'),
(3, 'Ação'),
(4, 'Ficção'),
(5, 'História'),
(7, 'Programação'),
(8, 'WEB Design');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `logo_rel` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `marca_dagua` varchar(5) NOT NULL,
  `dias_entrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`nome`, `email`, `telefone`, `endereco`, `instagram`, `logo`, `icone`, `logo_rel`, `id`, `marca_dagua`, `dias_entrega`) VALUES
('Gerenciador de Acervo Tecnico', 'adriano@email.com.br', '(12) 98888-5084', 'Rua X Número 100 - Bairro Centro Sao Jose - SP', '', 'logo.png', 'icone.png', 'logo.jpg', 1, 'Sim', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id`, `nome`) VALUES
(1, 'Editora A'),
(2, 'Editora B'),
(3, 'Editora C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `livro` int(11) NOT NULL,
  `leitor` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `funcionario` int(11) NOT NULL,
  `devolvido` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `livro`, `leitor`, `data_emprestimo`, `data_devolucao`, `obs`, `funcionario`, `devolvido`) VALUES
(7, 2, 2, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(8, 7, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(9, 6, 2, '2023-03-05', '2023-03-06', '', 1, 'Sim'),
(10, 7, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(11, 2, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(12, 2, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(13, 2, 1, '2023-03-05', '2023-03-06', '', 1, 'Sim'),
(14, 6, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(15, 6, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(16, 6, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(17, 2, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(18, 2, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(19, 6, 2, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(20, 7, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(21, 2, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(22, 6, 1, '2023-03-06', '2023-03-06', '', 1, 'Sim'),
(23, 7, 1, '2023-03-06', '2023-03-13', 'fsdf f ffdgdgfdgfd gfdg dfgdfgdfg', 1, 'Não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitores`
--

CREATE TABLE `leitores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `data_cad` date NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `leitores`
--

INSERT INTO `leitores` (`id`, `nome`, `telefone`, `cpf`, `endereco`, `data_cad`, `ativo`, `obs`) VALUES
(1, 'Leitor 1', '(00) 00000-0000', '000.000.000-00', 'Rua 1', '2023-02-28', 'Sim', ''),
(2, 'Leitor 2', '(22) 22222-2222', '222.222.222-22', 'Rua 2', '2023-02-28', 'Sim', 'Este Leitor está entregando com atraso todos os livros.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(100) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `editora` int(11) NOT NULL,
  `edicao` varchar(50) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `local` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `data_cad` date NOT NULL,
  `emprestimos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `codigo`, `titulo`, `subtitulo`, `autor`, `ano`, `editora`, `edicao`, `categoria`, `foto`, `local`, `status`, `obs`, `data_cad`, `emprestimos`) VALUES
(2, '1', 'Curso de C#', 'Programando MVC', 'Hugo Vasconcelos', 2022, 1, 'Primeira Edição', 7, '28-02-2023-18-10-24-icone.png', 3, 'Disponível', 'aaaaaa', '2023-02-28', 3),
(6, '3', 'Programador PHP', 'Tudo em PHP', 'Hugo Vasconcelos', 2021, 1, 'Primeira Edição', 7, '28-02-2023-17-45-23-logo.jpg', 2, 'Disponível', '', '2023-02-28', 2),
(7, '4', 'Romance X', 'Romance', 'Teste', 2000, 2, 'Primeira Edição', 2, 'sem-foto.jpg', 4, 'Emprestado', '', '2023-02-28', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`) VALUES
(1, 'Prateleira 1'),
(2, 'Prateleira 2'),
(3, 'Prateleira 3'),
(4, 'Prateleira 4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `senha_crip` varchar(130) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `senha_crip`, `nivel`, `ativo`, `telefone`, `endereco`, `foto`, `data`) VALUES
(1, 'Adriano', 'admin@email.com', '321', '202cb962ac59075b964b07152d234b70', 'Administrador', 'Sim', '(31) 97527-5084', 'fsafa', '27-02-2023-20-51-41-04-05-2022-14-26-43-eu.jpeg', '2023-02-27'),
(19, 'Gerente Teste', 'gerente@hotmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Gerente', 'Sim', '(55) 55555-5555', '', 'sem-foto.jpg', '2023-02-28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `leitores`
--
ALTER TABLE `leitores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `leitores`
--
ALTER TABLE `leitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
