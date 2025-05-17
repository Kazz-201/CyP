<?php
// Este archivo procesa la información del formulario de cliente y la envía al controlador para su almacenamiento en la base de datos
require_once '../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['tipo'] == 'cliente') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM Clientes WHERE ID_Cliente = ?");
        $stmt->execute([$id]);
        echo "ok";
    } elseif ($_POST['tipo'] == 'proveedor') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM Proveedores WHERE ID_Proveedor = ?");
        $stmt->execute([$id]);
        echo "ok";
    } else {
        echo "error";
    }
}
?>