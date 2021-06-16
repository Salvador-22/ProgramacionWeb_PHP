CREATE TABLE `coches` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `matricula` varchar(255),
  `no_motor` varchar(255),
  `id_modelo` int,
  `estado_logico` boolean
);

CREATE TABLE `coches_venta` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_modelo` int,
  `estado` varchar(255),
  `unidades` int,
  `precio` int,
  `estado_logico` boolean
);

CREATE TABLE `modelo` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `marca` varchar(255),
  `modelo` varchar(255),
  `anio` varchar(255)
);

CREATE TABLE `clientes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `apellido_pat` varchar(255),
  `apellido_mat` varchar(255),
  `direccion` varchar(255),
  `telefono` varchar(255),
  `estado_logico` boolean
);

CREATE TABLE `reparaciones` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` date,
  `horas` int,
  `id_coche` int,
  `id_mecanico` int,
  `id_cliente` int,
  `estado_logico` boolean
);

CREATE TABLE `usuarios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario` varchar(255),
  `psswd` varchar(255),
  `id_tipo` int,
  `estado_logico` boolean
);

CREATE TABLE `tipos_usuarios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(255),
  `descripcion` varchar(255)
);

CREATE TABLE `ventas` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` timestamp,
  `id_coche` int,
  `id_vendedor` int,
  `id_cliente` int,
  `estado_logico` boolean
);

CREATE TABLE `empleados` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `apellido_pat` varchar(255),
  `apellido_mat` varchar(255),
  `contratacion` date,
  `salario` int,
  `id_puesto` int,
  `estado_logico` boolean
);

CREATE TABLE `puestos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `descripcion` varchar(255)
);

ALTER TABLE `ventas` ADD FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

ALTER TABLE `ventas` ADD FOREIGN KEY (`id_vendedor`) REFERENCES `empleados` (`id`);

ALTER TABLE `ventas` ADD FOREIGN KEY (`id_coche`) REFERENCES `coches_venta` (`id`);

ALTER TABLE `empleados` ADD FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id`);

ALTER TABLE `usuarios` ADD FOREIGN KEY (`id_tipo`) REFERENCES `tipos_usuarios` (`id`);

ALTER TABLE `reparaciones` ADD FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id`);

ALTER TABLE `reparaciones` ADD FOREIGN KEY (`id_mecanico`) REFERENCES `empleados` (`id`);

ALTER TABLE `reparaciones` ADD FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

ALTER TABLE `coches` ADD FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id`);

ALTER TABLE `coches_venta` ADD FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id`);
