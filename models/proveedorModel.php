<?php
    require_once 'conexion.php';

    Class mdlProveedor{

        public function mdlSaveProveedor($table, $data){
            $sql = (new Conexion)->Conectar()->prepare("INSERT INTO $table VALUES (NULL, :nom_proveedor, :nom_contacto, :telefono, :direccion)");

            $sql->bindParam(":nom_proveedor", $data["nomProveedor"], PDO::PARAM_STR);
            $sql->bindParam(":nom_contacto", $data["nomContacto"], PDO::PARAM_STR);
            $sql->bindParam(":telefono", $data["telefonoProveedor"], PDO::PARAM_STR);
            $sql->bindParam(":direccion", $data["direccionProveedor"], PDO::PARAM_STR);
        

            if ($sql->execute()){
                return "ok";
            } else {
                return "error";
            }
        }
    }


?>