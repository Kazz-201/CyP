<?php

// Controller
require_once '../controllers/proveedorcontroller.php';

// Models
require_once '../models/proveedorModel.php';

// Recibe la información de los inputs del formulario por POST
$nom_proveedor = $_POST["nomproveedor"];
$nom_contacto = $_POST["nomcontacto"];
$direccion_proveedor = $_POST["direproveedor"];
$ciudad_proveedor = $_POST["cityproveedor"];

// Crea un array con la información recibida, para el envío de la data
$data = array(
    "nomProveedor" => $nom_proveedor,
    "nomContacto" => $nom_contacto,
    "direccionProveedor" => $direccion_proveedor,
    "ciudadProveedor" => $ciudad_proveedor
);

// Instancia el controlador
$respuesta = (new ctrProveedor)->ctrSaveProveedor($data);

// Evalúa la respuesta del modelo
if ($respuesta == "ok") {
    echo "Ingresado con éxito a la BD";
    // header('Location: template.php');
} else {
    echo "Ocurrió un error";
}

?>