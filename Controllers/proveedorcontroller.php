<?php 

Class ctrProveedor{

    public function ctrSaveProveedor($data){
        $table = "Proveedores";
        $respuesta = (new mdlProveedor)->mdlSaveProveedor($table, $data);
        return $respuesta;
    }

}


?>