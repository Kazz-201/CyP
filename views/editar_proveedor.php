<?php
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$id = $_POST['id_proveedor'];
$nombre = $_POST['nombre_proveedor'];
$contacto = $_POST['contacto_proveedor'];
$direccion = $_POST['direccion_proveedor'];
$ciudad = $_POST['Ciudad'];

$stmt = $conn->prepare("UPDATE Proveedores SET Nombre_Proveedor=?, Contacto=?, Direccion=?, Ciudad=? WHERE ID_Proveedor=?");
if($stmt->execute([$nombre, $contacto, $direccion, $ciudad, $id])) {
    echo "ok";
} else {
    $error = $stmt->errorInfo();
    echo "error: " . $error[2];
}
?>