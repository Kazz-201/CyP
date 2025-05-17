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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes y Proveedores</title>
    <!-- Bootstrap CSS (si no lo tienes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/funciones.js"></script>
</head>
<body>

<div id="contenedor-tablas">
    <?php include 'views/tablas.php'; ?>
    <script src="js/funciones.js"></script>
</div>

<div id="alerta" class="container mt-3"></div>

<!-- Modal para agregar Cliente -->
<div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalClienteLabel">Agregar Cliente</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form method="post" action="views/procesar_cliente.php" id="formCliente">
          <input type="hidden" name="tipo" value="cliente">
          <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nomcliente" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="text" name="fonocliente" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="text" name="mailcliente" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direcliente" class="form-control" required>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para agregar Proveedor -->
<div class="modal fade" id="modalProveedor" tabindex="-1" aria-labelledby="modalProveedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="modalProveedorLabel">Agregar Proveedor</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form method="post" action="views/procesar_proveedor.php" id="formProveedor">
          <input type="hidden" name="tipo" value="proveedor">
          <div class="modal-body">
              <div class="mb-3">
                  <label class="form-label">Nombre del Proveedor</label>
                  <input type="text" name="nomproveedor" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label class="form-label">Nombre Contacto</label>
                  <input type="text" name="nomcontacto" class="form-control" required>
              </div>
                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="direproveedor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="cityproveedor" class="form-control" required>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>