-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tiendaDeMascotas;
USE tiendaDeMascotas;

-- Tabla de Categorías de Productos
CREATE TABLE IF NOT EXISTS Categorias (
    ID_Categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Categoria VARCHAR(255) NOT NULL
);

-- Tabla de Proveedores
CREATE TABLE IF NOT EXISTS Proveedores (
    ID_Proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Proveedor VARCHAR(255) NOT NULL,
    Contacto VARCHAR(255),
    Direccion VARCHAR(255),
    Ciudad VARCHAR(255)
);

-- Tabla de Productos
CREATE TABLE IF NOT EXISTS Productos (
    ID_Producto INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Categoria_ID INT NOT NULL,
    Codigo_Producto VARCHAR(100) UNIQUE,
    Cantidad_Stock INT DEFAULT 0,
    Proveedor_ID INT,
    Fecha_Vencimiento DATE,
    Precio_Compra DECIMAL(10, 2),
    Precio_Venta DECIMAL(10, 2),
    FOREIGN KEY (Categoria_ID) REFERENCES Categorias(ID_Categoria),
    FOREIGN KEY (Proveedor_ID) REFERENCES Proveedores(ID_Proveedor)
);

-- Tabla de Entradas
CREATE TABLE IF NOT EXISTS Entradas (
    ID_Entrada INT AUTO_INCREMENT PRIMARY KEY,
    Producto_ID INT,
    Cantidad_Entrada INT NOT NULL,
    Fecha_Entrada DATE NOT NULL,
    Proveedor_ID INT,
    Precio_Compra DECIMAL(10, 2),
    FOREIGN KEY (Producto_ID) REFERENCES Productos(ID_Producto),
    FOREIGN KEY (Proveedor_ID) REFERENCES Proveedores(ID_Proveedor)
);

-- Tabla de Salidas
CREATE TABLE IF NOT EXISTS Salidas (
    ID_Salida INT AUTO_INCREMENT PRIMARY KEY,
    Producto_ID INT,
    Cantidad_Salida INT NOT NULL,
    Fecha_Salida DATE NOT NULL,
    Motivo_Salida VARCHAR(255),
    Precio_Venta DECIMAL(10, 2),
    FOREIGN KEY (Producto_ID) REFERENCES Productos(ID_Producto)
);

-- Tabla de Usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Usuario VARCHAR(255) NOT NULL,
    Contraseña VARCHAR(255) NOT NULL,
    Rol VARCHAR(50) NOT NULL,
    Fecha_Creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Movimientos
CREATE TABLE IF NOT EXISTS Movimientos (
    ID_Movimiento INT AUTO_INCREMENT PRIMARY KEY,
    Producto_ID INT,
    Tipo_Movimiento ENUM('Entrada', 'Salida') NOT NULL,
    Cantidad INT NOT NULL,
    Fecha_Movimiento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Usuario_ID INT,
    Motivo VARCHAR(255),
    FOREIGN KEY (Producto_ID) REFERENCES Productos(ID_Producto),
    FOREIGN KEY (Usuario_ID) REFERENCES Usuarios(ID_Usuario)
);


-- Tabla de Clientes
CREATE TABLE IF NOT EXISTS Clientes (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Cliente VARCHAR(255) NOT NULL,
    Telefono VARCHAR(50),
    Correo_Electronico VARCHAR(100),
    Direccion VARCHAR(255)
);

-- Tabla de Ventas
CREATE TABLE IF NOT EXISTS Ventas (
    ID_Venta INT AUTO_INCREMENT PRIMARY KEY,
    Cliente_ID INT,
    Producto_ID INT,
    Cantidad INT NOT NULL,
    Fecha_Venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Precio_Unitario DECIMAL(10, 2),
    Total DECIMAL(10, 2),
    FOREIGN KEY (Cliente_ID) REFERENCES Clientes(ID_Cliente),
    FOREIGN KEY (Producto_ID) REFERENCES Productos(ID_Producto)
);


-- Crear índices para mejorar el rendimiento
CREATE INDEX idx_producto_codigo ON Productos(Codigo_Producto);
CREATE INDEX idx_producto_nombre ON Productos(Nombre);
CREATE INDEX idx_movimiento_fecha ON Movimientos(Fecha_Movimiento);

