<?php
// Conexión a la base de datos
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$proveedores = $conn->query("SELECT * FROM Proveedores");
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-success">Proveedores</h1>
        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProveedor">
                <i class="bi bi-truck"></i> Agregar Proveedor
            </button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Proveedores</div>
                <div class="card-body table-responsive">
                    <table id="tablaProveedores" class="table table-hover align-middle w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Proveedor</th>
                                <th>Contacto</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $proveedores->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?= $row['ID_Proveedor'] ?></td>
                                <td class="editable"><?= $row['Nombre_Proveedor'] ?></td>
                                <td class="editable"><?= $row['Contacto'] ?></td>
                                <td class="editable"><?= $row['Direccion'] ?></td>
                                <td class="editable"><?= $row['Ciudad'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                       <!-- Botones de acción aquí -->
                                        <button class="btn btn-warning btn-sm btn-editar-proveedor"
                                          data-id="<?= $row['ID_Proveedor'] ?>"
                                          data-nombre="<?= htmlspecialchars($row['Nombre_Proveedor']) ?>"
                                          data-contacto="<?= htmlspecialchars($row['Contacto']) ?>"
                                          data-direccion="<?= htmlspecialchars($row['Direccion']) ?>"
                                          data-ciudad="<?= htmlspecialchars($row['Ciudad']) ?>"
                                        >
                                          <i class="bi bi-pencil"></i> Editar
                                        </button>
                                        <button class="btn btn-danger btn-sm eliminar-proveedor" data-id="<?= $row['ID_Proveedor'] ?>">
                                          <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </div>
                                </td>        
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar proveedores -->
<div class="modal fade" id="modalEditarProveedor" tabindex="-1" aria-labelledby="modalEditarProveedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEditarProveedor">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarProveedorLabel">Editar Proveedor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editProveedorId" name="id_proveedor">
          <div class="mb-3">
            <label for="editProveedorNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="editProveedorNombre" name="nombre_proveedor" required>
          </div>
          <div class="mb-3">
            <label for="editProveedorContacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="editProveedorContacto" name="contacto_proveedor" required>
          </div>
          <div class="mb-3">
            <label for="editProveedorDireccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="editProveedorDireccion" name="direccion_proveedor" required>
          </div>
          <div class="mb-3">
            <label for="editProveedorCiudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="editProveedorCiudad" name="Ciudad" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </form>
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