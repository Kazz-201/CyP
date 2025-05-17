<?php
// Conexión a la base de datos
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$proveedores = $conn->query("SELECT * FROM Proveedores");
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Clientes</h1>
        <div>
            </button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProveedor">
                <i class="bi bi-truck"></i> Agregar Proveedor
            </button>
        </div>
    </div>
    <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Proveedores</div>
                <div class="card-body table-responsive">
                    <table id="tablaProveedores" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Proveedor</th>
                                <th>Contacto</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Acciones</th> <!-- Este th es para los botones de acción -->
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
                                    <!-- Botones de acción aquí -->
                                    <button class="btn btn-warning btn-sm mb-2 btn-editar-proveedor"
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