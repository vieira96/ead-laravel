-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13-Nov-2020 às 17:59
-- Versão do servidor: 8.0.22-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

CREATE TABLE `classes` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` int NOT NULL,
  `course_id` int NOT NULL,
  `order` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `classes`
--

INSERT INTO `classes` (`id`, `module_id`, `course_id`, `order`, `name`) VALUES
(1, 1, 1, 1, 'Aula-1-Inicio'),
(2, 2, 1, 1, 'Intermediario-inicio'),
(3, 1, 1, 2, 'teste-2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `owner_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `courses`
--

INSERT INTO `courses` (`id`, `slug`, `name`, `image`, `description`, `owner_id`) VALUES
(1, 'php', 'PHP', 'php.jpeg', 'teste', 1),
(2, 'html', 'HTML', 'html.jpeg', 'html testee descrição com um lorem ipsum cupade se liga nessa descrição maneira em', 1),
(3, 'javascript', 'Java Script', '9074816050472038386.jpeg', 'Curso de Java Script', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historic`
--

CREATE TABLE `historic` (
  `id` bigint UNSIGNED NOT NULL,
  `data_viewed` datetime NOT NULL,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_20_011954_create_all_tables', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modules`
--

CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `name`) VALUES
(1, 1, 'iniciante'),
(2, 1, 'intermediario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` int NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `answer` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `body` text,
  `stars` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ratings`
--

INSERT INTO `ratings` (`id`, `course_id`, `body`, `stars`) VALUES
(1, 1, 'testando', 3),
(2, 1, 'teste2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `student_course`
--

CREATE TABLE `student_course` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `student_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `student_course`
--

INSERT INTO `student_course` (`id`, `course_id`, `student_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 1, 3),
(5, 1, 6),
(6, 1, 5),
(7, 3, 5),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `office` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `office`) VALUES
(1, 'Samuel', 'teste@gmail.com', '$2y$10$WsL9z7vPWgJDQDW07iKIWeKFhrxFKMIs9MwcyKX1QznnG2F1y6bi2', 0),
(2, 'WILLIAM PEREIRA DA SILVA', 'admin@admin.com.br', '$2y$10$y/83MTQBnH8Ip8a6kPcqn.cHQlWp.7gxnS.PfHbPLYyj2GnD0NOWS', 0),
(3, 'Samuel', 'testador@hotmail.com.br', '$2y$10$uDMSlH1uQR8bQgXbhz517u8WlpZEaVrbzSZ1zWjlWKRLx7pr0OfTO', 0),
(4, 'samuel', 'samuelvieiradasilva96@hotmail.com', '$2y$10$1uklJxVq0j/6iJQyocAZXeNCpPrgyX2v1euQ0un1XYtf5dKi4ycia', 0),
(5, 'admin', 'admin@admin.com', '$2y$10$uSDLl1yiTp59n8p5avaDCuRacIj3H.johti0BRF8dH3Jr6qORgQzG', 2),
(6, 'meiri lúcia de almeida', 'meiriluciadealmeida@hotmail.com', '$2y$10$ayiT359dywZ/sHSAv23hr.QEAhOkbxYfRqn.7ewj/AIrW2KCj5psG', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `class_id`, `description`, `url`) VALUES
(1, 1, NULL, 'https://www.youtube.com/embed/8lsXiBYNCVM'),
(2, 2, NULL, 'https://www.youtube.com/embed/rBVjbjGVVjo'),
(3, 3, NULL, 'https://www.youtube.com/embed/HCWl554M1SI');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_id` (`course_id`) USING BTREE;

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `historic`
--
ALTER TABLE `historic`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
