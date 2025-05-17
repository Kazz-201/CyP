-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tiendaDeMascotas;
USE tiendaDeMascotas;

-- Tabla de Proveedores
CREATE TABLE IF NOT EXISTS Proveedores (
    ID_Proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Proveedor VARCHAR(255) NOT NULL,
    Contacto VARCHAR(255),
    Direccion VARCHAR(255),
    Ciudad VARCHAR(255)
);

-- Tabla de Clientes
CREATE TABLE IF NOT EXISTS Clientes (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Cliente VARCHAR(255) NOT NULL,
    Telefono VARCHAR(50),
    Correo_Electronico VARCHAR(100),
    Direccion VARCHAR(255)
);