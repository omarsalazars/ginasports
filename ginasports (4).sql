-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2019 a las 05:50:00
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ginasports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `date`) VALUES
(1, 'carlos_aranda', 'admin', 'hola tengo una pregunta', '2018-12-12 15:59:12'),
(2, 'beristain', 'carlos_aranda', 'en que te ayudamos???', '2018-12-12 15:59:36'),
(3, 'beristain', '', 'Hola', '2018-12-13 01:32:37'),
(4, 'beristain', 'sss', 'Hola', '2018-12-13 01:36:03'),
(5, 'admin', 'beristain', 'HOLA', '2018-12-13 02:42:27'),
(6, 'admin', 'beristain', 'hola', '2018-12-13 02:46:54'),
(7, 'carlos_aranda', 'admin', 'Nada, solo estoy viendo', '2018-12-12 22:01:53'),
(8, 'admin', 'carlos_aranda', 'ah bueno', '2018-12-12 22:02:36'),
(9, 'carlos_aranda', 'admin', 'Que tenga buen dia', '2018-12-12 22:05:30'),
(10, 'admin', 'carlos_aranda', 'lll', '2018-12-13 05:37:00'),
(11, 'admin', 'carlos_aranda', 'lll', '2018-12-13 05:37:15'),
(12, 'admin', 'carlos_aranda', 'asndb', '2018-12-13 05:37:21'),
(13, 'admin', 'carlos_aranda', '', '2018-12-13 05:59:44'),
(14, 'admin', 'carlos_aranda', 'lll', '2018-12-13 08:18:01'),
(15, 'admin', 'carlos_aranda', 'puto', '2018-12-14 00:51:22'),
(16, 'admin', 'carlos_aranda', 'puto', '2018-12-14 00:55:53'),
(17, 'carlos_aranda', 'admin', 'jejejeje', '2018-12-14 00:57:03'),
(18, 'carlos_aranda', 'admin', 'kokoko', '2018-12-14 01:04:57'),
(19, 'carlos_aranda', 'admin', 'llll', '2018-12-14 01:06:23'),
(20, 'admin', 'mon', 'llll', '2018-12-16 03:15:24'),
(21, 'admin', 'mon', 'llll', '2018-12-16 03:20:50'),
(22, 'admin', 'carlos_aranda', 'ya regrese', '2018-12-16 03:24:53'),
(23, 'carlos_aranda', 'admin', 'que tal', '2018-12-16 04:12:22'),
(24, 'admin', 'carlos_aranda', 'pues nada', '2018-12-16 04:12:35'),
(25, 'carlos_aranda', 'admin', 'ah que puto', '2018-12-16 04:13:35'),
(26, 'admin', 'carlos_aranda', 'chingatumadre', '2018-12-16 04:22:55'),
(27, 'admin', 'beris', 'que pedo beris', '2018-12-16 13:57:08'),
(28, 'admin', 'omars', 'prro', '2018-12-16 13:57:22'),
(29, 'admin', 'carlos_aranda', 'Qué onda perro', '2018-12-18 02:41:35'),
(30, 'admin', 'carlos_aranda', 'Pélame', '2018-12-18 02:41:47'),
(31, 'admin', 'carlos_aranda', 'Eh', '2018-12-18 02:42:08'),
(32, 'admin', 'carlos_aranda', 'Wey', '2018-12-18 02:42:15'),
(33, 'admin', 'mon', 'Hola', '2018-12-18 02:44:20'),
(34, 'mon', 'admin', 'hokpdcjpods', '2018-12-18 02:44:30'),
(35, 'mon', 'admin', 'd', '2018-12-18 02:44:32'),
(36, 'admin', 'mon', 'Hola hola hla ', '2018-12-18 02:44:32'),
(37, 'mon', 'admin', 'd', '2018-12-18 02:44:32'),
(38, 'admin', 'mon', 'kldsn', '2018-12-18 02:44:33'),
(39, 'admin', 'mon', 'dsf', '2018-12-18 02:44:33'),
(40, 'admin', 'mon', 'sdf', '2018-12-18 02:44:33'),
(41, 'admin', 'mon', 'sdf', '2018-12-18 02:44:34'),
(42, 'admin', 'mon', 'sdf', '2018-12-18 02:44:34'),
(43, 'admin', 'mon', 'dsf', '2018-12-18 02:44:34'),
(44, 'admin', 'mon', 'sdfds', '2018-12-18 02:44:35'),
(45, 'admin', 'mon', 'fds', '2018-12-18 02:44:35'),
(46, 'admin', 'mon', 'fds', '2018-12-18 02:44:35'),
(47, 'carlos_aranda', 'admin', 'q', '2018-12-18 02:47:56'),
(48, 'beris', 'admin', 'gg', '2018-12-18 02:57:17'),
(49, 'beris', 'admin', 'j', '2018-12-18 02:57:18'),
(50, 'beris', 'admin', 'j', '2018-12-18 02:57:19'),
(51, 'beris', 'admin', 'j', '2018-12-18 02:57:20'),
(52, 'beris', 'admin', 'j', '2018-12-18 02:57:20'),
(53, 'carlos_aranda', 'admin', 'hola', '2018-12-18 04:31:36'),
(54, 'admin', 'carlos_aranda', 'Quépedo', '2018-12-18 04:32:57'),
(55, 'carlos_aranda', 'admin', 'hehehehe', '2018-12-17 21:35:51'),
(56, 'mon', 'admin', 'Hola', '2018-12-18 08:56:06'),
(57, 'admin', 'carlos_aranda', 'Hola', '2018-12-18 10:23:33'),
(58, 'mon', 'admin', 'Hola', '2018-12-19 00:36:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `productname`, `description`, `price`, `discount`, `stock`, `image`, `type`, `gender`) VALUES
(1, 'Armazón', 'Armazón económico', 1000, 10, 0, '2', 'Lentes', 'Masculino'),
(2, 'Lentes de Sol', 'UV +1000', 1000, 5, 9, '1', 'Lentes', 'Masculino'),
(3, 'Lentes de sol', 'Protección UV', 1000, 0, 10, '2', 'Lentes', 'Femenino'),
(4, 'Tenis', 'Blancos con franjas negras a los costados', 800, 0, 5, '1', 'Calzado', 'Masculino'),
(5, 'Tenis', 'Tenis blanco', 1200, 10, 2, '1', 'Calzado', 'Masculino'),
(6, 'Tenis', 'Color morado', 750, 0, 2, '1', 'Calzado', 'Femenino'),
(7, 'Playera', 'Rosa ', 240, 0, 3, '1', 'Ropa', 'Femenino'),
(8, 'Playera', 'Manga larga', 350, 15, 6, '1', 'Ropa', 'Unisex'),
(9, 'Leggin', 'Gris oscuro', 180, 0, 1, '1', 'Ropa', 'Femenino'),
(10, 'Lentes de sol', 'Azules', 170, 0, 6, '1', 'Lentes', 'Femenino'),
(11, 'Lentes', 'Rosas', 150, 10, 0, '1', 'Lentes', 'Femenino'),
(12, 'Lentes', 'Amarillo', 235, 20, 4, '1', 'Lentes', 'Masculino'),
(13, 'Lentes', 'Oscuros', 200, 10, 4, '1', 'Lentes', 'Unisex'),
(14, 'Google', 'Google', 100000000000, 0, 1, '1', 'Calzado', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `selector` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `passwd`, `email`, `firstName`, `lastName`, `active`, `admin`, `selector`) VALUES
(21, 'mon', '$2y$10$pl99Y8SqsG8tOUMmIpcSL.6QEyKprWMBfjXcyZh/6GHOp.aJoGYRS', 'monica.abarriosz@hotmail.com', 'Mónica', 'Barrios', 1, 0, 'nHRjPx9_a_j5'),
(29, 'carlos_aranda', '$2y$10$vw1cgpgkivvp57UTx7eX4ObCEU7yL8Cm3SYPv.xmCX/cx2rURUhLG', 'carlos.eao15@gmail.com', 'Carlos', 'Aranda', 0, 0, 'gOxPaVz7kyjS'),
(31, 'beris', '$argon2i$v=19$m=1024,t=2,p=2$YXowMW9mZjFpcUFWWXlEeg$7jORcsS4CCC9kYBgDxwL7I0zhl/OedhSyQNoF5zHpgA', 'ed.beristain147@gmail.com', 'Edgar', 'Beristain', 1, 1, '8S2e2FfFhGs2'),
(32, 'omars', '$argon2i$v=19$m=1024,t=2,p=2$RlVNT1pnVGk3aHZVamxldQ$BUKyR44OTwbHaRxx5TIWP1skG/aSut2rsEUmTKcF2WI', 'omarsalazarx@gmail.com', 'Omar', 'Salazar', 1, 0, '5KGtcjfk8a4J'),
(36, 'beristain', '$2y$10$IYxe9MdO1rGgMr7YAkb3ZuJ6YCWNMXjRnqo.YPi3lG8D4HxZ0TldG', 'edwir147@gmail.com', 'Edgar', 'Beristain', 1, 1, 'R8qiN-ufwZ6G'),
(37, 'moni', '$2y$10$6nRfU.ugbf/u/jfV7NT0/uMbDfDENSe5oPZxPlou08Qd/5QMWsd3q', 'm.adrianabz@gmail.com', 'Moni', 'Barrios', 1, 0, 'dWlNi7lPeNUV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `views`
--

INSERT INTO `views` (`id`, `date`) VALUES
(1, '2018-12-17 03:22:33'),
(2, '2018-12-17 03:23:26'),
(3, '2018-12-17 15:28:22'),
(4, '2018-12-17 15:29:26'),
(5, '2018-12-17 15:30:13'),
(6, '2018-12-17 15:30:20'),
(7, '2018-12-17 15:31:00'),
(8, '2018-12-17 15:37:50'),
(9, '2018-12-17 16:54:29'),
(10, '2018-12-17 17:07:13'),
(11, '2018-12-17 17:13:34'),
(12, '2018-12-17 17:19:03'),
(13, '2018-12-17 17:20:43'),
(14, '2018-12-17 17:29:16'),
(15, '2018-12-17 17:32:28'),
(16, '2018-12-17 17:33:42'),
(17, '2018-12-17 17:35:55'),
(18, '2018-12-17 18:01:43'),
(19, '2018-12-17 18:03:10'),
(20, '2018-12-17 18:10:44'),
(21, '2018-12-17 18:17:34'),
(22, '2018-12-17 18:25:38'),
(23, '2018-12-17 18:26:18'),
(24, '2018-12-17 18:26:30'),
(25, '2018-12-17 18:27:37'),
(26, '2018-12-17 18:30:52'),
(27, '2018-12-17 18:31:48'),
(28, '2018-12-17 18:35:20'),
(29, '2018-12-17 18:35:37'),
(30, '2018-12-17 18:36:28'),
(31, '2018-12-17 18:39:28'),
(32, '2018-12-17 18:44:12'),
(33, '2018-12-17 18:47:03'),
(34, '2018-12-17 18:47:22'),
(35, '2018-12-17 18:50:16'),
(36, '2018-12-17 18:50:30'),
(37, '2018-12-17 18:50:36'),
(38, '2018-12-17 18:50:51'),
(39, '2018-12-17 19:01:21'),
(40, '2018-12-17 19:02:29'),
(41, '2018-12-17 19:05:43'),
(42, '2018-12-17 19:05:59'),
(43, '2018-12-17 19:06:51'),
(44, '2018-12-17 19:09:45'),
(45, '2018-12-17 19:09:52'),
(46, '2018-12-17 19:13:06'),
(47, '2018-12-17 19:14:05'),
(48, '2018-12-17 19:14:19'),
(49, '2018-12-17 19:16:09'),
(50, '2018-12-17 19:17:34'),
(51, '2018-12-17 19:19:40'),
(52, '2018-12-17 20:39:19'),
(53, '2018-12-17 20:41:15'),
(54, '2018-12-17 20:41:32'),
(55, '2018-12-17 20:41:48'),
(56, '2018-12-17 21:00:46'),
(57, '2018-12-17 21:10:44'),
(58, '2018-12-17 21:11:57'),
(59, '2018-12-17 21:16:17'),
(60, '2018-12-17 21:17:59'),
(61, '2018-12-17 21:19:34'),
(62, '2018-12-17 21:30:01'),
(63, '2018-12-17 21:30:12'),
(64, '2018-12-18 02:20:35'),
(65, '2018-12-18 11:22:55'),
(66, '2018-12-18 11:36:49'),
(67, '2018-12-18 15:07:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
