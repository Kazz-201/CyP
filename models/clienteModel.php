<?php
    require_once 'conexion.php';

    Class mdlCliente{

        public function mdlSaveCliente($table, $data){
            $sql = (new conexion)->Conectar()->prepare("INSERT INTO $table VALUES (NULL, :Nombre_Cliente, :Telefono, :Correo_Electronico, :Direccion)");

            $sql->bindParam(":Nombre_Cliente", $data["nomCliente"], PDO::PARAM_STR);
            $sql->bindParam(":Telefono", $data["fonoCliente"], PDO::PARAM_STR);
            $sql->bindParam(":Correo_Electronico", $data["mailCliente"], PDO::PARAM_STR);
            $sql->bindParam(":Direccion", $data["direccionCliente"], PDO::PARAM_STR);
        

            if ($sql->execute()){
                return "ok";
            } else {
                return "error";
            }
        }
    }


?>