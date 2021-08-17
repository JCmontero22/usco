<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class AlumnoModel extends mainModelConexion
    {
        
        protected function get_listAlumno(){
            $sql = "SELECT id_alumno AS id, nombre_alumno AS nombre, identificacion_alumno AS identificacion, codigo_alumno AS codigo 
                    FROM alumno";
            return $this->runQuery($sql);
        }
    
    }
    