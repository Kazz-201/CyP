<?php
    require_once 'conexion.php';

    Class mdlCliente{

        public function mdlSaveCliente($table, $data){
            $sql = (new conexion)->Conectar()->prepare("INSERT INTO $table VALUES (NULL, :rut, :nombre, :telefono, :direccion)");

            $sql->bindParam(":rut", $data["rutCliente"], PDO::PARAM_STR);
            $sql->bindParam(":nombre", $data["nombreCliente"], PDO::PARAM_STR);
            $sql->bindParam(":telefono", $data["telefonoCliente"], PDO::PARAM_STR);
            $sql->bindParam(":direccion", $data["direccionCliente"], PDO::PARAM_STR);
        

            if ($sql->execute()){
                return "ok";
            } else {
                return "error";
            }
        }
    }


?>