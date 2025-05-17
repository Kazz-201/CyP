<?php 

Class ctrCliente{

    public function ctrSaveCliente($data){
        $table = "Clientes";
        $respuesta = (new mdlCliente)->mdlSaveCliente($table, $data);
        return $respuesta;
    }

}


?>