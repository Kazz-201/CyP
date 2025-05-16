<?php 

Class ctrCliente{

    public function ctrSaveCliente($data){
        $table = "cliente";
        $respuesta = (new mdlCliente)->mdlSaveCliente($table, $data);
        return $respuesta;
    }

}


?>