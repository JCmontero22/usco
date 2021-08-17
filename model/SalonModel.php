<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class salonModel extends mainModelConexion
    {
        protected function set_createSalon($nombre, $codigo){
            
            $sql = "INSERT INTO salones (nombre_salon, codigo_salon, estado_salon)
                    VALUES ('$nombre', '$codigo', '1')";
            
            return $this->runQuery($sql);
        }

        protected function get_existeSalon($nombre){
            $sql = "SELECT id_salones FROM salones WHERE nombre_salon = '$nombre'";

            return $this->runQuery($sql);
        }

        protected function get_listSalones(){
            $sql = "SELECT id_salones AS id, nombre_salon AS nombreSalon, codigo_Salon AS codigo
                    FROM salones
                    ORDER BY id_salones ASC";
            return $this->runQuery($sql);
        }

        protected function set_updateSalon($idSalon, $nombre){
            $sql = "UPDATE salones SET nombre_salon = '$nombre' WHERE id_salones = '$idSalon'";
            return $this->runQuery($sql);
        }

        protected function get_dataSalon($idSalon){
            $sql = "SELECT nombre_salon AS nombre, id_salones AS id FROM salones WHERE id_salones = '$idSalon'";

            return $this->runSimpleQuery($sql);
        }
    }
    