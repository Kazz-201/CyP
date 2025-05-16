<?php
require_once 'conexion.php'; // Asegúrate de que la ruta sea correcta

$conexion = new conexion();

try {
    $db = $conexion->Conectar();
    echo "✅ Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
