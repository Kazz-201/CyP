<?php
    require_once 'conexion.php';

    Class mdlProveedor{

        public function mdlSaveProveedor($table, $data){
            $sql = (new Conexion)->Conectar()->prepare("INSERT INTO $table VALUES (NULL, :Nombre_Proveedor, :Contacto, :Direccion, :Ciudad)");

            $sql->bindParam(":Nombre_Proveedor", $data["nomProveedor"], PDO::PARAM_STR);
            $sql->bindParam(":Contacto", $data["nomContacto"], PDO::PARAM_STR);
            $sql->bindParam(":Direccion", $data["direccionProveedor"], PDO::PARAM_STR);
            $sql->bindParam(":Ciudad", $data["ciudadProveedor"], PDO::PARAM_STR);
            
        

            if ($sql->execute()){
                return "ok";
            } else {
                return "error";
            }
        }
    }


?>