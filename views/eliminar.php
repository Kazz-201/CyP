<?php
// Este archivo procesa la información del formulario de cliente y la envía al controlador para su almacenamiento en la base de datos
require_once '../models/conexion.php';
$conn = new Conexion();
$conn = $conn->Conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['tipo'] == 'cliente') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
        echo "ok";
    } elseif ($_POST['tipo'] == 'proveedor') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM proveedor WHERE cod_proveedor = ?");
        $stmt->execute([$id]);
        echo "ok";
    } else {
        echo "error";
    }
}
?>