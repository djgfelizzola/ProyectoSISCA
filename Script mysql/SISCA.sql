-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 16:21:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebacolegio`
--
CREATE DATABASE IF NOT EXISTS `pruebacolegio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pruebacolegio`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_estudiante` (IN `doc` VARCHAR(50))  BEGIN
select p.documento,p.nombre,p.apellido,p.fechaNacimiento,p.genero,p.email,p.telefono,p.direccion,p.tipoDocumento,u.contraseña from estudiante e INNER JOIN persona p on e.documento = p.documento INNER JOIN usuario u on p.documento = u.documento where e.documento = doc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_estudiante` (IN `id` VARCHAR(50), IN `pass` VARCHAR(100), IN `rol` INT(11), IN `nomb` VARCHAR(50), IN `apll` VARCHAR(50), IN `fechna` DATE, IN `gen` INT(11), IN `email` VARCHAR(100), IN `tel` VARCHAR(10), IN `dir` VARCHAR(150), IN `tipoid` INT(11), IN `grup` VARCHAR(10), IN `periodo` VARCHAR(10), OUT `afrows` INT(11))  BEGIN
DECLARE uso VARCHAR(50) DEFAULT "";
    SET uso = id;
	START TRANSACTION;
        INSERT INTO usuario(documento,contraseña,rol) SELECT * FROM(SELECT id,pass,rol) AS tmp WHERE NOT EXISTS(SELECT usuario.documento FROM usuario WHERE usuario.documento = id) LIMIT 1;
        INSERT INTO persona(documento,usuario,nombre,apellido,fechaNacimiento,genero,email,telefono,direccion,tipoDocumento) 
        SELECT * FROM(SELECT uso as id,uso,nomb,apll,fechna,gen,email,tel,dir,tipoid) AS tmp WHERE NOT EXISTS( SELECT documento FROM persona WHERE persona.documento = id) LIMIT 1;
        SELECT ROW_COUNT() INTO afrows;
        INSERT INTO estudiante(documento,grupo) SELECT * FROM(SELECT id,grup) AS tmp WHERE NOT EXISTS( SELECT documento FROM estudiante WHERE estudiante.documento = id) LIMIT 1;
    COMMIT;
    BEGIN
        DECLARE finished INT DEFAULT 0;
        DECLARE codigmat VARCHAR(50) DEFAULT "";
        DECLARE curmateria CURSOR FOR SELECT m.codigo FROM materia m;
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished =1;
        OPEN curmateria;
        getcodigo: LOOP
            FETCH curmateria INTO codigmat;
            IF finished = 1 THEN LEAVE getcodigo;
            END IF;
            START TRANSACTION;
            INSERT INTO detalle(codMateria,docEstudiante,codPeriodo) VALUES(codigmat,id,periodo);
            COMMIT;
         END LOOP getcodigo;
    CLOSE curmateria;
    END;
    SELECT ROW_COUNT() INTO afrows;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `codMateria` varchar(50) NOT NULL,
  `docEstudiante` varchar(50) NOT NULL,
  `codPeriodo` varchar(10) NOT NULL,
  `Nota1` float DEFAULT NULL,
  `Nota2` float DEFAULT NULL,
  `Nota3` float DEFAULT NULL,
  `Nota4` float DEFAULT NULL,
  `Nota5` float DEFAULT NULL,
  `NotaDefinitiva` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`codMateria`, `docEstudiante`, `codPeriodo`, `Nota1`, `Nota2`, `Nota3`, `Nota4`, `Nota5`, `NotaDefinitiva`) VALUES
('1', '17171717', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '17171717', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '17171717', '2', 4.3, 3.5, 2, 3.4, 2.8, NULL),
('1', '18181818', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '18181818', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '18181818', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '18181818', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '18181818', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '18181818', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '19191919', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '19191919', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '19191919', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '19191919', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '19191919', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '19191919', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '20202020', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '20202020', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '20202020', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '20202020', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '20202020', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '20202020', '2', NULL, NULL, NULL, NULL, NULL, NULL),
('3', '17171717', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '17171717', '1', NULL, NULL, NULL, NULL, NULL, NULL),
('2', '17171717', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `documento` varchar(50) NOT NULL,
  `grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`documento`, `grupo`) VALUES
