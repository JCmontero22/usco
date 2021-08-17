<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class profesorModel extends mainModelConexion
    {
    
        protected function get_listProfesores(){
            $sql = "SELECT id_profesor AS id, nombre_profesor AS nombre FROM profesor";
            return $this->runQuery($sql);
        }
    
       
    }
    