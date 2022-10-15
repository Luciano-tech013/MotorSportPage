-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 03:40:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `motorsport_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id` int(200) NOT NULL,
  `nombre` varchar(2000) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `id_categorias` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id`, `nombre`, `descripcion`, `modelo`, `marca`, `id_categorias`) VALUES
(1, 'Audi R8', 'Es un automóvil deportivo de motor central. Usa un monocasco de aluminio que se fabrica usando los principios de malla espacial. El auto se fabrica por Audi Sport GmbH en una nueva fábrica renovada de Audi en Neckarsulm en Alemania.\r\nLa que tenemos aquí es la tercera generación del coche de carreras más ambicioso de Audi. El Audi R8 LMS GT3 Evo II es una bestia de circuito que ha evolucionado conservando su sobrebio propulsor V10.Con la experiencia que la marca germana lleva acumulando décadas en competición, el R8 LMS GT3 Evo II es casi el máximo exponente de sus coches de carreras, con permiso del R8 GT2. Una bestia que comparte genética con otro peso pesado del grupo como el Lamborghini Huracán.En el interior de este atleta alemán se esconde un portentoso motor 5.2 V10 de aspiración natural similar al del modelo de calle, pero modificado extensivamente hasta desparramar unos vertiginosos 585 CV, pero su potencia final variará en función de cada campeonato al que se destine.', 'GT3', 'AUDI', 1),
(2, 'Bentley Continental GT3', 'Se llama Bentley Continental GT3 2018 y es la segunda generación del bólido de la casa de Crewe destinado a las carreras de resistencia, especialmente a las Blancpain GT Series Endurance Cup donde su antecesor ha logrado ya 120 podios y 45 victorias en las 528 carreras disputadas en todo el mundo.\r\n\r\nLa nueva carrocería no puede presentar un aspecto mejor y es que luce numerosos componentes aerodinámicos de fibra de carbono como el splitter frontal, el difusor de aire trasero, los faldones y aletines laterales así como el imponente alerón posterior de tres piezas firmado por Bentley tanto en su parte superior como en la inferior. Con estas modificaciones, la longitud total del GT ha ascendido a los 4,86 metros y la anchura a los 2,05 metros, mientras que la altura se limita a los 1,35 metros.', 'GT3', 'Bentley', 1),
(3, 'RB18', 'El RB18 es un monoplaza que abre un nuevo ciclo reglamentario y, junto con el F1-75, que seguía un concepto aerodinámico diferente, es el coche de referencia del Gran Circo, aunque en prestaciones puras el coche rojo suele mostrar picos superiores.\r\n\r\nEl coche de Adrian Newey tuvo un difícil comienzo de temporada, pero luego el equipo campeón del mundo pudo jugar con Ferrari como el gato y el ratón, consiguiendo nueve victorias (ocho de Vestappen y una de Pérez) frente a las tres de la Scuderia (dos de Leclerc y una de Sainz).\r\n\r\nLa suspensión tiene un diseño inusual: barra de tracción delantera y barra de empuje trasera. Se trata de elecciones dictadas por los requisitos aerodinámicos, pero también van en la dirección de un buen aprovechamiento de los neumáticos. En el RB16B, Newey había introducido un único brazo que unía los dos triángulos inferiores, mientras que en el RB18 propuso esta solución para el triángulo superior, introduciendo, en cambio, brazos multibrazo en la parte inferior.', 'Monoplaza', 'Red Bull (FABRICANTE)', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre`, `descripcion`, `tipo`) VALUES
(1, 'BlancPain Series', 'Blancpain GT Series, es una serie de campeonatos de automovilismo de velocidad que se disputan en Europa desde el año 2011. Participan gran turismos de los reglamentos GT3.', 'CONTINENTAL'),
(2, 'F1', 'El Campeonato Mundial de Fórmula 1 de la FIA, más conocido como Fórmula 1, F1 o Fórmula Uno, es la principal competición de automovilismo internacional y el campeonato de deportes de motor más popular y prestigioso del mundo. La entidad que la dirige es la Federación Internacional del Automóvil.', 'INTERNACIONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`) VALUES
(1, 'Luciano', '$2y$10$bWSo9gi5TDsO8TS0b/ad8O6KmzbUSbrsxrHWtyApO0vaRewt1zn6a'),
(2, 'LucianoDos', '$2y$10$CCdTI4tPB3gYoYVloR9QMeh6cMYXZOUVLs4X1vU4MFf00WGv3J4ue');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categorias`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id_categorias`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
