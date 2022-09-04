-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2022 a las 06:16:01
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vivamexico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(7) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Clave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `Nombre`, `Clave`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodigoCat` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodigoCat`, `Nombre`, `Descripcion`) VALUES
('1', 'Anahuac', 'Dulces'),
('10', 'Lorena', 'Dulces'),
('11', 'Lucas', 'Dulces'),
('12', 'Mega', 'Chamoy'),
('13', 'Pigui', 'Cachetadas'),
('14', 'Ricolino', 'Chocolate relleno'),
('15', 'Tajin', 'Salsa en polvo'),
('16', 'Takis', 'Totopos'),
('17', 'Valentina', 'Salsas'),
('18', 'Zumba', 'Surtidos'),
('2', 'Betamex', 'Paletas'),
('3', 'Candy Pop', 'Dulces'),
('4', 'Chileritos', 'Salsas'),
('5', 'De la Rosa', 'Mazapan'),
('6', 'Dulces Karla', 'Dulces'),
('7', 'Dulces Vero', 'Paletas'),
('8', 'Indy', 'Gomitas'),
('9', 'Kinder', 'Chocolate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `NIT` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `NombreCompleto` varchar(70) NOT NULL,
  `Apellido` varchar(70) NOT NULL,
  `Clave` text NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`NIT`, `Nombre`, `NombreCompleto`, `Apellido`, `Clave`, `Direccion`, `Telefono`, `Email`) VALUES
