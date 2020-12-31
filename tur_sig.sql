-- Versión de PHP: 7.4.11
--
-- Base de datos: `tur_sig`
--
CREATE DATABASE IF NOT EXISTS `tur_sig` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tur_sig`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos_y_bebidas`
--

DROP TABLE IF EXISTS `alimentos_y_bebidas`;
CREATE TABLE `alimentos_y_bebidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  `fecha_registro` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `pag_web` varchar(255) DEFAULT NULL,
  `id_comercial` varchar(100) DEFAULT NULL,
  `horarios` varchar(255) DEFAULT NULL,
  `precios` varchar(255) DEFAULT NULL,
  `aire_acondicionado` tinyint(4) DEFAULT NULL,
  `tarjetas_de_credito` tinyint(4) DEFAULT NULL,
  `n_mesas` int(11) DEFAULT NULL,
  `n_sillas` int(11) DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimentos_y_bebidas`
--

INSERT INTO `alimentos_y_bebidas` (`id`, `nombre`, `direccion`, `fecha_registro`, `telefono`, `correo`, `pag_web`, `id_comercial`, `horarios`, `precios`, `aire_acondicionado`, `tarjetas_de_credito`, `n_mesas`, `n_sillas`, `observaciones`, `activo`) VALUES
(7, 'Frites and Grill', 'Bo. Suyapita, a 100m de los semáforos', '27-10-2020', '2773-1232', 'fritesgrill@gmail.com', 'fritesgrill.com', 'IF-1233', 'de 11am a 9pm', '100-900', 0, 1, 10, 40, 'observaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_oferta_alimentos`
--

DROP TABLE IF EXISTS `especialidad_oferta_alimentos`;
CREATE TABLE `especialidad_oferta_alimentos` (
  `id` int(11) NOT NULL,
  `carnes` tinyint(4) DEFAULT NULL,
  `pescado_mariscos` tinyint(4) DEFAULT NULL,
  `pastas` tinyint(4) DEFAULT NULL,
  `comida_vegetariana` tinyint(4) DEFAULT NULL,
  `mixtas` tinyint(4) DEFAULT NULL,
  `comida_rapida` tinyint(4) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_alimentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad_oferta_alimentos`
--

INSERT INTO `especialidad_oferta_alimentos` (`id`, `carnes`, `pescado_mariscos`, `pastas`, `comida_vegetariana`, `mixtas`, `comida_rapida`, `otro`, `id_alimentos`) VALUES
(9, 1, 0, 1, 0, 1, 1, 'Hamburguesas', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancia_huespedes_hotel`
--

DROP TABLE IF EXISTS `estancia_huespedes_hotel`;
CREATE TABLE `estancia_huespedes_hotel` (
  `id_estancia_huespedes` int(11) NOT NULL,
  `locales` tinyint(1) DEFAULT NULL,
  `nacionales` tinyint(1) DEFAULT NULL,
  `extranjeros` tinyint(1) DEFAULT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estancia_huespedes_hotel`
--

INSERT INTO `estancia_huespedes_hotel` (`id_estancia_huespedes`, `locales`, `nacionales`, `extranjeros`, `id_hotel`) VALUES
(1, 1, 1, 1, 1),
(3, 1, 1, 1, 3),
(4, 0, 0, 0, 4),
(5, 1, 1, 1, 5),
(6, 1, 1, 1, 6),
(7, 1, 1, 1, 7),
(8, 1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

DROP TABLE IF EXISTS `hoteles`;
CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_registro` varchar(100) DEFAULT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `pag_web` varchar(1000) DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `numero_camas` int(11) DEFAULT NULL,
  `numero_habitaciones` int(11) DEFAULT NULL,
  `desayuno_incluido` tinyint(1) NOT NULL,
  `capacidad_salon_eventos` varchar(150) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id`, `nombre`, `fecha_registro`, `direccion`, `telefono`, `correo`, `pag_web`, `horario`, `numero_camas`, `numero_habitaciones`, `desayuno_incluido`, `capacidad_salon_eventos`, `activo`) VALUES
(1, 'Hotel Vuestra Casa', '08-10-2020', 'Barrio el centro, Avenida Francisco Morazan', '2773-1233', 'hotelvuestracasa@gmail.com', 'hotelvuestracasahn.com', 'de 7am a 10pm', 24, 14, 1, '50, 100, 200', 1),
(3, 'Hotel Plaza San Pablo', '20-10-2020', 'Frente a plaza cívica la amistad', '27732380', 'hsanpablo77@gmail.com', 'hotelplazasan', '24/7', 63, 36, 1, '1', 1),
(4, 'Hotel Zari', '20-10-2020', 'Barrio El Centro', '27730015', 'hotelzari@yahoo.com', 'www.hotelzari.com', '24/7', 0, 0, 0, '0', 1),
(5, 'Hotel Gomez', '20-10-2020', 'Barrio el centro frente carrion', '27730868', 'inversiones.gomez@yahoo.com', '', 'de 7am a 10pm', 58, 40, 0, '0', 1),
(6, 'Hotel Panamericano ', '20-10-2020', 'Barrio el centro, 1 ave 0-1 calle N.E.', '27730202', 'info@hotelpanamericanohn.com', 'www.hotelpanamericanohn.com', '24/7', 44, 29, 0, '0', 1),
(7, 'Hotel Granja DELIA', '20-10-2020', 'Barrio paso Hondo ', '27730414', 'granja_delia@yahoo.com', 'www.granjadelia.com', '6:00 am a 8:00 pm ', 0, 70, 1, '5000', 1),
(8, 'La Bellota Hotel', '20-10-2020', '6 cuadras al este de la plaza civica ', '27730783', 'labellotahotel@gmail.com', 'La Bellota Hotel', '24/7', 0, 0, 1, '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_hotel`
--

DROP TABLE IF EXISTS `servicios_hotel`;
CREATE TABLE `servicios_hotel` (
  `id_servicios` int(11) NOT NULL,
  `telefono` tinyint(1) DEFAULT NULL,
  `television` tinyint(1) DEFAULT NULL,
  `wifi` tinyint(1) DEFAULT NULL,
  `pos` tinyint(1) DEFAULT NULL,
  `agua_caliente` tinyint(1) DEFAULT NULL,
  `aire_acondicionado` tinyint(1) DEFAULT NULL,
  `cafeteria` tinyint(1) DEFAULT NULL,
  `ventilador` tinyint(1) DEFAULT NULL,
  `estacionamiento` tinyint(1) DEFAULT NULL,
  `lavanderia` tinyint(1) DEFAULT NULL,
  `piscina` tinyint(4) DEFAULT NULL,
  `servicio_habitacion` tinyint(4) DEFAULT NULL,
  `Otro` varchar(255) DEFAULT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios_hotel`
--

INSERT INTO `servicios_hotel` (`id_servicios`, `telefono`, `television`, `wifi`, `pos`, `agua_caliente`, `aire_acondicionado`, `cafeteria`, `ventilador`, `estacionamiento`, `lavanderia`, `piscina`, `servicio_habitacion`, `Otro`, `id_hotel`) VALUES
(1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 'Área verde', 1),
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '', 3),
(4, 0, 1, 1, 0, 1, 1, 0, 1, 1, 1, 0, 0, '', 4),
(5, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '', 5),
(6, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 'seguridad privada, servicios de consejería', 6),
(7, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, '', 7),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas_hotel`
--

DROP TABLE IF EXISTS `tarifas_hotel`;
CREATE TABLE `tarifas_hotel` (
  `id_tarifa` int(11) NOT NULL,
  `sencilla` varchar(255) DEFAULT NULL,
  `doble` varchar(255) DEFAULT NULL,
  `triple` varchar(255) DEFAULT NULL,
  `cuadruple` varchar(255) DEFAULT NULL,
  `suite` varchar(255) DEFAULT NULL,
  `suite_presidencial` varchar(255) DEFAULT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifas_hotel`
--

INSERT INTO `tarifas_hotel` (`id_tarifa`, `sencilla`, `doble`, `triple`, `cuadruple`, `suite`, `suite_presidencial`, `id_hotel`) VALUES
(1, '400.60, 500.50', '700', '1200', '3400', '', '', 1),
(3, '400', '600', '800', '1200', '0', '0', 3),
(4, '300', '500', '660', '740', '0', '0', 4),
(5, '400', '550', '900', '0', '0', '0', 5),
(6, '340', '510', '610', '710', '0', '0', 6),
(7, '661', '1102', '1347', '1592', '1225', '2975', 7),
(8, '0', '0', '0', '0', '0', '0', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_servicio_alimentos`
--

DROP TABLE IF EXISTS `tipos_servicio_alimentos`;
CREATE TABLE `tipos_servicio_alimentos` (
  `id` int(11) NOT NULL,
  `a_la_carta` tinyint(4) DEFAULT NULL,
  `buffet` tinyint(4) DEFAULT NULL,
  `comida_rapida` tinyint(4) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_alimentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_servicio_alimentos`
--

INSERT INTO `tipos_servicio_alimentos` (`id`, `a_la_carta`, `buffet`, `comida_rapida`, `otro`, `id_alimentos`) VALUES
(11, 1, 0, 1, '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alojamiento`
--

DROP TABLE IF EXISTS `tipo_alojamiento`;
CREATE TABLE `tipo_alojamiento` (
  `id` int(11) NOT NULL,
  `hotel` tinyint(4) DEFAULT NULL,
  `aparthotel` tinyint(4) DEFAULT NULL,
  `hospedaje` tinyint(4) DEFAULT NULL,
  `campamento` tinyint(4) DEFAULT NULL,
  `casa_huespedes` tinyint(4) DEFAULT NULL,
  `motel` tinyint(4) DEFAULT NULL,
  `villas_cabanas` tinyint(4) DEFAULT NULL,
  `Otro` varchar(255) DEFAULT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_alojamiento`
--

INSERT INTO `tipo_alojamiento` (`id`, `hotel`, `aparthotel`, `hospedaje`, `campamento`, `casa_huespedes`, `motel`, `villas_cabanas`, `Otro`, `id_hotel`) VALUES
(1, 0, 0, 0, 1, 0, 1, 0, 'Hostal', 1),
(3, 1, 0, 0, 0, 0, 0, 0, '', 3),
(4, 1, 0, 0, 0, 0, 0, 0, '', 4),
(5, 1, 0, 0, 0, 0, 0, 0, '', 5),
(6, 1, 0, 0, 0, 0, 0, 0, '', 6),
(7, 1, 0, 0, 0, 0, 0, 0, '', 7),
(8, 1, 0, 0, 0, 0, 0, 0, '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_oferta_alimentos`
--

DROP TABLE IF EXISTS `tipo_oferta_alimentos`;
CREATE TABLE `tipo_oferta_alimentos` (
  `id` int(11) NOT NULL,
  `restaurante` tinyint(4) DEFAULT NULL,
  `cafeteria` tinyint(4) DEFAULT NULL,
  `cafe` tinyint(4) DEFAULT NULL,
  `pizzeria` tinyint(4) DEFAULT NULL,
  `reposteria_tipica` tinyint(4) DEFAULT NULL,
  `heladeria` tinyint(4) DEFAULT NULL,
  `comedor` tinyint(4) DEFAULT NULL,
  `centro` tinyint(4) DEFAULT NULL,
  `penia` tinyint(4) DEFAULT NULL,
  `comida_rapida` tinyint(4) DEFAULT NULL,
  `gastronomia` tinyint(4) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_alimentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_oferta_alimentos`
--

INSERT INTO `tipo_oferta_alimentos` (`id`, `restaurante`, `cafeteria`, `cafe`, `pizzeria`, `reposteria_tipica`, `heladeria`, `comedor`, `centro`, `penia`, `comida_rapida`, `gastronomia`, `otro`, `id_alimentos`) VALUES
(11, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'Jugos naturales', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos_y_bebidas`
--
ALTER TABLE `alimentos_y_bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad_oferta_alimentos`
--
ALTER TABLE `especialidad_oferta_alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alimentos` (`id_alimentos`);

--
-- Indices de la tabla `estancia_huespedes_hotel`
--
ALTER TABLE `estancia_huespedes_hotel`
  ADD PRIMARY KEY (`id_estancia_huespedes`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_hotel`
--
ALTER TABLE `servicios_hotel`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `tarifas_hotel`
--
ALTER TABLE `tarifas_hotel`
  ADD PRIMARY KEY (`id_tarifa`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `tipos_servicio_alimentos`
--
ALTER TABLE `tipos_servicio_alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alimentos` (`id_alimentos`);

--
-- Indices de la tabla `tipo_alojamiento`
--
ALTER TABLE `tipo_alojamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `tipo_oferta_alimentos`
--
ALTER TABLE `tipo_oferta_alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alimentos` (`id_alimentos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos_y_bebidas`
--
ALTER TABLE `alimentos_y_bebidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especialidad_oferta_alimentos`
--
ALTER TABLE `especialidad_oferta_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estancia_huespedes_hotel`
--
ALTER TABLE `estancia_huespedes_hotel`
  MODIFY `id_estancia_huespedes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios_hotel`
--
ALTER TABLE `servicios_hotel`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarifas_hotel`
--
ALTER TABLE `tarifas_hotel`
  MODIFY `id_tarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipos_servicio_alimentos`
--
ALTER TABLE `tipos_servicio_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_alojamiento`
--
ALTER TABLE `tipo_alojamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_oferta_alimentos`
--
ALTER TABLE `tipo_oferta_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialidad_oferta_alimentos`
--
ALTER TABLE `especialidad_oferta_alimentos`
  ADD CONSTRAINT `especialidad_oferta_alimentos_ibfk_1` FOREIGN KEY (`id_alimentos`) REFERENCES `alimentos_y_bebidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estancia_huespedes_hotel`
--
ALTER TABLE `estancia_huespedes_hotel`
  ADD CONSTRAINT `estancia_huespedes_hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios_hotel`
--
ALTER TABLE `servicios_hotel`
  ADD CONSTRAINT `servicios_hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarifas_hotel`
--
ALTER TABLE `tarifas_hotel`
  ADD CONSTRAINT `tarifas_hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tipos_servicio_alimentos`
--
ALTER TABLE `tipos_servicio_alimentos`
  ADD CONSTRAINT `tipos_servicio_alimentos_ibfk_1` FOREIGN KEY (`id_alimentos`) REFERENCES `alimentos_y_bebidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tipo_alojamiento`
--
ALTER TABLE `tipo_alojamiento`
  ADD CONSTRAINT `tipo_alojamiento_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tipo_oferta_alimentos`
--
ALTER TABLE `tipo_oferta_alimentos`
  ADD CONSTRAINT `tipo_oferta_alimentos_ibfk_1` FOREIGN KEY (`id_alimentos`) REFERENCES `alimentos_y_bebidas` (`id`) ON DELETE CASCADE;
COMMIT;

