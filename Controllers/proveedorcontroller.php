<?php 

Class ctrProveedor{

    public function ctrSaveProveedor($data){
        $table = "proveedor";
        $respuesta = (new mdlProveedor)->mdlSaveProveedor($table, $data);
        return $respuesta;
    }

}


?>