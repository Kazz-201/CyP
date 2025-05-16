<?php

// Controller
require_once '../controllers/clientecontroller.php';

// Models
require_once '../models/clienteModel.php';

// Recibe la información de los inputs del formulario por POST
$rut_cliente = $_POST["rutcliente"];
$nom_cliente = $_POST["nomcliente"];
$fono_cliente = $_POST["fonocliente"];
$direccion_cliente = $_POST["direcliente"];

// Crea un array con la información recibida, para el envío de la data
$data = array(
    "rutCliente" => $rut_cliente,
    "nombreCliente" => $nom_cliente,
    "telefonoCliente" => $fono_cliente,
    "direccionCliente" => $direccion_cliente
);

// Instancia el controlador
$respuesta = (new ctrCliente)->ctrSaveCliente($data);

// Evalúa la respuesta del modelo
if ($respuesta == "ok") {
    echo "Ingresado con éxito a la BD";
    // header('Location: template.php');
} else {
    echo "Ocurrió un error";
}

?>
