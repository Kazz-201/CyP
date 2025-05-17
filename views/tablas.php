<?php
// Conexión a la base de datos
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$clientes = $conn->query("SELECT * FROM Clientes");
$proveedores = $conn->query("SELECT * FROM Proveedores");
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Clientes y Proveedores</h1>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalCliente">
                <i class="bi bi-person-plus"></i> Agregar Cliente
            </button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProveedor">
                <i class="bi bi-truck"></i> Agregar Proveedor
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Clientes</div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>telefono</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td ><?= $row['ID_Cliente']  ?></td>
                                <td><?= $row['Nombre_Cliente'] ?></td>
                                <td><?= $row['Telefono'] ?></td>
                                <td><?= $row['Correo_Electronico'] ?></td>
                                <td><?= $row['Direccion'] ?></td>
                                <td>
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
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Proveedores</div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Contacto</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $proveedores->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?= $row['ID_Proveedor'] ?></td>
                                <td><?= $row['Nombre_Proveedor'] ?></td>
                                <td><?= $row['Contacto'] ?></td>
                                <td><?= $row['Direccion'] ?></td>
                                <td><?= $row['Ciudad'] ?></td>
                                <td>
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