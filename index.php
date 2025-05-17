<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

// Obtener datos
$clientes = $conn->query("SELECT * FROM Clientes");
$proveedores = $conn->query("SELECT * FROM Proveedores");

// Determina qué tabla mostrar según el parámetro GET
$vista = $_GET['vista'] ?? 'clientes'; // Por defecto muestra clientes
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes y Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Proyecto Amandary</a>
    <div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $vista === 'clientes' ? 'active' : '' ?>" href="?vista=clientes">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $vista === 'proveedores' ? 'active' : '' ?>" href="?vista=proveedores">Proveedores</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div id="contenedor-tablas">
    <?php
      if ($vista === 'clientes') {
        include 'views/tabla_clientes.php';
      } else {
        include 'views/tabla_proveedores.php';
      }
    ?>
    </div>
</div>

<div id="alerta" class="container mt-3"></div>
</body>
</html>