-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2021 a las 23:47:05
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cesec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_curso`
--

CREATE TABLE `compra_curso` (
  `id_compra` int(11) NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra_curso`
--

INSERT INTO `compra_curso` (`id_compra`, `pais`, `direccion`, `estado`, `cp`, `id_venta`) VALUES
(23, '8', 'Fraccionamiento Lagunas 2', 'Tabasco', '86019', 127);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'CURSO#01 - Conoce sobre lo básico de un equipo de cómputo', 'Septiembre 21, 2021', 'En este curso, aprenderás lo básico sobre como operar un equipo de cómputo hasta como preservar de este ante amenzazas como malwares o posibles riesgos físicos.', 'pcbasico.jpg', 399.99),
(2, 'CURSO#02 - Conoce e interactúa sobre los equipos de cómputo y sus elementos', 'Septiembre 29, 2021', 'Es una máquina electrónica capaz de almacenar información y tratarla automáticamente mediante operaciones matemáticas y lógicas controladas por programas informáticos. Anímate y conoce más sobre una computadora.', 'computadora.jpg', 190),
(3, 'CURSO#03 - Aprende sobre los sistemas operativos', 'Octubre 01, 2021', 'En este curso aprenderás lo relacionado con los sistemas operativos, aprenderás a utilizar windows, linux y sus familias. Además descubrirás sobre sus características, ventajas y desventajas de utilizar un sistema operativo diferente.', 'windows.png', 99.9),
(4, 'CURSO#04 - Infórmate sobre las diferentes aplicaciones básicas en un equipo de cómputo', 'Octubre 14, 2021', 'Conoce sobre las diferentes aplicaciones básicas que necesitas para realizar ciertas actividades ya sea en tu oficina, escuela o casa. Este curso te ayudará a conocer sobre que herramientas que necesitas para tus ámbitos laborales, educativos u hogareños.', 'office.png', 349.9),
(5, 'CURSO#05 - Comprende sobre los dispositivos periféricos', 'Octubre 25, 2021', 'Los dispositivos periféricos son dispositivos externos al ordenador que permiten la comunicación entre las personas y los ordenadores, como la entrada y salida de información desde o hacia el mismo ordenador. Ánimate y conoce sobre los diferentes dispositivos periféricos y sus características.', 'dispositivosp.jpg', 420),
(6, 'CURSO#06 - Herramientas para ensamblar un equipo de cómputo', 'Octubre 31, 2021', 'En este curso aprenderás sobre el empleo de las diferentes herrramientas, cuáles son sus fines y porque pueden presentar peligro en un taller de cómputo. Por lo que este curso te ayudará a entender porque representa un gran impacto para ensamblar y desamblar una computadora y porque representa un riesgo al momento de reparar un equipo de cómputo.', 'herramientaspcgamer.jpg', 149.9),
(7, 'CURSO#07 - Aprende a ensamblar y desamblar un equipo de cómputo', 'Noviembre 07, 2021', 'Este curso te enseñará a ensamblar y desamblar una computadora, además de conocer cada uno de los elementos internos de una computadora. Este curso está ligado al anterior ya que debes tener las herramientas adecuadas para realizar dicho ensamble o desamble.', 'ensamblando.jpg', 399.99),
(8, 'CURSO#08 - Internet', 'Noviembre 15, 2021', 'Este es creado con el fin de que los usuarios conozcan sobre el internet sus peligros y sus ventajas; hoy en día el internet es una herramienta primordial, cualquier persona sabe que es el internet. Lo que la mayoría no sabe es que el internet puede representar un riesgo para los usuarios que no conocen sobre los peligros al navegar.', 'internet.jpg', 99.99),
(9, 'CURSO#09 - Conoce e instala navegadores web', 'Noviembre 21, 2021', 'Este curso encontrarás toda la información sobre los navegadores web y que navegador se acopla mejor a tu equipo de cómputo. También conocerás sobre los primeros navegadores web y cualés eran sus principales funciones.', 'navegador.png', 49.99),
(10, 'CURSO#10 - Internet de todas las cosas', 'Noviembre 30, 2021', 'Anímate y conoce nuestro nuevo curso acerca de IoT, no te quedes en el pasado y conoce más sobre este amplio mundo llamado ', 'IoT.jpg', 368);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_venta`
--

CREATE TABLE `cursos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_venta`
--

INSERT INTO `cursos_venta` (`id`, `id_venta`, `id_curso`, `precio`) VALUES
(21, 127, 3, 99.9),
(22, 127, 8, 99.99),
(23, 127, 2, 190);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `img_perfil` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `password`, `img_perfil`, `nivel`) VALUES
(18, 'José Manuel María Lázaro', '9933058032', 'Manuelml@gmail.com', 'adc16fa41a38b174232f206e0b2bd006baaace68', 'default.jpg', 'admin'),
(30, 'Valentina María Soto', '9933030567', 'ValentinaMS@gmail.com', 'f12ef76362a78d21a2888c9a29f901106e314aa7', 'default.jpg', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` date NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`, `status`, `id_pago`) VALUES
(127, 30, 452.2724, '2021-08-14', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra_curso`
--
ALTER TABLE `compra_curso`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_venta`
--
ALTER TABLE `cursos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra_curso`
--
ALTER TABLE `compra_curso`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cursos_venta`
--
ALTER TABLE `cursos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
