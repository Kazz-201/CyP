<?php
require_once __DIR__ . '/../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$stmt = $conn->prepare("UPDATE Clientes SET Nombre_Cliente=?, Telefono=?, Correo_Electronico=?, Direccion=? WHERE ID_Cliente=?");
if($stmt->execute([$nombre, $telefono, $correo, $direccion, $id])) {
    echo "ok";
} else {
    echo "error";
}
?>