('1002257697', 'miguelpuma', 'Miguel', 'Puma', 'e10adc3949ba59abbe56e057f20f883e', 'Ibarra', '0968479276', 'bryanpumaec@gmail.com'),
('1004606545', 'bryanpumaec', 'Bryan', 'Puma', '96513c004802df63743c69736a9b9002', 'Iglesia del Tejar, Calle San Jeronimo', '0968479276', 'bryanpumaec@gmail.com'),
('1004966675', 'jeniferalvarez', 'Jenifer', 'Alvarez', '16f7b46066afb981f6afc581577b1d83', 'Ibarra', '0968581030', 'jenicaroalvarez@gmail.com'),
('1727237263', 'edwindiaz', 'edwin', 'diaz', 'e10adc3949ba59abbe56e057f20f883e', 'Cayambe', '968581030', 'edwin.ed948@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabanco`
--

CREATE TABLE `cuentabanco` (
  `id` int(50) NOT NULL,
  `NumeroCuenta` varchar(100) NOT NULL,
  `NombreBanco` varchar(100) NOT NULL,
  `NombreBeneficiario` varchar(100) NOT NULL,
  `TipoCuenta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentabanco`
--

INSERT INTO `cuentabanco` (`id`, `NumeroCuenta`, `NombreBanco`, `NombreBeneficiario`, `TipoCuenta`) VALUES
(1, '2207080496', 'Pichincha', 'Carlosama Mayra', 'Corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `NumPedido` int(20) NOT NULL,
  `CodigoProd` varchar(30) NOT NULL,
  `CantidadProductos` int(20) NOT NULL,
  `PrecioProd` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`NumPedido`, `CodigoProd`, `CantidadProductos`, `PrecioProd`) VALUES
(9, '00010', 5, '10.85'),
(9, '00003', 6, '12.62'),
(10, '00014', 10, '14.80'),
(10, '00011', 5, '10.85'),
(11, '00014', 2, '14.80'),
(11, '00011', 5, '10.85'),
(12, '00014', 1, '14.80'),
(13, '00001', 1, '14.92'),
(13, '00009', 1, '10.85'),
(14, '00014', 1, '14.80'),
(15, '00001', 3, '14.92');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `valor_iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `valor_iva`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(20) NOT NULL,
  `CodigoProd` varchar(30) NOT NULL,
  `NombreProd` varchar(30) NOT NULL,
  `CodigoCat` varchar(30) NOT NULL,
  `Precio` decimal(30,2) NOT NULL,
  `Descuento` int(2) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Stock` int(20) NOT NULL,
  `NITProveedor` varchar(30) NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `CodigoProd`, `NombreProd`, `CodigoCat`, `Precio`, `Descuento`, `Modelo`, `Marca`, `Stock`, `NITProveedor`, `Imagen`, `Nombre`, `Estado`) VALUES
(5, '00005', 'Paleta Gestobola', '2', '19.10', 0, 'Original', 'Betamex', 100, '1002176061001', '00005.png', 'admin', 'Activo'),
(6, '00001', 'Chipiletas Mix Baf', '1', '14.92', 0, 'Original', 'Anahuac', 76, '1002257697001', '00001.png', 'admin', 'Activo'),
(7, '00002', 'Chipileta Orange 30ct', '1', '14.92', 0, 'Original', 'Anahuac', 120, '1002257697001', '00002.png', 'admin', 'Activo'),
(8, '00003', 'Limon 7 Packets', '1', '12.62', 0, 'Original', 'Anahuac', 74, '1002257697001', '00003.png', 'admin', 'Activo'),
(9, '00004', 'Limon 7 Paleta', '1', '15.20', 0, 'Original', 'Anahuac', 35, '1002257697001', '00004.jpg', 'admin', 'Activo'),
(10, '00006', 'Tamarrico Chile 12x50', '2', '28.52', 0, 'Original', 'Betamex', 30, '1002257697001', '00006.png', 'admin', 'Activo'),
(11, '00007', 'Paquete Piñata 3lb', '3', '46.40', 0, 'Original', 'CandyPop', 85, '1002257697001', '00007.png', 'admin', 'Activo'),
(12, '00008', 'Chirris Rebanada', '3', '15.80', 0, 'Original', 'CandyPop', 60, '1002257697001', '00008.png', 'admin', 'Activo'),
(13, '00009', 'Pelonetas Chamoy', '10', '10.85', 0, 'Del puesto', 'Lorena', 59, '1002257697001', '00009.png', 'admin', 'Activo'),
(14, '00010', 'Pelonetas Mango', '10', '10.85', 0, 'Del puesto', 'Lorena', 75, '1002257697001', '00010.png', 'admin', 'Activo'),
(15, '00011', 'Pelonetas Watermelon', '10', '10.85', 0, 'Del puesto', 'Lorena', 90, '1002257697001', '00011.png', 'admin', 'Activo'),
(16, '00012', 'Pelon Pelo Rico', '10', '14.20', 0, 'Mex Pelon Tray 12pc', 'Lorena', 25, '1002257697001', '00012.png', 'admin', 'Activo'),
(17, '00013', 'Pelon Pelonazo', '10', '9.00', 0, 'Del puesto', 'Lorena', 360, '1002257697001', '00013.jpg', 'admin', 'Activo'),
(18, '00014', 'Pelon Tamarindo', '10', '14.80', 0, 'Pelon Pelo Rico 12ct.', 'Lorena', 36, '1002257697001', '00014.png', 'admin', 'Activo'),
(19, '00015', 'Bomvaso Lemon Candy', '11', '12.00', 0, 'Original', 'Lucas', 55, '1002176061001', '00015.jpg', 'admin', 'Activo'),
(20, '00016', 'Crazy Hair Strawberry', '11', '17.50', 0, 'Original', 'Lucas', 80, '1002176061001', '00016.jpg', 'admin', 'Activo'),
(21, '00017', 'Cachetadas Mix 20ct', '1', '6.00', 0, 'Original', 'Pigui', 80, '1002176061001', '00017.jpg', 'admin', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `NITProveedor` varchar(30) NOT NULL,
  `NombreProveedor` varchar(30) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `PaginaWeb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`NITProveedor`, `NombreProveedor`, `Direccion`, `Telefono`, `PaginaWeb`) VALUES
('1002176061001', 'La Dulceria', 'Panamericana Norte km 96 y Luis Olmedo Jativa Atuntaqui - Ecuador', '0984367470', 'https://www.ladulceria.ec/'),
('1002257697001', 'Arca Continental EC', 'Panamericana Nte. km 12, Quito - Ecuador', '0968479276', 'https://www.arcacontal.com/'),
('1004606545001', 'La Bonbonniere', 'C.C. Las Terrazas Km 1.5 vía a Samborondón', '0986787880', 'https://dulcerialb.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reembolso`
--

CREATE TABLE `reembolso` (
  `NIT` varchar(30) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fechapedido` date NOT NULL,
  `montopagado` decimal(10,2) NOT NULL,
  `detallepedido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reembolso`
--

INSERT INTO `reembolso` (`NIT`, `cedula`, `nombre`, `apellido`, `telefono`, `email`, `fechapedido`, `montopagado`, `detallepedido`) VALUES
('01020304', '1004606545', 'BRYAN', 'PUMA', '0968479276', 'bryanpumaec@gmail.com', '2022-03-01', '120.50', '2 Pelon Pelonazo 1 Takis Fuego'),
('123456', '1002257697', 'Miguel', 'Puma', '0968479276', 'bryanpumaec@gmail.com', '2022-04-04', '83.85', 'Reembolso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `NumPedido` int(20) NOT NULL,
  `Fecha` varchar(150) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `TotalPagar` decimal(30,2) NOT NULL,
  `Estado` varchar(150) NOT NULL,
  `NumeroDeposito` varchar(50) NOT NULL,
  `TipoEnvio` varchar(37) NOT NULL,
  `Adjunto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`NumPedido`, `Fecha`, `NIT`, `TotalPagar`, `Estado`, `NumeroDeposito`, `TipoEnvio`, `Adjunto`) VALUES
(9, '25-02-2022', '1004606545', '129.97', 'Entregado', '01020304', 'Envio Por Currier', 'comprobante_1.jpg'),
(10, '25-02-2022', '1004606545', '202.25', 'Entregado', '0111111', 'Envio Por Currier', 'comprobante_2.jpg'),
(11, '04-03-2022', '1002257697', '83.85', 'Entregado', '123456789', 'Envio Por Currier', 'comprobante_3.jpg'),
(12, '09-03-2022', '1004606545', '14.80', 'Pendiente', '0222222', 'Envio Por Currier', 'comprobante_4.jpg'),
(13, '09-03-2022', '1004606545', '25.77', 'Enviado', '20232030', 'Envio Por Currier', 'comprobante_5.jpg'),
(14, '09-03-2022', '1004606545', '14.80', 'Entregado', '123333', 'Recoger Por Tienda', 'comprobante_6.jpg'),
(15, '09-03-2022', '1727237263', '44.76', 'Entregado', '025897', 'Envio Por Currier', 'comprobante_7.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodigoCat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NIT`);

--
-- Indices de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD KEY `NumPedido` (`NumPedido`),
  ADD KEY `CodigoProd` (`CodigoProd`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CodigoCat` (`CodigoCat`),
  ADD KEY `NITProveedor` (`NITProveedor`),
  ADD KEY `Agregado` (`Nombre`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`NITProveedor`);

--
-- Indices de la tabla `reembolso`
--
ALTER TABLE `reembolso`
  ADD PRIMARY KEY (`NIT`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`NumPedido`),
  ADD KEY `NIT` (`NIT`),
  ADD KEY `NIT_2` (`NIT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `NumPedido` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_9` FOREIGN KEY (`NumPedido`) REFERENCES `venta` (`NumPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_7` FOREIGN KEY (`CodigoCat`) REFERENCES `categoria` (`CodigoCat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_8` FOREIGN KEY (`NITProveedor`) REFERENCES `proveedor` (`NITProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`NIT`) REFERENCES `cliente` (`NIT`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
