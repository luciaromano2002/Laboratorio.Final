-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2023 a las 14:00:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `LaboratorioFinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REGISTRO_USUARIOS`
--

CREATE TABLE `REGISTRO_USUARIOS` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `FIRST_SURNAME` varchar(30) NOT NULL,
  `SECOND_SURNAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `REGISTRO_USUARIOS`
--

INSERT INTO `REGISTRO_USUARIOS` (`ID`, `NAME`, `FIRST_SURNAME`, `SECOND_SURNAME`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Lucia', 'Romano ', '', 'luciaromano@gmail.com', 'luciaromano', 'forms'),
(2, 'Maria', 'Martinez', '', 'mariamartinez@gmail.com', 'mariamartinez', 'mtnz'),
(3, 'Juan', 'Garcia ', 'Lopez', 'juangarcialopez@gmail.com', 'juangarcia', 'lopez'),
(4, 'Marcos', 'Alvarez', '', 'marcosalvarez@gmail.com', 'marcosalvarez', 'marcos'),
(5, 'Laura', 'Rodriguez', 'Sierra', 'laurarodriguezsierra@gmail.com', 'laura.r.sierra', 'sierra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `REGISTRO_USUARIOS`
--
ALTER TABLE `REGISTRO_USUARIOS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `REGISTRO_USUARIOS`
--
ALTER TABLE `REGISTRO_USUARIOS`
--TIENE UN VALOR DE 6 POR UNA PRUEBA QUE HICE, TUVE QUE BORRAR EL 5 Y VOLVERLO A PONER
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
