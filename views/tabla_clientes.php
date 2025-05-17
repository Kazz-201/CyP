<?php
// Conexión a la base de datos
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$clientes = $conn->query("SELECT * FROM Clientes");
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Clientes</h1>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalCliente">
                <i class="bi bi-person-plus"></i> Agregar Cliente
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Clientes</div>
                <div class="card-body table-responsive">
                    <table id="tablaClientes" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>E-Mail</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?= $row['ID_Cliente']  ?></td>
                                <td><?= $row['Nombre_Cliente'] ?></td>
                                <td><?= $row['Telefono'] ?></td>
                                <td><?= $row['Correo_Electronico'] ?></td>
                                <td><?= $row['Direccion'] ?></td>
                                <td>
                                    <!-- Botones de acción aquí -->
                                    <button class="btn btn-warning btn-sm mb-2 btn-editar-cliente"
                                      data-id="<?= $row['ID_Cliente'] ?>"
                                      data-nombre="<?= htmlspecialchars($row['Nombre_Cliente']) ?>"
                                      data-telefono="<?= htmlspecialchars($row['Telefono']) ?>"
                                      data-correo="<?= htmlspecialchars($row['Correo_Electronico']) ?>"
                                      data-direccion="<?= htmlspecialchars($row['Direccion']) ?>"
                                    >
                                      <i class="bi bi-pencil"></i> Editar
                                    </button>
                                    <button class="btn btn-danger btn-sm eliminar-cliente" data-id="<?= $row['ID_Cliente'] ?>">
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

<!-- Modal para editar cliente -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="modalEditarClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEditarCliente">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarClienteLabel">Editar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editClienteId" name="id">
          <div class="mb-3">
            <label for="editNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="editNombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="editTelefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="editTelefono" name="telefono" required>
          </div>
          <div class="mb-3">
            <label for="editCorreo" class="form-label">E-Mail</label>
            <input type="email" class="form-control" id="editCorreo" name="correo" required>
          </div>
          <div class="mb-3">
            <label for="editDireccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="editDireccion" name="direccion" required>
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