('17171717', '2'),
('18181818', '3'),
('19191919', '4'),
('20202020', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `codigo` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`codigo`, `genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`codigo`, `nombre`) VALUES
('1', 'Primero'),
('2', 'Segundo'),
('3', 'Tercero'),
('4', 'Cuarto'),
('5', 'Quinto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `profesor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`codigo`, `nombre`, `profesor`) VALUES
('1', 'Matematicas', '3692581'),
('2', 'Español', '1234567'),
('3', 'Tecnologia', '1472583'),
('Artistica', 'Artistica', '17151758'),
('Naturales', 'Naturales', '85163907');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `codigo` varchar(10) NOT NULL,
  `periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`codigo`, `periodo`) VALUES
('1', '1'),
('2', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `documento` varchar(50) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `tipoDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`documento`, `usuario`, `nombre`, `apellido`, `fechaNacimiento`, `genero`, `email`, `telefono`, `direccion`, `tipoDocumento`) VALUES
('1234567', '1234567', 'Diego', 'Tangarife', '1971-08-01', 2, 'diegotech@gmail.com', '3135816118', 'Calle 80 #52-20', 2),
('1472583', '1472583', 'Alicia', 'Osorio', '1980-02-22', 1, 'aliciaOso@gmail.com', '6871685352', 'Carrera 89 #89-20', 2),
('17151758', '17151758', 'Juan David', 'Gonzales', '1981-10-21', 2, 'juan@gmail.com', '3109062012', 'Carrera 20', 2),
('17171717', '17171717', 'Maria', 'Sanchez', '2000-10-30', 1, 'maria@gmail.com', '3691059630', 'Calle 85', 1),
('18181818', '18181818', 'Lucas', 'Gutierrez', '2001-10-10', 2, 'lucas@gmail.com', '3135129610', 'Calle 96', 1),
('19191919', '19191919', 'Fernanda', 'Lopez', '2000-12-10', 1, 'fernanda@gmail.com', '3135127890', 'Carrera 5', 1),
('20202020', '20202020', 'Manuel', 'Taborda', '2001-05-03', 2, 'manuel@gmail.com', '3135129630', 'Calle 10', 1),
('3692581', '3692581', 'Diana', 'Bedoya', '1985-05-30', 1, 'dianabedoya@gmail.com', '3135127820', 'Calle 85 #85-30', 2),
('40404040', '40404040', 'Juan Admin', 'Rangel', '1971-10-10', 2, 'juanadmin@gmail.com', '3135127810', 'Calle 11 # 2-87', 2),
('85163907', '85163907', 'Diomedes Jose', 'Guerra Rinaldi', '2020-06-01', 2, 'djmix@gmail.com', '3135127810', 'Calle 6', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `documento` varchar(50) NOT NULL,
  `profesion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`documento`, `profesion`) VALUES
('1234567', 'Ingenieros'),
('1472583', 'Ingenieros'),
('17151758', 'Tecnologo'),
('3692581', 'Ingenieros'),
('85163907', 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`codigo`, `tipo`) VALUES
(1, 'TI'),
(2, 'CC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `contraseña`, `rol`) VALUES
('1234567', '1234567', 1),
('1472583', '1472583', 1),
('17151758', '17151758', 1),
('17171717', '17171717', 2),
('18181818', '18181818', 2),
('19191919', '19191919', 2),
('20202020', '20202020', 2),
('3692581', '3692581', 1),
('40404040', '40404040', 3),
('85163907', 'diomedes', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD KEY `codMateria` (`codMateria`),
  ADD KEY `codPeriodo` (`codPeriodo`),
  ADD KEY `codEstudiante` (`docEstudiante`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `grupo` (`grupo`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `profesor` (`profesor`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `tipoDocumento` (`tipoDocumento`),
  ADD KEY `genero` (`genero`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`codMateria`) REFERENCES `materia` (`codigo`),
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`codPeriodo`) REFERENCES `periodo` (`codigo`),
  ADD CONSTRAINT `detalle_ibfk_4` FOREIGN KEY (`docEstudiante`) REFERENCES `estudiante` (`documento`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`codigo`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`documento`) REFERENCES `persona` (`documento`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `profesor` (`documento`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`tipoDocumento`) REFERENCES `tipodocumento` (`codigo`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `genero` (`codigo`),
  ADD CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `persona_ibfk_4` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`documento`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `persona` (`documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
