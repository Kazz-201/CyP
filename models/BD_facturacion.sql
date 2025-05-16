-- Base de datos: "Facturacion"
--

-- --------------------------------------------------------

--
-- Estructura de la tabla "cliente"
--

CREATE TABLE cliente(
  id_cliente INT NOT NULL AUTO_INCREMENT,
  rut VARCHAR(12),
  nombre VARCHAR(80),
  telefono VARCHAR(20),
  direccion TEXT,
  PRIMARY KEY (id_cliente)
);
-- --------------------------------------------------------

--
-- Estructura de la tabla "Proveedor"
--

CREATE TABLE proveedor (
  cod_proveedor INT NOT NULL AUTO_INCREMENT,
  nom_proveedor VARCHAR(100),
  nom_contacto VARCHAR(100),
  telefono VARCHAR(20),
  direccion TEXT,
  PRIMARY KEY (cod_proveedor)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "rol"
--

CREATE TABLE rol(
  id_rol INT NOT NULL AUTO_INCREMENT,
  rol VARCHAR(20),
  PRIMARY KEY (id_rol)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla Usuario
--

CREATE TABLE usuario(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50),
  correo VARCHAR(100),
  usuario VARCHAR(15),
  clave VARCHAR(100),
  rol INT,
  PRIMARY KEY (id_usuario),
  FOREIGN KEY (rol) REFERENCES rol(id_rol)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "Factura"
--

CREATE TABLE factura (
  id_factura INT NOT NULL AUTO_INCREMENT,
  fecha DATE,
  usuario INT,
  codcliente INT,
  totaltactura INT,
  PRIMARY KEY (id_factura),
  FOREIGN KEY (usuario) REFERENCES usuario(id_usuario),
  FOREIGN KEY (codcliente) REFERENCES cliente(id_cliente)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "Productos"
--

CREATE TABLE producto(
  cod_producto INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(100),
  proveedor INT,
  precio INT,
  stock INT,
  foto TEXT,
  PRIMARY KEY (cod_producto),
  FOREIGN KEY (proveedor) REFERENCES proveedor(cod_proveedor)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "detallefactura"
--

CREATE TABLE detallefactura(
  id_detalle INT NOT NULL AUTO_INCREMENT,
  num_factura INT,
  cod_producto INT,
  cantidad INT,
  preciototal INT,
  PRIMARY KEY (id_detalle),
  FOREIGN KEY (num_factura) REFERENCES factura(id_factura),
  FOREIGN KEY (cod_producto) REFERENCES producto(cod_producto)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "factura_temporal"
--

CREATE TABLE factura_temporal(
  id_detalle INT NOT NULL AUTO_INCREMENT,
  num_factura INT,
  cod_producto INT,
  cantidad INT,
  preciototal INT,
  PRIMARY KEY (id_detalle),
  FOREIGN KEY (num_factura) REFERENCES factura(id_factura),
  FOREIGN KEY (cod_producto) REFERENCES producto(cod_producto)
);

-- --------------------------------------------------------

--
-- Estructura de la tabla "Abastecimoento"
--

CREATE TABLE abastecimiento(
  id_abastecimiento INT NOT NULL AUTO_INCREMENT,
  codproducto INT,
  fecha DATE,
  cantidad INT,
  precio INT,
  PRIMARY KEY (id_abastecimiento),
  FOREIGN KEY (codproducto) REFERENCES producto(cod_producto)
);

-- --------------------------------------------------------