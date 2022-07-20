-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2022 a las 05:23:47
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_baru`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `room_type_id`, `startdate`, `enddate`, `admin_id`) VALUES
(10, 1, '2017-04-29', '2017-05-01', 1),
(11, 2, '2017-04-29', '2017-05-01', 1),
(12, 3, '2017-04-29', '2017-05-01', 2),
(13, 2, '2017-05-02', '2017-05-05', 2),
(14, 1, '2017-05-06', '2017-05-10', 1),
(15, 3, '2017-05-26', '2017-05-29', 2),
(16, 2, '2017-05-26', '2017-05-29', 2),
(17, 2, '2017-05-06', '2017-05-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation_user`
--

CREATE TABLE `reservation_user` (
  `user_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation_user`
--

INSERT INTO `reservation_user` (`user_id`, `reservation_id`) VALUES
(1, 10),
(2, 11),
(3, 12),
(4, 13),
(1, 14),
(2, 15),
(3, 16),
(4, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms_type`
--

CREATE TABLE `rooms_type` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rooms_type`
--

INSERT INTO `rooms_type` (`id`, `name`, `nof`) VALUES
(1, 'Single', 2),
(2, 'Double', 1),
(3, 'Shared', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phonenumber` int(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `phonenumber`, `birthdate`, `email`) VALUES
(1, 'Jhon', 'Does', 1451395160, '1980-09-28', 'jdones@gmail.com'),
(2, 'Jane', 'Jackson', 1709896062, '1985-05-01', 'jjacksonq@yahoo.com'),
(3, 'Alex', 'Smith', 1742823999, '1990-05-28', 'jasmith@outlook.com'),
(4, 'Johana', 'Rolling', 1806460961, '1981-10-31', 'jkrolling@uk.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservation_user`
--
ALTER TABLE `reservation_user`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indices de la tabla `rooms_type`
--
ALTER TABLE `rooms_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rooms_type`
--
ALTER TABLE `rooms_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservation_user`
--
ALTER TABLE `reservation_user`
  ADD CONSTRAINT `reservation_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reservation_user_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
