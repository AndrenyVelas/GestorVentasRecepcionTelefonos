/*
 Navicat Premium Data Transfer

 Source Server         : Mysqll
 Source Server Type    : MySQL
 Source Server Version : 100422 (10.4.22-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : dbsertec2

 Target Server Type    : MySQL
 Target Server Version : 100422 (10.4.22-MariaDB)
 File Encoding         : 65001

 Date: 12/07/2023 17:01:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Estructura de tabla para caja
-- ----------------------------
DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja`  (
  `caja_id` int NOT NULL AUTO_INCREMENT,
  `caja_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_monto_inicial` decimal(10, 2) NULL DEFAULT NULL,
  `caja_monto_final` decimal(10, 2) NULL DEFAULT NULL,
  `caja_monto_egreso` decimal(10, 2) NULL DEFAULT NULL,
  `caja_fecha_ap` date NULL DEFAULT NULL,
  `caja_fecha_cie` date NULL DEFAULT NULL,
  `caja_total_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_total_egreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_monto_total` decimal(10, 2) NULL DEFAULT NULL,
  `caja_hora_aper` time NULL DEFAULT NULL,
  `caja_estado` enum('VIGENTE','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_monto_servicio` decimal(10, 2) NULL DEFAULT NULL,
  `caja_total_servicio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_hora_cierre` time NULL DEFAULT NULL,
  PRIMARY KEY (`caja_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de caja
-- ----------------------------

-- ----------------------------
-- Estructura de tabla para categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `categoria_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `categoria_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`categoria_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registro de categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'Generico', 'ACTIVO');

-- ----------------------------
-- Tabla de Estructuras de cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `cliente_tipo_doc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_nombres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_celular` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_nit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_fregistro` date NULL DEFAULT NULL,
  `cliente_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_ape_p` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_ape_m` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cliente_correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cliente_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'NIT', 'GENERICO', '922804671', '71993855', '2023-06-12', 'ACTIVO', 'Paita', '', '', '');

-- ----------------------------
-- Table structure for comprobante
-- ----------------------------
DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE `comprobante`  (
  `compro_id` int NOT NULL AUTO_INCREMENT,
  `compro_tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_serie` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_numero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`compro_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of comprobante
-- ----------------------------
INSERT INTO `comprobante` VALUES (1, 'BOLETA', 'B001', '6', 'ACTIVO');
INSERT INTO `comprobante` VALUES (2, 'FACTURA', 'F001', '2', 'ACTIVO');
INSERT INTO `comprobante` VALUES (3, 'TICKET', '0001', '1', 'ACTIVO');
INSERT INTO `comprobante` VALUES (4, 'COTIZACION', '0000', '000010', 'ACTIVO');

-- ----------------------------
-- Table structure for configuracion
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion`  (
  `confi_id` int NOT NULL AUTO_INCREMENT,
  `confi_razon_social` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_ruc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_nombre_representante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_celular` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_telefono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `config_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_cnta01` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_nro_cuenta01` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_cnta02` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confi_nro_cuenta02` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`confi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of configuracion
-- ----------------------------
INSERT INTO `configuracion` VALUES (3, 'MI TIENDA DE CELULARES', '1020305648', 'CARLOS JUAREZ', 'PIURA - AV NUEVO POR VENIR', '989878654', '725632', 'CORREO@GMAIL.COM', 'controller/empresa/foto/LOGO217202219123.jpg', 'ACTIVO', 'https://santamonicafishing.com/sertec/view/buscar_equipo.php', 'INTERBANK', '2548-1463-1263-7895', 'BCP', '4562-78963-45612-3365');

-- ----------------------------
-- Table structure for cotizacion
-- ----------------------------
DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE `cotizacion`  (
  `coti_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NULL DEFAULT NULL,
  `coti_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coti_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coti_num_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coti_total` decimal(10, 2) NULL DEFAULT NULL,
  `coti_impuesto` decimal(10, 2) NULL DEFAULT NULL,
  `coti_fregistro` date NULL DEFAULT NULL,
  `coti_hora` time NULL DEFAULT NULL,
  `coti_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `compro_id` int NULL DEFAULT NULL,
  `coti_porcentaje` decimal(10, 2) NULL DEFAULT NULL,
  `usu_id` int NULL DEFAULT NULL,
  `coti_atiende` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coti_dias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fpago_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`coti_id`) USING BTREE,
  INDEX `prove_id`(`cliente_id` ASC) USING BTREE,
  INDEX `compro_id`(`compro_id` ASC) USING BTREE,
  INDEX `usu_id`(`usu_id` ASC) USING BTREE,
  INDEX `fpago_id`(`fpago_id` ASC) USING BTREE,
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_3` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_4` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`fpago_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cotizacion
-- ----------------------------

-- ----------------------------
-- Estructura de la tabla de cotizacion_detalle
-- ----------------------------
DROP TABLE IF EXISTS `cotizacion_detalle`;
CREATE TABLE `cotizacion_detalle`  (
  `coti_detalle_id` int NOT NULL AUTO_INCREMENT,
  `coti_id` int NULL DEFAULT NULL,
  `producto_id` int NULL DEFAULT NULL,
  `coti_detalle_cantidad` decimal(10, 2) NULL DEFAULT NULL,
  `coti_detalle_precio` decimal(10, 2) NULL DEFAULT NULL,
  `coti_detalle_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coti_detalle_fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`coti_detalle_id`) USING BTREE,
  INDEX `coti_id`(`coti_id` ASC) USING BTREE,
  INDEX `producto_id`(`producto_id` ASC) USING BTREE,
  CONSTRAINT `cotizacion_detalle_ibfk_1` FOREIGN KEY (`coti_id`) REFERENCES `cotizacion` (`coti_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cotizacion_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta`  (
  `vdetalle_id` int NOT NULL AUTO_INCREMENT,
  `venta_id` int NULL DEFAULT NULL,
  `producto_id` int NULL DEFAULT NULL,
  `vdetalle_cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vdetalle_precio` decimal(10, 2) NULL DEFAULT NULL,
  `vdetalle_estado` enum('ANULADA','VENDIDO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vdetalle_fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`vdetalle_id`) USING BTREE,
  INDEX `venta_id`(`venta_id` ASC) USING BTREE,
  INDEX `producto_id`(`producto_id` ASC) USING BTREE,
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`venta_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registro de detalle_venta
-- ----------------------------

-- ----------------------------
-- Tabla sobre la estructura de forma_pago
-- ----------------------------
DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE `forma_pago`  (
  `fpago_id` int NOT NULL AUTO_INCREMENT,
  `fpago_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fpago_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fpago_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de forma_pago
-- ----------------------------
INSERT INTO `forma_pago` VALUES (1, 'Al contado', 'ACTIVO');
INSERT INTO `forma_pago` VALUES (2, 'Credito 7 dias', 'ACTIVO');

-- ----------------------------
-- Table estructuras de gastos
-- ----------------------------
DROP TABLE IF EXISTS `gastos`;
CREATE TABLE `gastos`  (
  `gastos_id` int NOT NULL AUTO_INCREMENT,
  `gastos_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gastos_monto` decimal(10, 2) NULL DEFAULT NULL,
  `gastos_responsable` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gastos_fregistro` date NULL DEFAULT NULL,
  `gastos_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`gastos_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registros de gastos
-- ----------------------------

-- ----------------------------
-- Tabla para kardex
-- ----------------------------
DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex`  (
  `kardex_id` int NOT NULL AUTO_INCREMENT,
  `kardex_fecha` date NULL DEFAULT NULL,
  `kardex_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_p_ingreso` decimal(10, 2) NULL DEFAULT NULL,
  `kardex_salida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_p_salida` decimal(10, 2) NULL DEFAULT NULL,
  `kardex_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_precio_general` decimal(10, 2) NULL DEFAULT NULL,
  `producto_id` int NULL DEFAULT NULL,
  `vdetalle_id` int NULL DEFAULT NULL,
  `producto_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `venta_id` int NULL DEFAULT NULL,
  `venta_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kardex_id`) USING BTREE,
  INDEX `producto_id`(`producto_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registros de kardex
-- ----------------------------
INSERT INTO `kardex` VALUES (7, '2023-06-12', 'INICIAL', '50', 10.00, NULL, NULL, '50', 10.00, 2, NULL, 'mouse', 'P0001', NULL, NULL);
INSERT INTO `kardex` VALUES (8, '2023-06-12', 'SALIDA', NULL, NULL, '3.00', 20.00, '47', 10.00, 2, 3, NULL, NULL, 3, 'BOLETA-B001-00005');
INSERT INTO `kardex` VALUES (9, '2023-06-12', 'INICIAL', '20', 10.00, NULL, NULL, '20', 10.00, 5, NULL, 'eioop', 'P0001', NULL, NULL);
INSERT INTO `kardex` VALUES (10, '2023-06-12', 'SALIDA', NULL, NULL, '6.00', 25.00, '14', 10.00, 5, 4, NULL, NULL, 4, 'FACTURA-F001-00001');
INSERT INTO `kardex` VALUES (11, '2023-06-12', 'SALIDA DIRECTA', NULL, NULL, '3', 10.00, '11', 10.00, 5, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Tabla estructura marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `marca_id` int NOT NULL AUTO_INCREMENT,
  `marca_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `marca_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`marca_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registro de marca
-- ----------------------------
INSERT INTO `marca` VALUES (1, 'Generico', 'ACTIVO');

-- ----------------------------
-- Tabla de estructura motivo
-- ----------------------------
DROP TABLE IF EXISTS `motivo`;
CREATE TABLE `motivo`  (
  `motivo_id` int NOT NULL AUTO_INCREMENT,
  `motivo_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `motivo_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`motivo_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registro de motivo
-- ----------------------------
INSERT INTO `motivo` VALUES (1, 'Matenimiento', 'ACTIVO');
INSERT INTO `motivo` VALUES (2, 'Garantia ', 'ACTIVO');
INSERT INTO `motivo` VALUES (3, 'Reparacion', 'ACTIVO');

-- ----------------------------
-- Tabla de estructura permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso`  (
  `idpermiso` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idpermiso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de permiso
-- ----------------------------
INSERT INTO `permiso` VALUES (1, 'ejemplo1');
INSERT INTO `permiso` VALUES (2, 'ejemplo2');
INSERT INTO `permiso` VALUES (3, 'ejemplo3');
INSERT INTO `permiso` VALUES (4, 'ejemplo4');
INSERT INTO `permiso` VALUES (5, 'ejemplo5');
INSERT INTO `permiso` VALUES (6, 'ejemplo6');
INSERT INTO `permiso` VALUES (7, 'ejemplo7');

-- ----------------------------
-- Tabla de estructura de producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `producto_id` int NOT NULL AUTO_INCREMENT,
  `producto_codigo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `producto_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `marca_id` int NULL DEFAULT NULL,
  `categoria_id` int NULL DEFAULT NULL,
  `producto_stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_pcompra` decimal(10, 2) NULL DEFAULT NULL,
  `producto_pventa` decimal(10, 2) NULL DEFAULT NULL,
  `producto_fregistro` date NULL DEFAULT NULL,
  `producto_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_stock_inicial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_aumento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_codigo_general` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cliente_id` int NULL DEFAULT NULL,
  `producto_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unidad_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`producto_id`) USING BTREE,
  INDEX `marca_id`(`marca_id` ASC) USING BTREE,
  INDEX `categoria_id`(`categoria_id` ASC) USING BTREE,
  INDEX `prove_id`(`cliente_id` ASC) USING BTREE,
  INDEX `unidad_id`(`unidad_id` ASC) USING BTREE,
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`unidad_id`) REFERENCES `unidadmedida` (`unidad_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de producto
-- ----------------------------

-- ----------------------------
-- Estructura de tabla para proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `prove_id` int NOT NULL AUTO_INCREMENT,
  `prove_ruc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prove_razon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prove_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prove_celular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prove_fregistro` date NULL DEFAULT NULL,
  `prove_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`prove_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registros de proveedor
-- ----------------------------

-- ----------------------------
-- Estructura de tabla para recepcion
-- ----------------------------
DROP TABLE IF EXISTS `recepcion`;
CREATE TABLE `recepcion`  (
  `rece_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NULL DEFAULT NULL,
  `rece_equipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rece_caracteristicas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `motivo_id` int NULL DEFAULT NULL,
  `rece_concepto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rece_monto` decimal(10, 2) NULL DEFAULT NULL,
  `rece_fregistro` date NULL DEFAULT NULL,
  `rece_estado` enum('POR ENTREGAR','POR RECOGER','ENTREGADO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rece_estatus` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rece_adelanto` decimal(10, 2) NULL DEFAULT NULL,
  `rece_debe` decimal(10, 2) NULL DEFAULT NULL,
  `rece_accesorios` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rece_fentrega` date NULL DEFAULT NULL,
  `marca_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`rece_id`) USING BTREE,
  INDEX `cliente_id`(`cliente_id` ASC) USING BTREE,
  INDEX `motivo_id`(`motivo_id` ASC) USING BTREE,
  INDEX `marca_id`(`marca_id` ASC) USING BTREE,
  CONSTRAINT `recepcion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `recepcion_ibfk_2` FOREIGN KEY (`motivo_id`) REFERENCES `motivo` (`motivo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `recepcion_ibfk_3` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Registro de recepcion
-- ----------------------------

-- ----------------------------
-- Estructura de tabla para rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rol_fregistro` date NULL DEFAULT NULL,
  `rol_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`rol_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Administrador', '2023-07-13', 'ACTIVO');
INSERT INTO `rol` VALUES (2, 'Recepcionista', '2023-07-13', 'ACTIVO');
INSERT INTO `rol` VALUES (3, 'Vendedor', '2023-07-02', 'ACTIVO');
INSERT INTO `rol` VALUES (4, 'Recepcionista -- Vendedor', '2023-08-02', 'ACTIVO');

-- ----------------------------
-- Estructura de tabla para servicio
-- ----------------------------
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio`  (
  `servicio_id` int NOT NULL AUTO_INCREMENT,
  `rece_id` int NOT NULL,
  `servicio_monto` decimal(10, 2) NOT NULL,
  `servicio_concepto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `servicio_responsable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `servicio_comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `servicio_fregistro` date NULL DEFAULT NULL,
  `servicio_entrega` enum('ENTREGADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `servicio_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`servicio_id`) USING BTREE,
  INDEX `rece_id`(`rece_id` ASC) USING BTREE,
  CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`rece_id`) REFERENCES `recepcion` (`rece_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de servicio
-- ----------------------------

-- ----------------------------
-- Estructura de tabla para unidadmedida
-- ----------------------------
DROP TABLE IF EXISTS `unidadmedida`;
CREATE TABLE `unidadmedida`  (
  `unidad_id` int NOT NULL AUTO_INCREMENT,
  `unidad_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unidad_abrevia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unidad_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`unidad_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de unidadmedida
-- ----------------------------
INSERT INTO `unidadmedida` VALUES (1, 'Caja', 'CJA', 'ACTIVO');
INSERT INTO `unidadmedida` VALUES (2, 'Saco', 'Sco', 'ACTIVO');
INSERT INTO `unidadmedida` VALUES (3, 'Bolsa', 'Bl', 'ACTIVO');

-- ----------------------------
-- Estructura de tabla para usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rol_id` int NULL DEFAULT NULL,
  `usu_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`usu_id`) USING BTREE,
  INDEX `rol_id`(`rol_id` ASC) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registro de usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'admin', '$2y$12$C.1yXkkqqs45tHKfUJC4UuOfpRhB5aEQjQkYNVlnbIH/GXCUbeawi', ' Masias ', 1, 'controller/usuario/foto/IMG132202214564.jpg', 'ACTIVO');
INSERT INTO `usuario` VALUES (2, 'gustavo', '$2y$12$H4u7wLaGlW6SyOxLXg3jZesCyzl5SJX/nCo3skp.Sli0rQRmYpmMy', 'juan gustavo', 3, 'controller/usuario/foto/default.png', 'ACTIVO');
INSERT INTO `usuario` VALUES (9, 'juan', '$2y$12$VP4nb8Ane5r7cr0VTC846ebGpjN/nCHV50nc4WPxkWO27v85RJLYy', 'juan m', 2, 'controller/usuario/foto/default.png', 'ACTIVO');

-- ----------------------------
-- Estructura de tabla para usuario_permiso
-- ----------------------------
DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE `usuario_permiso`  (
  `idusuario_permiso` int NOT NULL AUTO_INCREMENT,
  `usu_id` int NULL DEFAULT NULL,
  `id_permiso` int NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario_permiso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registros de usuario_permiso
-- ----------------------------

-- ---------------------------- 
-- Estructura de tabla para venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `venta_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NULL DEFAULT NULL,
  `venta_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `venta_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `venta_num_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `venta_total` decimal(10, 2) NULL DEFAULT NULL,
  `venta_impuesto` decimal(10, 2) NULL DEFAULT NULL,
  `venta_fregistro` date NULL DEFAULT NULL,
  `venta_hora` time NULL DEFAULT NULL,
  `venta_estado` enum('REGISTRADA','PAGADA','ANULADA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `compro_id` int NULL DEFAULT NULL,
  `venta_porcentaje` decimal(10, 2) NULL DEFAULT NULL,
  `usu_id` int NULL DEFAULT NULL,
  `fpago_id` int NULL DEFAULT NULL,
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`venta_id`) USING BTREE,
  INDEX `cliente_id`(`cliente_id` ASC) USING BTREE,
  INDEX `compro_id`(`compro_id` ASC) USING BTREE,
  INDEX `usu_id`(`usu_id` ASC) USING BTREE,
  INDEX `fpago_id`(`fpago_id` ASC) USING BTREE,
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`fpago_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Registros de venta
-- ----------------------------

-- ----------------------------
-- Estructura de vistas para view_listar_recepcion
-- ----------------------------
DROP VIEW IF EXISTS `view_listar_recepcion`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_recepcion` AS SELECT
	recepcion.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) AS motivo, 
	recepcion.rece_caracteristicas, 
	recepcion.motivo_id, 
	motivo.motivo_descripcion, 
	recepcion.rece_monto, 
	recepcion.rece_fregistro, 
	recepcion.rece_estado, 
	recepcion.rece_estatus, 
	recepcion.rece_equipo, 
	recepcion.rece_concepto, 
	recepcion.rece_adelanto, 
	recepcion.rece_debe, 
	recepcion.rece_accesorios, 
	recepcion.rece_fentrega, 
	recepcion.marca_id, 
	marca.marca_descripcion
FROM
	recepcion
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
	INNER JOIN
	motivo
	ON 
		recepcion.motivo_id = motivo.motivo_id
	INNER JOIN
	marca
	ON 
		recepcion.marca_id = marca.marca_id ;

-- ----------------------------
-- Estructura de vistas para view_listar_recepcion_en_servicio
-- ----------------------------
DROP VIEW IF EXISTS `view_listar_recepcion_en_servicio`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_recepcion_en_servicio` AS SELECT
	recepcion.rece_id, 
	cliente.cliente_nombres as cliente, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto as monto, 
	recepcion.rece_fregistro as fecha,
	recepcion.rece_estado as entrega,
	recepcion.rece_adelanto as adelanto,
	recepcion.rece_debe as debe,
	recepcion.rece_fentrega
FROM
	recepcion
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
		where recepcion.rece_estado in ('POR ENTREGAR','POR RECOGER') and recepcion.rece_estatus = 'ACTIVO' ;

-- ----------------------------
-- Estructura de vistas para view_listar_servicio_rece
-- ----------------------------
DROP VIEW IF EXISTS `view_listar_servicio_rece`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_servicio_rece` AS SELECT
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto, 
	recepcion.rece_estado, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_comentario, 
	servicio.servicio_entrega,
	servicio.servicio_fregistro,
	servicio.servicio_estado
FROM
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id ;

-- ---------------------------- 
-- Estructura de vistas para view_listar_usuario
-- ----------------------------
DROP VIEW IF EXISTS `view_listar_usuario`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_usuario` AS select  `usuario`.`usu_id` AS `usu_id`, `usuario`.`usu_nombre` AS `usu_nombre`, `usuario`.`usu_contrasena` AS `usu_contrasena`, `usuario`.`rol_id` AS `rol_id`, `usuario`.`usu_estado` AS `usu_estado`, `usuario`.`usu_email` AS `usu_email`, `usuario`.`usu_foto` AS `usu_foto`, `rol`.`rol_nombre` AS `rol_nombre` from ( `usuario` join  `rol` on( `usuario`.`rol_id` =  `rol`.`rol_id`)) WHERE  usuario.usu_id not in ('1') ;

-- ----------------------------
-- Estructura de Proceso de SP_ACTIVAR_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ACTIVAR_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_ACTIVAR_COTIZACION`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE DETALLEID INT;

UPDATE cotizacion set
coti_estado=ESTADO
where coti_id=ID;

SET @CANTIDAD:=(SELECT COUNT(*) FROM cotizacion_detalle WHERE coti_detalle_estado= 'INACTIVO' AND coti_id=ID);
	WHILE @CANTIDAD > 0 DO

	SET @DETALLEID:=(SELECT coti_detalle_id FROM cotizacion_detalle WHERE coti_detalle_estado= 'INACTIVO' AND coti_id=ID LIMIT 1  );


	
	UPDATE cotizacion_detalle SET 
	coti_detalle_estado= ESTADO
	WHERE coti_detalle_id=@DETALLEID;
	SET @CANTIDAD:= @CANTIDAD - 1;

	END WHILE;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ANULAR_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ANULAR_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_ANULAR_COTIZACION`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE DETALLEID INT;

UPDATE cotizacion set
coti_estado=ESTADO
where coti_id=ID;

SET @CANTIDAD:=(SELECT COUNT(*) FROM cotizacion_detalle WHERE coti_detalle_estado= 'ACTIVO' AND coti_id=ID);
	WHILE @CANTIDAD > 0 DO

	SET @DETALLEID:=(SELECT coti_detalle_id FROM cotizacion_detalle WHERE coti_detalle_estado= 'ACTIVO' AND coti_id=ID LIMIT 1  );


	
	UPDATE cotizacion_detalle SET 
	coti_detalle_estado= ESTADO
	WHERE coti_detalle_id=@DETALLEID;
	SET @CANTIDAD:= @CANTIDAD - 1;

	END WHILE;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ANULAR_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ANULAR_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_ANULAR_VENTA`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE IDPRODUCTO INT;
DECLARE STOCKACTUAL INT;
DECLARE DETALLEID INT;

UPDATE venta set
venta_estado=ESTADO
where venta_id=ID;
SET @CANTIDAD:=(SELECT COUNT(*) FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID);
	WHILE @CANTIDAD > 0 DO
	SET @IDPRODUCTO:=(SELECT producto_id FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1 );
	SET @DETALLEID:=(SELECT vdetalle_id FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1  );
	SET @STOCKACTUAL:=(SELECT producto_stock FROM producto WHERE producto_id=@IDPRODUCTO);
	
	UPDATE producto SET
	producto_stock=@STOCKACTUAL + (SELECT vdetalle_cantidad FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1 )
	WHERE producto_id= @IDPRODUCTO;
	UPDATE detalle_venta SET 
	vdetalle_estado= ESTADO
	WHERE vdetalle_id=@DETALLEID;
	SET @CANTIDAD:= @CANTIDAD - 1;
	

	UPDATE kardex SET 
	kardex_tipo=ESTADO,
	producto_id = @IDPRODUCTO

	WHERE vdetalle_id=@DETALLEID;
	


	END WHILE;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_AUMENTAR_STOCK
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_AUMENTAR_STOCK`;
delimiter ;;
CREATE PROCEDURE `SP_AUMENTAR_STOCK`(IN IDPRODUCTO INT, IN CANTIDAAUMENTO VARCHAR(100),IN SUMA VARCHAR(100))
BEGIN
UPDATE producto SET 
producto_stock = SUMA,
producto_aumento = CANTIDAAUMENTO
where producto_id = IDPRODUCTO;

set @preciocompra = (select producto_pcompra from producto where producto_id =IDPRODUCTO);
set @stock = (select producto_stock from producto where producto_id =IDPRODUCTO);

insert into kardex (kardex_fecha,kardex_tipo,kardex_ingreso,kardex_p_ingreso,kardex_total,producto_id,kardex_precio_general) 
VALUES (CURDATE(),'INGRESO',CANTIDAAUMENTO,@preciocompra,@stock,IDPRODUCTO,@preciocompra);

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_BUSCAR_EQUIPO_NIT
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_BUSCAR_EQUIPO_NIT`;
delimiter ;;
CREATE PROCEDURE `SP_BUSCAR_EQUIPO_NIT`(IN NIT INT)
SELECT
	recepcion.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_celular, 
	cliente.cliente_nombres, 
	recepcion.rece_equipo,
	recepcion.rece_concepto,
	recepcion.rece_fregistro, 
	recepcion.rece_estado
FROM
	recepcion
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
		where cliente.cliente_celular = NIT
		ORDER BY recepcion.rece_fregistro DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de sp_correlativo
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_correlativo`;
delimiter ;;
CREATE PROCEDURE `sp_correlativo`()
begin
	declare siguiente_codigo int;
	declare producto_codigo int;
    set @siguiente_codigo = (Select ifnull(max(convert(producto_codigo, signed integer)), 0) from producto) + 1;
    set @producto_codigo = concat('P', LPAD( siguiente_codigo, 4, '0'));
		
		SELECT max(producto_codigo) =  @producto_codigo FROM producto;
end
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_DATOS_PERFIL_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_DATOS_PERFIL_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_DATOS_PERFIL_USUARIO`(IN ID INT)
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre
FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
	WHERE  usuario.usu_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_DISMINUIR_STOCK
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_DISMINUIR_STOCK`;
delimiter ;;
CREATE PROCEDURE `SP_DISMINUIR_STOCK`(IN IDPRODUCTO INT, IN CANTIDADISMINUIR VARCHAR(100),IN RESTA VARCHAR(100))
BEGIN
UPDATE producto SET 
producto_stock = RESTA,
producto_aumento = CANTIDADISMINUIR
where producto_id = IDPRODUCTO;

set @preciocompra = (select producto_pcompra from producto where producto_id =IDPRODUCTO);
set @stock = (select producto_stock from producto where producto_id =IDPRODUCTO);

insert into kardex (kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total, producto_id, kardex_precio_general) 
VALUES (CURDATE(),'SALIDA DIRECTA',CANTIDADISMINUIR,@preciocompra,@stock,IDPRODUCTO,@preciocompra);

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ELIMINAR_MARCA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_MARCA`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_MARCA`(IN ID INT)
DELETE FROM marca WHERE marca_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ELIMINAR_ROL_ESTADO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_ROL_ESTADO`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_ROL_ESTADO`(IN ID INT,IN ESTADO VARCHAR(30))
UPDATE rol set
rol_estado=ESTADO
where rol_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ELIMINAR_SERVICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_SERVICIO`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_SERVICIO`(IN ID INT)
DELETE  FROM servicio 
where servicio_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ELIMINAR_UMEDIDA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_UMEDIDA`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_UMEDIDA`(IN ID INT)
DELETE FROM unidadmedida WHERE unidad_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_ELIMINAR_USUARIO_ESTADO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_USUARIO_ESTADO`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_USUARIO_ESTADO`(IN ID INT,IN ESTADO VARCHAR(10))
UPDATE usuario set
usu_estado=ESTADO
where usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_GRAFICO_SERVICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_GRAFICO_SERVICIO`;
delimiter ;;
CREATE PROCEDURE `SP_GRAFICO_SERVICIO`(IN FINICIO DATE, IN FFIN DATE)
SELECT
COUNT(motivo.motivo_descripcion ) as cantidad,	
CONCAT_WS(' - ',motivo.motivo_descripcion,recepcion.rece_equipo) as Tipos 
FROM
	recepcion
	INNER JOIN
	servicio
	ON 
		recepcion.rece_id = servicio.rece_id
	INNER JOIN
	motivo
	ON 
		recepcion.motivo_id = motivo.motivo_id
			WHERE servicio.servicio_fregistro BETWEEN FINICIO AND FFIN
	GROUP BY recepcion.motivo_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_GRAFICO_VENTAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_GRAFICO_VENTAS`;
delimiter ;;
CREATE PROCEDURE `SP_GRAFICO_VENTAS`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	COUNT(venta.venta_id) as cant_ventas,
	SUM(venta.venta_total) as total_ventas
	
FROM
	venta
			WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN and venta.venta_estado <> 'ANULADA'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_INICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_INICIO`;
delimiter ;;
CREATE PROCEDURE `SP_INICIO`()
BEGIN
	DECLARE VENTA INT;
	DECLARE SERVICIO INT;
	SELECT COUNT(*) INTO VENTA FROM venta WHERE venta_estado='REGISTRADA';
	SELECT COUNT(*) INTO SERVICIO FROM servicio WHERE servicio_estado='ACTIVO';
	
	SELECT VENTA, SERVICIO;


END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_KARDEX_COD_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_KARDEX_COD_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_KARDEX_COD_PRODUCTO`(IN CODPRODUCTO INT)
SELECT
	kardex.kardex_id,
	CONCAT_WS('  ',kardex.producto_codigo,kardex.producto_nombre	) as producto, 
	kardex.kardex_fecha as fecha, 
	kardex.kardex_tipo as tipo, 
	kardex.kardex_ingreso as ingreso, 
	kardex.kardex_p_ingreso as precio_ingreso, 
	(kardex.kardex_ingreso * kardex.kardex_p_ingreso ) as total_ingreso,
	kardex.kardex_salida as salida, 
	kardex.kardex_p_salida as precio_salida, 
	(kardex.kardex_salida * kardex.kardex_p_salida ) as total_salida,
	kardex.kardex_total as total_actual, 
	 kardex_precio_general  as precio_total, 
	(kardex.kardex_total * kardex_precio_general  ) as total_total,
	kardex.producto_id, 
	 
	kardex.venta_comprobante
FROM
	kardex
	where producto_id = CODPRODUCTO and kardex_tipo in ('INICIAL','INGRESO','SALIDA', 'SALIDA DIRECTA')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_KARDEX_NOMBRE_CODIGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_KARDEX_NOMBRE_CODIGO`;
delimiter ;;
CREATE PROCEDURE `SP_KARDEX_NOMBRE_CODIGO`(IN NOMBRE VARCHAR(255))
SELECT
	kardex.kardex_id, 
	kardex.producto_id, 
  kardex.producto_nombre,
	kardex.kardex_p_ingreso, 
	SUM(kardex_ingreso) as ingresos,
	sum(kardex_salida) as salidas,
	(SUM(kardex_ingreso) - sum(kardex_salida) ) as saldo
FROM
	kardex
	where  kardex.producto_nombre like  CONCAT('%',NOMBRE,'%')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_ANIO_GASTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_ANIO_GASTO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_ANIO_GASTO`()
SELECT YEAR(gastos_fregistro) as anio FROM gastos
where gastos_estado='ACTIVO' 
GROUP BY YEAR(gastos_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_ANIO_SERVICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_ANIO_SERVICIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_ANIO_SERVICIO`()
SELECT YEAR(servicio_fregistro) as anio FROM servicio
GROUP BY YEAR(servicio_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_CATEGORIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CATEGORIA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CATEGORIA`()
SELECT
	categoria.categoria_id, 
	categoria.categoria_descripcion, 
	categoria.categoria_estado
FROM
	categoria
	WHERE categoria.categoria_estado  = 'ACTIVO' OR categoria.categoria_estado  = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_CLIENTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CLIENTE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CLIENTE`()
SELECT
	cliente.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_celular, 
	cliente.cliente_nit, 
	cliente.cliente_estado,
	cliente.cliente_direccion,
	cliente.cliente_ape_p,
	cliente.cliente_ape_m,
	cliente.cliente_correo,
	cliente.cliente_tipo_doc	
FROM
	cliente
		WHERE cliente.cliente_estado ='ACTIVO' OR cliente.cliente_estado = 'INACTIVO'
		ORDER BY cliente_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_CLIENTE_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CLIENTE_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CLIENTE_VENTA`()
SELECT
	cliente.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_nit
FROM
	cliente
		WHERE cliente.cliente_estado ='ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_COMPROBANTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COMPROBANTE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COMPROBANTE`()
SELECT
	comprobante.compro_id, 
	comprobante.compro_tipo, 
	comprobante.compro_serie, 
	comprobante.compro_numero, 
	comprobante.compro_estado
FROM
	comprobante
		WHERE comprobante.compro_estado = 'ACTIVO' OR comprobante.compro_estado  = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COTIZACION`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	cotizacion.coti_id, 
	cotizacion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',cotizacion.coti_comprobante, cotizacion.coti_num_comprobante) AS cotizacion, 
	cotizacion.coti_total, 
	cotizacion.coti_fregistro, 
	cotizacion.usu_id, 
	usuario.usu_nombre, 
	cotizacion.coti_estado
FROM
	cotizacion
	INNER JOIN
	cliente
	ON 
		cotizacion.cliente_id = cliente.cliente_id
	INNER JOIN
	usuario
	ON 
		cotizacion.usu_id = usuario.usu_id
		WHERE cotizacion.coti_fregistro BETWEEN FINICIO AND FFIN
		ORDER BY coti_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_DATOS_WIDGET
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DATOS_WIDGET`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DATOS_WIDGET`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	(select count(*) from venta where venta_estado='PAGADA' and venta_fregistro BETWEEN FINICIO AND FFIN)as ventas,
	(SELECT IFNULL(SUM(venta.venta_total),0) FROM venta WHERE venta_fregistro BETWEEN FINICIO AND FFIN) as total_venta,
	(SELECT COUNT(*) FROM servicio WHERE servicio_fregistro BETWEEN FINICIO AND FFIN ) as servicio,
	(select IFNULL(SUM(servicio_monto),0) from servicio where servicio_fregistro BETWEEN FINICIO AND FFIN ) as total_servicio,
	(SELECT COUNT(*) FROM gastos where gastos_fregistro BETWEEN FINICIO AND FFIN) as gastos,
	(select IFNULL(SUM(gastos_monto),0) from gastos where gastos_fregistro BETWEEN FINICIO AND FFIN ) as total_gastos,
	(SELECT COUNT(*) FROM producto ) as productos
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_DATOS_WIDGET2
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DATOS_WIDGET2`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DATOS_WIDGET2`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	COUNT(*),
	(SELECT COUNT(*) FROM servicio where servicio.servicio_fregistro BETWEEN FINICIO AND FFIN ) as servicio
FROM
	VENTA
	WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_EMPRESA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_EMPRESA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_EMPRESA`()
SELECT
	configuracion.confi_id, 
	configuracion.confi_razon_social, 
	configuracion.confi_ruc, 
	configuracion.confi_nombre_representante, 
	configuracion.confi_direccion, 
	configuracion.confi_celular, 
	configuracion.confi_telefono, 
	configuracion.confi_correo, 
	configuracion.config_foto, 
	configuracion.confi_estado,
	configuracion.confi_url,
	configuracion.confi_cnta01,
	configuracion.confi_nro_cuenta01,
	configuracion.confi_cnta02,
	configuracion.confi_nro_cuenta02
FROM
	configuracion
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_FORMA_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_FORMA_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_FORMA_PAGO`()
SELECT
	forma_pago.fpago_id, 
	forma_pago.fpago_descripcion, 
	forma_pago.fpago_estado
FROM
	forma_pago
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_GASTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_GASTO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_GASTO`()
SELECT
	gastos.gastos_id, 
	gastos.gastos_descripcion, 
	gastos.gastos_monto, 
	gastos.gastos_responsable, 
	gastos.gastos_fregistro, 
	gastos.gastos_estado
FROM
	gastos
	WHERE gastos.gastos_estado ='ACTIVO' OR gastos.gastos_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_MARCA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_MARCA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_MARCA`()
SELECT
	marca.marca_id, 
	marca.marca_descripcion, 
	marca.marca_estado
FROM
	marca
	WHERE marca.marca_estado ='ACTIVO' OR marca.marca_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_MOTIVO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_MOTIVO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_MOTIVO`()
SELECT
	motivo.motivo_id, 
	motivo.motivo_descripcion, 
	motivo.motivo_estado
FROM
	motivo
		WHERE motivo.motivo_estado='ACTIVO' OR motivo.motivo_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_NOTIFICACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_NOTIFICACION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_NOTIFICACION`()
SELECT
	cliente.cliente_nombres, 
	recepcion.rece_estado, 
	recepcion.rece_fregistro,
	recepcion.rece_equipo
FROM
	recepcion
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
			WHERE recepcion.rece_estado in ('POR ENTREGAR','POR RECOGER') AND recepcion.rece_estatus = 'ACTIVO'
			ORDER BY recepcion.rece_fregistro DESC
;;
delimiter ;

-- ----------------------------
-- PEstructura de Proceso de SP_LISTAR_NUM_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_NUM_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_NUM_COTIZACION`()
SELECT compro_numero FROM comprobante WHERE compro_tipo like '%coti%' and comprobante.compro_estado= 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PRODUCTO`()
SELECT
	producto.producto_id, 
	producto.producto_nombre, 
	producto.producto_codigo, 
	producto.marca_id, 
	marca.marca_descripcion, 
	producto.categoria_id, 
	categoria.categoria_descripcion, 
	producto.producto_stock, 
	producto.producto_pcompra, 
	producto.producto_pventa, 
	producto.producto_estado, 
	producto.producto_codigo_general, 
	producto.cliente_id, 
	cliente.cliente_nombres, 
	producto.producto_foto, 
	producto.unidad_id, 
	CONCAT_WS(' | ',unidadmedida.unidad_descripcion, unidadmedida.unidad_abrevia) as unidad_medida
FROM
	producto
	INNER JOIN
	categoria
	ON 
		producto.categoria_id = categoria.categoria_id
	INNER JOIN
	marca
	ON 
		producto.marca_id = marca.marca_id
	INNER JOIN
	cliente
	ON 
		producto.cliente_id = cliente.cliente_id
	INNER JOIN
	unidadmedida
	ON 
		producto.unidad_id = unidadmedida.unidad_id 
	
		-- where producto.producto_estado = 'ACTIVO' or producto.producto_estado = 'INACTIVO'
		ORDER BY producto_id  DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_PRODUCTOS_MAS_VENDIDOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PRODUCTOS_MAS_VENDIDOS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PRODUCTOS_MAS_VENDIDOS`()
SELECT 
	detalle_venta.vdetalle_id, 
	detalle_venta.producto_id, 
	CONCAT_WS(' - ',producto.producto_codigo, producto.producto_nombre) as Producto, 
	sum(vdetalle_cantidad) as cantidad
FROM
	detalle_venta
	INNER JOIN
	producto
	ON 
		detalle_venta.producto_id = producto.producto_id
		GROUP BY producto.producto_id 
		ORDER BY sum(vdetalle_cantidad) DESC
		LIMIT 7
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_PRODUCTOS_SIN_STOCK
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PRODUCTOS_SIN_STOCK`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PRODUCTOS_SIN_STOCK`()
SELECT
producto_id,
	CONCAT_WS(' - ',producto_codigo, producto_nombre) as Producto,
	producto_stock as stock
FROM
	producto
	where producto_stock < 3
	LIMIT 7
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_PRODUCTO_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PRODUCTO_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PRODUCTO_VENTA`()
SELECT
	producto.producto_id, 
	producto.producto_nombre, 
	producto.marca_id, 
	marca.marca_descripcion, 
	producto.categoria_id, 
	categoria.categoria_descripcion, 
 
	producto.producto_stock, 
	producto.producto_pcompra, 
	producto.producto_pventa, 
	producto.producto_estado
FROM
	producto
	INNER JOIN
	categoria
	ON 
		producto.categoria_id = categoria.categoria_id
	INNER JOIN
	marca
	ON 
		producto.marca_id = marca.marca_id
		where producto.producto_estado = 'ACTIVO' 
		ORDER BY producto_id  DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_PROVEEDOR
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROVEEDOR`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROVEEDOR`()
SELECT
	proveedor.prove_id, 
	proveedor.prove_ruc, 
	proveedor.prove_razon, 
	proveedor.prove_direccion, 
	proveedor.prove_celular, 
	proveedor.prove_fregistro, 
	proveedor.prove_estado
	
FROM
	proveedor
	WHERE proveedor.prove_estado ='ACTIVO' OR proveedor.prove_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_ROL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_ROL`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_ROL`()
SELECT
	rol.rol_id, 
	rol.rol_nombre, 
	rol.rol_fregistro, 
	rol.rol_estado
FROM
	rol
	WHERE rol.rol_estado ='ACTIVO' OR rol.rol_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_ANIO_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_ANIO_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_ANIO_VENTA`()
SELECT YEAR(venta_fregistro) as anio FROM venta
where venta_estado <> 'ANULADA' 
GROUP BY YEAR(venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_CATEGORIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_CATEGORIA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_CATEGORIA`()
SELECT * FROM categoria WHERE categoria.categoria_estado = 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_CLIENTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_CLIENTE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_CLIENTE`()
SELECT cliente_id,
CONCAT_WS(' | ',cliente_nombres,cliente_nit) as cliente,
cliente_estado
 FROM cliente WHERE cliente_estado= 'ACTIVO' 	ORDER BY cliente_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_COMPROBANTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_COMPROBANTE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_COMPROBANTE`()
SELECT * FROM comprobante WHERE comprobante.compro_estado= 'ACTIVO' and compro_tipo not in ('COTIZACION')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_COMP_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_COMP_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_COMP_COTIZACION`()
SELECT * FROM comprobante WHERE compro_tipo like '%coti%' and comprobante.compro_estado= 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_FOR_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_FOR_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_FOR_PAGO`()
SELECT
	forma_pago.fpago_id, 
	forma_pago.fpago_descripcion
FROM
	forma_pago
	WHERE fpago_estado = 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_MARCA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_MARCA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_MARCA`()
SELECT * FROM marca WHERE marca.marca_estado= 'ACTIVO'
ORDER BY marca.marca_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_MOTIVO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_MOTIVO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_MOTIVO`()
SELECT * FROM motivo WHERE motivo_estado= 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_PRODUCTO`()
SELECT producto_id, CONCAT_WS(' - ',producto_codigo, producto_nombre) as nombre  FROM producto where producto_estado = 'ACTIVO'
ORDER BY producto_id desc
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_PRODUCTO_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_PRODUCTO_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_PRODUCTO_VENTA`()
SELECT   producto_id, 
CONCAT_WS('  | Cod: ', producto_nombre, producto_codigo_general) as nombre,
producto_stock as stock, 
producto_pventa as precio_venta 
FROM producto 
where producto_estado = 'ACTIVO'
ORDER BY producto_id desc
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_PROVEEDOR
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_PROVEEDOR`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_PROVEEDOR`()
SELECT * FROM cliente WHERE cliente.cliente_estado= 'ACTIVO' and cliente_tipo_doc = 'R.U.C'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_ROL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_ROL`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_ROL`()
SELECT * FROM rol WHERE rol_estado = 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_UNIDAD
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_UNIDAD`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_UNIDAD`()
SELECT
	unidadmedida.unidad_id, 
  CONCAT_WS(' | ',unidadmedida.unidad_descripcion, unidadmedida.unidad_abrevia) as descripcion, 
	unidadmedida.unidad_estado
FROM
	unidadmedida
	
	where unidad_estado = 'ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SELECT_USUARIO_RECORD
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_USUARIO_RECORD`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_USUARIO_RECORD`()
Select usu_id,usu_nombre from usuario where usu_estado ='ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_SERVICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SERVICIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SERVICIO`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto, 
	recepcion.rece_estado, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_comentario, 
	servicio.servicio_entrega,
	servicio.servicio_fregistro,
	servicio.servicio_estado,
	cliente.cliente_nit 
FROM
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id 
		WHERE servicio.servicio_fregistro BETWEEN FINICIO AND FFIN
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_UNIDAD_MEDIDA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_UNIDAD_MEDIDA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_UNIDAD_MEDIDA`()
SELECT
	unidadmedida.unidad_id,
	unidadmedida.unidad_descripcion, 
	unidadmedida.unidad_abrevia, 
	unidadmedida.unidad_estado
FROM
	unidadmedida
WHERE
	unidadmedida.unidad_estado = 'ACTIVO' OR
	unidadmedida.unidad_estado = 'INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_USUARIO`()
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre
FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
	WHERE  usuario.usu_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_LISTAR_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VENTA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	venta.venta_id, 
	cliente.cliente_nombres, 
	venta.venta_comprobante, 
	CONCAT_WS(' - ',venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre, 
	venta.venta_serie, 
	venta.venta_num_comprobante, 
	venta.cliente_id, 
	venta.fpago_id, 
	forma_pago.fpago_descripcion,
	venta.venta_impuesto,
	venta.venta_porcentaje,
	venta.observacion,
	(venta.venta_total - venta.venta_impuesto) as subtotal2
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
	INNER JOIN
	forma_pago
	ON 
		venta.fpago_id = forma_pago.fpago_id
		WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN
		ORDER BY venta_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_CATEGORIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_CATEGORIA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_CATEGORIA`(IN ID INT,IN CATEGORIA VARCHAR(255),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE CATEGORIAACTUAL VARCHAR(25);
SET @CATEGORIAACTUAL:=(SELECT categoria_descripcion from categoria where categoria_id=ID);
IF @CATEGORIAACTUAL = CATEGORIA THEN
	UPDATE categoria set
	categoria_descripcion=CATEGORIA,
	categoria_estado=ESTADO
	where categoria_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM  categoria where categoria_descripcion=CATEGORIA);
	if @CANTIDAD = 0 THEN
		UPDATE categoria set
		categoria_descripcion=CATEGORIA,
		categoria_estado=ESTADO
		where categoria_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_CLAVE_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_CLAVE_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_CLAVE_USUARIO`(IN ID INT,IN CONTRA VARCHAR(255))
UPDATE usuario set
usu_contrasena=CONTRA
where usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_CLIENTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_CLIENTE`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_CLIENTE`(IN `ID` INT, IN `NOMBRE` VARCHAR(100), IN `NIT` VARCHAR(20), IN `CELULAR` VARCHAR(20), IN `ESTADO` VARCHAR(100), IN `DIRECCION` VARCHAR(255), IN `APE_P` VARCHAR(255), IN `APE_M` VARCHAR(255), IN `CORREO` VARCHAR(255), IN `TIPODOC` VARCHAR(50))
BEGIN
DECLARE CANTIDAD INT;
DECLARE CLIENTEACTUAL VARCHAR(25);
SET @CLIENTEACTUAL:=(SELECT cliente_nit from cliente where cliente_id=ID);
IF @CLIENTEACTUAL = NIT THEN
	UPDATE cliente set
	cliente_nombres=NOMBRE,
	cliente_celular=CELULAR,
	cliente_nit=NIT,
	cliente_estado=ESTADO,
	cliente_direccion=DIRECCION,
	cliente_ape_p = APE_P,
	cliente_ape_m = APE_M,
	cliente_correo = CORREO,
	cliente_tipo_doc = TIPODOC
	where cliente_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM cliente where cliente_nit=NIT);
	if @CANTIDAD = 0 THEN
		UPDATE cliente set
		cliente_nombres=NOMBRE,
		cliente_celular=CELULAR,
		cliente_nit=NIT,
		cliente_estado=ESTADO,
		cliente_direccion=DIRECCION,
	  cliente_ape_p = APE_P,
	  cliente_ape_m = APE_M,
		cliente_correo = CORREO,
		cliente_tipo_doc = TIPODOC
		where cliente_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_COMPROBANTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_COMPROBANTE`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_COMPROBANTE`(IN ID INT,IN TIPO VARCHAR(100),IN SERIE VARCHAR(100),IN NUMERO VARCHAR(100), IN ESTADO VARCHAR(100))
UPDATE comprobante SET
compro_tipo = TIPO,
compro_serie = SERIE,
compro_numero = NUMERO,
compro_estado = ESTADO
WHERE compro_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_EMPRESA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_EMPRESA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_EMPRESA`(IN ID INT, IN RAZON VARCHAR(255), IN RUC VARCHAR(255), IN REPRE VARCHAR(255), IN DIRECCION VARCHAR(255), IN CELULAR VARCHAR(255), IN TELEFONO VARCHAR(255), IN CORREO VARCHAR(255), IN ESTADO VARCHAR(255), IN URL VARCHAR(255), IN CUENTA01 VARCHAR(100),IN NRO_CUENTA01 VARCHAR(100),IN CUENTA02 VARCHAR(100),IN NRO_CUENTA02 VARCHAR(100))
UPDATE configuracion SET
confi_razon_social = RAZON,
confi_ruc = RUC,
confi_nombre_representante = REPRE,
confi_direccion = DIRECCION,
confi_celular = CELULAR,
confi_telefono = TELEFONO,
confi_correo = CORREO,
confi_estado = ESTADO,
confi_url = URL,
confi_cnta01 = CUENTA01,
confi_nro_cuenta01 = NRO_CUENTA01,
confi_cnta02 =  CUENTA02,
confi_nro_cuenta02 = NRO_CUENTA02
WHERE confi_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_ESTADO_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_ESTADO_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_ESTADO_VENTA`(IN ID INT, IN ESTADO VARCHAR(100))
UPDATE venta SET
venta_estado = ESTADO
WHERE venta_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_FORMA_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_FORMA_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_FORMA_PAGO`(IN ID INT,IN FORMAPAGO VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE FORMAPACTUAL VARCHAR(25);
SET @FORMAPACTUAL:=(SELECT fpago_descripcion from forma_pago where fpago_id=ID);
IF @FORMAPACTUAL = FORMAPAGO THEN
	UPDATE forma_pago set
	fpago_descripcion=FORMAPAGO,
	fpago_estado=ESTADO
	where fpago_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM forma_pago where fpago_descripcion=FORMAPAGO);
	if @CANTIDAD = 0 THEN
			UPDATE forma_pago set
			fpago_descripcion=FORMAPAGO,
			fpago_estado=ESTADO
			where fpago_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_FOTO_EMPRESA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_FOTO_EMPRESA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_FOTO_EMPRESA`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE configuracion SET
config_foto = RUTA
WHERE confi_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_FOTO_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_FOTO_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_FOTO_PRODUCTO`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE producto SET
producto_foto = RUTA
WHERE producto_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_FOTO_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_FOTO_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_FOTO_USUARIO`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE usuario set
usu_foto=RUTA
where usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_GASTOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_GASTOS`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_GASTOS`(IN ID INT,IN GASTO VARCHAR(255),IN NOMTO INT,IN RESPONSABLE VARCHAR(255), IN ESTADO VARCHAR(100))
BEGIN
DECLARE CANTIDAD INT;
DECLARE GASTOACTUAL VARCHAR(25);
SET @GASTOACTUAL:=(SELECT gastos_descripcion from gastos where gastos_id=ID);
IF @GASTOACTUAL = GASTO THEN
	UPDATE gastos set
	gastos_descripcion=GASTO,
	gastos_monto=NOMTO,
	gastos_responsable=RESPONSABLE,
	gastos_estado=ESTADO
	where gastos_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM gastos where gastos_descripcion=GASTO);
	if @CANTIDAD = 0 THEN
		UPDATE gastos set
		gastos_descripcion=GASTO,
		gastos_monto=NOMTO,
		gastos_responsable=RESPONSABLE,
		gastos_estado=ESTADO
		where gastos_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_MARCA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_MARCA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_MARCA`(IN ID INT,IN MARCA VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MARCAACTUAL VARCHAR(25);
SET @MARCAACTUAL:=(SELECT marca_descripcion from marca where marca_id=ID);
IF @MARCAACTUAL = MARCA THEN
	UPDATE marca set
	marca_descripcion=MARCA,
	marca_estado=ESTADO
	where marca_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM marca where marca_descripcion=MARCA);
	if @CANTIDAD = 0 THEN
		UPDATE marca set
		marca_descripcion=MARCA,
		marca_estado=ESTADO
		where marca_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_MOTIVO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_MOTIVO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_MOTIVO`(IN ID INT,IN MOTIVO VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MOTIVOACTUAL VARCHAR(25);
SET @MOTIVOACTUAL:=(SELECT motivo_descripcion from motivo where motivo_id=ID);
IF @MOTIVOACTUAL = MOTIVO THEN
	UPDATE motivo set
	motivo_descripcion=MOTIVO,
	motivo_estado=ESTADO
	where motivo_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM motivo where motivo_descripcion=MOTIVO);
	if @CANTIDAD = 0 THEN
		UPDATE motivo set
	motivo_descripcion=MOTIVO,
	motivo_estado=ESTADO
	where motivo_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_PRODUCTO`(IN ID INT ,IN PRODUCTO VARCHAR(100),IN IDMARCA INT, IN IDCATEGORIA INT, IN PCOMPRA DECIMAL (10,2), IN PVENTA DECIMAL (10,2), IN ESTADO VARCHAR(100),IN COD_GENERAL VARCHAR(255),  IN PROVE INT, IN IDUNIDAD INT)
BEGIN
DECLARE PRODUCTOACTUAL VARCHAR(100);
DECLARE CANTIDAD INT;
SET @PRODUCTOACTUAL:=(SELECT producto_nombre from producto where producto_id=ID and producto_nombre= PRODUCTO);
if @PRODUCTOACTUAL = PRODUCTO THEN
	UPDATE producto set
	producto_nombre=PRODUCTO,
	marca_id=IDMARCA,
	categoria_id=IDCATEGORIA,
	producto_pcompra=PCOMPRA,
	producto_pventa=PVENTA,
	producto_estado=ESTADO,
	producto_codigo_general= COD_GENERAL,
	cliente_id = PROVE,
	unidad_id = IDUNIDAD
	WHERE producto_id=ID;
	
	UPDATE kardex SET
	producto_nombre = PRODUCTO,
	kardex_p_ingreso = PCOMPRA,
	kardex_p_salida = PVENTA
	WHERE producto_id = ID and producto_codigo = 	producto_codigo;
	
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) from producto where producto_nombre COLLATE utf8mb4_general_ci= PRODUCTO  and producto_codigo_general COLLATE utf8mb4_general_ci= COD_GENERAL);
	IF @CANTIDAD = 0 THEN
		UPDATE producto set
	producto_nombre=PRODUCTO,
	marca_id=IDMARCA,
	categoria_id=IDCATEGORIA,
	producto_pcompra=PCOMPRA,
	producto_pventa=PVENTA,
	producto_estado=ESTADO,
  producto_codigo_general= COD_GENERAL,
	cliente_id = PROVE,
	unidad_id = IDUNIDAD
	WHERE producto_id=ID;
	
	UPDATE kardex SET
	producto_nombre = PRODUCTO,
	kardex_p_ingreso = PCOMPRA,
	kardex_p_salida = PVENTA
	WHERE producto_id = ID and producto_codigo = 	producto_codigo;
	
			SELECT 1;
	ELSE
			SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_PROVEEDOR
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_PROVEEDOR`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_PROVEEDOR`(IN ID INT,IN RUC VARCHAR(30),IN RAZON VARCHAR(255),IN DIRECCION VARCHAR(255),IN CELULAR VARCHAR(20), IN ESTADO VARCHAR(100))
BEGIN
DECLARE CANTIDAD INT;
DECLARE PROVEACTUAL VARCHAR(25);
SET @PROVEACTUAL:=(SELECT prove_ruc from proveedor where prove_id=ID);
IF @PROVEACTUAL = RUC THEN
	UPDATE proveedor set
	prove_ruc=RUC,
	prove_razon=RAZON,
	prove_direccion=DIRECCION,
	prove_celular=CELULAR,
	prove_estado=ESTADO
	where prove_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM proveedor where prove_ruc=RUC);
	if @CANTIDAD = 0 THEN
		UPDATE proveedor set
		prove_ruc=RUC,
		prove_razon=RAZON,
		prove_direccion=DIRECCION,
		prove_celular=CELULAR,
		prove_estado=ESTADO
		where prove_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_RECEPCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_RECEPCION`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_RECEPCION`(IN IDRECE INT ,IN IDCLIENTE INT, IN EQUIPO VARCHAR(255), IN CARACTERISTICAS VARCHAR(255), IN IDMOTIVO INT,IN CONCEPTO VARCHAR(255),IN MONTO INT,IN ESTADO VARCHAR(100),IN ADELANTO DECIMAL (10,2) ,IN DEBE DECIMAL (10,2),IN ACCESORIOS VARCHAR(255), IN FENTREGA DATE,IN MARCAID INT, IN RECOGER VARCHAR(50))
UPDATE recepcion set
	cliente_id=IDCLIENTE,
	rece_equipo=EQUIPO,
	rece_caracteristicas=CARACTERISTICAS,
	motivo_id=IDMOTIVO,
	rece_concepto=CONCEPTO,
	rece_monto=MONTO,
	rece_estatus=ESTADO,
	rece_adelanto= ADELANTO,
	rece_debe= DEBE,
	rece_accesorios = ACCESORIOS,
	rece_fentrega = FENTREGA,
	marca_id = MARCAID,
	rece_estado = RECOGER
	WHERE rece_id=IDRECE
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_ROL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_ROL`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_ROL`(IN ID INT,IN ROL VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE ROLACTUAL VARCHAR(25);
SET @ROLACTUAL:=(SELECT rol_nombre from rol where rol_id=ID);
IF @ROLACTUAL = ROL THEN
	UPDATE rol set
	rol_nombre=ROL,
	rol_estado=ESTADO
	where rol_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM rol where rol_nombre=ROL);
	if @CANTIDAD = 0 THEN
		UPDATE rol set
		rol_nombre=ROL,
		rol_estado=ESTADO
		where rol_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_UNIDAD_MEDIDA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_UNIDAD_MEDIDA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_UNIDAD_MEDIDA`(IN ID INT,IN DESCRIPCION VARCHAR(25),IN ABREVIATURA VARCHAR(25), IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MEDIDAACTUAL VARCHAR(25);
SET @MEDIDAACTUAL:=(SELECT unidad_descripcion from unidadmedida where unidad_id =ID);
IF @MEDIDAACTUAL = DESCRIPCION THEN
	UPDATE unidadmedida set
	unidad_descripcion=DESCRIPCION,
	unidad_abrevia = ABREVIATURA,
	unidad_estado=ESTADO
	where unidad_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM unidadmedida where unidad_descripcion = DESCRIPCION);
	if @CANTIDAD = 0 THEN
			UPDATE unidadmedida set
			unidad_descripcion=DESCRIPCION,
			unidad_abrevia = ABREVIATURA,
			unidad_estado=ESTADO
			where unidad_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO`(IN ID INT, IN USUARIO VARCHAR(20), IN CORREO VARCHAR(255), IN ROL INT)
UPDATE usuario SET
usu_email = CORREO,
usu_nombre = USUARIO,
rol_id = ROL
WHERE usu_id = ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_MODIFICAR_USUARIO_ESTADO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO_ESTADO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO_ESTADO`(IN ID INT,IN ESTADO VARCHAR(10))
UPDATE usuario set
usu_estado=ESTADO
where usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_PAGAR_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_PAGAR_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_PAGAR_VENTA`(IN ID INT,IN ESTADO VARCHAR(30))
UPDATE venta set
venta_estado=ESTADO
where venta_id=ID
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_PIVOT_VENTAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_PIVOT_VENTAS`;
delimiter ;;
CREATE PROCEDURE `SP_PIVOT_VENTAS`()
SELECT YEAR(venta_fregistro) as anio,
SUM(CASE WHEN MONTH(venta_fregistro)=1 THEN venta_total ELSE 0 END) AS enero,
SUM(CASE WHEN MONTH(venta_fregistro)=2 THEN venta_total ELSE 0 END) AS febrero,
SUM(CASE WHEN MONTH(venta_fregistro)=3 THEN venta_total ELSE 0 END) AS marzo,
SUM(CASE WHEN MONTH(venta_fregistro)=4 THEN venta_total ELSE 0 END) AS abril,
SUM(CASE WHEN MONTH(venta_fregistro)=5 THEN venta_total ELSE 0 END) AS mayo,
SUM(CASE WHEN MONTH(venta_fregistro)=6 THEN venta_total ELSE 0 END) AS junio,
SUM(CASE WHEN MONTH(venta_fregistro)=7 THEN venta_total ELSE 0 END) AS julio,
SUM(CASE WHEN MONTH(venta_fregistro)=8 THEN venta_total ELSE 0 END) AS agosto,
SUM(CASE WHEN MONTH(venta_fregistro)=9 THEN venta_total ELSE 0 END) AS setiembre,
SUM(CASE WHEN MONTH(venta_fregistro)=10 THEN venta_total ELSE 0 END) AS octubre,
SUM(CASE WHEN MONTH(venta_fregistro)=11 THEN venta_total ELSE 0 END) AS noviembre,
SUM(CASE WHEN MONTH(venta_fregistro)=12 THEN venta_total ELSE 0 END) AS diciembre,
SUM(venta_total) as total
FROM venta
WHERE venta_estado ='PAGADA'
GROUP BY YEAR(venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_APERTURA_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_APERTURA_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_APERTURA_CAJA`(IN DESCRIPCION VARCHAR(100), IN MONTO_INI DECIMAL(10,2))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM caja where caja_estado='VIGENTE');
if @CANTIDAD = 0 THEN
	INSERT INTO caja (caja_descripcion, caja_monto_inicial, caja_fecha_ap, caja_estado, caja_hora_aper) VALUES(DESCRIPCION, MONTO_INI, CURDATE(), 'VIGENTE', CURRENT_TIME());
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_CAJA_CIERRE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CAJA_CIERRE`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CAJA_CIERRE`(IN MONTO_VEN DECIMAL(10,2), IN CANT_VENT VARCHAR(255), IN MONTO_EGRES DECIMAL(10,2),  IN CANT_EGRES VARCHAR(255), IN MONTO_TOTAL DECIMAL(10,2), IN MONTO_SERVI DECIMAL(10,2), IN CANT_SERV VARCHAR(255))
UPDATE caja SET 
caja_monto_final =MONTO_VEN,
caja_monto_egreso = MONTO_EGRES, 
caja_fecha_cie= CURDATE(), 
caja_total_ingreso= CANT_VENT, 
caja_total_egreso = CANT_EGRES, 
caja_monto_total = MONTO_TOTAL, 
caja_estado = 'CERRADO',
caja_monto_servicio = MONTO_SERVI,
caja_total_servicio = CANT_SERV,
caja_hora_cierre = CURRENT_TIME()
WHERE caja.caja_estado = 'VIGENTE'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_CATEGORIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CATEGORIA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CATEGORIA`(IN CATEGORIA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM categoria where categoria_descripcion=CATEGORIA);
if @CANTIDAD = 0 THEN
INSERT into categoria(categoria_descripcion,categoria_estado)values(CATEGORIA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_CLIENTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CLIENTE`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CLIENTE`(IN `NOMBRE` VARCHAR(100), IN `NIT` VARCHAR(20), IN `CELULAR` VARCHAR(20), IN `DIRECCION` VARCHAR(255), IN `APE_P` VARCHAR(255), IN `APE_M` VARCHAR(255), IN `CORREO` VARCHAR(255), IN `TIPODOC` VARCHAR(50))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM cliente where cliente_nit=NIT );
IF @CANTIDAD = 0 THEN
	INSERT INTO cliente(cliente_nombres,cliente_celular,cliente_nit,cliente_fregistro,cliente_estado,cliente_direccion,cliente_ape_p,cliente_ape_m, cliente_correo, cliente_tipo_doc) VALUES(NOMBRE,CELULAR,NIT,CURDATE(),'ACTIVO',DIRECCION,APE_P, APE_M, CORREO, TIPODOC);
	SELECT 1;
ELSE
	SELECT 2;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_COMPROBANTE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_COMPROBANTE`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_COMPROBANTE`(IN TIPO VARCHAR(100),IN SERIE VARCHAR(100),IN NUMERO VARCHAR(100))
INSERT into comprobante(compro_tipo,compro_serie,compro_numero,compro_estado)values(TIPO, SERIE,NUMERO,'ACTIVO')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_COTIZACION`(IN IDPROVEEDOR INT, IN COMPROBANTE VARCHAR(255), IN SERIE VARCHAR(255), IN IMPUESTO DECIMAL(10,2),IN TOTAL DECIMAL(10,2),IN IDCOMPROBANTE INT,IN PORCENTAJE DECIMAL(10,2),IN IDUSUARIO INT, IN ATIENDE VARCHAR(255), IN DIASVAL VARCHAR(10), IN FORMAPAGO INT)
BEGIN

DECLARE COMPRO INT;
DECLARE CORRELATIVO INT;
SET @COMPRO:=(SELECT compro_numero FROM comprobante WHERE compro_id=IDCOMPROBANTE);
SET @CORRELATIVO:=(SELECT COUNT(*) FROM comprobante WHERE compro_numero=@COMPRO);		

INSERT INTO cotizacion(cliente_id,coti_comprobante,coti_serie,coti_num_comprobante,coti_fregistro,coti_impuesto,coti_total,coti_estado,compro_id,coti_porcentaje,usu_id,coti_hora,coti_atiende,coti_dias,fpago_id) VALUES (IDPROVEEDOR,COMPROBANTE,SERIE,@COMPRO,CURDATE(),IMPUESTO,TOTAL,'ACTIVO',IDCOMPROBANTE,PORCENTAJE,IDUSUARIO,CURRENT_TIME(),ATIENDE,DIASVAL,FORMAPAGO);
SELECT LAST_INSERT_ID();
		




UPDATE comprobante SET 
		compro_numero=LPAD( @COMPRO + 1, 6, '0')
		where compro_id=IDCOMPROBANTE;





END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_DETALLE_COTIZACION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_DETALLE_COTIZACION`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_COTIZACION`(IN IDCOTI INT, IN PRODUCTO INT, IN CANTIDAD DECIMAL(10,2), IN PRECIO DECIMAL(10,2))
BEGIN
INSERT INTO cotizacion_detalle(coti_id, producto_id,coti_detalle_cantidad,coti_detalle_precio,coti_detalle_estado,coti_detalle_fecha)VALUES(IDCOTI,PRODUCTO,CANTIDAD,PRECIO,'ACTIVO',CURDATE());


END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_DETALLE_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_DETALLE_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_VENTA`(IN IDVENTA INT, IN PRODUCTO INT, IN CANTIDAD DECIMAL(10,2), IN PRECIO DECIMAL(10,2))
BEGIN
INSERT INTO detalle_venta(venta_id, producto_id,vdetalle_cantidad,vdetalle_precio,vdetalle_estado,vdetalle_fecha)VALUES(IDVENTA,PRODUCTO,CANTIDAD,PRECIO,'VENDIDO',CURDATE());

set @preciocompra = (select producto_pcompra from producto where producto_id =PRODUCTO);
set @precioventa = (select producto_pventa from producto where producto_id =PRODUCTO);
set @stock = (select producto_stock from producto where producto_id =PRODUCTO);

set @COMPROBANTE = (select CONCAT_WS('-',venta_comprobante,venta_serie,venta_num_comprobante) as COMPROBANTE from venta where venta_id=IDVENTA);

set @ID_DETALLE_VENTA = LAST_INSERT_ID();

INSERT INTO kardex(kardex_fecha,kardex_tipo,kardex_salida,kardex_p_salida,kardex_total,producto_id,venta_id,vdetalle_id,venta_comprobante,kardex_precio_general) 
VALUES(CURDATE(),'SALIDA',CANTIDAD,@precioventa,@stock,PRODUCTO,IDVENTA,@ID_DETALLE_VENTA,@COMPROBANTE,@preciocompra );
		END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_EMPRESA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_EMPRESA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_EMPRESA`(IN RAZON VARCHAR(255), IN RUC VARCHAR(255), IN REPRE VARCHAR(255), IN DIRECCION VARCHAR(255), IN CELULAR VARCHAR(255), IN TELEFONO VARCHAR(255), IN CORREO VARCHAR(255), IN RUTA VARCHAR(255), in URL VARCHAR(255), IN CUENTA01 VARCHAR(100),IN NRO_CUENTA01 VARCHAR(100),IN CUENTA02 VARCHAR(100),IN NRO_CUENTA02 VARCHAR(100))
BEGIN
DECLARE CANT INT;
SET @CANT:=(SELECT COUNT(*) FROM configuracion WHERE confi_ruc = BINARY RUC);
IF @CANT = 0 THEN
	INSERT INTO configuracion(confi_razon_social,confi_ruc,confi_nombre_representante,confi_direccion,confi_celular,confi_telefono,confi_correo,config_foto,confi_estado,confi_url,confi_cnta01,confi_nro_cuenta01,confi_cnta02,confi_nro_cuenta02)
	VALUES (RAZON,RUC,REPRE,DIRECCION,CELULAR,TELEFONO,CORREO,RUTA,'ACTIVO',URL,CUENTA01,NRO_CUENTA01,CUENTA02,NRO_CUENTA02);
SELECT 1;
ELSE
	SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_FORMA_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_FORMA_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_FORMA_PAGO`(IN FORMAPAGO VARCHAR(255))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM forma_pago where fpago_descripcion=FORMAPAGO);
if @CANTIDAD = 0 THEN
INSERT into forma_pago(fpago_descripcion,fpago_estado)values(FORMAPAGO,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_GASTOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_GASTOS`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_GASTOS`(IN GASTO VARCHAR(255),IN NOMTO INT,IN RESPONSABLE VARCHAR(255))
INSERT into gastos(gastos_descripcion,gastos_monto,gastos_responsable,gastos_fregistro,gastos_estado, estado_caja)values(GASTO,NOMTO,RESPONSABLE,CURDATE(),'ACTIVO', 'ABIERTO')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_MARCA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_MARCA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_MARCA`(IN MARCA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM marca where marca_descripcion=MARCA);
if @CANTIDAD = 0 THEN
INSERT into marca(marca_descripcion,marca_estado)values(MARCA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_MOTIVO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_MOTIVO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_MOTIVO`(IN MOTIVO VARCHAR(255))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM motivo where motivo_descripcion=MOTIVO);
if @CANTIDAD = 0 THEN
INSERT into motivo(motivo_descripcion,motivo_estado)values(MOTIVO,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_PRODUCTO`(IN PRODUCTO VARCHAR(100),IN IDMARCA INT, IN IDCATEGORIA INT,IN STOCK INT, IN PCOMPRA DECIMAL (10,2), IN PVENTA DECIMAL (10,2), IN COD_GENERAL VARCHAR(255), IN PROVEE INT,IN RUTA VARCHAR(255), IN IDUNIDAD INT)
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM producto where producto_nombre COLLATE utf8mb4_general_ci =PRODUCTO OR producto_codigo_general COLLATE utf8mb4_general_ci = COD_GENERAL );
IF @CANTIDAD = 0 THEN
	INSERT INTO producto(producto_nombre,marca_id,categoria_id,producto_stock,producto_pcompra,producto_pventa,producto_fregistro,producto_estado,producto_stock_inicial,producto_codigo_general,cliente_id, producto_foto, unidad_id) VALUES(PRODUCTO,IDMARCA,IDCATEGORIA,STOCK,PCOMPRA,PVENTA,CURDATE(),'ACTIVO',STOCK,COD_GENERAL,PROVEE,RUTA,IDUNIDAD );

	SELECT 1;
ELSE
	SELECT 2;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_PROVEEDOR
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_PROVEEDOR`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_PROVEEDOR`(IN RUC VARCHAR(30),IN RAZON VARCHAR(255),IN DIRECCION VARCHAR(255),IN CELULAR VARCHAR(20))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM proveedor where prove_ruc=RUC);
if @CANTIDAD = 0 THEN
INSERT into proveedor(prove_ruc,prove_razon,prove_direccion,prove_celular,prove_fregistro,prove_estado)values(RUC,RAZON,DIRECCION,CELULAR,CURDATE(),'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_RECEPCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_RECEPCION`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_RECEPCION`(IN EQUIPO VARCHAR(20), IN CARACTERISTICAS VARCHAR(255),IN CONCEPTO VARCHAR(255),IN MONTO INT,IN IDCLIENTE INT, IN IDMOTIVO INT,IN ADELANTO DECIMAL (10,2) ,IN DEBE DECIMAL (10,2),IN ACCESORIOS VARCHAR(255), IN FENTREGA DATE,IN MARCAID INT)
INSERT INTO recepcion(cliente_id,rece_equipo,rece_caracteristicas,motivo_id,rece_concepto,rece_monto,rece_fregistro, rece_estado, rece_estatus,rece_adelanto,rece_debe,rece_accesorios,rece_fentrega,marca_id)
	VALUES(IDCLIENTE, EQUIPO, CARACTERISTICAS, IDMOTIVO, CONCEPTO,MONTO,CURDATE(),'POR ENTREGAR','ACTIVO',ADELANTO,DEBE,ACCESORIOS,FENTREGA,MARCAID)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_ROL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_ROL`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_ROL`(IN ROL VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM rol where rol_nombre=ROL);
if @CANTIDAD = 0 THEN
INSERT into rol(rol_nombre,rol_fregistro,rol_estado)values(ROL,CURDATE(),'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_SERVICIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_SERVICIO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_SERVICIO`(IN IDRECE INT, IN MONTO INT,IN CONCEPTO VARCHAR(255),IN RESPONSABLE VARCHAR(255),IN COMENTARIO VARCHAR(255))
INSERT INTO servicio(rece_id,servicio_monto,servicio_concepto,servicio_responsable,servicio_comentario,servicio_fregistro,servicio_entrega,servicio_estado, estado_caja) VALUES(IDRECE,MONTO,CONCEPTO,RESPONSABLE,COMENTARIO,CURDATE(),'ENTREGADO','ACTIVO', 'ABIERTO')
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_UNIDAD_MEDIDA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_UNIDAD_MEDIDA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_UNIDAD_MEDIDA`(IN DESCRIPCION VARCHAR(25),IN ABREVIATURA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM unidadmedida where unidad_descripcion COLLATE utf8mb4_general_ci=DESCRIPCION or unidad_abrevia COLLATE utf8mb4_general_ci= ABREVIATURA);
if @CANTIDAD = 0 THEN
INSERT into unidadmedida(unidad_descripcion, unidad_abrevia,unidad_estado)values(DESCRIPCION,ABREVIATURA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_USUARIOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_USUARIOS`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_USUARIOS`(IN USUARIO VARCHAR(20), IN CLAVE VARCHAR(255),IN CORREO VARCHAR(255),IN ROL INT,IN RUTA VARCHAR(255))
BEGIN
DECLARE CANT INT;
SET @CANT:=(SELECT COUNT(*) FROM usuario WHERE usu_nombre = BINARY USUARIO);
IF @CANT = 0 THEN
	INSERT INTO usuario(usu_nombre, usu_contrasena, usu_email, rol_id, usu_foto, usu_estado)
	VALUES(USUARIO, CLAVE, CORREO, ROL, RUTA,'ACTIVO');
	
	SELECT 1;
ELSE
	SELECT 2;
END IF;



END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REGISTRAR_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_VENTA`(IN IDCLIENTE INT, IN COMPROBANTE VARCHAR(255), IN SERIE VARCHAR(255), IN NUMERO VARCHAR(255), IN IMPUESTO DECIMAL(10,2),IN TOTAL DECIMAL(10,2),IN IDCOMPROBANTE INT,IN PORCENTAJE DECIMAL(10,2),IN IDUSUARIO INT,IN IDFPAGO INT, IN OBSERVA VARCHAR(200))
BEGIN
INSERT INTO venta(cliente_id,venta_comprobante,venta_serie,venta_num_comprobante,venta_fregistro,venta_impuesto,venta_total,venta_estado,compro_id,venta_porcentaje,usu_id,venta_hora, fpago_id,observacion, estado_caja) VALUES (IDCLIENTE,COMPROBANTE,SERIE,NUMERO,CURDATE(),IMPUESTO,TOTAL,'REGISTRADA',IDCOMPROBANTE,PORCENTAJE,IDUSUARIO,CURRENT_TIME(),IDFPAGO,OBSERVA, 'ABIERTO');
SELECT LAST_INSERT_ID();

END
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_CAJA_CHICA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_CAJA_CHICA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_CAJA_CHICA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	caja.caja_id, 
	caja.caja_descripcion, 	
	caja.caja_monto_inicial, 
	caja.caja_monto_servicio,
	caja.caja_monto_final, 
	caja.caja_monto_egreso,
  CONCAT_WS(' ',caja.caja_fecha_ap, caja.caja_hora_aper) as  caja_fecha_ap,
	CONCAT_WS(' ',caja.caja_fecha_cie, caja_hora_cierre) as caja_fecha_cie,
	caja.caja_total_ingreso, 
	caja.caja_total_egreso, 
-- 	SUM(caja.caja_monto_inicial + caja.caja_monto_final) - caja_monto_egreso  AS suma,
	caja.caja_monto_total, 
	caja.caja_estado
FROM
	caja
	WHERE caja.caja_fecha_ap BETWEEN FINICIO AND FFIN
	ORDER BY caja_id DESC
	-- where caja.caja_estado = 'VIGENTE'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_GASTO_ANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_GASTO_ANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_GASTO_ANUAL`(IN ANIO VARCHAR(10))
SELECT  
YEAR(a.gastos_fregistro) as ano,
count(a.gastos_monto) as cant_gastos,
MONTH(a.gastos_fregistro) as numero_mes, 
MONTHname(a.gastos_fregistro) as mes, 
SUM(a.gastos_monto) as gasto,
case month(a.gastos_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre  
from gastos a
where a.gastos_estado='ACTIVO' and YEAR(a.gastos_fregistro) =ANIO
GROUP BY YEAR(a.gastos_fregistro),
month(a.gastos_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_GASTO_FECHA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_GASTO_FECHA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_GASTO_FECHA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	* ,
	(select SUM(gastos_monto) from gastos WHERE gastos_fregistro BETWEEN FINICIO AND FFIN )
FROM
	gastos
	WHERE gastos_fregistro BETWEEN FINICIO AND FFIN
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_GASTO_MES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_GASTO_MES`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_GASTO_MES`(IN MES VARCHAR(5))
SELECT
	gastos.gastos_id, 
	gastos.gastos_descripcion, 
	gastos.gastos_monto, 
	gastos.gastos_responsable, 
	gastos.gastos_fregistro, 
	gastos.gastos_estado
FROM
	gastos
	WHERE gastos.gastos_estado ='ACTIVO' 
	and (select MONTH(gastos_fregistro))=MES
		and YEAR(gastos_fregistro)=YEAR(CURDATE())
		ORDER BY gastos_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_GASTO_TOTAL_ANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_GASTO_TOTAL_ANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_GASTO_TOTAL_ANUAL`()
SELECT 
YEAR(gastos_fregistro) as ano,
SUM(gastos_monto) as total_gasto_ano 
FROM gastos
where gastos_estado='ACTIVO'  GROUP BY YEAR(gastos_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA`()
SELECT 
	(select MAX(caja_monto_inicial) from caja where caja_estado = 'VIGENTE') as monto_inicial_caja,

	(select COUNT(venta_total) from venta where estado_caja = 'ABIERTO' AND venta_estado = 'PAGADA') as cant_ventas,
	(select IFNULL(SUM(venta_total),0) from venta where estado_caja = 'ABIERTO' AND venta_estado = 'PAGADA') as suma_ventas,
	(select COUNT(gastos_monto)  from gastos where estado_caja = 'ABIERTO'  AND gastos_estado = 'ACTIVO') as cant_gasto,
	(select IFNULL(SUM(gastos_monto),0) from gastos where estado_caja = 'ABIERTO' AND gastos_estado = 'ACTIVO') as suma_gasto,
	(select caja_estado from caja where caja_estado = 'VIGENTE' ) as estado,
	(select  CONCAT_WS(' ',caja.caja_fecha_ap, caja.caja_hora_aper)  from caja where caja_estado = 'VIGENTE' ) as fecha_apertura,
	(select COUNT(servicio_monto) from servicio where servicio_estado = 'ACTIVO' AND estado_caja = 'ABIERTO') as cant_servicio,
  (select IFNULL(SUM(servicio_monto),0) from servicio where servicio_estado = 'ACTIVO' AND estado_caja = 'ABIERTO') as suma_servicio
	-- 	(select SUM(caja.caja_monto_inicial + caja.caja_monto_final) - caja_monto_egreso   from caja where caja_estado = 'VIGENTE' ) as monto_final
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_PRODUCTO_EN_SAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_PRODUCTO_EN_SAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_PRODUCTO_EN_SAL`()
SELECT
	kardex.kardex_id,
	kardex.kardex_tipo ,
	kardex.producto_id, 
	kardex.producto_codigo as codigo, 
	kardex.producto_nombre as nombre, 
	kardex.kardex_p_ingreso as precio, 
	IFNULL(SUM(kardex_ingreso),0) as ingresos,
	IFNULL(sum(kardex_salida),0) as salidas,
IFNULL((SUM(kardex_ingreso) - sum(kardex_salida) ),SUM(kardex_ingreso)) as stock_actual
FROM
	kardex
	where kardex_tipo IN ('INICIAL','INGRESO','SALIDA', 'SALIDA DIRECTA')
	GROUP BY producto_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_SERVICIO_ANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_SERVICIO_ANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_SERVICIO_ANUAL`(IN ANIO VARCHAR(10))
SELECT  
YEAR(s.servicio_fregistro) as ano,
count(s.servicio_fregistro) as cant_servicio,
MONTH(s.servicio_fregistro) as numero_mes, 
MONTHname(s.servicio_fregistro) as mes, 
SUM(s.servicio_monto) as monto_servicio,
case month(s.servicio_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre  
from servicio s
where YEAR(s.servicio_fregistro) =ANIO
GROUP BY YEAR(s.servicio_fregistro),
month(s.servicio_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_SERVICIO_MES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_SERVICIO_MES`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_SERVICIO_MES`(IN MES VARCHAR(5))
SELECT
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto, 
	recepcion.rece_estado, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_comentario, 
	servicio.servicio_entrega,
	servicio.servicio_fregistro,
	servicio.servicio_estado
FROM
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id 
		WHERE MONTH(servicio_fregistro)=MES
		and YEAR(servicio_fregistro)=YEAR(CURDATE())
		ORDER BY servicio.servicio_fregistro DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_UTILIDAD
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_UTILIDAD`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_UTILIDAD`()
SELECT
	detalle_venta.producto_id, 
	CONCAT_WS(' | ',producto.producto_codigo, producto.producto_nombre) as producto, 

	detalle_venta.vdetalle_cantidad, 
		SUM(detalle_venta.vdetalle_cantidad) as cantida_vendidos,
	MAX(detalle_venta.vdetalle_precio) as precio_venta,
	producto.producto_pcompra, 
	(MAX(detalle_venta.vdetalle_precio) - producto.producto_pcompra  ) as utilidad,

	 SUM((detalle_venta.vdetalle_precio - producto.producto_pcompra ) * detalle_venta.vdetalle_cantidad) as suma_total
FROM
	producto
	INNER JOIN
	detalle_venta
	ON 
		producto.producto_id = detalle_venta.producto_id
	AND vdetalle_estado = 'VENDIDO'
		 GROUP BY detalle_venta.producto_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_ANIO`(IN ANIO VARCHAR(10))
SELECT 
YEAR(v.venta_fregistro) as ano, 
MONTH(v.venta_fregistro) as numero_mes, 
MONTHname(v.venta_fregistro) as mes,
count(v.venta_total) as cant_ventas,
SUM(v.venta_total) as total,
case month(v.venta_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
where venta_estado ='PAGADA' and YEAR(v.venta_fregistro) =ANIO
GROUP BY YEAR(v.venta_fregistro),
month(v.venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_ANULADA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_ANULADA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_ANULADA`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT
	venta.venta_id, 
	MONTH(venta_fregistro) as numero_mes, 
	cliente.cliente_nombres, 
	
	CONCAT_WS(' - ',venta.venta_comprobante, venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		WHERE venta.venta_fregistro and venta_estado='ANULADA' 
		and (select MONTH(venta_fregistro))=MES 
		and YEAR(venta_fregistro)=ANIO
		ORDER BY venta_id DESC
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_DEL_DIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_DEL_DIA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_DEL_DIA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
detalle_venta.vdetalle_id, 
	detalle_venta.venta_id, 
	venta.venta_fregistro AS fecha, 
	venta.venta_comprobante as tipo_comprobante,
	CONCAT_WS(' - ', venta.venta_serie, venta.venta_num_comprobante) AS comprobante, 
	cliente.cliente_nombres as cliente,		
	(venta.venta_total - venta.venta_impuesto) as base_imp,
	venta.venta_impuesto as igv, 
	venta.venta_total as total
-- 	detalle_venta.producto_id, 
-- 	CONCAT_WS(' | ',producto.producto_codigo, producto.producto_nombre) as producto,
--  count(detalle_venta.vdetalle_cantidad) as cant_prod_vend
-- 	detalle_venta.vdetalle_cantidad, 
-- 	detalle_venta.vdetalle_precio
-- 	(detalle_venta.vdetalle_precio * detalle_venta.vdetalle_cantidad) as totan_cant_p
	
	
FROM
	detalle_venta
	INNER JOIN
	venta
	ON 
		detalle_venta.venta_id = venta.venta_id
	INNER JOIN
	producto
	ON 
		detalle_venta.producto_id = producto.producto_id
		INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
		where venta.venta_estado = 'PAGADA' and venta.venta_fregistro BETWEEN FINICIO AND FFIN 	
	GROUP BY venta.venta_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_GENERAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_GENERAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_GENERAL`()
SELECT 
YEAR(v.venta_fregistro) as ano, 
MONTH(v.venta_fregistro) as numero_mes, 
MONTHname(v.venta_fregistro) as mes,
count(v.venta_total) as cant_fact,
SUM(v.venta_total) as total,
case month(v.venta_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
where venta_estado ='PAGADA' 
GROUP BY YEAR(v.venta_fregistro),
month(v.venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_MES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_MES`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_MES`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT
	venta.venta_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',venta.venta_comprobante,venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	COUNT(detalle_venta.vdetalle_cantidad) AS cant_prod, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	detalle_venta
	ON 
		venta.venta_id = detalle_venta.venta_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		
		
		WHERE venta.venta_fregistro and venta_estado ='PAGADA'
		and (select MONTH(venta_fregistro))=MES 
		and YEAR(venta_fregistro)=ANIO
		GROUP BY venta.venta_id
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_POR_ANIO_MES_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_POR_ANIO_MES_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_POR_ANIO_MES_USUARIO`(IN ID INT,IN ANIO VARCHAR(10))
SELECT 
YEAR(v.venta_fregistro) as ano, 
MONTH(v.venta_fregistro) as numero_mes, 
MONTHname(v.venta_fregistro) as mes,
count(v.venta_total) as cant_ventas,
SUM(v.venta_total) as total,
v.usu_id, 
usuario.usu_nombre as usu_nombre,
case month(v.venta_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
INNER JOIN
	usuario
	ON 
		v.usu_id = usuario.usu_id
where venta_estado ='PAGADA' and YEAR(v.venta_fregistro) =ANIO and v.usu_id = ID
GROUP BY YEAR(v.venta_fregistro),
month(v.venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_POR_ANIO_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_POR_ANIO_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_POR_ANIO_USUARIO`(IN ANIO VARCHAR(10))
SELECT
	YEAR(venta_fregistro) as ano,
	venta.usu_id, 
	usuario.usu_nombre as nom_usuario, 
	count(venta_total) as cant_ventas,
	SUM(venta.venta_total) AS total
	
FROM
	venta
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		where venta.venta_estado ='PAGADA'   and YEAR(venta_fregistro) = ANIO
		GROUP BY usu_id

-- SELECT sum(venta_total) FROM venta WHERE usu_id ='9' and venta_estado ='PAGADA' and YEAR(venta_fregistro) = '2022'
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_REPORTE_VENTA_TOTAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_TOTAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_TOTAL`()
SELECT 
YEAR(venta_fregistro) as ano,
count(venta_total) as cant_venta_ano,
SUM(venta_total) as total_venta_ano
FROM venta
where venta_estado ='PAGADA' GROUP BY YEAR(venta_fregistro)
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_SELECT_PERMISOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_SELECT_PERMISOS`;
delimiter ;;
CREATE PROCEDURE `SP_SELECT_PERMISOS`()
SELECT * from permiso
ORDER BY idpermiso
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_VERIFICAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_VERIFICAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_VERIFICAR_USUARIO`(IN USUARIO VARCHAR(250))
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre
FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
where usu_nombre = BINARY USUARIO
;;
delimiter ;

-- ----------------------------
-- Estructura de Proceso de SP_VER_DETALLE_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_VER_DETALLE_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_VER_DETALLE_VENTA`(IN ID_VENTA INT)
SELECT
	detalle_venta.vdetalle_id, 
	detalle_venta.venta_id, 
	detalle_venta.producto_id, 
	producto.producto_nombre, 
		detalle_venta.vdetalle_precio,
	detalle_venta.vdetalle_cantidad ,
	(detalle_venta.vdetalle_precio * detalle_venta.vdetalle_cantidad ) subtotal

FROM
	detalle_venta
	INNER JOIN
	venta
	ON 
		detalle_venta.venta_id = venta.venta_id
	INNER JOIN
	producto
	ON 
		detalle_venta.producto_id = producto.producto_id
		where detalle_venta.venta_id = ID_VENTA
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla caja
-- ----------------------------
DROP TRIGGER IF EXISTS `VENTA_CERRAR`;
delimiter ;;
CREATE TRIGGER `VENTA_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE venta SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO';
END
;;
delimiter ;

-- ----------------------------
-- Estructura para Triggers GASTO_CERRAR
-- ----------------------------
DROP TRIGGER IF EXISTS `GASTO_CERRAR`;
delimiter ;;
CREATE TRIGGER `GASTO_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE gastos SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO';
END
;;
delimiter ;

-- ----------------------------
-- Estructura para Triggers SERVICIO_CERRAR
-- ----------------------------
DROP TRIGGER IF EXISTS `SERVICIO_CERRAR`;
delimiter ;;
CREATE TRIGGER `SERVICIO_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE servicio SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO';
END
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla detalle_venta
-- ----------------------------
DROP TRIGGER IF EXISTS `TR_STOCK_PRODUCTO`;
delimiter ;;
CREATE TRIGGER `TR_STOCK_PRODUCTO` BEFORE INSERT ON `detalle_venta` FOR EACH ROW BEGIN
DECLARE STOCKACTUAL INT;
SET @STOCKACTUAL:=(SELECT producto_stock FROM producto WHERE producto_id=new.producto_id);
UPDATE producto SET
producto_stock=@STOCKACTUAL-new.vdetalle_cantidad
where producto_id=new.producto_id;
END
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla producto
-- ----------------------------
DROP TRIGGER IF EXISTS `Generar_codigo`;
delimiter ;;
CREATE TRIGGER `Generar_codigo` BEFORE INSERT ON `producto` FOR EACH ROW begin
	declare siguiente_codigo int;
    set siguiente_codigo = (Select ifnull(max(convert(producto_id, signed integer)), 0) from producto) + 1;
    set new.producto_codigo = concat('P', LPAD( siguiente_codigo, 4, '0'));
end
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla producto
-- ----------------------------
DROP TRIGGER IF EXISTS `inser_kardex`;
delimiter ;;
CREATE TRIGGER `inser_kardex` AFTER INSERT ON `producto` FOR EACH ROW BEGIN

	insert into kardex (kardex_fecha,  kardex_tipo,   kardex_ingreso,   kardex_p_ingreso,   kardex_total,   producto_id, producto_nombre,  producto_codigo,  kardex_precio_general) 
	VALUES       (NEW.producto_fregistro, 'INICIAL',  NEW.producto_stock,  NEW.producto_pcompra, NEW.producto_stock,  NEW.producto_id, NEW.producto_nombre, NEW.producto_codigo,    NEW.producto_pcompra );



end
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla servicio
-- ----------------------------
DROP TRIGGER IF EXISTS `TR_ESTADO`;
delimiter ;;
CREATE TRIGGER `TR_ESTADO` BEFORE INSERT ON `servicio` FOR EACH ROW UPDATE recepcion SET
rece_estado = "ENTREGADO"
WHERE rece_id= new.rece_id
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla servicio
-- ----------------------------
DROP TRIGGER IF EXISTS `TR_ELIMINAR`;
delimiter ;;
CREATE TRIGGER `TR_ELIMINAR` BEFORE DELETE ON `servicio` FOR EACH ROW UPDATE recepcion SET
rece_estado = "POR ENTREGAR"
WHERE rece_id=old.rece_id
;;
delimiter ;

-- ----------------------------
-- Triggers estructura para tabla venta
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_numero_compro`;
delimiter ;;
CREATE TRIGGER `tr_numero_compro` BEFORE INSERT ON `venta` FOR EACH ROW BEGIN
DECLARE NUMCOMPRO INT;
SET @NUMCOMPRO:=(SELECT compro_numero FROM comprobante WHERE compro_id=new.compro_id);
UPDATE comprobante SET
compro_numero=@NUMCOMPRO+0001
where compro_id=new.compro_id;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
